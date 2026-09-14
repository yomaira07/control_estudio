<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Oferta_academica extends CI_Controller {

	public function __construct(){
		parent::__construct();
		// aqui se realiza el llamado del modelo a utilizar
		$this->load->model("Oferta_academica_model");
		$this->load->model("Pensum_model");
		$this->load->model("Programa_model");
		$this->load->model("Trimestre_model");
		$this->load->model("Periodo_model");
		$this->load->model("Unidad_creditos_model");
		$this->load->model("Dia_clase_model");
		$this->load->model("Docente_model");
		$this->load->model("Seccion_model");
	}

	public function index()
	{

		$data["oferta_academ"] = $this->Oferta_academica_model->list_oferta();
	
		$this->load->view('layouts/header');
		$this->load->view('layouts/sidebar');
		$this->load->view('admin/oferta_academica/list',$data);
		$this->load->view('layouts/footer');
	}

	public function crear()
	{
		
		$data["unidadcredito"] = $this->Unidad_creditos_model->getUltimoUnidadCreditos();
		$data["unidadcredito_maestria"] = $this->Unidad_creditos_model->getUltimoUnidadCreditos_maestria();
	
		$data["list_periodo"] = $this->Periodo_model->getPeriodo();
		$data["list_programa"] = $this->Programa_model->getPrograma();
		$data["list_pensum"] = $this->Pensum_model->getcomboPensum();
		$data["trimestres"] = $this->Trimestre_model->getTrimestre();
		$data["list_dia"] = $this->Dia_clase_model->getDiaclase();
		$data["list_docente"] = $this->Docente_model->getDocente();
		$data["list_seccion"] = $this->Seccion_model->getSecciones();

	
		$this->load->view('layouts/header');
		$this->load->view('layouts/sidebar');
		$this->load->view('admin/oferta_academica/add',$data);
		$this->load->view('layouts/footer');
	}

	public function uc_store()
	{
		
		$valor = $this->input->post("valor");


		$data = array(
			'monto' => $valor,
			'status' => 1,
		);

		if($this->Unidad_creditos_model->save($data)){
		redirect(base_url()."admin/unidad_c");
		}
		else
		{
			$this->session->set_flashdata("error","No se pudo guardar la informacion");
			redirect(base_url()."admin/unidad_c/crear");
		}
	}

	 public function combo_unidad()
	 {
	  if($this->input->post('programa_id'))
	  {
	   echo $this->Oferta_academica_model->combo_unidad($this->input->post('programa_id'));
	  }

	 }

	 

	 public function info_unidad()
	 {
	  if($this->input->post('pensum_id'))
	  {
	   echo $this->Oferta_academica_model->info_unidad($this->input->post('pensum_id'));
	  }

	 }


	 	public function oferta_store()
	{
		$id_usuario = $this->input->post("id_usuario");
		$fecha_registro = $this->input->post("fecha_registro");
		$fecha_inicio = $this->input->post("fecha_inicio");
		$fecha_fin = $this->input->post("fecha_fin");
		$periodo = $this->input->post("periodo");
		$programa = $this->input->post("programa");
		$unidad_curricular = $this->input->post("pensum");
		$codigo = $this->input->post("codigo");
		$trimestre = $this->input->post("trimestre");
		$horario = $this->input->post("horario");
		$dia = $this->input->post("dia");
		$seccion = $this->input->post("seccion");
		$cupos = $this->input->post("cupos");
		$docente = $this->input->post("docente");
		$costo_unidadcredito = $this->input->post("unidad");
		$valor_general = $this->input->post("valor");
		$monto_general = $this->input->post("monto_general");
		$valor_mp = $this->input->post("valor_mp");
		$monto_mp = $this->input->post("monto_mp");
		$modalidad = $this->input->post("modalidad");

		$data = array(
			'fecha_inicio' => $fecha_inicio,
			'fecha_fin' => $fecha_fin,
			'id_periodo' => $periodo,
			'id_programa' => $programa,
			'id_pensum' => $unidad_curricular,
			'codigo' => $codigo,
			'trimestre' => $trimestre,
			'id_dia_clase' => $dia,
			'id_docente' => $docente,
			'horario' => $horario,
			'unidades_creditos' => $costo_unidadcredito,
			'seccion' => $seccion,
			'cupos' => $cupos,
			'valorpubgen' => $valor_general,
			'monto_total_gen' => $monto_general,
			'valorpubmp' => $valor_mp,
			'monto_total_mp' => $monto_mp,
			'status' => 1,
			'modalidad'=>$modalidad
		);

		if($this->Oferta_academica_model->save($data)){
		redirect(base_url()."admin/oferta_academica/index");
		}
		else
		{
			$this->session->set_flashdata("error","No se pudo guardar la informacion");
			redirect(base_url()."admin/oferta_academica/crear");
		}
	}

	public function editar($id)
	{
		$data["buscaroferca"] = $this->Oferta_academica_model->getBuscaroferta($id);
		$data["unidadcredito"] = $this->Unidad_creditos_model->getUltimoUnidadCreditos();
		$data["list_dia"] = $this->Dia_clase_model->getDiaclase();
		$data["list_docente"] = $this->Docente_model->getDocente();
		$data["list_seccion"] = $this->Seccion_model->getSecciones();

	
		$this->load->view('layouts/header');
		$this->load->view('layouts/sidebar');
		$this->load->view('admin/oferta_academica/edit',$data);
		$this->load->view('layouts/footer');
	}


	public function oferta_edit_store()
	{
		$id_oferta_academica = $this->input->post("id_oferta_academica");
		$horario = $this->input->post("horario");
		$dia = $this->input->post("dia");
		$seccion = $this->input->post("seccion");
		$cupos = $this->input->post("cupos");
		$docente = $this->input->post("docente");
		$modalidad = $this->input->post("modalidad");
		

		$data = array(
			
			
			'id_dia_clase' => $dia,
			'id_docente' => $docente,
			'horario' => $horario,
			'seccion' => $seccion,
			'cupos' => $cupos,
			'modalidad'=>$modalidad
		);

		if($this->Oferta_academica_model->update_oferta($id_oferta_academica,$data)){
		redirect(base_url()."admin/oferta_academica/index");
		}
		else
		{
			$this->session->set_flashdata("error","No se pudo guardar la informacion");
			redirect(base_url()."admin/oferta_academica/editar");
		}
	}

public function dExcel()
	{
		$data['listado']=$this->Oferta_academica_model->oferta_academica_vigente();			
	//	var_dump($data);
		$this->load->view('admin/oferta_academica/descargar_excel',$data);
		
	}



}
