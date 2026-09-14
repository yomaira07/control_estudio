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
                      <h3 class="card-title"><strong>Crear nuevo Usuario</strong></h3>
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
            <form action="<?php echo base_url()?>admin/usuario/usuario_store" method="POST" name=carga >
              <input type="hidden" name="id_usuario" value="<?Php echo $this->session->userdata('id'); ?>">
                <input type="hidden" name="cod_programa" value="<?php //echo $list_programa->id; ?>">  
                <input type="hidden" name="fecha_registro" value="<?php echo date('d-m-Y H:i:s'); ?>">

                   
                  <div class="form-group">
                    <div class="row">
                    <div class="col-3">
                    <label for="nombres">Nombres</label>
                    </div>
                      <div class="col-5">
                        <input type="text" class="form-control" id="nombres" placeholder=""  name="nombres" onkeyup="javascript:this.value=this.value.toUpperCase();" required>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="row">
                    <div class="col-3">
                    <label for="apellidos">Apellidos</label>
                    </div>
                      <div class="col-5">
                        <input type="text" class="form-control" id="apellidos" placeholder=""  name="apellidos" onkeyup="javascript:this.value=this.value.toUpperCase();" required>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="row">
                    <div class="col-3">
                    <label for="telefono">Telefono</label>
                    </div>
                      <div class="col-5">
                        <input type="text" class="form-control" id="telefono" placeholder="" maxlength="11" name="telefono" onkeypress="return controltag(event)">
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="row">
                    <div class="col-3">
                    <label for="correo">Correo</label>
                    </div>
                      <div class="col-5">
                        <input type="email" class="form-control" id="correo" placeholder=""  name="correo" onkeyup="javascript:this.value=this.value.toUpperCase();" required>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="row">
                    <div class="col-3">
                    <label for="usuario">Usuario</label>
                    </div>
                      <div class="col-5">
                        <input type="text" class="form-control" id="usuario" placeholder=""  name="usuario" onkeyup="javascript:this.value=this.value.toUpperCase();" required>
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
                      <select name="rol" class="form-control" required>
                      <option value="">Seleccione...</option>
                        <?Php foreach ($list_rol as $list_rol){
                          echo "<option value='".$list_rol->id."'>".$list_rol->nombre."</option>";  
                           }
                        ?>            
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="row">
                    <div class="col-3">
                    <label for="clave">Trimestre</label>
                    </div>
                      <div class="col-5">
                        <input type="text" class="form-control" id="trimestre" placeholder="Ej. I TRIMESTRE,II TRIMESTRE,V TRIMESTRE, SEPARAR CON COMAS LOS TRIMESTRES A CURSAR POR EL ESTUDIANTE"  name="trimestre" onkeyup="javascript:this.value=this.value.toUpperCase();" required>
                      </div>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="rol" class="col-sm-3 col-form-label">Modalidad</label>
                    <div class="col-sm-2">
                      <select name="modalidad" class="form-control" required>
                      <option value="NULL">Seleccione...</option>
                      <option value='1'>PRESENCIAL</option>  
                      <option value='2'>A DISTANCIA</option>  
                      <option value='1,2'>AMBAS</option>                                  
                      </select>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="rol" class="col-sm-3 col-form-label">Tiempo de preinscripcion</label>
                    <div class="col-sm-2">
                      <select name="preinscripcion" class="form-control" required>
                      <option value="null">Seleccione...</option>
                        <?Php foreach ($list_preinscripcion as $list_preinscripcion){ echo $list_preinscripcion->fecha_inicio;
                          echo "<option value='".$list_preinscripcion->id."'> Desde: ".$list_preinscripcion->fecha_inicio." Hasta: ".$list_preinscripcion->fecha_fin."</option>";  
                           }
                        ?>            
                      </select>
                    </div>
                  </div>
                  <div class="form-group" >
                    <div class="row">
                      <div class="col-3" align="center">
                     <label for="programa" >Programa de Postgrado en que desea participar</label>
                     </div>
                     <div class="col-8"   >
                     <?Php foreach ($list_programa as $list_programa){
                        echo '<div required>
                        <td align="center" id="programas">
                        <input type="checkbox" name="checks[]" value="'.$list_programa->id.'" >  '.$list_programa->nombre.'  </td></div>';
                     }
                        ?>  
                          <input type="hidden" name="str" id="str">   
                     </div>   
                  </div>
                 </div>
                  <div class="form-group row">
                    <label for="rol" class="col-sm-3 col-form-label">Ver Planilla Inscripción Trimestre Anteriores</label>
                    <div class="col-sm-2">
                      <select name="planilla" class="form-control" required title="Si selecciona la opción 'SI' el estudiante no podrá visualizar el proceso de inscripcion en vigencia.">
                      <option value="NULL">Seleccione...</option>
                      <option value='1'>SI</option>  
                      <option value='0'>NO</option>  
                                            
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
           
                  <button type="submit" class="btn btn-primary">Cargar</button>
                
            </form>
          </div>
                </div><!-- /.card -->


    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
