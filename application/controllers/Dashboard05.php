<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard05 extends CI_Controller { //controlador Supervisor Control de estudios

	public function __construct(){
		parent::__construct();
		$this->load->model("Usuarios_model");
		$this->load->model("Banco_model");
		$this->load->model("Registro_pago_model");
		$this->load->model("Alumno_model");
		$this->load->model("Trabajo_model");
		$this->load->model("Oferta_academica_model");
		$this->load->model("Materias_preinscrita_model");
		$this->load->model("Periodo_model");
		$this->load->model("Lugar_trabajo_model");
		$this->load->model("Aspirantes_model");
		//
		$this->load->model("Inscripcion_model");
		$this->load->model("Pensum_model");
		$this->load->model("Programa_model");
		$this->load->model("Trimestre_model");
		$this->load->model("Docente_model");
		$this->load->model("Estado_model"); 
		$this->load->model("Municipio_model");
		$this->load->model("Parroquia_model");
		$this->load->model("Direccion_model");	
		$this->load->model("Trabajo_model");
		$this->load->model("Banco_model");
		$this->load->model("Registro_pago_model");
		$this->load->model("Seccion_model");
		$this->load->model("Tiempo_preinscripcion_model");
		$this->load->model("Estado_civil_model");
		$this->load->model("Sexo_model");
		$this->load->model("Codigo_tel_model");
	   	$this->load->model("Reincorporaciones_model");
		$this->load->model("Control_requisitos_model");

    $this->load->model("Academico_model");

		$this->load->model("No_conducente_model");	
		$this->load->model("De_ser_admitido_model");	

		if (!$this->session->userdata("login")) {
			redirect(base_url());
		}
	}

	public function index()
	{
		$id_usuario = $this->session->userdata("id");
		$id_periodo_act = $this->Periodo_model->PeriodoActivo();
		$id_periodo_asp = $this->Periodo_model->PeriodoActivo_asp();
		 $id_periodo=array($id_periodo_act->id,$id_periodo_asp->id );
		$data = array(
		'listado' => $this->Registro_pago_model->getRegistro_Pago( $id_periodo),
		'url'	  =>'index'
		);
		//var_dump($data);
		$this->load->view('layouts/header');
		$this->load->view('layouts/sidebar');
		$this->load->view('admin/administrador/list',$data);
		$this->load->view('layouts/footer');
	}

	public function exportar_excel() { //pendiente por conciliar inscripciones
		// Cargar modelos
		$this->load->model('Periodo_model');
		$this->load->model('Registro_pago_model');
		
		// Obtener períodos activos
		$id_periodo_act = $this->Periodo_model->PeriodoActivo();
		$id_periodo_asp = $this->Periodo_model->PeriodoActivo_asp();
		
		// Crear array solo con IDs válidos
		$id_periodo = array();
		
		if($id_periodo_act && isset($id_periodo_act->id)) {
			$id_periodo[] = $id_periodo_act->id;
		}
		
		if($id_periodo_asp && isset($id_periodo_asp->id)) {
			$id_periodo[] = $id_periodo_asp->id;
		}
		
		// Verificar que hay períodos válidos
		if(empty($id_periodo)) {
			$this->session->set_flashdata('error', 'No hay períodos activos para exportar');
			redirect('dashboard05');
		}
		
		// Obtener los datos del reporte
		$listado = $this->Registro_pago_model->get_datos_excel($id_periodo);
		
		// Verificar si hay datos
		if(empty($listado)) {
			$this->session->set_flashdata('error', 'No hay datos para exportar');
			redirect('dashboard05');
		}
		
		$data = array(
			'listado' => $listado,
			'nombre_archivo' => 'LISTADO_PENDIENTES_POR_CONCILIAR_' . date('Y-m-d')
		);
		
		$this->load->view('admin/administrador/excel_pendientes_conciliar_inscripciones', $data);
	}
	public function exportar_excel_conciliados() {
		// Obtener períodos activos
		$id_periodo_act = $this->Periodo_model->PeriodoActivo();
		$id_periodo_asp = $this->Periodo_model->PeriodoActivo_asp();
		
		// Crear array solo con IDs válidos
		$id_periodo = array();
		
		if($id_periodo_act && isset($id_periodo_act->id)) {
			$id_periodo[] = $id_periodo_act->id;
		}
		
		if($id_periodo_asp && isset($id_periodo_asp->id)) {
			$id_periodo[] = $id_periodo_asp->id;
		}
		
		// Verificar que hay períodos válidos
		if(empty($id_periodo)) {
			$this->session->set_flashdata('error', 'No hay períodos activos para exportar');
			redirect('dashboard05/');
		}
		
		// Obtener los datos del reporte
		$resultado = $this->Registro_pago_model->get_datos_excel_conciliados($id_periodo);
		var_dump($resultado);
		// Verificar si hay datos
		if(empty($resultado->datos)) {
			$this->session->set_flashdata('error', 'No hay datos para exportar');
			redirect('dashboard05/');
		}
		
		$data = array(
			'listado' => $resultado->datos,
			'estadisticas' => $resultado->estadisticas,  
			'nombre_archivo' => 'LISTADO_conciliaciones_' . date('Y-m-d')
		);
		
		$this->load->view('admin/administrador/excel_conciliados_inscripciones', $data);
	}

public function index_nuevo_ingreso()
	{
		$id_usuario = $this->session->userdata("id");
		$id_periodo_act = $this->Periodo_model->PeriodoActivo();

		$id_periodo=array($id_periodo_act->id );
		$data = array(
		'listado' => $this->Registro_pago_model->getRegistro_Pago_nuevo_proceso( $id_periodo),
		'url'	  =>'index'
		);
		//var_dump($data);
		$this->load->view('layouts/header');
		$this->load->view('layouts/sidebar');
		$this->load->view('supervisor/consultas/listado_por_conciliar',$data);
		$this->load->view('layouts/footer');
	}
public function excel_nuevo_ingreso()
	{
		$id_usuario = $this->session->userdata("id");
		$id_periodo_act = $this->Periodo_model->PeriodoActivo();

		$id_periodo=array($id_periodo_act->id );
		$data = array(
		'listado' => $this->Registro_pago_model->getRegistro_Pago_nuevo_proceso_excel( $id_periodo),		
		);
		//var_dump($data);	
		$this->load->view('supervisor/consultas/excel_listado_por_conciliar',$data);
	
	}
	/*actualizado 30-03-2022*/
public function pago_adicional()
	{
		$id_usuario = $this->session->userdata("id");
		$id_periodo_act = $this->Periodo_model->PeriodoActivo();
		$id_periodo_asp = $this->Periodo_model->PeriodoActivo_asp();
		$id_periodo=array($id_periodo_act->id,$id_periodo_asp->id );
		$data = array(
		'listado' => $this->Registro_pago_model->getRegistro_Pago_adicional($id_periodo),		
		);
		//var_dump($data);
		$this->load->view('layouts/header');
		$this->load->view('layouts/sidebar');
		$this->load->view('admin/administrador/list_pago_adicional',$data);
		$this->load->view('layouts/footer');
	}	

		/*actualizado 30-03-2022*/
public function registro_pago_adicional($id,$aspirante)
	{
		$id_usuario = $id;
		$lugartrabajo = $this->Trabajo_model->Lugar_trabajo($id_usuario);
if($aspirante==1){
			$periodo= $this->Periodo_model->PeriodoActivo_asp();
		}else{
			$periodo= $this->Periodo_model->PeriodoActivo();
		}
		//var_dump($periodo);
		$data = array(			
			'estado_estudio' => $this->Trabajo_model->getListaTrabajo($id_usuario,1),
			'datos_alumno' => $this->Alumno_model->getListaAlumno($id_usuario),			
			'lista_trabajo' =>$this->Lugar_trabajo_model->valor_unidad($lugartrabajo->id_lugar_trabajo),
			'list_banco' => $this->Banco_model->getBanco(),
			'rol_alumno'=>$this->Usuarios_model->buscar_usuario($id_usuario),
			'periodo' => $periodo,
			'unidad_credito' => $this->Registro_pago_model->ConciliacionPago($id_usuario,$periodo->id),
			);
			$data2 = array(
			'tiempo_pre' => $this->Tiempo_preinscripcion_model->gettiempo_preinscripcion(),
			);
		//var_dump($data);
		$this->load->view('layouts/header');
		$this->load->view('layouts/sidebar');
		$this->load->view('admin/administrador/registro_pago_adicional',$data);
		$this->load->view('layouts/footer');
	}	
	/*actualizado 30-03-2022*/
public function store_pago_adicional()
	{

		$fecha=date('Y-m-d_H-i');
		$id_usuario_session = $this->input->post("id_usuario_sesion");
		$id_usuario = $this->input->post("id_usuario");
		$id_banco = $this->input->post("id_banco");
		$id_estado_estudio = $this->input->post("id_estado_estudio");
		$id_estudiante = $this->input->post("id_estudiante");
		$cedula = $this->input->post("cod_nacionalidad").$this->input->post("cedula");
		$nro_referencia = $this->input->post("nro_referencia");
		$fecha_transferencia = $this->input->post("fecha_transferencia");
		$monto_pagar = $this->input->post("total_pagar");
		$monto_depositado = $this->input->post("monto");
		$postgrado = $this->input->post("postgrado");
		

		$id_periodo = $this->input->post("id_periodo");
		$academico=$this->input->post("academico");
		if($this->input->post("rol_usuario")==7)$aspirante='1';
		if($this->input->post("rol_usuario")==5 or $this->input->post("rol_usuario")==8)$aspirante='0';

		$unidad_credito = $this->input->post("unidad_credito");/* ojo  galta buscar la unidades de credito que inscribio para poder hacer el regtro de paogo adicional/**/
		

		
		
		$data  = array(
			'id_usuario' => $id_usuario, 
			'id_banco' => $id_banco,
			'cedula' => $cedula,
			'id_estudiante' => $id_estudiante,
			'id_estado_estudio' => $id_estado_estudio,
			'nro_referencia' => $nro_referencia,
			'fecha_transferencia' => $fecha_transferencia,
			'monto_apagar' => $monto_depositado,
			'monto_depositado' => $monto_depositado,
			'postgrado' => $postgrado,
			'uc' => $unidad_credito,
			'id_periodo' => $id_periodo,
			'status' => 1,
			'aspirante'=>$aspirante,
			'dregistro'=>$fecha,
			'quien_registro'=>$id_usuario_session,
			'pago_adicional'=> 1,
			//'academico'=> 1,

		);	
		//var_dump($data);	

			if ($this->Registro_pago_model->VerificarRegistro($id_usuario,$id_periodo)==true) {
			
		
				if ($this->Registro_pago_model->save($data)) {				
					redirect(base_url()."dashboard05/pago_adicional");
				}
				else{
					$this->session->set_flashdata("error","No se pudo guardar la informacion");
					redirect(base_url()."dashboard05/registro_pago_adicional/".$id_usuario);
				}
			}
	}

public function postgrado($id,$aspirante)//ver postgrados simon sin conciliar pago
	{
		$id_usuario = $id;
		$id_periodo = $this->Periodo_model->PeriodoActivo($id_usuario);
		$id_programa=$this->Usuarios_model->buscar_usuario($id);
 $url=$this->uri->segment(5);
		//getProgramaAprobado($id)
		//var_dump($id_programa);
		if($aspirante=='1'){

			$data = array(
			'listado' => $this->Programa_model->getProgramaAprobado($id_programa->programa_id),
			'alumno' => $this->Alumno_model->getListaAlumno($id_usuario),

		);
			$this->load->view('layouts/header');
			$this->load->view('layouts/sidebar');
			$this->load->view('admin/administrador/ver_postgrados_aspirante',$data,$id_programa);
			$this->load->view('layouts/footer');
		}else{
			$data = array(
			'listado' => $this->Registro_pago_model->ver_postgrado_alumno($id_usuario,$id_periodo->id),
			'reincorporaciones'=>$this->Reincorporaciones_model->buscar_reincorporacion($id_usuario,$id_periodo->id),
			'url' =>$url	// $this->uri->segment(4),
			);
			$this->load->view('layouts/header');
		$this->load->view('layouts/sidebar');
		$this->load->view('admin/administrador/ver_postgrados',$data,$id_programa);
		$this->load->view('layouts/footer');
		}
		//var_dump ($data);
		
	}
	public function postgrado_conc($id,$aspirante)//ver postgrados simon conciliado pago
	{
		$id_usuario = $id;
		$id_periodo = $this->Periodo_model->PeriodoActivo($id_usuario);
		$id_programa=$this->Usuarios_model->buscar_usuario($id);

		if($aspirante=='1'){

			$data = array(
			'listado' => $this->Programa_model->getProgramaAprobado($id_programa->programa_id),
			'alumno' => $this->Alumno_model->getListaAlumno($id_usuario),

		);
			$this->load->view('layouts/header');
			$this->load->view('layouts/sidebar');
			$this->load->view('admin/administrador/ver_postgrados_aspirante',$data,$id_programa);
			$this->load->view('layouts/footer');
		}else{
			$data = array(
			'listado' => $this->Registro_pago_model->ver_postgrado_alumno_conc($id_usuario,$id_periodo->id),
			'reincorporaciones'=>$this->Reincorporaciones_model->buscar_reincorporacion($id_usuario,$id_periodo->id),
			'url' =>	 $this->uri->segment(3),
			);

			$this->load->view('layouts/header');
			$this->load->view('layouts/sidebar');
			$this->load->view('admin/administrador/ver_postgrados',$data);
			$this->load->view('layouts/footer');
		}
	}
	public function postgrado_conc_error($id,$aspirante)//ver postgrados simon conciliado pago por error
	{
		$id_usuario = $id;
		$id_periodo = $this->Periodo_model->PeriodoActivo($id_usuario);
		$id_programa=$this->Usuarios_model->buscar_usuario($id);
		if($aspirante==1){
			$data = array(
			'listado' => $this->Programa_model->getProgramaAprobado($id_programa->programa_id),
			'alumno' => $this->Alumno_model->getListaAlumno($id_usuario),
		);
			$this->load->view('layouts/header');
			$this->load->view('layouts/sidebar');
			$this->load->view('admin/administrador/ver_postgrados_aspirante',$data,$id_programa);
			$this->load->view('layouts/footer');
		}else{
			$data = array(
			'listado' => $this->Registro_pago_model->ver_postgrado_alumno_conc_error($id_usuario,$id_periodo->id),
			'reincorporaciones'=>$this->Reincorporaciones_model->buscar_reincorporacion($id_usuario,$id_periodo->id),
			'url' =>	 $this->uri->segment(3),
			);

			$this->load->view('layouts/header');
			$this->load->view('layouts/sidebar');
			$this->load->view('admin/administrador/ver_postgrados',$data);
			$this->load->view('layouts/footer');
		}
	}
	public function postgrado_rev_ac($id,$aspirante)// ver pago yaneth sin revision academica
	{
		$id_usuario = $id;
		$id_periodo = $this->Periodo_model->PeriodoActivo();
		$id_programa=$this->Usuarios_model->buscar_usuario($id);
		if($aspirante==1){
			$data = array(
			'listado' => $this->Programa_model->getProgramaAprobado($id_programa->programa_id),
			'alumno' => $this->Alumno_model->getListaAlumno($id_usuario),
		);
			$this->load->view('layouts/header');
			$this->load->view('layouts/sidebar');
			$this->load->view('supervisor/ver_postgrados_aspirante',$data,$id_programa);
			$this->load->view('layouts/footer');
		}else{
			$data = array(
			'listado' => $this->Registro_pago_model->ver_postgrado_alumno_rev_ac($id_usuario,$id_periodo->id),
			//'alumno' => $this->Registro_pago_model->getRegistro_Pago_alumno_rev_ac($id_usuario,$id_periodo->id),
			'reincorporaciones'=>$this->Reincorporaciones_model->buscar_reincorporacion($id_usuario,$id_periodo->id),
			);
			//var_dump($data);
			$this->load->view('layouts/header');
			$this->load->view('layouts/sidebar');
			$this->load->view('supervisor/ver_postgrados',$data);
			$this->load->view('layouts/footer');
		}
	}
	public function postgrado_aspirante($id,$aspirante)// ver pago yaneth sin revision academica
	{
		$id_usuario = $id;
		$id_periodo = $this->Periodo_model->PeriodoActivo();
		$id_programa=$this->Usuarios_model->buscar_usuario($id);
		if($aspirante==1){
			$data = array(
			'listado' => $this->Programa_model->getProgramaAprobado($id_programa->programa_id),
			'alumno' => $this->Alumno_model->getListaAlumno($id_usuario),
		);
			//var_dump($data);
			$this->load->view('layouts/header');
			$this->load->view('layouts/sidebar');
			$this->load->view('supervisor/ver_postgrados_asp_planilla',$data,$id_usuario);
			$this->load->view('layouts/footer');
		}
			
	}

	public function listconc()
	{
		$id_usuario = $this->session->userdata("id");
		$id_periodo_act = $this->Periodo_model->PeriodoActivo();
		$id_periodo_asp = $this->Periodo_model->PeriodoActivo_asp();
		 $id_periodo=array($id_periodo_act->id,$id_periodo_asp->id );
		// var_dump($id_periodo);
		$data = array(
		'listado' => $this->Registro_pago_model->Pago_conciliado($id_periodo),

		);

		$this->load->view('layouts/header');
		$this->load->view('layouts/sidebar');
		$this->load->view('admin/administrador/list_conciliacion',$data);
		$this->load->view('layouts/footer');
	} 

	public function listconc_error()
	{
		$id_usuario = $this->session->userdata("id");
		$id_periodo_act = $this->Periodo_model->PeriodoActivo();
		$id_periodo_asp = $this->Periodo_model->PeriodoActivo_asp();
		 $id_periodo=array($id_periodo_act->id,$id_periodo_asp->id );
		$data = array(
		'listado' => $this->Registro_pago_model->Pago_conciliado_error($id_periodo),

		);

		$this->load->view('layouts/header');
		$this->load->view('layouts/sidebar');
		$this->load->view('admin/administrador/list_conciliacion_error',$data);
		$this->load->view('layouts/footer');
	} 
	public function conciliar_store($id_usuario,$id_periodo)
	{
		//$id_periodo = $this->Periodo_model->PeriodoActivo();
		echo $id_usuario;
		echo $id_periodo;
		$fecha=date('Y-m-d_H-i');
		$data  = array(
			'conciliado' => 1, 
			'dactualizo'=>$fecha,
			'quien_actualizo'=>$this->session->userdata("id"),
		);

		if ($this->Registro_pago_model->save_conciliacion($id_usuario,$id_periodo,$data)) {
			redirect(base_url()."dashboard05");
		}
		else{
			$this->session->set_flashdata("error","No se pudo guardar la informacion");
			redirect(base_url()."dashboard05");
		}
	}

	public function conciliar_error($id_usuario,$aspirante,$id_periodo)
	{
		//$id_periodo = $this->Periodo_model->PeriodoActivo();

		//var_dump($id_periodo);
//var_dump($id_usuario);
		$data  = array(
			'conciliado' => 2,
			'dactualizo'=>$fecha,
			'quien_actualizo'=>$this->session->userdata("id"),
		

		);

		if ($this->Registro_pago_model->save_conciliacion_error($id_usuario,$id_periodo,$data)) {
			if($aspirante==0){
			 
				// OJO PREGUNTAR Simon no deveria reponer cupos ya que el estaaceptando el pago
				$data1= array('materias_error'=>$this->Registro_pago_model->getRegistro_Pago_error($id_usuario));
				//var_dump($data1);
				
				 if(!empty($data1['materias_error'])):
	                       foreach($data1['materias_error'] as $data1['materias_error']):
						
							   $id=$data1['materias_error']->oferta_id;
							 if($data1['materias_error']->cupos_ocupados>0){
							   	$ocupados=$data1['materias_error']->cupos_ocupados-1;						
							 	$data4  = array('cupos_ocupados'=> $ocupados );
							  	$this->Oferta_academica_model->update_oferta_cupos($id,$data4);
							 }
							  
						   endforeach;
	               endif;	
            }   		
			redirect(base_url()."dashboard05");
		}
		else{
			$this->session->set_flashdata("error","No se pudo guardar la informacion");
			redirect(base_url()."dashboard05");
		}
	}

public function revision_ac_aSP()
	{
		
		$data = array(
		'listado' => $this->Registro_pago_model->Revision_Academica_asp(),
		'periodo' => $this->Periodo_model->PeriodoActivo_asp()
		);
//var_dump($data);
		$this->load->view('layouts/header');
		$this->load->view('layouts/sidebar');
		$this->load->view('supervisor/list_rev_academica',$data);
		$this->load->view('layouts/footer');
	} 
	public function revision_ac()
	{
		$id_usuario = $this->session->userdata("id");
		

		$data = array(
		'listado' => $this->Registro_pago_model->Revision_Academica(),
		'periodo' => $this->Periodo_model->PeriodoActivo()
		);
//var_dump($data);
		$this->load->view('layouts/header');
		$this->load->view('layouts/sidebar');
		$this->load->view('supervisor/list_rev_academica',$data);
		$this->load->view('layouts/footer');
	} 
	public function cupos_materias()
	{
		$id_periodo = $this->Periodo_model->PeriodoActivo();
		$data = array(
		'periodo' => $this->Periodo_model->PeriodoActivo(),
		'materias_eeff' => $this->Oferta_academica_model->Materias_programa_eeff($id_periodo->id),
		'materias_edpp' => $this->Oferta_academica_model->Materias_programa_edpp($id_periodo->id),
		'materias_edp' => $this->Oferta_academica_model->Materias_programa_edp($id_periodo->id),
		'materias_emf' => $this->Oferta_academica_model->Materias_programa_emf($id_periodo->id),
		'materias_edpr' => $this->Oferta_academica_model->Materias_programa_edpr($id_periodo->id),
		'materias_ecc' => $this->Oferta_academica_model->Materias_programa_ecc($id_periodo->id),
		'materias_cppjp' => $this->Oferta_academica_model->Materias_programa_cppjp($id_periodo->id),
		'materias_cppdm' => $this->Oferta_academica_model->Materias_programa_cppdm($id_periodo->id),
		'materias_cppvic' => $this->Oferta_academica_model->Materias_programa_cppvic($id_periodo->id),
		'materias_tegr' => $this->Oferta_academica_model->Materias_programa_tegr($id_periodo->id), //lineas de investigacion especialidades
		'materias_tegre' => $this->Oferta_academica_model->Materias_programa_tegre($id_periodo->id),//lineas de investigacion maestrias
		'materias_eddhh' => $this->Oferta_academica_model->Materias_programa_ddhh($id_periodo->id),
		
		);
		//var_dump($data['materias_edpp']);
		
		


		$this->load->view('layouts/header');
		$this->load->view('layouts/sidebar');
		$this->load->view('supervisor/list_materias',$data);
		$this->load->view('layouts/footer');
	} 
public function cupos_materias_ocupadas($materia)
	{
		//echo "<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<".$materia;
		$materia1	=$this->Materias_preinscrita_model->Materias_inscritas_disponible($materia);
		
		$data2 = array(
		'materias_ocupados' => $materia1,
		
		);
		
		//var_dump($data2);

		$this->load->view('layouts/header');
		$this->load->view('layouts/sidebar');
		//$this->load->view('supervisor/list_materias',$data2);
		
		$this->load->view('layouts/footer');

	} 
	public function materias_inscritas($materia)//estudiantes inscritos por maetria
	{
		//$id_usuario = $this->session->userdata("id");
		$data = array(
		'materia_inscrita' => $this->Materias_preinscrita_model->Materias_inscritas($materia),
		

		);
		
		
		$this->load->view('layouts/header');
		$this->load->view('layouts/sidebar');
		$this->load->view('supervisor/inscritos_materia',$data);
		$this->load->view('layouts/footer');
	} 


	 public function registro_materia_store($id_usuario)//aprobar materias preinscritas
	{
				$id_periodo = $this->Periodo_model->PeriodoActivo();
				$fecha=date('Y-m-d_H-i');
		$data  = array(
			'rev_academica' => 1,
			'quien_actualizo'=>$this->session->userdata("id"),
			'fecha_actualizacion'=>$fecha

		);

		if ($this->Materias_preinscrita_model->update_materia($id_usuario,$id_periodo->id,$data)) {
			$data2  = array(
			'academico' => 1,
			'quien_actualizo'=>$this->session->userdata("id"),
			'dactualizo'=>$fecha	);
			$this->Registro_pago_model->update_academico($id_usuario,$id_periodo->id,$data2);

			$data3  = array();
		

			$this->session->set_flashdata("success","El registro fue APROBADO");

			redirect(base_url()."dashboard05/revision_ac");
		}
		else{
			$this->session->set_flashdata("error","No se pudo guardar la informacion");
			redirect(base_url()."dashboard05/revision_ac");
		}
		
	}

	 public function registro_materia_store2($id_usuario)
	{	
		//var_dump($id_usuario);
		$id_periodo = $this->Periodo_model->PeriodoActivo();
		
		
		$data1 = array('materias_error' => $this->Materias_preinscrita_model->mensaje_materias_preinscritas($id_usuario,$id_periodo->id)
		);
		//var_dump($data1);
			 if(!empty($data1['materias_error'])):
                       foreach($data1['materias_error'] as $data1['materias_error']):
					
					   $id=$data1['materias_error']->id_oferta_academica;
						 if($data1['materias_error']->cupos_ocupados>0){
						   	$ocupados=$data1['materias_error']->cupos_ocupados-1;						
						 	$data4  = array('cupos_ocupados'=> $ocupados );
						  	$this->Oferta_academica_model->update_oferta_cupos($id,$data4);
						 }
						  
					   endforeach;
               endif;
			   			
			$data  = array(
			'rev_academica' => 2,
			'quien_actualizo'=>$this->session->userdata("id"),
			'fecha_actualizacion'=>$fecha
			);
//var_dump($data);
		if ($this->Materias_preinscrita_model->update_materia($id_usuario,$id_periodo->id,$data)) {
			$data2  = array(
				'academico' => 2	,
				'quien_actualizo'=>$this->session->userdata("id"),
				'dactualizo'=>$fecha			
			);

			$this->Registro_pago_model->update_academico($id_usuario,$id_periodo->id,$data2);
			$this->session->set_flashdata("info","El registro fue RECHAZADO");
			redirect(base_url()."dashboard05/revision_ac");
		}
		else{
			$this->session->set_flashdata("error","No se pudo guardar la informacion");
			redirect(base_url()."dashboard05/revision_ac");
		}
		
		
		
		
		
	}
 

	public function transferencia($id)
	{
		
		$data = array(
		'nro_transferencia' => $id,
		);
		$this->load->view('layouts/header');
		$this->load->view('layouts/sidebar');
		$this->load->view('admin/administrador/transferencia',$data);
		$this->load->view('layouts/footer');
	} 

	public function carnet($id)
	{
		$data = array(
		'usuario' => $id,
		);
		$this->load->view('layouts/header');
		$this->load->view('layouts/sidebar');
		$this->load->view('admin/administrador/carnet',$data);
		$this->load->view('layouts/footer');
	} 
	public function inscritos()
	{
		$id_periodo = $this->Periodo_model->PeriodoActivo();
		$data = array(
		'inscritos' => $this->Materias_preinscrita_model->inscritos($id_periodo->id)
		);
		$this->load->view('layouts/header');
		$this->load->view('layouts/sidebar');
		$this->load->view('supervisor/listado_inscrito',$data);
		$this->load->view('layouts/footer');
	} 
public function dExcel_inscritos_uc()
	{
		$id_periodo = $this->Periodo_model->PeriodoActivo();
		$data = array(
			'inscritos' => $this->Oferta_academica_model->revision_unidades_curriculares($id_periodo->id),
			'periodo' => $this->Periodo_model->getIdperiodo($id_periodo->id),
		);
		
//		$this->load->view('layouts/header');
//		$this->load->view('layouts/sidebar');
		$this->load->view('supervisor/consultas/descarga_excel_uc',$data);
//		$this->load->view('layouts/footer');
	} 


	public function listados_inscritos($materia)
	{
		$id_periodo = $this->Periodo_model->PeriodoActivo();
		$data = array(
		'datos_materia_programa' => $this->Materias_preinscrita_model->materia_programa($materia,$id_periodo->id),
		'materia_inscrita' => $this->Materias_preinscrita_model->Listado_Materias_inscritas($materia,$id_periodo->id)
	);
		$this->load->view('layouts/header');
		$this->load->view('layouts/sidebar');
		$this->load->view('supervisor/inscritos',$data);
		$this->load->view('layouts/footer');
	} 


	public function listado_general()
	{
		$rol= $id_usuario = $this->uri->segment(3);
		$id_periodo = $this->Periodo_model->PeriodoActivo();
		$data = array(
		'total_inscritos' => $this->Materias_preinscrita_model->total_inscritos($id_periodo->id,$rol),
		'rol'=>$rol,
		'periodo'=>$this->Periodo_model->getIdperiodo($id_periodo->id),

	);
			//var_dump($data);
		$this->load->view('layouts/header');
		$this->load->view('layouts/sidebar');
		$this->load->view('supervisor/listado_general',$data);
		$this->load->view('layouts/footer');
	}
	
	public function listado_general_aspirante()
	{
		
		$id_periodo = $this->Periodo_model->PeriodoActivo_asp();
	
	
		$data = array(
		'total_inscritos' => $this->Usuarios_model->total_inscritos_aspirantes(),
		'programa' => $this->Programa_model->getProgramaAprobado($total_inscritos->programa_id),
		'periodo'=>$this->Periodo_model->getIdperiodo($id_periodo->id),
		);
		
		//var_dump($data);
		
		$this->load->view('layouts/header');
		$this->load->view('layouts/sidebar');
		$this->load->view('supervisor/listado_general_aspirantes',$data);
		$this->load->view('layouts/footer');
	}
	public function listado_general_pre()
	{
		
		$data = array(
		'total_inscritos' => $this->Materias_preinscrita_model->total_preinscritos(),
		
	);
		$this->load->view('layouts/header');
		$this->load->view('layouts/sidebar');
		$this->load->view('supervisor/listado_preinscrito',$data);
		$this->load->view('layouts/footer');
	}

	public function revisar_datos($id,$aspirante)
	{
		//$id_usuario = $this->session->userdata($id);
		$id_periodo = $this->Periodo_model->PeriodoActivo();
		$lugar_trabajo = $this->Trabajo_model->Lugar_trabajo($id);
		$id_programa=$this->Usuarios_model->buscar_usuario($id);
		if($aspirante=='1'){

			$data = array(
			'listado' => $this->Programa_model->getProgramaAprobado($id_programa->programa_id),
			
		);
			$this->load->view('layouts/header');
			$this->load->view('layouts/sidebar');
			$this->load->view('admin/administrador/ver_postgrados_aspirante',$data);
			$this->load->view('layouts/footer');
		}else{
		
			$data = array(
			'datos_alumno'	=> $this->Alumno_model->getListaAlumno1($id),
			'listado' => $this->Registro_pago_model->Revision_Academica2($id,$aspirante),
			'materias_pre' => $this->Materias_preinscrita_model->mensaje_materias_preinscritas($id,$id_periodo->id),
			'trabajo' => $this->Lugar_trabajo_model->valor_unidad($lugar_trabajo->id_lugar_trabajo),
			'unidades_creditos_pagadas'=>$this->Registro_pago_model->unidades_creditos_pagadas($id),
			'procesado'=>1,
			'postgrado' => $this->Programa_model->getProgramaAprobado(id_programa),
			'id_usuario'=>$id,
			);
			//var_dump($data);
			
			$this->load->view('layouts/header');
			$this->load->view('layouts/sidebar');
			$this->load->view('supervisor/informacion',$data);
			$this->load->view('layouts/footer');
		}
	} 

	public function documentos($id,$aspirante)/*actualizado 06-04-2022*/
	{
		//var_dump($id);
		$id_usuario = $this->session->userdata($id);
		$id_periodo = $this->Periodo_model->PeriodoActivo_asp();
		$lugar_trabajo = $this->Trabajo_model->Lugar_trabajo($id);
		$datos_aspirante=$this->Usuarios_model->buscar_usuario($id);

		if ($aspirante==1){

			$data = array(
			'listado' => $this->Registro_pago_model->Revision_Academica2($id,$aspirante),
			'programa' => $this->Programa_model->getProgramaAprobado($datos_aspirante->programa_id),
			'trabajo' => $this->Lugar_trabajo_model->valor_unidad($lugar_trabajo->id_lugar_trabajo),
			'postular' => $this->Trabajo_model->getListaTrabajo($id,1),
			
			);
			//var_dump($data);
	 		
			$this->load->view('layouts/header');
			$this->load->view('layouts/sidebar');
			$this->load->view('supervisor/documentos',$data);
			$this->load->view('layouts/footer');
		}else{
			$id_periodo = $this->Periodo_model->PeriodoActivo();
			$data = array(
			'listado' => $this->Registro_pago_model->Revision_Academica2($id,$aspirante),
			'materias_pre' => $this->Materias_preinscrita_model->mensaje_materias_preinscritas($id,$id_periodo->id),
			'trabajo' => $this->Lugar_trabajo_model->valor_unidad($lugar_trabajo->id_lugar_trabajo),
			'curso'=> $this->Control_requisitos_model->getControl_requisitos($id_periodo->id,20,$id)
			);
			//var_dump($data);	 		
			$this->load->view('layouts/header');
			$this->load->view('layouts/sidebar');
			$this->load->view('supervisor/documentos_regulares',$data);
			$this->load->view('layouts/footer');
		}
	} 
public function inscripcion2_rev($id_usuario) //para la inscripcion de materias supervisor
	{
		
		
		$periodo = $this->Periodo_model->PeriodoActivo();

		$data = array(
			'periodo' =>  $this->Periodo_model->PeriodoActivo(),
			'listado' => $this->Inscripcion_model->list_inscripcion2($periodo->id),
			'alumno' => $this->Alumno_model->getListaAlumno($id_usuario), 
		);
		$data2 = array(
			'tiempo_pre' => $this->Tiempo_preinscripcion_model->gettiempo_preinscripcion(),

		);
	
	//var_dump($data);
	//var_dump($data2);
		//if ($this->Materias_preinscrita_model->BuscarRegistroMateria($id_usuario,$periodo->id)) {



					$this->load->view('layouts/header');
					$this->load->view('layouts/sidebar',$data2);	

					$this->load->view('supervisor/listado_rev',$data);
					$this->load->view('layouts/footer');
	//			}
//

			
	}
	public function inscripcion2()
	{
		$id_usuario=$this->input->post("id_usuario");
		//echo $id_usuario;
		$lugartrabajo = $this->Trabajo_model->Lugar_trabajo($id_usuario);
		$datos_str = $this->input->post("str");
		$periodo = $this->Periodo_model->PeriodoActivo();
		//var_dump($datos_str);
		if ($datos_str !="") {
			
				$data = array(
				'periodo' =>  $this->Periodo_model->PeriodoActivo(),
				'datos_str' => $datos_str, 
				'listado' => $this->Inscripcion_model->list_preinscripcion($datos_str,$periodo->id),				
				'lista_trabajo' =>$this->Lugar_trabajo_model->valor_unidad($lugartrabajo->id_lugar_trabajo),
				'alumno' => $this->Alumno_model->getListaAlumno($id_usuario), 
				);
				$data2 = array(
				'tiempo_pre' => $this->Tiempo_preinscripcion_model->gettiempo_preinscripcion(),
				);
			
				$this->load->view('layouts/header');
				$this->load->view('layouts/sidebar',$data2);
				$this->load->view('supervisor/listado2_rev',$data);
				$this->load->view('layouts/footer');
		}else{


			$data = array(
			'periodo' =>  $this->Periodo_model->PeriodoActivo(),
			'listado' => $this->Inscripcion_model->list_inscripcion2($periodo->id),
			'alumno' => $this->Alumno_model->getListaAlumno($id_usuario), 
		);
            $data2 = array( 'tiempo_pre' => $this->Tiempo_preinscripcion_model->gettiempo_preinscripcion(),
            );
			$this->load->view('layouts/header');
			$this->load->view('layouts/sidebar',$data2);
			$this->load->view('supervisor/listado_rev',$data);
			$this->load->view('layouts/footer');
			$this->session->set_flashdata("error","Debe seleccionar al menos una materia");
			redirect(base_url()."dashboard05/inscripcion2_rev/$id_usuario");
		}
		
	}
	public function registro_materias()
	{
		$datos_str = $this->input->post("datos_str");
		$id_usuario = $this->input->post("id_usuario");
		$periodo = $this->Periodo_model->PeriodoActivo();
		$id_periodo=$periodo->id;
		$fecha=date('Y-m-d H:m:s');
				
				if ($datos_str !="") {

		 			$datos = trim($datos_str);
		 			$strArray = explode(',',$datos);
		 			foreach ($strArray as $cod_oferta) {
		                $data  = array(
						'id_usuario' => $id_usuario, 
						'id_oferta_academica' => $cod_oferta,
						'id_periodo' => $id_periodo,
						'status' =>1,
						'nenabled'=>1,
						'quien_registro'=>$this->session->userdata("id"),
							
						
						);
						if (!$this->Materias_preinscrita_model->verificar_pre_incritas($id_usuario,$id_periodo,$cod_oferta)) {
							$cupos_ocupados=$this->Oferta_academica_model->getBuscaroferta($cod_oferta);	
								$ocupados=	$cupos_ocupados->cupos_ocupados + 1;
								$data4  = array('cupos_ocupados'=> $ocupados);
								
							$this->Oferta_academica_model->update_oferta_cupos($cod_oferta,$data4);
							$this->Materias_preinscrita_model->save($data);

						}else{
							$data2  = array(
							'id_periodo' => $id_periodo,
							'status' =>1,
							'nenabled'=>1,
							'quien_actualizo'=>$this->session->userdata("id"),
							'fecha_actualizacion'=>$fecha						
							);

							$this->Materias_preinscrita_model->update_materia_activar($id_usuario,$id_periodo,$datos,$data2);

						}
					}

		     	$this->session->set_flashdata("success","Registro guardado Exitosamente");
				redirect(base_url()."dashboard05/revisar_datos/$id_usuario/0");
		
			}else{
				$this->session->set_flashdata("error","Debe seleccionar al menos una materia");
				redirect(base_url()."dashboard05/inscripcion2/$id_usuario");
			}
	}

public function registro_materias_revisadas()
	{
		
		$datos_str = $this->input->post("str");
		$id_usuario = $this->input->post("id_usuario");
		$periodo = $this->Periodo_model->PeriodoActivo();
		$id_periodo=$periodo->id;
		$fecha=date('Y-m-d h:m:s');
		$strArray=  explode(",", $datos_str);
		
				if ($datos_str !="") {

				//unidades de credito por aprobar por el alumno
				$unidades_creditos =$this->Materias_preinscrita_model->unidades_creditos($datos_str);
				foreach ($unidades_creditos as $unidades_creditos ) {
					$total= $unidades_creditos->uc;	
					//echo "por abrobar".$total;	
				}	


				//unidades de credito pagdas por el alumno
				$unidades_pagadas=$this->Registro_pago_model->unidades_creditos_pagadas($id_usuario);

				foreach ($unidades_pagadas as $unidades_pagadas ) {
					$total_pagadas+= $unidades_pagadas->uc;
					//echo "pagadas".$total;

				}

					if ( $total<=$total_pagadas){
						//inabilito las materias inscritas 
						$data2  = array(
						'id_periodo' => $id_periodo,
						'status' =>0,
						'nenabled'=>0,
						'quien_actualizo'=>$this->session->userdata("id"),
			'fecha_actualizacion'=>$fecha
						

						);
						
						$this->Materias_preinscrita_model->update_materia($id_usuario,$id_periodo,$data2);
						
							//fin inabilito las materias inscritas 
						//actaulizo las materias inscritas seleccionadas
						
						$cod_materia=$datos_str;
							//var_dump($cod_materia);
						
						
						$listado=$this->Materias_preinscrita_model->unidades_creditos_seleccionadas($cod_materia);
						//var_dump($listado);
						foreach ($listado as $listado ) {
							 $id=$listado->id_oferta_academica;
							//if($listado->cupos_ocupados< $listado->cupos){								
								echo $ocupados=	$listado->cupos_ocupados;
								$data4  = array('cupos_ocupados'=> $ocupados);
								$data5=  array('codigo_materia'=> $listado->codigo,);
								//$this->Oferta_academica_model->update_oferta_cupos($id,$data4);
								$data2  = array(
								'status' =>1,
								'nenabled'=>1,
								'reg_pago'=>1);		
								$this->Materias_preinscrita_model->update_materia_aprobada($id_usuario,$id_periodo,$cod_materia,$data2);
								
								$this->session->set_flashdata("success","Registro guardado Exitosamente");
		
								redirect(base_url()."dashboard05/revisar_datos/$id_usuario/0");					

							//	echo "actaulice";
							//}else{	
							//$this->session->set_flashdata("warning","Las Materias a inscribir ya tiene el limite establecido de cupos Revisar Cupos Disponibles");
							//	echo "nooooo actaulice";
							//redirect(base_url()."dashboard05/revisar_datos/$id_usuario/0");		
							
							//}
						 
						}
						
						
				 }else{

					$this->session->set_flashdata("error","Las unidades de Creditos revisadas no coinciden con la  misma cantidad de unidades de Creditos pagadas por el alumno. Revisar");
					redirect(base_url()."dashboard05/revisar_datos/$id_usuario/0");

				 }         
				
		}else{
		
			$this->session->set_flashdata("error","Debe seleccionar al menos una materia");
			redirect(base_url()."dashboard05/revisar_datos/$id_usuario/0");

		}

	}
//permite visualizar el listado de los datos personales del alumnos
		public function revision_ac_datos()
	{
		
		$data = array(
		'listado' => $this->Registro_pago_model->Revision_Academica3(),
		'periodo' => $this->Periodo_model->PeriodoActivo()
		);
//var_dump($data);
		$this->load->view('layouts/header');
		$this->load->view('layouts/sidebar');
		$this->load->view('supervisor/listado_datos',$data);
		$this->load->view('layouts/footer');
	} 

public function revision_ac_datos_asp()
	{
		
		$data = array(
		'listado' => $this->Usuarios_model->total_inscritos_aspirantes(),
		'periodo' => $this->Periodo_model->PeriodoActivo_asp()
		);
//var_dump($data);
		$this->load->view('layouts/header');
		$this->load->view('layouts/sidebar');
		$this->load->view('supervisor/listado_datos_asp',$data);
		$this->load->view('layouts/footer');
	} 


	public function revisar_datos_alumno($id){
		$id_usuario = $this->uri->segment(3);
		$aspirante = $this->uri->segment(4);
		$id_periodo = $this->Periodo_model->PeriodoActivo();
		$lugar_trabajo = $this->Trabajo_model->Lugar_trabajo($id);
		$usu_postgrado=$this->Usuarios_model->buscar_usuario($id);
		
		//var_dump($usu_postgrado);
		if ($aspirante==1){
			$periodo = $this->Periodo_model->PeriodoActivo_asp();
			$data = array(
			'datos_alumno'	=> $this->Alumno_model->getListaAlumno1($id),
			'listado' => $this->Registro_pago_model->Revision_Academica21_asp($id),
			'programa' => $this->Programa_model->getProgramaAprobado($usu_postgrado->programa_id),
			'trabajo' => $this->Lugar_trabajo_model->valor_unidad($lugar_trabajo->id_lugar_trabajo),		
			'postular' => $this->Trabajo_model->getListaTrabajo($id,1),
			'requisitos'=>$this->Control_requisitos_model->getControl_requisitos1($periodo->id,$id)	,
			);
			//var_dump($data['listado']);
 		
		$this->load->view('layouts/header');
		$this->load->view('layouts/sidebar');
		$this->load->view('supervisor/ver_alumno_aspirante',$data);
		$this->load->view('layouts/footer');
		}else{
		$data = array(
		'datos_alumno'	=> $this->Alumno_model->getListaAlumno1($id_usuario),
		'listado' => $this->Registro_pago_model->Revision_Academica21($id),		
		'postgrado' => $this->Programa_model->getProgramaAprobado($usu_postgrado->programa_id),
		'trabajo' => $this->Lugar_trabajo_model->valor_unidad($lugar_trabajo->id_lugar_trabajo),
		);
		//var_dump($data);
 		
		$this->load->view('layouts/header');
		$this->load->view('layouts/sidebar');
		$this->load->view('supervisor/ver_alumno',$data);
		$this->load->view('layouts/footer');
		}		

	 }

public function planilla()
	{
		
		$id_usuario = $this->uri->segment(3);
		$id_programa_ = $this->uri->segment(4);
	
		$id_programa= $this->Materias_preinscrita_model-> Materia_alumno($id_usuario,$id_programa_);
		
		
		$id_periodo = $this->Periodo_model->PeriodoActivo();
    $codigo_tel_alumno=$this->Alumno_model->getListaAlumno($id_usuario);
    
    foreach ($id_programa as $id_programa ) {
  
      		$lugar_trabajo = $this->Trabajo_model->Lugar_trabajo($id_usuario);  
			$data = array(
			'datos_alumnos'   => $this->Alumno_model->getListaAlumno($id_usuario),
			'telefono_hab'=>  $this->Codigo_tel_model->getCodigo_nacional($codigo_tel_alumno->id_codigo_hab),
			'telefono_cel'=>  $this->Codigo_tel_model->getCodigo_celular($codigo_tel_alumno->id_codigo_cel),
			'direccion'=> $this->Direccion_model->MostarDireccion($id_usuario),
			'titulo'      => $this->Materias_preinscrita_model->mensaje_materias_preinscritas_alumno_titulo($id_usuario,$id_periodo->id,$id_programa->programa_id),
			'materias_pre'    => $this->Materias_preinscrita_model->mensaje_materias_preinscritas_alumno($id_usuario,$id_periodo->id,$id_programa->programa_id),
			'trabajo'       => $this->Lugar_trabajo_model->valor_unidad($lugar_trabajo->id_lugar_trabajo),
			'datos_trabajo'   => $this->Trabajo_model->getListaTrabajo($id_usuario,1),
			'circunscripcion' => $this->Estado_model->getEstado_circuncripcion_planilla($id_usuario,$lugar_trabajo->id_lugar_trabajo),
			'registro_pago'   =>$this->Registro_pago_model->MostrarRegistro_pago($id_usuario,$id_periodo->id),
			);
		}
	//var_dump($data);
		$hoy = date("dmyhis");

	
	
		
		$this->load->view('layouts/header');
		$this->load->view('layouts/sidebar');
		
		$this->load->view('planilla/planilla_rev_ac',$data,$id_usuario,$id_programa);		
		$this->load->view('layouts/footer');
		
		
	}
	public function descargar(){
			
		$id_usuario = $this->uri->segment(3);
		$id_programa_ = $this->uri->segment(4);
	
		$id_programa= $this->Materias_preinscrita_model-> Materia_alumno($id_usuario,$id_programa_);
		
		
		$id_periodo = $this->Periodo_model->PeriodoActivo();
    	$codigo_tel_alumno=$this->Alumno_model->getListaAlumno($id_usuario);
    
    foreach ($id_programa as $id_programa ) {
  
      		$lugar_trabajo = $this->Trabajo_model->Lugar_trabajo($id_usuario);  
			$data = array(
			'datos_alumnos'   => $this->Alumno_model->getListaAlumno($id_usuario),
			'telefono_hab'=>  $this->Codigo_tel_model->getCodigo_nacional($codigo_tel_alumno->id_codigo_hab),
			'telefono_cel'=>  $this->Codigo_tel_model->getCodigo_celular($codigo_tel_alumno->id_codigo_cel),
				 'direccion'=> $this->Direccion_model->MostarDireccion($id_usuario),
		'titulo'      => $this->Materias_preinscrita_model->mensaje_materias_preinscritas_alumno_titulo($id_usuario,$id_periodo->id,$id_programa->programa_id),
			'materias_pre'    => $this->Materias_preinscrita_model->mensaje_materias_preinscritas_alumno($id_usuario,$id_periodo->id,$id_programa->programa_id),
		'trabajo'       => $this->Lugar_trabajo_model->valor_unidad($lugar_trabajo->id_lugar_trabajo),
			'datos_trabajo'   => $this->Trabajo_model->getListaTrabajo($id_usuario,1),
			'circunscripcion' => $this->Estado_model->getEstado_circuncripcion_planilla($id_usuario,$lugar_trabajo->id_lugar_trabajo),
			'registro_pago'   =>$this->Registro_pago_model->MostrarRegistro_pago($id_usuario,$id_periodo->id),
			);
		}
	//var_dump($data);
		$hoy = date("dmyhis");
      

         $html = $this->load->view('planilla/planilla_rev_ac',$data,true);
 		
 		//$html="asdf";
        //this the the PDF filename that user will get to download
        $pdfFilePath = "planilla_".$hoy.".pdf";
 
         $this->load->library('M_pdf');
        $mpdf = new mPDF('s', 'Letter-P'); 
        $mpdf->showImageErrors = false;
        $mpdf->SetProtection(array('copy','print'), '', 't3n0l0g143n7m9');
    	$mpdf->WriteHTML($html);
    	//$mpdf->Image('/assets/img/no-foto.jpg', 0, 0, 20, 20, 'jpg', '', true, false);
    	$mpdf->Output($pdfFilePath, "D");
      
       //  $this->m_pdf->pdf->Output($pdfFilePath, "D"); 
	}
public function planilla_pre()//planilla de preinscripcion
	{
		
		 $id_usuario = $this->uri->segment(3);
		 $id_programa_ = $this->uri->segment(4);
		//var_dump($id_programa_);
		$id_programa= $this->Programa_model-> getProgramaEsp($id_programa_);
		//var_dump($id_programa);
		//echo "________________";
		 $id_periodo = $this->Periodo_model->PeriodoActivo();
     $codigo_tel_alumno=$this->Alumno_model->getListaAlumno($id_usuario);
   // var_dump($codigo_tel_alumno);
    foreach ($id_programa as $id_programa ) {
  
      		$lugar_trabajo = $this->Trabajo_model->Lugar_trabajo($id_usuario);  
			$data = array(
			'datos_alumnos'   => $this->Alumno_model->getListaAlumno($id_usuario),
			'telefono_hab'=>  $this->Codigo_tel_model->getCodigo_nacional($codigo_tel_alumno->id_codigo_hab),
			'telefono_cel'=>  $this->Codigo_tel_model->getCodigo_celular($codigo_tel_alumno->id_codigo_cel),
			 'direccion'=> $this->Direccion_model->MostarDireccion($id_usuario),
			
			'trabajo'       => $this->Lugar_trabajo_model->valor_unidad($lugar_trabajo->id_lugar_trabajo),
			'datos_trabajo'   => $this->Trabajo_model->getListaTrabajo($id_usuario),
			'circunscripcion' => $this->Estado_model->getEstado_circuncripcion_planilla($id_usuario,$lugar_trabajo->id_lugar_trabajo),
			'registro_pago'   =>$this->Registro_pago_model->MostrarRegistro_pago($id_usuario,$id_periodo->id),
			'periodo'=>$this->Periodo_model->PeriodoActivo(),
			'especializacion'=>$this->Programa_model-> getProgramaEsp($id_programa_)
			);

		}
		
	//var_dump($data);
	
		$hoy = date("dmyhis");

	
	
		
		$this->load->view('layouts/header');
		$this->load->view('layouts/sidebar');
		
		$this->load->view('planilla/planilla_pre',$data);		
		$this->load->view('layouts/footer');
		
		
	}
public function descargar_pla_pre(){
			
		 $id_usuario = $this->uri->segment(3);
		 $id_programa_ = $this->uri->segment(4);
		//var_dump($id_programa_);
		$id_programa= $this->Programa_model-> getProgramaEsp($id_programa_);
		//var_dump($id_programa);
		//echo "________________";
		 $id_periodo = $this->Periodo_model->PeriodoActivo();
     $codigo_tel_alumno=$this->Alumno_model->getListaAlumno($id_usuario);
   // var_dump($codigo_tel_alumno);
    foreach ($id_programa as $id_programa ) {
  
      		$lugar_trabajo = $this->Trabajo_model->Lugar_trabajo($id_usuario);  
			$data = array(
			'datos_alumnos'   => $this->Alumno_model->getListaAlumno($id_usuario),
			'telefono_hab'=>  $this->Codigo_tel_model->getCodigo_nacional($codigo_tel_alumno->id_codigo_hab),
			'telefono_cel'=>  $this->Codigo_tel_model->getCodigo_celular($codigo_tel_alumno->id_codigo_cel),
			 'direccion'=> $this->Direccion_model->MostarDireccion($id_usuario),
			
			'trabajo'       => $this->Lugar_trabajo_model->valor_unidad($lugar_trabajo->id_lugar_trabajo),
			'datos_trabajo'   => $this->Trabajo_model->getListaTrabajo($id_usuario),
			'circunscripcion' => $this->Estado_model->getEstado_circuncripcion_planilla($id_usuario,$lugar_trabajo->id_lugar_trabajo),
			'registro_pago'   =>$this->Registro_pago_model->MostrarRegistro_pago($id_usuario,$id_periodo->id),
			'periodo'=>$this->Periodo_model->PeriodoActivo(),
			'especializacion'=>$this->Programa_model-> getProgramaEsp($id_programa_)
			);

		}
		
	//var_dump($data);
		$hoy = date("dmyhis");
      

         $html = $this->load->view('planilla/planilla_pre',$data,true);
 		
 		//$html="asdf";
        //this the the PDF filename that user will get to download
        $pdfFilePath = "planilla_pre_".$hoy.".pdf";
 
         $this->load->library('M_pdf');
        $mpdf = new mPDF('s', 'Letter-P'); 
        $mpdf->showImageErrors = false;
        $mpdf->SetProtection(array('copy','print'), '', 't3n0l0g143n7m9');
    	$mpdf->WriteHTML($html);
    	//$mpdf->Image('/assets/img/no-foto.jpg', 0, 0, 20, 20, 'jpg', '', true, false);
    	$mpdf->Output($pdfFilePath, "D");
      
       //  $this->m_pdf->pdf->Output($pdfFilePath, "D"); 
	}
	public function planilla_pre_asp()//planilla de preinscripcion //revision academica
	{
		
		 $id_usuario = $this->uri->segment(3);
		 $id_programa_ = $this->uri->segment(4);
		//var_dump($id_programa_);
		$id_programa= $this->Programa_model-> getProgramaEsp($id_programa_);
		//var_dump($id_programa);
		//echo "________________";
		 $id_periodo = $this->Periodo_model->PeriodoActivo_asp();
		 $id_periodo= $id_periodo->id;
     $codigo_tel_alumno=$this->Alumno_model->getListaAlumno($id_usuario);
   // var_dump($codigo_tel_alumno);
    foreach ($id_programa as $id_programa ) {

		
            $lugar_trabajo = $this->Trabajo_model->Lugar_trabajo($id_usuario);  
         //  var_dump($lugar_trabajo);
			$data = array(
			'datos_alumnos'   => $this->Alumno_model->getListaAlumno($id_usuario),
			'telefono_hab'=>  $this->Codigo_tel_model->getCodigo_nacional($codigo_tel_alumno->id_codigo_hab),
			'telefono_cel'=>  $this->Codigo_tel_model->getCodigo_celular($codigo_tel_alumno->id_codigo_cel),
			 'direccion'=> $this->Direccion_model->MostarDireccion($id_usuario),
			'trabajo'       => $this->Lugar_trabajo_model->valor_unidad($lugar_trabajo->id_lugar_trabajo),
'datos_trabajo'   => $this->Trabajo_model->getListaTrabajo($id_usuario,1),
            'datos_trabajo_ant' => $this->Trabajo_model->getListaTrabajo($id_usuario,2),
             'datos_academicos_pre' => $this->Academico_model->getusuario_Academico_asp($id_usuario,1),
        'datos_academicos_post' => $this->Academico_model->getusuario_Academico_asp($id_usuario,2),
   'datos_academicos' => $this->No_conducente_model->getusuario_no_conducentes($id_usuario),
   'datos_admitido' => $this->De_ser_admitido_model->getusuario_de_ser_admitido($id_usuario),

			'circunscripcion' => $this->Estado_model->getEstado_circuncripcion_planilla($id_usuario,$lugar_trabajo->id_lugar_trabajo),
			'registro_pago'   =>$this->Registro_pago_model->MostrarRegistro_pago($id_usuario,$id_periodo),
			'periodo'=>$this->Periodo_model->PeriodoActivo_asp(),
			'especializacion'=>$this->Programa_model-> getProgramaEsp($id_programa_),
			'edad'=> $this->CalculaEdad( $codigo_tel_alumno->fecha_nac ),

			);


		}
		
	//var_dump($data);
	
		$hoy = date("dmyhis");		
		$this->load->view('layouts/header');
		$this->load->view('layouts/sidebar');
		if($id_periodo< 11){

			$this->load->view('planilla/planilla_pre_asp',$data);		
		}else{
			$this->load->view('planilla/planilla_pre_asp_1_1',$data);					
		}
		$this->load->view('layouts/footer');
		
		
	}
public function descargar_pla_pre_asp(){//revision academica
			
		 $id_usuario = $this->uri->segment(3);
		 $id_programa_ = $this->uri->segment(4);
		//var_dump($id_programa_);
		$id_programa= $this->Programa_model-> getProgramaEsp($id_programa_);
		//var_dump($id_programa);
		//echo "________________";
		$id_periodo = $this->Periodo_model->PeriodoActivo_asp();
		$id_periodo= $id_periodo->id;
     $codigo_tel_alumno=$this->Alumno_model->getListaAlumno($id_usuario);
   // var_dump($codigo_tel_alumno);
    foreach ($id_programa as $id_programa ) {
  
      		$lugar_trabajo = $this->Trabajo_model->Lugar_trabajo($id_usuario);  
$data = array(
			'datos_alumnos'   => $this->Alumno_model->getListaAlumno($id_usuario),
			'telefono_hab'=>  $this->Codigo_tel_model->getCodigo_nacional($codigo_tel_alumno->id_codigo_hab),
			'telefono_cel'=>  $this->Codigo_tel_model->getCodigo_celular($codigo_tel_alumno->id_codigo_cel),
			 'direccion'=> $this->Direccion_model->MostarDireccion($id_usuario),
			'trabajo'       => $this->Lugar_trabajo_model->valor_unidad($lugar_trabajo->id_lugar_trabajo),
'datos_trabajo'   => $this->Trabajo_model->getListaTrabajo($id_usuario,1),
            'datos_trabajo_ant' => $this->Trabajo_model->getListaTrabajo($id_usuario,2),
             'datos_academicos_pre' => $this->Academico_model->getusuario_Academico_asp($id_usuario,1),
        'datos_academicos_post' => $this->Academico_model->getusuario_Academico_asp($id_usuario,2),
   'datos_academicos' => $this->No_conducente_model->getusuario_no_conducentes($id_usuario),
   'datos_admitido' => $this->De_ser_admitido_model->getusuario_de_ser_admitido($id_usuario),

			'circunscripcion' => $this->Estado_model->getEstado_circuncripcion_planilla($id_usuario,$lugar_trabajo->id_lugar_trabajo),
			'registro_pago'   =>$this->Registro_pago_model->MostrarRegistro_pago($id_usuario,$id_periodo),
			'periodo'=>$this->Periodo_model->PeriodoActivo_asp(),
			'especializacion'=>$this->Programa_model-> getProgramaEsp($id_programa_),
			'edad'=> $this->CalculaEdad( $codigo_tel_alumno->fecha_nac ),
			);

		}
		
	//var_dump($data);
		$hoy = date("dmyhis");
      
		if($id_periodo< 11){
		         $html = $this->load->view('planilla/planilla_pre_asp',$data,true);
		}else{
			$html=   $this->load->view('planilla/planilla_pre_asp_1_1',$data,true);					
		}


 		
 		//$html="asdf";
        //this the the PDF filename that user will get to download
        $pdfFilePath = "planilla_pre_".$hoy.".pdf";
 
         $this->load->library('M_pdf');
        $mpdf = new mPDF('s', 'Letter-P'); 
        $mpdf->showImageErrors = false;
        $mpdf->SetProtection(array('copy','print'), '', 't3n0l0g143n7m9');
    	$mpdf->WriteHTML($html);
    	//$mpdf->Image('/assets/img/no-foto.jpg', 0, 0, 20, 20, 'jpg', '', true, false);
    	$mpdf->Output($pdfFilePath, "D");
      
       //  $this->m_pdf->pdf->Output($pdfFilePath, "D"); 
	}
public function dExcel_inscritos(){//regulares
	 $rol= $this->uri->segment(3);
	 $id_periodo = $this->Periodo_model->PeriodoActivo();
//var_dump($id_periodo);
if($rol==8){
		 $nombre= 'nuevo_ingreso_inscritos';
		 $titulo='Listado Estudiantes Nuevo Ingreso Inscritos por Programa <b> Período';
	 }
	 if($rol==5){
		 $nombre= 'regulares_inscritos';
		 $titulo='Listado Estudiantes Regulares Inscritos por Programa <b> Período';
	 }

	 $data= array('registros'=>$this->Materias_preinscrita_model->estudiantes_inscritos_periodo($id_periodo->id,$rol),
	 			'titulo'=>$titulo,
	 			'nombre_archivo'=>$nombre,
	 			'periodo'=>$this->Periodo_model->getIdperiodo($id_periodo->id),
	 				);
	
	// var_dump($data);
		
		$this->load->view('supervisor/consultas/descarga_excel_programa',$data);		
		
	}
public function dExcel_inscritos_asp(){//aspirantes inscritos y resumen por especialidad
	 $id_periodo = $this->Periodo_model->PeriodoActivo_asp();
	 $registros_total=$this->Usuarios_model->total_inscritos_aspirantes_datos($id_periodo->id);
	$contar=array();
	 foreach ($registros_total as $registros_total){
	 	$programa_asp=explode (',',$registros_total->programa_id);	 
	 	foreach ($programa_asp as $programa_asp ){
		 	$valor_programa=$this->Programa_model->getProgramaEsp($programa_asp);
			$registro_listado= array(
				'cedula'=>$registros_total->cedula,
				'nacionalidad'=>$registros_total->nacionalidad,
				'nombres'=>$registros_total->nombres,
				'apellidos'=>$registros_total->apellidos,
				'sexo'=>$registros_total->id_sexo,
				'email'=>$registros_total->email,
				'correo'=>$registros_total->correo,
				'telefono_cel'=>$registros_total->telefono_cel,
				'telefono_hab'=>$registros_total->telefono_hab,
				'programa'=>$valor_programa->nombre.' ( '.$valor_programa->modalidad_convocatoria.' ) ' ,			
				'lugar_trabajo'=>$registros_total->lugar_trabajo,
				'estado_circuns'=>$registros_total->circuns,
				'cargo'=>$registros_total->cargo,
				'residencia'=>$registros_total->residencia,	
				'id_usuario'=>$registros_total->id,
			);
			$data['registros'][]=$registro_listado;		
			$array=array_column($data['registros'],'programa');
		}
	}
//var_dump($array);

		foreach($array as $value)

		{
			if(isset($contar[$value]))
			{
			//	echo ' si ya existe, le añadimos uno';			
				$contar[$value]+=1;
			}else{
			//	echo ' si no existe lo añadimos al array';			
				$contar[$value]=1;
			}
		}	

		$data['periodo'][]=$id_periodo->nombre;
 		$data['resumen']=$contar;
 		//var_dump($data);
	//	 var_dump($data['resumen']);
	
		
		$this->load->view('supervisor/consultas/descarga_excel_asp',$data);		
		
	}
public function dExcel_inscritos_asp_registrados(){//aspirantes registrados sin cancelar y resumen por especialidad
		$id_periodo = $this->Periodo_model->PeriodoActivo_Asp();
		$registros_total=$this->Usuarios_model->total_inscritos_aspirantes_datos_todoslos_registrado($id_periodo->id);
	   $contar=array();
		foreach ($registros_total as $registros_total){
			$programa_asp=explode (',',$registros_total->programa_id);	 
			foreach ($programa_asp as $programa_asp ){
				$valor_programa=$this->Programa_model->getProgramaEsp($programa_asp);
			   $registro_listado= array(
				   'cedula'=>$registros_total->cedula,
				
				   'nombres'=>$registros_total->nombres,
				   'apellidos'=>$registros_total->apellidos,
				   'sexo'=>$registros_total->id_sexo,
				   'email'=>$registros_total->email,
				
				   'programa'=>$valor_programa->nombre.' ( '.$valor_programa->modalidad_convocatoria.' ) ' ,			
				   'lugar_trabajo'=>$registros_total->lugar_trabajo,
				   'cargo'=>$registros_total->cargo,
				   'residencia'=>$registros_total->residencia,	
				   'id_usuario'=>$registros_total->id,
			   );
			   $data['registros'][]=$registro_listado;		
			   $array=array_column($data['registros'],'programa');
		   }
	   }
   //var_dump($array);
   
		   foreach($array as $value)
   
		   {
			   if(isset($contar[$value]))
			   {
			   //	echo ' si ya existe, le añadimos uno';			
				   $contar[$value]+=1;
			   }else{
			   //	echo ' si no existe lo añadimos al array';			
				   $contar[$value]=1;
			   }
		   }	
   
		   $data['periodo'][]=$id_periodo->nombre;
			$data['resumen']=$contar;
			//var_dump($data);
	   //	 var_dump($data['resumen']);
	   
		   
	   	$this->load->view('supervisor/consultas/descarga_excel_asp_sin_pago',$data);		
		   
	   }

	/*Actualizado 21-10-252*/
	public function registro_materia_store_asp($id_usuario)//aprobar aspirantes
	{
		$id_periodo = $this->Periodo_model->PeriodoActivo_asp();
		$programa= $this->Usuarios_model->buscar_aspirante($id_usuario);
$fecha=date('Y-m-d h:m:s');
		foreach($programa as $programa){
			 $str=$programa->programa_id; 
		}
	//	echo "<br>";
		//var_dump($str);
		 $prog_id=explode(',',$str);
		$ing_asp=0;
	//	var_dump($prog_id);
		$total= count($prog_id);
		foreach ($prog_id as $prog_id){
			$data  = array(
				'id_usuario'=>$id_usuario,
				'rol_id'=> 7,
				'estatus'=>1,
				'id_programa'=>$prog_id,
				'id_periodo'=>$id_periodo->id,
				'rev_academica' => 1,
				'reg_pago'=> 1,		
				'nenabled'=>1,
				'usuario_registro'=> $this->session->userdata("id"),

			);
			if($this->Aspirantes_model->save($data)){
				$ing_asp++;
			}
					
		
		}		
		//echo count($prog_id);
					$data2  = array(
					'academico' => 1,
					'quien_actualizo'=>$this->session->userdata("id"),
					'dactualizo'=>$fecha	);
		if($total==$ing_asp){
		//	echo "iguales";
		//	echo $id_periodo->id;
			if($this->Registro_pago_model->update_academico($id_usuario,$id_periodo->id,$data2)){

					$this->session->set_flashdata("success","El registro fue APROBADO");

					redirect(base_url()."dashboard05/revision_ac_asp");
			}else{
					$this->session->set_flashdata("error","No se pudo guardar la informacion");
					redirect(base_url()."dashboard05/revision_ac_asp");
			}
		}else{
			$this->session->set_flashdata("error","No se pudo guardar la informacion");
			redirect(base_url()."dashboard05/revision_ac_asp");
		}
	}
	public function registro_materia_store2_asp($id_usuario)//rechazar aspirantes
	{
		$id_periodo = $this->Periodo_model->PeriodoActivo_asp();
		$programa= $this->Usuarios_model->buscar_aspirante($id_usuario);
		foreach($programa as $programa){
			 $str=$programa->programa_id; 
		}
	//	echo "<br>";
	//	var_dump($str);
		$prog_id=explode(',',$str);
		foreach ($prog_id as $prog_id){
			$data  = array(
				'id_usuario'=>$id_usuario,
				'rol_id'=> 7,
				'estatus'=>1,
				'id_programa'=>$prog_id,
				'id_periodo'=>$id_periodo->id,
				'rev_academica' => 2,
				'reg_pago'=> 1,		
				'nenabled'=>1,
				'usuario_registro'=> $this->session->userdata("id"),

			);
			$this->Aspirantes_model->save($data);
					
		
		}		

					$data2  = array(
					'academico' => 2	);

			if($this->Registro_pago_model->update_academico($id_usuario,$id_periodo->id,$data2)){

					$this->session->set_flashdata("success","El registro fue RECHAZADO");

					redirect(base_url()."dashboard05/revision_ac_asp");
			}else{
					$this->session->set_flashdata("error","No se pudo guardar la informacion");
					redirect(base_url()."dashboard05/revision_ac_asp");
			}
		
	}
public function revisar_plan_clases(){
		//$id_usuario = $this->uri->segment(3);
		$data2 = array(
			'tiempo_pre' => $this->Tiempo_preinscripcion_model->gettiempo_preinscripcion(),

		);	
		$periodo=$this->Periodo_model->PeriodoActivoNotas();
		$data = array(			
			
			'unidades_curriculares'	=> $this->Oferta_academica_model->unidades_curriculares_docente_todos($periodo->id),
			'unidades_curricularesli'	=> $this->Oferta_academica_model->unidades_curriculares_docente_lineas_todos($periodo->id),
			'periodo'	=> $this->Periodo_model->PeriodoActivoNotas(),
			'revision'=>'0',
		);
		$i=0;
		foreach($data['unidades_curriculares'] as $uc){
			//echo $uc->id;
			$i++;
			$data['total'][$i]=count($this->Materias_preinscrita_model->Materias_inscritas($uc->id));
		}
		foreach($data['unidades_curricularesli'] as $uc){
			//echo $uc->id;
			$il++;
			$data['totalli'][$il]=count($this->Materias_preinscrita_model->Materias_inscritasli($uc->codigo,$periodo->id));
		}
 		
		$this->load->view('layouts/header');
		$this->load->view('layouts/sidebar');
		$this->load->view('supervisor/plan_clases/revisar_matricula',$data);
		$this->load->view('layouts/footer');
		}				

		public function notas_cargadas(){
		//$id_usuario = $this->uri->segment(3);
		$data2 = array(
			'tiempo_pre' => $this->Tiempo_preinscripcion_model->gettiempo_preinscripcion(),

		);	
		$periodo=$this->Periodo_model->PeriodoActivoNotas();
		$data = array(			
			
			'unidades_curriculares'	=> $this->Oferta_academica_model->unidades_curriculares_docente_cargados($periodo->id),
			'unidades_curricularesli'	=> $this->Oferta_academica_model->unidades_curriculares_docente_cargados_lineas($periodo->id),
			'periodo'=>	$periodo,
			'revision'=>'1',
		);
		
				$i=0;
		foreach($data['unidades_curriculares'] as $uc){
			//echo $uc->id;
			$i++;
			$data['total'][$i]=count($this->Materias_preinscrita_model->Materias_inscritas($uc->id));
		}
		foreach($data['unidades_curricularesli'] as $uc){
			//echo $uc->id;
			$il++;
			$data['totalli'][$il]=count($this->Materias_preinscrita_model->Materias_inscritasli($uc->codigo,$periodo->id));
		}

 		
		$this->load->view('layouts/header');
		$this->load->view('layouts/sidebar');
		$this->load->view('supervisor/plan_clases/notas_cargadas',$data);
		$this->load->view('layouts/footer');
		}			 

	public function dExcel_control_notas_estatus(){
		//$id_usuario = $this->uri->segment(3);
		$data2 = array(
			'tiempo_pre' => $this->Tiempo_preinscripcion_model->gettiempo_preinscripcion(),

		);	
		$periodo=$this->Periodo_model->PeriodoActivoNotas();
		$data = array(	
				'unidades_curriculares'	=> $this->Oferta_academica_model->unidades_curriculares_docente_estatus($periodo->id),
				'nombre_archivo'=>'Estatus_Notas',		
						 				
			
				'periodo'	=> $this->Periodo_model->PeriodoActivo(),
		 );		
	
		$i=0;
		foreach($data['unidades_curriculares'] as $uc){
			//echo $uc->id;
			$i++;
			$data['total'][$i]=count($this->Materias_preinscrita_model->Materias_inscritas($uc->id));
		}

		$this->load->view('supervisor/plan_clases/descarga_excel_control',$data);
		}			
	public function buscar_plan_clases(){

			$id_usuario = $this->session->userdata("id");


			$data2 = array(
				'tiempo_pre' => $this->Tiempo_preinscripcion_model->gettiempo_preinscripcion(),

			);	
			
			$data = array(			
				
		
				'periodo'	=> $this->Periodo_model->PeriodoNotas(),
				'revision'	=> '2',
			);
		

 		//var_dump($data);
		$this->load->view('layouts/header');
		$this->load->view('layouts/sidebar');
		$this->load->view('supervisor/plan_clases/buscar_periodo',$data);
		$this->load->view('layouts/footer');
		}		
		public function notas_cargadas_consultas(){
		 $id_periodo = $this->input->post('periodo');
		$periodo	= $this->Periodo_model->getIdperiodonotas($id_periodo);
	
		$data = array(			
			
			'unidades_curriculares'	=> $this->Oferta_academica_model->unidades_curriculares_docente_todos($periodo->id),	
			'unidades_curricularesli'	=> $this->Oferta_academica_model->unidades_curriculares_docente_lineas_todos($periodo->id),
			'periodo'=>	$periodo,
			'revision'	=> '2',
		);
		
		$i=0;
		foreach($data['unidades_curriculares'] as $uc){
			//echo $uc->id;
			$i++;
			$data['total'][$i]=count($this->Materias_preinscrita_model->Materias_inscritas($uc->id));
		}
		foreach($data['unidades_curricularesli'] as $uc){
			//echo $uc->id;
			$i++;
			$data['total'][$i]=count($this->Materias_preinscrita_model->Materias_inscritasli_periodo($uc->codigo, $id_periodo));
		}
		//var_dump($data);
		$this->load->view('layouts/header');
		$this->load->view('layouts/sidebar');
		$this->load->view('supervisor/plan_clases/revisar_matricula',$data);
		$this->load->view('layouts/footer');
		}			
		
		function CalculaEdad( $fecha ) {
			list($Y,$m,$d) = explode("-",$fecha);
			return( date("md") < $m.$d ? date("Y")-$Y-1 : date("Y")-$Y );
		  }

public function dExcel(){//matricula en excel
			$materia= $this->uri->segment(3);
			$nombre= 'matricula';
			$oferta=$this->Oferta_academica_model->getBuscaroferta($materia);		
			$matricula=$this->Materias_preinscrita_model->Materias_inscritas($materia);		
			 $data= array(
							 'unidad_curricular' => $this->Pensum_model->getnombrePensum($oferta->id_pensum),		
							 'nombre_archivo'=>$nombre,		 				
							 'oferta'=>$oferta,			 				
							 'matricula'	=> $matricula,
							 'periodo'	=> $this->Periodo_model->PeriodoActivo(),
						 );
			
		$this->load->view('supervisor/descarga_excel_inscritos_oferta',$data);		
		
		
			
		}
public function dPDF_matricula(){//matricula en pdf
		$materia= $this->uri->segment(3);
		$nombre= 'matricula';
		$oferta=$this->Oferta_academica_model->getBuscaroferta($materia);		
		$matricula=$this->Materias_preinscrita_model->Materias_inscritas($materia);		
		 $data= array(
		 				'unidad_curricular' => $this->Pensum_model->getnombrePensum($oferta->id_pensum),		
		 				'nombre_archivo'=>$nombre,		 				
		 				'oferta'=>$oferta,			 				
		 				'matricula'	=> $matricula,
		 				'periodo'	=> $this->Periodo_model->getIdperiodonotas($oferta->id_periodo),
		 			);
	
		
			// var_dump($data);
			$hoy = date("dmyhis");
	         $html = $this->load->view('supervisor/descarga_pdf_matricula_inscritos',$data,true);			 	
	        //this the the PDF filename that user will get to download
	        $pdfFilePath = "matricula_".$hoy.".pdf";
	 
	        //load mPDF library
	        $this->load->library('M_pdf');
	        $mpdf = new mPDF('c', 'Letter-P'); 
		$mpdf->SetProtection(array('copy','print'), '', 't3n0l0g143n7m9');
 		$mpdf->WriteHTML($html);					
		$mpdf->Output($pdfFilePath, "D");

		
		
	}

public function cargaclausula($id_usuario)
	{
		
		extract($_REQUEST);
			$nombre_archivo = $_FILES['userfile']['name'];
			$tipo_archivo = $_FILES['userfile']['type'];
			$tamano_archivo = $_FILES['userfile']['size'];

//compruebo si las caracter�sticas del archivo son las que deseo
			if (!((strpos($tipo_archivo, "gif") || strpos($tipo_archivo, "jpeg") || strpos($tipo_archivo, "png")  || strpos($tipo_archivo, "jpg") || strpos($tipo_archivo, "pdf") )))
			{ // formato incorrecto
				$mensaje = $nombre_archivo.' - '.$tipo_archivo.' - '.$tamano_archivo;
				$mensaje.=$tipo_archivo." <strong>El formato del archivo es invalido. La imagen debe tener el formato: .gif, .jpg o .png, .pdf</strong>";
			} else if (($tamano_archivo > 1048576)) { // excede el tama�o permitido
				$mensaje="<strong>La clausula de compromiso  no puede exceder de 1 Mb, el archivo que intenta cargar tiene un tama&ntilde;o de: ".number_format($tamano_archivo/1048576,2)." Mb </strong><br/> Seleccione otra foto e intente de nuevo";
			} else { // todo ok
				if(strpos($tipo_archivo, "pdf")&& move_uploaded_file($_FILES['userfile']['tmp_name'], 'assets/clausula/'. $id_usuario."_clausula.pdf")){
				 	
					$mensaje="";
				}else{
				
					if ((strpos($tipo_archivo, "gif") || strpos($tipo_archivo, "jpeg")|| strpos($tipo_archivo, "jpg") || strpos($tipo_archivo, "png")  )&& move_uploaded_file($_FILES['userfile']['tmp_name'], 'assets/clausula/'. $id_usuario."_clausula.jpg"))
					{
						$mensaje="";
					} else {
						$mensaje="Ocurrio algun error al subir el archivo. No pudo guardarse.";
					}
				}
			}
			if ($mensaje=="") {
				$periodo=$this->Periodo_model->PeriodoActivo();
					$data= array(
						'id_usuario'=>$id_usuario,
						'id_requisito'=>'5',
						'id_periodo'=>$periodo->id,
					);
				   // var_dump($data);
					if(!$this->Control_requisitos_model->getControl_requisitos($periodo->id,5,$id_usuario)){
						$this->Control_requisitos_model->save($data);
						$this->session->set_flashdata("success","Clausula Compromisoria Cargada con Éxito.");
						redirect(base_url()."dashboard04/datos6");
					}else{
						$fecha=date("Y-m-d H:i:s");
						$data2= array(
						'fecha_actualizacion'=>$fecha,);
						$retorno=$this->Control_requisitos_model->update($id_usuario,$periodo->id,5,$data2);
						//var_dump($retorno);
						$this->session->set_flashdata("warning","El requisito fue actualizado.");
			    		redirect(base_url()."dashboard05/revisar_datos_alumno/".$id_usuario."/0");
					}
					//var_dump($guarda);
					
			} else {
				

				$this->session->set_flashdata("error",$mensaje);
				redirect(base_url()."dashboard05/revisar_datos_alumno/".$id_usuario."/0");
			}
	//	$this->load->view('layouts/header');
	//	$this->load->view('layouts/sidebar');
	//	$this->load->view('participante/datos/foto');
	//	$this->load->view('layouts/footer');
	}
public function reversar_inscripcion($rol)//aprobar materias preinscritas
	{

			//echo $rol." reversar inscripcion"	;
				 $id_periodo = $this->Periodo_model->PeriodoActivo();
				//var_dump($id_periodo);
				 $id_usuario=	 $this->uri->segment(4);
				$usuario_act=$this->session->userdata("id");
				$fecha=date('Y-m-d h:m:s');

			
		$data  = array(
			'rev_academica' => 0,
			'status' => 1,
			'nenabled' => 1,
			'quien_actualizo'=>$usuario_act,
			'fecha_actualizacion'=>$fecha
		);

		if ($this->Materias_preinscrita_model->update_materia($id_usuario,$id_periodo->id,$data)) {
			$data2  = array(
			'academico' => 0,
			'quien_actualizo'=>$usuario_act,
			'dactualizo'=>$fecha
			);
			$this->Registro_pago_model->update_academico($id_usuario,$id_periodo->id,$data2);

			$data3  = array();
		

			$this->session->set_flashdata("success","El registro fue Reversado, para volver a Validar ir a la bandeja Revisión Académica");

			redirect(base_url()."dashboard05/revision_ac");
		}
		else{
			$this->session->set_flashdata("error","No se pudo guardar la informacion");
			redirect(base_url()."dashboard05/listado_general/$rol");
		}
		
	}

	public function clausula_online($id_usuario)
	{
		

		
			$id_periodo = $this->Periodo_model->PeriodoActivo();
			echo $id_usuario = $id_usuario;
			echo $id_programa = $id_programa;
			$lugartrabajo = $this->Trabajo_model->Lugar_trabajo($id_usuario);
			
			$data2 = array(
			'tiempo_pre' => $this->Tiempo_preinscripcion_model->gettiempo_preinscripcion(),
			'periodo'=> $this->Periodo_model->PeriodoActivo(),
			);
			//var_dump($data);
			$this->load->view('layouts/header');
			$this->load->view('layouts/sidebar',$data2);
			
				
					if($this->Control_requisitos_model->getControl_requisitos($id_periodo->id,5,$id_usuario)  ){
						$data=array('datos_alumnos' => $this->Alumno_model->getListaAlumno($id_usuario),
						'periodo' => $this->Periodo_model->PeriodoActivo(),
						'materiasP'=>$this->Materias_preinscrita_model->preincritas_clausulas($id_usuario,$id_periodo->id,1),
						'materiasV'=>$this->Materias_preinscrita_model->preincritas_clausulas($id_usuario,$id_periodo->id,2),
						'materiasSP'=>$this->Materias_preinscrita_model->preincritas_clausulas($id_usuario,$id_periodo->id,3),
						'materiasTG'=>$this->Materias_preinscrita_model->preincritas_clausulas($id_usuario,$id_periodo->id,4),
						'modalidad'=>$this->Materias_preinscrita_model->preincritas_clausulas_modalidad($id_usuario,$id_periodo->id),
						'clausula'=>$this->Control_requisitos_model->getControl_requisitos($id_periodo->id,5,$id_usuario),
						'acepto'=>1,
						);
						//var_dump($data['clausula']);
						$this->load->view('supervisor/clausula_online',$data);// forma que carga las clausulas
					}
				
				
		
			$this->load->view('layouts/footer');			



	}
	public function clausula_dis_descargar($id_usuario)
	{
		

		
			$id_periodo = $this->Periodo_model->PeriodoActivo();
			echo $id_usuario = $id_usuario;
			echo $id_programa = $id_programa;
			$lugartrabajo = $this->Trabajo_model->Lugar_trabajo($id_usuario);
			
			
			$data2 = array(
			'tiempo_pre' => $this->Tiempo_preinscripcion_model->gettiempo_preinscripcion(),
			'periodo'=> $this->Periodo_model->PeriodoActivo(),
			);
			//var_dump($data);
			$this->load->view('layouts/header');
			$this->load->view('layouts/sidebar',$data2);
			
				
					if($this->Control_requisitos_model->getControl_requisitos($id_periodo->id,5,$id_usuario)  ){
						$data=array('datos_alumnos' => $this->Alumno_model->getListaAlumno($id_usuario),
						'periodo' => $this->Periodo_model->PeriodoActivo(),
						
						'materiasV'=>$this->Materias_preinscrita_model->preincritas_clausulas($id_usuario,$id_periodo->id,2),
						
						'modalidad'=>$this->Materias_preinscrita_model->preincritas_clausulas_modalidad($id_usuario,$id_periodo->id),
						'clausula'=>$this->Control_requisitos_model->getControl_requisitos($id_periodo->id,5,$id_usuario),
						'acepto'=>1,
						);
					//	var_dump($data['clausula']);
					
					}
				
					$html = $this->load->view('supervisor/clausula_dis_descargar',$data,true);	
		
				//load mPDF library
				$this->load->library('M_pdf');
				$mpdf = new mPDF('c', 'Letter-P'); 
				$mpdf->SetProtection(array('copy','print'), '', 't3n0l0g143n7m9');
				$mpdf->WriteHTML($html);							
				$mpdf->Output($pdfFilePath, "D");					



	}
	public function clausula_pre_descargar($id_usuario)
	{		
			$id_periodo = $this->Periodo_model->PeriodoActivo();
			echo $id_usuario = $id_usuario;
			echo $id_programa = $id_programa;
			$lugartrabajo = $this->Trabajo_model->Lugar_trabajo($id_usuario);
			
			
			$data2 = array(
			'tiempo_pre' => $this->Tiempo_preinscripcion_model->gettiempo_preinscripcion(),
			'periodo'=> $this->Periodo_model->PeriodoActivo(),
			);
			//var_dump($data);
			$this->load->view('layouts/header');
			$this->load->view('layouts/sidebar',$data2);
			
				
					if($this->Control_requisitos_model->getControl_requisitos($id_periodo->id,5,$id_usuario)  ){
						$data=array('datos_alumnos' => $this->Alumno_model->getListaAlumno($id_usuario),
						'periodo' => $this->Periodo_model->PeriodoActivo(),
						
						'materiasP'=>$this->Materias_preinscrita_model->preincritas_clausulas($id_usuario,$id_periodo->id,1),
						
						'modalidad'=>$this->Materias_preinscrita_model->preincritas_clausulas_modalidad($id_usuario,$id_periodo->id),
						'clausula'=>$this->Control_requisitos_model->getControl_requisitos($id_periodo->id,5,$id_usuario),
						'acepto'=>1,
						);
					//	var_dump($data['clausula']);
					
					}
				
					$html = $this->load->view('supervisor/clausula_pre_descargar',$data,true);	
		
				//load mPDF library
				$this->load->library('M_pdf');
				$mpdf = new mPDF('c', 'Letter-P'); 
				$mpdf->SetProtection(array('copy','print'), '', 't3n0l0g143n7m9');
				$mpdf->WriteHTML($html);							
				$mpdf->Output($pdfFilePath, "D");					



	}
	public function clausula_sp_descargar($id_usuario)
	{		
			$id_periodo = $this->Periodo_model->PeriodoActivo();
			 $id_usuario = $id_usuario;
			 $id_programa = $id_programa;
			$lugartrabajo = $this->Trabajo_model->Lugar_trabajo($id_usuario);
			
			
			$data2 = array(
			'tiempo_pre' => $this->Tiempo_preinscripcion_model->gettiempo_preinscripcion(),
			'periodo'=> $this->Periodo_model->PeriodoActivo(),
			);
			//var_dump($data);
			$this->load->view('layouts/header');
			$this->load->view('layouts/sidebar',$data2);
			
				
					if($this->Control_requisitos_model->getControl_requisitos($id_periodo->id,5,$id_usuario)  ){
						$data=array('datos_alumnos' => $this->Alumno_model->getListaAlumno($id_usuario),
						'periodo' => $this->Periodo_model->PeriodoActivo(),
						
					
						'materiasSP'=>$this->Materias_preinscrita_model->preincritas_clausulas($id_usuario,$id_periodo->id,3),
				
						
						'modalidad'=>$this->Materias_preinscrita_model->preincritas_clausulas_modalidad($id_usuario,$id_periodo->id),
						'clausula'=>$this->Control_requisitos_model->getControl_requisitos($id_periodo->id,5,$id_usuario),
						'acepto'=>1,
						);
					//	var_dump($data['clausula']);
					
					}
				
					$html = $this->load->view('supervisor/clausula_semi_descargar',$data,true);	
		
				//load mPDF library
				$this->load->library('M_pdf');
				$mpdf = new mPDF('c', 'Letter-P'); 
				$mpdf->SetProtection(array('copy','print'), '', 't3n0l0g143n7m9');
				$mpdf->WriteHTML($html);							
				$mpdf->Output($pdfFilePath, "D");					



	}
	public function clausula_teg_descargar($id_usuario)
	{		
			$id_periodo = $this->Periodo_model->PeriodoActivo();
			 $id_usuario = $id_usuario;
			 $id_programa = $id_programa;
			$lugartrabajo = $this->Trabajo_model->Lugar_trabajo($id_usuario);
			
			
			$data2 = array(
			'tiempo_pre' => $this->Tiempo_preinscripcion_model->gettiempo_preinscripcion(),
			'periodo'=> $this->Periodo_model->PeriodoActivo(),
			);
			//var_dump($data);
			$this->load->view('layouts/header');
			$this->load->view('layouts/sidebar',$data2);
			
				
					if($this->Control_requisitos_model->getControl_requisitos($id_periodo->id,5,$id_usuario)  ){
						$data=array('datos_alumnos' => $this->Alumno_model->getListaAlumno($id_usuario),
						'periodo' => $this->Periodo_model->PeriodoActivo(),
						
					
						'materiasTG'=>$this->Materias_preinscrita_model->preincritas_clausulas($id_usuario,$id_periodo->id,4),
				
						
						'modalidad'=>$this->Materias_preinscrita_model->preincritas_clausulas_modalidad($id_usuario,$id_periodo->id),
						'clausula'=>$this->Control_requisitos_model->getControl_requisitos($id_periodo->id,5,$id_usuario),
						'acepto'=>1,
						);
					//	var_dump($data['clausula']);
					
					}
				
					$html = $this->load->view('supervisor/clausula_teg_descargar',$data,true);	
		
				//load mPDF library
				$this->load->library('M_pdf');
				$mpdf = new mPDF('c', 'Letter-P'); 
				$mpdf->SetProtection(array('copy','print'), '', 't3n0l0g143n7m9');
				$mpdf->WriteHTML($html);							
				$mpdf->Output($pdfFilePath, "D");					



	}
public function dExcel_inscritos_asp_pagos(){//aspirantes registrados con pago y sin requisitosy resumen por especialidad
		$id_periodo = $this->Periodo_model->PeriodoActivo_Asp();
		$registros_total=$this->Usuarios_model->total_inscritos_aspirantes_pagos_sinrequisitos($id_periodo->id);
	   $contar=array();
		foreach ($registros_total as $registros_total){
			$programa_asp=explode (',',$registros_total->programa_id);	 
			foreach ($programa_asp as $programa_asp ){
				$valor_programa=$this->Programa_model->getProgramaEsp($programa_asp);
			   $registro_listado= array(
				   'cedula'=>$registros_total->cedula,
				
				   'nombres'=>$registros_total->nombres,
				   'apellidos'=>$registros_total->apellidos,
				   'sexo'=>$registros_total->id_sexo,
				   'email'=>$registros_total->email,
				   'banco'=>$registros_total->id_banco,
				   'programa'=>$valor_programa->nombre_convocatoria.' ( '.$valor_programa->modalidad_convocatoria.' ) ' ,			
				   'lugar_trabajo'=>$registros_total->lugar_trabajo,
				   'cargo'=>$registros_total->cargo,
				   'residencia'=>$registros_total->residencia,	
				   'id_usuario'=>$registros_total->id,
				   'nro_referencia'=>$registros_total->nro_referencia,	
				   'fecha_transferencia'=>$registros_total->fecha_transferencia,	
				   'monto_apagar'=>$registros_total->monto_apagar,	
				   'monto_depositado'=>$registros_total->monto_apagar,	
				   'id_usuario'=>$registros_total->id,
			   );
			   $data['registros'][]=$registro_listado;		
			   $array=array_column($data['registros'],'programa');
		   }
	   }
   //var_dump($array);
   
		   foreach($array as $value)
   
		   {
			   if(isset($contar[$value]))
			   {
			   //	echo ' si ya existe, le añadimos uno';			
				   $contar[$value]+=1;
			   }else{
			   //	echo ' si no existe lo añadimos al array';			
				   $contar[$value]=1;
			   }
		   }	
   
		   $data['periodo'][]=$id_periodo->nombre;
			$data['resumen']=$contar;
			//var_dump($data);
	   //	 var_dump($data['resumen']);
	   
		   
	   	$this->load->view('supervisor/consultas/descarga_excel_asp_con_pago',$data);		
		   
	   }
	   
}

