<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Materias_preinscrita_model extends CI_Model {


	public function getMaterias_preinscritas(){
		$this->db->order_by('id_usuario', 'ASC');
		$resultados = $this->db->get("materias_preiscritas");
		return $resultados->result();
	}

	public function save($data){

		return $this->db->insert("materias_preinscritas",$data);
	}

	public function lista_preinscritas($id_usuario){
		$this->db->where('id_usuario', $id_usuario);
		$resultados = $this->db->get("materias_preinscritas");
		return $resultados->result();
	}
	public function verificar_matricula($id){
		$this->db->select("mp.*,oa.trimestre as trimestre,oa.valorpubgen as valorpubgen,oa.valorpubmp as valorpubmp,p.nombre as programa,oa.unidades_creditos as uc,d.primer_nombre as nombre,d.primer_apellido as apellido,pen.nombre as unidad_curricular, concat(es.apellido_primer,' ', es.nombre_primer) as datos, es.cedula, es.nacionalidad,pen.codigo") ;
		$this->db->from("materias_preinscritas mp");
		$this->db->join("oferta_academica oa","mp.id_oferta_academica = oa.id");
		$this->db->join("programa p","oa.id_programa = p.id");
		$this->db->join("docente d","oa.id_docente = d.id");
		$this->db->join("pensum pen","oa.id_pensum = pen.id");
		$this->db->join("estudiante es","mp.id_usuario = es.id_usuario");
		$this->db->where("mp.id",$id);		
		$this->db->where("mp.status",1);
		$this->db->where("mp.reg_pago",1);
		$this->db->where("mp.rev_academica",1);
		$resultados = $this->db->get();
		return $resultados->result();
	}
	public function verificar($id_usuario,$id_periodo){
		$this->db->where('id_usuario', $id_usuario);
		$this->db->where('id_periodo', $id_periodo);
		$this->db->where('status', 1);
		$resultados = $this->db->get("materias_preinscritas");
		//var_dump($this->db->queries);
		if ($resultados->num_rows() > 0) {
			return $resultados->result();
		}
		else{
			return false;
		}
	
	}
	public function verificar_pre_incritas($id_usuario,$id_periodo,$cod_oferta){
		$this->db->where('id_usuario', $id_usuario);
		$this->db->where('id_periodo', $id_periodo);
		$this->db->where('id_oferta_academica', $cod_oferta);
		$resultados = $this->db->get("materias_preinscritas");
		return $resultados->result();
	}
public function lista_programas_preinscritas($id_usuario,$periodo){
		$this->db->query("SET sql_mode=(SELECT REPLACE(@@sql_mode, 'ONLY_FULL_GROUP_BY', ''));");	
		$this->db->select("oa.unidades_creditos,oa.valorpubmp,oa.valorpubgen, oa.id_programa,p.nombre,p.tipo_programa");
		$this->db->from("materias_preinscritas mp");
		$this->db->join("oferta_academica oa","mp.id_oferta_academica = oa.id");
		$this->db->join("programa p","oa.id_programa = p.id");
		$this->db->where('mp.id_usuario', $id_usuario);		
		$this->db->where('mp.id_periodo', $periodo);	
	
		$this->db->where('mp.status',1);
		$this->db->group_by('oa.id_programa');
		$resultados = $this->db->get();
	//var_dump($this->db->queries);
		return $resultados->result();
	}
public function lista_programas_preinscritas_trimestre($id_usuario,$periodo){
		$this->db->query("SET sql_mode=(SELECT REPLACE(@@sql_mode, 'ONLY_FULL_GROUP_BY', ''));");	
		$this->db->select("sum(oa.unidades_creditos) as unidades_creditos,oa.valorpubmp,oa.valorpubgen, oa.id_programa,p.nombre,p.tipo_programa,oa.trimestre");
		$this->db->from("materias_preinscritas mp");
		$this->db->join("oferta_academica oa","mp.id_oferta_academica = oa.id");
		$this->db->join("programa p","oa.id_programa = p.id");
		$this->db->where('mp.id_usuario', $id_usuario);		
		$this->db->where('mp.id_periodo', $periodo);	
	
		$this->db->where('mp.status',1);
		$this->db->group_by('oa.id_programa','oa.trimestre');
		$resultados = $this->db->get();
	//var_dump($this->db->queries);
		return $resultados->result();
	}
public function lista_programas_preinscritas1($id_usuario,$periodo){
		$this->db->query("SET sql_mode=(SELECT REPLACE(@@sql_mode, 'ONLY_FULL_GROUP_BY', ''));");	
		$this->db->select("oa.unidades_creditos,oa.valorpubmp,oa.valorpubgen, oa.id_programa,p.nombre,p.tipo_programa,p.prog_pertenece");
		$this->db->from("materias_preinscritas mp");
		$this->db->join("oferta_academica oa","mp.id_oferta_academica = oa.id");
		$this->db->join("programa p","oa.id_programa = p.id");
		$this->db->where('mp.id_usuario', $id_usuario);		
		$this->db->where('mp.id_periodo', $periodo);	
	
		$this->db->where('mp.status',1);
		$this->db->group_by('p.prog_pertenece');
		$resultados = $this->db->get();
	//var_dump($this->db->queries);
		return $resultados->result();
	}
	public function lista_preinscritas_pago($id_usuario){
		$this->db->select("mp.*,oa.trimestre as trimestre,oa.valorpubgen as valorpubgen,
		oa.valorpubmp as valorpubmp,p.nombre as programa,oa.unidades_creditos as uc,
		d.primer_nombre as nombre,d.primer_apellido as apellido,pen.nombre as unidad_curricular,p.tipo_programa");
		$this->db->from("materias_preinscritas mp");
		$this->db->join("oferta_academica oa","mp.id_oferta_academica = oa.id");
		$this->db->join("programa p","oa.id_programa = p.id");
		$this->db->join("docente d","oa.id_docente = d.id");
		$this->db->join("pensum pen","oa.id_pensum = pen.id");
		$this->db->join("periodo pe","oa.id_periodo = pe.id");
		$this->db->where("mp.id_usuario",$id_usuario);
		$this->db->where("mp.reg_pago",0);
		$this->db->where("mp.nenabled",1);
		$this->db->where("mp.status",1);
		$this->db->where("pe.status",1);
		$this->db->order_by("oa.trimestre","ASC");
		$resultados = $this->db->get();
		//var_dump($this->db->queries);
			return $resultados->result();
	}
	public function update($id,$data2){
		$id = explode(",", $id);
		//var_dump($id);
		$this->db->where_in('id',$id);
		
		return  $this->db->update("materias_preinscritas",$data2);
	}
	public function update_materia($id,$id_periodo, $data2){
		//echo $id.' '.$id_periodo. var_dump( $data2);
				$this->db->where("id_usuario",$id);
		$this->db->where("id_periodo",$id_periodo);
	
		//var_dump($this->db->queries);
		return 	$this->db->update("materias_preinscritas",$data2);
	}
	public function update_materia_aprobada($id_usuario,$id_periodo,$cod_materia,$data2){
		$cod_materia = explode(",", $cod_materia);
		$this->db->where('id_usuario', $id_usuario);
		$this->db->where('id_periodo', $id_periodo);
		$this->db->where_in('id', $cod_materia);
		
			//var_dump($this->db->queries);
		return $this->db->update("materias_preinscritas",$data2);
	}
	public function update_materia_estatus($id,$id_periodo, $data2){
		$this->db->where("id_usuario",$id);
		$this->db->where("id_periodo",$id_periodo);
				$this->db->where("status",1);
		return $this->db->update("materias_preinscritas",$data2);
	}
	public function update_materia_activar($id_usuario,$id_periodo,$cod_oferta,$data2){
		$cod_oferta = explode(",", $cod_oferta);
		$this->db->where('id_usuario', $id_usuario);
		$this->db->where('id_periodo', $id_periodo);
		$this->db->where_in('id_oferta_academica', $cod_oferta);
		
			//var_dump($this->db->queries);
		return $this->db->update("materias_preinscritas",$data2);
	}
	public function update_matricula($id, $data2){
		$this->db->where("id",$id);
		
	//	var_dump($this->db->queries);
		return $this->db->update("materias_preinscritas",$data2);
	}
	public function RegistradoMateria($id_usuario,$id_periodo){

		$this->db->where("id_usuario",$id_usuario);
		$this->db->where("id_periodo",$id_periodo);
		$resultados = $this->db->get("materias_preinscritas");
		

		if ($resultados->num_rows() > 0) {
			return true;
		}
		else{
			return false;
		}
	}


	public function Materias_inscritas($materia){

		$this->db->select("mp.*,mp.id as id_matricula,ltr.lugar_trabajo as trabajo,es.id_sexo,es.nombre_primer as primer_nombre,
		es.nombre_segundo as segundo_nombre,es.apellido_segundo as segundo_apellido,es.apellido_primer as primer_apellido,es.cedula as cedula,es.nacionalidad as nacionalidad,es.correo as correo,
		CONCAT(codigo_cel.descripcion,es.tel_celular) AS tel_cel,es.tel_habitacion as tel_hab, pem.nombre,oa.codigo,pro.nombre as programa_nombre,
		dc.descripcion as dia ");
		$this->db->from("materias_preinscritas mp");
		$this->db->join("oferta_academica oa","mp.id_oferta_academica = oa.id");
		$this->db->join("dia_clase dc","dc.id = oa.id_dia_clase");
		$this->db->join("estudiante es","mp.id_usuario = es.id_usuario");
		$this->db->join("trabajo tr","es.id_usuario = tr.id_usuario");
		$this->db->join("lugar_trabajo ltr","ltr.id = tr.id_lugar_trabajo");
		$this->db->join("codigo_cel","codigo_cel.id=es.id_codigo_cel",RIGHT);
		$this->db->join("pensum pem","oa.id_pensum= pem.id");
		$this->db->join("programa pro","oa.id_programa= pro.id");

		$this->db->where("mp.id_oferta_academica",$materia);
		$this->db->where("mp.status",1);
		$this->db->where("mp.reg_pago",1);
		$this->db->where("mp.rev_academica",1);
		$this->db->where("tr.actual",1);
		$this->db->order_by("es.apellido_primer");
$resultado = $this->db->get();
		//var_dump($this->db->queries);
		return $resultado->result();

	}
	public function Materias_inscritasli($materia,$periodo){// 23-09-2025

		$this->db->select("mp.*,mp.id as id_matricula,ltr.lugar_trabajo as trabajo,es.id_sexo,es.nombre_primer as primer_nombre,
		es.nombre_segundo as segundo_nombre,es.apellido_segundo as segundo_apellido,es.apellido_primer as primer_apellido,es.cedula as cedula,es.nacionalidad as nacionalidad,es.correo as correo,
		CONCAT(codigo_cel.descripcion,es.tel_celular) AS tel_cel,es.tel_habitacion as tel_hab, pem.nombre,oa.codigo,pro.nombre as programa_nombre,
		dc.descripcion as dia ");
		$this->db->from("materias_preinscritas mp");
		$this->db->join("oferta_academica oa","mp.id_oferta_academica = oa.id");
		$this->db->join("dia_clase dc","dc.id = oa.id_dia_clase");
		$this->db->join("estudiante es","mp.id_usuario = es.id_usuario");
		$this->db->join("trabajo tr","es.id_usuario = tr.id_usuario");
		$this->db->join("lugar_trabajo ltr","ltr.id = tr.id_lugar_trabajo");
		$this->db->join("codigo_cel","codigo_cel.id=es.id_codigo_cel",RIGHT);
		$this->db->join("pensum pem","oa.id_pensum= pem.id");
		$this->db->join("programa pro","oa.id_programa= pro.id");
		$this->db->join("pensum pen","oa.id_pensum = pen.id");
		$this->db->join("periodo pe","oa.id_periodo = pe.id");	
		$this->db->where("oa.codigo",$materia);
		$this->db->where("mp.status",1);
		$this->db->where("mp.reg_pago",1);
		$this->db->where("mp.rev_academica",1);
		$this->db->where("oa.id_periodo",$periodo);
		$this->db->where("tr.actual",1);
		$this->db->order_by("es.apellido_primer");
$resultado = $this->db->get();
	//	var_dump($this->db->queries);
		return $resultado->result();

	}
	public function Materias_inscritasli_periodo($materia,$periodo){

		$this->db->select("mp.*,mp.id as id_matricula,ltr.lugar_trabajo as trabajo,es.id_sexo,es.nombre_primer as primer_nombre,
		es.nombre_segundo as segundo_nombre,es.apellido_segundo as segundo_apellido,es.apellido_primer as primer_apellido,es.cedula as cedula,es.nacionalidad as nacionalidad,es.correo as correo,
		CONCAT(codigo_cel.descripcion,es.tel_celular) AS tel_cel,es.tel_habitacion as tel_hab, pem.nombre,oa.codigo,pro.nombre as programa_nombre,
		dc.descripcion as dia ");
		$this->db->from("materias_preinscritas mp");
		$this->db->join("oferta_academica oa","mp.id_oferta_academica = oa.id");
		$this->db->join("dia_clase dc","dc.id = oa.id_dia_clase");
		$this->db->join("estudiante es","mp.id_usuario = es.id_usuario");
		$this->db->join("trabajo tr","es.id_usuario = tr.id_usuario");
		$this->db->join("lugar_trabajo ltr","ltr.id = tr.id_lugar_trabajo");
		$this->db->join("codigo_cel","codigo_cel.id=es.id_codigo_cel",RIGHT);
		$this->db->join("pensum pem","oa.id_pensum= pem.id");
		$this->db->join("programa pro","oa.id_programa= pro.id");
		$this->db->join("pensum pen","oa.id_pensum = pen.id");
		$this->db->join("periodo pe","oa.id_periodo = pe.id");	
		$this->db->where("oa.codigo",$materia);
		$this->db->where("oa.id_periodo",$periodo);
		$this->db->where("mp.status",1);
		$this->db->where("mp.reg_pago",1);
		$this->db->where("mp.rev_academica",1);
		//$this->db->where("pe.status_notas",1);
		$this->db->where("tr.actual",1);
		$this->db->order_by("es.apellido_primer");
$resultado = $this->db->get();
	//	var_dump($this->db->queries);
		return $resultado->result();

	}
public function materias_inscritas_cedula($cedula){//materias inscritas por cedula
		$this->db->query("SET sql_mode=(SELECT REPLACE(@@sql_mode, 'ONLY_FULL_GROUP_BY', ''));");
		
		$this->db->select("mp.id_usuario, mp.id_periodo,oa.id_programa,pe.nombre as periodo, p.nombre AS programa");
		$this->db->from("materias_preinscritas mp");
		$this->db->join("oferta_academica oa","mp.id_oferta_academica = oa.id");
		$this->db->join("estudiante es","es.id_usuario = mp.id_usuario");
		$this->db->join("programa p","oa.id_programa = p.id");
		$this->db->join("pensum pen","oa.id_pensum = pen.id");
		$this->db->join("periodo pe","oa.id_periodo = pe.id");	
		$this->db->where("es.cedula",$cedula);
		$this->db->where("mp.nenabled",1);
		$this->db->where("mp.reg_pago",1);
		$this->db->where("mp.rev_academica",1);
		$this->db->group_by("mp.id_periodo,programa, mp.id_usuario");
		$resultado = $this->db->get();
		//var_dump($this->db->queries);
		return $resultado->result();

	}
	public function aspirantes_cedula($cedula){//aspirantes inscritos por cedula
		$this->db->query("SET sql_mode=(SELECT REPLACE(@@sql_mode, 'ONLY_FULL_GROUP_BY', ''));");
		
		$this->db->select("a.id_usuario, a.id_periodo,a.id_programa,pe.nombre as periodo, p.nombre AS programa");
		$this->db->from("aspirantes a");
		$this->db->join("registro_pago r","r.id_usuario = a.id_usuario");
		$this->db->join("estudiante es","es.id_usuario = a.id_usuario");
		$this->db->join("programa p","a.id_programa = p.id");
		$this->db->join("periodo pe","a.id_periodo = pe.id");	
		$this->db->where("es.cedula",$cedula);
		$this->db->where("a.nenabled",1);
		$this->db->where("a.reg_pago",1);
		$this->db->where("a.rev_academica",1);
		$this->db->where("a.rol_id",7);
		$this->db->group_by("a.id_periodo,programa");
		$resultado = $this->db->get();
		//var_dump($this->db->queries);
		return $resultado->result();

	}
	public function Materias_inscritas_disponible($materia){


		$this->db->select("count(mp.id_usuario), COUNT(mp.id_usuario)AS ocupados,oa.cupos ,mp.id_oferta_academica ,oa.id_pensum");
		$this->db->from("materias_preinscritas mp");
		$this->db->join("oferta_academica oa","mp.id_oferta_academica = oa.id");
		$this->db->join("pensum pem","oa.id_pensum= pem.id");
		$this->db->where("mp.id_oferta_academica",$materia);
		$this->db->where("mp.status",1);
		$this->db->group_by("mp.id_oferta_academica" ,"oa.id_pensum");
		
		$resultado = $this->db->get();
	
		return $resultado->result();

	}

	public function revicion_academica($id_usuario,$id_periodo){

		$this->db->where("id_usuario",$id_usuario);
		$this->db->where("id_periodo",$id_periodo);
	
		$resultados = $this->db->get("materias_preinscritas");
		
			return $resultados->row();
		
		
		}


	public function programas_inscritos($cedula){
	//	var_dump($this->db->queries);
	$programa=array(7,8,9,27,28);
		$this->db->query("SET sql_mode=(SELECT REPLACE(@@sql_mode, 'ONLY_FULL_GROUP_BY', ''));");
		$this->db->select("pr.*");
		$this->db->from("materias_preinscritas mp");
		$this->db->join("oferta_academica oa","mp.id_oferta_academica = oa.id");
		$this->db->join("programa pr","oa.id_programa = pr.id");
		$this->db->join("estudiante es","es.id_usuario = mp.id_usuario");
		$this->db->where("mp.status",1 );
		$this->db->where("mp.reg_pago",1 );
		$this->db->where("mp.rev_academica",1 );
		$this->db->where("es.cedula",$cedula );
		$this->db->where_not_in("pr.id",$programa );
		$this->db->group_by("oa.id_programa");
		$resultado = $this->db->get();
		//var_dump($this->db->queries);
		return $resultado->result();

	}
	

	public function inscritos($id_periodo){

 
		$this->db->select("COUNT(mp.id_oferta_academica) as total,mp.id_oferta_academica,mp.id_periodo,p.nombre as programa,pen.nombre as unidad_curricular,pe.nombre as periodo,oa.modalidad,oa.codigo as codigo, CONCAT(do.primer_nombre,' ',do.primer_apellido) as docente,oa.id_docente,se.nombre as secc");
		$this->db->from("materias_preinscritas mp");
		$this->db->join("oferta_academica oa","mp.id_oferta_academica = oa.id");
		$this->db->join("docente do","do.id = oa.id_docente");
$this->db->join("seccion se","se.id = oa.seccion");
		$this->db->join("programa p","oa.id_programa = p.id");
		$this->db->join("pensum pen","oa.id_pensum = pen.id");
		$this->db->join("periodo pe","oa.id_periodo = pe.id");
		$this->db->where("mp.id_periodo",$id_periodo);
		$this->db->where("pe.status",1);
		$this->db->where("mp.status",1);
		$this->db->where("mp.reg_pago",1);
		$this->db->where("mp.rev_academica",1);
		$this->db->group_by("mp.id_oferta_academica");
		$resultados = $this->db->get();
		return $resultados->result();
		}

		public function Listado_Materias_inscritas($materia,$id_periodo){

		$this->db->select("mp.*,es.nombre_primer as primer_nombre,es.nombre_segundo as segundo_nombre,es.apellido_segundo as segundo_apellido,es.apellido_primer as primer_apellido,es.cedula as cedula,es.nacionalidad as nacionalidad,es.correo as correo,es.tel_celular as tel_cel,es.tel_habitacion as tel_hab,");
		$this->db->from("materias_preinscritas mp");
		$this->db->join("oferta_academica oa","mp.id_oferta_academica = oa.id");
		$this->db->join("estudiante es","mp.id_usuario = es.id_usuario");
		$this->db->join("periodo pe","oa.id_periodo = pe.id");	
		$this->db->where("mp.id_oferta_academica",$materia);
		$this->db->where("mp.id_periodo",$id_periodo);		
		$this->db->where("pe.status",1);
		$this->db->where("mp.status",1);
		$this->db->where("mp.reg_pago",1);
		$this->db->where("mp.rev_academica",1);
		$this->db->order_by("es.apellido_primer","ASC");
		$resultado = $this->db->get();
		return $resultado->result();

		}

		public function materia_programa($materia,$id_periodo){

		$this->db->select("oa.*,pro.nombre as programa_nombre,pen.nombre as pensum_nombre,se.nombre as secc,do.*");
		$this->db->from("oferta_academica oa");
		$this->db->join("programa pro","oa.id_programa = pro.id");
		$this->db->join("pensum pen","oa.id_pensum = pen.id");
$this->db->join("seccion se","oa.seccion = se.id");
$this->db->join("docente do","oa.id_docente = do.id");
		$this->db->join("periodo pe","oa.id_periodo = pe.id");	
		$this->db->where("oa.id",$materia);
		$this->db->where("oa.id_periodo",$id_periodo);
		$resultado = $this->db->get();
		return $resultado->row();
		}

		public function total_inscritos($id_periodo,$rol){
		
		$this->db->select("mp.id_usuario,p.nombre as programa,p.id as id_programa,es.nombre_primer as primer_nombre,es.nombre_segundo as segundo_nombre,es.apellido_segundo as segundo_apellido,es.apellido_primer as primer_apellido,es.cedula as cedula");
		$this->db->from("materias_preinscritas mp");
		$this->db->join("oferta_academica oa","mp.id_oferta_academica = oa.id");
		$this->db->join("programa p","oa.id_programa = p.id");
		$this->db->join("estudiante es","mp.id_usuario = es.id_usuario");
		$this->db->join("periodo pe","oa.id_periodo = pe.id");	
		$this->db->join("usuarios us","es.id_usuario = us.id");	
		$this->db->where("us.rol_id",$rol);
		$this->db->where("mp.reg_pago",1);
		$this->db->where("mp.rev_academica",1);
		$this->db->where("mp.id_periodo",$id_periodo);
		$this->db->where("mp.status",1);
		$this->db->group_by("mp.id_usuario,id_programa,programa,primer_nombre,id_programa,segundo_nombre,segundo_apellido,primer_apellido,cedula");
		$resultados = $this->db->get();
		return $resultados->result();
		}

		public function total_preinscritos(){
		$this->db->select("mp.*,p.nombre as programa,es.nombre_primer as primer_nombre,es.nombre_segundo as segundo_nombre,es.apellido_segundo as segundo_apellido,es.apellido_primer as primer_apellido,es.cedula as cedula,p.id,mp.id_oferta_academica");
		$this->db->from("materias_preinscritas mp");
		$this->db->join("oferta_academica oa","mp.id_oferta_academica = oa.id");
		$this->db->join("programa p","oa.id_programa = p.id");
		$this->db->join("estudiante es","mp.id_usuario = es.id_usuario");
		$this->db->where("mp.reg_pago",0);
		$this->db->where("mp.status",1);
		$this->db->group_by("mp.id_usuario");
		$resultados = $this->db->get();
		return $resultados->result();
		}

		public function BuscarRegistroMateria($id_usuario,$id_periodo){

			$this->db->where("id_usuario",$id_usuario);
			$this->db->where("id_periodo",$id_periodo);
			$resultados = $this->db->get("materias_preinscritas");
			
		//	var_dump($this->db->queries);
			if ($resultados->num_rows() > 0) {
				return true;
			}
			else{
				return false;
			}
		}
		public function BuscarRegistroMateriaPago($id_usuario,$id_periodo){

			$this->db->where("id_usuario",$id_usuario);
			$this->db->where("id_periodo",$id_periodo);
			$this->db->where("reg_pago",0);
			$resultados = $this->db->get("materias_preinscritas");
			
		//	var_dump($this->db->queries);
			if ($resultados->num_rows() > 0) {
				return true;
			}
			else{
				return false;
			}
		}

		public function mensaje_materias_preinscritas_aprobadas($id_usuario,$id_periodo){
			$rev=array(0, 1);
		$this->db->select("mp.*,oa.trimestre as trimestre,oa.valorpubgen as valorpubgen,oa.valorpubmp as valorpubmp,p.nombre as programa,oa.unidades_creditos as uc,d.primer_nombre as nombre,d.primer_apellido as apellido,pen.nombre as unidad_curricular,oa.horario as horario,dc.descripcion as dia_clase,oa.cupos,oa.cupos_ocupados,pen.codigo,pen.horas,oa.modalidad");
		$this->db->from("materias_preinscritas mp");
		$this->db->join("oferta_academica oa","mp.id_oferta_academica = oa.id");
		$this->db->join("programa p","oa.id_programa = p.id");
		$this->db->join("docente d","oa.id_docente = d.id");
		$this->db->join("pensum pen","oa.id_pensum = pen.id");
		$this->db->join("dia_clase dc","oa.id_dia_clase = dc.id");
		$this->db->where("mp.id_usuario",$id_usuario);
		$this->db->where("mp.id_periodo",$id_periodo);
		$this->db->where("mp.nenabled",1);
		$this->db->where_in("mp.rev_academica",$rev);
		$this->db->order_by("oa.trimestre","ASC");
		
		$resultados = $this->db->get();
		return $resultados->result();
	}
	public function mensaje_materias_preinscritas($id_usuario,$id_periodo){
			//$rev=array(0, 1);
		$this->db->select("mp.*,oa.trimestre as trimestre,oa.valorpubgen as valorpubgen,oa.valorpubmp as valorpubmp,p.nombre as programa,oa.unidades_creditos as uc,d.primer_nombre as nombre,d.primer_apellido as apellido,pen.nombre as unidad_curricular,oa.horario as horario,dc.descripcion as dia_clase,oa.cupos,oa.cupos_ocupados,pen.codigo,pen.horas,oa.modalidad,seccion.nombre as secc");
		$this->db->from("materias_preinscritas mp");
		$this->db->join("oferta_academica oa","mp.id_oferta_academica = oa.id");
		$this->db->join("programa p","oa.id_programa = p.id");
		$this->db->join("docente d","oa.id_docente = d.id");
		$this->db->join("pensum pen","oa.id_pensum = pen.id");
		$this->db->join("dia_clase dc","oa.id_dia_clase = dc.id");
$this->db->join("seccion","oa.seccion = seccion.id");
		$this->db->where("mp.id_usuario",$id_usuario);
		$this->db->where("mp.id_periodo",$id_periodo);
		$this->db->where("mp.nenabled",1);
		$this->db->where_in("mp.rev_academica",0);
		$this->db->order_by("oa.trimestre","ASC");
		
		$resultados = $this->db->get();
		return $resultados->result();
	}
		
	public function mensaje_materias_preinscritas_alumno($id_usuario,$id_periodo,$id_programa){
		$this->db->select("mp.*,oa.trimestre as trimestre,oa.valorpubgen as valorpubgen,oa.valorpubmp as valorpubmp,p.nombre as programa,oa.unidades_creditos as uc,d.primer_nombre as nombre,d.primer_apellido as apellido,pen.nombre as unidad_curricular,oa.horario as horario,dc.descripcion as dia_clase,oa.cupos,oa.cupos_ocupados,pen.codigo,pen.horas,pe.nombre as periodo,oa.modalidad");
		$this->db->from("materias_preinscritas mp");	
		$this->db->join("oferta_academica oa","mp.id_oferta_academica = oa.id");		
		$this->db->join("programa p","oa.id_programa = p.id");
		$this->db->join("docente d","oa.id_docente = d.id");
		$this->db->join("pensum pen","oa.id_pensum = pen.id");
		$this->db->join("dia_clase dc","oa.id_dia_clase = dc.id");
	$this->db->join("periodo pe","oa.id_periodo = pe.id");	
		$this->db->where("pe.status",1);
		$this->db->where("mp.id_usuario",$id_usuario);
		$this->db->where("mp.id_periodo",$id_periodo);
		$this->db->where("mp.status",1);
		$this->db->where("mp.rev_academica",1);
		$this->db->where("mp.reg_pago",1);
		$this->db->where("p.id",$id_programa);
		$this->db->where("mp.nenabled",1);
		
		$this->db->order_by("oa.trimestre","ASC");
		
		$resultados = $this->db->get();
		//var_dump($this->db->queries);
		return $resultados->result();
	}
		
		public function unidades_creditos($materia){
			$this->db->select("SUM(oa.unidades_creditos) as uc");
			$this->db->from("materias_preinscritas mp");
			$this->db->join("oferta_academica oa","mp.id_oferta_academica = oa.id");
			//$this->db->where("mp.id",$materia);			
			$where='mp.id in ('.$materia.')';
		$this->db->where($where);
		//$this->db->group_by("uc,mp.id_oferta_academica,oa.cupos_ocupados,oa.cupos_ocupados");
			$resultados = $this->db->get();
			return $resultados->result();
		}
		public function unidades_creditos_seleccionadas($materia){
			$this->db->select("oa.unidades_creditos AS uc,mp.id_oferta_academica,oa.cupos_ocupados,oa.cupos,oa.codigo");
			$this->db->from("materias_preinscritas mp");
			$this->db->join("oferta_academica oa","mp.id_oferta_academica = oa.id");

			//$this->db->where("mp.id",$materia);			
			$where='mp.id in ('.$materia.')';
		$this->db->where($where);
		$this->db->group_by("mp.id_oferta_academica,oa.cupos_ocupados, oa.cupos,oa.codigo");
		//echo $this->db;
			$resultados = $this->db->get();
			return $resultados->result();
		}
		public function programas_seleccionadas($materia){

			$materia= explode(",", $materia);
			$this->db->query("SET sql_mode=(SELECT REPLACE(@@sql_mode, 'ONLY_FULL_GROUP_BY', ''));");
			$this->db->select("mp.id as id_materia,oa.unidades_creditos AS uc,mp.id_oferta_academica,oa.cupos_ocupados,oa.cupos,oa.codigo,oa.id_programa");
			$this->db->from("materias_preinscritas mp");
			$this->db->join("oferta_academica oa","mp.id_oferta_academica = oa.id");
			$this->db->where_in("mp.id",$materia);			
			;
				
			$resultados = $this->db->get();
			//var_dump($this->db->queries);		var_dump($resultados);
			return $resultados->result();
		}
		public function programas_seleccionadas_programa($materia,$id_programa){

			$materia= explode(",", $materia);
			$this->db->query("SET sql_mode=(SELECT REPLACE(@@sql_mode, 'ONLY_FULL_GROUP_BY', ''));");
			$this->db->select("mp.id as id_materia,oa.unidades_creditos AS uc,mp.id_oferta_academica,oa.cupos_ocupados,oa.cupos,oa.codigo,oa.id_programa");
			$this->db->from("materias_preinscritas mp");
			$this->db->join("oferta_academica oa","mp.id_oferta_academica = oa.id");
			$this->db->where_in("mp.id",$materia);		
			$this->db->where_in("oa.id_programa",$id_programa);			
			;
				
			$resultados = $this->db->get();
			//var_dump($this->db->queries);		var_dump($resultados);
			return $resultados->result();
		}
		public function ver_postgrado_alumno($id){
			$this->db->query("SET sql_mode=(SELECT REPLACE(@@sql_mode, 'ONLY_FULL_GROUP_BY', ''));");
		$this->db->select("p.nombre as programa,p.id,oa.trimestre,oa.id_periodo");
		$this->db->from("materias_preinscritas mp");
		$this->db->join("oferta_academica oa","mp.id_oferta_academica = oa.id");
		$this->db->join("programa p","oa.id_programa = p.id");
		$this->db->join("estudiante es","mp.id_usuario = es.id_usuario");
		$this->db->where("mp.reg_pago",1);
		$this->db->where("mp.rev_academica",1);
		$this->db->where("mp.status",1);
		
		$this->db->where("mp.id_usuario",$id);
		$this->db->group_by("programa");
		$resultados = $this->db->get();
		//var_dump($this->db->queries);	
		return $resultados->result();
		}

		public function Materia_alumno($id_usuario,$id_programa_){
		
		$this->db->select("mp.id_usuario,p.id as programa_id");
		$this->db->from("materias_preinscritas mp");
		$this->db->join("oferta_academica oa","mp.id_oferta_academica = oa.id");
		$this->db->join("programa p","oa.id_programa = p.id");
		$this->db->join("pensum pen","oa.id_pensum = pen.id");
		$this->db->join("periodo pe","oa.id_periodo = pe.id");	
		$this->db->where("mp.id_usuario",$id_usuario);
		$this->db->where("p.id",$id_programa_);
		$this->db->where("pe.status",1);
		$this->db->where("mp.status",1);
		$this->db->group_by("mp.id_usuario,programa_id");
		$resultado = $this->db->get();
		//var_dump($this->db->queries);
		return $resultado->result();

	}
	public function mensaje_materias_preinscritas_alumno_titulo($id_usuario,$id_periodo,$id_programa){
		$this->db->select("pe.nombre as periodo,p.nombre as programa, oa.trimestre as trimestre, mp.id_usuario");
		$this->db->from("materias_preinscritas mp");	
		$this->db->join("oferta_academica oa","mp.id_oferta_academica = oa.id");	
		$this->db->join("programa p","oa.id_programa = p.id");
		$this->db->join("periodo pe","oa.id_periodo = pe.id");			
		$this->db->where("mp.id_usuario",$id_usuario);
		$this->db->where("mp.id_periodo",$id_periodo);
		$this->db->where("mp.status",1);
		$this->db->where("p.id",$id_programa);
		$this->db->where("mp.nenabled",1);		
		//$this->db->order_by("oa.trimestre","ASC");
		$this->db->group_by("periodo, programa, trimestre, mp.id_usuario");
		$resultados = $this->db->get();
		return $resultados->result();
	}
	//MODULO CONSULTAS 
	public function total_inscritos_periodo($id_periodo){
		
		$this->db->select("mp.id_usuario,p.nombre as programa,p.id as id_programa,es.nombre_primer as primer_nombre,es.nombre_segundo as segundo_nombre,es.apellido_segundo as segundo_apellido,es.apellido_primer as primer_apellido,es.cedula as cedula, es.nacionalidad as nacionalidad");
		$this->db->from("materias_preinscritas mp");
		$this->db->join("oferta_academica oa","mp.id_oferta_academica = oa.id");
		$this->db->join("programa p","oa.id_programa = p.id");
		$this->db->join("estudiante es","mp.id_usuario = es.id_usuario");
		$this->db->join("periodo pe","oa.id_periodo = pe.id");	
		$this->db->where("mp.reg_pago",1);
		$this->db->where("mp.rev_academica",1);
			$this->db->where("mp.status",1);
		$this->db->where("mp.id_periodo",$id_periodo);
		
		$this->db->group_by("mp.id_usuario,id_programa,programa,primer_nombre,id_programa,segundo_nombre,segundo_apellido,primer_apellido,cedula,nacionalidad");
		$resultados = $this->db->get();
		return $resultados->result();
		}

	public function Materia_alumno_periodo($id_usuario,$id_programa_){
		
		$this->db->select("mp.id_usuario,p.id as programa_id");
		$this->db->from("materias_preinscritas mp");
		$this->db->join("oferta_academica oa","mp.id_oferta_academica = oa.id");
		$this->db->join("programa p","oa.id_programa = p.id");
		$this->db->join("pensum pen","oa.id_pensum = pen.id");
		$this->db->join("periodo pe","oa.id_periodo = pe.id");	
		$this->db->where("mp.id_usuario",$id_usuario);
		$this->db->where("p.id",$id_programa_);
		$this->db->where("mp.status",1);
		$this->db->group_by("mp.id_usuario,programa_id");
		$resultado = $this->db->get();
		//var_dump($this->db->queries);
		return $resultado->result();

	}
	public function mensaje_materias_preinscritas_alumno_periodo($id_usuario,$id_periodo,$id_programa){
		$this->db->select("mp.*,oa.trimestre as trimestre,oa.valorpubgen as valorpubgen,oa.valorpubmp as valorpubmp,p.nombre as programa,oa.unidades_creditos as uc,d.primer_nombre as nombre,d.primer_apellido as apellido,pen.nombre as unidad_curricular,oa.horario as horario,dc.descripcion as dia_clase,oa.cupos,oa.cupos_ocupados,pen.codigo,pen.horas,pe.nombre as periodo,oa.modalidad");
		$this->db->from("materias_preinscritas mp");	
		$this->db->join("oferta_academica oa","mp.id_oferta_academica = oa.id");		
		$this->db->join("programa p","oa.id_programa = p.id");
		$this->db->join("docente d","oa.id_docente = d.id");
		$this->db->join("pensum pen","oa.id_pensum = pen.id");
		$this->db->join("dia_clase dc","oa.id_dia_clase = dc.id");
		$this->db->join("periodo pe","oa.id_periodo = pe.id");	
		$this->db->where("mp.id_usuario",$id_usuario);
		$this->db->where("mp.id_periodo",$id_periodo);
		$this->db->where("mp.rev_academica",1);
		$this->db->where("mp.reg_pago",1);
		$this->db->where("p.id",$id_programa);
		$this->db->where("mp.nenabled",1);
		
		$this->db->order_by("oa.trimestre","ASC");
		$resultados = $this->db->get();
		return $resultados->result();
	}
	public function estudiantes_inscritos_periodo($id_periodo,$rol){
		
		$this->db->query("SET sql_mode=(SELECT REPLACE(@@sql_mode, 'ONLY_FULL_GROUP_BY', ''));");
		$this->db->select("mp.id_usuario,mp.fecha_actualizacion,p.nombre as programa,p.id as id_programa,es.nombre_primer as primer_nombre,es.nombre_segundo as segundo_nombre,
		es.apellido_segundo as segundo_apellido,
		es.apellido_primer as primer_apellido,es.cedula as cedula,es.correo,es.nacionalidad,es.id_sexo as sexo , 
		lug.lugar_trabajo as trabajo,trab.cargo,est.estado as residencia,trab.circunscripcion,
	CONCAT(codigo_cel.descripcion, es.tel_celular) AS telefono_cel,es.fecha_nac,
	CONCAT(codigo_hab.descripcion, es.tel_habitacion) AS telefono_hab, oa.modalidad,oa.horario,
	dc.descripcion as dia,oa.trimestre, mp.id_oferta_academica, sum(oa.unidades_creditos) as uc, aca.*");
		$this->db->from("materias_preinscritas mp");
		$this->db->join("oferta_academica oa","mp.id_oferta_academica = oa.id");
$this->db->join("dia_clase dc","oa.id_dia_clase = dc.id");
		$this->db->join("programa p","oa.id_programa = p.id");
		$this->db->join("estudiante es","mp.id_usuario = es.id_usuario");
		$this->db->join("periodo pe","oa.id_periodo = pe.id");	
		$this->db->join("trabajo trab","mp.id_usuario = trab.id_usuario");
		$this->db->join("lugar_trabajo lug","lug.id = trab.id_lugar_trabajo");
		$this->db->join("direccion dir","mp.id_usuario = dir.id_usuario");
		$this->db->join("estado est","est.id = dir.id_estado",LEFT);
		$this->db->join("codigo_cel","codigo_cel.id=es.id_codigo_cel",LEFT);
  		$this->db->join("codigo_hab","codigo_hab.id=es.id_codigo_hab",LEFT);
		$this->db->join("usuarios u","u.id=mp.id_usuario");
		$this->db->join("academico aca","aca.id_usuario = mp.id_usuario",left);
		$this->db->where("mp.reg_pago",1);
		$this->db->where("mp.rev_academica",1);
		$this->db->where("mp.status",1);
		$this->db->where("mp.id_periodo",$id_periodo);
		$this->db->where("u.rol_id",$rol);
		$this->db->where("trab.actual",1);
	//	$this->db->where("aca.tipo_estudio",1);
		$this->db->group_by("mp.id_usuario,id_programa");
		$resultados = $this->db->get();
		//var_dump($this->db->queries);
		return $resultados->result();
		}
public function materias_validadas_periodo_vigente($id_usuario){
			$this->db->select("mp.*,mp.id as id_materia,oa.trimestre as trimestre,oa.valorpubgen as valorpubgen,oa.valorpubmp as valorpubmp,p.nombre as programa,
			oa.unidades_creditos as uc,d.primer_nombre as nombre,d.primer_apellido as apellido,
			pen.nombre as unidad_curricular,oa.horario as horario,dc.descripcion as dia,
			oa.cupos,oa.cupos_ocupados,pen.codigo,pen.horas,pe.nombre as periodo,oa.modalidad");
			$this->db->from("materias_preinscritas mp");	
			$this->db->join("oferta_academica oa","mp.id_oferta_academica = oa.id");		
			$this->db->join("programa p","oa.id_programa = p.id");
			$this->db->join("docente d","oa.id_docente = d.id");
			$this->db->join("pensum pen","oa.id_pensum = pen.id");
			$this->db->join("dia_clase dc","oa.id_dia_clase = dc.id");
			$this->db->join("periodo pe","oa.id_periodo = pe.id");	
			$this->db->where("pe.status",1);
			$this->db->where("mp.id_usuario",$id_usuario);
	
			$this->db->where("mp.status",1);
			$this->db->where("mp.rev_academica",1);
			$this->db->where("mp.reg_pago",1);
			$this->db->where("mp.retiro",0);
			$this->db->where("mp.sol_retiro",0);
			$this->db->where("mp.nenabled",1);
			
			$this->db->order_by("oa.id_programa,oa.trimestre","ASC");
			
			$resultados = $this->db->get();
			//var_dump($this->db->queries);
			return $resultados->result();
		}
	public function materias_solicitadas($id_usuario,$id_solicitud){//materias que solictop el usuario realizar etiro voluntario
			$this->db->select("mp.id,oa.trimestre,oa.horario,oa.modalidad,oa.unidades_creditos AS uc,
			p.nombre as programa,
			d.primer_nombre as nombre,d.primer_apellido as apellido,
			pen.nombre as unidad_curricular,
			dc.descripcion as dia_clase,pen.codigo,pen.horas");
			$this->db->from("materias_preinscritas mp");
			$this->db->join("oferta_academica oa","mp.id_oferta_academica = oa.id");
			$this->db->join("programa p","oa.id_programa = p.id");
			$this->db->join("docente d","oa.id_docente = d.id");
			$this->db->join("pensum pen","oa.id_pensum = pen.id");
			$this->db->join("dia_clase dc","oa.id_dia_clase = dc.id");
			$this->db->join("periodo pe","oa.id_periodo = pe.id");
			$this->db->where("mp.id_usuario",$id_usuario);		
			//$this->db->where("oa.id_programa",$id_programa)	;
			$this->db->where("mp.id_solicitud_retiro",$id_solicitud);	
			$this->db->where("mp.sol_retiro",1);
			$this->db->where("mp.rev_academica",1);
			$this->db->where("pe.status",1);		
			$resultados = $this->db->get();
//var_dump($this->db->queries);
			return $resultados->result();
	}

	public function materias_solicitadas_programa($id_usuario,$id_programa){//materias que solictop el usuario realizar etiro voluntario
		$this->db->select("mp.id,oa.trimestre,oa.horario,oa.modalidad,oa.unidades_creditos AS uc,
		p.nombre as programa,
		d.primer_nombre as nombre,d.primer_apellido as apellido,
		pen.nombre as unidad_curricular,
		dc.descripcion as dia_clase,pen.codigo,pen.horas");
		$this->db->from("materias_preinscritas mp");
		$this->db->join("oferta_academica oa","mp.id_oferta_academica = oa.id");
		$this->db->join("programa p","oa.id_programa = p.id");
		$this->db->join("docente d","oa.id_docente = d.id");
		$this->db->join("pensum pen","oa.id_pensum = pen.id");
		$this->db->join("dia_clase dc","oa.id_dia_clase = dc.id");
		$this->db->join("periodo pe","oa.id_periodo = pe.id");
		$this->db->where("mp.id_usuario",$id_usuario);			
		$this->db->where("oa.id_programa",$id_programa);	
		$this->db->where("mp.sol_retiro",1);
		$this->db->where("mp.rev_academica",1);
		$this->db->where("pe.status",1);		
		$resultados = $this->db->get();
//var_dump($this->db->queries);
		return $resultados->result();
}
//01-10-2024
	public function materias_validadas_periodo_vigente_todas($id_usuario){
			$this->db->select("mp.*,oa.trimestre as trimestre,oa.valorpubgen as valorpubgen,oa.valorpubmp as valorpubmp,p.nombre as programa,
			oa.unidades_creditos as uc,d.primer_nombre as nombre,d.primer_apellido as apellido,
			pen.nombre as unidad_curricular,oa.horario as horario,dc.descripcion as dia,
			oa.cupos,oa.cupos_ocupados,pen.codigo,pen.horas,pe.nombre as periodo,oa.modalidad");
			$this->db->from("materias_preinscritas mp");	
			$this->db->join("oferta_academica oa","mp.id_oferta_academica = oa.id");		
			$this->db->join("programa p","oa.id_programa = p.id");
			$this->db->join("docente d","oa.id_docente = d.id");
			$this->db->join("pensum pen","oa.id_pensum = pen.id");
			$this->db->join("dia_clase dc","oa.id_dia_clase = dc.id");
			$this->db->join("periodo pe","oa.id_periodo = pe.id");	
			$this->db->where("pe.status",1);
			$this->db->where("mp.id_usuario",$id_usuario);
	
			$this->db->where("mp.status",1);
			$this->db->where("mp.rev_academica",1);
			$this->db->where("mp.reg_pago",1);
		//	$this->db->where("mp.sol_retiro",0);
		//	$this->db->where("mp.retiro",0);
			$this->db->where("mp.nenabled",1);
			
			$this->db->order_by("oa.id_programa,oa.trimestre","ASC");
			
			$resultados = $this->db->get();
		//	var_dump($this->db->queries);
			return $resultados->result();
		}
public function materias_preinscritas_periodo($id_usuario,$id_periodo,$id_programa){
$this->db->query("SET sql_mode=(SELECT REPLACE(@@sql_mode, 'ONLY_FULL_GROUP_BY', ''));");
			$this->db->select("mp.*,oa.trimestre as trimestre,oa.valorpubgen as valorpubgen,oa.valorpubmp as valorpubmp,p.nombre as programa,oa.unidades_creditos as uc,d.primer_nombre as nombre,d.primer_apellido as apellido,pen.nombre as unidad_curricular,oa.horario as horario,dc.descripcion as dia_clase,oa.cupos,oa.cupos_ocupados,pen.codigo,pen.horas,pe.nombre as periodo,oa.modalidad");
			$this->db->from("materias_preinscritas mp");	
			$this->db->join("oferta_academica oa","mp.id_oferta_academica = oa.id");		
			$this->db->join("programa p","oa.id_programa = p.id");
			$this->db->join("docente d","oa.id_docente = d.id");
			$this->db->join("pensum pen","oa.id_pensum = pen.id");
			$this->db->join("dia_clase dc","oa.id_dia_clase = dc.id");
			$this->db->join("periodo pe","oa.id_periodo = pe.id");	
			$this->db->where("mp.id_usuario",$id_usuario);
			$this->db->where("mp.id_periodo",$id_periodo);
			$this->db->where("mp.rev_academica",1);
			$this->db->where("mp.reg_pago",1);			
			$this->db->where_in("oa.id_programa",array($id_programa,'27','28'));
			$this->db->where("mp.nenabled",1);
			
			$this->db->order_by("oa.trimestre","ASC");
			$resultados = $this->db->get();
			
			
			if ($resultados->num_rows() > 0) {
				return $resultados->result();
			}
			else{
				return false;
			}
		}
		public function preincritas_clausulas($id_usuario,$id_periodo,$clausula){
			//$rev=array(0, 1);
			//if($clausula==4){
			//	$this->db->where("oa.trimestre",'TEG');	
		//	}else{
			//	$this->db->where("oa.modalidad",$clausula);	
		//}
		$this->db->select("mp.*,oa.*,oa.trimestre as trimestre,oa.*,p.nombre as programa,oa.unidades_creditos as uc,d.primer_nombre as nombre,d.primer_apellido as apellido,pen.nombre as unidad_curricular,oa.horario as horario,dc.descripcion as dia_clase,oa.cupos,oa.cupos_ocupados,pen.codigo,pen.horas,oa.modalidad");
		$this->db->from("materias_preinscritas mp");
		$this->db->join("oferta_academica oa","mp.id_oferta_academica = oa.id");
		$this->db->join("programa p","oa.id_programa = p.id");
		$this->db->join("docente d","oa.id_docente = d.id");
		$this->db->join("pensum pen","oa.id_pensum = pen.id");
		$this->db->join("dia_clase dc","oa.id_dia_clase = dc.id");
		$this->db->where("mp.id_usuario",$id_usuario);
		$this->db->where("mp.id_periodo",$id_periodo);
		if($clausula==4){
			$this->db->where("oa.trimestre",'TEG');	
		}else{
			$this->db->where("oa.modalidad",$clausula);	
			$this->db->where_not_in("oa.trimestre",'TEG');
		}
		$this->db->where("mp.nenabled",1);	
		$this->db->where("mp.status",1);	
		$this->db->order_by("oa.trimestre","ASC");
		
		$resultados = $this->db->get();
		//var_dump($this->db->queries);
		return $resultados->result();
	}
	public function preincritas_clausulas_modalidad($id_usuario,$id_periodo){
		$this->db->query("SET sql_mode=(SELECT REPLACE(@@sql_mode, 'ONLY_FULL_GROUP_BY', ''));");
		$this->db->select("oa.modalidad, oa.trimestre");
		$this->db->from("materias_preinscritas mp");	
		$this->db->join("oferta_academica oa","mp.id_oferta_academica = oa.id");
		$this->db->where("mp.id_usuario",$id_usuario);
		$this->db->where("mp.id_periodo",$id_periodo);
		$this->db->where("mp.nenabled",1);		
		$this->db->group_by("oa.modalidad");
		$resultados = $this->db->get();
		//var_dump($this->db->queries);
		return $resultados->result();
	}

	public function ver_materia($id){
		$this->db->select("mp.*,oa.trimestre as trimestre,oa.valorpubgen as valorpubgen,oa.valorpubmp as valorpubmp,p.nombre as programa,oa.unidades_creditos as uc,d.primer_nombre as nombre,d.primer_apellido as apellido,pen.nombre as unidad_curricular,pen.codigo") ;
		$this->db->from("materias_preinscritas mp");
		$this->db->join("oferta_academica oa","mp.id_oferta_academica = oa.id");
		$this->db->join("programa p","oa.id_programa = p.id");
		$this->db->join("docente d","oa.id_docente = d.id");
		$this->db->join("pensum pen","oa.id_pensum = pen.id");		
		$this->db->where("mp.id",$id);		
		$this->db->where("mp.status",1);
		$this->db->where("mp.reg_pago",1);
		$this->db->where("mp.rev_academica",1);
		$resultados = $this->db->get();
		return $resultados->row();
	}
	public function materia_inscrita_programa($id,$id_usuario,$id_periodo){
		$this->db->select("mp.*,oa.trimestre as trimestre,oa.valorpubgen as valorpubgen,oa.valorpubmp as valorpubmp,p.nombre as programa,oa.unidades_creditos as uc,d.primer_nombre as nombre,d.primer_apellido as apellido,pen.nombre as unidad_curricular,pen.codigo") ;
		$this->db->from("materias_preinscritas mp");
		$this->db->join("oferta_academica oa","mp.id_oferta_academica = oa.id");
		$this->db->join("programa p","oa.id_programa = p.id");
		$this->db->join("docente d","oa.id_docente = d.id");
		$this->db->join("pensum pen","oa.id_pensum = pen.id");		
		$this->db->where("oa.id_programa",$id);	
		$this->db->where("oa.id_periodo",$id_periodo);	
		$this->db->where("mp.id_usuario",$id_usuario);	
		$this->db->where("mp.status",1);
		$this->db->where("mp.reg_pago",1);
		$this->db->where("mp.rev_academica",1);
		$this->db->where("oa.status",1);	
		$resultados = $this->db->get();
		//var_dump($this->db->queries);
		return $resultados->result();
	}
	public function materia_inscrita_seleccionada($id){
		$this->db->query("SET sql_mode=(SELECT REPLACE(@@sql_mode, 'ONLY_FULL_GROUP_BY', ''));");
		$this->db->select("mp.*,oa.trimestre as trimestre,oa.valorpubgen as valorpubgen,oa.valorpubmp as valorpubmp,oa.id_programa,
		p.nombre as programa,oa.unidades_creditos as uc,d.primer_nombre as nombre,d.primer_apellido as apellido,
		pen.nombre as unidad_curricular,pen.codigo") ;
		$this->db->from("materias_preinscritas mp");
		$this->db->join("oferta_academica oa","mp.id_oferta_academica = oa.id");
		$this->db->join("programa p","oa.id_programa = p.id");
		$this->db->join("docente d","oa.id_docente = d.id");
		$this->db->join("pensum pen","oa.id_pensum = pen.id");		
		$this->db->where_in("mp.id",$id);		
		$this->db->where("mp.status",1);
		$this->db->where("mp.reg_pago",1);
		$this->db->where("mp.rev_academica",1);
		$this->db->where("oa.status",1);	
		$this->db->group_by("oa.id_programa");
		$resultados = $this->db->get();
	//	var_dump($this->db->queries);
		return $resultados->result();
	}
public function estudiantes_inscritos_ano($id_periodo){///PARA ESTADISTICAS ANUALES 
		
		$this->db->query("SET sql_mode=(SELECT REPLACE(@@sql_mode, 'ONLY_FULL_GROUP_BY', ''));");
		$this->db->select("mp.id_usuario,mp.fecha_actualizacion,p.nombre as programa,
		p.id as id_programa,es.nombre_primer as primer_nombre,es.nombre_segundo as segundo_nombre,
		es.apellido_segundo as segundo_apellido,es.fecha_nac,
		es.apellido_primer as primer_apellido,es.cedula as cedula,es.correo,es.nacionalidad,es.id_sexo as sexo , 
		lug.lugar_trabajo as trabajo,trab.cargo,est.estado as residencia,trab.circunscripcion,
	CONCAT(codigo_cel.descripcion, es.tel_celular) AS telefono_cel,
	CONCAT(codigo_hab.descripcion, es.tel_habitacion) AS telefono_hab, oa.modalidad,oa.horario,
	dc.descripcion as dia,oa.trimestre, mp.id_oferta_academica, sum(oa.unidades_creditos) as uc");
		$this->db->from("materias_preinscritas mp");
		$this->db->join("oferta_academica oa","mp.id_oferta_academica = oa.id");
		$this->db->join("dia_clase dc","oa.id_dia_clase = dc.id");
		$this->db->join("programa p","oa.id_programa = p.id");
		$this->db->join("estudiante es","mp.id_usuario = es.id_usuario");
		$this->db->join("periodo pe","oa.id_periodo = pe.id");	
		$this->db->join("trabajo trab","mp.id_usuario = trab.id_usuario");
		$this->db->join("lugar_trabajo lug","lug.id = trab.id_lugar_trabajo");
		$this->db->join("direccion dir","mp.id_usuario = dir.id_usuario");
		$this->db->join("estado est","est.id = dir.id_estado");
		$this->db->join("codigo_cel","codigo_cel.id=es.id_codigo_cel");
  		$this->db->join("codigo_hab","codigo_hab.id=es.id_codigo_hab");
		
		$this->db->where("mp.reg_pago",1);
		$this->db->where("mp.rev_academica",1);
		$this->db->where("mp.status",1);
		$this->db->where_in("mp.id_periodo",$id_periodo);	
		$this->db->where("trab.actual",1);
		$this->db->group_by("mp.id_usuario");
		$resultados = $this->db->get();
		//var_dump($this->db->queries);
		return $resultados->result();
		}
		public function estudiantes_inscritos_ano_uc($id_usuario, $programa){///PARA ESTADISTICAS ANUALES 
		
			$this->db->query("SET sql_mode=(SELECT REPLACE(@@sql_mode, 'ONLY_FULL_GROUP_BY', ''));");
			$this->db->select("mp.id_usuario,mp.fecha_actualizacion,p.nombre as programa,
			p.id as id_programa,es.nombre_primer as primer_nombre,es.nombre_segundo as segundo_nombre,
			es.apellido_segundo as segundo_apellido,
			es.apellido_primer as primer_apellido,es.cedula as cedula,es.correo,es.nacionalidad,es.id_sexo as sexo , 
			lug.lugar_trabajo as trabajo,trab.cargo,est.estado as residencia,trab.circunscripcion,
		CONCAT(codigo_cel.descripcion, es.tel_celular) AS telefono_cel,
		CONCAT(codigo_hab.descripcion, es.tel_habitacion) AS telefono_hab, oa.modalidad,oa.horario,
		dc.descripcion as dia,oa.trimestre, mp.id_oferta_academica, sum(oa.unidades_creditos) as uc");
			$this->db->from("materias_preinscritas mp");
			$this->db->join("oferta_academica oa","mp.id_oferta_academica = oa.id");
			$this->db->join("dia_clase dc","oa.id_dia_clase = dc.id");
			$this->db->join("programa p","oa.id_programa = p.id");
			$this->db->join("estudiante es","mp.id_usuario = es.id_usuario");
			$this->db->join("periodo pe","oa.id_periodo = pe.id");	
			$this->db->join("trabajo trab","mp.id_usuario = trab.id_usuario");
			$this->db->join("lugar_trabajo lug","lug.id = trab.id_lugar_trabajo");
			$this->db->join("direccion dir","mp.id_usuario = dir.id_usuario");
			$this->db->join("estado est","est.id = dir.id_estado");
			$this->db->join("codigo_cel","codigo_cel.id=es.id_codigo_cel");
			  $this->db->join("codigo_hab","codigo_hab.id=es.id_codigo_hab");
			
			$this->db->where("mp.reg_pago",1);
			$this->db->where("mp.rev_academica",1);
			$this->db->where("mp.status",1);
			$this->db->where_in("oa.id_programa",$programa);	
			$this->db->where_in("mp.id_usuario",$id_usuario);
			$this->db->where("trab.actual",1);		
			$this->db->group_by("mp.id_usuario,oa.id_programa");
			$resultados = $this->db->get();
			//var_dump($this->db->queries);
			return $resultados->result();
			}
public function matricula_vigente($periodo){
				$this->db->query("SET sql_mode=(SELECT REPLACE(@@sql_mode, 'ONLY_FULL_GROUP_BY', ''));");
				$this->db->select("mp.*,mp.id as id_matricula,es.id_sexo,es.nombre_primer as primer_nombre,
				es.nombre_segundo as segundo_nombre,es.apellido_segundo as segundo_apellido,
				es.apellido_primer as primer_apellido,es.cedula as cedula,es.nacionalidad as nacionalidad,es.correo as correo,
				pem.nombre,oa.codigo,pro.nombre as programa, se.nombre AS secciones,oa.trimestre,
				oa.modalidad,
				dc.id ,  CASE
						  WHEN dc.id >=1 AND dc.id<=5 OR dc.id =8 THEN 'SEMANA' 
						  WHEN  dc.id =7  THEN 'SABATINO'    
						  WHEN  dc.id =6  THEN 'ASINCRONO'         
					  END AS dia , u.estado, u.rol_id, u.trimestre as oferta");
				$this->db->from("materias_preinscritas mp");
				$this->db->join("oferta_academica oa","mp.id_oferta_academica = oa.id");
				$this->db->join("dia_clase dc","dc.id = oa.id_dia_clase");
				$this->db->join("estudiante es","mp.id_usuario = es.id_usuario");				
				$this->db->join("pensum pem","oa.id_pensum= pem.id");
				$this->db->join("programa pro","oa.id_programa= pro.id");	
				$this->db->join("seccion as se","oa.seccion= se.id"); 	
				$this->db->join("usuarios as u","mp.id_usuario= u.id"); 	
				$this->db->where("oa.id_periodo",$periodo);
				$this->db->where("mp.status",1);
				$this->db->where("mp.reg_pago",1);
				$this->db->where("mp.rev_academica",1);
				//$this->db->where_in("u.rol_id",'5,8');
				
				$this->db->group_by("oa.id_programa,mp.id_usuario,oa.trimestre,oa.modalidad,dia");
				$this->db->order_by("es.apellido_primer");
				$resultado = $this->db->get();
				//var_dump($this->db->queries);
				return $resultado->result();
		
			}
			public function lista_preinscritas_pagadas($id_usuario){
				$this->db->select("mp.*,oa.trimestre as trimestre,oa.valorpubgen as valorpubgen,
				oa.valorpubmp as valorpubmp,p.nombre as programa,oa.unidades_creditos as uc,
				d.primer_nombre as nombre,d.primer_apellido as apellido,pen.nombre as unidad_curricular,p.tipo_programa");
				$this->db->from("materias_preinscritas mp");
				$this->db->join("oferta_academica oa","mp.id_oferta_academica = oa.id");
				$this->db->join("programa p","oa.id_programa = p.id");
				$this->db->join("docente d","oa.id_docente = d.id");
				$this->db->join("pensum pen","oa.id_pensum = pen.id");
				$this->db->join("periodo pe","oa.id_periodo = pe.id");
				$this->db->where("mp.id_usuario",$id_usuario);
				$this->db->where("mp.reg_pago",1);
				$this->db->where("mp.nenabled",1);
				$this->db->where("mp.status",1);
				$this->db->where("pe.status",1);
				$this->db->order_by("oa.trimestre","ASC");
				$resultados = $this->db->get();
				//var_dump($this->db->queries);
					return $resultados->result();
			}
			public function materia_inscrita_seleccionada_programa($materias_ids, $id_programa){
				$this->db->select("mp.*, oa.trimestre, oa.id_programa");
				$this->db->from("materias_preinscritas mp");
				$this->db->join("oferta_academica oa", "mp.id_oferta_academica = oa.id");
				$this->db->where_in("mp.id", explode(',', $materias_ids));
				$this->db->where("oa.id_programa", $id_programa);
				$this->db->where("mp.status", 1);
				$this->db->where("mp.reg_pago", 1);
				$this->db->where("mp.rev_academica", 1);
				$resultados = $this->db->get();
				return $resultados->result();
			}
			public function materias_solicitadas_retiro($id_programa, $id_usuario, $id_solicitud) {
				$this->db->select("mp.*, oa.trimestre, oa.valorpubgen, oa.valorpubmp, p.nombre as programa, oa.unidades_creditos as uc, d.primer_nombre as nombre, d.primer_apellido as apellido, pen.nombre as unidad_curricular, oa.horario, dc.descripcion as dia_clase, oa.cupos, oa.cupos_ocupados, pen.codigo, pen.horas, pe.nombre as periodo, oa.modalidad");
				$this->db->from("materias_preinscritas mp");
				$this->db->join("oferta_academica oa", "mp.id_oferta_academica = oa.id");
				$this->db->join("programa p", "oa.id_programa = p.id");
				$this->db->join("docente d", "oa.id_docente = d.id");
				$this->db->join("pensum pen", "oa.id_pensum = pen.id");
				$this->db->join("dia_clase dc", "oa.id_dia_clase = dc.id");
				$this->db->join("periodo pe", "oa.id_periodo = pe.id");				
					// Programa principal: TODAS las materias (sin importar usuario ni solicitud)
					$this->db->or_where("mp.id_solicitud_retiro", $id_solicitud);
					$this->db->or_where_in("oa.id_programa", array($id_programa,27, 28));
					$this->db->where("mp.id_usuario", $id_usuario);
					
						
				
				// Filtros generales (aplican a ambas condiciones)
				$this->db->where("mp.status", 1);
				$this->db->where("mp.reg_pago", 1);
				$this->db->where("mp.rev_academica", 1);
				$this->db->where("mp.nenabled", 1);
				$this->db->where("pe.status", 1);
				
				$this->db->order_by("oa.trimestre", "ASC");
				
				$query = $this->db->get();
				//		var_dump($this->db->queries);
				return $query->result();
			}
			
}


