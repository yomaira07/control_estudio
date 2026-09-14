<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reincorporaciones_model extends CI_Model {

	public function buscar_reincorporacion($id,$periodo){
			$this->db->select("re.*,p.nombre as programa");
			$this->db->from("reincorporaciones re");			
			$this->db->join("programa p","re.id_programa =p.id");			
			$this->db->where("re.id_periodo",$periodo);	
			$this->db->where("re.id_usuario", $id);		
			$resultados = $this->db->get();
			//var_dump($this->db->queries);
			if ($resultados->num_rows() > 0){
				return $resultados->result();
			}
			else{
				return 0;
			}
	}

}
