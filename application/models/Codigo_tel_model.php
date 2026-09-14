<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Codigo_tel_model extends CI_Model {

	public function Codigo_nacional(){
		$this->db->order_by('id', 'ASC');
		$resultados = $this->db->get("codigo_hab");
		return $resultados->result();
	}

	public function Codigo_celular(){
		$this->db->order_by('id', 'ASC');
		$resultados = $this->db->get("codigo_cel");
		return $resultados->result();
	}
public function getCodigo_nacional($id){
	//echo $id;
		$this->db->where('id', $id);
		$resultados = $this->db->get("codigo_hab");
		//var_dump($resultados);
		return $resultados->result();
	}

	public function getCodigo_celular($id){
		$this->db->where('id', $id);
		$resultados = $this->db->get("codigo_cel");
		return $resultados->result();
	}

}