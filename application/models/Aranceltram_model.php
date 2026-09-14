<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Aranceltram_model extends CI_Model {




	public function save($data){
		return $this->db->insert("aranceles_tramites",$data);


	}

	public function getArancelesTramite(){
		$this->db->where('status', 1);
		$resultados = $this->db->get("aranceles_tramites");
		return $resultados->result();
	}
	public function getAranceles_list(){
		
		$resultados = $this->db->get("aranceles_tramites");

		return $resultados->result();
	}
	
		public function getArancelesTramiteList() {
			$this->db->select("aranceles_tramites.*, tr.nombre as nombre_tramite");
			$this->db->join("tramites tr", "aranceles_tramites.id_tramites = tr.id", "inner");
			$this->db->where("aranceles_tramites.status", 1);
			$this->db->order_by('aranceles_tramites.id', 'DESC');
			$resultados = $this->db->get("aranceles_tramites");
			return $resultados->result();
		}
	
		public function getArancelById($id) {
			$this->db->where("id", $id);
			$resultado = $this->db->get("aranceles_tramites");
			return $resultado->row();
		}
	
		public function update($id, $data) {
			$this->db->where("id", $id);
			return $this->db->update("aranceles_tramites", $data);
		}
	
		public function update_activo($id_tramite, $data) {
			$this->db->where("id_tramite", $id_tramite);
			$this->db->where("status", 1);
			return $this->db->update("aranceles_tramites", $data);
		}
	
		public function delete($id) {
			$this->db->where("id", $id);
			return $this->db->delete("aranceles_tramites");
		}
	
}