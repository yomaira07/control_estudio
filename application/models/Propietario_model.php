<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Propietario_model extends CI_Model {

	public function getPropietarios($id){
		$this->db->where("condominio_id",$id);
		$resultados = $this->db->get("propietario");
		return $resultados->result();
	}

	public function getListPropietarios($id){
		$this->db->where("condominio_id",$id);
		$resultados = $this->db->get("propietario");
		return $resultados->result();
	}


	public function save($data){
		return $this->db->insert("propietario",$data);
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