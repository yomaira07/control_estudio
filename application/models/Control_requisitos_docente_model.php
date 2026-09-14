<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Control_requisitos_docente_model extends CI_Model {




	public function save($data){
		return $this->db->insert("control_requisitos_docente",$data);
	}

	public function getControl_requisitos($id_docente,$id_requisito,$id_usuario){//$id_requisito
		
			$this->db->where("id_docente",$id_docente);
		$this->db->where("id_requisito",$id_requisito);
		$this->db->where("id_usuario",$id_usuario);
		$resultados = $this->db->get("control_requisitos_docente");
		//var_dump($this->db->queries);
		

	//	$resultados = $this->db->get("control_requisitos_docente");
		//var_dump($resultados->result());
			
				//echo count($resultados->result());
			if ($resultados->result()== null) {
				return false;				
			}
			else{
				return $resultados->result();
				
			}
	}
	public function getControl_requisitos_doc1($id_docente,$id_usuario){//todos los requisitos del docente
		
		$this->db->where('id_docente', $id_docente);
		//$this->db->where("id_requisito",$id_requisito);
		$this->db->where("id_usuario",$id_usuario);
		$resultados = $this->db->get("control_requisitos_docente");
		//var_dump($this->db->queries);
		//var_dump($resultados->result );
		return $resultados->result();
	}
	public function update($id_usuario,$id_docente,$id_requisito,$data2){
		$this->db->where("id_usuario",$id_usuario);
		$this->db->where("id_docente",$id_docente);
		$this->db->where("id_requisito",$id_requisito);
		$resultados =$this->db->update("control_requisitos_docente",$data2);
		//var_dump($this->db->queries);
	//	var_dump($resultados );
		return $resultados->result ;
	}
}