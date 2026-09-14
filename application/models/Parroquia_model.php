<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Parroquia_model extends CI_Model {

	public function getParroquia(){
		$this->db->order_by('id', 'ASC');
		$resultados = $this->db->get("parroquia");
		return $resultados->result();
	}

public function combo_parroquia($combomunicipio_id){
		$this->db->order_by('parroquia', 'ASC');
		$this->db->where('id_municipio', $combomunicipio_id);
		$resultados = $this->db->get("parroquia");
		//$output = $resultados->result();
		$output = '<option value="">Select Parroquia</option>';
		foreach($resultados->result() as $row)
	  {
	   $output .= '<option value="'.$row->id.'">'.$row->parroquia.'</option>';
	  }
	  return $output;
	}

}