<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct(){
		parent::__construct();
		// aqui se realiza el llamado del modelo a utilizar
		$this->load->model("Usuarios_model");
		$this->load->model("Rol_model");
		$this->load->model("Tiempo_preinscripcion_model");
	}

	public function index()
	{
		if ($this->session->userdata("login")) {
			if ($this->session->userdata("rol")=='1') 
				{
				redirect(base_url()."admin/usuario/index");
				}
			if ($this->session->userdata("rol")=='2') 
				{
				redirect(base_url()."admin/oferta_academica");
				}
			if ($this->session->userdata("rol")=='3') 
				{
				redirect(base_url()."dashboard02");
				}
			if ($this->session->userdata("rol")=='4') 
				{
				redirect(base_url()."dashboard03");
				}
			if ($this->session->userdata("rol")=='5' or $this->session->userdata("rol")=='8') 
				{
					redirect(base_url()."dashboard04/home");	
				}
			if( $this->session->userdata("rol")=='7')
			{
				redirect(base_url()."dashboard08");	
			}
			if ($this->session->userdata("rol")=='6') 
				{
				redirect(base_url()."dashboard05");
				}
			if ($this->session->userdata("rol")=='9') 
				{
				redirect(base_url()."dashboard06");
				}
			if ($this->session->userdata("rol")=='10') 
				{
				redirect(base_url()."dashboard07");
			}	
			if ($this->session->userdata("rol")=='11') 
				{
				redirect(base_url()."admin/");
			}	
		}else{
		$this->load->view('admin/login');
		}
	} 

	public function login(){
		$username = $this->input->post("username");
		$password = $this->input->post("password");
		//realizamos el llamado del modelo y le enviamos la variables
		$res = $this->Usuarios_model->login($username,sha1($password));
		//verificamos si es veldadero el usuario
		if (!$res){
			$this->session->set_flashdata("error","El usuario y/o contraseña son incorrectos");
redirect(base_url());
		}
		else{
			$data  = array(
				'id' => $res->id, 
				'nombre' => $res->nombres,
				'apellido' => $res->apellidos,
				'rol' => $res->rol_id,
				'estado' => $res->estado,
				'login' => TRUE,
				'username' => $res->username,
				'idprograma' => $res->programa_id,
				'modalidad'=> $res->modalidad,
				'trimestre'=> $res->trimestre,
				'planilla'=> $res->ver_planilla,
				'ruc'=> $res->ruc,
				'egresado'=> $res->egresado,
				'tiempo_preinscripcion'=> $res->id_tiempo_preinscripcion,
				'tramite_fuera_lapso'=> $res->tramite_fuera_lapso,				
				'fuera_lapso_tra_adm'=>$res->fuera_lapso_tra_adm,
				'inscripcion'=>$res->inscripcion);
			$this->session->set_userdata($data);
			if ($this->session->userdata("rol")=='1') 
				{
				redirect(base_url()."admin/usuario/index");
				}
			if ($this->session->userdata("rol")=='2') 
				{
				redirect(base_url()."admin/oferta_academica");
				}
			if ($this->session->userdata("rol")=='3') 
				{
				redirect(base_url()."dashboard02");
				}
			if ($this->session->userdata("rol")=='4') 
				{
				redirect(base_url()."dashboard03");
				}
			if ($this->session->userdata("rol")=='5'  or $this->session->userdata("rol")=='8') 
				{
				if(!$this->Tiempo_preinscripcion_model->gettiempo_preinscripcion())
				{
					$this->session->set_flashdata("error","Tiempo de Preinscripción CERRADO");		
					$this->load->view('admin/login');				
				}else{
					redirect(base_url()."dashboard04/home");
				}
			}		if ($this->session->userdata("rol")=='7' ) 
			{
			if(!$this->Tiempo_preinscripcion_model->gettiempo_preinscripcion())
			{
				$this->session->set_flashdata("error","Tiempo de Preinscripción CERRADO");		
				$this->load->view('admin/login');				
			}else{
				redirect(base_url()."dashboard08");
			}
		}	

			if ($this->session->userdata("rol")=='6') 
				{
				redirect(base_url()."dashboard05");
				}
			if ($this->session->userdata("rol")=='9') 
				{
				redirect(base_url()."dashboard06");
				}
				if ($this->session->userdata("rol")=='10' )
				{
				redirect(base_url()."dashboard05/revisar_plan_clases");
				}
				 if($this->session->userdata("rol")=='11') {
				 	redirect(base_url()."admin/docente/index");
				}
				if($this->session->userdata("rol")=='12') {
				 	redirect(base_url()."dashboard05/notas_cargadas");
				}
		}
	}
	
	public function logout(){
		$this->session->sess_destroy();
		redirect(base_url());
	}

	public function cambio_clave(){
		$this->load->view('layouts/header');
		$this->load->view('layouts/sidebar');
		$this->load->view('admin/usuario/cambio_clave');
		$this->load->view('layouts/footer');
	}

	
	public function clave_store(){// cambia la clave cuando esta logeado elusuario

		$id_usuario = $this->session->userdata('id');
		$clave = sha1($this->input->post("clave"));
		$fecha=date("Y-m-d H:i:s");
		$data  = array(
			'password' => $clave,
			'fecha_registro'=>$fecha,
		);
		$this->Usuarios_model->cambio($id_usuario,$data);
		redirect(base_url());
	}

	public function enviar_clave()// envia la clave si olvido contraseña
	{
		//preparamos los datos
	//	var_dump($this); 
	//	$usuario = $this->input->post("username");
		$email = $this->input->post("correo");
		//echo "ddd".$email;
		$data= $this->Usuarios_model->buscar_usuario_correo1($email);
		//var_dump($data);
		if($data->estado==1 and ($data->rol_id==5 or $data->rol_id==8)){

			$id_usuario=$data->id;
			$nombre=$data->nombres;
			$apellido=$data->apellidos;
			$cedula =$data->username;
			$rol=$this->Rol_model->get_rol($data->rol_id);
			//$rol=$
			$contrasena='123';
			$explode = explode("@", $email);
			foreach($rol as  $rol){
				$rol=$rol->descripcion;
			}
		
			if ($explode[1] == "GMAIL.COM") {
				if($data->email==$this->input->post("correo")){
					//configuracion para gmail
					$clave = sha1($contrasena);
					$status = 1;
					$fecha=date("Y-m-d H:i:s");
					$data_up = array(
						'password' => $clave,			
						'estado' => $status,
						'fecha_actualizacion'=>$fecha,
					);
					if($this->Usuarios_model->update_usuario($id_usuario,$data_up)){
						/*$configGmail = array(
							

							'protocol' => 'smtp',
							'smtp_host' => 'ssl://smtp.gmail.com',
							'smtp_port' => 465,
							'smtp_user' => 'noresponder.enfmp@gmail.com',
							
							'smtp_pass' => 'cznh lkqs epqe ihhz',
							'mailtype' => 'html',
							'charset' => 'utf-8',
							'newline' => "\r\n",
							'smtp_timeout' => '20',
							'validate' => TRUE
						);  */
						//var_dump($configGmail);
						
							
							$msg = '<h2>Estimado(a) Sr(a). '.$nombre.' '.$apellido.'</h2><br><p>Sus datos de acceso a nuestro sistema de CONTROL DE ESTUDIOS ENFMP son los siguientes:</p> 
							<h2><br> Usuario: '.$cedula .'<br> Contraseña:'.$contrasena.' <br>Acceso como: '.$rol.'</h2><p>Importante:
							</p>
							<p>
							La información que suministre a través de esta herramienta, será tratada con estricta confidencialidad.
							Ministerio Público.- Fundación Escuela Nacional de Fiscales 

							Cuidemos el Medio Ambiente, por favor,no imprima este mensaje, solo tome nota de ser necesario de los datos suministrados. 

							Escuela Nacional de Fiscales del Ministerio Público</p>';
						

						//cargamos la libreria email de ci
						/*$this->load->library("email");
						$this->email->clear(TRUE);
						$this->email->initialize($configGmail);
						$this->email->from('escuela.fiscales@enf.edu.ve');
						$this->email->to('"'.$email.'"');
						$this->email->subject('Escuela Nacional de Fiscales del Ministerio Público -Olvidò su Contraseña- CONTROL DE ESTUDIOS');
						$this->email->message($msg);
						//$this->email->attach('public/temporal/'.$archivo);
						sleep(30);
						//var_dump();
						//echo "va enviar";
						if ($this->email->send())
						{ */
							
							$this->session->set_flashdata("info","Mensaje enviado exitosamente".$msg);
							redirect(base_url()."welcome/olvido_contrasena");
						//return $this->email->print_debugger();
							//return true;
						/*} else {
							//var_dump($this->email);
							//$this->email->print_debugger();
							$this->session->set_flashdata("error","Problemas para el envío de Email. Por favor Intente mas tarde");
							redirect(base_url()."welcome/olvido_contrasena");
						}
						$this->email->clear(TRUE);*/
					}else{
						if($data->username<>$this->input->post("username")){
							$this->session->set_flashdata("error","Usuario no coincide.");
							redirect(base_url()."welcome/olvido_contrasena");
						}else{
							$this->session->set_flashdata("error","El correo no coincide con el registrado.");
							redirect(base_url()."welcome/olvido_contrasena");
						}
					}
					}else{
						$this->session->set_flashdata("info","No se pudo guardar la información");
						redirect(base_url()."welcome/olvido_contrasena");
					}
			}else{
				$this->session->set_flashdata("info","Por favor debe indicar un correo GMAIL.");
					redirect(base_url()."welcome/olvido_contrasena");
			}
		}elseif($data->estado==0 and ($data->rol_id==5 or $data->rol_id==8) ){
			$this->session->set_flashdata("warning","Usuario y correo electrónico Inactivo. Para recuperar su acceso debe hacer clic en RECUPERAR USUARIO (ESTUDIANTE REGULAR)");
			redirect(base_url());
		}elseif($data->estado==0 and ($data->rol_id<> 5 and $data->rol_id<>8)){
			$this->session->set_flashdata("error","Usuario  y correo electrónico No Registrado como <b>ESTUDIANTE REGULAR</b> seguramente su correo esta siendo utilizado para otro tipo de acceso.Por favor comunicarse con <b>tecnologia@enf.edu.ve </b> para verificar su acceso.
			<b>NOTA</b>: Indicar en la descripción del correo su Cédula de identidad, Nombres y Apellidos y pequeña reseña de la falla, (copie este mensaje en la reseña explicativa).");
			redirect(base_url());
		}else{
			$this->session->set_flashdata("error","Usuario  y correo electrónico No Registrado.Por favor comunicarse con <b>tecnologia@enf.edu.ve </b> para verificar su acceso.
			<b>NOTA</b>: Indicar en la descripción del correo su Cédula de identidad, Nombres y Apellidos y pequeña reseña de la falla.");
			redirect(base_url());
		}
	}

	
/* public function enviar_clave()// envia la clave si olvido contraseña
	{
		//preparamos los datos
	//	var_dump($this); 
	//	$usuario = $this->input->post("username");
		$email = $this->input->post("correo");
		//echo "ddd".$email;
		$data= $this->Usuarios_model->buscar_usuario_correo1($email);
		//var_dump($data);
		if($data->estado==1){

			$id_usuario=$data->id;
			$nombre=$data->nombres;
			$apellido=$data->apellidos;
			$cedula =$data->username;
			$rol=$this->Rol_model->get_rol($data->rol_id);
			//$rol=$
			$contrasena='123';
			$explode = explode("@", $email);
			foreach($rol as  $rol){
				$rol=$rol->nombre;
			}
		
			if ($explode[1] == "GMAIL.COM") {
				if($data->email==$this->input->post("correo")){
					//configuracion para gmail
					$clave = sha1($contrasena);
					$status = 1;
					$fecha=date("Y-m-d H:i:s");
					$data_up = array(
						'password' => $clave,			
						'estado' => $status,
						'fecha_actualizacion'=>$fecha,
					);
					if($this->Usuarios_model->update_usuario($id_usuario,$data_up)){
						$configGmail = array(
							

							'protocol' => 'smtp',
							//'smtp_host' => 'ssl://smtp.gmail.com',
							//'smtp_port' => 465,
							'smtp_host' => 'ssl://carbonio.enf.edu.ve',
							'smtp_port' => 25,
							'smtp_user' => 'enfmp@carbonio.enf.edu.ve',
							'smtp_pass' => 'EnfmpApp5',
							//'smtp_pass' => 'cznh lkqs epqe ihhz',
							'mailtype' => 'html',
							'charset' => 'utf-8',
							'newline' => "\r\n",
							'smtp_timeout' => '20',
							'validate' => TRUE
						);  
						//var_dump($configGmail);
						
							
							$msg = '<h2>Estimado Sr.(a)'.$nombre.' '.$apellido.'</h2><br><p>Sus datos de acceso a nuestro sistema de CONTROL DE ESTUDIOS ENFMP son los siguientes:</p> 
							<br> Usuario: '.$cedula .'<br> Contraseña:'.$contrasena.' <br>Acceso como: '.$rol.'<p>Importante:
							</p>
							<p>
							La información que suministre a través de esta herramienta, será tratada con estricta confidencialidad.
							Ministerio Público.- Fundación Escuela Nacional de Fiscales 

							Cuidemos el Medio Ambiente, por favor,no imprima este correo electrónico si no es necesario. 

							Escuela Nacional de Fiscales del Ministerio Público</p>';
						

						//cargamos la libreria email de ci
						$this->load->library("email");
						$this->email->clear(TRUE);
						$this->email->initialize($configGmail);
						$this->email->from('escuela.fiscales@enf.edu.ve');
						$this->email->to('"'.$email.'"');
						$this->email->subject('Escuela Nacional de Fiscales del Ministerio Público -Olvidò su Contraseña- CONTROL DE ESTUDIOS');
						$this->email->message($msg);
						//$this->email->attach('public/temporal/'.$archivo);
						sleep(30);
						//var_dump();
						echo "va enviar<br>";
						if ($this->email->send())
						{ 
							
							$this->session->set_flashdata("info","Correo enviado exitosamente. Por favor Revisar su Email <b>".$email. "</b> <br> En caso de no visualizar el correo enviado en su <b>Bandeja de Entrada</b> , favor verifique los <b>spams o correos no deseados.</b>");
							redirect(base_url()."welcome/olvido_contrasena");
						return $this->email->print_debugger();
						//	return true;
						} else {
							//var_dump($this->email);
							$this->email->print_debugger();							
var_dump($this->email->print_debugger());
$this->session->set_flashdata("error","Problemas para el envío de Email. Por favor Intente mas tarde");
							redirect(base_url()."welcome/olvido_contrasena");
						}
						//$this->email->clear(TRUE);
					}else{
						if($data->username<>$this->input->post("username")){
							$this->session->set_flashdata("error","Usuario no coincide.");
							redirect(base_url()."welcome/olvido_contrasena");
						}else{
							$this->session->set_flashdata("error","El correo no coincide con el registrado.");
							redirect(base_url()."welcome/olvido_contrasena");
						}
					}
					}else{
						$this->session->set_flashdata("info","No se pudo guardar la información");
						redirect(base_url()."welcome/olvido_contrasena");
					}
			}else{
				$this->session->set_flashdata("info","Problemas para el envío de Email. Por favor debe indicar un correo GMAIL.");
					redirect(base_url()."welcome/olvido_contrasena");
			}
		}else{
			$this->session->set_flashdata("error","Usuario no Registrado o Inactivo.Por favor comunicarse con <b>tecnologia@enf.edu.ve </b> para revisar su Usuario. En caso de ser un aspirante debe Hacer clic en <b>REGISTRARSE</b> para activar su usuario. ");
			redirect(base_url()."welcome/");
		}
	}*/
	
}
