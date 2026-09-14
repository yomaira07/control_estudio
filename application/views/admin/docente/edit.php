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
                      <h3 class="card-title"><strong>Editar docente</strong></h3>
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
            <form action="<?php echo base_url()?>admin/docente/docente_act_store" method="POST" name=carga >
              <input type="hidden" name="id_usuario" value="<?Php echo $this->session->userdata('id'); ?>">
              <input type="hidden" name="id_docente" value="<?php echo $data_docente->id; ?>">
                <input type="hidden" name="cod_programa" value="<?php //echo $list_programa->id; ?>">  
                <input type="hidden" name="fecha_registro" value="<?php echo date('d-m-Y H:i:s'); ?>">

                   <div class="form-group">
                    <div class="row">
                    <div class="col-3">
                    <label for="cedula">Cedula</label>
                    </div>
                      <div class="col-1">
                        <select class="form-control" name="nacionalidad">
                            <option value="V" <?php  if($data_docente->nacionalidad=='V') echo " selected";?> >V</option>
                              <option value="E" <?php  if($data_docente->nacionalidad=='E') echo " selected";?> >E</option>
                        </select>
                      </div>
                      <div class="col-5">
                        <input type="text" class="form-control" id="cedula" placeholder="" maxlength="8" name="cedula" onkeypress="return controltag(event)" value="<?php echo $data_docente->cedula; ?>" required>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="row">
                    <div class="col-3">
                    <label for="etiqueta_cel">Rif</label>
                    </div>
                      <div class="col-1">
                        <select class="form-control" name="cod_rif">
                          <option value="J">J</option>
                          <option value="G">G</option>
                        </select>
                      </div>
                      <div class="col-5">
                        <input type="text" class="form-control" id="rif" placeholder="" maxlength="9" name="rif" onkeypress="return controltag(event)" value="<?php echo $data_docente->rif; ?>">
                      </div>
                    </div>
                  </div>
                   <div class="form-group row">
                    <label for="primer_nombre" class="col-sm-3 col-form-label"title="-Dato Obligatorio-">(*) Primer Nombre</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="primer_nombre" name="primer_nombre" 
                       required="true" onkeyup="javascript:this.value=this.value.toUpperCase();" value="<?php echo $data_docente->primer_nombre; ?>" required>
                    </div>
                  </div>
                   <div class="form-group row">
                    <label for="segundo_nombre" class="col-sm-3 col-form-label">Segundo Nombre</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="segundo_nombre" name="segundo_nombre" 
                        onkeyup="javascript:this.value=this.value.toUpperCase();" value="<?php echo $data_docente->segundo_nombre; ?> ">
                    </div>
                  </div>
                   <div class="form-group row">
                    <label for="primer_apellido" class="col-sm-3 col-form-label"title="-Dato Obligatorio-">(*) Primer Apellido</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="primer_apellido" name="primer_apellido" 
                       required="true" onkeyup="javascript:this.value=this.value.toUpperCase();" value="<?php echo $data_docente->primer_apellido; ?>" required>
                    </div>
                  </div>
                   <div class="form-group row">
                    <label for="segundo_apellido" class="col-sm-3 col-form-label">Segundo Apellido</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="segundo_apellido" name="segundo_apellido" 
                        onkeyup="javascript:this.value=this.value.toUpperCase();" value="<?php echo $data_docente->segundo_apellido; ?>">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="sexo" class="col-sm-3 col-form-label"title="-Dato Obligatorio-">(*) Sexo</label>
                    <div class="col-sm-2">
                      <select name="sexo" class="form-control" required>
                      <option value="">Seleccione...</option>
                        <?Php foreach ($lista_sexo as $lista_sexo){
                        	if($lista_sexo->id== $data_docente->id_sexo){
                        	echo "<option value='".$lista_sexo->id."' selected>".$lista_sexo->descripcion."</option>";
                             }else{
                          		echo "<option value='".$lista_sexo->id."'>".$lista_sexo->descripcion."</option>";
                          	}  
                        }
                        ?>
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="row">
                    <div class="col-3">
                    <label for="etiqueta_cel">Telefono Celular</label>
                    </div>
                      <div class="col-2">
                        <select name="codigo_telcel" class="form-control" required>
                      <option value="" >Seleccione...</option>
                        <?Php foreach ($cod_cel as $cod_cel){
                        	if($cod_cel->descripcion == substr($data_docente->telefono_cel, 0, -7) ){
                        	echo "<option value='".$cod_cel->descripcion."' selected>".$cod_cel->descripcion."</option>";
                             }else{
                         	 echo "<option value='".$cod_cel->descripcion."'>".$cod_cel->descripcion."</option>";  
                     		 }
                        }
                        ?>
                      </select>
                      </div>
                      <div class="col-5">
                        <input type="text" class="form-control" id="telefono_cel" placeholder="" name="telefono_cel" onkeypress="return controltag(event)" value="<?php echo substr($data_docente->telefono_cel,4); ?>" >
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="row">
                    <div class="col-3">
                    <label for="etiqueta_hab">Telefono Habitacion</label>
                    </div>
                      <div class="col-2">
                        <select name="codigo_telhab" class="form-control">
                      <option value="">Seleccione...</option>
                        <?Php foreach ($cod_hab as $cod_hab){
                        	if($cod_hab->descripcion== substr($data_docente->telefono_hab,7)){
                        	echo "<option value='".$cod_hab->descripcion."' selected>".$cod_hab->descripcion."</option>";
                             }else{
                         	 echo "<option value='".$cod_hab->descripcion."'>".$cod_hab->descripcion."</option>";  
                          	}
                        }
                        ?>
                      </select>
                      </div>
                      <div class="col-5">
                        <input type="text" class="form-control" id="telefono_hab" placeholder="" name="telefono_hab" onkeypress="return controltag(event)" value="<?php echo substr($data_docente->telefono_hab,4); ?>">
                      </div>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="correo" class="col-sm-3 col-form-label">Correo</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="correo" name="correo"  required="true" onkeyup="javascript:this.value=this.value.toUpperCase();" value="<?php echo $data_docente->correo; ?>" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="row">
                    <div class="col-3">
                    <label for="nivel_academico">Nivel Academico</label>
                    </div>
                      <div class="col-2">
                        <select name="nivel_academico" class="form-control" >
                      <option value="">Seleccione...</option>
                        <?Php foreach ($nivel_academico as $nivel_academico){
                        	if($nivel_academico->id== $data_docente->id_nivel_academico){
                        	echo "<option value='".$nivel_academico->id."' selected>".$nivel_academico->descripcion."</option>";
                             }else{
                          	echo "<option value='".$nivel_academico->id."'>".$nivel_academico->descripcion."</option>";  
                      		}
                        }
                        ?>
                      </select>
                      </div>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="status" class="col-sm-3 col-form-label"title="-Dato Obligatorio-">(*) Status</label>
                    <div class="col-sm-9">
                      <select class="form-control" name="status">
                          <option value="1" <?php if($data_docente->status==1) echo "selected";?>>ACTIVO</option>
                          <option value="2" <?php if($data_docente->status==2) echo "selected";?>>INACTIVO</option>
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
