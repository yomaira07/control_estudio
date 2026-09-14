<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function __construct(){
		parent::__construct();
		
		$this->load->model("Programa_model"); 
		$this->load->model("Periodo_model"); 

		
	}

	public function index()
	{
		$this->load->view('layouts/header');
		$this->load->view('layouts/sidebar');
		$this->load->view('admin/login');
		//$this->load->view('layouts/footer');
	}
		
	public function registrarse()
	{
		if(!$this->Periodo_model->PeriodoActivo_asp()){?>

			<script> alert ("El proceso de selección de Aspirantes esta cerrado. Este atento a las futuras publicaciones de nuestra página web www.enf.edu.ve, en relación al próximo proceso de selección.");
							location.assign("<?php echo base_url(); ?>"); </script>
			<?php
		
		}else{
			$data["list_programa"] = $this->Programa_model->getPrograma_estatus_convocatoria();
			$this->load->view('layouts/header_registro');
			//$this->load->view('layouts/sidebar');
			//$this->index();

			$this->load->view('admin/registrarse',$data);
			$this->load->view('layouts/footer');
		}
	}
	public function olvido_contrasena()
	{	
		$this->load->view('layouts/header_registro');
		//$this->load->view('layouts/sidebar');
		$this->load->view('admin/usuario/olvido_contrasena');
		$this->load->view('layouts/footer');
	}
	public function recuperar_usuario()
	{	
		$this->load->view('layouts/header_registro');
	//	$this->load->view('layouts/sidebar_inicio');
		$this->load->view('admin/recuperar_usuario');
		$this->load->view('layouts/footer');
	}
	public function recuperar_acceso()
	{	
		$this->load->view('layouts/header_registro');
	//	$this->load->view('layouts/sidebar_inicio');
		$this->load->view('admin/inicio_recuperar_acceso');
		$this->load->view('layouts/footer');
	}
public function registrarse_nvo_ingreso()
	{
		if(!$this->Periodo_model->PeriodoActivo_asp()){?>

			<script> alert ("El proceso de Inscripción de Nuevo Ingreso esta cerrado. Este atento a las futuras publicaciones de nuestra página web www.enf.edu.ve, en relación al próximo proceso de inscripción.");
							location.assign("<?php echo base_url(); ?>"); </script>
			<?php
		
		}else{
			$data["list_programa"] = $this->Programa_model->getPrograma_estatus_convocatoria();
			$this->load->view('layouts/header_registro');
			$this->load->view('admin/registrarse_nvo_ingreso',$data);
			$this->load->view('layouts/footer');
		}
		
	}
	
}

