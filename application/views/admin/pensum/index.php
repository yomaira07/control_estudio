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
                            <h3 class="card-title">Codificacion de la unidad curricular por programa de postgrado</h3><a href="<?php echo base_url()?>admin/pensum/crear_programa" type="button" class="btn btn-info float-right"><strong>Crear Programa</strong></a>
                          </div>
                          
                          <div class="card-body">

                             
                 <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Nro</th>
                    <th>Postgrado</th>
                    <th>Siglas</th>
                    <th>Opciones</th>
                    
                  </tr>
                  </thead>
                  <tbody>
                    <?php if(!empty($tipo_postgrado)):?>
                      <?php foreach($tipo_postgrado as $tipo_postgrado):?>
                  <tr>
                  	<td><?php echo $tipo_postgrado->id;?></td>
                  	<td><?php echo $tipo_postgrado->nombre.' ('.$tipo_postgrado->modalidad_convocatoria.')';?></td>
                    <td><?php echo $tipo_postgrado->sigla_pg; ?></td>
                    <td><a href="<?php echo base_url()?>admin/pensum/list_pensum/<?php echo $tipo_postgrado->id; ?>" class="btn btn-info btn-xs"><img src='../assets/img/listado.png'></a></td>
                  </tr>
                        <?php endforeach;?>
                  <?php endif;?>        
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Nro</th>
                    <th>Postgrado</th>
                    <th>Siglas</th>
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

