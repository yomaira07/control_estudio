<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registro_pago_model extends CI_Model {
		//var_dump($this->db->queries);
	//$this->db->query("SET sql_mode=(SELECT REPLACE(@@sql_mode, 'ONLY_FULL_GROUP_BY', ''));");	
	public function registro_pago($id_usuario){//pago conciliado con error  caso simon

		$this->db->select("r.*");
		$this->db->from("registro_pago r");			
		$this->db->join("periodo pe","r.id_periodo = pe.id");				
		
		$this->db->where("r.status", 1);
		$this->db->where("pe.status", 1);
		$this->db->where("r.id_usuario", $id_usuario);
		$this->db->where("r.tramite", 0);
		
		$resultados = $this->db->get();
		
			if ($resultados->num_rows() > 0){
			return true;
		}
		else{
			return false;
		}
		 
	}
	public function registro_pago_aspirate($id_usuario){//pago conciliado con error  caso simon

		$this->db->select("r.*");
		$this->db->from("registro_pago r");			
		$this->db->join("periodo pe","r.id_periodo = pe.id");				
		
		$this->db->where("r.status", 1);
		$this->db->where("pe.status_aspirante", 1);
		$this->db->where("r.id_usuario", $id_usuario);
		
		$resultados = $this->db->get();
		//var_dump($this->db->queries);
			if ($resultados->num_rows() > 0){
			return true;
		}
		else{
			return false;
		}
		 
	}

	public function getRegistro_Pago($id_periodo){


		$this->db->query("SET sql_mode=(SELECT REPLACE(@@sql_mode, 'ONLY_FULL_GROUP_BY', ''));");	
				$this->db->select("pe.nombre as periodo,r.*,es.cedula as cedula_est,es.nombre_primer as pri_nombre,es.nombre_segundo as seg_nombre,
		es.apellido_primer as pri_apellido,es.apellido_segundo as seg_apellido,CONCAT(codigo_cel.descripcion,es.tel_celular) AS tel_cel,est.estado as nob_estado,b.nombre as banco,es.correo,u.rol_id,l.lugar_trabajo as trabajo, COUNT(id_requisito) AS total_requisitos");
				$this->db->from("registro_pago r");
				$this->db->join("estudiante es","r.id_estudiante = es.id");
				$this->db->join("codigo_cel","codigo_cel.id=es.id_codigo_cel",RIGHT);
				$this->db->join("trabajo tr","tr.id_usuario = r.id_usuario");
				$this->db->join("lugar_trabajo l","tr.id_lugar_trabajo = l.id");
				$this->db->join("usuarios u","r.id_usuario = u.id");
				$this->db->join("estado est","r.id_estado_estudio = est.id");
				$this->db->join("banco b","r.id_banco = b.id");
				$this->db->join("periodo pe","r.id_periodo = pe.id");
				$this->db->join("control_requisitos cr","cr.id_usuario = r.id_usuario",left);
				$this->db->where("r.conciliado", 0);
				$this->db->where("r.status", 1);	
				$this->db->where("r.tramite", 0);
				$this->db->where_in("pe.id", $id_periodo);
				$this->db->where_in("cr.id_periodo", $id_periodo);		
				$this->db->group_by("r.id");	
				$this->db->order_by("r.id", "ASC");
				$resultados = $this->db->get();
				///var_dump($this->db->queries);
				return $resultados->result();
			}
	/*actualizado 29-03-2022*/
	public function getRegistro_Pago_adicional($id_periodo){//todos los estudiantes que registraron el primer pago
		$this->db->query("SET sql_mode=(SELECT REPLACE(@@sql_mode, 'ONLY_FULL_GROUP_BY', ''));");	
		$this->db->select("r.*,es.cedula as cedula_est,es.nombre_primer as pri_nombre,es.nombre_segundo as seg_nombre,es.apellido_primer as pri_apellido,es.apellido_segundo as seg_apellido,est.estado as nob_estado,b.nombre as banco,es.correo,u.rol_id");
		$this->db->from("registro_pago r");
		$this->db->join("estudiante es","r.id_estudiante = es.id");
		$this->db->join("usuarios u","r.id_usuario = u.id");
		$this->db->join("estado est","r.id_estado_estudio = est.id");
		$this->db->join("banco b","r.id_banco = b.id");
		$this->db->join("periodo pe","r.id_periodo = pe.id");		
		$this->db->where("r.status", 1);
		$this->db->where("r.tramite", 0);
		$this->db->where_in("pe.id", $id_periodo);	
		$this->db->group_by("r.id_usuario,r.aspirante");
		$this->db->order_by("r.id", "ASC");
		$resultados = $this->db->get();
	//	var_dump($this->db->queries);
		return $resultados->result();
	}
	public function getRegistro_Pago_adicional_tramite(){//todos los estudiantes que registraron el primer pago
		$this->db->query("SET sql_mode=(SELECT REPLACE(@@sql_mode, 'ONLY_FULL_GROUP_BY', ''));");	
		$this->db->select("r.*,es.cedula as cedula_est,es.nombre_primer as pri_nombre,es.nombre_segundo as seg_nombre,es.apellido_primer as pri_apellido,
		es.apellido_segundo as seg_apellido,est.estado as nob_estado,b.nombre as banco,es.correo,u.rol_id,
		tra.nombre as tramite,st.fecha_solicitud,pr.nombre as programa,st.id as id_solicitud, st.id_usuario as usuario_solicitud");
		$this->db->from("registro_pago r");
		$this->db->join("estudiante es","r.id_estudiante = es.id");
		$this->db->join("usuarios u","r.id_usuario = u.id");
		$this->db->join("estado est","r.id_estado_estudio = est.id");
		$this->db->join("banco b","r.id_banco = b.id");
		$this->db->join("periodo pe","r.id_periodo = pe.id");		
		$this->db->join("solicitud_tramite st","st.id = r.id_solicitud_tramite");
		$this->db->join("tramites tra","st.id_tramite = tra.id");
		$this->db->join("programa pr","st.id_programa = pr.id");
		$this->db->where("r.status", 1);
		$this->db->where("r.tramite", 1);
		$this->db->where("pe.status", 1);
		$this->db->group_by("st.id");
		$this->db->order_by("r.id", "ASC");
		$resultados = $this->db->get();
		//var_dump($this->db->queries);
		return $resultados->result();
	}
	/*actualizado 29-03-2022*/
	public function getRegistro_Pago_adicional_usuario($id){

		$this->db->select("r.*");
		$this->db->from("registro_pago r");				
		$this->db->join("periodo pe","r.id_periodo = pe.id");
		$this->db->where("r.id_usuario", $id);
		$this->db->where("r.status", 1);
		$this->db->where("pe.status", 1);
		$this->db->or_where("pe.status_aspirante",1);
		$this->db->order_by("r.id", "ASC");
		$resultados = $this->db->get();
		//var_dump($this->db->queries);
		return $resultados->result();
	}

	public function getRegistro_Pago_error($id_usuario){//pago conciliado con error  caso simon

		$this->db->select("mp.id,mp.id_usuario,r.conciliado,oa.id as oferta_id ,oa.cupos_ocupados,u.rol_id");
		$this->db->from("registro_pago r");	
		$this->db->join("usuarios u","r.id_usuario = u.id");
		$this->db->join("materias_preinscritas mp","r.id_usuario = mp.id_usuario");
		$this->db->join("oferta_academica oa","mp.id_oferta_academica = oa.id");
		$this->db->join("periodo pe","r.id_periodo = pe.id");			
		$this->db->where("r.conciliado", 2);
		$this->db->where("mp.reg_pago", 1);
		$this->db->where("r.status", 1);
		$this->db->where("pe.status", 1);
		$this->db->or_where("pe.status_aspirante",1);
		$this->db->where("mp.id_usuario", $id_usuario);
		$this->db->order_by("r.id", "ASC");
		$resultados = $this->db->get();
		return $resultados->result();
	}
	public function getRegistro_Pago_alumno($id_usuario){// ver caso simon sin conciliar pago

		$this->db->select("r.*,es.cedula as cedula_est,es.nombre_primer as pri_nombre,es.nombre_segundo as seg_nombre,es.apellido_primer as pri_apellido,es.apellido_segundo as seg_apellido,est.estado as nob_estado,b.nombre as banco");
		$this->db->from("registro_pago r");
		$this->db->join("estudiante es","r.id_estudiante = es.id");
		$this->db->join("estado est","r.id_estado_estudio = est.id");
		$this->db->join("banco b","r.id_banco = b.id");
		$this->db->join("periodo pe","r.id_periodo = pe.id");
		$this->db->join("materias_preinscritas mp","r.id_usuario = mp.id_usuario");
		$this->db->where("r.conciliado", 0);
		$this->db->where("mp.status", 0);
		$this->db->where("r.status", 1);
		$this->db->where("pe.status", 1);
		$this->db->where("pe.id", "mp.id_periodo");
		$this->db->where("r.id_usuario", $id_usuario);		
		$this->db->where("mp.reg_pago",0);
		$this->db->order_by("r.id", "ASC");
		//var_dump($this->db->queries);
		$resultados = $this->db->get();
		return $resultados->result();
	}
	public function getRegistro_Pago_alumno_conc($id_usuario){// ver caso simon ya conciliado el pago

		$this->db->select("r.*,es.cedula as cedula_est,es.nombre_primer as pri_nombre,es.nombre_segundo as seg_nombre,es.apellido_primer as pri_apellido,es.apellido_segundo as seg_apellido,est.estado as nob_estado,b.nombre as banco");
		$this->db->from("registro_pago r");
		$this->db->join("estudiante es","r.id_estudiante = es.id");
		$this->db->join("estado est","r.id_estado_estudio = est.id");
		$this->db->join("banco b","r.id_banco = b.id");
		$this->db->join("periodo pe","r.id_periodo = pe.id");
		$this->db->join("materias_preinscritas mp","r.id_usuario = mp.id_usuario");
		$this->db->where("r.conciliado", 1);
		$this->db->where("mp.status", 1);
		$this->db->where("r.status", 1);
		$this->db->where("pe.status", 1);
		$this->db->where("pe.id", "mp.id_periodo");
		$this->db->where("r.id_usuario", $id_usuario);
		$this->db->order_by("r.id", "ASC");
		$resultados = $this->db->get();
		return $resultados->result();
	}
	public function getRegistro_Pago_alumno_rev_ac($id_usuario){//caso yaneth sin revision academica

		$this->db->select("r.*,es.cedula as cedula_est,es.nombre_primer as pri_nombre,es.nombre_segundo as seg_nombre,es.apellido_primer as pri_apellido,es.apellido_segundo as seg_apellido,est.estado as nob_estado,b.nombre as banco");
		$this->db->from("registro_pago r");
		$this->db->join("estudiante es","r.id_estudiante = es.id");
		$this->db->join("estado est","r.id_estado_estudio = est.id");
		$this->db->join("banco b","r.id_banco = b.id");
		$this->db->join("periodo pe","r.id_periodo = pe.id");
		$this->db->join("materias_preinscritas mp","r.id_usuario = mp.id_usuario");
		$this->db->where("r.conciliado", 1);
		$this->db->where("mp.status", 0);
		$this->db->where("r.status", 1);
		$this->db->where("pe.status", 1);
		$this->db->where("pe.id", "mp.id_periodo");
		$this->db->where("r.id_usuario", $id_usuario);
		$this->db->order_by("r.id", "ASC");
		$resultados = $this->db->get();
		return $resultados->result();
	}
	public function ver_postgrado_alumno($id_usuario,$id_periodo){// caso sin revision de pago (simon)  no conciliados
		$this->db->query("SET sql_mode=(SELECT REPLACE(@@sql_mode, 'ONLY_FULL_GROUP_BY', ''));");	
		$this->db->select("es.cedula as cedula_est, es.nombre_primer as pri_nombre,es.nombre_segundo as seg_nombre,es.apellido_primer as pri_apellido,es.apellido_segundo as seg_apellido,oa.trimestre,pr.nombre as programa,oa.unidades_creditos as uc,p.nombre as materia,mp.id_periodo");
		$this->db->from("registro_pago r");
		$this->db->join("estudiante es","r.id_estudiante = es.id");
		$this->db->join("materias_preinscritas mp","r.id_usuario = mp.id_usuario");
		$this->db->join("oferta_academica oa","mp.id_oferta_academica = oa.id");		
		$this->db->join("programa pr","oa.id_programa = pr.id");
		$this->db->join("pensum p","oa.id_pensum = p.id");
		$this->db->join("periodo pe","r.id_periodo = pe.id");
		$this->db->where("r.conciliado", 0);
		$this->db->where("mp.status", 1);
		$this->db->where("r.status", 1);
		$this->db->where("mp.id_periodo",$id_periodo);
		$this->db->where("r.id_usuario", $id_usuario);
		$this->db->where("pe.status",1);
		$this->db->group_by("r.id_usuario,mp.id_oferta_academica");
		$this->db->order_by("r.id", "ASC");

		$resultados = $this->db->get();
		return $resultados->result();
	}
	
	public function ver_postgrado_alumno_conc($id_usuario,$id_periodo){// caso sin revision de pago (simon) conciliados
$this->db->query("SET sql_mode=(SELECT REPLACE(@@sql_mode, 'ONLY_FULL_GROUP_BY', ''));");	
		$this->db->select("es.cedula as cedula_est, es.nombre_primer as pri_nombre,es.nombre_segundo as seg_nombre,
		es.apellido_primer as pri_apellido,es.apellido_segundo as seg_apellido,oa.trimestre,pr.nombre as programa,oa.unidades_creditos as uc,p.nombre as materia");
		$this->db->from("registro_pago r");
		$this->db->join("estudiante es","r.id_estudiante = es.id");
		$this->db->join("materias_preinscritas mp","r.id_usuario = mp.id_usuario");
		$this->db->join("oferta_academica oa","mp.id_oferta_academica = oa.id");		
		$this->db->join("programa pr","oa.id_programa = pr.id");
		$this->db->join("pensum p","oa.id_pensum = p.id");
		$this->db->join("periodo pe","r.id_periodo = pe.id");
		$this->db->where("r.conciliado", 1);
		$this->db->where("mp.status", 1);
		$this->db->where("r.status", 1);
		$this->db->where("pe.status", 1);
		$this->db->where("mp.id_periodo",$id_periodo);
		$this->db->where("r.id_usuario", $id_usuario);
		$this->db->group_by("r.id_usuario,mp.id_oferta_academica");
		$this->db->order_by("r.id", "ASC");
		$resultados = $this->db->get();
		return $resultados->result();
	}
	public function ver_postgrado_alumno_conc_ant($id_usuario,$id_periodo){// caso sin revision de pago (simon) conciliados
		$this->db->query("SET sql_mode=(SELECT REPLACE(@@sql_mode, 'ONLY_FULL_GROUP_BY', ''));");	
				$this->db->select("es.cedula as cedula_est, es.nombre_primer as pri_nombre,es.nombre_segundo as seg_nombre,
				es.apellido_primer as pri_apellido,es.apellido_segundo as seg_apellido,oa.trimestre,pr.nombre as programa,oa.unidades_creditos as uc,p.nombre as materia");
				$this->db->from("registro_pago r");
				$this->db->join("estudiante es","r.id_estudiante = es.id");
				$this->db->join("materias_preinscritas mp","r.id_usuario = mp.id_usuario");
				$this->db->join("oferta_academica oa","mp.id_oferta_academica = oa.id");		
				$this->db->join("programa pr","oa.id_programa = pr.id");
				$this->db->join("pensum p","oa.id_pensum = p.id");
				$this->db->join("periodo pe","r.id_periodo = pe.id");
				$this->db->where("r.conciliado", 1);
				$this->db->where("mp.status", 1);
				$this->db->where("r.status", 1);
			
				$this->db->where("mp.id_periodo",$id_periodo);
				$this->db->where("r.id_usuario", $id_usuario);
				$this->db->group_by("r.id_usuario,mp.id_oferta_academica");
				$this->db->order_by("r.id", "ASC");
				$resultados = $this->db->get();
				return $resultados->result();
			}
	public function ver_postgrado_alumno_conc_error($id_usuario,$id_periodo){// caso sin revision de pago (simon) conciliados
		$this->db->query("SET sql_mode=(SELECT REPLACE(@@sql_mode, 'ONLY_FULL_GROUP_BY', ''));");	
		$this->db->select("es.cedula as cedula_est, es.nombre_primer as pri_nombre,es.nombre_segundo as seg_nombre,es.apellido_primer as pri_apellido,es.apellido_segundo as seg_apellido,oa.trimestre,pr.nombre as programa,oa.unidades_creditos as uc,p.nombre as materia");
		$this->db->from("registro_pago r");
		$this->db->join("estudiante es","r.id_estudiante = es.id");
		$this->db->join("materias_preinscritas mp","r.id_usuario = mp.id_usuario");
		$this->db->join("oferta_academica oa","mp.id_oferta_academica = oa.id");		
		$this->db->join("programa pr","oa.id_programa = pr.id");
		$this->db->join("pensum p","oa.id_pensum = p.id");
		$this->db->join("periodo pe","r.id_periodo = pe.id");
		$this->db->where("r.conciliado", 2);
		$this->db->where("mp.status", 1);
		$this->db->where("r.status", 1);
		$this->db->where("pe.status", 1);
		$this->db->where("mp.id_periodo",$id_periodo);
		$this->db->where("r.id_usuario", $id_usuario);
		$this->db->group_by("r.id_usuario,mp.id_oferta_academica");
		$this->db->order_by("r.id", "ASC");
		$resultados = $this->db->get();
		return $resultados->result();
	}
		/*actualizado 01-04-2022*/
public function ver_postgrado_alumno_rev_ac($id_usuario,$id_periodo){// caso sin revision academica (yaneth)

$this->db->query("SET sql_mode=(SELECT REPLACE(@@sql_mode, 'ONLY_FULL_GROUP_BY', ''));");	
		$this->db->select("es.cedula as cedula_est, es.nombre_primer as pri_nombre,es.nombre_segundo as seg_nombre,es.apellido_primer as pri_apellido,es.apellido_segundo as seg_apellido,oa.trimestre,pr.nombre as programa,oa.unidades_creditos as uc,p.nombre as materia,mp.id_periodo");
		$this->db->from("registro_pago r");
		$this->db->join("estudiante es","r.id_estudiante = es.id");
		$this->db->join("materias_preinscritas mp","r.id_usuario = mp.id_usuario");
		$this->db->join("oferta_academica oa","mp.id_oferta_academica = oa.id");		
		$this->db->join("programa pr","oa.id_programa = pr.id");
		$this->db->join("pensum p","oa.id_pensum = p.id");
		$this->db->join("periodo pe","r.id_periodo = pe.id");
		$this->db->where("r.conciliado", 1);
		$this->db->where("mp.status", 1);
		$this->db->where("r.status", 1);
		$this->db->where("pe.status", 1);
		$this->db->where("mp.id_periodo",$id_periodo);
		$this->db->where("r.id_usuario", $id_usuario);
		$this->db->where("pe.status", 1);
		$this->db->group_by("r.id_usuario,mp.id_oferta_academica");
		$this->db->order_by("r.id", "ASC");

		$resultados = $this->db->get();
		return $resultados->result();
	}


	public function Pago_conciliado($id_periodo){

		$this->db->query("SET sql_mode=(SELECT REPLACE(@@sql_mode, 'ONLY_FULL_GROUP_BY', ''));");	
		$this->db->select("pe.nombre as periodo,r.*,es.nacionalidad as estudiante_nac,es.cedula as estudiante,es.nombre_primer as pri_nombre,es.nombre_segundo as seg_nombre,es.apellido_primer as pri_apellido,es.apellido_segundo as seg_apellido,est.estado as nob_estado,b.nombre as banco,es.correo,u.rol_id,l.lugar_trabajo as trabajo ");
		$this->db->from("registro_pago r");
		$this->db->join("estudiante es","r.id_estudiante = es.id");
		$this->db->join("trabajo tr","tr.id_usuario = r.id_usuario");
		$this->db->join("lugar_trabajo l","tr.id_lugar_trabajo = l.id");
		$this->db->join("usuarios u","r.id_usuario = u.id");
		$this->db->join("estado est","r.id_estado_estudio = est.id");
		$this->db->join("banco b","r.id_banco = b.id");
		$this->db->join("periodo pe","r.id_periodo = pe.id");
		$this->db->join("control_requisitos cr","cr.id_usuario = r.id_usuario",left);
		$this->db->where("r.conciliado", 1);
		$this->db->where("r.status", 1);	
		$this->db->where("r.tramite", 0);
		$this->db->where_in("pe.id", $id_periodo);
		$this->db->where_in("cr.id_periodo", $id_periodo);		
		$this->db->group_by("r.id");	
		$this->db->order_by("r.id", "ASC");
		$resultados = $this->db->get();
		///var_dump($this->db->queries);
		return $resultados->result();
	}

	public function Pago_conciliado_error($id_periodo){

		$this->db->select("pe.nombre as periodo,r.*,u.rol_id,es.nacionalidad as estudiante_nac,es.cedula as estudiante,es.nombre_primer as pri_nombre,es.nombre_segundo as seg_nombre,es.apellido_primer as pri_apellido,es.apellido_segundo as seg_apellido,est.estado as nob_estado,b.nombre as banco");
		$this->db->from("registro_pago r");
		$this->db->join("estudiante es","r.id_estudiante = es.id");
		$this->db->join("usuarios u","r.id_usuario = u.id");
		$this->db->join("estado est","r.id_estado_estudio = est.id");
		$this->db->join("banco b","r.id_banco = b.id");
		$this->db->join("periodo pe","r.id_periodo = pe.id");
		$this->db->where("r.conciliado", 2);
		$this->db->where("r.status", 1);		
		$this->db->where_in("r.id_periodo",$id_periodo);
		$this->db->order_by("r.id", "ASC");
		$resultados = $this->db->get();
		//var_dump($this->db->queries);
		return $resultados->result();
	
	}
	public function Pago_conciliado_tramite(){
		$this->db->select("r.*,es.nacionalidad as estudiante_nac,es.cedula as estudiante,es.nombre_primer as pri_nombre,es.nombre_segundo as seg_nombre,es.apellido_primer as pri_apellido,es.apellido_segundo as seg_apellido,est.estado as nob_estado,b.nombre as banco,u.rol_id");
		$this->db->from("registro_pago r");
		$this->db->join("estudiante es","r.id_estudiante = es.id");
		$this->db->join("usuarios u","r.id_usuario = u.id");
		$this->db->join("estado est","r.id_estado_estudio = est.id");
		$this->db->join("banco b","r.id_banco = b.id");
		$this->db->join("periodo pe","r.id_periodo = pe.id");
		$this->db->where("r.conciliado", 1);
		$this->db->where("r.status", 1);
		$this->db->where("pe.status", 1);
		$this->db->where("r.tramite",1);
		$this->db->order_by("r.id", "ASC");
		$resultados = $this->db->get();
		//var_dump($this->db->queries);
		return $resultados->result();
	}

	public function Pago_conciliado_error_tramite(){

		$this->db->select("r.*,es.nacionalidad as estudiante_nac,es.cedula as estudiante,es.nombre_primer as pri_nombre,es.nombre_segundo as seg_nombre,es.apellido_primer as pri_apellido,es.apellido_segundo as seg_apellido,est.estado as nob_estado,b.nombre as banco");
		$this->db->from("registro_pago r");
		$this->db->join("estudiante es","r.id_estudiante = es.id");
		$this->db->join("estado est","r.id_estado_estudio = est.id");
		$this->db->join("banco b","r.id_banco = b.id");
		$this->db->join("periodo pe","r.id_periodo = pe.id");
		$this->db->where("r.conciliado", 2);
		$this->db->where("r.status", 1);
		$this->db->where("pe.status", 1);
		
		$this->db->where("r.tramite",1);
		$this->db->order_by("r.id", "ASC");
		$resultados = $this->db->get();
		//var_dump($this->db->queries);
		return $resultados->result();
	
	}

	/*actualizado 30-03-2022*/
	public function Revision_Academica(){
		$this->db->query("SET sql_mode=(SELECT REPLACE(@@sql_mode, 'ONLY_FULL_GROUP_BY', ''));");	
		$this->db->select("r.*,es.nacionalidad as estudiante_nac,es.cedula as estudiante,es.nombre_primer as pri_nombre,es.nombre_segundo as seg_nombre,es.apellido_primer as pri_apellido,es.apellido_segundo as seg_apellido,est.estado as nob_estado ,
		 ban.nombre as nombre_banco, u.rol_id");
		$this->db->from("registro_pago r");
		$this->db->join("estudiante es","r.id_estudiante = es.id");
		$this->db->join("usuarios u","r.id_usuario = u.id");
		$this->db->join("estado est","r.id_estado_estudio = est.id");
		$this->db->join("banco ban","r.id_banco = ban.id");
		$this->db->join("periodo pe","r.id_periodo = pe.id");		
		$this->db->where("r.conciliado", 1);
		$this->db->where("r.academico", 0);
		$this->db->where("r.pago_adicional", 0);
		$this->db->where("r.tramite", 0);
		$this->db->where("r.status", 1);	
		$this->db->where("pe.status", 1);	
		$this->db->where("r.aspirante",0);
		$this->db->GROUP_by("r.id_usuario");	
		$this->db->order_by("r.id", "ASC");
		$resultados = $this->db->get();
	//	var_dump($this->db->queries);
		return $resultados->result();

	
	}
	public function Revision_Academica_asp(){
		$this->db->query("SET sql_mode=(SELECT REPLACE(@@sql_mode, 'ONLY_FULL_GROUP_BY', ''));");	
		$this->db->select("r.*,es.nacionalidad as estudiante_nac,es.cedula as estudiante,es.nombre_primer as pri_nombre,es.nombre_segundo as seg_nombre,es.apellido_primer as pri_apellido,es.apellido_segundo as seg_apellido,est.estado as nob_estado ,
		 ban.nombre as nombre_banco, u.rol_id");
		$this->db->from("registro_pago r");
		$this->db->join("estudiante es","r.id_estudiante = es.id");
		$this->db->join("usuarios u","r.id_usuario = u.id");
		$this->db->join("estado est","r.id_estado_estudio = est.id");
		$this->db->join("banco ban","r.id_banco = ban.id");
		$this->db->join("periodo pe","r.id_periodo = pe.id");		
		$this->db->where("r.conciliado", 1);
		$this->db->where("r.academico", 0);
		$this->db->where("r.pago_adicional", 0);
		$this->db->where("r.tramite", 0);
		$this->db->where("r.aspirante", 1);
		$this->db->where("r.status", 1);
		$this->db->where("pe.status_aspirante",1);
		$this->db->GROUP_by("r.id_usuario");	
		$this->db->order_by("r.id", "ASC");
		$resultados = $this->db->get();
		return $resultados->result();
	
	}
	public function Revision_Academica3(){//ver datos de alumnos inscritos y revisados
		$this->db->query("SET sql_mode=(SELECT REPLACE(@@sql_mode, 'ONLY_FULL_GROUP_BY', ''));");	
		$this->db->select("r.*,es.nacionalidad as estudiante_nac,es.cedula as estudiante,es.nombre_primer as pri_nombre,es.nombre_segundo as seg_nombre,es.apellido_primer as pri_apellido,es.apellido_segundo as seg_apellido,est.estado as nob_estado , ban.nombre as nombre_banco,u.rol_id");
		$this->db->from("registro_pago r");
		$this->db->join("usuarios u","r.id_usuario = u.id");
		$this->db->join("estudiante es","r.id_estudiante = es.id");
		$this->db->join("estado est","r.id_estado_estudio = est.id");
		$this->db->join("banco ban","r.id_banco = ban.id");
		$this->db->join("periodo pe","r.id_periodo = pe.id");
		$this->db->where("r.conciliado", 1);
		$this->db->where("r.academico", 1);
		$this->db->where("r.status", 1);	
		$this->db->where("pe.status", 1);	
		$this->db->GROUP_by("r.id_usuario");		
		$this->db->order_by("r.id", "ASC");
		$resultados = $this->db->get();
		return $resultados->result();
	
	}
	public function unidades_creditos_pagadas($id_usuario){

		$this->db->select("r.*,es.nacionalidad as estudiante_nac,es.cedula as estudiante,es.nombre_primer as pri_nombre,es.nombre_segundo as seg_nombre,es.apellido_primer as pri_apellido,es.apellido_segundo as seg_apellido,est.estado as nob_estado");
		$this->db->from("registro_pago r");
		$this->db->join("estudiante es","r.id_estudiante = es.id");
		$this->db->join("estado est","r.id_estado_estudio = est.id");
		$this->db->join("periodo pe","r.id_periodo = pe.id");
		$this->db->where("r.conciliado", 1);
		$this->db->where("r.academico", 0);
		$this->db->where("r.status", 1);
		$this->db->where("r.id_usuario", $id_usuario);	
		$this->db->where("pe.status", 1);	
		$this->db->order_by("r.id", "ASC");
//		$this->db->limit("1");
		$resultados = $this->db->get();
		//var_dump($this->db->queries);
		return $resultados->result();
	
	}

	public function save($data){
		$result = $this->db->insert("registro_pago", $data);
		
		// ✅ Logs de diagnóstico (solo para depurar)
		log_message('error', '===> save() result=' . var_export($result, true));
		log_message('error', '===> save() insert_id=' . $this->db->insert_id());
		log_message('error', '===> save() affected_rows=' . $this->db->affected_rows());
		log_message('error', '===> save() error=' . print_r($this->db->error(), true));
		log_message('error', '===> save() last_query=' . $this->db->last_query());
		
		return $result;
	}
	public function RegistradoPago($id_usuario,$id_periodo){

		$this->db->where("id_usuario",$id_usuario);
		$this->db->where("id_periodo",$id_periodo);
		$this->db->where("reg_pago",1);
		$resultados = $this->db->get("materias_preinscritas");
		
 
		if ($resultados->num_rows() > 0) {
			return true;
		}
		else{
			return false;
		}
	}

public function RegistradoPago_asp($id_usuario,$id_periodo){
$conc=array(0, 1);
		$this->db->where("id_usuario",$id_usuario);
		$this->db->where("id_periodo",$id_periodo);
		$this->db->where_in("conciliado",$conc);
		$resultados = $this->db->get("registro_pago");
		//var_dump($this->db->queries);
 
		if ($resultados->num_rows() > 0) {
			return true;
		}
		else{
			return false;
		}
	}	

	public function VerificarRegistro($id_usuario,$id_periodo){
		
		$this->db->where("id_usuario",$id_usuario);
		$this->db->where("id_periodo",$id_periodo);
		
		$resultados = $this->db->get("registro_pago");
	

		if ($resultados->num_rows() > 0) {
			return true;
		}
		else{
			return false;
		}
	}
	public function VerificarRegistro_validado($id_usuario,$id_periodo){ //inscripciones
		
		$this->db->where("id_usuario",$id_usuario);
		$this->db->where("id_periodo",$id_periodo);
		$this->db->where("conciliado",1);
		$this->db->where("tramite",0);
		
		$resultados = $this->db->get("registro_pago");
	

		if ($resultados->num_rows() > 0) {
			return true;
		}
		else{
			return false;
		}
	}
	
	
	
	public function VerificarRegistro_pago($id_usuario,$id_periodo){

		$this->db->join("banco","banco.id = registro_pago.id_banco");
		$this->db->where("id_usuario",$id_usuario);
		$this->db->where("id_periodo",$id_periodo);
		$resultados = $this->db->get("registro_pago");
		//var_dump($this->db->queries);
		if ($resultados->num_rows() > 0) {
			return $resultados->row();
		}
		else{
			return false;
		}
	}
	
	public function VerificarRegistro_pagotodos($id_usuario,$id_periodo){

		$this->db->join("banco","banco.id = registro_pago.id_banco");
		$this->db->where("id_usuario",$id_usuario);
		$this->db->where("id_periodo",$id_periodo);
		$resultados = $this->db->get("registro_pago");
		//var_dump($this->db->queries);
		if ($resultados->num_rows() > 0) {
			return $resultados->result();
		}
		else{
			return false;
		}
	}
	public function MostrarRegistro_pago($id_usuario,$id_periodo){

		$this->db->join("banco","banco.id = registro_pago.id_banco");
		$this->db->where("id_usuario",$id_usuario);
		$this->db->where("id_periodo",$id_periodo);
		$this->db->where("registro_pago.status", 1);
		$this->db->where("registro_pago.tramite", 0);
		$resultados = $this->db->get("registro_pago");
		//var_dump($this->db->queries);
		if ($resultados->num_rows() > 0) {
			return $resultados->result();
		}
		else{
			return false;
		}
	}

	public function save_conciliacion($id,$id_periodo,$data){

		$this->db->where("id_usuario",$id);
		$this->db->where("id_periodo",$id_periodo);
	
    // ✅ Logs de diagnóstico (solo para depurar)
    log_message('error', '===> save() result=' . var_export($result, true));
    log_message('error', '===> save() insert_id=' . $this->db->insert_id());
    log_message('error', '===> save() affected_rows=' . $this->db->affected_rows());
    log_message('error', '===> save() error=' . print_r($this->db->error(), true));
    log_message('error', '===> save() last_query=' . $this->db->last_query());
	return $this->db->update("registro_pago",$data);

		
	}
	public function save_conciliacion_tramite($id_solicitud,$data){
	
		$this->db->where("id_solicitud_tramite",$id_solicitud);		
		return $this->db->update("registro_pago",$data);
	}
	

	public function save_conciliacion_error($id,$id_periodo,$data){

		$this->db->where("id_usuario",$id);
		$this->db->where("id_periodo",$id_periodo);
	
		return 	$this->db->update("registro_pago",$data);
		//var_dump($this->db->queries);
	}
	
	public function save_conciliacion_error_tramite($id_solicitud,$data){
			$this->db->where("id_solicitud_tramite",$id_solicitud);				
		return $this->db->update("registro_pago",$data);
		//var_dump($this->db->queries);
	}
	public function ConciliacionPago($id_usuario,$id_periodo){

		$this->db->where("id_usuario",$id_usuario);
		$this->db->where("id_periodo",$id_periodo);
		$this->db->where("tramite",0);
		$resultados = $this->db->get("registro_pago");
		//var_dump($this->db->queries);
		//return $resultados->row();
		if ($resultados->num_rows() > 0) {
			return $resultados->row();
		}
		else{
			return false;
		}
	
	}

	
	public function Verificacion_conciliacion($id_usuario,$id_periodo){

		$this->db->where("id_usuario",$id_usuario);
		$this->db->where("id_periodo",$id_periodo);
		$this->db->where("tramite",0);
		$this->db->where("conciliado",1);
		$resultados = $this->db->get("registro_pago");
		if ($resultados->num_rows() > 0) {
			return true;
		}
		else{
			return false;
		}
	
	}

	public function update_academico($id,$id_periodo,$data){
		$this->db->where("id_usuario",$id);
		$this->db->where("id_periodo",$id_periodo);
		return $this->db->update("registro_pago",$data);
	}

	public function Revision_Academica2($id,$aspirante){
		$this->db->select("r.*,es.cedula as cedula,es.nombre_primer as pri_nombre,
		es.nombre_segundo as seg_nombre,es.apellido_primer as pri_apellido,es.apellido_segundo as seg_apellido,
		est.estado as nob_estado, ch.descripcion as cod_hab,es.tel_habitacion as telefono_hab,cc.descripcion as cod_cel,es.tel_celular as telefono_cel, es.correo");
		$this->db->from("registro_pago r");
		$this->db->join("estudiante es","r.id_estudiante = es.id");
		$this->db->join("estado est","r.id_estado_estudio = est.id");
		$this->db->join("periodo pe","r.id_periodo = pe.id");
		$this->db->join("codigo_cel cc","es.id_codigo_cel = cc.id");
		$this->db->join("codigo_hab ch","es.id_codigo_hab = ch.id");
		$this->db->where("r.conciliado", 1);
		$this->db->where("r.academico", 0);
		$this->db->where("r.status", 1);
		$this->db->where("r.tramite", 0);
		$this->db->where("r.id_usuario", $id);
		$this->db->where("pe.status_aspirante", $aspirante);	
		$this->db->order_by("r.id", "ASC");

		//var_dump($this->db->queries);
		$resultados = $this->db->get();
		
		return $resultados->result();
	
	}
	public function Revision_Academica21($id){

		$this->db->select("r.*,es.nombre_primer as pri_nombre,es.nombre_segundo as seg_nombre,es.apellido_primer as pri_apellido,es.apellido_segundo as seg_apellido,est.estado as nob_estado, es.tel_habitacion as telefono_hab,es.tel_celular as telefono_cel, es.correo");
		$this->db->from("registro_pago r");
		$this->db->join("estudiante es","r.id_estudiante = es.id");
		$this->db->join("estado est","r.id_estado_estudio = est.id");
		$this->db->join("periodo pe","r.id_periodo = pe.id");
		$this->db->where("r.conciliado", 1);	
		$this->db->where("r.tramite", 0);
$this->db->where("r.aspirante", 0);	
		$this->db->where("r.status", 1);
		$this->db->where("r.id_usuario", $id);
		$this->db->where("pe.status", 1);	
		$this->db->order_by("r.id", "ASC");
		//var_dump($this->db->queries);
		$resultados = $this->db->get();
		
		return $resultados->result();
	
	}
public function Revision_Academica21_asp($id){

		$this->db->select("r.*,es.nombre_primer as pri_nombre,es.nombre_segundo as seg_nombre,es.apellido_primer as pri_apellido,es.apellido_segundo as seg_apellido,est.estado as nob_estado, es.tel_habitacion as telefono_hab,es.tel_celular as telefono_cel, es.correo");
		$this->db->from("registro_pago r");
		$this->db->join("estudiante es","r.id_estudiante = es.id");
		$this->db->join("estado est","r.id_estado_estudio = est.id");
		$this->db->join("periodo pe","r.id_periodo = pe.id");
		$this->db->where("r.conciliado", 1);		
		$this->db->where("r.status", 1);
$this->db->where("r.aspirante", 1);
		$this->db->where("r.id_usuario", $id);
		$this->db->where("pe.status_aspirante", 1);	
		$this->db->order_by("r.id", "ASC");
		//var_dump($this->db->queries);
		$resultados = $this->db->get();
		
		return $resultados->result();
	
	}
	
	public function Revision_documentos($id_usuario,$id_periodo){

		$this->db->where("id_usuario",$id_usuario);
		$this->db->where("id_periodo",$id_periodo);
		$this->db->where("academico",1);
		$resultados = $this->db->get("registro_pago");
		if ($resultados->num_rows() > 0) {
			return true;
		}
		else{
			return false;
		}
	

	}

	public function getRegistro_PagoTramite(){
		$this->db->query("SET sql_mode=(SELECT REPLACE(@@sql_mode, 'ONLY_FULL_GROUP_BY', ''));");	
				$this->db->select("r.*,pe.nombre as periodo,es.cedula as cedula_est,es.nombre_primer as pri_nombre,
				es.nombre_segundo as seg_nombre,es.apellido_primer as pri_apellido,es.apellido_segundo as seg_apellido,CONCAT(codigo_cel.descripcion,es.tel_celular) AS tel_cel,
				est.estado as nob_estado,b.nombre as banco,es.correo,u.rol_id,l.lugar_trabajo as trabajo,st.id as id_solicitud,st.fecha_solicitud,st.uc,
				tra.nombre as tramite, pr.nombre as programa ");
				$this->db->from("registro_pago r");
				$this->db->join("estudiante es","r.id_estudiante = es.id");
				$this->db->join("codigo_cel","codigo_cel.id=es.id_codigo_cel",RIGHT);
				$this->db->join("trabajo tr","tr.id_usuario = r.id_usuario");
				$this->db->join("lugar_trabajo l","tr.id_lugar_trabajo = l.id");
				$this->db->join("usuarios u","r.id_usuario = u.id");
				$this->db->join("estado est","r.id_estado_estudio = est.id");
				$this->db->join("banco b","r.id_banco = b.id");
				$this->db->join("solicitud_tramite st","st.id = r.id_solicitud_tramite");
				$this->db->join("tramites tra","st.id_tramite = tra.id");
				$this->db->join("programa pr","st.id_programa = pr.id");
				$this->db->join("periodo pe","pe.id = r.id_periodo");
				$this->db->where("r.conciliado", 0);
				$this->db->where("r.status", 1);
				$this->db->where("r.tramite", 1);
				$this->db->where("tr.actual", 1);				
				$this->db->order_by("st.fecha_solicitud", "ASC");
				$resultados = $this->db->get();
				//var_dump($this->db->queries);
				return $resultados->result();
			}
			public function getRegistro_PagoTramite_conc(){
				$this->db->query("SET sql_mode=(SELECT REPLACE(@@sql_mode, 'ONLY_FULL_GROUP_BY', ''));");	
				$this->db->select("r.*,pe.nombre as periodo, es.cedula as cedula_est,es.nombre_primer as pri_nombre,CONCAT(codigo_cel.descripcion,es.tel_celular) AS 	
				tel_cel,es.nombre_segundo as seg_nombre,es.apellido_primer as pri_apellido,es.apellido_segundo as seg_apellido,
				est.estado as nob_estado,b.nombre as banco,es.correo,u.rol_id,l.lugar_trabajo as trabajo,st.id as 		
				id_solicitud,st.fecha_solicitud,st.reg_pago,st.rev_academica,
				tra.nombre as tramite, pr.nombre as programa,r.conciliado as conciliado, r.academico as academico, st.uc ");
				$this->db->from("registro_pago r");
				$this->db->join("estudiante es","r.id_estudiante = es.id");
				$this->db->join("codigo_cel","codigo_cel.id=es.id_codigo_cel",RIGHT);
				$this->db->join("trabajo tr","tr.id_usuario = r.id_usuario");
				$this->db->join("lugar_trabajo l","tr.id_lugar_trabajo = l.id");
				$this->db->join("usuarios u","r.id_usuario = u.id");
				$this->db->join("estado est","r.id_estado_estudio = est.id");
				$this->db->join("banco b","r.id_banco = b.id");
				$this->db->join("solicitud_tramite st","st.id = r.id_solicitud_tramite");
				$this->db->join("tramites tra","st.id_tramite = tra.id");
				$this->db->join("programa pr","st.id_programa = pr.id");
				$this->db->join("periodo pe","pe.id = r.id_periodo");
				$this->db->where("r.conciliado", 1);
				$this->db->where("r.status", 1);
				$this->db->where("r.tramite", 1);			
				$this->db->where("pe.status", 1);	
				$this->db->where("tr.actual", 1);	
				$this->db->order_by("st.fecha_solicitud", "ASC");
				$resultados = $this->db->get();
				//var_dump($this->db->queries);
				return $resultados->result();
			}
			public function getRegistro_PagoTramite_conc_periodo($id){
				$tramite=array(16,36);
				$this->db->query("SET sql_mode=(SELECT REPLACE(@@sql_mode, 'ONLY_FULL_GROUP_BY', ''));");	
				$this->db->select("r.*,es.cedula as cedula_est,es.nombre_primer as pri_nombre,
				es.nombre_segundo as seg_nombre,es.apellido_primer as pri_apellido,es.apellido_segundo as seg_apellido,
				est.estado as nob_estado,b.nombre as banco,es.correo,u.rol_id,l.lugar_trabajo as trabajo,st.id as id_solicitud,st.fecha_solicitud,st.reg_pago,st.rev_academica,
				tra.nombre as tramite, pr.nombre as programa,pr.id as id_programa, st.id_usuario as id_usuario,st.uc,st.id_tramite ");
				$this->db->from("registro_pago r");
				$this->db->join("estudiante es","r.id_estudiante = es.id");
				$this->db->join("trabajo tr","tr.id_usuario = r.id_usuario");
				$this->db->join("lugar_trabajo l","tr.id_lugar_trabajo = l.id");
				$this->db->join("usuarios u","r.id_usuario = u.id");
				$this->db->join("estado est","r.id_estado_estudio = est.id");
				$this->db->join("banco b","r.id_banco = b.id");
				$this->db->join("solicitud_tramite st","st.id = r.id_solicitud_tramite");
				$this->db->join("tramites tra","st.id_tramite = tra.id");
				$this->db->join("programa pr","st.id_programa = pr.id");
				$this->db->join("periodo pe","pe.id = r.id_periodo");
				$this->db->where("r.conciliado", 1);
				$this->db->where("r.academico", 1);
				$this->db->where("r.status", 1);
				$this->db->where("r.tramite", 1);
	$this->db->where("tr.actual", 1);	
				$this->db->where_not_in("tra.id",$tramite);					
				$this->db->where("pe.id", $id);	
				$this->db->order_by("st.fecha_solicitud", "ASC");
				$resultados = $this->db->get();
			//	var_dump($this->db->queries);
				return $resultados->result();
			}
			public function getRegistro_PagoTramite_conc_error(){
				$this->db->query("SET sql_mode=(SELECT REPLACE(@@sql_mode, 'ONLY_FULL_GROUP_BY', ''));");	
				$this->db->select("r.*,es.cedula as cedula_est,es.nombre_primer as pri_nombre,
				es.nombre_segundo as seg_nombre,es.apellido_primer as pri_apellido,es.apellido_segundo as seg_apellido,
				est.estado as nob_estado,b.nombre as banco,es.correo,u.rol_id,l.lugar_trabajo as trabajo,st.id as id_solicitud,st.fecha_solicitud,
				tra.nombre as tramite, pr.nombre as programa,,st.uc ");
				$this->db->from("registro_pago r");
				$this->db->join("estudiante es","r.id_estudiante = es.id");
				$this->db->join("trabajo tr","tr.id_usuario = r.id_usuario");
				$this->db->join("lugar_trabajo l","tr.id_lugar_trabajo = l.id");
				$this->db->join("usuarios u","r.id_usuario = u.id");
				$this->db->join("estado est","r.id_estado_estudio = est.id");
				$this->db->join("banco b","r.id_banco = b.id");
				$this->db->join("solicitud_tramite st","st.id = r.id_solicitud_tramite");
				$this->db->join("tramites tra","st.id_tramite = tra.id");
				$this->db->join("programa pr","st.id_programa = pr.id");
				$this->db->join("periodo pe","pe.id = r.id_periodo");
				$this->db->where("r.conciliado", 2);
				$this->db->where("r.status", 1);
				$this->db->where("r.tramite", 1);			
				$this->db->where("pe.status", 1);	
	$this->db->where("tr.actual", 1);		
				$this->db->order_by("st.fecha_solicitud", "ASC");
				$resultados = $this->db->get();
			//	var_dump($this->db->queries);
				return $resultados->result();
			}
			public function MostrarRegistro_pagotramte($id_usuario,$id_solicitud){

				$this->db->join("banco","banco.id = registro_pago.id_banco");
				$this->db->where("id_usuario",$id_usuario);
				$this->db->where("id_solicitud_tramite",$id_solicitud);
				$this->db->where("registro_pago.status", 1);
				$this->db->where("registro_pago.conciliado", 1);
				$this->db->where("registro_pago.academico", 1);
				$resultados = $this->db->get("registro_pago");
				//var_dump($this->db->queries);
				if ($resultados->num_rows() > 0) {
					return $resultados->result();
				}
				else{
					return false;
				}
			}
public function get_solicitides_ruc_validadas($periodo){
				$tramite=array(28);
			
				$this->db->query("SET sql_mode=(SELECT REPLACE(@@sql_mode, 'ONLY_FULL_GROUP_BY', ''));");	
				$this->db->select("r.*,es.cedula as cedula_est,es.nombre_primer as pri_nombre,
				es.nombre_segundo as seg_nombre,es.apellido_primer as pri_apellido,es.apellido_segundo as seg_apellido,
				est.estado as nob_estado,b.nombre as banco,es.correo,u.rol_id,l.lugar_trabajo as trabajo,st.id as id_solicitud,st.fecha_solicitud,st.reg_pago,st.rev_academica,
				tra.nombre as tramite, pr.nombre as programa,pr.id as id_programa, st.id_usuario as id_usuario,st.uc,st.id_tramite ");
				$this->db->from("registro_pago r");
				$this->db->join("estudiante es","r.id_estudiante = es.id");
				$this->db->join("trabajo tr","tr.id_usuario = r.id_usuario");
				$this->db->join("lugar_trabajo l","tr.id_lugar_trabajo = l.id");
				$this->db->join("usuarios u","r.id_usuario = u.id");
				$this->db->join("estado est","r.id_estado_estudio = est.id");
				$this->db->join("banco b","r.id_banco = b.id");
				$this->db->join("solicitud_tramite st","st.id = r.id_solicitud_tramite");
				$this->db->join("tramites tra","st.id_tramite = tra.id");
				$this->db->join("programa pr","st.id_programa = pr.id");
				$this->db->join("periodo pe","pe.id = r.id_periodo");
				$this->db->where("r.conciliado", 1);
				$this->db->where("r.academico", 1);
				$this->db->where("r.status", 1);
				$this->db->where("r.tramite", 1);
	$this->db->where("tr.actual", 1);	
				$this->db->where_in("tra.id",$tramite);					
				$this->db->where("pe.id", $periodo);	
				$this->db->order_by("st.fecha_solicitud", "ASC");
				$resultados = $this->db->get();
			//	var_dump($this->db->queries);
			
				//var_dump($this->db->queries);
				if ($resultados->num_rows() > 0) {
					return $resultados->result();
				}
				else{
					return false;
				}
			}
			public function Tramite_conc_periodo($id){
				//$tramite=array(16,36);
				$this->db->query("SET sql_mode=(SELECT REPLACE(@@sql_mode, 'ONLY_FULL_GROUP_BY', ''));");	
				$this->db->select("r.*,es.cedula as cedula_est,es.nombre_primer as pri_nombre,
				es.nombre_segundo as seg_nombre,es.apellido_primer as pri_apellido,es.apellido_segundo as seg_apellido,
				est.estado as nob_estado,b.nombre as banco,es.correo,u.rol_id,l.lugar_trabajo as trabajo,st.id as id_solicitud,st.fecha_solicitud,st.reg_pago,st.rev_academica,
				tra.nombre as tramite, pr.nombre as programa,pr.id as id_programa, st.id_usuario as id_usuario,st.uc,st.id_tramite ");
				$this->db->from("registro_pago r");
				$this->db->join("estudiante es","r.id_estudiante = es.id");
				$this->db->join("trabajo tr","tr.id_usuario = r.id_usuario");
				$this->db->join("lugar_trabajo l","tr.id_lugar_trabajo = l.id");
				$this->db->join("usuarios u","r.id_usuario = u.id");
				$this->db->join("estado est","r.id_estado_estudio = est.id");
				$this->db->join("banco b","r.id_banco = b.id");
				$this->db->join("solicitud_tramite st","st.id = r.id_solicitud_tramite");
				$this->db->join("tramites tra","st.id_tramite = tra.id");
				$this->db->join("programa pr","st.id_programa = pr.id");
				$this->db->join("periodo pe","pe.id = r.id_periodo");
				$this->db->where_in("r.conciliado", array(1,2));
			//	$this->db->where("r.academico", 1);
				$this->db->where("r.status", 1);
				$this->db->where("r.tramite", 1);
	$this->db->where("tr.actual", 1);	
			//	$this->db->where_not_in("tra.id",$tramite);					
				$this->db->where("pe.id", $id);	
				$this->db->order_by("st.fecha_solicitud", "ASC");
				$resultados = $this->db->get();
			//	var_dump($this->db->queries);
				return $resultados->result();
			}
			public function Pago_conciliado_periodo($id_periodo){

				$this->db->select("pe.nombre as periodo,pe.id as id_periodo,r.*,es.nacionalidad as estudiante_nac,es.cedula as estudiante,es.nombre_primer as pri_nombre,es.nombre_segundo as seg_nombre,es.apellido_primer as pri_apellido,es.apellido_segundo as seg_apellido,est.estado as nob_estado,b.nombre as banco,u.rol_id");
				$this->db->from("registro_pago r");
				$this->db->join("estudiante es","r.id_estudiante = es.id");
				$this->db->join("usuarios u","r.id_usuario = u.id");
				$this->db->join("estado est","r.id_estado_estudio = est.id");
				$this->db->join("banco b","r.id_banco = b.id");
				$this->db->join("periodo pe","r.id_periodo = pe.id");
				$this->db->where_in("r.conciliado", array(1,2));
					$this->db->where("r.tramite", 0);
				$this->db->where("r.status", 1);	
				$this->db->where_in("r.id_periodo",$id_periodo);
				$this->db->order_by("r.id", "ASC");
				$resultados = $this->db->get();
				return $resultados->result();
			}
public function getRegistro_Pago_nuevo_proceso($id_periodo){
				$this->db->query("SET sql_mode=(SELECT REPLACE(@@sql_mode, 'ONLY_FULL_GROUP_BY', ''));");	
						$this->db->select("pe.nombre as periodo,r.*,es.cedula as cedula_est,es.nombre_primer as pri_nombre,es.nombre_segundo as seg_nombre,es.apellido_primer as pri_apellido,es.apellido_segundo as seg_apellido,est.estado as nob_estado,b.nombre as banco,es.correo,u.rol_id,l.lugar_trabajo as trabajo, ch.descripcion as cod_hab,es.tel_habitacion as telefono_hab,cc.descripcion as cod_cel,es.tel_celular as telefono_cel,u.id_tiempo_preinscripcion as inscrito,COUNT(id_requisito) AS total_requisitos ");
						$this->db->from("registro_pago r");
						$this->db->join("estudiante es","r.id_estudiante = es.id");
						$this->db->join("trabajo tr","tr.id_usuario = r.id_usuario");
						$this->db->join("lugar_trabajo l","tr.id_lugar_trabajo = l.id");
						$this->db->join("usuarios u","r.id_usuario = u.id");
						$this->db->join("estado est","r.id_estado_estudio = est.id");
						$this->db->join("banco b","r.id_banco = b.id");
						$this->db->join("periodo pe","r.id_periodo = pe.id");
						$this->db->join("control_requisitos cr","cr.id_usuario = r.id_usuario",left);
						$this->db->join("codigo_cel cc","es.id_codigo_cel = cc.id",left);
						$this->db->join("codigo_hab ch","es.id_codigo_hab = ch.id",left);
						$this->db->where("r.conciliado", 0);
						$this->db->where("r.status", 1);	
						$this->db->where("r.tramite", 0);
						//$this->db->where_in("u.id_tiempo_preinscripcion",);
						//$this->db->where("u.rol_id", 8);
						$this->db->where_in("pe.id", $id_periodo);
						$this->db->where_in("cr.id_periodo", $id_periodo);					
						$this->db->group_by("cr.id_usuario,r.pago_adicional");	
						$this->db->order_by("r.id", "ASC");
						$resultados = $this->db->get();
						//var_dump($this->db->queries);
						return $resultados->result();
					}
					public function getRegistro_Pago_nuevo_proceso_excel($id_periodo){
						$this->db->query("SET sql_mode=(SELECT REPLACE(@@sql_mode, 'ONLY_FULL_GROUP_BY', ''));");	
						$this->db->select("pe.nombre as periodo,r.*,es.cedula as cedula_est,es.nombre_primer as pri_nombre,
						es.nombre_segundo as seg_nombre,es.apellido_primer as pri_apellido,
						es.apellido_segundo as seg_apellido,est.estado as nob_estado,b.nombre as banco,es.correo,
						u.rol_id,l.lugar_trabajo as trabajo, ch.descripcion as cod_hab,es.tel_habitacion as telefono_hab,
						cc.descripcion as cod_cel,es.tel_celular as telefono_cel,oa.*,pr.nombre as programa,u.id_tiempo_preinscripcion as inscrito");
						$this->db->from("registro_pago r");
						$this->db->join("estudiante es","r.id_estudiante = es.id");
						$this->db->join("trabajo tr","tr.id_usuario = r.id_usuario");
						$this->db->join("lugar_trabajo l","tr.id_lugar_trabajo = l.id");
						$this->db->join("usuarios u","r.id_usuario = u.id");
						$this->db->join("estado est","r.id_estado_estudio = est.id");
						$this->db->join("banco b","r.id_banco = b.id");
						$this->db->join("periodo pe","r.id_periodo = pe.id");
						$this->db->join("control_requisitos cr","cr.id_usuario = r.id_usuario",left);
						$this->db->join("codigo_cel cc","es.id_codigo_cel = cc.id",left);
						$this->db->join("codigo_hab ch","es.id_codigo_hab = ch.id",left);
						$this->db->join("materias_preinscritas mp","mp.id_usuario = r.id_usuario");
						$this->db->join("oferta_academica oa","mp.id_oferta_academica = oa.id");
						$this->db->join("programa pr","oa.id_programa = pr.id");						
						$this->db->where("r.quien_actualizo", 4);
						$this->db->where("r.conciliado", 1);
						$this->db->where("r.status", 1);	
						$this->db->where("r.tramite", 0);
						$this->db->where_in("mp.status", 1);	
						$this->db->where_in("oa.status", 1);							
						$this->db->where_in("cr.id_periodo", $id_periodo);
						$this->db->where_in("r.id_periodo", $id_periodo);							
						$this->db->group_by("mp.id_usuario");	
						$this->db->order_by("r.id", "ASC");
						$resultados = $this->db->get();
						//var_dump($this->db->queries);
						return $resultados->result();
					}
					public function periodo_pagotramte($id_usuario,$id_solicitud){

						$this->db->join("banco","banco.id = registro_pago.id_banco");
						$this->db->where("id_usuario",$id_usuario);
						$this->db->where("id_solicitud_tramite",$id_solicitud);
						$this->db->where("registro_pago.status", 1);
						$this->db->where("registro_pago.conciliado", 1);
						$this->db->where("registro_pago.academico", 1);
						$this->db->order_by('registro_pago.id', 'DESC');           // Ordena del mayor al menor ID
						$this->db->limit(1);  
						$resultados = $this->db->get("registro_pago");
						//var_dump($this->db->queries);
						if ($resultados->num_rows() > 0) {
						return $resultados->row();
						}
						else{
						return false;
						}
					}

					public function get_datos_excel($id_periodo) {
						// Deshabilitar ONLY_FULL_GROUP_BY
						$this->db->query("SET sql_mode=(SELECT REPLACE(@@sql_mode, 'ONLY_FULL_GROUP_BY', ''));");
						
						// Query principal
						$this->db->select("

							pe.nombre as periodo,
							r.*,
							es.cedula as cedula_est,
							es.nombre_primer as pri_nombre,
							es.nombre_segundo as seg_nombre,
							es.apellido_primer as pri_apellido,
							es.apellido_segundo as seg_apellido,
							CONCAT(codigo_cel.descripcion,es.tel_celular) AS tel_cel,
							est.estado as nob_estado,
							est.id as id_estado_estudio,
							b.nombre as banco,
							es.correo,
							u.rol_id,
							l.lugar_trabajo as trabajo,
							COUNT(cr.id_requisito) AS total_requisitos,
							(SELECT GROUP_CONCAT(DISTINCT oa.trimestre SEPARATOR ', ') 
							 FROM materias_preinscritas mp 
							 JOIN oferta_academica oa ON mp.id_oferta_academica = oa.id 
							 WHERE mp.id_usuario = r.id_usuario AND mp.id_periodo = r.id_periodo) as trimestres_inscritos,
							(SELECT GROUP_CONCAT(DISTINCT pr.nombre SEPARATOR ', ') 
							 FROM materias_preinscritas mp 
							 JOIN oferta_academica oa ON mp.id_oferta_academica = oa.id 
							 JOIN programa pr ON oa.id_programa = pr.id 
							 WHERE mp.id_usuario = r.id_usuario AND mp.id_periodo = r.id_periodo) as postgrados,
							(SELECT SUM(oa.unidades_creditos) 
							 FROM materias_preinscritas mp 
							 JOIN oferta_academica oa ON mp.id_oferta_academica = oa.id 
							 WHERE mp.id_usuario = r.id_usuario AND mp.id_periodo = r.id_periodo) as total_uc
						");
						
						$this->db->from("registro_pago r");
						$this->db->join("estudiante es", "r.id_estudiante = es.id", "inner");
						 $this->db->join("codigo_cel", "es.id_codigo_cel = codigo_cel.id", "inner");
						$this->db->join("trabajo tr", "tr.id_usuario = r.id_usuario", "left");
						$this->db->join("lugar_trabajo l", "tr.id_lugar_trabajo = l.id", "left");
						$this->db->join("usuarios u", "r.id_usuario = u.id", "inner");
						$this->db->join("estado est", "r.id_estado_estudio = est.id", "left");
						$this->db->join("banco b", "r.id_banco = b.id", "left");
						$this->db->join("periodo pe", "r.id_periodo = pe.id", "inner");
						$this->db->join("control_requisitos cr", "cr.id_usuario = r.id_usuario AND cr.id_periodo = r.id_periodo", "left");
						
						$this->db->where("r.conciliado", 0);
						$this->db->where("r.status", 1);
						$this->db->where("r.tramite", 0);
						$this->db->order_by("es.cedula");
						
						// Filtrar períodos
						if(!empty($id_periodo)) {
							if(is_array($id_periodo)) {
								$id_periodo = array_filter($id_periodo, function($value) {
									return !is_null($value) && $value !== '';
								});
								if(!empty($id_periodo)) {
									$this->db->where_in("pe.id", $id_periodo);
									$this->db->where_in("cr.id_periodo", $id_periodo);
								}
							} else {
								$this->db->where("pe.id", $id_periodo);
								$this->db->where("cr.id_periodo", $id_periodo);
							}
						}
						
						$this->db->group_by("r.id");
						$this->db->order_by("r.id", "ASC");
						
						$resultados = $this->db->get();
						
						// Obtener UC por trimestre en una consulta separada
						if(!empty($resultados->result())) {
							foreach($resultados->result() as $row) {
								$uc_por_trimestre = $this->get_uc_por_trimestre($row->id_usuario, $row->id_periodo);
								$row->uc_por_trimestre = $uc_por_trimestre;
							}
						}
						
						return $resultados->result();
					}
					public function get_datos_excel_conciliados($id_periodo) {
						// Deshabilitar ONLY_FULL_GROUP_BY
						$this->db->query("SET sql_mode=(SELECT REPLACE(@@sql_mode, 'ONLY_FULL_GROUP_BY', ''));");
						
						// Query principal
						$this->db->select("
							pe.nombre as periodo,
							r.*,
							es.cedula as cedula_est,
							es.nombre_primer as pri_nombre,
							es.nombre_segundo as seg_nombre,
							es.apellido_primer as pri_apellido,
							es.apellido_segundo as seg_apellido,
						CONCAT(codigo_cel.descripcion,es.tel_celular) AS tel_cel,
							est.estado as nob_estado,
							est.id as id_estado_estudio,
							b.nombre as banco,
							es.correo,
							u.rol_id,
							l.lugar_trabajo as trabajo,
							COUNT(cr.id_requisito) AS total_requisitos,
							(SELECT GROUP_CONCAT(DISTINCT oa.trimestre SEPARATOR ', ') 
							 FROM materias_preinscritas mp 
							 JOIN oferta_academica oa ON mp.id_oferta_academica = oa.id 
							 WHERE mp.id_usuario = r.id_usuario AND mp.id_periodo = r.id_periodo) as trimestres_inscritos,
							(SELECT GROUP_CONCAT(DISTINCT pr.nombre SEPARATOR ', ') 
							 FROM materias_preinscritas mp 
							 JOIN oferta_academica oa ON mp.id_oferta_academica = oa.id 
							 JOIN programa pr ON oa.id_programa = pr.id 
							 WHERE mp.id_usuario = r.id_usuario AND mp.id_periodo = r.id_periodo) as postgrados,
							(SELECT SUM(oa.unidades_creditos) 
							 FROM materias_preinscritas mp 
							 JOIN oferta_academica oa ON mp.id_oferta_academica = oa.id 
							 WHERE mp.id_usuario = r.id_usuario AND mp.id_periodo = r.id_periodo) as total_uc
						");
						
						$this->db->from("registro_pago r");
						$this->db->join("estudiante es", "r.id_estudiante = es.id", "inner");
					  $this->db->join("codigo_cel", "es.id_codigo_cel = codigo_cel.id", "inner");
						$this->db->join("trabajo tr", "tr.id_usuario = r.id_usuario", "left");
						$this->db->join("lugar_trabajo l", "tr.id_lugar_trabajo = l.id", "left");
						$this->db->join("usuarios u", "r.id_usuario = u.id", "inner");
						$this->db->join("estado est", "r.id_estado_estudio = est.id", "left");
						$this->db->join("banco b", "r.id_banco = b.id", "left");
						$this->db->join("periodo pe", "r.id_periodo = pe.id", "inner");
						$this->db->join("control_requisitos cr", "cr.id_usuario = r.id_usuario AND cr.id_periodo = r.id_periodo", "left");
						
						$this->db->where("r.conciliado", 1);
						$this->db->where("r.status", 1);
						$this->db->where("r.tramite", 0);
						$this->db->order_by("es.cedula");
						
						// Filtrar períodos
						if(!empty($id_periodo)) {
							if(is_array($id_periodo)) {
								$id_periodo = array_filter($id_periodo, function($value) {
									return !is_null($value) && $value !== '';
								});
								if(!empty($id_periodo)) {
									$this->db->where_in("pe.id", $id_periodo);
									$this->db->where_in("cr.id_periodo", $id_periodo);
								}
							} else {
								$this->db->where("pe.id", $id_periodo);
								$this->db->where("cr.id_periodo", $id_periodo);
							}
						}
						
						$this->db->group_by("r.id");
						$this->db->order_by("r.id", "ASC");
						
						$resultados = $this->db->get();
						
						// Obtener UC por trimestre en una consulta separada
						if(!empty($resultados->result())) {
							foreach($resultados->result() as $row) {
								$uc_por_trimestre = $this->get_uc_por_trimestre($row->id_usuario, $row->id_periodo);
								$row->uc_por_trimestre = $uc_por_trimestre;
							}
						}
						
						// 🔹 NUEVO: Obtener estadísticas de resumen
						$estadisticas = $this->get_estadisticas_conciliados($id_periodo);
						
						// Retornar tanto los datos como las estadísticas
						return (object) [
							'datos' => $resultados->result(),
							'estadisticas' => $estadisticas
						];
					}
					// Método para obtener estadísticas de conciliados
					private function get_estadisticas_conciliados($id_periodo) {
						// Total de cédulas inscritas (estudiantes únicos)
						$this->db->select("COUNT(DISTINCT es.cedula) as total_cedulas");
						$this->db->from("registro_pago r");
						$this->db->join("estudiante es", "r.id_estudiante = es.id", "inner");
						$this->db->join("periodo pe", "r.id_periodo = pe.id", "inner");
						$this->db->where("r.conciliado", 1);
						$this->db->where("r.status", 1);
						$this->db->where("r.tramite", 0);
						
						if(!empty($id_periodo)) {
							if(is_array($id_periodo)) {
								$this->db->where_in("pe.id", $id_periodo);
							} else {
								$this->db->where("pe.id", $id_periodo);
							}
						}
						
						$total_cedulas = $this->db->get()->row()->total_cedulas;
						
						// Total de estudiantes por especialización (postgrado)
						$this->db->select("
							pr.nombre as especializacion,
							COUNT(DISTINCT mp.id_usuario) as total_estudiantes
						");
						$this->db->from("materias_preinscritas mp");
						$this->db->join("oferta_academica oa", "mp.id_oferta_academica = oa.id");
						$this->db->join("programa pr", "oa.id_programa = pr.id");
						$this->db->join("registro_pago r", "mp.id_usuario = r.id_usuario AND mp.id_periodo = r.id_periodo");
						$this->db->where("r.conciliado", 1);
						$this->db->where("r.status", 1);
						$this->db->where("r.tramite", 0);
						$this->db->where("mp.status", 1);
						
						if(!empty($id_periodo)) {
							if(is_array($id_periodo)) {
								$this->db->where_in("mp.id_periodo", $id_periodo);
							} else {
								$this->db->where("mp.id_periodo", $id_periodo);
							}
						}
						
						$this->db->group_by("pr.id");
						$this->db->order_by("pr.nombre");
						
						$especializaciones = $this->db->get()->result();
						
						return (object) [
							'total_cedulas' => $total_cedulas,
							'especializaciones' => $especializaciones
						];
					}
					
					// Método auxiliar para obtener UC por trimestre
					private function get_uc_por_trimestre($id_usuario, $id_periodo) {
						$this->db->select("oa.trimestre, SUM(oa.unidades_creditos) as total_uc");
						$this->db->from("materias_preinscritas mp");
						$this->db->join("oferta_academica oa", "mp.id_oferta_academica = oa.id");
						$this->db->where("mp.id_usuario", $id_usuario);
						$this->db->where("mp.id_periodo", $id_periodo);
						$this->db->where("mp.status", 1);
						$this->db->group_by("oa.trimestre");
						
						$query = $this->db->get();
						$resultados = $query->result();
						
						if(empty($resultados)) {
							return '';
						}
						
						// Formatear resultados: "Trimestre 1:12 | Trimestre 2:9"
						$uc_trimestres = array();
						foreach($resultados as $row) {
							$uc_trimestres[] = 'Trimestre Inscrito:' . $row->trimestre . ': ' . $row->total_uc.'uc ';
						}
						
						return implode(' | ', $uc_trimestres);
					}

					//actualizacion 09-09-2026 pasarela baco de venezuela
					/**
					 * Obtener pago pendiente por token BDV
					 */
					public function get_pago_pendiente_bdv($id_usuario, $id_periodo) {
					$this->db->where('id_usuario', $id_usuario);
					$this->db->where('id_periodo', $id_periodo);
					$this->db->where('metodo_pago', 'bdv');
					$this->db->where('conciliado', 0);
					$this->db->order_by('id', 'DESC');
					$query = $this->db->get('registro_pago');
					return $query->row();
					}

					//actualizacion 09-09-2026 pasarela baco de venezuela
					/**
					 * Obtener pago pendiente por token BDV
					 */
					public function get_pago_pendiente_bdv_tramite($id_solicitud) {
						$this->db->where('id_solicitud_tramite', $id_solicitud);						
						$this->db->where('metodo_pago', 'bdv');
						$this->db->where('conciliado', 0);
						$this->db->order_by('id', 'DESC');
						$query = $this->db->get('registro_pago');
						return $query->row();
						}
					/**
 * Actualizar pago por token
 * Versión mejorada: verifica existencia antes de actualizar
 */
public function update_by_token($id_usuario, $id_periodo, $token, $data) {
    // 1. Verificar existencia
    $this->db->where('id_usuario', $id_usuario);
    $this->db->where('id_periodo', $id_periodo);
    $this->db->where('token_bdv', $token);
    $existe = $this->db->get('registro_pago')->row();
    
    if (!$existe) {
        log_message('debug', 'update_by_token: NO encontrado token=' . $token
            . ' id_usuario=' . $id_usuario . ' id_periodo=' . $id_periodo);
        return false;
    }
    
    // 2. Actualizar por ID
    $this->db->where('id', $existe->id);
    $this->db->update('registro_pago', $data);
    
    log_message('debug', 'update_by_token: id=' . $existe->id
        . ' affected_rows=' . $this->db->affected_rows());
    
    return true;
}
					/**
 * Obtener pago pendiente por referencia
 * Se usa en el callback para obtener el id_periodo y el token
 * del registro creado al iniciar el pago
 */
public function get_pago_pendiente_por_referencia($referencia) {
    $this->db->where('nro_referencia', $referencia);
    $this->db->where('metodo_pago', 'bdv');
    $this->db->order_by('id', 'DESC');
    return $this->db->get('registro_pago')->row();
}

/**
 * Actualizar pago por referencia (más confiable que por token)
 * El WHERE usa nro_referencia que es un valor que controlamos nosotros
 * Se usa para confirmar pagos desde el callback
 */
public function update_by_referencia($referencia, $data) {
    // 1. Verificar que exista
    $this->db->where('nro_referencia', $referencia);
    $existe = $this->db->get('registro_pago')->row();
    
    if (!$existe) {
        log_message('debug', 'update_by_referencia: NO encontrado ref=' . $referencia);
        return false;
    }
    
    // 2. Actualizar por ID (más seguro que por referencia)
    $this->db->where('id', $existe->id);
    $this->db->update('registro_pago', $data);
    
    log_message('debug', 'update_by_referencia: id=' . $existe->id
        . ' affected_rows=' . $this->db->affected_rows());
    
    return true;
}

/**
 * Obtener pago pendiente por token
 * Útil cuando no tenemos referencia pero sí token
 */
public function get_pago_pendiente_por_token($token) {
    $this->db->where('token_bdv', $token);
    $this->db->where('metodo_pago', 'bdv');
    $this->db->order_by('id', 'DESC');
    return $this->db->get('registro_pago')->row();
}
	

			
}
