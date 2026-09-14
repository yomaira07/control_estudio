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
                            <h3 class="card-title">LISTADO GENERAL DE PRE-INSCRITO</h3>
                          </div>
                          
                          <div class="card-body">

                             
                 <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                  	<th>Cedula</th>
                  	<th>Nombres y Apellidos</th>
                    <th>Especialización</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php if(!empty($total_inscritos)):?>
                      <?php foreach($total_inscritos as $total_inscritos):?>
                  <tr>
                  	<td><?php echo $total_inscritos->cedula;?></td>
                    <td><?php echo $total_inscritos->primer_nombre;?> <?php echo $total_inscritos->segundo_nombre;?> <?php echo $total_inscritos->primer_apellido;?> <?php echo $total_inscritos->segundo_apellido;?></td>
                    <td><?php echo $total_inscritos->programa;?></td>
                  </tr>
                        <?php endforeach;?>
                  <?php endif;?>        
                  </tbody>
                  <tfoot>
                  <tr>
                   <th>Cedula</th>
                  	<th>Nombres y Apellidos</th>
                    <th>Especialización</th>
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
