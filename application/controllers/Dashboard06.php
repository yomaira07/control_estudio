<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard06 extends CI_Controller { // Controlador Docente

	public function __construct(){
		parent::__construct();
		$this->load->model("Usuarios_model");
		$this->load->model("Tiempo_preinscripcion_model");
		$this->load->model("Periodo_model");
		$this->load->model("Pensum_model");
		$this->load->model("Programa_model");
		$this->load->model("Trimestre_model");
		$this->load->model("Docente_model");
		$this->load->model("Sexo_model");
		$this->load->model("Estado_civil_model");
		$this->load->model("Codigo_tel_model");
		$this->load->model("Estado_model");
		$this->load->model("Municipio_model");
		$this->load->model("Parroquia_model");
		$this->load->model("Direccion_model");
		$this->load->model("Lugar_trabajo_model");
		$this->load->model("Trabajo_model");
		$this->load->model("Academico_model");
		$this->load->model("Nivel_Academico_model");
		$this->load->model("Registro_bancario_model");
		$this->load->model("Banco_model");
		$this->load->model("Control_requisitos_docente_model");
		$this->load->model("Oferta_academica_model");
		$this->load->model("Materias_preinscrita_model");
		$this->load->model("Notas_academica_model");
		$this->load->model("Nro_constancia_model");
		$this->load->model("Control_constancia_model");
		$this->load->model("Plan_evaluacion_model");

		if (!$this->session->userdata("login")) {
			redirect(base_url());
		}
	}

	public function index()//mensaje de bienvenida
	{ 
		$id_usuario = $this->session->userdata("id");
		$docente=$this->Docente_model->getusuario_Docente($id_usuario);
		$data= array(
				'tiempo_pre' => $this->Tiempo_preinscripcion_model->gettiempo_preinscripcion(),
				'datos_docente' 	=>$this->Docente_model->getusuario_Docente($id_usuario),
				'datos_academicos' 	=>$this->Academico_model->getusuario_Academico($id_usuario),
				'domicilio' 		=>$this->Direccion_model->getListaDireccion($id_usuario),
				'trabajo'			=>$this->Trabajo_model->getListaTrabajo($id_usuario,1),
				'datos_bancarios'	=>$this->Registro_bancario_model->getusuario_bancario($id_usuario),
				'requisitos_todos'	=>$this->Control_requisitos_docente_model->getControl_requisitos_doc1($docente->id,$id_usuario)
		);	
		if (count($data['datos_docente'])>0){
			
			//	var_dump($data);
			
			if (!($data['datos_academicos'] ) or !($data['domicilio'] ) or !($data['trabajo'] ) or !($data['datos_bancarios'] )){
				 //datos no  actualizados
				$data['actualizar']=false;
			 }else{

				$data['actualizar']=true; //datos actualizados
			}
		}
	
			if (count($data['requisitos_todos'])>0 and (count($data['requisitos_todos'])>=6 and count($data['requisitos_todos'])<=7)){			
			
				$data['requisitos']=true; //requisitos actualizados
			}else{
				 //requisitos no  actualizados
					$data['requisitos']=false;
			}
		if($data['requisitos']==true and $data['requisitos']==true)$data['menu_notas']=true;
		//var_dump($data);		
		$this->load->view('layouts/header');
		$this->load->view('layouts/sidebar',$data);
		$this->load->view('docente/list');
		$this->load->view('layouts/footer');
	}
	
public function index_supervisor_docente()//mensaje de bienvenida
	{ 
		$data = $this->session->userdata("id");
		
			
		$this->load->view('layouts/header');
		$this->load->view('layouts/sidebar',$data);
		$this->load->view('docente/index');
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


	/////////// actualizacion de datos del docente  ////
	public function datos()//datos personales
	{
		$id_usuario = $this->session->userdata("id");
		$data = array(
			'cod_hab' => $this->Codigo_tel_model->Codigo_nacional(),
			'cod_cel' => $this->Codigo_tel_model->Codigo_celular(),
			
			'lista_sexo' => $this->Sexo_model->getSexo(),
			
			'datos_docente' => $this->Docente_model->getusuario_Docente($id_usuario)
		);
		
		$data2 = array(
			'tiempo_pre' => $this->Tiempo_preinscripcion_model->gettiempo_preinscripcion(),

		);
		//var_dump($data);
		$this->load->view('layouts/header');
		$this->load->view('layouts/sidebar',$data2);
		$this->load->view('docente/datos/edit',$data);
		$this->load->view('layouts/footer');
	}
	public function actualizar($id_docente)
	{
		$no_encontrado = $this->input->post("no_encontrado");
		$id_usuario = $this->input->post("id_usuario");
		$id_docente = $this->input->post("id_docente");
		$primer_nombre = $this->input->post("primer_nombre");
		$segundo_nombre = $this->input->post("segundo_nombre");
		$primer_apellido = $this->input->post("primer_apellido");
		$segundo_apellido = $this->input->post("segundo_apellido");
		$cod_nacionalidad = $this->input->post("cod_nacionalidad");
		$cedula = $this->input->post("cedula");	
		$telefono_hab = $this->input->post("telefono_hab");
		$sexo = $this->input->post("sexo");
		$correo = $this->input->post("correo");
		$telefono_cel = $this->input->post("telefono_cel");
		

				$data  = array(
				'id_usuario' => $id_usuario, 
				'id' => $id_docente, 
				'primer_nombre' => $primer_nombre,
				'segundo_nombre' => $segundo_nombre, 
				'primer_apellido' => $primer_apellido,
				'segundo_apellido' => $segundo_apellido, 
				'nacionalidad' => $cod_nacionalidad,
				'cedula' => $cedula, 		
				'telefono_hab' => $telefono_hab, 				
				'id_sexo' => $sexo, 
				'correo' => $correo,				
				'telefono_cel' => $telefono_cel,				
				);
				//echo $no_encontrado;
			if($no_encontrado!='falso'){
					if ($this->Docente_model->update_docente($no_encontrado,$data)) {
						redirect(base_url()."dashboard06/datos1");
					}
					else{
						$this->session->set_flashdata("error","No se pudo guardar la informacion");
						redirect(base_url()."dashboard06/datos");
					}
			}
			else{
					if ($this->Docente_model->save($data)) {
						redirect(base_url()."dashboard06/datos1");
					}
					else{
						$this->session->set_flashdata("error","No se pudo guardar la informacio");
						redirect(base_url()."dashboard06/datos");
					}

			}
		
		
	}
	public function datos1()//direccion domicilio docente
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
		$this->load->view('docente/datos/direccion',$data);		
		$this->load->view('layouts/footer');
	}
public function direccion_store($id_usuario)
	{
		$no_encontrado = $this->input->post("no_encontrado");
		$id_usuario = $this->input->post("id_usuario");
		$comboestado = $this->input->post("comboestado");
		$combomunicipio = $this->input->post("combomunicipio");
		$comboparroquia = $this->input->post("comboparroquia");
		$domicilio=$this->input->post("domicilio");

		$data  = array(
			'id_usuario' => $id_usuario, 
			'id_estado' => $comboestado,
			'id_municipio' => $combomunicipio,
			'id_parroquia' => $comboparroquia,
			'domicilio'	=> $domicilio
		);

		if($no_encontrado!='falso'){
					if ($this->Direccion_model->update($no_encontrado,$data)) {
						redirect(base_url()."dashboard06/datos22");
					}
					else{
						$this->session->set_flashdata("error","No se pudo guardar la informacion");
						redirect(base_url()."dashboard06/datos1");
					}
			}
			else{
					if ($this->Direccion_model->save($data)) {
						redirect(base_url()."dashboard06/datos22");
					}
					else{
						$this->session->set_flashdata("error","No se pudo guardar la informacion");
						redirect(base_url()."dashboard06/datos1");
					}

			}


		redirect(base_url()."dashboard06/datos2");
	}


	public function datos2()//datos laborales
	{
		$id_usuario = $this->session->userdata("id");
		$data = array(
		'lugartrabajo' => $this->Lugar_trabajo_model->getLugar_trabajo(),
		'estadotrabajo' => $this->Estado_model->getListaEstado(),
		'cod_hab' => $this->Codigo_tel_model->Codigo_nacional(),
		'cod_cel' => $this->Codigo_tel_model->Codigo_celular(),
		'letra_rif'=> array('E','V','J','G','C'),
		'datos_trabajo' => $this->Trabajo_model->getListaTrabajo($id_usuario,1),
		'datos_docente' => $this->Docente_model->getusuario_Docente($id_usuario),
		);
		$data2 = array(
			'tiempo_pre' => $this->Tiempo_preinscripcion_model->gettiempo_preinscripcion(),

		);
		
		$this->load->view('layouts/header');
		$this->load->view('layouts/sidebar',$data2);
		$this->load->view('docente/datos/trabajo',$data);
		$this->load->view('layouts/footer');
	}
	public function trabajo_store($id_usuario)
	{
		
		$no_encontrado = $this->input->post("no_encontrado");
		$id_usuario = $this->input->post("id_usuario");
		$id_docente=$this->input->post("id_docente");
		$lugar_trabajo = $this->input->post("lugar_trabajo");
		$cargo_desempena = $this->input->post("cargo_desempena");
			$codigo_teltrab = $this->input->post("codigo_teltrab");
			$telefono_teltrab = $this->input->post("telefono_teltrab");
		$telefono_trabajo = $codigo_teltrab.$telefono_teltrab;
		$institucion=$this->input->post("institucion");
		$cod_rif=$this->input->post("cod_rif");
		$rif=$this->input->post("rif");
		$data  = array(
			'id_usuario' => $id_usuario, 
			'id_lugar_trabajo' => $lugar_trabajo,
			'cargo' => $cargo_desempena,
			'tel_trabajo' => $telefono_trabajo,
			'institucion'=> $institucion,
			

		);
		$data_rif  = array(
			'cod_rif'=>$cod_rif,
			'rif'=> $rif,			

		);
//var_dump($data_rif);
		if($no_encontrado!='falso'){
					if ($this->Trabajo_model->update($no_encontrado,$data) ){
						if( $this->Docente_model->update_docente($id_docente,$data_rif) ) {
						redirect(base_url()."dashboard06/datos21");
						}else{
						$this->session->set_flashdata("error","No se pudo guardar la informacion");
						redirect(base_url()."dashboard06/datos2");
						}
					}
					else{
						$this->session->set_flashdata("error","No se pudo guardar la informacion");
						redirect(base_url()."dashboard06/datos2");
					}
			}
			else{
					if ($this->Trabajo_model->save($data)) {
						redirect(base_url()."dashboard06/datos21");
					}
					else{
						$this->session->set_flashdata("error","No se pudo guardar la informacion");
						redirect(base_url()."dashboard06/datos2");
					}

			}
		
	}
	public function datos21()//datos bancarios
	{
		$id_usuario = $this->session->userdata("id");
		$data = array(
			'list_banco' => $this->Banco_model->getBanco_todos(),
			'datos_bancarios' => $this->Registro_bancario_model->getusuario_bancario($id_usuario)
		);

		$data2 = array(
			'tiempo_pre' => $this->Tiempo_preinscripcion_model->gettiempo_preinscripcion(),

		);
		
		$this->load->view('layouts/header');
		$this->load->view('layouts/sidebar',$data2);
		$this->load->view('docente/datos/reg_bancario',$data);
		$this->load->view('layouts/footer');
	}

	public function reg_bancario_store($id_usuario)
	{
		$no_encontrado = $this->input->post("no_encontrado");
		$id_usuario = $this->input->post("id_usuario");
		$num_cuenta = $this->input->post("num_cuenta");
		$tipo_cuenta = $this->input->post("tipo_cuenta");
		$nom_banco = $this->input->post("nom_banco");
		

		$data  = array(
			'id_usuario' => $id_usuario, 
			'id_banco' => $nom_banco,
			'nro_cuenta' => $num_cuenta,
			'tipo_cuenta' => $tipo_cuenta,
			
		);

		if($no_encontrado!='falso'){
					if ($this->Registro_bancario_model->update_bancario($no_encontrado,$data)) {
						redirect(base_url()."dashboard06/proceso_perfil");
					}
					else{
						$this->session->set_flashdata("error","No se pudo guardar la informacion");
						redirect(base_url()."dashboard06/datos21");
					}
			}
			else{
					if ($this->Registro_bancario_model->save($data)) {
						redirect(base_url()."dashboard06/proceso_perfil");
					}
					else{
						$this->session->set_flashdata("error","No se pudo guardar la informacion");
						redirect(base_url()."dashboard06/datos21");
					}

			}


		//redirect(base_url()."dashboard06/proceso_perfil");
	}


	public function datos22()//datos academicos
	{
		$id_usuario = $this->session->userdata("id");

		$data = array(
		'nivel_academico' => $this->Nivel_Academico_model->getNivelAcademico(),
		'datos_docente' => $this->Docente_model->getusuario_Docente($id_usuario),
		'datos_academicos' => $this->Academico_model->getusuario_Academico($id_usuario),
		);
		//var_dump($data);

		$data2 = array(
			'tiempo_pre' => $this->Tiempo_preinscripcion_model->gettiempo_preinscripcion(),

		);
		
		$this->load->view('layouts/header');
		$this->load->view('layouts/sidebar',$data2);
		$this->load->view('docente/datos/datos_academicos',$data);
		$this->load->view('layouts/footer');
	}


public function actualizar_datos_academicos($id_usuario)
	{
		
		$no_encontrado = $this->input->post("no_encontrado");
		$id_usuario = $this->input->post("id_usuario");
		$id_academico=$this->input->post("id_academico");
		$nivel_academico = $this->input->post("id_nivel_academico");
		$ult_titulo = $this->input->post("ult_titulo");
		$institucion = $this->input->post("institucion");
		$estudia = $this->input->post("estudia");
		$nivel_cursa = $this->input->post("nivel_cursa");
		$titulo_obtener=$this->input->post("titulo_obtener");
		
		$data  = array(
			'id_usuario' => $id_usuario, 
			'ult_titulo' => $ult_titulo,
			'institucion' => $institucion,
			'estudia' => $estudia,
			'nivel_cursa'=> $nivel_cursa,
			'titulo_obtener'=> $titulo_obtener,
			

		);
		//var_dump($data);
		$data_nivel_academico  = array(
			'id_nivel_academico'=>$nivel_academico,					

		);

		if($no_encontrado!='falso'){
					if ($this->Academico_model->update_academico($no_encontrado,$data) ){
						if( $this->Docente_model->update_docente($id_docente,$data_nivel_academico) ) {
						redirect(base_url()."dashboard06/datos2");
						}else{
						$this->session->set_flashdata("error","No se pudo guardar la informacion 2");
						redirect(base_url()."dashboard06/datos22");
						}
					}
					else{
						$this->session->set_flashdata("error","No se pudo guardar la informacion 1");
						redirect(base_url()."dashboard06/datos22");
					}
			}
			else{
					if ($this->Academico_model->save($data)) {
						if( $this->Docente_model->update_docente($id_docente,$data_nivel_academico) ) {
							redirect(base_url()."dashboard06/datos2");
						}else{
							$this->session->set_flashdata("error","No se pudo guardar la informacion3");
							redirect(base_url()."dashboard06/datos22");
						}
					}
					else{
						$this->session->set_flashdata("error","No se pudo guardar la informacion4");
						redirect(base_url()."dashboard06/datos22");
					}

			}
		
	}
	public function datos3()
	{
		$data2 = array(
			'tiempo_pre' => $this->Tiempo_preinscripcion_model->gettiempo_preinscripcion(),

		);
		 //$rutaarchivo_img = base_url().'assets/cedulas/' . $this->session->userdata('id') . '_cedulas_docente.jpg';
		 $rutaarchivo_pdf = base_url().'assets/cedulas/' . $this->session->userdata('id') . '_cedulas_docente.pdf';
		
   // echo $rutaarchivo_img;
		$id_usuario = $this->session->userdata("id");
		$data['datos_docente'] = $this->Docente_model->getusuario_Docente($id_usuario);

   /* if(!(file_exists($rutaarchivo_img))) {
     	     $data['imagen']=$rutaarchivo_img;
     } else{
     	
     	 $data['imagen']=base_url().'/assets/img/imagen.jpg';
     }*/

     if(!(file_exists($rutaarchivo_pdf))) {
     	     $data['pdf']=$rutaarchivo_pdf;
     	} else{     	
     		 $data['pdf']=base_url().'/assets/img/pdf.jpeg';
     	}	
  
		//var_dump($datos_docente);
  
		$this->load->view('layouts/header');
		$this->load->view('layouts/sidebar',$data2);
		$this->load->view('docente/datos/cedula',$data); //carga cedula
		$this->load->view('layouts/footer');
	}

	public function datos7()
	{
		$data2 = array(
			'tiempo_pre' => $this->Tiempo_preinscripcion_model->gettiempo_preinscripcion(),

		);
		 $rutaarchivo_img = base_url().'assets/fotos/' . $this->session->userdata('id') . '_fotos_docente.jpg';
		
 	$id_usuario = $this->session->userdata("id");
	$data['datos_docente'] = $this->Docente_model->getusuario_Docente($id_usuario);
		
    if(!(file_exists($rutaarchivo_img))) {
     	     $data['imagen']=$rutaarchivo_img;
     } else{
     	
     	 $data['imagen']=base_url().'/assets/img/imagen.jpg';
     }
		
		$this->load->view('layouts/header');
		$this->load->view('layouts/sidebar',$data2);
		$this->load->view('docente/datos/foto',$data);// forma que carga las foto
		$this->load->view('layouts/footer');
	}

	public function datos4()
	{
		$data2 = array(
			'tiempo_pre' => $this->Tiempo_preinscripcion_model->gettiempo_preinscripcion(),

		);
		// $rutaarchivo_img = base_url().'assets/titulo/' . $this->session->userdata('id') . '_titulo_docente.jpg';
		 $rutaarchivo_pdf = base_url().'assets/titulo/' . $this->session->userdata('id') . '_titulo_docente.pdf';
		 	$id_usuario = $this->session->userdata("id");
		$data['datos_docente'] = $this->Docente_model->getusuario_Docente($id_usuario);
		
   // echo $rutaarchivo_img;
		
  /*  if(!(file_exists($rutaarchivo_img))) {
     	     $data['imagen']=$rutaarchivo_img;
     } else{     	
     		 $data['imagen']=base_url().'/assets/img/imagen.jpg';
     }*/
      if(!(file_exists($rutaarchivo_pdf))) {
     	     $data['pdf']=$rutaarchivo_pdf;
     	} else{     	
     		 $data['pdf']=base_url().'/assets/img/pdf.jpeg';
     	}	

		$this->load->view('layouts/header');
		$this->load->view('layouts/sidebar',$data2);
		
		$this->load->view('docente/datos/fondo_negro',$data);// forma que carga los titulos fondo negro
		$this->load->view('layouts/footer');
	}

	
	

	public function datos8()
	{
		$data2 = array(
			'tiempo_pre' => $this->Tiempo_preinscripcion_model->gettiempo_preinscripcion(),

		);
		 //$rutaarchivo_img = base_url().'assets/carnet/' . $this->session->userdata('id') . '_carnet_docente.jpg';
		  $rutaarchivo_pdf = base_url().'assets/carnet/' . $this->session->userdata('id') . '_carnet_docente.pdf';
		
   // echo $rutaarchivo_img;
		 	$id_usuario = $this->session->userdata("id");
		$data['datos_docente'] = $this->Docente_model->getusuario_Docente($id_usuario);
		
  /*  if(!(file_exists($rutaarchivo_img))) {
     	     $data['imagen']=$rutaarchivo_img;
     } else{     	
     		 $data['imagen']=base_url().'/assets/img/imagen.jpg';
     }	*/
      if(!(file_exists($rutaarchivo_pdf))) {
     	     $data['pdf']=$rutaarchivo_pdf;
     	} else{     	
     		 $data['pdf']=base_url().'/assets/img/pdf.jpeg';
     	}	
		$this->load->view('layouts/header');
		$this->load->view('layouts/sidebar',$data2);
		$this->load->view('docente/datos/carnet',$data);// forma que carga carnet
		$this->load->view('layouts/footer');
	}
	public function requisitos()
	{
		$data2 = array(
			'tiempo_pre' => $this->Tiempo_preinscripcion_model->gettiempo_preinscripcion(),

		);
		
		$this->load->view('layouts/header');
		$this->load->view('layouts/sidebar',$data2);
		$this->load->view('docente/datos/requisitos');// recomendaciones
		$this->load->view('layouts/footer');
	}
	
	
	public function datos12()
	{
		$data2 = array(
			'tiempo_pre' => $this->Tiempo_preinscripcion_model->gettiempo_preinscripcion(),

		);	
			// $rutaarchivo_img = base_url().'assets/especialista/' . $this->session->userdata('id') . '_especialista_docente.jpg';
		 $rutaarchivo_pdf = base_url().'assets/especialista/' . $this->session->userdata('id') . '_especialista_docente.pdf';
   // echo $rutaarchivo_img;
			 	$id_usuario = $this->session->userdata("id");
		$data['datos_docente'] = $this->Docente_model->getusuario_Docente($id_usuario);
		
	   /* if(!(file_exists($rutaarchivo_img))) {
	     	     $data['imagen']=$rutaarchivo_img;
	     } else{     	
	     		 $data['imagen']=base_url().'/assets/img/imagen.jpg';
	     }	*/
	      if(!(file_exists($rutaarchivo_pdf))) {
     	     $data['pdf']=$rutaarchivo_pdf;
     	} else{     	
     		 $data['pdf']=base_url().'/assets/img/pdf.jpeg';
     	}	
		$this->load->view('layouts/header');
		$this->load->view('layouts/sidebar',$data2);
		$this->load->view('docente/datos/titulo_especializacion',$data);// forma que carga titulo de especialista
		$this->load->view('layouts/footer');
	}
public function datos13()
	{
		$data2 = array(
			'tiempo_pre' => $this->Tiempo_preinscripcion_model->gettiempo_preinscripcion(),

		);		
			$id_usuario = $this->session->userdata("id");
		$data['datos_docente'] = $this->Docente_model->getusuario_Docente($id_usuario);
		 $rutaarchivo_pdf = base_url().'assets/curriculum/' . $this->session->userdata('id') . '_curriculum_docente.pdf';

		 	$id_usuario = $this->session->userdata("id");
		$data['datos_docente'] = $this->Docente_model->getusuario_Docente($id_usuario);

		if(!(file_exists($rutaarchivo_pdf))) {
     	     $data['pdf']=$rutaarchivo_pdf;
     	} else{     	
     		 $data['pdf']=base_url().'/assets/img/pdf.jpeg';
     	}	

		$this->load->view('layouts/header');
		$this->load->view('layouts/sidebar',$data2);
		$this->load->view('docente/datos/curriculum',$data);// forma que carga sintensis curricular
		$this->load->view('layouts/footer');
	}
	public function datos11()
	{
		$data2 = array(
			'tiempo_pre' => $this->Tiempo_preinscripcion_model->gettiempo_preinscripcion(),

		);		

			$id_usuario = $this->session->userdata("id");
		$data['datos_docente'] = $this->Docente_model->getusuario_Docente($id_usuario);

		 $rutaarchivo_pdf = base_url().'assets/seniat/' . $this->session->userdata('id') . '_rif_docente.pdf';
		if(!(file_exists($rutaarchivo_pdf))) {
     	     $data['pdf']=$rutaarchivo_pdf;
     	} else{     	
     		 $data['pdf']=base_url().'/assets/img/pdf.jpeg';
     	}	
		$this->load->view('layouts/header');
		$this->load->view('layouts/sidebar',$data2);
		$this->load->view('docente/datos/rif',$data);// forma que carga titulo de especialista
		$this->load->view('layouts/footer');
	}
 
public function cargacedula()
	{
		
		extract($_REQUEST);
			$nombre_archivo = $_FILES['userfile']['name'];
			$tipo_archivo = $_FILES['userfile']['type'];
			$tamano_archivo = $_FILES['userfile']['size'];
			//compruebo si las caracter�sticas del archivo son las que deseo
		if (!((strpos($tipo_archivo, "pdf")  )))
			{ // formato incorrecto
				$mensaje = $nombre_archivo.' - '.$tipo_archivo.' - '.$tamano_archivo;
				//$mensaje=$tipo_archivo." <strong>El formato del archivo es invalido. La foto debe tener el formato: .gif, .jpg o .png</strong>";
			} else if (($tamano_archivo > 1048576)) { // excede el tama�o permitido
				$mensaje="<strong>La imagen de la cedula de identidad no puede exceder de 1 Mb, el archivo que intenta cargar tiene un tama&ntilde;o de: ".number_format($tamano_archivo/1048576,2)." Mb </strong><br/> Seleccione otra imagen e intente de nuevo";
			} else { // todo ok
				//print($_FILES['userfile']['tmp_name']);
				if (move_uploaded_file($_FILES['userfile']['tmp_name'], 'assets/cedulas/'. $this->session->userdata('id')."_cedulas_docente.pdf"))
				{
					$mensaje="";
				} else {
					$mensaje="Ocurrio algun error al subir la imagen. No pudo guardarse.";
					//$mensaje=$_FILES['userfile']['tmp_name'];
				}
			}
				if ($mensaje=="") {
					$id_docente=$this->input->post('id_docente');
					$data= array(
						'id_usuario'=>$this->session->userdata('id'),
						'id_requisito'=>'1',
						'id_docente'=>$id_docente,
						'quien_registro'=>$this->session->userdata('id'),
					);
				   // var_dump($data);
					if ($this->Control_requisitos_docente_model->getControl_requisitos($id_docente,1,$this->session->userdata('id'))==false){						
						$this->Control_requisitos_docente_model->save($data);
						$this->session->set_flashdata("success","Cédula de Identidad Cargada con Éxito.");
						
					}else{
						$fecha=date("Y-m-d H:i:s");
						$data2= array(
						'fecha_actualizacion'=>$fecha,
						'quien_actualizo'=>$this->session->userdata('id')
						);
						$retorno=$this->Control_requisitos_docente_model->update($this->session->userdata('id'),$id_docente,1,$data2);					
						$this->session->set_flashdata("warning","El requisito fue actualizado.");
				    	
					}				
					redirect(base_url()."dashboard06/datos3","refresh");
			} else {
				$this->session->set_flashdata("error",$mensaje);
			    redirect(base_url()."dashboard06/datos3","refresh");
			}	
	}

public function cargafoto()
	{
		
		extract($_REQUEST);
			$nombre_archivo = $_FILES['userfile']['name'];
			$tipo_archivo = $_FILES['userfile']['type'];
			$tamano_archivo = $_FILES['userfile']['size'];
			//compruebo si las caracter�sticas del archivo son las que deseo
			if (!((strpos($tipo_archivo, "gif") || strpos($tipo_archivo, "jpeg") || strpos($tipo_archivo, "jpg") || strpos($tipo_archivo, "png") )))
			{ // formato incorrecto
				$mensaje = $nombre_archivo.' - '.$tipo_archivo.' - '.$tamano_archivo;
				//$mensaje=$tipo_archivo." <strong>El formato del archivo es invalido. La foto debe tener el formato: .gif, .jpg o .png</strong>";
			} else if (($tamano_archivo > 1048576)) { // excede el tama�o permitido
				$mensaje="<strong>La imagen de la cedula de identidad no puede exceder de 1 Mb, el archivo que intenta cargar tiene un tama&ntilde;o de: ".number_format($tamano_archivo/1048576,2)." Mb </strong><br/> Seleccione otra imagen e intente de nuevo";
			} else { // todo ok
				//print($_FILES['userfile']['tmp_name']);
				if (move_uploaded_file($_FILES['userfile']['tmp_name'], 'assets/fotos/'. $this->session->userdata('id')."_fotos_docente.jpg"))
				{
					$mensaje="";
				} else {
					$mensaje="Ocurrio algun error al subir la imagen. No pudo guardarse.";
					//$mensaje=$_FILES['userfile']['tmp_name'];
				}
			}
				if ($mensaje=="") {
					$id_docente=$this->input->post('id_docente');
					$data= array(
						'id_usuario'=>$this->session->userdata('id'),
						'id_requisito'=>'2',
						'id_docente'=>$id_docente,
						'quien_registro'=>$this->session->userdata('id'),
					);
				   // var_dump($data);
					if ($this->Control_requisitos_docente_model->getControl_requisitos($id_docente,2,$this->session->userdata('id'))==false){						
						$this->Control_requisitos_docente_model->save($data);
						$this->session->set_flashdata("success","Fotografía Cargada con Éxito.");
						
					}else{
						$fecha=date("Y-m-d H:i:s");
						$data2= array(
						'fecha_actualizacion'=>$fecha,
						'quien_actualizo'=>$this->session->userdata('id')
						);
						$retorno=$this->Control_requisitos_docente_model->update($this->session->userdata('id'),$id_docente,2,$data2);					
						$this->session->set_flashdata("warning","El requisito fue actualizado.");
				    	
					}				
					redirect(base_url()."dashboard06/datos7","refresh");
			} else {
				$this->session->set_flashdata("error",$mensaje);
			    redirect(base_url()."dashboard06/datos7","refresh");
			}	
	
		
	}
public function cargatitulo()
	{		
			extract($_REQUEST);
			$nombre_archivo = $_FILES['userfile']['name'];
			$tipo_archivo = $_FILES['userfile']['type'];
			$tamano_archivo = $_FILES['userfile']['size'];
			//compruebo si las caracter�sticas del archivo son las que deseo
			if (!((strpos($tipo_archivo, "pdf")  )))
			{ // formato incorrecto
				//$mensaje = $nombre_archivo.' - '.$tipo_archivo.' - '.$tamano_archivo;
				$mensaje=$tipo_archivo." <strong>El formato del archivo es invalido. La foto debe tener el formato: .gif, .jpg o .png</strong>";
			} else if (($tamano_archivo > 1048576)) { // excede el tama�o permitido
				$mensaje="<strong>El titulo de Pregrado no puede exceder de 1 Mb, el archivo que intenta cargar tiene un tama&ntilde;o de: ".number_format($tamano_archivo/1048576,2)." Mb </strong><br/> Seleccione otra archivo e intente de nuevo";
			} else { // todo ok
				//print($_FILES['userfile']['tmp_name']);
				if (move_uploaded_file($_FILES['userfile']['tmp_name'], 'assets/titulo/'. $this->session->userdata('id')."_titulo_docente.pdf"))
				{
					$mensaje="";
				} else {
					$mensaje="Ocurrio algun error al subir la imagen. No pudo guardarse.";
					//$mensaje=$_FILES['userfile']['tmp_name'];
				}
			}
			if ($mensaje=="") {
					$id_docente=$this->input->post('id_docente');
					$data= array(
						'id_usuario'=>$this->session->userdata('id'),
						'id_requisito'=>'3',
						'id_docente'=>$id_docente,
						'quien_registro'=>$this->session->userdata('id'),
					);
				   // var_dump($data);
					if ($this->Control_requisitos_docente_model->getControl_requisitos($id_docente,3,$this->session->userdata('id'))==false){						
						$this->Control_requisitos_docente_model->save($data);
						$this->session->set_flashdata("success","El Titulo Pregrado fue Cargado con Éxito.");
						
					}else{
						$fecha=date("Y-m-d H:i:s");
						$data2= array(
						'fecha_actualizacion'=>$fecha,
						'quien_actualizo'=>$this->session->userdata('id')
						);
						$retorno=$this->Control_requisitos_docente_model->update($this->session->userdata('id'),$id_docente,3,$data2);					
						$this->session->set_flashdata("warning","El requisito fue actualizado.");
				    	
					}				
					redirect(base_url()."dashboard06/datos4","refresh");
			} else {
				$this->session->set_flashdata("error",$mensaje);
			    redirect(base_url()."dashboard06/datos4","refresh");
			}	
	}
	public function cargarespecialista()
	{		
			extract($_REQUEST);
			$nombre_archivo = $_FILES['userfile']['name'];
			$tipo_archivo = $_FILES['userfile']['type'];
			$tamano_archivo = $_FILES['userfile']['size'];
			//compruebo si las caracter�sticas del archivo son las que deseo
			if (!((strpos($tipo_archivo, "pdf")  )))
			{ // formato incorrecto
				//$mensaje = $nombre_archivo.' - '.$tipo_archivo.' - '.$tamano_archivo;
				$mensaje=$tipo_archivo." <strong>El formato del archivo es invalido. El archivo debe tener el formato: .pdf</strong>";
			} else if (($tamano_archivo > 1048576)) { // excede el tama�o permitido
				$mensaje="<strong>El titulo de especialista o Postgrado no puede exceder de 1 Mb, el archivo que intenta cargar tiene un tama&ntilde;o de: ".number_format($tamano_archivo/1048576,2)." Mb </strong><br/> Seleccione otro archivo e intente de nuevo";
			} else { // todo ok
				//print($_FILES['userfile']['tmp_name']);
				if (move_uploaded_file($_FILES['userfile']['tmp_name'], 'assets/especialista/'. $this->session->userdata('id')."_especialista_docente.pdf"))
				{
					$mensaje="";
				} else {
					$mensaje="Ocurrio algun error al subir el archivo. No pudo guardarse.";
					//$mensaje=$_FILES['userfile']['tmp_name'];
				}
			}
				if ($mensaje=="") {
					$id_docente=$this->input->post('id_docente');
					$data= array(
						'id_usuario'=>$this->session->userdata('id'),
						'id_requisito'=>'11',
						'id_docente'=>$id_docente,
						'quien_registro'=>$this->session->userdata('id'),
					);
				   // var_dump($data);
					if ($this->Control_requisitos_docente_model->getControl_requisitos($id_docente,11,$this->session->userdata('id'))==false){						
						$this->Control_requisitos_docente_model->save($data);
						$this->session->set_flashdata("success","El Titulo Postgrado o Especialista fue Cargado con Éxito.");
						
					}else{
						$fecha=date("Y-m-d H:i:s");
						$data2= array(
						'fecha_actualizacion'=>$fecha,
						'quien_actualizo'=>$this->session->userdata('id')
						);
						$retorno=$this->Control_requisitos_docente_model->update($this->session->userdata('id'),$id_docente,11,$data2);					
						$this->session->set_flashdata("warning","El requisito fue actualizado.");
				    	
					}				
					redirect(base_url()."dashboard06/datos12","refresh");
			} else {
				$this->session->set_flashdata("error",$mensaje);
			    redirect(base_url()."dashboard06/datos12","refresh");
			}	
	}

public function cargarseniat()
	{		
			extract($_REQUEST);
			$nombre_archivo = $_FILES['userfile']['name'];
			$tipo_archivo = $_FILES['userfile']['type'];
			$tamano_archivo = $_FILES['userfile']['size'];
			//compruebo si las caracter�sticas del archivo son las que deseo
			if (!((strpos($tipo_archivo, "pdf")  )))
			{ // formato incorrecto
				//$mensaje = $nombre_archivo.' - '.$tipo_archivo.' - '.$tamano_archivo;
				$mensaje=$tipo_archivo." <strong>El formato del archivo es invalido. El R.I.F. (SENIAT)  debe tener el formato: .pdf</strong>";
			} else if (($tamano_archivo > 1048576)) { // excede el tama�o permitido
				$mensaje="<strong>El R.I.F. (SENIAT) no puede exceder de 1 Mb, el archivo que intenta cargar tiene un tama&ntilde;o de: ".number_format($tamano_archivo/1048576,2)." Mb </strong><br/> Seleccione otra archivo e intente de nuevo";
			} else { // todo ok
				//print($_FILES['userfile']['tmp_name']);
				if (move_uploaded_file($_FILES['userfile']['tmp_name'], 'assets/seniat/'. $this->session->userdata('id')."_rif_docente.pdf"))
				{
					$mensaje="";
				} else {
					$mensaje="Ocurrio algun error al subir la imagen. No pudo guardarse.";
					//$mensaje=$_FILES['userfile']['tmp_name'];
				}
			}
				if ($mensaje=="") {
					$id_docente=$this->input->post('id_docente');
					$data= array(
						'id_usuario'=>$this->session->userdata('id'),
						'id_requisito'=>'13',
						'id_docente'=>$id_docente,
						'quien_registro'=>$this->session->userdata('id'),
					);
				   // var_dump($data);
					if ($this->Control_requisitos_docente_model->getControl_requisitos($id_docente,13,$this->session->userdata('id'))==false){						
						$this->Control_requisitos_docente_model->save($data);
						$this->session->set_flashdata("success","R.I.F SENIAT Cargado con Éxito.");
						
					}else{
						$fecha=date("Y-m-d H:i:s");
						$data2= array(
						'fecha_actualizacion'=>$fecha,
						'quien_actualizo'=>$this->session->userdata('id')
						);
						$retorno=$this->Control_requisitos_docente_model->update($this->session->userdata('id'),$id_docente,13,$data2);					
						$this->session->set_flashdata("warning","El requisito fue actualizado.");
				    	
					}				
					redirect(base_url()."dashboard06/datos11","refresh");
			} else {
				$this->session->set_flashdata("error",$mensaje);
			    redirect(base_url()."dashboard06/datos11","refresh");
			}	
	
	}


public function cargarcurriculum()
	{		
			extract($_REQUEST);
			$nombre_archivo = $_FILES['userfile']['name'];
			$tipo_archivo = $_FILES['userfile']['type'];
			$tamano_archivo = $_FILES['userfile']['size'];
			//compruebo si las caracter�sticas del archivo son las que deseo
			if (!((strpos($tipo_archivo, "pdf")  )))
			{ // formato incorrecto
				//$mensaje = $nombre_archivo.' - '.$tipo_archivo.' - '.$tamano_archivo;
				$mensaje=$tipo_archivo." <strong>El formato del archivo es invalido. La Síntesis Curricular debe tener el formato: .pdf </strong>";
			} else if (($tamano_archivo > 1048576)) { // excede el tama�o permitido
				$mensaje="<strong>La Síntesis Curricular no puede exceder de 1 Mb, el archivo que intenta cargar tiene un tama&ntilde;o de: ".number_format($tamano_archivo/1048576,2)." Mb </strong><br/> Seleccione otro archivo e intente de nuevo";
			} else { // todo ok
				//print($_FILES['userfile']['tmp_name']);
				if (move_uploaded_file($_FILES['userfile']['tmp_name'], 'assets/curriculum/'. $this->session->userdata('id')."_curriculum_docente.pdf"))
				{
					$mensaje="";
				} else {
					$mensaje="Ocurrio algun error al subir la imagen. No pudo guardarse.";
					//$mensaje=$_FILES['userfile']['tmp_name'];
				}
			}
				if ($mensaje=="") {
					$id_docente=$this->input->post('id_docente');
					$data= array(
						'id_usuario'=>$this->session->userdata('id'),
						'id_requisito'=>'12',
						'id_docente'=>$id_docente,
						'quien_registro'=>$this->session->userdata('id'),
					);
				   // var_dump($data);
					if ($this->Control_requisitos_docente_model->getControl_requisitos($id_docente,12,$this->session->userdata('id'))==false){						
						$this->Control_requisitos_docente_model->save($data);
						$this->session->set_flashdata("success","Sintesis Curricular Cargada con Éxito.");
						
					}else{
						$fecha=date("Y-m-d H:i:s");
						$data2= array(
						'fecha_actualizacion'=>$fecha,
						'quien_actualizo'=>$this->session->userdata('id')
						);
						$retorno=$this->Control_requisitos_docente_model->update($this->session->userdata('id'),$id_docente,12,$data2);					
						$this->session->set_flashdata("warning","El requisito fue actualizado.");
				    	
					}				
					redirect(base_url()."dashboard06/datos13","refresh");
			} else {
				$this->session->set_flashdata("error",$mensaje);
			    redirect(base_url()."dashboard06/datos13","refresh");
			}	
	
	}	
	public function cargacarnet()
	{		
			extract($_REQUEST);
			$nombre_archivo = $_FILES['userfile']['name'];
			$tipo_archivo = $_FILES['userfile']['type'];
			$tamano_archivo = $_FILES['userfile']['size'];
			//compruebo si las caracter�sticas del archivo son las que deseo
			if (!((strpos($tipo_archivo, "pdf")  )))
			{ // formato incorrecto
				//$mensaje = $nombre_archivo.' - '.$tipo_archivo.' - '.$tamano_archivo;
				$mensaje=$tipo_archivo." <strong>El formato del archivo es invalido. El carnet debe tener el formato: pdf</strong>";
			} else if (($tamano_archivo > 1048576)) { // excede el tama�o permitido
				$mensaje="<strong>El carnet no puede exceder de 1 Mb, el archivo que intenta cargar tiene un tama&ntilde;o de: ".number_format($tamano_archivo/1048576,2)." Mb </strong><br/> Seleccione otro archivo e intente de nuevo";
			} else { // todo ok
				//print($_FILES['userfile']['tmp_name']);
				if (move_uploaded_file($_FILES['userfile']['tmp_name'], 'assets/carnet/'. $this->session->userdata('id')."_carnet_docente.pdf"))
				{
					$mensaje="";
				} else {
					$mensaje="Ocurrio algun error al subir la imagen. No pudo guardarse.";
					//$mensaje=$_FILES['userfile']['tmp_name'];
				}
			}
				if ($mensaje=="") {
					$id_docente=$this->input->post('id_docente');
					$data= array(
						'id_usuario'=>$this->session->userdata('id'),
						'id_requisito'=>'6',
						'id_docente'=>$id_docente,
						'quien_registro'=>$this->session->userdata('id'),
					);
				   // var_dump($data);
					if ($this->Control_requisitos_docente_model->getControl_requisitos($id_docente,6,$this->session->userdata('id'))==false){						
						$this->Control_requisitos_docente_model->save($data);
						$this->session->set_flashdata("success","Carnet Cargado con Éxito.");
						
					}else{
						$fecha=date("Y-m-d H:i:s");
						$data2= array(
						'fecha_actualizacion'=>$fecha,
						'quien_actualizo'=>$this->session->userdata('id')
						);
						$retorno=$this->Control_requisitos_docente_model->update($this->session->userdata('id'),$id_docente,6,$data2);					
						$this->session->set_flashdata("warning","El requisito fue actualizado.");
				    	
					}				
					redirect(base_url()."dashboard06/datos8","refresh");
			} else {
				$this->session->set_flashdata("error",$mensaje);
			    redirect(base_url()."dashboard06/datos8","refresh");
			}	
	}
public function matricula()
	{
		$data2 = array(
			'tiempo_pre' => $this->Tiempo_preinscripcion_model->gettiempo_preinscripcion(),

		);	
		$id_usuario = $this->session->userdata('id');
		$docente    = $this->Docente_model->getusuario_Docente($id_usuario);
		$periodo	= $this->Periodo_model->PeriodoActivoNotas();
		
		$data = array(			
			'unidades_curriculares'	=> $this->Oferta_academica_model->unidades_curriculares_docente($periodo->id,$docente->id),
			'unidades_curricularesli'	=> $this->Oferta_academica_model->unidades_curriculares_docente_lineas($periodo->id,$docente->id),
			'periodo'	=> $this->Periodo_model->PeriodoActivoNotas()	
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
	//	var_dump($data);
		$this->load->view('layouts/header');
		$this->load->view('layouts/sidebar',$data2);
		$this->load->view('docente/plan_clases/unidades_curriculares',$data);// forma que carga titulo de especialista
		$this->load->view('layouts/footer');
	}
	public function matricula_estudiantes($materia)
	{		
		//echo $materia;
		$data2 = array(
			'tiempo_pre' => $this->Tiempo_preinscripcion_model->gettiempo_preinscripcion(),
		);	
		
		$oferta=$this->Oferta_academica_model->getBuscaroferta($materia);
		//var_dump($oferta);
		$data = array(			
			'matricula'			=> $this->Materias_preinscrita_model->Materias_inscritas($materia),
			'periodo' 			=> $this->Periodo_model->getIdperiodonotas($oferta->id_periodo),
			'unidad_curricular' => $this->Pensum_model->getnombrePensum($oferta->id_pensum),
			'docente'    		=> $this->Docente_model->getBuscarDocente($oferta->id_docente),
			'oferta'			=> $oferta,
		);	
		
		$this->load->view('layouts/header');
		$this->load->view('layouts/sidebar',$data2);
		$this->load->view('docente/plan_clases/matricula',$data);// forma que carga titulo de especialista
		$this->load->view('layouts/footer');
	}
	public function matricula_estudiantesli($materia)
	{		
		//echo $materia;
		$periodo=$this->uri->segment(4);
		$data2 = array(
			'tiempo_pre' => $this->Tiempo_preinscripcion_model->gettiempo_preinscripcion(),
		);	
		//$periodo=$this->Periodo_model->PeriodoActivoNotas();
		$oferta=$this->Oferta_academica_model->getBuscarofertali($materia,$periodo);
		//var_dump($oferta);
		foreach($oferta as $oferta){
			$data = array(			
				'matricula'			=> $this->Materias_preinscrita_model->Materias_inscritasli($materia,$periodo),
				'periodo' 			=> $this->Periodo_model->getIdperiodonotas($periodo),
				'unidad_curricular' => $this->Pensum_model->getnombrePensum($oferta->id_pensum),
				'docente'    		=> $this->Docente_model->getBuscarDocente($oferta->id_docente),
				'oferta'			=> $oferta,
				'tipo'				=> 'linea',
			);	
		}
		$this->load->view('layouts/header');
		$this->load->view('layouts/sidebar',$data2);
		$this->load->view('docente/plan_clases/matricula',$data);// forma que carga titulo de especialista
		$this->load->view('layouts/footer');
	}

	public function asistencia($materia)
	{
		$data2 = array(
			'tiempo_pre' => $this->Tiempo_preinscripcion_model->gettiempo_preinscripcion(),

		);	
		
			//echo $materia;

		$oferta=$this->Oferta_academica_model->getBuscaroferta($materia,$periodo);
		$data = array(
			'matricula'			=> $this->Materias_preinscrita_model->Materias_inscritas($materia),
			'periodo' 			=> $this->Periodo_model->getIdperiodonotas($oferta->id_periodo),
			'unidad_curricular' => $this->Pensum_model->getnombrePensum($oferta->id_pensum),
			'docente'    		=> $this->Docente_model->getBuscarDocente($oferta->id_docente),
			'oferta'			=> $oferta,
		);	
		
		$this->load->view('layouts/header');
		$this->load->view('layouts/sidebar',$data2);
		$this->load->view('docente/plan_clases/asistencia',$data);// asistencia
		$this->load->view('layouts/footer');
	}
	public function asistenciali($materia)
	{
		$periodo=$this->uri->segment(4);
		$data2 = array(
			'tiempo_pre' => $this->Tiempo_preinscripcion_model->gettiempo_preinscripcion(),

		);	
		
			//echo $materia;

		$oferta=$this->Oferta_academica_model->getBuscarofertali($materia,$periodo);
		foreach($oferta as $oferta){
			$data = array(
				'matricula'			=> $this->Materias_preinscrita_model->Materias_inscritasli($materia,$periodo),
				'periodo' 			=> $this->Periodo_model->getIdperiodonotas($periodo),
				'unidad_curricular' => $this->Pensum_model->getnombrePensum($oferta->id_pensum),
				'docente'    		=> $this->Docente_model->getBuscarDocente($oferta->id_docente),
				'oferta'			=> $oferta,
				'tipo'				=> 'linea',
			);	
		}
		$this->load->view('layouts/header');
		$this->load->view('layouts/sidebar',$data2);
		$this->load->view('docente/plan_clases/asistencia',$data);// asistencia
		$this->load->view('layouts/footer');
	}
	public function notas($materia)
	{
		$revision=$this->uri->segment(4);
		$total=count($this->Materias_preinscrita_model->Materias_inscritas($materia));
		$data2 = array(
			'tiempo_pre' => $this->Tiempo_preinscripcion_model->gettiempo_preinscripcion(),

		);	
		$oferta=$this->Oferta_academica_model->getBuscaroferta($materia);
		$notas				= $this->Notas_academica_model->getBuscarnotas($materia);
		$proceso_cerrado	= $this->Notas_academica_model->getEstadoProceso($materia,1);
$cerrado=0;

//echo count($notas);
//var_dump( $proceso_cerrado);
//echo count($proceso_cerrado);
if(!$proceso_cerrado){
	 $cerrado=0;
}else{
	if(count($notas)==count($proceso_cerrado)){
		$cerrado=1;
	}else{
		$cerrado=0;
	}
}
		

		$data = array(
	
			'periodo' 			=> $this->Periodo_model->getIdperiodonotas($oferta->id_periodo),
			'unidad_curricular' => $this->Pensum_model->getnombrePensum($oferta->id_pensum),
			'docente'    		=> $this->Docente_model->getBuscarDocente($oferta->id_docente),
			'notas'				=> $this->Notas_academica_model->getBuscarnotas($materia),
			'oferta_academica'	=> $materia,
			'proceso_cerrado'	=> $cerrado,
			'rol_usuario'		=>$this->Usuarios_model->buscar_usuario($this->session->userdata('id')),
			'revision'=>$revision,
		);
		//var_dump($data)	;
		$this->load->view('layouts/header');
		$this->load->view('layouts/sidebar',$data2);

		
			if($materia=='301' or $materia=='303'  ){
				$this->load->view('docente/plan_clases/notas_esp',$data);// registrar notas especiales carga especial de notal mas de 4 evauaciones
			}elseif( $materia=='348' or $materia=='349'){
				$this->load->view('docente/plan_clases/notas_esp1',$data);// registrar notas especiales carga especial de notal mas de 4 evauaciones
			}elseif($oferta->id_periodo <=11){
				$this->load->view('docente/plan_clases/notas_anterior',$data);// registrar notas sep diciembre 2022 al Junio agosto 2023
			
			}else{
				if($total==1){
				//	echo  "Un registro";
					$this->load->view('docente/plan_clases/notas_1',$data);// registrar notas apartir del Octubre Diciembre 2023
				}else{
				//	echo  "Varios registro";
					$this->load->view('docente/plan_clases/notas_1_1',$data);// registrar notas apartir del Octubre Diciembre 2023
				}
			}
		

		$this->load->view('layouts/footer');
	}
	public function notasli($materia,$periodo)
	{
	
		$revision=$this->uri->segment(5);
		$data2 = array(
			'tiempo_pre' => $this->Tiempo_preinscripcion_model->gettiempo_preinscripcion(),
		);	
		$oferta=$this->Oferta_academica_model->getBuscarofertali($materia,$periodo);
		$notas	= $this->Notas_academica_model->getBuscarnotasli($materia,$periodo);
		//echo "Proceso cerrado:".count($notas)	;

		$proceso_cerrado	= $this->Notas_academica_model->getEstadoProcesoli($materia,$periodo,1);
		//echo "Proceso cerrado:". count($proceso_cerrado);

		if(count($notas)==count($proceso_cerrado)){
		$cerrado=1;
		}else{
			$cerrado=0;
		}
	

	foreach($oferta as $oferta){
		
		
		$data = array(
	
			'periodo' 			=> $this->Periodo_model->getIdperiodonotas($periodo),
			'unidad_curricular' => $this->Pensum_model->getnombrePensum($oferta->id_pensum),
			'docente'    		=> $this->Docente_model->getBuscarDocente($oferta->id_docente),
			'notas'				=> $this->Notas_academica_model->getBuscarnotasli($materia,$periodo),
			'oferta_academica'	=> $materia,
			'proceso_cerrado'	=> $cerrado,		
			'rol_usuario'		=>$this->Usuarios_model->buscar_usuario($this->session->userdata('id')),
			
		);
		
	}

		$this->load->view('layouts/header');
		$this->load->view('layouts/sidebar',$data2);
		$this->load->view('docente/plan_clases/notas_lineas',$data);
		$this->load->view('layouts/footer');
	}
	public function guardar_notas()
	{
		 $retiro =$this->input->post('retiro');
		 $obs=$this->input->post('observaciones');
		 $id_materias_preinscrita=$this->input->post('id_materias_preinscrita');
		 $id_oferta_academica=$this->input->post('id_oferta_academica');
		 $definitiva=$this->input->post("final");
		 $nota_1				  =$this->input->post("nota1");
		 $nota_2				  =$this->input->post("nota2");
		 $nota_3				  =$this->input->post("nota3");
		 $nota_4				  =$this->input->post("nota4");
		 $nota_5				  =$this->input->post("nota5");
		 $nota_6				  =$this->input->post("nota6");
		 $nota_7				  =$this->input->post("nota7");
		 $nota_8				  =$this->input->post("nota8");
		 $nota_9				  =$this->input->post("nota9");
		 $nota_final			  =$this->input->post("final");
 //var_dump($nota_final);
 //var_dump( $obs);
        // Verifica si se enviaron datos y procesa el array
		$i=0;
        if ( is_array($retiro)) {
			foreach ($retiro as $retiro) {
			//	echo "El " . $retiro. " tipo de retiro " ."<br>";
			
              //echo "Valor recibido: " . htmlspecialchars($datos) . "<br>";
			
			if ($retiro=='1')$observaciones='RETIRO VOLUNTARIO';
			if ($retiro=='2')$observaciones='RETIRO MATRÍCULA POR CAUSALES ACADÉMICAS';
			if ($retiro=='3')$observaciones='DECISIÓN CAIP';
			if ($retiro=='0')$observaciones=$obs[$i];		
	//echo "la observacion es:".$observaciones.'<br>' ;
	
			//if ($this->input->post('retiro')==2 or $this->input->post('retiro')==3 ){
			if ( $retiros=='3'or $retiros==2){
				$data = array(
					'id_materias_preinscrita' =>$id_materias_preinscrita[$i],
					'id_oferta_academica' 	  =>$id_oferta_academica,
					'nota_1'				  =>1,
					'nota_2'				  =>1,
					'nota_3'				  =>1,
					'nota_4'				  =>1,
					'nota_5'				  =>1,
					'nota_6'				  =>1,
					'nota_7'				  =>1,
					'nota_8'				  =>1,
					'nota_9'				  =>1,
					'nota_final'			  =>1,
					'quien_registro'		=>$this->session->userdata('id'),
					'observaciones'		=>$observaciones,
				);	
				$asistencia=array('asistencia'=>1);
			}else{
				if($retiros==1 ){
					$data = array(                 
							'id_materias_preinscrita' =>$id_materias_preinscrita[$i],
							'id_oferta_academica' 	  =>$id_oferta_academica,
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
							'quien_actualizo'                 =>$this->session->userdata('id'),
							'fecha_actualizacion'     =>$fecha,
							'observaciones'         =>$observaciones,
							);  
					$asistencia=array('asistencia'=>0);
				}else{
					$data = array(
						'id_materias_preinscrita' =>$id_materias_preinscrita[$i],
						'id_oferta_academica' 	  =>$id_oferta_academica,
						'nota_1'				  =>$nota_1[$i],
						'nota_2'				  =>$nota_2[$i],
						'nota_3'				  =>$nota_3[$i],
						'nota_4'				  =>$nota_4[$i],
						'nota_5'				  =>$nota_5[$i],
						'nota_6'				  =>$nota_6[$i],
						'nota_7'				  =>$nota_7[$i],
						'nota_8'				  =>$nota_8[$i],
						'nota_9'				  =>$nota_9[$i],
						'nota_final'			  =>$nota_final[$i],
						'quien_registro'		  =>$this->session->userdata('id'),
						'observaciones'		      =>$observaciones,
					);	
					//$definitiva=$this->input->post("final");
					if($definitiva[$i] > 1  ){
						$asistencia=array('asistencia'=>1);
					}else{
						$asistencia=array('asistencia'=>0);
					}
				}
			}
			//var_dump($data);
				if(!$this->Notas_academica_model->getBuscarMaeteria($id_materias_preinscrita[$i])){
					$this->Notas_academica_model->save($data);					
				}else{			
					$this->Notas_academica_model->update_nota($id_materias_preinscrita[$i],$data);				
				}		
			$this->Materias_preinscrita_model->update_matricula($id_materias_preinscrita[$i],$asistencia);
			$i++;
           }
        } else {
            echo "Datos sin cargar.";
        }
   
			// Verificamos que se haya enviado el método POST
		
		$this->session->set_flashdata("warning","La Nota Evaluativa y la Asistencia del estudiante fue Actualizada con Éxito.");
		redirect(base_url()."dashboard06/notas/".$id_oferta_academica,"refresh");	
}
public function guardar_notas_lineas($id_materias_preinscrita,$id_oferta_academica)
	{
		$observaciones=$this->input->post("observaciones");
		$periodo=$this->input->post("periodo");

		if ($this->input->post('retiro')==1)$observaciones='RETIRO VOLUNTARIO';
		if ($this->input->post('retiro')==2)$observaciones='RETIRO MATRÍCULA POR CAUSALES ACADÉMICAS ';
		if ($this->input->post('retiro')==3)$observaciones='DECISIÓN CAIP';
		if ($this->input->post('retiro')==0)$observaciones=$this->input->post("observaciones");		
		$nota_1=$this->input->post("nota1");
		$nota_2=$this->input->post("nota2");
		$nota_3=$this->input->post("nota3");
		$total=$nota_1+$nota_2+$nota_3;

		if ($this->input->post('retiro')==0 and ROUND($total,0) == 20 )$observaciones="APROBADO" ;elseif($this->input->post('retiro')==0 and ROUND($total,0) < 20) $observaciones="NO APROBADO";		
		//if ($this->input->post('retiro')==2 or $this->input->post('retiro')==3 ){
		if ($this->input->post('retiro')==3 ){
			$data = array(
				'id_materias_preinscrita' =>$id_materias_preinscrita,
				'id_oferta_academica' 	  =>$id_oferta_academica,
				'nota_1'				  =>1,
				'nota_2'				  =>1,
				'nota_3'				  =>1,
				
				'nota_final'			  =>1,
				'quien_registro'		=>$this->session->userdata('id'),
				'observaciones'		=>$observaciones,
			);	
			$asistencia=array('asistencia'=>1);
		}else{
			if($this->input->post('retiro')==1 or $this->input->post('retiro')==2){
				$data = array(                 
						'id_materias_preinscrita' =>$id_materias_preinscrita,
						'id_oferta_academica' 	  =>$id_oferta_academica,
						'nota_1'                                  =>NULL,
						'nota_2'                                  =>NULL,
						'nota_3'                                  =>NULL,
						
						'nota_final'                      =>NULL,
						'quien_actualizo'                 =>$this->session->userdata('id'),
						'fecha_actualizacion'     =>$fecha,
						'observaciones'         =>$observaciones,
						);  
				$asistencia=array('asistencia'=>0);
			}else{
				
$asistencia=array('asistencia'=>1);
				
				$data = array(
					'id_materias_preinscrita' =>$id_materias_preinscrita,
					'id_oferta_academica' 	  =>$id_oferta_academica,
					'nota_1'				  =>$this->input->post("nota1"),
					'nota_2'				  =>$this->input->post("nota2"),
					'nota_3'				  =>$this->input->post("nota3"),					
					'nota_final'			  =>$total,
					'quien_registro'		  =>$this->session->userdata('id'),
					'observaciones'		      =>$observaciones,
				);	
				$definitiva=$total;
			
				if(ROUND($definitiva,0) == 20  ){
					$asistencia=array('asistencia'=>1);
				}else{
					$asistencia=array('asistencia'=>0);
				}
			
			}
		}
		//var_dump($data);
			if(!$this->Notas_academica_model->getBuscarMaeteria($id_materias_preinscrita)){
				$this->Notas_academica_model->save($data);					
			}else{			
				$this->Notas_academica_model->update_nota($id_materias_preinscrita,$data);				
			}		
		$this->Materias_preinscrita_model->update_matricula($id_materias_preinscrita,$asistencia);
		$this->session->set_flashdata("warning","La Nota Evaluativa y la Asitencia del estudiante fue Actualizada con Éxito.");
		redirect(base_url()."dashboard06/notasli/".$id_oferta_academica."/".$periodo,"refresh");	
}
	public function evaluacion($materia)//plan de evaluaciones /*se actaulizo 28-06-2023 */
	{
		$data2 = array(
			'tiempo_pre' => $this->Tiempo_preinscripcion_model->gettiempo_preinscripcion(),

		);	
		$periodo=$this->uri->segments[4];
		$oferta=$this->Oferta_academica_model->getBuscaroferta($materia);

		$data = array(
	
			'periodo' 			=> $this->Periodo_model->getIdperiodonotas($oferta->id_periodo),
			'unidad_curricular' => $this->Pensum_model->getnombrePensum($oferta->id_pensum),
			'docente'    		=> $this->Docente_model->getBuscarDocente($oferta->id_docente),
			'eva'				=> $this->Plan_evaluacion_model->getBuscarplan($materia),
			'oferta_academica'	=> $materia,
		);
		//var_dump($data['eva'])	;
		$this->load->view('layouts/header');
	$this->load->view('layouts/sidebar',$data2);
/*	if($materia=='301' or $materia=='303'){
		$this->load->view('docente/plan_clases/plan_evaluacion_esp',$data);// registrar plan  especiales
	}elseif( $materia=='348' or $materia=='349'){
		$this->load->view('docente/plan_clases/plan_evaluacion_esp1',$data);
	}else{
		$this->load->view('docente/plan_clases/plan_evaluacion',$data);
	}
*/
if($oferta->id_periodo<11){
			if($materia=='301' or $materia=='303'){
				$this->load->view('docente/plan_clases/plan_evaluacion_esp',$data);// registrar plan  especiales
			}elseif( $materia=='348' or $materia=='349'){
				$this->load->view('docente/plan_clases/plan_evaluacion_esp1',$data);
			}else{
				$this->load->view('docente/plan_clases/plan_evaluacion',$data);
			}			
	}else{
		
			$this->load->view('docente/plan_clases/plan_evaluacion_1_1',$data);
		
	}

		$this->load->view('layouts/footer');
	
	}
	public function evaluacionli($materia,$periodo)//plan de evaluaciones /*se actaulizo 18-09-2025 */
	{
		$data2 = array(
			'tiempo_pre' => $this->Tiempo_preinscripcion_model->gettiempo_preinscripcion(),
		);	
		
		$oferta=$this->Oferta_academica_model->getBuscarofertali($materia,$periodo);
		//var_dump($oferta);
		foreach($oferta as $oferta){
				$data = array(
			
					'periodo' 			=> $this->Periodo_model->getIdperiodonotas($periodo),
					'unidad_curricular' => $this->Pensum_model->getnombrePensum($oferta->id_pensum),
					'docente'    		=> $this->Docente_model->getBuscarDocente($oferta->id_docente),
					'eva'				=> $this->Plan_evaluacion_model->getBuscarplanli($materia,$periodo),
					'materia'			=> $materia,
				);
		}
	//	var_dump($data)	;
		$this->load->view('layouts/header');
		$this->load->view('layouts/sidebar',$data2);
		$this->load->view('docente/plan_clases/plan_evaluacion_linea',$data);
		$this->load->view('layouts/footer');
	
	}
	public function guardar_evaluacionli($materia,$periodo)/*se actaulizo 28-06-2023 */
	{
		//	echo "oferta". $materia." ".$periodo;
			$oferta=$this->Oferta_academica_model->getBuscarofertali($materia,$periodo);
			//var_dump($oferta);
		//	echo $id_plan=$this->input->post("id_plan");
			$insert=0;
			$update=0;
		foreach($oferta as $oferta){
		//	echo $oferta->id_oferta."</br>";
		$data = array(			
			'id_oferta_academica' =>$oferta->id_oferta,
			'nota1'				=>$this->input->post("nota1"),
			'tipo_evaluacion1'	=>$this->input->post("tipo_evaluacion1"),
			'fecha_evaluacion1'	=>$this->input->post("fecha_evaluacion1"),	
			'nota2'				=>$this->input->post("nota2"),
			'tipo_evaluacion2'	=>$this->input->post("tipo_evaluacion2"),
			'fecha_evaluacion2'	=>$this->input->post("fecha_evaluacion2"),	
			'nota3'				=>$this->input->post("nota3"),
			'tipo_evaluacion3'	=>$this->input->post("tipo_evaluacion3"),
			'fecha_evaluacion3'	=>$this->input->post("fecha_evaluacion3"),	
				
			'quien_registro'	=>$this->session->userdata('id'),
			
		);	
	//	var_dump($data);
	$plan=$this->Plan_evaluacion_model->getBuscarplan($oferta->id_oferta);
//var_dump($plan);
//	echo "Plan->>".$plan->id_evaluacion;
		if(!$plan){
			$this->Plan_evaluacion_model->save($data);
			$insert=1;
		}else{
	
			$fecha=date("Y-m-d H:i:s");
			$data2 = array(			
				'nota1'				=>$this->input->post("nota1"),
				'tipo_evaluacion1'	=>$this->input->post("tipo_evaluacion1"),
				'fecha_evaluacion1'	=>$this->input->post("fecha_evaluacion1"),	
				'nota2'				=>$this->input->post("nota2"),
				'tipo_evaluacion2'	=>$this->input->post("tipo_evaluacion2"),
				'fecha_evaluacion2'	=>$this->input->post("fecha_evaluacion2"),	
				'nota3'				=>$this->input->post("nota3"),
				'tipo_evaluacion3'	=>$this->input->post("tipo_evaluacion3"),
				'fecha_evaluacion3'	=>$this->input->post("fecha_evaluacion3"),	
								
				'quien_actualizo'	=>$this->session->userdata('id'),
				'fecha_actualizacion'  	=>$fecha,
			
			);	
			if($this->Plan_evaluacion_model->update($plan->id_evaluacion,$data2)){
				$update=2;
			}
		}
		

		}
		if($insert==1 or $update==2)	{	
			$this->session->set_flashdata("warning","Plan evaluación Actualizado con Éxito.".$insert.$update);
				redirect(base_url()."dashboard06/evaluacionli/".$materia."/".$periodo,"refresh");
			
			}else{
				$this->session->set_flashdata("error","Error al guardar información del Plan de Evaluación.");
				redirect(base_url()."dashboard06/evaluacionli/".$materia."/".$periodo,"refresh");
			
		}
		

	
	
	
	}
public function guardar_evaluacion($id_oferta_academica)/*se actaulizo 28-06-2023 */
	{
		echo "plan".$id_plan=$this->input->post("id");
		echo "oferta". $id_oferta_academica;
		$periodo=$this->input->post("periodo");
		$data = array(			
			'id_oferta_academica' =>$id_oferta_academica,
			'nota1'				=>$this->input->post("nota1"),
			'tipo_evaluacion1'	=>$this->input->post("tipo_evaluacion1"),
			'fecha_evaluacion1'	=>$this->input->post("fecha_evaluacion1"),	
			'nota2'				=>$this->input->post("nota2"),
			'tipo_evaluacion2'	=>$this->input->post("tipo_evaluacion2"),
			'fecha_evaluacion2'	=>$this->input->post("fecha_evaluacion2"),	
			'nota3'				=>$this->input->post("nota3"),
			'tipo_evaluacion3'	=>$this->input->post("tipo_evaluacion3"),
			'fecha_evaluacion3'	=>$this->input->post("fecha_evaluacion3"),	
			'nota4'				=>$this->input->post("nota4"),
			'tipo_evaluacion4'	=>$this->input->post("tipo_evaluacion4"),
			'fecha_evaluacion4'	=>$this->input->post("fecha_evaluacion4"),	
			'nota5'				=>$this->input->post("nota5"),
			'tipo_evaluacion5'	=>$this->input->post("tipo_evaluacion5"),
			'fecha_evaluacion5'	=>$this->input->post("fecha_evaluacion5"),	
			'nota6'				=>$this->input->post("nota6"),
			'tipo_evaluacion6'	=>$this->input->post("tipo_evaluacion6"),
			'fecha_evaluacion6'	=>$this->input->post("fecha_evaluacion6"),			
			'quien_registro'	=>$this->session->userdata('id'),
			
		);	
	//	var_dump($data);
	
		if(!$this->Plan_evaluacion_model->getBuscarplan($id_oferta_academica)){
		//	echo "insert";
			$this->Plan_evaluacion_model->save($data);
			$this->session->set_flashdata("success","Plan evaluación Cargado con Éxito.");
			redirect(base_url()."dashboard06/evaluacion/".$id_oferta_academica,"refresh");
		}else{
		//	echo "update";
			$fecha=date("Y-m-d H:i:s");
			$data2 = array(			
				'nota1'				=>$this->input->post("nota1"),
				'tipo_evaluacion1'	=>$this->input->post("tipo_evaluacion1"),
				'fecha_evaluacion1'	=>$this->input->post("fecha_evaluacion1"),	
				'nota2'				=>$this->input->post("nota2"),
				'tipo_evaluacion2'	=>$this->input->post("tipo_evaluacion2"),
				'fecha_evaluacion2'	=>$this->input->post("fecha_evaluacion2"),	
				'nota3'				=>$this->input->post("nota3"),
				'tipo_evaluacion3'	=>$this->input->post("tipo_evaluacion3"),
				'fecha_evaluacion3'	=>$this->input->post("fecha_evaluacion3"),	
				'nota4'			=>$this->input->post("nota4"),
				'tipo_evaluacion4'	=>$this->input->post("tipo_evaluacion4"),
				'fecha_evaluacion4'	=>$this->input->post("fecha_evaluacion4"),	
				'nota5'			=>$this->input->post("nota5"),
				'tipo_evaluacion5'	=>$this->input->post("tipo_evaluacion5"),
				'fecha_evaluacion5'	=>$this->input->post("fecha_evaluacion5"),	
				'tipo_evaluacion6'	=>$this->input->post("tipo_evaluacion6"),
				'fecha_evaluacion6'	=>$this->input->post("fecha_evaluacion6"),						
				'quien_actualizo'	=>$this->session->userdata('id'),
				'fecha_actualizacion'  	=>$fecha,
			
			);	
		//	echo $id_plan;
			if($this->Plan_evaluacion_model->update($id_plan,$data2)){
				$this->session->set_flashdata("warning","Plan evaluación Actualizado con Éxito.");
				redirect(base_url()."dashboard06/evaluacion/".$id_oferta_academica."/".$periodo,"refresh");
			}else{
				$this->session->set_flashdata("error","Plan evaluación Actualizado con ÉxitNo se pudo guardar información del Plan de Evaluación.");
				redirect(base_url()."dashboard06/evaluacion/".$id_oferta_academica."/".$periodo,"refresh");
			}
			

		}
		

	
	
	
	}
	public function act_matricula($id_matricula,$id_periodo)
	{
		
			$data2 = array(
			'tiempo_pre' => $this->Tiempo_preinscripcion_model->gettiempo_preinscripcion(),

		);	
		$id_usuario = $this->session->userdata('id');	
		//$periodo	= $this->Periodo_model->PeriodoActivoNotas();			

		$data = array(
			
			'matricula'	=> $this->Materias_preinscrita_model->verificar_matricula($id_matricula),
			'periodo'=> $this->Periodo_model->getIdperiodonotas($id_periodo),
			'estudiante'=> $this->Materias_preinscrita_model->verificar_matricula($id_matricula),
		);	
		
		$this->load->view('layouts/header');
		$this->load->view('layouts/sidebar',$data2);
		$this->load->view('supervisor/plan_clases/act_matricula',$data);// actaulizar estatus del estudiante
		$this->load->view('layouts/footer');	
		

	
	}
	public function cambiar_estatus($id_matricula,$id_periodo)
	{
		
			$fecha=date("Y-m-d H:i:s");
			$data2 = array(			
				'retiro'			=>$this->input->post("retiro"),							
				'quien_actualizo'		=>$this->session->userdata('id'),
				'fecha_actualizacion'  	=>$fecha,
			
			);	
		//	var_dump($data2);
			if($this->Materias_preinscrita_model->update_matricula($id_matricula, $data2)){

				$oferta_academica=$this->Materias_preinscrita_model->ver_materia($id_matricula);

				if($this->input->post("retiro")==1 ){
					 $observaciones='RETIRO VOLUNTARIO';
				}
				if($this->input->post("retiro")==0 ){
					$observaciones='';
			   }
				if($this->input->post("retiro")==2 ){
					 $observaciones='RETIRO MATRÍCULA POR CAUSALES ACADÉMICAS (Parágrafo Uno del artículo 112)';				
				}
				if($this->input->post("retiro")==3 ){
					 $observaciones='DECISIÓN CAIP';				
				}
				//var_dump($oferta_academica);
				if($this->input->post("retiro")==1  ){//retiro voluntario o retiro matricula por causales academicas 
					$data = array(                 
						'id_materias_preinscrita' =>$id_matricula,
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
						'quien_actualizo'                 =>$this->session->userdata('id'),
						'fecha_actualizacion'     =>$fecha,
						'observaciones'         =>$observaciones,
						);  
						$asistencia=array('asistencia'=>0);		

							
				}
				if($this->input->post("retiro")==3 or $this->input->post("retiro")==2  ){
					$data = array(
						'id_materias_preinscrita' =>$id_matricula,
						'id_oferta_academica' 	  =>$oferta_academica->id_oferta_academica,
						'nota_1'				  =>1,
						'nota_2'				  =>1,
						'nota_3'				  =>1,
						'nota_4'				  =>1,
						'nota_5'				  =>1,
						'nota_6'				  =>1,
						'nota_7'				  =>1,
						'nota_8'				  =>1,
						'nota_9'				  =>1,
						'nota_final'			  =>1,
						'quien_actualizo'		=>$this->session->userdata('id'),
						'observaciones'		=>$observaciones,
					);	
					$asistencia=array('asistencia'=>1);
				}
				if($this->input->post("retiro")==0 ){
					$data = array(
						'id_materias_preinscrita' =>$id_matricula,
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
						'quien_actualizo'		=>$this->session->userdata('id'),
						'observaciones'		=>$observaciones,
					);	
					$asistencia=array('asistencia'=>0);
				}

				if(!$this->Notas_academica_model->getBuscarMaeteria($id_matricula)){
				//	echo "Insert <br>";
					$nota_cargada=$this->Notas_academica_model->save($data);					
				}else{			
					$nota_cargada=$this->Notas_academica_model->update_nota($id_matricula,$data);			
				//	echo "Update <br>";	
				}		
			//	var_dump($nota_cargada);
				if($nota_cargada){
					$this->Materias_preinscrita_model->update_matricula($id_matricula,$asistencia);
					$this->session->set_flashdata("warning","La matrícula fue Actualizada con Éxito.");
					redirect(base_url()."dashboard06/act_matricula/".$id_matricula.'/'.$id_periodo,"refresh");
				
				}else{
					$this->session->set_flashdata("error","Error al guarda la información nota matrícula.");
					redirect(base_url()."dashboard06/act_matricula/".$id_matricula.'/'.$id_periodo,"refresh");
				}
			}else{
				$this->session->set_flashdata("error","Error al guarda la información.");
				redirect(base_url()."dashboard06/act_matricula/".$id_matricula.'/'.$id_periodo,"refresh");
			}
		
	
	}
	public function constancia()
	{
		$data2 = array(
			'tiempo_pre' => $this->Tiempo_preinscripcion_model->gettiempo_preinscripcion(),

		);	
		$id_usuario = $this->session->userdata('id');
		$docente    = $this->Docente_model->getusuario_Docente($id_usuario);
		$periodo	= $this->Periodo_model->PeriodoActivoNotas();
		
		
		

		$data = array(
			
			'unidades_curriculares'	=> $this->Oferta_academica_model->unidades_curriculares_docente($periodo->id,$docente->id),

		);	
		$this->load->view('layouts/header');
		$this->load->view('layouts/sidebar',$data2);
		$this->load->view('docente/plan_clases/constancia',$data);// constancia docente
		$this->load->view('layouts/footer');
	}

	
			


public function proceso_perfil()
	{
		$id_usuario = $this->session->userdata("id");
		$menu_notas=false;

		$data2 = array(
			'tiempo_pre' => $this->Tiempo_preinscripcion_model->gettiempo_preinscripcion(),
		);	
		$docente=$this->Docente_model->getusuario_Docente($id_usuario);
		$data = array(
				'datos_docente' 	=>$this->Docente_model->getusuario_Docente($id_usuario),
				'datos_academicos' 	=>$this->Academico_model->getusuario_Academico($id_usuario),
				'domicilio' 		=>$this->Direccion_model->getListaDireccion($id_usuario),
				'trabajo'			=>$this->Trabajo_model->getListaTrabajo($id_usuario,1),
				'datos_bancarios'	=>$this->Registro_bancario_model->getusuario_bancario($id_usuario),
				'requisitos_todos'	=>$this->Control_requisitos_docente_model->getControl_requisitos_doc1($docente->id,$id_usuario)
		);	
		if (count($data['datos_docente'])>0){
			
			//	var_dump($data);
			
			if (!($data['datos_academicos'] ) or !($data['domicilio'] ) or !($data['trabajo'] ) or !($data['datos_bancarios'] )){
				 //datos no  actualizados
				$data['actualizar']=false;
			 }else{

				$data['actualizar']=true; //datos actualizados
			}
		}
	//var_dump($data['requisitos_todos']);		
			if (count($data['requisitos_todos'])>0 and (count($data['requisitos_todos'])>=6 and count($data['requisitos_todos'])<=7)){			
			
				$data['requisitos']=true; //requisitos actualizados
			}else{
				 //requisitos no  actualizados
					$data['requisitos']=false;
			}
		if($data['requisitos']==true and $data['requisitos']==true)$data2['menu_notas']=true;

		$this->load->view('layouts/header');
		$this->load->view('layouts/sidebar',$data2);
		$this->load->view('docente/datos/proceso_perfil',$data,$actualizar);// proceso del perfil docente
		$this->load->view('layouts/footer');
	}


public function proceso_plan()
	{
		$id_usuario = $this->session->userdata('id');
		$docente    = $this->Docente_model->getusuario_Docente($id_usuario);
		$periodo	= $this->Periodo_model->PeriodoActivoNotas();
		
		$data = array(			
			'unidades_curriculares'	=> $this->Oferta_academica_model->unidades_curriculares_docente($periodo->id,$docente->id),
			
			
		);
		foreach($data['unidades_curriculares'] as $uc){// verifico matricula de cada materia y verifico ls csrgs de notas
			$materia=$uc->id;			
			$matricula=count($this->Materias_preinscrita_model->Materias_inscritas($materia));	
			$data['matricula']=$matricula;
			$notas	=$this->Notas_academica_model->getEstadoProceso($materia,0);
			$notas_registradas= count($notas);
			//echo"matricula de :".$matricula." notas registradas:".$notas_registradas;
			if(!$notas){
				$notas_cerrado	=$this->Notas_academica_model->getEstadoProceso($materia,1);
				if($notas_cerrado>0){
					$data['nota_final']=true;
				}else{		
					$data['nota_final']=false;
				}
			}else{
				$data['nota_final']=false;
			}
		}
		$data2 = array(
			'tiempo_pre' => $this->Tiempo_preinscripcion_model->gettiempo_preinscripcion(),

		);	
		//var_dump($data);
		$this->load->view('layouts/header');
		$this->load->view('layouts/sidebar',$data2);
		$this->load->view('docente/plan_clases/proceso_plan_clases',$data);// proceso del plan de clases
		$this->load->view('layouts/footer');
	}

public function descargar_constancia_docente()
	{
		$id_usuario = $this->session->userdata("id");
		
		if( $this->uri->segment(3)==NULL){
			$materia=$this->input->post("unidad_curricular");
		}else{
			$materia=$this->uri->segment(3);
			
		}

		$docente=	 $this->Docente_model->getusuario_Docente($id_usuario);
		$periodo=	$this->Periodo_model->PeriodoActivoNotas();
		$control=	$this->Control_constancia_model->getConstancia($docente->id,$periodo->id,$materia);
		$matricula=	count($this->Materias_preinscrita_model->Materias_inscritas($materia));	
		$notas	=	count($this->Notas_academica_model->getEstadoProceso($materia,1));
		$plan   =	$this->Plan_evaluacion_model->getBuscarplan($materia);
//		echo $plan;
//		echo $notas;
//		echo $matricula;

//		if(($matricula == $notas) && ($plan <>false) ){		
	if ($plan <>false) {		
			if(!$control){
				$constancia=$this->Nro_constancia_model->getNroConstancia(2);
				//var_dump($constancia);
				$correlativo=str_pad($constancia->correlativo, 3, "0", STR_PAD_LEFT);
				$anio=$constancia->anio;
				 $nro='ENFMP-DIP-CP-'.$correlativo.'-'.$anio;
				 $veces=$control->veces_impresion+1;
				$data_nro=array('id_docente'=>$docente->id,
							'nro_constancia'=>$nro,
							'id_oferta_academica'=>$materia,
							'quien_solicito'=>$id_usuario ,
							'id_periodo'=>$periodo->id,
							'veces_impresion'=>$veces,
				);
				//var_dump($data_nro);
				$this->Control_constancia_model->save($data_nro);
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
					$this->Control_constancia_model->update($control->id,$control->id_periodo,$control->id_docente,$data_nro);
			}
			$data2 = array(
			'tiempo_pre' => $this->Tiempo_preinscripcion_model->gettiempo_preinscripcion(),

		);	
		$fecha=daTE("d-m-Y");
		$fecha_letra=$this->fechaEs($fecha);

		$data = array(
			
			'datos_docente' => $this->Docente_model->getusuario_Docente($id_usuario),
			'oferta'		=>	$this->Oferta_academica_model->getBuscaroferta_programa($materia),
			'nro'			=> $nro,
			'fecha_letra'	=>$fecha_letra,
		);	
		//var_dump($data);

		$hoy = date("dmyhis");
		
         $html = $this->load->view('docente/documentos/constancia_docente',$data,true);		
 	
        //this the the PDF filename that user will get to download
        $pdfFilePath = "constancia_docente_".$hoy.".pdf";
 
        //load mPDF library
        $this->load->library('M_pdf');
        $mpdf = new mPDF('c', 'Letter-P'); 
$mpdf->SetProtection(array('copy','print'), '', 't3n0l0g143n7m9');
 		$mpdf->WriteHTML($html);
				
		$mpdf->Output($pdfFilePath, "D");
		}else{
//			$this->session->set_flashdata("error","El plan de Evaluación y/o Notas Académicas no han sido cargadas en su totalidad.");
			$this->session->set_flashdata("error","El plan de Evaluación no ha sido cargado en su totalidad.");
			redirect(base_url()."dashboard06/constancia",refresh);
		}

		
	
	}

public function cerrar_proceso()
	{
		$id_usuario = $this->session->userdata('id');
		$docente    = $this->Docente_model->getusuario_Docente($id_usuario);
		//$periodo	= $this->Periodo_model->PeriodoActivoNotas();
		$materia    = $this->uri->segment(3);
	
		$matricula 			=count($this->Materias_preinscrita_model->Materias_inscritas($materia));
		$notas	=$this->Notas_academica_model->getEstadoProceso($materia,array(0,1));
		$notas_registradas= count($notas);
	//	echo"matricula de :".$matricula." notas registradas:".$notas_registradas;
		if(!$notas){			
			$this->session->set_flashdata("error","Debe Cargar las Notas Académicas de toda la Matrícula Estudiantil.");
			redirect(base_url()."dashboard06/notas/".$materia,"refresh");			
			
		}else{	
			if($matricula==$notas_registradas){			
					

				foreach($notas as $notas){
					$fecha=date("Y-m-d H:i:s");
					$data2=array(	'cerrar_proceso'=>1,
									'fecha_actualizacion'=>$fecha,
									'quien_actualizo'=>$id_usuario	);
					$this->Notas_academica_model->update_nota($notas->id_materias_preinscrita,$data2);
				}
				$this->session->set_flashdata("info","El proceso de Registro de Notas Académicas ha sido CERRADO. <br><b> Si desea desbloquearlo debe dirigirse al Administrador del sistema</b>");
				redirect(base_url()."dashboard06/notas/".$materia,"refresh");
				//mesaje estas seguro y actualizo notas con estado Cero
			}else{
				$this->session->set_flashdata("error","Debe Cargar las Notas Académicas de toda la Matrícula Estudiantil.");
				redirect(base_url()."dashboard06/notas/".$materia,"refresh");


			}
		}
			

	}
	public function activar_proceso()
	{
		$id_usuario = $this->session->userdata('id');
		//$periodo	= $this->Periodo_model->PeriodoActivoNotas();
		$materia    = $this->uri->segment(3);
		$fecha=date("Y-m-d H:i:s");
		$data2=array(	'cerrar_proceso'=>0,'observaciones'=>'',
		'fecha_actualizacion'=>$fecha,
		'quien_actualizo'=>$id_usuario	);
		if($this->Notas_academica_model->activar_nota($materia,$data2)){
			$this->session->set_flashdata("success","Proceso de Registro de Notas se Activó con Ëxito!!.");
				redirect(base_url()."dashboard06/notas/".$materia,"refresh");	
			}else{
					$this->session->set_flashdata("error","Error al intentar Activar Proceso.");
				redirect(base_url()."dashboard06/notas/".$materia,"refresh");
			}

	}
	public function cerrar_procesoli()
	{
		$id_usuario = $this->session->userdata('id');
		$docente    = $this->Docente_model->getusuario_Docente($id_usuario);
		$materia    = $this->uri->segment(3);
		$periodo= $this->uri->segment(4);
		 $estado=array(0,1);
		$matricula 	=		count($this->Materias_preinscrita_model->Materias_inscritasli($materia,$periodo));
		$notas		=		$this->Notas_academica_model->getEstadoProcesoli($materia,$periodo,$estado);
		$notas_registradas= count($notas);
	//echo"matricula de :".$matricula." notas registradas:".$notas_registradas;
	
			if($matricula==$notas_registradas){		
				foreach($notas as $notas){
					$fecha=date("Y-m-d H:i:s");
					$data2=array(	'cerrar_proceso'=>1,
									'fecha_actualizacion'=>$fecha,
									'quien_actualizo'=>$id_usuario	);
					$this->Notas_academica_model->update_nota($notas->id_materias_preinscrita,$data2);
				}
				$this->session->set_flashdata("success","Proceso de Registro de Notas ha seido <b>CERRADO</b> con Ëxito!!.");
			redirect(base_url()."dashboard06/notasli/".$materia."/".$periodo,"refresh");
				//mesaje estas seguro y actualizo notas con estado Cero
			}else{
				$this->session->set_flashdata("error","Debe Cargar las Notas Académicas de toda la Matrícula Estudiantil.");
				redirect(base_url()."dashboard06/notasli/".$materia."/".$periodo,"refresh");
			}
		//}
			

	}
	public function activar_procesoli()
	{
		$id_usuario = $this->session->userdata('id');
		$docente    = $this->Docente_model->getusuario_Docente($id_usuario);
		
		 $materia    = $this->uri->segment(3);
		 $periodo= $this->uri->segment(4);
	
		

		$notas	=$this->Notas_academica_model->getEstadoProcesoli($materia,$periodo,'0,1');
	
		//echo"matricula de :".$matricula." notas registradas:".$notas_registradas;
		
		
					

				foreach($notas as $notas){
					$fecha=date("Y-m-d H:i:s");
					$data2=array(	'cerrar_proceso'=>0,
									'fecha_actualizacion'=>$fecha,
									'quien_actualizo'=>$id_usuario	);
					$this->Notas_academica_model->update_nota($notas->id_materias_preinscrita,$data2);
				}
				$this->session->set_flashdata("success","Proceso de Registro de Notas ha sido <b>ACTIVADO</b> con Ëxito!!.");
			redirect(base_url()."dashboard06/notasli/".$materia."/".$periodo,"refresh");
				//mesaje estas seguro y actualizo notas con estado Cero			
		
	}
	public function dPDF(){//notas academicas unidades curriculares
		$materia= $this->uri->segment(3);
		
		$nombre= 'notas';
		$oferta=$this->Oferta_academica_model->getBuscaroferta($materia);
		$periodo_oferta=$this->Oferta_academica_model->getBuscaroferta($materia);
		$notas_cerrado	=$this->Notas_academica_model->getEstadoProceso($materia,1);
		$matricula 		=$this->Materias_preinscrita_model->Materias_inscritas($materia);
		$nombre= 'notas'.$periodo_oferta->codigo;
		//echo $materia.'  '. var_dump($notas_cerrado).'   '.var_dump($matricula);
		if($periodo_oferta->id_periodo<=11){
			$data= array(	'notas'=>	$this->Notas_academica_model->getEstadoProceso($materia,array(0,1)),	 	
					 				'unidad_curricular' => $this->Pensum_model->getnombrePensum($oferta->id_pensum),		
					 				'nombre_archivo'=>$nombre,
					 				'materia'=>$materia,
									'oferta'=>$oferta,		 
					 							
								);
			$html = $this->load->view('docente/documentos/descarga_pdf_notas',$data,true);	
//load mPDF library
							$this->load->library('M_pdf');
							$mpdf = new mPDF('c', 'Letter-P'); 
							$mpdf->SetProtection(array('copy','print'), '', 't3n0l0g143n7m9');
							$mpdf->WriteHTML($html);							
							$mpdf->Output($pdfFilePath, "D");	
		}else{

			if(!$notas_cerrado or !$matricula){			
					$this->session->set_flashdata("error","Debe Cargar las Notas Académicas de toda la Matrícula Estudiantil .");
						redirect(base_url()."dashboard06/notas/".$materia,"refresh");
				}else{

					if(count($notas_cerrado)==count($matricula) ){
				//	echo"son iguales";
						$data= array(	'notas'=>	$this->Notas_academica_model->getEstadoProceso($materia,1),	 	
					 				'unidad_curricular' => $this->Pensum_model->getnombrePensum($oferta->id_pensum),		
					 				'nombre_archivo'=>$nombre,
					 				'materia'=>$materia,
									'oferta'=>$oferta,		 
					 				'eva'	=> $this->Plan_evaluacion_model->getBuscarplan($materia),				
								);
					///var_dump($data['eva']);
						if(!$data['eva']){
							$this->session->set_flashdata("error","Debe Cargar el Plan de Evaluación del Período Académico Vigente.");
								redirect(base_url()."dashboard06/notas/".$materia,"refresh");
						}else{
							// var_dump($data);
							$hoy = date("dmyhis");

						       if($oferta->id_periodo< 11){ 
								$html = $this->load->view('docente/documentos/descarga_pdf_notas',$data,true);	
							}else{
							
								$html = $this->load->view('docente/documentos/descarga_pdf_notas_1_1',$data,true);	
							
							}
					 	
							//this the the PDF filename that user will get to download
							$pdfFilePath = "notas_academicas_".$hoy.".pdf";
							if ( $this->session->userdata('rol')=='2')	{
							$data=array('impreso'=>1);
							$this->Oferta_academica_model->update_oferta($materia,$data);
							}
							//load mPDF library
							$this->load->library('M_pdf');
							$mpdf = new mPDF('c', 'Letter-P'); 
							$mpdf->SetProtection(array('copy','print'), '', 't3n0l0g143n7m9');
							$mpdf->WriteHTML($html);							
							$mpdf->Output($pdfFilePath, "D");		
							
					}
				}else{
					$this->session->set_flashdata("error","Debe Cargar las Notas Académicas de toda la Matrícula Estudiantil.");
					redirect(base_url()."dashboard06/notas/".$materia,"refresh");
				}
							
			}
		}
		
	}
	public function dPDF_lineas(){//notas academicas lineas
		 $materia= $this->uri->segment(3);
		 $periodo= $this->uri->segment(4);
		$nombre= 'notas_lineas';
		$oferta=$this->Oferta_academica_model->getBuscarofertali($materia,$periodo);
		$notas_cerrado	=$this->Notas_academica_model->getEstadoProcesoli($materia,$periodo,'1');
		$matricula 		=$this->Materias_preinscrita_model->Materias_inscritasli($materia,$periodo);
		//var_dump($materia);
		//var_dump($notas_cerrado);
		//var_dump($matricula);
//echo $materia.'  '.count($notas_cerrado).' '.count($matricula);
		if($notas_cerrado==0 or $matricula==0){			
			$this->session->set_flashdata("error","Debe Cargar las Notas Académicas de toda la Matrícula Estudiantil.");
			redirect(base_url()."dashboard06/notasli/".$materia."/".$periodo,"refresh");
		}else{

			if(count($notas_cerrado)==count($matricula) ){
				foreach($oferta as $oferta){
					$data= array(	'notas'=>	$this->Notas_academica_model->getEstadoProcesoli($materia,$periodo,1),	 	
									'unidad_curricular' => $this->Pensum_model->getnombrePensum($oferta->id_pensum),		
									'nombre_archivo'=>$nombre,
									'materia'=>$materia,
									'oferta'=>$oferta,		 
									'eva'	=> $this->Plan_evaluacion_model->getBuscarplanli($materia,$periodo),				
								);
					//	var_dump($data['eva']);
					if(!$data['eva']){
						$this->session->set_flashdata("error","Debe Cargar el Plan de Evaluación del Período Académico Vigente.");
						redirect(base_url()."dashboard06/notasli/".$materia."/".$periodo,"refresh");
					}else{
						// var_dump($data);
						$hoy = date("dmyhis");
						$html = $this->load->view('docente/documentos/descarga_pdf_notas_lineas',$data,true);							
					}
				}
				//this the the PDF filename that user will get to download
				$pdfFilePath = "notas_academicas_lineas".$hoy.".pdf";
				if ( $this->session->userdata('rol')=='2')	{
					$data=array('impreso'=>1);
					$this->Oferta_academica_model->update_oferta($materia,$data);
				}
				//load mPDF library
				$this->load->library('M_pdf');
				$mpdf = new mPDF('c', 'Letter-P'); 
				$mpdf->SetProtection(array('copy','print'), '', 't3n0l0g143n7m9');
				$mpdf->WriteHTML($html);							
				$mpdf->Output($pdfFilePath, "D");				
			}else{
				$this->session->set_flashdata("error","Debe Cargar las Notas Académicas de toda la Matrícula Estudiantil.");
				redirect(base_url()."dashboard06/notasli/".$materia."/".$periodo,"refresh");
			}						
		}
		
	}
	public function dPDF_esp(){//notas academicas maestrias
		$materia= $this->uri->segment(3);
		$nombre= 'notas';
		$oferta=$this->Oferta_academica_model->getBuscaroferta($materia);
		$notas_cerrado	=$this->Notas_academica_model->getEstadoProceso($materia,1);
		$matricula 		=$this->Materias_preinscrita_model->Materias_inscritas($materia);
		//echo $materia.'  '. $notas_cerrado.'   '.$matricula;
		if(!$notas_cerrado or !$matricula){			
				$this->session->set_flashdata("error","Debe Cargar las Notas Académicas de toda la Matrícula Estudiantil.");
					redirect(base_url()."dashboard06/notas/".$materia,"refresh");
			}else{

				if(count($notas_cerrado)==count($matricula) ){
				 $data= array(	'notas'=>	$this->Notas_academica_model->getEstadoProceso($materia,1),	 	
				 				'unidad_curricular' => $this->Pensum_model->getnombrePensum($oferta->id_pensum),		
				 				'nombre_archivo'=>$nombre,
				 				'materia'=>$materia,
				 				'oferta'=>$oferta,		 
				 				'eva'	=> $this->Plan_evaluacion_model->getBuscarplan($materia),				
				 			);
				//var_dump($data['eva']);
					if(!$data['eva']){
						$this->session->set_flashdata("error","Debe Cargar el Plan de Evaluación del Período Académico Vigente.");
							redirect(base_url()."dashboard06/notas/".$materia,"refresh");
					}else{
						// var_dump($data);
						$hoy = date("dmyhis");

				         $html = $this->load->view('docente/documentos/descarga_pdf_notas_esp',$data,true);	
				 	
				        //this the the PDF filename that user will get to download
				        $pdfFilePath = "notas_academicas_".$hoy.".pdf";
				 	 if ( $this->session->userdata('rol')=='2')	{
				        	$data=array('impreso'=>1);
	 					$this->Oferta_academica_model->update_oferta($materia,$data);
	 				}
				       //load mPDF library
				        $this->load->library('M_pdf');
				       $mpdf = new mPDF('c', 'Letter-P'); 
$mpdf->SetProtection(array('copy','print'), '', 't3n0l0g143n7m9');
				 		$mpdf->WriteHTML($html);							
						$mpdf->Output($pdfFilePath, "D");		
						
				}
			}else{
			$this->session->set_flashdata("error","Debe Cargar las Notas Académicas de toda la Matrícula Estudiantil.");
			redirect(base_url()."dashboard06/notas/".$materia,"refresh");
		}
						
		}
		
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
	
		if(count($matricula)>0){
			// var_dump($data);
			$hoy = date("dmyhis");
	         $html = $this->load->view('docente/documentos/descarga_pdf_matricula',$data,true);			 	
	        //this the the PDF filename that user will get to download
	        $pdfFilePath = "matricula_".$hoy.".pdf";
	 
	        //load mPDF library
	        $this->load->library('M_pdf');
	        $mpdf = new mPDF('c', 'Letter-P'); 
$mpdf->SetProtection(array('copy','print'), '', 't3n0l0g143n7m9');
	 		$mpdf->WriteHTML($html);					
			$mpdf->Output($pdfFilePath, "D");

		}else{
			$this->session->set_flashdata("error","Debe tener asignada la Matrícula Estudiantil.");
				redirect(base_url()."dashboard06/matricula_estudiantes/".$materia,"refresh");
		}
		
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
		 				'periodo'	=> $this->Periodo_model->getIdperiodonotas($oferta->id_periodo),
		 			);
		
	$this->load->view('docente/documentos/descarga_excel',$data);		
	
	
		
	}
public function dPDF_asistencia(){//asistencia en pdf
		 $materia= $this->uri->segment(3);
		$nombre= 'asistencia';
		$oferta=$this->Oferta_academica_model->getBuscaroferta($materia);		
		$matricula=$this->Materias_preinscrita_model->Materias_inscritas($materia);		
		 $data= array(
		 				'unidad_curricular' => $this->Pensum_model->getnombrePensum($oferta->id_pensum),		
		 				'nombre_archivo'=>$nombre,		 				
		 				'oferta'=>$oferta,			 				
		 				'matricula'	=> $matricula,
		 				'periodo'	=> $this->Periodo_model->getIdperiodonotas($oferta->id_periodo),
		 			);
	
		if(count($matricula)>0){
			// var_dump($data);
			$hoy = date("dmyhis");
	         $html = $this->load->view('docente/documentos/descarga_pdf_asistencia',$data,true);			 	
	        //this the the PDF filename that user will get to download
	        $pdfFilePath = "asitencia_".$hoy.".pdf";
	 
	        //load mPDF library
	        $this->load->library('M_pdf');
	        $mpdf = new mPDF('c', 'Letter-P'); 
$mpdf->SetProtection(array('copy','print'), '', 't3n0l0g143n7m9');
	 		$mpdf->WriteHTML($html);					
			$mpdf->Output($pdfFilePath, "D");
		}else{
			$this->session->set_flashdata("error","Debe tener asignada la Matrícula Estudiantil.");
				redirect(base_url()."dashboard06/matricula_estudiantes/".$materia,"refresh");
		}		
	}
public function dExcel_asistencia(){//asistencia en excel
		$materia= $this->uri->segment(3);
		$nombre= 'asistencia';
		$oferta=$this->Oferta_academica_model->getBuscaroferta($materia);		
		$matricula=$this->Materias_preinscrita_model->Materias_inscritas($materia);		
		 $data= array(
		 				'unidad_curricular' => $this->Pensum_model->getnombrePensum($oferta->id_pensum),		
		 				'nombre_archivo'=>$nombre,		 				
		 				'oferta'=>$oferta,			 				
		 				'matricula'	=> $matricula,
		 				'periodo'	=> $this->Periodo_model->getIdperiodonotas($oferta->id_periodo),
		 			);
		
	$this->load->view('docente/documentos/descarga_excel_asistencia',$data);		
	
	
		
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
	$meses_ES = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
	$meses_EN = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
	$nombreMes = str_replace($meses_EN, $meses_ES, $mes);
	return $numeroDia." de ".$nombreMes." de ".$anio;
}

public function buscar_plan_clases(){

	$id_usuario = $this->session->userdata("id");

	$docente=$this->Docente_model->getusuario_Docente($id_usuario);
	$data2 = array(
		'tiempo_pre' => $this->Tiempo_preinscripcion_model->gettiempo_preinscripcion(),

	);	
	
	$data = array(		
		'unidades_curriculares'	=> $this->Oferta_academica_model->unidades_curriculares_docente_todas($docente->id),
	);


 //var_dump($data);
$this->load->view('layouts/header');
$this->load->view('layouts/sidebar');
$this->load->view('docente/plan_clases/unidades_curriculares_anteriores',$data);
$this->load->view('layouts/footer');
}	
public function buscar_constancias($id){

	$id_usuario = $id;

	$docente=$this->Docente_model->getusuario_Docente($id_usuario);
	
	
	$data = array(		
		'unidades_curriculares'	=> $this->Oferta_academica_model->unidades_curriculares_docente_todas($docente->id),
		'id_usuario'=> $id_usuario
	);


 //var_dump($data);
$this->load->view('layouts/header');
$this->load->view('layouts/sidebar');
$this->load->view('docente/plan_clases/unidades_curriculares_consultas',$data);
$this->load->view('layouts/footer');
}		
public function constancia_anterior()
	{
		$id_usuario = $this->session->userdata("id");
		echo $id_periodo=$this->uri->segment(4);
		if( $this->uri->segment(3)==NULL){
			$materia=$this->input->post("unidad_curricular");
		}else{
			$materia=$this->uri->segment(3);
			
		}

		$docente=	 $this->Docente_model->getusuario_Docente($id_usuario);
		$periodo=	$this->Periodo_model->getIdperiodonotas($id_periodo);
		$control=	$this->Control_constancia_model->getConstancia($docente->id,$id_periodo,$materia);
		$matricula=	count($this->Materias_preinscrita_model->Materias_inscritas($materia));	
		$notas	=	count($this->Notas_academica_model->getEstadoProceso($materia,1));
		$plan   =	$this->Plan_evaluacion_model->getBuscarplan($materia);
		//echo $matricula;
		//echo $notas;
//var_dump($plan);
		//echo $matricula;

		if(($matricula == $notas) && ($plan <>false) ){	

			if(!$control){
				$constancia=$this->Nro_constancia_model->getNroConstancia(2);
				//var_dump($constancia);
				$correlativo=str_pad($constancia->correlativo, 3, "0", STR_PAD_LEFT);
				$anio=$constancia->anio;
					$nro='ENFMP-DIP-CP-'.$correlativo.'-'.$anio;
					$veces=$control->veces_impresion+1;
				$data_nro=array('id_docente'=>$docente->id,
							'nro_constancia'=>$nro,
							'id_oferta_academica'=>$materia,
							'quien_solicito'=>$id_usuario ,
							'id_periodo'=>$id_periodo,
							'veces_impresion'=>$veces,
				);
				//var_dump($data_nro);
				$this->Control_constancia_model->save($data_nro);
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
					$this->Control_constancia_model->update($control->id,$control->id_periodo,$control->id_docente,$data_nro);
				}
				$data2 = array(
				'tiempo_pre' => $this->Tiempo_preinscripcion_model->gettiempo_preinscripcion(),

				);	
				$fecha=daTE("d-m-Y");
				$fecha_letra=$this->fechaEs($fecha);

				$data = array(

				'datos_docente' => $this->Docente_model->getusuario_Docente($id_usuario),
				'oferta'		=>	$this->Oferta_academica_model->getBuscaroferta_programa($materia),
				'nro'			=> $nro,
				'fecha_letra'	=>$fecha_letra,
				);	
				//var_dump($data);

				$hoy = date("dmyhis");
				//if($id_periodo>16){
				//$html = $this->load->view('docente/documentos/constancia_docente_henedrix',$data,true);	
			//	}else{

				$html = $this->load->view('docente/documentos/constancia_docente_anterior',$data,true);	
				//}	

				//this the the PDF filename that user will get to download
				$pdfFilePath = "constancia_docente_".$hoy.".pdf";

				//load mPDF library
				$this->load->library('M_pdf');
				$mpdf = new mPDF('c', 'Letter-P'); 
				$mpdf->SetProtection(array('copy','print'), '', 't3n0l0g143n7m9');
				$mpdf->WriteHTML($html);

				$mpdf->Output($pdfFilePath, "D");
		}else{
			$this->session->set_flashdata("error","El plan de Evaluación y/o Notas Académicas no han sido cargadas en su totalidad.");
			redirect(base_url()."dashboard06/buscar_plan_clases",refresh);
		}

		
	
	}
public function constancias_docente($id)
	{
		$id_usuario = $id;
		 $id_periodo=$this->uri->segment(5);// echo "<br>";
		 $materia=$this->uri->segment(4);
			
		

		$docente=	 $this->Docente_model->getusuario_Docente($id_usuario);
		$periodo=	$this->Periodo_model->getIdperiodonotas($id_periodo);
		$control=	$this->Control_constancia_model->getConstancia($docente->id,$id_periodo,$materia);
		$matricula=	count($this->Materias_preinscrita_model->Materias_inscritas($materia));	
		$notas	=	count($this->Notas_academica_model->getEstadoProceso($materia,1));
		$plan   =	$this->Plan_evaluacion_model->getBuscarplan($materia);
		//echo $matricula;
		//echo $notas;
//var_dump($plan);
		//echo $matricula;

	///	if(($matricula == $notas) && ($plan <>false) ){	

			if(!$control){
				$constancia=$this->Nro_constancia_model->getNroConstancia(2);
				//var_dump($constancia);
				$correlativo=str_pad($constancia->correlativo, 3, "0", STR_PAD_LEFT);
				$anio=$constancia->anio;
					$nro='ENFMP-DIP-CP-'.$correlativo.'-'.$anio;
					$veces=$control->veces_impresion+1;
				$data_nro=array('id_docente'=>$docente->id,
							'nro_constancia'=>$nro,
							'id_oferta_academica'=>$materia,
							'quien_solicito'=> $this->session->userdata("id"),
							'id_periodo'=>$id_periodo,
							'veces_impresion'=>$veces,
				);
				//var_dump($data_nro);
				$this->Control_constancia_model->save($data_nro);
				$data_cons= array('correlativo'=>$constancia->correlativo + 1);
				$this->Nro_constancia_model->update($constancia->id,$data_cons);
			}else{
				$nro=$control->nro_constancia;
				$veces=$control->veces_impresion+1;
				$fecha=date("Y-m-d H:i:s");
				$data_nro=array(
							'veces_impresion'=>$veces,
							'quien_actualizo'=> $this->session->userdata("id"),
							'fecha_actualizacion'=>$fecha
				);
				//var_dump($data_nro);
					$this->Control_constancia_model->update($control->id,$control->id_periodo,$control->id_docente,$data_nro);
				}
				$data2 = array(
				'tiempo_pre' => $this->Tiempo_preinscripcion_model->gettiempo_preinscripcion(),

				);	
				$fecha=daTE("d-m-Y");
				$fecha_letra=$this->fechaEs($fecha);

				$data = array(

				'datos_docente' => $this->Docente_model->getusuario_Docente($id_usuario),
				'oferta'		=>	$this->Oferta_academica_model->getBuscaroferta_programa($materia),
				'nro'			=> $nro,
				'fecha_letra'	=>$fecha_letra,
				);	
				//var_dump($data);

				$hoy = date("dmyhis");
				//if($id_periodo>16){
				//$html = $this->load->view('docente/documentos/constancia_docente_henedrix',$data,true);	
			//	}else{

				$html = $this->load->view('docente/documentos/constancia_docente_anterior',$data,true);	
				//}	

				//this the the PDF filename that user will get to download
				$pdfFilePath = "constancia_docente_".$hoy.".pdf";

				//load mPDF library
				$this->load->library('M_pdf');
				$mpdf = new mPDF('c', 'Letter-P'); 
				$mpdf->SetProtection(array('copy','print'), '', 't3n0l0g143n7m9');
				$mpdf->WriteHTML($html);

				$mpdf->Output($pdfFilePath, "D");
		//}else{
	//		$this->session->set_flashdata("error","El plan de Evaluación y/o Notas Académicas no han sido cargadas en su totalidad.");
	//		redirect(base_url()."dashboard06/buscar_constancias/$id_usuario",refresh);
		//}

		
	
	}
public function asistencia_completa_lineas($oferta_academica,$periodo)
	{
	$materias_preinscrita=$this->Materias_preinscrita_model->Materias_inscritasli($oferta_academica,$periodo);
	
	echo count($materias_preinscrita);
		$i=0;	
		
	
		$fecha=date("Y-m-d H:i:s");

			foreach($materias_preinscrita as $materias_preinscrita){
				//echo $materias_preinscrita->id_oferta_academica;
				if($materias_preinscrita->retiro==0){ //activo
					$data = array(
						'id_materias_preinscrita' =>$materias_preinscrita->id,
						'id_oferta_academica' 	  =>$materias_preinscrita->id_oferta_academica,
						'nota_1'				  =>6.66,
						'nota_2'				  =>6.66,
						'nota_3'				  =>6.66,				
						'nota_final'			  =>20,
						'quien_registro'		  =>$this->session->userdata('id'),
						'fecha_registro'	  =>  $fecha,
						'observaciones'		      =>'APROBADO',
					);
					$data2 = array(
						'id_oferta_academica' 	  =>$materias_preinscrita->id_oferta_academica,
						'nota_1'				  =>6.66,
						'nota_2'				  =>6.66,
						'nota_3'				  =>6.66,				
						'nota_final'			  =>20,
						'quien_actualizo'		  =>$this->session->userdata('id'),
						'fecha_actualizacion'	  =>date("Y-m-d H:i:s"),
						'observaciones'		      =>'APROBADO',
					);
				$asistencia=array('asistencia'=>1);

				}
				if($materias_preinscrita->retiro==3){ //
					$data = array(
						'id_materias_preinscrita' =>$materias_preinscrita->id,
						'id_oferta_academica' 	  =>$materias_preinscrita->id_oferta_academica,
						'nota_1'				  =>1,
						'nota_2'				  =>1,
						'nota_3'				  =>1,				
						'nota_final'			  =>1,
						'quien_registro'		  =>$this->session->userdata('id'),
						'fecha_registro'	  =>  $fecha,
						'observaciones'		      =>'DECISION CAIP',
					);
					$data2 = array(
						'id_oferta_academica' 	  =>$materias_preinscrita->id_oferta_academica,
						'nota_1'				  =>1,
						'nota_2'				  =>1,
						'nota_3'				  =>1,				
						'nota_final'			  =>1,
						'quien_actualizo'		  =>$this->session->userdata('id'),
						'fecha_actualizacion'	  =>date("Y-m-d H:i:s"),
						'observaciones'		      =>'DECISION CAIP',
					);
				$asistencia=array('asistencia'=>1);
				}
				
				if($materias_preinscrita->retiro==1 OR $materias_preinscrita->retiro==2){ //activo
					$data = array(
						'id_materias_preinscrita' =>$materias_preinscrita->id,
						'id_oferta_academica' 	  =>$materias_preinscrita->id_oferta_academica,
						'nota_1'				  =>null,
						'nota_2'				  =>null,
						'nota_3'				  =>null,				
						'nota_final'			  =>null,
						'quien_registro'		  =>$this->session->userdata('id'),
						'fecha_registro'	  =>  $fecha,
						'observaciones'		      =>'RETIRO VOLUNTARIO',
					);
					$data2 = array(
						'id_oferta_academica' 	  =>$materias_preinscrita->id_oferta_academica,
						'nota_1'				  =>null,
						'nota_2'				  =>null,
						'nota_3'				  =>null,				
						'nota_final'			  =>null,
						'quien_actualizo'		  =>$this->session->userdata('id'),
						'fecha_actualizacion'	  =>date("Y-m-d H:i:s"),
						'observaciones'		      =>'RETIRO VOLUNTARIO',
					);
					$asistencia=array('asistencia'=>0);
				}
					if(!$this->Notas_academica_model->getBuscarMaeteria($materias_preinscrita->id)){
					//	echo"Agrego <br>";
						$this->Notas_academica_model->save($data);	
										
					}else{		
					//	echo"Actaulizo <br>";
						$this->Notas_academica_model->update_nota($materias_preinscrita->id,$data2);	
										
					}	
				//	var_dump($materias_preinscrita);


					$this->Materias_preinscrita_model->update_matricula($materias_preinscrita->id,$asistencia);	
					
				
				$i++;
		}
		//echo $i;	
		$this->session->set_flashdata("warning","La Nota Evaluativa y la Asitencia del estudiante fue Actualizada con Éxito.");
		redirect(base_url()."dashboard06/notasli/".$oferta_academica."/".$periodo,"refresh");				
			
	}
	public function asistencia_incompleta_lineas($oferta_academica,$periodo)
	{
		
	$materias_preinscrita=$this->Materias_preinscrita_model->Materias_inscritasli($oferta_academica,$periodo);

	
	
	//	var_dump($materias_preinscrita);
		$i=0;	
		
	
		$fecha=date("Y-m-d H:i:s");

			foreach($materias_preinscrita as $materias_preinscrita){
				
				if($materias_preinscrita->retiro==0){ //activo
					$data = array(
						'id_materias_preinscrita' =>$materias_preinscrita->id,
						'id_oferta_academica' 	  =>$materias_preinscrita->id_oferta_academica,
						'nota_1'				  =>0,
						'nota_2'				  =>0,
						'nota_3'				  =>0,				
						'nota_final'			  =>0,
						'quien_registro'		  =>$this->session->userdata('id'),
						'fecha_registro'	  =>  $fecha,
						'observaciones'		      =>'NO APROBADO',
					);
					$data2 = array(
						'id_oferta_academica' 	  =>$materias_preinscrita->id_oferta_academica,
						'nota_1'				  =>0,
						'nota_2'				  =>0,
						'nota_3'				  =>0,				
						'nota_final'			  =>0,
						'quien_actualizo'		  =>$this->session->userdata('id'),
						'fecha_actualizacion'	  =>date("Y-m-d H:i:s"),
						'observaciones'		      =>'NO APROBADO',
					);
				$asistencia=array('asistencia'=>0);
				}
				if($materias_preinscrita->retiro==3){ //
					$data = array(
						'id_materias_preinscrita' =>$materias_preinscrita->id,
						'id_oferta_academica' 	  =>$materias_preinscrita->id_oferta_academica,
						'nota_1'				  =>1,
						'nota_2'				  =>1,
						'nota_3'				  =>1,				
						'nota_final'			  =>1,
						'quien_registro'		  =>$this->session->userdata('id'),
						'fecha_registro'	  =>  $fecha,
						'observaciones'		      =>'DECISION CAIP',
					);
					$data2 = array(
						'id_oferta_academica' 	  =>$materias_preinscrita->id_oferta_academica,
						'nota_1'				  =>1,
						'nota_2'				  =>1,
						'nota_3'				  =>1,				
						'nota_final'			  =>1,
						'quien_actualizo'		  =>$this->session->userdata('id'),
						'fecha_actualizacion'	  =>date("Y-m-d H:i:s"),
						'observaciones'		      =>'DECISION CAIP',
					);
				$asistencia=array('asistencia'=>0);
				}
				
				if($materias_preinscrita->retiro==1 OR $materias_preinscrita->retiro==2){ //activo
					$data = array(
						'id_materias_preinscrita' =>$materias_preinscrita->id,
						'id_oferta_academica' 	  =>$materias_preinscrita->id_oferta_academica,
						'nota_1'				  =>null,
						'nota_2'				  =>null,
						'nota_3'				  =>null,				
						'nota_final'			  =>null,
						'quien_registro'		  =>$this->session->userdata('id'),
						'fecha_registro'	  =>  $fecha,
						'observaciones'		      =>'RETIRO VOLUNTARIO',
					);
					$data2 = array(
						'id_oferta_academica' 	  =>$materias_preinscrita->id_oferta_academica,
						'nota_1'				  =>null,
						'nota_2'				  =>null,
						'nota_3'				  =>null,				
						'nota_final'			  =>null,
						'quien_actualizo'		  =>$this->session->userdata('id'),
						'fecha_actualizacion'	  =>date("Y-m-d H:i:s"),
						'observaciones'		      =>'RETIRO VOLUNTARIO',
					);
				$asistencia=array('asistencia'=>0);
				}
					
				
					if(!$this->Notas_academica_model->getBuscarMaeteria($materias_preinscrita->id)){
						//echo"Agrego <br>";
						$this->Notas_academica_model->save($data);	
											
					}else{		
					//	echo"Actaulizo <br>";
						$this->Notas_academica_model->update_nota($materias_preinscrita->id,$data2);	
									
					}	
				//	var_dump($materias_preinscrita);
					$this->Materias_preinscrita_model->update_matricula($materias_preinscrita->id,$asistencia);	
					
				
				$i++;
		}
			$this->session->set_flashdata("warning","La Nota Evaluativa y la Asitencia del estudiante fue Actualizada con Éxito.");
			redirect(base_url()."dashboard06/notasli/".$oferta_academica."/".$periodo,"refresh");			
			//echo $i;
	}
	public function dPDF_matriculali(){//matricula en pdf
		$materia= $this->uri->segment(3);
		$periodo= $this->uri->segment(4);
		$nombre= 'matricula';
		$oferta=$this->Oferta_academica_model->getBuscarofertali($materia,$periodo);
		$matricula=$this->Materias_preinscrita_model->Materias_inscritasli($materia,$periodo)	;
		foreach($oferta as $oferta){
			$data= array(
		 				'unidad_curricular' => $this->Pensum_model->getnombrePensum($oferta->id_pensum),		
		 				'nombre_archivo'=>$nombre,		 				
		 				'oferta'=>$oferta,			 				
		 				'matricula'	=> $matricula,
		 				'periodo'	=> $this->Periodo_model->getIdperiodonotas($oferta->id_periodo),
		 			);
		}
					

		if(count($matricula)>0){
			// var_dump($data);
			$hoy = date("dmyhis");
	         $html = $this->load->view('docente/documentos/descarga_pdf_matricula',$data,true);			 	
	        //this the the PDF filename that user will get to download
	        $pdfFilePath = "matricula_".$hoy.".pdf";
	 
	        //load mPDF library
	        $this->load->library('M_pdf');
	        $mpdf = new mPDF('c', 'Letter-P'); 
$mpdf->SetProtection(array('copy','print'), '', 't3n0l0g143n7m9');
	 		$mpdf->WriteHTML($html);					
			$mpdf->Output($pdfFilePath, "D");

		}else{
			$this->session->set_flashdata("error","Debe tener asignada la Matrícula Estudiantil.");
				redirect(base_url()."dashboard06/matricula_estudiantesli/".$materia,"refresh");
		}
		
	}
	public function dExcelli(){//matricula en excel
		$materia= $this->uri->segment(3);
		$periodo= $this->uri->segment(4);
		$nombre= 'matricula';
		$oferta=$this->Oferta_academica_model->getBuscarofertali($materia,$periodo);
		$matricula=$this->Materias_preinscrita_model->Materias_inscritasli($materia,$periodo)	;
		foreach($oferta as $oferta){
			$data= array(
		 				'unidad_curricular' => $this->Pensum_model->getnombrePensum($oferta->id_pensum),		
		 				'nombre_archivo'=>$nombre,		 				
		 				'oferta'=>$oferta,			 				
		 				'matricula'	=> $matricula,
		 				'periodo'	=> $this->Periodo_model->getIdperiodonotas($oferta->id_periodo),
		 			);
		}
		
	$this->load->view('docente/documentos/descarga_excel',$data);		
	
	
		
	}
public function dPDF_asistenciali(){//asistencia en pdf
		
	
		$materia= $this->uri->segment(3);
		$periodo= $this->uri->segment(4);
		$nombre= 'asistencia';
		$oferta=$this->Oferta_academica_model->getBuscarofertali($materia,$periodo);
		$matricula=$this->Materias_preinscrita_model->Materias_inscritasli($materia,$periodo)	;
		foreach($oferta as $oferta){
		 $data= array(
		 				'unidad_curricular' => $this->Pensum_model->getnombrePensum($oferta->id_pensum),		
		 				'nombre_archivo'=>$nombre,		 				
		 				'oferta'=>$oferta,			 				
		 				'matricula'	=> $matricula,
		 				'periodo'	=> $this->Periodo_model->getIdperiodonotas($oferta->id_periodo),
		 			);
				}
		if(count($matricula)>0){
			// var_dump($data);
			$hoy = date("dmyhis");
	         $html = $this->load->view('docente/documentos/descarga_pdf_asistencia',$data,true);			 	
	        //this the the PDF filename that user will get to download
	        $pdfFilePath = "asitencia_".$hoy.".pdf";
	 
	        //load mPDF library
	        $this->load->library('M_pdf');
	        $mpdf = new mPDF('c', 'Letter-P'); 
$mpdf->SetProtection(array('copy','print'), '', 't3n0l0g143n7m9');
	 		$mpdf->WriteHTML($html);					
			$mpdf->Output($pdfFilePath, "D");
		}else{
			$this->session->set_flashdata("error","Debe tener asignada la Matrícula Estudiantil.");
				redirect(base_url()."dashboard06/matricula_estudiantes/".$materia,"refresh");
		}		
	}
public function dExcel_asistenciali(){//asistencia en excel
	$materia= $this->uri->segment(3);
	$periodo= $this->uri->segment(4);
	$nombre= 'asistencia';
	$oferta=$this->Oferta_academica_model->getBuscarofertali($materia,$periodo);
	$matricula=$this->Materias_preinscrita_model->Materias_inscritasli($materia,$periodo)	;
	foreach($oferta as $oferta){
		 $data= array(
		 				'unidad_curricular' => $this->Pensum_model->getnombrePensum($oferta->id_pensum),		
		 				'nombre_archivo'=>$nombre,		 				
		 				'oferta'=>$oferta,			 				
		 				'matricula'	=> $matricula,
		 				'periodo'	=> $this->Periodo_model->getIdperiodonotas($oferta->id_periodo),
		 			);
	}	
	$this->load->view('docente/documentos/descarga_excel_asistencia',$data);		
	
	
		
	}

}

