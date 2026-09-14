<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Aspirante extends CI_Controller {

	public function __construct(){
		parent::__construct();
		// aqui se realiza el llamado del modelo a utilizar
		$this->load->model("Usuarios_model");
		$this->load->model("Alumno_model");
		$this->load->model("Registro_pago_model");
		$this->load->model("Periodo_model");
	}

	public function index()
	{
		
		//echo "creando el usuario";
		$this->load->view('admin/login');
		
	}

public function crear_usuario(){
		//echo "creando el usuario";
		$primer_nombre = $this->input->post("primer_nombre");
		$segundo_nombre = $this->input->post("segundo_nombre");
		$primer_apellido = $this->input->post("primer_apellido");
		$segundo_apellido = $this->input->post("segundo_apellido");
		$cod_nacionalidad = $this->input->post("cod_nacionalidad");
		$cedula = $this->input->post("cedula");
		$correo = $this->input->post("correo");
		$programas=$this->input->post('str');
		$acepto=$this->input->post('acepto');
		$clave=123;
		if (strlen($cedula)>8 ){
		  	
		  	$cedula= trim($cod_nacionalidad).trim($cedula); //el caso de los rif
		
		}

		if($programas==''){
			$this->session->set_flashdata("error","Debe seleccionar el Postgrado o Especialidad que desea participar.");
			redirect(base_url()."welcome/registrarse/0");
		}else{
			// validando correo
			$explode = explode("@", $correo);
					if ($explode[1] == "GMAIL.COM") {

					
					$data_usuario_nuevo  = array(
					'nombres' => $primer_nombre." ".$segundo_nombre,
					'apellidos' => $primer_apellido." ". $segundo_apellido,				
					'username' => $cedula, 				
					'email' => $correo,
					'rol_id'=>7,
					'programa_id'=>$programas,
					'estado'=>$acepto,
					'password'=>sha1($clave),
					'fecha_actualizacion'=>date('Y-m-d h:m:s')

					);
					$data_activar_usuario  = array(						
						'rol_id'=>7,
						'programa_id'=>$programas,
						'estado'=>$acepto,
						'email' => $correo,
						'password'=>sha1($clave),
						'fecha_actualizacion'=>date('Y-m-d h:m:s')	
						);
					
				
				//var_dump($data_usuario);
				/*if (strlen($cedula)>9 ){
					$cedula=substr($cedula, 1); 
					  $cedula=substr($cedula, 0, -1);
					  $cedula= strval($cedula);
				
				}else{
					$cedula= strval($cedula);
				}*/
				$aspirante=$this->Usuarios_model->buscar_usuario_aspirante($cedula);
			if(!$aspirante){
				if($this->Usuarios_model->save($data_usuario_nuevo)){
					$this->session->set_flashdata("info","Usuario Registrado exitosamente!!. <br>  <br> Sus datos para ingresar son:</h2> <h1><b> Usuario: ".$cedula." Contraseña: ".$clave."</b></h1> <br>
					<br>Correo Electrónico Registrado: <br> ".$correo."<br>Si desea cambiar el correo electronico debe 
					comunicarse con la Dirección de Secretaria General de la ENFMP, a través del correo electrónico <i>procesodeseleccon2026@gmail.com</i><br><br><img src='/control_estudio/assets/img/Logoblanco.png'  width='100px' height='100px'/> Haz clic  <b><a href='/control_estudio' title='Ir a SCE-ENFMP'> AQUI </a> </b> para ingresar al Sistema Control de Estudios ENFMP e ingresar con el Usuario y Contraseña suministrado 
					para completar el registro en línea, documentos y el pago del arancel." );
										redirect(base_url()."welcome/registrarse/1");
				}else{
					$this->session->set_flashdata("error","1.No se pudo guardar la información, debe colocar un correo gmail diferente, posiblemente ya este se encuentra registrado en nuestro sistema como estudiante. Si usted ha sido estudiante <b>regular o egresado</b> en nuestra plataforma debe registrarse con el N° RIF.");
					redirect(base_url()."welcome/registrarse/0");
				}	
				
			}else{
				foreach($aspirante as $aspirante){		
					//echo "verifico si es aspirante ".$aspirante->id;		
					if ($aspirante->estado==1) {	
						$periodo=$this->Periodo_model->PeriodoActivo_asp();
						if(!$this->Registro_pago_model->RegistradoPago_asp($id_usuario,$periodo->id)){
							$this->Usuarios_model->update_usuario($aspirante->id,$data_activar_usuario);
							$this->session->set_flashdata("info","<b><h2>Ya existe Usuario Activo!!.</b> <br>  <br> Sus datos para ingresar son:</h2> <h1><b> Usuario: ".$aspirante->username." Contraseña: ".$clave."</b></h1> <br>
							<br>Correo Electrónico Actualizado: <br> ".$correo."<br> Si desea cambiar el correo electronico debe 
							comunicarse con la Dirección de Secretaria General de la ENFMP, a través del correo electrónico <i>procesodeseleccon2026@gmail.com</i><br><br><img src='/control_estudio/assets/img/Logoblanco.png'  width='100px' height='100px'/> Haz clic  <b><a href='/control_estudio' title='Ir a SCE-ENFMP'> AQUI </a> </b> para acceder al Sistema Control de Estudios ENFMP e ingresar con el Usuario y Contraseña suministrado 
							para completar el registro en línea, documentos y el pago del arancel." );
											redirect(base_url()."welcome/registrarse/1");
						}else{
								$this->session->set_flashdata("info","<b><h2>Ya existe Usuario Activo!!.</b> <br>  <br> Sus datos para ingresar son:</h2> <h1><b> Usuario: ".$aspirante->username." Contraseña: ".$clave."</b></h1> <br>
							<br>Correo Electrónico Actualizado: <br> ".$correo."<br> Si desea cambiar el correo electronico debe 
							comunicarse con la Dirección de Secretaria General de la ENFMP, a través del correo electrónico <i>procesodeseleccon2026@gmail.com</i><br><br><img src='/control_estudio/assets/img/Logoblanco.png'  width='100px' height='100px'/> Haz clic  <b><a href='/control_estudio' title='Ir a SCE-ENFMP'> AQUI </a> </b> para acceder al Sistema Control de Estudios ENFMP e ingresar con el Usuario y Contraseña suministrado 
							para completar el registro en línea, documentos y el pago del arancel." );
											redirect(base_url()."welcome/registrarse/1");
						}
						
					//var_dump($aspirante);	
					//	var_dump($data_usuario);
					}else{
					//	echo "es aspirante inabilitado   ". $aspirante->estado."--" .$aspirante->id. "<br>";
						if($validar_correo=$this->Usuarios_model->buscar_usuario_correo1($correo)){	
							//	var_dump($validar_correo);
								if($validar_correo->id== $aspirante->id){		
									if($this->Usuarios_model->update_usuario($aspirante->id,$data_activar_usuario )){							
										$this->session->set_flashdata("info","<b><h2>Aspirante Registrado exitosamente!!.</b> <br>  <br> Sus datos para ingresar son: </h2> <h1><b> Usuario: ".$aspirante->username." 
										Contraseña: ".$clave."</b></h1> <br>Correo Electrónico Registrado por el aspirante: <br> ".$correo."<br><br><img src='/control_estudio/assets/img/Logoblanco.png'  width='100px' height='100px'/> Haz clic  <b><a href='/control_estudio' title='Ir a SCE-ENFMP'> AQUI </a> </b> para acceder al Sistema Control de Estudios ENFMP e ingresar con el Usuario y Contraseña suministrado 
										para completar el registro en línea, documentos y el pago del arancel." );
										redirect(base_url()."welcome/registrarse/1");
									}else{
										$this->session->set_flashdata("error","3.No se pudo guardar la información");
										redirect(base_url()."welcome/registrarse/1");
									}	
								}else{
									$this->session->set_flashdata("error","2.No se pudo guardar la información, debe colocar un correo gmail diferente, posiblemente ya este se encuentra registrado en nuestro sistema como estudiante. Si usted ha sido estudiante <b>regular o egresado</b> en nuestra plataforma debe registrarse con el N° RIF.");
									redirect(base_url()."welcome/registrarse/0");
								}																					
						}else{
							if($this->Usuarios_model->update_usuario($aspirante->id,$data_activar_usuario)){
								$this->session->set_flashdata("info","<b><h2>Aspirante Registrado exitosamente!!.</b> <br>  <br> Sus datos para ingresar son: </h2> <h1><b> Usuario: ".$aspirante->username." 
										Contraseña: ".$clave."</b></h1> <br>Correo Electrónico Registrado por el aspirante: <br> ".$correo."<br><br><img src='/control_estudio/assets/img/Logoblanco.png'  width='100px' height='100px'/> Haz clic  <b><a href='/control_estudio' title='Ir a SCE-ENFMP'> AQUI </a> </b> para acceder al Sistema Control de Estudios ENFMP e ingresar con el Usuario y Contraseña suministrado 
										para completar el registro en línea, documentos y el pago del arancel." );
								redirect(base_url()."welcome/registrarse/1");
							}else{
								$this->session->set_flashdata("error","No se pudo guardar la información.debe revisar los datos que intenta registrar.");
								redirect(base_url()."welcome/registrarse/0");
							}	
						}

					}
				}
			}
		}else{
			$this->session->set_flashdata("error","No se pudo guardar la informaciòn. Debe registrar un correo GMAIL");
			redirect(base_url()."welcome/registrarse/0");
		}

	}			
	
	
	}





	public function enviar_clave($data){
		//preparamos los datos
		//var_dump($data);
		$email= $data['email'];
		$cedula=$data['username'];
		$nombre=$data['nombres'];
		$apellido=$data['apellidos'];	
	
		$contrasena='123';
		
		//configuracion para gmail
		$configGmail = array(
							'protocol' => 'smtp',
							//'smtp_host' => 'ssl://smtp.gmail.com', //prueba yoma aver
							'smtp_host' => 'smtp.gmail.com',
							//'smtp_port' => 465,
							'smtp_port' => 587,
							'smtp_user' => 'noresponder.enfmp@gmail.com',
							//'smtp_pass' => 'Enfmp-Vzla',
							'smtp_pass' => 'wpwooqbwdohkhwku',
							'mailtype' => 'html',
							'charset' => 'utf-8',
							'newline' => "\r\n",
							'smtp_timeout' => '20',
							'validate' => TRUE
			);  
			$msg = '<h2>Estimado Sr.(a)'.$nombre.' '.$apellido.'</h2><br><p>Sus datos de acceso a nuestro sistema son los siguientes:</p> 
			<br> Usuario: '.$cedula .'<br> Contraseña:'.$contrasena.'<p>Importante:
			Al registrar su información en nuestro sistema declara con ello que los datos suministrados son verdaderos y autoriza la investigación de estos datos. Acuerda que si se comprueba la falsedad de la información suministrada, perderá el derecho a participar en el proceso de selección de aspirantes para cursar estudios de Postgrado en la Escuela Nacional de Fiscales del Ministerio Público.</p>
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
		$this->email->subject('Escuela Nacional de Fiscales del Ministerio Público - Usuario Registrado');
		$this->email->message($msg);
		//$this->email->attach('public/temporal/'.$archivo);
		sleep(30);
		//var_dump();
		//echo "va enviar";
		if ($this->email->send())
		{ 
			
			
		//return $this->email->print_debugger();
			return true;
		} else {
		//	var_dump($this->email);
			//return $this->email->print_debugger();
			
			return false;
		}
		//$this->email->clear(TRUE);

	}
	


	
}

