  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
    <!-- /.container-fluid -->
   
    </section>

    <!-- Main content -->
     <section class="content">
      <!-- /.card -->
              <div class="card card-primary card-outline">

          

            
                </div><!-- /.card -->
                  <div class="card-body">
                      <div class="card">

               
        		 <div class="card-header">
 <h3 class="card-title"><?php if( $this->uri->segment(3)==5) echo 'LISTADO GENERAL DE ESTUDIANTES REGULARES INSCRITOS POR PROGRAMA DEL PERÍODO '; elseif($this->uri->segment(3)==8) echo 'LISTADO GENERAL DE DE ESTUDIANTES NUEVOS INGRESO INSCRITOS POR PROGRAMA DEL PERIODO' ;   foreach ($periodo as $periodo){  echo $periodo->nombre;}  ?> </h3>
                          </div>
                          <div class="card-header" align="right">

                                   <a title="Descargar listado a formato Excel(.xls)" href="<?php  echo base_url()?>dashboard05/dExcel_inscritos/<?Php echo $this->uri->segment(3);?>" target="_blank"><img src="<?php echo base_url(); ?>assets/img/excel.jpg"  alt="Excel" style="width: 10mm; height: 10mm; margin: 0;" />DESCARGAR LISTADO</a>
                          </div>
                            
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
                             
                 <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                  	<th>Cedula</th>
                  	<th>Nombres y Apellidos</th>
                    
                    <th>Especialización</th>
                    <th>Opciones</th>	
                  </tr>
                  </thead>
                  <tbody>
                    <?php if(!empty($total_inscritos)):?>
                      <?php foreach($total_inscritos as $total_inscritos):?>
                  <tr>
                  	<td><?php echo $total_inscritos->cedula;?></td>
                    <td><?php echo $total_inscritos->primer_nombre;?> <?php echo $total_inscritos->segundo_nombre;?> <?php echo $total_inscritos->primer_apellido;?> <?php echo $total_inscritos->segundo_apellido;?></td>
                    <td><?php echo $total_inscritos->programa;?></td>
                     <td><div><a href="<?php  echo base_url()?>dashboard05/planilla/<?php  echo $total_inscritos->id_usuario;?>/<?php  echo $total_inscritos->id_programa;?>" class="btn btn-warning">Imprimir Planilla de Inscripción</a>
                     <a href="<?php  echo base_url()?>dashboard05/reversar_inscripcion/<?php  echo $rol.'/'. $total_inscritos->id_usuario;?>/<?php  echo $total_inscritos->id_programa;?>" class="btn btn-success">Reversar</a></div></td>
                  </tr>
                        <?php endforeach;?>
                  <?php endif;?>        
                  </tbody>
                  <tfoot>
                  <tr>
                   <th>Cedula</th>
                  	<th>Nombres y Apellidos</th>
                    <th>Especialización</th>
					<th>Opciones</th>	
                  </tr>
                  </tfoot>
                </table>

               <br>
               
               
              
          </div>

                              
                      </div><!-- /.card --> 
                  </div><!-- /.card-body -->
              </div><!-- /.card card-primary card-outline -->

        <!-- /.card-body -->

      <!-- /.card card-primary card-outline -->

      </section><!-- /.section-->
    <!-- /.content -->

 </div>
  <!-- /.content-wrapper -->
