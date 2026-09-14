<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inscripcion_model extends CI_Model {

	
public function list_inscripcion($periodo, $idprograma,$modalidad,$trimestre)
	 {
		//var_dump($modalidad);
		//var_dump($idprograma);var_dump($idprograma);var_dump($idprograma);var_dump($idprograma);var_dump($idprograma);	
		$idprograma = explode(",", $idprograma);// se transforma la variable tipo array para poder llevar al where in
		$modalidad = explode(",", $modalidad);// se transforma la variable tipo array para poder llevar al where in
		$trimestre = explode(",", $trimestre);// se transforma la variable tipo array para poder llevar al where in
		$this->db->select("oa.*,pen.nombre as pensums,prog.nombre as programas,doc.primer_nombre as primernombre, doc.primer_apellido as primerapellido,dia_class.descripcion as dia");
		$this->db->from("oferta_academica oa");
		$this->db->join("pensum pen","oa.id_pensum = pen.id");
		$this->db->join("programa prog","oa.id_programa = prog.id");
		$this->db->join("docente doc","oa.id_docente = doc.id");
		$this->db->join("dia_clase dia_class","oa.id_dia_clase = dia_class.id");
		$this->db->where_in('oa.id_programa', $idprograma);// se condiciona el arreglo como varias programas 
		$this->db->where_in('oa.modalidad', $modalidad);// se condiciona el arreglo como varias programas 
		$this->db->where_in('oa.trimestre', $trimestre);// se condiciona el arreglo como varias programas 
		//$this->db->where("oa.id_programa",2);
		$this->db->where("oa.id_periodo",$periodo);
		$this->db->where("oa.status",1);
//		$this->db->where("oa.cupos_ocupados < oa.cupos");
		$this->db->order_by("oa.id_programa,trimestre,programas,pensums");
		//var_dump($db->queries);
	//	var_dump($output->result());
		$output = $this->db->get();
		
		return $output->result();


	 }
	 public function list_inscripcion_nuevo_ingreso($periodo, $idprograma,$trimestre,$modalidad)
	 {
		
		$idprograma = explode(",", $idprograma);// se transforma la variable tipo array para poder llevar al where in
		$trimestre = explode(",", $trimestre);// se transforma la variable tipo array para poder llevar al where in
		$modalidad = explode(",", $modalidad);// se transforma la variable tipo array para poder llevar al where in
//var_dump($modalidad);
//var_dump($trimestre);
		$this->db->select("oa.*,pen.nombre as pensums,prog.nombre as programas,doc.primer_nombre as primernombre, doc.primer_apellido as primerapellido,dia_class.descripcion as dia");
		$this->db->from("oferta_academica oa");
		$this->db->join("pensum pen","oa.id_pensum = pen.id");
		$this->db->join("programa prog","oa.id_programa = prog.id");
		$this->db->join("docente doc","oa.id_docente = doc.id");
		$this->db->join("dia_clase dia_class","oa.id_dia_clase = dia_class.id");
		$this->db->where_in('oa.id_programa', $idprograma);// se condiciona el arreglo como varias programas 
		$this->db->where_in("oa.trimestre",$trimestre);
		$this->db->where_in("oa.modalidad",$modalidad);
		$this->db->where("oa.id_periodo",$periodo);
		$this->db->where("oa.status",1);
	//	$this->db->where("oa.cupos_ocupados < oa.cupos");
		$this->db->order_by("programas,pensums,oa.trimestre");//oa.id_programa");

		$output = $this->db->get();
//		var_dump($this->db->queries);
		return $output->result();


	 }
	 public function list_inscripcion_inscritas($periodo, $idprograma)
	 {
		
		//var_dump($idprograma);var_dump($idprograma);var_dump($idprograma);var_dump($idprograma);var_dump($idprograma);	
		$idprograma = explode(",", $idprograma);// se transforma la variable tipo array para poder llevar al where in
		$this->db->select("oa.*,pen.nombre as pensums,prog.nombre as programas,doc.primer_nombre as primernombre, doc.primer_apellido as primerapellido,dia_class.descripcion as dia");
		$this->db->from("oferta_academica oa");
		$this->db->join("pensum pen","oa.id_pensum = pen.id");
		$this->db->join("programa prog","oa.id_programa = prog.id");
		$this->db->join("docente doc","oa.id_docente = doc.id");
		$this->db->join("dia_clase dia_class","oa.id_dia_clase = dia_class.id");
		$this->db->where_in('oa.id_programa', $idprograma);// se condiciona el arreglo como varias programas 
		//$this->db->where("oa.id_programa",2);
		$this->db->where("oa.id_periodo",$periodo);
		$this->db->where("oa.status",1);
		//$this->db->where("oa.cupos_ocupados < oa.cupos");
		$this->db->order_by("programas,oa.id_programa");
		$output = $this->db->get();

		//var_dump($output->result());
		return $output->result();


	 }
	 public function list_inscripcion2($periodo)//para la revision academica del supervisor
	 {
		
		
		
		$this->db->select("oa.*,pen.nombre as pensums,prog.nombre as programas,doc.primer_nombre as primernombre, doc.primer_apellido as primerapellido,dia_class.descripcion as dia");
		$this->db->from("oferta_academica oa");
		$this->db->join("pensum pen","oa.id_pensum = pen.id");
		$this->db->join("programa prog","oa.id_programa = prog.id");
		$this->db->join("docente doc","oa.id_docente = doc.id");
		$this->db->join("dia_clase dia_class","oa.id_dia_clase = dia_class.id");
		$this->db->where("oa.id_periodo",$periodo);
		$this->db->where("oa.status",1);
		//$this->db->where("oa.cupos_ocupados < oa.cupos");
		$this->db->order_by("oa.id_programa");

		$output = $this->db->get();
	
		return $output->result();


	 }

public function list_preinscripcion($datos_str,$id_periodo)
	 {
			
		$datos_str = explode(",", $datos_str);// se transforma la variable tipo array para poder llevar al where in

		$this->db->select("oa.*,pen.nombre as pensums,prog.nombre as programas,doc.primer_nombre as primernombre, doc.primer_apellido as primerapellido,dia_class.descripcion as dia,cupos,cupos_ocupados");
		$this->db->from("oferta_academica oa");
		$this->db->join("pensum pen","oa.id_pensum = pen.id");
		$this->db->join("programa prog","oa.id_programa = prog.id");
		$this->db->join("docente doc","oa.id_docente = doc.id");
		$this->db->join("dia_clase dia_class","oa.id_dia_clase = dia_class.id");
		$this->db->where("oa.id_periodo",$id_periodo);
		$this->db->where_in("oa.id",$datos_str);
		$this->db->where("oa.status",1);
		//$this->db->where("oa.cupos_ocupados < oa.cupos");
		$this->db->order_by("oa.id_programa");

		$output = $this->db->get();
		//var_dump($this->db->queries);
	
		return $output->result();

	 }


	
}

