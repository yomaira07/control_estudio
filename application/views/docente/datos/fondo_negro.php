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
     location.href="<?php echo base_url()?>dashboard06/datos12";

 

  }
  </script>
       <div class="card">
          
                    <div class="card-header">
                      <h3 class="card-title"><strong>Adjuntar Fondo Negro Título de Pregrado</strong></h3>
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
    <strong>En esta secci&oacute;n usted puede remitirnos su Fondo negro del Título de pregrado registrado y certificado por la Universidad de origen o en su defecto protocolizado por el SAREN</strong>
  </p>
  <div class="frame3" align="center">
  <p align="center">
    Para poder enviarnos su título,  el archivo debe estar en formato *.PDF
  </p>
  <p align="center">
    El tama&ntilde;o m&aacute;ximo permitido de la foto es de 1 MB (1024KB).
  </p>
  <br />

   <p align="center">
    <div> 
    <?php if (!($pdf)){
     //var_dump( $pdf);
     ?>

    <img id='imgFoto' border='2' class='fotomarket' width='150px' height='165px' src='../assets/img/pdf.jpeg'  />
    <?php }else{ 
      
      ?>
     <a href="<?php echo $pdf;?>" target="_new" >
     <img id='imgFoto' border='2' class='fotomarket' width='150px' height='165px' src='../assets/img/pdf.jpeg'   title="La Imagen no ha sido cargada" />Ver Documento
      </a>
     <?php } ?>
   </div>
  </p>
  <br/>
  <div align="center">
    

  <form id="formulario" method="post" enctype="multipart/form-data" action="cargatitulo">
  <input type="hidden" name="id_usuario" value="<?Php echo $this->session->userdata('id'); ?>">
    <input type="hidden" name="id_docente" value="<?php if ($datos_docente==false){echo "falso";}else{ echo $datos_docente->id;  } ?>">
	   <input type="hidden" name="rol" id="rol" value="<?Php echo $this->session->userdata('rol'); ?>">
    <input type="file" name="userfile" size="400" required="true" /> 
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
