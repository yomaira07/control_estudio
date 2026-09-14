<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pagos extends CI_Controller {
    
    private $bdv_afiliado;
    private $bdv_clave;
    
    public function __construct() {
        parent::__construct();
        
        // Verificar sesión activa
        if (!$this->session->userdata("login")) {
            redirect(base_url());
        }
        
        // Cargar modelos necesarios
        $this->load->model('Alumno_model');
        $this->load->model('Periodo_model');
        $this->load->model('Trabajo_model');
        $this->load->model('Lugar_trabajo_model');
        $this->load->model('Registro_pago_model');
        $this->load->model('Materias_preinscrita_model');
        $this->load->model('Aranceles_model');
        $this->load->model('Reincorporaciones_model');
        $this->load->model('Exonerados_model');
        $this->load->model('Programa_model');
        $this->load->model('Tiempo_preinscripcion_model');
        
        // Cargar librería BDV
        require_once(APPPATH . 'libraries/ipg2-bdv.php');
        
        // Credenciales BDV desde configuración
        $this->bdv_afiliado = $this->config->item('bdv_afiliado');
        $this->bdv_clave    = $this->config->item('bdv_clave');
        
        // Verificar que las credenciales estén configuradas
        if (empty($this->bdv_afiliado) || empty($this->bdv_clave)) {
            log_message('error', 'Credenciales BDV no configuradas en config.php');
        }
    }
    
    // ================================================================
    // INICIAR PAGO
    // ================================================================
    public function iniciar() {
        $id_usuario = $this->session->userdata('id');
        $periodo    = $this->Periodo_model->PeriodoActivo();
        
        if (!$periodo) {
            $this->session->set_flashdata('error', 'No hay período académico activo.');
            redirect(base_url() . 'dashboard04/inscripcion');
        }
        
        // Validar preinscripción
        $inscritas = $this->Materias_preinscrita_model->verificar($id_usuario, $periodo->id);
        if (!$inscritas) {
            $this->session->set_flashdata('error', 'Debe registrar unidades curriculares primero.');
            redirect(base_url() . 'dashboard04/inscripcion');
        }
        
        // Validar que no tenga pago registrado
        if ($this->Registro_pago_model->VerificarRegistro_validado($id_usuario, $periodo->id)) {
            $this->session->set_flashdata('warning', 'Ya tiene un pago registrado para este período.');
            redirect(base_url() . 'dashboard04/proceso');
        }
        
        // Obtener datos del estudiante
        $alumno = $this->Alumno_model->getListaAlumno($id_usuario);
        $id_estudiante = $alumno->id;
        if (!$alumno or !$id_estudiante) {
            $this->session->set_flashdata('error', 'No se encontraron datos del estudiante.');
            redirect(base_url() . 'dashboard04/home');
        }
        
        
        // ✅ calcular_total_pago() ahora devuelve un array
        $calculo     = $this->calcular_total_pago($id_usuario, $periodo->id);
        $total_final = $calculo['total'];
        $total_uc    = $calculo['uc'];

        if ($total_final <= 0) {
            $this->session->set_flashdata('error', 'El monto a pagar debe ser mayor a 0.');
            redirect(base_url() . 'dashboard04/registro_pago/' . $id_usuario);
        }

        // Log de control
        log_message('debug', 'Cálculo: total=' . $total_final . ' | uc=' . $total_uc);

        // Obtener el nombre del postgrado
        $postgrado = $this->obtener_nombre_postgrado($id_usuario, $periodo->id);
        
        try {
            // Crear instancia BDV
            $PaymentProcess = new IpgBdv2($this->bdv_afiliado, $this->bdv_clave);
            
            // Referencia única
            $referencia = 'REF' . $id_usuario . '_' . date('YmdHis');
            
            // Crear solicitud de pago
            $Payment = new IpgBdvPaymentRequest();
            $Payment->idLetter   = $alumno->nacionalidad ?: 'V';
          //  $Payment->idNumber   = (string) $alumno->cedula;
            $Payment->idNumber   = '32873615';
            $Payment->amount     = (float)  $total_final;
            $Payment->currency   = 1;  // 1 = Bolívar
            $Payment->reference  = $referencia;
            $Payment->title      = 'Pago Inscripción Posgrado FENFMP';
            $Payment->description= 'Pago de inscripción de unidades curriculares - Período ' . $periodo->nombre;
            //$Payment->email      = (string) $alumno->correo;
            $Payment->email      = 'tecnologia@enf.edu.ve';
            $Payment->cellphone  = (string) $alumno->tel_celular;
            
            // ✅ IMPORTANTE: incluir {ID} para que BDV devuelva el token
            // ✅ IMPORTANTE: incluir ref para identificar el pago
            $Payment->urlToReturn = base_url() . 'pagos/confirmacion?ref=' . $referencia . '&token={ID}';
            
            // RIF (vacío para persona natural; se llena solo si aplica)
            $Payment->rifLetter = '';
            $Payment->rifNumber = '';
            
            // 🔍 DEBUG - volcado de datos que se envían a BDV
            log_message('debug', '=== BDV iniciar() Payment ===' . print_r(array(
                'idLetter'    => $Payment->idLetter,
                'idNumber'    => $Payment->idNumber,
                'amount'      => $Payment->amount,
                'currency'    => $Payment->currency,
                'reference'   => $Payment->reference,
                'title'       => $Payment->title,
                'description' => $Payment->description,
                'email'       => $Payment->email,
                'cellphone'   => $Payment->cellphone,
                'urlToReturn' => $Payment->urlToReturn,
            ), true));
            
            // Enviar solicitud de pago
            $response = $PaymentProcess->createPayment($Payment);
            
            log_message('debug', '=== BDV iniciar() Response ===' . print_r($response, true));
            
            if ($response->success == true) {
                // Guardar información del pago en sesión
                $this->session->set_userdata(array(
                    'pago_bdv_token'      => $response->paymentId,
                    'pago_bdv_monto'      => $total_final,
                    'pago_bdv_referencia' => $referencia,
                    'pago_bdv_periodo'    => $periodo->id
                ));
                
                // Registrar pago como pendiente en la base de datos
                $this->registrar_pago_pendiente($id_usuario, $id_periodo, $response, $monto, $total_uc, $referencia, $id_estudiante);
                
                // Redirigir a la pasarela de pago
                redirect($response->urlPayment);
                
            } else {
                // Error al crear el pago
                log_message('error', 'Error BDV - Código: ' . $response->responseCode . ' - Mensaje: ' . $response->responseMessage);
                $this->session->set_flashdata('error', 'No se pudo iniciar el pago: ' . $response->responseMessage);
                redirect(base_url() . 'dashboard04/registro_pago/' . $id_usuario);
            }
            
        } catch (Exception $e) {
            log_message('error', 'Excepción en pago BDV: ' . $e->getMessage());
            $this->session->set_flashdata('error', 'Error al procesar el pago. Intente nuevamente más tarde.');
            redirect(base_url() . 'dashboard04/registro_pago/' . $id_usuario);
        }
    }
    
    // ================================================================
    // CONFIRMACIÓN DE PAGO BDV (callback)
    // ================================================================
    public function confirmacion() {
        $id_usuario = $this->session->userdata('id');
        $referencia = $this->input->get('ref');
        
        // ✅ Token: puede venir de la URL (?token=xxx o ?ID=xxx) o de la sesión
        $paymentToken = $this->input->get('token');
        if (empty($paymentToken)) {
            $paymentToken = $this->input->get('ID');
        }
        if (empty($paymentToken)) {
            $paymentToken = $this->session->userdata('pago_bdv_token');
        }
        
        // 🔍 Logs de entrada
        log_message('debug', '=== BDV confirmacion() ===');
        log_message('debug', 'BASE_URL detectada: ' . base_url());
        log_message('debug', 'GET params: ' . print_r($this->input->get(), true));
        log_message('debug', 'Token a usar: ' . ($paymentToken ? $paymentToken : 'NULL'));
        log_message('debug', 'Referencia: ' . ($referencia ? $referencia : 'NULL'));
        log_message('debug', 'Token en sesion: ' . ($this->session->userdata('pago_bdv_token') ? $this->session->userdata('pago_bdv_token') : 'NULL'));
        
        if (empty($paymentToken) && empty($referencia)) {
            $this->session->set_flashdata('error', 'No se encontró información del pago.');
            redirect(base_url() . 'dashboard04/proceso');
        }
        
        try {
            // Instanciar API BDV
            $PaymentProcess = new IpgBdv2($this->bdv_afiliado, $this->bdv_clave);
            
            // ✅ Si no hay token pero sí referencia, buscamos el token en BD
            if (empty($paymentToken) && !empty($referencia)) {
                $registro = $this->Registro_pago_model->get_pago_pendiente_por_referencia($referencia);
                if ($registro) {
                    $paymentToken = $registro->token_bdv;
                    log_message('debug', 'Token recuperado de BD por referencia: ' . $paymentToken);
                }
            }
            
            if (empty($paymentToken)) {
                $this->session->set_flashdata('error', 'No se pudo obtener el token del pago.');
                redirect(base_url() . 'dashboard04/proceso');
            }
            
            // Consultar el estado del pago
            $response = $PaymentProcess->checkPayment($paymentToken);
            
            log_message('debug', 'BDV checkPayment response: ' . print_r($response, true));
            log_message('debug', '>>> status = ' . var_export(isset($response->status) ? $response->status : 'NULL', true));
            log_message('debug', '>>> transactionId = ' . (isset($response->transactionId) ? $response->transactionId : 'NULL'));
            
            // Datos para la vista
            $data = array(
                'response'   => $response,
                'id_usuario' => $id_usuario,
                'referencia' => $referencia
            );
            
            if ($response->success == true) {
                // ✅ CORREGIDO: BDV devuelve status = 1 cuando el pago fue exitoso
                if ($response->status == 1) {
                    
                    // ✅ Obtener id_periodo del registro pendiente (más confiable que PeriodoActivo)
                    $id_periodo = null;
                    if (!empty($referencia)) {
                        $registro = $this->Registro_pago_model->get_pago_pendiente_por_referencia($referencia);
                        if ($registro) {
                            $id_periodo = $registro->id_periodo;
                        }
                    }
                    if (empty($id_periodo)) {
                        $periodo = $this->Periodo_model->PeriodoActivo();
                        $id_periodo = $periodo ? $periodo->id : null;
                    }
                    
                    log_message('debug', 'id_periodo para actualizar: ' . var_export($id_periodo, true));
                    
                    // Actualizar el estado del pago en la base de datos
                    $this->actualizar_pago_exitoso($id_usuario, $id_periodo, $response, $paymentToken, $referencia);
                    
                    // Actualizar el estado de las materias preinscritas
                    $this->actualizar_materias_pagadas($id_usuario, $id_periodo);
                    
                    // Limpiar datos de sesión
                    $this->session->unset_userdata(array(
                        'pago_bdv_token',
                        'pago_bdv_monto',
                        'pago_bdv_referencia',
                        'pago_bdv_periodo'
                    ));
                    
                    $this->session->set_flashdata('success', '¡Pago confirmado exitosamente!');
                    
                    $data['exitoso'] = true;
                    $data['mensaje'] = 'Pago completado exitosamente. Su inscripción ha sido registrada.';
                    
                } else {
                    // Pago no completado o pendiente
                    log_message('info', 'Pago BDV no completado - Token: ' . $paymentToken . ' - Status: ' . $response->status);
                    $data['exitoso'] = false;
                    $data['mensaje'] = 'El pago no fue completado. Estado: ' . $response->responseMessage;
                }
            } else {
                // Error en la verificación
                log_message('error', 'Error verificación BDV - Código: ' . $response->responseCode . ' - Mensaje: ' . $response->responseMessage);
                $data['exitoso'] = false;
                $data['mensaje'] = 'Error al verificar el pago: ' . $response->responseMessage;
            }
            
            // Cargar vista de resultado
            $this->load->view('participante/inscripcion/pago_bdv_resultado', $data);
            
        } catch (Exception $e) {
            log_message('error', 'Excepción en confirmación BDV: ' . $e->getMessage()
                . ' en ' . $e->getFile() . ':' . $e->getLine());
            $this->session->set_flashdata('error', 'Error al verificar el pago. Por favor, contacte a soporte.');
            redirect(base_url() . 'dashboard04/proceso');
        }
    }
    
    // ================================================================
    // VERIFICAR ESTADO (AJAX)
    // ================================================================
    public function verificar_estado() {
        $this->output->set_content_type('application/json');
        
        $id_usuario = $this->session->userdata('id');
        $token      = $this->session->userdata('pago_bdv_token');
        
        if (empty($token)) {
            echo json_encode(array(
                'estado'  => 'no_pagado',
                'mensaje' => 'No hay pago en proceso'
            ));
            return;
        }
        
        try {
            $PaymentProcess = new IpgBdv2($this->bdv_afiliado, $this->bdv_clave);
            $response = $PaymentProcess->checkPayment($token);
            
            if ($response->success == true && $response->status == 1) {
                echo json_encode(array(
                    'estado'   => 'pagado',
                    'mensaje'  => 'Pago confirmado exitosamente',
                    'response' => $response
                ));
            } elseif ($response->success == true)  {
                echo json_encode(array(
                    'estado'   => 'pendiente',
                    'mensaje'  => 'Pago en proceso de verificación',
                    'response' => $response
                ));
            } else {
                echo json_encode(array(
                    'estado'  => 'error',
                    'mensaje' => $response->responseMessage
                ));
            }
        } catch (Exception $e) {
            log_message('error', 'Excepción verificar_estado: ' . $e->getMessage());
            echo json_encode(array(
                'estado'  => 'error',
                'mensaje' => 'Error al verificar el pago'
            ));
        }
    }
    
    // ================================================================
    // CANCELAR PROCESO DE PAGO
    // ================================================================
    public function cancelar() {
        // Limpiar datos de sesión
        $this->session->unset_userdata(array(
            'pago_bdv_token',
            'pago_bdv_monto',
            'pago_bdv_referencia',
            'pago_bdv_periodo'
        ));
        
        // Guardar mensaje y URL para mostrar alerta antes de redirigir
        $this->session->set_flashdata('info', 'Has cancelado el proceso de pago.');
        $this->session->set_flashdata('redirect_url', base_url() . 'dashboard04/registro_pago/' . $this->session->userdata('id'));
        $this->session->set_flashdata('tipo', 'info');
        
        // Redirigir a una página intermedia que muestra la alerta
        redirect(base_url() . 'pagos/mensaje');
    }
    
    /**
     * Página intermedia que muestra la alerta y luego redirige
     */
    public function mensaje() {
        $this->load->view('participante/inscripcion/mensaje_alerta');
    }
    
    // ================================================================
    // MÉTODOS PRIVADOS
    // ================================================================
    
    /**
     * Calcula el total a pagar (replicando la lógica de la vista)
     */
    private function calcular_total_pago($id_usuario, $id_periodo) {
        // ✅ Array de retorno con valores por defecto
        $resultado = array('total' => 0, 'uc' => 0);
        $lugartrabajo = $this->Trabajo_model->Lugar_trabajo($id_usuario);
        if (!$lugartrabajo) {
            return 0;
        }
        
        $lista_trabajo = $this->Lugar_trabajo_model->valor_unidad($lugartrabajo->id_lugar_trabajo);
        $list_registro = $this->Materias_preinscrita_model->lista_preinscritas_pago($id_usuario);
        
        $total_uc          = 0;
        $total_ucredito_gen = 0;
        $valor_ucredito    = 0;
        
        // Calcular UC
        foreach ($list_registro as $registro) {
            $valor_ucredito = ($lista_trabajo->descuento > 0)
                ? $registro->valorpubmp
                : $registro->valorpubgen;
                
            $total_uc += $registro->uc;
            if ($registro->tipo_programa == 3) {
                $total_ucredito_gen += 1 * $valor_ucredito;
            } else {
                $total_ucredito_gen += $registro->uc * $valor_ucredito;
            }
        }
        
        // Calcular aranceles
        $aranceles = $this->Aranceles_model->getAranceles();
        $arancel_ins                    = 0;
        $arancel_insMaes                = 0;
        $total_arancel_permanencia      = 0;
        $arancel_fuera_lapso_programa   = 0;
        
        foreach ($aranceles as $arancel) {
            if ($arancel->id_tipo_arancel == '1') $arancel_ins                  = $arancel->monto_gen;
            if ($arancel->id_tipo_arancel == '4') $arancel_insMaes              = $arancel->monto_gen;
            if ($arancel->id_tipo_arancel == '2') $total_arancel_permanencia    = $arancel->monto_gen;
            if ($arancel->id_tipo_arancel == '3') $arancel_fuera_lapso_programa = $arancel->monto_gen;
        }
        
        // Fuera de lapso
        $lapso = $this->Tiempo_preinscripcion_model->gettiempo_preinscripcion();
        $arancel_fuera_lapso = 0;
        if (!empty($lapso) && ($lapso->tipo_lapso == 2 || $this->session->userdata("tramite_fuera_lapso") == 1)) {
            $programas        = $this->Materias_preinscrita_model->lista_programas_preinscritas($id_usuario, $id_periodo);
            // ✅ FIX: count() sobre array seguro
            $total_programas  = is_array($programas) ? count($programas) : 0;
            $arancel_fuera_lapso = $arancel_fuera_lapso_programa * $total_programas;
        }
        
        // Reincorporaciones
       
        $reincorporaciones = $this->Reincorporaciones_model->buscar_reincorporacion($id_usuario, $id_periodo);
        $total_arancel_permanencia_gen = count($reincorporaciones) * $total_arancel_permanencia;
        
       
            $monto_exonerar = 0;
      
        
        // Total a pagar
        $total_arancel_ins = $arancel_ins;
        $total_pagar_gen   = $total_ucredito_gen + $total_arancel_ins;
        $total_final       = $total_pagar_gen + $total_arancel_permanencia_gen + $arancel_fuera_lapso - $monto_exonerar;
        
        // ✅ Devolver AMBOS valores en un array
        $resultado['total'] = $total_final;
        $resultado['uc']    = $total_uc;

        return $resultado;
    }
    
    /**
     * Obtiene el nombre del postgrado
     * ✅ FIX: maneja distintos nombres de columna y evita devolver vacío
     */
    private function obtener_nombre_postgrado($id_usuario, $id_periodo) {
        $programas = $this->Materias_preinscrita_model->lista_programas_preinscritas($id_usuario, $id_periodo);
        
        if (!empty($programas) && is_array($programas)) {
            $nombres = array();
            foreach ($programas as $p) {
                if (isset($p->programa) && !empty($p->programa)) {
                    $nombres[] = $p->programa;
                } elseif (isset($p->nombre_programa) && !empty($p->nombre_programa)) {
                    $nombres[] = $p->nombre_programa;
                } elseif (isset($p->nombre) && !empty($p->nombre)) {
                    $nombres[] = $p->nombre;
                }
            }
            $nombres = array_unique($nombres);
            if (!empty($nombres)) {
                return implode(', ', $nombres);
            }
        }
        
        return 'Posgrado FENFMP';
    }
    
    /**
     * Registra el pago como pendiente en la base de datos
     */
   private function registrar_pago_pendiente($id_usuario, $id_periodo, $response, $monto, $total_uc, $referencia, $id_estudiante) {
    
    if (empty($id_estudiante)) {
        $id_estudiante = $id_usuario;
    }
    
    $data = array(
        'id_usuario'          => $id_usuario,
        'id_periodo'          => $id_periodo,
        'id_estado_estudio'   => 24,
        'monto_apagar'        => $monto,
        'monto_depositado'    => $monto,
        'nro_referencia'      => $referencia,
        'fecha_transferencia' => date('Y-m-d H:i:s'),
        'uc'                  => $total_uc,       // ✅ UC guardadas
        'status'              => 0,
        'aspirante'           => 0,
        'conciliado'          => 0,
        'quien_registro'      => $id_usuario,
        'id_banco'            => 1,
        'cedula'              => $this->session->userdata('username'),
        'id_estudiante'       => $id_estudiante,  // ✅ id_estudiante correcto
        'postgrado'           => $this->obtener_nombre_postgrado($id_usuario, $id_periodo),
        'token_bdv'           => $response->paymentId,
        'transaction_id_bdv'  => '',
        'metodo_pago'         => 'bdv'
    );
    
    log_message('debug', 'registrar_pago_pendiente DATA: ' . print_r($data, true));
    
    $existente = $this->Registro_pago_model->get_pago_pendiente_bdv($id_usuario, $id_periodo);
    
    if ($existente) {
        $result = $this->Registro_pago_model->save_conciliacion($existente->id, $id_periodo, $data);
    } else {
        $result = $this->Registro_pago_model->save($data);
    }
    
    return $result;
}
    
    /**
     * Actualiza el pago a exitoso (fecha y transaction_id corregidos)
     */
    private function actualizar_pago_exitoso($id_usuario, $id_periodo, $response, $token = null, $referencia = null) {
        
        // ✅ Convertir paymentDate correctamente (BDV envía d/m/Y H:i:s)
        $fecha_transferencia = date('Y-m-d H:i:s');
        if (!empty($response->paymentDate)) {
            $dt = DateTime::createFromFormat('d/m/Y H:i:s', $response->paymentDate);
            if ($dt === false) {
                // Fallback por si algún día cambia el formato
                $timestamp = strtotime($response->paymentDate);
                if ($timestamp !== false && $timestamp > 0) {
                    $fecha_transferencia = date('Y-m-d H:i:s', $timestamp);
                }
            } else {
                $fecha_transferencia = $dt->format('Y-m-d H:i:s');
            }
        }
        
        // transaction_id con fallbacks
        $transaction_id = '';
        if (!empty($response->transactionId)) {
            $transaction_id = $response->transactionId;
        } elseif (!empty($response->token)) {
            $transaction_id = $response->token;
        } elseif (!empty($token)) {
            $transaction_id = $token;
        }
        
        $data = array(
            'status'              => 1,
            'transaction_id_bdv'  => $transaction_id,
            'fecha_transferencia' => $fecha_transferencia,
            'quien_actualizo'     => $id_usuario,
            'metodo_pago'         => 'bdv',
            'conciliado'          => 1,
        );
        
        log_message('debug', 'actualizar_pago_exitoso DATA: ' . print_r($data, true));
        
        // ✅ PRIORIDAD 1: buscar por referencia (más confiable)
        if (!empty($referencia)) {
            $result = $this->Registro_pago_model->update_by_referencia($referencia, $data);
            log_message('debug', 'update_by_referencia result: ' . var_export($result, true));
            if ($result) {
                return true;
            }
            log_message('debug', '⚠️ update_by_referencia no encontró registro. Intentando por token...');
        }
        
        // ✅ PRIORIDAD 2: fallback por token
        $token_busqueda = '';
        if (!empty($response->token)) {
            $token_busqueda = $response->token;
        } elseif (!empty($token)) {
            $token_busqueda = $token;
        } else {
            $token_busqueda = $this->session->userdata('pago_bdv_token');
        }
        
        if (!empty($token_busqueda)) {
            $result = $this->Registro_pago_model->update_by_token(
                $id_usuario, $id_periodo, $token_busqueda, $data
            );
            log_message('debug', 'update_by_token result: ' . var_export($result, true));
            return $result;
        }
        
        log_message('error', 'actualizar_pago_exitoso: NO se pudo actualizar (sin ref ni token)');
        return false;
    }
    
    /**
     * Actualiza el estado de las materias a pagadas
     */
    private function actualizar_materias_pagadas($id_usuario, $id_periodo) {
        $data = array(
            'reg_pago'           => 1,
            'quien_actualizo'    => $id_usuario,
            'fecha_actualizacion'=> date('Y-m-d H:i:s')
        );
        
        $result = $this->Materias_preinscrita_model->update_materia_estatus($id_usuario, $id_periodo, $data);
        log_message('debug', 'actualizar_materias_pagadas result: ' . var_export($result, true));
        
        return $result;
    }
}