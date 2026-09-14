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
                            <h3 class="card-title">Actividades Academicas Mes de Agosto 2020</h3><a href="<?php echo base_url()?>dashboard01/actividad" type="button" class="btn btn-info float-right"><strong>Crear Actividad</strong></a>
                          </div>
                          
                          <div class="card-body">

                             
                 <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Codigo</th>
                    <th>Nombre</th>
                    <th>Clasificacion</th>
                    <th>Tematica</th>
                    <th>Alcance</th>
                    <th>Tipo Actividad</th>
                    <th>Actuacion</th>
                    <th>Opciones</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php if(!empty($actividad)):?>
                      <?php foreach($actividad as $actividad):?>
                  <tr>
                  	<td><a class="btn btn-info btn-sm" href="#" role="button"><?php echo $actividad->codigo."-".$actividad->anio;?></a></td>
                    <td><?php echo $actividad->nombre;?></td>
                    <td><?php echo $actividad->clasificacion;?></td>
                    <td><?php echo $actividad->tematica; ?></td>
                    <td><?php echo $actividad->alcance; ?></td>
                    <td><?php echo $actividad->tipo_actividad; ?></td>
                    <td><a class="btn btn-info btn-sm" href="<?php echo base_url()?>dashboard02/actuacion/<?php echo $actividad->codigo ?> " role="button">+<?php 
                     $variable = $this->Actuacion_model->contador($actividad->codigo);
                        // echo $variable;        
                    ?></a><?php //echo $propietario->telefono;?></td>
                    <td><a href="<?php //echo base_url()?>dashboard/menu/<?php //echo $condominio->id; ?>" class="btn btn-success btn-xs"><img src='./assets/img/grupo.png'></a></td>
                  </tr>
                        <?php endforeach;?>
                  <?php endif;?>        
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Codigo</th>
                    <th>Nombre</th>
                    <th>Clasificacion</th>
                    <th>Tematica</th>
                    <th>Alcance</th>
                    <th>Tipo Actividad</th>
                    <th>Actuacion</th>
                    <th>Opciones</th>
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
