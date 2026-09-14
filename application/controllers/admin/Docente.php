<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Docente extends CI_Controller {

	public function __construct(){
		parent::__construct();
		// aqui se realiza el llamado del modelo a utilizar
		$this->load->model("Docente_model");
		$this->load->model("Usuarios_model");
		$this->load->model("Sexo_model");
		$this->load->model("Codigo_tel_model");
		$this->load->model("Nivel_Academico_model");
		$this->load->model("Control_requisitos_docente_model");
	}

	public function index()
	{

		$data["lista_docente"] = $this->Docente_model->getDocente();
	
		$this->load->view('layouts/header');
		$this->load->view('layouts/sidebar');
		$this->load->view('admin/docente/list',$data);
		$this->load->view('layouts/footer');
	}
		public function requisitos_docentes($id)
	{
		$docente=$this->Docente_model->getBuscarDocente($id);
		$data=
			array('data_docente' => $this->Docente_model->getBuscarDocente1($id),
					//'requisitos'	=>$this->Control_requisitos_docente_model->getControl_requisitos_doc1($id,$docente->id_usuario),
				);
		$this->load->view('layouts/header');
		$this->load->view('layouts/sidebar');
		$this->load->view('supervisor/plan_clases/requisitos_docentes',$data);
		$this->load->view('layouts/footer');
	}

	public function crear()
	{
		$data["lista_sexo"] = $this->Sexo_model->getSexo();
		$data["cod_hab"] = $this->Codigo_tel_model->Codigo_nacional();
		$data["cod_cel"] = $this->Codigo_tel_model->Codigo_celular();
		$data["nivel_academico"] = $this->Nivel_Academico_model->getNivelAcademico();
	
		$this->load->view('layouts/header');
		$this->load->view('layouts/sidebar');
		$this->load->view('admin/docente/add',$data);
		$this->load->view('layouts/footer');
	}

	public function docente_store()
	{
		
		$nacionalidad = $this->input->post("nacionalidad");
		$cedula = $this->input->post("cedula");
		$cod_rif = $this->input->post("cod_rif");
		$rif = $this->input->post("rif");
		$primer_nombre = $this->input->post("primer_nombre");
		$segundo_nombre = $this->input->post("segundo_nombre");
		$primer_apellido = $this->input->post("primer_apellido");
		$segundo_apellido = $this->input->post("segundo_apellido");
		$sexo = $this->input->post("sexo");
		$codtelcel = $this->input->post("codigo_telcel");
		$num_celular=$this->input->post("telefono_cel");
		$telcel=$codtelcel.$num_celular;
		$codhab = $this->input->post("codigo_telhab");
		$num_habitacion = $this->input->post("telefono_hab");
		$telhab =$codhab.$num_habitacion ;
		$nivel_academico = $this->input->post("nivel_academico");
		$correo = $this->input->post("correo");


		$data = array(
			'nacionalidad' => $nacionalidad,
			'cedula' => $cedula,
			'cod_rif' => $cod_rif,
			'rif' => $rif,
			'primer_nombre' => $primer_nombre,
			'segundo_nombre' => $segundo_nombre,
			'primer_apellido' => $primer_apellido,
			'segundo_apellido' => $segundo_apellido,
			'id_sexo' => $sexo,
			'telefono_hab' => $telhab,
			'telefono_cel' => $telcel,
			'correo' => $correo,
			'id_nivel_academico' => $nivel_academico,
			'status' => 1,
		);

		$data2 = array(
			
			'nombres' => $primer_nombre.' '.$segundo_nombre,
			'apellidos' => $primer_apellido.' '.$segundo_apellido,
			'telefono' => $telcel,		
			'email' => $correo,
			'password'=> '40bd001563085fc35165329ea1ff5c5ecbdbbeef',
			'rol_id' =>9,
			'estado' => 1,
			'username'=> strtolower(substr($primer_nombre,0,2).$primer_apellido),
		);
	

		if(!$this->Docente_model->getBuscarDocente_cedula($cedula)){
			if($this->Docente_model->save($data)){				
				if($this->Usuarios_model->save($data2)){
					$ult_usuario=$this->db->insert_id();
					$docente=$this->Docente_model->getBuscarDocente_cedula($cedula);					
					$data_id_usuario= array('id_usuario'=>$ult_usuario);

					$this->Docente_model->update_docente($docente->id,$data_id_usuario);
					
					$this->session->set_flashdata("success","Docente registrado exitosamente..!");
					redirect(base_url()."admin/docente/index");
				}else{
					$this->session->set_flashdata("error","No se pudo guardar la informacion");
					redirect(base_url()."admin/docente/crear");
				}

				redirect(base_url()."admin/docente/index");
			}else{
				$this->session->set_flashdata("error","No se pudo guardar la informacion");
				redirect(base_url()."admin/docente/crear");
			}
		}else{						
				$this->session->set_flashdata("error","Docentese encuentra registrado...!");
				redirect(base_url()."admin/docente/crear");
			}
		}
	
	public function editar($id)
	{

		$data["data_docente"] = $this->Docente_model->getBuscarDocente($id);
		$data["lista_sexo"] = $this->Sexo_model->getSexo();
		$data["cod_hab"] = $this->Codigo_tel_model->Codigo_nacional();
		$data["cod_cel"] = $this->Codigo_tel_model->Codigo_celular();
		$data["nivel_academico"] = $this->Nivel_Academico_model->getNivelAcademico();
		//var_dump($data["data_docente"]);
		$this->load->view('layouts/header');
		$this->load->view('layouts/sidebar');
		$this->load->view('admin/docente/edit',$data);
		$this->load->view('layouts/footer');
	}


	public function docente_act_store()
	{
		
		$id_docente = $this->input->post("id_docente");
		$nacionalidad = $this->input->post("nacionalidad");
		$cedula = $this->input->post("cedula");
		$cod_rif = $this->input->post("cod_rif");
		$rif = $this->input->post("rif");
		$primer_nombre = $this->input->post("primer_nombre");
		$segundo_nombre = $this->input->post("segundo_nombre");
		$primer_apellido = $this->input->post("primer_apellido");
		$segundo_apellido = $this->input->post("segundo_apellido");
		$sexo = $this->input->post("sexo");
		$codtelcel = $this->input->post("codigo_telcel");
		$num_celular=$this->input->post("telefono_cel");
		$telcel=$codtelcel.$num_celular;
		$codhab = $this->input->post("codigo_telhab");
		$num_habitacion = $this->input->post("telefono_hab");
		$telhab =$codhab.$num_habitacion ;
		$nivel_academico = $this->input->post("nivel_academico");
		$correo = $this->input->post("correo");
		$status= $this->input->post("status");

		$data = array(
			'nacionalidad' => $nacionalidad,
			'cedula' => $cedula,
			'cod_rif' => $cod_rif,
			'rif' => $rif,
			'primer_nombre' => $primer_nombre,
			'segundo_nombre' => $segundo_nombre,
			'primer_apellido' => $primer_apellido,
			'segundo_apellido' => $segundo_apellido,
			'id_sexo' => $sexo,
			'telefono_hab' => $telhab,
			'telefono_cel' => $telcel,
			'correo' => $correo,
			'id_nivel_academico' => $nivel_academico,
			'status' => $status,
		);

		if($this->Docente_model->update_docente($id_docente,$data)){

		redirect(base_url()."admin/docente/index");
		}
		else
		{
			$this->session->set_flashdata("error","No se pudo guardar la informacion");
			redirect(base_url()."admin/docente/edit");
		}
	}





}
