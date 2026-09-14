  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
    <!-- /.container-fluid -->
   
    </section>

    <!-- Main content -->
     <section class="content">
      <!-- /.card -->
      <script language="javascript">


  function siguiente()
  { 

   location.assign("<?php echo base_url(); ?>dashboard08/inscripcion");  

  }
  </script>
        <form action="<?php echo base_url()?>dashboard08/inscripcion2" method="POST" >
              <div class="card card-primary card-outline">
                  <div class="card-body">
                   <!-- Mensaje de Alerta-->
     <?php if($this->session->flashdata('success')){ $procesado=1; ?>

        <div class="alert alert-success">
            <a href="#" class="close" data-dismiss="alert">&times;</a>
            <strong>Éxito!</strong> </i> <?php echo $this->session->flashdata('success'); ?>
        </div>

    <?php } else if($this->session->flashdata('error')){ $procesado=2; ?>

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
    <?php }?>
                      <div class="card">
          
                          <div class="card-header" align="center">
                            <h3 class="card-title" >Programa(s) de Postgrado Seleccionado(s) para el Proceso de Selección de Aspirante 2025-2026 - Periodo de <b><?php echo $periodo->nombre; ?></b></h3>
                          </div>

                          <div class="card-body">

                             
                 <table  class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Programa(s) de Postgrado  seleccionado(s)</th>                    
                    <th>Opción</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php if(!empty($programas_sel)):?>
                      <?php 
                          
                                if(!empty($listado)):
                                foreach($listado as $listado):   
                                  if(in_array($listado->id,$programas_sel) ){?>
                                    <tr>
                                      <td><?php echo $listado->nombre_convocatoria; echo "<b> (".$listado->modalidad_convocatoria.")</b>"; ?></td>       
                                      <td><input type="checkbox" name="checks[]" checked value="<?php echo $listado->id;?>"></td>
                                    </tr>
                                  <?php  }else{?>              
                                     <tr>
                                        <td><?php echo $listado->nombre_convocatoria;echo"<b> (".$listado->modalidad_convocatoria.")</b>"; ?></td>    
                                        <td><input type="checkbox" name="checks[]" value="<?php echo $listado->id;?>"></td>
                                      </tr>
                               <?php  }
                        endforeach;
                       endif;  
                   
                 endif;?>        
                  </tbody>
                  <tfoot>
                  <tr>
                     <th>Programa de Postgrado</th>
                   
                    <th>Opción</th>
                  </tr>
                  </tfoot>
                </table>

               <br>


  <div ><input type="hidden" name="str" id="str"value="<?php echo ($prog_inicial);?>"></div>
  <br>
 
  <div align="center">
    <input type="submit" name="btnguardar" value="Pre-inscribir" class="boton btn btn-info">

   
  </div>
       </form>                       
                      </div><!-- /.card --> 
                  </div><!-- /.card-body -->
              </div><!-- /.card card-primary card-outline -->

        <!-- /.card-body -->

      <!-- /.card card-primary card-outline -->

      </section><!-- /.section-->
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

