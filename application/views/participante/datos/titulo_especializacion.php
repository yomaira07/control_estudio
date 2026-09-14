  <!-- Content Wrapper. Contains page content -->

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
    <!-- /.container-fluid -->
    </section>
 
    <!-- Main content -->
    <section class="content">
<script language="javascript">

  function siguiente()
  { 

    location.assign("<?php echo base_url(); ?>dashboard04/datos9");  

  }
  </script>
       <div class="card">
          
                    <div class="card-header">
                      <h3 class="card-title"><strong>Adjuntar Título de Especialista en Ejercicio de la Función Fiscal </strong></h3>
                    </div>

                      <div class="card-body">
                        <!-- Mensaje de Alerta-->
						<?php if($this->session->flashdata('success')){ ?>
                        
                        <div class="alert alert-success">
                        <a href="#" class="close" data-dismiss="alert">&times;</a>
                        <strong>Éxito!</strong> </i> <?php echo $this->session->flashdata('success'); ?>
                        </div>
                        
                        <?php } else if($this->session->flashdata('error')){   $procesado=2;  ?>
                        
                        <div class="alert alert-danger">
                        <a href="#" class="close" data-dismiss="alert">&times;</a>
                        <i class="icon fa fa-ban"></i> <?php echo $this->session->flashdata('error'); ?>
                        </div>
                        
                        <?php } else if($this->session->flashdata('warning')){  ?>
                        
                        <div class="alert alert-warning">
                        <a href="#" class="close" data-dismiss="alert">&times;</a>
                        <strong>Alerta!</strong> <?php echo $this->session->flashdata('warning'); ?>
                        </div>
                        
                        <?php } else if($this->session->flashdata('info')){  ?>
                        
                        <div class="alert alert-info">
                        <a href="#" class="close" data-dismiss="alert">&times;</a>
                        <strong>Informacion!</strong> <?php echo $this->session->flashdata('info'); ?>
                        </div>
                        <?php } ?>
                        <!-- Fin Mensaje de Alerta-->
            <!-- Comienzo formulario -->
<p align="center">
    <strong>En esta secci&oacute;n usted puede remitirnos su Título de Especialista en Ejercicio de la Función Fiscal dando fe que cumple con los requisitos de ingreso para de </br>CPP en Justicia Penal</strong>
  </p>
  <div class="frame3" align="center">
  <p align="center">
    Para poder enviarnos su titulo, el archivo debe estar en cualquiera 
    de los formatos *.JPG, *.JPEG, *.GIF, *.PNG.
  </p>
  <p align="center">
    El tama&ntilde;o m&aacute;ximo permitido de la foto es de 1 MB (1024KB).
  </p>
  <br />

  <p align="center">
    <!-- MUESTRA LA FOTO DEL USUARIO SI EXISTE, SINO SE MUESTRA LA IMAGEN POR DEFECTO -->
    <?php
    //$rutaarchivo = 'recursos/fotos/' . LocalUser::getCurrentUser()->getIdPersona() . '_foto.jpg';
      $rutaarchivo = base_url().'assets/especialista/' . $this->session->userdata('id') . '_especialista.jpg';
    //echo $rutaarchivo ;
    if(!file_exists("$rutaarchivo")) {
      echo("<img id='imgFoto' border='2' class='fotomarket' width='150px' height='165px' src='" . $rutaarchivo . "?".+time()."'>");
     } else { 
      echo("<img id='imgFoto' border='2' class='fotomarket' width='150px' height='165px' src='../assets/img/no-foto.jpg'/>");
     }  
     ?>
  </p>
  <br/>
  <div align="center">
    <input type="hidden" name="id_usuario" value="<?Php echo $this->session->userdata('id'); ?>">

  <form id="formulario" method="post" enctype="multipart/form-data" action="cargarespecialista">
    <input type="file" name="userfile" size="400" required="true" /> 
		<input type="hidden" name="rol" id="rol" value="<?Php echo $this->session->userdata('rol'); ?>">
    <br/><br/>
    <input type="submit" name="upload"  value="Cargar titulo" class="boton"/>
  </form>
  
  </div>
  <br/>
  </div>
  <div align="center">
    <input type="button" name="btnSeguiente" value="Siguiente" class="boton btn btn-info" onClick="siguiente();">
  </div>
            <!-- fin formulario -->
          </div>
                </div><!-- /.card -->





    </section>
    <!-- /.content -->



  </div>
  <!-- /.content-wrapper -->
