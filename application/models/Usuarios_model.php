<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios_model extends CI_Model { 

	

	public function login($username,$password)
	{
		//consultados el usuario y password
		$this->db->where("username",$username);
		$this->db->where("password",$password);
		$this->db->where("estado",1);
		// se consulta con la tabla usuarios
		$resultados = $this->db->get("usuarios");
		// verificamos que trae valor
		if ($resultados->num_rows() > 0){
			return $resultados->row();
		}
		else{
			return false;
		}
	}

	public function cambio($id_usuario,$data)
	{

		$this->db->where("id",$id_usuario);
		return $this->db->update("usuarios",$data);
	}

	public function lista_usuario_docente()
	{

		$this->db->select("u.*,rl.nombre as rol");
		$this->db->from("usuarios u");
		$this->db->join("roles rl","u.rol_id = rl.id");
		$this->db->where("estado",1);
		$this->db->where("u.rol_id",9);
		$this->db->order_by('u.username', 'ASC');
		$resultados = $this->db->get();


		if ($resultados->result() > 0){
			return $resultados->result();
		}
		else{
			return false;
		}
	}
	public function lista_usuario()
	{

		$this->db->select("u.*,rl.nombre as rol");
		$this->db->from("usuarios u");
		$this->db->join("roles rl","u.rol_id = rl.id");
//		$this->db->where("estado",1);
//		$this->db->where("u.rol_id",9);
		$this->db->order_by('u.username', 'ASC');
		$resultados = $this->db->get();


		if ($resultados->result() > 0){
			return $resultados->result();
		}
		else{
			return false;
		}
	}
	public function lista_usuario_regulares($programa)
	{
		//var_dump($programa);
		$this->db->select("u.*,rl.nombre as rol");
		$this->db->from("usuarios u");
		$this->db->join("roles rl","u.rol_id = rl.id");
		$this->db->where("estado",1);
		$this->db->where_in("u.rol_id",array(5,8));
		if($programa=='s'){
			$this->db->where("u.programa_id",''); 
		}else{
			 $programa=implode(',',$programa); 
			$this->db->where("u.programa_id",$programa);
		}
		$this->db->order_by('u.username', 'ASC');
		$resultados = $this->db->get();
		//var_dump($this->db->queries);

		if ($resultados->result() > 0){
			return $resultados->result();
		}
		else{
			return false;
		}
	}
	/*Actualizada 30-03-2022*/
	public function total_inscritos_aspirantes(){//total de aspirantes inscritos  en el periodo activo
		$this->db->query("SET sql_mode=(SELECT REPLACE(@@sql_mode, 'ONLY_FULL_GROUP_BY', ''));");	
		$this->db->select("r.*,u.id as id_usuario,es.nacionalidad,es.nombre_primer as primer_nombre,es.nombre_segundo as segundo_nombre,es.apellido_segundo as segundo_apellido,es.apellido_primer as primer_apellido,es.cedula as cedula,es.id_sexo as sexo, ban.nombre as nombre_banco, u.*");
		$this->db->from("usuarios u");
		$this->db->join("registro_pago r","r.id_usuario=u.id");	
	
		$this->db->join("banco ban","r.id_banco = ban.id");		
		$this->db->join("periodo pe","r.id_periodo = pe.id");				
		$this->db->join("estudiante es","r.id_usuario = es.id_usuario");
		$this->db->where("r.status", 1);
		$this->db->where("r.conciliado", 1);
		$this->db->where("r.academico", 1);
		$this->db->where("r.aspirante", 1);
		$this->db->where("pe.status_aspirante", 1);
		$this->db->group_by("r.id_usuario");
		
		$resultados = $this->db->get();
		//var_dump($this->db->queries);
			
			return $resultados->result();
		
			
	}
	/*Actualizada 06-04-2022*/
	public function total_inscritos_aspirantes_periodo($periodo){//total de aspirantes inscritos activos por periodo
		$this->db->query("SET sql_mode=(SELECT REPLACE(@@sql_mode, 'ONLY_FULL_GROUP_BY', ''));");	
		$this->db->select("r.*,es.nombre_primer as primer_nombre,es.nombre_segundo as segundo_nombre,es.apellido_segundo as segundo_apellido,es.apellido_primer as primer_apellido,es.cedula as cedula, es.id_sexo as sexo,u.*");
		$this->db->from("usuarios u");
		$this->db->join("registro_pago r","r.id_usuario=u.id");			
		$this->db->join("periodo pe","r.id_periodo = pe.id");				
		$this->db->join("estudiante es","r.id_usuario = es.id_usuario");
		$this->db->where("r.status", 1);
		$this->db->where("r.conciliado", 1);
		$this->db->where("r.academico", 1);
		$this->db->where("r.aspirante", 1);
		$this->db->where("pe.id", $periodo);
		$this->db->group_by("r.id_usuario");
		
		$resultados = $this->db->get();
		//var_dump($this->db->queries);
			
			return $resultados->result();
		
			
	}
	public function save($data){
		return $this->db->insert("usuarios",$data);
		
	}

	
	public function buscar_usuario($id){
		$this->db->where("id",$id);
		$resultado = $this->db->get("usuarios");
		return $resultado->row();

	}

public function buscar_aspirante($id){
		$this->db->where("id",$id);
		$this->db->where("rol_id",7);
		$resultado = $this->db->get("usuarios");
		return $resultado->result();

	}
public function buscar($cedula){//verifica si el estudiante registrado inactivo
		$this->db->select("u.id,u.nombres,u.apellidos, u.username, u.email,u.rol_id, u.estado");
		$this->db->from("usuarios u");
		$this->db->join("estudiante es","u.id = es.id_usuario");
		$this->db->where("es.cedula",$cedula);
		$this->db->where("u.estado",0);
		$resultado = $this->db->get();
		//var_dump($this->db->queries);

		if ($resultado->num_rows() > 0) {
			return$resultado->result();
		
		}
		else{
			return false;
		}

	}
	public function buscar_activo($cedula){//verifica si el estudiante registrado inactivo
		$this->db->select("u.id,u.nombres,u.apellidos, u.username, u.email");
		$this->db->from("usuarios u");
		$this->db->join("estudiante es","u.id = es.id_usuario");
		$this->db->where("es.cedula",$cedula);
		$this->db->where("u.estado",1);
		$resultado = $this->db->get();
		//var_dump($this->db->queries);

		if ($resultado->num_rows() > 0) {
			return true;
		
		}
		else{
			return false;
		}

	}
	public function update_usuario($id,$data){
		$this->db->where("id",$id);
		return $this->db->update("usuarios",$data);
		//var_dump($this->db->queries);
		//return 1;
	}
	
public function buscar_usuario_cedula($cedula){
		$this->db->where("username",$cedula);
		$resultado = $this->db->get("usuarios");
		//var_dump($this->db->queries);

		if ($resultado->num_rows() > 0) {
			return $resultado->result();
		}
		else{
			return false;
		}

	}
	public function buscar_usuario_aspirante($cedula){
		$rol=array(7,8);
		$this->db->like('username', $cedula, 'both'); 
		
		$this->db->where_in("rol_id",$rol);
		$resultado = $this->db->get("usuarios");
	//	var_dump($this->db->queries);

		if ($resultado->num_rows() > 0) {
			return $resultado->result();
		}
		else{
			return false;
		}


	}

public function buscar_usuario_correo($correo,$cedula){//verifica si existe el email
		$this->db->where("email",$correo);
		$this->db->like('username', $cedula, 'both'); 
		$resultado = $this->db->get("usuarios");
	//	var_dump($this->db->queries);

		if ($resultado->num_rows() > 0) {
			return true;
		}
		else{
			return false;
		}

	}

public function buscar_usuario_correo1($correo){//muestra los valores del usuario asociado al correo
		$this->db->where("email",$correo);
		$resultado = $this->db->get("usuarios");
		//var_dump($this->db->queries);

		if ($resultado->num_rows() > 0) {
			return$resultado->row();
		}
		else{
			return false;
		}

	}
public function total_inscritos_aspirantes_datos($id_periodo){//total de aspirantes inscritos
		$this->db->query("SET sql_mode=(SELECT REPLACE(@@sql_mode, 'ONLY_FULL_GROUP_BY', ''));");	
		$this->db->select("u.id,u.nombres,u.apellidos, u.username, u.email,
es.cedula, es.id_sexo,es.nacionalidad,CONCAT(codigo_cel.descripcion,es.tel_celular) AS telefono_cel ,CONCAT(codigo_hab.descripcion,es.tel_habitacion) AS telefono_hab,
lugar_trabajo.lugar_trabajo,trabajo.cargo,estado.estado AS residencia,u.programa_id,es.correo,esc.estado AS circuns,ac.ult_titulo");
		$this->db->from("usuarios u");
		$this->db->join("registro_pago r","r.id_usuario=u.id");			
		$this->db->join("periodo pe","r.id_periodo = pe.id");				
		$this->db->join("estudiante es","r.id_usuario = es.id_usuario");
		$this->db->join("academico ac","ac.id_usuario=u.id");
		$this->db->join("trabajo","trabajo.id_usuario=u.id");
		$this->db->join("direccion","direccion.id_usuario=u.id");
		$this->db->join("lugar_trabajo","lugar_trabajo.id=trabajo.id_lugar_trabajo");
 		$this->db->join("estado","estado.id=direccion.id_estado");
		 $this->db->join("estado esc","esc.id=trabajo.estado_circunscripcion",LEFT);
 		$this->db->join("codigo_cel","codigo_cel.id=es.id_codigo_cel",RIGHT);
 		$this->db->join("codigo_hab","codigo_hab.id=es.id_codigo_hab",RIGHT);
		$this->db->where("trabajo.actual", 1);
		$this->db->where("r.status", 1);
		$this->db->where("r.conciliado", 1);
		$this->db->where("r.academico", 1);
		$this->db->where("r.aspirante", 1);
		$this->db->where("pe.status_aspirante", 1);			
		$this->db->order_by("u.`nombres`,u.`programa_id`");
		$this->db->group_by("r.id_usuario`");
		
		$resultados = $this->db->get();
		//var_dump($this->db->queries);
		return $resultados->result();
		
			
	}	

public function total_inscritos_aspirantes_datos_todoslos_registrado($id_periodo){//total de aspirantes inscritos
		$query=$this->db->query("SET sql_mode=(SELECT REPLACE(@@sql_mode, 'ONLY_FULL_GROUP_BY', ''));");			
$query=$this->db->query("SELECT id,nombres,apellidos, username as cedula, email,programa_id 
FROM usuarios  

WHERE  estado=1 AND rol_id=7 
AND  id  NOT IN(SELECT id_usuario FROM registro_pago WHERE aspirante=1 AND id_periodo=$id_periodo AND pago_adicional=0
 group by registro_pago.id_usuario) 
 order by usuarios.nombres,usuarios.programa_id "); 

		

		
		
//$resultados = $this->db->get();
	//	var_dump($this->db->queries);			
		return $query->result();
			
		
	}	

public function usuarios_activos_programas(){//total de aspirantes inscritos
	$query=$this->db->query("SET sql_mode=(SELECT REPLACE(@@sql_mode, 'ONLY_FULL_GROUP_BY', ''));");			
$query=$this->db->query(" SELECT COUNT(id) AS total,usuarios.*
FROM usuarios  
WHERE  estado=1 AND rol_id=5
 GROUP BY usuarios.programa_id  
 ORDER BY usuarios.programa_id  "); 

	

	
	
//$resultados = $this->db->get();
//	var_dump($this->db->queries);			
	return $query->result();
	
		
}

public function buscar_correo($correo){//verifica si existe el email
	$this->db->where("email",$correo);	
	$resultado = $this->db->get("usuarios");
	//var_dump($this->db->queries);

	if ($resultado->num_rows() > 0) {
		return true;
	}
	else{
		return false;
	}

}

public function total_inscritos_aspirantes_pagos_sinrequisitos($id_periodo){//total de aspirantes inscritos sin requisitos y con pago
	$query=$this->db->query("SET sql_mode=(SELECT REPLACE(@@sql_mode, 'ONLY_FULL_GROUP_BY', ''));");			
$query=$this->db->query("SELECT usuarios.id,registro_pago.nro_referencia,registro_pago.id_banco,registro_pago.fecha_transferencia,registro_pago.monto_apagar,registro_pago.postgrado,
usuarios.nombres,usuarios.apellidos,usuarios.email,usuarios.username,programa.id as programa_id,programa.nombre_convocatoria,modalidad_convocatoria,
codigo_cel.descripcion,es.tel_celular,codigo_hab.descripcion,es.tel_habitacion,estado.estado,direccion.domicilio
FROM registro_pago
INNER JOIN  usuarios ON usuarios.id =registro_pago.id_usuario
INNER JOIN  estudiante AS es ON es.id_usuario =registro_pago.id_usuario
LEFT JOIN `codigo_cel` ON `codigo_cel`.`id`=`es`.`id_codigo_cel` 
LEFT JOIN `codigo_hab` ON `codigo_hab`.`id`=`es`.`id_codigo_hab` 
LEFT JOIN `direccion` ON `direccion`.`id_usuario`=`es`.`id_usuario` 
LEFT JOIN `estado` ON `estado`.`id`=`direccion`.`id_estado` 
INNER JOIN  programa ON usuarios.programa_id =programa.id
WHERE  aspirante=1 AND  registro_pago.id_periodo=$id_periodo AND conciliado=0 "); 

	

	
	
//$resultados = $this->db->get();
//	var_dump($this->db->queries);			
	return $query->result();
		
	
}	


}


