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
                            <h3 class="card-title">Pagos Conciliados con Error en el Pago</h3>
                          </div>
                          
                          <div class="card-body">

                             
                          <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                  <th>Cédula</th>
                    <th>Nombres y Apellidos</th>
                    <th>Correo Electrónico</th>
                    <th>Nuevo Ingreso/Regular</th>
                    <th>Estado</th>                   
                    <th>Banco</th>
                    <th>Nro Ref.</th>
                   
                    <th>Fecha de la Transferencia</th>
                    <th>Monto Pagar</th>
                    <th>Monto Depositado</th>
                    <th>Carnet o Carta de Servicio</th>
                    <th>Fecha de Solicitud del Tramite</th>
                    <th>Tramite y/o Solicitud</th>                 
                
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
                    <td><?php echo $listado->nob_estado; ?></td>
                   
                    <td><?php echo $listado->banco; ?></td>
                    <td>
                    <a href="<?php echo base_url()?>dashboard09/transferencia/<?php echo $listado->id_usuario.'/'.$listado->id_solicitud;?>" class="btn btn-warning"><?php echo $listado->nro_referencia; ?></a></td>
                   
                    <td><?php echo  date("d/m/Y", strtotime($listado->fecha_transferencia)); ?></td>
                    <td><?php echo number_format($listado->monto_apagar, 2, ".", ","); ?></td>
                    <td><?php echo number_format($listado->monto_depositado, 2, ".", ","); ?></td>
                     <td><a href="<?php echo base_url()?>dashboard05/carnet/<?php echo $listado->id_usuario;?>"target='_blank' class="btn btn-warning">Ver Documento</a><?php echo $listado->trabajo; ?></td>
                     <td><?php echo  date("d/m/Y", strtotime($listado->fecha_solicitud)); ?></td>
                     <td><?php echo $listado->programa.'<br><hr>'.'<b>Trámite: </b>'.$listado->tramite; ?></td>       
                    
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
                    <th>Estado</th>                   
                    <th>Banco</th>
                    <th>Nro Ref.</th>
                   
                    <th>Fecha de la Transferencia</th>
                    <th>Monto Pagar</th>
                    <th>Monto Depositado</th>
                    <th>Carnet o Carta de Servicio</th>
                    <th>Fecha de Solicitud del Tramite</th>
                    <th>Tramite y/o Solicitud</th>                 
                
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
