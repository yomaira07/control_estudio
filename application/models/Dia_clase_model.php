<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dia_clase_model extends CI_Model {

	public function getDiaclase(){
		$this->db->order_by('id', 'ASC');
		$resultados = $this->db->get("dia_clase");
		return $resultados->result();
	}


}