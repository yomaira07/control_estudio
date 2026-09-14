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
                             <?php if(!empty($periodo)):?>
                                <?php foreach($periodo as $periodo):?>
                                     <div class="alert alert-info" role="alert">LISTADO GENERAL DE ESTUDIANTES REGULARES INSCRITOS DEL PERIODO <?php echo strtoupper($periodo->nombre); ?></div>
                                     <input type="hidden" name="periodo" id ="periodo" value="<?php echo $periodo->id;?>">
                               <?php endforeach;?>
                            <?php endif;?>        
                          </div>
                          <div class="card-header" align="right">
Listado de estudiantes Inscritos 
                                   <a title="Descargar a Excel" href="<?php  echo base_url()?>consultas/dExcel_inscritos/<?php echo $_POST['periodo'];?>" target="_blank"><img src="<?php echo base_url(); ?>assets/img/excel.jpg"  alt="Excel" style="width: 10mm; height: 10mm; margin: 0;" /></a>
                          </div>
 <div class="card-header" align="right">
Listado de Inscritos por Unidades Curriculares
                                   <a title="Descargar a Excel" href="<?php  echo base_url()?>consultas/dExcel_inscritos_uc_anteriores/<?php echo $_POST['periodo'];?>" target="_blank"><img src="<?php echo base_url(); ?>assets/img/excel.jpg"  alt="Excel" style="width: 10mm; height: 10mm; margin: 0;" /></a>
                          </div>
                          
                          <div class="card-body">

                          <div class="card-header" align="right">
Matrícula Estidiantil (modalidad y secciones)
                                   <a title="Descargar a Excel" href="<?php  echo base_url()?>dashboard03/periodo_anterior/<?php echo $_POST['periodo'];?>" target="_blank"><img src="<?php echo base_url(); ?>assets/img/excel.jpg"  alt="Excel" style="width: 10mm; height: 10mm; margin: 0;" /></a>
                          </div>
                          
                          <div class="card-body">

                             
                 <table id="example1" class="table table-bordered table-striped"> 
                  <thead>
                  <tr>
                  	<th>Cedula</th>
                  	<th>Nombres y Apellidos</th>
                    <th>Especialización</th>
                    <th>Descargar Planilla</th>	
                  </tr>
                  </thead>
                  <tbody>
                    <?php if(!empty($total_inscritos)):?>
                      <?php foreach($total_inscritos as $total_inscritos):?>
                  <tr>
                  	<td><?php echo $total_inscritos->nacionalidad;echo $total_inscritos->cedula;?></td>
                    <td><?php echo $total_inscritos->primer_nombre;?> <?php echo $total_inscritos->segundo_nombre;?> <?php echo $total_inscritos->primer_apellido;?> <?php echo $total_inscritos->segundo_apellido;?></td>
                    <td><?php echo $total_inscritos->programa;?></td>
                     <td><a href="<?php  echo base_url()?>consultas/planilla/<?php  echo $total_inscritos->id_usuario;?>/<?php  echo $total_inscritos->id_programa;?>/<?php  echo $periodo->id;?>" class="btn btn-warning">Imprimir</a><br>
                    <?php if($periodo->id>=17): ?><div><a href="<?php  echo base_url()?>consultas/clausula_online/<?php echo $total_inscritos->id_usuario;?>/<?php  echo $periodo->id;?>" class="btn btn-primary">Ver Clausula</a></div><?php endif;?></td>
                    </td>
                  </tr>
                        <?php endforeach;?>
                  <?php endif;?>        
                  </tbody>
                  <tfoot>
                  <tr>
                   <th>Cedula</th>
                  	<th>Nombres y Apellidos</th>
                    <th>Especialización</th>
					<th>Descargar Planilla</th>	
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

