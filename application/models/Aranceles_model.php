<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Aranceles_model extends CI_Model {




	public function save($data){
		return $this->db->insert("aranceles",$data);


	}

	public function getAranceles(){
		$this->db->where('status', 1);
		$resultados = $this->db->get("aranceles");
		return $resultados->result();
	}
	public function getAranceles_list(){
		
		$resultados = $this->db->get("aranceles");

		return $resultados->result();
	}



	public function update($id,$data){
		$this->db->where("id",$id);
		return $this->db->update("aranceles",$data);
	}
	
	public function update_activo($id_tipo,$data){
		$this->db->where("id_tipo_arancel",$id_tipo);
		$this->db->where("status",1);
		return $this->db->update("aranceles",$data);
	}
}
