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
             <a  type="button" class="btn btn-success">Paso 1</a> <a type="button" class=" btn btn-warning">Paso 2</a> <a   class="btn btn-danger">Paso 3</a> <a   class="btn btn-danger">Paso 4</a> <a   class="btn btn-danger">Paso 5</a>
             <br>
             <font color="teal">Paso 2:</font>  
             <br>
            Confirma los detalles de tu condominio y si quieres agrega un logo.
            <br>
            <a href="<?php echo base_url()?>dashboard/menu/<?php echo $this->session->userdata("id_condominio"); ?>"  type="button" class="btn btn-default">Anterior</a> <a href="<?php echo base_url()?>dashboard/menu2/<?php echo $this->session->userdata("id_condominio"); ?>" type="button" class="btn btn-default float-right">Siguiente</a>
            <br>
            <br>
              <div class="card card-primary card-outline">
                  <div class="card-body">
                      <div class="card">
          
                          <div class="card-header">
                            <h3 class="card-title">Registro de logo</h3>
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
                        <form action="<?php echo base_url()?>admin/condominio/store" method="POST" >
            <div class="row">
              <div class="col-md-6">
                 <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input type="text" class="form-control" id="nombre" placeholder="Introsduzca nombre del Condominio" name="nombre" value="<?php echo $condominio_edit->nombre;?>">
                  </div>
                  <div class="form-group">
                    <label for="correo">Correo</label>
                    <input type="correo" name="correo" class="form-control" id="correo" placeholder="Introsduzca nombre del Condominio" value="<?php echo $condominio_edit->correo;?>">
                  </div>
                  <div class="form-group">
                    <label for="direccion">Dirección</label>
                    <input type="text" name="direccion" class="form-control" id="direccion" placeholder="Introsduzca dirección del Condominio" value="<?php echo $condominio_edit->direccion;?>">
                  </div>
                  <div class="form-group">
                    <label for="ciudad">Ciudad</label>
                    <input type="text" name="ciudad" class="form-control" id="ciudad" placeholder="Introsduzca Ciudad" value="<?php echo $condominio_edit->ciudad;?>">
                  </div>
                  <div class="form-group">
                    <label for="parroquia">Parroquia</label>
                    <input type="text" name="parroquia" class="form-control" id="parroquia" placeholder="Introsduzca nParroquia" value="<?php echo $condominio_edit->parroquia;?>">
                  </div>
                  
                <div class="form-group">
                  <label>Simbolo de Moneda</label>
                  <select class="form-control select2" style="width: 100%;" name="simbolo_id">
                    <option selected="selected">BsF</option>
                    <option>$</option>
                    
                  </select>
                </div>
              	<div class="form-group">
                    <label for="exampleInputFile">Agregar logo</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                    </div>
                  </div>
                <!-- /.form-group -->
                <!-- /.form-group -->
              </div>
              <!-- /.col -->
              <div class="col-md-6">
                <div class="form-group">
                    <label for="rif">Rif</label>
                    <input type="text" name="rif" class="form-control" value="<?php echo $condominio_edit->rif;?>" id="rif" placeholder="Introduzca rif si posee">
                  </div>
                  <div class="form-group">
                    <label for="nrovivienda">Nro de Unidades</label>
                    <input type="text" name="nrovivienda" class="form-control" id="nrovivienda" value="<?php echo $condominio_edit->nro_unidades;?>" placeholder="Introsduzca la cantidad de unidades del condominio">
                  </div>
                  <div class="form-group">
                    <label for="estado">Estado</label>
                    <input type="text" name="estado" class="form-control" id="estado" value="<?php echo $condominio_edit->estado;?>" placeholder="Introsduzca Estado">
                  </div>
                  <div class="form-group">
                    <label for="municipio">Municipio</label>
                    <input type="text" name="municipio" class="form-control" value="<?php echo $condominio_edit->municipio;?>" id="municipio" placeholder="Introsduzca nombre del Condominio">
                  </div>
                  <div class="form-group">
                    <label for="referencia">Referencia</label>
                    <input type="text" name="referencia" value="<?php echo $condominio_edit->referencia;?>" class="form-control" id="referencia" placeholder="Introsduzca punto de referencia al condominio">
                  </div>
                  <div class="form-group">
                  <label>Formato Moneda Local</label>
                  <select class="form-control select2" style="width: 100%;" name="moneda_id">
                    <option selected="selected">1,000.00</option>
                    <option>1.000,00</option>
                    <option>1,000</option>
                    <option>1.000</option>
                    
                  </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputFile">Agregar icono</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                    </div>
                  </div>
                
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
            <!-- /.row -->
           
                  <button type="submit" class="btn btn-primary">Submit</button>
                
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