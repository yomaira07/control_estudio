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
          
                          <div class="card-header">
                            <h3 class="card-title">Listado para Revisión Academica Proceso de Selección de Aspirante<?php  echo $periodo->nombre;?></h3>
                          </div>
                          
                          <div class="card-body">

                             
                 <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Especializacion y/o Postgrado</th>
                    <th>Cédula</th>
                    <th>Nombres y Apellidos</th>
                    <th>Aspirante/Nuevo Ingreso/Regular</th>
                    <th>Estado</th>
                    <th>Fecha</th>
                    <th>Monto Pagar</th>
                    <th>Monto Depost</th>
                    <th>Postgrado</th>
                    <th>U.C.</th>
                    <th>Revisi&oacute;n</th>
                  </tr>
                  </thead>
                  <tbody> 
                    <?php if(!empty($listado)):?>
                      <?php //var_dump($listado);
                      foreach($listado as $listado):?>
                  <tr>
                    <td><?php echo $listado->postgrado;?></td>
                    <td><?php echo $listado->estudiante_nac;echo $listado->estudiante;?></td>
                    <td><?php echo $listado->pri_nombre ?> <?php echo $listado->seg_nombre; ?> <?php echo $listado->pri_apellido ?> <?php echo $listado->seg_apellido ?></td>
                     <td><?php if($listado->rol_id==7)echo 'Aspirante';
                      if($listado->rol_id==8)echo 'Nuevo Ingreso';
                      if($listado->rol_id==5)echo 'Regular';?>
                          
                      </td>
                    <td><?php echo $listado->nob_estado; ?></td>

                    <td><?php echo  date("d/m/Y", strtotime($listado->fecha_transferencia)); ?></td>
                    <td><?php echo number_format($listado->monto_apagar, 2, ",", "."); ?></td>
                    <td><?php echo number_format($listado->monto_depositado, 2, ",", "."); ?></td>

                     <td><a href="<?php echo base_url()?>dashboard05/postgrado_rev_ac/<?php echo $listado->id_usuario;?>/<?php echo $listado->aspirante;?>" class="btn btn-info"> Ver Postgrado(s)</a></td>
                    <td><?php echo $listado->uc; ?></td>
                    <?php if ($listado->aspirante==1){  ?>
                    <td><a href="<?php  echo base_url()?>dashboard05/documentos/<?php  echo $listado->id_usuario;?>/<?php echo $listado->aspirante;?>" class="btn btn-warning">REVISAR</a></td>
                     <?php  }else{ ?>
                    <td><a href="<?php  echo base_url()?>dashboard05/revisar_datos/<?php  echo $listado->id_usuario;?>/<?php echo $listado->aspirante;?>" class="btn btn-warning">REVISAR</a></td>
                    <?php } ?>
                  
                  </tr>
                        <?php endforeach;?>
                  <?php endif;?>        
                  </tbody>
                  <tfoot>
                 <tr>
                    <th>Especialización y/o Postgrado</th>
                    <th>Cedula</th>
                    <th>Nombres y Apellidos</th>
                    <th>Aspirante/Nuevo Ingreso/Regular</th>
                    <th>Estado</th>
                    <th>Fecha</th>
                    <th>Monto Pagar</th>
                    <th>Monto Depost</th>
                    <th>Postgrado</th>
                    <th>U.C.</th>
                    <th>Revisi&oacute;n</th>

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
