<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Alcance_model extends CI_Model {

	public function getAlcance(){
		$this->db->order_by('descripcion', 'ASC');
		$resultados = $this->db->get("alcance");
		return $resultados->result();
	}

	public function save($data){
		return $this->db->insert("alcance",$data);
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