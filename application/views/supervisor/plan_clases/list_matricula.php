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
                            <h3 class="card-title">Matrícula Estudiantil del Período Academico <b><?php echo $periodo->nombre;?></h3></b>
                          </div>
                          <div class="card-header" align="right">

<a title="Descargar listado a formato Excel(.xls)" href="<?php  echo base_url()?>dashboard03/descarga_excel_anterior/<?php echo $periodo->id;?>" target="_blank"><img src="<?php echo base_url(); ?>assets/img/excel.jpg"  alt="Excel" style="width: 10mm; height: 10mm; margin: 0;" /></a>
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
                      <th>Trimestre Inscrito</th>
                      <th>Sección</th>
                      <th>Dia de Clase</th>
                      <th>Modalidad</th>              
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
                    <td><?php echo $listado->secciones;?></td>
                    <td><?php echo $listado->dia;?></td>
                    <td><?php if($listado->modalidad==1)echo "PRESENCIAL";if ($listado->modalidad==2)echo "VIRTUAL";if($listado->modalidad==3)echo "SEMIPRESENCIAL" ?></td>                   
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
                      <th>Trimestre Inscrito</th>
                      <th>Sección</th>
                      <th>Dia de Clase</th>
                      <th>Modalidad</th>      
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
