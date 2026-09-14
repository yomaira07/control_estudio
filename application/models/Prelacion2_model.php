<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Prelacion2_model extends CI_Model {

	public function getPrelacion(){
		
		$resultados = $this->db->get("prelacion2");
		return $resultados->result();
	}

	public function getlistPrelacion($id){
        
		 $this->db->select('pensum.id as id_pensum,pensum.nombre, pensum.codigo, pensum.unidad_curricular,prelacion2.id as id_prelacion');
        $this->db->from("prelacion2");
        $this->db->join("pensum","pensum.id = prelacion2.id_pensum_prela");
		$this->db->where("prelacion2.id_pensum", $id);
        $resultados = $this->db->get();	
     	//var_dump($this->db->queries);
         return $resultados->result();

	}
	
	public function save($data){
		return $this->db->insert("prelacion2",$data);


	}
	public function update($id,$data){
		$this->db->where("id",$id);
		return $this->db->update("prelacion2",$data);

	}



}