<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Unidad_c extends CI_Controller {

	public function __construct(){
		parent::__construct();
		// aqui se realiza el llamado del modelo a utilizar
		$this->load->model("Unidad_creditos_model");
	}

	public function index()
	{

		$data["list_uc"] = $this->Unidad_creditos_model->getUnidadCreditos();
	
		$this->load->view('layouts/header');
		$this->load->view('layouts/sidebar');
		$this->load->view('admin/unidad_creditos/list',$data);
		$this->load->view('layouts/footer');
	}

	public function crear()
	{
	
		$this->load->view('layouts/header');
		$this->load->view('layouts/sidebar');
		$this->load->view('admin/unidad_creditos/add');
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

}