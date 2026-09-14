<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Control_constancia_model extends CI_Model {

	public function getConstancia($id_docente,$id_periodo,$materia){
		$this->db->where('id_periodo', $id_periodo);
		$this->db->where('id_docente', $id_docente);
		$this->db->where('id_oferta_academica', $materia);
		$resultados = $this->db->get("control_constancia");
		if ($resultados->num_rows() > 0) {
			return $resultados->row();
		}
		else{
			return false;
		}
	}
	public function save($data_nro){
		return $this->db->insert("control_constancia",$data_nro);
	}


	public function update($id,$id_periodo,$id_docente,$data2){
		$this->db->where("id",$id);
		$this->db->where("id_periodo",$id_periodo);
		$this->db->where("id_docente",$id_docente);
		$resultados =$this->db->update("control_constancia",$data2);
		//var_dump($this->db->queries);
	//	var_dump($resultados );
		return $resultados->result ;
	}
}