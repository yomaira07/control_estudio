<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard02 extends CI_Controller { // controlador revisor de control de estudio

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

		if (!$this->session->userdata("login")) {
			redirect(base_url());
		}
	}

	public function index()
	{
		
	
		$id_usuario = $this->session->userdata("id");
		$data = array(
		'listado' => $this->Registro_pago_model->Revision_Academica(),

		);
//var_dump($data);
		$this->load->view('layouts/header');
		$this->load->view('layouts/sidebar');
		$this->load->view('supervisor/list_rev_academica',$data);
		$this->load->view('layouts/footer');
	
	}

	
}
