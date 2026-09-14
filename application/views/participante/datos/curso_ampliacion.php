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
   
    //location.assign("<?php echo base_url(); ?>dashboard04/clausula_online");  
  }
  </script>
       <div class="card">
          
                    <div class="card-header">
                      <h3 class="card-title"><strong>Adjuntar Certificación del curso de ampliación "Construcción Trabajo Especial de Grado " </strong></h3>
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
    <strong>En esta secci&oacute;n usted puede remitirnos su  Constancia del Curso de Ampliación "Construcción Trabajo Especial de Grado" o Carta de solicitud de recincorporación al trabajo especial de grado según el programa de postgrado a inscribir. </strong>
  </p>
  <div class="frame3" align="center">
  <p align="center">
    Para poder enviarnos su documento PDF, el archivo debe estar en 
     formato *.PDF
  </p>
  <p align="center">
    El tama&ntilde;o m&aacute;ximo permitido del archivo es de 1 MB (1024KB).
  </p>
  <br />

  <p align="center">
     <div>     
   
    <?php
   
    $pdf= base_url().'assets/curso_ampliacion/' . $this->session->userdata('id') . '_curso_ampliacion.pdf';

    if ($curso):  ?>
        <a href='<?php echo $pdf;?> ' target='_new'>
        <img width='150px' height='165px' src="<?php echo base_url().'assets/img/pdf.jpeg';?>">              
            Ver Documento
        </a>
    <?php  else :?>
        <img width='150px' height='165px' src= "<?php echo base_url().'assets/img/pdf.jpeg';?> "    title="No se ha cargado ningun PDF">
    <?php  endif ?>
  </div>
  </p>
  <br/>
  </p>
  <br/>
  </p>
  <br/>
  <div align="center">

  <form id="formulario" method="post" enctype="multipart/form-data" action="<?php echo base_url()?>dashboard04/cargacurso">
  <input type="hidden" name="id_usuario" value="<?Php echo $this->session->userdata('id'); ?>">
    <input type="file" name="userfile" size="400" required="true" /> 
    <br/><br/>
    <input type="submit" name="upload"  value="Cargar Curso de Ampliación o Carta de Reincorporación" class="boton"/>
  </form>
  
  </div>
  <br/>
  </div>
 <!-- <div align="center">
    <input type="button" name="btnSeguiente" value="Siguiente" class="boton btn btn-info" onClick="siguiente();">
  </div>
             fin formulario -->
          </div>
                </div><!-- /.card -->





    </section>
    <!-- /.content -->



  </div>
  <!-- /.content-wrapper -->
