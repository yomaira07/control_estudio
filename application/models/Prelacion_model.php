<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Prelacion_model extends CI_Model {

	public function getPrelacion(){
		
		$resultados = $this->db->get("prelacion");
		return $resultados->result();
	}

	public function getlistPrelacion($id){
        
		 $this->db->select('pensum.id as id_pensum,pensum.nombre,pensum.pensun_ant, pensum.codigo, pensum.unidad_curricular,prelacion.id as id_prelacion');
        $this->db->from("prelacion");
        $this->db->join("pensum","pensum.id = prelacion.id_pensum_prela");
		$this->db->where("prelacion.id_pensum", $id);
        $resultados = $this->db->get();	
     	//var_dump($this->db->queries);
         return $resultados->result();

	}
	
	public function save($data){
		return $this->db->insert("prelacion",$data);


	}
	public function update($id,$data){
		$this->db->where("id",$id);
		return $this->db->update("prelacion",$data);

	}



}
