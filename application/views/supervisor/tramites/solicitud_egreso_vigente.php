
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
                      <div class="card">
          
                          <div class="card-header">

 <div class="info-box">
              <span class="info-box-icon bg-success"><i class="fas fa-copy"></i></span>

              <div class="info-box-content">             
                <span class="info-box-text">TRÁMITES Y/O SOLICITUDES </span> </a> 
                <span class="info-box-number">Revisión de Solicitudes de Egresos</span>              
                <span class="info-box-number"></br></span>             
              </div>
              <!-- /.info-box-content  -->
            </div>
            <!-- /.info-box  -->
                            <h3 class="card-title">TRÁMITES Y SOLICITUDES DE EGRESOS REGISTRADAS- Período Académico: <b><?php echo $periodo->nombre;?></b></h3>
                          <!--  <div align="right" ><a title="Descargar a Excel" href="<?php  echo base_url()?>dashboard09/excel" target="_blank"><img src="<?php echo base_url(); ?>assets/img/excel.jpg"  alt="Excel" style="width: 10mm; height: 10mm; margin: 0;" /></a></div> -->                          
                          </div>
                          
                          <div class="card-body">

                             
                          <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                  <th>Cédula</th>
                    <th>Nombres y Apellidos</th>
                    <th>Correo Electrónico</th>
                    <th>Nuevo Ingreso/Regular</th>                    
                    <th>Fecha de Solicitud del Tramite</th>
                    <th>Especialización y/0 Programa Especializado de Postgrado</th>  
                    <th>Tramite y/o Solicitud</th>                
                   <th >Estatus del Trámite y/o Solicitud</th> 
                   <th >Opción</th> 
                  </tr>
                  </thead>
                  <tbody>
                    <?php if(!empty($listado)):?>
                      <?php foreach($listado as $listado):?>                           
                  <tr>
                    <td><?php echo $listado->cedula_est;?></td>
                    <td><?php echo $listado->pri_nombre ?> <?php echo $listado->seg_nombre; ?> <?php echo $listado->pri_apellido ?> <?php echo $listado->seg_apellido ?></td>
		                <td><?php echo $listado->correo; ?></td>			
                    <td><?php  if($listado->rol_id==5)echo 'REGULAR';  else if($listado->rol_id=='8')echo 'NUEVO INGRESO'; ?></td>                  
                     <td><?php echo  date("d/m/Y", strtotime($listado->fecha_solicitud)); ?></td>
                     <td><?php echo $listado->programa;?></td>
                     <td> <?php echo $listado->tramite; ?></td> 
                     <td> 
                      <?php if(  $listado->rev_academica==0) echo "Trámite Pendiente por Validar";?>
                    </td> 
                      <td>
                      <a href="<?php  echo base_url()?>dashboard09/revisar_tramite/<?php  echo $listado->id_solicitud;?>/<?php  echo $listado->id_usuario;?>/<?php echo $listado->id_programa;?>" class="btn btn-warning">REVISAR</a>
                      </td>
                  </tr>
                
                        <?php 
                         endforeach;?>
                  <?php endif;?>        
                  </tbody>
                  <tfoot>
                  <tr>
                  <th>Cédula</th>
                    <th>Nombres y Apellidos</th>
                    <th>Correo Electrónico</th>
                    <th>Nuevo Ingreso/Regular</th>                    
                    <th>Fecha de Solicitud del Tramite</th>
                    <th>Especialización y/0 Programa Especializado de Postgrado</th>  
                    <th>Tramite y/o Solicitud</th>                   
                    <th >Estatus del Trámite y/o Solicitud</th> 
                    <th >Opción</th> 
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
