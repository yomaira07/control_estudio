<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Estado_model extends CI_Model {

	public function getEstado(){
		$this->db->order_by('estado', 'ASC');
		$resultados = $this->db->get("estado");
		return $resultados->result();
	}

	public function getListaEstado(){
		$this->db->order_by('estado', 'ASC');
		$this->db->where('status', '1');
		$resultados = $this->db->get("estado");
		return $resultados->result();
	}
public function getEstado_circuncripcion($id,$id_lugar_trabajo){
		$this->db->join("trabajo t","t.id_estado_inscribio = estado.id");
		$this->db->where('t.id_lugar_trabajo', $id_lugar_trabajo);
		$this->db->where('t.id_usuario', $id);
		$resultados = $this->db->get("estado");
		
		if ($resultados->num_rows() > 0) {
			return $resultados->row();
		}
		else{
			return false;
		}
		
	}
	public function getEstado_circuncripcion_planilla($id,$id_lugar_trabajo){
		$this->db->join("trabajo t","t.id_estado_inscribio = estado.id");
		$this->db->where('t.id_lugar_trabajo', $id_lugar_trabajo);
		$this->db->where('t.id_usuario', $id);
		$resultados = $this->db->get("estado");
		
		if ($resultados->num_rows() > 0) {
			return $resultados->result();
		}
		else{
			return false;
		}
		
	}


}