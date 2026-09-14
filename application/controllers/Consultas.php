<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Consultas extends CI_Controller {// controlador Consultas Control de EStudio (historicos)

	public function __construct(){
		parent::__construct();
				$this->load->model("Usuarios_model");
		$this->load->model("Banco_model");
		$this->load->model("Registro_pago_model");
		$this->load->model("Reincorporaciones_model");
		$this->load->model("Alumno_model");
		$this->load->model("Trabajo_model");
		$this->load->model("Oferta_academica_model");
		$this->load->model("Materias_preinscrita_model");
		$this->load->model("Periodo_model");
		$this->load->model("Lugar_trabajo_model");
		$this->load->model("Aspirantes_model");
		$this->load->model("Alumno_model");
$this->load->model("Control_requisitos_model");
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
		$data= array("periodo"=>$this->Periodo_model->getAllperiodo());

		$this->load->view('layouts/header');
		$this->load->view('layouts/sidebar');
		$this->load->view('supervisor/consultas/buscar_periodo',$data);
		$this->load->view('layouts/footer');
	}
	public function listado_general()
	{
		$id_periodo = $_POST["periodo"];

		$data = array(
		'total_inscritos' => $this->Materias_preinscrita_model->total_inscritos_periodo($id_periodo),
		'periodo'=>$this->Periodo_model->getIdperiodo($id_periodo)
		
	);
		//var_dump($data);
		$this->load->view('layouts/header');
		$this->load->view('layouts/sidebar');
		$this->load->view('supervisor/consultas/listado_general',$data);
		$this->load->view('layouts/footer');
	}
	public function buscar_periodo_aspirantes()
	{
		$id_usuario = $this->session->userdata("id");
		$data= array("periodo"=>$this->Periodo_model->getAllperiodo_asp());

		$this->load->view('layouts/header');
		$this->load->view('layouts/sidebar');
		$this->load->view('supervisor/consultas/buscar_aspirantes',$data);
		$this->load->view('layouts/footer');
	}
	public function buscar_cedula()
	{
		//$id_usuario = $this->session->userdata("id");
		//$data= array("periodo"=>$this->Periodo_model->getAllperiodo());

		$this->load->view('layouts/header');
		$this->load->view('layouts/sidebar');
		$this->load->view('supervisor/consultas/buscar_cedula');
		$this->load->view('layouts/footer');
	}
	public function listado_general_aspirantes()//consultas periodos anterires
	{
		$id_periodo = $_POST["periodo"];
		$data = array(
		'total_inscritos' => $this->Aspirantes_model->total_inscritos_aspirantes_periodo($id_periodo),
		'periodo'=>$this->Periodo_model->getIdperiodo($id_periodo)
		
	);
		//var_dump($data);
		$this->load->view('layouts/header');
		$this->load->view('layouts/sidebar');
		$this->load->view('supervisor/consultas/listado_general_aspirantes',$data);
		$this->load->view('layouts/footer');
	}
public function listado_cedula()
	{
		 $cedula = $_POST["cedula"];
		$data = array(
		'alumno_list'=>$this->Alumno_model->buscar_estudiante_cedula1($cedula),
		'total_inscritos' => $this->Materias_preinscrita_model->materias_inscritas_cedula($cedula),		
		'aspirante'=> $this->Materias_preinscrita_model->aspirantes_cedula($cedula),
		'rol'=>  $this->session->userdata('rol')
	);
		//var_dump($data['alumno']);
		$this->load->view('layouts/header');
		$this->load->view('layouts/sidebar');
		$this->load->view('supervisor/consultas/listado_cedula',$data);
		$this->load->view('layouts/footer');
	}
public function ver_planilla_cedula()
	{
		 $id_usuario = $this->session->userdata('id');
		 $datos_alumno=$this->Alumno_model->getListaAlumno($id_usuario);
		$data = array(
		'alumno_list'=>$this->Alumno_model->buscar_estudiante_cedula1($datos_alumno->cedula),
		'total_inscritos' => $this->Materias_preinscrita_model->materias_inscritas_cedula($datos_alumno->cedula),		
		'aspirante'=> $this->Materias_preinscrita_model->aspirantes_cedula($datos_alumno->cedula),
		'rol'=>  $this->session->userdata('rol')
	);
		//var_dump($data);
		$this->load->view('layouts/header');
		$this->load->view('layouts/sidebar');
		$this->load->view('supervisor/consultas/listado_cedula',$data);
		$this->load->view('layouts/footer');
	}
	public function planilla()//regulares
	{
		$id_usuario = $this->uri->segment(3);
		$id_programa_ = $this->uri->segment(4);
		$id_periodo =  $this->uri->segment(5);
	
		$id_programa= $this->Materias_preinscrita_model-> Materia_alumno_periodo($id_usuario,$id_programa_);
		$codigo_tel_alumno=$this->Alumno_model->getListaAlumno($id_usuario);	
		
/*		echo "programa".$id_programa_;
		echo "usuario".$id_usuario;
		echo "periodo".$id_periodo;
*/		//var_dump($id_programa);

		foreach ($id_programa as $id_programa ) {
	
			$lugar_trabajo = $this->Trabajo_model->Lugar_trabajo($id_usuario);	
			$data = array(
				'datos_alumnos' => $this->Alumno_model->getListaAlumno($id_usuario),
				'direccion'		=> $this->Direccion_model->MostarDireccion($id_usuario),
				'telefono_hab'	=>  $this->Codigo_tel_model->getCodigo_nacional($codigo_tel_alumno->id_codigo_hab),
				'telefono_cel'	=>  $this->Codigo_tel_model->getCodigo_celular($codigo_tel_alumno->id_codigo_cel),
				'titulo'		=> $this->Materias_preinscrita_model->mensaje_materias_preinscritas_alumno_titulo($id_usuario,$id_periodo,$id_programa->programa_id),
				'materias_pre'	=> $this->Materias_preinscrita_model->mensaje_materias_preinscritas_alumno_periodo($id_usuario,$id_periodo,$id_programa->programa_id),
				'trabajo' 		=> $this->Lugar_trabajo_model->valor_unidad($lugar_trabajo->id_lugar_trabajo),
				'datos_trabajo' => $this->Trabajo_model->getListaTrabajo($id_usuario,1),
				'circunscripcion'	=> $this->Estado_model->getEstado_circuncripcion($id_usuario,$lugar_trabajo->id_lugar_trabajo),
				'registro_pago'	=>$this->Registro_pago_model->MostrarRegistro_pago($id_usuario,$id_periodo),
			);
			
		}
		//var_dump($data);
		$hoy = date("dmyhis");

	
	
		
		$this->load->view('layouts/header');
		$this->load->view('layouts/sidebar');
		
		$this->load->view('planilla/planilla_consulta',$data);		
		$this->load->view('layouts/footer');
		
		
	}
	public function descargar(){// regulares
		$id_usuario = $this->uri->segment(3);
		$id_programa_ = $this->uri->segment(4);
		$id_periodo =  $this->uri->segment(5);
	
		$id_programa= $this->Materias_preinscrita_model-> Materia_alumno_periodo($id_usuario,$id_programa_);	
		$codigo_tel_alumno=$this->Alumno_model->getListaAlumno($id_usuario);	
		
/*		echo "programa".$id_programa_;
		echo "usuario".$id_usuario;
		echo "periodo".$id_periodo;
*/		//var_dump($id_programa);

		foreach ($id_programa as $id_programa ) {
	
			$lugar_trabajo = $this->Trabajo_model->Lugar_trabajo($id_usuario);	
			$data = array(
				'datos_alumnos' => $this->Alumno_model->getListaAlumno($id_usuario),
				'direccion'		=> $this->Direccion_model->MostarDireccion($id_usuario),
				'telefono_hab'	=>  $this->Codigo_tel_model->getCodigo_nacional($codigo_tel_alumno->id_codigo_hab),
				'telefono_cel'	=>  $this->Codigo_tel_model->getCodigo_celular($codigo_tel_alumno->id_codigo_cel),
				'titulo'		=> $this->Materias_preinscrita_model->mensaje_materias_preinscritas_alumno_titulo($id_usuario,$id_periodo,$id_programa->programa_id),
				'materias_pre'	=> $this->Materias_preinscrita_model->mensaje_materias_preinscritas_alumno_periodo($id_usuario,$id_periodo,$id_programa->programa_id),
				'trabajo' 		=> $this->Lugar_trabajo_model->valor_unidad($lugar_trabajo->id_lugar_trabajo),
				'datos_trabajo' => $this->Trabajo_model->getListaTrabajo($id_usuario,1),
				'circunscripcion'	=> $this->Estado_model->getEstado_circuncripcion($id_usuario,$lugar_trabajo->id_lugar_trabajo),
				'registro_pago'	=>$this->Registro_pago_model->MostrarRegistro_pago($id_usuario,$id_periodo),
				
				
			);
			
		}
	
		$hoy = date("dmyhis");

        //load the view and saved it into $html variable
        //$html = 
//        "<style>@page {
//			    margin-top: 0.5cm;
//			    margin-bottom: 0.5cm;
//			    margin-left: 0.5cm;
//			    margin-right: 0.5cm;
//			}
//			</style>".
//        "<body>
//        	<div style='color:#006699;'><b>".$this->input->post('txtPDF')."<b></div>".
//        		"<div style='width:50px; height:50px; background-color:red;'>asdf</div>
//
//        </body>";

         $html = $this->load->view('planilla/planilla_consulta',$data,true);
 		
 		//$html="asdf";
        //this the the PDF filename that user will get to download
        $pdfFilePath = "cipdf_".$hoy.".pdf";
 
        //load mPDF library
        $this->load->library('M_pdf');
        $mpdf = new mPDF('c', 'Letter-P'); 
$mpdf->SetProtection(array('copy','print'), '', 't3n0l0g143n7m9');
 		$mpdf->WriteHTML($html);
		$mpdf->Output($pdfFilePath, "D");

	}

public function dExcel_inscritos(){// regulares
	
		
	 $id_periodo =$this->uri->segment(3);
	 $data= array('registros'=>$this->Materias_preinscrita_model->estudiantes_inscritos_periodo($id_periodo,5),
	 			'titulo'=>'Listado Estudiantes Regulares Inscritos <b> Período',
	 			'nombre_archivo'=>'inscritos_regulares',
	 			'periodo'=>$this->Periodo_model->getIdperiodo($id_periodo),
	 				);
//var_dump($data);
		
		$this->load->view('supervisor/consultas/descarga_excel',$data);		
		
	}	

public function planilla_pre_asp()//planilla de preinscripcion //revision academica
	{
		
		 $id_usuario = $this->uri->segment(3);
		 $id_programa_ = $this->uri->segment(4);
		//var_dump($id_programa_);
		$id_programa= $this->Programa_model-> getProgramaEsp($id_programa_);
		//var_dump($id_programa);
		//echo "________________";
		 //$id_periodo = $this->Periodo_model->PeriodoActivo();
	$id_periodo =$this->uri->segment(5);
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
				'periodo'=>$this->Periodo_model->getIdperiodo($id_periodo),
				'especializacion'=>$this->Programa_model-> getProgramaEsp($id_programa_)
			);

		}
		
	//var_dump($data);
	
		$hoy = date("dmyhis");		
		$this->load->view('layouts/header');
		$this->load->view('layouts/sidebar');
		
		if($id_periodo < 11){
			$this->load->view('planilla/planilla_pre_asp',$data);		
		}else 
		{
//echo "planilla nuevaaaaaaaaaaaaaaaaaaaaaaa"; 
			$this->load->view('planilla/planilla_pre_asp_1_1_cons',$data);		
		}
		$this->load->view('layouts/footer');
		
		
	}

public function descargar_pla_pre_asp(){//aspirantes
			
		
	
	$id_usuario = $this->uri->segment(3);
	$id_programa_ = $this->uri->segment(4);
   //var_dump($id_programa_);
   $id_programa= $this->Programa_model-> getProgramaEsp($id_programa_);
   //var_dump($id_programa);
   //echo "________________";
	//$id_periodo = $this->Periodo_model->PeriodoActivo();
$id_periodo =$this->uri->segment(5);
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
				'periodo'=>$this->Periodo_model->getIdperiodo($id_periodo),
				'especializacion'=>$this->Programa_model-> getProgramaEsp($id_programa_)
			);

		}
		
	//var_dump($data);
		$hoy = date("dmyhis");
		//var_dump($id_periodo);
		if($id_periodo < 11){
			$planilla=$this->load->view('planilla/planilla_pre_asp',$data,true);		
		}else 
		{
			if($id_periodo >= 11 and $id_periodo <=13){
				$planilla=$this->load->view('planilla/planilla_pre_asp_1_1_old',$data,true);	
			}else{
				$planilla=$this->load->view('planilla/planilla_pre_asp_1_1_cons',$data,true);	
			}	
		}
      

         $html = $planilla;
 		
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
			
		



	public function dExcel_asp_inscritos(){
	
		
	 $id_periodo =$this->uri->segment(3);
	 $data= array('registros'=>$this->Aspirantes_model->total_inscritos_aspirantes_periodo($id_periodo),	 			
	 			'periodo'=>$this->Periodo_model->getIdperiodo($id_periodo),
	 				);
	// var_dump($data);
		
		$this->load->view('supervisor/consultas/descarga_excel_asp_periodo',$data);		
		
	}
	
public function dExcel_inscritos_uc_anteriores($id)
	{
		
		$id_periodo =$id;
		$data = array(
			'inscritos' => $this->Oferta_academica_model->revision_unidades_curriculares_anteriores($id_periodo),
			'periodo' => $this->Periodo_model->getIdperiodo($id_periodo),
		);
		
//		$this->load->view('layouts/header');
//		$this->load->view('layouts/sidebar');
		$this->load->view('supervisor/consultas/descarga_excel_uc_anteriores',$data);
//		$this->load->view('layouts/footer');
	} 

//// Dirección de Administracion (Periodos anteriores)
public function listconc_anteriores()
	{
		$id_usuario = $this->session->userdata("id");
		$id_periodo = $_POST["periodo"];
	
		// var_dump($id_periodo);
		$data = array(
		'listado' => $this->Registro_pago_model->Pago_conciliado_periodo($id_periodo),
		'periodo'=>$this->Periodo_model->getIdperiodo($id_periodo),
		'url'=>'consultas'

		);

		$this->load->view('layouts/header');
		$this->load->view('layouts/sidebar');
		$this->load->view('admin/administrador/list_conciliacion_anteriores',$data);
		$this->load->view('layouts/footer');
	} 

	
	public function listconc_tramites()
	{
		$id_usuario = $this->session->userdata("id");
		$id_periodo = $_POST["periodo"];
		$data = array(
		'listado' => $this->Registro_pago_model->Tramite_conc_periodo($id_periodo ),
		'periodo'=>$this->Periodo_model->getIdperiodo($id_periodo)
		);

		$this->load->view('layouts/header');
		$this->load->view('layouts/sidebar');
		$this->load->view('admin/administrador/list_conciliacion_tramite',$data);
		$this->load->view('layouts/footer');
	} 

	
	public function buscar_periodo_conciliaciones_regulares()
	{
		$id_usuario = $this->session->userdata("id");
		$data= array("periodo"=>$this->Periodo_model->getAllperiodo());

		$this->load->view('layouts/header');
		$this->load->view('layouts/sidebar');
		$this->load->view('admin/administrador/buscar_periodo_conciliacion',$data);
		$this->load->view('layouts/footer');
	}
	public function buscar_periodo_conciliaciones_tramites()
	{
		$id_usuario = $this->session->userdata("id");
		$data= array("periodo"=>$this->Periodo_model->getAllperiodo());

		$this->load->view('layouts/header');
		$this->load->view('layouts/sidebar');
		$this->load->view('admin/administrador/buscar_tramites_conciliados_ant',$data);
		$this->load->view('layouts/footer');
	}
	public function postgrado_conc_periodo($id,$aspirante,$periodo)//ver postgrados simon conciliado pago
	{
		  $id_usuario = $id; $url=$this->uri->segment(6);
	 
		if($aspirante=='1'){
//echo "ASPIRANTE";
			$data = array(
			'listado' => $this->Aspirantes_model->buscar_programa_aspirante($id_usuario,$periodo),
			'alumno' => $this->Alumno_model->getListaAlumno($id_usuario),

		);
			$this->load->view('layouts/header');
			$this->load->view('layouts/sidebar');
			$this->load->view('admin/administrador/ver_postgrados_aspirante',$data,$id_programa);
			$this->load->view('layouts/footer');
		}else{
			$data = array(
			'listado' => $this->Registro_pago_model->ver_postgrado_alumno_conc_ant($id_usuario,$periodo),
			'reincorporaciones'=>$this->Reincorporaciones_model->buscar_reincorporacion($id_usuario,$periodo),
'url' =>$url	// $this->uri->segment(4),
			);

			$this->load->view('layouts/header');
			$this->load->view('layouts/sidebar');
			$this->load->view('admin/administrador/ver_postgrados',$data);
			$this->load->view('layouts/footer');
		}
	}

public function clausula_online($id_usuario)
	{
		

		
			  $id_periodo =$this->uri->segment(4);
			
			 $id_usuario = $id_usuario;
		
			$lugartrabajo = $this->Trabajo_model->Lugar_trabajo($id_usuario);
			
			$data2 = array(
			'tiempo_pre' => $this->Tiempo_preinscripcion_model->gettiempo_preinscripcion(),
			'periodo'=> $this->Periodo_model->getIdperiodo_($id_periodo),
			);
			//var_dump($data);
			$this->load->view('layouts/header');
			$this->load->view('layouts/sidebar',$data2);
			
			//	echo   $id_periodo;
					if($this->Control_requisitos_model->getControl_requisitos($id_periodo,5,$id_usuario)  ){
						//echo "entre";
						$data=array('datos_alumnos' => $this->Alumno_model->getListaAlumno($id_usuario),
						'periodo' => $this->Periodo_model->getIdperiodo_($id_periodo),
						'materiasP'=>$this->Materias_preinscrita_model->preincritas_clausulas($id_usuario,$id_periodo,1),
						'materiasV'=>$this->Materias_preinscrita_model->preincritas_clausulas($id_usuario,$id_periodo,2),
						'materiasSP'=>$this->Materias_preinscrita_model->preincritas_clausulas($id_usuario,$id_periodo,3),
						'materiasTG'=>$this->Materias_preinscrita_model->preincritas_clausulas($id_usuario,$id_periodo,4),
						'modalidad'=>$this->Materias_preinscrita_model->preincritas_clausulas_modalidad($id_usuario,$id_periodo),
						'clausula'=>$this->Control_requisitos_model->getControl_requisitos($id_periodo,5,$id_usuario),
						'acepto'=>1,
						);
						//var_dump($data['clausula']);
						$this->load->view('supervisor/consultas/clausula_online',$data);// forma que carga las clausulas
					}
				
				
		
			$this->load->view('layouts/footer');			



	}
	public function clausula_dis_descargar($id_usuario)
	{
		

		
		  $id_periodo =$this->uri->segment(4);
			 $id_usuario = $id_usuario;
			 $id_programa = $id_programa;
			$lugartrabajo = $this->Trabajo_model->Lugar_trabajo($id_usuario);
			
			
			$data2 = array(
			'tiempo_pre' => $this->Tiempo_preinscripcion_model->gettiempo_preinscripcion(),
			'periodo'=> $this->Periodo_model->getIdperiodo_($id_periodo),
			);
			//var_dump($data);
			$this->load->view('layouts/header');
			$this->load->view('layouts/sidebar',$data2);
			
				
					if($this->Control_requisitos_model->getControl_requisitos($id_periodo,5,$id_usuario)  ){
						$data=array('datos_alumnos' => $this->Alumno_model->getListaAlumno($id_usuario),
						'periodo' => $this->Periodo_model->getIdperiodo_($id_periodo),
						
						'materiasV'=>$this->Materias_preinscrita_model->preincritas_clausulas($id_usuario,$id_periodo,2),
						
						'modalidad'=>$this->Materias_preinscrita_model->preincritas_clausulas_modalidad($id_usuario,$id_periodo),
						'clausula'=>$this->Control_requisitos_model->getControl_requisitos($id_periodo,5,$id_usuario),
						'acepto'=>1,
						);
					//	var_dump($data['clausula']);
					
					}
				
					$html = $this->load->view('supervisor/consultas/clausula_dis_descargar',$data,true);	
		
				//load mPDF library
				$this->load->library('M_pdf');
				$mpdf = new mPDF('c', 'Letter-P'); 
				$mpdf->SetProtection(array('copy','print'), '', 't3n0l0g143n7m9');
				$mpdf->WriteHTML($html);							
				$mpdf->Output($pdfFilePath, "D");					



	}
	public function clausula_pre_descargar($id_usuario)
	{		
			$id_periodo = $this->uri->segment(4);
			 $id_usuario = $id_usuario;
			 $id_programa = $id_programa;
			$lugartrabajo = $this->Trabajo_model->Lugar_trabajo($id_usuario);
			
			
			$data2 = array(
			'tiempo_pre' => $this->Tiempo_preinscripcion_model->gettiempo_preinscripcion(),
			'periodo'=> $this->Periodo_model->getIdperiodo_($id_periodo),
			);
			//var_dump($data);
			$this->load->view('layouts/header');
			$this->load->view('layouts/sidebar',$data2);
			
				
					if($this->Control_requisitos_model->getControl_requisitos($id_periodo,5,$id_usuario)  ){
						$data=array('datos_alumnos' => $this->Alumno_model->getListaAlumno($id_usuario),
						'periodo' => $this->Periodo_model->getIdperiodo_($id_periodo),
						
						'materiasP'=>$this->Materias_preinscrita_model->preincritas_clausulas($id_usuario,$id_periodo,1),
						
						'modalidad'=>$this->Materias_preinscrita_model->preincritas_clausulas_modalidad($id_usuario,$id_periodo),
						'clausula'=>$this->Control_requisitos_model->getControl_requisitos($id_periodo,5,$id_usuario),
						'acepto'=>1,
						);
					//	var_dump($data['clausula']);
					
					}
				
					$html = $this->load->view('supervisor/consultas/clausula_pre_descargar',$data,true);	
		
				//load mPDF library
				$this->load->library('M_pdf');
				$mpdf = new mPDF('c', 'Letter-P'); 
				$mpdf->SetProtection(array('copy','print'), '', 't3n0l0g143n7m9');
				$mpdf->WriteHTML($html);							
				$mpdf->Output($pdfFilePath, "D");					



	}
	public function clausula_sp_descargar($id_usuario)
	{		
		$id_periodo = $this->uri->segment(4);
			 $id_usuario = $id_usuario;
			 $id_programa = $id_programa;
			$lugartrabajo = $this->Trabajo_model->Lugar_trabajo($id_usuario);
			
			
			$data2 = array(
			'tiempo_pre' => $this->Tiempo_preinscripcion_model->gettiempo_preinscripcion(),
			'periodo'=> $this->Periodo_model->getIdperiodo_($id_periodo),
			);
			//var_dump($data);
			$this->load->view('layouts/header');
			$this->load->view('layouts/sidebar',$data2);
			
				
					if($this->Control_requisitos_model->getControl_requisitos($id_periodo,5,$id_usuario)  ){
						$data=array('datos_alumnos' => $this->Alumno_model->getListaAlumno($id_usuario),
						'periodo' => $this->Periodo_model->getIdperiodo_($id_periodo),
						
					
						'materiasSP'=>$this->Materias_preinscrita_model->preincritas_clausulas($id_usuario,$id_periodo,3),
				
						
						'modalidad'=>$this->Materias_preinscrita_model->preincritas_clausulas_modalidad($id_usuario,$id_periodo),
						'clausula'=>$this->Control_requisitos_model->getControl_requisitos($id_periodo,5,$id_usuario),
						'acepto'=>1,
						);
					//	var_dump($data['clausula']);
					
					}
				
					$html = $this->load->view('supervisor/consultas/clausula_semi_descargar',$data,true);	
		
				//load mPDF library
				$this->load->library('M_pdf');
				$mpdf = new mPDF('c', 'Letter-P'); 
				$mpdf->SetProtection(array('copy','print'), '', 't3n0l0g143n7m9');
				$mpdf->WriteHTML($html);							
				$mpdf->Output($pdfFilePath, "D");					



	}
	public function clausula_teg_descargar($id_usuario)
	{		
		$id_periodo = $this->uri->segment(4);
			 $id_usuario = $id_usuario;
			 $id_programa = $id_programa;
			$lugartrabajo = $this->Trabajo_model->Lugar_trabajo($id_usuario);
			
			
			$data2 = array(
			'tiempo_pre' => $this->Tiempo_preinscripcion_model->gettiempo_preinscripcion(),
			'periodo'=> $this->Periodo_model->getIdperiodo_($id_periodo),
			);
			//var_dump($data);
			$this->load->view('layouts/header');
			$this->load->view('layouts/sidebar',$data2);
			
				
					if($this->Control_requisitos_model->getControl_requisitos($id_periodo,5,$id_usuario)  ){
						$data=array('datos_alumnos' => $this->Alumno_model->getListaAlumno($id_usuario),
						'periodo' => $this->Periodo_model->getIdperiodo_($id_periodo),
						
					
						'materiasTG'=>$this->Materias_preinscrita_model->preincritas_clausulas($id_usuario,$id_periodo,4),
				
						
						'modalidad'=>$this->Materias_preinscrita_model->preincritas_clausulas_modalidad($id_usuario,$id_periodo),
						'clausula'=>$this->Control_requisitos_model->getControl_requisitos($id_periodo,5,$id_usuario),
						'acepto'=>1,
						);
					//	var_dump($data['clausula']);
					
					}
				
					$html = $this->load->view('supervisor/consultas/clausula_teg_descargar',$data,true);	
		
				//load mPDF library
				$this->load->library('M_pdf');
				$mpdf = new mPDF('c', 'Letter-P'); 
				$mpdf->SetProtection(array('copy','print'), '', 't3n0l0g143n7m9');
				$mpdf->WriteHTML($html);							
				$mpdf->Output($pdfFilePath, "D");					



	}
public function modificar_datos($id_usuario)
	{
		//$id_usuario = $this->session->userdata("id");
		//echo $id_usuario;
		$data = array(
			'cod_hab' => $this->Codigo_tel_model->Codigo_nacional(),
			'cod_cel' => $this->Codigo_tel_model->Codigo_celular(),
			'cod_celwhat' => $this->Codigo_tel_model->Codigo_celular(),
			'lista_sexo' => $this->Sexo_model->getSexo(),
			'lista_estadocivil' => $this->Estado_civil_model->getEstadocivil(),		
			'datos_alumnos' => $this->Alumno_model->getListaAlumno($id_usuario),


		);
		$data2 = array(
			'tiempo_pre' => $this->Tiempo_preinscripcion_model->gettiempo_preinscripcion(),
			'periodo' => $this->Periodo_model->PeriodoActivo(),
			
		);

		
			$this->load->view('layouts/header');
			$this->load->view('layouts/sidebar',$data2);
			$this->load->view('supervisor/consultas/editar_estudiante',$data);
			$this->load->view('layouts/footer');

		
	}
	public function actualizar_datos()
	{
		$no_encontrado = $this->input->post("no_encontrado");
		$id_usuario = $this->input->post("id_usuario"); // quien actualiza
		$id = $this->input->post("id"); // id del estudiante a actualizar
		$primer_nombre = $this->input->post("primer_nombre");
		$segundo_nombre = $this->input->post("segundo_nombre");
		$primer_apellido = $this->input->post("primer_apellido");
		$segundo_apellido = $this->input->post("segundo_apellido");
		/*$cod_nacionalidad = $this->input->post("cod_nacionalidad");
		$cedula = $this->input->post("cedula");
		$estado_civil = $this->input->post("estado_civil");
		$codigo_telhab = $this->input->post("codigo_telhab");
		$telefono_hab = $this->input->post("telefono_hab");
		//$tel_hababitacion = $codigo_telhab.$telefono_hab ;
		$codigo_telcelwhat = $this->input->post("codigo_telcelwhat");
		$telefono_celwhat = $this->input->post("telefono_celwhat");
		//$tel_celwhatsapp = $codigo_telcelwhat.$telefono_celwhat;
		$sexo = $this->input->post("sexo");
		$correo = $this->input->post("correo");
		$codigo_telcel = $this->input->post("codigo_telcel");
		$telefono_cel = $this->input->post("telefono_cel");
		//$tel_celular = $codigo_telcel.$telefono_cel;
		$fec_nac = $this->input->post("fec_nac");

		// validando correo
		$explode = explode("@", $correo);

		if ($explode[1] == "GMAIL.COM") {*/

				$data  = array(
				//'id_usuario' => $id_usuario, 
				'nombre_primer' => $primer_nombre,
				'nombre_segundo' => $segundo_nombre, 
				'apellido_primer' => $primer_apellido,
				'apellido_segundo' => $segundo_apellido, 
				
				);
//				var_dump($datos_alumnos);
			
					if ($this->Alumno_model->update($id,$data)) {
						$this->session->set_flashdata("warning","Datos del estudiante Actualizado con éxito!!");
						redirect(base_url()."consultas/modificar_datos/".$id);
					}
					else{
						$this->session->set_flashdata("error","No se pudo guardar la informacion");
						redirect(base_url()."consultas/modificar_datos/".$id);
					}
			
	}

public function dExcel_inscritos_anual(){// regulares inscritos en el año	
		
		//echo "entro";
		$id_periodo=array(12,13,14);
		

   $registros_total=$this->Materias_preinscrita_model->estudiantes_inscritos_ano($id_periodo);
 
foreach ($registros_total as $registros_total){
	$valor_credito=$this->Materias_preinscrita_model->estudiantes_inscritos_ano_uc($registros_total->id_usuario,$registros_total->id_programa); 
	foreach ($valor_credito as $valor_credito ){

	   $registro_listado= array(
		   'cedula'=>$registros_total->cedula,
		   'nacionalidad'=>$registros_total->nacionalidad,
		   'primer_nombre'=>$registros_total->primer_nombre,
		   'primer_apellido'=>$registros_total->primer_apellido,
		   'segundo_nombre'=>$registros_total->segundo_nombre,
		   'segundo_apellido'=>$registros_total->segundo_apellido,
		   'sexo'=>$registros_total->sexo,
		   'fecha_nac'=>$registros_total->fecha_nac,
		   'email'=>$registros_total->email,
		   'correo'=>$registros_total->correo,
		   'telefono_cel'=>$registros_total->telefono_cel,
		   'telefono_hab'=>$registros_total->telefono_hab,
		   'programa'=>$registros_total->programa,	   
		   'uc'=>$valor_credito->uc,	
		   'trabajo'=>$registros_total->trabajo,
		   'circunscripción'=>$registros_total->circunscripcion,
		   'cargo'=>$registros_total->cargo,
		   'residencia'=>$registros_total->residencia,	
		 
	   );
	   $data['registros'][]=$registro_listado;		
		  

}   
			
		   
	   }	
	  // var_dump($data);
	   $this->load->view('supervisor/consultas/descarga_excel_anual',$data);	
	}
}
