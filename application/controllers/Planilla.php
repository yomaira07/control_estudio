<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Planilla extends CI_Controller {

  public function __construct(){
    parent::__construct();
    $this->load->model("Usuarios_model");
    $this->load->model("Inscripcion_model");
    $this->load->model("Oferta_academica_model");
    $this->load->model("Pensum_model");
    $this->load->model("Programa_model");
    $this->load->model("Trimestre_model");
    $this->load->model("Docente_model");
    $this->load->model("Sexo_model");
    $this->load->model("Estado_civil_model");
    $this->load->model("Codigo_tel_model");
    $this->load->model("Alumno_model");
    $this->load->model("Estado_model");
    $this->load->model("Municipio_model");
    $this->load->model("Parroquia_model");
    $this->load->model("Direccion_model");
    $this->load->model("Lugar_trabajo_model");
    $this->load->model("Trabajo_model");
    $this->load->model("Periodo_model");
    $this->load->model("Materias_preinscrita_model");
    $this->load->model("Banco_model");
    $this->load->model("Registro_pago_model");
    $this->load->model("Seccion_model");
    $this->load->model("Tiempo_preinscripcion_model");
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
   
    $id_programa_ = $this->uri->segment(3);
  //  var_dump($id_programa_);
  
    $id_programa= $this->Materias_preinscrita_model->Materia_alumno($id_usuario,$id_programa_);
    
    
    $id_periodo = $this->Periodo_model->PeriodoActivo();
    $codigo_tel_alumno=$this->Alumno_model->getListaAlumno($id_usuario);
    
    foreach ($id_programa as $id_programa ) {
  
      $lugar_trabajo = $this->Trabajo_model->Lugar_trabajo($id_usuario);  
      $data = array(
        'datos_alumnos'   => $this->Alumno_model->getListaAlumno($id_usuario),
      'direccion'=> $this->Direccion_model->MostarDireccion($id_usuario),
         'telefono_hab'=>  $this->Codigo_tel_model->getCodigo_nacional($codigo_tel_alumno->id_codigo_hab),
        'telefono_cel'=>  $this->Codigo_tel_model->getCodigo_celular($codigo_tel_alumno->id_codigo_cel),
        'titulo'      => $this->Materias_preinscrita_model->mensaje_materias_preinscritas_alumno_titulo($id_usuario,$id_periodo->id,$id_programa->programa_id),
       'materias_pre'    => $this->Materias_preinscrita_model->mensaje_materias_preinscritas_alumno($id_usuario,$id_periodo->id,$id_programa->programa_id),
         'trabajo'       => $this->Lugar_trabajo_model->valor_unidad($lugar_trabajo->id_lugar_trabajo),
       'datos_trabajo'   => $this->Trabajo_model->getListaTrabajo($id_usuario,1),
        'circunscripcion' => $this->Estado_model->getEstado_circuncripcion_planilla($id_usuario,$lugar_trabajo->id_lugar_trabajo),
        'registro_pago'   =>$this->Registro_pago_model->MostrarRegistro_pago($id_usuario,$id_periodo->id),
        
        
        
      );
      
    }
 //var_dump($circunscripcion);
 //var_dump($data['circunscripcion']);
    // var_dump($data['registro_pago']);
   //  var_dump($data['materias_pre']);
    $hoy = date("dmyhis");

  
  
    
    $this->load->view('layouts/header');
    $this->load->view('layouts/sidebar');
    
    $this->load->view('planilla/planilla',$data);    
    $this->load->view('layouts/footer');

		
		
		
	}
public function descargar(){
    $id_usuario = $this->session->userdata("id");   
    $id_programa_ =  $this->uri->segment(3);  
    $id_programa= $this->Materias_preinscrita_model->Materia_alumno($id_usuario,$id_programa_);    
    $id_periodo = $this->Periodo_model->PeriodoActivo();
    $codigo_tel_alumno=$this->Alumno_model->getListaAlumno($id_usuario);
    
    foreach ($id_programa as $id_programa ) {
  
      $lugar_trabajo = $this->Trabajo_model->Lugar_trabajo($id_usuario);  
      $data = array(
		'datos_alumnos' => $this->Alumno_model->getListaAlumno($id_usuario),
		'direccion'	=> $this->Direccion_model->MostarDireccion($id_usuario),
		'telefono_hab'	=> $this->Codigo_tel_model->getCodigo_nacional($codigo_tel_alumno->id_codigo_hab),
		'telefono_cel'	=> $this->Codigo_tel_model->getCodigo_celular($codigo_tel_alumno->id_codigo_cel),
		'titulo'      	=> $this->Materias_preinscrita_model->mensaje_materias_preinscritas_alumno_titulo($id_usuario,$id_periodo->id,$id_programa->programa_id),
		'materias_pre'  => $this->Materias_preinscrita_model->mensaje_materias_preinscritas_alumno($id_usuario,$id_periodo->id,$id_programa->programa_id),
		'trabajo'       => $this->Lugar_trabajo_model->valor_unidad($lugar_trabajo->id_lugar_trabajo),
		'datos_trabajo' => $this->Trabajo_model->getListaTrabajo($id_usuario,1),
		'circunscripcion' => $this->Estado_model->getEstado_circuncripcion_planilla($id_usuario,$lugar_trabajo->id_lugar_trabajo),
		'registro_pago'   =>$this->Registro_pago_model->MostrarRegistro_pago($id_usuario,$id_periodo->id),
      );
     
   
      
    }

    $hoy = date("dmyhis");

        //load the view and saved it into $html variable
        //$html = 
//        "<style>@page {
//          margin-top: 0.5cm;
//          margin-bottom: 0.5cm;
//          margin-left: 0.5cm;
//          margin-right: 0.5cm;
//      }
//      </style>".
//        "<body>
//          <div style='color:#006699;'><b>".$this->input->post('txtPDF')."<b></div>".
//            "<div style='width:50px; height:50px; background-color:red;'>asdf</div>
//
//        </body>";

        $html = $this->load->view('planilla/planilla',$data,true);

        //$html="asdf";
        //this the the PDF filename that user will get to download
        $pdfFilePath = "planilla_".$hoy.".pdf";

        //load mPDF library
        $this->load->library('M_pdf');
        $mpdf = new mPDF('s', 'Letter-P'); 
        $mpdf->showImageErrors = false;
        //  $mpdf->Image('control_estudio/assets/img/logo1.png', 0, 0, 20, 20, 'png', '', true, false);
        $mpdf->WriteHTML($html);
$mpdf->SetProtection(array('copy','print'), '', 't3n0l0g143n7m9');
        $mpdf->Output($pdfFilePath, "D");

	}


public function planilla_pre()//planilla de preinscripcion
    {
        
		$id_usuario = $this->session->userdata("id");

		$id_programa_ =  $this->uri->segment(3);
		//var_dump($id_programa_);
		$id_programa= $this->Programa_model-> getProgramaEsp($id_programa_);
		//var_dump($id_programa);
		//echo "________________";
		 $id_periodo = $this->Periodo_model->PeriodoActivo_asp();
		$codigo_tel_alumno=$this->Alumno_model->getListaAlumno($id_usuario);
 
   // var_dump($codigo_tel_alumno);
    foreach ($id_programa as $id_programa ) {
  
            $lugar_trabajo = $this->Trabajo_model->Lugar_trabajo($id_usuario);  
         //  var_dump($lugar_trabajo);
            $data = array(
              'datos_alumnos'   => $this->Alumno_model->getListaAlumno($id_usuario),
              'direccion'=> $this->Direccion_model->MostarDireccion($id_usuario),
              'telefono_hab'=>  $this->Codigo_tel_model->getCodigo_nacional($codigo_tel_alumno->id_codigo_hab),
              'telefono_cel'=>  $this->Codigo_tel_model->getCodigo_celular($codigo_tel_alumno->id_codigo_cel),
         
              'trabajo'       => $this->Lugar_trabajo_model->lugar_actual_trabajo( $lugar_trabajo->id_lugar_trabajo),
             
              'datos_trabajo'   => $this->Trabajo_model->getListaTrabajo($id_usuario,1),
              'datos_trabajo_ant' => $this->Trabajo_model->getListaTrabajo($id_usuario,2),
              'datos_academicos_pre' => $this->Academico_model->getusuario_Academico_asp($id_usuario,1),
              'datos_academicos_post' => $this->Academico_model->getusuario_Academico_asp($id_usuario,2),
              'datos_academicos' => $this->No_conducente_model->getusuario_no_conducentes($id_usuario),
              'datos_admitido' => $this->De_ser_admitido_model->getusuario_de_ser_admitido($id_usuario),
              'circunscripcion' => $this->Estado_model->getEstado_circuncripcion_planilla($id_usuario,$lugar_trabajo->id_lugar_trabajo),
              'registro_pago'   =>$this->Registro_pago_model->MostrarRegistro_pago($id_usuario,$id_periodo->id),
              'periodo'=>$this->Periodo_model->PeriodoActivo_asp(),
              'especializacion'=>$this->Programa_model-> getProgramaEsp($id_programa_),
              'edad'=> $this->CalculaEdad( $codigo_tel_alumno->fecha_nac ),
              );

        }
        
 //  var_dump($data);
    
        $hoy = date("dmyhis");

    
    
        
       $this->load->view('layouts/header');
        $this->load->view('layouts/sidebar');
        
        $this->load->view('planilla/planilla_pre',$data);       
        $this->load->view('layouts/footer');
        
        
    }
public function descargar_pla_pre(){
            
         $id_usuario = $this->session->userdata("id");
   
    $id_programa_ =  $this->uri->segment(3);
        //var_dump($id_programa_);
        $id_programa= $this->Programa_model-> getProgramaEsp($id_programa_);
        //var_dump($id_programa);
        //echo "________________";
         $id_periodo = $this->Periodo_model->PeriodoActivo_asp();
     $codigo_tel_alumno=$this->Alumno_model->getListaAlumno($id_usuario);
   // var_dump($codigo_tel_alumno);
    foreach ($id_programa as $id_programa ) {
  
            $lugar_trabajo = $this->Trabajo_model->Lugar_trabajo($id_usuario);  
            $data = array(
              'datos_alumnos'   => $this->Alumno_model->getListaAlumno($id_usuario),
              'direccion'=> $this->Direccion_model->MostarDireccion($id_usuario),
              'telefono_hab'=>  $this->Codigo_tel_model->getCodigo_nacional($codigo_tel_alumno->id_codigo_hab),
              'telefono_cel'=>  $this->Codigo_tel_model->getCodigo_celular($codigo_tel_alumno->id_codigo_cel),
              'trabajo'       => $this->Lugar_trabajo_model->valor_unidad($lugar_trabajo->id_lugar_trabajo),
              'datos_trabajo'   => $this->Trabajo_model->getListaTrabajo($id_usuario,1),
              'datos_trabajo_ant' => $this->Trabajo_model->getListaTrabajo($id_usuario,2),
              'datos_academicos_pre' => $this->Academico_model->getusuario_Academico_asp($id_usuario,1),
              'datos_academicos_post' => $this->Academico_model->getusuario_Academico_asp($id_usuario,2),
              'datos_academicos' => $this->No_conducente_model->getusuario_no_conducentes($id_usuario),
              'datos_admitido' => $this->De_ser_admitido_model->getusuario_de_ser_admitido($id_usuario),
              'circunscripcion' => $this->Estado_model->getEstado_circuncripcion_planilla($id_usuario,$lugar_trabajo->id_lugar_trabajo),
              'registro_pago'   =>$this->Registro_pago_model->MostrarRegistro_pago($id_usuario,$id_periodo->id),
              'periodo'=>$this->Periodo_model->PeriodoActivo_asp(),
              'especializacion'=>$this->Programa_model-> getProgramaEsp($id_programa_),
              'edad'=> $this->CalculaEdad( $codigo_tel_alumno->fecha_nac ),
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
    function CalculaEdad( $fecha ) {
      list($Y,$m,$d) = explode("-",$fecha);
      return( date("md") < $m.$d ? date("Y")-$Y-1 : date("Y")-$Y );
    }
}

