<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inscripcion_model extends CI_Model {

	
public function list_inscripcion($periodo,$idprograma,$modalidad,$trimestre,$seccion)
	 {
		//var_dump($modalidad);
		//var_dump($idprograma);var_dump($idprograma);var_dump($idprograma);var_dump($idprograma);var_dump($idprograma);	
		$idprograma = explode(",", $idprograma);// se transforma la variable tipo array para poder llevar al where in
		$modalidad = explode(",", $modalidad);// se transforma la variable tipo array para poder llevar al where in
		$seccion = explode(",", $seccion);
		//$trimestre =explode(",", $trimestre); 
		$codigo= array('PERM','INSC');
		//echo"OFERTA REGULAR";
		//var_dump($trimestre);		
		$this->db->select("oa.*,pen.nombre as pensums,prog.nombre as programas,doc.primer_nombre as primernombre, doc.primer_apellido as primerapellido,dia_class.descripcion as dia");
		$this->db->from("oferta_academica oa");
		$this->db->join("pensum pen","oa.id_pensum = pen.id");
		$this->db->join("programa prog","oa.id_programa = prog.id");
		$this->db->join("docente doc","oa.id_docente = doc.id");
		$this->db->join("dia_clase dia_class","oa.id_dia_clase = dia_class.id");
		$this->db->where_in("oa.id_programa", $idprograma);// se condiciona el arreglo como varias programas 
		$this->db->where_in("oa.modalidad", $modalidad);
		$this->db->where_in("oa.trimestre",$trimestre);
		$this->db->where_in("oa.seccion",$seccion);
		$this->db->where("oa.id_periodo",$periodo);
		$this->db->where_not_in("oa.codigo",$codigo);
		$this->db->where("oa.status",1);
		$this->db->order_by("oa.id_programa,trimestre,programas,pensums");
		$output = $this->db->get();
		//var_dump($this->db->queries);
		return $output->result();
	 }
	 public function list_inscripcion_oferta($periodo, $idprograma,$modalidad, $id_oferta)
	 {
		//var_dump($modalidad);
		//var_dump($idprograma);var_dump($idprograma);var_dump($idprograma);var_dump($idprograma);var_dump($idprograma);	
		$codigo= array('TEG','TG','PERM','INSC');
		$idprograma = explode(",", $idprograma);// se transforma la variable tipo array para poder llevar al where in
		$modalidad = explode(",", $modalidad);// se transforma la variable tipo array para poder llevar al where in
		//$trimestre = explode(",", $trimestre);// se transforma la variable tipo array para poder llevar al where in
		$this->db->select("oa.*,pen.nombre as pensums,prog.nombre as programas,doc.primer_nombre as primernombre, doc.primer_apellido as primerapellido,dia_class.descripcion as dia");
		$this->db->from("oferta_academica oa");
		$this->db->join("pensum pen","oa.id_pensum = pen.id");
		$this->db->join("programa prog","oa.id_programa = prog.id");
		$this->db->join("docente doc","oa.id_docente = doc.id");
		$this->db->join("dia_clase dia_class","oa.id_dia_clase = dia_class.id");
		$this->db->where_in('oa.id_programa', $idprograma);// se condiciona el arreglo como varias programas 
		$this->db->where_in('oa.modalidad', $modalidad);// se condiciona el arreglo como varias programas 
		$this->db->where_not_in("oa.codigo",$codigo);
		$this->db->where("oa.id",$id_oferta);
		$this->db->where("oa.status",1);
		$this->db->order_by("oa.id_programa,trimestre,programas,pensums");		
	//	var_dump($output->result());
		$output = $this->db->get();
	//	var_dump($db->queries);
		return $output->row();


	 }
	 public function list_inscripcion_nuevo_ingreso($periodo, $idprograma,$trimestre,$modalidad,$seccion)
	 {
		
		$idprograma = explode(",", $idprograma);// se transforma la variable tipo array para poder llevar al where in
		$trimestre = explode(",", $trimestre);// se transforma la variable tipo array para poder llevar al where in
		$modalidad = explode(",", $modalidad);// se transforma la variable tipo array para poder llevar al where in
		$seccion = explode(",", $seccion);
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
		$this->db->where_not_in("oa.codigo",'INSC');
		$this->db->where_in("oa.modalidad",$modalidad);
		$this->db->where_in("oa.seccion",$seccion);
		$this->db->where("oa.id_periodo",$periodo);
		$this->db->where("oa.status",1);
	//	$this->db->where("oa.cupos_ocupados < oa.cupos");
		$this->db->order_by("programas,pensums,oa.trimestre");//oa.id_programa");

		$output = $this->db->get();
//		var_dump($this->db->queries);
		return $output->result();


	 }
	 public function list_inscripcion_linea_investigacion($periodo, $idprograma)
	 {
		
		//$idprograma = explode(",", $idprograma);// se transforma la variable tipo array para poder llevar al where in
		$trimestre = explode(",", $trimestre);// se transforma la variable tipo array para poder llevar al where in
		$modalidad = explode(",", $modalidad);// se transforma la variable tipo array para poder llevar al where in
	
//var_dump($modalidad);
//var_dump($trimestre);
		$this->db->select("oa.*,pen.nombre as pensums,prog.nombre as programas,doc.primer_nombre as primernombre, 
		doc.primer_apellido as primerapellido,dia_class.descripcion as dia");
		$this->db->from("oferta_academica oa");
		$this->db->join("pensum pen","oa.id_pensum = pen.id");
		$this->db->join("programa prog","oa.id_programa = prog.id");
		$this->db->join("docente doc","oa.id_docente = doc.id");
		$this->db->join("dia_clase dia_class","oa.id_dia_clase = dia_class.id");
		$this->db->where_in('oa.id_programa', $idprograma);// se condiciona el arreglo como varias programas 
		$this->db->where_in("oa.trimestre",'LÍNEA DE INVESTIGACIÓN');
			
		$this->db->where("oa.id_periodo",$periodo);
		$this->db->where("oa.status",1);
	
		$this->db->order_by("programas,pensums,oa.trimestre");//oa.id_programa");

		$output = $this->db->get();
		//var_dump($this->db->queries);
		return $output->result();


	 }
 public function list_inscripcion_nuevo_ingreso_sin_prelacion($periodo, $idprograma,$trimestre,$modalidad,$excluir)
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
		$this->db->where_not_in("oa.codigo",'INSC');
		$this->db->where_in("oa.modalidad",$modalidad);
		$this->db->where_not_in("oa.id_pensum",$excluir);
		$this->db->where("oa.id_periodo",$periodo);
		$this->db->where("oa.status",1);
	//	$this->db->where("oa.cupos_ocupados < oa.cupos");
		$this->db->order_by("programas,pensums,oa.trimestre");//oa.id_programa");

		$output = $this->db->get();
		//var_dump($this->db->queries);
		return $output->result();


	 }
 public function list_inscripcion_permanencia($periodo, $idprograma,$modalidad)
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
		$this->db->where_in("oa.codigo",'PERM');
		$this->db->where_in("oa.modalidad",$modalidad);
		$this->db->where("oa.id_periodo",$periodo);
		$this->db->where("oa.status",1);
	//	$this->db->where("oa.cupos_ocupados < oa.cupos");
		$this->db->order_by("programas,oa.trimestre,pensums");//oa.id_programa");

		$output = $this->db->get();
		//var_dump($this->db->queries);
		return $output->result();


	 }

	 public function list_inscripcion_solo_inscripcion($periodo, $idprograma,$modalidad,$seccion)
	 {
		
		$idprograma = explode(",", $idprograma);// se transforma la variable tipo array para poder llevar al where in
		$trimestre = explode(",", $trimestre);// se transforma la variable tipo array para poder llevar al where in
		$modalidad = explode(",", $modalidad);// se transforma la variable tipo array para poder llevar al where in
		$seccion = explode(",", $seccion);
//var_dump($modalidad);
//var_dump($trimestre);
$codigo= array('PERM');
		$this->db->select("oa.*,pen.nombre as pensums,prog.nombre as programas,doc.primer_nombre as primernombre, doc.primer_apellido as primerapellido,dia_class.descripcion as dia");
		$this->db->from("oferta_academica oa");
		$this->db->join("pensum pen","oa.id_pensum = pen.id");
		$this->db->join("programa prog","oa.id_programa = prog.id");
		$this->db->join("docente doc","oa.id_docente = doc.id");
		$this->db->join("dia_clase dia_class","oa.id_dia_clase = dia_class.id");
		$this->db->where_in('oa.id_programa', $idprograma);// se condiciona el arreglo como varias programas 
		$this->db->where_not_in("oa.codigo",$codigo);
		$this->db->where_in("oa.modalidad",$modalidad);
		$this->db->where_in("oa.seccion",$seccion);
		$this->db->where("oa.id_periodo",$periodo);
		$this->db->where("oa.status",1);
	//	$this->db->where("oa.cupos_ocupados < oa.cupos");
		$this->db->order_by("programas,oa.trimestre,pensums");//oa.id_programa");

		$output = $this->db->get();
		//var_dump($this->db->queries);
		return $output->result();



	 }
public function list_inscripcion_solo_teg($periodo, $idprograma)
	 {
		
		$idprograma = explode(",", $idprograma);// se transforma la variable tipo array para poder llevar al where in
		$trimestre = explode(",", $trimestre);// se transforma la variable tipo array para poder llevar al where in
		$modalidad = explode(",", $modalidad);// se transforma la variable tipo array para poder llevar al where in
		$codigo= array('TEG','TG');
//var_dump($modalidad);
//var_dump($trimestre);
		$this->db->select("oa.*,pen.nombre as pensums,prog.nombre as programas,doc.primer_nombre as primernombre, doc.primer_apellido as primerapellido,dia_class.descripcion as dia");
		$this->db->from("oferta_academica oa");
		$this->db->join("pensum pen","oa.id_pensum = pen.id");
		$this->db->join("programa prog","oa.id_programa = prog.id");
		$this->db->join("docente doc","oa.id_docente = doc.id");
		$this->db->join("dia_clase dia_class","oa.id_dia_clase = dia_class.id");
		$this->db->where_in('oa.id_programa', $idprograma);// se condiciona el arreglo como varias programas 
		$this->db->where_in("oa.codigo",$codigo);
	//	$this->db->where_in("oa.modalidad",$modalidad);
		$this->db->where("oa.id_periodo",$periodo);
		$this->db->where("oa.status",1);
	//	$this->db->where("oa.cupos_ocupados < oa.cupos");
		$this->db->order_by("programas,pensums,oa.trimestre");//oa.id_programa");

		$output = $this->db->get();
	//	var_dump($this->db->queries);
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
		
		
		
		$this->db->select("oa.*,pen.nombre as pensums,prog.nombre as programas,doc.primer_nombre as primernombre, doc.primer_apellido as primerapellido,dia_class.descripcion as dia, seccion.nombre as secc");
		$this->db->from("oferta_academica oa");
		$this->db->join("pensum pen","oa.id_pensum = pen.id");
		$this->db->join("programa prog","oa.id_programa = prog.id");
		$this->db->join("docente doc","oa.id_docente = doc.id");
		$this->db->join("dia_clase dia_class","oa.id_dia_clase = dia_class.id");
$this->db->join("seccion","oa.seccion = seccion.id");
		$this->db->where("oa.id_periodo",$periodo);
		$this->db->where("oa.status",1);
		//$this->db->where("oa.cupos_ocupados < oa.cupos");
		$this->db->order_by("oa.id_programa,oa.trimestre,seccion.nombre");

		$output = $this->db->get();
	
		return $output->result();


	 }

public function list_preinscripcion($datos_str,$id_periodo)
	 {
			
		$datos_str = explode(",", $datos_str);// se transforma la variable tipo array para poder llevar al where in

		$this->db->select("oa.*,pen.nombre as pensums,prog.nombre as programas,doc.primer_nombre as primernombre, 
		doc.primer_apellido as primerapellido,dia_class.descripcion as dia,cupos,cupos_ocupados,prog.tipo_programa");
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



