<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard09 extends CI_Controller { // controlador tramites administrativos

	public function __construct(){
		parent::__construct();
		$this->load->model("Usuarios_model");
		$this->load->model("Registro_pago_model");
		
		$this->load->model("Alumno_model");
		$this->load->model("Lugar_trabajo_model");
		$this->load->model("Materias_preinscrita_model");
		$this->load->model("Control_doctramite_model");
		$this->load->model("Nro_constancia_model");

		//
		$this->load->model("Inscripcion_model");
		$this->load->model("Periodo_model");
		$this->load->model("Programa_model");
		$this->load->model("Pensum_model");
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
		$this->load->model("Solictudtramite_model");
		$this->load->model("Rucdetalle_unidades_model");

		$this->load->model("Tramites_model");
		$this->load->model("Aranceltram_model");
		$this->load->model("Control_requisitos_model");
		$this->load->model("Tipo_reconocimiento_model");
		$this->load->model("Trimestre_model");
		$this->load->model("Exonerados_model");
		$this->load->model("Notas_academica_model");



		if (!$this->session->userdata("login")) {
			redirect(base_url());
		}
	}

	public function index($id)
	{
		$id_usuario = $this->session->userdata("id");
        $usuario=$this->Alumno_model->getAlumno_cedula($id_usuario);
		$id_periodo=$this->Periodo_model->PeriodoActivo();
	
		
		$data = array(
		'solicitudes' => $this->Solictudtramite_model->getListaSolTramites($id_usuario,$id),			
		'alumno_list'=> $this->Alumno_model->getListaAlumno1($id_usuario),
		'aranceles' =>  $this->Aranceltram_model->getArancelesTramite(),
     	'programa' =>$this->Materias_preinscrita_model->programas_inscritos($usuario->cedula),
		'prog_todos' =>$this->Programa_model->getProgramaMostrar($id_prog=array(1,2,3,5,6,4,20,21,26)),	
		'listado'=>$this->Materias_preinscrita_model->materias_validadas_periodo_vigente($id_usuario),
		'periodo' => $this->Periodo_model->PeriodoActivo(),
		'exonerados'=>$this->Exonerados_model->exonerados_todo_programa($id_usuario,$id_periodo->id),
		);
	
		$this->load->view('layouts/header');
		$this->load->view('layouts/sidebar_tramites');
        if($id==1){
	    $data['solicitudesAca']= $this->Solictudtramite_model->getListaSolTramites_academico($id_usuario,$id);	
            $this->load->view('participante/tramites/solicitud_academica',$data); 
        }
	
        if($id==2){

		    $this->load->view('participante/tramites/solicitud',$data);//tramite administrativos
        }
		
		$this->load->view('layouts/footer');
	}
	public function solicitud_egreso()
	{
		$id_tramite= array(18);
		$fecha_hoy=date('Y-m-d' );
		$egresado=$this->session->userdata("egresado");
		$fecha_apertura=$this->Tramites_model->getTramitesapertura($id_tramite);	

if($egresado==1 and (DATE('Y-m-d',$fecha_apertura->desde)<=$fecha_hoy and $fecha_apertura->hasta>=$fecha_hoy )  ){
		$id_usuario = $this->session->userdata("id");
        $usuario=$this->Alumno_model->getAlumno_cedula($id_usuario);
	

		$data = array(
			'solicitudes' => $this->Solictudtramite_model->getListaSolTramites_egresos($id_usuario,$id=2),
			'combotramite'=> $this->Tramites_model->getListaTramites_egreso($id_tramite),
			'alumno_list'=> $this->Alumno_model->getListaAlumno1($id_usuario),		
			
			'programa' =>$this->Materias_preinscrita_model->programas_inscritos($usuario->cedula),
			//'programa' =>$this->Programa_model->getProgramaMostrar($id_prog=array(1,2,3,5,6,4,14,20,21,23,24,25)),	
			'reconocimiento'=>$this->Tipo_reconocimiento_model->get(18),
			'periodo' => $this->Periodo_model->PeriodoActivo(),
		);

		$this->load->view('layouts/header');
		$this->load->view('layouts/sidebar_tramites');       
		$this->load->view('participante/tramites/solicitud_egreso',$data);       
		$this->load->view('layouts/footer');
	}else{
		$this->session->set_flashdata("error","La solicitud no puede ser procesada, debe ser activado el trámite por la Direccion General de Secretaría ENFMP.");
		redirect(base_url()."dashboard09/index/2");
	}
	}
	public function pago_grado()// aranceles de grado
	{
		$id_tramite= array(18);
		$fecha_hoy=date('Y-m-d' );
		$egresado=$this->session->userdata("egresado");
		$fecha_apertura=$this->Tramites_model->getTramitesapertura($id_tramite);	

if($egresado==1 and (DATE('Y-m-d',$fecha_apertura->desde)<=$fecha_hoy and $fecha_apertura->hasta>=$fecha_hoy )  ){
		$id_usuario = $this->session->userdata("id");
        $usuario=$this->Alumno_model->getAlumno_cedula($id_usuario);

		
		$data = array(
			'solicitudes' => $this->Solictudtramite_model->getListaSolTramites_egresos_grado($id_usuario,$id=2),
			'combotramite'=> $this->Tramites_model->getListaTramites_egreso($id_tramite),
			'alumno_list'=> $this->Alumno_model->getListaAlumno1($id_usuario),		
			
			'programa' =>$this->Materias_preinscrita_model->programas_inscritos($usuario->cedula),
			//'programa' =>$this->Programa_model->getProgramaMostrar($id_prog=array(1,2,3,5,6,4,14,20,21,23,24,25)),	
			'reconocimiento'=>$this->Tipo_reconocimiento_model->get(18),
			'periodo' => $this->Periodo_model->PeriodoActivo(),
		);

	
		$this->load->view('layouts/header');
		$this->load->view('layouts/sidebar_tramites');       
		$this->load->view('participante/tramites/solicitud_egreso_grado',$data);       
		$this->load->view('layouts/footer');
	}else{
		$this->session->set_flashdata("error","La solicitud no puede ser procesada, debe ser activado el trámite por la Direccion General de Secretaría ENFMP.");
		redirect(base_url()."dashboard09/index/2");
	}
	}
	public function solicitud_retiros($id)
	{
		$proceso_activo=$this->Tramites_model->getTramitesapertura($valor=array(3));
		$fecha_hoy=date('Y-m-d h:m:s' );
	
		if(!$proceso_activo ||  ($proceso_activo->desde<=$fecha_hoy and $proceso_activo->hasta>=$fecha_hoy )){
			$this->load->view('layouts/header');
			$this->load->view('layouts/sidebar_tramites');       
			$this->load->view('layouts/proceso_cerrado');       
			$this->load->view('layouts/footer');		
		
	}elseif($this->session->userdata("inscripcion")==1 )	{
				$id_usuario = $this->session->userdata("id");
				$usuario=$this->Alumno_model->getAlumno_cedula($id_usuario);
				$data = array(
				'combotramite'=> $this->Tramites_model->getListaTramites($id),
				'alumno_list'=> $this->Alumno_model->getListaAlumno1($id_usuario),			
				'programa' =>$this->Materias_preinscrita_model->programas_inscritos($usuario->cedula),
				'listado'=>$this->Materias_preinscrita_model->materias_validadas_periodo_vigente($id_usuario),
				'periodo' => $this->Periodo_model->PeriodoActivo(),
				);
				$this->load->view('layouts/header');
				$this->load->view('layouts/sidebar_tramites');
				if($id==1){			

				$this->load->view('participante/tramites/solicitud_retiros',$data); 
				}
				$this->load->view('layouts/footer');
		}
			
		
	}
	public function solicitud_ruc($id) //solicitud RUC
	{
		$proceso_activo=$this->Tramites_model->getTramitesapertura($valor=array(17,19));
		$usuario=array();    
	
		if(( $this->session->userdata("ruc_aprobadas")==1 and $proceso_activo )  or in_array($this->session->userdata("id"), $usuario)){

				$id_usuario = $this->session->userdata("id");
				$usuario=$this->Alumno_model->getAlumno_cedula($id_usuario);
				$data = array(
					'solicitudes' => $this->Solictudtramite_model->getListaSolTramites_ruc($id_usuario,$id=2),
					'alumno_list'=> $this->Alumno_model->getListaAlumno1($id_usuario),		
					'programa' =>$this->Programa_model->getProgramaMostrar($id_prog=array(1,2,3,5,6,4,20,21,23,26)),	
					'reconocimiento'=>$this->Tipo_reconocimiento_model->get(17),
					'periodo' => $this->Periodo_model->PeriodoActivo(),
					);
				$this->load->view('layouts/header');
				$this->load->view('layouts/sidebar_tramites');
				if($id==2){		
					$this->load->view('participante/tramites/solicitud_ruc',$data); 
				}
				$this->load->view('layouts/footer');
			}else{
				$this->load->view('layouts/header');
				$this->load->view('layouts/sidebar_tramites');       
				$this->load->view('layouts/proceso_cerrado');       
				$this->load->view('layouts/footer');
			}
		
	}	
	public function solicitud_ruc_requisitos($id)//pago de ruc aprobadas
	{
		$proceso_activo=$this->Tramites_model->getTramitesapertura('28');

		$usuario=array();         
		if(($proceso_activo and $this->session->userdata("ruc")==1 ) 
			or in_array($this->session->userdata("id"), $usuario)){

			$id_usuario = $this->session->userdata("id");
			$usuario=$this->Alumno_model->getAlumno_cedula($id_usuario);
			$data = array(
				'solicitudes' => $this->Solictudtramite_model->getListaSolTramites_ruc_solicitud($id_usuario,$id=2),
				'alumno_list'=> $this->Alumno_model->getListaAlumno1($id_usuario),		
				'programa' =>$this->Programa_model->getProgramaMostrar($id_prog=array(1,2,3,4,5,6,20,21,22,26)),	
				'reconocimiento'=>$this->Tipo_reconocimiento_model->get(17),
				'periodo' => $this->Periodo_model->PeriodoActivo(),
				);

			$this->load->view('layouts/header');
			$this->load->view('layouts/sidebar_tramites');
			if($id==2)	{						
				$this->load->view('participante/tramites/solicitud_ruc_requisitos',$data); 
			}
			$this->load->view('layouts/footer');
		}else{
			$this->load->view('layouts/header');
			$this->load->view('layouts/sidebar_tramites');
			$this->load->view('layouts/proceso_cerrado');
			$this->load->view('layouts/footer');
		}
	}	
	public function solicitud_reincorporacion()
	{
		$proceso_activo=$this->Tramites_model->getTramitesapertura(16);

		$usuario=array(3512,1813,4412);         
		if(($proceso_activo and $this->session->userdata("reincorporacion")==1 ) 
			or in_array($this->session->userdata("id"), $usuario)){
				$id_usuario = $this->session->userdata("id");
				$usuario=$this->Alumno_model->getAlumno_cedula($id_usuario);
				$tramite=16;
			
				$data = array(	
					'solicitudes' => $this->Solictudtramite_model->getListaSolTramites_rein_solicitud($id_usuario,$id=2),		
					'combotramite'=> $this->Tramites_model->getListaTramites_egreso($tramite),
					'trimestre'=> $this->Trimestre_model->getTrimestre(),
					'alumno_list'=> $this->Alumno_model->getListaAlumno1($id_usuario),		
					'programa' =>$this->Programa_model->getProgramaMostrar($id=array(1,2,3,5,6,4,20,21,22,26)),		
					'periodo' => $this->Periodo_model->PeriodoActivo(),
				);

				$this->load->view('layouts/header');
				$this->load->view('layouts/sidebar_tramites');       
				$this->load->view('participante/tramites/solicitud_reincorporacion',$data);       
				$this->load->view('layouts/footer');
			}else{
				$this->load->view('layouts/header');
				$this->load->view('layouts/sidebar_tramites');       
				$this->load->view('layouts/proceso_cerrado');       
				$this->load->view('layouts/footer');
			}
		
	}	
	public function edit_reincorporacion($id_solicitud,$id)
	{
		$id_usuario = $this->session->userdata("id");
        $usuario=$this->Alumno_model->getAlumno_cedula($id_usuario);
		$tramite=16;

		$data = array(			
			'combotramite'=> $this->Tramites_model->getListaTramites_egreso($tramite),
			'solicitud'=>$this->Solictudtramite_model->getSolicitud($id_solicitud),
			'trimestre'=> $this->Trimestre_model->getTrimestre(),
			'alumno_list'=> $this->Alumno_model->getListaAlumno1($id_usuario),		
			'programa' =>$this->Programa_model->getProgramaMostrar($id=array(1,2,3,5,6,4,20,21,22,26)),		
			'periodo' => $this->Periodo_model->PeriodoActivo(),
		);

		$this->load->view('layouts/header');
		$this->load->view('layouts/sidebar_tramites');       
		$this->load->view('participante/tramites/solicitud_reincorporacion_edit_archivo',$data);       
		$this->load->view('layouts/footer');
	}	
	public function combotramite($id)
	{
	//id es el programa
		if($id)
		{

			echo $this->Tramites_model->getListaTramites_programas($id);
		}

	}	
	public function combotramiteRuc($id)
	{
	//id es el programa
		if($id)
		{
			

			echo $this->Tramites_model->getListaTramitesRuc($id);
		}

	}
	public function combotramiteRuc_requisito($id)
	{
	//id es el programa
		if($id)
		{

			echo $this->Tramites_model->getListaTramitesRuc_requisito($id);
		}

	}
	public function programa_pensun_seleccionado($id) {
		if($id) {
			$data = $this->Pensum_model->getlistPensum_seleccionado($id);
			echo json_encode($data ? $data : []);
		} else {
			echo json_encode([]);
		}
	}
	
	public function registrotramite_store($id){
		$id_usuario = $this->session->userdata("id");
		$fecha_actual=date("Y-m-d H:i:s");
		$fecha_solicitud=date("Y-m-d");
		$egresado=$this->session->userdata("egresado");
		$id_tramite= $this->input->post("combotramite");
		$periodo=$this->Periodo_model->PeriodoActivo();
		$usuario= $this->Alumno_model->getAlumno_cedula($id_usuario);		
		$fecha_hoy=date('Y-m-d h:m:s' );
		if($id==2){
			$id_programa= $this->input->post("comboprograma");	
			$data  = array(
				'id_usuario' => $id_usuario, 
				'id_tramite' => $id_tramite,
				'id_programa' => $id_programa,
				'fecha_registro' => $fecha_actual,
				'fecha_solicitud' => $fecha_solicitud,			
				'status' => 1,			
				'quien_registro'=>$id_usuario, 
				
			);
					switch ($id_tramite) {
						case 14:
						case 15:// Articulo cientifico
							$fecha_apertura=$this->Tramites_model->getTramitesapertura($id_tramite);						
							if($egresado==1 and ($fecha_apertura->desde<=$fecha_hoy and $fecha_apertura->hasta>=$fecha_hoy )  ){
								//echo "articulo cientifico".$id_usuario.$id_tramite.$id_programa;
								if ($this->Solictudtramite_model->VerificarSolicitud_defensa($id_usuario,array(1,2),trim($id_programa))){
								//	echo "si hay defensa".$id_usuario.$id_tramite.$id_programa;
									if( !$this->Solictudtramite_model->VerificarSolicitud($id_usuario,$id_tramite,$id_programa)){
										if ($this->Solictudtramite_model->save($data)){
											?>
												<script> alert ("Solicitud Registrada.");
												location.assign("<?php echo base_url(); ?>dashboard09/index/2");   
												</script>
											<?php 
										}else{
											$this->session->set_flashdata("error","Error al guardar la información.");
											redirect(base_url()."dashboard09/index/2");
										}
									}else{
										$this->session->set_flashdata("warning","La solicitud ya se encuentra registrada.");
											redirect(base_url()."dashboard09/index/2");
									}
								}else{
									$this->session->set_flashdata("error","La solicitud no puede ser procesada, debe solicitar o completar registro de Defensa de grado.");
								redirect(base_url()."dashboard09/index/2");
								}
							}else{
								$this->session->set_flashdata("error","La solicitud no puede ser procesada, debe ser activado el trámite por la Direccion General de Secretaría ENFMP.");
								redirect(base_url()."dashboard09/index/2");
							}
						break;
						case 1:
						case 2:// defensa trabajo grado
							$fecha_apertura=$this->Tramites_model->getTramitesapertura($id_tramite);
						
	
						
							if($egresado==1 ){ //and ($fecha_apertura->desde<=$fecha_hoy and $fecha_apertura->hasta>=$fecha_hoy )  ){
								//echo "esta en la fecha correcta";
								$programa_defensa=$this->Materias_preinscrita_model->programas_inscritos($usuario->cedula);					
						
									if(count($programa_defensa)>0){
										$i=0;
										foreach($programa_defensa as $programa_defensa):
										//	echo($programa_defensa->id);
											if(intVal($programa_defensa->id)==trim($id_programa)){
											//	echo "coincide";
											$i++;
												if (!$this->Solictudtramite_model->VerificarSolicitud_defensa($id_usuario,array(1,2),trim($id_programa))){
												
														if ($this->Solictudtramite_model->save($data)){
															?>
																<script> alert ("Solicitud Registrada.");
																location.assign("<?php echo base_url(); ?>dashboard09/index/2");   
																</script>
															<?php 
														}else{
															$this->session->set_flashdata("error","Error al guardar la información.");
															redirect(base_url()."dashboard09/index/".$id);
														}
													
												}else{
													$this->session->set_flashdata("warning","La solicitud ya se encuentra registrada.");
													redirect(base_url()."dashboard09/index/".$id);
												}
											}
									
										endforeach;
										if($i==0){
											$this->session->set_flashdata("error","El programa de postgrado solicitado no puede generar trámite de Defensa de grado.");
											redirect(base_url()."dashboard09/index/".$id);
										}
									}else{
										$this->session->set_flashdata("error","No posee programa de postgrado culminado para generar trámite.");
										redirect(base_url()."dashboard09/index/".$id);
									}
							}else{
								$this->session->set_flashdata("error","La solicitud no puede ser procesada, debe ser activado el trámite por la Direccion General de Secretaría ENFMP.");
								redirect(base_url()."dashboard09/index/2");
							}
						break;
						case 22:// constancia de estudio
						case 24:
							
							$programa_inscrito=$this->Materias_preinscrita_model->Materia_alumno($id_usuario,$id_programa);
							
							$procesar_constancia=$this->Materias_preinscrita_model->materias_preinscritas_periodo($id_usuario,$periodo->id,$id_programa);
							if(!$procesar_constancia or empty($programa_inscrito)){
								?>
										<script> alert ("NO tiene unidades curriculares inscritas para el programa seleccionado en el período académico vigente.");
										location.assign("<?php echo base_url(); ?>dashboard09/index/2");   
										</script>
									<?php 
							}else{
								if (!$this->Solictudtramite_model->VerificarSolicitud($id_usuario,$id_tramite,$id_programa)){
									if ($this->Solictudtramite_model->save($data)){
										?>
											<script> alert ("Solicitud Registrada.");
											location.assign("<?php echo base_url(); ?>dashboard09/index/2");   
											</script>
										<?php 
									}else{
										$this->session->set_flashdata("error","Error al guardar la información.");
										redirect(base_url()."dashboard09/index/".$id);
									}
								}else{
									$this->session->set_flashdata("warning","La solicitud ya se encuentra registrada.");
										redirect(base_url()."dashboard09/index/".$id);
								}
							}
						break;
						case 18:
							$fecha_apertura=$this->Tramites_model->getTramitesapertura($id_tramite);	
							$id_programa= $this->input->post("cbo_programa");	
							$id_reconocimiento= $this->input->post("comboreconocimiento");		
							$data  = array(
								'id_usuario' => $id_usuario, 
								'id_tramite' => $id_tramite,
								'id_programa' => $id_programa,
								'fecha_registro' => $fecha_actual,
								'fecha_solicitud' => $fecha_solicitud,			
								'status' => 1,			
								'quien_registro'=>$id_usuario, 
								'id_tipo_reconocimiento'=>$id_reconocimiento,	
								
							);		
				
							if($egresado==1 and (date('Y-m-d',$fecha_apertura->desde)<=date('Y-m-d',$fecha_hoy) and $fecha_apertura->hasta>=$fecha_hoy)   ){
								//echo "articulo cientifico".$id_usuario.$id_tramite.$id_programa;
								if ($this->Solictudtramite_model->VerificarSolicitud_defensa($id_usuario,array(14,15),trim($id_programa)) ){
								//	echo "si hay defensa".$id_usuario.$id_tramite.$id_programa;
									if( !$this->Solictudtramite_model->VerificarSolicitud($id_usuario,$id_tramite,$id_programa)){
										if ($this->Solictudtramite_model->save($data)){
											?>
												<script> alert ("Solicitud Registrada.");
												location.assign("<?php echo base_url(); ?>dashboard09/solicitud_egreso/2");   
												</script>
											<?php 
										}else{
											$this->session->set_flashdata("error","Error al guardar la información.");
											redirect(base_url()."dashboard09/solicitud_egreso/2");
										}
									}else{
										$this->session->set_flashdata("warning","La solicitud ya se encuentra registrada.");
											redirect(base_url()."dashboard09/solicitud_egreso/2");
									}
								}else{
									$this->session->set_flashdata("error","La solicitud no puede ser procesada, debe solicitar o completar registro de Solicitud de Egreso.");
								redirect(base_url()."dashboard09/solicitud_egreso/2");
								}
							}else{
								$this->session->set_flashdata("error","La solicitud no puede ser procesada, debe ser activado el trámite por la Direccion General de Secretaría ENFMP.");
								redirect(base_url()."dashboard09/solicitud_egreso/2");
							}
						break;
						default:
							if (!$this->Solictudtramite_model->VerificarSolicitud($id_usuario,$id_tramite,$id_programa)){
								if ($this->Solictudtramite_model->save($data)){
									?>
										<script> alert ("Solicitud Registrada.");
										location.assign("<?php echo base_url(); ?>dashboard09/index/2");   
										</script>
									<?php 
								}else{
									$this->session->set_flashdata("error","Error al guardar la información.");
									redirect(base_url()."dashboard09/index/".$id);
								}
							}else{
								$this->session->set_flashdata("warning","La solicitud ya se encuentra registrada.");
									redirect(base_url()."dashboard09/index/".$id);
							}
						break;
					}
						
		}elseif($id==1){
			//echo "tramite academico. Retiro Voluntario";
			if($this->revisar_archivo()){
				$materia = $this->input->post("str");
				
				if($materia){
					// Obtener las materias seleccionadas
					$seleccionado = $this->Materias_preinscrita_model->materia_inscrita_seleccionada($materia);
					$solicitud_registrada = 0;
					$fecha_actual = date('Y-m-d H:i:s');
					$fecha_solicitud = date('Y-m-d');
					
					// Array para almacenar programas ya procesados
					$programas_procesados = array();
					
					foreach($seleccionado as $seleccionado){
						$id_programa = $seleccionado->id_programa;
						
						// Verificar si este programa ya fue procesado
						if(in_array($id_programa, $programas_procesados)){
							continue;
						}
						$programas_procesados[] = $id_programa;
						
						// Obtener todas las materias inscritas del estudiante en este programa
						$materias_inscritas_programa = $this->Materias_preinscrita_model->materia_inscrita_programa($id_programa, $id_usuario, $periodo->id);
						
						// Obtener las materias seleccionadas para este programa
						$unidades_seleccionadas = $this->Materias_preinscrita_model->materia_inscrita_seleccionada_programa($materia, $id_programa);
						
						// Separar materias regulares y línea de investigación
						$materias_regulares = array();
						$materias_linea = array();
						$linea_seleccionada = false;
						
						foreach($materias_inscritas_programa as $materia_inscrita){
							if(
							   $materia_inscrita->trimestre == 'LÍNEA DE INVESTIGACIÓN'  ){
								$materias_linea[] = $materia_inscrita;
							} else {
								$materias_regulares[] = $materia_inscrita;
							}
						}
						
						// Verificar qué materias fueron seleccionadas
						$ids_seleccionados = array();
						$linea_seleccionada = false;
						
						foreach($unidades_seleccionadas as $unidad){
							$ids_seleccionados[] = $unidad->id;
							// Verificar si la línea fue seleccionada
							if(
							   $unidad->trimestre == 'LÍNEA DE INVESTIGACIÓN'  ){
								$linea_seleccionada = true;
							}
						}
						
						// DETERMINAR LA ACCIÓN A TOMAR
						if($linea_seleccionada){
							// *** CASO 1: Se seleccionó LÍNEA DE INVESTIGACIÓN ***
							// Aquí hay dos subcasos:
							
							// Verificar si seleccionó TODAS las materias (regulares + línea)
							$total_materias_programa = count($materias_inscritas_programa);
							$total_seleccionadas = count($ids_seleccionados);
							
							if($total_seleccionadas == $total_materias_programa){
								// *** SUBCASO 1.1: Seleccionó TODAS (regulares + línea) ***
								// Retirar SOLO las materias regulares, NO la línea
								$ids_materias_regulares = array();
								foreach($materias_regulares as $materia_reg){
									$ids_materias_regulares[] = $materia_reg->id;
								}
								
								// Marcar SOLO las materias regulares con sol_retiro=1
								if(!empty($ids_materias_regulares)){
									$ids_str = implode(',', $ids_materias_regulares);
									$data2 = array('sol_retiro' => 1);
									$this->Materias_preinscrita_model->update($ids_str, $data2);
								}
								
								// La línea de investigación NO se marca (queda sol_retiro=0)
								
								// Registrar solicitud de retiro masivo (sin línea)
								$data_solicitud = array(
									'id_usuario' => $id_usuario,
									'id_tramite' => $id_tramite,
									'id_programa' => $id_programa,
									'fecha_registro' => $fecha_actual,
									'fecha_solicitud' => $fecha_solicitud,
									'status' => 1,
									'quien_registro' => $id_usuario,
									'periodo_solicitud_retiro' => $periodo->id,
								
								);
								
								if($this->Solictudtramite_model->save($data_solicitud)){
									$solicitud_registrada = 1;
								} else {
									$this->session->set_flashdata("error", "Error al guardar la solicitud de retiro.");
									redirect(base_url()."dashboard09/solicitud_retiros/1");
								}
								
							} else {
								// *** SUBCASO 1.2: Seleccionó línea + algunas regulares ***
								// Retirar TODAS las materias regulares (porque línea implica retiro total)
								// pero NO retirar la línea
								
								$ids_materias_regulares = array();
								foreach($materias_regulares as $materia_reg){
									$ids_materias_regulares[] = $materia_reg->id;
								}
								
								// Marcar TODAS las materias regulares con sol_retiro=1
								if(!empty($ids_materias_regulares)){
									$ids_str = implode(',', $ids_materias_regulares);
									$data2 = array('sol_retiro' => 1);
									$this->Materias_preinscrita_model->update($ids_str, $data2);
								}
								
								// La línea de investigación NO se marca
								
								// Registrar solicitud de retiro total (sin línea)
								$data_solicitud = array(
									'id_usuario' => $id_usuario,
									'id_tramite' => $id_tramite,
									'id_programa' => $id_programa,
									'fecha_registro' => $fecha_actual,
									'fecha_solicitud' => $fecha_solicitud,
									'status' => 1,
									'quien_registro' => $id_usuario,
									'periodo_solicitud_retiro' => $periodo->id,
			
								);
								
								if($this->Solictudtramite_model->save($data_solicitud)){
									$solicitud_registrada = 1;
								} else {
									$this->session->set_flashdata("error", "Error al guardar la solicitud de retiro.");
									redirect(base_url()."dashboard09/solicitud_retiros/1");
								}
							}
							
						} else {
							// *** CASO 2: NO se seleccionó línea de investigación ***
// Solo se retiran las materias seleccionadas

// Verificar si seleccionó TODAS las materias regulares
$total_regulares = count($materias_regulares);
$seleccionadas_regulares = 0;
foreach($ids_seleccionados as $id_sel){
    foreach($materias_regulares as $materia_reg){
        if($materia_reg->id == $id_sel){
            $seleccionadas_regulares++;
            break;
        }
    }
}

$todas_las_regulares = ($seleccionadas_regulares == $total_regulares && $total_regulares > 0);

if($todas_las_regulares){
    // Seleccionó TODAS las materias regulares
    
    // PRIMERO: Guardar la solicitud para obtener el ID
    $data_solicitud = array(
        'id_usuario' => $id_usuario,
        'id_tramite' => $id_tramite,
        'id_programa' => $id_programa,
        'fecha_registro' => $fecha_actual,
        'fecha_solicitud' => $fecha_solicitud,
        'status' => 1,
        'quien_registro' => $id_usuario,
        'periodo_solicitud_retiro' => $periodo->id,
    );
    
    // Guardar la solicitud y obtener el ID insertado
    if($this->Solictudtramite_model->save($data_solicitud)){
        $id_solicitud_retiro = $this->db->insert_id(); // Obtener el ID de la solicitud guardada
        $solicitud_registrada = 1;
        
        // Ahora actualizar las materias con el ID de la solicitud
        $ids_materias_regulares = array();
        foreach($materias_regulares as $materia_reg){
            $ids_materias_regulares[] = $materia_reg->id;
        }
        
        if(!empty($ids_materias_regulares)){
            $ids_str = implode(',', $ids_materias_regulares);
            $data2 = array(
                'sol_retiro' => 1,
                'id_solicitud_retiro' => $id_solicitud_retiro
            );
            $this->Materias_preinscrita_model->update($ids_str, $data2);
        }
        
    } else {
        $this->session->set_flashdata("error", "Error al guardar la solicitud de retiro.");
        redirect(base_url()."dashboard09/solicitud_retiros/1");
    }
    
} else {
								// Seleccionó SOLO ALGUNAS materias (retiro parcial)
								$ids_seleccionadas = array();
								foreach($unidades_seleccionadas as $unidad){
									$ids_seleccionadas[] = $unidad->id;
								}
								
								// Verificar si ya existe solicitud para este programa
								$existe_solicitud = $this->Solictudtramite_model->VerificarSolicitud($id_usuario, $id_tramite, $id_programa);
								
								if(!$existe_solicitud){
									// PRIMERO: Guardar la solicitud para obtener el ID
									$data_solicitud = array(
										'id_usuario' => $id_usuario,
										'id_tramite' => $id_tramite,
										'id_programa' => $id_programa,
										'fecha_registro' => $fecha_actual,
										'fecha_solicitud' => $fecha_solicitud,
										'status' => 1,
										'quien_registro' => $id_usuario,
										'periodo_solicitud_retiro' => $periodo->id,
									);
									
									// Guardar la solicitud y obtener el ID insertado
									if($this->Solictudtramite_model->save($data_solicitud)){
										$id_solicitud_retiro = $this->db->insert_id(); // Obtener el ID de la solicitud guardada
										$solicitud_registrada = 1;
										
										// Ahora actualizar las materias seleccionadas con el ID de la solicitud
										if(!empty($ids_seleccionadas)){
											$ids_str = implode(',', $ids_seleccionadas);
											$data2 = array(
												'sol_retiro' => 1,
												'id_solicitud_retiro' => $id_solicitud_retiro
											);
											$this->Materias_preinscrita_model->update($ids_str, $data2);
										}
										
									} else {
										$this->session->set_flashdata("error", "Error al guardar la solicitud de retiro parcial.");
										redirect(base_url()."dashboard09/solicitud_retiros/1");
									}
								} else {
									// Ya existe solicitud, solo actualizar las materias
									if(!empty($ids_seleccionadas)){
										$ids_str = implode(',', $ids_seleccionadas);
										$data2 = array(
											'sol_retiro' => 1,
											'id_solicitud_retiro' => $existe_solicitud->id_solicitud // Asumiendo que devuelve el objeto con el ID
										);
										$this->Materias_preinscrita_model->update($ids_str, $data2);
									}
									$solicitud_registrada = 1;
								}
							}
						}
					}
					
					if($solicitud_registrada == 1){
						?>
						<script>
							alert("Solicitud de retiro voluntario ha sido Registrada.");
							location.assign("<?php echo base_url(); ?>dashboard09/solicitud_retiros/1");
						</script>
						<?php
					}
					
				} else {
					$this->session->set_flashdata("error", "Debe seleccionar la unidad curricular a tramitar.");
					redirect(base_url()."dashboard09/solicitud_retiros/1");
				}
			}
	}// end del if 
	}

	public function revisar_archivo(){
    
		extract($_REQUEST);
		echo $nombre_archivo = $_FILES['userfile']['name'];
		echo $tipo_archivo = $_FILES['userfile']['type'];
		echo $tamano_archivo = $_FILES['userfile']['size'];
	
		// Obtener el período activo
		$periodo = $this->Periodo_model->PeriodoActivo();
		if (!$periodo) {
			$this->session->set_flashdata("error", "No hay un período académico activo.");
			redirect(base_url()."dashboard09/solicitud_retiros/1");
			return false;
		}
	
		// Crear el nombre de la carpeta con el período
		$carpeta_periodo = 'periodo_' . $periodo->id . '_' . str_replace('/', '_', $periodo->nombre);
		$ruta_base = 'assets/tramites/retiro_voluntario/';
		$ruta_completa = $ruta_base . $carpeta_periodo . '/';
	
		// Crear la carpeta si no existe
		if (!is_dir($ruta_completa)) {
			mkdir($ruta_completa, 0777, true);
		}
	
		// Verificar el formato del archivo
		if (!((strpos($tipo_archivo, "pdf")))) {
			$mensaje = $nombre_archivo.' - '.$tipo_archivo.' - '.$tamano_archivo;
			$mensaje .= $tipo_archivo." <strong>El formato del archivo es invalido. El archivo debe tener el formato: .pdf</strong>";
		} else if (($tamano_archivo > 1048576)) {
			$mensaje = "<strong>El documento no puede exceder de 1 Mb, el archivo que intenta cargar tiene un tama&ntilde;o de: ".number_format($tamano_archivo/1048576,2)." Mb </strong><br/> Seleccione otra imagen e intente de nuevo";
		} else {
			// Todo ok, subir el archivo
			if (strpos($tipo_archivo, "pdf") && 
				move_uploaded_file($_FILES['userfile']['tmp_name'], 
								   $ruta_completa . $this->session->userdata('id') . "_retiro_voluntario.pdf")) {
				$mensaje = "";
			} else {
				$mensaje = "Ocurrio algun error al subir el archivo. No pudo guardarse.";
			}
		}
		
		if ($mensaje == "") {
			// Registrar en la base de datos
			$data = array(
				'id_usuario' => $this->session->userdata('id'),
				'id_requisito' => '13',
				'id_periodo' => $periodo->id,
			);
	
			if (!$this->Control_requisitos_model->getControl_requisitos($periodo->id, 13, $this->session->userdata('id'))) {
				$this->Control_requisitos_model->save($data);        
				echo "guarde archivo";
				return true;
			} else {
				echo "NO guarde archivo";
				return true;
			}
		} else {
			$this->session->set_flashdata("error", $mensaje);
			redirect(base_url()."dashboard09/solicitud_retiros/1");
			return false;
		}
	}
	public function actualizar_archivo(){ // actualizar archivo solicitud de retiro voluntario
    
		extract($_REQUEST);
		echo $nombre_archivo = $_FILES['userfile']['name'];
		echo $tipo_archivo = $_FILES['userfile']['type'];
		echo $tamano_archivo = $_FILES['userfile']['size'];
	
		// Obtener el período activo
		$periodo = $this->Periodo_model->PeriodoActivo();
		if (!$periodo) {
			$this->session->set_flashdata("error", "No hay un período académico activo.");
			redirect(base_url()."dashboard09/index/1");
			return false;
		}
	
		// Crear el nombre de la carpeta con el período
		$carpeta_periodo = 'periodo_' . $periodo->id . '_' . str_replace('/', '_', $periodo->nombre);
		$ruta_base = 'assets/tramites/retiro_voluntario/';
		$ruta_completa = $ruta_base . $carpeta_periodo . '/';
	
		// Crear la carpeta si no existe
		if (!is_dir($ruta_completa)) {
			mkdir($ruta_completa, 0777, true);
		}
	
		// Verificar el formato del archivo
		if (!((strpos($tipo_archivo, "pdf")))) {
			$mensaje = $nombre_archivo.' - '.$tipo_archivo.' - '.$tamano_archivo;
			$mensaje .= $tipo_archivo." <strong>El formato del archivo es invalido. El archivo debe tener el formato: .pdf</strong>";
		} else if (($tamano_archivo > 1048576)) {
			$mensaje = "<strong>El documento no puede exceder de 1 Mb, el archivo que intenta cargar tiene un tama&ntilde;o de: ".number_format($tamano_archivo/1048576,2)." Mb </strong><br/> Seleccione otra imagen e intente de nuevo";
		} else {
			// Nombre del archivo
			$nombre_archivo_final = $this->session->userdata('id') . "_retiro_voluntario.pdf";
			$ruta_destino = $ruta_completa . $nombre_archivo_final;
			
			// Verificar si el archivo ya existe y eliminarlo (opcional, para evitar duplicados)
			if (file_exists($ruta_destino)) {
				unlink($ruta_destino); // Elimina el archivo anterior
			}
			
			// Todo ok, subir el archivo
			if (strpos($tipo_archivo, "pdf") && move_uploaded_file($_FILES['userfile']['tmp_name'], $ruta_destino)) {
				$mensaje = "";
				
				// Actualizar la solicitud con el nombre de la carpeta período
				if (isset($id_solicitud) && !empty($id_solicitud)) {
					$this->db->where('id_solicitud', $id_solicitud);
					$this->db->update('solicitudes', array(
						'periodo_solicitud_retiro' => $carpeta_periodo,
						'fecha_actualizacion' => date("Y-m-d H:i:s")
					));
				}
			} else {
				$mensaje = "Ocurrio algun error al subir el archivo. No pudo guardarse.";
			}
		}
		
		if ($mensaje == "") {
			$periodo = $this->Periodo_model->PeriodoActivo();        
			$id = $this->input->post('id'); // Asegurar que $id esté definido
			
			if (!$this->Control_requisitos_model->getControl_requisitos($periodo->id, 13, $this->session->userdata('id'))) {
				$fecha = date("Y-m-d H:i:s");
				$data2 = array(
					'fecha_actualizacion' => $fecha,
					'periodo_solicitud_retiro' => $carpeta_periodo // Guardar también aquí si tienes el campo
				);
	
				$retorno = $this->Control_requisitos_model->update($this->session->userdata('id'), $periodo->id, 13, $data2);
			
				$this->session->set_flashdata("warning", "El requisito fue actualizado correctamente.");
				redirect(base_url()."dashboard09/index/1");
			} else {
				// Si ya existe el registro, solo actualizar
				$fecha = date("Y-m-d H:i:s");
				$data2 = array(
					'fecha_actualizacion' => $fecha
				);
				$this->Control_requisitos_model->update($this->session->userdata('id'), $periodo->id, 13, $data2);
				$this->session->set_flashdata("success", "El archivo fue actualizado correctamente.");
				redirect(base_url()."dashboard09/index/1");
			}
		} else {
			$this->session->set_flashdata("error", $mensaje);
			redirect(base_url()."dashboard09/index/1");
		}
	}
public function actualizar_archivo_reincorporacion(){// actualizar archi solicitud de reincorporacion
	 $id_programa=$this->input->post("id_programa");
	
	//guardar el archivo requisitod y registrar en controlde equisitos
	extract($_REQUEST);
	 $nombre_archivo = $_FILES['userfile']['name'];
	 $tipo_archivo = $_FILES['userfile']['type'];
	 $tamano_archivo = $_FILES['userfile']['size'];

	//compruebo si las caracter�sticas del archivo son las que deseo
	if (!((strpos($tipo_archivo, "pdf") )))
	{ // formato incorrecto
		$mensaje = $nombre_archivo.' - '.$tipo_archivo.' - '.$tamano_archivo;
		$mensaje.=$tipo_archivo." <strong>El formato del archivo es invalido. El archivo debe tener el formato: .pdf</strong>";
	} else if (($tamano_archivo > 1048576)) { // excede el tama�o permitido
	$mensaje="<strong>El documento  no puede exceder de 1 Mb, el archivo que intenta cargar tiene un tama&ntilde;o de: ".number_format($tamano_archivo/1048576,2)." Mb </strong><br/> Seleccione otra imagen e intente de nuevo";
	} else { // todo ok
		if(strpos($tipo_archivo, "pdf")&& move_uploaded_file($_FILES['userfile']['tmp_name'], 'assets/tramites/reincorporaciones/solicitud/'.$this->session->userdata("id").'_'.$id_programa.'_solicitud.pdf')){
			$mensaje="";
		} else {
			$mensaje="Ocurrio algun error al subir el archivo. No pudo guardarse.";
		}
	}

if ($mensaje=="") {
	//echo "estoy aqui";
	$periodo=$this->Periodo_model->PeriodoActivo();		
	
	// var_dump($data);
	if($this->Control_requisitos_model->getControl_requisitos($periodo->id,15,$this->session->userdata('id'))){
		$fecha=date("Y-m-d H:i:s");
		$data2= array(
		'fecha_actualizacion'=>$fecha,);

		$retorno=$this->Control_requisitos_model->update($this->session->userdata('id'),$periodo->id,15,$data2);
	
		$this->session->set_flashdata("warning","El requisito fue actualizado.");
		redirect(base_url()."dashboard09/solicitud_reincorporacion/2");
				
	}else{
		$this->session->set_flashdata("error","Error al guardar información.");
		redirect(base_url()."dashboard09/solicitud_reincorporacion/2");
	}
	
}else{
	//echo "estoy aqui nooo";
	$this->session->set_flashdata("error",$mensaje);
	redirect(base_url()."dashboard09/solicitud_reincorporacion/2");
}


}
	public function tramites_edit($id_solicitud,$id){
		$id_usuario = $this->session->userdata("id");
         $usuario=$this->Alumno_model->getAlumno_cedula($id_usuario);
		$data = array( 'solicitud'=>$this->Solictudtramite_model->getSolicitud($id_solicitud),
					   'programa' =>$this->Materias_preinscrita_model->programas_inscritos($usuario->cedula),
					   'combotramite'=> $this->Tramites_model->getListaTramites($id),
						);


		$this->load->view('layouts/header');
		$this->load->view('layouts/sidebar_tramites');
		$this->load->view('participante/tramites/solicitud_edit',$data);
		$this->load->view('layouts/footer');
	}
	public function retiros_archivo_edit($id_solicitud,$id){
		 $id_usuario = $this->session->userdata("id");
         $usuario=$this->Alumno_model->getAlumno_cedula($id_usuario);
		$data = array( 
					   'alumno_list'=> $this->Alumno_model->getListaAlumno1($id_usuario),	
					   'solicitud'=>$this->Solictudtramite_model->getSolicitud($id_solicitud),
					   'programa' =>$this->Materias_preinscrita_model->programas_inscritos($usuario->cedula),
					   'combotramite'=> $this->Tramites_model->getListaTramites($id),
					   'id'=>$id
						);


		$this->load->view('layouts/header');
		$this->load->view('layouts/sidebar_tramites');
		$this->load->view('participante/tramites/solicitud_retiro_edit_archivo',$data);
		$this->load->view('layouts/footer');
	}
	public function retiros_edit($id_solicitud,$id){
		$id_usuario = $this->session->userdata("id");
		$programa= $this->Solictudtramite_model->getSolicitud($id_solicitud);
		
        $usuario=$this->Alumno_model->getAlumno_cedula($id_usuario);
		$data = array( 	'alumno_list'=> $this->Alumno_model->getListaAlumno1($id_usuario),	
						'listado'=>$this->Materias_preinscrita_model->materias_solicitadas_retiro($programa->id_programa,$id_usuario,$id_solicitud),
						'solicitud'=>$this->Solictudtramite_model->getSolicitud($id_solicitud),
					   	'programa' =>$this->Materias_preinscrita_model->programas_inscritos($usuario->cedula),
					   	'combotramite'=> $this->Tramites_model->getListaTramites($id),
						'periodo' => $this->Periodo_model->PeriodoActivo(),
					  	'id'=>$id
						);
		$this->load->view('layouts/header');
		$this->load->view('layouts/sidebar_tramites');
		$this->load->view('participante/tramites/solicitud_retiro_edit',$data);
		$this->load->view('layouts/footer');
	}
	public function registrotramite_update($id){
		$id_usuario = $this->session->userdata("id");
		$fecha_actual=date("Y-m-d H:i:s");
		$id_solicitud=$this->input->post("id_solicitud");
		$id_tramite= $this->input->post("combotramite");
		$id_programa= $this->input->post("comboprograma");
		$data  = array(			 
			'id_tramite' => $id_tramite,
			'id_programa' => $id_programa,
			'fecha_actualizacion' => $fecha_actual,
			'quien_actualizo' => $id_usuario,			
			'status' => 1,					
		);
		
			if ($this->Solictudtramite_model->update($id_solicitud,$data)){
				?>
					<script> alert ("Solicitud Actualizada.");
					location.assign("<?php echo base_url(); ?>dashboard09/index/<?php echo $id;?>");   
					</script>
				<?php 
			}else{
				$this->session->set_flashdata("error","Error al guardar la información.");
				redirect(base_url()."dashboard09/index/".$id);
			}

	}
	public function registrotramiteRetiro_update($id) {
		$id_usuario = $this->session->userdata("id");
		$fecha_actual = date("Y-m-d H:i:s");
		$id_solicitud = $this->input->post("id_solicitud");
		$id_tramite = $this->input->post("combotramite");
		$id_programa = $this->input->post("comboprograma");
		$materias = $this->input->post("str");
	
		// Validar que exista la solicitud
		if (empty($id_solicitud)) {
			$this->session->set_flashdata("error", "ID de solicitud no válido.");
			redirect(base_url() . "dashboard09/index/1");
			return;
		}
	
		// Validar que haya materias seleccionadas
		if (empty($materias)) {
			$this->session->set_flashdata("warning", "No hay materias seleccionadas.");
			redirect(base_url() . "dashboard09/index/1");
			return;
		}
	
		$periodo= $this->Solictudtramite_model->getSolicitud($id_solicitud);
		// Validar que haya materias seleccionadas
		if (empty($periodo)) {
			$this->session->set_flashdata("warning", "No hay  periodo validos.");
			redirect(base_url() . "dashboard09/index/1");
			return;
		}

		// Obtener las materias seleccionadas actualmente (POST)
		$ids_seleccionados = explode(',', $materias);
		$ids_seleccionados = array_map('intval', $ids_seleccionados);
	
		// Obtener todas las materias inscritas del programa para este usuario
		$materias_programa_inscritas = $this->Materias_preinscrita_model->materias_preinscritas_periodo($id_usuario,$periodo->periodo_solicitud_retiro,$id_programa);
		
		if (empty($materias_programa_inscritas)) {
			$this->session->set_flashdata("warning", "No hay materias inscritas para este programa.");
			redirect(base_url() . "dashboard09/index/1");
			return;
		}
		
		// Obtener TODOS los IDs de las materias del programa
		$ids_todas = array();
		foreach ($materias_programa_inscritas as $materia) {
			$ids_todas[] = (int)$materia->id;
		}
		
		// Buscar el ID de la Línea de Investigación
		$id_linea = null;
		$lineas_investigacion = array('LÍNEA DE INVESTIGACIÓN');
		
		foreach ($materias_programa_inscritas as $materia) {
			if (in_array($materia->trimestre, $lineas_investigacion)) {
				$id_linea = (int)$materia->id;
				break;
			}
		}
		
		// Verificar si la LÍNEA DE INVESTIGACIÓN está seleccionada
		$linea_seleccionada = false;
		if (!is_null($id_linea) && in_array($id_linea, $ids_seleccionados)) {
			$linea_seleccionada = true;
		}
		
		// ================================================================
		// DETERMINAR QUÉ IDs MARCAR Y CUÁLES LIMPIAR
		// ================================================================
		if ($linea_seleccionada) {
			// CASO 1: Línea seleccionada → Marcar TODAS las materias
			$ids_a_marcar = $ids_todas;
			$ids_a_limpiar = array(); // No se limpia ninguna
			$mensaje = "Retiro Total: Se marcaron todas las materias del programa incluyendo la Línea de Investigación.";
		} else {
			// CASO 2: Sin línea → Marcar SOLO los IDs seleccionados
			$ids_a_marcar = $ids_seleccionados;
			
			// IDs a limpiar (las que NO están seleccionadas)
			$ids_a_limpiar = array_diff($ids_todas, $ids_seleccionados);
			$mensaje = "Solicitud Actualizada con éxito.";
		}
		
		// ================================================================
		// PASO 1: LIMPIAR las materias que no deben estar marcadas
		// (sol_retiro=0, id_solicitud_retiro=0)
		// ================================================================
		if (!empty($ids_a_limpiar)) {
			$ids_str = implode(',', $ids_a_limpiar);
			$data_reset = array(
				'sol_retiro' => 0,
				'id_solicitud_retiro' => 0,
				'quien_actualizo' => $id_usuario,
				'fecha_actualizacion' => $fecha_actual
			);
			$this->Materias_preinscrita_model->update($ids_str, $data_reset);
		}
		
		// ================================================================
		// PASO 2: MARCAR los IDs determinados
		// (sol_retiro=1, id_solicitud_retiro=$id_solicitud)
		// ================================================================
		if (!empty($ids_a_marcar)) {
			$ids_str = implode(',', $ids_a_marcar);
			$data_update = array(
				'sol_retiro' => 1,
				'id_solicitud_retiro' => $id_solicitud,
				'quien_actualizo' => $id_usuario,
				'fecha_actualizacion' => $fecha_actual
			);
			$this->Materias_preinscrita_model->update($ids_str, $data_update);
		}
		
		$this->session->set_flashdata("success", $mensaje);
		redirect(base_url() . "dashboard09/index/1");
	}
	public function registrotramiteRuc_store($id){
		$id_usuario = $this->session->userdata("id");
		$fecha_actual=date("Y-m-d H:i:s");
		$fecha_solicitud=date("Y-m-d");
		$id_tramite= $this->input->post("combotramiteRuc");		
		$id_reconocimiento= $this->input->post("comboreconocimiento");		
		$unidad_tramitar= $this->input->post("uc_tramitar");	
	
		
		
			$id_programa= $this->input->post("comboprogramaRuc");
			$data  = array(
				'id_usuario' => $id_usuario, 
				'id_tramite' => $id_tramite,
				'id_programa' => $id_programa,
				'fecha_registro' => $fecha_actual,
				'fecha_solicitud' => $fecha_solicitud,			
				'status' => 1,			
				'quien_registro'=>$id_usuario, 
				'id_tipo_reconocimiento'=>$id_reconocimiento, 
				'uc'=>$unidad_tramitar
				
			);
			
			if (!$this->Solictudtramite_model->VerificarSolicitud($id_usuario,$id_tramite,$id_programa)){
				if ($this->Solictudtramite_model->save($data)){
					?>
					
						<script> alert ("Solicitud Registrada.");
						location.assign("<?php echo base_url(); ?>dashboard09/solicitud_ruc/2");   
						</script>
					<?php 
				}else{
					$this->session->set_flashdata("error","Error al guardar la información.");
					redirect(base_url()."dashboard09/solicitud_ruc/2");
				}
			}else{
				$this->session->set_flashdata("warning","La solicitud ya se encuentra registrada.");
					redirect(base_url()."dashboard09/solicitud_ruc/2");
			}
		}
		
			public function registrotramiteEgreso_store($id){
			$id_usuario = $this->session->userdata("id");
			$fecha_actual=date("Y-m-d H:i:s");
			$fecha_solicitud=date("Y-m-d");
			$id_tramite= $this->input->post("combotramite");		
			$id_programa= $this->input->post("cbo_programa");	
			$id_reconocimiento= $this->input->post("comboreconocimiento");		
			$registro_requisito=0;
			
			
				$id_programa= $this->input->post("cbo_programa");
				$data  = array(
					'id_usuario' => $id_usuario, 
					'id_tramite' => $id_tramite,
					'id_programa' => $id_programa,
					'fecha_registro' => $fecha_actual,
					'fecha_solicitud' => $fecha_solicitud,			
					'status' => 1,			
					'quien_registro'=>$id_usuario, 
					'id_tipo_reconocimiento'=>$id_reconocimiento, 
			
					
				);
				//guardar el archivo requisitod y registrar en controlde equisitos
				extract($_REQUEST);
				echo $nombre_archivo = $_FILES['userfile']['name'];
				echo $tipo_archivo = $_FILES['userfile']['type'];
				echo $tamano_archivo = $_FILES['userfile']['size'];

				//compruebo si las caracter�sticas del archivo son las que deseo
				if (!((strpos($tipo_archivo, "pdf") )))
				{ // formato incorrecto
					$mensaje = $nombre_archivo.' - '.$tipo_archivo.' - '.$tamano_archivo;
					$mensaje.=$tipo_archivo." <strong>El formato del archivo es invalido. El archivo debe tener el formato: .pdf</strong>";
				} else if (($tamano_archivo > 1048576)) { // excede el tama�o permitido
				$mensaje="<strong>El documento  no puede exceder de 1 Mb, el archivo que intenta cargar tiene un tama&ntilde;o de: ".number_format($tamano_archivo/1048576,2)." Mb </strong><br/> Seleccione otra imagen e intente de nuevo";
				} else { // todo ok
					if(strpos($tipo_archivo, "pdf")&& move_uploaded_file($_FILES['userfile']['tmp_name'], 'assets/tramites/egresos/'. $this->session->userdata('id')."_solicitud_egreso.pdf")){
						$mensaje="";
					} else {
						$mensaje="Ocurrio algun error al subir el archivo. No pudo guardarse.";
					}
				}
			
			if ($mensaje=="") {
			//	echo "estoy aqui";
				$periodo=$this->Periodo_model->PeriodoActivo();
				$data2= array(
				'id_usuario'=>$this->session->userdata('id'),
				'id_requisito'=>'14',
				'id_periodo'=>$periodo->id,
				);
				// var_dump($data);
				if(!$this->Control_requisitos_model->getControl_requisitos($periodo->id,14,$this->session->userdata('id'))){
					$this->Control_requisitos_model->save($data2);		
					$registro_requisito=1;
				}else{
					$registro_requisito=1;
				}
		
			}else{
				//echo "estoy aqui nooo";
				$this->session->set_flashdata("error",$mensaje);
				redirect(base_url()."dashboard09/solicitud_egreso/2");
			}
			if($registro_requisito==1){
				if ($this->Solictudtramite_model->VerificarSolicitud_defensa($id_usuario,array(14,15),trim($id_programa)) OR $this->session->userdata('id')==458){
					//	echo "si hay defensa".$id_usuario.$id_tramite.$id_programa;
						if( !$this->Solictudtramite_model->VerificarSolicitud($id_usuario,$id_tramite,$id_programa)){
							if ($this->Solictudtramite_model->save($data)){
							?>
							
								<script> alert ("Solicitud Registrada.");
								location.assign("<?php echo base_url(); ?>dashboard09/solicitud_egreso/2");   
								</script>
							<?php 
							}else{
								
								$this->session->set_flashdata("error","Error al guardar la información.");
								redirect(base_url()."dashboard09/solicitud_egreso/2");
							//var_dump ($data);
							}
						}else{
							$this->session->set_flashdata("warning","La solicitud ya se encuentra registrada.");
								redirect(base_url()."dashboard09/solicitud_egreso/2");
						}
				}else{
					$this->session->set_flashdata("error","La solicitud no puede ser procesada, debe procesar los trámites previos de Aranceles Defensa de Grado y/o Articulo Científico.");
									redirect(base_url()."dashboard09/solicitud_egreso/2");
				}
	
			}else{
								
				$this->session->set_flashdata("error","Error al guardar la información.");
				redirect(base_url()."dashboard09/solicitud_egreso/2");
			//var_dump ($data);
			}
	}

public function registrotramiteReincorporacion_store($id){
		
	//if(($this->session->userdata("reincorporacion")==1 and date('Y-m-d')<='2026-07-31')) {
		$id_usuario = $this->session->userdata("id");
		$fecha_actual=date("Y-m-d H:i:s");
		$fecha_solicitud=date("Y-m-d");
		$id_tramite= $this->input->post("combotramitef");		
		$id_programa= $this->input->post("cbo_programa");	
		$ult_anno_cursado= $this->input->post("ult_anno_cursado");		
		$ult_trimestre_cursado= $this->input->post("ult_trimestre_cursado");		
		$registro_requisito=1;
		

			$id_programa= $this->input->post("cbo_programa");
			$data  = array(
				'id_usuario' => $id_usuario, 
				'id_tramite' => $id_tramite,
				'id_programa' => $id_programa,
				'fecha_registro' => $fecha_actual,
				'fecha_solicitud' => $fecha_solicitud,			
				'status' => 1,			
				'quien_registro'=>$id_usuario, 
				'ult_anno_cursado'=>$ult_anno_cursado, 
				'ult_trimestre_cursado'=>$ult_trimestre_cursado, 	
				
			);
			
	if($this->cargar_solicitud_reincorporacion($id_programa) ){
			if (!$this->Solictudtramite_model->VerificarSolicitud($id_usuario,$id_tramite,$id_programa)){
				if ($this->Solictudtramite_model->save($data)){
					?>
					
						<script> alert ("Solicitud Registrada con exito.");
						location.assign("<?php echo base_url(); ?>dashboard09/solicitud_reincorporacion/2");   
						</script>
					<?php 
				}else{
					
					$this->session->set_flashdata("error","Error al guardar la información de la solicitud (guardar).");
					redirect(base_url()."dashboard09/solicitud_reincorporacion/2");
				//var_dump ($data);
				}
			}else{
				$this->session->set_flashdata("warning","La solicitud ya se encuentra registrada.");
					redirect(base_url()."dashboard09/solicitud_reincorporacion/1");
			}
		}else{
			$this->session->set_flashdata("error","Error al guardar la información solicitud (validar).");
			redirect(base_url()."dashboard09/solicitud_reincorporacion/2");
		}
/*}else{
				$this->session->set_flashdata("error","El tiempo de registro de solicitud de reincorporación ha sido <b>CERRADO</b>.");
				redirect(base_url()."dashboard09/solicitud_reincorporacion/2");
			}*/

}
public function cargar_solicitud_reincorporacion ($id_programa){
	//guardar el archivo requisitod y registrar en controlde equisitos
	$periodo=$this->Periodo_model->PeriodoActivo();
	$id_programa=trim($id_programa);
	extract($_REQUEST);
			
	//carta solicitud reincorporacion
	$nombre_archivo = $_FILES['userfile']['name'];
	$tipo_archivo = $_FILES['userfile']['type'];
	$tamano_archivo = $_FILES['userfile']['size'];
	

// 
	//compruebo si las caracter�sticas del archivo son las que deseo //carta solicitud reincorporacion
	if (!((strpos($tipo_archivo, "pdf") )))
	{ // formato incorrecto
		$mensaje = $nombre_archivo.' - '.$tipo_archivo.' - '.$tamano_archivo;
		$mensaje.=$tipo_archivo." <strong>El formato del archivo 'CARTA DE SOLICITUD DE REINCORPORACION' es invalido. El archivo debe tener el formato: .pdf</strong>";
	} else if (($tamano_archivo > 1048576)) { // excede el tama�o permitido
	$mensaje="<strong>El documento  no puede exceder de 1 Mb, el archivo que intenta cargar tiene un tama&ntilde;o de: ".number_format($tamano_archivo/1048576,2)." Mb </strong><br/> Seleccione otra imagen e intente de nuevo";
	} else { // todo ok
		if(strpos($tipo_archivo, "pdf")&& move_uploaded_file($_FILES['userfile']['tmp_name'], 'assets/tramites/reincorporaciones/solicitud/'.$this->session->userdata("id").'_'.$id_programa.'_solicitud.pdf')){
			$mensaje="";
		} else {
			$mensaje="Ocurrio algun error al subir el archivo. No pudo guardarse.";
		}
	}
	$registro_requisito=0;
	if ($mensaje=="") {
		//	echo "estoy aqui";
		$periodo=$this->Periodo_model->PeriodoActivo();
		$data2= array(
		'id_usuario'=>$this->session->userdata('id'),
		'id_requisito'=>'15',//carta solicitud reincorporacion
		'id_periodo'=>$periodo->id,
	);
	// var_dump($data);
	if(!$this->Control_requisitos_model->getControl_requisitos($periodo->id,15,$this->session->userdata('id'))){
		$this->Control_requisitos_model->save($data2);		
		return true;
	}else{
		return true;
	}
	}else{
		//echo "estoy aqui nooo";
		$this->session->set_flashdata("error",$mensaje);
		redirect(base_url()."dashboard09/solicitud_reincorporacion/2");
	}

}
public function cargar_record(){
	//compruebo si las caracter�sticas del archivo son las que deseo //record academico
	//record academico
	extract($_REQUEST);
	echo $nombre_archivo2 = $_FILES['userfile2']['name'];
	echo $tipo_archivo2 = $_FILES['userfile2']['type'];
	echo $tamano_archivo2 = $_FILES['userfile2']['size'];
	if (!((strpos($tipo_archivo2, "pdf") )))
	{ // formato incorrecto
		$mensaje = $nombre_archivo2.' - '.$tipo_archivo2.' - '.$tamano_archivo2;
		$mensaje.=$tipo_archivo2." <strong>El formato del archivo 'RECORD ACADÉMICO DE CALIFICACIONES' es invalido. El archivo debe tener el formato: .pdf</strong>";
	} else if (($tamano_archivo2 > 1048576)) { // excede el tama�o permitido
	$mensaje="<strong>El documento  no puede exceder de 1 Mb, el archivo que intenta cargar tiene un tama&ntilde;o de: ".number_format($tamano_archivo2/1048576,2)." Mb </strong><br/> Seleccione otra imagen e intente de nuevo";
	} else { // todo ok
		if(strpos($tipo_archivo2, "pdf")&& move_uploaded_file($_FILES['userfile2']['tmp_name'], 'assets/tramites/reincorporaciones/record/'. $this->session->userdata('id')."_record.pdf")){
			$mensaje="";
		} else {
			$mensaje="Ocurrio algun error al subir el archivo. No pudo guardarse.";
		}
	}
	$registro_requisito=0;
if ($mensaje=="") {
//	echo "estoy aqui";
	$periodo=$this->Periodo_model->PeriodoActivo();
	$data3= array(
	'id_usuario'=>$this->session->userdata('id'),
	'id_requisito'=>'16',//carta solicitud reincorporacion
	'id_periodo'=>$periodo->id,
	);
	// var_dump($data);
	if(!$this->Control_requisitos_model->getControl_requisitos($periodo->id,16,$this->session->userdata('id'))){
		$this->Control_requisitos_model->save($data3);		
		return true;
	}else{
		return true;
	}

	

}else{
	//echo "estoy aqui nooo";
	$this->session->set_flashdata("error",$mensaje);
	redirect(base_url()."dashboard09/solicitud_reincorporacion/2");
}

}
	public function registro_pago()
	{
	 	
		$id_usuario = $this->session->userdata("id");
		$id_solicitud= $this->uri->segment(3);
		$data = array(
			'list_solicitud' => $this->Solictudtramite_model->tramite_sinpago($id_usuario,$id_solicitud),	
			'list_banco' => $this->Banco_model->getBanco(),	
			'alumno_list'=> $this->Alumno_model->getListaAlumno1($id_usuario),
			'datos_trabajo' => $this->Trabajo_model->getListaTrabajo($id_usuario,1),
			'aranceles' =>  $this->Aranceltram_model->getArancelesTramite(),
		);
		//var_dump($data);
		$this->load->view('layouts/header');
		$this->load->view('layouts/sidebar_tramites');
		$this->load->view('participante/tramites/registro_pago',$data);
		$this->load->view('layouts/footer');
	

	}	
	public function registro_pago_ruc()
	{
 		
		if($this->session->userdata("ruc")==1 or $this->session->userdata("ruc_aprobadas")==1 ){		
			$id_usuario = $this->session->userdata("id");
			$id_solicitud= $this->uri->segment(3);
			$data = array(
				'list_solicitud' => $this->Solictudtramite_model->tramite_sinpago($id_usuario,$id_solicitud),	
				'solicitud' => $this->Solictudtramite_model->tramite_sinpago($id_usuario,$id_solicitud),	
				'list_banco' => $this->Banco_model->getBanco(),	
				'datos_trabajo' => $this->Trabajo_model->getListaTrabajo($id_usuario,1),
				'aranceles' =>  $this->Aranceltram_model->getArancelesTramite(),
			
			);
			//var_dump($data);
			$this->load->view('layouts/header');
			$this->load->view('layouts/sidebar_tramites');
			$this->load->view('participante/tramites/registro_pago_ruc',$data);
			$this->load->view('layouts/footer');
		}else{
			?>
			<script> alert ("El tiempo de registro del pago a sido CERRADO.");		
			location.assign("<?php echo base_url(); ?>dashboard09/index/2");   
			</script>
			<?php 
		}
	}	
	public function registro_pago_storage()
	{
	//$id_periodo = $this->Periodo_model->PeriodoActivo();
	$id_usuario = $this->input->post("id_usuario");
	$id_solicitud=$this->input->post("id_solicitud");
	extract($_REQUEST);
	//var_dump($_FILES['userfile']);
	$nombre_archivo = $_FILES['userfile']['name'];
	$tipo_archivo = $_FILES['userfile']['type'];
	$tamano_archivo = $_FILES['userfile']['size'];
	//compruebo si las caracter�sticas del archivo son las que deseo
	if (!((strpos($tipo_archivo, "gif") || strpos($tipo_archivo, "jpeg") || strpos($tipo_archivo, "png")  || strpos($tipo_archivo, "jpg") || strpos($tipo_archivo, "pdf") )))
	{ // formato incorrecto
		$mensaje = $nombre_archivo.' - '.$tipo_archivo.' - '.$tamano_archivo;
		$mensaje.= $tipo_archivo." <strong> El formato del archivo es invalido. La imagen debe tener el formato: .gif, .jpeg , .jpg, .png o .pdf</strong>";
	} else if (($tamano_archivo > 1048576)) { // excede el tama�o permitido
		$mensaje="<strong>El archivo no puede exceder de 1 Mb, el archivo que intenta cargar tiene un tama&ntilde;o de: ".number_format($tamano_archivo/1048576,2)." Mb </strong><br/> Seleccione otra foto e intente de nuevo";
	} else { // todo ok
		if(strpos($tipo_archivo, "pdf")&& move_uploaded_file($_FILES['userfile']['tmp_name'], 'assets/transferencia/tramites/'. $this->session->userdata('id')."_".$id_solicitud."_transf_tramite.pdf")){
	
			$mensaje="";
		}else{		
			if ((strpos($tipo_archivo, "gif") || strpos($tipo_archivo, "jpg")|| strpos($tipo_archivo, "jpeg") || strpos($tipo_archivo, "png") )&& move_uploaded_file($_FILES['userfile']['tmp_name'], 'assets/transferencia/tramites/'. $this->session->userdata('id')."_".$id_solicitud."_transf_tramite.jpg"))
			{
				$mensaje="";
			}
		}
	}
$id_tramite = $this->input->post("tramite");
	if ($mensaje=="") {		
			//// guardad la imagen de la transferencia
				$id_banco = $this->input->post("id_banco");
		$id_estado_estudio = 24;
		$id_estudiante = $this->input->post("id_estudiante");
		$cedula = $this->input->post("cod_nacionalidad").$this->input->post("cedula");
		$nro_referencia = $this->input->post("nro_referencia");
		$fecha_transferencia = $this->input->post("fecha_transferencia");
		$monto_pagar = $this->input->post("total_pagar");
		$monto_depositado = $this->input->post("monto");
		$postgrado = 'SOLICITUD DE TRAMITE';
		$unidad_credito = $this->input->post("total_ucredito");
		//$id_tramite = $this->input->post("tramite");
		$id_periodo = $this->Periodo_model->PeriodoActivo();

		if($nro_referencia=='00187046' or $nro_referencia=='41052855 '){
			$this->session->set_flashdata("error","El numero de referencia bancaria coincide con el número de cuenta de la FENFMP ");
			redirect(base_url()."dashboard09/index/2");
		}else{
				
				$data  = array(
					'id_usuario' => $id_usuario, 
					'id_banco' => $id_banco,
					'cedula' => $cedula,
					'id_estudiante' => $id_estudiante,
					'id_estado_estudio' => $id_estado_estudio,
					'nro_referencia' => $nro_referencia,
					'fecha_transferencia' => $fecha_transferencia,
					'monto_apagar' => $monto_pagar,
					'monto_depositado' => $monto_depositado,
					'postgrado' => $postgrado,
					
					'id_periodo' => $id_periodo->id,
					'status' => 1,
					'tramite'=> 1,
					'quien_registro'=>$id_usuario, 
					'id_solicitud_tramite'=>$id_solicitud,

				);
				$data2  = array(
					'reg_pago' => 1,
					

				);
				
				//var_dump($data);
			if (! $this->Solictudtramite_model->tramite_conpago($id_usuario,$id_solicitud)) {
				//	echo "estoy aqui";
					if($this->Registro_pago_model->save($data)){
					//	echo "estoy guardando";
						$this->Solictudtramite_model->update($id_solicitud,$data2);
						$this->session->set_flashdata("success","El pago fue registrado con exito.!.");
						if($id_tramite=='17' or $id_tramite=='19'){//RUC aprobadas
							redirect(base_url()."dashboard09/solicitud_ruc/2");
						}else{
							if($id_tramite=='28' ){//
								redirect(base_url()."dashboard09/solicitud_ruc_requisitos/2");
							}else{	
								//Tramites admistrativos
								if($id_tramite=='18' ){
									//echo "es solicitud de egreso";
									redirect(base_url()."dashboard09/solicitud_egreso/2");
								}else{
									if($id_tramite=='16' ){
										//echo "es solicitud de reincorporacion";
										redirect(base_url()."dashboard09/solicitud_reincorporacion/2");
									}else{
											//echo "es otra solicitud";
										redirect(base_url()."dashboard09/index/2");
									}
								}
							}
						}
					}else{
						
							if($id_tramite=='17' or $id_tramite=='19' ){
								//	echo "es ruc aprobadas";
				
								redirect(base_url()."dashboard09/registro_pago_ruc/".$this->session->userdata('id'));
							}else{
								if($id_tramite=='28' ){//
									redirect(base_url()."dashboard09/solicitud_ruc_requisitos/2");
								}else{	
									//Tramites admistrativos
									if($id_tramite=='18' ){
										//echo "es solicitud de egreso";
										redirect(base_url()."dashboard09/solicitud_egreso/2");
									}else{
										if($id_tramite=='16' ){
											//echo "es solicitud de reincorporacion";
											redirect(base_url()."dashboard09/solicitud_reincorporacion/2");
										}else{
												//echo "es otra solicitud";
											redirect(base_url()."dashboard09/index/2");
										}
									}
								}
						}

					}
						
			}else{
					$this->session->set_flashdata("warning","El registro del pago ya fue registrado");				
							if($id_tramite=='17' or $id_tramite=='19' ){
								//	echo "es ruc";			
								redirect(base_url()."dashboard09/registro_pago_ruc/".$this->session->userdata('id'));
							}else{
								if($id_tramite=='28' ){//
									redirect(base_url()."dashboard09/solicitud_ruc_requisitos/2");
								}else{	
									//Tramites admistrativos
									if($id_tramite=='18' ){
										//echo "es solicitud de egreso";
										redirect(base_url()."dashboard09/solicitud_egreso/2");
									}else{
										if($id_tramite=='16' ){
											//echo "es solicitud de reincorporacion";
											redirect(base_url()."dashboard09/solicitud_reincorporacion/2");
										}else{
												//echo "es otra solicitud";
											redirect(base_url()."dashboard09/index/2");
										}
									}
								}
							}
			}
		}
	}else{
		//echo "error con el archivo";
		$this->session->set_flashdata("error",$mensaje);
		if($id_tramite=='17' or $id_tramite=='19' ){
			//	echo "es ruc";			
			redirect(base_url()."dashboard09/registro_pago_ruc/".$this->session->userdata('id'));
		}else{
			if($id_tramite=='28' ){//
				redirect(base_url()."dashboard09/solicitud_ruc_requisitos/2");
			}else{	
				//Tramites admistrativos
				if($id_tramite=='18' ){
					//echo "es solicitud de egreso";
					redirect(base_url()."dashboard09/solicitud_egreso/2");
				}else{
					if($id_tramite=='16' ){
						//echo "es solicitud de reincorporacion";
						redirect(base_url()."dashboard09/solicitud_reincorporacion/2");
					}else{
							//echo "es otra solicitud";
						redirect(base_url()."dashboard09/index/2");
					}
				}
			}
		}
	}
}
public function conciliacion() //muestra los pago pendientes por conciliar
{
	$id_usuario = $this->session->userdata("id");
	$data = array(
	'listado' => $this->Registro_pago_model->getRegistro_PagoTramite(),		
	);
	//var_dump($data);
	$this->load->view('layouts/header');
	$this->load->view('layouts/sidebar');
	$this->load->view('admin/administrador/list_tramites',$data);
	$this->load->view('layouts/footer');
}


public function exportar_excel_no_conciliados() {
	// Obtener los datos del reporte
	$listado = $this->Registro_pago_model->getRegistro_PagoTramite();
	
	// Verificar si hay datos
	if(empty($listado)) {
		$this->session->set_flashdata('error', 'No hay datos para exportar');
		redirect('dashboard09/conciliacion');
	}		
	$data = array(
		'listado' => $listado,	
		'nombre_archivo' => 'listado_no_conciliaciones_tramites' . date('Y-m-d')
	);		
	$this->load->view('admin/administrador/excel_no_conciliados_tramites', $data);
}
public function exportar_excel_conciliados() {
	// Obtener los datos del reporte
	$listado = $this->Registro_pago_model->getRegistro_PagoTramite_conc();
	
	// Verificar si hay datos
	if(empty($listado)) {
		$this->session->set_flashdata('error', 'No hay datos para exportar');
		redirect('dashboard09/listconc');
	}		
	$data = array(
		'listado' => $listado,	
		'nombre_archivo' => 'listado_conciliaciones_tramites' . date('Y-m-d')
	);		
	$this->load->view('admin/administrador/excel_conciliados_tramites', $data);
}
public function listconc()
	{
		$id_usuario = $this->session->userdata("id");
	//	$id_periodo = $this->Periodo_model->PeriodoActivo();
		$data = array(
		'listado' => $this->Registro_pago_model->getRegistro_PagoTramite_conc(),

		);

		$this->load->view('layouts/header');
		$this->load->view('layouts/sidebar');
		$this->load->view('admin/administrador/list_conciliacion_tramite',$data);
		$this->load->view('layouts/footer');
	} 

	public function listconc_error()
	{
		$id_usuario = $this->session->userdata("id");
	//	$id_periodo = $this->Periodo_model->PeriodoActivo();
		$data = array(
		'listado' => $this->Registro_pago_model->getRegistro_PagoTramite_conc_error(),

		);

		$this->load->view('layouts/header');
		$this->load->view('layouts/sidebar');
		$this->load->view('admin/administrador/list_conciliacion_error_tramite',$data);
		$this->load->view('layouts/footer');
	} 
	public function pago_adicional()
	{
		//$id_usuario = $this->session->userdata("id");
		$data = array(
		'listado' => $this->Registro_pago_model->getRegistro_Pago_adicional_tramite(),		
		);
		//var_dump($data);
		$this->load->view('layouts/header');
		$this->load->view('layouts/sidebar');
		$this->load->view('admin/administrador/list_pago_adicional_tramite',$data);
		$this->load->view('layouts/footer');
	}	
	public function registro_pago_adicional()
	{
		$id_usuario = $this->uri->segment(3);
		$id_solicitud = $this->uri->segment(4);
	

		$data = array(			
			'estado_estudio' => $this->Trabajo_model->getListaTrabajo($id_usuario,1),
			'datos_alumno' => $this->Alumno_model->getListaAlumno($id_usuario),	
			'list_banco' => $this->Banco_model->getBanco(),
			'rol_alumno'=>$this->Usuarios_model->buscar_usuario($id_usuario),
			'periodo' => $this->Periodo_model->PeriodoActivo(),
			'solicitud'=> $id_solicitud ,
			
			);
			$data2 = array(
			'tiempo_pre' => $this->Tiempo_preinscripcion_model->gettiempo_preinscripcion(),
			);
		//var_dump($data);
		$this->load->view('layouts/header');
		$this->load->view('layouts/sidebar');
		$this->load->view('admin/administrador/registro_pago_adicional_tramite',$data);
		$this->load->view('layouts/footer');
	}	
	public function store_pago_adicional()
	{

		$fecha=date('Y-m-d_H-i');
		$id_usuario_session = $this->input->post("id_usuario_sesion");
		$id_usuario = $this->input->post("id_usuario");
		$id_solicitud = $this->input->post("id_solicitud");
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
			'id_solicitud_tramite'=>$id_solicitud,
			'dregistro'=>$fecha,
			'quien_registro'=>$id_usuario_session,
			'pago_adicional'=> 1,
			'tramite'=> 1,
			

		);	
		//var_dump($data);	

		
			
		
				if ($this->Registro_pago_model->save($data)) {				
					redirect(base_url()."dashboard09/pago_adicional");
				}
				else{
					$this->session->set_flashdata("error","No se pudo guardar la informacion");
					redirect(base_url()."dashboard09/registro_pago_adicional/".$id_usuario);
				}
			
	}
public function conciliar_store($id_solicitud)
	{
		//echo "essssssssssss".$id_solicitud;
		$fecha=date('Y-m-d_H-i');
		$solicitud=$this->Solictudtramite_model->getSolicitud($id_solicitud);
	//	var_dump($solicitud->id_tramite);
		$tramites =array(18,16,23,25,28,20,38,39,40,41,42,44,45,46,56,57,58,59,60,62,63,64,43,61);
		if ( in_array($solicitud->id_tramite,$tramites)){		
			$data  = array(
				'conciliado' => 1, 
				'academico' =>0, 
				'dactualizo'=>$fecha,
				'quien_actualizo'=>$this->session->userdata("id"),
			);
			$data2  = array('rev_academica'=> 0);
		}else{				
			$data  = array(
				'conciliado' => 1, 
				'academico' =>1, 
				'dactualizo'=>$fecha,
				'quien_actualizo'=>$this->session->userdata("id"),
			);
			$data2  = array('rev_academica'=> 1,'fecha_actualizacion'=>$fecha,
				'quien_actualizo'=>$this->session->userdata("id"),);
		}
		if ($this->Registro_pago_model->save_conciliacion_tramite($id_solicitud,$data)) {
			$this->Solictudtramite_model->update($id_solicitud,$data2);
			$this->session->set_flashdata("success","Pago conciliado exitosamente.!");
			redirect(base_url()."dashboard09/conciliacion");
		}
		else{
			$this->session->set_flashdata("error","No se pudo guardar la informacion");
			redirect(base_url()."dashboard09/conciliacion");
		}
	}

	public function conciliar_error_tramite($id_solicitud)
	{
			//echo "essssssssssss".$id_solicitud;
			$fecha=date('Y-m-d_H-i');
		$data  = array(
			'conciliado' => 2,
			'dactualizo'=>$fecha,
			'quien_actualizo'=>$this->session->userdata("id"),
		);
	
		if ($this->Registro_pago_model->save_conciliacion_error_tramite($id_solicitud,$data)) {	
				
			redirect(base_url()."dashboard09/conciliacion");
		}
		else{
			$this->session->set_flashdata("error","No se pudo guardar la informacion");
			redirect(base_url()."dashboard09/conciliacion");
		}
	}
public function transferencia($id)
	{
		$data = array(
		'id_usuario' => $id,
		'id_solicitud' => $this->uri->segment(4),
		);
		$this->load->view('layouts/header');
		$this->load->view('layouts/sidebar');
		$this->load->view('admin/administrador/transferencia_tramite',$data);
		$this->load->view('layouts/footer');
	} 

	public function tramites_conciliados()
	{
		$id_usuario = $this->session->userdata("id");
		
		$data = array(
		'listado' => $this->Registro_pago_model->getRegistro_PagoTramite_conc(),
		'periodo' => $this->Periodo_model->PeriodoActivo(),
		);

		$this->load->view('layouts/header');
		$this->load->view('layouts/sidebar');
		$this->load->view('supervisor/tramites/tramites_conciliados',$data);
		$this->load->view('layouts/footer');
	} 

	public function tramites_validados_vigentes()
	{
		$id_usuario = $this->session->userdata("id");
		$periodo=$this->Periodo_model->PeriodoActivo();
		$data = array(
		'listado' => $this->Registro_pago_model->getRegistro_PagoTramite_conc_periodo($periodo->id),
		'periodo' => $this->Periodo_model->PeriodoActivo(),
		);
//var_dump($data['periodo']);
		$this->load->view('layouts/header');
		$this->load->view('layouts/sidebar');
		$this->load->view('supervisor/tramites/tramites_aprobados',$data);
		$this->load->view('layouts/footer');
	} 
	
	public function tramites_aprobados($id_periodo)
	{
		$id_usuario = $this->session->userdata("id");
		//$id_periodo=$_POST["id_periodo"];
		$data = array(
		'listado' => $this->Registro_pago_model->getRegistro_PagoTramite_conc_periodo($id_periodo),
		'periodo' => $this->Periodo_model->getIdperiodo($id_periodo),
		);
//var_dump($data['periodo']);
		$this->load->view('layouts/header');
		$this->load->view('layouts/sidebar');
		$this->load->view('supervisor/tramites/tramites_aprobados',$data);
		$this->load->view('layouts/footer');
	} 
	public function buscar_periodo()
	{
		$id_usuario = $this->session->userdata("id");
		$data= array("periodo"=>$this->Periodo_model->getAllperiodo());

		$this->load->view('layouts/header');
		$this->load->view('layouts/sidebar');
		$this->load->view('supervisor/tramites/buscar_periodo',$data);
		$this->load->view('layouts/footer');
	}
	public function consultas()
	{
		$id_usuario = $this->session->userdata("id");
		$id_periodo=$_POST["periodo"];
		$data = array(		
			'periodo' => $this->Periodo_model->getIdperiodo($id_periodo),
		);
	//	var_dump($data);
		$this->load->view('layouts/header');
		$this->load->view('layouts/sidebar');
		$this->load->view('supervisor/tramites/menu',$data);
		$this->load->view('layouts/footer');
	}
	public function planilla()
{
    $id_usuario = $this->uri->segment(3);
    $id_solicitud = $this->uri->segment(4);

    $codigo_tel_alumno = $this->Alumno_model->getListaAlumno($id_usuario);
    $lugar_trabajo = $this->Trabajo_model->Lugar_trabajo($id_usuario);

    // Obtener datos de la solicitud
    $solicitud = $this->Solictudtramite_model->getdatosolicitud($id_solicitud);
	$solicitud=$solicitud[0];
   //obtener el periodo academico donde se registro el pago de la solicitud
   $periodo_pago = $this->Registro_pago_model->periodo_pagotramte($id_usuario, $id_solicitud);
   
    // Verificar si es trámite RUC (ID 28)
    $es_ruc = false;
    if(isset($solicitud) && !empty($solicitud) && isset($solicitud->id_tramite)) {
       if( $solicitud->id_tramite == '28')$es_ruc =true;
    }
   
	
    // Si es RUC, obtener unidades
    $unidades_cursa = null;
    $unidades_cursadas = null;

    if($es_ruc) {
        $unidades_cursa = $this->Rucdetalle_unidades_model->unidades_cursa($id_solicitud);
        $unidades_cursadas = $this->Rucdetalle_unidades_model->unidades_cursadas($id_solicitud);
    }

    $data = array(
        'datos_alumnos' => $this->Alumno_model->getListaAlumno($id_usuario),
        'telefono_hab' => $this->Codigo_tel_model->getCodigo_nacional($codigo_tel_alumno->id_codigo_hab),
        'telefono_cel' => $this->Codigo_tel_model->getCodigo_celular($codigo_tel_alumno->id_codigo_cel),
        'direccion' => $this->Direccion_model->MostarDireccion($id_usuario),
        'datos_trabajo' => $this->Trabajo_model->getListaTrabajo($id_usuario, 1),
        'circunscripcion' => $this->Estado_model->getEstado_circuncripcion_planilla($id_usuario, $lugar_trabajo->id_lugar_trabajo),
        'solicitud' => $solicitud,
        'titulo' => $solicitud,
        'registro_pago' => $this->Registro_pago_model->MostrarRegistro_pagotramte($id_usuario, $id_solicitud),
        'periodo' => $this->Periodo_model->getIdperiodo_($periodo_pago->id_periodo),
        'unidades_cursa' => $unidades_cursa,
        'unidades_cursadas' => $unidades_cursadas,
        'id_solicitud' => $id_solicitud,
        'es_ruc' => $es_ruc,
		'tipo_reconocimiento'=>$this->Tipo_reconocimiento_model->getTipo($solicitud->id_tipo_reconocimiento),
		'programaCursado'=>$this->Programa_model-> getProgramaEsp($solicitud->id_programa_ruc_cursado)
    );

    $hoy = date("dmyhis");
    $this->load->view('layouts/header');
    if ($this->session->userdata("rol") == 2 or $this->session->userdata("rol") == 4) {
        $this->load->view('layouts/sidebar');
    } else {
        $this->load->view('layouts/sidebar_tramites');
    }
    
    // Condicional para mostrar la vista correcta
  if($es_ruc) {
        $this->load->view('planilla/planilla_tramite_ruc', $data);
    } else {
        $this->load->view('planilla/planilla_tramite', $data);
    }
    
    $this->load->view('layouts/footer');
}

public function descargar()
{
	$id_usuario = $this->uri->segment(3);
    $id_solicitud = $this->uri->segment(4);

    $codigo_tel_alumno = $this->Alumno_model->getListaAlumno($id_usuario);
    $lugar_trabajo = $this->Trabajo_model->Lugar_trabajo($id_usuario);

    // Obtener datos de la solicitud
    $solicitud = $this->Solictudtramite_model->getdatosolicitud($id_solicitud);
	$solicitud=$solicitud[0];
   
    // Verificar si es trámite RUC (ID 28)
    $es_ruc = false;
    if(isset($solicitud) && !empty($solicitud) && isset($solicitud->id_tramite)) {
       if( $solicitud->id_tramite == '28')$es_ruc =true;
    }
    
    // Si es RUC, obtener unidades
    $unidades_cursa = null;
    $unidades_cursadas = null;
    if($es_ruc) {
        $unidades_cursa = $this->Rucdetalle_unidades_model->unidades_cursa($id_solicitud);
        $unidades_cursadas = $this->Rucdetalle_unidades_model->unidades_cursadas($id_solicitud);
    }

    $data = array(
        'datos_alumnos' => $this->Alumno_model->getListaAlumno($id_usuario),
        'telefono_hab' => $this->Codigo_tel_model->getCodigo_nacional($codigo_tel_alumno->id_codigo_hab),
        'telefono_cel' => $this->Codigo_tel_model->getCodigo_celular($codigo_tel_alumno->id_codigo_cel),
        'direccion' => $this->Direccion_model->MostarDireccion($id_usuario),
        'datos_trabajo' => $this->Trabajo_model->getListaTrabajo($id_usuario, 1),
        'circunscripcion' => $this->Estado_model->getEstado_circuncripcion_planilla($id_usuario, $lugar_trabajo->id_lugar_trabajo),
        'solicitud' => $solicitud,
        'titulo' => $solicitud,
        'registro_pago' => $this->Registro_pago_model->MostrarRegistro_pagotramte($id_usuario, $id_solicitud),
        'periodo' => $this->Periodo_model->PeriodoActivo(),
        'unidades_cursa' => $unidades_cursa,
        'unidades_cursadas' => $unidades_cursadas,
        'id_solicitud' => $id_solicitud,
        'es_ruc' => $es_ruc,
		'tipo_reconocimiento'=>$this->Tipo_reconocimiento_model->getTipo($solicitud->id_tipo_reconocimiento),
		'programaCursado'=>$this->Programa_model-> getProgramaEsp($solicitud->id_programa_ruc_cursado)
    );

    $hoy = date("dmyhis");

    // Condicional para cargar la vista correcta
    if($es_ruc) {
        $html = $this->load->view('planilla/planilla_tramite_ruc', $data, true);
    } else {
        $html = $this->load->view('planilla/planilla_tramite', $data, true);
    }

    $pdfFilePath = "planillaTramite_" . $hoy . ".pdf";

    $this->load->library('M_pdf');
    $mpdf = new mPDF('s', 'Letter-P');
    $mpdf->showImageErrors = false;
    $mpdf->SetProtection(array('copy', 'print'), '', 't3n0l0g143n7m9');
    $mpdf->WriteHTML($html);
    $mpdf->Output($pdfFilePath, "D");
}
public function excel_aprobados(){
	 $id_periodo=$this->uri->segment(3);
		$data = array(
		'listado' => $this->Registro_pago_model->getRegistro_PagoTramite_conc_periodo($id_periodo),
		'periodo' => $this->Periodo_model->getIdperiodo($id_periodo),		
		'titulo'=>'Listado Trámites y/o Solicitudes Aprobados <b> ',
		'nombre_archivo'=>'tramites_aprobados',

		);
//var_dump($data);

$this->load->view('supervisor/tramites/descarga_excel_tramites_aprobados',$data);		
}
public function excel_retiros(){
	
	$data= array('listado' =>  $this->Solictudtramite_model->getRetiro_Voluntarios_solicitados(),	
	'periodo' => $this->Periodo_model->PeriodoActivo(),
	'titulo'=>'Listado Retiros Voluntarios Revisados <b> ',
	'nombre_archivo'=>'retiros_revisados',

		);
//var_dump($data);

$this->load->view('supervisor/tramites/descarga_excel_retiros',$data);		
}
public function excel_retiros_periodo(){
	$id_periodo=$this->uri->segment(3);
	$data= array('listado' => $this->Solictudtramite_model->getRetiro_Voluntarios_periodo($id_periodo),			
	'periodo' => $this->Periodo_model->getIdperiodo($id_periodo),	
	'titulo'=>'Listado Retiros Voluntarios Revisados <b> ',
	'nombre_archivo'=>'retiros_revisados',
		);
//var_dump($data);

$this->load->view('supervisor/tramites/descarga_excel_retiros',$data);		
}
public function excel_retiros_sin_validar(){
	
	$data= array('listado' =>  $this->Solictudtramite_model->getRetiro_Voluntarios_sin_validar(),	
	'periodo' => $this->Periodo_model->PeriodoActivo(),
	'titulo'=>'Listado Retiros Voluntarios Sin Revisar <b> ',
	'nombre_archivo'=>'retiros_sin_revisar',

		);
//var_dump($data);

$this->load->view('supervisor/tramites/descarga_excel_retiros',$data);		
}
public function retiro_voluntario()
	{
	

		$data = array(
		'listado' => $this->Solictudtramite_model->getRetiro_Voluntarios_Vigentes(),			
		'periodo' => $this->Periodo_model->PeriodoActivo(),
		);
	
		$this->load->view('layouts/header');
		$this->load->view('layouts/sidebar');       
		$this->load->view('supervisor/tramites/retiros_voluntarios_vigente',$data);     
		$this->load->view('layouts/footer');
	}

	public function retiro_voluntario_aprobados()
	{
	

		$data = array(
		'listado' => $this->Solictudtramite_model->getRetiro_Voluntarios_aprobados(),			
		'periodo' => $this->Periodo_model->PeriodoActivo(),
		);
	
		$this->load->view('layouts/header');
		$this->load->view('layouts/sidebar');       
		$this->load->view('supervisor/tramites/retiros_voluntarios_aprobados',$data);     
		$this->load->view('layouts/footer');
	}
public function retiro_voluntario_todos()
	{
	

		$data = array(
		'listado' => $this->Solictudtramite_model->getRetiro_Voluntarios_solicitados(),			
		'periodo' => $this->Periodo_model->PeriodoActivo(),
		);
	
		$this->load->view('layouts/header');
		$this->load->view('layouts/sidebar');       
		$this->load->view('supervisor/tramites/retiros_voluntarios_todos',$data);     
		$this->load->view('layouts/footer');
	}
	public function retiro_voluntario_periodo($id_periodo)
	{
	

		$data = array(
		'listado' => $this->Solictudtramite_model->getRetiro_Voluntarios_periodo($id_periodo),			
		'periodo' => $this->Periodo_model->getIdperiodo($id_periodo),	
		);
	
		$this->load->view('layouts/header');
		$this->load->view('layouts/sidebar');       
		$this->load->view('supervisor/tramites/retiros_voluntarios_periodo',$data);     
		$this->load->view('layouts/footer');
	}
	public function revisar_retiro($id_solicitud,$id_usuario,$id_programa)
	{
	
//echo $id_solicitud;
//echo $id_solicitud;
$lugar_trabajo = $this->Trabajo_model->Lugar_trabajo($id_usuario);

		$data = array(
		'datos_alumno'	=> $this->Alumno_model->getListaAlumno1($id_usuario),
		'trabajo' => $this->Lugar_trabajo_model->valor_unidad($lugar_trabajo->id_lugar_trabajo),
		'listado' => $this->Solictudtramite_model->getdatosolicitud($id_solicitud,$id_usuario),			
		'materias_solicitadas' => $this->Materias_preinscrita_model->materias_solicitadas($id_usuario,$id_solicitud),
		'periodo' => $this->Periodo_model->PeriodoActivo(),
		);
	//var_dump($data);
		$this->load->view('layouts/header');
		$this->load->view('layouts/sidebar');       
		$this->load->view('supervisor/tramites/revision_retiros_vigente',$data);     
		$this->load->view('layouts/footer');
	}
	
	public function registro_rettiro_voluntario_store($id_solicitud,$id_usuario,$id_programa)
	{
		$fecha=date('Y-m-d_H-i');
		$materia = $this->input->post("str");

		if($materia){
		//	var_dump($materia);
				$data2= array(
					'retiro'=>1,
					'quien_actualizo'=>$this->session->userdata("id"),
					'fecha_actualizacion'=> $fecha,
				);
				$data=array(
					'reg_pago'=>1,
					'rev_academica'=>1,
					'quien_actualizo'=>$this->session->userdata("id"),
					'fecha_actualizacion'=> $fecha
				);
			//	var_dump($data2);
			//	var_dump($data);
				$actualiza_materia=$this->Materias_preinscrita_model->update($materia,$data2);
			//	var_dump($actualiza_materia);
				if($actualiza_materia){
				//	echo "fgdfgdfgfdg".$id_solicitud;
				$actualiza_solicitud=$this->Solictudtramite_model->update($id_solicitud,$data);
					//	var_dump($actualiza_solicitud);
						if($actualiza_solicitud){

						$id_materias_preinscrita=explode(",", $materia);

						foreach($id_materias_preinscrita as $id_materias_preinscrita){
						//	echo $id_materias_preinscrita;
							$oferta_academica=$this->Materias_preinscrita_model->ver_materia($id_materias_preinscrita);
							$data_na = array(                 
								'id_materias_preinscrita' =>$id_materias_preinscrita,
								'id_oferta_academica' 	  =>$oferta_academica->id_oferta_academica,
								'nota_1'                                  =>NULL,
								'nota_2'                                  =>NULL,
								'nota_3'                                  =>NULL,
								'nota_4'                                  =>NULL,
								'nota_5'                                  =>NULL,
								'nota_6'                                  =>NULL,
								'nota_7'                                  =>NULL,
								'nota_8'                                  =>NULL,
								'nota_9'                                  =>NULL,
								'nota_final'                      =>NULL,
								'quien_registro'                 =>$this->session->userdata('id'),
								'quien_actualizo'                 =>$this->session->userdata('id'),
								'fecha_actualizacion'     =>$fecha,
								'observaciones'         =>'RETIRO VOLUNTARIO',
								);  
								$asistencia=array('asistencia'=>0);		

									if(!$this->Notas_academica_model->getBuscarMaeteria($id_materias_preinscrita)){
										$nota_cargada=$this->Notas_academica_model->save($data_na);					
									}else{			
										$nota_cargada=$this->Notas_academica_model->update_nota($id_materias_preinscrita,$data_na);				
									}		
									$this->Materias_preinscrita_model->update_matricula($id_materias_preinscrita,$asistencia);
						}
						
						if($nota_cargada){
							$this->session->set_flashdata("success","Se registró la validación con exito..");
							redirect(base_url()."dashboard09/retiro_voluntario");
						}else{
							$this->session->set_flashdata("error","No se pudo guardar la información en la matrícula");
							redirect(base_url()."dashboard09/revisar_retiro/".$id_solicitud."/".$id_usuario."/".$id_programa);
						}
					}else{
						$this->session->set_flashdata("error","No se pudo guardar la información");
						redirect(base_url()."dashboard09/revisar_retiro/".$id_solicitud."/".$id_usuario."/".$id_programa);
					}
				}else{
					$this->session->set_flashdata("error","No se pudo guardar la información");
					redirect(base_url()."dashboard09/revisar_retiro/".$id_solicitud."/".$id_usuario);
				}
		}else{
		//	var_dump($materia);
			$this->session->set_flashdata("error","Debe seleccionar las unidades curriculares a validar.");
						redirect(base_url()."dashboard09/revisar_retiro/".$id_solicitud."/".$id_usuario."/".$id_programa);
		}
	}
	public function registro_rettiro_voluntario_store2($id_solicitud,$id_usuario,$id_programa)
	{
		$fecha=date('Y-m-d_H-i');
	
				$data=array(
					'reg_pago'=>1,
					'rev_academica'=>2,
					'quien_actualizo'=>$this->session->userdata("id"),
					'fecha_actualizacion'=> $fecha
				);
		
					$actualiza_solicitud=$this->Solictudtramite_model->update($id_solicitud,$data);
				//	var_dump($actualiza_solicitud);
					if($actualiza_solicitud){
						$this->session->set_flashdata("success","Se registró la validación con exito..");
						redirect(base_url()."dashboard09/retiro_voluntario");
					}else{
						$this->session->set_flashdata("error","No se pudo guardar la información");
						redirect(base_url()."dashboard09/revisar_retiro/".$id_solicitud."/".$id_usuario."/".$id_programa);
					}
		
	}
	public function tramites_por_validar()
	{
	

		$data = array(
		'listado' => $this->Solictudtramite_model->getTramites_por_validar(),			
		'periodo' => $this->Periodo_model->PeriodoActivo(),
		);
	
		$this->load->view('layouts/header');
		$this->load->view('layouts/sidebar');       
		$this->load->view('supervisor/tramites/solicitud_tramites_vigente',$data);     
		$this->load->view('layouts/footer');
	}
	public function revisar_tramite($id_solicitud,$id_usuario,$id_programa) // actaualizado 
	{
	
//echo $id_solicitud;
//echo $id_solicitud;
$lugar_trabajo = $this->Trabajo_model->Lugar_trabajo($id_usuario);

		$data = array(
		'datos_alumno'	=> $this->Alumno_model->getListaAlumno1($id_usuario),
		'trabajo' => $this->Lugar_trabajo_model->valor_unidad($lugar_trabajo->id_lugar_trabajo),
		'listado' => $this->Solictudtramite_model->getdatosolicitud($id_solicitud,$id_usuario),			
	///	'materias_solicitadas' => $this->Materias_preinscrita_model->materias_solicitadas($id_usuario,$id_programa),
		'periodo' => $this->Periodo_model->PeriodoActivo(),
		);
	//var_dump($data);
		$this->load->view('layouts/header');
		$this->load->view('layouts/sidebar');       
		$this->load->view('supervisor/tramites/revision_tramites_vigente',$data);     
		$this->load->view('layouts/footer');
	}

	public function registro_validacion_tramite_store($id_solicitud,$id_usuario,$id_programa)
	{
		$fecha=date('Y-m-d_H-i');
		$solicitud=$this->Solictudtramite_model->getdatosolicitud_revision($id_solicitud);	
		
				$data2= array(
					'academico'=>1,
					'quien_actualizo'=>$this->session->userdata("id"),
					'dactualizo'=> $fecha,
				);
				$data=array(
					'reg_pago'=>1,
					'rev_academica'=>1,
					'quien_actualizo'=>$this->session->userdata("id"),
					'fecha_actualizacion'=> $fecha
				);
			if($solicitud->id_tramite=='28'){
				$data3=array(
					'aprobado'=>1,				
					'quien_actualizo'=>$this->session->userdata("id"),
					'dactualizacion'=> $fecha
				);
			}
			//	var_dump($data2);
			//	var_dump($solicitud);
				$actualiza_pago=$this->Registro_pago_model->save_conciliacion_tramite($id_solicitud,$data2);
				//var_dump($actualiza_pago);
				if($actualiza_pago){
				
					$actualiza_solicitud=$this->Solictudtramite_model->update($id_solicitud,$data);
					if($solicitud->id_tramite=='28') $actualiza_unidades=$this->Rucdetalle_unidades_model->update($id_solicitud,$data3);
					//var_dump($actualiza_solicitud);
					//var_dump($actualiza_unidades);
					if(($solicitud->id_tramite=='28' and $actualiza_solicitud and $actualiza_unidades) or ($solicitud->id_tramite<>'28' and $actualiza_solicitud)){
						$this->session->set_flashdata("success","Se registró la validación con exito..");
						redirect(base_url()."dashboard09/tramites_por_validar");
					}else{
						$this->session->set_flashdata("error","No se pudo guardar la información");
						redirect(base_url()."dashboard09/revisar_tramite/".$id_solicitud."/".$id_usuario."/".$id_programa);
					}
				}else{
					$this->session->set_flashdata("error","No se pudo guardar la información");
						redirect(base_url()."dashboard09/revisar_tramite/".$id_solicitud."/".$id_usuario."/".$id_programa);
				}
		
	}
	public function registro_validacion_tramite_store2($id_solicitud,$id_usuario,$id_programa)
	{
		$fecha=date('Y-m-d_H-i');
				$data2= array( //registro pago
					'academico'=>2,
					'quien_actualizo'=>$this->session->userdata("id"),
					'dactualizo'=> $fecha,
				);
				$data=array( //solicitud tramite
					'reg_pago'=>1,
					'rev_academica'=>2,
					'quien_actualizo'=>$this->session->userdata("id"),
					'fecha_actualizacion'=> $fecha
				);
				
				$data3=array(// rucdetalleunidades
					'aprobado'=>2,				
					'quien_actualizo'=>$this->session->userdata("id"),
					'ddactualizacion'=> $fecha
				);
				$actualiza_pago=$this->Registro_pago_model->save_conciliacion_tramite($id_solicitud,$data2);
			
				//var_dump($actualiza_pago);
				if($actualiza_pago){
					$actualiza_solicitud=$this->Solictudtramite_model->update($id_solicitud,$data);
					$actualiza_unidades=$this->Rucdetalle_unidades_model->update($id_solicitud,$data3);
				//	var_dump($actualiza_solicitud);
					if($actualiza_solicitud){
						$this->session->set_flashdata("success","Se registró la validación con exito..");
						redirect(base_url()."dashboard09/tramites_por_validar");
					}else{
						$this->session->set_flashdata("error","No se pudo guardar la información");
						redirect(base_url()."dashboard09/revisar_tramite/".$id_solicitud."/".$id_usuario."/".$id_programa);
					}
				}else{
					$this->session->set_flashdata("error","No se pudo guardar la información");
					redirect(base_url()."dashboard09/revisar_retiro/".$id_solicitud."/".$id_usuario);
				}
		
	}

public function tramites_validados_vigentes_reincorporacion()
	{
		$id_usuario = $this->session->userdata("id");
		$periodo=$this->Periodo_model->PeriodoActivo();
		$data = array(
		'listado' =>  $this->Solictudtramite_model-> getListaSolTramites_reincorporacion()	,
		'periodo' => $this->Periodo_model->PeriodoActivo(),
		);
//var_dump($data['periodo']);
		$this->load->view('layouts/header');
		$this->load->view('layouts/sidebar');
		$this->load->view('supervisor/tramites/tramites_aprobados_reincorporacion',$data);
		$this->load->view('layouts/footer');
	} 
	public function tramites_validados_reincorporacion_periodo($id_periodo)
	{
		$id_usuario = $this->session->userdata("id");
	
		$data = array(
		'listado' =>  $this->Solictudtramite_model-> getListaSolTramites_reincorporacion_periodo($id_periodo)	,
		'periodo' => $this->Periodo_model->getIdperiodo($id_periodo),	
		);
//var_dump($data['listado']);
		$this->load->view('layouts/header');
		$this->load->view('layouts/sidebar');
		$this->load->view('supervisor/tramites/tramites_aprobados_reincorporacion_periodo',$data);
		$this->load->view('layouts/footer');
	} 
public function excel_reincorporacion(){
	$data= array('listado' => $this->Solictudtramite_model-> getListaSolTramites_reincorporacion(),	
	'periodo' => $this->Periodo_model->PeriodoActivo(),
	'titulo'=>'Listado Reincorporaciones Revisadas <b> ',
	'nombre_archivo'=>'reincorporacion_revisados',

		);
//var_dump($data);

$this->load->view('supervisor/tramites/descarga_excel_reincorporaciones',$data);		
}
public function excel_reincorporacion_periodo(){

	$id_periodo=$this->uri->segment(3);
	

	$data= array('listado' => $this->Solictudtramite_model-> getListaSolTramites_reincorporacion_periodo($id_periodo),	
	'periodo' => $this->Periodo_model->getIdperiodo($id_periodo),
	'titulo'=>'Listado Reincorporaciones Revisadas <b> ',
	'nombre_archivo'=>'reincorporacion_revisados',

		);
//var_dump($data);

$this->load->view('supervisor/tramites/descarga_excel_reincorporaciones',$data);		
}
public function descargar_constancia_estudio($id_usuario,$id_solicitud)
	{
		
		$periodo=	$this->Periodo_model->PeriodoActivo();
		$control=	$this->Control_doctramite_model->get($id_usuario,$periodo->id,$id_solicitud);
		$solicitud_tramite= $this->Solictudtramite_model->getSolicitud($id_solicitud);
	

		
			if(!$control){
				$constancia=$this->Nro_constancia_model->getNroConstancia(1);
			//	var_dump($constancia);
				$correlativo=str_pad($constancia->correlativo, 3, "0", STR_PAD_LEFT);
				$mes_control=date('m');
				$anio=$constancia->anio;
				 $nro='ENFMP-DSG-CE-'.$constancia->anio.$mes_control.'-'.$correlativo;
				 $veces=$control->veces_impresion+1;
				$data_nro=array('id_usuario'=>$id_usuario,
				'id_usuario'=>$id_usuario,
							'nro_constancia'=>$nro,
							'id_solicitud_tramite'=>$id_solicitud,
							'quien_solicito'=>$id_usuario ,
							'id_periodo'=>$periodo->id,
							'veces_impresion'=>$veces,
				);
			//	var_dump($data_nro);
				$this->Control_doctramite_model->save($data_nro);
				$data_cons= array('correlativo'=>$constancia->correlativo + 1);
				$this->Nro_constancia_model->update($constancia->id,$data_cons);
			}else{
				$nro=$control->nro_constancia;
				$veces=$control->veces_impresion+1;
				$fecha=date("Y-m-d H:i:s");
				$data_nro=array(
							'veces_impresion'=>$veces,
							'quien_actualizo'=>$id_usuario ,
							'fecha_actualizacion'=>$fecha
				);
				//var_dump($data_nro);
					$this->Control_doctramite_model->update($control->id,$control->id_periodo,$control->id_usuario,$data_nro);
			}
			
			
		$fecha=date("d-m-Y");
		$fecha_letra=$this->fechaEs($fecha);
		$data=array('alumno'=>	$this->Alumno_model->getListaAlumno1($id_usuario),
		'periodo'	=>	$this->Periodo_model->PeriodoActivo(),		
		'oferta'	=> 	$this->Periodo_model->PeriodoActivoInicioFin(),
		'programa'	=> 	$this->Programa_model->getProgramaEsp($solicitud_tramite->id_programa) ,
		
		'materias_inscritas'=>$this->Materias_preinscrita_model->materias_preinscritas_periodo($id_usuario,$periodo->id,$solicitud_tramite->id_programa),
		'nro'		=>$nro,
		'fecha_letra'=> $fecha_letra);	
		

		$hoy = date("dmyhis");
		
         $html = $this->load->view('participante/documentos/constancia_estudio',$data,true);		
 	
        //this the the PDF filename that user will get to download
        $pdfFilePath = "constancia_estudio_".$nro.$hoy.".pdf";
 
        //load mPDF library
        $this->load->library('M_pdf');
        $mpdf = new mPDF('c', 'Letter-P'); 
$mpdf->SetProtection(array('copy','print'), '', 't3n0l0g143n7m9');
 		$mpdf->WriteHTML($html);
				
		$mpdf->Output($pdfFilePath, "D");
		
		

			}	
	
				function fechaEs($fecha) {
				$fecha = substr($fecha, 0, 10);
				$numeroDia = date('d', strtotime($fecha));
				$dia = date('l', strtotime($fecha));
				$mes = date('F', strtotime($fecha));
				$anio = date('Y', strtotime($fecha));
				//$numero_letras= array('Un','Dos', 'Tres','Cuatro','Cinco','Seis','Siete','Ocho','Nueve','Diez',
				//					'Un','Dos', 'Tres','Cuatro','Cinco','Seis','Siete','Ocho','Nueve','Diez',
				//					'Un','Dos', 'Tres','Cuatro','Cinco','Seis','Siete','Ocho','Nueve','Diez',);
				//$dias_ES = array("Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado", "Domingo");
				//$dias_EN = array("Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday");
				$nombredia = str_replace($dias_EN, $dias_ES, $dia);
				$meses_ES = array("enero", "febrero", "marzo", "abril", "mayo", "junio", "julio", "agosto", "septiembre", "octubre", "noviembre", "diciembre");
				$meses_EN = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
				$nombreMes = str_replace($meses_EN, $meses_ES, $mes);
				return $numeroDia." de ".$nombreMes." de ".$anio;
			}

	public function constancias_estudios_generadas()
			{
				$id_usuario = $this->session->userdata("id");
				$periodo=$this->Periodo_model->PeriodoActivo();
				$data = array(
				'listado' =>  $this->Solictudtramite_model->getListaSolTramites_constancias()	,
				'periodo' => $this->Periodo_model->PeriodoActivo(),
				);
		//var_dump($data['periodo']);
				$this->load->view('layouts/header');
				$this->load->view('layouts/sidebar');
				$this->load->view('supervisor/tramites/constancias_estudios_generadas',$data);
				$this->load->view('layouts/footer');
			} 	

			public function excel_constancia(){			
				$data= array('listado' => $this->Solictudtramite_model->getconstancias_trimestre(),						
				'periodo' => $this->Periodo_model->PeriodoActivo(),
				'titulo'=>'Listado de Constancias de Estudios Generadas <b> ',
				'nombre_archivo'=>'constancias_generadas',
					);
			//var_dump($data);
			
			$this->load->view('supervisor/tramites/descarga_excel_constancia',$data);		
			}
	
	
	public function registrotramiteRucReq_store($id){
		    // Agregar esto al inicio para depuración
			ini_set('memory_limit', '256M');
			ini_set('max_execution_time', 300);
			ini_set('post_max_size', '50M');
			
			// Verificar si hay datos POST
			if(empty($_POST)){
				$this->session->set_flashdata("error", "No se recibieron datos. El formulario está vacío o es demasiado grande.");
				redirect('dashboard09/solicitud_ruc_requisitos/2');
			}
		
			$id_usuario = $this->session->userdata("id");
			$usuario = $this->Alumno_model->getAlumno_cedula($id_usuario);
			$fecha_actual = date("Y-m-d H:i:s");
			$fecha_solicitud = date("Y-m-d");
			$id_programa = $this->input->post("comboprogramaActual");
			$id_programa2 = $this->input->post("comboprogramaRucRe");
			$id_tramite = $this->input->post("combotramiteRucRef");		
			$id_reconocimiento = $this->input->post("comboreconocimiento");	
			$institucion_origen = $this->input->post("institucion");			
			$titulos = $_FILES["titulos"];	
			$programas = $_FILES["programas"];
			$laboral = $_FILES["laboral"];
			$periodo = $this->Periodo_model->PeriodoActivo();
			
			// Recibir datos JSON de unidades seleccionadas
			$unidades_cursa_json = $this->input->post('unidades_cursa_seleccionadas_json');
			$unidades_cursado_json = $this->input->post('unidades_cursado_seleccionadas_json');
			$total_unidades_cursa = $this->input->post('total_unidades_cursa');
			$total_uc_cursa = $this->input->post('total_uc_cursa');
			$total_unidades_cursado = $this->input->post('total_unidades_cursado');
			$total_uc_cursado = $this->input->post('total_uc_cursado');
			
			// Validar que los JSON no estén vacíos
			if($id_reconocimiento==1  && empty($unidades_cursa_json)  && empty($unidades_cursado_json)) {
				$this->session->set_flashdata("error", "Debe seleccionar unidades curriculares en ambos programas.");
				redirect('dashboard09/solicitud_ruc_requisitos/2');
			}elseif ($id_reconocimiento<>1 && empty($unidades_cursa_json)) {
				$this->session->set_flashdata("error", "Debe seleccionar unidades curriculares del programa a cursar.");
				redirect('dashboard09/solicitud_ruc_requisitos/2');
			}
			
			// Decodificar JSON
			$unidades_cursa = json_decode($unidades_cursa_json, true);
			$unidades_cursado = json_decode($unidades_cursado_json, true);
			//var_dump($unidades_cursa);
			// Validar que haya seleccionado unidades
			
			if($id_reconocimiento==1  && (empty($unidades_cursa) || empty($unidades_cursado))) {
				$this->session->set_flashdata("error", "Debe seleccionar al menos una unidad curricular en cada programa.");
				redirect('dashboard09/solicitud_ruc_requisitos/2');
			}elseif($id_reconocimiento<>1 && empty($unidades_cursa)){
				$this->session->set_flashdata("error", "Debe seleccionar al menos una unidad curricular del programa a cursar.");
				redirect('dashboard09/solicitud_ruc_requisitos/2');
			}
			
			$data = array(
				'id_usuario' => $id_usuario, 
				'id_tramite' => $id_tramite,
				'id_programa' => $id_programa, 
				'id_programa_ruc_cursado' => $id_programa2,
				'fecha_registro' => $fecha_actual,
				'fecha_solicitud' => $fecha_solicitud,			
				'status' => 1,			
				'quien_registro' => $id_usuario, 
				'id_tipo_reconocimiento' => $id_reconocimiento, 	
				'institucion_origen' => $institucion_origen,
				
			);
			
			$archivos_cargados = 0;
			
			if (!$this->Solictudtramite_model->VerificarSolicitud($id_usuario, $id_tramite, $id_programa)){
				
				// INICIAR TRANSACCIÓN - Forma correcta CI3
			//	$this->db->trans_start();
				
				//echo "Guardar la solicitud principal y obtener el ID";
				$id_solicitud = $this->Solictudtramite_model->saveRuc($data);
				//var_dump($id_solicitud);
				if($id_solicitud){
					$unidades_cursa_guardadas = 0;
					$unidades_cursado_guardadas = 0;
					$error_unidades = false;
					
				//	echo "// Guardar unidades seleccionadas del programa que cursa";
					if(!empty($unidades_cursa)){
						foreach($unidades_cursa as $unidad) {
							$data_unidad_cursa = array(
								'id_solicitud' => $id_solicitud,
								'id_programa' => $id_programa,
								'id_pensum' => $unidad['id'],
								'tipo_programa' => 'cursa',
								'codigo_unidad' => isset($unidad['codigo']) ? $unidad['codigo'] : '',
								'nombre_unidad' => isset($unidad['nombre']) ? $unidad['nombre'] : '',
								'horas' => isset($unidad['horas']) ? $unidad['horas'] : 0,
								'uc' => isset($unidad['uc']) ? $unidad['uc'] : 0,
								'trimestre' => isset($unidad['trimestre']) ? $unidad['trimestre'] : '',
							
							);
							$resultado = $this->Rucdetalle_unidades_model->save($data_unidad_cursa);
							if(!$resultado){
								$error_unidades = true;
							} else {
								$unidades_cursa_guardadas++;
							}
						}
					}
					
					//echo "//  Guardar unidades seleccionadas del programa cursado";
					if(!empty($unidades_cursado)){
						foreach($unidades_cursado as $unidad) {
							$data_unidad_cursado = array(
								'id_solicitud' => $id_solicitud,
								'id_programa' => $id_programa2,
								'id_pensum' => $unidad['id'],
								'tipo_programa' => 'cursado',
								'codigo_unidad' => isset($unidad['codigo']) ? $unidad['codigo'] : '',
								'nombre_unidad' => isset($unidad['nombre']) ? $unidad['nombre'] : '',
								'horas' => isset($unidad['horas']) ? $unidad['horas'] : 0,
								'uc' => isset($unidad['uc']) ? $unidad['uc'] : 0,
								'trimestre' => isset($unidad['trimestre']) ? $unidad['trimestre'] : '',
								
							);
							$resultado = $this->Rucdetalle_unidades_model->save($data_unidad_cursado);
							if(!$resultado){
								$error_unidades = true;
							} else {
								$unidades_cursado_guardadas++;
							}
						}
					}
					
					$total_unidades_cursa_esperadas = count($unidades_cursa);
					$total_unidades_cursado_esperadas = count($unidades_cursado);
					
					// Verificar que se guardaron TODAS las unidades
					if($unidades_cursa_guardadas == $total_unidades_cursa_esperadas && 
					   $unidades_cursado_guardadas == $total_unidades_cursado_esperadas && !$error_unidades){
						//echo "las unidades estan seleccionadas";
						// Procesar archivos
						$carta = $this->cargar_carta_solicitud_ruc($id_solicitud);
						
						if($carta){ 
							//echo "la carta se proceso";
							if($id_reconocimiento == 1) {						
								if(isset($_FILES['titulos']) && !empty($_FILES['titulos']['name'][0])){
									$archivos_cargados = $this->Revision_archivos($titulos, 'Títulos de postgrado debidamente registrado, certificados o diplomas', 'tit', $usuario->cedula, $id_programa);
								} else {
									$this->session->set_flashdata("error", "No existen archivos que procesar.");
									redirect(base_url()."dashboard09/solicitud_ruc_requisitos/2");
								}	
							} elseif($id_reconocimiento == 2) {
								if(isset($_FILES['programas']) && !empty($_FILES['programas']['name'][0])){
									$archivos_cargados = $this->Revision_archivos($programas, 'Programas de estudios o contenido programático', 'pro', $usuario->cedula, $id_programa);
								} else {
									$this->session->set_flashdata("error", "No existen archivos que procesar.");
									redirect(base_url()."dashboard09/solicitud_ruc_requisitos/2");
								}	
							} elseif($id_reconocimiento == 3 || $id_reconocimiento == 4) {
								if(isset($_FILES['laboral']) && !empty($_FILES['laboral']['name'][0])){
									$archivos_cargados = $this->Revision_archivos($laboral, 'Constancias de experiencia laboral', 'lab', $usuario->cedula, $id_programa);
								} else {
									$this->session->set_flashdata("error", "No existen archivos que procesar.");
									redirect(base_url()."dashboard09/solicitud_ruc_requisitos/2");
								}	
							}
							
							if($archivos_cargados > 0){
						//		echo "los archivos cargados";
								// COMPLETAR TRANSACCIÓN - Todo bien
								//$this->db->trans_complete();
								
								// if($this->db->trans_status() === FALSE){
								// 	$this->session->set_flashdata("error", "Error en la transacción. Por favor, intente nuevamente.");
								// 	redirect(base_url()."dashboard09/solicitud_ruc_requisitos/2");
								// } else {
									$this->session->set_flashdata("success", "Solicitud Registrada Exitosamente.");
									//redirect(base_url()."dashboard09/solicitud_ruc_requisitos/2");
								
							} else {
								$this->session->set_flashdata("error", "Error al cargar los archivos (carta de solicitud).");
								redirect(base_url()."dashboard09/solicitud_ruc_requisitos/2");
							}
						} else {
							$this->session->set_flashdata("error", "Debe cargar la carta de solicitud.");
							redirect(base_url()."dashboard09/solicitud_ruc_requisitos/2");
						}
					} else {
						$this->session->set_flashdata("error", "Error al guardar las unidades curriculares.");
						redirect(base_url()."dashboard09/solicitud_ruc_requisitos/2");
					}
				} else {
					$this->session->set_flashdata("error", "Error al guardar la información de la solicitud.");
					redirect(base_url()."dashboard09/solicitud_ruc_requisitos/2");
				}
			} else {
				$this->session->set_flashdata("warning", "La solicitud ya se encuentra registrada.");
				redirect(base_url()."dashboard09/solicitud_ruc_requisitos/2");
			}
		
	}
	public function get_unidades_curriculares($id_solicitud) {
		// Obtener unidades que el estudiante CURSA actualmente en el programa
		$unidades_cursa = $this->Rucdetalle_unidades_model->unidades_cursa($id_solicitud);
		
		// Obtener unidades CURSADAS que solicita reconocimiento
		$unidades_cursadas = $this->Rucdetalle_unidades_model->unidades_cursadas($id_solicitud);
		
		echo json_encode([
			'unidades_cursa' => $unidades_cursa,
			'unidades_cursadas' => $unidades_cursadas
		]);
	}
	
	public function Revision_archivos($archivo, $titulo, $documento, $cedula, $programa) {
    $periodo = $this->Periodo_model->PeriodoActivo();
    
    // Inicializar contadores
    $archivos_cargados = 0;
    $archivos_error = 0;
    $archivos_warning = 0;
    $i = 1;
    
    echo '<div class="custom-file-review-container">
            <div class="custom-file-review-wrapper">
                <div class="custom-file-review-card">
                    <div class="custom-file-review-header">
                        <div class="custom-file-review-header-content">
                            <i class="fas fa-file-upload custom-header-icon"></i>
                            <h4 class="custom-header-title">Revisión de Archivos</h4>
                            <span class="custom-header-subtitle">' . htmlspecialchars($titulo) . '</span>
                        </div>
                    </div>
                    <div class="custom-file-review-body">';
    
    // Verificar si hay archivos
    if(isset($archivo['tmp_name']) && is_array($archivo['tmp_name'])) {
        echo '<div class="custom-files-list">';
        foreach ($archivo['tmp_name'] as $key => $tmp_name) {
            if (isset($archivo["name"][$key]) && !empty($archivo["name"][$key])) {
                $tipoarchivo = $archivo["type"][$key];
                $tamanoarchivo = $archivo["size"][$key];
                $archivonombre = $archivo["name"][$key];
                $fuente = $archivo["tmp_name"][$key];
                
                // Obtener extensión real del archivo
                $extension_real = strtolower(pathinfo($archivonombre, PATHINFO_EXTENSION));
                
                // Validar formato
                $formatos_permitidos = ['jpg', 'jpeg', 'png', 'pdf'];
                $extension_valida = in_array($extension_real, $formatos_permitidos);
                
                if (!$extension_valida) {
                    $archivos_warning++;
                    echo '
                    <div class="custom-alert custom-alert-warning">
                        <div class="custom-alert-icon">
                            <i class="fas fa-exclamation-triangle"></i>
                        </div>
                        <div class="custom-alert-content">
                            <div class="custom-alert-title">' . htmlspecialchars($archivonombre) . '</div>
                            <div class="custom-alert-message">
                                <span class="custom-badge custom-badge-warning">Formato no válido</span>
                                <span>Formatos permitidos: .jpg, .jpeg, .png, .pdf</span>
                            </div>
                        </div>
                        <button class="custom-alert-close" onclick="this.parentElement.remove()">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>';
                } else if ($tamanoarchivo > 1048576) {
                    $archivos_warning++;
                    $tamano_mb = number_format($tamanoarchivo / 1048576, 2);
                    echo '
                    <div class="custom-alert custom-alert-warning">
                        <div class="custom-alert-icon">
                            <i class="fas fa-weight-hanging"></i>
                        </div>
                        <div class="custom-alert-content">
                            <div class="custom-alert-title">' . htmlspecialchars($archivonombre) . '</div>
                            <div class="custom-alert-message">
                                <span class="custom-badge custom-badge-warning">Tamaño excedido</span>
                                <span>' . $tamano_mb . ' MB / máximo 1 MB</span>
                            </div>
                        </div>
                        <button class="custom-alert-close" onclick="this.parentElement.remove()">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>';
                } else {
                    // Construir carpeta
                    $carpeta = 'assets/tramites/ruc_' . trim($documento) . '_' . trim($programa) . '_' . trim($cedula) . '/';
                    
                    // Crear carpeta si no existe
                    if (!file_exists($carpeta)) {
                        mkdir($carpeta, 0777, true);
                    }
                    
                    // Nombre único con timestamp y número aleatorio
                    $timestamp = time();
                    $random = rand(1000, 9999);
                    $nombrenuevo = $documento . '_' . $cedula . '_' . $timestamp . '_' . $random . '.' . $extension_real;
                    $target_path = $carpeta . $nombrenuevo;
                    
                    // Mover archivo
                    if (move_uploaded_file($fuente, $target_path)) {
                        $archivos_cargados++;
                        echo '
                        <div class="custom-alert custom-alert-success">
                            <div class="custom-alert-icon">
                                <i class="fas fa-check-circle"></i>
                            </div>
                            <div class="custom-alert-content">
                                <div class="custom-alert-title">' . htmlspecialchars($archivonombre) . '</div>
                                <div class="custom-alert-message">
                                    <span class="custom-badge custom-badge-success">Cargado correctamente</span>
                                    <div class="custom-file-details">
                                        <small><i class="fas fa-save"></i> ' . $nombrenuevo . '</small>
                                        <small><i class="fas fa-database"></i> ' . number_format($tamanoarchivo / 1024, 2) . ' KB</small>
                                        <small><i class="fas fa-file"></i> ' . strtoupper($extension_real) . '</small>
                                    </div>
                                </div>
                            </div>
                            <button class="custom-alert-close" onclick="this.parentElement.remove()">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>';
                    } else {
                        $archivos_error++;
                        echo '
                        <div class="custom-alert custom-alert-error">
                            <div class="custom-alert-icon">
                                <i class="fas fa-times-circle"></i>
                            </div>
                            <div class="custom-alert-content">
                                <div class="custom-alert-title">' . htmlspecialchars($archivonombre) . '</div>
                                <div class="custom-alert-message">
                                    <span class="custom-badge custom-badge-error">Error al cargar</span>
                                    <span>Por favor, intente nuevamente</span>
                                </div>
                            </div>
                            <button class="custom-alert-close" onclick="this.parentElement.remove()">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>';
                    }
                }
            }
            $i++;
        }
        echo '</div>';
    } else {
        echo '<div class="custom-alert custom-alert-info">
                <div class="custom-alert-icon">
                    <i class="fas fa-info-circle"></i>
                </div>
                <div class="custom-alert-content">
                    <div class="custom-alert-message">No se encontraron archivos para procesar</div>
                </div>
              </div>';
    }
    
    $total_archivos = $archivos_cargados + $archivos_warning + $archivos_error;
    
    // Resumen personalizado
    echo '
    <div class="custom-summary-section">
        <div class="custom-summary-header">
            <i class="fas fa-chart-bar"></i>
            <h5>Resumen de carga</h5>
        </div>
        <div class="custom-summary-stats">
            <div class="custom-stat-card custom-stat-success">
                <div class="custom-stat-icon">
                    <i class="fas fa-check-circle"></i>
                </div>
                <div class="custom-stat-info">
                    <div class="custom-stat-number">' . $archivos_cargados . '</div>
                    <div class="custom-stat-label">Archivos exitosos</div>
                </div>
                <div class="custom-stat-progress">
                    <div class="custom-progress-bar" style="width: ' . ($total_archivos > 0 ? ($archivos_cargados / $total_archivos) * 100 : 0) . '%"></div>
                </div>
            </div>
            <div class="custom-stat-card custom-stat-warning">
                <div class="custom-stat-icon">
                    <i class="fas fa-exclamation-triangle"></i>
                </div>
                <div class="custom-stat-info">
                    <div class="custom-stat-number">' . $archivos_warning . '</div>
                    <div class="custom-stat-label">Advertencias</div>
                </div>
                <div class="custom-stat-progress">
                    <div class="custom-progress-bar" style="width: ' . ($total_archivos > 0 ? ($archivos_warning / $total_archivos) * 100 : 0) . '%"></div>
                </div>
            </div>
            <div class="custom-stat-card custom-stat-error">
                <div class="custom-stat-icon">
                    <i class="fas fa-times-circle"></i>
                </div>
                <div class="custom-stat-info">
                    <div class="custom-stat-number">' . $archivos_error . '</div>
                    <div class="custom-stat-label">Errores</div>
                </div>
                <div class="custom-stat-progress">
                    <div class="custom-progress-bar" style="width: ' . ($total_archivos > 0 ? ($archivos_error / $total_archivos) * 100 : 0) . '%"></div>
                </div>
            </div>
        </div>';
    
    if ($archivos_cargados > 0) {
        echo '
        <div class="custom-success-message">
            <i class="fas fa-trophy"></i>
            <div>
                <strong>¡Carga completada exitosamente!</strong><br>
                <small>Se cargaron ' . $archivos_cargados . ' de ' . $total_archivos . ' archivo(s)</small>
            </div>
        </div>';
    }
    
    echo '
    </div>';
    
    // Botón para continuar
    echo '
    <div class="custom-button-container">
        <a href="' . base_url() . 'dashboard09/solicitud_ruc_requisitos/2" class="custom-btn-primary">
            <i class="fas fa-arrow-right"></i>
            <span>Continuar</span>
        </a>
    </div>
    
    </div>
    </div>
    </div>
    </div>';
    
    // CSS personalizado completo
    echo '
    <style>
        /* Contenedor principal */
        .custom-file-review-container {
            padding: 20px;
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            min-height: 100vh;
            font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
        }
        
        .custom-file-review-wrapper {
            max-width: 1200px;
            margin: 0 auto;
        }
        
        /* Tarjeta principal */
        .custom-file-review-card {
            background: white;
            border-radius: 20px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            transform: translateY(0);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        
        .custom-file-review-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 30px 70px rgba(0, 0, 0, 0.15);
        }
        
        /* Header personalizado */
        .custom-file-review-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            padding: 30px 40px;
            position: relative;
            overflow: hidden;
        }
        
        .custom-file-review-header::before {
            content: "";
            position: absolute;
            top: -50%;
            right: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(255,255,255,0.1) 0%, rgba(255,255,255,0) 70%);
            transform: rotate(45deg);
        }
        
        .custom-file-review-header-content {
            position: relative;
            z-index: 1;
            display: flex;
            align-items: center;
            gap: 15px;
            flex-wrap: wrap;
        }
        
        .custom-header-icon {
            font-size: 2rem;
            color: white;
            filter: drop-shadow(0 2px 4px rgba(0,0,0,0.2));
        }
        
        .custom-header-title {
            color: white;
            margin: 0;
            font-size: 1.5rem;
            font-weight: 600;
            letter-spacing: -0.5px;
        }
        
        .custom-header-subtitle {
            color: rgba(255,255,255,0.9);
            margin-left: auto;
            font-size: 0.9rem;
            background: rgba(255,255,255,0.2);
            padding: 5px 12px;
            border-radius: 20px;
            backdrop-filter: blur(10px);
        }
        
        /* Cuerpo del contenido */
        .custom-file-review-body {
            padding: 40px;
        }
        
        /* Lista de archivos */
        .custom-files-list {
            display: flex;
            flex-direction: column;
            gap: 15px;
            margin-bottom: 30px;
        }
        
        /* Alertas personalizadas */
        .custom-alert {
            display: flex;
            align-items: flex-start;
            gap: 15px;
            padding: 20px;
            border-radius: 12px;
            position: relative;
            animation: slideIn 0.4s ease-out;
            transition: all 0.3s ease;
        }
        
        .custom-alert:hover {
            transform: translateX(8px);
        }
        
        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateX(-30px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }
        
        .custom-alert-success {
            background: linear-gradient(135deg, #f0fdf4 0%, #dcfce7 100%);
            border-left: 4px solid #22c55e;
        }
        
        .custom-alert-warning {
            background: linear-gradient(135deg, #fefce8 0%, #fef9c3 100%);
            border-left: 4px solid #eab308;
        }
        
        .custom-alert-error {
            background: linear-gradient(135deg, #fef2f2 0%, #fee2e2 100%);
            border-left: 4px solid #ef4444;
        }
        
        .custom-alert-info {
            background: linear-gradient(135deg, #eff6ff 0%, #dbeafe 100%);
            border-left: 4px solid #3b82f6;
        }
        
        .custom-alert-icon {
            font-size: 1.5rem;
            flex-shrink: 0;
        }
        
        .custom-alert-success .custom-alert-icon {
            color: #22c55e;
        }
        
        .custom-alert-warning .custom-alert-icon {
            color: #eab308;
        }
        
        .custom-alert-error .custom-alert-icon {
            color: #ef4444;
        }
        
        .custom-alert-info .custom-alert-icon {
            color: #3b82f6;
        }
        
        .custom-alert-content {
            flex: 1;
        }
        
        .custom-alert-title {
            font-weight: 600;
            font-size: 1rem;
            margin-bottom: 8px;
            color: #1f2937;
        }
        
        .custom-alert-message {
            display: flex;
            flex-direction: column;
            gap: 8px;
            font-size: 0.85rem;
            color: #4b5563;
        }
        
        .custom-badge {
            display: inline-block;
            padding: 4px 10px;
            border-radius: 20px;
            font-size: 0.75rem;
            font-weight: 600;
            width: fit-content;
        }
        
        .custom-badge-success {
            background: #22c55e;
            color: white;
        }
        
        .custom-badge-warning {
            background: #eab308;
            color: white;
        }
        
        .custom-badge-error {
            background: #ef4444;
            color: white;
        }
        
        .custom-file-details {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
            margin-top: 8px;
        }
        
        .custom-file-details small {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            color: #6b7280;
        }
        
        .custom-alert-close {
            background: none;
            border: none;
            font-size: 1rem;
            cursor: pointer;
            color: #9ca3af;
            transition: color 0.3s ease;
            padding: 5px;
        }
        
        .custom-alert-close:hover {
            color: #4b5563;
        }
        
        /* Sección de resumen */
        .custom-summary-section {
            margin-top: 40px;
            background: #f9fafb;
            border-radius: 16px;
            padding: 25px;
        }
        
        .custom-summary-header {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 25px;
            padding-bottom: 15px;
            border-bottom: 2px solid #e5e7eb;
        }
        
        .custom-summary-header i {
            font-size: 1.5rem;
            color: #667eea;
        }
        
        .custom-summary-header h5 {
            margin: 0;
            font-size: 1.2rem;
            font-weight: 600;
            color: #1f2937;
        }
        
        .custom-summary-stats {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            margin-bottom: 25px;
        }
        
        .custom-stat-card {
            background: white;
            border-radius: 12px;
            padding: 20px;
            display: flex;
            flex-direction: column;
            gap: 15px;
            transition: all 0.3s ease;
            cursor: pointer;
        }
        
        .custom-stat-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
        }
        
        .custom-stat-success {
            border-top: 3px solid #22c55e;
        }
        
        .custom-stat-warning {
            border-top: 3px solid #eab308;
        }
        
        .custom-stat-error {
            border-top: 3px solid #ef4444;
        }
        
        .custom-stat-icon {
            font-size: 2rem;
        }
        
        .custom-stat-success .custom-stat-icon {
            color: #22c55e;
        }
        
        .custom-stat-warning .custom-stat-icon {
            color: #eab308;
        }
        
        .custom-stat-error .custom-stat-icon {
            color: #ef4444;
        }
        
        .custom-stat-info {
            text-align: center;
        }
        
        .custom-stat-number {
            font-size: 2rem;
            font-weight: 700;
            color: #1f2937;
        }
        
        .custom-stat-label {
            font-size: 0.85rem;
            color: #6b7280;
            margin-top: 5px;
        }
        
        .custom-stat-progress {
            height: 4px;
            background: #e5e7eb;
            border-radius: 2px;
            overflow: hidden;
        }
        
        .custom-progress-bar {
            height: 100%;
            border-radius: 2px;
            transition: width 0.6s ease;
        }
        
        .custom-stat-success .custom-progress-bar {
            background: #22c55e;
        }
        
        .custom-stat-warning .custom-progress-bar {
            background: #eab308;
        }
        
        .custom-stat-error .custom-progress-bar {
            background: #ef4444;
        }
        
        .custom-success-message {
            background: linear-gradient(135deg, #22c55e 0%, #16a34a 100%);
            color: white;
            padding: 15px 20px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            gap: 15px;
        }
        
        .custom-success-message i {
            font-size: 1.5rem;
        }
        
        /* Botón personalizado */
        .custom-button-container {
            text-align: center;
            margin-top: 30px;
        }
        
        .custom-btn-primary {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            text-decoration: none;
            padding: 12px 30px;
            border-radius: 50px;
            font-weight: 600;
            transition: all 0.3s ease;
            border: none;
            cursor: pointer;
        }
        
        .custom-btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(102, 126, 234, 0.4);
            color: white;
            text-decoration: none;
        }
        
        /* Responsive */
        @media (max-width: 768px) {
            .custom-file-review-body {
                padding: 20px;
            }
            
            .custom-file-review-header {
                padding: 20px;
            }
            
            .custom-header-subtitle {
                margin-left: 0;
                width: 100%;
                text-align: center;
            }
            
            .custom-summary-stats {
                grid-template-columns: 1fr;
            }
            
            .custom-alert {
                flex-direction: column;
            }
            
            .custom-file-details {
                flex-direction: column;
                gap: 5px;
            }
        }
        
        /* Scroll personalizado */
        .custom-files-list::-webkit-scrollbar {
            width: 8px;
        }
        
        .custom-files-list::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 10px;
        }
        
        .custom-files-list::-webkit-scrollbar-thumb {
            background: #888;
            border-radius: 10px;
        }
        
        .custom-files-list::-webkit-scrollbar-thumb:hover {
            background: #555;
        }
    </style>';
    
    return $archivos_cargados;
}
	public function solicitud_ruc_requisitos_edit($id_solicitud)
	{
		$id_usuario = $this->session->userdata("id");
        	$usuario=$this->Alumno_model->getAlumno_cedula($id_usuario);
		
		$data = array(
			'solicitud'=>$this->Solictudtramite_model->getsolicitud($id_solicitud),
			'alumno_list'=> $this->Alumno_model->getListaAlumno1($id_usuario),	
			'programa' =>$this->Programa_model->getProgramaMostrar($id_prog=array(1,2,3,4,5,6,20,21,22,23,24,25,26)),	
			'programaCursado' =>$this->Programa_model->getProgramaMostrar($id_prog=array(1,2,3,4,5,6,20,21,22,23,24,25,26)),
			'reconocimiento'=>$this->Tipo_reconocimiento_model->get(17),	
			'combotramite'=> $this->Tramites_model->getListaTramites(2),			
			);

	
		$this->load->view('layouts/header');
		$this->load->view('layouts/sidebar_tramites');

			//if($id==2)	{		
				
				$this->load->view('participante/tramites/solicitud_ruc_requisitos_edit',$data); 
			//}
			$this->load->view('layouts/footer');
	}	
	public function update_ruc_requisitos_edit($id_solicitud){
		$id_usuario = $this->session->userdata("id");
		$usuario = $this->Alumno_model->getAlumno_cedula($id_usuario);
		$fecha_actual = date("Y-m-d H:i:s");
		
		// Obtener datos del formulario
		$id_programa = $this->input->post("id_programa_cursa");
		$id_tramite = $this->input->post("combotramite"); // Cambiado: quitar "RucRe"
		$id_reconocimiento = $this->input->post("id_reconocimiento");
		
		// Archivos
		$titulos = $_FILES["titulos"];
		$programas = $_FILES["programas"];
		$laboral = $_FILES["laboral"];
		$solicitud_file = $_FILES["solicitud"];
		
		// Inicializar contadores
		$archivos_cargados = 0;
		$archivos_cargados1 = 0;
		$archivos_cargados2 = 0;
		$archivos_cargados3 = 0;
		
		// Procesar carta de solicitud
		if(isset($solicitud_file) && !empty($solicitud_file['name'][0])){
			$carta = $this->cargar_carta_solicitud_ruc($id_solicitud);
			if($carta) {
				$this->session->set_flashdata("success", "Carta Solicitud Actualizada Exitosamente.");
			}
		}
		
		// Procesar según tipo de reconocimiento - CORREGIDO: enviar SOLO 5 parámetros
		if($id_reconocimiento == 1) {
			if(isset($titulos) && !empty($titulos['name'][0])){
				// SOLO 5 parámetros, sin $id_solicitud al final
											
				$archivos_cargados1 = $this->Revision_archivos($titulos, 'Títulos de postgrado debidamente registrado, certificados o diplomas', 'tit', $usuario->cedula, $id_programa);
				$archivos_cargados = $archivos_cargados1;
			} else {
				$this->session->set_flashdata("error", "No existen archivos que procesar para el tipo de reconocimiento.");
				redirect(base_url()."dashboard09/solicitud_ruc_requisitos_edit/" . $id_solicitud);
			}
		} elseif($id_reconocimiento == 2) {
			if(isset($programas) && !empty($programas['name'][0])){
				// SOLO 5 parámetros
				$archivos_cargados2 = $this->Revision_archivos($programas, 'Programas de estudios o contenido programático', 'pro', $usuario->cedula, $id_programa);
				$archivos_cargados = $archivos_cargados2;
			} else {
				$this->session->set_flashdata("error", "No existen archivos que procesar para el tipo de reconocimiento.");
				redirect(base_url()."dashboard09/solicitud_ruc_requisitos_edit/" . $id_solicitud);
			}
		} elseif($id_reconocimiento == 3 || $id_reconocimiento == 4) {
			if(isset($laboral) && !empty($laboral['name'][0])){
				// SOLO 5 parámetros
				$archivos_cargados3 = $this->Revision_archivos($laboral, 'Constancias de experiencia laboral', 'lab', $usuario->cedula, $id_programa);
				$archivos_cargados = $archivos_cargados3;
			} else {
				$this->session->set_flashdata("error", "No existen archivos que procesar para el tipo de reconocimiento.");
				redirect(base_url()."dashboard09/solicitud_ruc_requisitos_edit/" . $id_solicitud);
			}
		}
		
		if ($archivos_cargados > 0) {
			$this->session->set_flashdata("success", "Archivos Actualizados Exitosamente.");
			//redirect(base_url()."dashboard09/solicitud_ruc_requisitos/2");
		} else {
			$this->session->set_flashdata("error", "Debe cargar los documentos según el trámite a solicitar. Verificar si el formato del archivo es legible");
			redirect(base_url()."dashboard09/solicitud_ruc_requisitos_edit/" . $id_solicitud);
		}
	}
public function eliminar_archivo_directorio ($documento,$programa,$cedula,$archivo,$id_solicitud)
	{

	$carpeta='assets/tramites/ruc_'.$documento.'_'.$programa.'_'.$cedula.'/';
	$ruta_archivo ='assets/tramites/ruc_'.$documento.'_'.$programa.'_'.$cedula.'/'.$archivo; // Reemplaza con la ruta y nombre del archivo
	//$ruta_archivo ='assets/tramites/ruc_'.$documento.'_'.$programa.'_'.$cedula.'/'.$archivo; // Reemplaza con la ruta y nombre del archivo
	$dir=fopen($ruta_archivo,'a');
	//if (rename($$ruta_archivo, $ruta_completa_nueva)) {
	if (unlink($ruta_archivo)) {
		$this->session->set_flashdata("success",  "Archivo eliminado correctamente.");
		redirect(base_url()."dashboard09/solicitud_ruc_requisitos_edit/$id_solicitud");  
	} else {
		$this->session->set_flashdata("error","Error al eliminar el archivo.");
		redirect(base_url()."dashboard09/solicitud_ruc_requisitos_edit/$id_solicitud");  
	}
	fclose($dir);
//}
}

public function solicitudes_ruc_revisadas()
	{
		$id_usuario = $this->session->userdata("id");
		$periodo=$this->Periodo_model->PeriodoActivo();
		$data = array(
		'listado' => $this->Registro_pago_model->get_solicitides_ruc_validadas($periodo->id),
		'periodo' => $this->Periodo_model->PeriodoActivo(),
		);
		
	
		$this->load->view('layouts/header');
		$this->load->view('layouts/sidebar');       
		$this->load->view('supervisor/tramites/tramites_aprobados_sol_ruc',$data);     
		$this->load->view('layouts/footer');
	}
	public function revisar_documento_ruc($id_solicitud,$id_usuario,$id_programa)
	{
	
//echo $id_solicitud;
//echo $id_solicitud;
$lugar_trabajo = $this->Trabajo_model->Lugar_trabajo($id_usuario);

		$data = array(
		'datos_alumno'	=> $this->Alumno_model->getListaAlumno1($id_usuario),
		'trabajo' => $this->Lugar_trabajo_model->valor_unidad($lugar_trabajo->id_lugar_trabajo),
		'listado' => $this->Solictudtramite_model->getdatosolicitud($id_solicitud,$id_usuario),				
		'periodo' => $this->Periodo_model->PeriodoActivo(),
		);
	//var_dump($data);
		$this->load->view('layouts/header');
		$this->load->view('layouts/sidebar');       
		$this->load->view('supervisor/tramites/revision_documentos_ruc',$data);     
		$this->load->view('layouts/footer');
	}
	public function excel_sol_ruc(){
		$periodo=$this->Periodo_model->PeriodoActivo();
		$data= array('listado' => $this->Registro_pago_model->get_solicitides_ruc_validadas($periodo->id),
		'periodo' => $this->Periodo_model->PeriodoActivo(),
		'titulo'=>'Listado de Solicitudes RUC Realizadas <b> ',
		'nombre_archivo'=>'tramites_realizados_ruc',
	
			);
	//var_dump($data);
	
	$this->load->view('supervisor/tramites/descarga_excel_tramites',$data);		
	

}
public function cargar_carta_solicitud_ruc($id_solicitud){
		//compruebo si las caracter�sticas del archivo son las que deseo //record academico
		//record academico
		extract($_REQUEST);
		 $nombre_archivo2 = $_FILES['solicitud']['name'];
		 $tipo_archivo2 = $_FILES['solicitud']['type'];
		 $tamano_archivo2 = $_FILES['solicitud']['size'];
		
		if (!((strpos($tipo_archivo2, "pdf") )))
		{ // formato incorrecto
			$mensaje = $nombre_archivo2.' - '.$tipo_archivo2.' - '.$tamano_archivo2;
			$mensaje.=$tipo_archivo2." <strong>El formato del archivo 'Carta de Solicitud del RUC' es invalido. El archivo debe tener el formato: .pdf</strong>";
		} else if (($tamano_archivo2 > 1048576)) { // excede el tama�o permitido
		$mensaje="<strong>El documento  no puede exceder de 1 Mb, el archivo que intenta cargar tiene un tama&ntilde;o de: ".number_format($tamano_archivo2/1048576,2)." Mb </strong><br/> Seleccione otra imagen e intente de nuevo";
		} else { // todo ok
			if(strpos($tipo_archivo2, "pdf")&& move_uploaded_file($_FILES['solicitud']['tmp_name'], 'assets/tramites/ruc/'.$id_solicitud.'_'. $this->session->userdata('id')."_ruc.pdf")){
				$mensaje="";
			} else {
				$mensaje="Ocurrio algun error al subir el archivo. No pudo guardarse.";
			}
		}
		$registro_requisito=0;
	if ($mensaje=="") {
	//	echo "estoy aqui";
		$periodo=$this->Periodo_model->PeriodoActivo();
		$data3= array(
		'id_usuario'=>$this->session->userdata('id'),
		'id_requisito'=>'16',//carta solicitud ruc
		'id_periodo'=>$periodo->id,
		);
		// var_dump($data);
		if(!$this->Control_requisitos_model->getControl_requisitos($periodo->id,18,$this->session->userdata('id'))){
			$this->Control_requisitos_model->save($data3);		
			return true;
		}else{
			$this->Control_requisitos_model->update($data3);		
			return true;
			
		}
	
		
	
	}else{
		//echo "estoy aqui nooo";
		$this->session->set_flashdata("error",$mensaje);
		redirect(base_url()."dashboard09/solicitud_ruc_requisitos/2");  
		
	}

	
	}

	public function solicitud_egreso_tramitados()
	{
	

		$data = array(
		'listado' => $this->Solictudtramite_model->getSolicitud_Egreso_Vigentes(),			
		'periodo' => $this->Periodo_model->PeriodoActivo(),
		);
	
		$this->load->view('layouts/header');
		$this->load->view('layouts/sidebar');       
		$this->load->view('supervisor/tramites/solicitud_egreso_vigente',$data);     
		$this->load->view('layouts/footer');
	}
	public function revisar_egreso($id_solicitud,$id_usuario,$id_programa)
	{
	
//echo $id_solicitud;
//echo $id_solicitud;
$lugar_trabajo = $this->Trabajo_model->Lugar_trabajo($id_usuario);

		$data = array(
		'datos_alumno'	=> $this->Alumno_model->getListaAlumno1($id_usuario),
		'trabajo' => $this->Lugar_trabajo_model->valor_unidad($lugar_trabajo->id_lugar_trabajo),
		'listado' => $this->Solictudtramite_model->getdatosolicitud($id_solicitud,$id_usuario),			
	
		'periodo' => $this->Periodo_model->PeriodoActivo(),
		);
	//var_dump($data);
		$this->load->view('layouts/header');
		$this->load->view('layouts/sidebar');       
		$this->load->view('supervisor/tramites/revision_egresos_vigente',$data);     
		$this->load->view('layouts/footer');
	}

	public function validar_egreso_store($id_solicitud,$id_usuario,$id_programa)
	{
		$fecha=date('Y-m-d_H-i');
		
		
				
				$data=array(
					'reg_pago'=>1,
					'rev_academica'=>1,
					'quien_actualizo'=>$this->session->userdata("id"),
					'fecha_actualizacion'=> $fecha
				);
		
			
					$actualiza_solicitud=$this->Solictudtramite_model->update($id_solicitud,$data);
			
					if($actualiza_solicitud){
						$this->session->set_flashdata("success","Se registró la validación con exito..");
						redirect(base_url()."dashboard09/solicitud_egreso_tramitados");
					}else{
						$this->session->set_flashdata("error","No se pudo guardar la información");
						redirect(base_url()."dashboard09/revisar_egreso/".$id_solicitud."/".$id_usuario."/".$id_programa);
					}
			
		
	}
	public function validar_egreso_store2($id_solicitud,$id_usuario,$id_programa)
	{
		$fecha=date('Y-m-d_H-i');
	
				$data=array(
					'reg_pago'=>2,
					'rev_academica'=>2,
					'quien_actualizo'=>$this->session->userdata("id"),
					'fecha_actualizacion'=> $fecha
				);
		
					$actualiza_solicitud=$this->Solictudtramite_model->update($id_solicitud,$data);
				//	var_dump($actualiza_solicitud);
					if($actualiza_solicitud){
						$this->session->set_flashdata("success","Se registró la validación con exito..");
						redirect(base_url()."dashboard09/solicitud_egreso_tramitados");
					}else{
						$this->session->set_flashdata("error","No se pudo guardar la información");
						redirect(base_url()."dashboard09/revisar_egreso/".$id_solicitud."/".$id_usuario."/".$id_programa);
					}
		
	}
	public function tramites_validados_vigentes_egreso()
	{
		$id_usuario = $this->session->userdata("id");
		$periodo=$this->Periodo_model->PeriodoActivo();
		$data = array(
		'listado' =>  $this->Solictudtramite_model->getListaSolTramites_egresos_validados()	,
		'periodo' => $this->Periodo_model->PeriodoActivo(),
		);
//var_dump($data['periodo']);
		$this->load->view('layouts/header');
		$this->load->view('layouts/sidebar');
		$this->load->view('supervisor/tramites/tramites_aprobados_egreso',$data);
		$this->load->view('layouts/footer');
	}
	public function excel_egresos(){
	
		$data= array('listado' =>  $this->Solictudtramite_model->getListaSolTramites_egresos_validados(),	
		'periodo' => $this->Periodo_model->PeriodoActivo(),
		'titulo'=>'Listado Solicitudes de Egreso Revisados <b> ',
		'nombre_archivo'=>'egresos_revisados',
	
			);
	//var_dump($data);
	
	$this->load->view('supervisor/tramites/descarga_excel_egreso',$data);		
	}

	
public function buscar_cedula_tramite(){
		
	$data = array('periodo'=>$this->Periodo_model->PeriodoActivo()		);
	 
	$this->load->view('layouts/header');
	$this->load->view('layouts/sidebar');
	$this->load->view('supervisor/tramites/buscar_tramites_cedula',$data);
	$this->load->view('layouts/footer');
}		

public function mostrar_tramtes_cedula()
{
$cedula = $_POST["cedula"];

$data = array(
'listado' => $this->Solictudtramite_model->getbuscarTramites_cedula($cedula),		
'datos_alumno'	=> $this->Alumno_model->buscar_estudiante_cedula1($cedula)
);
	//var_dump($data);
$this->load->view('layouts/header');
$this->load->view('layouts/sidebar');
$this->load->view('supervisor/tramites/tramites_cedula',$data);
$this->load->view('layouts/footer');
}
public function get_unidades_retiro($id_solicitud) {
    // Forzar respuesta JSON
    $this->output->set_content_type('application/json');
    
    log_message('debug', '=== get_unidades_retiro() === id_solicitud=' . $id_solicitud);
    
    if (empty($id_solicitud)) {
        log_message('error', 'get_unidades_retiro: ID vacío');
        $this->output->set_output(json_encode([
            'success' => false,
            'message' => 'ID de solicitud no proporcionado.'
        ]));
        return;
    }
    
    // 1. Obtener datos de la solicitud
    $this->db->select("st.periodo_solicitud_retiro, st.id_usuario, st.id_programa");
    $this->db->from("solicitud_tramite st");
    $this->db->where("st.id", $id_solicitud);
    $query_solicitud = $this->db->get();
    $solicitud = $query_solicitud->row();
    
    log_message('debug', 'get_unidades_retiro: solicitud encontrada=' . ($solicitud ? 'SI' : 'NO'));
    
    if (empty($solicitud)) {
        $this->output->set_output(json_encode([
            'success' => false,
            'message' => 'No se encontró la solicitud con ID: ' . $id_solicitud
        ]));
        return;
    }
    
    $id_periodo  = $solicitud->periodo_solicitud_retiro;
    $id_usuario  = $solicitud->id_usuario;
    $id_programa = $solicitud->id_programa;
    
    // 2. Obtener las materias con retiro = 1 para este período y usuario
    $this->db->select("mp.id, mp.id_oferta_academica, mp.retiro, 
                       oa.trimestre, 
                       pen.codigo, 
                       pen.nombre as unidad_curricular, 
                       oa.unidades_creditos as uc");
    $this->db->from("materias_preinscritas mp");
    $this->db->join("oferta_academica oa", "mp.id_oferta_academica = oa.id");
    $this->db->join("pensum pen", "oa.id_pensum = pen.id");
    $this->db->where("mp.id_usuario", $id_usuario);
    $this->db->where("mp.id_periodo", $id_periodo);
    $this->db->where("mp.retiro", 1);
    $this->db->where("mp.status", 1);
    $this->db->where("mp.reg_pago", 1);
    $this->db->where("mp.rev_academica", 1);
    
    if (!empty($id_programa)) {
        $this->db->where("oa.id_programa", $id_programa);
    }
    
    $this->db->order_by("oa.trimestre", "ASC");
    
    $query = $this->db->get();
    $resultados = $query->result();
    
    log_message('debug', 'get_unidades_retiro: materias encontradas=' . count($resultados));
    log_message('debug', 'get_unidades_retiro: last_query=' . $this->db->last_query());
    
    // 3. Obtener información adicional (trámite, programa, período)
    $this->db->select("t.nombre as tramite, p.nombre as programa, pe.nombre as periodo");
    $this->db->from("solicitud_tramite st");
    $this->db->join("tramites t", "st.id_tramite = t.id");
    $this->db->join("programa p", "st.id_programa = p.id");
    $this->db->join("periodo pe", "st.periodo_solicitud_retiro = pe.id");
    $this->db->where("st.id", $id_solicitud);
    $query_info = $this->db->get();
    
    $info = $query_info->row();
    
    // 4. Calcular total de UC
    $total_uc = 0;
    if (!empty($resultados)) {
        foreach ($resultados as $item) {
            $total_uc += floatval($item->uc);
        }
    }
    
    // 5. Devolver JSON
    $response = [
        'success'  => true,
        'data'     => $resultados,
        'info'     => $info,
        'fecha'    => date('d/m/Y H:i'),
        'total_uc' => $total_uc
    ];
    
    log_message('debug', 'get_unidades_retiro: response OK. total_uc=' . $total_uc . ' | registros=' . count($resultados));
    
    $this->output->set_output(json_encode($response));
}

}


