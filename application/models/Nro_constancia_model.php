<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Nro_constancia_model extends CI_Model {

	public function getNroConstancia($tipo){
		$this->db->where("tipo_constancia",$tipo);
		$this->db->where("status",1);
		$resultados = $this->db->get("nro_constancia");
	if ($resultados->num_rows() > 0) {
			return $resultados->row();
		}
		else{
			return false;
		}
	}


	public function save($data){
		return $this->db->insert("nro_constancia",$data);
	}

	
	public function update($id,$data2){
		$this->db->where("id",$id);
		
		$resultados =$this->db->update("nro_constancia",$data2);
		//var_dump($this->db->queries);
	//	var_dump($resultados );
		return $resultados->result ;
	}
}