<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Control_doctramite_model extends CI_Model {

	public function get($id_usuario,$id_periodo,$id_solicitud){
		$this->db->where('id_periodo', $id_periodo);
		$this->db->where('id_usuario', $id_usuario);
		$this->db->where('id_solicitud_tramite', $id_solicitud);
		$resultados = $this->db->get("control_doctramite");
	//	var_dump($this->db->queries);
		if ($resultados->num_rows() > 0) {
			return $resultados->row();
		}
		else{
			return false;
		}
	}

	public function save($data_nro){
		return $this->db->insert("control_doctramite",$data_nro);
	}


	public function update($id,$id_periodo,$id_usuario,$data2){
		$this->db->where("id",$id);
		$this->db->where("id_periodo",$id_periodo);
		$this->db->where("id_usuario",$id_usuario);
		$resultados =$this->db->update("control_doctramite",$data2);
		//var_dump($this->db->queries);
	//	var_dump($resultados );
		return $resultados->result ;
	}
}
