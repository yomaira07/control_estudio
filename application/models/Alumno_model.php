<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Alumno_model extends CI_Model {

	public function getAlumno(){
		$this->db->order_by('cedula', 'ASC');
		$resultados = $this->db->get("estudiante");
		return $resultados->result();
	}

	public function getListaAlumno($id_usuario){

		$this->db->where("id_usuario",$id_usuario);
		$resultados = $this->db->get("estudiante");
		//var_dump($this->db->queries);

		if ($resultados->num_rows() > 0) {
			return $resultados->row();
		}
		else{
			return false;
		}
	}
public function getListaAlumno_actualizado($id_usuario){

		$this->db->where("id_usuario",$id_usuario);
		$this->db->where("DATE_FORMAT(dactualizacion, '%Y/%m/%d') >=",date('Y-m-d'));
		$resultados = $this->db->get("estudiante");
		//var_dump($this->db->queries);

		if ($resultados->num_rows() > 0) {
			return true;
		}
		else{
			return false;
		}
	}

	public function getAlumno_cedula($id_usuario){

		$this->db->where("id_usuario",$id_usuario);
		$resultados = $this->db->get("estudiante");
		return $resultados->row();
	}

		public function getListaAlumno1($id_usuario){
			$this->db->select("es.cedula,es.nombre_primer,es.nombre_segundo ,es.apellido_primer ,es.apellido_segundo ,es.correo,
	es.id_sexo,es.nacionalidad,CONCAT(codigo_cel.descripcion,es.tel_celular) AS telefono_cel ,CONCAT(codigo_hab.descripcion,es.tel_habitacion) AS telefono_hab,
	lugar_trabajo.lugar_trabajo,trabajo.cargo,estado.estado AS residencia,lugar_trabajo.descuento");
		$this->db->from("estudiante es");
			$this->db->join("trabajo","trabajo.id_usuario=es.id_usuario");
			$this->db->join("direccion","direccion.id_usuario=es.id_usuario");
			$this->db->join("lugar_trabajo","lugar_trabajo.id=trabajo.id_lugar_trabajo");
	 		$this->db->join("estado","estado.id=direccion.id_estado");
	 		$this->db->join("codigo_cel","codigo_cel.id=es.id_codigo_cel",RIGHT);
	 		$this->db->join("codigo_hab","codigo_hab.id=es.id_codigo_hab",RIGHT);
		$this->db->where("es.id_usuario",$id_usuario);
			$resultados =$this->db->get();
			//var_dump($this->db->queries);

			if ($resultados->num_rows() > 0) {
				return $resultados->row();
			}
			else{
				return false;
			}

	}
public function buscar_estudiante_cedula1($cedula){
			$this->db->select("es.id_usuario,es.cedula,es.nombre_primer,es.nombre_segundo ,es.apellido_primer ,es.apellido_segundo ,es.correo,
	es.id_sexo,es.nacionalidad,CONCAT(codigo_cel.descripcion,es.tel_celular) AS telefono_cel ,CONCAT(codigo_hab.descripcion,es.tel_habitacion) AS telefono_hab,
	lugar_trabajo.lugar_trabajo,trabajo.cargo,estado.estado AS residencia");
		$this->db->from("estudiante es");
			$this->db->join("trabajo","trabajo.id_usuario=es.id_usuario");
			$this->db->join("direccion","direccion.id_usuario=es.id_usuario");
			$this->db->join("lugar_trabajo","lugar_trabajo.id=trabajo.id_lugar_trabajo");
	 		$this->db->join("estado","estado.id=direccion.id_estado");
			 $this->db->join("usuarios","usuarios.id=es.id_usuario");
	 		$this->db->join("codigo_cel","codigo_cel.id=es.id_codigo_cel",RIGHT);
	 		$this->db->join("codigo_hab","codigo_hab.id=es.id_codigo_hab",RIGHT);
		$this->db->where("es.cedula",$cedula);
		$this->db->where_in("usuarios.rol_id",array(5,8));
			$resultados =$this->db->get();
			//var_dump($this->db->queries);

			if ($resultados->num_rows() > 0) {
				return $resultados->row();
			}
			else{
				return false;
			}

	}

	public function update($id,$data){
		$this->db->where("id",$id);
		return $this->db->update("estudiante",$data);
	}

	public function save($data){
		return $this->db->insert("estudiante",$data);
	}

	public function buscar_estudiante($cedula){


		$this->db->where("cedula",$cedula);
		$resultados = $this->db->get("estudiante");
		//var_dump($this->db->queries);

		if ($resultados->num_rows() > 0) {
			return true;
		}
		else{
			return false;
		}
		
	}
public function buscar_estudiante_cedula($cedula){


		$this->db->where("cedula",$cedula);
		$resultados = $this->db->get("estudiante");
		//var_dump($this->db->queries);

		if ($resultados->num_rows() > 0) {
			return $resultados->row();
		}
		else{
			return false;
		}
		
	}



}
