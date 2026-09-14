<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Plan_evaluacion_model extends CI_Model {	
	public function save($data){

		//	var_dump($this->db->queries);
		return $this->db->insert("plan_evaluacion",$data);;
	}	

	public function update($id, $data2){
		$this->db->where("plan_evaluacion.id",$id);		
		return $this->db->update("plan_evaluacion",$data2);
	}		
	public function getBuscarplan($id_oferta_academica){
	//echo $id_oferta_academica;
		$this->db->select("oa.*,pev.*,oa.id as id_oferta,pev.id as id_evaluacion");
		$this->db->from("plan_evaluacion pev");
		$this->db->join("oferta_academica oa","pev.id_oferta_academica = oa.id");		
		$this->db->where("oa.id",$id_oferta_academica);
		$this->db->where("pev.status",1);		

		$resultado = $this->db->get();
		//var_dump($this->db->queries);
		if ($resultado->num_rows() > 0) {
			return $resultado->result();
		}
		else{
			return false;
		}
	}	
	public function getBuscarplanli($id_oferta_academica,$periodo){
		//echo $id_oferta_academica;
		$this->db->query("SET sql_mode=(SELECT REPLACE(@@sql_mode, 'ONLY_FULL_GROUP_BY', ''));");	
			$this->db->select("oa.*,pev.*,oa.id as id_oferta,pev.id as id_evaluacion");
			$this->db->from("plan_evaluacion pev");
			$this->db->join("oferta_academica oa","pev.id_oferta_academica = oa.id");		
			$this->db->where("oa.codigo",$id_oferta_academica);
			$this->db->where("oa.id_periodo",$periodo);
			$this->db->where("pev.status",1);		
	        $this->db->group_by("oa.codigo");		
			$resultado = $this->db->get();
			//var_dump($this->db->queries);
			if ($resultado->num_rows() > 0) {
				return $resultado->result();
			}
			else{
				return false;
			}
		}	
}


