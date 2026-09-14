<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Municipio_model extends CI_Model {

	public function getMunicipio(){
		$this->db->order_by('municipio', 'ASC');
		$resultados = $this->db->get("municipio");
		return $resultados->result();
	}


	
	public function combo_municipio($comboestado_id){
		$this->db->order_by('municipio', 'ASC');
		$this->db->where('id_estado', $comboestado_id);
		$resultados = $this->db->get("municipio");
		//$output = $resultados->result();
		$output = '<option value="">Select Municipio</option>';
		foreach($resultados->result() as $row)
	  {
	   $output .= '<option value="'.$row->id.'">'.$row->municipio.'</option>';
	  }
	  return $output;
	}

	

}