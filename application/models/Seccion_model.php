<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Seccion_model extends CI_Model {

	public function getSecciones(){
		$resultados = $this->db->get("seccion");
		return $resultados->result();
	}


	public function save($data){
		return $this->db->insert("seccion",$data);
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
