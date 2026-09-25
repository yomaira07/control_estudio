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
        $this->load->model('Usuarios_model');

        $this->load->model("Solictudtramite_model");
        $this->load->model("Tramites_model");
        $this->load->model('Logs_pago_bdv_model'); // ✅ NUEVO
        
        // Cargar librería BDV
        require_once(APPPATH . 'libraries/ipg2-bdv.php');
        $this->load->library('tasa_bcv');
        
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
        $tipo_documento = $this->input->post('tipo_documento');  // V, E, J, G, P
        $cedula_rif     = $this->input->post('cedula_rif');      // Solo números
        $documento_pasarela = $tipo_documento . $cedula_rif;     // Ej: V12345678

        // ✅ VALIDAR cédula/RIF del depositante (NUNCA puede llegar vacía)
        $validacion_doc = $this->validar_documento_depositante($tipo_documento, $cedula_rif);
        if (!$validacion_doc['ok']) {
        log_message('error', 'iniciar(): documento depositante inválido -> ' . $validacion_doc['mensaje']);
        $this->session->set_flashdata('error', $validacion_doc['mensaje']);
        redirect(base_url() . 'dashboard04/registro_pago/' . $id_usuario);
        return;
        }

        // ✅ Documento ya validado y normalizado
        $documento_pasarela = $validacion_doc['documento'];   // Ej: V12345678
        $tipo_documento     = $validacion_doc['tipo'];        // V
        $cedula_rif         = $validacion_doc['numero'];      // 12345678
        
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
        
        // ✅ Obtener datos del estudiante
        $alumno = $this->Alumno_model->getListaAlumno($id_usuario);
        if (!$alumno || empty($alumno->id)) {
            $this->session->set_flashdata('error', 'No se encontraron datos del estudiante.');
            redirect(base_url() . 'dashboard04/home');
        }
        
        // ✅ CORRECCIÓN CLAVE:
        // - $id_estudiante       → ID REAL del alumno (para la FK id_estudiante)
        // - $cedula_depositante  → Cédula/RIF del input (para la columna `cedula`)
        $id_estudiante      = $alumno->id;
        $cedula_depositante = $documento_pasarela;


        
        // Obtener el total a pagar y uc calculados en el form anterior
        $monto_usd = $this->input->post('total_final'); // expresados en dólares americanos
        $total_final = $this->tasa_bcv->calcular_monto_ves($monto_usd);

        if ($total_final <= 0) {
            $this->session->set_flashdata('error', 'El monto a pagar debe ser mayor a 0.');
            redirect(base_url() . 'dashboard04/registro_pago/' . $id_usuario);
        }

        log_message('debug', 'iniciar(): total=' . $total_final . ' | uc=' . $total_uc 
        . ' | id_estudiante=' . $id_estudiante 
        . ' | cedula_depositante=' . $cedula_depositante);


        $concepto  = $this->obtener_nombre_postgrado($id_usuario, $periodo->id);
        $tipo_pago = 0;
        
        try {
            $PaymentProcess = new IpgBdv2($this->bdv_afiliado, $this->bdv_clave);
            
            $referencia = 'REF' . $id_usuario . '_' . date('YmdHis');
            
            $Payment = new IpgBdvPaymentRequest();
            $Payment->idLetter    = $tipo_documento ?: 'V';
            $Payment->idNumber    = $cedula_rif;
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
            
            $request_data = array(
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
            );
            
            log_message('debug', '=== BDV iniciar() Payment ===' . print_r($request_data, true));
            
            $response = $PaymentProcess->createPayment($Payment);
            
            log_message('debug', '=== BDV iniciar() Response ===' . print_r($response, true));
            
            // ✅ NUEVO: Registrar log de la transacción
            $accion_log = (isset($response->success) && $response->success == true) 
                ? 'createPayment_inscripcion_ok' 
                : 'createPayment_inscripcion_error';
            
            $this->log_pago_bdv(
                $accion_log,
                isset($response->paymentId) ? $response->paymentId : null,
                $request_data,
                $response,
                $id_usuario
            );
            
            if ($response->success == true) {
                // ✅ Guardar en sesión. El registro en BD se creará en confirmacion()
                //    ÚNICAMENTE si el pago es exitoso.
                $this->session->set_userdata(array(
                    'pago_bdv_token'         => $response->paymentId,
                    'pago_bdv_monto_usd'     => $monto_usd,  
                    'pago_bdv_monto'         => $total_final,
                    'pago_bdv_referencia'    => $referencia,
                    'pago_bdv_periodo'       => $periodo->id,
                    'pago_bdv_tipo'          => $tipo_pago,       // 0 = inscripción
                    'pago_bdv_id_estudiante' => $id_estudiante,   // ✅ ID REAL del alumno
                    'pago_bdv_cedula'        => $cedula_depositante, // ✅ CÉDULA del input
                    'pago_bdv_uc'            => $total_uc,
                    'pago_bdv_concepto'      => $concepto,
                    'pago_bdv_id_solicitud'  => null
                ));
                
                log_message('debug', 'iniciar(): datos guardados en sesión. Ref=' . $referencia 
                    . ' | id_estudiante=' . $id_estudiante 
                    . ' | cedula=' . $cedula_depositante);
                
                redirect($response->urlPayment);
                
            } else {
                log_message('error', 'Error BDV - Código: ' . $response->responseCode . ' - Mensaje: ' . $response->responseMessage);
                $this->session->set_flashdata('error', 'No se pudo iniciar el pago: ' . $response->responseMessage);
                redirect(base_url() . 'dashboard04/registro_pago/' . $id_usuario);
            }
            
        } catch (Exception $e) {
            log_message('error', 'Excepción en pago BDV: ' . $e->getMessage());
            
            // ✅ Registrar excepción en log BDV
            $this->log_pago_bdv(
                'exception_createPayment_inscripcion',
                null,
                array('total_final' => isset($total_final) ? $total_final : null),
                array(
                    'error' => $e->getMessage(),
                    'file'  => $e->getFile(),
                    'line'  => $e->getLine()
                ),
                $id_usuario
            );
            
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
        $tipo_documento = $this->input->post('tipo_documento');  // V, E, J, G, P
        $cedula_rif     = $this->input->post('cedula_rif');      // Solo números
        $documento_pasarela = $tipo_documento . $cedula_rif;     // Ej: V12345678

        // ✅ VALIDAR cédula/RIF del depositante (NUNCA puede llegar vacía)
        $validacion_doc = $this->validar_documento_depositante($tipo_documento, $cedula_rif);
        if (!$validacion_doc['ok']) {
        log_message('error', 'iniciar_tramite_adm(): documento depositante inválido -> ' . $validacion_doc['mensaje']);
        $this->session->set_flashdata('error', $validacion_doc['mensaje']);
        redirect(base_url() . 'dashboard09/index/2');
        return;
        }

        // ✅ Documento ya validado y normalizado
        $documento_pasarela = $validacion_doc['documento'];
        $tipo_documento     = $validacion_doc['tipo'];
        $cedula_rif         = $validacion_doc['numero'];
        
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
        
        // ✅ CORRECCIÓN CLAVE (igual que en iniciar):
        $id_estudiante      = $alumno->id;              // ✅ ID REAL para FK
        $cedula_depositante = $documento_pasarela;      // ✅ Cédula del input

        
        // Obtener el total a pagar
        $monto_usdt = $this->input->post('total_final'); // expresados en dólares americanos
        $total_final = $this->tasa_bcv->calcular_monto_ves($monto_usdt);

        log_message('debug', 'iniciar_tramite_adm(): total=' . $total_final 
        . ' | id_solicitud=' . $id_solicitud_tramite
        . ' | id_estudiante=' . $id_estudiante
        . ' | cedula_depositante=' . $cedula_depositante);

        if ($total_final <= 0) {
            $this->session->set_flashdata('error', 'El monto a pagar debe ser mayor a 0.');
            redirect(base_url() . 'dashboard09/index/2');
        }

        log_message('debug', 'iniciar_tramite_adm(): total=' . $total_final 
            . ' | id_solicitud=' . $id_solicitud_tramite
            . ' | id_estudiante=' . $id_estudiante
            . ' | cedula_depositante=' . $cedula_depositante);

        $concepto  = $this->obtener_nombre_tramite($tramite);
        $tipo_pago = 1;
        
        try {
            $PaymentProcess = new IpgBdv2($this->bdv_afiliado, $this->bdv_clave);
            
            $referencia = 'REFTRA' . $id_usuario . '_' . date('YmdHis');
            
            $Payment = new IpgBdvPaymentRequest();
            $Payment->idLetter    = $tipo_documento ?: 'V';
            $Payment->idNumber    = $cedula_rif;
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
            
            $request_data = array(
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
                'tramite'     => $tramite,
                'id_solicitud'=> $id_solicitud_tramite,
                'monto_usdt'  => $monto_usdt
            );
            
            log_message('debug', '=== BDV iniciar_tramite_adm() Payment ===' . print_r($request_data, true));
            
            $response = $PaymentProcess->createPayment($Payment);
            
            log_message('debug', '=== BDV iniciar_tramite_adm() Response ===' . print_r($response, true));
            
            // ✅ Registrar log de la transacción
            $accion_log = (isset($response->success) && $response->success == true) 
                ? 'createPayment_tramite_ok' 
                : 'createPayment_tramite_error';
            
            $this->log_pago_bdv(
                $accion_log,
                isset($response->paymentId) ? $response->paymentId : null,
                $request_data,
                $response,
                $id_usuario
            );
            
            if ($response->success == true) {
                // ✅ Guardar en sesión (SIN registro en BD todavía)
                $this->session->set_userdata(array(
                    'pago_bdv_token'         => $response->paymentId,
                    'pago_bdv_monto'         => $total_final,
                    'pago_bdv_monto_usd'     => $monto_usdt,  
                    'pago_bdv_referencia'    => $referencia,
                    'pago_bdv_periodo'       => $periodo->id,
                    'pago_bdv_tipo'          => $tipo_pago,       // 1 = trámite
                    'pago_bdv_id_estudiante' => $id_estudiante,   // ✅ ID REAL
                    'pago_bdv_cedula'        => $cedula_depositante, // ✅ CÉDULA del input
                    'pago_bdv_uc'            => $total_uc,
                    'pago_bdv_concepto'      => $concepto,
                    'pago_bdv_id_solicitud'  => $id_solicitud_tramite
                ));
                
                log_message('debug', 'iniciar_tramite_adm(): datos guardados en sesión. Ref=' . $referencia
                    . ' | id_estudiante=' . $id_estudiante
                    . ' | cedula=' . $cedula_depositante);
                
                redirect($response->urlPayment);
                
            } else {
                log_message('error', 'Error BDV - Código: ' . $response->responseCode . ' - Mensaje: ' . $response->responseMessage);
                $this->session->set_flashdata('error', 'No se pudo iniciar el pago: ' . $response->responseMessage);
                $this->redirigir_por_tramite($tramite);
                return;
            }
            
        } catch (Exception $e) {
            log_message('error', 'Excepción en pago BDV: ' . $e->getMessage());
            
            // ✅ Registrar excepción en log BDV
            $this->log_pago_bdv(
                'exception_createPayment_tramite',
                null,
                array(
                    'tramite'      => isset($tramite) ? $tramite : null,
                    'id_solicitud' => isset($id_solicitud_tramite) ? $id_solicitud_tramite : null,
                    'total_final'  => isset($total_final) ? $total_final : null,
                    'monto_usdt'   => isset($monto_usdt) ? $monto_usdt : null
                ),
                array(
                    'error' => $e->getMessage(),
                    'file'  => $e->getFile(),
                    'line'  => $e->getLine()
                ),
                $id_usuario
            );
            
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
    $paymentToken = $this->input->get('token');
    if (empty($paymentToken)) $paymentToken = $this->input->get('ID');
    if (empty($paymentToken)) $paymentToken = $this->session->userdata('pago_bdv_token');
    
    log_message('debug', '=== BDV confirmacion() ===');
    log_message('debug', 'GET: ' . print_r($this->input->get(), true));
    log_message('debug', 'Token: ' . ($paymentToken ?: 'NULL') . ' | Ref: ' . ($referencia ?: 'NULL'));
    
    // ✅ 1. Recuperar datos de sesión
    $id_periodo_sesion    = $this->session->userdata('pago_bdv_periodo');
    $tipo_pago_sesion     = $this->session->userdata('pago_bdv_tipo');
    $id_estudiante_sesion = $this->session->userdata('pago_bdv_id_estudiante');
    $cedula_sesion        = $this->session->userdata('pago_bdv_cedula');
    $total_uc_sesion      = $this->session->userdata('pago_bdv_uc');
    $concepto_sesion      = $this->session->userdata('pago_bdv_concepto');
    $id_solicitud_sesion  = $this->session->userdata('pago_bdv_id_solicitud');
    $monto_sesion         = $this->session->userdata('pago_bdv_monto');
    $monto_usd_sesion     = $this->session->userdata('pago_bdv_monto_usd');
    
    // ✅ 2. Buscar registro existente por referencia
    $registro = null;
    if (!empty($referencia)) {
        $registro = $this->Registro_pago_model->get_pago_pendiente_por_referencia($referencia);
        if ($registro && empty($paymentToken)) {
            $paymentToken = $registro->token_bdv;
            log_message('debug', 'Token recuperado de BD: ' . $paymentToken);
        }
    }
    
    // ✅ 3. Determinar tipo_pago, id_periodo e id_solicitud (CLAVE PARA REDIRIGIR)
    $tipo_pago    = $registro ? (int)$registro->tramite : (int)$tipo_pago_sesion;
    $id_periodo   = $registro ? $registro->id_periodo    : $id_periodo_sesion;
    $id_solicitud = ($registro && $registro->id_solicitud_tramite) 
        ? $registro->id_solicitud_tramite 
        : $id_solicitud_sesion;
    
    log_message('debug', 'confirmacion: tipo_pago=' . $tipo_pago 
        . ' | id_periodo=' . $id_periodo 
        . ' | id_solicitud=' . $id_solicitud);
    
    // ✅ 4. Si no hay token, no podemos consultar BDV
    if (empty($paymentToken)) {
        $this->session->set_flashdata('error', 'No se pudo identificar el pago.');
        $this->limpiar_sesion_pago();
        
        if ($tipo_pago == 1 && !empty($id_solicitud)) {
            $this->redirigir_por_tramite($id_solicitud);
            return;
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
        
        // ✅ Registrar log de la verificación
        $accion_log = 'checkPayment_confirmacion_error';
        if (isset($response->success) && $response->success == true && isset($response->status)) {
            $accion_log = ((int)$response->status === 1) 
                ? 'checkPayment_confirmacion_exitoso' 
                : 'checkPayment_confirmacion_pendiente';
        }
        
        $this->log_pago_bdv(
            $accion_log,
            $paymentToken,
            array(
                'referencia'   => $referencia,
                'id_periodo'   => $id_periodo,
                'tipo_pago'    => $tipo_pago,
                'id_solicitud' => $id_solicitud,
            ),
            $response,
            $id_usuario
        );
        
        // ============================================================
        // PAGO EXITOSO
        // ============================================================
        if ($response->success == true && (int)$response->status === 1) {
            
            if (empty($id_periodo)) {
                log_message('error', 'confirmacion: sin id_periodo. Ref=' . $referencia);
                $this->session->set_flashdata('error', 'No se pudo determinar el período del pago.');
                $this->limpiar_sesion_pago();
                $this->mostrar_vista_diagnostico($registro, $id_solicitud, $tipo_pago, $response, $referencia, $id_usuario, 'Sin id_periodo');
                return;
            }
            
            // ✅ PASO 1: Si NO existe registro, CREARLO
            if (!$registro) {
                log_message('debug', 'confirmacion: no existe registro. Creando uno nuevo. Ref=' . $referencia);
                
                if (empty($cedula_sesion)) {
                    log_message('error', 'confirmacion: cedula_sesion vacía. Ref=' . $referencia);
                    $this->session->set_flashdata('error', 'No se pudo identificar la cédula del depositante.');
                    $this->limpiar_sesion_pago();
                    $this->mostrar_vista_diagnostico(null, $id_solicitud, $tipo_pago, $response, $referencia, $id_usuario, 'Cédula vacía');
                    return;
                }
                
                $registrado = $this->registrar_pago_pendiente(
                    $id_solicitud,
                    $id_usuario,
                    $id_periodo,
                    $response,
                    $monto_sesion,
                    $total_uc_sesion,
                    $referencia,
                    $id_estudiante_sesion,
                    $tipo_pago_sesion,
                    $concepto_sesion,
                    $monto_usd_sesion,
                    $cedula_sesion
                );
                
                if (!$registrado) {
                    log_message('error', 'confirmacion: falló crear registro. Ref=' . $referencia);
                    $this->session->set_flashdata('error', 'No se pudo registrar el pago. Contacte a soporte.');
                    $this->limpiar_sesion_pago();
                    $this->mostrar_vista_diagnostico(null, $id_solicitud, $tipo_pago, $response, $referencia, $id_usuario, 'Fallo al crear registro');
                    return;
                }
                
                $registro = $this->Registro_pago_model->get_pago_pendiente_por_referencia($referencia);
                
                if (!$registro) {
                    $this->session->set_flashdata('error', 'No se pudo recuperar el registro.');
                    $this->limpiar_sesion_pago();
                    $this->mostrar_vista_diagnostico(null, $id_solicitud, $tipo_pago, $response, $referencia, $id_usuario, 'Registro no recuperable');
                    return;
                }
                
                // ✅ Si el registro recién creado tiene id_solicitud_tramite, usarlo
                if (!empty($registro->id_solicitud_tramite)) {
                    $id_solicitud = $registro->id_solicitud_tramite;
                }
            }
            
            // ✅ PASO 2: Actualizar el registro a exitoso
            $id_solicitud_actual = ($registro && $registro->id_solicitud_tramite) 
                ? $registro->id_solicitud_tramite 
                : $id_solicitud;
            
            $actualizado = $this->actualizar_pago_exitoso(
                $id_usuario, 
                $id_periodo, 
                $response, 
                $paymentToken, 
                $referencia,
                $id_solicitud_actual,
                $tipo_pago
            );
            
            if (!$actualizado) {
                log_message('error', 'confirmacion: falló actualizar pago. Ref=' . $referencia);
                $this->session->set_flashdata('error', 'El pago fue verificado pero no se pudo actualizar.');
                $this->limpiar_sesion_pago();
                $this->mostrar_vista_diagnostico($registro, $id_solicitud, $tipo_pago, $response, $referencia, $id_usuario, 'Fallo al actualizar');
                return;
            }
            
            // ✅ PASO 3: Actualizar materias o trámites
            if ($tipo_pago == 0) {
                $this->actualizar_materias_pagadas($id_usuario, $id_periodo);
            }
            if ($tipo_pago == 1 && !empty($id_solicitud_actual)) {
                $this->actualizar_tramites($id_solicitud_actual, $id_usuario);
            }
            
            // ✅ PASO 4: Limpiar sesión
            $this->limpiar_sesion_pago();
            $this->session->set_flashdata('success', '¡Pago confirmado exitosamente!');
            
            // ✅ PASO 5: Redirigir según tipo de trámite
            $data = array(
                'response'    => $response,
                'id_usuario'  => $id_usuario,
                'referencia'  => $referencia,
                'exitoso'     => true,
                'actualizado' => true,
                'mensaje'     => 'Pago completado exitosamente.'
            );
            
            if ($tipo_pago == 1 && !empty($id_solicitud_actual)) {
                $data['url_continuar'] = $this->url_por_tramite($id_solicitud_actual);
                $this->load->view('participante/tramites/pago_bdv_resultado_tramite', $data);
                return;
            }
            
            $data['url_continuar'] = base_url() . 'dashboard04/proceso';
            $this->load->view('participante/inscripcion/pago_bdv_resultado', $data);
            return;
        }
        
        // ============================================================
        // PAGO NO EXITOSO / PENDIENTE
        // ============================================================
        if ($response->success == true && (int)$response->status !== 1) {
            $this->session->set_flashdata('warning', 'El pago no fue completado. Estado: ' . $response->responseMessage);
        } else {
            $this->session->set_flashdata('error', 'Error al verificar el pago: ' . $response->responseMessage);
        }
        
        $this->limpiar_sesion_pago();
        
        if ($tipo_pago == 1 && !empty($id_solicitud)) {
            $this->redirigir_por_tramite($id_solicitud);
            return;
        }
        
        redirect(base_url() . 'dashboard04/registro_pago/' . $id_usuario);
        return;
        
    } catch (Exception $e) {
        log_message('error', 'Excepción confirmacion: ' . $e->getMessage()
            . ' en ' . $e->getFile() . ':' . $e->getLine());
        
        $this->log_pago_bdv(
            'exception_checkPayment_confirmacion',
            isset($paymentToken) ? $paymentToken : null,
            array('referencia' => isset($referencia) ? $referencia : null),
            array('error' => $e->getMessage(), 'file' => $e->getFile(), 'line' => $e->getLine()),
            $id_usuario
        );
        
        $this->session->set_flashdata('error', 'Error al verificar el pago. Contacte a soporte.');
        $this->limpiar_sesion_pago();
        
        if ($tipo_pago == 1 && !empty($id_solicitud)) {
            $this->redirigir_por_tramite($id_solicitud);
            return;
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
            
            // ✅ Registrar log de la verificación AJAX
            $accion_log = 'checkPayment_ajax_error';
            if (isset($response->success) && $response->success == true) {
                $accion_log = ((int)$response->status === 1) 
                    ? 'checkPayment_ajax_exitoso' 
                    : 'checkPayment_ajax_pendiente';
            }
            
            $this->log_pago_bdv(
                $accion_log,
                $token,
                array('referencia' => $referencia),
                $response,
                $id_usuario
            );
            
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
            
            // ✅ Registrar excepción en log BDV
            $this->log_pago_bdv(
                'exception_checkPayment_ajax',
                isset($token) ? $token : null,
                array('referencia' => isset($referencia) ? $referencia : null),
                array(
                    'error' => $e->getMessage(),
                    'file'  => $e->getFile(),
                    'line'  => $e->getLine()
                ),
                $id_usuario
            );
            
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
        
        // ✅ Registrar cancelación
        $this->log_pago_bdv(
            'cancelacion_usuario',
            $this->session->userdata('pago_bdv_token'),
            array(
                'referencia' => $referencia,
                'tipo_pago'  => $tipo_pago
            ),
            array('mensaje' => 'Usuario canceló el proceso de pago'),
            $id_usuario
        );
        
        $this->limpiar_sesion_pago();
        
        $this->session->set_flashdata('info', 'Has cancelado el proceso de pago.');
        
        // ✅ Si era trámite, redirigir según tipo
        if ($tipo_pago == 1) {
            $id_sol = ($registro && $registro->id_solicitud_tramite) ? $registro->id_solicitud_tramite : $id_sol_ses;
            if (!empty($id_sol)) {
                $this->redirigir_por_tramite($id_sol);
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
     * ✅ Registra un log de la transacción con la pasarela BDV.
     *
     * @param string      $accion     Acción realizada
     * @param string|null $token      Token/paymentId de BDV
     * @param mixed       $request    Datos enviados a BDV
     * @param mixed       $response   Respuesta recibida de BDV
     * @param int|null    $id_usuario ID del usuario
     * @return bool
     */
    private function log_pago_bdv($accion, $token = null, $request = null, $response = null, $id_usuario = null) {
        
        // Resolver id_usuario (la columna es NOT NULL)
        if (empty($id_usuario)) {
            $id_usuario = (int) $this->session->userdata('id');
        }
        if (empty($id_usuario)) {
            $id_usuario = 0;
        }
        
        // Normalizar token
        if (is_array($token) && isset($token['paymentId'])) {
            $token = $token['paymentId'];
        }
        $token = !empty($token) ? substr((string) $token, 0, 100) : null;
        
        $data = array(
            'id_usuario' => (int) $id_usuario,
            'token'      => $token,
            'metodo'     => 'bdv',
            'accion'     => substr((string) $accion, 0, 50),
            'request'    => $this->normalizar_dato_log($request),
            'response'   => $this->normalizar_dato_log($response),
        );
        
        $result = $this->Logs_pago_bdv_model->save($data);
        
        if ($result === false) {
            log_message('error', 'log_pago_bdv: fallo al insertar log. Acción=' . $accion);
            return false;
        }
        
        log_message('debug', 'log_pago_bdv: insertado id=' . $result . ' | Acción=' . $accion . ' | Token=' . $token);
        return true;
    }

    /**
     * ✅ Normaliza cualquier dato (array, objeto, string) a un string para el log.
     */
    private function normalizar_dato_log($dato) {
        if ($dato === null) {
            return null;
        }
        
        if (is_string($dato)) {
            return $dato;
        }
        
        if (is_object($dato)) {
            $dato = json_decode(json_encode($dato), true);
        }
        
        if (is_array($dato)) {
            return json_encode($dato, JSON_UNESCAPED_UNICODE | JSON_PARTIAL_OUTPUT_ON_ERROR);
        }
        
        return (string) $dato;
    }

    /**
     * Registra el pago como pendiente en la base de datos.
     * ⚠️ Solo se llama cuando el pago es EXITOSO en BDV.
     *
     * @param int|null $id_solicitud_tramite  ID de solicitud (solo trámites)
     * @param int      $id_usuario            ID del usuario logueado
     * @param int      $id_periodo            ID del período
     * @param object   $response              Respuesta de BDV
     * @param float    $total_final           Monto en Bs (monto_depositado)
     * @param int      $total_uc              Unidades de crédito
     * @param string   $referencia            Referencia generada
     * @param int      $id_estudiante         ID REAL del alumno (para FK id_estudiante)
     * @param int      $tipo_pago             0 = inscripción, 1 = trámite
     * @param string   $concepto              Concepto/postgrado
     * @param float    $monto_usdt            Monto en USD (monto_apagar)
     * @param string   $cedula_depositante    Cédula/RIF del input (V12345678)
     * @return bool
     */
    private function registrar_pago_pendiente(
        $id_solicitud_tramite, 
        $id_usuario, 
        $id_periodo, 
        $response, 
        $total_final, 
        $total_uc, 
        $referencia, 
        $id_estudiante,          // ✅ ID REAL del alumno (FK)
        $tipo_pago, 
        $concepto,
        $monto_usdt, 
        $cedula_depositante      // ✅ Cédula/RIF del input
    ) {

        // ✅ Sanear id_estudiante para que NUNCA sea 0 (la FK lo rechazaría)
        $id_estudiante = (int) $id_estudiante;
        if (empty($id_estudiante)) {
            log_message('error', 'registrar_pago_pendiente: id_estudiante vacío. Usando id_usuario como fallback.');
            $id_estudiante = (int) $id_usuario;
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
            'monto_apagar'         => (string) $monto_usdt,
            'monto_depositado'     => (string) $total_final,
            'nro_referencia'       => $referencia,
            'fecha_transferencia'  => date('Y-m-d'),
            'uc'                   => (string) $total_uc,
            'status'               => '0',
            'aspirante'            => '0',
            'conciliado'           => 0,
            'quien_registro'       => (int) $id_usuario,
            'id_banco'             => 1,
            'cedula'               => substr((string) $cedula_depositante, 0, 10), // ✅ CÉDULA DEL DEPOSITANTE
            'id_estudiante'        => $id_estudiante,                               // ✅ ID REAL (FK válida)
            'postgrado'            => (string) $concepto,
            'token_bdv'            => substr((string) $token_bdv, 0, 100),
            'transaction_id_bdv'   => '',
            'metodo_pago'          => 'bdv',
            'tramite'              => (int) $tipo_pago,
            'id_solicitud_tramite' => !empty($id_solicitud_tramite) ? (int) $id_solicitud_tramite : null,
        );
    
        log_message('debug', 'registrar_pago_pendiente DATA: ' . print_r($data, true));
    
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
            
            $solicitud = $this->Solictudtramite_model->getSolicitud($id_solicitud);
            
            if (!$solicitud) {
                log_message('error', 'actualizar_pago_exitoso: no se encontró solicitud ' . $id_solicitud);
                return false;
            }
            
            $tramites = array(18,16,23,25,28,20,38,39,40,41,42,44,45,46,56,57,58,59,60,62,63,64,43,61);
            
            if (in_array((int)$solicitud->id_tramite, $tramites)) {
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
                    'reg_pago'            => 1,
                    'rev_academica'       => 1,
                    'fecha_actualizacion' => $fecha,
                    'quien_actualizo'     => $id_usuario,
                );
            }
            
            log_message('debug', 'actualizar_pago_exitoso (trámite) DATA: ' . print_r($data, true));
            
            $ok_pago = $this->Registro_pago_model->save_conciliacion_error_tramite($id_solicitud, $data);
            log_message('debug', 'save_conciliacion_error_tramite result: ' . var_export($ok_pago, true));
            
            if (!$ok_pago) {
                return false;
            }
            
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
        
        if (!empty($referencia)) {
            log_message('debug', 'update_by_referencia: buscando ref=' . $referencia);
            $result = $this->Registro_pago_model->update_by_referencia($referencia, $data);
            log_message('debug', 'update_by_referencia result: ' . var_export($result, true));
            if ($result) {
                return true;
            }
            log_message('debug', '⚠️ update_by_referencia no encontró registro. Intentando por token...');
        }
        
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
    private function actualizar_tramites($id_sol, $id_usuario) {
    
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
     * Obtiene el nombre del posgrado incluyendo los conceptos de aranceles
     * que el estudiante está pagando en el período indicado.
     */
    private function obtener_nombre_postgrado($id_usuario, $id_periodo) {
        log_message('debug', '[obtener_nombre_postgrado] INICIO - usuario: ' . $id_usuario
            . ' | periodo: ' . $id_periodo);

        $programas = $this->Materias_preinscrita_model
            ->lista_programas_preinscritas_trimestre($id_usuario, $id_periodo);

        $nombres = array();

        if (!empty($programas) && is_array($programas)) {
            foreach ($programas as $p) {
                $nombre_prog = null;
                if (isset($p->programa) && !empty($p->programa)) {
                    $nombre_prog = $p->programa;
                } elseif (isset($p->nombre_programa) && !empty($p->nombre_programa)) {
                    $nombre_prog = $p->nombre_programa;
                } elseif (isset($p->nombre) && !empty($p->nombre)) {
                    $nombre_prog = $p->nombre;
                }

                if ($nombre_prog !== null) {
                    $uc = isset($p->unidades_creditos) ? $p->unidades_creditos : 0;
                    $trimestre = isset($p->trimestre) ? $p->trimestre : '';
                    $nombres[] = '(uc: ' . $uc . ') ' . $nombre_prog . ' - ' . $trimestre;
                }
            }
            $nombres = array_unique($nombres);
        }

        $conceptos = $this->_obtener_conceptos_aranceles_pago($id_usuario, $id_periodo);

        if (!empty($conceptos)) {
            $nombres[] = 'Conceptos: ' . implode(' + ', $conceptos);
        }

        $resultado = !empty($nombres) ? implode(', ', $nombres) : 'Posgrado FENFMP';

        log_message('info', '[obtener_nombre_postgrado] OK - Resultado: ' . $resultado);

        return $resultado;
    }

    /**
     * Determina qué conceptos de aranceles debe pagar el estudiante.
     */
    private function _obtener_conceptos_aranceles_pago($id_usuario, $id_periodo) {
        log_message('debug', '[_obtener_conceptos_aranceles_pago] INICIO - usuario: ' . $id_usuario
            . ' | periodo: ' . $id_periodo);

        $conceptos = array();

        if ($this->_aplica_arancel_inscripcion($id_usuario, $id_periodo)) {
            $conceptos[] = 'Inscripción';
        }

        if ($this->_aplica_arancel_permanencia($id_usuario, $id_periodo)) {
            $conceptos[] = 'Permanencia';
        }

        if ($this->_aplica_arancel_fuera_lapso($id_usuario, $id_periodo)) {
            $cantidad = $this->_contar_programas_para_fuera_lapso($id_usuario, $id_periodo);

            if ($cantidad > 0) {
                $etiqueta = 'Fuera de Lapso';
                if ($cantidad > 1) {
                    $etiqueta .= ' (x' . $cantidad . ' programas)';
                }
                $conceptos[] = $etiqueta;

                log_message('debug', '[_obtener_conceptos_aranceles_pago] Fuera de Lapso aplica en '
                    . $cantidad . ' programa(s).');
            } else {
                log_message('debug', '[_obtener_conceptos_aranceles_pago] Fuera de Lapso aplica pero sin programas (0).');
            }
        }

        log_message('info', '[_obtener_conceptos_aranceles_pago] FIN - Conceptos: ['
            . implode(', ', $conceptos) . ']');

        return $conceptos;
    }

    /**
     * Determina si aplica el arancel de inscripción.
     */
    private function _aplica_arancel_inscripcion($id_usuario, $id_periodo) {
        log_message('debug', '[_aplica_arancel_inscripcion] Verificando usuario=' . $id_usuario
            . ' | periodo=' . $id_periodo);

        $programas = $this->Materias_preinscrita_model
            ->lista_programas_preinscritas_trimestre($id_usuario, $id_periodo);

        if (empty($programas) || !is_array($programas)) {
            log_message('debug', '[_aplica_arancel_inscripcion] No hay programas preinscritos.');
            return false;
        }

        $total_programas = 0;
        $hay_especial = false;

        foreach ($programas as $p) {
            if (isset($p->id_programa) && $p->id_programa <> 27 && $p->id_programa <> 28) {
                $total_programas++;
            } else {
                $hay_especial = true;
            }
        }

        $aplica = ($total_programas > 0 || $hay_especial);

        log_message('debug', '[_aplica_arancel_inscripcion] Resultado: '
            . ($aplica ? 'SÍ' : 'NO') . ' (programas: ' . $total_programas
            . ' | especiales: ' . ($hay_especial ? 'sí' : 'no') . ')');

        return $aplica;
    }

    /**
     * Determina si aplica el arancel de permanencia.
     */
    private function _aplica_arancel_permanencia($id_usuario, $id_periodo) {
        log_message('debug', '[_aplica_arancel_permanencia] Verificando usuario=' . $id_usuario
            . ' | periodo=' . $id_periodo);

        $reincorporaciones = $this->Reincorporaciones_model
            ->buscar_reincorporacion($id_usuario, $id_periodo);

        $aplica = (!empty($reincorporaciones) && is_array($reincorporaciones));

        $total = is_array($reincorporaciones) ? count($reincorporaciones) : 0;

        log_message('debug', '[_aplica_arancel_permanencia] Resultado: '
            . ($aplica ? 'SÍ' : 'NO') . ' (reincorporaciones: ' . $total . ')');

        return $aplica;
    }

    /**
     * Determina si aplica el arancel fuera de lapso.
     */
    private function _aplica_arancel_fuera_lapso($id_usuario, $id_periodo) {
        log_message('debug', '[_aplica_arancel_fuera_lapso] INICIO - usuario=' . $id_usuario
            . ' | periodo=' . $id_periodo);

        $aplica_por_lapso = false;
        $aplica_por_tiempo = false;

        $lapso = $this->Tiempo_preinscripcion_model->gettiempo_preinscripcion();

        if (!empty($lapso)) {
            log_message('debug', '[_aplica_arancel_fuera_lapso] Lapso encontrado: '
                . print_r($lapso, true));

            $tipo_lapso = null;
            if (isset($lapso->tipo_lapso)) {
                $tipo_lapso = $lapso->tipo_lapso;
            } 

            if ($tipo_lapso !== null && (int) $tipo_lapso === 2) {
                $aplica_por_lapso = true;
                log_message('debug', '[_aplica_arancel_fuera_lapso] Condición 1 cumplida: tipo_lapso = 2');
            } else {
                log_message('debug', '[_aplica_arancel_fuera_lapso] Condición 1 NO cumplida: tipo_lapso = '
                    . var_export($tipo_lapso, true));
            }
        } else {
            log_message('debug', '[_aplica_arancel_fuera_lapso] No se encontró lapso activo para periodo '
                . $id_periodo);
        }

        $usuario = $this->Usuarios_model->buscar_usuario($id_usuario);

        if (!empty($usuario) && isset($usuario->id_tiempo_preinscripcion)) {
            $id_tiempo = (int) $usuario->id_tiempo_preinscripcion;
            log_message('debug', '[_aplica_arancel_fuera_lapso] Usuario id_tiempo_preinscripcion=' . $id_tiempo);

            if ($id_tiempo !== 73) {
                $aplica_por_tiempo = true;
                log_message('debug', '[_aplica_arancel_fuera_lapso] Condición 2 cumplida: id_tiempo_preinscripcion = '
                    . $id_tiempo);
            }
        } else {
            log_message('debug', '[_aplica_arancel_fuera_lapso] Usuario sin id_tiempo_preinscripcion. Usuario='
                . print_r($usuario, true));
        }

        $aplica = ($aplica_por_lapso || $aplica_por_tiempo);

        log_message('info', '[_aplica_arancel_fuera_lapso] FIN - Resultado: '
            . ($aplica ? 'SÍ' : 'NO')
            . ' | por_lapso=' . ($aplica_por_lapso ? 'sí' : 'no')
            . ' | por_tiempo=' . ($aplica_por_tiempo ? 'sí' : 'no'));

        return $aplica;
    }

    /**
     * Cuenta los programas preinscritos del estudiante en el período.
     */
    private function _contar_programas_para_fuera_lapso($id_usuario, $id_periodo) {
        log_message('debug', '[_contar_programas_para_fuera_lapso] INICIO - usuario=' . $id_usuario
            . ' | periodo=' . $id_periodo);

        $programas = $this->Materias_preinscrita_model
            ->lista_programas_preinscritas_trimestre($id_usuario, $id_periodo);

        if (empty($programas) || !is_array($programas)) {
            log_message('debug', '[_contar_programas_para_fuera_lapso] Sin programas.');
            return 0;
        }

        $total = 0;
        foreach ($programas as $p) {
            if (isset($p->id_programa) && $p->id_programa <> 27 && $p->id_programa <> 28) {
                $total++;
            }
        }

        log_message('debug', '[_contar_programas_para_fuera_lapso] Total programas válidos: ' . $total);
        return $total;
    }

    /**
     * Obtiene el nombre del trámite
     */
    private function obtener_nombre_tramite($tramite) {
        $nombre_tramite = $this->Tramites_model->getTramites($tramite);
        
        if (empty($nombre_tramite)) {
            return 'Trámite Administrativo FENFMP';
        }
        
        if (is_object($nombre_tramite)) {
            if (isset($nombre_tramite->nombre) && !empty($nombre_tramite->nombre)) {
                return $nombre_tramite->nombre;
            }
            return 'Trámite Administrativo FENFMP';
        }
        
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
     * Limpia TODOS los datos de pago de la sesión (incluye la nueva cédula)
     */
    private function limpiar_sesion_pago() {
        $this->session->unset_userdata(array(
            'pago_bdv_token',
            'pago_bdv_monto',
            'pago_bdv_monto_usd',   
            'pago_bdv_referencia',
            'pago_bdv_periodo',
            'pago_bdv_tipo',
            'pago_bdv_id_estudiante',
            'pago_bdv_cedula',          // ✅ NUEVO
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
    /**
 * ✅ Valida y sanitiza la cédula/RIF del depositante.
 * 
 * Reglas:
 *  - tipo_documento debe estar entre: V, E, J, G, P
 *  - cedula_rif es obligatoria (no vacía)
 *  - cedula_rif solo contiene dígitos
 *  - cedula_rif tiene entre 6 y 12 dígitos
 *
 * @param string $tipo_documento
 * @param string $cedula_rif
 * @return array ['ok' => bool, 'mensaje' => string, 'documento' => string, 'tipo' => string, 'numero' => string]
 */
private function validar_documento_depositante($tipo_documento, $cedula_rif) {
    
    // Lista blanca de tipos de documento
    $tipos_validos = array('V', 'E', 'J', 'G', 'P');
    
    // ✅ Normalizar entradas
    $tipo_documento = strtoupper(trim((string) $tipo_documento));
    $cedula_rif     = trim((string) $cedula_rif);
    
    // ✅ 1. Validar tipo de documento
    if (empty($tipo_documento)) {
        return array(
            'ok'      => false,
            'mensaje' => 'Debe seleccionar el tipo de documento (V, E, J, G o P).',
            'documento' => '',
            'tipo'    => '',
            'numero'  => ''
        );
    }
    
    if (!in_array($tipo_documento, $tipos_validos, true)) {
        return array(
            'ok'      => false,
            'mensaje' => 'Tipo de documento no válido. Debe ser V, E, J, G o P.',
            'documento' => '',
            'tipo'    => '',
            'numero'  => ''
        );
    }
    
    // ✅ 2. Validar que la cédula/RIF no esté vacía
    if ($cedula_rif === '') {
        return array(
            'ok'      => false,
            'mensaje' => 'La cédula o RIF del depositante es obligatoria.',
            'documento' => '',
            'tipo'    => $tipo_documento,
            'numero'  => ''
        );
    }
    
    // ✅ 3. Validar que solo tenga dígitos
    if (!preg_match('/^[0-9]+$/', $cedula_rif)) {
        return array(
            'ok'      => false,
            'mensaje' => 'La cédula o RIF solo debe contener números, sin guiones ni puntos.',
            'documento' => '',
            'tipo'    => $tipo_documento,
            'numero'  => ''
        );
    }
    
    // ✅ 4. Validar longitud (6 a 12 dígitos)
    $largo = strlen($cedula_rif);
    if ($largo < 6 || $largo > 12) {
        return array(
            'ok'      => false,
            'mensaje' => 'La cédula o RIF debe tener entre 6 y 12 dígitos. Ingresó ' . $largo . '.',
            'documento' => '',
            'tipo'    => $tipo_documento,
            'numero'  => ''
        );
    }
    
    // ✅ 5. Validación adicional: no puede ser todo ceros
    if (preg_match('/^0+$/', $cedula_rif)) {
        return array(
            'ok'      => false,
            'mensaje' => 'La cédula o RIF no puede ser todo ceros.',
            'documento' => '',
            'tipo'    => $tipo_documento,
            'numero'  => ''
        );
    }
    
    // ✅ Todo OK
    return array(
        'ok'        => true,
        'mensaje'   => '',
        'documento' => $tipo_documento . $cedula_rif,  // Ej: V12345678
        'tipo'      => $tipo_documento,
        'numero'    => $cedula_rif
    );
}
}