<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Requisitos_model extends CI_Model {

	public function getRequisitos(){
		$this->db->order_by('descripcion', 'ASC');
		$resultados = $this->db->get("requisitos");
		return $resultados->result();
	}


	public function save($data){
		return $this->db->insert("requisistos",$data);
	}

	
	public function update($id_requisito,$data){
		
		$this->db->where("id",$id_requisito);
		$resultados =$this->db->update("requisitos",$data);
		//var_dump($this->db->queries);
	//	var_dump($resultados );
		return $resultados->result ;
	}
}