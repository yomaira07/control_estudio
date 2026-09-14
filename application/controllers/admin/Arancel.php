<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Arancel extends CI_Controller {

	public function __construct(){
		parent::__construct();
		// aqui se realiza el llamado del modelo a utilizar
		$this->load->model("Aranceles_model");
	}

	public function index()
	{

		$data["list_arancel"] = $this->Aranceles_model->getAranceles();
	
		$this->load->view('layouts/header');
		$this->load->view('layouts/sidebar');
		$this->load->view('admin/aranceles/list',$data);
		$this->load->view('layouts/footer');
	}

	public function crear()
	{
	
		$this->load->view('layouts/header');
		$this->load->view('layouts/sidebar');
		$this->load->view('admin/aranceles/add');
		$this->load->view('layouts/footer');
	}

	public function arancel_store()
	{
		
		$valor = $this->input->post("valor");
		$valor2= $this->input->post("valor2");
		$tipo_arancel=$this->input->post("tipo_arancel");
		$data_up = array(
			'status' => 0,
		);

		$this->Aranceles_model->update_activo($tipo_arancel,$data_up);
		
		$data = array(
			'id_tipo_arancel'=>$tipo_arancel,
			'monto_gen' => $valor,
			'monto_mp' => $valor2,
			'status' => 1,
		);

		if($this->Aranceles_model->save($data)){
		redirect(base_url()."admin/arancel/");
		}
		else
		{
			$this->session->set_flashdata("error","No se pudo guardar la informacion");
			redirect(base_url()."admin/arancel/crear");
		}
	}

}
