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
                            <h3 class="card-title">Listado de Pagos Reportados</h3>
  </div>
   <div class="card-header">
                         <a title="Descargar a Excel Pagos pendientes por Conciliar" href="<?php  echo base_url()?>dashboard05/exportar_excel" target="_blank">Descargar Excel pagos pendientes por conciliar<img src="<?php echo base_url(); ?>assets/img/excel.jpg"  alt="Excel" style="width: 10mm; height: 10mm; margin: 0;" /></a>
                          </div>
                          <?php  if ($this->session->flashdata("error")): ?>
                          <p><i class="icon fa fa-ban"></i> <strong><?php echo $this->session->flashdata("error"); ?> </strong></p>
                         <?php endif; ?>   
                          <div class="card-body">

                             
                 <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                  <th>Período académico</th>
                    <th>Cédula</th>
                    <th>Nombres y Apellidos</th>
 		    <th>Correo Electrónico</th>
		    <th>Aspirante/Nuevo Ingreso/Regular</th>
                    <th>Estado</th>
                     <th>Pago Adicional</th>
                    <th>Banco</th>
                    <th>Nro Ref.</th>
                    <th>Fecha</th>
                    <th>Monto Pagar</th>
                    <th>Monto Depositado</th>
                    <th>Carnet o Carta de Servicio</th>
                    <th>Postgrado</th>
                    <th>U.C.</th>
                    <th>Opción</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php if(!empty($listado)):?>
                      <?php foreach($listado as $listado):?>
                         <?php if ($listado->aspirante==1 and $listado->total_requisitos >=2){ ?>
                  <tr>
                  <td><?php echo $listado->periodo;?></td>
                    <td><?php echo $listado->cedula_est;?></td>
                    <td><?php echo $listado->pri_nombre ?> <?php echo $listado->seg_nombre; ?> <?php echo $listado->pri_apellido ?> <?php echo $listado->seg_apellido ?></td>
		    <td><?php echo $listado->correo; ?></td>			
                    <td><?php if($listado->rol_id==7)echo 'ASPIRANTE'; ?></td>
                    <td><?php echo $listado->nob_estado; ?></td>
                    <td><?php if($listado->pago_adicional=='1')echo 'SI'; else echo 'Primer Pago'; ?></td>
                    <td><?php echo $listado->banco; ?></td>
                    <td><?php if ($listado->pago_adicional==0){?><a href="<?php echo base_url()?>dashboard05/transferencia/<?php echo $listado->id_usuario;?>" class="btn btn-warning"><?php echo $listado->nro_referencia; }else{echo $listado->nro_referencia;}?></a></td>
                   
                    <td><?php echo  date("d/m/Y", strtotime($listado->fecha_transferencia)); ?></td>
                    <td><?php echo number_format($listado->monto_apagar, 2, ".", ","); ?></td>
                    <td><?php echo number_format($listado->monto_depositado, 2, ".", ","); ?></td>
                     <td><a href="<?php echo base_url()?>dashboard05/carnet/<?php echo $listado->id_usuario;?>" class="btn btn-warning">Ver Documento</a><?php echo $listado->trabajo; ?></td>
                     <td><a href="<?php echo base_url()?>dashboard05/postgrado/<?php echo $listado->id_usuario;?>/<?php echo $listado->aspirante;?>" class="btn btn-info"> Ver Postgrado(s)</a></td>
                    <!--<td><?php echo $listado->postgrado; ?></td>-->
                    <td><?php echo $listado->uc; ?></td>
                     <td><a href="<?php echo base_url()?>dashboard05/conciliar_store/<?php echo $listado->id_usuario.'/'. $listado->id_periodo;?>" class="btn btn-success">PROCESAR</a> <a href="<?php echo base_url()?>dashboard05/conciliar_error/<?php echo $listado->id_usuario;?>/<?php echo $listado->aspirante;?>/<?php echo $listado->id_periodo;?>" class="btn btn-danger">ERROR</a></td>

                  </tr>
                <?php } 
                    if ($listado->aspirante==0 ){ ?>
                       <tr>
                       <td><?php echo $listado->periodo;?></td>
                    <td><?php echo $listado->cedula_est;?></td>
                    <td><?php echo $listado->pri_nombre ?> <?php echo $listado->seg_nombre; ?> <?php echo $listado->pri_apellido ?> <?php echo $listado->seg_apellido ?></td>
        <td><?php echo $listado->correo; ?></td>      
                    <td><?php  if($listado->rol_id==5)echo 'REGULAR';  else if($listado->rol_id=='8')echo 'NUEVO INGRESO'; ?></td>
                    <td><?php echo $listado->nob_estado; ?></td>
                    <td><?php if($listado->pago_adicional=='1')echo 'SI'; else echo 'Primer Pago'; ?></td>
                    <td><?php echo $listado->banco; ?></td>
                    <td><?php if ($listado->pago_adicional==0){?><a href="<?php echo base_url()?>dashboard05/transferencia/<?php echo $listado->id_usuario;?>" class="btn btn-warning"><?php echo $listado->nro_referencia; }else{echo $listado->nro_referencia;}?></a></td>
                   
                    <td><?php echo  date("d/m/Y", strtotime($listado->fecha_transferencia)); ?></td>
                    <td><?php echo number_format($listado->monto_apagar, 2, ".", ","); ?></td>
                    <td><?php echo number_format($listado->monto_depositado, 2, ".", ","); ?></td>
                     <td><a href="<?php echo base_url()?>dashboard05/carnet/<?php echo $listado->id_usuario;?>" class="btn btn-warning">Ver Documento</a><?php echo $listado->trabajo; ?></td>
                     <td><a href="<?php echo base_url()?>dashboard05/postgrado/<?php echo $listado->id_usuario;?>/<?php echo $listado->aspirante;?>/<?php echo $url;?>" class="btn btn-info"> Ver Postgrado(s)</a></td>
                    <!--<td><?php echo $listado->postgrado; ?></td>-->
                    <td><?php echo $listado->uc; ?></td>
                                    <td><a href="<?php echo base_url()?>dashboard05/conciliar_store/<?php echo $listado->id_usuario.'/'. $listado->id_periodo;?>" class="btn btn-success">PROCESAR</a> <a href="<?php echo base_url()?>dashboard05/conciliar_error/<?php echo $listado->id_usuario;?>/<?php echo $listado->aspirante;?>/<?php echo $listado->id_periodo;?>" class="btn btn-danger">ERROR</a></td>

                  </tr>
                        <?php }
                         endforeach;?>
                  <?php endif;?>        
                  </tbody>
                  <tfoot>
                  <tr>
                  <th>Período académico</th>
                    <th>Cédula</th>
                    <th>Nombres y Apellidos</th>
		    <th>Correo Electrónico</th>			
                    <th>Aspirante/Nuevo Ingreso/Regular</th>
                    <th>Estado</th>
                     <th>Pago Adicional</th>
                    <th>Banco</th>
                    <th>Nro Ref.</th>
                    <th>Fecha</th>
                    <th>Monto Pagar</th>
                    <th>Monto Depositado</th>
                    <th>Carnet o Carta de Servicio</th>
                    <th>Postgrado</th>
                    <th>U.C.</th>
                  <th>Opción</th>
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
