<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registro_bancario_model extends CI_Model {



	public function save($data)
	{
		//var_dump($data);	

		return  $this->db->insert("registro_bancario",$data);
	}


	public function update_bancario($id,$data){
		//var_dump($data);
		$this->db->where("id_usuario",$id);
		return $this->db->update("registro_bancario",$data);
	}

public function getusuario_bancario($id_usuario){
		$this->db->select("rb.*");
		$this->db->from("registro_bancario rb");	
		$this->db->where("rb.id_usuario",$id_usuario);
		$resultados = $this->db->get();
		if ($resultados->num_rows() > 0) {
			return $resultados->row();
		}
		else{
			return false;
		}
	}
}