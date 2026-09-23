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
        $this->load->model("Solictudtramite_model");
        $this->load->model("Tramites_model");
        
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
    // ==================== FUNCIONES PRINCIPALES =====================
    // ================================================================

    // ================================================================
    // INICIAR PAGO aranceles de inscripción
    // ================================================================
    public function iniciar() {
        $id_usuario = $this->session->userdata('id');
        $periodo    = $this->Periodo_model->PeriodoActivo();
        $total_uc   = $this->input->post('total_uc');
      
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
        
        // ✅ Obtener datos del estudiante (validar ANTES de usar ->id)
        $alumno = $this->Alumno_model->getListaAlumno($id_usuario);
        if (!$alumno || empty($alumno->id)) {
            $this->session->set_flashdata('error', 'No se encontraron datos del estudiante.');
            redirect(base_url() . 'dashboard04/home');
        }
        $id_estudiante = $alumno->id;
        
        // Obtener el total a pagar y uc calculados en el form anterior
        $total_final = $this->input->post('total_final');
        if ($total_final <= 0) {
            $this->session->set_flashdata('error', 'El monto a pagar debe ser mayor a 0.');
            redirect(base_url() . 'dashboard04/registro_pago/' . $id_usuario);
        }

        log_message('debug', 'iniciar(): total=' . $total_final . ' | uc=' . $total_uc);

        $concepto  = $this->obtener_nombre_postgrado($id_usuario, $periodo->id);
        $tipo_pago = 0;
        
        try {
            $PaymentProcess = new IpgBdv2($this->bdv_afiliado, $this->bdv_clave);
            
            $referencia = 'REF' . $id_usuario . '_' . date('YmdHis');
            
            $Payment = new IpgBdvPaymentRequest();
            $Payment->idLetter    = $alumno->nacionalidad ?: 'V';
            $Payment->idNumber    = '32873615';
            $Payment->amount      = (float) $total_final;
            $Payment->currency    = 1;
            $Payment->reference   = $referencia;
            $Payment->title       = 'Pago Inscripción Posgrado FENFMP';
            $Payment->description = 'Pago de inscripción de unidades curriculares - Período ' . $periodo->nombre;
            $Payment->email       = 'tecnologia@enf.edu.ve';
            $Payment->cellphone   = (string) $alumno->tel_celular;
            $Payment->urlToReturn = base_url() . 'pagos/confirmacion?ref=' . $referencia . '&token={ID}';
            $Payment->rifLetter   = '';
            $Payment->rifNumber   = '';
            
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
            
            $response = $PaymentProcess->createPayment($Payment);
            
            log_message('debug', '=== BDV iniciar() Response ===' . print_r($response, true));
            
            if ($response->success == true) {
                // ✅ SOLO guardar en sesión. El registro en BD se creará en confirmacion()
                //    ÚNICAMENTE si el pago es exitoso.
                $this->session->set_userdata(array(
                    'pago_bdv_token'         => $response->paymentId,
                    'pago_bdv_monto'         => $total_final,
                    'pago_bdv_referencia'    => $referencia,
                    'pago_bdv_periodo'       => $periodo->id,
                    'pago_bdv_tipo'          => $tipo_pago,       // 0 = inscripción
                    'pago_bdv_id_estudiante' => $id_estudiante,
                    'pago_bdv_uc'            => $total_uc,
                    'pago_bdv_concepto'      => $concepto,
                    'pago_bdv_id_solicitud'  => null
                ));
                
                log_message('debug', 'iniciar(): datos guardados en sesión. Ref=' . $referencia);
                
                redirect($response->urlPayment);
                
            } else {
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
    // INICIAR PAGO aranceles de trámites administrativos
    // ================================================================
    public function iniciar_tramite_adm() {
        $id_usuario = $this->session->userdata('id');
        $periodo    = $this->Periodo_model->PeriodoActivo();
        $tramite    = $this->input->post('tramite');
        $total_uc   = 0;
        
        if (!$periodo) {
            $this->session->set_flashdata('error', 'No hay período académico activo.');
            redirect(base_url() . 'dashboard09/index/2');
        }
        if (!$tramite) {
            $this->session->set_flashdata('error', 'No hay trámite académico activo.');
            redirect(base_url() . 'dashboard09/index/2');
        }
        
        // ✅ Obtener el ID de la solicitud ANTES de validar
        $id_solicitud_tramite = $this->input->post('solicitud');
        if (!$id_solicitud_tramite) {
            $this->session->set_flashdata('error', 'No se identificó la solicitud del trámite.');
            redirect(base_url() . 'dashboard09/index/2');
        }
        
        // ✅ Validar que no tenga pago registrado para ESTA solicitud
        if ($this->Solictudtramite_model->getListaSolTramites($id_usuario, $id_solicitud_tramite)) {
            $this->session->set_flashdata('warning', 'Ya tiene un pago registrado para este trámite.');
            $this->redirigir_por_tramite($tramite);
            return;
        }
        
        // Obtener datos del estudiante
        $alumno = $this->Alumno_model->getListaAlumno($id_usuario);
        if (!$alumno || empty($alumno->id)) {
            $this->session->set_flashdata('error', 'No se encontraron datos del estudiante.');
            redirect(base_url() . 'dashboard09/index/2');
        }
        $id_estudiante = $alumno->id;
        
        // Obtener el total a pagar
        $total_final = $this->input->post('total_final');
        if ($total_final <= 0) {
            $this->session->set_flashdata('error', 'El monto a pagar debe ser mayor a 0.');
            redirect(base_url() . 'dashboard09/index/2');
        }

        log_message('debug', 'iniciar_tramite_adm(): total=' . $total_final . ' | id_solicitud=' . $id_solicitud_tramite);

        $concepto  = $this->obtener_nombre_tramite($tramite);
        $tipo_pago = 1;
        
        try {
            $PaymentProcess = new IpgBdv2($this->bdv_afiliado, $this->bdv_clave);
            
            $referencia = 'REFTRA' . $id_usuario . '_' . date('YmdHis');
            
            $Payment = new IpgBdvPaymentRequest();
            $Payment->idLetter    = $alumno->nacionalidad ?: 'V';
            $Payment->idNumber    = '32873615';
            $Payment->amount      = (float) $total_final;
            $Payment->currency    = 1;
            $Payment->reference   = $referencia;
            $Payment->title       = 'Pago Aranceles tramites administtrativos';
            $Payment->description = 'Pago de aranceles tramites administrativos - Período ' . $periodo->nombre;
            $Payment->email       = 'tecnologia@enf.edu.ve';
            $Payment->cellphone   = (string) $alumno->tel_celular;
            $Payment->urlToReturn = base_url() . 'pagos/confirmacion?ref=' . $referencia . '&token={ID}';
            $Payment->rifLetter   = '';
            $Payment->rifNumber   = '';
            
            log_message('debug', '=== BDV iniciar_tramite_adm() Payment ===' . print_r(array(
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
            
            $response = $PaymentProcess->createPayment($Payment);
            
            log_message('debug', '=== BDV iniciar_tramite_adm() Response ===' . print_r($response, true));
            
            if ($response->success == true) {
                // ✅ SOLO guardar en sesión
                $this->session->set_userdata(array(
                    'pago_bdv_token'         => $response->paymentId,
                    'pago_bdv_monto'         => $total_final,
                    'pago_bdv_referencia'    => $referencia,
                    'pago_bdv_periodo'       => $periodo->id,
                    'pago_bdv_tipo'          => $tipo_pago,       // 1 = trámite
                    'pago_bdv_id_estudiante' => $id_estudiante,
                    'pago_bdv_uc'            => $total_uc,
                    'pago_bdv_concepto'      => $concepto,
                    'pago_bdv_id_solicitud'  => $id_solicitud_tramite
                ));
                
                log_message('debug', 'iniciar_tramite_adm(): datos guardados en sesión. Ref=' . $referencia);
                
                redirect($response->urlPayment);
                
            } else {
                log_message('error', 'Error BDV - Código: ' . $response->responseCode . ' - Mensaje: ' . $response->responseMessage);
                $this->session->set_flashdata('error', 'No se pudo iniciar el pago: ' . $response->responseMessage);
                $this->redirigir_por_tramite($tramite);
                return;
            }
            
        } catch (Exception $e) {
            log_message('error', 'Excepción en pago BDV: ' . $e->getMessage());
            $this->session->set_flashdata('error', 'Error al procesar el pago. Intente nuevamente más tarde.');
            $this->redirigir_por_tramite($tramite);
            return;
        }
    }

    // ================================================================
    // CONFIRMACIÓN DE PAGO BDV (callback)
    // ================================================================
    public function confirmacion() {
        $id_usuario = $this->session->userdata('id');
        $referencia = $this->input->get('ref');
        
        // Token: URL (?token= o ?ID=) o sesión
        $paymentToken = $this->input->get('token');
        if (empty($paymentToken)) {
            $paymentToken = $this->input->get('ID');
        }
        if (empty($paymentToken)) {
            $paymentToken = $this->session->userdata('pago_bdv_token');
        }
        
        log_message('debug', '=== BDV confirmacion() ===');
        log_message('debug', 'GET: ' . print_r($this->input->get(), true));
        log_message('debug', 'Token: ' . ($paymentToken ?: 'NULL') . ' | Ref: ' . ($referencia ?: 'NULL'));
        
        // ✅ 1. Recuperar datos de sesión
        $id_periodo_sesion    = $this->session->userdata('pago_bdv_periodo');
        $tipo_pago_sesion     = $this->session->userdata('pago_bdv_tipo');
        $id_estudiante_sesion = $this->session->userdata('pago_bdv_id_estudiante');
        $total_uc_sesion      = $this->session->userdata('pago_bdv_uc');
        $concepto_sesion      = $this->session->userdata('pago_bdv_concepto');
        $id_solicitud_sesion  = $this->session->userdata('pago_bdv_id_solicitud');
        $monto_sesion         = $this->session->userdata('pago_bdv_monto');
        
        // ✅ 2. Buscar registro existente
        $registro = null;
        if (!empty($referencia)) {
            $registro = $this->Registro_pago_model->get_pago_pendiente_por_referencia($referencia);
            if ($registro && empty($paymentToken)) {
                $paymentToken = $registro->token_bdv;
                log_message('debug', 'Token recuperado de BD: ' . $paymentToken);
            }
        }
        
        // ✅ 3. Determinar tipo_pago e id_periodo
        $tipo_pago  = $registro ? (int)$registro->tramite : (int)$tipo_pago_sesion;
        $id_periodo = $registro ? $registro->id_periodo    : $id_periodo_sesion;
        
        // ✅ 4. Si no hay token, no podemos consultar BDV
        if (empty($paymentToken)) {
            $this->session->set_flashdata('error', 'No se pudo identificar el pago.');
            $this->limpiar_sesion_pago();
            
            if ($tipo_pago == 1) {
                $id_sol = ($registro && $registro->id_solicitud_tramite) ? $registro->id_solicitud_tramite : $id_solicitud_sesion;
                if (!empty($id_sol)) {
                    $this->redirigir_por_tramite($tramite);
                    return;
                }
            }
            redirect(base_url() . 'dashboard04/proceso');
            return;
        }
        
        // ================================================================
        // CONSULTAR BDV
        // ================================================================
        try {
            $PaymentProcess = new IpgBdv2($this->bdv_afiliado, $this->bdv_clave);
            $response = $PaymentProcess->checkPayment($paymentToken);
            
            log_message('debug', 'BDV checkPayment: ' . print_r($response, true));
            log_message('debug', '>>> status=' . var_export(isset($response->status) ? $response->status : 'NULL', true));
            
            // ============================================================
            // PAGO EXITOSO
            // ============================================================
            if ($response->success == true && (int)$response->status === 1) {
                
                // ✅ Validar id_periodo
                if (empty($id_periodo)) {
                    log_message('error', 'confirmacion: sin id_periodo. Ref=' . $referencia);
                    $this->session->set_flashdata('error', 'No se pudo determinar el período del pago.');
                    $this->limpiar_sesion_pago();
                    $this->mostrar_vista_diagnostico($registro, $id_solicitud_sesion, $tipo_pago, $response, $referencia, $id_usuario, 'Sin id_periodo');
                    return;
                }
                
                // ✅ PASO 1: Si NO existe registro, CREARLO
                if (!$registro) {
                    log_message('debug', 'confirmacion: no existe registro. Creando uno nuevo. Ref=' . $referencia);
                    
                    $registrado = $this->registrar_pago_pendiente(
                        $id_solicitud_sesion,
                        $id_usuario,
                        $id_periodo,
                        $response,
                        $monto_sesion,
                        $total_uc_sesion,
                        $referencia,
                        $id_estudiante_sesion,
                        $tipo_pago_sesion,
                        $concepto_sesion
                    );
                    
                    log_message('debug', 'confirmacion: registrar_pago_pendiente result=' . var_export($registrado, true));
                    
                    if (!$registrado) {
                        log_message('error', 'confirmacion: falló crear registro. Ref=' . $referencia);
                        $this->session->set_flashdata('error', 'No se pudo registrar el pago. Contacte a soporte.');
                        $this->limpiar_sesion_pago();
                        $this->mostrar_vista_diagnostico(null, $id_solicitud_sesion, $tipo_pago, $response, $referencia, $id_usuario, 'Fallo al crear registro');
                        return;
                    }
                    
                    // Recuperar el registro recién creado
                    $registro = $this->Registro_pago_model->get_pago_pendiente_por_referencia($referencia);
                    
                    if (!$registro) {
                        log_message('error', 'confirmacion: registro creado pero no recuperable. Ref=' . $referencia);
                        $this->session->set_flashdata('error', 'No se pudo recuperar el registro. Contacte a soporte.');
                        $this->limpiar_sesion_pago();
                        $this->mostrar_vista_diagnostico(null, $id_solicitud_sesion, $tipo_pago, $response, $referencia, $id_usuario, 'Registro creado pero no recuperable');
                        return;
                    }
                    
                    log_message('debug', 'confirmacion: registro creado. ID=' . $registro->id);
                }
                
                // ✅ PASO 2: Actualizar el registro a exitoso (ahora SÍ existe)
                    $id_solicitud_actual = ($registro && $registro->id_solicitud_tramite) 
                    ? $registro->id_solicitud_tramite 
                    : $id_solicitud_sesion;

                    $actualizado = $this->actualizar_pago_exitoso(
                    $id_usuario, 
                    $id_periodo, 
                    $response, 
                    $paymentToken, 
                    $referencia,
                    $id_solicitud_actual,
                    $tipo_pago
                    );
                
                log_message('debug', 'confirmacion: actualizar_pago_exitoso result=' . var_export($actualizado, true));
                
                if (!$actualizado) {
                    log_message('error', 'confirmacion: falló actualizar pago. Ref=' . $referencia);
                    $this->session->set_flashdata('error', 'El pago fue verificado pero no se pudo actualizar. Contacte a soporte.');
                    $this->limpiar_sesion_pago();
                    $this->mostrar_vista_diagnostico($registro, $id_solicitud_sesion, $tipo_pago, $response, $referencia, $id_usuario, 'Fallo al actualizar registro');
                    return;
                }
                
                // ✅ PASO 3: Actualizar materias si es inscripción
                if ($tipo_pago == 0) {
                    $this->actualizar_materias_pagadas($id_usuario, $id_periodo);
                }
                if ($tipo_pago == 1) {
                   
                    $this->actualizar_tramites($id_solicitud_sesion,$id_usuario);
                }
                
                // ✅ PASO 4: Limpiar sesión
                $this->limpiar_sesion_pago();
                $this->session->set_flashdata('success', '¡Pago confirmado exitosamente!');
                
                // ✅ PASO 5: Mostrar vista
                $data = array(
                    'response'    => $response,
                    'id_usuario'  => $id_usuario,
                    'referencia'  => $referencia,
                    'exitoso'     => true,
                    'actualizado' => true,
                    'mensaje'     => 'Pago completado exitosamente.'
                );
                
                if ($tipo_pago == 1) {
                    $id_sol = ($registro && $registro->id_solicitud_tramite) ? $registro->id_solicitud_tramite : $id_solicitud_sesion;
                    $data['url_continuar'] = $this->url_por_tramite($id_sol);
                    $this->load->view('participante/tramites/pago_bdv_resultado_tramite', $data);
                    return;
                }
                
                $data['url_continuar'] = base_url() . 'dashboard04/proceso';
                $this->load->view('participante/inscripcion/pago_bdv_resultado', $data);
                return;
            }
            
            // ============================================================
            // PAGO NO EXITOSO / PENDIENTE / ERROR
            // ============================================================
            if ($response->success == true && (int)$response->status !== 1) {
                $this->session->set_flashdata('warning', 'El pago no fue completado. Estado: ' . $response->responseMessage);
            } else {
                $this->session->set_flashdata('error', 'Error al verificar el pago: ' . $response->responseMessage);
            }
            
            $this->limpiar_sesion_pago();
            
            if ($tipo_pago == 1) {
                $id_sol = ($registro && $registro->id_solicitud_tramite) ? $registro->id_solicitud_tramite : $id_solicitud_sesion;
                if (!empty($id_sol)) {
                    $this->redirigir_por_tramite($tramite);
                    return;
                }
            }
            
            redirect(base_url() . 'dashboard04/registro_pago/' . $id_usuario);
            return;
            
        } catch (Exception $e) {
            log_message('error', 'Excepción confirmacion: ' . $e->getMessage()
                . ' en ' . $e->getFile() . ':' . $e->getLine());
            $this->session->set_flashdata('error', 'Error al verificar el pago. Contacte a soporte.');
            $this->limpiar_sesion_pago();
            
            if ($tipo_pago == 1) {
                $id_sol = ($registro && $registro->id_solicitud_tramite) ? $registro->id_solicitud_tramite : $id_solicitud_sesion;
                if (!empty($id_sol)) {
                    $this->redirigir_por_tramite($tramite);
                    return;
                }
            }
            
            redirect(base_url() . 'dashboard04/registro_pago/' . $id_usuario);
        }
    }

    // ================================================================
    // ===================== FUNCIONES COMUNES ========================
    // ================================================================

    // ================================================================
    // VERIFICAR ESTADO (AJAX)
    // ================================================================
    public function verificar_estado() {
        $this->output->set_content_type('application/json');
        
        $id_usuario = $this->session->userdata('id');
        $token      = $this->session->userdata('pago_bdv_token');
        $referencia = $this->session->userdata('pago_bdv_referencia');
        
        if (empty($token)) {
            echo json_encode(array(
                'estado'  => 'no_pagado',
                'mensaje' => 'No hay pago en proceso'
            ));
            return;
        }
        
        $registro = null;
        if (!empty($referencia)) {
            $registro = $this->Registro_pago_model->get_pago_pendiente_por_referencia($referencia);
        }
        
        try {
            $PaymentProcess = new IpgBdv2($this->bdv_afiliado, $this->bdv_clave);
            $response = $PaymentProcess->checkPayment($token);
            
            $tipo_pago = $registro ? (int)$registro->tramite : (int)$this->session->userdata('pago_bdv_tipo');
            $id_sol    = $registro ? $registro->id_solicitud_tramite : $this->session->userdata('pago_bdv_id_solicitud');
            
            $url_destino = base_url() . 'dashboard04/proceso';
            if ($tipo_pago == 1 && !empty($id_sol)) {
                $url_destino = $this->url_por_tramite($id_sol);
            }
            
            if ($response->success == true && $response->status == 1) {
                echo json_encode(array(
                    'estado'      => 'pagado',
                    'mensaje'     => 'Pago confirmado exitosamente',
                    'tramite'     => $tipo_pago,
                    'url_destino' => $url_destino,
                    'response'    => $response
                ));
            } elseif ($response->success == true) {
                echo json_encode(array(
                    'estado'      => 'pendiente',
                    'mensaje'     => 'Pago en proceso de verificación',
                    'tramite'     => $tipo_pago,
                    'url_destino' => $url_destino,
                    'response'    => $response
                ));
            } else {
                echo json_encode(array(
                    'estado'      => 'error',
                    'mensaje'     => $response->responseMessage,
                    'tramite'     => $tipo_pago,
                    'url_destino' => $url_destino
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
        $id_usuario = $this->session->userdata('id');
        $referencia = $this->session->userdata('pago_bdv_referencia');
        $tipo_pago  = (int)$this->session->userdata('pago_bdv_tipo');
        $id_sol_ses = $this->session->userdata('pago_bdv_id_solicitud');
        
        // Recuperar el registro antes de limpiar la sesión (si existe)
        $registro = null;
        if (!empty($referencia)) {
            $registro = $this->Registro_pago_model->get_pago_pendiente_por_referencia($referencia);
        }
        
        $this->limpiar_sesion_pago();
        
        $this->session->set_flashdata('info', 'Has cancelado el proceso de pago.');
        
        // ✅ Si era trámite, redirigir según tipo
        if ($tipo_pago == 1) {
            $id_sol = ($registro && $registro->id_solicitud_tramite) ? $registro->id_solicitud_tramite : $id_sol_ses;
            if (!empty($id_sol)) {
                $this->redirigir_por_tramite($tramite);
                return;
            }
        }
        
        // ✅ Inscripción → flujo normal con mensaje intermedio
        $this->session->set_flashdata('redirect_url', base_url() . 'dashboard04/registro_pago/' . $id_usuario);
        $this->session->set_flashdata('tipo', 'info');
        redirect(base_url() . 'pagos/mensaje');
    }

    /**
     * Página intermedia que muestra la alerta y luego redirige
     */
    public function mensaje() {
        $this->load->view('participante/inscripcion/mensaje_alerta');
    }

    // ================================================================
    // ==================== FUNCIONES AUXILIARES ======================
    // ================================================================

    /**
     * Registra el pago como pendiente en la base de datos.
     * ⚠️ IMPORTANTE: Este método solo se llama cuando el pago es EXITOSO en BDV.
     * 
     * Revisar que el nombre 'id_solicitud_tramite' coincida con la columna real
     * de tu tabla (verificar con DESCRIBE registro_pago;).
     */
    private function registrar_pago_pendiente($id_solicitud_tramite, $id_usuario, $id_periodo, $response, $total_final, $total_uc, $referencia, $id_estudiante, $tipo_pago, $concepto) {

        if (empty($id_estudiante)) {
            $id_estudiante = $id_usuario;
        }
    
        $token_bdv = '';
        if (!empty($response->paymentId)) {
            $token_bdv = $response->paymentId;
        } elseif (!empty($response->token)) {
            $token_bdv = $response->token;
        } else {
            $token_bdv = $this->session->userdata('pago_bdv_token');
        }
    
        $data = array(
            'id_usuario'           => (int) $id_usuario,
            'id_periodo'           => (int) $id_periodo,
            'id_estado_estudio'    => 24,
            'monto_apagar'         => (string) $total_final,
            'monto_depositado'     => (string) $total_final,
            'nro_referencia'       => $referencia,
            'fecha_transferencia'  => date('Y-m-d'),
            'uc'                   => (string) $total_uc,
            'status'               => '0',
            'aspirante'            => '0',
            'conciliado'           => 0,
            'quien_registro'       => (int) $id_usuario,
            'id_banco'             => 1,
            'cedula'               => substr((string) $this->session->userdata('username'), 0, 10),
            'id_estudiante'        => (int) $id_estudiante,
            'postgrado'            => 'SOLICITUD DE TRAMITE '.substr((string) $concepto, 0, 100),
            'token_bdv'            => substr((string) $token_bdv, 0, 100),
            'transaction_id_bdv'   => '',
            'metodo_pago'          => 'bdv',
            'tramite'              => (int) $tipo_pago,
            'id_solicitud_tramite' => !empty($id_solicitud_tramite) ? (int) $id_solicitud_tramite : null,
        );
    
        log_message('debug', 'registrar_pago_pendiente DATA: ' . print_r($data, true));
    
        // ✅ SIEMPRE INSERTAR (Escenario 1: solo crear cuando el pago es exitoso)
        $result = $this->Registro_pago_model->save($data);
    
        log_message('debug', 'registrar_pago_pendiente result: ' . var_export($result, true));
    
        // ✅ Verificación real post-insert
        $existe = $this->Registro_pago_model->get_pago_pendiente_por_referencia($referencia);
        log_message('debug', 'registrar_pago_pendiente verificación post-insert: ' . ($existe ? 'ENCONTRADO id=' . $existe->id : 'NO ENCONTRADO'));
    
        return $existe ? true : false;
    }

   /**
 * Actualiza el pago a exitoso (fecha y transaction_id corregidos).
 * Para trámites, aplica la lógica de conciliación + revisión académica
 * según el tipo de solicitud.
 */
private function actualizar_pago_exitoso($id_usuario, $id_periodo, $response, $token = null, $referencia = null, $id_solicitud = null, $tipo_pago = 0) {
    
    $fecha = date('Y-m-d H:i:s');
    $fecha_transferencia = $fecha;
    if (!empty($response->paymentDate)) {
        $dt = DateTime::createFromFormat('d/m/Y H:i:s', $response->paymentDate);
        if ($dt === false) {
            $timestamp = strtotime($response->paymentDate);
            if ($timestamp !== false && $timestamp > 0) {
                $fecha_transferencia = date('Y-m-d H:i:s', $timestamp);
            }
        } else {
            $fecha_transferencia = $dt->format('Y-m-d H:i:s');
        }
    }
    
    $transaction_id = '';
    if (!empty($response->transactionId)) {
        $transaction_id = $response->transactionId;
    } elseif (!empty($response->token)) {
        $transaction_id = $response->token;
    } elseif (!empty($token)) {
        $transaction_id = $token;
    }
    
    // ================================================================
    // CASO 1: TRÁMITE ADMINISTRATIVO (tipo_pago == 1)
    // ================================================================
    if ($tipo_pago == 1 && !empty($id_solicitud)) {
        
        // Obtener la solicitud para conocer el id_tramite
        $solicitud = $this->Solictudtramite_model->getSolicitud($id_solicitud);
        
        if (!$solicitud) {
            log_message('error', 'actualizar_pago_exitoso: no se encontró solicitud ' . $id_solicitud);
            return false;
        }
        
        $tramites = array(18,16,23,25,28,20,38,39,40,41,42,44,45,46,56,57,58,59,60,62,63,64,43,61);
        
        // Determinar si requiere revisión académica o no
        if (in_array((int)$solicitud->id_tramite, $tramites)) {
            // Requiere revisión académica posterior (academico=0)
            $data = array(
                'transaction_id_bdv'  => $transaction_id,
                'fecha_transferencia' => $fecha_transferencia,
                'metodo_pago'         => 'bdv',
                'conciliado'          => 1,
                'academico'           => 0,
                'status'              => 1,
                'dactualizo'          => $fecha,
                'quien_actualizo'     => $id_usuario,
            );
            $data2 = array(
                'reg_pago'      => 1,
                'rev_academica' => 0,
                'fecha_actualizacion' => $fecha,
                'quien_actualizo'     => $id_usuario
            );
        } else {
            // No requiere revisión académica (academico=1)
            $data = array(
                'transaction_id_bdv'  => $transaction_id,
                'fecha_transferencia' => $fecha_transferencia,
                'metodo_pago'         => 'bdv',
                'conciliado'          => 1,
                'academico'           => 1,
                'status'              => 1,
                'dactualizo'          => $fecha,
                'quien_actualizo'     => $id_usuario,
            );
            $data2 = array(
                'reg_pago'      => 1,
                'rev_academica'       => 1,
                'fecha_actualizacion' => $fecha,
                'quien_actualizo'     => $id_usuario,
            );
        }
        
        log_message('debug', 'actualizar_pago_exitoso (trámite) DATA: ' . print_r($data, true));
        
        // Actualizar el registro de pago del trámite
        $ok_pago = $this->Registro_pago_model->save_conciliacion_error_tramite($id_solicitud, $data);
        log_message('debug', 'save_conciliacion_error_tramite result: ' . var_export($ok_pago, true));
        
        if (!$ok_pago) {
            return false;
        }
        
        // Actualizar la solicitud del trámite
        $ok_sol = $this->Solictudtramite_model->update($id_solicitud, $data2);
        log_message('debug', 'Solictudtramite_model->update result: ' . var_export($ok_sol, true));
        
        return true;
    }
    
    // ================================================================
    // CASO 2: INSCRIPCIÓN (tipo_pago == 0)
    // ================================================================
    $data = array(
        'transaction_id_bdv'  => $transaction_id,
        'fecha_transferencia' => $fecha_transferencia,
        'quien_actualizo'     => $id_usuario,
        'metodo_pago'         => 'bdv',
        'conciliado'          => 1,
        'status'              => 1,
    );
    
    log_message('debug', 'actualizar_pago_exitoso (inscripción) DATA: ' . print_r($data, true));
    
    // PRIORIDAD 1: por referencia
    if (!empty($referencia)) {
        log_message('debug', 'update_by_referencia: buscando ref=' . $referencia);
        $result = $this->Registro_pago_model->update_by_referencia($referencia, $data);
        log_message('debug', 'update_by_referencia result: ' . var_export($result, true));
        if ($result) {
            return true;
        }
        log_message('debug', '⚠️ update_by_referencia no encontró registro. Intentando por token...');
    }
    
    // PRIORIDAD 2: por token
    $token_busqueda = '';
    if (!empty($response->token)) {
        $token_busqueda = $response->token;
    } elseif (!empty($token)) {
        $token_busqueda = $token;
    } else {
        $token_busqueda = $this->session->userdata('pago_bdv_token');
    }
    
    if (!empty($token_busqueda)) {
        log_message('debug', 'update_by_token: buscando token=' . $token_busqueda);
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
            'reg_pago'            => 1,
            'quien_actualizo'     => $id_usuario,
            'fecha_actualizacion' => date('Y-m-d H:i:s')
        );
        
        $result = $this->Materias_preinscrita_model->update_materia_estatus($id_usuario, $id_periodo, $data);
        log_message('debug', 'actualizar_materias_pagadas result: ' . var_export($result, true));
        
        return $result;
    }
 /**
     * Actualiza el estado de las materias a pagadas
     */
    private function actualizar_tramites($id_sol,$id_usuario) {
    
        $data = array(
            'reg_pago'            => 1,
            'quien_actualizo'     => $id_usuario,
            'fecha_actualizacion' => date('Y-m-d H:i:s')
        );
        
        $result = $this->Solictudtramite_model->update($id_sol, $data);
        log_message('debug', 'actualizar_tramites result: ' . var_export($result, true));
        
        return $result;
    }
    /**
     * Obtiene el nombre del postgrado
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
     * Obtiene el nombre del trámite
     */
    /**
 * Obtiene el nombre del trámite
 * Soporta tanto objeto fila (row()) como array de filas (result())
 */
private function obtener_nombre_tramite($tramite) {
    $nombre_tramite = $this->Tramites_model->getTramites($tramite);
    
    if (empty($nombre_tramite)) {
        return 'Trámite Administrativo FENFMP';
    }
    
    // ✅ Caso 1: es un solo objeto (row())
    if (is_object($nombre_tramite)) {
        if (isset($nombre_tramite->nombre) && !empty($nombre_tramite->nombre)) {
            return $nombre_tramite->nombre;
        }
        return 'Trámite Administrativo FENFMP';
    }
    
    // ✅ Caso 2: es un array de objetos (result())
    if (is_array($nombre_tramite)) {
        $nombres = array();
        foreach ($nombre_tramite as $t) {
            if (isset($t->nombre) && !empty($t->nombre)) {
                $nombres[] = $t->nombre;
            }
        }
        $nombres = array_unique($nombres);
        if (!empty($nombres)) {
            return implode(', ', $nombres);
        }
    }
    
    return 'Trámite Administrativo FENFMP';
}

    /**
     * Limpia TODOS los datos de pago de la sesión
     */
    private function limpiar_sesion_pago() {
        $this->session->unset_userdata(array(
            'pago_bdv_token',
            'pago_bdv_monto',
            'pago_bdv_referencia',
            'pago_bdv_periodo',
            'pago_bdv_tipo',
            'pago_bdv_id_estudiante',
            'pago_bdv_uc',
            'pago_bdv_concepto',
            'pago_bdv_id_solicitud'
        ));
    }

    /**
     * Muestra la vista con diagnóstico cuando el pago fue verificado
     * pero no se pudo crear/actualizar el registro en BD.
     */
    private function mostrar_vista_diagnostico($registro, $id_solicitud_sesion, $tipo_pago, $response, $referencia, $id_usuario, $motivo = '') {
        
        $diagnostico = array(
            'referencia'   => $referencia,
            'token_bdv'    => isset($response->token) ? $response->token : null,
            'id_usuario'   => $id_usuario,
            'tramite'      => $tipo_pago,
            'id_solicitud' => $registro ? $registro->id_solicitud_tramite : $id_solicitud_sesion,
            'status_bdv'   => isset($response->status) ? $response->status : null,
            'transaction'  => isset($response->transactionId) ? $response->transactionId : null,
            'fecha_bdv'    => isset($response->paymentDate) ? $response->paymentDate : null,
            'motivo'       => $motivo ?: 'El pago fue verificado con BDV pero no se pudo registrar en la base de datos.'
        );
        
        $data = array(
            'response'    => $response,
            'id_usuario'  => $id_usuario,
            'referencia'  => $referencia,
            'exitoso'     => false,
            'actualizado' => false,
            'mensaje'     => 'El pago fue verificado con el banco, pero no se pudo guardar en el sistema. Contacte a soporte con los siguientes datos:',
            'diagnostico' => $diagnostico
        );
        
        if ($tipo_pago == 1) {
            $id_sol = ($registro && $registro->id_solicitud_tramite) ? $registro->id_solicitud_tramite : $id_solicitud_sesion;
            $data['url_continuar'] = $this->url_por_tramite($id_sol);
            $this->load->view('participante/tramites/pago_bdv_resultado_tramite', $data);
            return;
        }
        
        $data['url_continuar'] = base_url() . 'dashboard04/registro_pago/' . $id_usuario;
        $this->load->view('participante/inscripcion/pago_bdv_resultado', $data);
    }

    /**
     * Devuelve la URL destino según el tipo de trámite administrativo.
     */
    private function url_por_tramite($id_solicitud_tramite) {
        $sol = $this->Solictudtramite_model->getSolicitud($id_solicitud_tramite);
        
        if (!$sol) {
            log_message('error', 'url_por_tramite: no se encontró la solicitud ' . $id_solicitud_tramite);
            return base_url() . 'dashboard09/index/2';
        }
        
        $tipo_solicitud = (int) $sol->id_tramite;
        
        switch ($tipo_solicitud) {
            case 16:
                return base_url() . 'dashboard09/solicitud_reincorporacion/2';
            case 17:
            case 19:
                return base_url() . 'dashboard09/solicitud_ruc/2';
            case 18:
                return base_url() . 'dashboard09/solicitud_egreso/2';
            case 28:
                return base_url() . 'dashboard09/solicitud_ruc_requisitos/2';            
            default:
                return base_url() . 'dashboard09/index/2';
        }
    }

    /**
     * Redirige según el tipo de solicitud de trámite administrativo.
     */
    private function redirigir_por_tramite($id_solicitud_tramite) {
        redirect($this->url_por_tramite($id_solicitud_tramite));
        return;
    }
}