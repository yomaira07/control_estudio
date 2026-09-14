  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
    <!-- /.container-fluid -->
   
    </section>

    <!-- Main content -->
     <section class="content">
     	<script language="javascript">

  function anterior()
  { 
    location.href="inscripcion/";
  }
  </script>
<div class="card">
  <div class="card-body">
                        <!-- Mensaje de Alerta-->
                        <?php  if ($this->session->flashdata("error")): ?>
                        <div class="alert alert-danger alert-dismissible">
                          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                          <p><i class="icon fa fa-ban"></i> <?php echo $this->session->flashdata("error"); ?> </p>
                        </div>
                      <?php endif; ?>
      <!-- /.card -->
        <div align="center"><h1> <img src="<?php echo base_url(); ?>assets/img/logo2.png"  width="100px" height="100px"/> <b>USTED YA INSCRIBIÓ  Y  REGISTRÓ PAGO DE ARANCELES DE INSCRIPCIÓN, EN LOS SIGUIENTES PROGRAMAS DE POSTGRADO.</b></h1></div>
        <div align="center" width="50%">
        	<table  class="table  table-hover" width="50%">
                  <thead>
                  <tr>
                    <th>Programa(s) de Postgrado Inscrito(s)</th>             
                    
                  </tr>
                  </thead>
                  <tbody>
                    <?php if(!empty($listado)):?>
                      <?php foreach($listado as $listado):?>
                  <tr>
                    <td><?php echo $listado->nombre_convocatoria.'<b>('.$listado->modalidad_convocatoria.')</b>'; ?></td>                             
                  </tr>
                        <?php endforeach;?>
                  <?php endif;?>        
                  </tbody>
          </table>        	
        </div>

  

                
               
      

        <?php if(count($requisitos)>=0 and count($requisitos)<=2):?>
          <div align="center"><h4><b>NOTA INFORMATIVA:</b></h4>
                  <h4>Debe revisar que sus Datos Básicos, Académicos y Laborales además de los Requisitos exigidos de acuerdo al(los) programa(s) de postgrado inscrito(s) como aspirante, tales como: <b>Cédula de Identidad, Foto Tipo Carnet
                    </b> esten cargados.</br><p></p>Dichos requisitos son exigidos para la inscripción como aspirante según la especialización/maestría/doctorado deseado,
                    por lo que deben estar correctamente Cargados, Nítidos y Previamente Actualizados, <br>ya que depende de  ello para la inscripción ante este registro.</h4></div>

          </div> 
          <?php endif;?>  
          </div><!-- /.card-body -->   
       
          <table  width="50%" align="center" border="1px">
                  <tr>
                    <td><div align="lefht" >  <a href="<?php echo base_url();?>/dashboard08/proceso" title="Ir a Estatus del Proceso de Inscripción"><img src="<?php echo base_url(); ?>assets/img/icons8-Todo List.png"  width="50px" height="50px"/>Ver Estatus del Proceso de Inscripción en Línea del Aspirante  </a></div> </td>
                <td> <div align="center"  >  <a href="<?php echo base_url();?>/dashboard08/requisitos" title="Ir a Estatus de Requisitos"><img src="<?php echo base_url(); ?>assets/img/icons8-Test Passed.png"  width="50px" height="50px"/>Ver Estatus de los Requisitos  </a></div> </td></tr>
          </table>
          </div> <!-- /.card -->
              

  

     
      </section><!-- /.section-->
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
