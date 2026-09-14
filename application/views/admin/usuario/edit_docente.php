  <!-- Content Wrapper. Contains page content -->

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
    <!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
       <div class="card">
          
                    <div class="card-header">
                      <h3 class="card-title"><strong>Editar Usuario Docente</strong></h3>
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
                        <!-- Comienzo formulario -->
            <form action="<?php echo base_url()?>admin/usuario/usuario_edit__store_docente" method="POST" name=carga >
                <input type="hidden" name="cod_programa" value="<?php //echo $list_programa->id; ?>"> 
                 <input type="hidden" name="id_usuario" value="<?php echo $list_usuario->id; ?>"> 
                <input type="hidden" name="fecha_registro" value="<?php echo date('d-m-Y H:i:s'); ?>">

                   
                  <div class="form-group">
                    <div class="row">
                    <div class="col-3">
                    <label for="nombres">Nombres</label>
                    </div>
                      <div class="col-5">
                        <input type="text" class="form-control" id="nombres" placeholder=""  name="nombres" onkeyup="javascript:this.value=this.value.toUpperCase();" value="<?php echo $list_usuario->nombres; ?>" required>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="row">
                    <div class="col-3">
                    <label for="apellidos">Apellidos</label>
                    </div>
                      <div class="col-5">
                        <input type="text" class="form-control" id="apellidos" placeholder=""  name="apellidos" onkeyup="javascript:this.value=this.value.toUpperCase();" value="<?php echo $list_usuario->apellidos; ?>" required>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="row">
                    <div class="col-3">
                    <label for="telefono">Telefono</label>
                    </div>
                      <div class="col-5">
                        <input type="text" class="form-control" id="telefono" placeholder="" maxlength="11" name="telefono" onkeypress="return controltag(event)" value="<?php echo $list_usuario->telefono; ?>">
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="row">
                    <div class="col-3">
                    <label for="correo">Correo</label>
                    </div>
                      <div class="col-5">
                        <input type="email" class="form-control" id="correo" placeholder=""  name="correo" onkeyup="javascript:this.value=this.value.toUpperCase();" value="<?php echo $list_usuario->email; ?>" required>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="row">
                    <div class="col-3">
                    <label for="usuario">Usuario</label>
                    </div>
                      <div class="col-5">
                        <input type="text" class="form-control" id="usuario" placeholder=""  name="usuario" readonly onkeyup="javascript:this.value=this.value.toUpperCase();" value="<?php echo $list_usuario->username; ?>" required>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="row">
                    <div class="col-3">
                    <label for="clave">Clave</label>
                    </div>
                      <div class="col-5">
                        <input type="text" class="form-control" id="clave" placeholder=""  name="clave"  required>
                      </div>
                    </div>
                  </div>
                   <div class="form-group row">
                    <label for="rol" class="col-sm-3 col-form-label">Rol</label>
                    <div class="col-sm-2">
                      <select name="rol" class="form-control" readonly >
                      <option value="">Seleccione...</option>
                        <?Php foreach ($list_rol as $list_rol){
                            if($list_rol->id== $list_usuario->rol_id){
                              echo "<option value='".$list_rol->id."' selected>".$list_rol->nombre."</option>";
                                 }else{
                              echo "<option value='".$list_rol->id."'>".$list_rol->nombre."</option>";  
                              }
                           }
                        ?>            
                      </select>
                    </div>
                  </div>
                  
                  <div class="form-group row">
                    <label for="status" class="col-sm-3 col-form-label">Status</label>
                    <div class="col-sm-9">
                      <select class="form-control" name="status">
                          <option value="1">ACTIVO</option>
                          <option value="0">INACTIVO</option>
                        </select>
                    </div>
                  </div>

            <!-- fin formulario-->
           
                  <button type="submit" class="btn btn-primary">Actualizar</button>
                
            </form>
          </div>
                </div><!-- /.card -->


    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

