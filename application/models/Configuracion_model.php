<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Configuracion_model extends CI_Model { // modelo para guradar la tasa bcv
    
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    /**
     * Obtener la tasa de respaldo desde la base de datos
     * @return float|null
     */
    public function getTasaRespaldo() {
        $this->db->select('valor');
        $this->db->where('clave', 'tasa_bcv_respaldo');
        $query = $this->db->get('configuracion');
        
        if ($query->num_rows() > 0) {
            $row = $query->row();
            return floatval($row->valor);
        }
        
        return null;
    }
    
    /**
     * Actualizar la tasa de respaldo
     * @param float $tasa
     * @return bool
     */
    public function updateTasaRespaldo($tasa) {
        $data = array(
            'valor' => $tasa,
            'fecha_actualizacion' => date('Y-m-d H:i:s')
        );
        
        $this->db->where('clave', 'tasa_bcv_respaldo');
        return $this->db->update('configuracion', $data);
    }
}
?>