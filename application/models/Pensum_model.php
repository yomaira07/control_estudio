<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pensum_model extends CI_Model {

	public function getPensum(){
		$this->db->order_by('id_trimestre', 'ASC');
		$resultados = $this->db->get("pensum");
		return $resultados->result();
	}

	public function getlistPensum($id){
		//$this->db->where("id_programa",$id);
		//$this->db->order_by('id_trimestre', 'ASC');
		//$resultados = $this->db->get("pensum");
		//return $resultados->result();

		$query = $this->db->query('
			SELECT pensum.pensun_ant,pensum.id, pensum.nombre, pensum.sigla_uc, 
			pensum.nombre, programa.nombre as des_programa, trimestre.nombre as des_trimestre, 
			pensum.id_trimestre,pensum.horas,pensum.unidad_curricular,pensum.codigo,eje.nombre as des_eje,pensum.status
			FROM pensum, programa, trimestre, eje 
			WHERE pensum.id_programa = '.$id.'
			AND pensum.id_programa = programa.id 
			AND pensum.id_trimestre = trimestre.id 
			AND pensum.id_eje = eje.id 
			order by des_trimestre');
        return $query->result();

	}
	public function getnombrePensum_($id){
		//$this->db->where("id_programa",$id);
		//$this->db->order_by('id_trimestre', 'ASC');
		//$resultados = $this->db->get("pensum");
		//return $resultados->result();

		$query = $this->db->query('
			SELECT pensum.pensun_ant,pensum.id, pensum.nombre, pensum.sigla_uc,  programa.id as programa_id,programa.nombre as des_programa,
			 pensum.id_trimestre,trimestre.nombre as des_trimestre, pensum.horas,pensum.unidad_curricular,
			 pensum.codigo,eje.nombre as des_eje,pensum.status
			FROM pensum, programa, trimestre, eje 
			WHERE pensum.id = '.$id.'
			AND pensum.id_programa = programa.id 
			AND pensum.id_trimestre = trimestre.id 
			AND pensum.id_eje = eje.id ');
        return $query->row();

	}
	public function getnombrePensum($id){
		//$this->db->where("id_programa",$id);
		//$this->db->order_by('id_trimestre', 'ASC');
		//$resultados = $this->db->get("pensum");
		//return $resultados->result();

		$query = $this->db->query('
			SELECT pensum.pensun_ant,pensum.id, pensum.nombre, pensum.sigla_uc, pensum.nombre, programa.nombre as des_programa, trimestre.nombre as des_trimestre, 
			pensum.horas,pensum.unidad_curricular,pensum.codigo,eje.nombre as des_eje,pensum.status,programa.id as programa
			FROM pensum, programa, trimestre, eje 
			WHERE pensum.id = '.$id.'
			AND pensum.id_programa = programa.id 
			AND pensum.id_trimestre = trimestre.id 
			AND pensum.id_eje = eje.id ');
			
		
        return $query->result();

	}

	public function getcomboPensum(){
	$query = $this->db->query('
		SELECT pensum.id, pensum.nombre, pensum.sigla_uc, pensum.nombre, programa.nombre as des_programa, trimestre.nombre as des_trimestre,
		pensum.horas,pensum.unidad_curricular,pensum.codigo,eje.nombre as des_eje,pensum.status
		FROM pensum, programa, trimestre, eje 
		WHERE  pensum.id_programa = programa.id 
		AND pensum.id_trimestre = trimestre.id 
		AND pensum.id_eje = eje.id
		order by des_programa,des_trimestre ASC ');
        return $query->result();

	}

	public function save($data){
		return $this->db->insert("pensum",$data);


	}
	public function update($id_pensum,$data){
		$this->db->where("id",$id_pensum);
		return $this->db->update("pensum",$data);
	


	}

	public function getlistPensum_seleccionado($id){
		

		$query = $this->db->query('
			SELECT pensum.pensun_ant,pensum.id as id_pensum, pensum.nombre, pensum.sigla_uc, 
			pensum.nombre, programa.nombre as des_programa, trimestre.nombre as des_trimestre, 
			pensum.id_trimestre,pensum.horas,pensum.unidad_curricular,pensum.codigo,eje.nombre as des_eje,pensum.status
			FROM pensum, programa, trimestre, eje 
			WHERE pensum.id_programa = '.$id.'
			AND pensum.id_programa = programa.id 
			AND pensum.id_trimestre = trimestre.id 
			AND pensum.id_eje = eje.id 
		        AND pensum.id_trimestre not in(7,8,9,10,11)
 			AND pensum.id not in(11,23,34)
			order by des_trimestre');
        	return $query->result();

	}

}
