<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Aspirantes_model extends CI_Model { 
	
	public function save($data){
		return $this->db->insert("aspirantes",$data);
		
	}
	public function buscar_usuario($id){
		$this->db->where("id_usuario",$id);
		$resultado = $this->db->get("aspirantes");
		return $resultado->result();

	}
	public function buscar_programa_aspirante($id,$periodo){
		$this->db->join("programa pr","aspirantes.id_programa=pr.id");	
		$this->db->where("id_usuario",$id);
		$this->db->where("id_periodo",$periodo);
	
		$resultado = $this->db->get("aspirantes");
		//var_dump($this->db->queries);
		return $resultado->result();

	}
	public function total_inscritos_aspirantes_periodo($periodo){//total de aspirantes inscritos activos por periodo
		$this->db->query("SET sql_mode=(SELECT REPLACE(@@sql_mode, 'ONLY_FULL_GROUP_BY', ''));");	
		$this->db->select("es.nombre_primer as primer_nombre,es.nombre_segundo as segundo_nombre,es.apellido_segundo as segundo_apellido,es.apellido_primer as primer_apellido,es.cedula as cedula,pr.nombre as programa,a.id_programa,es.id_sexo,es.nacionalidad,CONCAT(codigo_cel.descripcion,es.tel_celular) AS telefono_cel ,CONCAT(codigo_hab.descripcion,es.tel_habitacion) AS telefono_hab,
lugar_trabajo.lugar_trabajo,trabajo.cargo,estado.estado AS residencia, es.correo as email, a.id_usuario, ac.ult_titulo");
		$this->db->from("aspirantes a");
		$this->db->join("registro_pago r","r.id_usuario=a.id_usuario");		
		$this->db->join("programa pr","a.id_programa=pr.id");					
		$this->db->join("periodo pe","r.id_periodo = pe.id");				
		$this->db->join("estudiante es","r.id_usuario = es.id_usuario");
		$this->db->join("trabajo","trabajo.id_usuario=a.id_usuario");
		$this->db->join("academico ac","ac.id_usuario=a.id_usuario");
		$this->db->join("direccion","direccion.id_usuario=a.id_usuario");
		$this->db->join("lugar_trabajo","lugar_trabajo.id=trabajo.id_lugar_trabajo");
 		$this->db->join("estado","estado.id=direccion.id_estado");
 		$this->db->join("codigo_cel","codigo_cel.id=es.id_codigo_cel",RIGHT);
 		$this->db->join("codigo_hab","codigo_hab.id=es.id_codigo_hab",RIGHT);
		$this->db->where("trabajo.actual", 1);
		$this->db->where("r.status", 1);
		$this->db->where("r.conciliado", 1);
		$this->db->where("r.academico", 1);
		$this->db->where("r.aspirante", 1);
		$this->db->where("a.id_periodo", $periodo);
		$this->db->GROUP_BY("es.id_usuario");
		
		$resultados = $this->db->get();
		//var_dump($this->db->queries);
			
			return $resultados->result();
		
			
	}

}
