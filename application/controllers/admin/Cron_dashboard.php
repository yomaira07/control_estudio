<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cron_dashboard extends CI_Controller {

    public function __construct() {
        parent::__construct();

        // Sesión activa
        if (!$this->session->userdata('login')) {
            redirect(base_url());
            return;
        }

        // Solo rol 1 (administrador)
        if ((int) $this->session->userdata('rol') !== 1) {
            $this->session->set_flashdata('error', 'No tiene permisos para acceder a este módulo.');
            redirect(base_url());
            return;
        }

        $this->load->model('Registro_pago_model');
        $this->load->model('Logs_pago_bdv_model');
    }

    // ================================================================
    // DASHBOARD PRINCIPAL
    // ================================================================
    public function index() {
        $data = array(
            'stats'          => $this->Registro_pago_model->get_estadisticas_cron(),
            'historial'      => $this->Registro_pago_model->get_historial_cron(15),
            'pagos_bloqueados' => $this->Registro_pago_model->get_pagos_bloqueados(10),
            'serie_7dias'    => $this->Registro_pago_model->get_pagos_por_dia(7)
        );

        $this->load->view('layouts/header');
        $this->load->view('layouts/sidebar');
        $this->load->view('admin/cron_dashboard/index', $data);
        $this->load->view('layouts/footer');
    }

    // ================================================================
    // AJAX: datos para refresco automático
    // ================================================================
    public function stats_ajax() {
        $this->output->set_content_type('application/json');

        echo json_encode(array(
            'ok'    => true,
            'stats' => $this->Registro_pago_model->get_estadisticas_cron(),
            'fecha' => date('Y-m-d H:i:s')
        ));
    }

    // ================================================================
    // EJECUTAR CRON MANUALMENTE
    // ================================================================
    public function ejecutar() {
        $this->load->library('curl');

        $token = $this->config->item('cron_token');
        if (empty($token)) {
            $token = getenv('CRON_TOKEN');
        }

        if (empty($token)) {
            $this->session->set_flashdata('error', 'No hay token de CRON configurado.');
            redirect(base_url('admin/cron_dashboard'));
            return;
        }

        $url      = base_url('cron_bdv/verificar_pendientes') . '?token=' . urlencode($token);
        $response = $this->curl->simple_get($url);

        // Registrar en logs internos
        log_message('info', 'Cron_dashboard: ejecución manual por usuario '
            . $this->session->userdata('id') . ' - Resultado: ' . substr($response, 0, 500));

        // Interpretar JSON
        $json = json_decode($response, true);
        if (is_array($json) && isset($json['ok']) && $json['ok']) {
            $this->session->set_flashdata('success',
                "CRON ejecutado. Procesados: {$json['procesados']} | Confirmados: {$json['confirmados']} | Errores: {$json['errores']} | Duración: {$json['duracion']}s"
            );
        } else {
            $this->session->set_flashdata('error', 'Error al ejecutar CRON: ' . substr($response, 0, 300));
        }

        redirect(base_url('admin/cron_dashboard'));
    }

    // ================================================================
    // LIBERAR BLOQUEADOS
    // ================================================================
    public function liberar_bloqueados() {
        $liberados = $this->Registro_pago_model->liberar_pagos_bdv_procesando(5);

        log_message('info', 'Cron_dashboard: liberar_bloqueados por usuario '
            . $this->session->userdata('id') . ' - Liberados: ' . $liberados);

        $this->session->set_flashdata('success', "Se liberaron {$liberados} pagos bloqueados.");
        redirect(base_url('admin/cron_dashboard'));
    }
    // ================================================================
// AJAX: alertas para el widget del header
// ================================================================
public function alertas_ajax() {
    $this->output->set_content_type('application/json');

    // Estadísticas
    $stats = $this->Registro_pago_model->get_estadisticas_cron();

    // Errores del día (desde logs)
    $errores_hoy = 0;
    if ($this->db->table_exists('logs_pago_bdv')) {
        $errores_hoy = (int) $this->db
            ->group_start()
                ->like('accion', 'exception')
                ->or_like('accion', 'error')
            ->group_end()
            ->where('DATE(fecha)', date('Y-m-d'))
            ->count_all_results('logs_pago_bdv');
    }

    echo json_encode(array(
        'ok'          => true,
        'pendientes'  => (int) $stats['pendientes'],
        'procesando'  => (int) $stats['procesando'],
        'bloqueados'  => (int) $stats['bloqueados'],
        'errores_hoy' => $errores_hoy,
        'hora'        => date('H:i:s')
    ));
}
}