<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pensum extends CI_Controller {

	public function __construct(){
		parent::__construct();
		// aqui se realiza el llamado del modelo a utilizar
		$this->load->model("Pensum_model");
		$this->load->model("Programa_model");
		$this->load->model("Trimestre_model");
		$this->load->model("Eje_model");
		$this->load->model("Prelacion_model");
	}

	public function index()
	{

		$data["tipo_postgrado"] = $this->Programa_model->getPrograma();
	
		$this->load->view('layouts/header');
		$this->load->view('layouts/sidebar');
		$this->load->view('admin/pensum/index',$data);
		$this->load->view('layouts/footer');
	}

	public function list_pensum($id)
	{
		$data["list_programa"] = $this->Programa_model->getProgramaEsp($id);
		$data["lista_pensum"] = $this->Pensum_model->getlistPensum($id);
	
		$this->load->view('layouts/header');
		$this->load->view('layouts/sidebar');
		$this->load->view('admin/pensum/list',$data);
		$this->load->view('layouts/footer');
	}

	public function crear($id)
	{
		$data["list_programa"] = $this->Programa_model->getProgramaEsp($id);
		$data["trimestres"] = $this->Trimestre_model->getTrimestre();
		$data["ejes"] = $this->Eje_model->getEje();
	
		$this->load->view('layouts/header');
		$this->load->view('layouts/sidebar');
		$this->load->view('admin/pensum/add',$data);
		$this->load->view('layouts/footer');
	}

	public function pensum_store()
	{
		$cod_programa = $this->input->post("cod_programa");
		$nombre = $this->input->post("nombre");
		$siglas = $this->input->post("siglas");
		$trimestre = $this->input->post("trimestre");
		$horas = $this->input->post("horas");
		$unidad_curricular = $this->input->post("unidad_curricular");
		$codigo = $this->input->post("codigo");
		$eje = $this->input->post("eje");
		$status = $this->input->post("status");


		$data = array(
			'nombre' => $nombre,
			'sigla_uc' => $siglas,
			'id_programa' => $cod_programa,
			'id_trimestre' => $trimestre,
			'horas' => $horas,
			'unidad_curricular' => $unidad_curricular,
			'codigo' => $codigo,
			'id_eje' => $eje,
			'status' => $status,
		);
//var_dump($data);
		if($this->Pensum_model->save($data)){
		redirect(base_url()."admin/pensum/list_pensum/$cod_programa");
		}
		else
		{
			$this->session->set_flashdata("error","No se pudo guardar la informacion");
			redirect(base_url()."admin/pensum/crear");
		}
	}
	public function prelacion_add()
	{
		
		$id_pensum = $this->input->post("id_pensum");
		$id_pensum_prela = $this->input->post("prelacion");
		$status = 1;
		$cod_programa = $this->input->post("cod_programa");

		$data = array(
			'id_pensum' => $id_pensum,
			'id_pensum_prela' => $id_pensum_prela,
			
			'status' => $status,
		);

		if($this->Prelacion_model->save($data)){
		redirect(base_url()."admin/pensum/edit/$id_pensum/$cod_programa");
		}
		else
		{
			$this->session->set_flashdata("error","No se pudo guardar la informacion");
			redirect(base_url()."admin/pensum/edit/$id_pensum/$cod_programa");
		}
	}
	public function pensum_update()
	{
		$cod_programa = $this->input->post("cod_programa");
		$id_pensum = $this->input->post("id_pensum");
		$nombre = $this->input->post("nombre");
		$siglas = $this->input->post("siglas");
		$trimestre = $this->input->post("trimestre");
		$horas = $this->input->post("horas");
		$unidad_curricular = $this->input->post("unidad_curricular");
		$codigo = $this->input->post("codigo");
		$eje = $this->input->post("eje");
		$status = $this->input->post("status");
	


		$data = array(
			'nombre' => $nombre,
			'sigla_uc' => $siglas,
			'id_programa' => $cod_programa,
			'id_trimestre' => $trimestre,
			'horas' => $horas,
			'unidad_curricular' => $unidad_curricular,
			'codigo' => $codigo,
			'id_eje' => $eje,
		
			'status' => $status, 
		);

		if($this->Pensum_model->update($id_pensum,$data)){
		redirect(base_url()."admin/pensum/list_pensum/$cod_programa");
		}
		else
		{
			$this->session->set_flashdata("error","No se pudo guardar la informacion");
			redirect(base_url()."admin/pensum/edit/$id_pensum");
		}
	}

public function edit($id,$cod_programa)
{
	echo $id;
	
$data=array(
	
	'list_pensum'=> $this->Pensum_model->getnombrePensum_($id),
	'trimestres'=>$this->Trimestre_model->getTrimestre(),
	'ejes'=>$this->Eje_model->getEje(),
	'List_prelacion'=> $this->Prelacion_model->getlistPrelacion($id),
	'prelacion'=> $this->Pensum_model-> getlistPensum($cod_programa),
);
//var_dump($data['list_pensum']);
	$this->load->view('layouts/header');
	$this->load->view('layouts/sidebar');
	$this->load->view('admin/pensum/edit',$data);
	$this->load->view('layouts/footer');
}


public function crear_programa()
	{
			
		$this->load->view('layouts/header');
		$this->load->view('layouts/sidebar');
		$this->load->view('admin/programa/add');
		$this->load->view('layouts/footer');
	}

	public function programa_store()
	{
		
		$nombre = $this->input->post("nombre");
		$siglas = $this->input->post("siglas");


		$data = array(
			'nombre' => $nombre,
			'sigla_pg' => $siglas,
			'status' => 1,
		);

		if($this->Programa_model->save($data)){
		redirect(base_url()."admin/pensum/index");
		}
		else
		{
			$this->session->set_flashdata("error","No se pudo guardar la informacion");
			redirect(base_url()."admin/pensum/index");
		}
	}
}
