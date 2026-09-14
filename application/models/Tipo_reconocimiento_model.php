<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tipo_reconocimiento_model extends CI_Model {

	public function get($id_tramite){
		$this->db->where("status",1);
		$this->db->where("id_tramite",$id_tramite);
		$this->db->order_by('id', 'ASC');
		$resultados = $this->db->get("tipo_reconocimiento");
		return $resultados->result();
	}
	public function getTipo($id){
		$this->db->where("status",1);
		$this->db->where("id",$id);		
		$resultados = $this->db->get("tipo_reconocimiento");
		return $resultados->row();
	}

	public function save($data){
		return $this->db->insert("tipo_reconocimiento",$data);


	}



}
