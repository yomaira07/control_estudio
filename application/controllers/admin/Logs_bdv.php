<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logs_bdv extends CI_Controller {

    public function __construct() {
        parent::__construct();

        // Verificar sesión
        if (!$this->session->userdata('login')) {
            redirect(base_url());
            return;
        }

        // Validar rol = 1
        $rol = (int) $this->session->userdata('rol');
        if ($rol !== 1) {
            $this->session->set_flashdata('error', 'No tiene permisos para acceder a este módulo.');
            redirect(base_url());
            return;
        }

        $this->load->model('Logs_pago_bdv_model');
        $this->load->helper('url');
        $this->load->library('pagination');
    }

    /**
     * Carga las vistas con el layout (header + sidebar + vista + footer)
     */
    private function render($vista, $data = array()) {
        $this->load->view('layouts/header');
        $this->load->view('layouts/sidebar');
        $this->load->view($vista, $data);
        $this->load->view('layouts/footer');
    }

    // ================================================================
    // LISTADO PRINCIPAL
    // ================================================================
    public function index() {
        $filtros = array(
            'id_usuario' => $this->input->get('id_usuario'),
            'token'      => $this->input->get('token'),
            'accion'     => $this->input->get('accion'),
            'metodo'     => $this->input->get('metodo'),
            'fecha_ini'  => $this->input->get('fecha_ini'),
            'fecha_fin'  => $this->input->get('fecha_fin'),
            'busqueda'   => $this->input->get('busqueda'),
        );

        $per_page = 25;
        $offset   = (int) $this->input->get('per_page');
        $total    = $this->Logs_pago_bdv_model->count_paginado($filtros);

        $config = array(
            'base_url'              => base_url() . 'admin/logs_bdv/index',
            'total_rows'            => $total,
            'per_page'              => $per_page,
            'page_query_string'     => true,
            'query_string_segment'  => 'per_page',
            'reuse_query_string'    => true,
            'full_tag_open'         => '<ul class="pagination pagination-sm mb-0">',
            'full_tag_close'        => '</ul>',
            'num_tag_open'          => '<li class="page-item">',
            'num_tag_close'         => '</li>',
            'cur_tag_open'          => '<li class="page-item active"><a class="page-link" href="#">',
            'cur_tag_close'         => '</a></li>',
            'next_tag_open'         => '<li class="page-item">',
            'next_tag_close'        => '</li>',
            'prev_tag_open'         => '<li class="page-item">',
            'prev_tag_close'        => '</li>',
            'first_tag_open'        => '<li class="page-item">',
            'first_tag_close'       => '</li>',
            'last_tag_open'         => '<li class="page-item">',
            'last_tag_close'        => '</li>',
            'next_link'             => '&raquo;',
            'prev_link'             => '&laquo;',
            'first_link'            => '&laquo;&laquo;',
            'last_link'             => '&raquo;&raquo;',
            'attributes'            => array('class' => 'page-link'),
        );
        $this->pagination->initialize($config);

        $data = array(
            'logs'         => $this->Logs_pago_bdv_model->get_paginado($filtros, $per_page, $offset),
            'total'        => $total,
            'filtros'      => $filtros,
            'paginacion'   => $this->pagination->create_links(),
            'estadisticas' => $this->Logs_pago_bdv_model->get_estadisticas(),
            'acciones'     => $this->Logs_pago_bdv_model->get_acciones_distintas(),
        );

        $this->render('admin/logs_bdv/index', $data);
    }

    // ================================================================
    // DETALLE
    // ================================================================
    public function detalle($id = null) {
        if (empty($id) || !is_numeric($id)) {
            $this->session->set_flashdata('error', 'ID de log no especificado.');
            redirect(base_url('admin/logs_bdv'));
            return;
        }

        $log = $this->Logs_pago_bdv_model->get_by_id($id);
        if (!$log) {
            $this->session->set_flashdata('error', 'Log no encontrado.');
            redirect(base_url('admin/logs_bdv'));
            return;
        }

        $data = array(
            'log'             => $log,
            'request_pretty'  => $this->pretty_json($log->request),
            'response_pretty' => $this->pretty_json($log->response),
        );

        $this->render('admin/logs_bdv/detalle', $data);
    }

    // ================================================================
    // LOGS POR USUARIO
    // ================================================================
    public function usuario($id_usuario = null) {
        if (empty($id_usuario) || !is_numeric($id_usuario)) {
            $this->session->set_flashdata('error', 'ID de usuario no especificado.');
            redirect(base_url('admin/logs_bdv'));
            return;
        }

        $data = array(
            'id_usuario' => (int) $id_usuario,
            'logs'       => $this->Logs_pago_bdv_model->get_by_usuario($id_usuario, 200),
        );

        $this->render('admin/logs_bdv/usuario', $data);
    }

    // ================================================================
    // TRAZABILIDAD POR TOKEN
    // ================================================================
    public function token($token = null) {
        if (empty($token)) {
            $this->session->set_flashdata('error', 'Token no especificado.');
            redirect(base_url('admin/logs_bdv'));
            return;
        }

        $data = array(
            'token' => $token,
            'logs'  => $this->Logs_pago_bdv_model->get_by_token($token),
        );

        $this->render('admin/logs_bdv/token', $data);
    }

    // ================================================================
    // LIMPIAR
    // ================================================================
    public function limpiar() {
        if ($this->input->method() !== 'post') {
            show_error('Método no permitido', 405);
            return;
        }

        $dias = (int) $this->input->post('dias');
        if ($dias < 1) $dias = 90;

        $fecha_limite = date('Y-m-d H:i:s', strtotime('-' . $dias . ' days'));
        $eliminados   = $this->Logs_pago_bdv_model->limpiar_antiguos($fecha_limite);

        log_message('info', 'Logs_bdv: limpieza por usuario '
            . $this->session->userdata('id') . ' - Eliminados: ' . $eliminados);

        $this->session->set_flashdata('success', 'Se eliminaron ' . $eliminados . ' logs anteriores a ' . $fecha_limite);
        redirect(base_url('admin/logs_bdv'));
    }

    // ================================================================
    // EXPORTAR CSV
    // ================================================================
    public function exportar() {
        $filtros = array(
            'id_usuario' => $this->input->get('id_usuario'),
            'token'      => $this->input->get('token'),
            'accion'     => $this->input->get('accion'),
            'metodo'     => $this->input->get('metodo'),
            'fecha_ini'  => $this->input->get('fecha_ini'),
            'fecha_fin'  => $this->input->get('fecha_fin'),
            'busqueda'   => $this->input->get('busqueda'),
        );

        $logs = $this->Logs_pago_bdv_model->get_paginado($filtros, 5000, 0);

        $filename = 'logs_bdv_' . date('Ymd_His') . '.csv';
        header('Content-Type: text/csv; charset=utf-8');
        header('Content-Disposition: attachment; filename="' . $filename . '"');
        header('Pragma: no-cache');
        header('Expires: 0');

        $output = fopen('php://output', 'w');
        fprintf($output, chr(0xEF) . chr(0xBB) . chr(0xBF));

        fputcsv($output, array('ID', 'ID Usuario', 'Token', 'Método', 'Acción', 'Request', 'Response', 'Fecha'), ';');

        foreach ($logs as $log) {
            fputcsv($output, array(
                $log->id, $log->id_usuario, $log->token, $log->metodo, $log->accion,
                $this->limpiar_para_csv($log->request),
                $this->limpiar_para_csv($log->response),
                $log->fecha,
            ), ';');
        }

        fclose($output);
        exit;
    }

    // ================================================================
    // HELPERS
    // ================================================================
    private function pretty_json($str) {
        if (empty($str)) return '';
        $decoded = json_decode($str, true);
        if (json_last_error() === JSON_ERROR_NONE) {
            return json_encode($decoded, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
        }
        return $str;
    }

    private function limpiar_para_csv($str) {
        if (empty($str)) return '';
        return preg_replace('/\s+/', ' ', substr($str, 0, 1000));
    }
}