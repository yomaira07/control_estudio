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
             <a  type="button" class="btn btn-success">Paso 1</a> <a type="button" class=" btn btn-success">Paso 2</a> <a   class="btn btn-success">Paso 3</a> <a   class="btn btn-warning">Paso 4</a> <a   class="btn btn-danger">Paso 5</a>
             <br>
             <font color="teal">Paso 4:</font>  
             <br>
            Registra la proporción en la que cada unidad es dueña del condominio. Las proporciones sirven para determinar el porcentaje en que cada usuario es dueño del indiviso del condominio. Las cuotas condominales y el valor de cada voto depende de esta proporción. Si no sabes cuales son las proporciones o en tu condominio no las manejan simplemente presiona la siguiente pestaña.
            <br>
            <a href="<?php echo base_url()?>dashboard/menu2/<?php echo $this->session->userdata("id_condominio"); ?>"  type="button" class="btn btn-default">Anterior</a> <a href="<?php echo base_url()?>dashboard/menu4/<?php echo $this->session->userdata("id_condominio"); ?>" type="button" class="btn btn-default float-right">Siguiente</a>
            <br><br>
              <div class="card card-primary card-outline">
                  <div class="card-body">
                      <div class="card">
          
                          <div class="card-header">
                            <h3 class="card-title">Registro nro de porción</h3>
                          </div>

                          <div class="card-body">

                             
                 <table id="example" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Nro Vivienda</th>
                    <th>Porcion</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php if(!empty($list_propietarios)):?>
                      <?php foreach($list_propietarios as $list_propietario):?>
                  <tr>
                    <td><?php echo $list_propietario->nro_vivienda;?></td>
                    <td><input type="" name="porcion01" onkeyup="sumar();" class="monto"></td>
                  </tr> 
              

                  <?php endforeach;?>
                  <?php endif;?>                               
                  </tbody>
                  <tfoot>
                  <tr>
                    <th></th>
                    <th> <div>
                 <div class="form-group">

                  <span>Total de la porcion: </span><span id="spTotal"></span>
                  </div>                  
              </div></th>
                  </tr>
                  </tfoot>
                </table>

               
                <br>
                        <!-- Mensaje de Alerta-->
                        <?php  if ($this->session->flashdata("error")): ?>
                        <div class="alert alert-danger alert-dismissible">
                          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                          <p><i class="icon fa fa-ban"></i> <?php echo $this->session->flashdata("error"); ?> </p>
                        </div>
                      <?php endif; ?>
                        <!-- Fin Mensaje de Alerta-->
                         <button>Cargar Porciones</button>
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