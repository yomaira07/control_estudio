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
                            <h3 class="card-title">OFERTA ACADEMICA</h3><a href="<?php echo base_url()?>admin/oferta_academica/crear" type="button" class="btn btn-info float-right"><strong>Crear Oferta Academica</strong></a>
                          </div>
                           <div class="card-header">
                           
                            <a title="Descargar Oferta Académica"   class="btn btn-light float-right" href="<?php  echo base_url()?>admin/oferta_academica/dExcel" target="_blank"><img src="<?php echo base_url(); ?>assets/img/excel.jpg"  alt="EXCEL" style="width: 10mm; height: 10mm; margin: 0;" /> Descargar</a>
                          </div>
                          <div class="card-body">

                             
                 <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Período</th>
                    <th>Programa</th>
                    <th>Código</th>
                    <th>Unidad Curricular</th>
                    <th>Trimestre</th>
         	<th>Sección</th>
                    <th>Modalidad</th>
                    <th>Día de Clase</th>
                    <th>Horario</th>
                    <th>Profesor</th>
                    <th>Opción</th>
                  </tr>
                  
                  </thead>
                  <tbody>
                    <?php if(!empty($oferta_academ)):?>
                      <?php foreach($oferta_academ as $oferta_academ):?>
                  <tr>
                    <td><?php echo $oferta_academ->periodos;?></td>
                    <td><?php echo $oferta_academ->programas;?></td>
                    <td><?php echo $oferta_academ->codigo; ?></td>
                    <td><?php echo $oferta_academ->pensums; ?></td>
                    <td><?php echo $oferta_academ->trimestre; ?></td>
			<td><?php echo $oferta_academ->secc; ?></td>
                    <td><?php if($oferta_academ->modalidad==1) echo 'PRESENCIAL'; elseif($oferta_academ->modalidad==2) echo 'A DISTANCIA';elseif($oferta_academ->modalidad==3) echo 'SEMIPRESENCIAL'?></td>
		    <td><?php echo $oferta_academ->dia_clase; ?></td>
                    <td><?php echo $oferta_academ->horario; ?></td>
                    <td><?php echo $oferta_academ->docente_primernom; ?>  <?php echo $oferta_academ->docente_primerape; ?></td>
                    <td><a href="<?php echo base_url()?>admin/oferta_academica/editar/<?php echo $oferta_academ->id; ?>" ><img src="../assets/img/icons8-Edit Property.png" ></a></td>
                  </tr>
                        <?php endforeach;?>
                  <?php endif;?>        
                  </tbody>
                  <tfoot>
		  <tr>
                    <th>Período</th>
                    <th>Programa</th>
                    <th>Código</th>
                    <th>Unidad Curricular</th>
                    <th>Trimestre</th>
<th>Sección</th>
   <th>Modalidad</th>
                    <th>Día de Clase</th>
                    <th>Horario</th>
                    <th>Profesor</th>
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
