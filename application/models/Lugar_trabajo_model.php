<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lugar_trabajo_model extends CI_Model {

	public function getLugar_trabajo(){
		$this->db->order_by('lugar_trabajo', 'ASC');
		$resultados = $this->db->get("lugar_trabajo");
		return $resultados->result();
	}

	public function valor_unidad($lugar_detrabajo){
		$this->db->where('id', $lugar_detrabajo);
		$resultados = $this->db->get("lugar_trabajo");
		return $resultados->row();
	}
	public function lugar_actual_trabajo($lugar_detrabajo){
		$this->db->where('id', $lugar_detrabajo);
		$resultados = $this->db->get("lugar_trabajo");
		return $resultados->row();
	}

}