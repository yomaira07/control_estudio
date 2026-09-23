<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tramites_model extends CI_Model {

	public function getListaTramites($tipo){
        $this->db->where_in('id_tipo_tramite', $tipo);
		$this->db->where_in('status', 1);
		$this->db->order_by('nombre', 'ASC');
		$resultados = $this->db->get("tramites");
		return $resultados->result();
	}
	public function getListaTramites_programas($id){
		//echo $id;
		$tramite=array(17,19,33,34,18,36);
		$this->db->select('tr.*');
		$this->db->from('tramites tr');
		$this->db->join('programa pr','pr.tipo_programa=tr.tipo_programa');
		$this->db->where('pr.id', $id);
		$this->db->where_not_in('tr.id', $tramite);
		$this->db->where('tr.status', 1);
		$resultados = $this->db->get();	
		$output = '<option value="">Seleccione Trámite</option>';
		foreach($resultados->result() as $row)
	  {
	   $output .= '<option value="'.$row->id.'">'.$row->nombre.'</option>';
	  }
	  return $output;
	
	}
	public function getListaTramitesRuc($id){
		$tramite=array(17,19);
		$this->db->select('tr.*');
		$this->db->from('tramites tr');
		$this->db->join('programa pr','pr.tipo_programa=tr.tipo_programa');
		$this->db->where('pr.id', $id);
		$this->db->where_in('tr.id', $tramite);
		$this->db->where('tr.status', 1);
		$resultados = $this->db->get();	
		//var_dump($this->db->queries);
		$output = '<option value="">Seleccione Trámite</option>';
		foreach($resultados->result() as $row)
		{
			$output .= '<option value="'.$row->id.'">'.$row->nombre.'</option>';
		}
	  return $output;
	
	}
public function getListaTramitesRuc_requisito($id){
		$tramite=array(28);
		$this->db->select('tr.*');
		$this->db->from('tramites tr');		
		$this->db->where_in('tr.id', $tramite);
		$this->db->where('tr.status', 1);
		$resultados = $this->db->get();	
		//var_dump($this->db->queries);
		$output = '<option value="">Seleccione Trámite</option>';
		foreach($resultados->result() as $row)
		{
			$output .= '<option value="'.$row->id.'">'.$row->nombre.'</option>';
		}
	  return $output;
	
	}
	public function getListaTramites_egreso($id){
        $this->db->where_in('id', $id);
		$this->db->where('status', 1);
		$this->db->order_by('nombre', 'ASC');
		$resultados = $this->db->get("tramites");
		return $resultados->result();
	}

	public function save($data){
		return $this->db->insert("tramites",$data);
	}
	public function getTramitesapertura($id){
        $this->db->where_in('id', $id);

		$this->db->where('status', 1);
	
		$resultados = $this->db->get("tramites");
	//var_dump($this->db->queries);
		if ($resultados->num_rows() > 0) {
			return $resultados->row();
		}
		else{
			return false;
		}
	}
	public function getTramites($id){
        $this->db->where_in('id', $id);

		$this->db->where('status', 1);
	
		$resultados = $this->db->get("tramites");
	
		if ($resultados->num_rows() > 0) {
			return $resultados->row();
		}
		else{
			return false;
		}
	}

}
