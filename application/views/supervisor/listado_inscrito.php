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
			 <div class="card-header" align="right">
                           
                            <span class="card-body" ><b><font color="blue">Importante:</font></b> El archivo excel muestra todos  los inscritos <br>  y sus distintas especialidades o postgrados aprobadas y revisadas académicamente</span>
                                 <a title="Descargar listado a formato Excel(.xls)" href="<?php  echo base_url()?>dashboard05/dExcel_inscritos_uc" target="_blank"><img src="<?php echo base_url(); ?>assets/img/excel.jpg"  alt="Excel" style="width: 10mm; height: 10mm; margin: 0;" /></a>
                          </div>
          
                          <div class="card-header">
                            <h3 class="card-title">LISTADO DE INSCRITO POR OFERTA ACADEMICA</h3>
                          </div>
                          
                          <div class="card-body">

                             
                 <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                  	<th>Periodo</th>
                    <th>Programa</th>
                    <th>Código</th>
                    <th>Unidad Curricular</th>
                     <th>Modalidad</th>
                      <th>Docente</th>
  <th>Sección</th>
                    <th>Nro Inscritos</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php if(!empty($inscritos)):?>
                      <?php foreach($inscritos as $inscritos):?>
                  <tr>
                    <td><?php echo $inscritos->periodo;?></td>
                    <td><?php echo $inscritos->programa;?></td>
                    <td><?php echo $inscritos->codigo; ?></td>
                    <td><?php echo $inscritos->unidad_curricular; ?></td>
                      <td><?php if( $inscritos->modalidad==1)echo "PRESENCIAL"; if( $inscritos->modalidad==2)echo "VIRTUAL"; if( $inscritos->modalidad==3)echo "SEMIPRESENCIAL";   ?></td>
                      <td><?php echo $inscritos->docente; ?></td>
<td><?php echo $inscritos->secc; ?></td>
                    <td><a href="<?php echo base_url()?>dashboard05/listados_inscritos/<?php echo $inscritos->id_oferta_academica;?>" class="btn btn-warning"><?php echo $inscritos->total; ?></a></td>
                  </tr>
                        <?php endforeach;?>
                  <?php endif;?>        
                  </tbody>
                  <tfoot>
                  <tr>
                   <th>periodo</th>
                    <th>Programa</th>
                    <th>Código</th>
                    <th>Unidad Curricular</th>
                       <th>Modalidad</th>
                      <th>Docente</th>
  <th>Sección</th>
                    <th>Nro Inscritos</th>
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
