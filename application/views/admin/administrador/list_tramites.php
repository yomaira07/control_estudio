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
                          <div class="info-box">
                            <span class="info-box-icon bg-success"><i class="fas fa-copy"></i></span>
                              <div class="info-box-content">             
                                <span class="info-box-text"><b>TRÁMITES Y/O SOLICITUDES</b> </span> </a>      
                              </div>
                                <!-- /.info-box-content  -->
                          </div>
                          <div class="card-header">
                            <h3 class="card-title">Listado de Pagos Reportados (Tramites y Solicitudes)</h3>
                            <?php  if ($this->session->flashdata("error")): ?>
                          <p><i class="icon fa fa-ban"></i> <strong><?php echo $this->session->flashdata("error"); ?> </strong></p>
                         <?php endif; ?> 
                          </div>

				<div class="card-header">
				<a title="Descargar a Excel Pagos de Trámites pendientes por Conciliar" href="<?php  echo base_url()?>dashboard09/exportar_excel_no_conciliados?>"" target="_blank">Descargar Excel pagos pendientes por conciliar<img src="<?php echo base_url(); ?>assets/img/excel.jpg"  alt="Excel" style="width: 10mm; height: 10mm; margin: 0;" /></a>
				</div>
                         <!-- Mensaje de Alerta-->
                     <?php  if ($this->session->flashdata("error")): ?>
                        <div class="alert alert-danger alert-dismissible">
                          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                          <p><i class="icon fa fa-ban"></i> <?php echo $this->session->flashdata("error"); ?> </p>
                        </div>
                      <?php endif; ?>
                      <?php  if ($this->session->flashdata("warning")): ?>
                        <div class="alert alert-warning">
                          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                          <p><i class="icon fa fa-check-square"></i> <?php echo $this->session->flashdata("warning"); ?> </p>
                        </div>
                      <?php endif; ?>    
                      <?php  if ($this->session->flashdata("warning")): ?>
                        <div class="alert alert-success">
                          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                          <p><i class="icon fa fa-check-square"></i> <?php echo $this->session->flashdata("success"); ?> </p>
                        </div>
                      <?php endif; ?>    
                          <div class="card-body">

                             
                 <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                  <th>Cédula</th>
                    <th>Nombres y Apellidos</th>
                    <th>Correo Electrónico</th>
                    <th>Nuevo Ingreso/Regular</th>
                    <th>Estado</th> 
                    <th>Pago Adicional</th>                  
                    <th>Banco</th>
                    <th>Nro Ref.</th>                   
                    <th>Fecha de la Transferencia</th>
                    <th>Monto Pagar</th>
                    <th>Monto Depositado</th>
                    <th>Carnet o Carta de Servicio</th>
                    <th>Fecha de Solicitud del Tramite</th>
                    <th>Tramite y/o Solicitud</th>     
		 <th>Unidades Créditos Aprobados</th>                     
                    <th>Opcion</th>
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
                    <td><?php if($listado->pago_adicional=='1')echo 'SI'; else echo 'Primer Pago'; ?></td>
                    <td><?php echo $listado->banco; ?></td>                  
                    <td>
                       <a href="<?php echo base_url()?>dashboard09/transferencia/<?php echo $listado->id_usuario.'/'.$listado->id_solicitud;?>" class="btn btn-warning"><?php echo $listado->nro_referencia; ?></a>
                    </td>
                   
                    <td><?php echo  date("d/m/Y", strtotime($listado->fecha_transferencia)); ?></td>
                    <td><?php echo number_format($listado->monto_apagar, 2, ".", ","); ?></td>
                    <td><?php ///echo number_format($listado->monto_depositado, 2, ","); 
				echo $listado->monto_depositado;  ?></td>
                     <td><a href="<?php echo base_url()?>dashboard05/carnet/<?php echo $listado->id_usuario;?>"target='_blank' class="btn btn-warning">Ver Documento</a><?php echo $listado->trabajo; ?></td>
                     <td><?php echo  date("d/m/Y", strtotime($listado->fecha_solicitud)); ?></td>
                     <td><?php echo $listado->programa.'<br><hr>'.'<b>Trámite: </b>'.$listado->tramite; ?></td>     
 <th><?php echo $listado->uc; ?></th>           
                     <td><a href="<?php echo base_url()?>dashboard09/conciliar_store/<?php  echo $listado->id_solicitud;?>" class="btn btn-success">PROCESAR</a> <br><hr>
                     <a href="<?php echo base_url()?>dashboard09/conciliar_error_tramite/<?php echo $listado->id_solicitud;?>" class="btn btn-danger">ERROR</a></td>

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
                    <th>Pago Adicional</th>                    
                    <th>Banco</th>
                    <th>Nro Ref.</th>                   
                    <th>Fecha de la Transferencia</th>
                    <th>Monto Pagar</th>
                    <th>Monto Depositado</th>
                    <th>Carnet o Carta de Servicio</th>
                    <th>Fecha de Solicitud del Tramite</th>
                    <th>Tramite y/o Solicitud</th> 
		    <th>Unidades Créditos Aprobados</th>                 
                    <th>Opcion</th>
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
