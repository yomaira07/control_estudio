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
   
    location.assign("<?php echo base_url(); ?>dashboard08/datos08");  
  }
function atras()
  {
    
     location.href="<?php echo base_url()?>dashboard08/requisitos";
   
  }
  </script>
       <div class="card">
          
                    <div class="card-header">
                      <h3 class="card-title"><strong>Adjuntar Cata de Postulación</strong></h3>
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

  <div class="frame3" >
  <p ><i class="far fa-check-circle"></i>
    Para poder enviarnos su documento el archivo debe estar en  
    formato *.PDF
  </p>

  
  <br />

  <p align="center">
     <div>     
    <!-- MUESTRA LA FOTO DEL USUARIO SI EXISTE, SINO SE MUESTRA LA IMAGEN POR DEFECTO -->
    <?php
   
    
    $pdf= base_url().'assets/postulaciones/' . $this->session->userdata('id') . '_postulaciones.pdf';

	
  ?>


	 <?php	
     if (!file_exists($pdf)):  ?>
        <a href='<?php echo $pdf;?> ' target='_new'>
            <img width='150px' height='165px' src="../assets/img/pdf.jpeg">           
            Ver Documento
        </a>
    <?php // else :?>
    <!--<img width='50px' height='65px' src="../assets/img/pdf.jpeg" title="No se ha cargado ningun PDF">-->
        <?php endif ?>
        
  </div>
  </p>
  <br/>
  </p>
  <br/>
  </p>
  <br/>
  <div align="center">
    <input type="hidden" name="id_usuario" value="<?Php echo $this->session->userdata('id'); ?>">

  <form id="formulario" method="post" enctype="multipart/form-data" action="cargapostulacion">
    <input type="file" name="userfile" size="400" required="true" /> 
    <br/><br/>
    <input type="submit" name="upload"  value="Cargar Oficio o Carta de Postulación" class="boton"/>
  </form>
  
  </div>
  <br/>
  </div>
 <?php if(!$verificar){?>
    <div align="center">
    <input type="button" name="btnRegresar" value="Regresar" class="boton btn btn-info" onClick="atras();">
  </div>
  <?php }?>
  
 <!--   <div align="center">
    <input type="button" name="btnSeguiente" value="Siguiente" class="boton btn btn-info" onClick="siguiente();">
  </div> -->

            <!-- fin formulario -->
          </div>
                </div><!-- /.card -->





    </section>
    <!-- /.content -->



  </div>
  <!-- /.content-wrapper -->

