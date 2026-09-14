<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Control_requisitos_model extends CI_Model {

	public function getRequisitos(){
		$this->db->order_by('descripcion', 'ASC');
		$resultados = $this->db->get("requisitos");
		return $resultados->result();
	}


	public function save($data){
		return $this->db->insert("control_requisitos",$data);
	}

	public function getControl_requisitos($id_periodo,$id_requisito,$id_usuario){//$id_requisito
		
		$this->db->where('id_periodo', $id_periodo);
		$this->db->where("id_requisito",$id_requisito);
		$this->db->where("id_usuario",$id_usuario);
		$resultados = $this->db->get("control_requisitos");
		//var_dump($this->db->queries);
		//var_dump($resultados->result );
		if ($resultados->num_rows() > 0) {
			return $resultados->result();
		}else{
			return false;
		}
	
	}
	public function getControl_requisitos1($id_periodo,$id_usuario){//todos los rrquisitos del usuario
//		echo  $id_usuario;
		//echo "aqui".$id_periodo;
		$this->db->where('id_periodo', $id_periodo);
		//$this->db->where("id_requisito",$id_requisito);
		$this->db->where("id_usuario",$id_usuario);
		$resultados = $this->db->get("control_requisitos");
//		$var_dump($this->db->queries);
		//var_dump($resultados->result );
		return $resultados->result();
	}
	public function update($id,$id_periodo,$id_requisito,$data2){
		$this->db->where("id_usuario",$id);
		$this->db->where("id_periodo",$id_periodo);
		$this->db->where("id_requisito",$id_requisito);
		$resultados =$this->db->update("control_requisitos",$data2);
		//var_dump($this->db->queries);
	//	var_dump($resultados );
		return $resultados->result ;
	}
}
