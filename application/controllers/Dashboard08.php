<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard08 extends CI_Controller { // controlador Aspirante

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
		$this->load->model("Control_requisitos_model");
		$this->load->model("Reincorporaciones_model");
		$this->load->model("Aranceles_model");	
		$this->load->model("Exonerados_model");	
        $this->load->model("Academico_model");
		$this->load->model("Nivel_Academico_model");	
		$this->load->model("No_conducente_model");	
		$this->load->model("De_ser_admitido_model");	


		if (!$this->session->userdata("login")) {
			redirect(base_url());
		}
	}

	public function home()
	{
		$id_usuario = $this->session->userdata("id");
		$cedula = $this->session->userdata("username");
		if (strlen($cedula)>9 ){
			$cedula=substr($cedula, 1); 
		  	$cedula=substr($cedula, 0, -1);
		  	$cedula= strval($cedula);
		
		}else{
			$cedula= strval($cedula);
		}
		$data = array(
			'cod_hab' => $this->Codigo_tel_model->Codigo_nacional(),
			'cod_cel' => $this->Codigo_tel_model->Codigo_celular(),
			'cod_celwhat' => $this->Codigo_tel_model->Codigo_celular(),
			'lista_sexo' => $this->Sexo_model->getSexo(),
			'lista_estadocivil' => $this->Estado_civil_model->getEstadocivil(),
		
			'datos_alumnos' => $this->Alumno_model->getListaAlumno
($id_usuario),

		);
		$data2 = array(
			'tiempo_pre' => $this->Tiempo_preinscripcion_model->gettiempo_preinscripcion(),
		);
			$this->load->view('layouts/header');
			$this->load->view('layouts/sidebar_home',$data2);		
			$this->load->view('admin/inicio');// INICIO PANEL DE CONTROL			
			$this->load->view('layouts/footer');
		
	}
	public function index()
	{
		$id_usuario = $this->session->userdata("id");
		$cedula = $this->session->userdata("username");
		$data = array(
			'cod_hab' => $this->Codigo_tel_model->Codigo_nacional(),
			'cod_cel' => $this->Codigo_tel_model->Codigo_celular(),
			'cod_celwhat' => $this->Codigo_tel_model->Codigo_celular(),
			'lista_sexo' => $this->Sexo_model->getSexo(),
			'lista_estadocivil' => $this->Estado_civil_model->getEstadocivil(),
		
			'datos_alumnos' => $this->Alumno_model->getListaAlumno,
			'correo_registro'=> $this->Usuarios_model->buscar_usuario($id_usuario)


		);
		$data2 = array(
			'tiempo_pre' => $this->Tiempo_preinscripcion_model->gettiempo_preinscripcion(),
		);

		$periodo=$this->Periodo_model->PeriodoActivo_asp();
		$requisitos=$this->Control_requisitos_model->getControl_requisitos1($periodo->id,$id_usuario);
		if ($this->Trabajo_model->BuscarRegistradoTrabajo($id_usuario)){
			if ( count($requisitos)<3) {

			$this->load->view('layouts/header');
			$this->load->view('layouts/sidebar',$data2);			
			$this->load->view('aspirante/inscripcion/mensaje2');//mensaje de actaulizacion			
			$this->load->view('layouts/footer');
			}else{
				redirect(base_url()."dashboard08/proceso");
			}

		}else{
			redirect(base_url()."dashboard08/datos");

		}
	}
////////// visualizar ayuda para adjuntar Requisitos  ////
	public function requisitos()
	{	
		$periodo=$this->Periodo_model->PeriodoActivo_asp();
		$id_usuario = $this->session->userdata("id");
		$data2 = array(
			'tiempo_pre' => $this->Tiempo_preinscripcion_model->gettiempo_preinscripcion(),
		);
		$data = array(
			'periodo' => $this->Periodo_model->PeriodoActivo_asp(),
			'requisitos'=>$this->Control_requisitos_model->getControl_requisitos1($periodo->id,$id_usuario)	,
			'aspirante' =>$this->Usuarios_model->buscar_usuario($id_usuario),
			'postulado' =>$this->Trabajo_model->getpostulado($id_usuario),
		);
		//var_dump($data['requisitos']);
		$this->load->view('layouts/header');
		$this->load->view('layouts/sidebar',$data2);
		$this->load->view('aspirante/datos/requisitos',$data);
		$this->load->view('layouts/footer');
			
		
	}                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                           


/////////// actualizacion de datos del estudiante  ////
	public function datos()
	{
		$id_usuario = $this->session->userdata("id");
		$usuario=$this->Alumno_model->getListaAlumno($id_usuario);
		$data = array(
			'cod_hab' => $this->Codigo_tel_model->Codigo_nacional(),
			'cod_cel' => $this->Codigo_tel_model->Codigo_celular(),
			'cod_celwhat' => $this->Codigo_tel_model->Codigo_celular(),
			'lista_sexo' => $this->Sexo_model->getSexo(),
			'lista_estadocivil' => $this->Estado_civil_model->getEstadocivil(),
			'datos_alumnos' => $this->Alumno_model->getListaAlumno($id_usuario),
			'edad'=> $this->CalculaEdad( $usuario->fecha_nac ),
			'correo_registro'=> $this->Usuarios_model->buscar_usuario($id_usuario)
		);
		$data2 = array(
			'tiempo_pre' => $this->Tiempo_preinscripcion_model->gettiempo_preinscripcion(),

		);
		
		$this->load->view('layouts/header');
		$this->load->view('layouts/sidebar',$data2);
		$this->load->view('aspirante/datos/edit',$data);
		$this->load->view('layouts/footer');
	}

	public function datos1()
	{
		$id_usuario = $this->session->userdata("id");
		$data = array(
		'combo_estado' => $this->Estado_model->getEstado(),
		'combo_municipio' => $this->Municipio_model->getMunicipio(),
		'combo_parroquia' => $this->Parroquia_model->getParroquia(),
		'datos_direccion' => $this->Direccion_model->getListaDireccion($id_usuario)
		);
		$data2 = array(
			'tiempo_pre' => $this->Tiempo_preinscripcion_model->gettiempo_preinscripcion(),

		);

		$this->load->view('layouts/header');
		$this->load->view('layouts/sidebar',$data2);
		$this->load->view('aspirante/datos/direccion',$data);
		$this->load->view('layouts/footer');
	}

	 public function combo_estado()
	 {
	  if($this->input->post('comboestado_id'))
	  {
	   echo $this->Municipio_model->combo_municipio($this->input->post('comboestado_id'));
	  }

	 }

	  public function combo_municipio()
	 {
	  if($this->input->post('combomunicipio_id'))
	  {
	   echo $this->Parroquia_model->combo_parroquia($this->input->post('combomunicipio_id'));
	  }

	 }

	public function datos2()
	{
		$id_usuario = $this->session->userdata("id");
		$data = array(
		'lugartrabajo' => $this->Lugar_trabajo_model->getLugar_trabajo(),
		'estadotrabajo' => $this->Estado_model->getEstado(),
		'cod_hab' => $this->Codigo_tel_model->Codigo_nacional(),
        'lugartrabajo_ant' => $this->Lugar_trabajo_model->getLugar_trabajo(),	
		'cod_hab_ant' => $this->Codigo_tel_model->Codigo_nacional(),
		'datos_trabajo' => $this->Trabajo_model->getListaTrabajo($id_usuario,1),
        'datos_trabajo_ant' => $this->Trabajo_model->getListaTrabajo($id_usuario,2)
		);
		$data2 = array(
			'tiempo_pre' => $this->Tiempo_preinscripcion_model->gettiempo_preinscripcion(),

		);
		//var_dump($data['datos_trabajo_ant']);
		$this->load->view('layouts/header');
		$this->load->view('layouts/sidebar',$data2);
		$this->load->view('aspirante/datos/trabajo',$data);
		$this->load->view('layouts/footer');
	}
	public function trabajo_anterior_edit($id)
	{
		//echo $id;
		$id_usuario = $this->session->userdata("id");
		$data = array(
		'lugartrabajo' => $this->Lugar_trabajo_model->getLugar_trabajo(),
		'estadotrabajo' => $this->Estado_model->getListaEstado(),
		'cod_hab' => $this->Codigo_tel_model->Codigo_nacional(),
        'lugartrabajo_ant' => $this->Lugar_trabajo_model->getLugar_trabajo(),	
		'cod_hab_ant' => $this->Codigo_tel_model->Codigo_nacional(),		
        'datos_trabajo' => $this->Trabajo_model->getListaTrabajo_ant($id)
		);
		$data2 = array(
			'tiempo_pre' => $this->Tiempo_preinscripcion_model->gettiempo_preinscripcion(),

		);
		
		$this->load->view('layouts/header');
		$this->load->view('layouts/sidebar',$data2);
		$this->load->view('aspirante/datos/trabajo_edit',$data);
		$this->load->view('layouts/footer');
	}
    public function academico()
	{
		$id_usuario = $this->session->userdata("id");
	

		$data = array(
		
		
		'datos_academicos_pre' => $this->Academico_model->getusuario_Academico_asp($id_usuario,1),
		'datos_academicos_post' => $this->Academico_model->getusuario_Academico_asp($id_usuario,2),
		);
		//var_dump($data);

		$data2 = array(
			'tiempo_pre' => $this->Tiempo_preinscripcion_model->gettiempo_preinscripcion(),

		);
		
		$this->load->view('layouts/header');
		$this->load->view('layouts/sidebar',$data2);
		$this->load->view('aspirante/datos/datos_academicos',$data);
		$this->load->view('layouts/footer');
	}
	public function academico_post_edit($id)
	{
		$id_usuario = $this->session->userdata("id");
		$id_academico=$id;

		$data = array(
		'datos_academicos_post' => $this->Academico_model->get_Academico_asp($id_academico,2),
		);
		//var_dump($data);

		$data2 = array(
			'tiempo_pre' => $this->Tiempo_preinscripcion_model->gettiempo_preinscripcion(),

		);
		
		$this->load->view('layouts/header');
		$this->load->view('layouts/sidebar',$data2);
		$this->load->view('aspirante/datos/datos_academicos_post_edit',$data);
		$this->load->view('layouts/footer');
	}
    public function no_conducente()
	{
		$id_usuario = $this->session->userdata("id");
	

		$data = array(				
		'datos_academicos' => $this->No_conducente_model->getusuario_no_conducentes($id_usuario),
		);
		//var_dump($data);

		$data2 = array(
			'tiempo_pre' => $this->Tiempo_preinscripcion_model->gettiempo_preinscripcion(),

		);
		
		$this->load->view('layouts/header');
		$this->load->view('layouts/sidebar',$data2);
		$this->load->view('aspirante/datos/datos_no_conducentes',$data);
		$this->load->view('layouts/footer');
	}
	public function no_conducente_edit($id_academico)// editar no conducentes Talles y cursos de aspirantes
	{
		$id_usuario = $this->session->userdata("id");
	

		$data = array(				
		'datos_academicos' => $this->No_conducente_model->getusuario_no_conducentes_id($id_academico),
		);
		//var_dump($data);

		$data2 = array(
			'tiempo_pre' => $this->Tiempo_preinscripcion_model->gettiempo_preinscripcion(),

		);
		
		$this->load->view('layouts/header');
		$this->load->view('layouts/sidebar',$data2);
		$this->load->view('aspirante/datos/datos_no_conducentes_edit',$data);
		$this->load->view('layouts/footer');
	}
	public function datos3()
	{
		$periodo = $this->Periodo_model->PeriodoActivo_asp();
		$id_usuario=$this->session->userdata('id');
		$id_requisito=1;

		$data2 = array(
			'tiempo_pre' => $this->Tiempo_preinscripcion_model->gettiempo_preinscripcion(),
		);
		$data = array(
			'verificar'=> $this->Control_requisitos_model->getControl_requisitos($periodo->id,$id_requisito,$id_usuario)
		);
		
		$this->load->view('layouts/header');
		$this->load->view('layouts/sidebar',$data2);
		$this->load->view('aspirante/datos/cedula',$data); //carga cedula
		$this->load->view('layouts/footer');
	}
	public function datos7()
	{
		$periodo = $this->Periodo_model->PeriodoActivo_asp();
		$id_usuario=$this->session->userdata('id');
		$id_requisito=2;

		$data2 = array(
			'tiempo_pre' => $this->Tiempo_preinscripcion_model->gettiempo_preinscripcion(),
		);
		$data = array(
			'verificar'=> $this->Control_requisitos_model->getControl_requisitos($periodo->id,$id_requisito,$id_usuario)
		);
		
		
		$this->load->view('layouts/header');
		$this->load->view('layouts/sidebar',$data2);
		$this->load->view('aspirante/datos/foto',$data);// forma que carga las foto
		$this->load->view('layouts/footer');
	}

	public function datos4()
	{
		$periodo = $this->Periodo_model->PeriodoActivo_asp();
		$id_usuario=$this->session->userdata('id');
		$id_requisito=3;

		$data2 = array(
			'tiempo_pre' => $this->Tiempo_preinscripcion_model->gettiempo_preinscripcion(),
		);
		$data = array(
			'verificar'=> $this->Control_requisitos_model->getControl_requisitos($periodo->id,$id_requisito,$id_usuario)
		);

		$this->load->view('layouts/header');
		$this->load->view('layouts/sidebar',$data2);
		
		$this->load->view('aspirante/datos/fondo_negro',$data);// forma que carga los titulos fondo negro
		$this->load->view('layouts/footer');
	}

	
	

	public function datos8()
	{
		$periodo = $this->Periodo_model->PeriodoActivo_asp();
		$id_usuario=$this->session->userdata('id');
		$id_requisito=6;

		$data2 = array(
			'tiempo_pre' => $this->Tiempo_preinscripcion_model->gettiempo_preinscripcion(),
		);
		$data = array(
			'verificar'=> $this->Control_requisitos_model->getControl_requisitos($periodo->id,$id_requisito,$id_usuario)
		);
		
		$this->load->view('layouts/header');
		$this->load->view('layouts/sidebar',$data2);
		$this->load->view('aspirante/datos/carnet',$data);// forma que carga carnet
		$this->load->view('layouts/footer');
	}
	public function datos9()
	{
		$periodo = $this->Periodo_model->PeriodoActivo_asp();
		$id_usuario=$this->session->userdata('id');
	
		$id_requisito=8;

		$data2 = array(
			'tiempo_pre' => $this->Tiempo_preinscripcion_model->gettiempo_preinscripcion(),
		);
		$data = array(
			'verificar'=> $this->Control_requisitos_model->getControl_requisitos($periodo->id,$id_requisito,$id_usuario),
			
		);
		//var_dump($data);
		$this->load->view('layouts/header');
		$this->load->view('layouts/sidebar',$data2);
		$this->load->view('aspirante/datos/impre',$data);// forma que carga impre
		$this->load->view('layouts/footer');
	}
	public function datos10()
	{
		$periodo = $this->Periodo_model->PeriodoActivo_asp();
		$id_usuario=$this->session->userdata('id');
		$id_requisito=9;

		$data2 = array(
			'tiempo_pre' => $this->Tiempo_preinscripcion_model->gettiempo_preinscripcion(),
		);
		$data = array(
			'verificar'=> $this->Control_requisitos_model->getControl_requisitos($periodo->id,$id_requisito,$id_usuario)
		);	
		//var_dump($data);
		$this->load->view('layouts/header');
		$this->load->view('layouts/sidebar',$data2);
		$this->load->view('aspirante/datos/colegiatura',$data);// forma que carga colegiatura
		$this->load->view('layouts/footer');
	}
	public function datos11()
	{
		$periodo = $this->Periodo_model->PeriodoActivo_asp();
		$id_usuario=$this->session->userdata('id');
		$id_requisito=10;

		$data2 = array(
			'tiempo_pre' => $this->Tiempo_preinscripcion_model->gettiempo_preinscripcion(),
		);
		$data = array(
			'verificar'=> $this->Control_requisitos_model->getControl_requisitos($periodo->id,$id_requisito,$id_usuario)
		);	
		$this->load->view('layouts/header');
		$this->load->view('layouts/sidebar',$data2);
		$this->load->view('aspirante/datos/cump_rural',$data);// forma que carga cumpliminto rural
		$this->load->view('layouts/footer');
	}
	public function datos12()
	{
		$periodo = $this->Periodo_model->PeriodoActivo_asp();
		$id_usuario=$this->session->userdata('id');
		$id_requisito=11;

		$data2 = array(
			'tiempo_pre' => $this->Tiempo_preinscripcion_model->gettiempo_preinscripcion(),
		);
		$data = array(
			'verificar'=> $this->Control_requisitos_model->getControl_requisitos($periodo->id,$id_requisito,$id_usuario)
		);	
		//var_dump($data);
		$this->load->view('layouts/header');
		$this->load->view('layouts/sidebar',$data2);
		$this->load->view('aspirante/datos/titulo_especializacion',$data);// forma que carga titulo de especialista
		$this->load->view('layouts/footer');
	}
	public function datos13()
	{
		$periodo = $this->Periodo_model->PeriodoActivo_asp();
		$id_usuario=$this->session->userdata('id');
		$id_requisito=12;

		$data2 = array(
			'tiempo_pre' => $this->Tiempo_preinscripcion_model->gettiempo_preinscripcion(),
		);
		$data = array(
			'verificar'=> $this->Control_requisitos_model->getControl_requisitos($periodo->id,$id_requisito,$id_usuario)
		);		
		$this->load->view('layouts/header');
		$this->load->view('layouts/sidebar',$data2);
		$this->load->view('aspirante/datos/calificaciones_pregrado',$data);// forma que carga calificaciones de pregrado
		$this->load->view('layouts/footer');
	}
public function datos14()
	{
		$periodo = $this->Periodo_model->PeriodoActivo_asp();
		$id_usuario=$this->session->userdata('id');
		$id_requisito=15;

		$data2 = array(
			'tiempo_pre' => $this->Tiempo_preinscripcion_model->gettiempo_preinscripcion(),
		);
		$data = array(
			'verificar'=> $this->Control_requisitos_model->getControl_requisitos($periodo->id,$id_requisito,$id_usuario)
		);		
		$this->load->view('layouts/header');
		$this->load->view('layouts/sidebar',$data2);
		$this->load->view('aspirante/datos/carta_postulacion',$data);// forma que carga carta de postulacion
		$this->load->view('layouts/footer');
	}
public function datos15()// titulo magister
	{
		$periodo = $this->Periodo_model->PeriodoActivo_asp();
		$id_usuario=$this->session->userdata('id');
		$id_requisito=19;

		$data2 = array(
			'tiempo_pre' => $this->Tiempo_preinscripcion_model->gettiempo_preinscripcion(),
		);
		$data = array(
			'verificar'=> $this->Control_requisitos_model->getControl_requisitos($periodo->id,$id_requisito,$id_usuario)
		);	
		//var_dump($data);
		$this->load->view('layouts/header');
		$this->load->view('layouts/sidebar',$data2);
		$this->load->view('aspirante/datos/titulo_maestria',$data);// forma que carga titulo de maestrias
		$this->load->view('layouts/footer');
	}
    public function admitido()
	{
		$data2 = array(
			'tiempo_pre' => $this->Tiempo_preinscripcion_model->gettiempo_preinscripcion(),

		);	
		$data = array(
			'datos_admitido' => $this->De_ser_admitido_model->getusuario_de_ser_admitido($this->session->userdata('id')),

		);		
		$this->load->view('layouts/header');
		$this->load->view('layouts/sidebar',$data2);
		$this->load->view('aspirante/datos/de_ser_admitido',$data);// seccion de cualidades de la palnilla de inscripcion del aspirante
		$this->load->view('layouts/footer');
	}
	/*Actualizada 30-03-2022*/
	public function cargafoto()
	{
		
		extract($_REQUEST);
			$nombre_archivo = $_FILES['userfile']['name'];
			$tipo_archivo = $_FILES['userfile']['type'];
			$tamano_archivo = $_FILES['userfile']['size'];
			//compruebo si las caracter�sticas del archivo son las que deseo
			if (!((strpos($tipo_archivo, "gif") || strpos($tipo_archivo, "jpeg") ||  strpos($tipo_archivo, "jpg") || strpos($tipo_archivo, "png"))))
			{ // formato incorrecto
				$mensaje = $nombre_archivo.' - '.$tipo_archivo.' - '.$tamano_archivo;
				$mensaje.=$tipo_archivo." <strong>El formato del archivo es invalido. El archivo debe tener el formato: .gif, .jpg o .png</strong>";
			} else if (($tamano_archivo > 1048576)) { // excede el tama�o permitido
				$mensaje="<strong>La foto no puede exceder de 1 Mb, el archivo que intenta cargar tiene un tama&ntilde;o de: ".number_format($tamano_archivo/1048576,2)." Mb </strong><br/> Seleccione otra foto e intente de nuevo";
			} else { // todo ok
				if (move_uploaded_file($_FILES['userfile']['tmp_name'], 'assets/fotos/'. $this->session->userdata('id')."_foto.jpg"))
				{
					$mensaje="";
				} else {
					$mensaje="Ocurrio algun error al subir la foto. No pudo guardarse.";
				}
			}
				if ($mensaje=="") {
				$periodo=$this->Periodo_model->PeriodoActivo_asp();
					$data= array(
						'id_usuario'=>$this->session->userdata('id'),
						'id_requisito'=>'2',
						'id_periodo'=>$periodo->id,
					);
				   // var_dump($data);
					if($this->Control_requisitos_model->getControl_requisitos($periodo->id,2,$this->session->userdata('id'))==NULL){
						$this->Control_requisitos_model->save($data);
						$this->session->set_flashdata("success","Fotografía Cargada con Éxito.");
						redirect(base_url()."dashboard08/requisitos");
					}else{
						$fecha=date("Y-m-d H:i:s");
						$data2= array(
						'fecha_actualizacion'=>$fecha,);
						$retorno=$this->Control_requisitos_model->update($this->session->userdata('id'),$periodo->id,2,$data2);
						//var_dump($retorno);
						$this->session->set_flashdata("warning","El requisito fue actualizado.");
			    		redirect(base_url()."dashboard08/requisitos");
					}
					//var_dump($guarda);
					
			} else {
				

				$this->session->set_flashdata("error",$mensaje);
			    redirect(base_url()."dashboard08/datos7");
			}
	//	$this->load->view('layouts/header');
	//	$this->load->view('layouts/sidebar');
	//	$this->load->view('aspirante/datos/foto');
	//	$this->load->view('layouts/footer');
	}
	/*Actualizada 30-03-2022*/


public function cargacarnet()
	{
		
		extract($_REQUEST);
			$nombre_archivo = $_FILES['userfile']['name'];
			$tipo_archivo = $_FILES['userfile']['type'];
			$tamano_archivo = $_FILES['userfile']['size'];
			//compruebo si las caracter�sticas del archivo son las que deseo
			if (!((strpos($tipo_archivo, "gif") || strpos($tipo_archivo, "jpeg") || strpos($tipo_archivo, "jpg") || strpos($tipo_archivo, "png"))))
			{ // formato incorrecto
				$mensaje = $nombre_archivo.' - '.$tipo_archivo.' - '.$tamano_archivo;
				$mensaje.=$tipo_archivo." <strong>El formato del archivo es invalido. El archivo debe tener el formato: .gif, .jpg o .png</strong>";
			} else if (($tamano_archivo > 1048576)) { // excede el tama�o permitido
				$mensaje="<strong>La imagen no puede exceder de 1 Mb, el archivo que intenta cargar tiene un tama&ntilde;o de: ".number_format($tamano_archivo/1048576,2)." Mb </strong><br/> Seleccione otra foto e intente de nuevo";
			} else { // todo ok
				if (move_uploaded_file($_FILES['userfile']['tmp_name'], 'assets/carnet/'. $this->session->userdata('id')."_carnet.jpg"))
				{
					$mensaje="";
				} else {
					$mensaje="Ocurrio algun error al subir la foto. No pudo guardarse.";
				}
			}
			if ($mensaje=="") {
				$periodo=$this->Periodo_model->PeriodoActivo_asp();
					$data= array(
						'id_usuario'=>$this->session->userdata('id'),
						'id_requisito'=>'6',
						'id_periodo'=>$periodo->id,
					);
				   // var_dump($data);
					if($this->Control_requisitos_model->getControl_requisitos($periodo->id,6,$this->session->userdata('id'))==NULL){
						$this->Control_requisitos_model->save($data);
						$this->session->set_flashdata("success","Carnet /Carta de Servicio Cargada con Éxito.");
						redirect(base_url()."dashboard08/requisitos");
					}else{
						$fecha=date("Y-m-d H:i:s");
						$data2= array(
						'fecha_actualizacion'=>$fecha,);
						$retorno=$this->Control_requisitos_model->update($this->session->userdata('id'),$periodo->id,6,$data2);
						//var_dump($retorno);
						$this->session->set_flashdata("warning","El requisito fue actualizado.");
			    		redirect(base_url()."dashboard08/requisitos");
					}
					//var_dump($guarda);
					
			} else {
				

				$this->session->set_flashdata("error",$mensaje);
			    redirect(base_url()."dashboard08/datos8");
			}
	
	}
	
	/*Actualizada 30-03-2022*/
	public function cargatitulo()//cargar titulo fondfo negro
	{
		
		extract($_REQUEST);
			$nombre_archivo = $_FILES['userfile']['name'];
			$tipo_archivo = $_FILES['userfile']['type'];
			$tamano_archivo = $_FILES['userfile']['size'];
			//compruebo si las caracter�sticas del archivo son las que deseo
			if (!((strpos($tipo_archivo, "gif") || strpos($tipo_archivo, "jpeg") ||  strpos($tipo_archivo, "jpg") || strpos($tipo_archivo, "png"))))
			{ // formato incorrecto
				$mensaje = $nombre_archivo.' - '.$tipo_archivo.' - '.$tamano_archivo;
				$mensaje.=$tipo_archivo." <strong>El formato del archivo es invalido. El archivo debe tener el formato: .gif, .jpg o .png</strong>";
			} else if (($tamano_archivo > 1048576)) { // excede el tama�o permitido
				$mensaje="<strong>La imagen no puede exceder de 1 Mb, el archivo que intenta cargar tiene un tama&ntilde;o de: ".number_format($tamano_archivo/1048576,2)." Mb </strong><br/> Seleccione otra imagen e intente de nuevo";
			} else { // todo ok
				if (move_uploaded_file($_FILES['userfile']['tmp_name'], 'assets/titulo/'. $this->session->userdata('id')."_titulo.jpg"))
				{
					$mensaje="";
				} else {
					$mensaje="Ocurrio algun error al subir la imagen. No pudo guardarse.";
				}
			}
			if ($mensaje=="") {
				$periodo=$this->Periodo_model->PeriodoActivo_asp();
					$data= array(
						'id_usuario'=>$this->session->userdata('id'),
						'id_requisito'=>'3',
						'id_periodo'=>$periodo->id,
					);
				   // var_dump($data);
					if($this->Control_requisitos_model->getControl_requisitos($periodo->id,3,$this->session->userdata('id'))==NULL){
						$this->Control_requisitos_model->save($data);
						$this->session->set_flashdata("success","Título de Pregrado Cargado con Éxito.");
						redirect(base_url()."dashboard08/requisitos");
					}else{
						$fecha=date("Y-m-d H:i:s");
						$data2= array(
						'fecha_actualizacion'=>$fecha,);
						$retorno=$this->Control_requisitos_model->update($this->session->userdata('id'),$periodo->id,3,$data2);
						//var_dump($retorno);
						$this->session->set_flashdata("warning","El requisito fue actualizado.");
			    		redirect(base_url()."dashboard08/requisitos");
					}
					//var_dump($guarda);
					
			} else {			

				$this->session->set_flashdata("error",$mensaje);
			    redirect(base_url()."dashboard08/datos4");
			}
	}
	
	
	
	
	/*Actualizada 30-03-2022*/
public function cargacedula()
	{
		
		extract($_REQUEST);
			$nombre_archivo = $_FILES['userfile']['name'];
			$tipo_archivo = $_FILES['userfile']['type'];
			$tamano_archivo = $_FILES['userfile']['size'];
			//compruebo si las caracter�sticas del archivo son las que deseo
			if (!((strpos($tipo_archivo, "gif") || strpos($tipo_archivo, "jpeg") || strpos($tipo_archivo, "jpg") || strpos($tipo_archivo, "png"))))
			{ // formato incorrecto
				$mensaje = $nombre_archivo.' - '.$tipo_archivo.' - '.$tamano_archivo;
				$mensaje.=$tipo_archivo." <strong>El formato del archivo es invalido. El archivo debe tener el formato: .gif, .jpg o .png</strong>";
			} else if (($tamano_archivo > 1048576)) { // excede el tama�o permitido
				$mensaje="<strong>La imagen de la cedula de identidad no puede exceder de 1 Mb, el archivo que intenta cargar tiene un tama&ntilde;o de: ".number_format($tamano_archivo/1048576,2)." Mb </strong><br/> Seleccione otra imagen e intente de nuevo";
			} else { // todo ok
				//print($_FILES['userfile']['tmp_name']);
				if (move_uploaded_file($_FILES['userfile']['tmp_name'], 'assets/cedulas/'. $this->session->userdata('id')."_cedula.jpg"))
				{
					$mensaje="";
				} else {
					$mensaje="Ocurrio algun error al subir la imagen. No pudo guardarse.";
					//$mensaje=$_FILES['userfile']['tmp_name'];
				}
			}
				if ($mensaje=="") {
				$periodo=$this->Periodo_model->PeriodoActivo_asp();
					$data= array(
						'id_usuario'=>$this->session->userdata('id'),
						'id_requisito'=>'1',
						'id_periodo'=>$periodo->id,
					);
				   // var_dump($data);
					if($this->Control_requisitos_model->getControl_requisitos($periodo->id,1,$this->session->userdata('id'))==NULL){
						$this->Control_requisitos_model->save($data);
						$this->session->set_flashdata("success","Cédula de Identidad Cargada con Éxito.");
						redirect(base_url()."dashboard08/requisitos");
					}else{
						$fecha=date("Y-m-d H:i:s");
						$data2= array(
						'fecha_actualizacion'=>$fecha,);
						$retorno=$this->Control_requisitos_model->update($this->session->userdata('id'),$periodo->id,1,$data2);
						//var_dump($retorno);
						$this->session->set_flashdata("warning","El requisito fue actualizado.");
			    		redirect(base_url()."dashboard08/requisitos");
					}
					//var_dump($guarda);
					
			} else {
				

				$this->session->set_flashdata("error",$mensaje);
			    redirect(base_url()."dashboard08/datos3");
			}
	//	$this->load->view('layouts/header');
	//	$this->load->view('layouts/sidebar');
	//	$this->load->view('aspirante/datos/foto');
	//	$this->load->view('layouts/footer');
	}
	/*Actualizada 30-03-2022*/

public function cargaimpres()
	{
		
		extract($_REQUEST);
			$nombre_archivo = $_FILES['userfile']['name'];
			$tipo_archivo = $_FILES['userfile']['type'];
			$tamano_archivo = $_FILES['userfile']['size'];
			//compruebo si las caracter�sticas del archivo son las que deseo
			if (!((strpos($tipo_archivo, "gif") || strpos($tipo_archivo, "jpeg") ||  strpos($tipo_archivo, "jpg") || strpos($tipo_archivo, "png"))))
			{ // formato incorrecto
				$mensaje = $nombre_archivo.' - '.$tipo_archivo.' - '.$tamano_archivo;
				$mensaje.=$tipo_archivo." <strong>El formato del archivo es invalido. El archivo debe tener el formato: .gif, .jpg o .png</strong>";
			} else if (($tamano_archivo > 1048576)) { // excede el tama�o permitido
				$mensaje="<strong>La imagen no puede exceder de 1 Mb, el archivo que intenta cargar tiene un tama&ntilde;o de: ".number_format($tamano_archivo/1048576,2)." Mb </strong><br/> Seleccione otra imagen e intente de nuevo";
			} else { // todo ok
				if (move_uploaded_file($_FILES['userfile']['tmp_name'], 'assets/impres/'. $this->session->userdata('id')."_impres.jpg"))
				{
					$mensaje="";
				} else {
					$mensaje="Ocurrio algun error al subir la imagen. No pudo guardarse.";
				}
			}
			if ($mensaje=="") {
				$periodo=$this->Periodo_model->PeriodoActivo_asp();
					$data= array(
						'id_usuario'=>$this->session->userdata('id'),
						'id_requisito'=>'8',
						'id_periodo'=>$periodo->id,
					);
				   // var_dump($data);
					if($this->Control_requisitos_model->getControl_requisitos($periodo->id,8,$this->session->userdata('id'))==NULL){
						$this->Control_requisitos_model->save($data);
						$this->session->set_flashdata("success","IMPRES Médico o INPRE-Abogado Cargado con Éxito.");
						redirect(base_url()."dashboard08/requisitos");
					}else{
						$fecha=date("Y-m-d H:i:s");
						$data2= array(
						'fecha_actualizacion'=>$fecha,);
						$retorno=$this->Control_requisitos_model->update($this->session->userdata('id'),$periodo->id,7,$data2);
						//var_dump($retorno);
						$this->session->set_flashdata("warning","El requisito fue actualizado.");
			    		redirect(base_url()."dashboard08/requisitos");
					}
					//var_dump($guarda);
					
			} else {
				

				$this->session->set_flashdata("error",$mensaje);
			    redirect(base_url()."dashboard08/datos9");
			}
	
	}
	/*Actualizada 30-03-2022*/
	public function cargarcolegiatura()
	{
		
		extract($_REQUEST);
			$nombre_archivo = $_FILES['userfile']['name'];
			$tipo_archivo = $_FILES['userfile']['type'];
			$tamano_archivo = $_FILES['userfile']['size'];
			//compruebo si las caracter�sticas del archivo son las que deseo
			if (!((strpos($tipo_archivo, "gif") || strpos($tipo_archivo, "jpeg") ||  strpos($tipo_archivo, "jpg") || strpos($tipo_archivo, "png"))))
			{ // formato incorrecto
				$mensaje = $nombre_archivo.' - '.$tipo_archivo.' - '.$tamano_archivo;
				$mensaje.=$tipo_archivo." <strong>El formato del archivo es invalido. El archivo debe tener el formato: .gif, .jpg o .png</strong>";
			} else if (($tamano_archivo > 1048576)) { // excede el tama�o permitido
				$mensaje="<strong>La imagen no puede exceder de 1 Mb, el archivo que intenta cargar tiene un tama&ntilde;o de: ".number_format($tamano_archivo/1048576,2)." Mb </strong><br/> Seleccione otra imagen e intente de nuevo";
			} else { // todo ok
				if (move_uploaded_file($_FILES['userfile']['tmp_name'], 'assets/colegiatura/'. $this->session->userdata('id')."_colegiatura.jpg"))
				{
					$mensaje="";
				} else {
					$mensaje="Ocurrio algun error al subir la imagen. No pudo guardarse.";
				}
			}
			if ($mensaje=="") {
				$periodo=$this->Periodo_model->PeriodoActivo_asp();
					$data= array(
						'id_usuario'=>$this->session->userdata('id'),
						'id_requisito'=>'9',
						'id_periodo'=>$periodo->id,
					);
				   // var_dump($data);
					if($this->Control_requisitos_model->getControl_requisitos($periodo->id,9,$this->session->userdata('id'))==NULL){
						$this->Control_requisitos_model->save($data);
						$this->session->set_flashdata("success","Carnet de Colegiatura Cargado con Éxito.");
						redirect(base_url()."dashboard08/requisitos");
					}else{
						$fecha=date("Y-m-d H:i:s");
						$data2= array(
						'fecha_actualizacion'=>$fecha,);
						$retorno=$this->Control_requisitos_model->update($this->session->userdata('id'),$periodo->id,9,$data2);
						//var_dump($retorno);
						$this->session->set_flashdata("warning","El requisito fue actualizado.");
			    		redirect(base_url()."dashboard08/requisitos");
					}
					//var_dump($guarda);
					
			} else {
				

				$this->session->set_flashdata("error",$mensaje);
			    redirect(base_url()."dashboard08/datos10");
			}
	
	}
	/*Actualizada 30-03-2022*/
	public function cargarcumplimiento()
	{
		
		extract($_REQUEST);
			$nombre_archivo = $_FILES['userfile']['name'];
			$tipo_archivo = $_FILES['userfile']['type'];
			$tamano_archivo = $_FILES['userfile']['size'];
			//compruebo si las caracter�sticas del archivo son las que deseo
			if (!((strpos($tipo_archivo, "gif") || strpos($tipo_archivo, "jpeg") ||  strpos($tipo_archivo, "jpg") || strpos($tipo_archivo, "png"))))
			{ // formato incorrecto
				$mensaje = $nombre_archivo.' - '.$tipo_archivo.' - '.$tamano_archivo;
				$mensaje.=$tipo_archivo." <strong>El formato del archivo es invalido. El archivo debe tener el formato: .gif, .jpg o .png</strong>";
			} else if (($tamano_archivo > 1048576)) { // excede el tama�o permitido
				$mensaje="<strong>La imagen no puede exceder de 1 Mb, el archivo que intenta cargar tiene un tama&ntilde;o de: ".number_format($tamano_archivo/1048576,2)." Mb </strong><br/> Seleccione otra imagen e intente de nuevo";
			} else { // todo ok
				if (move_uploaded_file($_FILES['userfile']['tmp_name'], 'assets/rural/'. $this->session->userdata('id')."_rural.jpg"))
				{
					$mensaje="";
				} else {
					$mensaje="Ocurrio algun error al subir la imagen. No pudo guardarse.";
				}
			}
			if ($mensaje=="") {
				$periodo=$this->Periodo_model->PeriodoActivo_asp();
					$data= array(
						'id_usuario'=>$this->session->userdata('id'),
						'id_requisito'=>'10',
						'id_periodo'=>$periodo->id,
					);
				   // var_dump($data);
					if($this->Control_requisitos_model->getControl_requisitos($periodo->id,10,$this->session->userdata('id'))==NULL){
						$this->Control_requisitos_model->save($data);
						$this->session->set_flashdata("success","Cumplimiento del rural o internado rotatorio Cargado con Éxito.");
						redirect(base_url()."dashboard08/requisitos");
					}else{
						$fecha=date("Y-m-d H:i:s");
						$data2= array(
						'fecha_actualizacion'=>$fecha,);
						$retorno=$this->Control_requisitos_model->update($this->session->userdata('id'),$periodo->id,10,$data2);
						//var_dump($retorno);
						$this->session->set_flashdata("warning","El requisito fue actualizado.");
			    		redirect(base_url()."dashboard08/requisitos");
					}
					//var_dump($guarda);
					
			} else {
				

				$this->session->set_flashdata("error",$mensaje);
			    redirect(base_url()."dashboard08/datos11");
			}
	
	}
	/*Actualizada 30-03-2022*/
	public function cargarespecialista()
	{
		
		extract($_REQUEST);
			$nombre_archivo = $_FILES['userfile']['name'];
			$tipo_archivo = $_FILES['userfile']['type'];
			$tamano_archivo = $_FILES['userfile']['size'];
			//compruebo si las caracter�sticas del archivo son las que deseo
			if (!((strpos($tipo_archivo, "gif") || strpos($tipo_archivo, "jpeg") || strpos($tipo_archivo, "jpg") || strpos($tipo_archivo, "png"))))
			{ // formato incorrecto
				$mensaje = $nombre_archivo.' - '.$tipo_archivo.' - '.$tamano_archivo;
				$mensaje.=$tipo_archivo." <strong>El formato del archivo es invalido. El archivo debe tener el formato: .gif, .jpg o .png</strong>";
			} else if (($tamano_archivo > 1048576)) { // excede el tama�o permitido
				$mensaje="<strong>La imagen no puede exceder de 1 Mb, el archivo que intenta cargar tiene un tama&ntilde;o de: ".number_format($tamano_archivo/1048576,2)." Mb </strong><br/> Seleccione otra imagen e intente de nuevo";
			} else { // todo ok
				if (move_uploaded_file($_FILES['userfile']['tmp_name'], 'assets/especialista/'. $this->session->userdata('id')."_especialista.jpg"))
				{
					$mensaje="";
				} else {
					$mensaje="Ocurrio algun error al subir la imagen. No pudo guardarse.";
				}
			}
			if ($mensaje=="") {
				$periodo=$this->Periodo_model->PeriodoActivo_asp();
					$data= array(
						'id_usuario'=>$this->session->userdata('id'),
						'id_requisito'=>'11',
						'id_periodo'=>$periodo->id,
					);
				   // var_dump($data);
					if($this->Control_requisitos_model->getControl_requisitos($periodo->id,11,$this->session->userdata('id'))==NULL){
						$this->Control_requisitos_model->save($data);
						$this->session->set_flashdata("success","Cumplimiento del rural o internado rotatorio Cargado con Éxito.");
						redirect(base_url()."dashboard08/requisitos");
					}else{
						$fecha=date("Y-m-d H:i:s");
						$data2= array(
						'fecha_actualizacion'=>$fecha,);
						$retorno=$this->Control_requisitos_model->update($this->session->userdata('id'),$periodo->id,11,$data2);
						//var_dump($retorno);
						$this->session->set_flashdata("warning","El requisito fue actualizado.");
			    		redirect(base_url()."dashboard08/requisitos");
					}
					//var_dump($guarda);
					
			} else {
				

				$this->session->set_flashdata("error",$mensaje);
			    redirect(base_url()."dashboard08/datos12");
			}
	
	
	}
public function cargarmagister()
	{
		
		extract($_REQUEST);
			$nombre_archivo = $_FILES['userfile']['name'];
			$tipo_archivo = $_FILES['userfile']['type'];
			$tamano_archivo = $_FILES['userfile']['size'];
			//compruebo si las caracter�sticas del archivo son las que deseo
			if (!((strpos($tipo_archivo, "gif") || strpos($tipo_archivo, "jpeg") || strpos($tipo_archivo, "jpg") || strpos($tipo_archivo, "png"))))
			{ // formato incorrecto
				$mensaje = $nombre_archivo.' - '.$tipo_archivo.' - '.$tamano_archivo;
				$mensaje.=$tipo_archivo." <strong>El formato del archivo es invalido. El archivo debe tener el formato: .gif, .jpg o .png(Solo Imágenes)</strong>";
			} else if (($tamano_archivo > 1048576)) { // excede el tama�o permitido
				$mensaje="<strong>La imagen no puede exceder de 1 Mb, el archivo que intenta cargar tiene un tama&ntilde;o de: ".number_format($tamano_archivo/1048576,2)." Mb </strong><br/> Seleccione otra imagen e intente de nuevo";
			} else { // todo ok
				if (move_uploaded_file($_FILES['userfile']['tmp_name'], 'assets/magister/'. $this->session->userdata('id')."_magister.jpg"))
				{
					$mensaje="";
				} else {
					$mensaje="Ocurrio algun error al subir la imagen. No pudo guardarse.";
				}
			}
			if ($mensaje=="") {
				$periodo=$this->Periodo_model->PeriodoActivo_asp();
					$data= array(
						'id_usuario'=>$this->session->userdata('id'),
						'id_requisito'=>'19',
						'id_periodo'=>$periodo->id,
					);
				   // var_dump($data);
					if($this->Control_requisitos_model->getControl_requisitos($periodo->id,19,$this->session->userdata('id'))==NULL){
						$this->Control_requisitos_model->save($data);
						$this->session->set_flashdata("success","Titulo de Magister Cargado con Éxito.");
						redirect(base_url()."dashboard08/requisitos");
					}else{
						$fecha=date("Y-m-d H:i:s");
						$data2= array(
						'fecha_actualizacion'=>$fecha,);
						$retorno=$this->Control_requisitos_model->update($this->session->userdata('id'),$periodo->id,19,$data2);
						//var_dump($retorno);
						$this->session->set_flashdata("warning","El requisito fue actualizado.");
			    		redirect(base_url()."dashboard08/requisitos");
					}
					//var_dump($guarda);
					
			} else {
				

				$this->session->set_flashdata("error",$mensaje);
			    redirect(base_url()."dashboard08/datos15");
			}
	
	}
	public function cargacalificaciones() //cargar PDF  de Notas de pregrado
	{
		
		extract($_REQUEST);
			$nombre_archivo = $_FILES['userfile']['name'];
			$tipo_archivo = $_FILES['userfile']['type'];
			$tamano_archivo = $_FILES['userfile']['size'];

//compruebo si las caracter�sticas del archivo son las que deseo
			if (!((strpos($tipo_archivo, "pdf") )))
			{ // formato incorrecto
				$mensaje = $nombre_archivo.' - '.$tipo_archivo.' - '.$tamano_archivo;
				$mensaje.=$tipo_archivo." <strong>El formato del archivo es invalido. El archivo debe tener el formato:  .pdf</strong>";
			} else if (($tamano_archivo > 1048576)) { // excede el tama�o permitido
				$mensaje="<strong>Las calificaciones de Pregrado no puede exceder de 1 Mb, el archivo que intenta cargar tiene un tama&ntilde;o de: ".number_format($tamano_archivo/1048576,2)." Mb </strong><br/> Seleccione otro documento e intente de nuevo";
			} else { // todo ok
				if(strpos($tipo_archivo, "pdf")&& move_uploaded_file($_FILES['userfile']['tmp_name'], 'assets/calificaciones/'. $this->session->userdata('id')."_calificaciones.pdf")){
				 	
					$mensaje="";
				}else {
					$mensaje="Ocurrio algun error al subir el archivo. No pudo guardarse.";
					}
			
			}
			if ($mensaje=="") {
				$periodo=$this->Periodo_model->PeriodoActivo_asp();
					$data= array(
						'id_usuario'=>$this->session->userdata('id'),
						'id_requisito'=>'12',
						'id_periodo'=>$periodo->id,
					);
				   // var_dump($data);
					if(!$this->Control_requisitos_model->getControl_requisitos($periodo->id,12,$this->session->userdata('id'))){
						if($this->Control_requisitos_model->save($data)){
						$this->session->set_flashdata("success","Calificaciones de Pregrado Cargada con Éxito.");
						redirect(base_url()."dashboard08/datos13");
						}else{
							$this->session->set_flashdata("error","Ocurrio algun error al guardar la información.");
							redirect(base_url()."dashboard08/datos13");
						}
					}else{
						$fecha=date("Y-m-d H:i:s");
						$data2= array(
						'fecha_actualizacion'=>$fecha,);
						$retorno=$this->Control_requisitos_model->update($this->session->userdata('id'),$periodo->id,12,$data2);
						//var_dump($retorno);
						$this->session->set_flashdata("warning","El requisito fue actualizado.");
			    		redirect(base_url()."dashboard08/datos13");
					}
					//var_dump($guarda);
					
			} else {
				

				$this->session->set_flashdata("error",$mensaje);
			    redirect(base_url()."dashboard08/datos13");
			}
	
	}
public function cargapostulacion() //cargar PDF  de oficio o carta de postulacion
	{
		
		extract($_REQUEST);
			$nombre_archivo = $_FILES['userfile']['name'];
			$tipo_archivo = $_FILES['userfile']['type'];
			$tamano_archivo = $_FILES['userfile']['size'];

//compruebo si las caracter�sticas del archivo son las que deseo
			if (!((strpos($tipo_archivo, "pdf") )))
			{ // formato incorrecto
				$mensaje = $nombre_archivo.' - '.$tipo_archivo.' - '.$tamano_archivo;
				$mensaje.=$tipo_archivo." <strong>El formato del archivo es invalido. El archivo debe tener el formato:  .pdf</strong>";
			} else if (($tamano_archivo > 1048576)) { // excede el tama�o permitido
				$mensaje="<strong>El oficio o carta de postulación no puede exceder de 1 Mb, el archivo que intenta cargar tiene un tama&ntilde;o de: ".number_format($tamano_archivo/1048576,2)." Mb </strong><br/> Seleccione otro documento e intente de nuevo";
			} else { // todo ok
				if(strpos($tipo_archivo, "pdf")&& move_uploaded_file($_FILES['userfile']['tmp_name'], 'assets/postulaciones/'. $this->session->userdata('id')."_postulaciones.pdf")){				 	
					$mensaje="";
				}else {
					$mensaje="Ocurrio algun error al subir el archivo. No pudo guardarse.";
					}
			
			}
			if ($mensaje=="") {
				$periodo=$this->Periodo_model->PeriodoActivo_asp();
					$data= array(
						'id_usuario'=>$this->session->userdata('id'),
						'id_requisito'=>'17',
						'id_periodo'=>$periodo->id,
					);
				   // var_dump($data);
					if(!$this->Control_requisitos_model->getControl_requisitos($periodo->id,15,$this->session->userdata('id'))){
						if($this->Control_requisitos_model->save($data)){
						$this->session->set_flashdata("success","Oficio o Carta de Postulación Cargada con Éxito.");
						redirect(base_url()."dashboard08/requisitos");
						}else{
							$this->session->set_flashdata("error","Ocurrio algun error al guardar la información.");
							redirect(base_url()."dashboard08/datos14");
						}
					}else{
						$fecha=date("Y-m-d H:i:s");
						$data2= array(
						'fecha_actualizacion'=>$fecha,);
						$retorno=$this->Control_requisitos_model->update($this->session->userdata('id'),$periodo->id,17,$data2);
						//var_dump($retorno);
						$this->session->set_flashdata("warning","El requisito fue actualizado.");
			    		redirect(base_url()."dashboard08/requisitos");
					}
					//var_dump($guarda);
					
			} else {
				

				$this->session->set_flashdata("error",$mensaje);
			    redirect(base_url()."dashboard08/datos14");
			}
	
	}
	public function actualizar($id_usuario)
	{
		$no_encontrado = $this->input->post("no_encontrado");
		$id_usuario = $this->input->post("id_usuario");
		$primer_nombre = $this->input->post("primer_nombre");
		$segundo_nombre = $this->input->post("segundo_nombre");
		$primer_apellido = $this->input->post("primer_apellido");
		$segundo_apellido = $this->input->post("segundo_apellido");
		$cod_nacionalidad = $this->input->post("cod_nacionalidad");
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

		if ($explode[1] == "GMAIL.COM") {

				$data  = array(
				'id_usuario' => $id_usuario, 
				'nombre_primer' => $primer_nombre,
				'nombre_segundo' => $segundo_nombre, 
				'apellido_primer' => $primer_apellido,
				'apellido_segundo' => $segundo_apellido, 
				'nacionalidad' => $cod_nacionalidad,
				'cedula' => $cedula, 
				'id_estado_civil' => $estado_civil,
				'id_codigo_hab'=> $codigo_telhab,
				'tel_habitacion' => $telefono_hab, 
				'id_codigo_cel_whatsapp'=>$codigo_telcelwhat,
				'telefono_whatsapp' => $telefono_celwhat,
				'id_sexo' => $sexo, 
				'correo' => $correo,
				'id_codigo_cel'=>$codigo_telcel,
				'tel_celular' => $telefono_cel,
				'fecha_nac' => $fec_nac
				);
			//	var_dump($datos_alumnos);
			if($no_encontrado!='falso'){
					if ($this->Alumno_model->update($no_encontrado,$data)) {
						redirect(base_url()."dashboard08/datos1");
					}
					else{
						$this->session->set_flashdata("error","No se pudo guardar la informacion");
						redirect(base_url()."dashboard08/datos");
					}
			}
			else{
					if ($this->Alumno_model->save($data)) {
						redirect(base_url()."dashboard08/datos1");
					}
					else{
						$this->session->set_flashdata("error","No se pudo guardar la informacio");
						redirect(base_url()."dashboard08/datos");
					}

			}
		}else{
				$this->session->set_flashdata("error","No se pudo guardar la informaciòn. Debe registrar un correo GMAIL");
			redirect(base_url()."dashboard08/datos");

		}
	}

	public function direccion_store($id_usuario)
	{
		$no_encontrado = $this->input->post("no_encontrado");
		$id_usuario = $this->input->post("id_usuario");
		$comboestado = $this->input->post("comboestado");
		$combomunicipio = $this->input->post("combomunicipio");
		$comboparroquia = $this->input->post("comboparroquia");
        $domicilio = $this->input->post("domicilio");

		$data  = array(
			'id_usuario' => $id_usuario, 
			'id_estado' => $comboestado,
			'id_municipio' => $combomunicipio,
			'id_parroquia' => $comboparroquia,
            'domicilio'=> $domicilio
		);

		if($no_encontrado!='falso'){
					if ($this->Direccion_model->update($no_encontrado,$data)) {
						redirect(base_url()."dashboard08/academico");
					}
					else{
						$this->session->set_flashdata("error","No se pudo guardar la informacion");
						redirect(base_url()."dashboard08/datos2");
					}
			}
			else{
					if ($this->Direccion_model->save($data)) {
						redirect(base_url()."dashboard08/academico");
					}
					else{
						$this->session->set_flashdata("error","No se pudo guardar la informacion");
						redirect(base_url()."dashboard08/datos2");
					}

			}


		redirect(base_url()."dashboard08/datos2");
	}
    public function registrar_pregrado($id_usuario)
	{
		
		$no_encontrado = $this->input->post("no_encontrado");
		$id_usuario = $this->input->post("id_usuario");
		$id_academico=$this->input->post("id_academico");
	
		$titulo_obtener = $this->input->post("ult_titulo_pre");
		$carrera = $this->input->post("carrera_pre");
		$institucion = $this->input->post("institucion_pre");
		$estudia = 2;
		$ingreso_pregrado=$this->input->post("ingreso_pregrado");
		$egreso_pregrado=$this->input->post("graduacion_pregrado");
		$indice=$this->input->post("indice_academico");
	$nivel_academico=$this->input->post("nivel_academico");
		
		$data  = array(
			'id_usuario' => $id_usuario, 
			'ult_titulo' => $carrera,
			'institucion' => $institucion,
			'estudia' => $estudia,			
			'titulo_obtener'=> $titulo_obtener,
			'anno_ingreso'=> $ingreso_pregrado,
			'anno_graduacion'=> $egreso_pregrado,
			'indice_academico'=> $indice,
			'tipo_estudio'=> $nivel_academico,
		);
		//var_dump($data);
		

		if($no_encontrado!='falso'){
					if ($this->Academico_model->update_academico($no_encontrado,$data) ){
						$this->session->set_flashdata("warning","Estudio de Pregrado actualizado con éxito.");
					redirect(base_url()."dashboard08/academico");						
						
					}else{
						$this->session->set_flashdata("error","No se pudo guardar la informacion 1");
						redirect(base_url()."dashboard08/academico");
                    }
					
			}
			else{
					if ($this->Academico_model->save($data)) {
						
						$this->session->set_flashdata("success","Estudio de Pregrado registrado con éxito");
					redirect(base_url()."dashboard08/academico");	
						
					}else{
						$this->session->set_flashdata("error","No se pudo guardar la informacion4");
						redirect(base_url()."dashboard08/academico");
					}

			}
		
	}
	public function registrar_postgrado($id_usuario)
	{
		
		$no_encontrado = $this->input->post("no_encontrado");
		$id_usuario = $this->input->post("id_usuario");
		$id_academico=$this->input->post("id_academico");
	
		$titulo_obtener = $this->input->post("ult_titulo_post");
	
		$institucion = $this->input->post("institucion_post");
		$estudia = 2;
		$ingreso_post=$this->input->post("ingreso_postgrado");
		$egreso_post=$this->input->post("graduacion_postgrado");
		$indice=$this->input->post("indice_academico_post");
		$nivel_academico=$this->input->post("nivel_academico_post");
		$tema_grado=$this->input->post("tema_postgrado");
		
		$data  = array(
			'id_usuario' => $id_usuario, 
			'ult_titulo' => $titulo_obtener,
			'institucion' => $institucion,
			'estudia' => $estudia,			
			'titulo_obtener'=> $titulo_obtener,
			'anno_ingreso'=> $ingreso_post,
			'anno_graduacion'=> $egreso_post,
			'indice_academico'=> $indice,
			'tipo_estudio'=> $nivel_academico,
			'tema_grado'=> $tema_grado,
		);
		//var_dump($data);
		

		
					if ($this->Academico_model->save($data)) {
						
						$this->session->set_flashdata("success_a","Estudio de Postgrado registrado con éxito");
					redirect(base_url()."dashboard08/academico");	
						
					}else{
						$this->session->set_flashdata("error_a","No se pudo guardar la informacion4");
						redirect(base_url()."dashboard08/academico");
					}

		
		
	}
	public function actualizar_postgrado ($id)
	{
		
		
		$no_encontrado = $this->input->post("no_encontrado");
		$id_usuario = $this->input->post("id_usuario");
		$id_academico=$this->input->post("id_academico");
	
		$titulo_obtener = $this->input->post("ult_titulo_post");
	
		$institucion = $this->input->post("institucion_post");
		$estudia = 2;
		$ingreso_post=$this->input->post("ingreso_postgrado");
		$egreso_post=$this->input->post("graduacion_postgrado");
		$indice=$this->input->post("indice_academico_post");
		$nivel_academico=$this->input->post("nivel_academico_post");
		$tema_grado=$this->input->post("tema_postgrado");
		
		$data  = array(
		
			'ult_titulo' => $titulo_obtener,
			'institucion' => $institucion,
			'estudia' => $estudia,			
			'titulo_obtener'=> $titulo_obtener,
			'anno_ingreso'=> $ingreso_post,
			'anno_graduacion'=> $egreso_post,
			'indice_academico'=> $indice,
			'tipo_estudio'=> $nivel_academico,
			'tema_grado'=> $tema_grado,
		);
		//var_dump($data);		
		if ($this->Academico_model->update_academico($id_academico,$data) ){
			$this->session->set_flashdata("warning_a","Estudio de Postgrado actualizado con éxito.");
		redirect(base_url()."dashboard08/academico");						
			
		}else{
			$this->session->set_flashdata("error_a","No se pudo guardar la informacion 1");
			redirect(base_url()."dashboard08/academico");
		}
		
			
		
	}
	public function postgrado_eliminar ($id)
	{
		
		if($this->session->userdata('rol')==7){	
				if ($this->Academico_model->delete($id)) {
					$this->session->set_flashdata("warning_a","Estudio de postgrado a sido Eliminado.");
						redirect(base_url()."dashboard08/academico");
					
				}else{
					$this->session->set_flashdata("error_a","No se pudo guardar la informacion");
					redirect(base_url()."dashboard08/academico");
				}		
		}
		
	}
	public function registrar_no_conducente($id_usuario)
	{
		
	
		$id_usuario = $this->input->post("id_usuario");
		
	
		$estudio_realizado = $this->input->post("estudio_realizado");
	
		$institucion = $this->input->post("instituto");
		
		$anno_realizado=$this->input->post("anno_realizado");
	
		
		$data  = array(
			'id_usuario' => $id_usuario, 
			'estudio_realizado' => $estudio_realizado,
			'institucion' => $institucion,
			
			'anno_realizado'=> $anno_realizado,
			
		);
		//var_dump($data);
		

		
					if ($this->No_conducente_model->save($data)) {
						
						$this->session->set_flashdata("success","Estudio no Conducente a grado registrado con éxito");
					redirect(base_url()."dashboard08/no_conducente");	
						
					}else{
						$this->session->set_flashdata("error","No se pudo guardar la información");
						redirect(base_url()."dashboard08/no_conducente");
					}

		
		
	}
	public function actualizar_no_conducente($id)
	{
		
	
		$id = $this->input->post("id_academico");
		
	
		$estudio_realizado = $this->input->post("estudio_realizado");
	
		$institucion = $this->input->post("instituto");
		
		$anno_realizado=$this->input->post("anno_realizado");
	
		
		$data  = array(
			
			'estudio_realizado' => $estudio_realizado,
			'institucion' => $institucion,			
			'anno_realizado'=> $anno_realizado,
			
		);
		//var_dump($data);
		

		
					if ($this->No_conducente_model->update_no_conducentes($id,$data)) {
						
						$this->session->set_flashdata("warning","Estudio no conducente a grado actualizado con éxito");
					redirect(base_url()."dashboard08/no_conducente");	
						
					}else{
						$this->session->set_flashdata("error","No se pudo guardar la informacion4");
						redirect(base_url()."dashboard08/no_conducente_edit");
					}

		
		
	}
	public function no_conducente_eliminar ($id)
	{
		
		if($this->session->userdata('rol')==7){	
				if ($this->No_conducente_model->delete($id)) {
					$this->session->set_flashdata("warning","Estudio no conducente a grado a sido Eliminado.");
						redirect(base_url()."dashboard08/no_conducente");
					
				}else{
					$this->session->set_flashdata("error","No se pudo guardar la informacion");
					redirect(base_url()."dashboard08/no_conducente");
				}		
		}
		
	}
	public function trabajo_store($id_usuario,$actual)
	{
		
		$no_encontrado = $this->input->post("no_encontrado");
		$id_usuario = $this->input->post("id_usuario");

		$lugar_trabajo = $this->input->post("lugar_trabajo");
		$cargo_desempena = $this->input->post("cargo_desempena");
			$codigo_teltrab = $this->input->post("codigo_teltrab");
			$telefono_teltrab = $this->input->post("telefono_teltrab");
		$telefono_trabajo = $codigo_teltrab.$telefono_teltrab;
		$jubilado = $this->input->post("radio_jub");
		$estado_postgrado = $this->input->post("estado_postgrado");
        $institucion = $this->input->post("institucion");
        $direccion = $this->input->post("direccion_adscripcion_actual");
        $circunscripcion = $this->input->post("circunscripcion");
        $funciones = $this->input->post("funciones_desempena");
        $ingreso = $this->input->post("anno_ingreso");
		$postulado = $this->input->post("radio_pos");
		 $est_circunscripcion = $this->input->post("comboestado");

		if( $lugar_trabajo==1){
		$data  = array(
			'id_usuario' => $id_usuario, 
			'id_lugar_trabajo' => $lugar_trabajo,
			'cargo' => $cargo_desempena,
			'tel_trabajo' => $telefono_trabajo,
			'jubilado' => $jubilado,
			'id_estado_inscribio' => 24 ,
            'institucion' => $institucion,
            'direccion_adscripcion' => $direccion,
            'circunscripcion' => $circunscripcion,
            'funciones' => $funciones,
            'actual' => $actual,
            'anno_ingreso' => $ingreso,
			'postulado'=>$postulado,
			'estado_circunscripcion'=> $est_circunscripcion,
		);
	}else{
		$data  = array(
			'id_usuario' => $id_usuario, 
			'id_lugar_trabajo' => $lugar_trabajo,
			'cargo' => $cargo_desempena,
			'tel_trabajo' => $telefono_trabajo,
			'jubilado' => $jubilado,
			'id_estado_inscribio' => 24 ,
            'institucion' => $institucion,
            'direccion_adscripcion' => $direccion,
            'circunscripcion' => '',
            'funciones' => $funciones,
            'actual' => $actual,
            'anno_ingreso' => $ingreso,
			'postulado'=>0,
			'estado_circunscripcion'=> 0,
		);
	}
          $fecha_actual = date("Y-m-d");
          $hora_actual = date("H:i:s");
          //var_dump($data);
	if($this->session->userdata('rol')==7){
		if($no_encontrado!='falso' ){
        ///    var_dump($data);
			if ($this->Trabajo_model->update($no_encontrado,$data)) {
				$this->session->set_flashdata("warning","Trabajo Actual actualizado con éxito.");
				redirect(base_url()."dashboard08/inscripcion");
				
			}else{
				$this->session->set_flashdata("error","No se pudo guardar la información");
				redirect(base_url()."dashboard08/datos2");
			}
		}else{
			if ($this->Trabajo_model->save($data)) {
			
				$this->session->set_flashdata("succes","Trabajo Actual registrado con éxito.");
				redirect(base_url()."dashboard08/inscripcion");
				
			}else{
				$this->session->set_flashdata("error","No se pudo guardar la informacion");
			    redirect(base_url()."dashboard08/datos2");
			}
		}
	}
}
	public function trabajo_ant_store ($id_usuario,$actual)
	{
		
		$no_encontrado = $this->input->post("no_encontrado");
		$id_usuario = $this->input->post("id_usuario");

		$lugar_trabajo = $this->input->post("lugar_trabajo");
		$cargo_desempena = $this->input->post("cargo_desempena");
			$codigo_teltrab = $this->input->post("codigo_teltrab");
			$telefono_teltrab = $this->input->post("telefono_teltrab");
		$telefono_trabajo = $codigo_teltrab.$telefono_teltrab;
		$jubilado = $this->input->post("radio_jub");
		$estado_postgrado = $this->input->post("estado_postgrado");
        $institucion = $this->input->post("institucion");
        $direccion = $this->input->post("direccion_adscripcion_actual");
        $circunscripcion = $this->input->post("circunscripcion");
        $funciones = $this->input->post("funciones_desempena");
        $ingreso = $this->input->post("anno_ingreso");


		$data  = array(
			'id_usuario' => $id_usuario, 
			'id_lugar_trabajo' => $lugar_trabajo,
			'cargo' => $cargo_desempena,
			'tel_trabajo' => $telefono_trabajo,
			'jubilado' => $jubilado,
			'id_estado_inscribio' => 24,
            'institucion' => $institucion,
            'direccion_adscripcion' => $direccion,
            'circunscripcion' => $circunscripcion,
            'funciones' => $funciones,
            'actual' => $actual,
            'anno_ingreso' => $ingreso,
		);
          $fecha_actual = date("Y-m-d");
          $hora_actual = date("H:i:s");
        //  var_dump($data);
		if($this->session->userdata('rol')==7){	
				if ($this->Trabajo_model->save($data)) {
					$this->session->set_flashdata("success_a","Trabajo anterior registrado con éxito.");
						redirect(base_url()."dashboard08/datos2");
					
				}else{
					$this->session->set_flashdata("error_a","No se pudo guardar la informacion.");
					redirect(base_url()."dashboard08/datos2");
				}		
		}
		
	}
	public function actualiza_trabajo_ant ($id)
	{
		$id_usuario = $this->input->post("id_usuario");

		$lugar_trabajo = $this->input->post("lugar_trabajo");
		$cargo_desempena = $this->input->post("cargo_desempena");
		$codigo_teltrab = $this->input->post("codigo_teltrab");
		$telefono_teltrab = $this->input->post("telefono_teltrab");
		$telefono_trabajo = $codigo_teltrab.$telefono_teltrab;
		
        $institucion = $this->input->post("institucion");
        $direccion = $this->input->post("direccion_adscripcion_actual");
        $circunscripcion = $this->input->post("circunscripcion");
        $funciones = $this->input->post("funciones_desempena");
        $ingreso = $this->input->post("anno_ingreso");


		$data  = array(
		
			'id_lugar_trabajo' => $lugar_trabajo,
			'cargo' => $cargo_desempena,
			'tel_trabajo' => $telefono_trabajo,
			
            'institucion' => $institucion,
            'direccion_adscripcion' => $direccion,
            'circunscripcion' => $circunscripcion,
            'funciones' => $funciones,         
            'anno_ingreso' => $ingreso,
		);
          $fecha_actual = date("Y-m-d");
          $hora_actual = date("H:i:s");
        //  var_dump($data);
		if($this->session->userdata('rol')==7){	
				if ($this->Trabajo_model->update($id,$data)) {
					$this->session->set_flashdata("warning_a","Trabajo anterior ha sido Actualizado.");
						redirect(base_url()."dashboard08/datos2");
					
				}else{
					$this->session->set_flashdata("error_a","No se pudo guardar la informacion");
					redirect(base_url()."dashboard08/trabajo_anterior_edit");
				}		
		}
		
	}
	public function trabajo_anterior_eliminar ($id)
	{
		
		if($this->session->userdata('rol')==7){	
				if ($this->Trabajo_model->delete($id)) {
					$this->session->set_flashdata("warning_a","Trabajo anterior a sido Eliminado.");
						redirect(base_url()."dashboard08/datos2");
					
				}else{
					$this->session->set_flashdata("error_a","No se pudo guardar la informacion");
					redirect(base_url()."dashboard08/datos2");
				}		
		}
		
	}

	
	public function actualiza_de_ser_admitido($id_usuario)
	{
		
		$no_encontrado = $this->input->post("no_encontrado");
		$id_usuario = $this->input->post("id_usuario");
		$id_admitido=$this->input->post("id_admitido");
	
		$experiencia_radio = $this->input->post("radio_experiencia");
		$experiencia = $this->input->post("experiencia");
		$fortalezas = $this->input->post("fortalezas");
		$personalidad=$this->input->post("personalidad");
		
		$data  = array(
			'id_usuario' => $id_usuario, 
			'experiencia_postgrado' => $experiencia_radio,
			'senale_experiencia' => $experiencia,
			'fortalezas' => $fortalezas,			
			'personalidad'=> $personalidad,
			
		);
		//var_dump($data);
		
		$fecha_actual = date("Y-m-d");
		if($no_encontrado!='falso'){
					if ($this->De_ser_admitido_model->update_de_ser_admitido($no_encontrado,$data) ){

					
						$this->session->set_flashdata("warning","Datos actualizado con éxito.");

						if($fecha_actual<='2026-03-06' ){//or $this->session->userdata('tiempo_preinscripcion')==49 ){
							
								redirect(base_url()."dashboard08/inscripcion");						
						}else{
						?>
							<script> alert ("El tiempo de preinscripcion ha sido Cerrado.");
							location.assign("<?php echo base_url(); ?>dashboard08/requisitos");   
							</script>
							<?php 
						}
						
					}else{
						$this->session->set_flashdata("error","No se pudo guardar la informacion");
						redirect(base_url()."dashboard08/admitido");
                    }
					
			}
			else{
					if ($this->De_ser_admitido_model->save($data)) {						
						$this->session->set_flashdata("success","Datos actualizado con éxito");
						if($fecha_actual<='2026-03-06' ){
							redirect(base_url()."dashboard08/inscripcion");						
						}else{
						?>
							<script> alert ("El tiempo de preinscripcion ha sido Cerrado.");
							location.assign("<?php echo base_url(); ?>dashboard08/requisitos");   
							</script>
							<?php 
						}
					}else{
						$this->session->set_flashdata("error","No se pudo guardar la informacion");
						redirect(base_url()."dashboard08/admitido");
					}

			}
		
	}



/*actaulizado 01-09-2022*/


public function inscripcion()
	{
		$id_usuario = $this->session->userdata("id");
		$aspirante = $this->Usuarios_model->buscar_usuario($id_usuario);
		$idprograma = explode(',',$aspirante->programa_id);
	//	var_dump($idprograma);
		$periodo = $this->Periodo_model->PeriodoActivo_asp();
		$rol=$this->session->userdata("rol");
		
		

		if ($this->Registro_pago_model->RegistradoPago_asp($id_usuario,$periodo->id)==false ) {		

			$data = array(
				'periodo' =>  $this->Periodo_model->PeriodoActivo_asp(),
				'listado' => 	$this->Programa_model->getPrograma_estatus_convocatoria() ,
				'programas_sel'		=>		$idprograma ,	
				'prog_inicial'	=> $aspirante->programa_id,
			
			);	
			$this->load->view('layouts/header');
			$this->load->view('layouts/sidebar',$data2);
			$this->load->view('aspirante/inscripcion/listado',$data);//cuando no ha inscrito
			$this->load->view('layouts/footer');
		}else{
			$data = array(	
				'periodo' =>  $this->Periodo_model->PeriodoActivo_asp(),			
				'listado' => 	$this->Programa_model->getProgramaAprobado($aspirante->programa_id) ,
				'prog_inicial'	=> $aspirante->programa_id	,
				'requisitos'=>$this->Control_requisitos_model->getControl_requisitos1($periodo->id,$id_usuario)	
			);	
			$this->load->view('layouts/header');
			$this->load->view('layouts/sidebar',$data2);
			$this->load->view('aspirante/inscripcion/mensaje3',$data);//cuando no ha inscrito
			$this->load->view('layouts/footer');
		}
	}
/*actaulizado 01-09-2022*/
	public function inscripcion2()
	{
		$id_usuario = $this->session->userdata("id");
		
		 $datos_str = $this->input->post("str");
	
		$periodo = $this->Periodo_model->PeriodoActivo_asp();

		if ($datos_str !="") {
			
			$datos = trim($datos_str);		 		
		 		
		                $data  = array(
						'programa_id' => $datos, 
						
						);
						$this->Usuarios_model->update_usuario($id_usuario,$data);
			
			
			//$this->load->view('layouts/header');
			//$this->load->view('layouts/sidebar',$data2);
			redirect(base_url()."dashboard08/registro_pago/$id_usuario");
			//$this->load->view('layouts/footer');
			}else{

				$this->session->set_flashdata("error","Debe seleccionar al menos un (1) programa de postgrado. <br>Recuerde que debe cancelar un arancel de inscripción por cada programa seleccionado.");
				redirect(base_url()."dashboard08/inscripcion/");
			}
			
	}


	public function registro_pago($id_usuario)
	{
		
			$id_periodo = $this->Periodo_model->PeriodoActivo_asp();
			$id_usuario = $this->session->userdata("id");
		
			$lugartrabajo = $this->Trabajo_model->Lugar_trabajo($id_usuario);
			$academico= $this->Academico_model->getusuario_Academico_asp($id_usuario,1);
			$trabajo= $this->Trabajo_model->getListaTrabajo($id_usuario,1);
			$aspirante = $this->Usuarios_model->buscar_usuario($id_usuario);

			$interes =$this->De_ser_admitido_model->getusuario_de_ser_admitido($id_usuario);
			$direccion= $this->Direccion_model->getListaDireccion($id_usuario);

			 $id_programa = $aspirante->programa_id;
			$fecha_actual = date("Y-m-d");
		    $hora_actual =date("H:m:s");
			$data = array(
				
				'datos_str' => $datos_str, 
				'datos_alumno' => $this->Alumno_model->getListaAlumno($id_usuario),		
				'lista_trabajo' =>$this->Lugar_trabajo_model->valor_unidad($lugartrabajo->id_lugar_trabajo),
				'list_banco' => $this->Banco_model->getBanco(),		
				'periodo' => $id_periodo,	
				'aranceles'=>$this->Aranceles_model->getAranceles(),
				'lapso' => $this->Tiempo_preinscripcion_model->gettiempo_preinscripcion(),	
				'programas'=> $this->Programa_model->getProgramaAprobado($id_programa),

				
			);
			//var_dump($data);
			$data2 = array(
			'tiempo_pre' => $this->Tiempo_preinscripcion_model->gettiempo_preinscripcion(),

			);
			//var_dump($direccion);
			$this->load->view('layouts/header');
			$this->load->view('layouts/sidebar',$data2);
			
			
			if( $this->session->userdata("rol")=='7'){

				if($this->Alumno_model->getListaAlumno($id_usuario)<>false){

					if ($this->Registro_pago_model->registro_pago_aspirate($id_usuario)==false){
						if ($academico==false or $trabajo==false  or $direccion==false) {		
							?>
							<script> alert ("Usted debe completar los datos solicitados en el menú INFORMACIÖN DEL ASPIRANTE.");
							location.assign("<?php echo base_url(); ?>dashboard08/index");   
							</script>
							<?php 
					}else{
						if( $fecha_actual<='2026-03-06'){ //} or $this->session->userdata('tiempo_preinscripcion')==49  ){
							$this->load->view('aspirante/inscripcion/list_registro_pago_aspirante',$data);
						}else{
							?>
							<script> alert ("El tiempo de preinscripcion ha sido Cerrado.");
							location.assign("<?php echo base_url(); ?>dashboard08/index");   
							</script>
							<?php 
						}
						
					}
				}else{
						?>
						<script> alert ("Usted ya registró su  pago para este período de preinscripción de Aspirantes.");
						location.assign("<?php echo base_url(); ?>dashboard08/proceso");   
						</script>
						<?php 
					}
				
				}else{
					?>
					<script> alert ("Debe registrar sus datos personales en Información del Aspirante.");
					location.assign("<?php echo base_url(); ?>dashboard08");   
					</script>
					<?php 
				}
			}
			$this->load->view('layouts/footer');
	}

	public function valor_pago()
	 {
	 $id_periodo = $this->Periodo_model->PeriodoActivo_asp();
	  if($this->input->post('str'))
	  {
	   echo $this->Inscripcion_model->list_preinscripcion($this->input->post('str'),$id_periodo->id);
	  }

	 }
	
/*Actualizado 31-03-2022*/
	public function proceso()
	{
		$id_usuario = $this->session->userdata("id");
		 $idprograma=$this->session->userdata("idprograma");
		 $rol=$this->session->userdata("rol");
//		$idprograma = explode(",", $idprograma);

		//var_dump($idprograma);
		
		$id_periodo = $this->Periodo_model->PeriodoActivo_asp();
		$data = array(
		'actualizar' => $this->Trabajo_model->RegistradoTrabajo($id_usuario),
	
		'pago_aspirante' => $this->Registro_pago_model->RegistradoPago_asp($id_usuario,$id_periodo->id),
		
		'result_conciliado' => $this->Registro_pago_model->ConciliacionPago($id_usuario,$id_periodo->id),
		'periodo' => $this->Periodo_model->PeriodoActivo_asp(),
		'estadoconciliacion' => $this->Registro_pago_model->Verificacion_conciliacion($id_usuario,$id_periodo->id),
		'revicion_academica' => $this->Materias_preinscrita_model->Revicion_academica($id_usuario,$id_periodo->id),
		'revision_documentos' => $this->Registro_pago_model->Revision_documentos($id_usuario,$id_periodo->id),
		'programa_aprobado'  => $this->Programa_model->getProgramaAprobado($idprograma),
		'requisito'  => 	$this->Control_requisitos_model->getControl_requisitos1($id_periodo->id,$id_usuario),
		'documentos'=> 		$this->Control_requisitos_model->getRequisitos(),
		'academico'=> $this->Academico_model->getusuario_Academico_asp($id_usuario,1),
		'trabajo'=> $this->Trabajo_model->getListaTrabajo($id_usuario,1),
		'interes' => $this->De_ser_admitido_model->getusuario_de_ser_admitido($id_usuario),
'direccion'=> $this->Direccion_model->getListaDireccion($id_usuario)

		);
//		var_dump($data['periodo']);
		$data2 = array(
			'tiempo_pre' => $this->Tiempo_preinscripcion_model->gettiempo_preinscripcion(),

		);
	//echo count($data3);
		$this->load->view('layouts/header');
		$this->load->view('layouts/sidebar',$data2);
		
		if ($rol==7 )$this->load->view('aspirante/datos/list_proceso_aspirante',$data);
	
		
		$this->load->view('layouts/footer');		
	}


public function registropago_store()
	{
		//$id_periodo = $this->Periodo_model->PeriodoActivo();
		extract($_REQUEST);
			$nombre_archivo = $_FILES['userfile']['name'];
			$tipo_archivo = $_FILES['userfile']['type'];
			$tamano_archivo = $_FILES['userfile']['size'];
			//compruebo si las caracter�sticas del archivo son las que deseo
			if (!((strpos($tipo_archivo, "gif") || strpos($tipo_archivo, "jpeg") || strpos($tipo_archivo, "png")  || strpos($tipo_archivo, "jpg") || strpos($tipo_archivo, "pdf") )))
			{ // formato incorrecto
				$mensaje = $nombre_archivo.' - '.$tipo_archivo.' - '.$tamano_archivo;
				$mensaje.=$tipo_archivo." <strong>El formato del archivo es invalido. El archivo debe tener el formato: .gif, .jpg o .png, .pdf</strong>";
			} else if (($tamano_archivo > 1048576)) { // excede el tama�o permitido
				$mensaje="<strong>El archivo no puede exceder de 1 Mb, el archivo que intenta cargar tiene un tama&ntilde;o de: ".number_format($tamano_archivo/1048576,2)." Mb </strong><br/> Seleccione otro archivo con las caracteristicas correctas e intente de nuevo";
			} else { // todo ok
				if(strpos($tipo_archivo, "pdf")&& move_uploaded_file($_FILES['userfile']['tmp_name'], 'assets/transferencia/'. $this->session->userdata('id')."_transferencia.pdf")){
				 	
					$mensaje="";
				}else{
				
					if ((strpos($tipo_archivo, "gif") || strpos($tipo_archivo, "jpeg") || strpos($tipo_archivo, "png") )&& move_uploaded_file($_FILES['userfile']['tmp_name'], 'assets/transferencia/'. $this->session->userdata('id')."_transferencia.jpg"))
					{
						$mensaje="";
					} else {
						$mensaje="Ocurrio algun error al subir el archivo. No pudo guardarse.";
					}
				}
			}
			if ($mensaje=="") {
				
					//// guardad la imagen de la transferencia
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
				$unidad_credito = $this->input->post("total_ucredito");
				$id_periodo = $this->input->post("id_periodo");
				if($nro_referencia=='00187046' or $nro_referencia=='41052855 '){
					$this->session->set_flashdata("error","El numero de referencia bancaria coincide con el número de cuenta de la FENFMP ");
					redirect(base_url()."dashboard08/registro_pago/".$this->session->userdata('id'));
				}else{
					if($this->session->userdata("rol")==7)$aspirante='1';
				
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
						'uc' => $unidad_credito,
						'id_periodo' => $id_periodo,
						'status' => 1,
						'aspirante'=>$aspirante,
						'quien_registro'=>$id_usuario, 

					);
					//var_dump($data);
					$data2  = array(
						'reg_pago' => 1

					);

					if (!$this->Registro_pago_model->VerificarRegistro($id_usuario,$id_periodo->id)) {
						if($this->Registro_pago_model->save($data)){
						
							?><script>
							alert( "Pago Registrado Exitosamente.\n \n Recuerde cargar los requisitos para completar el registro satisfactoriamente.\n \n De lo contrario su registro como ASPIRANTE en el proceso de selección en curso QUEDARÁ SIN EFECTO." ); // true si se pulsa OK								
							location.assign("<?php echo base_url(); ?>dashboard08/requisitos");   
							</script>
							<?php 
						}else{
							$this->session->set_flashdata("error","Error al guardar la información.");
							redirect(base_url()."dashboard08/registro_pago/".$this->session->userdata('id'));
					}
				}else{
					?><script>
							alert( "El registro del pago ya fue registrado.\n \n Recuerde cargar los requisitos para completar el registro satisfactoriamente.\n \n De lo contrario su registro como ASPIRANTE en el proceso de selección en curso QUEDARÁ SIN EFECTO." ); // true si se pulsa OK								
							location.assign("<?php echo base_url(); ?>dashboard08/proceso");   
							</script>
							<?php 
					}			
						
				}
			}else{
				$this->session->set_flashdata("error",$mensaje);
				redirect(base_url()."dashboard08/registro_pago/".$this->session->userdata('id'));
			}
		
	}
	
	public function materiaspdf()
	{
		$id_usuario = $this->session->userdata("id");
		$id_periodo = $this->Periodo_model->PeriodoActivo_asp();
		$data = array(
		'actualizar' => $this->Trabajo_model->RegistradoTrabajo($id_usuario),
		'materias' => $this->Materias_preinscrita_model->RegistradoMateria($id_usuario,$id_periodo->id),
		'pago' => $this->Registro_pago_model->RegistradoPago($id_usuario,$id_periodo->id),
		'result_conciliado' => $this->Registro_pago_model->ConciliacionPago($id_usuario,$id_periodo->id),
		'periodo' => $this->Periodo_model->PeriodoActivo_asp(),
		'estadoconciliacion' => $this->Registro_pago_model->Verificacion_conciliacion($id_usuario,$id_periodo->id),
		'revicion_academica' => $this->Materias_preinscrita_model->Revicion_academica($id_usuario,$id_periodo->id),
		);
		$data2 = array(
			'tiempo_pre' => $this->Tiempo_preinscripcion_model->gettiempo_preinscripcion(),

		);
		
		$this->load->view('layouts/header');
		$this->load->view('layouts/sidebar',$data2);
		$this->load->view('aspirante/datos/materiaspdf',$data);
		$this->load->view('layouts/footer');
	}
	function CalculaEdad( $fecha ) {
		list($Y,$m,$d) = explode("-",$fecha);
		return( date("md") < $m.$d ? date("Y")-$Y-1 : date("Y")-$Y );
	}


}



