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
                      <h3 class="card-title"><strong>Datos Personales del Docente
                      </strong></h3>

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
                <form action="<?php echo base_url()?>dashboard06/actualizar/<?Php echo $datos_docente->id; ?>" method="POST" >
                  <input type="hidden" name="id_usuario" value="<?Php echo $this->session->userdata('id'); ?>">
                  <input type="hidden" name="id_docente" value="<?php if ($datos_docente==false){echo "falso";}else{ echo $datos_docente->id;  } 
                        ?>">
                 <input type="hidden" name="no_encontrado" value="<?php if ($datos_docente==false){echo "falso";}else{ echo $datos_docente->id;  } 
                        ?>"> 
                <input type="hidden" name="fecha_actualizacion" value="<?php echo date('d-m-Y H:i:s'); ?>">
            <div class="row">
              <div class="col-md-6">
                 <div class="form-group">
                    <label for="primernombre" title="-Dato Obligatorio-">(*) Primer Nombre</label>
                    <input type="text" class="form-control" id="primer_nombre" placeholder="Primer Nombre" name="primer_nombre" onkeyup="javascript:this.value=this.value.toUpperCase();" value="<?php if ($datos_docente==false){echo "";}else{ echo $datos_docente->primer_nombre;  } 
                        ?>" required></div>
                  <div class="form-group">
                    <label for="primerapellido" title="-Dato Obligatorio-">(*) Primer Apellido</label>
                    <input type="text" class="form-control" id="primer_apellido" placeholder="Primer Apellido" name="primer_apellido"  onkeyup="javascript:this.value=this.value.toUpperCase();" value="<?php if ($datos_docente==false){echo "";}else{ echo $datos_docente->primer_apellido;  } 
                        ?>" required>
                  </div>
                  <div class="form-group">
                    <label for="cedula" title="-Dato Obligatorio-">(*) Cedula </label>
                    <div class="row"> 
                      <div class="col-2">
                       <select class="form-control" name="cod_nacionalidad" required>

                              <option value="V" <?php  if($datos_docente->nacionalidad=='V') echo " selected";?> >V</option>
                              <option value="E" <?php  if($datos_docente->nacionalidad=='E') echo " selected";?> >E</option>
                            </select>
                      </div>
                      <div class="col-5">
                        <input type="text" class="form-control" id="cedula" maxlength="8" minlength="6" name="cedula" onkeypress="return controltag(event)" value="<?php if ($datos_docente==false){echo "";}else{ echo $datos_docente->cedula;  } 
                        ?>" required>
                      </div>
                    </div>
                  </div>
                        <div class="form-group">
                    <label for="telefono_hab" title="-Dato Obligatorio-">Teléfono de Habitación</label>
                    
                    
                        <input type="text" class="form-control" id="telefono_hab" placeholder="" name="telefono_hab" onkeypress="return controltag(event)" value="<?php if ($datos_docente==false){echo "";}else{ echo $tel_habitacion = $datos_docente->telefono_hab;  } 
                        ?>" >
                    
                    </div>
                  
                  <div class="form-group">
                    <label for="correo" title="-Dato Obligatorio-">(*) Correo</label>
                    <input type="text" class="form-control" id="correo" placeholder="ejemplo@gmail.com" name="correo" onkeyup="javascript:this.value=this.value.toUpperCase();" value="<?php if ($datos_docente==false){echo "";}else{ echo $datos_docente->correo;  } 
                        ?>" required>
                  </div>

                  
                 
                  
              </div>
              <!-- /.col -->
                <div class="col-md-6">  
                  <div class="form-group">
                    <label for="segundo_nombre">Segundo Nombre</label>
                    <input type="text" class="form-control" id="segundo_nombre" placeholder="Segundo nombre" name="segundo_nombre" onkeyup="javascript:this.value=this.value.toUpperCase();" value="<?php if ($datos_docente==false){echo "";}else{ echo $datos_docente->segundo_nombre;  } 
                        ?>">
                  </div>
                  <div class="form-group">
                    <label for="segundo_apellido">Segundo Apellido</label>
                    <input type="text" class="form-control" id="segundo_apellido" placeholder="Segundo apellido" name="segundo_apellido" onkeyup="javascript:this.value=this.value.toUpperCase();" value="<?php if ($datos_docente==false){echo "";}else{ echo $datos_docente->segundo_apellido;  } 
                        ?>">
                  </div>
                  <div class="form-group">
                    <label for="sexo" title="-Dato Obligatorio-">(*) Sexo</label>
                         <select class="form-control" name="sexo" id="sexo" required>
                        <option value="">- Seleccione -</option>                                       
                        <?php foreach($lista_sexo as $lista_sexo):?>
                        <option value="<?php echo $lista_sexo->id;?>" 
                        <?php 
                        if( $datos_docente->id_sexo == $lista_sexo->id ){
                        echo " selected>";
                        }else{
                        echo ">";
                        } echo $lista_sexo->descripcion;?>
                        </option>
                        <?php endforeach; ?>
                        </select>    

                  </div>
                  
                 
                   <div class="form-group">
                    <label for="codigo_telcel" title="-Dato Obligatorio-">(*) Teléfono Celular</label>
                    
                        <input type="text" class="form-control" id="telefono_cel" placeholder="" name="telefono_cel" value="<?php if ($datos_docente==false){echo "";}else{ echo $telefono_cel = $datos_docente->telefono_cel;  } 
                        ?>">
                     
                    </div>
                  </div> 
                  <br>   
                </div>
                
                <button type="submit" class="btn btn-primary"  title="-Hacer clic para Registrar Datos-"> Actualizar Información</button>

                </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
            <!-- /.row -->
           
                  
                
            </form>
                
          </div>
                </div><!-- /.card -->





    </section>
    <!-- /.content -->



  </div>
  <!-- /.content-wrapper -->