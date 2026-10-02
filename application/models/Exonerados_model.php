<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Exonerados_model extends CI_Model {

public function buscar_exonerados($id,$periodo ){
			$this->db->select("e.*,p.nombre as programa,pen.nombre as unidad_curricular,pen.unidad_curricular as uc ");
			$this->db->from("exonerados e");			
			$this->db->join("programa p","e.id_programa =p.id");	
			$this->db->join("pensum pen","e.id_pensum =pen.id","left");	
			
			$this->db->where("e.id_periodo",$periodo);	
			$this->db->where("e.id_usuario", $id);		
			//$this->db->where("oa.status", 1);	
			$resultados = $this->db->get();
			///var_dump($this->db->queries);
			if ($resultados->num_rows() > 0){
				return $resultados->result();
			}
			else{
				return false;
			}
	}
	public function exonerados_todo_programa($id,$periodo ){
		$this->db->select("e.*,p.nombre as programa ");
		$this->db->from("exonerados e");			
		$this->db->join("programa p","e.id_programa =p.id");		
		$this->db->where("e.id_periodo",$periodo);	
		$this->db->where("e.id_usuario", $id);		
		$this->db->where("e.tipo_exoneracion", 1);	
	
		$resultados = $this->db->get();
		//var_dump($this->db->queries);
		if ($resultados->num_rows() > 0){
			return $resultados->result();
		}
		else{
			return false;
		}
}
}
