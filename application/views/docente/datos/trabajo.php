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
                      <h3 class="card-title"><strong>Datos Laborales</strong></h3>
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
            <form action="<?php echo base_url()?>dashboard06/trabajo_store/<?Php echo $this->session->userdata('id'); ?>" method="POST" name=carga >

              <input type="hidden" name="id_usuario" value="<?Php echo $this->session->userdata('id'); ?>">
            <input type="hidden" name="no_encontrado" value="<?php if ($datos_trabajo==false){echo "falso";}else{ echo $datos_trabajo->id;  } 
                        ?>">
            
                   <input type="hidden" name="id_docente" value="<?php if ($datos_docente==false){echo "falso";}else{ echo $datos_docente->id;  }  ?>">
                <input type="hidden" name="fecha_registro" value="<?php echo date('d-m-Y H:i:s'); ?>">

                  
                   <div class="form-group row">
                    <label for="lugar_trabajo" class="col-sm-3 col-form-label" title="-Dato Obligatorio-">(*) Lugar de Trabajo</label>
                    <div class="col-sm-9">
                       <select class="form-control" name="lugar_trabajo" id="lugar_trabajo" required>
                      <option value="">- Seleccione -</option>                                       
                      <?php foreach($lugartrabajo as $lugartrabajo):?>
                      <option value="<?php echo $lugartrabajo->id;?>" 
                      <?php 
                      if( $datos_trabajo->id_lugar_trabajo == $lugartrabajo->id ){
                      echo " selected>";
                      }else{
                      echo ">";
                      } echo $lugartrabajo->lugar_trabajo;?>
                      </option>
                      <?php endforeach; ?>
                      </select>   
                    </div>
                  </div>
                  
                  <div class="form-group row">
                    <label for="cargo_desempena" class="col-sm-3 col-form-label" title="-Dato Obligatorio-">(*) Cargo que Desempeña</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="cargo_desempena" name="cargo_desempena" onkeyup="javascript:this.value=this.value.toUpperCase();"  value="<?php if ($datos_trabajo==false){echo "";}else{ echo $datos_trabajo->cargo;  } 
                        ?>" required> 
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="correo" class="col-sm-3 col-form-label"  >Nombre de la Institución o Entidad de Trabajo</label>
                     <div class="col-sm-9">
                    <input type="text" class="form-control" id="institucion" placeholder="Indicar el nombre de la Institución o Entidad de Trabajo donde desempeña su labor " name="institucion" onkeyup="javascript:this.value=this.value.toUpperCase();" value="<?php if ($datos_trabajo==false){echo "";}else{ echo $datos_trabajo->institucion;  } 
                        ?>" >
                      </div>
                  </div>
                  <div class="form-group">
                     <div class="row">
                    <label class="col-3" for="cod_teltrab" title="-Dato Obligatorio-">Teléfono del Trabajo</label>                   
                      <div class="col-2">
                        <select name="codigo_teltrab" class="form-control"  >
                      <option value="">Seleccione...</option>
                        <?Php foreach ($cod_hab as $cod_hab){
                          if (substr(trim($datos_trabajo->tel_trabajo),0,4)==trim($cod_hab->descripcion)) {
                            $selected=' selected';}else{$selected='';
                          }

                          echo "<option value='".$cod_hab->descripcion."'".$selected.">".$cod_hab->descripcion."</option>";  
                        }
                        ?>
                         <?Php foreach ($cod_cel as $cod_cel){
                          if (substr(trim($datos_trabajo->tel_trabajo),0,4)==trim($cod_cel->descripcion)) {
                            $selected=' selected';}else{$selected='';
                          }

                          echo "<option value='".$cod_cel->descripcion."'".$selected.">".$cod_cel->descripcion."</option>";  
                        }
                        ?>
                      </select>
                      </div>
                      <div class="col-5">
                        <input type="text" class="form-control" id="telefono_teltrab" placeholder="" name="telefono_teltrab" onkeypress="return controltagrequired(event)" maxlength="7" value="<?php if ($datos_trabajo==false){echo "";}else{ echo $tel_trabajo = substr($datos_trabajo->tel_trabajo,4) ;  } 
                        ?>" >
                      </div>
                    </div>
                  </div>

                  <div class="form-group ">
                     <div class="row">
                    <label class="col-3" for="cod_rif" title="-Dato Obligatorio-">(*) N° del Registro de Información Fiscal (R.I.F.) </label>                   
                      <div class="col-2">
                       <select class="form-control" name="cod_rif" required>


                               <option value="">Seleccione...</option>
                         
                        <?Php foreach ($letra_rif as $letra_rif){
                           if ($datos_docente->cod_rif==$letra_rif) {
                            $selected=' selected';}else{$selected='';
                          }
                         

                          echo "<option value='".$letra_rif."'".$selected.">".$letra_rif."</option>";  
                        }
                        ?>



                          
                            </select>
                      </div>
                      <div class="col-5">
                        <input type="text" class="form-control" id="rif" maxlength="9" minlength="9" name="rif" onkeypress="return controltag(event)" value="<?php if ($datos_docente==false){echo "";}else{ echo $datos_docente->rif;  } 
                        ?>" required>
                      </div>
                    </div>
                  </div>
                  
                  

            <!-- fin formulario-->
           
                  <button type="submit" class="btn btn-primary"  title="-Hacer clic para Registrar Datos-">Guardar</button>
                
            </form>
          </div>
          </div>
 
                </div><!-- /.card -->





    </section>
    <!-- /.content -->



  </div>
  <!-- /.content-wrapper -->
