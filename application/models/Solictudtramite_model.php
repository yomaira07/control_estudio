<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Solictudtramite_model extends CI_Model {

	public function getListaSolTramites($id_usuario,$tipo_tramite){
		$tramite=array(16,17,18,19,28);
        $this->db->select("st.*,st.id as id_solicitud,st.id_tramite as id_tramite,st.id_usuario,tr.*, atr.*, 
		pr.*,pr.nombre as programa, tr.nombre as tramite,r.academico,r.conciliado,r.dactualizo,r.quien_actualizo,st.id_usuario AS id_usuario,r.monto_apagar");
		$this->db->from("solicitud_tramite st");	
		$this->db->join("tramites tr","st.id_tramite = tr.id");
		$this->db->join("registro_pago r","r.id_solicitud_tramite = st.id",LEFT);
		$this->db->join("programa pr","st.id_programa = pr.id");
		$this->db->join("aranceles_tramites atr","atr.id_tramites = tr.id");		
		$this->db->where_not_in("tr.id",$tramite);
		$this->db->where("st.id_usuario",$id_usuario);
		$this->db->where("tr.id_tipo_tramite",$tipo_tramite);
$this->db->where("st.status",1);
$this->db->where("atr.status",1);
//$this->db->where("r.pago_adicional",0);
			
		$resultados = $this->db->get();
		//var_dump($this->db->queries);
		if ($resultados->num_rows() > 0) {
			return $resultados->result();
		}
		else{
			return false;
		}
	}
	public function getListaSolTramites_academico($id_usuario,$tipo_tramite){
        $this->db->select("st.*,st.id as id_solicitud,tr.*,  pr.*,pr.nombre as programa, tr.nombre as tramite");
		$this->db->from("solicitud_tramite st");	
		$this->db->join("tramites tr","st.id_tramite = tr.id");
		$this->db->join("programa pr","st.id_programa = pr.id");		
		$this->db->where("st.id_usuario",$id_usuario);
		$this->db->where("tr.id_tipo_tramite",$tipo_tramite);
$this->db->where("st.status",1);
			//var_dump($this->db->queries);
		$resultados = $this->db->get();
		if ($resultados->num_rows() > 0) {
			return $resultados->result();
		}
		else{
			return false;
		}
	}
	public function getListaSolTramites_egresos($id_usuario,$tipo_tramite){
		$tramite=array(18);
		$this->db->select("st.*,r.*,st.id as id_solicitud,st.id_tramite as id_tramite, tr.*, st.id_usuario,
		atr.*, pr.*,pr.nombre as programa, tr.nombre as tramite,r.academico,r.conciliado,r.monto_apagar");
		$this->db->from("solicitud_tramite st");	
		$this->db->join("registro_pago r","r.id_solicitud_tramite = st.id",LEFT);
		$this->db->join("tramites tr","st.id_tramite = tr.id");
		$this->db->join("programa pr","st.id_programa = pr.id");
		$this->db->join("aranceles_tramites atr","atr.id_tramites = tr.id");		
		$this->db->where_in("tr.id",$tramite);
		$this->db->where("st.id_usuario",$id_usuario);
		$this->db->where("tr.id_tipo_tramite",$tipo_tramite);
$this->db->where("st.status",1);
$this->db->where("atr.status",1);
//$this->db->where("r.pago_adicional",0);
		
		
		$resultados = $this->db->get();
		//var_dump($this->db->queries);
		if ($resultados->num_rows() > 0) {
			return $resultados->result();
		}
		else{
			return false;
		}
	}
public function getListaSolTramites_egresos_grado($id_usuario,$tipo_tramite){
		$tramite=array(36);
        $this->db->select("st.*,r.*,st.id as id_solicitud,st.id_tramite as id_tramite, tr.*, st.id_usuario,
		atr.*, pr.*,pr.nombre as programa, tr.nombre as tramite,r.academico,r.conciliado,r.monto_apagar");
		$this->db->from("solicitud_tramite st");	
		$this->db->join("registro_pago r","r.id_solicitud_tramite = st.id",LEFT);
		$this->db->join("tramites tr","st.id_tramite = tr.id");
		$this->db->join("programa pr","st.id_programa = pr.id");
		$this->db->join("aranceles_tramites atr","atr.id_tramites = tr.id");		
		$this->db->where_in("tr.id",$tramite);
		$this->db->where("st.id_usuario",$id_usuario);
		$this->db->where("tr.id_tipo_tramite",$tipo_tramite);
$this->db->where("st.status",1);
$this->db->where("atr.status",1);
//$this->db->where("r.pago_adicional",0);
		
		$resultados = $this->db->get();
	//	var_dump($this->db->queries);
		if ($resultados->num_rows() > 0) {
			return $resultados->result();
		}
		else{
			return false;
		}
	}
	public function getListaSolTramites_ruc($id_usuario,$tipo_tramite){
		$tramite=array(17,19);
        $this->db->select("st.*,r.*,st.id as id_solicitud,st.id_tramite as id_tramite, tr.*, atr.*, pr.*,pr.nombre as programa, tr.nombre as tramite,r.monto_apagar");
		$this->db->from("solicitud_tramite st");	
		$this->db->join("registro_pago r","r.id_solicitud_tramite = st.id",LEFT);
		$this->db->join("tramites tr","st.id_tramite = tr.id");
		$this->db->join("programa pr","st.id_programa = pr.id");
		$this->db->join("aranceles_tramites atr","atr.id_tramites = tr.id");		
		$this->db->where_in("tr.id",$tramite);
		$this->db->where("st.id_usuario",$id_usuario);
		$this->db->where("tr.id_tipo_tramite",$tipo_tramite);
$this->db->where("st.status",1);
$this->db->where("atr.status",1);
//$this->db->where("r.pago_adicional",0);
		
		$resultados = $this->db->get();
		//var_dump($this->db->queries);
		if ($resultados->num_rows() > 0) {
			return $resultados->result();
		}
		else{
			return false;
		}
	}
	public function getListaSolTramites_ruc_solicitud($id_usuario,$tipo_tramite){
		$tramite=array(28);
        $this->db->select("st.*,r.*,st.id as id_solicitud,st.id_tramite as id_tramite, tr.*, atr.*, pr.*,pr.nombre as programa, tr.nombre as tramite,r.monto_apagar");
		$this->db->from("solicitud_tramite st");	
		$this->db->join("registro_pago r","r.id_solicitud_tramite = st.id",LEFT);
		$this->db->join("tramites tr","st.id_tramite = tr.id");
		$this->db->join("programa pr","st.id_programa = pr.id");
		$this->db->join("aranceles_tramites atr","atr.id_tramites = tr.id");		
		$this->db->where_in("tr.id",$tramite);
		$this->db->where("st.id_usuario",$id_usuario);
		$this->db->where("tr.id_tipo_tramite",$tipo_tramite);
		$this->db->where("st.status",1);
		$this->db->where("atr.status",1);
	
		
		$resultados = $this->db->get();
		//stvar_dump($this->db->queries);
		if ($resultados->num_rows() > 0) {
			return $resultados->result();
		}
		else{
			return false;
		}
	}
	public function getListaSolTramites_rein_solicitud($id_usuario,$tipo_tramite){
		$tramite=array(16);
//$this->db->query("SET sql_mode=(SELECT REPLACE(@@sql_mode, 'ONLY_FULL_GROUP_BY', ''));");
        $this->db->select("st.*,r.*,st.id as id_solicitud,st.id_tramite as id_tramite,st.fecha_solicitud, tr.*, atr.*, pr.*,pr.nombre as programa, tr.nombre as tramite,r.monto_apagar");
		$this->db->from("solicitud_tramite st");	
		$this->db->join("registro_pago r","r.id_solicitud_tramite = st.id",LEFT);
		$this->db->join("tramites tr","st.id_tramite = tr.id");
		$this->db->join("programa pr","st.id_programa = pr.id");
		$this->db->join("aranceles_tramites atr","atr.id_tramites = tr.id");		
		$this->db->where_in("tr.id",$tramite);
		$this->db->where("st.id_usuario",$id_usuario);
		$this->db->where("tr.id_tipo_tramite",$tipo_tramite);
		$this->db->where("st.status",1);
		$this->db->where("atr.status",1);
		//$this->db->group_by("st.fecha_solicitud");
//$this->db->where("r.pago_adicional",0);
		
		$resultados = $this->db->get();
		//var_dump($this->db->queries);
		if ($resultados->num_rows() > 0) {
			return $resultados->result();
		}
		else{
			return false;
		}
	}
	public function tramite_sinpago($id_usuario,$id_solicitud){
		$this->db->query("SET sql_mode=(SELECT REPLACE(@@sql_mode, 'ONLY_FULL_GROUP_BY', ''));");
        $this->db->select("st.*,st.id as id_solicitud,st.id_tramite as tramite,tr.*, atr.*,es.id as id_estudiante,pr.nombre as programa");
		$this->db->from("solicitud_tramite st");	
		$this->db->join("tramites tr","st.id_tramite = tr.id");
		$this->db->join("aranceles_tramites atr","atr.id_tramites = tr.id");
		$this->db->join("programa pr","st.id_programa = pr.id");
		$this->db->join("estudiante es","es.id_usuario = st.id_usuario");
		$this->db->where("st.id_usuario",$id_usuario);
		$this->db->where("st.id",$id_solicitud);
		$this->db->where("st.reg_pago",0);
		$this->db->where("st.rev_academica",0);
$this->db->where("st.status",1);
$this->db->where("atr.status",1);

		///	var_dump($this->db->queries);
		$resultados = $this->db->get();
		if ($resultados->num_rows() > 0) {
			return $resultados->result();
		} 
		else{
			return false;
		}
	}
	public function tramite_conpago($id_usuario,$id_solicitud){
		$this->db->query("SET sql_mode=(SELECT REPLACE(@@sql_mode, 'ONLY_FULL_GROUP_BY', ''));");		
       	$this->db->select("st.*,st.id ,tr.*, atr.*,rp.*");
		$this->db->from("solicitud_tramite st");	
		$this->db->join("tramites tr","st.id_tramite = tr.id");
		$this->db->join("registro_pago rp","st.id =rp.id_solicitud_tramite ");
		$this->db->join("aranceles_tramites atr","atr.id_tramites = tr.id");
		$this->db->where("st.id_usuario",$id_usuario);
		$this->db->where("rp.id_solicitud_tramite",$id_solicitud);
		$this->db->where("rp.tramite",1);
		$this->db->where("st.reg_pago",1);	
		$this->db->where("st.status",1);		
		$resultados = $this->db->get();
		//var_dump($this->db->queries);
		if ($resultados->num_rows() > 0) {
			return true;
		}
		else{
			return false;
		}
	}

	public function getSolicitud($id_solicitud){
        $this->db->select("st.*,st.id_tramite as id_tramite");
		$this->db->from("solicitud_tramite st");			
		$this->db->join("tramites tr","st.id_tramite = tr.id");	
		$this->db->join("programa pr","st.id_programa = pr.id");
		$this->db->where("st.id",$id_solicitud);
$this->db->where("st.status",1);
		//	var_dump($this->db->queries);
		$resultados = $this->db->get();
		if ($resultados->num_rows() > 0) {
			return $resultados->row();
		}
		else{
			return false;
		}
	}
	public function getSolicitud_retiro($id_solicitud,$id_programa){ //nuevo 09-2026
        $this->db->select("st.*,st.id_tramite as id_tramite");
		$this->db->from("solicitud_tramite st");			
		$this->db->join("tramites tr","st.id_tramite = tr.id");	
		$this->db->join("programa pr","st.id_programa = pr.id");
		$this->db->where("st.id",$id_solicitud);
		$this->db->where("st.id_programa",$id_programa);
$this->db->where("st.status",1);
			
		$resultados = $this->db->get();
		//var_dump($this->db->queries);
		if ($resultados->num_rows() > 0) {
			return $resultados->row();
		}
		else{
			return false;
		}
	}
	public function getdatosolicitud($id_solicitud){
        $this->db->select("st.*,tr.nombre as tramite , st.id_programa,pr.nombre as programa,st.id as id_solicitud, tr.id as id_tramite");
		$this->db->from("solicitud_tramite st");	
		$this->db->join("tramites tr","st.id_tramite = tr.id");	
		$this->db->join("programa pr","st.id_programa = pr.id");
		$this->db->where("st.id",$id_solicitud);
		$this->db->where("st.status",1);
//			var_dump($this->db->queries);
		$resultados = $this->db->get();
		if ($resultados->num_rows() > 0) {
			return $resultados->result();
		}
		else{
			return false;
		}
	}

	
	public function VerificarSolicitud($id_usuario,$id_tramite,$id_programa){
        $this->db->select("st.*,tr.nombre as tramite,pr.nombre as programa");
		$this->db->from("solicitud_tramite st");	
		$this->db->join("tramites tr","st.id_tramite = tr.id");	
		$this->db->join("programa pr","st.id_programa = pr.id");
		$this->db->where("st.id_usuario",$id_usuario);
		$this->db->where("st.id_tramite",$id_tramite);
		$this->db->where("st.id_programa",$id_programa);
$this->db->where_not_in("st.id_tramite",array(22,23,24,25,26,27,16));
$this->db->where_in("st.rev_academica",array(1,2,0));
$this->db->where("st.status",1);
//			var_dump($this->db->queries);
		$resultados = $this->db->get();
		if ($resultados->num_rows() > 0) {
			return true;
		}
		else{
			return false;
		}
	}
	public function VerificarSolicitud_defensa($id_usuario,$id_tramite,$id_programa){
		$año= date('Y');
        $this->db->select("st.*,tr.nombre as tramite,pr.nombre as programa");
		$this->db->from("solicitud_tramite st");	
		$this->db->join("tramites tr","st.id_tramite = tr.id");	
		$this->db->join("programa pr","st.id_programa = pr.id");
		$this->db->where("st.id_usuario",$id_usuario);
		$this->db->where_in("st.id_tramite",$id_tramite);
		$this->db->where("st.id_programa",$id_programa);

		$this->db->where('YEAR(st.fecha_solicitud)', $año);
		$this->db->where("st.status",1);
		$this->db->where("st.reg_pago",1);
		$this->db->where("st.rev_academica",1);
			
		$resultados = $this->db->get();
		//var_dump($this->db->queries);
		if ($resultados->num_rows() > 0) {
			return true;
		}
		else{
			return false;
		}
	}
	public function VerificarSolicitud_defensa_sin_pago($id_usuario,$id_tramite,$id_programa){
		$año= date('Y');
        $this->db->select("st.*,tr.nombre as tramite,pr.nombre as programa");
		$this->db->from("solicitud_tramite st");	
		$this->db->join("tramites tr","st.id_tramite = tr.id");	
		$this->db->join("programa pr","st.id_programa = pr.id");
		$this->db->where("st.id_usuario",$id_usuario);
		$this->db->where_in("st.id_tramite",$id_tramite);
		$this->db->where("st.id_programa",$id_programa);

		$this->db->where('YEAR(st.fecha_solicitud)', $año);
		$this->db->where("st.status",1);
		$this->db->where("st.reg_pago",0);
		$this->db->where("st.rev_academica",0);
			
		$resultados = $this->db->get();
		//var_dump($this->db->queries);
		if ($resultados->num_rows() > 0) {
			return true;
		}
		else{
			return false;
		}
	}
	public function save($data){
	//	var_dump($data);
	//	return
		
		//var_dump($this->db->queries);
	
		return $this->db->insert("solicitud_tramite",$data);
		
	}
	public function saveRuc($data){

		if(empty($data)){
			return false;
		}
		
		$result = $this->db->insert('solicitud_tramite', $data);
		
		if($result){

			return $this->db->insert_id();
		} else {
			//log_message('error', 'Error al insertar solicitud RUC: ' . $this->db->last_query());
			return false;
	 
	
	   }
	}
	
	public function getdatosolicitud_revision($id_solicitud){
        $this->db->select("st.*,tr.nombre as tramite , st.id_programa,pr.nombre as programa,st.id as id_solicitud, tr.id as id_tramite");
		$this->db->from("solicitud_tramite st");	
		$this->db->join("tramites tr","st.id_tramite = tr.id");	
		$this->db->join("programa pr","st.id_programa = pr.id");
		$this->db->where("st.id",$id_solicitud);
		$this->db->where("st.status",1);
//			var_dump($this->db->queries);
		$resultados = $this->db->get();
		if ($resultados->num_rows() > 0) {
			return $resultados->row();
		}
		else{
			return false;
		}
	}


	public function update($id_solicitud,$data){
	
		//var_dump($data);
		$this->db->where("id",$id_solicitud);
		return $this->db->update("solicitud_tramite",$data);
	}
	
	public function getRetiro_Voluntarios_Vigentes(){
		$this->db->query("SET sql_mode=(SELECT REPLACE(@@sql_mode, 'ONLY_FULL_GROUP_BY', ''));");
        $this->db->select("st.*,st.id as id_solicitud,mp.rev_academica,mp.retiro,mp.sol_retiro,tr.nombre as tramite,pr.nombre as programa,
		es.cedula as cedula_est,es.nombre_primer as pri_nombre,
		es.nombre_segundo as seg_nombre,es.apellido_primer as pri_apellido,es.apellido_segundo as seg_apellido,es.correo,u.rol_id,oa.modalidad,p.nombre as periodo");
		$this->db->from("solicitud_tramite st");		
	
		$this->db->join("tramites tr","st.id_tramite = tr.id");	
		$this->db->join("programa pr","st.id_programa = pr.id");
		$this->db->join("usuarios u","st.id_usuario = u.id");
		$this->db->join("estudiante es","st.id_usuario = es.id_usuario");
		$this->db->join("materias_preinscritas mp","mp.id_usuario = st.id_usuario");
		$this->db->join("oferta_academica oa","oa.id = mp.id_oferta_academica");
		$this->db->join("periodo p","oa.id_periodo = p.id");
		
		$this->db->where("st.id_tramite",3);
		$this->db->where("st.rev_academica",0);
		$this->db->where("mp.sol_retiro",1);
		$this->db->where("mp.retiro",0);
		$this->db->where("mp.nenabled",1);
		$this->db->where("p.status",1);
$this->db->where("st.status",1);
	$this->db->GROUP_BY("st.id");
		//	var_dump($this->db->queries);
		$resultados = $this->db->get();
		if ($resultados->num_rows() > 0) {
			return $resultados->result();
		}
		else{
			return false;
		}
	}
	public function getRetiro_Voluntarios_aprobados(){
		$this->db->query("SET sql_mode=(SELECT REPLACE(@@sql_mode, 'ONLY_FULL_GROUP_BY', ''));");
        $this->db->select("st.*,st.id as id_solicitud,mp.rev_academica,mp.retiro,mp.sol_retiro,tr.nombre as tramite,pr.nombre as programa,
		pe.nombre as pensum,es.cedula as cedula_est,es.nombre_primer as pri_nombre,
		es.nombre_segundo as seg_nombre,es.apellido_primer as pri_apellido,es.apellido_segundo as seg_apellido,es.correo,u.rol_id,oa.modalidad,p.nombre as periodo");
		$this->db->from("solicitud_tramite st");		
	
		$this->db->join("tramites tr","st.id_tramite = tr.id");	
		$this->db->join("programa pr","st.id_programa = pr.id");
		$this->db->join("usuarios u","st.id_usuario = u.id");
		$this->db->join("estudiante es","st.id_usuario = es.id_usuario");
		$this->db->join("materias_preinscritas mp","mp.id_usuario = st.id_usuario");
		$this->db->join("oferta_academica oa","oa.id = mp.id_oferta_academica");
		$this->db->join("pensum pe","oa.id_pensum = pe.id");
		$this->db->join("periodo p","oa.id_periodo = p.id");
		
		$this->db->where("st.id_tramite",3);
		$this->db->where("st.rev_academica",1);
		$this->db->where("mp.sol_retiro",1);
		$this->db->where("mp.retiro",1);
		$this->db->where("mp.nenabled",1);
		$this->db->where("p.status",1);
$this->db->where("st.status",1);
		$this->db->group_by("mp.id_usuario");
		//	var_dump($this->db->queries);
		$resultados = $this->db->get();
		if ($resultados->num_rows() > 0) {
			return $resultados->result();
		}
		else{
			return false;
		}
	}
public function getRetiro_Voluntarios_solicitados(){
		$this->db->query("SET sql_mode=(SELECT REPLACE(@@sql_mode, 'ONLY_FULL_GROUP_BY', ''));");
        $this->db->select("st.*,st.id as id_solicitud,st.rev_academica as revision_solicitud,mp.rev_academica,mp.retiro,mp.sol_retiro,tr.nombre as tramite,pr.nombre as programa,
		pe.nombre as pensum,oa.horario,se.nombre as seccion,do.primer_nombre as nombre_docente,do.primer_apellido as apellido_docente,di.descripcion as dia_clase ,es.cedula as cedula_est,es.nombre_primer as pri_nombre,
		es.nombre_segundo as seg_nombre,es.apellido_primer as pri_apellido,es.apellido_segundo as seg_apellido,es.correo,
cc.descripcion as cod_cel, es.tel_celular,ch.descripcion as cod_hab, es.tel_habitacion,oa.modalidad,p.nombre as periodo,
u.rol_id");
		$this->db->from("solicitud_tramite st");		
	
		$this->db->join("tramites tr","st.id_tramite = tr.id");	
		
		$this->db->join("usuarios u","st.id_usuario = u.id");
		$this->db->join("estudiante es","st.id_usuario = es.id_usuario");
		$this->db->join("codigo_cel cc","cc.id = es.id_codigo_cel");
		$this->db->join("codigo_hab ch","ch.id = es.id_codigo_hab");
		$this->db->join("materias_preinscritas mp","mp.id_usuario = st.id_usuario");
		$this->db->join("oferta_academica oa","oa.id = mp.id_oferta_academica");
		$this->db->join("programa pr","oa.id_programa = pr.id");
		$this->db->join("pensum pe","oa.id_pensum = pe.id");
		$this->db->join("docente do","oa.id_docente = do.id");
		$this->db->join("dia_clase di","oa.id_dia_clase = di.id");
		$this->db->join("seccion se","oa.seccion = se.id");

		$this->db->join("periodo p","oa.id_periodo = p.id");
		
		$this->db->where("st.id_tramite",3);
		$this->db->where_in("st.rev_academica",array(1,2));
		$this->db->where("mp.sol_retiro",1);
		$this->db->where("mp.retiro",1);
		$this->db->where("mp.nenabled",1);
		$this->db->where("p.status",1);
$this->db->where("st.status",1);
	//	$this->db->group_by("mp.id_usuario");
		//	var_dump($this->db->queries);
		$resultados = $this->db->get();
		if ($resultados->num_rows() > 0) {
			return $resultados->result();
		}
		else{
			return false;
		}
	}
public function getRetiro_Voluntarios_sin_validar(){
		$this->db->query("SET sql_mode=(SELECT REPLACE(@@sql_mode, 'ONLY_FULL_GROUP_BY', ''));");
        $this->db->select("st.*,st.id as id_solicitud,st.rev_academica as revision_solicitud,mp.rev_academica,mp.retiro,mp.sol_retiro,tr.nombre as tramite,pr.nombre as programa,
		pe.nombre as pensum,oa.horario,se.nombre as seccion,do.primer_nombre as nombre_docente,do.primer_apellido as apellido_docente,di.descripcion as dia_clase ,es.cedula as cedula_est,es.nombre_primer as pri_nombre,
		es.nombre_segundo as seg_nombre,es.apellido_primer as pri_apellido,es.apellido_segundo as seg_apellido,es.correo,
cc.descripcion as cod_cel, es.tel_celular,ch.descripcion as cod_hab, es.tel_habitacion,oa.modalidad,p.nombre as periodo,
u.rol_id");
		$this->db->from("solicitud_tramite st");		
	
		$this->db->join("tramites tr","st.id_tramite = tr.id");	
		
		$this->db->join("usuarios u","st.id_usuario = u.id");
		$this->db->join("estudiante es","st.id_usuario = es.id_usuario");
		$this->db->join("codigo_cel cc","cc.id = es.id_codigo_cel");
		$this->db->join("codigo_hab ch","ch.id = es.id_codigo_hab");
		$this->db->join("materias_preinscritas mp","mp.id_usuario = st.id_usuario");
		$this->db->join("oferta_academica oa","oa.id = mp.id_oferta_academica");
		$this->db->join("programa pr","oa.id_programa = pr.id");
		$this->db->join("pensum pe","oa.id_pensum = pe.id");
		$this->db->join("docente do","oa.id_docente = do.id");
		$this->db->join("dia_clase di","oa.id_dia_clase = di.id");
		$this->db->join("seccion se","oa.seccion = se.id");

		$this->db->join("periodo p","oa.id_periodo = p.id");
		
		$this->db->where("st.id_tramite",3);
		$this->db->where_in("st.rev_academica",array(0));
		$this->db->where("mp.sol_retiro",1);
		$this->db->where("mp.retiro",0);
		$this->db->where("mp.nenabled",1);
		$this->db->where("p.status",1);
$this->db->where("st.status",1);
	//	$this->db->group_by("mp.id_usuario");
		//	var_dump($this->db->queries);
		$resultados = $this->db->get();
		if ($resultados->num_rows() > 0) {
			return $resultados->result();
		}
		else{
			return false;
		}
	}
	public function getRetiro_Voluntarios_periodo($id_periodo){
		$this->db->query("SET sql_mode=(SELECT REPLACE(@@sql_mode, 'ONLY_FULL_GROUP_BY', ''));");
        $this->db->select("st.*,st.id as id_solicitud,st.rev_academica as revision_solicitud,mp.retiro,mp.sol_retiro,tr.nombre as tramite,pr.nombre as programa,
		pe.nombre as pensum,oa.horario,se.nombre as seccion,do.primer_nombre as nombre_docente,do.primer_apellido as apellido_docente,di.descripcion as dia_clase ,es.cedula as cedula_est,es.nombre_primer as pri_nombre,
		es.nombre_segundo as seg_nombre,es.apellido_primer as pri_apellido,es.apellido_segundo as seg_apellido,es.correo,
cc.descripcion as cod_cel, es.tel_celular,ch.descripcion as cod_hab, es.tel_habitacion,oa.modalidad,p.nombre as periodo,u.rol_id");
		$this->db->from("solicitud_tramite st");		
	
		$this->db->join("tramites tr","st.id_tramite = tr.id");	
		$this->db->join("programa pr","st.id_programa = pr.id");
		$this->db->join("usuarios u","st.id_usuario = u.id");
		$this->db->join("estudiante es","st.id_usuario = es.id_usuario");
		$this->db->join("codigo_cel cc","cc.id = es.id_codigo_cel");
		$this->db->join("codigo_hab ch","ch.id = es.id_codigo_hab");
		$this->db->join("materias_preinscritas mp","mp.id_usuario = st.id_usuario");
		$this->db->join("oferta_academica oa","oa.id = mp.id_oferta_academica");
		$this->db->join("pensum pe","oa.id_pensum = pe.id");
		$this->db->join("docente do","oa.id_docente = do.id");
		$this->db->join("dia_clase di","oa.id_dia_clase = di.id");
		$this->db->join("seccion se","oa.seccion = se.id");
		$this->db->join("periodo p","oa.id_periodo = p.id");		
		$this->db->where("st.id_tramite",3);
		$this->db->where_in("st.rev_academica",array(1,2));
		$this->db->where("mp.sol_retiro",1);
		//$this->db->where("mp.retiro",1);
		$this->db->where("mp.nenabled",1);
		$this->db->where("p.id",$id_periodo);
$this->db->where("st.status",1);
	//	$this->db->group_by("mp.id_usuario");
			
		$resultados = $this->db->get();
//var_dump($this->db->queries);
		if ($resultados->num_rows() > 0) {
			return $resultados->result();
		}
		else{
			return false;
		}
	}
	public function getTramites_por_validar(){
		$tramite=array(18);
				$this->db->select("st.*,st.id as id_solicitud,tr.nombre as tramite,pr.nombre as programa,
				es.cedula as cedula_est,es.nombre_primer as pri_nombre,
				es.nombre_segundo as seg_nombre,es.apellido_primer as pri_apellido,
				es.apellido_segundo as seg_apellido,es.correo,u.rol_id,rp.academico, rp.conciliado");
				$this->db->from("solicitud_tramite st");		
				$this->db->join("registro_pago rp","st.id =rp.id_solicitud_tramite ");
				$this->db->join("tramites tr","st.id_tramite = tr.id");	
				$this->db->join("programa pr","st.id_programa = pr.id");
				$this->db->join("usuarios u","st.id_usuario = u.id");
				$this->db->join("estudiante es","st.id_usuario = es.id_usuario");
				$this->db->join("periodo p","rp.id_periodo = p.id");		
				$this->db->where("st.reg_pago",1);
				$this->db->where("st.rev_academica",0);
				$this->db->where("rp.conciliado",1);
				$this->db->where("rp.academico",0);
				$this->db->where("rp.status",1);
		$this->db->where_not_in("tr.id",$tramite);
				//$this->db->where("p.status",1);
		$this->db->where("st.status",1);
				//	var_dump($this->db->queries);
				$resultados = $this->db->get();
				if ($resultados->num_rows() > 0) {
					return $resultados->result();
				}
				else{
					return false;
				}
			}
public function getListaSolTramites_reincorporacion(){
		$tramite=array(16);
        $this->db->select("st.*,r.*,st.id as id_solicitud,st.id_tramite as id_tramite, tr.*, st.id_usuario,
		es.cedula as cedula_est,es.nombre_primer as pri_nombre,
		es.nombre_segundo as seg_nombre,es.apellido_primer as pri_apellido,es.apellido_segundo as seg_apellido,es.correo,
cc.descripcion as cod_cel, es.tel_celular,ch.descripcion as cod_hab, es.tel_habitacion, u.rol_id,
		 pr.*,pr.nombre as programa, tr.nombre as tramite,r.academico,r.conciliado,r.monto_apagar,tri.nombre as trimestre,
		 lt.lugar_trabajo, en.estado as domicilio");
		$this->db->from("solicitud_tramite st");	
		$this->db->join("registro_pago r","r.id_solicitud_tramite = st.id");
		$this->db->join("usuarios u","st.id_usuario = u.id");
		$this->db->join("estudiante es","st.id_usuario = es.id_usuario");
		$this->db->join("codigo_cel cc","cc.id = es.id_codigo_cel");
		$this->db->join("codigo_hab ch","ch.id = es.id_codigo_hab");
		$this->db->join("tramites tr","st.id_tramite = tr.id");
		$this->db->join("trimestre tri","st.ult_trimestre_cursado = tri.id");
		$this->db->join("periodo p","r.id_periodo = p.id");	
		$this->db->join("direccion d","d.id_usuario = st.id_usuario");	
		$this->db->join("estado en","en.id = d.id_estado");	
		$this->db->join("trabajo t","t.id_usuario = st.id_usuario");	
		$this->db->join("lugar_trabajo lt","lt.id = t.id_lugar_trabajo");			
		$this->db->join("programa pr","st.id_programa = pr.id");		
		$this->db->where_in("tr.id",$tramite);
		$this->db->where_in("st.rev_academica",array(1,2));
		$this->db->where("p.status",1);
		$this->db->where("t.actual",1);
$this->db->where("st.status",1);
		$resultados = $this->db->get();
		//var_dump($this->db->queries);
		if ($resultados->num_rows() > 0) {
			return $resultados->result();
		}
		else{
			return false;
		}
	}
	public function getListaSolTramites_reincorporacion_periodo($id_periodo){
		$tramite=array(16);
        $this->db->select("st.*,r.*,st.id as id_solicitud,st.id_tramite as id_tramite, tr.*, st.id_usuario,
		es.cedula as cedula_est,es.nombre_primer as pri_nombre,
		es.nombre_segundo as seg_nombre,es.apellido_primer as pri_apellido,es.apellido_segundo as seg_apellido,es.correo,
cc.descripcion as cod_cel, es.tel_celular,ch.descripcion as cod_hab, es.tel_habitacion, u.rol_id,
		 pr.*,pr.nombre as programa, tr.nombre as tramite,r.academico,r.conciliado,tri.nombre as trimestre");
		$this->db->from("solicitud_tramite st");	
		$this->db->join("registro_pago r","r.id_solicitud_tramite = st.id");
		$this->db->join("usuarios u","st.id_usuario = u.id");
		$this->db->join("estudiante es","st.id_usuario = es.id_usuario");
		$this->db->join("codigo_cel cc","cc.id = es.id_codigo_cel");
		$this->db->join("codigo_hab ch","ch.id = es.id_codigo_hab");
		$this->db->join("tramites tr","st.id_tramite = tr.id");
		$this->db->join("trimestre tri","st.ult_trimestre_cursado = tri.id");
		
		$this->db->join("programa pr","st.id_programa = pr.id");
		
		$this->db->where_in("tr.id",$tramite);
		$this->db->where("r.id_periodo",$id_periodo);
		$this->db->where_in("st.rev_academica",array(1,2));
$this->db->where("st.status",1);
	
		
		
		$resultados = $this->db->get();
	//	var_dump($this->db->queries);
		if ($resultados->num_rows() > 0) {
			return $resultados->result();
		}
		else{
			return false;
		}
	}
public function getListaSolTramites_constancias(){
		$tramite=array(22,24);
        $this->db->select("st.*,r.*,st.id as id_solicitud,st.id_tramite as id_tramite, tr.*, st.id_usuario,
		es.cedula as cedula_est,es.nombre_primer as pri_nombre,
		es.nombre_segundo as seg_nombre,es.apellido_primer as pri_apellido,es.apellido_segundo as seg_apellido,es.correo,
cc.descripcion as cod_cel, es.tel_celular,ch.descripcion as cod_hab, es.tel_habitacion, u.rol_id,
		 pr.*,pr.nombre as programa, tr.nombre as tramite,r.academico,r.conciliado,r.monto_apagar,cdoc.nro_constancia,r.dactualizo");
		$this->db->from("solicitud_tramite st");	
		$this->db->join("registro_pago r","r.id_solicitud_tramite = st.id");
		$this->db->join("usuarios u","st.id_usuario = u.id");
		$this->db->join("estudiante es","st.id_usuario = es.id_usuario");
		$this->db->join("codigo_cel cc","cc.id = es.id_codigo_cel");
		$this->db->join("codigo_hab ch","ch.id = es.id_codigo_hab");
		$this->db->join("tramites tr","st.id_tramite = tr.id");		
		$this->db->join("periodo p","r.id_periodo = p.id");	
		$this->db->join("control_doctramite cdoc","cdoc.id_usuario= st.id_usuario",LEFT);	
		
		$this->db->join("programa pr","st.id_programa = pr.id");	
		$this->db->where_in("tr.id",$tramite);
		$this->db->where_in("st.rev_academica",array(1,2));
		$this->db->where("p.status",1);
		$this->db->where("st.status",1);
		
		$resultados = $this->db->get();
		//var_dump($this->db->queries);
		if ($resultados->num_rows() > 0) {
			return $resultados->result();
		}
		else{
			return false;
		}
	}
	

public function getconstancias_trimestre(){
		$tramite=array(22,24);
		$this->db->query("SET sql_mode=(SELECT REPLACE(@@sql_mode, 'ONLY_FULL_GROUP_BY', ''));");	
        $this->db->select("st.*,r.*,st.id as id_solicitud,st.id_tramite as id_tramite, tr.*, st.id_usuario,
		es.cedula as cedula_est,es.nombre_primer as pri_nombre,
		es.nombre_segundo as seg_nombre,es.apellido_primer as pri_apellido,es.apellido_segundo as seg_apellido,es.correo,
cc.descripcion as cod_cel, es.tel_celular,ch.descripcion as cod_hab, es.tel_habitacion, u.rol_id,
		 pr.*,pr.nombre as programa, tr.nombre as tramite,r.academico,r.conciliado,r.monto_apagar,cdoc.nro_constancia,r.dactualizo,mp.id,oa.trimestre,p.nombre as periodo");
		$this->db->from("solicitud_tramite st");	
		$this->db->join("registro_pago r","r.id_solicitud_tramite = st.id");
		$this->db->join("usuarios u","st.id_usuario = u.id");
		$this->db->join("estudiante es","st.id_usuario = es.id_usuario");
		$this->db->join("codigo_cel cc","cc.id = es.id_codigo_cel");
		$this->db->join("codigo_hab ch","ch.id = es.id_codigo_hab");
		$this->db->join("tramites tr","st.id_tramite = tr.id");		
		$this->db->join("materias_preinscritas mp","mp.id_usuario = st.id_usuario");	
		$this->db->join("oferta_academica oa","mp.id_oferta_academica = oa.id");
		$this->db->join("periodo p","oa.id_periodo = p.id");	
		$this->db->join("control_doctramite cdoc","cdoc.id_usuario= st.id_usuario",left);	
		
		$this->db->join("programa pr","st.id_programa = pr.id");	
	
		$this->db->where_in("tr.id",$tramite);
		$this->db->where_in("st.rev_academica",array(1,2));
		$this->db->where("p.status",1);
		
		$this->db->where("mp.status",1);
$this->db->where("st.status",1);
		$this->db->group_by("st.id_usuario,oa.trimestre`");
		$resultados = $this->db->get();
		//var_dump($this->db->queries);
		if ($resultados->num_rows() > 0) {
			return $resultados->result();
		}
		else{
			return false;
		}
	}
	public function getSolicitud_Egreso_Vigentes(){
		$this->db->query("SET sql_mode=(SELECT REPLACE(@@sql_mode, 'ONLY_FULL_GROUP_BY', ''));");
        $this->db->select("st.*,st.id as id_solicitud,tr.nombre as tramite,pr.nombre as programa,
		u.rol_id,es.cedula as cedula_est,es.nombre_primer as pri_nombre,
		es.nombre_segundo as seg_nombre,es.apellido_primer as pri_apellido,es.apellido_segundo as seg_apellido,es.correo");
		$this->db->from("solicitud_tramite st");	
		$this->db->join("registro_pago r","r.id_solicitud_tramite = st.id");
		$this->db->join("usuarios u","st.id_usuario = u.id");	
		$this->db->join("tramites tr","st.id_tramite = tr.id");	
		$this->db->join("programa pr","st.id_programa = pr.id");
		$this->db->join("estudiante es","st.id_usuario = es.id_usuario");			
		$this->db->where("st.id_tramite",18);
		$this->db->where("r.conciliado",1);
		$this->db->where("st.rev_academica",0);	
		$this->db->where("st.status",1);
		$resultados = $this->db->get();
	//	var_dump($this->db->queries);
		if ($resultados->num_rows() > 0) {
			return $resultados->result();
		}
		else{
			return false;
		}
	}
	public function getListaSolTramites_egresos_validados(){
		$tramite=array(18);
$this->db->query("SET sql_mode=(SELECT REPLACE(@@sql_mode, 'ONLY_FULL_GROUP_BY', ''));");	
        $this->db->select("st.*,st.id as id_solicitud,st.id_tramite as id_tramite, tr.*, st.id_usuario,
		es.cedula as cedula_est,es.nombre_primer as pri_nombre,
		es.nombre_segundo as seg_nombre,es.apellido_primer as pri_apellido,es.apellido_segundo as seg_apellido,es.correo,
cc.descripcion as cod_cel, es.tel_celular,ch.descripcion as cod_hab, es.tel_habitacion, u.rol_id,
		 pr.*,pr.nombre as programa, tr.nombre as tramite,uv.nombres,
		 lt.lugar_trabajo, en.estado as domicilio");
		$this->db->from("solicitud_tramite st");	
	$this->db->join("registro_pago r","r.id_solicitud_tramite = st.id");
		$this->db->join("usuarios u","st.id_usuario = u.id");
		$this->db->join("estudiante es","st.id_usuario = es.id_usuario");
		$this->db->join("codigo_cel cc","cc.id = es.id_codigo_cel");
		$this->db->join("codigo_hab ch","ch.id = es.id_codigo_hab");
		$this->db->join("tramites tr","st.id_tramite = tr.id");		
		$this->db->join("direccion d","d.id_usuario = st.id_usuario");	
		$this->db->join("estado en","en.id = d.id_estado");	
		$this->db->join("trabajo t","t.id_usuario = st.id_usuario");	
		$this->db->join("lugar_trabajo lt","lt.id = t.id_lugar_trabajo");			
		$this->db->join("programa pr","st.id_programa = pr.id");
	$this->db->join("usuarios uv","uv.id = st.quien_actualizo");
$this->db->join("periodo p","r.id_periodo = p.id");		
		$this->db->where_in("tr.id",$tramite);
$this->db->where_in("st.reg_pago",1);	
		$this->db->where_in("st.rev_academica",array(1,2));		
		$this->db->where("p.status",1);
$this->db->where("t.actual",1);
$this->db->where("st.status",1);
$this->db->group_by("r.id_solicitud_tramite");
		$resultados = $this->db->get();
	//	var_dump($this->db->queries);
		if ($resultados->num_rows() > 0) {
			return $resultados->result();
		}
		else{
			return false;
		}
	}

public function getbuscarTramites_cedula($cedula){
		$this->db->select("st.*,st.id as id_solicitud,tr.*,  pr.*,pr.nombre as programa, tr.nombre as tramites, es.*,r.*,pe.nombre as periodo_conciliacion");
		$this->db->from("solicitud_tramite st");	
		$this->db->join("estudiante es","st.id_usuario = es.id_usuario");
		$this->db->join("registro_pago r","r.id_solicitud_tramite = st.id",LEFT);
		$this->db->join("tramites tr","st.id_tramite = tr.id");
		$this->db->join("programa pr","st.id_programa = pr.id");	
		$this->db->join("periodo pe","r.id_periodo = pe.id",LEFT);		
		$this->db->where("es.cedula",$cedula);		
		$this->db->where("st.status",1);
			
		$resultados = $this->db->get();
	//	var_dump($this->db->queries);
		if ($resultados->num_rows() > 0) {
			return $resultados->result();
		}
		else{
			return false;
		}
	}
}
?>
