<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Direccion_model extends CI_Model {

	public function getDireccion(){
		$this->db->order_by('id', 'ASC');
		$resultados = $this->db->get("direccion");
		return $resultados->result();
	}

	public function getListaDireccion($id_usuario){

		$this->db->where("id_usuario",$id_usuario);
		$resultados = $this->db->get("direccion");
		

		if ($resultados->num_rows() > 0) {
			return $resultados->row();
		}
		else{
			return false;
		}
	}
	public function MostarDireccion($id_usuario){
		
		$this->db->join("estado","estado.id = direccion.id_estado");
		$this->db->join("municipio","municipio.id = direccion.id_municipio");
		$this->db->join("parroquia","parroquia.id = direccion.id_parroquia");
		$this->db->where("id_usuario",$id_usuario);
		
		$resultados = $this->db->get("direccion");
		

		if ($resultados->num_rows() > 0) {
			return $resultados->result();
		}
		else{
			return false;
		}
	}

	public function update($id,$data){
		$this->db->where("id",$id);
		return $this->db->update("direccion",$data);
	}

	public function save($data){
		return $this->db->insert("direccion",$data);
	}

public function getListadireccion_actualizado($id_usuario){

		$this->db->where("id_usuario",$id_usuario);
		$this->db->where("DATE_FORMAT(dactualizacion, '%Y/%m/%d') >=",date('Y-m-d'));
		$resultados = $this->db->get("direccion");
		//var_dump($this->db->queries);

		if ($resultados->num_rows() > 0) {
			return true;
		}
		else{
			return false;
		}
	}

}
