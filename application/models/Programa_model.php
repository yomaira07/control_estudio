<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Programa_model extends CI_Model {

	public function getPrograma(){
		$this->db->where("status",1);
		$this->db->order_by('prog_pertenece', 'ASC');
		$resultados = $this->db->get("programa");
		return $resultados->result();
	}
	public function getPrograma_estatus(){
		$this->db->where("status",1);
		$this->db->order_by('nombre', 'ASC');
		$resultados = $this->db->get("programa");
		return $resultados->result();
	}
	public function getPrograma_estatus_convocatoria(){
		$this->db->where("status_convocatoria",1);
		$this->db->order_by('tipo_programa,prog_pertenece,nombre_convocatoria','asc');
		$resultados = $this->db->get("programa");
		return $resultados->result();
	}

	public function getProgramaEsp($id){
		$this->db->where("id",$id);
		//var_dump( $this->db->queries);
		$this->db->order_by('prog_pertenece', 'ASC');
		$resultados = $this->db->get("programa");
		return $resultados->row();
	}

	public function save($data){
		return $this->db->insert("programa",$data);


	}

	public function getProgramaAprobado($id){
		echo $id;
		$id = explode(",", $id);
		$this->db->where_in("id",$id);
		$resultados = $this->db->get("programa");
		//var_dump( $this->db->queries);
		return $resultados->result();
	}
public function getProgramaMostrar($id){
		//echo $id;
		//$id = explode(",", $id);
		$this->db->where_in("id",$id);
		$resultados = $this->db->get("programa");
		//var_dump( $this->db->queries);
		return $resultados->result();
	}
	public function getProgramaAprobado1($id){
		//echo $id;
		
		$this->db->where("id",$id);
		$resultados = $this->db->get("programa");
		//var_dump( $this->db->queries);
		return $resultados->result();
	}

}
