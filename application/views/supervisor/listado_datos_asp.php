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
                      <div class="card">
          
                          <div class="card-header">
   <h3 class="card-title">Información del <b>Aspirante</b> del Período de selección Vigente:<b>  <?php  echo $periodo->nombre;?></b></h3>
                          </div>
                          
                          <div class="card-body">

                             
                 <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Cedula</th>
                    <th>Nombres y Apellidos</th>
                    <th>Aspirante/Nuevo Ingreso/Regular</th>
                  
                    <th>Banco</th>
                    <th>Nro Ref.</th>
                    <th>Fecha</th>
                    <th>Monto Pagar</th>
                    <th>Monto Depositado</th>
                    <th>Postgrado</th>
                   
                    <th>Revisi&oacute;n de Datos Cargados</th>
                   <!-- <th>Opci&oacute;n</th>-->
                  </tr>
                  </thead>
                  <tbody>
                    <?php if(!empty($listado)):?>
                      <?php foreach($listado as $listado):?>
                  <tr>
                    <td><?php echo $listado->nacionalidad;echo $listado->cedula;?></td>
                    <td><?php echo $listado->primer_nombre ?> <?php echo $listado->segundo_nombre; ?> <?php echo $listado->primer_apellido ?> <?php echo $listado->segundo_apellido ?></td>
                  <td><div align="center"><?php if($listado->rol_id==7)echo 'Aspirante';
                      if($listado->rol_id==8)echo 'Nuevo Ingreso';
                      if($listado->rol_id=='5')echo 'Regular';?>
                    </div></td>
                   
                    <td><?php echo $listado->nombre_banco; ?></td>
                    <td><?php echo $listado->nro_referencia; ?></td>
                    <td><?php echo  date("d/m/Y", strtotime($listado->fecha_transferencia)); ?></td>
                    <td><?php echo number_format($listado->monto_apagar, 2, ",", "."); ?></td>
                    <td><?php echo number_format($listado->monto_depositado, 2, ",", "."); ?></td>
                      <td><a href="<?php echo base_url()?>dashboard05/postgrado_rev_ac/<?php echo $listado->id_usuario;?>/<?php echo $listado->aspirante;?>" class="btn btn-info"> Ver Postgrado(s)</a></td>
                 
                     <div> <td><a href="<?php  echo base_url()?>dashboard05/revisar_datos_alumno/<?php  echo $listado->id_usuario;?>/<?php  echo $listado->aspirante;?>" class="btn btn-warning">Ver Datos</a>  </div><br>
              
                    
                  </tr>
                        <?php endforeach;?>
                  <?php endif;?>        
                  </tbody>
                  <tfoot>
                  <tr>
                     <th>Cedula</th>
                    <th>Nombres y Apellidos</th>
                     <th>Aspirante/Nuevo Ingreso/Regular</th>
               
                    <th>Banco</th>
                    <th>Nro Ref.</th>
                    <th>Fecha</th>
                    <th>Monto Pagar</th>
                    <th>Monto Depositado</th>
                    <th>Postgrado</th>
                
                    <th>Revisi&oacute;n de Datos Cargados</th>
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
