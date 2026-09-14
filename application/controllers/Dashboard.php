<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model("Usuarios_model");
		

		if (!$this->session->userdata("login")) {
			redirect(base_url());
		}
	}

	public function index()
	{
		
		$this->load->view('layouts/header');
		$this->load->view('layouts/sidebar');
		$this->load->view('admin/dashboard');
		$this->load->view('layouts/footer');
	}

public function condpro()
	{

		//$data = array(
			//'condominio' => $this->Condominio_model->get_CondominiosId($id),
		//	'seccion' => $this->Seccion_model->getSecciones($id),
		// );
		// $row = $this->Condominio_model->get_CondominiosId($id);
        // $sess_array = array(
        //        'id_condominio' => $row->id,
        //        'nombre_condominio' => $row->nombre
        //    );
        //    $this->session->set_userdata($sess_array);
		//$id_condominio = $this->session->userdata("id");

		$this->load->view('layouts/header');
		$this->load->view('layouts/sidebar');
		$this->load->view('admin/propietario/condprop_001');
		$this->load->view('layouts/footer');
	}

	public function menu($id)
	{

		$data = array(
			//'condominio' => $this->Condominio_model->get_CondominiosId($id),
			'seccion' => $this->Seccion_model->getSecciones($id),
		 );
		 $row = $this->Condominio_model->get_CondominiosId($id);
         $sess_array = array(
                'id_condominio' => $row->id,
                'nombre_condominio' => $row->nombre
            );
            $this->session->set_userdata($sess_array);
		//$id_condominio = $this->session->userdata("id");

		$this->load->view('layouts/header');
		$this->load->view('layouts/sidebar');
		$this->load->view('admin/seccion/sistem_001',$data);
		$this->load->view('layouts/footer');
	}
	public function menu1($id)
	{
		$data  = array(
			'condominio_edit' => $this->Condominio_model->get_CondominiosId($id), 
		);

		$this->load->view('layouts/header');
		$this->load->view('layouts/sidebar');
		$this->load->view('admin/seccion/sistem_002',$data);
		$this->load->view('layouts/footer');
	}
	public function menu2($id)
	{
		$data = array(
			'combo_seccion' => $this->Seccion_model->getSecciones($id),
			'propietarios' => $this->Propietario_model->getPropietarios($id),
		 );

		$this->load->view('layouts/header');
		$this->load->view('layouts/sidebar');
		$this->load->view('admin/seccion/sistem_003',$data);
		$this->load->view('layouts/footer');
	}
	public function menu3($id)
	{
		$data = array(
			'list_propietarios' => $this->Propietario_model->getListPropietarios($id),
		 );

		$this->load->view('layouts/header');
		$this->load->view('layouts/sidebar');
		$this->load->view('admin/seccion/sistem_004',$data);
		$this->load->view('layouts/footer');
	}
	public function menu4($id)
	{
		$data = array(
			'list_propietarios' => $this->Propietario_model->getListPropietarios($id),
		 );
		$this->load->view('layouts/header');
		$this->load->view('layouts/sidebar');
		$this->load->view('admin/seccion/sistem_005',$data);
		$this->load->view('layouts/footer');
	}

	public function seccion_store($id_condominio)
	{
		$nombre = $this->input->post("nombre");
		$condominio_id = $this->session->userdata("id_condominio");

		$data  = array(
			'nombre' => $nombre, 
			'condominio_id' => $condominio_id
		);

		if ($this->Seccion_model->save($data)) {
			redirect(base_url()."dashboard/menu/$condominio_id");
		}
		else{
			$this->session->set_flashdata("error","No se pudo guardar la informacion");
			redirect(base_url()."dashboard/menu/$condominio_id");
		}
	}

	public function propietario_store($id_condominio)
	{
		$nro_vivienda = $this->input->post("nro_vivienda");
		$correo = $this->input->post("correo");
		$apellidos = $this->input->post("apellidos");
		$checkbox = $this->input->post("checkbox");
		$cargo = $this->input->post("cargo");
		$seccion = $this->input->post("seccion");
		$nombres = $this->input->post("nombres");
		$telefono = $this->input->post("telefono");
		$comentario = $this->input->post("comentario");
		$condominio_id = $this->session->userdata("id_condominio");

		$data  = array(
			'nro_vivienda' => $nro_vivienda, 
			'correo' => $correo, 
			'apellidos' => $apellidos, 
			'pertenece_concejo' => $checkbox, 
			'cargo' => $cargo, 
			'seccion_id' => $seccion, 
			'nombres' => $nombres, 
			'telefono' => $telefono, 
			'comentario' => $comentario, 
			'condominio_id' => $condominio_id
		);

		if ($this->Propietario_model->save($data)) {
			redirect(base_url()."dashboard/menu2/$condominio_id");
		}
		else{
			$this->session->set_flashdata("error","No se pudo guardar la informacion");
			redirect(base_url()."dashboard/menu2/$condominio_id");
		}
	}

	public function envio_correo($id)
	{
	
	// Informacion de los propietarios a quienes se le enviara el correo	
	$cuerpo = $this->input->post("cuerpo");		
	if(isset($_POST)){
		if(!empty($_POST['chekbox1'])) {
		// Contando el numero de input seleccionados "checked" checkboxes.
		//$checked_contador = count($_POST['chekbox1']);
		//echo "<p>Has seleccionado los siguientes ".$checked_contador." opcione(s):</p> <br/>";
		// Bucle para almacenar y visualizar valores activados checkbox.
			foreach($_POST['chekbox1'] as $seleccion) {

				////GENERAR CLAVE

            $caracteres='ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
			$longpalabra=8;
			for($pass='', $n=strlen($caracteres)-1; strlen($pass) < $longpalabra ; ) 
			{
    			$x = rand(0,$n);
    			$pass.= $caracteres[$x];
			}
			//// print 'Nuestra contraseña obtenida es: ' . $pass;

              

				// para ver el correo y el cuerpo del mensaje
				echo "<p>".$seleccion ."</p>";
				echo "<p>".$cuerpo ."</p>";
				// envio del correo

					/// Envio de correo

				        
				       //Indicamos el protocolo a utilizar
				        $config['protocol'] = 'smtp';
				         
				       //El servidor de correo que utilizaremos
				        $config["smtp_host"] = 'smtp.gmail.com';
				         
				       //Nuestro usuario
				        $config["smtp_user"] = 'alexisbompart@gmail.com';
				         
				       //Nuestra contraseña
				        $config["smtp_pass"] = 'bompart';    
				         
				       //El puerto que utilizará el servidor smtp
				        $config["smtp_port"] = 465;
				        
				       //El juego de caracteres a utilizar
				        $config['charset'] = 'utf-8';
				 
				       //Permitimos que se puedan cortar palabras
				        $config['wordwrap'] = TRUE;

				        //Permitimos que se puedan cortar palabras
				        $config['smtp_crypto'] = 'ssl';
				        
				        //Permitimos que se puedan cortar palabras
				        $config['smtp_timeout'] = '30';
				         
				       //El email debe ser valido  
				       $config['validate'] = TRUE;
				      //  $config['newline']    = "\r\n";

				       $config['mailtype'] = 'html';

				      //  $config['validation'] = TRUE;
				       
				        
				      //Establecemos esta configuración
				        $this->email->initialize($config);
				 		$this->load->library('email');
				 		$this->email->set_newline("\r\n");
				      //Ponemos la dirección de correo que enviará el email y un nombre
				        $this->email->from('alexisbompart@gmail.com', 'Alexis Bompart');
				         
				      //Ponemos la dirección de correo que enviará el email y un nombre
				        $this->email->to($seleccion, 'Prueba');
				         
				      //Definimos el asunto del mensaje
				        $this->email->subject('Nombre de Usuario y Password del sistema de Condomino');
				         
				      //Definimos el mensaje a enviar
				        $this->email->message(" $cuerpo, su usuario es: $seleccion y su clave: $pass");
				         
				        //Enviamos el email y si se produce bien o mal que avise con una flasdata
				        if($this->email->send()){
				        	//echo "si";
				           // var_dump($this->email->print_debugger());
				           $this->session->set_flashdata('error', 'Email enviado correctamente');
				        }else{
				        	//echo "no";
				           // var_dump($this->email->print_debugger());
				            $this->session->set_flashdata('error', 'No se a enviado el email');
				        }
				         
				        // redirect(base_url("contacto"));

				        

				     //// FIN DE ENVIO DE CORREO

				}
				//echo "<br/><b>Nota :</b> <span>De manera similar, también puede realizar operaciones CRUD usando estos valores seleccionados.</span>";

				redirect(base_url()."dashboard/menu4/$id");

				}
			else{
			echo "<p><b>Por favor seleccione al menos una opción.</b></p>";
			}
	}



	}

	public function conta1($id)
	{
		$data = array(
			//'condominio' => $this->Condominio_model->get_CondominiosId($id),
			'seccion' => $this->Seccion_model->getSecciones($id),
		 );
		
		$this->load->view('layouts/header');
		$this->load->view('layouts/sidebar');
		$this->load->view('admin/contabilidad/contab_001',$data);
		$this->load->view('layouts/footer');
	}

	public function conta2($id)
	{
		$data = array(
			//'condominio' => $this->Condominio_model->get_CondominiosId($id),
			'seccion' => $this->Seccion_model->getSecciones($id),
		 );
		
		$this->load->view('layouts/header');
		$this->load->view('layouts/sidebar');
		$this->load->view('admin/contabilidad/contab_002',$data);
		$this->load->view('layouts/footer');
	}

	public function conta3($id)
	{
		$data = array(
			//'condominio' => $this->Condominio_model->get_CondominiosId($id),
			'seccion' => $this->Seccion_model->getSecciones($id),
		 );
		
		$this->load->view('layouts/header');
		$this->load->view('layouts/sidebar');
		$this->load->view('admin/contabilidad/contab_003',$data);
		$this->load->view('layouts/footer');
	}

	public function conta4($id)
	{
		$data = array(
			//'condominio' => $this->Condominio_model->get_CondominiosId($id),
			'seccion' => $this->Seccion_model->getSecciones($id),
		 );
		
		$this->load->view('layouts/header');
		$this->load->view('layouts/sidebar');
		$this->load->view('admin/contabilidad/contab_004',$data);
		$this->load->view('layouts/footer');
	}

	public function conta5($id)
	{
		$data = array(
			//'condominio' => $this->Condominio_model->get_CondominiosId($id),
			'seccion' => $this->Seccion_model->getSecciones($id),
		 );
		
		$this->load->view('layouts/header');
		$this->load->view('layouts/sidebar');
		$this->load->view('admin/contabilidad/contab_005',$data);
		$this->load->view('layouts/footer');
	}

	public function principal($id)
	{
		$data = array(
			//'condominio' => $this->Condominio_model->get_CondominiosId($id),
			'seccion' => $this->Seccion_model->getSecciones($id),
		 );
		
		$this->load->view('layouts/header');
		$this->load->view('layouts/sidebar');
		$this->load->view('admin/dashboard_principal',$data);
		$this->load->view('layouts/footer');
	}


}