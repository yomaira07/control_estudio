
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
                            <h3 class="card-title"> <b>RETIROS VOLUNTARIOS</b> REVISADOS - Período Académico: <b><?php foreach($periodo as $periodo): echo $periodo->nombre; endforeach?></b></h3>
<div align="right" ><a title="Descargar a Excel" href="<?php  echo base_url()?>dashboard09/excel_retiros_periodo/<?php echo $periodo->id;?>" target="_blank"><img src="<?php echo base_url(); ?>assets/img/excel.jpg"  alt="Excel" style="width: 10mm; height: 10mm; margin: 0;" /></a></div> 
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
                    <th>Unidades Curriculares tramitadas</th>     
                    <th>Docente </th>            
                    <th>Horario de Clase </th>            
                    <th >Estatus del Trámite y/o Solicitud</th> 
                
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
                     <td><?php echo "<b>".$listado->pensum."</b>";?>  </td>
                    <td> <?php echo $listado->nombre_docente.' '.$listado->apellido_docente ; echo "<br><b>Sección: </b>".$listado->seccion;?></td> 
                     <td><?php echo "<b> Día de Clases: </b>".$listado->dia_clase; echo "<br><b> Horario: </b>".$listado->horario;?>  </td>
<td> <?php if( $listado->retiro==0 and $listado->revision_solicitud==1) echo "Trámite Revisado sin Aprobación";elseif(  $listado->retiro==1 and $listado->revision_solicitud==1) echo "Trámite Revisado y Aprobado" ;elseif($listado->revision_solicitud==2 ) echo "Trámite Revisado y Rechazado" ;?></td> 
                 
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
                    <th>Unidades Curriculares tramitadas</th>     
                    <th>Docente </th>            
                    <th>Horario de Clase </th>            
                    <th >Estatus del Trámite y/o Solicitud</th> 
              
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
