<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Docente_model extends CI_Model {

	public function getDocente2(){
		$this->db->order_by('id', 'ASC');
		$resultados = $this->db->get("docente");
		return $resultados->result();
	}

	public function getDocente(){
		$this->db->select("d.*,d.id as id_docente,na.descripcion as nivel_acad,u.*");
		$this->db->from("docente d");
		$this->db->join("nivel_academico na","d.id_nivel_academico = na.id");
		$this->db->join("usuarios u","u.id = d.id_usuario",left);
		$this->db->where("d.status","1");
		$this->db->order_by("d.primer_nombre","ASC");
		$resultados = $this->db->get();
		return $resultados->result();
	}


	public function save($data)
	{
		return $this->db->insert("docente",$data);
	}

	public function getBuscarDocente($id){
		$this->db->where("id",$id);
		$resultado = $this->db->get("docente");
		return $resultado->row();

	}
	public function getBuscarDocente1($id){
		$this->db->where("id",$id);
		$resultado = $this->db->get("docente");
		return $resultado->result();

	}
public function getBuscarDocente_cedula($cedula){
		$this->db->where("cedula",$cedula);
		$this->db->where("status",1);
		$resultado = $this->db->get("docente");
		return $resultado->row();

	}

	public function update_docente($id,$data){
		//var_dump($data);
		$this->db->where("id",$id);
		return $this->db->update("docente",$data);
	}

public function getusuario_Docente($id_usuario){
		$this->db->select("d.*,na.descripcion as nivel_acad");
		$this->db->from("docente d");
		$this->db->join("nivel_academico na","d.id_nivel_academico = na.id");
		$this->db->where("d.id_usuario",$id_usuario);
//		$this->db->where("d.status","1");		
		$resultados = $this->db->get();
		if ($resultados->num_rows() > 0) {
			return $resultados->row();
		}
		else{
			return false;
		}
	}
}
