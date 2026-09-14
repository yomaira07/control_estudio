<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Condominio extends CI_Controller {

	public function __construct(){
		parent::__construct();
		// aqui se realiza el llamado del modelo a utilizar
		$this->load->model("Condominio_model");
	}

	public function index()
	{
		$this->load->view('layouts/header1');
		$this->load->view('admin/condominio/add');
		$this->load->view('layouts/footer1');
	}

	public function store()
	{
		$nombre = $this->input->post("nombre");
		$rif = $this->input->post("rif");
		$correo = $this->input->post("correo");
		$nro_unidades = $this->input->post("nro_unidades");
		$foto = $this->input->post("foto");
		$logo = $this->input->post("logo");
		$direccion = $this->input->post("direccion");
		$estado = $this->input->post("estado");
		$ciudad = $this->input->post("ciudad");
		$municipio = $this->input->post("municipio");
		$parroquia = $this->input->post("parroquia");
		$referencia = $this->input->post("referencia");
		$moneda_id = $this->input->post("moneda_id");
		$simbolo_id = $this->input->post("simbolo_id");
		$usuario_id = $this->session->userdata("id");

		$data = array(
			'nombre' => $nombre,
			'usuario_id' => $usuario_id,
			'estatus' => "1",
		);

		if($this->Condominio_model->save($data)){
		redirect(base_url()."dashboard");
		}
		else
		{
			$this->session->set_flashdata("error","No se pudo guardar la informacion");
			redirect(base_url()."admin/condominio");
		}
	}

	public function edit()
	{
		$this->load->view('layouts/header');
		$this->load->view('layouts/sidebar');
		$this->load->view('admin/condominio/edit');
		$this->load->view('layouts/footer');
	}


}