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
             <a  type="button" class="btn btn-success">Paso 1</a> <a type="button" class=" btn btn-success">Paso 2</a> <a   class="btn btn-warning">Paso 3</a> <a   class="btn btn-danger">Paso 4</a> <a   class="btn btn-danger">Paso 5</a>
             <br>
             <font color="teal">Paso 3:</font>  
             <br>
            Registra viviendas y usuarios titulares. Los usuarios titulares son aquellos que tienen derecho a votar y los recibos salen a su nombre. Si necesitas registrarte a ti mismo como residente puedes usar el mismo e-mail que usaste para el registro inicial. Ahora se relacionará también con una vivienda.El único dato indispensable es un nombre o número para la vivienda o unidad. Puedes omitir los demás datos.
            <br>
            <a href="<?php echo base_url()?>dashboard/menu1/<?php echo $this->session->userdata("id_condominio"); ?>"  type="button" class="btn btn-default">Anterior</a> <a href="<?php echo base_url()?>dashboard/menu3/<?php echo $this->session->userdata("id_condominio"); ?>" type="button" class="btn btn-default float-right">Siguiente</a>
            <br> 
            <br>
              <div class="card card-primary card-outline">
                  <div class="card-body">
                      <div class="card">
          
                          <div class="card-header">
                            <h3 class="card-title">Registro nro de vivienda</h3>
                          </div>

                          <div class="card-body">

                             
                 <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Seccion</th>
                    <th>Nro Vivienda</th>
                    <th>Nombres y Apellidos</th>
                    <th>Correo</th>
                    <th>Telefono</th>
                    <th>Editar</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php if(!empty($propietarios)):?>
                      <?php foreach($propietarios as $propietario):?>
                  <tr>
                    <td><?php echo $propietario->seccion_id;?></td>
                    <td><?php echo $propietario->nro_vivienda;?></td>
                    <td><?php echo $propietario->apellidos; ?> <?php echo $propietario->nombres; ?></td>
                    <td><?php echo $propietario->correo; ?></td>
                    <td><?php echo $propietario->telefono;?></td>
                    <td><button type="button" class="btn btn-xs btn-danger">Editar</button></td>
                  </tr> 
                        <?php endforeach;?>
                  <?php endif;?>        
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Seccion</th>
                    <th>Nro Vivienda</th>
                    <th>Nombres y Apellidos</th>
                    <th>Correo</th>
                    <th>Telefono</th>
                    <th>Editar</th>
                  </tr>
                  </tfoot>
                </table>

               <br>
               <h5>Se han registrado 2 de 100 viviendas.</h5> 
                <br>
                 <br>
                        <!-- Mensaje de Alerta-->
                        <?php  if ($this->session->flashdata("error")): ?>
                        <div class="alert alert-danger alert-dismissible">
                          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                          <p><i class="icon fa fa-ban"></i> <?php echo $this->session->flashdata("error"); ?> </p>
                        </div>
                      <?php endif; ?>
                        <!-- Fin Mensaje de Alerta-->
                         <form action="<?php echo base_url()?>dashboard/propietario_store/<?php echo $this->session->userdata("id_condominio") ?>" method="POST" >
            <div class="row">
              <div class="col-md-6">
                 <div class="form-group">
                    <label for="nro_vivienda">Nro Vivienda</label>
                    <input type="text" class="form-control" id="nro_vivienda" placeholder="A-21" name="nro_vivienda" >
                  </div>
                  <div class="form-group">
                    <label for="correo">Correo</label>
                    <input type="text" class="form-control" id="correo" placeholder="sistemayamil@gmail.com" name="correo" >
                  </div>
                  <div class="form-group">
                    <label for="apellidos">Apellidos</label>
                    <input type="text" class="form-control" id="apellidos" placeholder="" name="apellidos" >
                  </div>
                  <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1" name="checkbox" value="1">
                    <label class="form-check-label" for="exampleCheck1">Pertenece al Condominio (Asministrador,Tesorero,Secretario)</label>
                  </div>
                  <div class="form-group">
                    <input type="text" class="form-control" id="cargo"  name="cargo">
                  </div>
                  
              </div>
              <!-- /.col -->
                <div class="col-md-6">  
                <div class="form-group">
                    <label for="categoria">Seccion:</label>
                                <select name="seccion" id="seccion" class="form-control">
                                    <?php foreach($combo_seccion as $combo_seccion):?>
                                        <option value="<?php echo $combo_seccion->id?>"><?php echo $combo_seccion->nombre;?></option>
                                    <?php endforeach;?>
                                </select>
                  </div>
                  <div class="form-group">
                    <label for="nombres">Nombres</label>
                    <input type="text" class="form-control" id="nombres" placeholder="" name="nombres" >
                  </div>
                  <div class="form-group">
                    <label for="telefono">Telefono</label>
                    <input type="text" class="form-control" id="telefono" placeholder="0426-1234567" name="telefono" >
                  </div>
                  <div class="form-group">
                    <label for="comentario">Comentario</label>
                    <input type="text" class="form-control" id="comentario"  name="comentario" >
                  </div>

                </div>
                <button type="submit" class="btn btn-primary">Crear</button>
                
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