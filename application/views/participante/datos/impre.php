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

   if(document.getElementById("rol").value=="7") location.href="datos10";
   //location.href="datos10/";

  }
  </script>
       <div class="card">
          
                    <div class="card-header">
                      <h3 class="card-title"><strong>Adjuntar INPRE-Abogado</strong></h3>
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
    <strong>En esta secci&oacute;n usted puede remitirnos su INPRE de Abogado dando fe que cumple con los requisitos de ingreso según su especialidad.</strong>
  </p>
  <div class="frame3" align="center">
  <p align="center">
    Para poder enviarnos su imagen, el archivo debe estar en cualquiera 
    de los formatos *.JPG, *.JPEG, *.GIF, *.PNG.
  </p>
  <p align="center">
    El tama&ntilde;o m&aacute;ximo permitido de la imagen es de 1 MB (1024KB).
  </p>
  <br />

  <p align="center">
    <!-- MUESTRA LA FOTO DEL USUARIO SI EXISTE, SINO SE MUESTRA LA IMAGEN POR DEFECTO -->
    <?php
    //$rutaarchivo = 'recursos/fotos/' . LocalUser::getCurrentUser()->getIdPersona() . '_foto.jpg';
    $rutaarchivo = base_url().'assets/impres/' . $this->session->userdata('id') . '_impres.jpg';
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
  <form id="formulario" method="post" enctype="multipart/form-data" action="cargaimpres">
     <input type="hidden" name="id_usuario" value="<?Php echo $this->session->userdata('id'); ?>">
 <input type="hidden" name="rol" id="rol" value="<?Php echo $this->session->userdata('rol'); ?>">
    <input type="file" name="userfile" size="400" required="true" /> 
    <br/><br/>
    <input type="submit" name="upload"  value="Cargar INPRE" class="boton"/>
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
