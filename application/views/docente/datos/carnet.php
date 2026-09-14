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
  location.assign("<?php echo base_url(); ?>dashboard06/proceso_perfil");   

 }
  </script>
       <div class="card">
          
                    <div class="card-header">
                      <h3 class="card-title"><strong>Adjuntar Carnet / Carta de servicio</strong></h3>
                    </div>

                      <div class="card-body">
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
    <strong>En esta secci&oacute;n usted debe adjuntar el Carnet u Oficio de nombramiento en el cargo, de forma legible</strong>
  </p>
  <div class="frame3" align="center">
 <p align="center">El carnet u Oficio, el archivo debe estar en formato *.PDF.
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
     <img id='imgFoto' border='2' class='fotomarket' width='150px' height='165px' src='../assets/img/pdf.jpeg'   title="El archivo no ha sido cargada" />Ver Documento
      </a>
     <?php } ?>
   </div>
  </p>

  <br/>
  <div align="center">
   

  <form id="formulario" method="post" enctype="multipart/form-data" action="cargacarnet">
    <input type="file" name="userfile" size="400" required="true" /> 
    <br/><br/>
    <input type="submit" name="upload"  value="Cargar Carnet / Carta Servicio" class="boton"/>
  <input type="hidden" name="id_docente" value="<?php if ($datos_docente==false){echo "falso";}else{ echo $datos_docente->id;  } ?>">
     <input type="hidden" name="id_usuario" value="<?Php echo $this->session->userdata('id'); ?>">
     <input type="hidden" name="rol" id="rol" value="<?Php echo $this->session->userdata('rol'); ?>">
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
