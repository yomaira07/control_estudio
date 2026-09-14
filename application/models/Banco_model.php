<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Banco_model extends CI_Model {

	public function getBanco(){
		$this->db->where('status', 1);
		$this->db->order_by('nombre', 'ASC');
		$resultados = $this->db->get("banco");
		return $resultados->result();
	}
	public function getBanco_todos(){
		
		$resultados = $this->db->get("banco");
		return $resultados->result();
	}


	public function save($data){
		return $this->db->insert("banco",$data);
	}

}