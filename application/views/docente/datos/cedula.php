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
    
     location.href="<?php echo base_url()?>dashboard06/datos7";
   
  }
  </script>
       <div class="card">
          
                    <div class="card-header">
                      <h3 class="card-title"><strong>Adjuntar Cédula de Identidad</strong></h3>
                    </div>

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
<p align="center">
    <strong>En esta secci&oacute;n usted puede remitirnos su cédula de identidad</strong>
  </p>
  <div class="frame3" align="center">
  <p align="center">
    Para poder enviarnos su documento, el archivo debe estar en formato *.PDF
  </p>
  <p align="center">
    El tama&ntilde;o m&aacute;ximo permitido de la imagen es de 1 MB (1024KB).
  </p>
  <br />

    <p align="center">
    <!-- MUESTRA LA FOTO DEL USUARIO SI EXISTE, SINO SE MUESTRA LA IMAGEN POR DEFECTO -->
   
   
  </p>
<p align="center">
    <div> 
    <?php if (!($pdf)){
     //var_dump( $pdf);
     ?>

    <img id='imgFoto' border='2' class='fotomarket' width='150px' height='165px' src='../assets/img/pdf.jpeg'  />
    <?php }else{ 
      
      ?>
     <a href="<?php echo $pdf;?>" target="_new" >
     <img id='imgFoto' border='2' class='fotomarket' width='150px' height='165px' src='../assets/img/pdf.jpeg'   title="El archivo no ha sido cargada" />Ver Documento
      </a>
     <?php } ?>
   </div>
  </p>
  <br/>
  <div align="center">
   

  <form id="formulario" method="post" enctype="multipart/form-data" action="cargacedula">
    <?php //var_dump($datos_docente);?>
    <input type="hidden" name="id_usuario" value="<?Php echo $this->session->userdata('id'); ?>">
  <input type="hidden" name="id_docente" value="<?php if ($datos_docente==false){echo "falso";}else{ echo $datos_docente->id;  } ?>">
    <input type="hidden" name="rol" id="rol" value="<?Php echo $this->session->userdata('rol'); ?>">
    <input type="hidden" name="tipo_requisito" id="tipo_requisito" value="cedulas_docente">
    <input type="file" name="userfile" size="400" required="true" /> 
    <br/><br/>


 <p align="center">
    <!-- MUESTRA LA FOTO DEL USUARIO SI EXISTE, SINO SE MUESTRA LA IMAGEN POR DEFECTO -->
   
  </p>

    <input type="submit" name="upload"  value="Cargar Cedula" class="boton"/>
  </form>
  
  </div>
  <br/>
  </div>
  <div align="center">
    <input type="button" name="btnSeguiente" value="Siguiente" class="boton btn btn-info" onClick="siguiente();">
  </div>
  <a href='".$rutaarchivo."' target="_blank">
            <!-- fin formulario -->
          </div>
                </div><!-- /.card -->





    </section>
    <!-- /.content -->



  </div>
  <!-- /.content-wrapper -->
