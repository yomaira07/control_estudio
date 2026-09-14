<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Estado_civil_model extends CI_Model {

	public function getEstadocivil(){
		$resultados = $this->db->get("estado_civil");
		return $resultados->result();
	}


	public function save($data){
		return $this->db->insert("estado_civil",$data);
	}

	/*
	public function getCategoria($id){
		$this->db->where("id",$id);
		$resultado = $this->db->get("categorias");
		return $resultado->row();

	}

	public function update($id,$data){
		$this->db->where("id",$id);
		return $this->db->update("categorias",$data);
	}
	*/
}
