<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Condominio_model extends CI_Model {

	

	public function get_Condominios($id_usuario)
	{
		//consultados todos los condominio
		
		$this->db->where("usuario_id",$id_usuario);
		// se consulta con la tabla usuarios
		$resultados = $this->db->get("condominio");
		return $resultados->result();
		// verificamos que trae valor
		//if ($resultados->num_rows() > 0){
		//	return $resultados->row();
		//}
		//else{
		//	return false;
		//}
	}

	public function save($data)
	{
		return $this->db->insert("condominio",$data);
	}

	public function get_CondominiosId($id){
		$this->db->where("id",$id);
		$resultados = $this->db->get("condominio");
		//$this->session->set_userdata($resultados);
		return $resultados->row();
	}
}