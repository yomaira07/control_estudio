
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
                            <h3 class="card-title">TRÁMITES Y SOLICITUDES APROBADOS POR REINCORPORACION- Período Académico: <b><?php // foreach($periodo as $periodo): 
echo $periodo->nombre; //endforeach?></b></h3>
                            <div align="right" ><a title="Descargar a Excel" href="<?php  echo base_url()?>dashboard09/excel_reincorporacion/<?php echo $periodo->id;?>" target="_blank"><img src="<?php echo base_url(); ?>assets/img/excel.jpg"  alt="Excel" style="width: 10mm; height: 10mm; margin: 0;" /></a></div>                           
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
                    <th >Estatus de Conciliación</th> 
                    <th >Estatus del Trámite y/o Solicitud</th> 
                    <th >Ver Requisitos</th> 
                    <th >Ver planilla</th> 
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
                     <td> <?php if($listado->reg_pago==1) echo "Pago Conciliado"; else echo "Pago No Conciliado" ;?></td>  
                     <td><?php if( $listado->rev_academica==1 and  $listado->reg_pago==1 ) echo "Trámite Verificado y <b>Aprobado</b>";elseif( $listado->rev_academica==2 ) echo "Trámite Verificado y <b>Rechazado</b>" ;?>
                     <td> <div>
                            <a href="<?php echo base_url()?>assets/tramites/reincorporaciones/solicitud/<?php echo $listado->id_usuario.'_'.$listado->id_programa.'_solicitud.pdf'; ?>" target="_new"><img src="<?php echo base_url()?>/assets/img/blanco.png"   title ="Ver Carta de Solicitud "> Solicitud</a>
                         </div>
                         <div>
                            <a href="<?php echo base_url()?>assets/tramites/reincorporaciones/record/<?php echo $listado->id_usuario.'_record.pdf'; ?>" target="_new"><img src="<?php echo base_url()?>/assets/img/blanco.png"   title ="Ver Record Académico Calificaciones "> Récord Académico</a>                                                  
                         </div>
                    </td>
                     <td><a href="<?php  echo base_url()?>dashboard09/planilla/<?php  echo $listado->id_usuario;?>/<?php  echo $listado->id_solicitud;?>" class="btn btn-warning">Imprimir</a></td>
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
                    <th >Estatus de Conciliación</th> 
                    <th >Estatus del Trámite y/o Solicitud</th> 
                    <th >Ver Requisitos</th> 
                    <th >Ver planilla</th> 
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
