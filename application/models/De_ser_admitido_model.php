<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class De_ser_admitido_model extends CI_Model {



	public function save($data)
	{
		var_dump($data);	
		$this->db->insert("de_ser_admitido",$data);
			var_dump($this->db->queries);
		return  1;
	}


	public function update_de_ser_admitido($id,$data){
		//var_dump($data);
		$this->db->where("id",$id);
		$this->db->update("de_ser_admitido",$data);
		var_dump($this->db->queries);
		return  1;
		//return $this->db->update("academico",$data);
	}


	public function getusuario_de_ser_admitido($id_usuario){
		$this->db->select("ad.*");
		$this->db->from("de_ser_admitido ad");	
		$this->db->where("ad.id_usuario",$id_usuario);
		
		$resultados = $this->db->get();
		
			if ($resultados->num_rows() > 0) {
				return $resultados->row();
			}
			else{
				return false;
			}
		}
	

}