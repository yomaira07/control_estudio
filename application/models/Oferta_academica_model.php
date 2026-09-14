<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Oferta_academica_model extends CI_Model {

	public function getOferta_academica(){
		$this->db->order_by('id_periodo', 'DESC');
		$resultados = $this->db->get("oferta_academica");
		return $resultados->result();
	}


	public function save($data){
		return $this->db->insert("oferta_academica",$data);


	}
	public function update_oferta_cupos($id,$data){
		$this->db->where("id",$id);
		return $this->db->update("oferta_academica",$data);
	}

	public function list_oferta()
	 {

	$query = $this->db->query('SELECT oferta_academica.id,oferta_academica.trimestre,oferta_academica.horario,dia_clase.descripcion as dia_clase,docente.primer_nombre as docente_primernom,oferta_academica.modalidad,docente.primer_apellido as docente_primerape,oferta_academica.codigo,programa.nombre as programas, periodo.nombre as periodos, pensum.nombre as pensums,seccion.nombre as secc FROM oferta_academica, programa, periodo, pensum, docente,dia_clase,seccion WHERE oferta_academica.id_programa = programa.id AND oferta_academica.id_periodo = periodo.id AND oferta_academica.id_pensum = pensum.id AND oferta_academica.id_docente = docente.id AND oferta_academica.id_dia_clase = dia_clase.id AND oferta_academica.status= 1 and oferta_academica.seccion = seccion.id order by programa.prog_pertenece,secc,pensum.id_trimestre,pensums ASC ');

	  $output = $query->result();
	  return $output;
	 }

	 public function combo_unidad($programa_id)
	 {
	  //$this->db->where('id_programa', $programa_id);
	  //$this->db->order_by('id_trimestre', 'ASC');
	 // $query = $this->db->get('pensum');
	 $query = $this->db->query('SELECT pensum.id, pensum.nombre, trimestre.nombre as trimestre
	 FROM pensum, trimestre
	 WHERE pensum.id_programa = '.$programa_id.'
	 AND pensum.id_trimestre = trimestre.id 
	 AND  pensum.status = 1');
	  $output = '<option value="">Select Unidad Curricular</option>';
	  foreach($query->result() as $row)
	  {
	   $output .= '<option value="'.$row->id.'">'.$row->nombre.'  |  '.$row->trimestre.'</option>';
	  }
	  return $output;
	 }

	  public function info_unidad($programa_id)
	 {
	  //$this->db->where('id_programa', $programa_id);
	  //$this->db->order_by('id_trimestre', 'ASC');
	 // $query = $this->db->get('pensum');
	 $query = $this->db->query('SELECT pensum.id, pensum.nombre, trimestre.nombre as trimestre, 
	 pensum.codigo, pensum.unidad_curricular, programa.tipo_programa
	 FROM pensum, trimestre,programa
	 
	 WHERE pensum.id = '.$programa_id.'
	 and  programa.id =pensum.id_programa
	 AND pensum.id_trimestre = trimestre.id 
	 AND  pensum.status = 1');

	//esta variable es para retornar los datos

	$trimestre = $query->row('trimestre');
	$codigo = $query->row('codigo'); 
	$unidad_curricular = $query->row('unidad_curricular');
	$tipo_programa = $query->row('tipo_programa');

	//agregamos nuestros datos al array para retornarlos

	$jsondata['trimestre'] = $trimestre;
	$jsondata['codigo'] = $codigo;
	$jsondata['unidad_curricular'] = $unidad_curricular;
	$jsondata['tipo_programa'] = $tipo_programa;

	 

	//este header es para el retorno correcto de datos con json

	 header('Content-type: application/json; charset=utf-8');

	 echo json_encode($jsondata);


}

public function revision_unidades_curriculares($id_periodo){	
$this->db->query("SET sql_mode=(SELECT REPLACE(@@sql_mode, 'ONLY_FULL_GROUP_BY', ''));");	
	$this->db->select("mp.id_oferta_academica, pr.nombre AS programa,oa.codigo, pem.nombre as unidad_curricular,oa.trimestre,dia.descripcion as dia,oa.horario, CONCAT(es.nacionalidad,es.cedula) AS cedula,es.id_sexo as sexo,
 CONCAT(es.nombre_primer,' ',es.nombre_segundo)AS nombre, CONCAT(es.apellido_primer,' ',es.apellido_segundo) AS apellido, es.correo,u.rol_id,lug.lugar_trabajo as trabajo,trab.cargo,est.estado as residencia,
	CONCAT(codigo_cel.descripcion, es.tel_celular) AS telefono_cel,
	CONCAT(codigo_hab.descripcion, es.tel_habitacion) AS telefono_hab, oa.modalidad");
	$this->db->from("materias_preinscritas mp");
	$this->db->join("estudiante es","es.id_usuario = mp.id_usuario");
	$this->db->join("trabajo trab","mp.id_usuario = trab.id_usuario");
	$this->db->join("lugar_trabajo lug","lug.id = trab.id_lugar_trabajo");
	$this->db->join("direccion dir","mp.id_usuario = dir.id_usuario");
	$this->db->join("estado est","est.id = dir.id_estado");
	$this->db->join("codigo_cel","codigo_cel.id=es.id_codigo_cel");
  	$this->db->join("codigo_hab","codigo_hab.id=es.id_codigo_hab");
	$this->db->join("usuarios u","u.id = mp.id_usuario");
	$this->db->join("oferta_academica oa","mp.id_oferta_academica = oa.id");
	$this->db->join("pensum pem","oa.id_pensum= pem.id");
	$this->db->join("dia_clase dia","dia.id  = oa.id_dia_clase");		
	$this->db->join("programa pr","pr.id  = oa.id_programa");		
	$this->db->where("mp.id_periodo",$id_periodo);
	$this->db->where("trab.actual",1);
	$this->db->where("oa.status",1);
	$this->db->where("mp.reg_pago",1);
	$this->db->where("mp.status",1);
	$this->db->where("mp.rev_academica",1);
	$this->db->order_by("oa.id_programa", "oa.trimestre","oa.codigo", "dia.descripcion", "es.cedula");		

	$resultado = $this->db->get();
//	var_dump($this->db->queries);
	return $resultado->result();
}
public function revision_unidades_curriculares_anteriores($id_periodo){	
$this->db->query("SET sql_mode=(SELECT REPLACE(@@sql_mode, 'ONLY_FULL_GROUP_BY', ''));");	
	$this->db->select("mp.id_oferta_academica, pr.nombre AS programa,oa.codigo, pem.nombre as unidad_curricular,oa.trimestre,dia.descripcion as dia,oa.horario, CONCAT(es.nacionalidad,es.cedula) AS cedula,es.id_sexo as sexo,
 CONCAT(es.nombre_primer,' ',es.nombre_segundo)AS nombre, CONCAT(es.apellido_primer,' ',es.apellido_segundo) AS apellido, es.correo,u.rol_id,lug.lugar_trabajo as trabajo,trab.cargo,est.estado as residencia,
	CONCAT(codigo_cel.descripcion, es.tel_celular) AS telefono_cel,
	CONCAT(codigo_hab.descripcion, es.tel_habitacion) AS telefono_hab, oa.modalidad");
	$this->db->from("materias_preinscritas mp");
	$this->db->join("estudiante es","es.id_usuario = mp.id_usuario");
	$this->db->join("trabajo trab","mp.id_usuario = trab.id_usuario");
	$this->db->join("lugar_trabajo lug","lug.id = trab.id_lugar_trabajo");
	$this->db->join("direccion dir","mp.id_usuario = dir.id_usuario");
	$this->db->join("estado est","est.id = dir.id_estado");
	$this->db->join("codigo_cel","codigo_cel.id=es.id_codigo_cel");
  	$this->db->join("codigo_hab","codigo_hab.id=es.id_codigo_hab");
	$this->db->join("usuarios u","u.id = mp.id_usuario");
	$this->db->join("oferta_academica oa","mp.id_oferta_academica = oa.id");
	$this->db->join("pensum pem","oa.id_pensum= pem.id");
	$this->db->join("dia_clase dia","dia.id  = oa.id_dia_clase");		
	$this->db->join("programa pr","pr.id  = oa.id_programa");		
	$this->db->where("mp.id_periodo",$id_periodo);
	$this->db->where("trab.actual",1);
	//$this->db->where("oa.status",1);
	$this->db->where("mp.reg_pago",1);
	$this->db->where("mp.status",1);
	$this->db->where("mp.rev_academica",1);
	$this->db->order_by("oa.id_programa", "oa.trimestre","oa.codigo", "dia.descripcion", "es.cedula");		

	$resultado = $this->db->get();
//	var_dump($this->db->queries);
	return $resultado->result();
}
public function Materias_programa_eeff($id_periodo){		
	$this->db->select("oa.*,pem.nombre as unidad_curricular,COUNT(mp.id_usuario)AS ocupados,oa.cupos ,mp.id_oferta_academica,di.descripcion as dia ");
	$this->db->from("materias_preinscritas mp");
	$this->db->join("oferta_academica oa","mp.id_oferta_academica = oa.id");
$this->db->join("registro_pago rp","mp.id_usuario = rp.id_usuario");
	$this->db->join("dia_clase di","oa.id_dia_clase = di.id");
	$this->db->join("pensum pem","oa.id_pensum= pem.id");
	$this->db->join("periodo pe","mp.id_periodo = pe.id");			
	$this->db->where_in("oa.id_programa",array(1,14));
	$this->db->where("mp.status",1);
	$this->db->where("mp.reg_pago",1);
	$this->db->where("mp.id_periodo",$id_periodo);
	$this->db->where("rp.status",1);
	$this->db->where("rp.tramite",0);
	$this->db->where("rp.pago_adicional",0);
	$this->db->where("rp.aspirante",0);
	$this->db->where("pe.status",1);
	$this->db->group_by("mp.id_oferta_academica","oa.id_pensum");	
$this->db->order_by("oa.trimestre");		
	$resultado = $this->db->get();
	return $resultado->result();
}

public function Materias_programa_edpp($id_periodo){
	
	$this->db->select("oa.*,pem.nombre as unidad_curricular,COUNT(mp.id_usuario)AS ocupados,oa.cupos ,mp.id_oferta_academica,di.descripcion as dia  ");
	$this->db->from("materias_preinscritas mp");
	$this->db->join("oferta_academica oa","mp.id_oferta_academica = oa.id");
	$this->db->join("registro_pago rp","mp.id_usuario = rp.id_usuario");
	$this->db->join("dia_clase di","oa.id_dia_clase = di.id");
	$this->db->join("pensum pem","oa.id_pensum= pem.id");
	$this->db->join("periodo pe","mp.id_periodo = pe.id");	
	$this->db->where_in("oa.id_programa",array(3,16));
	$this->db->where("mp.status",1);
	$this->db->where("mp.reg_pago",1);
	$this->db->where("mp.id_periodo",$id_periodo);
	$this->db->where("rp.status",1);
	$this->db->where("rp.tramite",0);
	$this->db->where("rp.pago_adicional",0);
	$this->db->where("rp.aspirante",0);
	$this->db->where("pe.status",1);
	$this->db->group_by("mp.id_oferta_academica" ,"oa.id_pensum");
$this->db->order_by("oa.trimestre");
	$resultado = $this->db->get();
	return $resultado->result();

	}

public function Materias_programa_edp($id_periodo){

	$this->db->select("oa.*,pem.nombre as unidad_curricular,COUNT(mp.id_usuario)AS ocupados,oa.cupos ,mp.id_oferta_academica,di.descripcion as dia  ");
	$this->db->from("materias_preinscritas mp");
	$this->db->join("oferta_academica oa","mp.id_oferta_academica = oa.id");
	$this->db->join("registro_pago rp","mp.id_usuario = rp.id_usuario");
	$this->db->join("dia_clase di","oa.id_dia_clase = di.id");
	$this->db->join("pensum pem","oa.id_pensum= pem.id");
	$this->db->join("periodo pe","mp.id_periodo = pe.id");	
	$this->db->where_in("oa.id_programa",array(2,15));
	$this->db->where("mp.status",1);
	$this->db->where("mp.reg_pago",1);
	$this->db->where("mp.id_periodo",$id_periodo);
	$this->db->where("rp.status",1);
	$this->db->where("rp.tramite",0);
	$this->db->where("rp.pago_adicional",0);
	$this->db->where("rp.aspirante",0);
	$this->db->where("pe.status",1);
	$this->db->group_by("mp.id_oferta_academica" ,"oa.id_pensum");
	
$this->db->order_by("oa.trimestre");
	
		$resultado = $this->db->get();
		//var_dump($resultado);
		return $resultado->result();

	}

public function Materias_programa_emf($id_periodo){
	
	$this->db->select("oa.*,pem.nombre as unidad_curricular,COUNT(mp.id_usuario)AS ocupados,oa.cupos ,mp.id_oferta_academica,di.descripcion as dia  ");
		$this->db->from("materias_preinscritas mp");
		$this->db->join("oferta_academica oa","mp.id_oferta_academica = oa.id");
$this->db->join("registro_pago rp","mp.id_usuario = rp.id_usuario");
		$this->db->join("dia_clase di","oa.id_dia_clase = di.id");
		$this->db->join("pensum pem","oa.id_pensum= pem.id");
		$this->db->join("periodo pe","mp.id_periodo = pe.id");	
		$this->db->where_in("oa.id_programa",array(4,17));
		$this->db->where("mp.status",1);
		$this->db->where("mp.reg_pago",1);
		$this->db->where("mp.id_periodo",$id_periodo);
		$this->db->where("rp.status",1);
		$this->db->where("rp.tramite",0);
		$this->db->where("rp.pago_adicional",0);
		$this->db->where("rp.aspirante",0);
		$this->db->where("pe.status",1);
		$this->db->group_by("mp.id_oferta_academica" ,"oa.id_pensum");
	$this->db->order_by("oa.trimestre");
	
		$resultado = $this->db->get();
		return $resultado->result();

	}

public function Materias_programa_edpr($id_periodo){

	$this->db->select("oa.*,pem.nombre as unidad_curricular,COUNT(mp.id_usuario)AS ocupados,oa.cupos ,mp.id_oferta_academica,di.descripcion as dia  ");
		$this->db->from("materias_preinscritas mp");
		$this->db->join("oferta_academica oa","mp.id_oferta_academica = oa.id");
$this->db->join("registro_pago rp","mp.id_usuario = rp.id_usuario");
		$this->db->join("dia_clase di","oa.id_dia_clase = di.id");
		$this->db->join("pensum pem","oa.id_pensum= pem.id");
		$this->db->join("periodo pe","mp.id_periodo = pe.id");	
		$this->db->where_in("oa.id_programa",array(6,19));
		$this->db->where("mp.status",1);
		$this->db->where("mp.reg_pago",1);
		$this->db->where("mp.id_periodo",$id_periodo);
		$this->db->where("rp.status",1);
		$this->db->where("rp.tramite",0);
		$this->db->where("rp.pago_adicional",0);
		$this->db->where("rp.aspirante",0);
		$this->db->where("pe.status",1);
		$this->db->group_by("mp.id_oferta_academica" ,"oa.id_pensum");
	$this->db->order_by("oa.trimestre");
	
		$resultado = $this->db->get();
		return $resultado->result();

	}

public function Materias_programa_ecc($id_periodo){

		$this->db->select("oa.*,pem.nombre as unidad_curricular,COUNT(mp.id_usuario)AS ocupados,oa.cupos ,mp.id_oferta_academica,di.descripcion as dia  ");
		$this->db->from("materias_preinscritas mp");
		$this->db->join("oferta_academica oa","mp.id_oferta_academica = oa.id");
$this->db->join("registro_pago rp","mp.id_usuario = rp.id_usuario");
		$this->db->join("dia_clase di","oa.id_dia_clase = di.id");
		$this->db->join("pensum pem","oa.id_pensum= pem.id");
		$this->db->join("periodo pe","mp.id_periodo = pe.id");	
		$this->db->where_in("oa.id_programa",array(5,18));
		$this->db->where("mp.status",1);
		$this->db->where("mp.reg_pago",1);
		$this->db->where("mp.id_periodo",$id_periodo);
		$this->db->where("rp.status",1);
		$this->db->where("rp.tramite",0);
		$this->db->where("rp.pago_adicional",0);
		$this->db->where("rp.aspirante",0);
		$this->db->where("pe.status",1);
		$this->db->group_by("mp.id_oferta_academica" ,"oa.id_pensum");
	
	$this->db->order_by("oa.trimestre");
		$resultado = $this->db->get();
		return $resultado->result();

	}
public function Materias_programa_cppjp($id_periodo){
		$this->db->select("oa.*,pem.nombre as unidad_curricular,COUNT(mp.id_usuario)AS ocupados,oa.cupos ,mp.id_oferta_academica,di.descripcion as dia  ");
		$this->db->from("materias_preinscritas mp");
		$this->db->join("oferta_academica oa","mp.id_oferta_academica = oa.id");
$this->db->join("registro_pago rp","mp.id_usuario = rp.id_usuario");
		$this->db->join("dia_clase di","oa.id_dia_clase = di.id");
		$this->db->join("pensum pem","oa.id_pensum= pem.id");
		$this->db->join("periodo pe","mp.id_periodo = pe.id");	
	
		$this->db->where_in("oa.id_programa",array(11,20,25));
		$this->db->where("mp.status",1);
		$this->db->where("mp.reg_pago",1);
		$this->db->where("mp.id_periodo",$id_periodo);
		$this->db->where("rp.status",1);
		$this->db->where("rp.tramite",0);
		$this->db->where("rp.pago_adicional",0);
		$this->db->where("rp.aspirante",0);
		$this->db->where("pe.status",1);
		$this->db->group_by("mp.id_oferta_academica" ,"oa.id_pensum");
	$this->db->order_by("oa.trimestre");
	
		$resultado = $this->db->get();
		return $resultado->result();

	}
	public function Materias_programa_cppdm($id_periodo){

		$this->db->select("oa.*,pem.nombre as unidad_curricular,COUNT(mp.id_usuario)AS ocupados,oa.cupos ,mp.id_oferta_academica,di.descripcion as dia  ");
		$this->db->from("materias_preinscritas mp");
		$this->db->join("oferta_academica oa","mp.id_oferta_academica = oa.id");
		$this->db->join("registro_pago rp","mp.id_usuario = rp.id_usuario");
		$this->db->join("dia_clase di","oa.id_dia_clase = di.id");
		$this->db->join("pensum pem","oa.id_pensum= pem.id");
		$this->db->join("periodo pe","mp.id_periodo = pe.id");	
		$this->db->where_in("oa.id_programa",array(13,22,23));
		$this->db->where("mp.status",1);
		$this->db->where("mp.reg_pago",1);
		$this->db->where("mp.id_periodo",$id_periodo);
		$this->db->where("rp.status",1);
		$this->db->where("rp.tramite",0);
		$this->db->where("rp.pago_adicional",0);
		$this->db->where("rp.aspirante",0);
		$this->db->where("pe.status",1);
		$this->db->group_by("mp.id_oferta_academica" ,"oa.id_pensum");
	$this->db->order_by("oa.trimestre");
	
		$resultado = $this->db->get();
		return $resultado->result();

	}
	public function Materias_programa_cppvic($id_periodo){

		$this->db->select("oa.*,pem.nombre as unidad_curricular,COUNT(mp.id_usuario)AS ocupados,oa.cupos ,mp.id_oferta_academica,di.descripcion as dia  ");
		$this->db->from("materias_preinscritas mp");
		$this->db->join("oferta_academica oa","mp.id_oferta_academica = oa.id");
		$this->db->join("registro_pago rp","mp.id_usuario = rp.id_usuario");
		$this->db->join("dia_clase di","oa.id_dia_clase = di.id");
		$this->db->join("pensum pem","oa.id_pensum= pem.id");
		$this->db->join("periodo pe","mp.id_periodo = pe.id");	
		$this->db->where_in("oa.id_programa",array(13,21,24));
		$this->db->where("mp.status",1);
		$this->db->where("mp.reg_pago",1);
		$this->db->where("mp.id_periodo",$id_periodo);
		$this->db->where("rp.status",1);
		$this->db->where("rp.tramite",0);
		$this->db->where("rp.pago_adicional",0);
		$this->db->where("rp.aspirante",0);
		$this->db->where("pe.status",1);
			$this->db->where("mp.id_periodo",$id_periodo);
	$this->db->where("pe.status",1);
		$this->db->group_by("mp.id_oferta_academica" ,"oa.id_pensum");
	$this->db->order_by("oa.trimestre");
	
		$resultado = $this->db->get();
		return $resultado->result();

	}
public function Materias_programa_ddhh($id_periodo){
	
		$this->db->select("oa.*,pem.nombre as unidad_curricular,COUNT(mp.id_usuario)AS ocupados,oa.cupos ,mp.id_oferta_academica,di.descripcion as dia  ");
		$this->db->from("materias_preinscritas mp");
		$this->db->join("oferta_academica oa","mp.id_oferta_academica = oa.id");
		$this->db->join("registro_pago rp","mp.id_usuario = rp.id_usuario");
		$this->db->join("dia_clase di","oa.id_dia_clase = di.id");
		$this->db->join("pensum pem","oa.id_pensum= pem.id");
		$this->db->join("periodo pe","mp.id_periodo = pe.id");	
		$this->db->where_in("oa.id_programa",array(26,37));
		$this->db->where("mp.status",1);
		$this->db->where("mp.reg_pago",1);
		$this->db->where("mp.id_periodo",$id_periodo);
		$this->db->where("rp.status",1);
		$this->db->where("rp.tramite",0);
		$this->db->where("rp.pago_adicional",0);
		$this->db->where("rp.aspirante",0);
		$this->db->where("pe.status",1);
		$this->db->group_by("mp.id_oferta_academica" ,"oa.id_pensum");
$this->db->order_by("oa.trimestre");
		$resultado = $this->db->get();
		return $resultado->result();

	}
public function Materias_programa_tegr($id_periodo){ //lineas de investigacion especializaciones
		
		$this->db->select("oa.*,pem.nombre as unidad_curricular,COUNT(mp.id_usuario)AS ocupados,oa.cupos ,mp.id_oferta_academica ");
		$this->db->from("materias_preinscritas mp");
		$this->db->join("registro_pago rp","mp.id_usuario = rp.id_usuario");
		$this->db->join("oferta_academica oa","mp.id_oferta_academica = oa.id");
		$this->db->join("pensum pem","oa.id_pensum= pem.id");
		$this->db->join("periodo pe","mp.id_periodo = pe.id");	
		$this->db->where("oa.id_programa",27);
		$this->db->where("mp.status",1);
		$this->db->where("mp.reg_pago",1);
		$this->db->where("mp.id_periodo",$id_periodo);
		$this->db->where("rp.status",1);
		$this->db->where("rp.tramite",0);
		$this->db->where("rp.pago_adicional",0);
		$this->db->where("rp.aspirante",0);
		$this->db->where("pe.status",1);
		$this->db->group_by("mp.id_oferta_academica" ,"oa.id_pensum");
	$this->db->order_by("oa.trimestre");
	
		$resultado = $this->db->get();
		return $resultado->result();

	}
public function Materias_programa_tegre($id_periodo){  //lineas de investigacion maestrias
		
		$this->db->select("oa.*,pem.nombre as unidad_curricular,COUNT(mp.id_usuario)AS ocupados,oa.cupos ,mp.id_oferta_academica ");
		$this->db->from("materias_preinscritas mp");
		$this->db->join("oferta_academica oa","mp.id_oferta_academica = oa.id");
		$this->db->join("registro_pago rp","mp.id_usuario = rp.id_usuario");
		$this->db->join("pensum pem","oa.id_pensum= pem.id");
		$this->db->join("periodo pe","mp.id_periodo = pe.id");	
		$this->db->where("oa.id_programa",28);
		$this->db->where("mp.status",1);
		$this->db->where("mp.reg_pago",1);
		$this->db->where("mp.id_periodo",$id_periodo);
		$this->db->where("rp.status",1);
		$this->db->where("rp.tramite",0);
		$this->db->where("rp.pago_adicional",0);
		$this->db->where("rp.aspirante",0);
		$this->db->where("pe.status",1);
		$this->db->group_by("mp.id_oferta_academica" ,"oa.id_pensum");
	$this->db->order_by("oa.trimestre");
	
		$resultado = $this->db->get();
		return $resultado->result();

	}
	public function getBuscaroferta($id){
		$this->db->select("oa.*,oa.trimestre,oa.id as id_oferta, pr.nombre as programa_nombre,d.*,s.nombre as seccion,pe.nombre as pensum_nombre,dc.descripcion as dia");
		$this->db->from("oferta_academica oa");
		$this->db->join("programa pr","pr.id  = oa.id_programa");	
		$this->db->join("pensum pe","pe.id  = oa.id_pensum");	
		$this->db->join("docente d","d.id  = oa.id_docente");		
		$this->db->join("seccion s","s.id  = oa.seccion");
$this->db->join("dia_clase dc","dc.id  = oa.id_dia_clase");
		$this->db->where("oa.id",$id);
		$resultado = $this->db->get();
	//	var_dump($this->db->queries);
		return $resultado->row();

	}
	public function getBuscarofertali($codigo,$periodo){ //23-09-2025
		$this->db->select("oa.*,oa.trimestre,oa.id as id_oferta, pr.nombre as programa_nombre,d.*,s.nombre as seccion,pe.nombre as pensum_nombre,dc.descripcion as dia");
		$this->db->from("oferta_academica oa");
		$this->db->join("programa pr","pr.id  = oa.id_programa");	
		$this->db->join("pensum pe","pe.id  = oa.id_pensum");	
		$this->db->join("docente d","d.id  = oa.id_docente");		
		$this->db->join("seccion s","s.id  = oa.seccion");
$this->db->join("dia_clase dc","dc.id  = oa.id_dia_clase");
		$this->db->where("oa.codigo",$codigo);
		$this->db->where("oa.id_periodo",$periodo);
	//	$this->db->where("oa.status",1);
		$resultado = $this->db->get();
		//var_dump($this->db->queries);
		return $resultado->result();

	}
	

public function getBuscaroferta_aprobada($id){
		$this->db->select("oa.*,pen.nombre as pensums,prog.nombre as programas,
		doc.primer_nombre as primernombre, doc.primer_apellido as primerapellido,dia_class.descripcion as dia");
		$this->db->from("oferta_academica oa");
		$this->db->join("pensum pen","oa.id_pensum = pen.id");
		$this->db->join("programa prog","oa.id_programa = prog.id");
		$this->db->join("docente doc","oa.id_docente = doc.id");
		$this->db->join("dia_clase dia_class","oa.id_dia_clase = dia_class.id");
		$this->db->where("oa.id",$id);
$this->db->where("oa.status",1);
		$resultado = $this->db->get();
		//var_dump($this->db->queries);
		return $resultado->row();

	}
public function getBuscaroferta_aprobadace($id){//caso especial
		$this->db->select("oa.*,pen.nombre as pensums,prog.nombre as programas,
		doc.primer_nombre as primernombre, doc.primer_apellido as primerapellido,dia_class.descripcion as dia");
		$this->db->from("oferta_academica oa");
		$this->db->join("pensum pen","oa.id_pensum = pen.id");
		$this->db->join("programa prog","oa.id_programa = prog.id");
		$this->db->join("docente doc","oa.id_docente = doc.id");
		$this->db->join("dia_clase dia_class","oa.id_dia_clase = dia_class.id");
		$this->db->where("oa.id_pensum",$id);
$this->db->where("oa.status",1);
		$resultado = $this->db->get();
		//var_dump($this->db->queries);
		return $resultado->row();

	}



	public function getBuscaroferta_programa($id){

		//$this->db->query("SET sql_mode=(SELECT REPLACE(@@sql_mode, 'ONLY_FULL_GROUP_BY', ''));");	
		$this->db->select("oa.*, pr.nombre as programa_nombre,dc.descripcion as dia, pen.nombre as pensum,pen.horas,sec.nombre as seccion,pe.nombre as periodo, CASE
        WHEN pen.horas = 16 THEN 'DIECISEIS' 
        WHEN pen.horas = 32 THEN 'TREINTA Y DOS' 
        WHEN pen.horas = 48 THEN 'CUARENTA Y OCHO'
         WHEN pen.horas = 64 THEN 'SESENTA Y CUATRO' ELSE 'score_error'
    END AS letras");
		$this->db->from("oferta_academica oa");
		$this->db->join("programa pr","pr.id  = oa.id_programa");		
		$this->db->join("dia_clase dc","dc.id  = oa.id_dia_clase");
		$this->db->join("pensum pen","oa.id_pensum= pen.id");
		$this->db->join("seccion sec","oa.seccion= sec.id");
		$this->db->join("periodo pe","oa.id_periodo= pe.id");
		$this->db->where("oa.id",$id);
		$resultado = $this->db->get();
		
		return $resultado->row();




	}

	public function update_oferta($id,$data){
		$this->db->where("id",$id);
		return $this->db->update("oferta_academica",$data);
	}
public function unidades_curriculares_docente($id_periodo,$id_docente){
		$this->db->query("SET sql_mode=(SELECT REPLACE(@@sql_mode, 'ONLY_FULL_GROUP_BY', ''));");	
		$this->db->select("oa.*, pen.nombre,pro.nombre as programa_nombre,pen.unidad_curricular as uc, count(mp.id_usuario) as matricula");
		$this->db->from("materias_preinscritas mp");	
		$this->db->join("oferta_academica oa","oa.id= mp.id_oferta_academica");
		$this->db->join("pensum pen","oa.id_pensum= pen.id");
		$this->db->join("programa pro","oa.id_programa= pro.id");
		$this->db->where("oa.id_docente",$id_docente);
		$this->db->where("oa.id_periodo",$id_periodo);
		$this->db->where_not_in("oa.trimestre",'LÍNEA DE INVESTIGACIÓN');
		$this->db->where("mp.status",1);
		$this->db->where("mp.reg_pago",1);
		$this->db->where("mp.rev_academica",1);
		$this->db->group_by("oa.id");
		$resultado = $this->db->get();
		//	var_dump($this->db->queries);
		return $resultado->result();

	}
	public function unidades_curriculares_docente_lineas($id_periodo,$id_docente){
		$this->db->query("SET sql_mode=(SELECT REPLACE(@@sql_mode, 'ONLY_FULL_GROUP_BY', ''));");	
		$this->db->select("oa.*, oa.codigo,pen.nombre,pro.nombre as programa_nombre,pen.unidad_curricular as uc, count(mp.id_usuario) as matricula");
		$this->db->from("materias_preinscritas mp");	
		$this->db->join("oferta_academica oa","oa.id= mp.id_oferta_academica");
		$this->db->join("pensum pen","oa.id_pensum= pen.id");
		$this->db->join("programa pro","oa.id_programa= pro.id");
		$this->db->where("oa.id_docente",$id_docente);
		$this->db->where("oa.id_periodo",$id_periodo);
		$this->db->where("oa.trimestre",'LÍNEA DE INVESTIGACIÓN');
		$this->db->where("mp.status",1);
		$this->db->where("mp.reg_pago",1);
		$this->db->where("mp.rev_academica",1);
		$this->db->group_by("oa.trimestre, oa.codigo");
		$resultado = $this->db->get();
		//	var_dump($this->db->queries);
		return $resultado->result();

	}
	public function unidades_curriculares_docente_todos($id_periodo){
		$this->db->query("SET sql_mode=(SELECT REPLACE(@@sql_mode, 'ONLY_FULL_GROUP_BY', ''));");	
		$this->db->select("oa.*, pen.nombre,pro.nombre as programa_nombre,pen.unidad_curricular as uc, count(mp.id_usuario) as matricula, concat(do.primer_nombre,' ',do.primer_apellido) as docente");
		$this->db->from("materias_preinscritas mp");	
		$this->db->join("oferta_academica oa","oa.id= mp.id_oferta_academica");
		$this->db->join("pensum pen","oa.id_pensum= pen.id");
		$this->db->join("programa pro","oa.id_programa= pro.id");	
		$this->db->join("docente do","oa.id_docente= do.id");		
		$this->db->where("oa.id_periodo",$id_periodo);
		$this->db->where_not_in("oa.trimestre",'LÍNEA DE INVESTIGACIÓN');
		$this->db->where("mp.status",1);
		$this->db->where("mp.reg_pago",1);
		$this->db->where("mp.rev_academica",1);
		$this->db->group_by("oa.id");
		$this->db->order_by("oa.id_programa, oa.trimestre, pen.nombre");
		$resultado = $this->db->get();

		//	var_dump($this->db->queries);
		return $resultado->result();

	}
	public function unidades_curriculares_docente_lineas_todos($id_periodo){
		$this->db->query("SET sql_mode=(SELECT REPLACE(@@sql_mode, 'ONLY_FULL_GROUP_BY', ''));");	
		$this->db->select("oa.*, pen.nombre,pro.nombre as programa_nombre,pen.unidad_curricular as uc, count(mp.id_usuario) as matricula, concat(do.primer_nombre,' ',do.primer_apellido) as docente");
		$this->db->from("materias_preinscritas mp");	
		$this->db->join("oferta_academica oa","oa.id= mp.id_oferta_academica");
		$this->db->join("pensum pen","oa.id_pensum= pen.id");
		$this->db->join("programa pro","oa.id_programa= pro.id");	
		$this->db->join("docente do","oa.id_docente= do.id");		
		$this->db->where("oa.id_periodo",$id_periodo);
		$this->db->where("oa.trimestre",'LÍNEA DE INVESTIGACIÓN');
		$this->db->where("mp.status",1);
		$this->db->where("mp.reg_pago",1);
		$this->db->where("mp.rev_academica",1);
		$this->db->group_by("oa.codigo");
		$this->db->order_by("oa.id_programa,pen.nombre");
		$resultado = $this->db->get();

		//var_dump($this->db->queries);
		return $resultado->result();

	}
	public function unidades_curriculares_docente_cargados($id_periodo){
		$this->db->query("SET sql_mode=(SELECT REPLACE(@@sql_mode, 'ONLY_FULL_GROUP_BY', ''));");	
		$this->db->select("oa.*, pen.nombre,pro.nombre as programa_nombre,pen.unidad_curricular as uc, count(mp.id_usuario) as matricula, concat(do.primer_nombre,' ',do.primer_apellido) as docente");
		$this->db->from("materias_preinscritas mp");	
		$this->db->join("oferta_academica oa","oa.id= mp.id_oferta_academica");
		$this->db->join("pensum pen","oa.id_pensum= pen.id");
		$this->db->join("programa pro","oa.id_programa= pro.id");	
		$this->db->join("docente do","oa.id_docente= do.id");	
		$this->db->join("notas_academica na","na.id_oferta_academica= oa.id");		
		$this->db->join("plan_evaluacion pev","pev.id_oferta_academica= oa.id");	
		$this->db->where("oa.id_periodo",$id_periodo);
		$this->db->where_not_in("oa.trimestre",'LÍNEA DE INVESTIGACIÓN');
		$this->db->where("mp.status",1);
		$this->db->where("mp.reg_pago",1);
		$this->db->where("mp.rev_academica",1);
		$this->db->where("na.cerrar_proceso",1);
		$this->db->group_by("oa.id");
		$this->db->order_by("oa.id_programa, pen.nombre");
		$resultado = $this->db->get();

	//		var_dump($this->db->queries);
		return $resultado->result();

	}
	public function unidades_curriculares_docente_cargados_lineas($id_periodo){
		$this->db->query("SET sql_mode=(SELECT REPLACE(@@sql_mode, 'ONLY_FULL_GROUP_BY', ''));");	
		$this->db->select("oa.*, pen.nombre,pro.nombre as programa_nombre,pen.unidad_curricular as uc, count(mp.id_usuario) as matricula, concat(do.primer_nombre,' ',do.primer_apellido) as docente");
		$this->db->from("materias_preinscritas mp");	
		$this->db->join("oferta_academica oa","oa.id= mp.id_oferta_academica");
		$this->db->join("pensum pen","oa.id_pensum= pen.id");
		$this->db->join("programa pro","oa.id_programa= pro.id");	
		$this->db->join("docente do","oa.id_docente= do.id");	
		$this->db->join("notas_academica na","na.id_oferta_academica= oa.id");		
		$this->db->join("plan_evaluacion pev","pev.id_oferta_academica= oa.id");	
		$this->db->where("oa.id_periodo",$id_periodo);
		$this->db->where("oa.trimestre",'LÍNEA DE INVESTIGACIÓN');
		$this->db->where("mp.status",1);
		$this->db->where("mp.reg_pago",1);
		$this->db->where("mp.rev_academica",1);
		$this->db->where("na.cerrar_proceso",1);
		$this->db->group_by("oa.codigo");
		$this->db->order_by("oa.id_programa, pen.nombre");
		$resultado = $this->db->get();

	//		var_dump($this->db->queries);
		return $resultado->result();

	}
	public function unidades_curriculares_docente_estatus($id_periodo){
		$this->db->query("SET sql_mode=(SELECT REPLACE(@@sql_mode, 'ONLY_FULL_GROUP_BY', ''));");	
		$this->db->select("oa.*, di.descripcion as dia,pen.nombre,pro.nombre as programa_nombre,pen.unidad_curricular as uc, count(mp.id_usuario) as matricula, concat(do.primer_nombre,' ',do.primer_apellido) as docente,na.cerrar_proceso,pev.id as plan");
		$this->db->from("materias_preinscritas mp");	
		$this->db->join("oferta_academica oa","oa.id= mp.id_oferta_academica");
		$this->db->join("pensum pen","oa.id_pensum= pen.id");
		$this->db->join("programa pro","oa.id_programa= pro.id");	
		$this->db->join("docente do","oa.id_docente= do.id");	
		$this->db->join("dia_clase di","oa.id_dia_clase= di.id");	
		$this->db->join("notas_academica na","na.id_oferta_academica= oa.id",Left);	
		$this->db->join("plan_evaluacion pev","pev.id_oferta_academica= oa.id",Left);		
		$this->db->where("oa.id_periodo",$id_periodo);
		$this->db->where("mp.status",1);
		$this->db->where("mp.reg_pago",1);
		$this->db->where("mp.rev_academica",1);
		$this->db->group_by("oa.id");
		$this->db->order_by("oa.id_programa, pen.nombre");
		$resultado = $this->db->get();

		//	var_dump($this->db->queries);
		return $resultado->result();

	}
public function unidades_curriculares_docente_todas($id_docente){// actualizado 21-02-2024
	
		$this->db->query("SET sql_mode=(SELECT REPLACE(@@sql_mode, 'ONLY_FULL_GROUP_BY', ''));");	
		$this->db->select("oa.*, pen.nombre,pro.nombre as programa_nombre,pen.unidad_curricular as uc, count(mp.id_usuario) as matricula, p.nombre as periodo,p.id as id_periodo");
		$this->db->from("materias_preinscritas mp");	
		$this->db->join("oferta_academica oa","oa.id= mp.id_oferta_academica");
		$this->db->join("pensum pen","oa.id_pensum= pen.id");
		$this->db->join("programa pro","oa.id_programa= pro.id");
		$this->db->join("periodo p","oa.id_periodo= p.id");
		$this->db->where("oa.id_docente",$id_docente);
		
		$this->db->where("mp.status",1);
		$this->db->where("mp.reg_pago",1);
		$this->db->where("mp.rev_academica",1);
		$this->db->group_by("oa.id");
		$resultado = $this->db->get();
		//	var_dump($this->db->queries);
		return $resultado->result();

	}
public function oferta_academica_vigente(){// actualizado 2026
		$this->db->query("SET sql_mode=(SELECT REPLACE(@@sql_mode, 'ONLY_FULL_GROUP_BY', ''));");
		$this->db->select("periodo.nombre as periodo, oa.*,oa.modalidad as modo,oa.trimestre as trim,
		pensum.nombre as unidad_curricular,programa.nombre as programa,docente.*,
		dia_clase.descripcion as desdia_clase ,seccion.nombre as desseccion , usuarios.*,usuarios.estado as estatus_usuario" );
		$this->db->from("oferta_academica oa");
		$this->db->join("pensum" ,"pensum.id = oa.id_pensum");
		$this->db->join("programa","programa.id = oa.id_programa");
		$this->db->join("docente", "docente.id = oa.id_docente");
		$this->db->join("dia_clase", "dia_clase.id = oa.id_dia_clase");
		$this->db->join("seccion ","seccion.id = oa.seccion");	
		$this->db->join("periodo ","periodo.id = oa.id_periodo");		
		$this->db->join("usuarios "," usuarios.id = docente.id_usuario",LEFT);
		$this->db->where("oa.status",1);
		$this->db->order_by("oa.id_programa,  oa.id_pensum, 
		oa.modalidad,oa.trimestre,
		 oa.id_dia_clase,seccion.nombre,docente.primer_apellido");
		
		
		$resultado = $this->db->get();
		//var_dump($this->db->queries);
		return $resultado->result();

	}

}
