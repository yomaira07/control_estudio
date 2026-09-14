<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Clasificacion_model extends CI_Model {

	public function getClasificacion(){
		//$this->db->order_by('descripcion', 'ASC');
		$resultados = $this->db->get("clasificacion");
		return $resultados->result();
	}

	public function save($data){
		return $this->db->insert("clasificacion",$data);
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