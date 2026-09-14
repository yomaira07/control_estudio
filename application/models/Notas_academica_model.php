<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Notas_academica_model extends CI_Model {


	
	public function save($data){

		return $this->db->insert("notas_academica",$data);
		//$this->db->insert("notas_academica",$data);
		//var_dump($this->db->queries);
		//return 1;
	}

	


	public function update_nota($id, $data2){
		//var_dump($data2);
		$this->db->where("id_materias_preinscrita",$id);	
		//var_dump($this->db->queries);	
		
		
		return $this->db->update("notas_academica",$data2);
	}
	public function activar_nota($oferta, $data2){
		$this->db->where("id_oferta_academica",$oferta);		
		return$this->db->update("notas_academica",$data2);
	}
	
	public function activar_nota_linea($oferta, $data2){
		$this->db->join("oferta_academica oa","na.id_oferta_academica = oa.id");
		$this->db->where("id_oferta_academica",$oferta);		
		return $this->db->update("notas_academica na",$data2);
	}

	
public function getBuscarnotas($materia){
//echo $materia;
		$this->db->select("mp.*,mp.id as id_mp,oa.id as id_oa,es.id_usuario,
		es.nombre_primer as primer_nombre,es.nombre_segundo as segundo_nombre,
		es.apellido_segundo as segundo_apellido,es.apellido_primer as primer_apellido,
		es.cedula as cedula,es.nacionalidad as nacionalidad, na.*");
		$this->db->from("materias_preinscritas mp");
		$this->db->join("oferta_academica oa","mp.id_oferta_academica = oa.id");
		$this->db->join("notas_academica na","mp.id=na.id_materias_preinscrita",'left');
		$this->db->join("estudiante es","mp.id_usuario = es.id_usuario");
		$this->db->join("pensum pem","oa.id_pensum= pem.id");
		$this->db->join("programa pro","oa.id_programa= pro.id");
		
		$this->db->where("mp.id_oferta_academica",$materia);
		$this->db->where("mp.status",1);
		$this->db->where("mp.reg_pago",1);
		$this->db->where("mp.rev_academica",1);
		$this->db->order_by("es.apellido_primer");
	
		$resultado = $this->db->get();
		//var_dump($this->db->queries);
		return $resultado->result();

	}
	public function getBuscarnotasli($materia,$periodo){
		//echo $materia;
				$this->db->select("mp.*,mp.id as id_mp,es.id_usuario,es.nombre_primer as primer_nombre,
				es.nombre_segundo as segundo_nombre,es.apellido_segundo as segundo_apellido,
				es.apellido_primer as primer_apellido,es.cedula as cedula,es.nacionalidad as nacionalidad, na.*");
				$this->db->from("materias_preinscritas mp");
				$this->db->join("oferta_academica oa","mp.id_oferta_academica = oa.id");
				$this->db->join("notas_academica na","mp.id=na.id_materias_preinscrita",'left');
				$this->db->join("estudiante es","mp.id_usuario = es.id_usuario");
				$this->db->join("pensum pem","oa.id_pensum= pem.id");
				$this->db->join("programa pro","oa.id_programa= pro.id");
				$this->db->where("oa.id_periodo",$periodo);
				$this->db->where("oa.codigo",$materia);
				$this->db->where("mp.status",1);
				$this->db->where("mp.reg_pago",1);
				$this->db->where("mp.rev_academica",1);
				$this->db->order_by("es.apellido_primer");
			
				$resultado = $this->db->get();
				//var_dump($this->db->queries);
				return $resultado->result();
		
			}
	public function getBuscarMaeteria($id_nota){
//echo $materia;
		$this->db->select(" na.*");
		$this->db->from("notas_academica na");		
		
		$this->db->where("na.id_materias_preinscrita",$id_nota);
		
	
		$resultado = $this->db->get();
	//	var_dump($this->db->queries);
		if ($resultado->num_rows() > 0) {
			return true;
		}
		else{
			return false;
		}
		

	}
	public function getEstadoProceso($id_oferta_academica,$estado){
//echo $materia;
		$this->db->select(" na.*,es.id_sexo,es.nombre_primer as primer_nombre,es.nombre_segundo as segundo_nombre,es.apellido_segundo as segundo_apellido,es.apellido_primer as primer_apellido,es.cedula as cedula,es.nacionalidad as nacionalidad");
		$this->db->from("notas_academica na");	
		$this->db->join("materias_preinscritas mp","mp.id = na.id_materias_preinscrita");	
		$this->db->join("estudiante es", "es.id_usuario=mp.id_usuario" );
		$this->db->where("na.id_oferta_academica",$id_oferta_academica);
		$this->db->where_in("na.cerrar_proceso",$estado);
		$this->db->where("mp.status",1);
				
				$this->db->where("mp.reg_pago",1);
				$this->db->where("mp.rev_academica",1);
		$this->db->order_by("es.apellido_primer");
	
		$resultado = $this->db->get();
		//var_dump($this->db->queries);
	//	return $resultado->result();
if ($resultado->num_rows() > 0) {
			return $resultado->result();
		}
		else{
			return 0;
		}
		

	}
	public function getEstadoProcesoli($id_oferta_academica,$periodo,$estado){//23-09-2025
		// $estado= explode(",", $estado);
				$this->db->select(" na.*,mp.retiro,es.id_sexo,es.nombre_primer as primer_nombre,es.nombre_segundo as segundo_nombre,es.apellido_segundo as segundo_apellido,es.apellido_primer as primer_apellido,es.cedula as cedula,es.nacionalidad as nacionalidad");
				$this->db->from("notas_academica na");	
				$this->db->join("materias_preinscritas mp","mp.id = na.id_materias_preinscrita");	
				$this->db->join("oferta_academica oa","mp.id_oferta_academica = oa.id");	
				$this->db->join("estudiante es", "es.id_usuario=mp.id_usuario" );
				$this->db->join("periodo pe","oa.id_periodo = pe.id");	
				$this->db->where_in("oa.codigo",$id_oferta_academica);
				$this->db->where_in("na.cerrar_proceso",$estado);
				$this->db->where("oa.id_periodo",$periodo);
				$this->db->where("mp.status",1);
				$this->db->where("mp.status",1);
				$this->db->where("mp.reg_pago",1);
				$this->db->where("mp.rev_academica",1);
				$this->db->order_by("es.apellido_primer");
			
				$resultado = $this->db->get();
				//var_dump($this->db->queries);
			//	return $resultado->result();
		if ($resultado->num_rows() > 0) {
					return $resultado->result();
		}else{
					return false;
		}
	}


	public function getBuscarnotas_unidad($cedula,$id_pensum){
		//echo $materia;
		$this->db->query("SET sql_mode=(SELECT REPLACE(@@sql_mode, 'ONLY_FULL_GROUP_BY', ''));");
				
				$this->db->select("mp.id_usuario, mp.id_periodo,oa.id_programa,pe.nombre as periodo, p.nombre AS programa, na.nota_final");
				$this->db->from("materias_preinscritas mp");
				$this->db->join("notas_academica na","mp.id=na.id_materias_preinscrita");
				$this->db->join("oferta_academica oa","mp.id_oferta_academica = oa.id");
				$this->db->join("estudiante es","es.id_usuario = mp.id_usuario");
				$this->db->join("programa p","oa.id_programa = p.id");
				$this->db->join("pensum pen","oa.id_pensum = pen.id");
				$this->db->join("periodo pe","oa.id_periodo = pe.id");	
				$this->db->where("es.cedula",$cedula);
				$this->db->where_in("pen.id",$id_pensum);
				$this->db->where("mp.nenabled",1);
				$this->db->where("mp.reg_pago",1);
				$this->db->where("mp.rev_academica",1);
				$this->db->where("mp.retiro",0);
				$this->db->group_by("mp.id_periodo,programa, mp.id_usuario,pen.id,na.nota_final");
				$resultado = $this->db->get();
				//var_dump($this->db->queries);
				return $resultado->result();
		
			}
public function getBuscarnotas_todas($cedula){
				//echo $materia;
				$this->db->query("SET sql_mode=(SELECT REPLACE(@@sql_mode, 'ONLY_FULL_GROUP_BY', ''));");						
				$this->db->select("mp.id_usuario, mp.id_periodo,oa.id_programa,pe.nombre as periodo, 
				p.nombre AS programa,mp.retiro,pen.nombre as materia,pen.codigo as nomenclatura,p.prog_pertenece,
				 tr.nombre as trimestre, na.nota_final,pen.unidad_curricular");
				$this->db->from("materias_preinscritas mp");
				$this->db->join("notas_academica na","mp.id=na.id_materias_preinscrita",LEFT);
				$this->db->join("oferta_academica oa","mp.id_oferta_academica = oa.id");
				$this->db->join("estudiante es","es.id_usuario = mp.id_usuario");
				$this->db->join("programa p","oa.id_programa = p.id");
				$this->db->join("pensum pen","oa.id_pensum = pen.id");
				$this->db->join("periodo pe","oa.id_periodo = pe.id");	
				$this->db->join("trimestre tr","pen.id_trimestre = tr.id");	
				$this->db->where("es.cedula",$cedula);
				$this->db->where("mp.nenabled",1);
				$this->db->where("mp.status",1);
				$this->db->where("mp.reg_pago",1);
				$this->db->where("mp.rev_academica",1);
				//$this->db->where_in("mp.retiro",array(0,1));
				$this->db->group_by("programa,mp.id_periodo, mp.id_usuario,pen.id");
				$this->db->order_by("p.prog_pertenece,trimestre");

				$resultado = $this->db->get();
				//var_dump($this->db->queries);
				return $resultado->result();
		
			}

}



