<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Modelo para el registro y consulta de logs de la pasarela de pago BDV.
 *
 * Tabla: logs_pago_bdv
 * Estructura:
 *   id, id_usuario, token, metodo, accion, request, response, fecha
 */
class Logs_pago_bdv_model extends CI_Model {

    private $tabla = 'logs_pago_bdv';

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    // ================================================================
    // ==================== ESCRITURA (LOG) ===========================
    // ================================================================

    /**
     * Inserta un registro de log.
     *
     * @param array $data Debe contener al menos id_usuario.
     * @return bool|int  ID insertado en caso de éxito, FALSE en caso de error.
     */
    public function save($data) {
        if (empty($data['id_usuario'])) {
            log_message('error', 'Logs_pago_bdv_model::save - id_usuario es obligatorio.');
            return false;
        }

        $data['id_usuario'] = (int) $data['id_usuario'];
        $data['token']      = isset($data['token'])    ? substr((string) $data['token'], 0, 100) : null;
        $data['metodo']     = isset($data['metodo'])   ? substr((string) $data['metodo'], 0, 50)  : 'bdv';
        $data['accion']     = isset($data['accion'])   ? substr((string) $data['accion'], 0, 50)  : null;
        $data['request']    = isset($data['request'])  ? $this->normalizar($data['request'])      : null;
        $data['response']   = isset($data['response']) ? $this->normalizar($data['response'])     : null;

        $insert = $this->db->insert($this->tabla, $data);

        if (!$insert) {
            $error = $this->db->error();
            log_message('error', 'Logs_pago_bdv_model::save - Error BD: ' . $error['message']);
            return false;
        }

        return $this->db->insert_id();
    }

    // ================================================================
    // ==================== LECTURA / CONSULTA ========================
    // ================================================================

    /**
     * Consulta paginada con filtros dinámicos.
     */
    public function get_paginado($filtros = array(), $limit = 25, $offset = 0) {
        $this->_aplicar_filtros($filtros);

        return $this->db
            ->order_by('fecha', 'DESC')
            ->limit((int) $limit, (int) $offset)
            ->get($this->tabla)
            ->result();
    }

    /**
     * Cuenta total de registros con los mismos filtros (para paginación).
     */
    public function count_paginado($filtros = array()) {
        $this->_aplicar_filtros($filtros);
        return (int) $this->db->count_all_results($this->tabla);
    }

    /**
     * Obtiene un log por ID.
     */
    public function get_by_id($id) {
        return $this->db
            ->where('id', (int) $id)
            ->get($this->tabla)
            ->row();
    }

    /**
     * Obtiene todos los logs de un usuario.
     */
    public function get_by_usuario($id_usuario, $limit = 100) {
        return $this->db
            ->where('id_usuario', (int) $id_usuario)
            ->order_by('fecha', 'DESC')
            ->limit((int) $limit)
            ->get($this->tabla)
            ->result();
    }

    /**
     * Obtiene los logs asociados a un token específico.
     */
    public function get_by_token($token) {
        return $this->db
            ->where('token', substr((string) $token, 0, 100))
            ->order_by('fecha', 'ASC')
            ->get($this->tabla)
            ->result();
    }

    /**
     * Obtiene los logs de una acción específica.
     */
    public function get_by_accion($accion, $limit = 100) {
        return $this->db
            ->where('accion', substr((string) $accion, 0, 50))
            ->order_by('fecha', 'DESC')
            ->limit((int) $limit)
            ->get($this->tabla)
            ->result();
    }

    /**
     * Últimos logs de un usuario específico.
     */
    public function get_ultimos_usuario($id_usuario, $limit = 10) {
        return $this->db
            ->where('id_usuario', (int) $id_usuario)
            ->order_by('fecha', 'DESC')
            ->limit((int) $limit)
            ->get($this->tabla)
            ->result();
    }

    /**
     * Estadísticas generales para el dashboard de logs.
     */
    public function get_estadisticas() {
        $stats = array(
            'total'          => 0,
            'hoy'            => 0,
            'exitosos'       => 0,
            'errores'        => 0,
            'excepciones'    => 0,
            'cancelaciones'  => 0,
        );

        $stats['total'] = (int) $this->db->count_all($this->tabla);

        $stats['hoy'] = (int) $this->db
            ->where('DATE(fecha)', date('Y-m-d'))
            ->count_all_results($this->tabla);

        $stats['exitosos'] = (int) $this->db
            ->like('accion', 'exitoso')
            ->count_all_results($this->tabla);

        $stats['errores'] = (int) $this->db
            ->like('accion', 'error')
            ->count_all_results($this->tabla);

        $stats['excepciones'] = (int) $this->db
            ->like('accion', 'exception')
            ->count_all_results($this->tabla);

        $stats['cancelaciones'] = (int) $this->db
            ->like('accion', 'cancelacion')
            ->count_all_results($this->tabla);

        return $stats;
    }

    /**
     * Lista de acciones distintas (para poblar un combo de filtro).
     */
    public function get_acciones_distintas() {
        return $this->db
            ->select('accion')
            ->distinct()
            ->where('accion IS NOT NULL', null, false)
            ->order_by('accion', 'ASC')
            ->get($this->tabla)
            ->result();
    }

    // ================================================================
    // ==================== MANTENIMIENTO =============================
    // ================================================================

    /**
     * Elimina logs anteriores a una fecha dada.
     */
    public function limpiar_antiguos($fecha) {
        $this->db->where('fecha <', $fecha);
        $this->db->delete($this->tabla);
        return $this->db->affected_rows();
    }

    // ================================================================
    // ==================== HELPERS PRIVADOS ==========================
    // ================================================================

    /**
     * Aplica filtros dinámicos al query builder.
     */
    private function _aplicar_filtros($filtros) {
        if (!empty($filtros['id_usuario'])) {
            $this->db->where('id_usuario', (int) $filtros['id_usuario']);
        }

        if (!empty($filtros['token'])) {
            $this->db->like('token', $filtros['token']);
        }

        if (!empty($filtros['accion'])) {
            $this->db->like('accion', $filtros['accion']);
        }

        if (!empty($filtros['metodo'])) {
            $this->db->where('metodo', $filtros['metodo']);
        }

        if (!empty($filtros['fecha_ini'])) {
            $this->db->where('DATE(fecha) >=', $filtros['fecha_ini']);
        }

        if (!empty($filtros['fecha_fin'])) {
            $this->db->where('DATE(fecha) <=', $filtros['fecha_fin']);
        }

        if (!empty($filtros['busqueda'])) {
            $this->db->group_start()
                ->like('accion', $filtros['busqueda'])
                ->or_like('token', $filtros['busqueda'])
                ->or_like('request', $filtros['busqueda'])
                ->or_like('response', $filtros['busqueda'])
                ->group_end();
        }
    }

    /**
     * Normaliza cualquier dato a string (JSON para arrays/objetos).
     */
    private function normalizar($dato) {
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
            $dato = $this->ocultar_sensibles($dato);
            return json_encode($dato, JSON_UNESCAPED_UNICODE | JSON_PARTIAL_OUTPUT_ON_ERROR);
        }

        return (string) $dato;
    }

    /**
     * Oculta datos sensibles antes de guardar en el log.
     */
    private function ocultar_sensibles($array) {
        $sensibles = array('clave', 'password', 'bdv_clave', 'authorization', 'secret', 'token_bdv');

        foreach ($array as $key => $value) {
            if (is_array($value)) {
                $array[$key] = $this->ocultar_sensibles($value);
            } elseif (is_string($key) && in_array(strtolower($key), $sensibles, true)) {
                $array[$key] = '***OCULTO***';
            }
        }

        return $array;
    }
}