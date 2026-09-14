<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tiempo_preinscripcion_model extends CI_Model {

	public function gettiempo_preinscripcion(){
		$this->db->where('status', 1);
		$resultados = $this->db->get("tiempo_preinscripcion");

		if ($resultados->num_rows() > 0) {
			return $resultados->row();
		}
		else{
			return false;
		}
	}

public function gettiempo_preinscripcion_us(){
		$this->db->where('status', 1);
		$resultados = $this->db->get("tiempo_preinscripcion");

		if ($resultados->num_rows() > 0) {
			return $resultados->result();
		}
		else{
			return false;
		}
	}
	



}
