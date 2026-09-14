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

 
   if(document.getElementById("rol").value=="7") location.href="<?php echo base_url()?>dashboard08/datos11";
   

  }
function atras()
  {
    
     location.href="<?php echo base_url()?>dashboard08/requisitos";
   
  }
  </script>
       <div class="card">
          
                    <div class="card-header">
                      <h3 class="card-title"><strong>Adjuntar Colegiatura o Constancia de inscripción del gremio al que pertenezca.</strong></h3>
                    </div>
<div class="frame3" >
  <p >   <i class="far fa-check-circle"></i>El archivo debe estar en cualquiera 
    de los siguientes formatos: *.JPG, *.JPEG, *.GIF, *.PNG.
  </p>
                      <div class="card-body">
                       <!-- Mensaje de Alerta-->
                        <?php  if ($this->session->flashdata("error")): ?>
                        <div class="alert alert-danger alert-dismissible">
                          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                          <p><i class="icon fa fa-ban"></i> <?php echo $this->session->flashdata("error"); ?> </p>
                        </div>
                         <?php endif; ?>
                      <?php  if ($this->session->flashdata("success")): ?>
                        <div class="alert alert-success">
                          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                          <p><i class="icon fa fa-check-square"></i> <?php echo $this->session->flashdata("success"); ?> </p>
                        </div>
                      <?php endif; ?>
                       <?php  if ($this->session->flashdata("warning")): ?>
                        <div class="alert alert-warning">
                          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                          <p><i class="icon fa fa-check-square"></i> <?php echo $this->session->flashdata("warning"); ?> </p>
                        </div>
                      <?php endif; ?>
                     
                        <!-- Fin Mensaje de Alerta-->
            <!-- Comienzo formulario -->

  <br />

  <p align="center">
    <!-- MUESTRA LA FOTO DEL USUARIO SI EXISTE, SINO SE MUESTRA LA IMAGEN POR DEFECTO -->
    <?php
    //$rutaarchivo = 'recursos/fotos/' . LocalUser::getCurrentUser()->getIdPersona() . '_foto.jpg';
    $rutaarchivo = base_url().'assets/colegiatura/' . $this->session->userdata('id') . '_colegiatura.jpg';
    //echo $rutaarchivo ;
    if(!file_exists("$rutaarchivo")) {
      echo("<img id='imgFoto' border='2' class='fotomarket' width='150px' height='165px' src='" . $rutaarchivo . "?".+time()."'>");
     } else { 
      echo("<img id='imgFoto' border='2' class='fotomarket' width='150px' height='165px' src='../assets/img/no-foto.jpg'/>");
     }  
     ?>
  </p>
   <h5 style="color: #FF0000;"align="center"><b>IMPORTANTE:</b> Requisito Obligatorio.</h5> 
  <br/>
  <div align="center">
  

  <form id="formulario" method="post" enctype="multipart/form-data" action="cargarcolegiatura">
   <input type="hidden" name="rol" id="rol" value="<?Php echo $this->session->userdata('rol'); ?>">
     <input type="hidden" name="id_usuario" value="<?Php echo $this->session->userdata('id'); ?>">
	 
    <input type="file" name="userfile" size="400" required="true" /> 
    <br/><br/>
    <input type="submit" name="upload"  value="Cargar Colegiatura" class="boton"/>
  </form>
  
  </div>
  <br/>
  </div>
  
  <?php $programas=array(1,2,3,6,14,15,16,19,22,23,26,20,21,24,25,29,30,31) ;
  if( (in_array($this->session->userdata("idprograma"),$programas ))){?>
   <div align="center">
    <input type="button" name="btnRegresar" value="Regresar" class="boton btn btn-info" onClick="atras();">
  </div>
  <?php }//else{?>
  <!--  <div align="center">
    <input type="button" name="btnSeguiente" value="Siguiente" class="boton btn btn-info" onClick="siguiente();">
  </div>-->
    <?php //}?>
            <!-- fin formulario -->
          </div>
                </div><!-- /.card -->





    </section>
    <!-- /.content -->



  </div>
  <!-- /.content-wrapper -->
