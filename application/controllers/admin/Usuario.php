<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Controller {

	public function __construct(){
		parent::__construct();
		// aqui se realiza el llamado del modelo a utilizar
		$this->load->model("Usuarios_model");
		$this->load->model("Rol_model");
		$this->load->model("Tiempo_preinscripcion_model");
		$this->load->model("Programa_model");
		$this->load->model("Trimestre_model");
	}

	public function index()
	{

		$data["list_usuario"] = $this->Usuarios_model->lista_usuario();
	
		$this->load->view('layouts/header');
		$this->load->view('layouts/sidebar');
		$this->load->view('admin/usuario/list',$data);
		$this->load->view('layouts/footer');
	}
	public function index_docente()
	{

		$data["list_usuario"] = $this->Usuarios_model->lista_usuario_docente();
	
		$this->load->view('layouts/header');
		$this->load->view('layouts/sidebar');
		$this->load->view('admin/usuario/list_docente',$data);
		$this->load->view('layouts/footer');
	}
	
	public function ver_usuarios()
	{
		$data["list_programa"] = $this->Programa_model->getPrograma();
		$data["list_usuario"] = $this->Usuarios_model->usuarios_activos_programas();
		
	
	
		$this->load->view('layouts/header');
		$this->load->view('layouts/sidebar');
		$this->load->view('admin/usuario/estudiantes_regulares_activos',$data);
		$this->load->view('layouts/footer');
	}
	
	public function crear()
	{
		$data["list_rol"] = $this->Rol_model->lista_rol();
		$data["list_preinscripcion"] = $this->Tiempo_preinscripcion_model->gettiempo_preinscripcion_us();
		$data["list_programa"] = $this->Programa_model->getPrograma();
	

		$this->load->view('layouts/header');
		$this->load->view('layouts/sidebar');
		$this->load->view('admin/usuario/add',$data);
		$this->load->view('layouts/footer');
	}

	public function usuario_store()
	{
		
		$nombres = $this->input->post("nombres");
		$apellidos = $this->input->post("apellidos");
		$telefono = $this->input->post("telefono");
		$correo = $this->input->post("correo");
		$usuario = $this->input->post("usuario");
		$clave = sha1($this->input->post("clave"));
		$rol = $this->input->post("rol");
		$status = $this->input->post("status");
		$preinscripcion = $this->input->post("preinscripcion");
		$trimestre = $this->input->post("trimestre");
		$modalidad = $this->input->post("modalidad");
		$planilla = $this->input->post("planilla");
		$programa = $this->input->post("str");



		$data = array(
			'nombres' => $nombres,
			'apellidos' => $apellidos,
			'telefono' => $telefono,
			'email' => $correo,
			'username' => $usuario,
			'password' => $clave,
			'rol_id' => $rol,
			'estado' => $status,
			'id_tiempo_preinscripcion' => $preinscripcion,
			'trimestre' => $trimestre,
			'modalidad' => $modalidad,
			'ver_planilla' => $planilla,
			'programa_id' => $programa,
		);

		if($this->Usuarios_model->save($data)){
		redirect(base_url()."admin/usuario/index");
		}
		else
		{
			$this->session->set_flashdata("error","No se pudo guardar la informacion");
			redirect(base_url()."admin/usuario/crear");
		}
	}
	

	public function editar($id)
	{
		$data["list_rol"] = $this->Rol_model->lista_rol();
		$data["list_usuario"] = $this->Usuarios_model->buscar_usuario($id);
		$data["list_preinscripcion"] = $this->Tiempo_preinscripcion_model->gettiempo_preinscripcion_us();
		$data["list_programa"] = $this->Programa_model->getPrograma();
	
		$this->load->view('layouts/header');
		$this->load->view('layouts/sidebar');
		$this->load->view('admin/usuario/edit',$data);
		$this->load->view('layouts/footer');
	}
	
	public function usuario_edit__store()
	{
		
		$id_usuario = $this->input->post("id_usuario");
		$nombres = $this->input->post("nombres");
		$apellidos = $this->input->post("apellidos");
		$telefono = $this->input->post("telefono");
		$correo = $this->input->post("correo");
		$usuario = $this->input->post("usuario");
		$clave = sha1($this->input->post("clave"));
		$rol = $this->input->post("rol");
		$status = $this->input->post("status");
		$preinscripcion = $this->input->post("preinscripcion");
		$trimestre = $this->input->post("trimestre");
		$modalidad = $this->input->post("modalidad");
		$planilla = $this->input->post("planilla");
		$programa = $this->input->post("str");

		$data = array(
			'nombres' => $nombres,
			'apellidos' => $apellidos,
			'telefono' => $telefono,
			'email' => $correo,
			'username' => $usuario,
			'password' => $clave,
			'rol_id' => $rol,
			'estado' => $status,
			'id_tiempo_preinscripcion' => $preinscripcion,
			'trimestre' => $trimestre,
			'modalidad' => $modalidad,
			'ver_planilla' => $planilla,
			'programa_id' => $programa,
		);

		if($this->Usuarios_model->update_usuario($id_usuario,$data)){
		redirect(base_url()."admin/usuario/index");
		}
		else
		{
			$this->session->set_flashdata("error","No se pudo guardar la informacion");
			redirect(base_url()."admin/usuario/edit");
		}
	}

	public function editar_docente($id)
	{
		$data["list_rol"] = $this->Rol_model->lista_rol();
		$data["list_usuario"] = $this->Usuarios_model->buscar_usuario($id);
	
		$this->load->view('layouts/header');
		$this->load->view('layouts/sidebar');
		$this->load->view('admin/usuario/edit_docente',$data);
		$this->load->view('layouts/footer');
	}

	public function usuario_edit__store_docente()
	{
		
		$id_usuario = $this->input->post("id_usuario");
		$nombres = $this->input->post("nombres");
		$apellidos = $this->input->post("apellidos");
		$telefono = $this->input->post("telefono");
		$correo = $this->input->post("correo");
		$usuario = $this->input->post("usuario");
		$clave = sha1($this->input->post("clave"));
		$rol = $this->input->post("rol");
		$status = $this->input->post("status");


		$data = array(
			'nombres' => $nombres,
			'apellidos' => $apellidos,
			'telefono' => $telefono,
			'email' => $correo,
			'username' => $usuario,
			'password' => $clave,
			'rol_id' => $rol,
			'estado' => $status,
		);

		if($this->Usuarios_model->update_usuario($id_usuario,$data)){
		redirect(base_url()."admin/usuario/index_docente");
		}
		else
		{
			$this->session->set_flashdata("error","No se pudo guardar la informacion");
			redirect(base_url()."admin/usuario/edit_docente");
		}
	}
	public function recuperar_acceso()
	{
		
			$cedula = $this->input->post("cedula");
			$nombres1 = $this->input->post("primer_nombre");
			$nombres2 = $this->input->post("segundo_nombre");
			$apellidos1 = $this->input->post("primer_apellido");
			$apellidos2 = $this->input->post("segundo_apellido");
			$telefono = $this->input->post("telefono");
			$correo = $this->input->post("correo");
			$usuario = $this->input->post("usuario");
				$clave=123;

				$data = array(		
					'password' => sha1($clave),
					'ver_planilla' => 1,
					'ruc' => 0,
					'egresado' => 0,
					'tramite_fuera_lapso' => 0,
					'fuera_lapso_tra_adm' => 0,
					'inscripcion' => 0,
					'seccion' => 0,
					'estado'=>1,
				
				);
				$data_clave=array('password' => sha1($clave));
				//var_dump($data);
			$usuarios=$this->Usuarios_model->buscar_usuario_cedula($cedula );
		//	var_dump($usuarios);
		if(!$usuarios){

			$this->session->set_flashdata("error","La cédula de identidad verificada no esta registrada en el Sistema de Control Estudios (CEENFMP). Si desea realizar una verificación del caso, debe 
			comunicarse con la Dirección de Secretaria General de la ENFMP para revisar su estatus.");
			redirect(base_url()."welcome/recuperar_usuario");
		}else{
			foreach($usuarios as $usuarios){			
			
			
					if($usuarios->rol_id==5 ){
						if($usuarios->estado==1){//	echo "es regular activo el usuario";
							
							$this->Usuarios_model->update_usuario($usuarios->id,$data_clave);
							$this->session->set_flashdata("info","Estudiante Regular - El Usuario que desea registrar ya se encuentra activo en el sistema. <br>Para ingresar debe utilizar los siguientes de acceso: <h3><b> Usuario: ".$usuarios->username." Contraseña: ".$clave." </b></h3> <br>Correo Electrónico Registrado: <br> ".$usuarios->email."
							<p>
							Importante:
							Cuidemos el Medio Ambiente, por favor,no imprima este mensaje, solo tome nota de ser necesario de los datos suministrados. <br>

							Escuela Nacional de Fiscales del Ministerio Público</p");
							redirect(base_url()."welcome/recuperar_usuario");
						}else{
								//	echo "es regular inactivo el usuario atualiza datos";
								if($this->Usuarios_model->update_usuario($usuarios->id,$data)){
									$this->session->set_flashdata("success","Estudiante Regular - Para ingresar al sistema debe logearse con los siguientes datos:<br><h3><b> Usuario: ".$usuarios->username."<br> Contraseña: 123</h3>  <br>Correo Electrónico Registrado: <br>".$usuarios->email." 
									<p>
									Importante:
									Cuidemos el Medio Ambiente, por favor,no imprima este mensaje, solo tome nota de ser necesario de los datos suministrados. <br>
		
									Escuela Nacional de Fiscales del Ministerio Público</p");
									redirect(base_url()."welcome/recuperar_usuario");
									
								}else{
									$this->session->set_flashdata("error","Estudiante Regular - Error al guardar datos del usuario.");
									redirect(base_url()."welcome/recuperar_usuario");
								}
						
							}
				}else{
					$this->session->set_flashdata("warning","la cedula de identidad verificada no esta registrada como estudiante regular. Si desea realizar una revisión debe 
					comunicarse con la Dirección de Secretaria General de la ENFMP para revisar su estatus.");
					redirect(base_url()."welcome/recuperar_usuario");
				}
		}	
	}

	}
	public function cambiar_correo()// envia la clave si olvido contraseña
	{
		//preparamos los datos
		//$data["usuario"]=$this->Usuarios_model->buscar_usuario($id_usuario);
		$this->load->view('layouts/header');
		$this->load->view('layouts/sidebar');		
		$this->load->view('admin/usuario/cambiar_correo');
		$this->load->view('layouts/footer');
	}
	public function index_regulares($programa)
	{
		//echo $programa=var_dump($this->uri->segment(4));
		$data["list_usuario"] = $this->Usuarios_model->lista_usuario_regulares($p=explode(',',$programa));
		$data["list_programa"] = $this->Programa_model->getPrograma();
		$data["list_trimestre"] = $this->Trimestre_model->getTrimestre();
		
	
		$this->load->view('layouts/header');
		$this->load->view('layouts/sidebar');
		$this->load->view('admin/usuario/list_regulares',$data);
		$this->load->view('layouts/footer');
	}
	public function editar_regulares($id)
	{
		$data["list_rol"] = $this->Rol_model->lista_rol();
		$data["list_usuario"] = $this->Usuarios_model->buscar_usuario($id);
		$data["list_preinscripcion"] = $this->Tiempo_preinscripcion_model->gettiempo_preinscripcion_us();
		$data["list_programa"] = $this->Programa_model->getPrograma();
		$data["list_trimestre"] = $this->Trimestre_model->getTrimestre();
	
	
	
		$this->load->view('layouts/header');
		$this->load->view('layouts/sidebar');
		$this->load->view('admin/usuario/edit_regulares',$data);
		$this->load->view('layouts/footer');
	}
	public function usuario_regular_store()
	{
		$id_usuario=$this->input->post("id_usuario");
		$nombres = $this->input->post("nombres");
		$apellidos = $this->input->post("apellidos");
		$telefono = $this->input->post("telefono");
		$correo = $this->input->post("correo");
		$usuario = $this->input->post("usuario");
		$clave = sha1($this->input->post("clave"));
		$rol = $this->input->post("rol");
		$status = $this->input->post("status");
		$preinscripcion = $this->input->post("preinscripcion");
		 $trimestre = $this->input->post("str_trim");
		$modalidad = $this->input->post("modalidad");
		$planilla = $this->input->post("planilla");
		$programa = $this->input->post("str");
		 $ruc  = $this->input->post("ruc");
		 $egresado = $this->input->post("egresado");
		$tramite_fuera_lapso = $this->input->post("tramite_fuera_lapso");
		$fuera_lapso_tra_adm = $this->input->post("fuera_lapso_tra_adm");


		$data = array(
			'nombres' => $nombres,
			'apellidos' => $apellidos,
			'telefono' => $telefono,
			'email' => $correo,
			'username' => $usuario,
			'password' => $clave,
			'rol_id' => $rol,
			'estado' => $status,
			'id_tiempo_preinscripcion' => $preinscripcion,
			'trimestre' => $trimestre,
			'modalidad' => $modalidad,
			'ver_planilla' => $planilla,
			'programa_id' => $programa,
			'ruc' => $ruc,
			'egresado' => $egresado,
			'tramite_fuera_lapso' => $tramite_fuera_lapso,
			'fuera_lapso_tra_adm' => $fuera_lapso_tra_adm,
			'estado'=>1,
			
		);
		//var_dump($data);

		if($this->Usuarios_model->update_usuario($id_usuario,$data)){
			echo "update";
			redirect(base_url()."admin/usuario/index_regulares/".$programa);
			}
			else
			{
				$this->session->set_flashdata("error","No se pudo guardar la informacion");
				redirect(base_url()."admin/usuario/edit_regulares");
			}
	}
public function crear_acceso_nuevo_ingreso()
	{
		
		//echo "creando el usuario";
		$primer_nombre = $this->input->post("primer_nombre");
		$segundo_nombre = $this->input->post("segundo_nombre");
		$primer_apellido = $this->input->post("primer_apellido");
		$segundo_apellido = $this->input->post("segundo_apellido");
		$cod_nacionalidad = $this->input->post("cod_nacionalidad");
		$cedula = $this->input->post("cedula");
		$correo = $this->input->post("correo");
		$programas=$this->input->post('str');
		$prog_seleccionado=explode(',',$programas);
		$coma='';$modalidad='';
		$modalidad = ''; 

		foreach ($prog_seleccionado as $id_p):           
			$seleccion = $this->Programa_model->getProgramaEsp($id_p);
			$valor_actual = '';

			// Asignamos el valor numérico según la modalidad
			if ($seleccion->modalidad_convocatoria == 'PRESENCIAL') {
				$valor_actual = '1';
			} elseif ($seleccion->modalidad_convocatoria == 'A DISTANCIA') {
				$valor_actual = '2';
			}

			// Verificamos que el valor no esté ya en la cadena $modalidad
			if ($valor_actual !== '' && strpos($modalidad, $valor_actual) === false) {
				// Si modalidad ya tiene datos, añadimos la coma antes del nuevo valor
				$modalidad .= ($modalidad == '' ? '' : ',') . $valor_actual;
			}
		endforeach;
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
					'rol_id'=>8,
					'programa_id'=>$programas,
					'estado'=>1,
					'modalidad'=>$modalidad,
					'trimestre'=>'I TRIMESTRE',
					'inscripcion'=>1,
					'seccion'=>6,
					'id_tiempo_preinscripcion'=>61,
					
					'password'=>sha1($clave),
					'fecha_actualizacion'=>date('Y-m-d h:m:s')

					);
					$data_activar_usuario  = array(						
					'rol_id'=>8,			
					'nombres' => $primer_nombre." ".$segundo_nombre,
					'apellidos' => $primer_apellido." ". $segundo_apellido,		
					'email' => $correo,		
					'programa_id'=>$programas,
					'estado'=>1,	
					'password'=>sha1($clave),
					'inscripcion'=>1,		
					'modalidad'=>$modalidad,
					'trimestre'=>'I TRIMESTRE',
					'trimestre'=>'I TRIMESTRE',
					'inscripcion'=>1,
					'seccion'=>6,
					'fecha_actualizacion'=>date('Y-m-d h:m:s')	
					);
					
				
				//var_dump($data_usuario_nuevo);
				//var_dump($data_activar_usuario);
				//var_dump($data_activar_usuario_registrese);
			$usuario=$this->Usuarios_model->buscar_usuario_cedula($cedula);
			if($validar_correo=$this->Usuarios_model->buscar_usuario_correo1($correo)){	
				if($validar_correo->rol_id==5)$estudiante='Regular';
					$mensaje="<br>Los datos registrados son:</h2> <h1><b> Usuario:$validar_correo->username </b></h1>
					<br>Correo Electrónico Registrado: <br> $validar_correo->email
					<br> Para recuperar su acceso como estudiante regular o egresado debe realizarlo 
					por la opción <b>RECUPERAR ACCESO</b> disponible en nuestro sistema de control de estudios
					en el control de acceso.
					<br><img src='/control_estudio/assets/img/Logoblanco.png'  width='100px' height='100px'/> Haz clic  <b><a href='/control_estudio' title='Ir a SCE-ENFMP'> AQUI </a> </b> 
					para ingresar al Sistema Control de Estudios ENFMP  y registar un usuario <b>Nuevo Ingreso</b> con un correo electrónico distinto al indicado.";
				if($validar_correo->rol_id==8 or $validar_correo->rol_id==7 ){
					$this->Usuarios_model->update_usuario($validar_correo->id,$data_activar_usuario);
					$estudiante='Nuevo Ingreso';
					$mensaje="<br> Los datos para ingresar son:</h2> <h1><b> Usuario: $validar_correo->username Contraseña: $clave</b></h1> <br>
					<br>Correo Electrónico Registrado: <br> $correo <br> 
					<br><img src='/control_estudio/assets/img/Logoblanco.png'  width='100px' height='100px'/> Haz clic  <b><a href='/control_estudio' title='Ir a SCE-ENFMP'> AQUI </a> </b> para ingresar al Sistema Control de Estudios ENFMP e ingresar con el Usuario y Contraseña suministrado 
					para completar el registro en línea, documentos y el pago del arancel." ;
					$this->Usuarios_model->update_usuario($validar_correo->id,$data_activar_usuario);
					///validar que el correo no existe
				}
				
				$this->session->set_flashdata("info","Ya existe el correo electrónico Registrado como estudiante ".$estudiante." !!.</b>".$mensaje."" );
				redirect(base_url()."welcome/registrarse_nvo_ingreso/1");
				
			}else{	
				//echo $cedula;			
				//var_dump($usuario);

					if(!$usuario){	
						if($this->Usuarios_model->save($data_usuario_nuevo)){
							$this->session->set_flashdata("info","Usuario Registrado exitosamente!!. <br>  <br> Sus datos para ingresar son:</h2> <h1><b> Usuario: ".$cedula." Contraseña: ".$clave."</b></h1> <br>
							<br>Correo Electrónico Registrado: <br> ".$correo."<br>Si desea cambiar el correo electronico debe 
							comunicarse con la Dirección de Secretaria General de la ENFMP, a través del correo electrónico <i>procesodeseleccon2026@gmail.com</i><br><br><img src='/control_estudio/assets/img/Logoblanco.png'  width='100px' height='100px'/> Haz clic  <b><a href='/control_estudio' title='Ir a SCE-ENFMP'> AQUI </a> </b> para ingresar al Sistema Control de Estudios ENFMP e ingresar con el Usuario y Contraseña suministrado 
							para completar el registro en línea, documentos y el pago del arancel." );
							redirect(base_url()."welcome/registrarse_nvo_ingreso/1");
						}						
					}else{
						foreach($usuario as $usuario){		
							//echo "verifico si es usuario nuevo ingreso ".$usuario->id;		
							if (($usuario->estado==1 and $usuario->rol_id==8 AND ($usuario->id_tiempo_preinscripcion==58 or $usuario->id_tiempo_preinscripcion==61)) )  {		//nuevo ingreso proceso de seleccion	
								
									$this->Usuarios_model->update_usuario($usuario->id,$data_activar_usuario);
									$this->session->set_flashdata("info","<b><h2>Ya existe Usuario Activo como estudiante de Nuevo Ingreso!!.</b> <br>  <br> Sus datos para ingresar son:</h2> <h1><b> Usuario: ".$usuario->username." Contraseña: ".$clave."</b></h1> <br>
									<br>Correo Electrónico Actualizado: <br> ".$correo."<br> Si desea cambiar el correo electronico debe 
									comunicarse con la Dirección de Secretaria General de la ENFMP, a través del correo electrónico <i>Secretaria.enfmp@gmail.com</i><br><br><img src='/control_estudio/assets/img/Logoblanco.png'  width='100px' height='100px'/> Haz clic  <b><a href='/control_estudio' title='Ir a SCE-ENFMP'> AQUI </a> </b> para acceder al Sistema Control de Estudios ENFMP e ingresar con el Usuario y Contraseña suministrado 
									para completar el registro en línea, documentos y el pago de los aranceles de inscripcón." );
									redirect(base_url()."welcome/registrarse_nvo_ingreso/1");
							}
							if (($usuario->rol_id==8 AND $usuario->id_tiempo_preinscripcion<>58) )  {		//nuevo ingreso por registro de usuario	
								
								$this->Usuarios_model->update_usuario($usuario->id,$data_usuario_nuevo);
								$this->session->set_flashdata("info","<b><h2>Ya existe Usuario Activo como estudiante de Nuevo Ingreso!!.</b> <br>  <br> Sus datos para ingresar son:</h2> <h1><b> Usuario: ".$usuario->username." Contraseña: ".$clave."</b></h1> <br>
								<br>Correo Electrónico Actualizado: <br> ".$correo."<br> Si desea cambiar el correo electronico debe 
								comunicarse con la Dirección de Secretaria General de la ENFMP, a través del correo electrónico <i>Secretaria.enfmp@gmail.com</i><br><br><img src='/control_estudio/assets/img/Logoblanco.png'  width='100px' height='100px'/> Haz clic  <b><a href='/control_estudio' title='Ir a SCE-ENFMP'> AQUI </a> </b> para acceder al Sistema Control de Estudios ENFMP e ingresar con el Usuario y Contraseña suministrado 
								para completar el registro en línea, documentos y el pago de los aranceles de inscripcón." );
								redirect(base_url()."welcome/registrarse_nvo_ingreso/1");
						}
							if ($usuario->rol_id==5)  {	// es regular
									$this->session->set_flashdata("info","<b><h2>Ya existe un  Usuario  con este número de cédula (".$cedula.")como estudiante regular!!.</b>
									<br> Debe registrarse con su N° RIF para tener acceso como Nuevo Ingreso</h2> " );
									redirect(base_url()."welcome/registrarse_nvo_ingreso/0");
							}
						if (($usuario->rol_id==7 ) )  {		//nuevo ingreso por registro de usuario	
								
								$this->Usuarios_model->update_usuario($usuario->id,$data_usuario_nuevo);
								$this->session->set_flashdata("info","<b><h2>Usuario Registrado exitosamente!!. <br>  <br> Sus datos para ingresar son:</h2> <h1><b> Usuario: ".$cedula." Contraseña: ".$clave."</b></h1> <br>
								<br>Correo Electrónico Registrado: <br> ".$correo."<br>Si desea cambiar el correo electronico debe 
								comunicarse con la Dirección de Secretaria General de la ENFMP, a través del correo electrónico <i>Secretaria.enfmp@gmail.com</i><br><br><img src='/control_estudio/assets/img/Logoblanco.png'  width='100px' height='100px'/> Haz clic  <b><a href='/control_estudio' title='Ir a SCE-ENFMP'> AQUI </a> </b> para ingresar al Sistema Control de Estudios ENFMP e ingresar con el Usuario y Contraseña suministrado 
								para completar el registro en línea, documentos y el pago del arancel." );
								redirect(base_url()."welcome/registrarse_nvo_ingreso/1");
						}
						}
					}
			}				
		}else{
			$this->session->set_flashdata("error","No se pudo guardar la informaciòn. Debe registrar un correo GMAIL");
			redirect(base_url()."welcome/registrarse_nvo_ingreso/0");
		}

	}			
	

	}
}


