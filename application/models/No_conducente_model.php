<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class No_conducente_model extends CI_Model {



	public function save($data)
	{
		//var_dump($data);	
		$this->db->insert("no_conducentes",$data);
		//	var_dump($this->db->queries);
		return  1;
	}


	public function update_no_conducentes($id,$data){
		//var_dump($data);
		$this->db->where("id",$id);
		$this->db->update("no_conducentes",$data);
		//var_dump($this->db->queries);
		return  1;
		//return $this->db->update("no_conducentes",$data);
	}
	public function delete($id){
		
		
		//	var_dump($this->db->queries);
			return  $this->db->delete('no_conducentes', array('id' => $id));
		}

	public function getusuario_no_conducentes($id_usuario){
		$this->db->select("nc.*");
		$this->db->from("no_conducentes nc");	
		$this->db->where("nc.id_usuario",$id_usuario);
		
		$resultados = $this->db->get();
		
			if ($resultados->num_rows() > 0) {
				return $resultados->result();
			}
			else{
				return false;
			}
		}
		public function getusuario_no_conducentes_id($id){
			$this->db->select("nc.*");
			$this->db->from("no_conducentes nc");	
			$this->db->where("nc.id",$id);
			
			$resultados = $this->db->get();
			
				if ($resultados->num_rows() > 0) {
					return $resultados->row();
				}
				else{
					return false;
				}
			}
	

}