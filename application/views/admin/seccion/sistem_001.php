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
            <h6>Configuracion inicial del condominio <?php echo $this->session->userdata("nombre_condominio") //echo $condominio->nombre; ?></h6>
             <a  type="button" class="btn btn-warning">Paso 1</a> <a type="button" class=" btn btn-danger">Paso 2</a> <a   class="btn btn-danger">Paso 3</a> <a   class="btn btn-danger">Paso 4</a> <a   class="btn btn-danger">Paso 5</a>
             <br>
             <font color="teal">Paso 1:</font> Registro de secciones del condominio.
             <br>
            Las secciones se refieren a Torres, Clusters, Sectores, Calles, entre otras. La idea es diferenciar cada vivienda o unidad. Por ejemplo la vivienda número 101 puede repetirse en varias torres. Por ello necesitamos el nombre de cada sección que en este caso podrían ser Torre A, Torre B, Torre C ... Si tu condominio sólo tiene una sección crea una llamada "General".
            <br>
            <a href="<?php echo base_url()?>dashboard/menu1/<?php echo $this->session->userdata("id_condominio"); ?>" type="button" class="btn btn-default float-right">Siguiente</a>
            <br>
            
            <br>
              <div class="card card-primary card-outline">
                  <div class="card-body">
                      <div class="card">
          
                          <div class="card-header">
                            <h3 class="card-title">Registro de Secciones</h3>
                          </div>

                          <div class="card-body">
                        <!-- Mensaje de Alerta-->
                        <?php  if ($this->session->flashdata("error")): ?>
                        <div class="alert alert-danger alert-dismissible">
                          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                          <p><i class="icon fa fa-ban"></i> <?php echo $this->session->flashdata("error"); ?> </p>
                        </div>
                      <?php endif; ?>

                        <!-- Fin Mensaje de Alerta-->
                        <form action="<?php echo base_url()?>dashboard/seccion_store/<?php echo $this->session->userdata("id_condominio") ?>" method="POST" >
            <div class="row">
              <div class="col-md-6">
                 <div class="form-group">
                    <label for="nombre">Nombre Seccion</label>
                    <input type="text" class="form-control" id="nombre" placeholder="General" name="nombre" value="">
                  </div>
                  <button type="submit" class="btn btn-primary">Crear</button>
              </div>
              <!-- /.col -->
                <div class="col-md-6">  
                 <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Nombre</th>
                    <th>Editar</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php if(!empty($seccion)):?>
                      <?php foreach($seccion as $seccion):?>
                  <tr>
                    <td><?php echo $seccion->nombre;?></td>
                    <td><button type="button" class="btn btn-sm btn-danger">Edito</button></td>
                  </tr> 

                    <?php endforeach;?>
                  <?php endif;?>                  
                  </tbody>

                  <tfoot>
                  <tr>
                    <th>Nombre</th>
                    <th>Editar</th>
                  </tr>
                  </tfoot>
                </table>

                </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
            <!-- /.row -->
           
                  
                
            </form>
          </div>

                              
                      </div><!-- /.card --> 
                  </div><!-- /.card-body -->
              </div><!-- /.card card-primary card-outline -->

          </div><!-- /.card-body -->

        </div><!-- /.card card-primary card-outline -->

      </section><!-- /.section-->
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->