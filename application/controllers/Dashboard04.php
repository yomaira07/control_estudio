<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard04 extends CI_Controller { // controlador estudiante regular

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
		$this->load->model("Notas_academica_model");	
		$this->load->model("Prelacion_model");	
		$this->load->model("Prelacion2_model");	
		$this->load->model("Caso_especial_model");	
		if (!$this->session->userdata("login")) {
			redirect(base_url());
		}
	}

	public function home()
	{
		$id_usuario = $this->session->userdata("id");
		
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
			$this->load->view('layouts/sidebar_home',$data2);		
			$this->load->view('admin/inicio');// INICIO PANEL DE CONTROL			
			$this->load->view('layouts/footer');
		
	}
	public function index()
	{
		$id_usuario = $this->session->userdata("id");
		$cedula = $this->session->userdata("username");
		$periodo = $this->Periodo_model->PeriodoActivo();
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
			'periodo' => $this->Periodo_model->PeriodoActivo(),
			'inscripcion'=>$this->Materias_preinscrita_model->RegistradoMateria($id_usuario,$periodo->id),
		);

		if ($this->Trabajo_model->BuscarRegistradoTrabajo($id_usuario)) {

			$this->load->view('layouts/header');
			$this->load->view('layouts/sidebar',$data2);
			$this->load->view('participante/datos/edit',$data);// formulario de carga y actualizacion de datos
	
			$this->load->view('layouts/footer');
		}else{
			$this->load->view('layouts/header');
			$this->load->view('layouts/sidebar',$data2);
			$this->load->view('participante/datos/edit',$data);
			$this->load->view('layouts/footer');

		}
	}
////////// visualizar ayuda para adjuntar Requisitos  ////
	public function requisitos()
	{	
		
		$data2 = array(
			'tiempo_pre' => $this->Tiempo_preinscripcion_model->gettiempo_preinscripcion(),
			'periodo' => $this->Periodo_model->PeriodoActivo(),

		);
		
		$this->load->view('layouts/header');
		$this->load->view('layouts/sidebar',$data2);
		$this->load->view('participante/datos/requisitos');
		$this->load->view('layouts/footer');
			
		
	}


/////////// actualizacion de datos del estudiante  ////
	public function datos()
	{
		$id_usuario = $this->session->userdata("id");
$id_periodo = $this->Periodo_model->PeriodoActivo();
		$data = array(
			'cod_hab' => $this->Codigo_tel_model->Codigo_nacional(),
			'cod_cel' => $this->Codigo_tel_model->Codigo_celular(),
			'cod_celwhat' => $this->Codigo_tel_model->Codigo_celular(),
			'lista_sexo' => $this->Sexo_model->getSexo(),
			'lista_estadocivil' => $this->Estado_civil_model->getEstadocivil(),
			'datos_alumnos' => $this->Alumno_model->getListaAlumno($id_usuario)
		);
		$data2 = array(
			'tiempo_pre' => $this->Tiempo_preinscripcion_model->gettiempo_preinscripcion(),
			'periodo'=> $this->Periodo_model->PeriodoActivo(),
	'inscripcion'=>$this->Materias_preinscrita_model->RegistradoMateria($id_usuario,$id_periodo->id),
		);
		
		$this->load->view('layouts/header');
		$this->load->view('layouts/sidebar',$data2);
		$this->load->view('participante/datos/edit',$data);
		$this->load->view('layouts/footer');
	}

	public function datos1() 
	{
		$id_usuario = $this->session->userdata("id");
$id_periodo = $this->Periodo_model->PeriodoActivo();
		$data = array(
		'combo_estado' => $this->Estado_model->getEstado(),
		'combo_municipio' => $this->Municipio_model->getMunicipio(),
		'combo_parroquia' => $this->Parroquia_model->getParroquia(),
		'datos_direccion' => $this->Direccion_model->getListaDireccion($id_usuario)
		);
		$data2 = array(
			'tiempo_pre' => $this->Tiempo_preinscripcion_model->gettiempo_preinscripcion(),
			'periodo'=> $this->Periodo_model->PeriodoActivo(),
			'inscripcion'=>$this->Materias_preinscrita_model->RegistradoMateria($id_usuario,$id_periodo->id),
		);

		$this->load->view('layouts/header');
		$this->load->view('layouts/sidebar',$data2);
		$this->load->view('participante/datos/direccion',$data);
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
		$id_periodo = $this->Periodo_model->PeriodoActivo();
		$data = array(
		'lugartrabajo' => $this->Lugar_trabajo_model->getLugar_trabajo(),
		'estadotrabajo' => $this->Estado_model->getListaEstado(),
		'cod_hab' => $this->Codigo_tel_model->Codigo_nacional(),
		'datos_trabajo' => $this->Trabajo_model->getListaTrabajo($id_usuario,1)
		);
		$data2 = array(
			'tiempo_pre' => $this->Tiempo_preinscripcion_model->gettiempo_preinscripcion(),
			'periodo'=> $this->Periodo_model->PeriodoActivo(),
			'inscripcion'=>$this->Materias_preinscrita_model->RegistradoMateria($id_usuario,$id_periodo->id),
		);
		
		$this->load->view('layouts/header');
		$this->load->view('layouts/sidebar',$data2);
		$this->load->view('participante/datos/trabajo',$data);
		$this->load->view('layouts/footer');
	}

	public function datos3()
	{
		$data2 = array(
			'tiempo_pre' => $this->Tiempo_preinscripcion_model->gettiempo_preinscripcion(),
			'periodo'=> $this->Periodo_model->PeriodoActivo(),
		);
		
		$this->load->view('layouts/header');
		$this->load->view('layouts/sidebar',$data2);
		$this->load->view('participante/datos/cedula'); //carga cedula
		$this->load->view('layouts/footer');
	}
	public function datos7()
	{
		$data2 = array(
			'tiempo_pre' => $this->Tiempo_preinscripcion_model->gettiempo_preinscripcion(),
			'periodo'=> $this->Periodo_model->PeriodoActivo(),
		);
		
		$this->load->view('layouts/header');
		$this->load->view('layouts/sidebar',$data2);
		$this->load->view('participante/datos/foto');// forma que carga las foto
		$this->load->view('layouts/footer');
	}

	public function datos4()
	{
		$data2 = array(
			'tiempo_pre' => $this->Tiempo_preinscripcion_model->gettiempo_preinscripcion(),
			'periodo'=> $this->Periodo_model->PeriodoActivo(),
		);

		$this->load->view('layouts/header');
		$this->load->view('layouts/sidebar',$data2);
		
		$this->load->view('participante/datos/fondo_negro');// forma que carga los titulos fondo negro
		$this->load->view('layouts/footer');
	}

	public function datos5()
	{
		$data2 = array(
			'tiempo_pre' => $this->Tiempo_preinscripcion_model->gettiempo_preinscripcion(),
			'periodo'=> $this->Periodo_model->PeriodoActivo(),
		);
		
		$this->load->view('layouts/header');
		$this->load->view('layouts/sidebar',$data2);//carahga carta
		$this->load->view('participante/datos/carta');
		$this->load->view('layouts/footer');
	}
	public function datos6()
	{
		$id_usuario=$this->session->userdata("id");
		$periodo =$this->Periodo_model->PeriodoActivo();

		$data2 = array(
			'tiempo_pre' => $this->Tiempo_preinscripcion_model->gettiempo_preinscripcion(),
			'periodo'=> $this->Periodo_model->PeriodoActivo(),
		);
		$this->load->view('layouts/header');
		$this->load->view('layouts/sidebar',$data2);
		if ($periodo->id<=15){
			$this->load->view('participante/datos/clausula');// forma que carga las clausulas
		}
	
		$this->load->view('layouts/footer');
	}

	public function datos8()
	{
		$data2 = array(
			'tiempo_pre' => $this->Tiempo_preinscripcion_model->gettiempo_preinscripcion(),
			'periodo'=> $this->Periodo_model->PeriodoActivo(),
		);
		
		$this->load->view('layouts/header');
		$this->load->view('layouts/sidebar',$data2);
		$this->load->view('participante/datos/carnet');// forma que carga carnet
		$this->load->view('layouts/footer');
	}
	public function datos9()
	{
		$data2 = array(
			'tiempo_pre' => $this->Tiempo_preinscripcion_model->gettiempo_preinscripcion(),
			'periodo'=> $this->Periodo_model->PeriodoActivo(),
		);		
		$this->load->view('layouts/header');
		$this->load->view('layouts/sidebar',$data2);
		$this->load->view('participante/datos/impre');// forma que carga impre
		$this->load->view('layouts/footer');
	}
	public function datos10()
	{
		$data2 = array(
			'tiempo_pre' => $this->Tiempo_preinscripcion_model->gettiempo_preinscripcion(),
			'periodo'=> $this->Periodo_model->PeriodoActivo(),
		);		
		$this->load->view('layouts/header');
		$this->load->view('layouts/sidebar',$data2);
		$this->load->view('participante/datos/colegiatura');// forma que carga colegiatura
		$this->load->view('layouts/footer');
	}
	public function datos11()
	{
		$data2 = array(
			'tiempo_pre' => $this->Tiempo_preinscripcion_model->gettiempo_preinscripcion(),
			'periodo'=> $this->Periodo_model->PeriodoActivo(),
		);		
		$this->load->view('layouts/header');
		$this->load->view('layouts/sidebar',$data2);
		$this->load->view('participante/datos/cump_rural');// forma que carga cumpliminto rural
		$this->load->view('layouts/footer');
	}
	public function datos12()
	{
		$data2 = array(
			'tiempo_pre' => $this->Tiempo_preinscripcion_model->gettiempo_preinscripcion(),
			'periodo'=> $this->Periodo_model->PeriodoActivo(),
		);		
		$this->load->view('layouts/header');
		$this->load->view('layouts/sidebar',$data2);
		$this->load->view('participante/datos/titulo_especializacion');// forma que carga titulo de especialista
		$this->load->view('layouts/footer');
	}
	public function curso_ampliacion()
	{
		$periodo= $this->Periodo_model->PeriodoActivo();
		$data2 = array(
			'tiempo_pre' => $this->Tiempo_preinscripcion_model->gettiempo_preinscripcion(),
			'periodo'=> $this->Periodo_model->PeriodoActivo(),
			'curso'=> $this->Control_requisitos_model->getControl_requisitos($periodo->id,20,$this->session->userdata('id'))
		);		
		$this->load->view('layouts/header');
		$this->load->view('layouts/sidebar',$data2);
		$this->load->view('participante/datos/curso_ampliacion');// forma que carga impre
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
				//$mensaje=$tipo_archivo." <strong>El formato del archivo es invalido. La foto debe tener el formato: .gif, .jpg o .png</strong>";
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
				$periodo=$this->Periodo_model->PeriodoActivo();
					$data= array(
						'id_usuario'=>$this->session->userdata('id'),
						'id_requisito'=>'2',
						'id_periodo'=>$periodo->id,
					);
				   // var_dump($data);
					if($this->Control_requisitos_model->getControl_requisitos($periodo->id,2,$this->session->userdata('id'))==NULL){
						$this->Control_requisitos_model->save($data);
						$this->session->set_flashdata("success","Fotografía Cargada con Éxito.");
						redirect(base_url()."dashboard04/datos7");
					}else{
						$fecha=date("Y-m-d H:i:s");
						$data2= array(
						'fecha_actualizacion'=>$fecha,);
						$retorno=$this->Control_requisitos_model->update($this->session->userdata('id'),$periodo->id,2,$data2);
						//var_dump($retorno);
						$this->session->set_flashdata("warning","El requisito fue actualizado.");
			    		redirect(base_url()."dashboard04/datos7");
					}
					//var_dump($guarda);
					
			} else {
				

				$this->session->set_flashdata("error",$mensaje);
			    redirect(base_url()."dashboard04/datos7");
			}

	}
/*Actualizada 30-03-2022 - Modificada para integración */
public function cargacarnet()
{
    extract($_REQUEST);
    $nombre_archivo = $_FILES['userfile']['name'];
    $tipo_archivo = $_FILES['userfile']['type'];
    $tamano_archivo = $_FILES['userfile']['size'];
    $mensaje = "";
    
    // Comprobar si las características del archivo son las que deseo
    if (!((strpos($tipo_archivo, "gif") || strpos($tipo_archivo, "jpeg") || 
           strpos($tipo_archivo, "jpg") || strpos($tipo_archivo, "png")))) {
        // formato incorrecto
        $mensaje = $nombre_archivo.' - '.$tipo_archivo.' - '.$tamano_archivo;
        //$mensaje=$tipo_archivo." <strong>El formato del archivo es invalido. La foto debe tener el formato: .gif, .jpg o .png</strong>";
    } else if ($tamano_archivo > 1048576) {
        // excede el tamaño permitido
        $mensaje = "<strong>La imagen no puede exceder de 1 Mb, el archivo que intenta cargar tiene un tamaño de: ".number_format($tamano_archivo/1048576,2)." Mb </strong><br/> Seleccione otra foto e intente de nuevo";
    } else {
        // todo ok - subir archivo
        $ruta_destino = 'assets/carnet/' . $this->session->userdata('id') . "_carnet.jpg";
        if (move_uploaded_file($_FILES['userfile']['tmp_name'], $ruta_destino)) {
            $mensaje = "";
        } else {
            $mensaje = "Ocurrió algún error al subir la foto. No pudo guardarse.";
        }
    }
    
    if ($mensaje == "") {
        $periodo = $this->Periodo_model->PeriodoActivo();
        $data = array(
            'id_usuario' => $this->session->userdata('id'),
            'id_requisito' => '6',
            'id_periodo' => $periodo->id,
            'fecha_actualizacion' => date("Y-m-d H:i:s")
        );
        
        // Verificar si existe registro en control_requisitos
        $control_existente = $this->Control_requisitos_model->getControl_requisitos(
            $periodo->id, 
            6, 
            $this->session->userdata('id')
        );
        
        if ($control_existente == NULL) {
            // Insertar nuevo registro
            $this->Control_requisitos_model->save($data);
        } else {
            // Actualizar fecha
            $data_update = array(
                'fecha_actualizacion' => date("Y-m-d H:i:s")
            );
            $this->Control_requisitos_model->update(
                $this->session->userdata('id'),
                $periodo->id,
                6,
                $data_update
            );
        }
        
        $this->session->set_flashdata("success", "Carnet de trabajo cargado exitosamente.");
        return true;
    } else {
        $this->session->set_flashdata("error", $mensaje);
        return false;
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
				//$mensaje=$tipo_archivo." <strong>El formato del archivo es invalido. La foto debe tener el formato: .gif, .jpg o .png</strong>";
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
				$periodo=$this->Periodo_model->PeriodoActivo();
					$data= array(
						'id_usuario'=>$this->session->userdata('id'),
						'id_requisito'=>'3',
						'id_periodo'=>$periodo->id,
					);
				   // var_dump($data);
					if($this->Control_requisitos_model->getControl_requisitos($periodo->id,3,$this->session->userdata('id'))==NULL){
						$this->Control_requisitos_model->save($data);
						$this->session->set_flashdata("success","Título de Pregrado Cargado con Éxito.");
						redirect(base_url()."dashboard04/datos4");
					}else{
						$fecha=date("Y-m-d H:i:s");
						$data2= array(
						'fecha_actualizacion'=>$fecha,);
						$retorno=$this->Control_requisitos_model->update($this->session->userdata('id'),$periodo->id,3,$data2);
						//var_dump($retorno);
						$this->session->set_flashdata("warning","El requisito fue actualizado.");
			    		redirect(base_url()."dashboard04/datos4");
					}
					//var_dump($guarda);
					
			} else {			

				$this->session->set_flashdata("error",$mensaje);
			    redirect(base_url()."dashboard04/datos4");
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
				//$mensaje=$tipo_archivo." <strong>El formato del archivo es invalido. La foto debe tener el formato: .gif, .jpg o .png</strong>";
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
				$periodo=$this->Periodo_model->PeriodoActivo();
					$data= array(
						'id_usuario'=>$this->session->userdata('id'),
						'id_requisito'=>'1',
						'id_periodo'=>$periodo->id,
					);
				   // var_dump($data);
					if($this->Control_requisitos_model->getControl_requisitos($periodo->id,1,$this->session->userdata('id'))==NULL){
						$this->Control_requisitos_model->save($data);
						$this->session->set_flashdata("success","Cédula de Identidad Cargada con Éxito.");
						redirect(base_url()."dashboard04/datos3");
					}else{
						$fecha=date("Y-m-d H:i:s");
						$data2= array(
						'fecha_actualizacion'=>$fecha,);
						$retorno=$this->Control_requisitos_model->update($this->session->userdata('id'),$periodo->id,1,$data2);
						//var_dump($retorno);
						$this->session->set_flashdata("warning","El requisito fue actualizado.");
			    		redirect(base_url()."dashboard04/datos3");
					}
					//var_dump($guarda);
					
			} else {
				

				$this->session->set_flashdata("error",$mensaje);
			    redirect(base_url()."dashboard04/datos3");
			}
	//	$this->load->view('layouts/header');
	//	$this->load->view('layouts/sidebar');
	//	$this->load->view('participante/datos/foto');
	//	$this->load->view('layouts/footer');
	}
	/*Actualizada 30-03-2022*/
public function cargacarta()
	{
		
		extract($_REQUEST);
			$nombre_archivo = $_FILES['userfile']['name'];
			$tipo_archivo = $_FILES['userfile']['type'];
			$tamano_archivo = $_FILES['userfile']['size'];
			//compruebo si las caracter�sticas del archivo son las que deseo
			if (!((strpos($tipo_archivo, "gif") || strpos($tipo_archivo, "jpeg") || strpos($tipo_archivo, "jpg") || strpos($tipo_archivo, "png"))))
			{ // formato incorrecto
				$mensaje = $nombre_archivo.' - '.$tipo_archivo.' - '.$tamano_archivo;
				//$mensaje=$tipo_archivo." <strong>El formato del archivo es invalido. La foto debe tener el formato: .gif, .jpg o .png</strong>";
			} else if (($tamano_archivo > 1048576)) { // excede el tama�o permitido
				$mensaje="<strong>La imagen no puede exceder de 1 Mb, el archivo que intenta cargar tiene un tama&ntilde;o de: ".number_format($tamano_archivo/1048576,2)." Mb </strong><br/> Seleccione otra imagen e intente de nuevo";
			} else { // todo ok
				if (move_uploaded_file($_FILES['userfile']['tmp_name'], 'assets/carta/'. $this->session->userdata('id')."_carta.jpg"))
				{
					$mensaje="";
				} else {
					$mensaje="Ocurrio algun error al subir la imagen. No pudo guardarse.";
				}
			}
			if ($mensaje=="") {
				$periodo=$this->Periodo_model->PeriodoActivo();
					$data= array(
						'id_usuario'=>$this->session->userdata('id'),
						'id_requisito'=>'4',
						'id_periodo'=>$periodo->id,
					);
				   // var_dump($data);
					if($this->Control_requisitos_model->getControl_requisitos($periodo->id,4,$this->session->userdata('id'))==NULL){
						$this->Control_requisitos_model->save($data);
						$this->session->set_flashdata("success","Carta Compromisoria Cargada con Éxito.");
						redirect(base_url()."dashboard04/datos5");
					}else{
						$fecha=date("Y-m-d H:i:s");
						$data2= array(
						'fecha_actualizacion'=>$fecha,);
						$retorno=$this->Control_requisitos_model->update($this->session->userdata('id'),$periodo->id,4,$data2);
						//var_dump($retorno);
						$this->session->set_flashdata("warning","El requisito fue actualizado.");
			    		redirect(base_url()."dashboard04/datos5");
					}
					//var_dump($guarda);
					
			} else {
				

				$this->session->set_flashdata("error",$mensaje);
			    redirect(base_url()."dashboard04/datos5");
			}
			
	//	$this->load->view('layouts/header');
	//	$this->load->view('layouts/sidebar');
	//	$this->load->view('participante/datos/foto');
	//	$this->load->view('layouts/footer');
	}
	/*Actualizada 30-03-2022*/
	public function cargaclausula()
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
				if(strpos($tipo_archivo, "pdf")&& move_uploaded_file($_FILES['userfile']['tmp_name'], 'assets/clausula/'. $this->session->userdata('id')."_clausula.pdf")){
				 	
					$mensaje="";
				}else{
				
					if ((strpos($tipo_archivo, "gif") || strpos($tipo_archivo, "jpeg")|| strpos($tipo_archivo, "jpg") || strpos($tipo_archivo, "png")  )&& move_uploaded_file($_FILES['userfile']['tmp_name'], 'assets/clausula/'. $this->session->userdata('id')."_clausula.jpg"))
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
						'id_usuario'=>$this->session->userdata('id'),
						'id_requisito'=>'5',
						'id_periodo'=>$periodo->id,
					);
				   // var_dump($data);
					if(!$this->Control_requisitos_model->getControl_requisitos($periodo->id,5,$this->session->userdata('id'))){
						$this->Control_requisitos_model->save($data);
						$this->session->set_flashdata("success","Clausula Compromisoria Cargada con Éxito.");
						redirect(base_url()."dashboard04/datos6");
					}else{
						$fecha=date("Y-m-d H:i:s");
						$data2= array(
						'fecha_actualizacion'=>$fecha,);
						$retorno=$this->Control_requisitos_model->update($this->session->userdata('id'),$periodo->id,5,$data2);
						//var_dump($retorno);
						$this->session->set_flashdata("warning","El requisito fue actualizado.");
			    		redirect(base_url()."dashboard04/datos6");
					}
					//var_dump($guarda);
					
			} else {
				

				$this->session->set_flashdata("error",$mensaje);
			    redirect(base_url()."dashboard04/datos6");
			}
	//	$this->load->view('layouts/header');
	//	$this->load->view('layouts/sidebar');
	//	$this->load->view('participante/datos/foto');
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
				//$mensaje=$tipo_archivo." <strong>El formato del archivo es invalido. La foto debe tener el formato: .gif, .jpg o .png</strong>";
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
				$periodo=$this->Periodo_model->PeriodoActivo();
					$data= array(
						'id_usuario'=>$this->session->userdata('id'),
						'id_requisito'=>'7',
						'id_periodo'=>$periodo->id,
					);
				   // var_dump($data);
					if($this->Control_requisitos_model->getControl_requisitos($periodo->id,7,$this->session->userdata('id'))==NULL){
						$this->Control_requisitos_model->save($data);
						$this->session->set_flashdata("success","IMPRES Médico o INPRE-Abogado Cargado con Éxito.");
						redirect(base_url()."dashboard04/datos9");
					}else{
						$fecha=date("Y-m-d H:i:s");
						$data2= array(
						'fecha_actualizacion'=>$fecha,);
						$retorno=$this->Control_requisitos_model->update($this->session->userdata('id'),$periodo->id,7,$data2);
						//var_dump($retorno);
						$this->session->set_flashdata("warning","El requisito fue actualizado.");
			    		redirect(base_url()."dashboard04/datos9");
					}
					//var_dump($guarda);
					
			} else {
				

				$this->session->set_flashdata("error",$mensaje);
			    redirect(base_url()."dashboard04/datos9");
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
				//$mensaje=$tipo_archivo." <strong>El formato del archivo es invalido. La foto debe tener el formato: .gif, .jpg o .png</strong>";
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
				$periodo=$this->Periodo_model->PeriodoActivo();
					$data= array(
						'id_usuario'=>$this->session->userdata('id'),
						'id_requisito'=>'9',
						'id_periodo'=>$periodo->id,
					);
				   // var_dump($data);
					if($this->Control_requisitos_model->getControl_requisitos($periodo->id,9,$this->session->userdata('id'))==NULL){
						$this->Control_requisitos_model->save($data);
						$this->session->set_flashdata("success","IMPRES Médico o INPRE-Abogado Cargado con Éxito.");
						redirect(base_url()."dashboard04/datos10");
					}else{
						$fecha=date("Y-m-d H:i:s");
						$data2= array(
						'fecha_actualizacion'=>$fecha,);
						$retorno=$this->Control_requisitos_model->update($this->session->userdata('id'),$periodo->id,9,$data2);
						//var_dump($retorno);
						$this->session->set_flashdata("warning","El requisito fue actualizado.");
			    		redirect(base_url()."dashboard04/datos10");
					}
					//var_dump($guarda);
					
			} else {
				

				$this->session->set_flashdata("error",$mensaje);
			    redirect(base_url()."dashboard04/datos10");
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
				//$mensaje=$tipo_archivo." <strong>El formato del archivo es invalido. La foto debe tener el formato: .gif, .jpg o .png</strong>";
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
				$periodo=$this->Periodo_model->PeriodoActivo();
					$data= array(
						'id_usuario'=>$this->session->userdata('id'),
						'id_requisito'=>'10',
						'id_periodo'=>$periodo->id,
					);
				   // var_dump($data);
					if($this->Control_requisitos_model->getControl_requisitos($periodo->id,10,$this->session->userdata('id'))==NULL){
						$this->Control_requisitos_model->save($data);
						$this->session->set_flashdata("success","Cumplimiento del rural o internado rotatorio Cargado con Éxito.");
						redirect(base_url()."dashboard04/datos11");
					}else{
						$fecha=date("Y-m-d H:i:s");
						$data2= array(
						'fecha_actualizacion'=>$fecha,);
						$retorno=$this->Control_requisitos_model->update($this->session->userdata('id'),$periodo->id,10,$data2);
						//var_dump($retorno);
						$this->session->set_flashdata("warning","El requisito fue actualizado.");
			    		redirect(base_url()."dashboard04/datos11");
					}
					//var_dump($guarda);
					
			} else {
				

				$this->session->set_flashdata("error",$mensaje);
			    redirect(base_url()."dashboard04/datos11");
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
				//$mensaje=$tipo_archivo." <strong>El formato del archivo es invalido. La foto debe tener el formato: .gif, .jpg o .png</strong>";
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
				$periodo=$this->Periodo_model->PeriodoActivo();
					$data= array(
						'id_usuario'=>$this->session->userdata('id'),
						'id_requisito'=>'11',
						'id_periodo'=>$periodo->id,
					);
				   // var_dump($data);
					if($this->Control_requisitos_model->getControl_requisitos($periodo->id,11,$this->session->userdata('id'))==NULL){
						$this->Control_requisitos_model->save($data);
						$this->session->set_flashdata("success","Cumplimiento del rural o internado rotatorio Cargado con Éxito.");
						redirect(base_url()."dashboard04/datos12");
					}else{
						$fecha=date("Y-m-d H:i:s");
						$data2= array(
						'fecha_actualizacion'=>$fecha,);
						$retorno=$this->Control_requisitos_model->update($this->session->userdata('id'),$periodo->id,11,$data2);
						//var_dump($retorno);
						$this->session->set_flashdata("warning","El requisito fue actualizado.");
			    		redirect(base_url()."dashboard04/datos12");
					}
					//var_dump($guarda);
					
			} else {
				

				$this->session->set_flashdata("error",$mensaje);
			    redirect(base_url()."dashboard04/datos12");
			}
	
	
	}
	public function cargacurso()
	{
		
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
				$mensaje="<strong>La constancia del curso de ampliación o carta de reincorporación  no puede exceder de 1 Mb, el archivo que intenta cargar tiene un tama&ntilde;o de: ".number_format($tamano_archivo/1048576,2)." Mb </strong><br/> Seleccione otra foto e intente de nuevo";
			} else { // todo ok
				if(strpos($tipo_archivo, "pdf")&& move_uploaded_file($_FILES['userfile']['tmp_name'], 'assets/curso_ampliacion/'. $this->session->userdata('id')."_curso_ampliacion.pdf")){
						$mensaje="";		
					} else {
						$mensaje="Ocurrio algun error al subir el archivo. No pudo guardarse.";
					}
				}
			///	echo "que ocurrio".$mensaje;
			
			if ($mensaje=="") {
				$periodo=$this->Periodo_model->PeriodoActivo();
					$data= array(
						'id_usuario'=>$this->session->userdata('id'),
						'id_requisito'=>'20',
						'id_periodo'=>$periodo->id,
					);
				//   var_dump($data);
					if(!$this->Control_requisitos_model->getControl_requisitos($periodo->id,20,$this->session->userdata('id'))){
						$this->Control_requisitos_model->save($data);
						$this->session->set_flashdata("success","Constancia del curso de ampliación o carta de reincorporación Cargada con Éxito.");
						redirect(base_url()."dashboard04/registro_pago/".$this->session->userdata('id'));
					}else{
						$fecha=date("Y-m-d H:i:s");
						$data2= array(
						'fecha_actualizacion'=>$fecha,);
						$retorno=$this->Control_requisitos_model->update($this->session->userdata('id'),$periodo->id,20,$data2);
						//var_dump($retorno);
						$this->session->set_flashdata("warning","El requisito fue actualizado.");
						redirect(base_url()."dashboard04/registro_pago/".$this->session->userdata('id'));
					}
					//var_dump($guarda);
					
			} else {
				

				$this->session->set_flashdata("error",$mensaje);
			    redirect(base_url()."dashboard04/curso_ampliacion");
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
		$fecha_actualizacion = $this->input->post("fecha_actualizacion");

		// validando correo
		$explode = explode("@", $correo);

		if ($explode[1] == "GMAIL.COM" || $explode[1] == "gmail.com" ) {

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
				'fecha_nac' => $fec_nac,
'dactualizacion'=>$fecha_actualizacion
				);
				$data_up  = array(
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
					'fecha_nac' => $fec_nac,
					'dactualizacion'=>$fecha_actualizacion
					);
				//var_dump($data);
			if($no_encontrado!='falso'){
              
					if ($this->Alumno_model->update($no_encontrado,$data_up)) {
						redirect(base_url()."dashboard04/datos1");
					}
					else{
						$this->session->set_flashdata("error","No se pudo guardar la informacion");
						redirect(base_url()."dashboard04/datos");
					}
			}
			else{
					if ($this->Alumno_model->save($data)) {
						redirect(base_url()."dashboard04/datos1");
					}
					else{
						$this->session->set_flashdata("error","No se pudo guardar la informacio");
						redirect(base_url()."dashboard04/datos");
					}

			}
		}else{
				$this->session->set_flashdata("error","No se pudo guardar la informaciòn. Debe registrar un correo GMAIL");
			redirect(base_url()."dashboard04/datos");

		}
	}

	public function direccion_store($id_usuario)
	{
		$no_encontrado = $this->input->post("no_encontrado");
		$id_usuario = $this->input->post("id_usuario");
		$comboestado = $this->input->post("comboestado");
		$combomunicipio = $this->input->post("combomunicipio");
		$comboparroquia = $this->input->post("comboparroquia");
		$fecha=date("Y-m-d H:i:s");
		$data  = array(
			'id_usuario' => $id_usuario, 
			'id_estado' => $comboestado,
			'id_municipio' => $combomunicipio,
			'id_parroquia' => $comboparroquia,
			'quien_actualizo' => $id_usuario,
			'dactualizacion'  => $fecha,
		);

		if($no_encontrado!='falso'){
					if ($this->Direccion_model->update($no_encontrado,$data)) {
						$this->session->set_flashdata("warning","Domicilio actualizado con exito.");
						redirect(base_url()."dashboard04/datos2");
					}
					else{
						$this->session->set_flashdata("error","No se pudo guardar la informacion");
						redirect(base_url()."dashboard04/datos1");
					}
			}
			else{
					if ($this->Direccion_model->save($data)) {
						redirect(base_url()."dashboard04/datos2");
					}
					else{
						$this->session->set_flashdata("error","No se pudo guardar la informacion");
						redirect(base_url()."dashboard04/datos1");
					}

			}
		
		//redirect(base_url()."dashboard04/datos2");
	}

	public function trabajo_store($id_usuario)
{
    // Cargar librerías necesarias
    $this->load->library('upload');
    $this->load->helper('file');
    
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
    
    // ================================================
    // VALIDACIÓN Y SUBIDA DEL CARNET DE TRABAJO
    // ================================================
    $valores_requieren_carnet = array(1, 2, 5, 20, 21, 22);
    $carnet_subido = false;
    $error_carnet = "";
    
    if (in_array($lugar_trabajo, $valores_requieren_carnet)) {
        // Ruta donde se guarda el carnet
        $carnet_path = FCPATH . 'assets/carnet/';
        $nombre_archivo = $id_usuario . '_carnet.jpg';
        $ruta_completa = $carnet_path . $nombre_archivo;
        
        // Verificar si ya existe un carnet registrado
        $carnet_existe = file_exists($ruta_completa);
        
        // Obtener el período activo
        $periodo = $this->Periodo_model->PeriodoActivo();
        
        // Verificar si existe registro en control_requisitos
        $control_requisito = $this->Control_requisitos_model->getControl_requisitos(
            $periodo->id, 
            6, // ID del requisito carnet
            $id_usuario
        );
        
        // Si NO existe carnet en el directorio, es OBLIGATORIO subir uno
        if (!$carnet_existe) {
            // Verificar si se subió un archivo
            if (empty($_FILES['userfile']['name'])) {
                $this->session->set_flashdata("error", "Debe adjuntar el carnet de trabajo o nombramiento (archivo obligatorio).");
                redirect(base_url() . "dashboard04/datos2");
                return;
            }
            
            // Configurar la subida del archivo
            $config['upload_path'] = $carnet_path;
            $config['allowed_types'] = 'jpg|jpeg|png';
            $config['max_size'] = 1024; // 1 MB
            $config['file_name'] = $id_usuario . '_carnet';
            $config['overwrite'] = true;
            
            $this->upload->initialize($config);
            
            // Intentar subir el archivo
            if ($this->upload->do_upload('userfile')) {
                // Archivo subido exitosamente
                $upload_data = $this->upload->data();
                
                // Si el archivo es PNG, convertirlo a JPG
                if ($upload_data['file_ext'] == '.png') {
                    $this->convertir_png_a_jpg($upload_data['full_path']);
                }
                
                // Si el archivo no es JPG pero es imagen válida, renombrar a JPG
                if ($upload_data['file_ext'] != '.jpg' && $upload_data['file_ext'] != '.jpeg') {
                    $ruta_jpg = str_replace($upload_data['file_ext'], '.jpg', $upload_data['full_path']);
                    rename($upload_data['full_path'], $ruta_jpg);
                }
                
                $carnet_subido = true;
                
                // Registrar o actualizar en control_requisitos
                if ($control_requisito == NULL) {
                    // Insertar nuevo registro
                    $data_control = array(
                        'id_usuario' => $id_usuario,
                        'id_requisito' => 6,
                        'id_periodo' => $periodo->id,
                        'fecha_actualizacion' => date("Y-m-d H:i:s")
                    );
                    $this->Control_requisitos_model->save($data_control);
                } else {
                    // Actualizar fecha
                    $data_control = array(
                        'fecha_actualizacion' => date("Y-m-d H:i:s")
                    );
                    $this->Control_requisitos_model->update(
                        $id_usuario,
                        $periodo->id,
                        6,
                        $data_control
                    );
                }
                
            } else {
                // Error al subir el archivo
                $error = $this->upload->display_errors('', '');
                $this->session->set_flashdata("error", "Error al subir el carnet: " . $error);
                redirect(base_url() . "dashboard04/datos2");
                return;
            }
        } else {
            // SI YA EXISTE carnet en el directorio
            // Verificar si el usuario subió uno nuevo para actualizar
            if (!empty($_FILES['userfile']['name'])) {
                // Configurar la subida del nuevo archivo
                $config['upload_path'] = $carnet_path;
                $config['allowed_types'] = 'jpg|jpeg|png';
                $config['max_size'] = 1024;
                $config['file_name'] = $id_usuario . '_carnet';
                $config['overwrite'] = true;
                
                $this->upload->initialize($config);
                
                if ($this->upload->do_upload('userfile')) {
                    // Actualizar carnet exitosamente
                    $upload_data = $this->upload->data();
                    
                    if ($upload_data['file_ext'] == '.png') {
                        $this->convertir_png_a_jpg($upload_data['full_path']);
                    }
                    
                    if ($upload_data['file_ext'] != '.jpg' && $upload_data['file_ext'] != '.jpeg') {
                        $ruta_jpg = str_replace($upload_data['file_ext'], '.jpg', $upload_data['full_path']);
                        rename($upload_data['full_path'], $ruta_jpg);
                    }
                    
                    $carnet_subido = true;
                    
                    // Actualizar fecha en control_requisitos
                    if ($control_requisito != NULL) {
                        $data_control = array(
                            'fecha_actualizacion' => date("Y-m-d H:i:s")
                        );
                        $this->Control_requisitos_model->update(
                            $id_usuario,
                            $periodo->id,
                            6,
                            $data_control
                        );
                    } else {
                        // Si no existe registro, crearlo
                        $data_control = array(
                            'id_usuario' => $id_usuario,
                            'id_requisito' => 6,
                            'id_periodo' => $periodo->id,
                            'fecha_actualizacion' => date("Y-m-d H:i:s")
                        );
                        $this->Control_requisitos_model->save($data_control);
                    }
                    
                } else {
                    // Si hay error al actualizar, solo mostramos warning pero continuamos
                    $error = $this->upload->display_errors('', '');
                    $this->session->set_flashdata("warning", "No se pudo actualizar el carnet: " . $error . " - Se mantiene el anterior.");
                }
            } else {
                // Si ya existe carnet y no se subió uno nuevo, verificar registro en control_requisitos
                if ($control_requisito == NULL) {
                    // Si no existe registro, crearlo
                    $data_control = array(
                        'id_usuario' => $id_usuario,
                        'id_requisito' => 6,
                        'id_periodo' => $periodo->id,
                        'fecha_actualizacion' => date("Y-m-d H:i:s")
                    );
                    $this->Control_requisitos_model->save($data_control);
                }
                $carnet_subido = true;
            }
        }
    }
    // ================================================
    // FIN VALIDACIÓN DEL CARNET
    // ================================================
    
    // Preparar datos para guardar
    if($lugar_trabajo == 1){
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
            'actual' => 1,
            'anno_ingreso' => $ingreso,			
            'estado_circunscripcion'=> $est_circunscripcion,
            'dactualizacion'=> date("Y-m-d H:i:s"),
            'quien_actualizo'=> $this->session->userdata('id')
        );
    } else {
        $data  = array(
            'id_usuario' => $id_usuario, 
            'id_lugar_trabajo' => $lugar_trabajo,
            'cargo' => $cargo_desempena,
            'tel_trabajo' => $telefono_trabajo,
            'jubilado' => $jubilado,
            'id_estado_inscribio' => 24,
            'institucion' => $institucion,
            'direccion_adscripcion' => $direccion,
            'circunscripcion' => '',
            'funciones' => $funciones,
            'actual' => 1,
            'anno_ingreso' => $ingreso,				
            'estado_circunscripcion'=> 0,
            'dactualizacion'=> date("Y-m-d H:i:s"),
            'quien_actualizo'=> $this->session->userdata('id')
        );
    }
    
    $fecha_actual = date("Y-m-d");
    $hora_actual = date("H:i:s");
    
    if(($this->session->userdata('rol')==5 or $this->session->userdata('rol')==8)){
        if($no_encontrado != 'falso'){
            if ($this->Trabajo_model->update($no_encontrado, $data)) {
                if ($this->session->userdata("planilla") == 1 || $this->session->userdata("inscripcion") == 0) {
                    redirect(base_url() . "consultas/ver_planilla_cedula");
                } elseif($this->session->userdata("inscripcion") == 1) { 
                    $valores = array(1,2,5,20,21,22);
                    if($this->session->userdata("inscripcion") == 1 and $tiempo_pre->fecha_inicio <= $fecha_actual) {
                        // Verificar que el carnet esté registrado
                        $periodo = $this->Periodo_model->PeriodoActivo();
                        $control_requisito = $this->Control_requisitos_model->getControl_requisitos(
                            $periodo->id, 
                            6, 
                            $id_usuario
                        );
                        
                        if(in_array($lugar_trabajo, $valores) && ($carnet_subido || $control_requisito != NULL)) {
                            redirect(base_url() . "dashboard04/inscripcion");
                        } else {
                            redirect(base_url() . "dashboard04/inscripcion");
                        }
                    } else {
                        redirect(base_url() . "dashboard04/datos2");
                    }
                }						
            } else {
                $this->session->set_flashdata("error", "No se pudo guardar la informacion");
                redirect(base_url() . "dashboard04/datos2");
            }
        } else {
            if ($this->Trabajo_model->save($data)) {
                if ($this->session->userdata("planilla") == 1 and $this->session->userdata("inscripcion") == 0) {
                    redirect(base_url() . "consultas/ver_planilla_cedula");
                } else {
                    redirect(base_url() . "dashboard04/inscripcion");
                }
            } else {
                $this->session->set_flashdata("error", "No se pudo guardar la informacion");
                redirect(base_url() . "dashboard04/datos2");
            }
        }
    }
}

// ================================================
// FUNCIÓN AUXILIAR PARA CONVERTIR PNG A JPG
// ================================================
private function convertir_png_a_jpg($ruta_png)
{
    if (!file_exists($ruta_png)) {
        return false;
    }
    
    try {
        $imagen = imagecreatefrompng($ruta_png);
        $ruta_jpg = str_replace('.png', '.jpg', $ruta_png);
        imagejpeg($imagen, $ruta_jpg, 90);
        imagedestroy($imagen);
        unlink($ruta_png);
        return true;
    } catch (Exception $e) {
        log_message('error', 'Error al convertir PNG a JPG: ' . $e->getMessage());
        return false;
    }
}

// ================================================
// FUNCIÓN PARA VERIFICAR SI EXISTE CARNET (para AJAX)
// ================================================
public function verificar_imagen_carnet()
{
    $this->output->set_content_type('application/json');
    
    $id_usuario = $this->input->post('id_usuario');
    if (empty($id_usuario)) {
        $id_usuario = $this->session->userdata('id');
    }
    
    // Verificar existencia del archivo
    $ruta_imagen = FCPATH . 'assets/carnet/' . $id_usuario . '_carnet.jpg';
    $existe_archivo = file_exists($ruta_imagen);
    
    // También verificar si tiene registro en control_requisitos
    $periodo = $this->Periodo_model->PeriodoActivo();
    $control_requisito = $this->Control_requisitos_model->getControl_requisitos(
        $periodo->id, 
        6, 
        $id_usuario
    );
    
    $existe_registro = ($control_requisito != NULL);
    
    echo json_encode([
        'existe' => ($existe_archivo && $existe_registro)
    ]);
}

	

	//* mostrar la oferta academica de la inscripcion periodo vigente/*
	public function inscripcion2()
	{
		$id_usuario = $this->session->userdata("id");
		$lugartrabajo = $this->Trabajo_model->Lugar_trabajo($id_usuario);
		$datos_str = $this->input->post("str");

		$idprograma =  $this->session->userdata("idprograma");
		$periodo = $this->Periodo_model->PeriodoActivo();
		if ($datos_str !="") {
			
			$data = array(
				'periodo' =>  $this->Periodo_model->PeriodoActivo(),
				'datos_str' => $datos_str, 
				'listado' => $this->Inscripcion_model->list_preinscripcion($datos_str,$periodo->id),
				
				
				'lista_trabajo' =>$this->Lugar_trabajo_model->valor_unidad($lugartrabajo->id_lugar_trabajo),
			);
		//	var_dump($data);

			$data3 = array('ocupados' => $this->Inscripcion_model->list_preinscripcion($datos_str,$periodo->id));
			$data2 = array(
			'tiempo_pre' => $this->Tiempo_preinscripcion_model->gettiempo_preinscripcion(),
			'periodo'=> $this->Periodo_model->PeriodoActivo(),
			);
			
			
			$this->load->view('layouts/header');
			$this->load->view('layouts/sidebar',$data2);
			$this->load->view('participante/inscripcion/listado2',$data);
			$this->load->view('layouts/footer');
			}else{

				$this->session->set_flashdata("error","Debe seleccionar al menos una materia");
				redirect(base_url()."dashboard04/inscripcion/");
				$data = array(
					'listado' => $this->Inscripcion_model->list_inscripcion($periodo->id,$idprograma) 
				);				
				$data2 = array( 'tiempo_pre' => $this->Tiempo_preinscripcion_model->gettiempo_preinscripcion(),
				);
			$this->load->view('layouts/header');
			$this->load->view('layouts/sidebar',$data2);
			$this->load->view('participante/inscripcion/listado',$data);
			$this->load->view('layouts/footer');
		}
	}
/*actaulizado 01-09-2022*/
	public function registro_materias($id_usuario)
	{
		$datos_str = $this->input->post("datos_str");
		 $id_usuario = $this->input->post("id_usuario");
		 $id_periodo = $this->input->post("periodo");
		

		if (!$this->Materias_preinscrita_model->verificar($id_usuario,$id_periodo)) {
			?> <script>//alert( "NO hay materias");</script>;<?php
			$clausula=$this->Control_requisitos_model->getControl_requisitos($periodo->id,5,$id_usuario) ;

			$datos = trim($datos_str);
			$strArray = explode(',',$datos);
			foreach ($strArray as $cod_oferta) {
			   $data  = array(
			   'id_usuario' => $id_usuario, 
			   'id_oferta_academica' => $cod_oferta,
			   'id_periodo' => $id_periodo,
			   'status' =>1,
			   'nenabled' =>1,
			   'quien_registro'=> $this->session->userdata("id")
			   );
				if ($datos_str !="") {

		 			
						$this->Materias_preinscrita_model->save($data);
						$data_clausula=array(
							'fecha_actualización'=>date('Y-m-d h:m:s')
						);
						if($clausula>0){
							$this->Control_requisitos_model->update($id,$id_periodo,5,$data_clausula);						
						}
						$data3 = array('ocupados' => $this->Inscripcion_model->list_preinscripcion($cod_oferta,$id_periodo));	
						//var_dump($data3);
						if(!empty($data3['ocupados'])):
						   foreach($data3['ocupados'] as $data3['ocupados']):
						   if ($data3['ocupados']->cupos >=$data3['ocupados']->cupos_ocupados ){
							   $id=$data3['ocupados']->id;
							   $data3['ocupados']->cupos_ocupados ++;
							  $data4  = array('cupos_ocupados'=>$data3['ocupados']->cupos_ocupados);
							   $this->Oferta_academica_model->update_oferta_cupos($id,$data4);
							   }
						   endforeach;
						
						endif;
				}	else{
					$this->session->set_flashdata("error","No se pudo guardar la informacion");
					redirect(base_url()."dashboard04/inscripcion");
				}	          
			}
			redirect(base_url()."dashboard04/registro_pago/$id_usuario");	

		}else{
			?> <script>//alert( "hay materias");</script><?php
			$datos = trim($datos_str);
			$strArray = explode(',',$datos);
 $fecha=date('Y-m-d h:m:s');
			$data2=array(
				'status' =>0,
				'nenabled' =>0,
				'quien_actualizo'=> $this->session->userdata("id"),
				'fecha_actualizacion'=> $fecha

			);

			if($this->Materias_preinscrita_model->update_materia($id_usuario,$id_periodo, $data2)){
				//echo "inabilito inscritas antes";				
					foreach ($strArray as $cod_oferta) {
					//	var_dump($cod_oferta);
						$data3 = array(
							'id_usuario' => $id_usuario, 
							'id_oferta_academica' => $cod_oferta,
							'id_periodo' => $id_periodo,
							'status' =>1,
							'nenabled' =>1,
							'quien_registro'=> $this->session->userdata("id")

							);
						$data4=array(
							'status' =>1,
							'nenabled' =>1,
							'quien_actualizo'=> $this->session->userdata("id"),
							'fecha_actualizacion'=> $fecha
						);
				
						
							if($this->Materias_preinscrita_model->verificar_pre_incritas($id_usuario,$id_periodo,$cod_oferta)){
							//	echo " actualizo registro";		
								$this->Materias_preinscrita_model->update_materia_activar($id_usuario,$id_periodo,$cod_oferta,$data4);							
								
							
								
							}else{
								//echo "creo registro";		
								$this->Materias_preinscrita_model->save($data3);
								
							}

						
					}
					$data_clausula=array(
						'fecha_actualización'=>date('Y-m-d h:m:s')
					);
					if($clausula>0){
						$this->Control_requisitos_model->update($id,$id_periodo,5,$data_clausula);						
					}
					redirect(base_url()."dashboard04/registro_pago/$id_usuario");	
			}else{
				$this->session->set_flashdata("error","No se pudo guardar la informacion Update materia");
				redirect(base_url()."dashboard04/inscripcion");
			}
		}
	
	
		


	}

	public function registro_pago($id_usuario )
{
    // Obtener período activo
    $id_periodo = $this->Periodo_model->PeriodoActivo();
    
    // Validar que haya un período activo
    if (empty($id_periodo)) {
        $this->session->set_flashdata('error', 'No hay un período académico activo.');
        redirect('dashboard04/inscripcion');
        return;
    }
    
    // Validar que el usuario tenga un programa asignado en sesión
    $id_programa = $this->session->userdata("idprograma");
    if (empty($id_programa)) {
        $this->session->set_flashdata('error', 'No se ha seleccionado un programa de estudio.');
        redirect('dashboard04/home');
        return;
    }
    
    // Obtener lugar de trabajo
    $lugartrabajo = $this->Trabajo_model->Lugar_trabajo($id_usuario);
    
    // Validar lugar de trabajo
    if (empty($lugartrabajo)) {
        $this->session->set_flashdata('error', 'No se ha registrado su lugar de trabajo. Contacte a la coordinación.');
        redirect('dashboard04/home');
        return;
    }
    
    // Validar roles permitidos
    $rol_usuario = $this->session->userdata("rol");
    if (!in_array($rol_usuario, [5, 8])) {
        $this->session->set_flashdata('error', 'No tiene permisos para acceder a esta sección.');
        redirect('dashboard04/home');
        return;
    }
    
    // ================================================
    // DATOS PARA LA VISTA DE PAGO (si aplica)
    // ================================================
    $data = array(
        'estado_estudio' => $this->Trabajo_model->getListaTrabajo($id_usuario, 1),
        'datos_alumno' => $this->Alumno_model->getListaAlumno($id_usuario),
        'list_registro' => $this->Materias_preinscrita_model->lista_preinscritas_pago($id_usuario),
        'lista_trabajo' => $this->Lugar_trabajo_model->valor_unidad($lugartrabajo->id_lugar_trabajo),
        'list_banco' => $this->Banco_model->getBanco(),
        'programas' => $this->Programa_model->getProgramaAprobado($id_programa),
        'periodo' => $id_periodo,
        'programa_preinscrito' => $this->Materias_preinscrita_model->lista_programas_preinscritas($id_usuario, $id_periodo->id),
        'reincorporaciones' => $this->Reincorporaciones_model->buscar_reincorporacion($id_usuario, $id_periodo->id),
        'aranceles' => $this->Aranceles_model->getAranceles(),
        'lapso' => $this->Tiempo_preinscripcion_model->gettiempo_preinscripcion(),
        // 'exonerados' => $this->Exonerados_model->exonerados_todo_programa($id_usuario, $id_periodo->id),
    );
    
    // ================================================
    // DATOS PARA EL SIDEBAR
    // ================================================
    $data2 = array(
        'tiempo_pre' => $this->Tiempo_preinscripcion_model->gettiempo_preinscripcion(),
        'periodo' => $id_periodo,
    );
    
    // ================================================
    // CARGAR VISTAS
    // ================================================
    $this->load->view('layouts/header');
    $this->load->view('layouts/sidebar', $data2);
    
    // ================================================
    // VERIFICAR PREINSCRIPCIÓN
    // ================================================
    $inscritas = $this->Materias_preinscrita_model->verificar($id_usuario, $id_periodo->id);
    
    if (!$inscritas) {
        // No ha registrado unidades curriculares
        echo '<script>
            alert("Usted debe registrar las unidades curriculares de este período de preinscripción académico.");
            location.assign("' . base_url() . 'dashboard04/inscripcion");
        </script>';
        $this->load->view('layouts/footer');
        return;
    }
    
    // ================================================
    // VERIFICAR SI YA REGISTRÓ PAGO
    // ================================================
    $pago_existente = $this->Registro_pago_model->registro_pago($id_usuario);
    
    if ($pago_existente === false) {
        // NO ha registrado pago → Mostrar cláusulas
        $data_clausulas = array(
            'datos_alumnos' => $this->Alumno_model->getListaAlumno($id_usuario),
            'materiasP' => $this->Materias_preinscrita_model->preincritas_clausulas($id_usuario, $id_periodo->id, 1),
            'materiasV' => $this->Materias_preinscrita_model->preincritas_clausulas($id_usuario, $id_periodo->id, 2),
            'materiasSP' => $this->Materias_preinscrita_model->preincritas_clausulas($id_usuario, $id_periodo->id, 3),
            'materiasTG' => $this->Materias_preinscrita_model->preincritas_clausulas($id_usuario, $id_periodo->id, 4),
            'modalidad' => $this->Materias_preinscrita_model->preincritas_clausulas_modalidad($id_usuario, $id_periodo->id)
        );
        
        // Cargar vista de cláusulas
        $this->load->view('participante/datos/clausula_online', $data_clausulas);
        
    } else {
        // YA registró pago → Redirigir a comprobante
        echo '<script>
            alert("Usted ya registró su pago para este período de inscripción.");
            location.assign("' . base_url() . 'dashboard04/ver_pago/' . $id_usuario . '");
        </script>';
    }
    
    $this->load->view('layouts/footer');
}

	public function valor_pago()
	 {
	 $id_periodo = $this->Periodo_model->PeriodoActivo();
	  if($this->input->post('str'))
	  {
	   echo $this->Inscripcion_model->list_preinscripcion($this->input->post('str'),$id_periodo->id);
	  }

	 }
	
/*Actualizado 31-03-2022*/
	public function proceso()
	{
		if($this->session->userdata("inscripcion")==1){
		$id_usuario = $this->session->userdata("id");
		 $idprograma=$this->session->userdata("idprograma");
		 $rol=$this->session->userdata("rol");
//		$idprograma = explode(",", $idprograma);

		//var_dump($idprograma);
		
		$id_periodo = $this->Periodo_model->PeriodoActivo();
		$data = array(
		'actualizar' => $this->Trabajo_model->RegistradoTrabajo($id_usuario),
		'actualizar_datos' => $this->Alumno_model->getListaAlumno_actualizado($id_usuario),
		'actualizar_direccion' => $this->Direccion_model->getListadireccion_actualizado($id_usuario),
		'actualizar_trabajo' => $this->Trabajo_model->getListaTrabajo_actualizado($id_usuario),
		'materias' => $this->Materias_preinscrita_model->RegistradoMateria($id_usuario,$id_periodo->id),
		'pago' => $this->Registro_pago_model->RegistradoPago($id_usuario,$id_periodo->id),
		'pago_aspirante' => $this->Registro_pago_model->registro_pago($id_usuario),
		'result_conciliado' => $this->Registro_pago_model->ConciliacionPago($id_usuario,$id_periodo->id),
		'periodo' => $this->Periodo_model->PeriodoActivo(),
		'estadoconciliacion' => $this->Registro_pago_model->Verificacion_conciliacion($id_usuario,$id_periodo->id),
		'revicion_academica' => $this->Materias_preinscrita_model->Revicion_academica($id_usuario,$id_periodo->id),
		'revision_documentos' => $this->Registro_pago_model->Revision_documentos($id_usuario,$id_periodo->id),
		'programa_aprobado'  => $this->Materias_preinscrita_model->lista_programas_preinscritas($id_usuario,$id_periodo->id),
		'requisito'  => $this->Control_requisitos_model->getControl_requisitos1($id_periodo->id,$id_usuario),
		'clausula'  => $this->Control_requisitos_model-> getControl_requisitos($id_periodo->id,5,$id_usuario),
		//'curso'=>$this->Control_requisitos_model->getControl_requisitos($id_periodo->id,20,$id_usuario) 
		);
		
		$data2 = array(
			'tiempo_pre' => $this->Tiempo_preinscripcion_model->gettiempo_preinscripcion(),
			'periodo'=> $this->Periodo_model->PeriodoActivo(),
'inscripcion'=>$this->Materias_preinscrita_model->RegistradoMateria($id_usuario,$id_periodo->id),
		);
	//echo count($data3);
	
		$this->load->view('layouts/header');
		$this->load->view('layouts/sidebar',$data2);
		if ($rol==5 or $rol==8 ){
			$this->load->view('participante/datos/list_proceso',$data);
	
		}
		
		$this->load->view('layouts/footer');
	}else{
		$this->load->view('layouts/header');
			$this->load->view('layouts/sidebar', $data2);
			$this->load->view('layouts/proceso_cerrado', $data); // cuando no ha cargado los datos básicos
			$this->load->view('layouts/footer');
	}
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
				$mensaje.=$tipo_archivo." <strong>El formato del archivo es invalido. La imagen debe tener el formato: .gif, .jpg o .png, .pdf</strong>";
			} else if (($tamano_archivo > 1048576)) { // excede el tama�o permitido
				$mensaje="<strong>El archivo no puede exceder de 1 Mb, el archivo que intenta cargar tiene un tama&ntilde;o de: ".number_format($tamano_archivo/1048576,2)." Mb </strong><br/> Seleccione otra foto e intente de nuevo";
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
				$fecha=date('Y-m-d H:m:s');
				if($nro_referencia=='00187046' or $nro_referencia=='41052855 '){
					$this->session->set_flashdata("error","El numero de referencia bancaria coincide con el número de cuenta de la FENFMP ");
					redirect(base_url()."dashboard04/registro_pago/".$this->session->userdata('id'));
				}else{
					if($this->session->userdata("rol")==7)$aspirante='1';
					if($this->session->userdata("rol")==5 or $this->session->userdata("rol")==8)$aspirante='0';
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
					$data2  = array(
						'reg_pago' => 1,
						'quien_actualizo'=> $this->session->userdata("id"),
						'fecha_actualizacion'=> $fecha

					);

			if (!$this->Registro_pago_model->VerificarRegistro($id_usuario,$id_periodo->id)) {
						if($this->Registro_pago_model->save($data)){
								$this->Materias_preinscrita_model->update_materia($id_usuario,$id_periodo,$data2);
								?>
								<script> alert ("Pago Registrado Exitosamente.");
								location.assign("<?php echo base_url(); ?>dashboard04/proceso");   
								</script>
								<?php 
							}else{
								$this->session->set_flashdata("error","Error al guardar la información.");
								redirect(base_url()."dashboard04/registro_pago/".$this->session->userdata('id'));
						}
					}else{
						$this->session->set_flashdata("warning","El registro del pago ya fue registrado");
						redirect(base_url()."dashboard04/proceso");
					}			
				}
			}else{
				$this->session->set_flashdata("error",$mensaje);
					redirect(base_url()."dashboard04/registro_pago/".$this->session->userdata('id'));
			}
		
	}
	
	public function materiaspdf()
	{
		$id_usuario = $this->session->userdata("id");
		$id_periodo = $this->Periodo_model->PeriodoActivo();
		$data = array(
		'actualizar' => $this->Trabajo_model->RegistradoTrabajo($id_usuario),
		'materias' => $this->Materias_preinscrita_model->RegistradoMateria($id_usuario,$id_periodo->id),
		'pago' => $this->Registro_pago_model->RegistradoPago($id_usuario,$id_periodo->id),
		'result_conciliado' => $this->Registro_pago_model->ConciliacionPago($id_usuario,$id_periodo->id),
		'periodo' => $this->Periodo_model->PeriodoActivo(),
		'estadoconciliacion' => $this->Registro_pago_model->Verificacion_conciliacion($id_usuario,$id_periodo->id),
		'revicion_academica' => $this->Materias_preinscrita_model->Revicion_academica($id_usuario,$id_periodo->id),
		);
		$data2 = array(
			'tiempo_pre' => $this->Tiempo_preinscripcion_model->gettiempo_preinscripcion(),
			'periodo' => $this->Periodo_model->PeriodoActivo(),
		);
		
		$this->load->view('layouts/header');
		$this->load->view('layouts/sidebar',$data2);
		$this->load->view('participante/datos/materiaspdf',$data);
		$this->load->view('layouts/footer');
	}

	public function registrar_clausula($id_usuario)
	{
		$id_periodo = $this->Periodo_model->PeriodoActivo();
		$id_usuario = $this->session->userdata("id");
		$id_programa = $this->session->userdata("idprograma");
		$lugartrabajo = $this->Trabajo_model->Lugar_trabajo($id_usuario);
		$data = array(
			//'datos_str' => $datos_str, 
		'estado_estudio' => $this->Trabajo_model->getListaTrabajo($id_usuario,1),
		'datos_alumno' => $this->Alumno_model->getListaAlumno($id_usuario),
		'list_registro' => $this->Materias_preinscrita_model->lista_preinscritas_pago($id_usuario),
		'lista_trabajo' =>$this->Lugar_trabajo_model->valor_unidad($lugartrabajo->id_lugar_trabajo),
		'list_banco' => $this->Banco_model->getBanco(),
		'programas' => $this->Programa_model->getProgramaAprobado($id_programa),
		'periodo' => $this->Periodo_model->PeriodoActivo(),
		'programa_preinscrito'=>$this->Materias_preinscrita_model->lista_programas_preinscritas1($id_usuario,$id_periodo->id),
		'reincorporaciones'=>$this->Reincorporaciones_model->buscar_reincorporacion($id_usuario,$id_periodo->id),
		'aranceles'=>$this->Aranceles_model->getAranceles(),
		'lapso' => $this->Tiempo_preinscripcion_model->gettiempo_preinscripcion(),
		'exonerados'=>$this->Exonerados_model->buscar_exonerados($id_usuario,$id_periodo->id),

		);
		$data2 = array(
		'tiempo_pre' => $this->Tiempo_preinscripcion_model->gettiempo_preinscripcion(),
		'periodo'=> $this->Periodo_model->PeriodoActivo(),
		);
		$acepto_presencial=$this->input->post('acepto_presencial'); //echo "<br>";
		 $acepto_virtual=$this->input->post('acepto_distancia');
		 $acepto_semi=$this->input->post('acepto_semip');
		 $acepto_teg=$this->input->post('acepto_teg');
		$periodo= $this->Periodo_model->PeriodoActivo();
		$clausula=$this->Materias_preinscrita_model->preincritas_clausulas_modalidad($id_usuario,$periodo->id);
	//	var_dump($clausula['trimestre']);
		//var_dump($clausula);
		$i=0;$valida=0;
		
		foreach($clausula as $clausula){
			//echo "clausula->modalidad->".$clausula->modalidad; echo "<br>";
			$i++;
			if ($acepto_presencial=="1" and $clausula->modalidad==1) {
			$valida++;
			}
			if ($acepto_virtual=="2" and $clausula->modalidad==2) {
				$valida++;
			}
			if ($acepto_semi=="3" and $clausula->modalidad==3) {
				$valida++;
			}
			if ($acepto_teg=="4" and ($clausula->trimestre=='TEG' or $clausula->trimestre=='TG')) {
				$valida++;
			}
		}
		//echo $i; echo '<br>';
		//echo $valida;
		if($i==$valida and $valida>0){
				$periodo=$this->Periodo_model->PeriodoActivo();
					$datac= array(
						'id_usuario'=>$this->session->userdata('id'),
						'id_requisito'=>'5',
						'id_periodo'=>$periodo->id,
					);
				// var_dump($data);
					if(!$this->Control_requisitos_model->getControl_requisitos($periodo->id,5,$this->session->userdata('id'))){
						$this->Control_requisitos_model->save($datac);
						//$this->session->set_flashdata("success","Cláusula Compromisoria Cargada con Éxito.");
				
					}else{
						$fecha=date("Y-m-d H:i:s");
						$data2c= array(
						'fecha_actualizacion'=>$fecha,);
						$retorno=$this->Control_requisitos_model->update($this->session->userdata('id'),$periodo->id,5,$data2c);
						//var_dump($retorno);
						//$this->session->set_flashdata("warning","La cláusula de compromiso ha sido actualizada.");
				
					}
					//var_dump($guarda);
					$this->load->view('layouts/header');
					$this->load->view('layouts/sidebar',$data2);
					$this->load->view('participante/inscripcion/list_registro_pago',$data);
					$this->load->view('layouts/footer');
				
			} else {
				$this->session->set_flashdata("error","Debe hacer clic en el checklist <b>Aceptar los términos y condiciones de la cláusula compromisoria</b> de cada una de las modalidades preinscritas.");
				redirect(base_url()."dashboard04/registro_pago/$id_usuario");
			}
		
	}
	public function inscripcion()
	{
		
		// 1. Captura de datos de sesión y modelos
		$id_usuario = $this->session->userdata("id");
		$idprograma = $this->session->userdata("idprograma");
		$periodo = $this->Periodo_model->PeriodoActivo();
		$rol = $this->session->userdata("rol");
		$trimestre_raw = trim($this->session->userdata("trimestre"));
		$modalidad = $this->session->userdata("modalidad");
		$seccion = $this->session->userdata("seccion");
		
		$datos_alumno = $this->Alumno_model->getListaAlumno($id_usuario);
		$cedula = $datos_alumno->cedula;
	
		// ================================================
		// VALIDACIÓN: Verificar si el trabajo está actualizado
		// ================================================
		$tiempo_pre = $this->Tiempo_preinscripcion_model->gettiempo_preinscripcion();
		$trabajo_actualizado = false;
		
		// Obtener datos del trabajo del usuario
		$datos_trabajo = $this->Trabajo_model->getTrabajoActual($id_usuario);
		
		if ($datos_trabajo) {
			// Verificar si la fecha de actualización del trabajo es posterior a la fecha de inicio del período
			$fecha_actualizacion_trabajo = date('Y-m-d', strtotime($datos_trabajo->dactualizacion));
			$fecha_inicio_periodo = date('Y-m-d', strtotime($tiempo_pre->fecha_inicio));
			
			if ($fecha_actualizacion_trabajo >= $fecha_inicio_periodo) {
				$trabajo_actualizado = true;
			}
		}
		
		// Si el trabajo NO está actualizado, mostrar mensaje de error
		if (!$trabajo_actualizado) {
			$data2 = array(
				'tiempo_pre' => $tiempo_pre,
				'periodo' => $periodo,
			);
			$data3 = array(
				'mensaje' => 'Debe actualizar sus datos laborales antes de realizar la inscripción.'
			);
			
			$this->load->view('layouts/header');
			$this->load->view('layouts/sidebar', $data2);
			$this->load->view('participante/inscripcion/mensaje_trabajo_no_actualizado', $data3);
			$this->load->view('layouts/footer');
			return;
		}
		// ================================================
		// FIN VALIDACIÓN
		// ================================================
	
		// Inicializamos el contenedor principal
		$data = [
			'periodo' => $periodo,
			'listado' => []
		];
	
		// 2. Procesamiento de Oferta Académica según Rol
		$mostrar_lineas = true; // Variable de control lineas de investigacion 
		switch ($rol) {
			case 8: // Nuevos Ingresos
				$trimestre_ni = 'I TRIMESTRE';
				$oferta = $this->Inscripcion_model->list_inscripcion_nuevo_ingreso($periodo->id, $idprograma, $trimestre_ni, $modalidad, $seccion);
				$data['listado'] = $oferta; 
				break;
	
			case 5: // Estudiantes Regulares
				$trimestres = explode(',', strtoupper($trimestre_raw));
	
				foreach ($trimestres as $t) {
					$t = trim($t);
					if (empty($t)) continue;
	
					switch ($t) {
						case 'INS':
							$oferta_ins = $this->Inscripcion_model->list_inscripcion_solo_inscripcion($periodo->id, $idprograma, $modalidad, $seccion);
							$data['listado'] = array_merge($data['listado'], $oferta_ins);
							break;
						case 'TEG':
							$mostrar_lineas = false;
							$oferta_teg = $this->Inscripcion_model->list_inscripcion_solo_teg($periodo->id, $idprograma);
							$data['listado'] = array_merge($data['listado'], $oferta_teg);
							break;
						case 'PERM':
							$mostrar_lineas = false;
							$oferta_perm = $this->Inscripcion_model->list_inscripcion_permanencia($periodo->id, $idprograma, $modalidad);
							$data['listado'] = array_merge($data['listado'], $oferta_perm);
							break;
						default:
							$res_regular = $this->oferta_academica_regular($periodo->id, $idprograma, $modalidad, $t, $seccion, $datos_alumno);
							$data['listado'] = array_merge($data['listado'], $res_regular['listado']);
							break;
					}
				}
				break;
		}

		// ================================================
		// NUEVA VALIDACIÓN: Verificar si el trimestre es "V TRIMESTRE"
		// ================================================
		$trimestre_upper = strtoupper(trim($trimestre_raw));
		$es_v_trimestre = ($trimestre_upper === 'V TRIMESTRE');
		
		// Si es V TRIMESTRE, ocultar líneas de investigación
		if ($es_v_trimestre) {
			$mostrar_lineas = false;
		}
		// ================================================
		// FIN NUEVA VALIDACIÓN
		// ================================================
	
		// 4. LÓGICA ÚNICA PARA LÍNEAS DE INVESTIGACIÓN
		if ($mostrar_lineas) {
			$id_lineas_final = [];
			$tipos_prog = $this->Programa_model->getProgramaAprobado($idprograma);
			
			foreach ($tipos_prog as $tp) {
				if ($tp->tipo_programa == '1') {
					if (!in_array(27, $id_lineas_final)) $id_lineas_final[] = 27;
				} else {
					if (!in_array(28, $id_lineas_final)) $id_lineas_final[] = 28;
				}
			}
	
			// Regla de negocio: Si tiene ambas en su inscripción, priorizar Maestría (ID 28)
			if (in_array(27, $id_lineas_final) && in_array(28, $id_lineas_final)) {
				$id_lineas_final = [28];
			}
	
			if (!empty($id_lineas_final)) {
				$oferta_lineas = $this->Inscripcion_model->list_inscripcion_linea_investigacion($periodo->id, $id_lineas_final);
				$data['listado'] = array_merge($data['listado'], $oferta_lineas);
			}
		}
		
		$data2 = array(
			'tiempo_pre' => $tiempo_pre,
			'periodo' => $periodo,
		);
		
		$data3 = array(
			'materias' => $this->Materias_preinscrita_model->mensaje_materias_preinscritas_aprobadas($id_usuario, $periodo->id),
		);
	
		// Verificar si tiene trabajo registrado
		if ($trabajo_actualizado) {
			$clausula = $this->Control_requisitos_model->getControl_requisitos($periodo->id, 5, $id_usuario);
			
			if ($this->Registro_pago_model->registro_pago($id_usuario)) {
				$this->load->view('layouts/header');
				$this->load->view('layouts/sidebar', $data2);
				$this->load->view('participante/inscripcion/mensaje3', $data3); // cuando ya se inscribió
				$this->load->view('layouts/footer');
			} else {
				$this->load->view('layouts/header');
				$this->load->view('layouts/sidebar', $data2);
				$this->load->view('participante/inscripcion/listado', $data); // cuando no ha inscrito
				$this->load->view('layouts/footer');
			}
		} else {
			$this->load->view('layouts/header');
			$this->load->view('layouts/sidebar', $data2);
			$this->load->view('participante/inscripcion/mensaje2', $data); // cuando no ha cargado los datos básicos
			$this->load->view('layouts/footer');
		}
	
	}
	
	public function oferta_academica_regular($periodo, $idprograma, $modalidad, $trimestre, $seccion, $datos_alumno) 
	{
		$oferta = $this->Inscripcion_model->list_inscripcion($periodo, $idprograma, $modalidad, $trimestre, $seccion);
		$cedula = $datos_alumno->cedula;
		
		$data = ['listado' => []];
	
		foreach ($oferta as $item) {
			$id_pensum_oferta = $item->id_pensum;
			$vista = 0;
			
			$otro_pensum = $this->Pensum_model->getnombrePensum_($id_pensum_oferta);
			$ids_a_verificar = array_filter([$id_pensum_oferta, $otro_pensum ? $otro_pensum->pensun_ant : null]);
	
			$notas = $this->Notas_academica_model->getBuscarnotas_unidad($cedula, $ids_a_verificar);
			
			$aprobada_ya = false;
			foreach ($notas as $n) {
				if ($n->nota_final >= 15) {
					$aprobada_ya = true;
					break;
				}
			}
	
			// Si no la ha aprobado, verificamos prelaciones
			if (!$aprobada_ya) {
				$puede_verla = true;
				foreach ($ids_a_verificar as $id_p) {
					$prelaciones = $this->Prelacion_model->getlistPrelacion($id_p);
					
					if (count($prelaciones) > 0) {
						$contador_aprobadas = 0;
						foreach ($prelaciones as $prela) {
							$ids_prela = array_filter([$prela->id_pensum, $prela->pensun_ant]);
							$notas_prela = $this->Notas_academica_model->getBuscarnotas_unidad($cedula, $ids_prela);
							
							foreach ($notas_prela as $np) {
								if ($np->nota_final >= 15) {
									$contador_aprobadas++;
									break;
								}
							}
						}
						// Si no aprobó todas las que la prelan, no puede verla
						if ($contador_aprobadas < count($prelaciones)) {
							$puede_verla = false;
							break;
						}
					}
				}
	
				if ($puede_verla) {
					$materia_valida = $this->Oferta_academica_model->getBuscaroferta_aprobada($item->id);
					if ($materia_valida) $data['listado'][] = $materia_valida;
				}
			}
		}
	
		return $data;
	}




		
		public function ver_pago($id_usuario)
		{
			// Obtener período activo
			$id_periodo = $this->Periodo_model->PeriodoActivo();
    
			// Validar que haya un período activo
			if (empty($id_periodo)) {
				$this->session->set_flashdata('error', 'No hay un período académico activo.');
				redirect('dashboard04/inscripcion');
				return;
			}
			
			// Validar que el usuario tenga un programa asignado en sesión
			$id_programa = $this->session->userdata("idprograma");
			if (empty($id_programa)) {
				$this->session->set_flashdata('error', 'No se ha seleccionado un programa de estudio.');
				redirect('dashboard04/home');
				return;
			}
			
			// Obtener lugar de trabajo
			$lugartrabajo = $this->Trabajo_model->Lugar_trabajo($id_usuario);
			
			// Validar lugar de trabajo
			if (empty($lugartrabajo)) {
				$this->session->set_flashdata('error', 'No se ha registrado su lugar de trabajo. Contacte a la coordinación.');
				redirect('dashboard04/home');
				return;
			}
			
			// Validar roles permitidos
			$rol_usuario = $this->session->userdata("rol");
			if (!in_array($rol_usuario, [5, 8])) {
				$this->session->set_flashdata('error', 'No tiene permisos para acceder a esta sección.');
				redirect('dashboard04/home');
				return;
			}
			
			
			$data = array(
				'datos_alumno' => $this->Alumno_model->getListaAlumno($id_usuario),
				'list_registro' => $this->Materias_preinscrita_model->lista_preinscritas_pagadas($id_usuario),
				'lista_trabajo' => $this->Lugar_trabajo_model->valor_unidad($lugartrabajo->id_lugar_trabajo),
				'periodo' => $id_periodo,
				'aranceles' => $this->Aranceles_model->getAranceles(),
				'reincorporaciones' => $this->Reincorporaciones_model->buscar_reincorporacion($id_usuario, $id_periodo->id),
				'programa_preinscrito' => $this->Materias_preinscrita_model->lista_programas_preinscritas($id_usuario, $id_periodo->id),
				'lapso' => $this->Tiempo_preinscripcion_model->gettiempo_preinscripcion(),
				'exonerados' => $this->Exonerados_model->exonerados_todo_programa($id_usuario, $id_periodo->id),
				'pago' => $this->Registro_pago_model->VerificarRegistro_pagotodos($id_usuario, $id_periodo->id),
			);
			
			$this->load->view('layouts/header');
			$this->load->view('layouts/sidebar', $data);
			$this->load->view('participante/inscripcion/ver_registro_pago', $data);
			$this->load->view('layouts/footer');
		}


	
}







