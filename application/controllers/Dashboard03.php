<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard03 extends CI_Controller { // controlador de matriculas estudiantil vigente
	// aqui se muestra la matricula de estudiantes activa con sus respectivos datos de acceso, horarios programas y modalidades de estudio

	public function __construct(){
		parent::__construct();
		$this->load->model("Usuarios_model");
		$this->load->model("Oferta_academica_model");
		$this->load->model("Materias_preinscrita_model");
		$this->load->model("Periodo_model");
		$this->load->model("Inscripcion_model");
		$this->load->model("Pensum_model");
		$this->load->model("Programa_model");
		$this->load->model("Trimestre_model");
		$this->load->model("Docente_model");
		$this->load->model("Seccion_model");
		if (!$this->session->userdata("login")) {
			redirect(base_url());
		}
	}

	public function index()
	{
		$periodo = $this->Periodo_model->PeriodoActivo();
		$data=array('listado'=>$this->Materias_preinscrita_model->matricula_vigente($periodo->id));

		$this->load->view('layouts/header');
		$this->load->view('layouts/sidebar');	
		$this->load->view('supervisor/plan_clases/list_matricula_activa',$data);					
	
		$this->load->view('layouts/footer');
		
	}
	public function descarga_excel()
	{
		$periodo = $this->Periodo_model->PeriodoActivo();
		$data=array('listado'=>$this->Materias_preinscrita_model->matricula_vigente($periodo->id));

		$this->load->view('supervisor/consultas/dExcelMatricula_activa',$data);					
	}
public function periodo_anterior($id)
	{
		$periodo = $id;
		$data=array('listado'=>$this->Materias_preinscrita_model->matricula_vigente($periodo),
					'periodo'=> $this->Periodo_model->getIdperiodo_($periodo),
				);

		$this->load->view('layouts/header');
		$this->load->view('layouts/sidebar');	
		$this->load->view('supervisor/plan_clases/list_matricula',$data);					
	
		$this->load->view('layouts/footer');
		
	}
	public function descarga_excel_anterior($id)
	{
		$periodo = $id;
		$data=array('listado'=>$this->Materias_preinscrita_model->matricula_vigente($periodo),
					'periodo'=> $this->Periodo_model->getIdperiodo_($periodo),
				);


		$this->load->view('supervisor/consultas/dExcelMatricula',$data);					
	}


}
