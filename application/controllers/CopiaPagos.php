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
         $this->bdv_clave = $this->config->item('bdv_clave');
        
        // Verificar que las credenciales estén configuradas
        if (empty($this->bdv_afiliado) || empty($this->bdv_clave)) {
            log_message('error', 'Credenciales BDV no configuradas en config.php');
        }
    }
    
    /**
     * Inicia el proceso de pago con BDV
     */
    public function iniciar() {
        // Obtener datos del usuario
        $id_usuario = $this->session->userdata('id');
        $periodo = $this->Periodo_model->PeriodoActivo();
        
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
        if ($this->Registro_pago_model->VerificarRegistro($id_usuario, $periodo->id)) {
            $this->session->set_flashdata('warning', 'Ya tiene un pago registrado para este período.');
            redirect(base_url() . 'dashboard04/proceso');
        }
        
        // Obtener datos del estudiante
        $alumno = $this->Alumno_model->getListaAlumno($id_usuario);
        if (!$alumno) {
            $this->session->set_flashdata('error', 'No se encontraron datos del estudiante.');
            redirect(base_url() . 'dashboard04/home');
        }
        
        // Calcular el total a pagar
        $total_final = $this->calcular_total_pago($id_usuario, $periodo->id);
        if ($total_final <= 0) {
            $this->session->set_flashdata('error', 'El monto a pagar debe ser mayor a 0.');
            redirect(base_url() . 'dashboard04/registro_pago/' . $id_usuario);
        }
        
        // Obtener el título del postgrado
        $postgrado = $this->obtener_nombre_postgrado($id_usuario, $periodo->id);
        
        try {
            // Crear instancia BDV con afiliado y clave
            $PaymentProcess = new IpgBdv2($this->bdv_afiliado, $this->bdv_clave);
            
            // Crear solicitud de pago según documentación
            $Payment = new IpgBdvPaymentRequest();
            $Payment->idLetter = $alumno->nacionalidad ?: 'V';
           // $Payment->idNumber = (string)$alumno->cedula;
          /* $Payment->idNumber = (string)$alumno->cedula;
            $Payment->amount = (float)$total_final;
            $Payment->currency = 1; // 1 = Bolívar, 2 = Dólar
            
            // Referencia única
            
            $Payment->reference = $referencia;
            
            $Payment->title = 'Pago Inscripción Posgrado FENFMP';
            $Payment->description = 'Pago de inscripción de unidades curriculares - Período ' . $periodo->nombre;
            $Payment->email = $alumno->correo;
            $Payment->cellphone = $alumno->tel_celular;*/
            ///////////sustituir cuando se haga la prueba en produccion//////
            $Payment->idNumber = '17141072';          // ✅ Cédula válida de la lista de pruebas
            $Payment->amount = (float)$total_final;
            $Payment->currency = 1;                  // 1 = Bolívar (según mensaje de error BDV)
            $Payment->reference = 'TEST_PN_' . date('YmdHis');
            $Payment->title = 'Prueba BDV - Persona Natural';
            $Payment->description = 'Prueba de integración BDV con FENFMP';
            $Payment->email = 'tecnologia@enf.edu.ve';
            $Payment->cellphone = $alumno->tel_celular;;
            $referencia = 'PAGO_' . $id_usuario . '_' . date('YmdHis');
            // URL de retorno con parámetro para identificar el pago
            $Payment->urlToReturn = base_url() . 'pagos/confirmacion?ref=' . $referencia;
            
            // Solo para personas jurídicas (opcional)
            // $Payment->rifLetter = $alumno->nacionalidad;
            // $Payment->rifNumber = $alumno->cedula;
            
            // Enviar solicitud de pago
            $response = $PaymentProcess->createPayment($Payment);
            
            if ($response->success == true) {
                // Guardar información del pago en sesión
                $this->session->set_userdata([
                    'pago_bdv_token' => $response->paymentId,
                    'pago_bdv_monto' => $total_final,
                    'pago_bdv_referencia' => $referencia,
                    'pago_bdv_periodo' => $periodo->id
                ]);
                
                // Registrar pago como pendiente en la base de datos
                $this->registrar_pago_pendiente($id_usuario, $periodo->id, $response, $total_final, $referencia);
                
                // Redirigir a la pasarela de pago
                redirect($response->urlPayment);
                
            } else {
                // Error al crear el pago
                log_message('error', 'Error BDV - Código: ' . $response->responseCode . ' - Mensaje: ' . $response->responseMessage);
                $this->session->set_flashdata('error', 'No se pudo iniciar el pago: ' . $response->responseMessage);
               // redirect(base_url() . 'dashboard04/registro_pago/' . $id_usuario);
            }
            
        } catch (Exception $e) {
            log_message('error', 'Excepción en pago BDV: ' . $e->getMessage());
            $this->session->set_flashdata('error', 'Error al procesar el pago. Intente nuevamente más tarde.');
            redirect(base_url() . 'dashboard04/registro_pago/' . $id_usuario);
        }
    }
    
    /**
     * Confirmación de pago BDV (callback)
     */
    public function confirmacion() {
        $id_usuario = $this->session->userdata('id');
        $referencia = $this->input->get('ref');
        
        // Obtener el token de pago de la sesión o de la URL
        $paymentToken = $this->session->userdata('pago_bdv_token');
        
        if (empty($paymentToken)) {
            $this->session->set_flashdata('error', 'No se encontró el token de pago.');
            redirect(base_url() . 'dashboard04/proceso');
        }
        
        try {
            // Instanciar API BDV
            $PaymentProcess = new IpgBdv2($this->bdv_afiliado, $this->bdv_clave);
            
            // Consultar el estado del pago según documentación
            $response = $PaymentProcess->checkPayment($paymentToken);
            
            // Datos para la vista
            $data = [
                'response' => $response,
                'id_usuario' => $id_usuario,
                'referencia' => $referencia
            ];
            
            if ($response->success == true) {
                // Verificar el estado del pago
                // Según documentación: status = 0 es exitoso
                if ($response->status == 0) {
                    // Pago exitoso
                    $periodo = $this->Periodo_model->PeriodoActivo();
                    
                    // Actualizar el estado del pago en la base de datos
                    $this->actualizar_pago_exitoso($id_usuario, $periodo->id, $response);
                    
                    // Actualizar el estado de las materias preinscritas
                    $this->actualizar_materias_pagadas($id_usuario, $periodo->id);
                    
                    // Limpiar datos de sesión
                    $this->session->unset_userdata(['pago_bdv_token', 'pago_bdv_monto', 'pago_bdv_referencia', 'pago_bdv_periodo']);
                    
                    // Establecer mensaje de éxito
                    $this->session->set_flashdata('success', '¡Pago confirmado exitosamente!');
                    
                    // Cargar vista de éxito
                    $data['exitoso'] = true;
                    $data['mensaje'] = 'Pago completado exitosamente. Su inscripción ha sido registrada.';
                    $this->load->view('participante/inscripcion/pago_bdv_resultado', $data);
                    
                } else {
                    // Pago no completado o pendiente
                    log_message('info', 'Pago BDV no completado - Token: ' . $paymentToken . ' - Status: ' . $response->status);
                    $data['exitoso'] = false;
                    $data['mensaje'] = 'El pago no fue completado. Estado: ' . $response->responseMessage;
                    $this->load->view('participante/inscripcion/pago_bdv_resultado', $data);
                }
            } else {
                // Error en la verificación
                log_message('error', 'Error verificación BDV - Código: ' . $response->responseCode . ' - Mensaje: ' . $response->responseMessage);
                $data['exitoso'] = false;
                $data['mensaje'] = 'Error al verificar el pago: ' . $response->responseMessage;
                $this->load->view('participante/inscripcion/pago_bdv_resultado', $data);
            }
            
        } catch (Exception $e) {
            log_message('error', 'Excepción en confirmación BDV: ' . $e->getMessage());
            $this->session->set_flashdata('error', 'Error al verificar el pago. Por favor, contacte a soporte.');
            redirect(base_url() . 'dashboard04/proceso');
        }
    }
    
    /**
     * Verificar estado de un pago (para AJAX)
     */
    public function verificar_estado() {
        $this->output->set_content_type('application/json');
        
        $id_usuario = $this->session->userdata('id');
        $token = $this->session->userdata('pago_bdv_token');
        
        if (empty($token)) {
            echo json_encode([
                'estado' => 'no_pagado',
                'mensaje' => 'No hay pago en proceso'
            ]);
            return;
        }
        
        try {
            $PaymentProcess = new IpgBdv($this->bdv_afiliado, $this->bdv_clave);
            $response = $PaymentProcess->checkPayment($token);
            
            if ($response->success == true && $response->status == 0) {
                echo json_encode([
                    'estado' => 'pagado',
                    'mensaje' => 'Pago confirmado exitosamente',
                    'response' => $response
                ]);
            } elseif ($response->success == true) {
                echo json_encode([
                    'estado' => 'pendiente',
                    'mensaje' => 'Pago en proceso de verificación',
                    'response' => $response
                ]);
            } else {
                echo json_encode([
                    'estado' => 'error',
                    'mensaje' => $response->responseMessage
                ]);
            }
        } catch (Exception $e) {
            echo json_encode([
                'estado' => 'error',
                'mensaje' => 'Error al verificar el pago'
            ]);
        }
    }
    
    /**
     * Cancelar proceso de pago BDV
     */
    public function cancelar() {
        // Limpiar datos de sesión
        $this->session->unset_userdata([
            'pago_bdv_token',
            'pago_bdv_monto',
            'pago_bdv_referencia',
            'pago_bdv_periodo'
        ]);
        
        $this->session->set_flashdata('info', 'Has cancelado el proceso de pago.');
        redirect(base_url() . 'dashboard04/registro_pago/' . $this->session->userdata('id'));
    }
    
    // ================================================
    // MÉTODOS PRIVADOS
    // ================================================
    
    /**
     * Calcula el total a pagar (replicando la lógica de la vista)
     */
    private function calcular_total_pago($id_usuario, $id_periodo) {
        $lugartrabajo = $this->Trabajo_model->Lugar_trabajo($id_usuario);
        if (!$lugartrabajo) {
            return 0;
        }
        
        $lista_trabajo = $this->Lugar_trabajo_model->valor_unidad($lugartrabajo->id_lugar_trabajo);
        $list_registro = $this->Materias_preinscrita_model->lista_preinscritas_pago($id_usuario);
        
        $total_uc = 0;
        $total_ucredito_gen = 0;
        $valor_ucredito = 0;
        
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
        $arancel_ins = 0;
        $arancel_insMaes = 0;
        $total_arancel_permanencia = 0;
        $arancel_fuera_lapso_programa = 0;
        
        foreach ($aranceles as $arancel) {
            if ($arancel->id_tipo_arancel == '1') $arancel_ins = $arancel->monto_gen;
            if ($arancel->id_tipo_arancel == '4') $arancel_insMaes = $arancel->monto_gen;
            if ($arancel->id_tipo_arancel == '2') $total_arancel_permanencia = $arancel->monto_gen;
            if ($arancel->id_tipo_arancel == '3') $arancel_fuera_lapso_programa = $arancel->monto_gen;
        }
        
        // Fuera de lapso
        $lapso = $this->Tiempo_preinscripcion_model->gettiempo_preinscripcion();
        $arancel_fuera_lapso = 0;
        if (!empty($lapso) && ($lapso->tipo_lapso == 2 || $this->session->userdata("tramite_fuera_lapso") == 1)) {
            $programas = $this->Materias_preinscrita_model->lista_programas_preinscritas($id_usuario, $id_periodo);
            $total_programas = count($programas);
            $arancel_fuera_lapso = $arancel_fuera_lapso_programa * $total_programas;
        }
        
        // Reincorporaciones
        $reincorporaciones = $this->Reincorporaciones_model->buscar_reincorporacion($id_usuario, $id_periodo);
        $total_arancel_permanencia_gen = count($reincorporaciones) * $total_arancel_permanencia;
        
        // Exoneraciones
        $exonerados = $this->Exonerados_model->exonerados_todo_programa($id_usuario, $id_periodo);
        $monto_exonerar = 0;
        if (!empty($exonerados)) {
            $total_exo = 0;
            $valor_exo = ($lista_trabajo->descuento > 0) 
                ? current($exonerados)->valorpubmp 
                : current($exonerados)->valorpubgen;
            foreach ($exonerados as $exo) {
                $total_exo += $exo->uc * $valor_exo;
            }
            $monto_exonerar = $total_exo + $arancel_ins + $arancel_fuera_lapso + $total_arancel_permanencia_gen;
        }
        
        // Total a pagar
        $total_arancel_ins = $arancel_ins;
        $total_pagar_gen = $total_ucredito_gen + $total_arancel_ins;
        $total_final = $total_pagar_gen + $total_arancel_permanencia_gen + $arancel_fuera_lapso - $monto_exonerar;
        
        return $total_final;
    }
    
    /**
     * Obtiene el nombre del postgrado
     */
    private function obtener_nombre_postgrado($id_usuario, $id_periodo) {
        $programas = $this->Materias_preinscrita_model->lista_programas_preinscritas($id_usuario, $id_periodo);
        if (!empty($programas)) {
            $nombres = array_map(function($p) { return $p->programa; }, $programas);
            return implode(', ', array_unique($nombres));
        }
        return 'Posgrado FENFMP';
    }
    
    /**
     * Registra el pago como pendiente en la base de datos
     */
    private function registrar_pago_pendiente($id_usuario, $id_periodo, $response, $monto, $referencia) {
        $data = [
            'id_usuario' => $id_usuario,
            'id_periodo' => $id_periodo,
            'id_estado_estudio' => 24,
            'monto_apagar' => $monto,
            'monto_depositado' => $monto,
            'nro_referencia' => $referencia,
            'fecha_transferencia' => date('Y-m-d H:i:s'),
            'status' => 0, // Pendiente
            'aspirante' => 0,
            'conciliado' => 0,
            'quien_registro' => $id_usuario,
            'id_banco' => 1, // BDV
            'cedula' => $this->session->userdata('username'),
            'id_estudiante' => $id_usuario,
            'postgrado' => $this->obtener_nombre_postgrado($id_usuario, $id_periodo),
            'token_bdv' => $response->paymentId,
            'transaction_id_bdv' => '',
            'metodo_pago' => 'bdv'
        ];
        
        // Verificar si ya existe un registro pendiente
        $existente = $this->Registro_pago_model->get_pago_pendiente_bdv($id_usuario, $id_periodo);
        if ($existente) {
            // Actualizar el registro existente
            $this->Registro_pago_model->update($existente->id, $data);
        } else {
            // Crear nuevo registro
            $this->Registro_pago_model->save($data);
        }
    }
    
    /**
     * Actualiza el pago a exitoso
     */
    private function actualizar_pago_exitoso($id_usuario, $id_periodo, $response) {
        // Convertir la fecha de BDV a formato MySQL
    $fecha_transferencia = date('Y-m-d H:i:s'); // fallback
    if (!empty($response->paymentDate)) {
        $timestamp = strtotime($response->paymentDate);
        if ($timestamp !== false) {
            $fecha_transferencia = date('Y-m-d H:i:s', $timestamp);
        }
    }
        $data = [
            'status' => 1,
            'transaction_id_bdv' => $response->transactionId,
            'fecha_transferencia' => date('Y-m-d',$response->paymentDate),
            'quien_actualizo' => $id_usuario,
            'metodo_pago' => 'bdv',
            'conciliado' => 1,
        ];
        
        $this->Registro_pago_model->update_by_token($id_usuario, $id_periodo, $this->session->userdata('pago_bdv_token'), $data);
    }
    
    /**
     * Actualiza el estado de las materias a pagadas
     */
    private function actualizar_materias_pagadas($id_usuario, $id_periodo) {
        $data = [
            'reg_pago' => 1,
            'quien_actualizo' => $id_usuario,
            'fecha_actualizacion' => date('Y-m-d H:i:s')
        ];
        
        $this->Materias_preinscrita_model->update_materia_estatus($id_usuario, $id_periodo, $data);
    }
}