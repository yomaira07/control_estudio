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
                      <h3 class="card-title"><strong>Dirección de Domicilio del Aspirante</strong></h3>
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
            <form action="<?php echo base_url()?>dashboard08/direccion_store/<?Php echo $this->session->userdata('id'); ?>" method="POST" name=carga >

              <input type="hidden" name="id_usuario" value="<?Php echo $this->session->userdata('id'); ?>">
            <input type="hidden" name="no_encontrado" value="<?php if ($datos_direccion==false){echo "falso";}else{ echo $datos_direccion->id;  } 
                        ?>">
                  
                <input type="hidden" name="fecha_registro" value="<?php echo date('d-m-Y H:i:s'); ?>">

                  
                   <div class="form-group row">
                    <label for="comboestado" class="col-sm-3 col-form-label" title="-Dato Obligatorio-">(*)Estado</label>
                    <div class="col-sm-6">
                      <select name="comboestado" class="form-control" id="comboestado" required>
                      <option value="">Seleccione...</option>
                        <?Php  foreach ($combo_estado as $combo_estado){
                         if($datos_direccion->id_estado==$combo_estado->id){
                          echo "<option value='".$combo_estado->id."' selected>".$combo_estado->estado."</option>";  
                        }else{ 
                          echo "<option value='".$combo_estado->id."' >".$combo_estado->estado."</option>";  
                        }

                        }
                        ?>
                      </select>
                    </div>
                  </div>
                   <div class="form-group row">
                    <label for="combomunicipio" class="col-sm-3 col-form-label" title="-Dato Obligatorio-">(*) Municipio</label>
                    <div class="col-sm-6">
                      
                      <select name="combomunicipio" id="combomunicipio" class="form-control" required>
                      
                      <option value="">Seleccione...</option>
                      <?php 
                       foreach ($combo_municipio as $combo_municipio){ 
                        if ($datos_direccion->id_municipio == $combo_municipio->id)
                       echo "<option value='".$datos_direccion->id_municipio."' selected>".$combo_municipio->municipio."</option>";
                       }  ?>
                      </select>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="comboparroquia" class="col-sm-3 col-form-label" title="-Dato Obligatorio-">(*) Parroquia</label>
                    <div class="col-sm-6">
                      <select name="comboparroquia" id="comboparroquia" class="form-control" required>
                      <option value="">Seleccione...</option>
                      <?php 
                       foreach ($combo_parroquia as $combo_parroquia){ 
                        if ($datos_direccion->id_parroquia == $combo_parroquia->id)
                       echo "<option value='".$datos_direccion->id_parroquia."' selected>".$combo_parroquia->parroquia."</option>";
                       }  ?>
                      </select>
                    </div>
                  </div>
                  <div class="form-group row ">
                  
                    <label for="domicilio" class="col-sm-3 col-form-label"  title="-Dato Obligatorio-">(*) Dirección de Habitación (detallada)</label>
                    <div class="col-sm-6">
                    <input type="text" class="form-control" id="domicilio"  placeholder="Indicar la dirección de habitación completo y detallada" name="domicilio" onkeyup="javascript:this.value=this.value.toUpperCase();" value="<?php if ($datos_direccion==false){echo "";}else{ echo $datos_direccion->domicilio;  } 
                        ?>" required>
                  
                        </div>
                  </div>
               
                    <!-- fin formulario-->
           
                  <button type="submit" class="btn btn-primary" title="-Hacer clic para Registrar Datos-">Guardar</button>
              

            </form>
   <br> <hr>
 <span ><b>(*) Dato Obligatorio</b></span>  
          </div>
                </div><!-- /.card -->





    </section>
    <!-- /.content -->



  </div>
  <!-- /.content-wrapper -->
