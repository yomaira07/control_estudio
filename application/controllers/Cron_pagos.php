<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Cron_bdv
 *
 * Controlador para ejecutar tareas automáticas relacionadas con la pasarela BDV.
 *
 * Tareas disponibles:
 *   - verificar_pendientes  → Revisa pagos pendientes y los confirma si ya están pagados.
 *   - liberar_bloqueados    → Libera pagos que quedaron en "procesando" (por si un CRON murió).
 *   - resumen               → Devuelve un resumen de pagos pendientes (monitoreo).
 *   - limpiar_logs          → Limpia logs antiguos (opcional).
 *
 * SEGURIDAD:
 *   Requiere un token válido:
 *     - Por URL:  ?token=XXXX
 *     - Por CLI:  php index.php cron_bdv verificar_pendientes XXXX
 *
 * CONFIGURACIÓN DE CRON (ejemplo cada 5 minutos):
 *   * /5 * * * * curl -s "https://tusitio.com/cron_bdv/verificar_pendientes?token=TU_TOKEN" >> /var/log/cron_bdv.log 2>&1
 *   * /15 * * * * curl -s "https://tusitio.com/cron_bdv/liberar_bloqueados?token=TU_TOKEN" >> /var/log/cron_bdv.log 2>&1
 */
class Cron_bdv extends CI_Controller {

    private $bdv_afiliado;
    private $bdv_clave;
    private $cron_token;
    private $max_intentos = 3;
    private $lote         = 20;

    public function __construct() {
        parent::__construct();

        // Modelos
        $this->load->model('Registro_pago_model');
        $this->load->model('Materias_preinscrita_model');
        $this->load->model('Periodo_model');
        $this->load->model('Logs_pago_bdv_model');
        $this->load->model('Solictudtramite_model');

        // Librería BDV
        require_once(APPPATH . 'libraries/ipg2-bdv.php');

        // Credenciales
        $this->bdv_afiliado = $this->config->item('bdv_afiliado');
        $this->bdv_clave    = $this->config->item('bdv_clave');

        // Token del CRON
        $this->cron_token = $this->config->item('cron_token');
        if (empty($this->cron_token)) {
            $this->cron_token = getenv('CRON_TOKEN') ?: 'CAMBIA_ESTE_TOKEN_URGENTE';
        }

        $this->output->set_content_type('application/json');
    }

    // ================================================================
    // VERIFICAR PAGOS PENDIENTES
    // ================================================================
    public function verificar_pendientes($token_cli = null) {

        if (!$this->_validar_token($token_cli)) {
            return $this->_json_response(array('ok' => false, 'mensaje' => 'Acceso denegado'), 403);
        }

        $inicio = microtime(true);

        $periodo = $this->Periodo_model->PeriodoActivo();
        if (!$periodo) {
            return $this->_json_response(array('ok' => false, 'mensaje' => 'No hay período académico activo'));
        }

        $pagos_pendientes = $this->Registro_pago_model->get_pagos_bdv_pendientes_cron($this->lote, $this->max_intentos);

        if (empty($pagos_pendientes)) {
            return $this->_json_response(array(
                'ok'         => true,
                'mensaje'    => 'No hay pagos pendientes por verificar',
                'procesados' => 0,
                'total'      => 0,
                'duracion'   => round(microtime(true) - $inicio, 3)
            ));
        }

        $procesados  = 0;
        $confirmados = 0;
        $errores     = 0;
        $detalles    = array();

        foreach ($pagos_pendientes as $pago) {

            $this->_marcar_procesando($pago->id);

            try {
                $PaymentProcess = new IpgBdv2($this->bdv_afiliado, $this->bdv_clave);
                $response       = $PaymentProcess->checkPayment($pago->token_bdv);

                $this->_log_bdv(
                    'cron_checkPayment',
                    $pago->token_bdv,
                    array('id_pago' => $pago->id, 'id_usuario' => $pago->id_usuario),
                    $response,
                    $pago->id_usuario
                );

                if (!$response || !isset($response->success) || $response->success !== true) {
                    $this->_liberar_procesando($pago->id);
                    $this->_incrementar_intentos($pago->id);
                    $errores++;
                    $detalles[] = array(
                        'id'        => $pago->id,
                        'resultado' => 'error_bdv',
                        'mensaje'   => isset($response->responseMessage) ? $response->responseMessage : 'Sin respuesta'
                    );
                    continue;
                }

                $status = isset($response->status) ? (int) $response->status : null;

                if ($status === 1) {
                    $ok = $this->_confirmar_pago($pago, $response, $periodo);

                    if ($ok) {
                        $confirmados++;
                        $detalles[] = array('id' => $pago->id, 'resultado' => 'confirmado');
                    } else {
                        $this->_liberar_procesando($pago->id);
                        $this->_incrementar_intentos($pago->id);
                        $errores++;
                        $detalles[] = array('id' => $pago->id, 'resultado' => 'error_local');
                    }
                    $procesados++;
                    continue;
                }

                $this->_liberar_procesando($pago->id);
                $this->_incrementar_intentos($pago->id);

                $detalles[] = array(
                    'id'        => $pago->id,
                    'resultado' => 'pendiente',
                    'status'    => $status,
                    'mensaje'   => isset($response->responseMessage) ? $response->responseMessage : ''
                );
                $procesados++;

            } catch (Exception $e) {
                log_message('error', 'Cron_bdv::verificar_pendientes - Excepción pago ID ' . $pago->id . ': ' . $e->getMessage());

                $this->_liberar_procesando($pago->id);
                $this->_incrementar_intentos($pago->id);
                $errores++;

                $this->_log_bdv(
                    'cron_exception',
                    $pago->token_bdv,
                    array('id_pago' => $pago->id),
                    array('error' => $e->getMessage(), 'file' => $e->getFile(), 'line' => $e->getLine()),
                    $pago->id_usuario
                );

                $detalles[] = array(
                    'id'        => $pago->id,
                    'resultado' => 'exception',
                    'mensaje'   => $e->getMessage()
                );
            }
        }

        $duracion = round(microtime(true) - $inicio, 3);

        log_message('info', "Cron_bdv::verificar_pendientes - procesados={$procesados} confirmados={$confirmados} errores={$errores} duracion={$duracion}s");

        return $this->_json_response(array(
            'ok'          => true,
            'mensaje'     => 'CRON ejecutado',
            'total'       => count($pagos_pendientes),
            'procesados'  => $procesados,
            'confirmados' => $confirmados,
            'errores'     => $errores,
            'duracion'    => $duracion,
            'detalles'    => $detalles
        ));
    }

    // ================================================================
    // LIBERAR BLOQUEADOS
    // ================================================================
    public function liberar_bloqueados($token_cli = null) {
        if (!$this->_validar_token($token_cli)) {
            return $this->_json_response(array('ok' => false, 'mensaje' => 'Acceso denegado'), 403);
        }

        $minutos   = (int) ($this->input->get('minutos') ?: 5);
        $liberados = $this->Registro_pago_model->liberar_pagos_bdv_procesando($minutos);

        return $this->_json_response(array(
            'ok'        => true,
            'liberados' => $liberados,
            'mensaje'   => "Se liberaron {$liberados} pagos bloqueados (> {$minutos} min)"
        ));
    }

    // ================================================================
    // RESUMEN (monitoreo)
    // ================================================================
    public function resumen($token_cli = null) {
        if (!$this->_validar_token($token_cli)) {
            return $this->_json_response(array('ok' => false, 'mensaje' => 'Acceso denegado'), 403);
        }

        $pendientes = $this->Registro_pago_model->count_pagos_bdv_pendientes();
        $procesando = $this->Registro_pago_model->count_pagos_bdv_procesando();
        $bloqueados = $this->Registro_pago_model->count_pagos_bdv_bloqueados(5);

        return $this->_json_response(array(
            'ok'         => true,
            'pendientes' => $pendientes,
            'procesando' => $procesando,
            'bloqueados' => $bloqueados,
            'fecha'      => date('Y-m-d H:i:s')
        ));
    }

    // ================================================================
    // LIMPIAR LOGS ANTIGUOS
    // ================================================================
    public function limpiar_logs($token_cli = null) {
        if (!$this->_validar_token($token_cli)) {
            return $this->_json_response(array('ok' => false, 'mensaje' => 'Acceso denegado'), 403);
        }

        $dias = (int) ($this->input->get('dias') ?: 90);
        if ($dias < 1) $dias = 90;

        $fecha_limite = date('Y-m-d H:i:s', strtotime('-' . $dias . ' days'));
        $eliminados   = $this->Logs_pago_bdv_model->limpiar_antiguos($fecha_limite);

        return $this->_json_response(array(
            'ok'         => true,
            'eliminados' => $eliminados,
            'mensaje'    => "Se eliminaron {$eliminados} logs anteriores a {$fecha_limite}"
        ));
    }

    // ================================================================
    // ==================== MÉTODOS PRIVADOS ==========================
    // ================================================================

    /**
     * Confirma un pago (inscripción o trámite) en la BD.
     */
    private function _confirmar_pago($pago, $response, $periodo) {

        $fecha = date('Y-m-d H:i:s');
        $fecha_transferencia = $fecha;

        if (!empty($response->paymentDate)) {
            $ts = strtotime($response->paymentDate);
            if ($ts !== false && $ts > 0) {
                $fecha_transferencia = date('Y-m-d H:i:s', $ts);
            }
        }

        $transaction_id = '';
        if (!empty($response->transactionId)) {
            $transaction_id = $response->transactionId;
        } elseif (!empty($response->token)) {
            $transaction_id = $response->token;
        } else {
            $transaction_id = $pago->token_bdv;
        }

        $tipo_pago    = isset($pago->tramite) ? (int) $pago->tramite : 0;
        $id_solicitud = isset($pago->id_solicitud_tramite) ? (int) $pago->id_solicitud_tramite : null;

        // ---------- TRÁMITE ----------
        if ($tipo_pago === 1 && !empty($id_solicitud)) {

            $solicitud = $this->Solictudtramite_model->getSolicitud($id_solicitud);
            if (!$solicitud) {
                log_message('error', 'Cron_bdv: no se encontró solicitud ' . $id_solicitud);
                return false;
            }

            $data_pago = array(
                'transaction_id_bdv'  => $transaction_id,
                'fecha_transferencia' => $fecha_transferencia,
                'metodo_pago'         => 'bdv',
                'conciliado'          => 1,
                'academico'           => 0,
                'status'              => 1,
                'dactualizo'          => $fecha,
                'quien_actualizo'     => 0,
                'procesando_cron'     => 0
            );

            $data_solicitud = array(
                'reg_pago'            => 1,
                'rev_academica'       => 0,
                'fecha_actualizacion' => $fecha,
                'quien_actualizo'     => 0
            );

            $ok1 = $this->Registro_pago_model->save_conciliacion_error_tramite($id_solicitud, $data_pago);
            if (!$ok1) {
                log_message('error', 'Cron_bdv: falló actualizar pago trámite ID ' . $id_solicitud);
                return false;
            }

            $this->Solictudtramite_model->update($id_solicitud, $data_solicitud);

            log_message('info', "Cron_bdv: pago trámite confirmado. ID solicitud={$id_solicitud} usuario={$pago->id_usuario}");
            return true;
        }

        // ---------- INSCRIPCIÓN ----------
        $data = array(
            'transaction_id_bdv'  => $transaction_id,
            'fecha_transferencia' => $fecha_transferencia,
            'quien_actualizo'     => 0,
            'metodo_pago'         => 'bdv',
            'conciliado'          => 1,
            'status'              => 1,
            'procesando_cron'     => 0
        );

        $ok = $this->Registro_pago_model->update_by_token(
            $pago->id_usuario,
            $periodo->id,
            $pago->token_bdv,
            $data
        );

        if (!$ok) {
            log_message('error', 'Cron_bdv: falló actualizar pago inscripción ID ' . $pago->id);
            return false;
        }

        $this->Materias_preinscrita_model->update_materia_estatus(
            $pago->id_usuario,
            $periodo->id,
            array(
                'reg_pago'            => 1,
                'quien_actualizo'     => 0,
                'fecha_actualizacion' => $fecha
            )
        );

        log_message('info', "Cron_bdv: pago inscripción confirmado. Usuario={$pago->id_usuario} Token={$pago->token_bdv}");
        return true;
    }

    private function _marcar_procesando($id_pago) {
        $this->db->where('id', (int) $id_pago);
        $this->db->update('registro_pago', array('procesando_cron' => 1));
    }

    private function _liberar_procesando($id_pago) {
        $this->db->where('id', (int) $id_pago);
        $this->db->update('registro_pago', array('procesando_cron' => 0));
    }

    private function _incrementar_intentos($id_pago) {
        $this->db->set('intento_cron', 'intento_cron + 1', false);
        $this->db->where('id', (int) $id_pago);
        $this->db->update('registro_pago');
    }

    /**
     * Valida el token del CRON (acepta GET o CLI).
     */
    private function _validar_token($token_cli = null) {
        if ($this->input->is_cli_request()) {
            $token = $token_cli;
        } else {
            $token = $this->input->get('token');
        }

        if (empty($token) || $token !== $this->cron_token) {
            log_message('error', 'Cron_bdv: acceso denegado. Token inválido desde IP ' . $this->input->ip_address());
            return false;
        }
        return true;
    }

    private function _json_response($data, $http_code = 200) {
        // Si es CLI, imprimir bonito
        if ($this->input->is_cli_request()) {
            echo json_encode($data, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) . PHP_EOL;
            return;
        }

        $this->output
            ->set_status_header($http_code)
            ->set_content_type('application/json')
            ->set_output(json_encode($data, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
    }

    private function _log_bdv($accion, $token = null, $request = null, $response = null, $id_usuario = 0) {
        try {
            $this->Logs_pago_bdv_model->save(array(
                'id_usuario' => (int) $id_usuario,
                'token'      => $token,
                'metodo'     => 'bdv',
                'accion'     => $accion,
                'request'    => $request,
                'response'   => $response
            ));
        } catch (Exception $e) {
            log_message('error', 'Cron_bdv: error al registrar log: ' . $e->getMessage());
        }
    }
}