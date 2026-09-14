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
                            <h3 class="card-title">Listado de Pagos Reportados sin conciliación</h3>
                          </div>
                           <div class="card-header" align="right">

                                   <a title="Descargar a Excel" href="<?php  echo base_url()?>dashboard05/excel_nuevo_ingreso" target="_blank"><img src="<?php echo base_url(); ?>assets/img/excel.jpg"  alt="Excel" style="width: 10mm; height: 10mm; margin: 0;" /></a>
                          </div>
                          <div class="card-body">

                             
                 <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                  <th>Período académico</th>
                    <th>Cédula</th>
                    <th>Nombres y Apellidos</th>
 		    <th>Correo Electrónico</th>
 			<th>Teléfonos</th>
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
                  
                  </tr>
                  </thead>
                  <tbody>
                    <?php if(!empty($listado)):?>
                      <?php foreach($listado as $listado):
                         
                    if ($listado->aspirante==0 ){ ?>
                       <tr>
                       <td><?php echo $listado->periodo;?></td>
                    <td><?php echo $listado->cedula_est;?></td>
                    <td><?php echo $listado->pri_nombre ?> <?php echo $listado->seg_nombre; ?> <?php echo $listado->pri_apellido ?> <?php echo $listado->seg_apellido ?></td>
        <td><?php echo $listado->correo; ?></td>   
  <td><?php echo $listado->cod_hab.'-'.$listado->telefono_hab.' '.$listado->cod_cel.'-'.$listado->telefono_cel; ?></td>    
                    <td><?php  if($listado->rol_id==5)echo 'REGULAR';  if($listado->rol_id=='8' AND $listado->inscrito==61)echo 'NUEVO INGRESO ÚLTIMA CAMPAÑA'; if($listado->rol_id=='8' AND $listado->inscrito!=61 ) echo 'NUEVO INGRESO ADMITIDO';?></td>
                    <td><?php echo $listado->nob_estado; ?></td>
                    <td><?php if($listado->pago_adicional=='1')echo 'SI'; else echo 'Primer Pago'; ?></td>
                    <td><?php echo $listado->banco; ?></td>
                    <td><?php if ($listado->pago_adicional==0){ echo $listado->nro_referencia;}?></a></td>                   
                    <td><?php echo  date("d/m/Y", strtotime($listado->fecha_transferencia)); ?></td>
                    <td><?php echo number_format($listado->monto_apagar, 2, ".", ","); ?></td>
                    <td><?php echo number_format($listado->monto_depositado, 2, ".", ","); ?></td>
                    <td><?php echo $listado->trabajo; ?></td>
                    <td><a href="<?php echo base_url()?>dashboard05/postgrado/<?php echo $listado->id_usuario;?>/<?php echo $listado->aspirante;?>/<?php echo $url;?>" class="btn btn-info"> Ver Postgrado(s)</a></td>
                    <td><?php echo $listado->postgrado; ?></td>
                    <td><?php echo $listado->uc; ?></td>
                                  

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
 			<th>Teléfonos</th>
		    <th>Nuevo Ingreso/Regular</th>
                    <th>Estado</th>
                     <th>Pago Adicional</th>
                    <th>Banco</th>
                    <th>Nro Ref.</th>
                    <th>Fecha</th>
                    <th>Monto Pagar</th>
                    <th>Monto Depositado</th>
                    <th>Carnet o Carta de Servicio</th>
                    <th>Ver Unidades Curriculares Inscritas Postgrado</th>
		    <th>Postgrado inscrito</th>
                    <th>U.C.</th>
                  
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

