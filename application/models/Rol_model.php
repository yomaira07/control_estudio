<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rol_model extends CI_Model {

	public function lista_rol(){
		$this->db->order_by('nombre', 'ASC');
		$resultados = $this->db->get("roles");
		return $resultados->result();
	}

public function get_rol($id){
		$this->db->where ('id', $id);
		$resultados = $this->db->get("roles");
		//var_dump($this->db->queries);
		return $resultados->result();
	}
}
