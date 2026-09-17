<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Aranceltram extends CI_Controller {


	public function __construct(){
		parent::__construct();
		// aqui se realiza el llamado del modelo a utilizar
		$this->load->model("Aranceltram_model");
	}

    public function index() {
        $data['list_arancel_tram'] = $this->Aranceltram_model->getArancelesTramiteList();
        $data['titulo'] = 'Aranceles de Trámites Administrativos';
        $this->load->view('layouts/header');
		$this->load->view('layouts/sidebar');
        $this->load->view('admin/aranceles/list_tram', $data);
		$this->load->view('layouts/footer');
    }

    public function listar() {
        $data['list_arancel_tram'] = $this->Aranceltram_model->getArancelesTramiteList();
        $data['titulo'] = 'Aranceles de Trámites Administrativos';
        $this->load->view('layouts/header');
		$this->load->view('layouts/sidebar');
        $this->load->view('admin/aranceles/list_tram', $data);
		$this->load->view('layouts/footer');
  
    }

    public function crear() {
        $data['titulo'] = 'Crear Arancel de Trámite Administrativo';
        $data['action'] = 'guardar';
        $this->load->view('admin/aranceltram/form', $data);
    }

    public function guardar() {
        $this->load->library('form_validation');
        
        $this->form_validation->set_rules('id_tramite', 'Tipo de Trámite', 'required');
        $this->form_validation->set_rules('monto_gen', 'Monto Público General', 'required|numeric');
        $this->form_validation->set_rules('monto_mp', 'Monto MP', 'required|numeric');
        
        if ($this->form_validation->run() == FALSE) {
            $data['titulo'] = 'Crear Arancel de Trámite Administrativo';
            $data['action'] = 'guardar';
            $this->load->view('admin/aranceltram/form', $data);
        } else {
            $data = array(
                'id_tramite' => $this->input->post('id_tramite'),
                'monto_gen' => $this->input->post('monto_gen'),
                'monto_mp' => $this->input->post('monto_mp'),
                'status' => $this->input->post('status') ? 1 : 0,
                'fecha_registro' => date('Y-m-d H:i:s')
            );
            
            $resultado = $this->Aranceltram_model->save($data);
            
            if ($resultado) {
                $this->session->set_flashdata('success', 'Arancel de trámite creado exitosamente');
            } else {
                $this->session->set_flashdata('error', 'Error al crear el arancel de trámite');
            }
            
            redirect('admin/aranceltram');
        }
    }

    public function editar($id) {
        $data['arancel'] = $this->Aranceltram_model->getArancelById($id);
        $data['titulo'] = 'Editar Arancel de Trámite Administrativo';
        $data['action'] = 'actualizar/' . $id;
        $this->load->view('admin/aranceltram/form', $data);
    }

    public function actualizar($id) {
        $this->load->library('form_validation');
        
        $this->form_validation->set_rules('id_tramite', 'Tipo de Trámite', 'required');
        $this->form_validation->set_rules('monto_gen', 'Monto Público General', 'required|numeric');
        $this->form_validation->set_rules('monto_mp', 'Monto MP', 'required|numeric');
        
        if ($this->form_validation->run() == FALSE) {
            $data['arancel'] = $this->Aranceltram_model->getArancelById($id);
            $data['titulo'] = 'Editar Arancel de Trámite Administrativo';
            $data['action'] = 'actualizar/' . $id;
            $this->load->view('admin/aranceltram/form', $data);
        } else {
            $data = array(
                'id_tramite' => $this->input->post('id_tramite'),
                'monto_gen' => $this->input->post('monto_gen'),
                'monto_mp' => $this->input->post('monto_mp'),
                'status' => $this->input->post('status') ? 1 : 0
            );
            
            $resultado = $this->Aranceltram_model->update($id, $data);
            
            if ($resultado) {
                $this->session->set_flashdata('success', 'Arancel de trámite actualizado exitosamente');
            } else {
                $this->session->set_flashdata('error', 'Error al actualizar el arancel de trámite');
            }
            
            redirect('admin/aranceltram');
        }
    }

    public function eliminar($id) {
        $data = array('status' => 0);
        $resultado = $this->Aranceltram_model->update($id, $data);
        
        if ($resultado) {
            $this->session->set_flashdata('success', 'Arancel de trámite desactivado exitosamente');
        } else {
            $this->session->set_flashdata('error', 'Error al desactivar el arancel de trámite');
        }
        
        redirect('admin/aranceltram');
    }

    public function activar($id) {
        $data = array('status' => 1);
        $resultado = $this->Aranceltram_model->update($id, $data);
        
        if ($resultado) {
            $this->session->set_flashdata('success', 'Arancel de trámite activado exitosamente');
        } else {
            $this->session->set_flashdata('error', 'Error al activar el arancel de trámite');
        }
        
        redirect('admin/aranceltram');
    }
}