<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Trabajo_model extends CI_Model {

	public function getTrabajo(){
		$this->db->order_by('id', 'ASC');
		$resultados = $this->db->get("direccion");
		return $resultados->result();
	}

	public function getListaTrabajo($id_usuario,$actual){
		$this->db->select ("lt.id, trabajo.id as id_trabajo,trabajo.*, lt.*,e.estado as est_cir");
		$this->db->join("estado e","e.id= trabajo.estado_circunscripcion",LEFT);
		$this->db->join("lugar_trabajo lt","lt.id= trabajo.id_lugar_trabajo");
		$this->db->where("id_usuario",$id_usuario);

		$this->db->where("actual",$actual);
		$resultados = $this->db->get("trabajo");
	//	var_dump($this->db->queries);
		if($actual==1){
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
	public function getListaTrabajo_ant($id){
		
		$this->db->where("trabajo.id",$id);
		$resultados = $this->db->get("trabajo");
		
	//	var_dump($this->db->queries);
			if ($resultados->num_rows() > 0) {
				return $resultados->row();
			}
			else{
				return false;
			}
	
		
	}

	

	public function Lugar_trabajo($id_usuario){

		//$this->db->where("id_usuario",$id_usuario);
		//$resultados = $this->db->get("trabajo");

		$this->db->select("t.*");
		$this->db->from("trabajo t");
		$this->db->where("t.id_usuario",$id_usuario);
		$this->db->where("t.actual",1);

		$resultados = $this->db->get();
		
	
		if ($resultados->num_rows() > 0) {
			return $resultados->row();
		}
		else{
			return false;
		}
	}

	public function update($id,$data){
		$this->db->where("id",$id);
//		$this->db->update("trabajo",$data);
//	var_dump($this->db->queries);
		return $this->db->update("trabajo",$data);
//		return 1;
	}

	public function save($data){
		
	//	$this->db->insert("trabajo",$data);
	//	var_dump($this->db->queries);
		return  $this->db->insert("trabajo",$data);
	}
	public function delete($id){
		
		
		//	var_dump($this->db->queries);
			return  $this->db->delete('trabajo', array('id' => $id));
		}
	
	public function RegistradoTrabajo($id_usuario){

		$this->db->where("id_usuario",$id_usuario);
		$this->db->where("DATE_FORMAT(dactualizacion, '%Y-%m-%d') >=",date('Y-m-d'));
		$resultados = $this->db->get("trabajo");
	//	var_dump($this->db->queries);

		if ($resultados->num_rows() > 0) {
			return true;
		}
		else{
			return false;
		}
	}

	public function BuscarRegistradoTrabajo($id_usuario){

		$this->db->where("id_usuario",$id_usuario);
		$resultados = $this->db->get("trabajo");
		

		if ($resultados->num_rows() > 0) {
			return true;
		}
		else{
			return false;
		}
	}

public function getpostulado($id_usuario){
		
		$this->db->where("trabajo.id_usuario",$id_usuario);
		$this->db->where("trabajo.postulado",1);
		$this->db->where("trabajo.actual",1);
		$resultados = $this->db->get("trabajo");
		
	//	var_dump($this->db->queries);
			if ($resultados->num_rows() > 0) {
				return true;
			}
			else{
				return false;
			}
	
		
	}
public function getListaTrabajo_actualizado($id_usuario){

		$this->db->where("id_usuario",$id_usuario);
		$this->db->where("DATE_FORMAT(dactualizacion, '%Y/%m/%d') >=",date('Y-m-d'));
		$resultados = $this->db->get("trabajo");
		//var_dump($this->db->queries);

		if ($resultados->num_rows() > 0) {
			return true;
		}
		else{
			return false;
		}
	}
	public function getTrabajoActual($id_usuario)
	{
		$this->db->select('*');
		$this->db->from('trabajo');
		$this->db->where('id_usuario', $id_usuario);
		$this->db->where('actual', 1);
		$query = $this->db->get();
		
		if ($query->num_rows() > 0) {
			return $query->row();
		}
		return false;
	}
}

