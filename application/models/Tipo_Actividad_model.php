<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tipo_Actividad_model extends CI_Model {

	public function getTipo_Actividad(){
		$this->db->order_by('descripcion', 'ASC');
		$resultados = $this->db->get("tipo_actividad");
		return $resultados->result();
	}

	public function save($data){
		return $this->db->insert("tipo_actividad",$data);
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