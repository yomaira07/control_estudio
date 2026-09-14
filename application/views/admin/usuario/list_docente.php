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
                       <!--     <h3 class="card-title">Listado de Usuario</h3><a href="<?php echo base_url()?>admin/usuario/crear/" type="button" class="btn btn-info float-right"><strong>Crear Nuevo Usuario</strong></a>-->
                          </div>
                          
                          <div class="card-body">

                             
                 <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Nombres</th>
                    <th>Apellidos</th>
                    <th>Correo</th>
                    <th>Telefono</th>
                    <th>Usuario</th>
                    <th>Rol</th>
                    <th>Status</th>
                    <th>Opcion</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php if(!empty($list_usuario)):?>
                      <?php foreach($list_usuario as $list_usuario):?>
                  <tr>
                    <td><?php echo $list_usuario->nombres;?></td>
                    <td><?php echo $list_usuario->apellidos; ?></td>
                    <td><?php echo $list_usuario->email; ?></td>
                    <td><?php echo $list_usuario->telefono; ?></td>
                    <td><?php echo $list_usuario->username; ?></td>
                    <td><?php echo $list_usuario->rol; ?></td>
                    <td><?php echo $list_usuario->estado; ?></td>
                    <td><a href="<?php echo base_url()?>admin/usuario/editar_docente/<?php echo $list_usuario->id; ?>" ><img src="../../assets/img/icons8-Edit Property.png" ></a></td>
                  </tr>
                        <?php endforeach;?>
                  <?php endif;?>        
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Nombres</th>
                    <th>Apellidos</th>
                    <th>Correo</th>
                    <th>Telefono</th>
                    <th>Username</th>
                    <th>Rol</th>
                    <th>Status</th>
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
