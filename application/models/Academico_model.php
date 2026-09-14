<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Academico_model extends CI_Model {



	public function save($data)
	{
		var_dump($data);	
		$this->db->insert("academico",$data);
			var_dump($this->db->queries);
		return  1;
	}
	public function delete($id)
	{
		return $this->db->delete("academico",array('id' => $id));
	}

	public function update_academico($id,$data){
		//var_dump($data);
		$this->db->where("id",$id);
		$this->db->update("academico",$data);
		var_dump($this->db->queries);
		return  1;
		//return $this->db->update("academico",$data);
	}

public function getusuario_Academico($id_usuario){
		$this->db->select("a.*");
		$this->db->from("academico a");	
		$this->db->where("a.id_usuario",$id_usuario);
		$resultados = $this->db->get();
		if ($resultados->num_rows() > 0) {
			return $resultados->row();
		}
		else{
			return false;
		}
	}
	public function getusuario_Academico_asp($id_usuario,$tipo_estudio){
		$this->db->select("a.*");
		$this->db->from("academico a");	
		$this->db->where("a.id_usuario",$id_usuario);
		$this->db->where("a.tipo_estudio",$tipo_estudio);
		$resultados = $this->db->get();
		if($tipo_estudio==1){
			if ($resultados->num_rows() > 0) {
				return $resultados->row();
			}
			else{
				return false;
			}
		}else{
			if ($resultados->num_rows() > 0) {
				return $resultados->result();
			}
			else{
				return false;
			}
		}
	}
	public function get_Academico_asp($id,$tipo_estudio){
		$this->db->select("a.*");
		$this->db->from("academico a");	
		$this->db->where("a.id",$id);
		$this->db->where("a.tipo_estudio",$tipo_estudio);
		$resultados = $this->db->get();
		if ($resultados->num_rows() > 0) {
				return $resultados->row();
			}
			else{
				return false;
			}
		}
	

}