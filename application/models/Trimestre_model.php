<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Trimestre_model extends CI_Model {

	public function getTrimestre(){
		$this->db->order_by('id', 'ASC');
		$resultados = $this->db->get("trimestre");
		return $resultados->result();
	}

	public function save($data){
		return $this->db->insert("trimestre",$data);


	}
/*
	public function cod_activ()
	{

		$query = $this->db->count_all('actividad'); //contamos los registros contenidos en actividad
		
		$num = $query + 1; //le sumamos uno a el registro obtenido y asi determinar el codigo a crear
		
		$id = str_pad($num, 3, '0', STR_PAD_LEFT);
		
		return $id; //retornamos ese id obtenido para guardarlo como el nuevo codigo de la actividad a crear

	}//end function cod_activ con la cual generamos el codigo para la actividad

function get_table()
    {	
		$query = $this->db->query('SELECT actividad.id, actividad.codigo, actividad.anio, actividad.nombre, clasificacion.descripcion as clasificacion, tematica.descripcion as tematica, alcance.descripcion as alcance, tipo_actividad.descripcion as tipo_actividad FROM actividad, clasificacion, tematica, alcance, tipo_actividad WHERE actividad.id_clasificacion = clasificacion.id AND actividad.id_telematica = tematica.id AND actividad.id_alcance = alcance.id AND actividad.id_tipo_actividad = tipo_actividad.id AND  actividad.status = 1');
        return $query->result();
    }
	
function get_actividad($cod_actividad) { 
    	$query = $this->db->query("SELECT * FROM actividad WHERE codigo='".$cod_actividad."'");
    	return $query->row();
    }


	
	public function getCategoria($id){
		$this->db->where("id",$id);
		$resultado = $this->db->get("categorias");
		return $resultado->row();

	}

	public function update($id,$data){
		$this->db->where("id",$id);
		return $this->db->update("categorias",$data);
	}
	*/
}