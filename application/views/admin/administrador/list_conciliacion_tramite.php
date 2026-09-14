
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
    <!-- /.container-fluid -->

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
                          <div class="card-title">
                           
Listado de Pagos Concialiados (Trámites y Solicitudes)
<?php  if ($this->session->flashdata("error")): ?>
                          <p><i class="icon fa fa-ban"></i> <strong><?php echo $this->session->flashdata("error"); ?> </strong></p>
                         <?php endif; ?> 
                          </div>
			<div class="card-header">
				<a title="Descargar a Excel Pagos de Trámites Conciliados" href="<?php  echo base_url()?>dashboard09/exportar_excel_conciliados?>""
					 target="_blank">Descargar Excel pagos conciliados<img src="<?php echo base_url(); ?>assets/img/excel.jpg"  alt="Excel"
					 style="width: 10mm; height: 10mm; margin: 0;" />
				</a>
			</div>
            </div>              
            <div class="card-body">
                             
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Cédula del Estudiante</th>
                    <th>Nombres y Apellidos</th>
                    <th>Correo Electrónico</th>
                    <th>Nuevo Ingreso/Regular</th>
                    <th>Estado</th>  
		    <th>Lugar de Trabajo</th>  		                
                    <th>Banco</th>
                    <th>Nro Ref.</th>                   
                    <th>Fecha de la Transferencia</th>
                    <th>Monto Pagar</th>
                    <th>Monto Depositado</th>
                    <th>Fecha de Solicitud del Trámite</th>
                    <th>Tramite y/o Solicitud</th> 
<th>Unidades Créditos Aprobados</th>         
                    <th>Estatus de la Conciliación</th>        
                  
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
		    <td><a href="<?php echo base_url()?>dashboard05/carnet/<?php echo $listado->id_usuario;?>"target='_blank' class="btn btn-warning">Ver Documento</a><?php echo $listado->trabajo; ?></td>
                   
                    <td><?php echo $listado->banco; ?></td>
                    <td> <?php echo $listado->nro_referencia; ?></td>
                   
                    <td><?php echo  date("d/m/Y", strtotime($listado->fecha_transferencia)); ?></td>
                    <td><?php echo number_format($listado->monto_apagar, 2, ".", ","); ?></td>
                    <td><?php echo number_format($listado->monto_depositado, 2, ".", ","); ?></td>
                  
                     <td><?php echo  date("d/m/Y", strtotime($listado->fecha_solicitud)); ?></td>
                     <td><?php echo $listado->programa.'<hr>'.'<b>Trámite: </b>'.$listado->tramite; ?></td>     
			 <td><?php echo $listado->uc; ?></td>    

                     <td ><?php if($listado->conciliado==1) echo "Pago conciliado"; elseif($listado->conciliado==2) echo "<b>Rechazado</b>";?></td>

                  </tr>
                
                        <?php 
                         endforeach;?>
                  <?php endif;?>        
                  </tbody>
                  <tfoot>
                  <tr>
                 
                  <th>Cédula del Estudiante</th>
                    <th>Nombres y Apellidos</th>
                    <th>Correo Electrónico</th>
                    <th>Nuevo Ingreso/Regular</th>
                    <th>Estado</th>   
		    <th>Lugar de Trabajo</th>  		                
                    <th>Banco</th>
                    <th>Nro Ref.</th>                   
                    <th>Fecha de la Transferencia</th>
                    <th>Monto Pagar</th>
                    <th>Monto Depositado</th>
                    <th>Fecha de Solicitud del Trámite</th>
                    <th>Tramite y/o Solicitud</th>   
		    <th>Unidades Créditos Aprobados</th>       
                    <th>Estatus de la Conciliación</th>   
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
    
