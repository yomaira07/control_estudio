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
                            <h3 class="card-title">PENSUM DE ESTUDIO DE <?php echo $list_programa->nombre;?></h3><a href="<?php echo base_url()?>admin/pensum/crear/<?php echo $list_programa->id;?>" type="button" class="btn btn-info float-right"><strong>Crear Unidad Curricular</strong></a>
                          </div>
                          
                          <div class="card-body">

                             
                 <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Trimestre</th>
                    <th>Eje</th>
                    <th>Unidad Curricular</th>
                    <th>Código</th>                
                    <th>Unidad Crédito</th>
                    <th>Horas</th>
                    <th>Opción</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php if(!empty($lista_pensum)):?>
                      <?php foreach($lista_pensum as $lista_pensum):?>
                  <tr>
                    <td><?php echo $lista_pensum->des_trimestre;?></td>
                    <td><?php echo $lista_pensum->des_eje; ?></td>
                    <td><?php echo $lista_pensum->nombre; ?></td>
                    <td><?php echo $lista_pensum->codigo; ?></td>
               
                    <td><?php echo $lista_pensum->unidad_curricular; ?></td>
                    <td><?php echo $lista_pensum->horas; ?></td>
                    <td><a href="<?php echo base_url()?>admin/pensum/edit/<?php echo $lista_pensum->id; ?>/<?php echo $list_programa->id; ?>" class="btn btn-info btn-xs"><img src='../../../assets/img/listado.png'></a></td>
                  </tr>
                        <?php endforeach;?>
                  <?php endif;?>        
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Trimestre</th>
                    <th>Eje</th>
                    <th>Unidad Curricular</th>
                    <th>Codigo</th>
                    <th>UC</th>
                    <th>Horas</th>
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
