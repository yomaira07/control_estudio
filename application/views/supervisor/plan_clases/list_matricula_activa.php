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
                            <h3 class="card-title">Matrícula Estudiantil Activa</h3>
                          </div>
                          <div class="card-header" align="right">

<a title="Descargar listado a formato Excel(.xls)" href="<?php  echo base_url()?>dashboard03/descarga_excel" target="_blank"><img src="<?php echo base_url(); ?>assets/img/excel.jpg"  alt="Excel" style="width: 10mm; height: 10mm; margin: 0;" /></a>
</div>

                          <div class="card-body">

                             
                 <table id="example1" class="table table-bordered table-striped">
                  <thead>
                 
                  <tr>
                  <th>Cédula</th>
                            <th>Primer Nombre</th>
                            <th>Segundo Nombre</th>
                            <th>Primer Apellido</th>  
                            <th>Segundo Apellido</th>  
                    <th>Programa de Postgrado</th>
                   
                    <th>Ultimo Trimestre inscrito</th>
                    <th>Tipo de Oferta Presentada</th>
                    <th>Regular/Nuevo Ingreso</th>
		    <th>Sección</th>
                    <th>Dia de Clase</th>
                            
		    <th>Modalidad</th>
                   
                    <th>Opcion</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php if(!empty($listado)):?>
                      <?php foreach($listado as $listado):?>
                  <tr>
                  <td><?php echo $listado->nacionalidad.'-'.$listado->cedula;?></td>
                  <td><?php echo $listado->primer_nombre; ?></td>                    
                    <td><?php echo $listado->segundo_nombre;?></td>
                    <td><?php echo $listado->primer_apellido; ?></td>                    
                    <td><?php echo $listado->segundo_apellido;?></td> 
                  <td><?php echo $listado->programa; ?></td>                    
                    <td><?php echo $listado->trimestre;?></td>
                      <td><?php if (strtoupper($listado->oferta)=='INS') echo '<b>Oferta Especial('.strtoupper($listado->oferta).')</b>'; else echo 'Oferta Regular ('.strtoupper($listado->oferta).')';?></td>
                    <td><?php if($listado->rol_id==5) echo "REGULAR"; if($listado->rol_id==8) echo "NUEVO INGRESO";?></td>
    		    <td><?php echo $listado->secciones;?></td>
                    <td><?php echo $listado->dia;?></td>
                  
                    <td><?php if($listado->modalidad==1)echo "PRESENCIAL";if ($listado->modalidad==2)echo "VIRTUAL";if($listado->modalidad==3)echo "SEMIPRESENCIAL" ?></td>
                  
                    <td><input type="checkbox" name="checks[]" value="<?php echo $listado->id;?>"></td>
                  </tr>
                        <?php endforeach;?>
                  <?php endif;?>        
                  </tbody>     
               
                  <tfoot>
                  
                  <tr>
                  <th>Cédula</th>
                            <th>Primer Nombre</th>
                            <th>Segundo Nombre</th>
                            <th>Primer Apellido</th>  
                            <th>Segundo Apellido</th>  
                    <th>Programa de Postgrado</th>
                   
                    <th>Ultimo Trimestre inscrito</th>
                    <th>Tipo de Oferta Presentada</th>
                    <th>Regular/Nuevo Ingreso</th>
		    <th>Sección</th>
                    <th>Dia de Clase</th>
                            
		    <th>Modalidad</th>
                   
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
