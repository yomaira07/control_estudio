  <!-- Content Wrapper. Contains page content -->

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
    <!-- /.container-fluid -->
    </section>
 
    <!-- Main content -->
    <section class="content">
    <script language="javascript">
function anterior(){
document.getElementById("btnAnterior").addEventListener("click", () => {
  history.back();
});
}
</script>
       <div class="card">
          
                    <div class="card-header">
                      <h3 class="card-title"><strong>Actualizar Datos Personales
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
                      <?php  if ($this->session->flashdata("success")): ?>
                        <div class="alert alert-success">
                          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                          <p><i class="icon fa fa-check-square"></i> <?php echo $this->session->flashdata("success"); ?> </p>
                        </div>
                      <?php endif; ?>
                       <?php  if ($this->session->flashdata("warning")): ?>
                        <div class="alert alert-warning">
                          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                          <p><i class="icon fa fa-check-square"></i> <?php echo $this->session->flashdata("warning"); ?> </p>
                        </div>
                      <?php endif; ?>
                     
                        <!-- Fin Mensaje de Alerta-->
                        <!-- Comienzo formulario -->
                <form action="<?php echo base_url()?>consultas/actualizar_datos/<?Php echo $datos_alumnos->id; ?>" method="POST" >
                <?Php //echo $datos_alumnos->id; ?>
                  <input type="hidden" name="id_usuario" value="<?Php echo $datos_alumnos->id_usuario; ?>">
                  <input type="hidden" name="id" value="<?php if ($datos_alumnos==false){echo "falso";}else{ echo $datos_alumnos->id;  } 
                        ?>">
                 <input type="hidden" name="no_encontrado" value="<?php if ($datos_alumnos==false){echo "falso";}else{ echo $datos_alumnos->id;  } 
                        ?>"> 
                <input type="hidden" name="fecha_actualizacion" value="<?php echo date('d-m-Y H:i:s'); ?>">
            <div class="row">
              <div class="col-md-6">
                 <div class="form-group">
                    <label for="primernombre" title="-Dato Obligatorio-">(*) Primer Nombre</label>
                    <input type="text" class="form-control" id="primer_nombre" placeholder="Primer Nombre" name="primer_nombre" onkeyup="javascript:this.value=this.value.toUpperCase();" value="<?php if ($datos_alumnos==false){echo "";}else{ echo $datos_alumnos->nombre_primer;  } 
                        ?>" required></div>
                  <div class="form-group">
                    <label for="primerapellido" title="-Dato Obligatorio-">(*) Primer Apellido</label>
                    <input type="text" class="form-control" id="primer_apellido" placeholder="Primer Apellido" name="primer_apellido"  onkeyup="javascript:this.value=this.value.toUpperCase();" value="<?php if ($datos_alumnos==false){echo "";}else{ echo $datos_alumnos->apellido_primer;  } 
                        ?>" required>
                  </div>
                  <div class="form-group">
                    <label for="cedula" title="-Dato Obligatorio-">(*) Cedula </label>
                    <div class="row"> 
                      <div class="col-2">
                       <select class="form-control" name="cod_nacionalidad" required disabled>

                              <option value="V" <?php  if($datos_alumnos->nacionalidad=='V') echo " selected";?> >V</option>
                              <option value="E" <?php  if($datos_alumnos->nacionalidad=='E') echo " selected";?> >E</option>
                            </select>
                      </div>
                      <div class="col-5">
                        <input type="text" class="form-control" disabled id="cedula" maxlength="8" minlength="6" name="cedula" onkeypress="return controltag(event)" value="<?php if ($datos_alumnos==false){echo "";}else{ echo $datos_alumnos->cedula;  } 
                        ?>" required>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="estadocivil" title="-Dato Obligatorio-">(*) Estado Civil</label>
                      <select class="form-control" name="estado_civil" id="estado_civil" disabled required>
                      <option value="">- Seleccione -</option>                                       
                      <?php foreach($lista_estadocivil as $lista_estadocivil):?>
                      <option value="<?php echo $lista_estadocivil->id;?>" 
                      <?php 
                      if( $datos_alumnos->id_estado_civil == $lista_estadocivil->id ){
                      echo " selected>";
                      }else{
                      echo ">";
                      } echo $lista_estadocivil->descripcion;?>
                      </option>
                      <?php endforeach; ?>
                      </select>              
                  </div>
                  <div class="form-group">
                    <label for="apellidos" title="-Dato Obligatorio-">(*)Teléfono de Habitación</label>
                    <div class="row">
                      <div class="col-3">
                       <select class="form-control" name="codigo_telhab" id="codigo_telhab" disabled required>
                        <option value="">- Seleccione -</option>                                       
                        <?php foreach($cod_hab as $cod_hab):?>
                        <option value="<?php echo $cod_hab->id;?>" 
                        <?php 
                        if( $datos_alumnos->id_codigo_hab == $cod_hab->id ){
                        echo " selected>";
                        }else{
                        echo ">";
                        } echo $cod_hab->descripcion;?>
                        </option>
                        <?php endforeach; ?>
                        </select>      
                      </div>
                      <div class="col-5">
                        <input type="text" class="form-control" id="telefono_hab" placeholder="" disabled name="telefono_hab" value="<?php if ($datos_alumnos==false){echo "";}else{ echo $tel_habitacion = $datos_alumnos->tel_habitacion;  } 
                        ?>" required>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="cod_telcelwhat" title="-Dato Obligatorio-">(*) Teléfono con Whatsapp</label>
                    <div class="row">
                      <div class="col-3">
                        <select class="form-control" name="codigo_telcelwhat" id="codigo_telcelwhat" disabled>
                        <option value="">- Seleccione -</option>                                       
                        <?php foreach($cod_celwhat as $cod_celwhat):?>
                        <option value="<?php echo $cod_celwhat->id;?>" 
                        <?php 
                        if( $datos_alumnos->id_codigo_cel_whatsapp == $cod_celwhat->id ){
                        echo " selected>";
                        }else{
                        echo ">";
                        } echo $cod_celwhat->descripcion;?>
                        </option>
                        <?php endforeach; ?>
                        </select>         

                      </div>
                      <div class="col-5">
                        <input type="text" class="form-control" id="telefono_celwhat" placeholder="" name="telefono_celwhat" disabled value="<?php if ($datos_alumnos==false){echo "";}else{ echo $tel_habitacion = $datos_alumnos->telefono_whatsapp;  } 
                        ?>">
                      </div>
                    </div>
                  </div>

                  
                 
                  
              </div>
              <!-- /.col -->
                <div class="col-md-6">  
                  <div class="form-group">
                    <label for="segundo_nombre">Segundo Nombre</label>
                    <input type="text" class="form-control" id="segundo_nombre" placeholder="Segundo nombre"  name="segundo_nombre" onkeyup="javascript:this.value=this.value.toUpperCase();" value="<?php if ($datos_alumnos==false){echo "";}else{ echo $datos_alumnos->nombre_segundo;  } 
                        ?>">
                  </div>
                  <div class="form-group">
                    <label for="segundo_apellido">Segundo Apellido</label>
                    <input type="text" class="form-control" id="segundo_apellido" placeholder="Segundo apellido"  name="segundo_apellido" onkeyup="javascript:this.value=this.value.toUpperCase();" value="<?php if ($datos_alumnos==false){echo "";}else{ echo $datos_alumnos->apellido_segundo;  } 
                        ?>">
                  </div>
                  <div class="form-group">
                    <label for="sexo" title="-Dato Obligatorio-">(*) Sexo</label>
                         <select class="form-control" name="sexo" id="sexo" disabled required>
                        <option value="">- Seleccione -</option>                                       
                        <?php foreach($lista_sexo as $lista_sexo):?>
                        <option value="<?php echo $lista_sexo->id;?>" 
                        <?php 
                        if( $datos_alumnos->id_sexo == $lista_sexo->id ){
                        echo " selected>";
                        }else{
                        echo ">";
                        } echo $lista_sexo->descripcion;?>
                        </option>
                        <?php endforeach; ?>
                        </select>    

                  </div>
                  <div class="form-group">
                    <label for="correo" title="-Dato Obligatorio-">(*) Correo</label>
                    <input type="text" class="form-control" id="correo" placeholder="ejemplo@gmail.com" name="correo" disabled onkeyup="javascript:this.value=this.value.toUpperCase();" value="<?php if ($datos_alumnos==false){echo "";}else{ echo $datos_alumnos->correo;  } 
                        ?>" required>
                  </div>
                  <div class="form-group">
                    <label for="fec_nac" title="-Dato Obligatorio-">(*) Fecha de Nacimiento</label>
                    <input type="date" class="form-control" id="fec_nac" placeholder="ejemplo@gmail.com" name="fec_nac" disabled value="<?php if ($datos_alumnos==false){echo "";}else{ echo $datos_alumnos->fecha_nac ;  } 
                        ?>" required>
                  </div>
                   <div class="form-group">
                    <label for="codigo_telcel" title="-Dato Obligatorio-">(*) Teléfono Celular</label>
                    <div class="row">
                      <div class="col-3">
                       <select class="form-control" name="codigo_telcel" id="codigo_telcel" disabled>
                        <option value="">- Seleccione -</option>                                       
                        <?php foreach($cod_cel as $cod_cel):?>
                        <option value="<?php echo $cod_cel->id;?>" 
                        <?php 
                        if( $datos_alumnos->id_codigo_cel == $cod_cel->id ){
                        echo " selected>";
                        }else{
                        echo ">";
                        } echo $cod_cel->descripcion;?>
                        </option>
                        <?php endforeach; ?>
                        </select>  

                      </div>
                      <div class="col-5" >
                        <input type="text" class="form-control" id="telefono_cel" placeholder="" name="telefono_cel" disabled value="<?php if ($datos_alumnos==false){echo "";}else{ echo $tel_habitacion = $datos_alumnos->tel_celular;  } 
                        ?>">
                      </div>
                    </div>
                  </div> 
                  <br>   
                </div>
                <div align="center">
                <button type="submit" class="btn btn-primary"  title="-Hacer clic para Registrar Datos-"> Actualizar Información</button>
                <input type="button" name="btnAnterior" id="btnAnterior" value="Regresar" class="boton btn btn-info" onClick="history.back();">  </div>   
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