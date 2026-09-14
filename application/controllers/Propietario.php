<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Propietario extends CI_Controller {

public function __construct(){
		parent::__construct();
		$this->load->model("Usuarios_model");
		$this->load->model("Condominio_model");
		$this->load->model("Propietario_model");

		if (!$this->session->userdata("login")) {
			redirect(base_url());
		}
}

public function index(){
	$this->load->view('layouts/header');
		$this->load->view('layouts/sidebar');
		$this->load->view('admin/propietario/condprop_001');
		$this->load->view('layouts/footer');
}

public function recibosp(){
	$this->load->view('layouts/header');
		$this->load->view('layouts/sidebar');
		$this->load->view('admin/propietario/condprop_002');
		$this->load->view('layouts/footer');
}

public function gastoe(){
	$this->load->view('layouts/header');
		$this->load->view('layouts/sidebar');
		$this->load->view('admin/propietario/condprop_003');
		$this->load->view('layouts/footer');
}

public function reciboscond(){
	$this->load->view('layouts/header');
		$this->load->view('layouts/sidebar');
		$this->load->view('admin/propietario/condprop_004');
		$this->load->view('layouts/footer');
}

public function recibospagos(){
	$this->load->view('layouts/header');
		$this->load->view('layouts/sidebar');
		$this->load->view('admin/propietario/condprop_005');
		$this->load->view('layouts/footer');
}

public function estadocuenta(){
	$this->load->view('layouts/header');
		$this->load->view('layouts/sidebar');
		$this->load->view('admin/propietario/condprop_006');
		$this->load->view('layouts/footer');
}

public function estadistica(){
	$this->load->view('layouts/header');
		$this->load->view('layouts/sidebar');
		$this->load->view('admin/propietario/condprop_007');
		$this->load->view('layouts/footer');
}

public function documentos(){
	$this->load->view('layouts/header');
		$this->load->view('layouts/sidebar');
		$this->load->view('admin/propietario/condprop_008');
		$this->load->view('layouts/footer');
}

public function cambio_clave(){
	$this->load->view('layouts/header');
		$this->load->view('layouts/sidebar');
		$this->load->view('admin/propietario/condprop_009');
		$this->load->view('layouts/footer');
}

public function documentos1(){
	$this->load->view('layouts/header');
		$this->load->view('layouts/sidebar');
		$this->load->view('admin/documentos/document_001');
		$this->load->view('layouts/footer');
}

public function imprimir1(){
	//$this->load->view('layouts/header');
	//	$this->load->view('layouts/sidebar');
		$this->load->view('admin/documentos/docprint_001');
		//$this->load->view('layouts/footer');
}
}