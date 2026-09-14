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
                      <h3 class="card-title"><strong>Datos Laborales del Aspirante</strong></h3>
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
            <form name="actual" action="<?php echo base_url()?>dashboard08/trabajo_store/<?Php echo $this->session->userdata('id'); ?>/1" method="POST" name=carga >
            <body>
            <script type="text/javascript">                
                    function cincunscripcion(trabajo){
                      var form0=document.forms.actual;
                      if(trabajo=="1" ){
                        form0.elements.institucion.value="MINISTERIO PÚBLICO";  
                        mostrar_mp.style.display = 'block'; // Muestra el div circuncripcion (o 'block' según necesites)          
                        mostrar_na.style.display = 'block'; // Muestra el div cargo funcion y telefono y año ingreso (o 'block' según necesites)                         
                       // mostrar_postulado.style.display = 'block'; // Muestra el div (o 'block' según necesites)
                        mostrar_nombre_trab.style.display = 'block'; // Muestra el div (o 'block' según necesites)
                      }else{
                        if(trabajo=="14" || trabajo=="15" || trabajo=="16" || trabajo=="17"){                        
                         // form0.elements.institucion.value=""; 
                          mostrar_mp.style.display = 'none'; // Oculta el div circuncripcion 
                         // mostrar_postulado.style.display = 'none'; // Oculta el div   
                          mostrar_na.style.display = 'none'; // Oculta el div cargo funcion y telefono y año ingreso                      
                          form0.elements.circunscripcion.value=""; 
                          mostrar_nombre_trab.style.display = 'none'; // Oculta el div nombre ente año ingreso direccion de adscripcion        
                        }else{
                          if(trabajo=="20" || trabajo=="5" || trabajo=="21" ){   
                         // form0.elements.institucion.value=""; 
                          mostrar_mp.style.display = 'none'; // Oculta el div circuncripcion 
                        //  mostrar_postulado.style.display = 'none'; // Oculta el div   
                          mostrar_nombre_trab.style.display = 'block'; // Muestra el div (o 'block' según necesites)       
                          mostrar_na.style.display = 'block'; // Muestra el div cargo funcion y telefono y año ingreso (o 'block' según necesites)    
                        //  mostrar_postulado.style.display = 'block'; // Muestra el div (o 'block' según necesites)          
                          form0.elements.circunscripcion.value="";           
                        } else{
                       //   form0.elements.institucion.value=""; 
                          mostrar_mp.style.display = 'none'; // Oculta el div circuncripcion 
                         // mostrar_postulado.style.display = 'none'; // Oculta el div   
                          mostrar_nombre_trab.style.display = 'block'; // Muestra el div (o 'block' según necesites)       
                          mostrar_na.style.display = 'block'; // Muestra el div cargo funcion y telefono y año ingreso (o 'block' según necesites)    
                         
                          form0.elements.circunscripcion.value="";           
                        }   
                      }
                    }
                     
                  }
                  function siguiente()
                { 
                location.href="inscripcion";
                }
                 
                /*window.onload = iniciar();*/
                function iniciar(){
                  var trabajo = document.getElementById('lugar_trabajo').value;
                  cincunscripcion( trabajo);
                }
          </script>
          <body onload="iniciar()">

              <input type="hidden" name="id_usuario" value="<?Php echo $this->session->userdata('id'); ?>">
            <input type="hidden" name="no_encontrado" value="<?php if ($datos_trabajo==false){echo "falso";}else{ echo $datos_trabajo->id_trabajo;  } 
                        ?>">
            
                  
                <input type="hidden" name="fecha_registro" value="<?php echo date('d-m-Y H:i:s'); ?>">
                <h4> TRABAJO ACTUAL </h4>
                <hr style="color;grey;">
                  
                   <div class="form-group row">
                    <label for="lugar_trabajo" class="col-sm-2 col-form-label" title="-Dato Obligatorio-">(*) Lugar de Trabajo</label>
                    <div class="col-sm-2">
                       <select class="form-control" name="lugar_trabajo" id="lugar_trabajo" onchange="javasript:cincunscripcion(this.value);" required>
                      <option value="">- Seleccione -</option>                                       
                      <?php foreach($lugartrabajo as $lugartrabajo):?>
                      <option value="<?php echo $lugartrabajo->id;?>" 
                      <?php 
                        if( $datos_trabajo->id_lugar_trabajo == $lugartrabajo->id ){
                        echo " selected>";
                        }else{
                        echo ">";
                        } echo $lugartrabajo->lugar_trabajo; ?>
                      </option>
                      <?php endforeach; ?>
                      </select>   
                    </div>
                  </div>
                   <div id="mostrar_nombre_trab">
                   <div class="form-group row">
                  <label for="institucion" id="lbinstitucion" class="col-sm-2 col-form-label" title="-Dato Obligatorio-">(*) Nombre del Ente/Órgano/Empresa</label>
                    <div class="col-sm-3">
                      <input type="text" class="form-control" id="institucion" name="institucion" onkeyup="javascript:this.value=this.value.toUpperCase();"  value="<?php if ($datos_trabajo==false){echo "";}else{ echo $datos_trabajo->institucion;  } 
                        ?>" > 
                    </div>
                    <label for="anno_ingreso" class="col-sm-2 col-form-label" id = "lbanno_ingreso" title="-Dato Obligatorio-">(*) Año de Ingreso Ente/Órgano/Empresa  </label>
                    <div class="col-sm-1">
                      <input type="number" class="form-control" id="anno_ingreso" min="0" max="2025"name="anno_ingreso" onkeyup="javascript:this.value=this.value.toUpperCase();"  value="<?php if ($datos_trabajo==false){echo "";}else{ echo $datos_trabajo->anno_ingreso;  } 
                        ?>" > 
                    </div>
                   
                  </div>
                  
                  <div class="form-group row">
                    <label for="direccion" class="col-sm-2 col-form-label" title="-Dato Obligatorio-">(*) Dirección de Adscripción</label>
                      <div class="col-sm-2">
                        <input type="text" class="form-control" id="direccion_adscripcion_actual" name="direccion_adscripcion_actual" onkeyup="javascript:this.value=this.value.toUpperCase();"  value="<?php if ($datos_trabajo==false){echo "";}else{ echo $datos_trabajo->direccion_adscripcion;  } 
                          ?>" > 
                      </div>
                  </div>
                </div>
                <div id="mostrar_mp">
                    <div class="form-group row">
                              <label for="comboestado" class="col-sm-2 col-form-label" title="-Dato Obligatorio-">(*)Estado de Circunscripción (SOLO MINISTERIO PÜBLICO)</label>
                            <div class="col-sm-2">
                                <select name="comboestado" class="form-control" id="comboestado" >
                                <option value="0">Seleccione...</option>
                                  <?Php  foreach ($estadotrabajo as $combo_estado){
                                    if($datos_trabajo->estado_circunscripcion==$combo_estado->id){
                                      echo "<option value='".$combo_estado->id."' selected>".$combo_estado->estado."</option>";  
                                    }else{ 
                                      echo "<option value='".$combo_estado->id."' >".$combo_estado->estado."</option>";  
                                    }
                                  }
                                  ?>
                                </select>
                              </div>                         
                              <label id ="lbcircunscripcion" for="lbcircunscripcion" class="col-sm-2 col-form-label" title="-Dato Obligatorio-">(*) Circunscripción (SOLO MINISTERIO PÜBLICO)</label>
                              <div class="col-sm-2">
                                  <input type="text" class="form-control" id="circunscripcion" name="circunscripcion" onkeyup="javascript:this.value=this.value.toUpperCase();"  value="<?php if ($datos_trabajo==false){echo "";}else{ echo $datos_trabajo->circunscripcion;  } 
                                    ?>" > 
                              </div>  
                      </div>                         
                  </div>
                  <div id="mostrar_na">
                  <div class="form-group">
                     <div class="row">
                      <label class="col-2" for="cod_teltrab" title="-Dato Obligatorio-">(*) Teléfono de Oficina</label>                   
                        <div class="col-1">
                              <select name="codigo_teltrab" class="form-control"  >
                                <option value="">Seleccione...</option>
                                  <?Php foreach ($cod_hab as $cod_hab){
                                    if (substr(trim($datos_trabajo->tel_trabajo),0,4)==trim($cod_hab->descripcion)) {
                                      $selected=' selected';}else{$selected='';
                                    }

                                    echo "<option value='".$cod_hab->descripcion."'".$selected.">".$cod_hab->descripcion."</option>";  
                                  }
                                  ?>
                            </select>
                        </div>                   
                      <div class="col-2">
                        <input type="text" class="form-control" id="telefono_teltrab" placeholder="" name="telefono_teltrab" onkeypress="return controltagrequired(event)" maxlength="7" value="<?php if ($datos_trabajo==false){echo "";}else{ echo $tel_trabajo = substr($datos_trabajo->tel_trabajo,4) ;  } 
                        ?>" >
                      </div>
                      </div>
                  </div>

                  <div class="form-group row">
                    
                        <label for="cargo_desempena" class="col-sm-2 col-form-label" title="-Dato Obligatorio-">(*) Cargo que Desempeña</label>
                        <div class="col-sm-2">
                          <input type="text" class="form-control" id="cargo_desempena" name="cargo_desempena" onkeyup="javascript:this.value=this.value.toUpperCase();"  value="<?php if ($datos_trabajo==false){echo "";}else{ echo $datos_trabajo->cargo;  } 
                            ?>" > 
                        </div>
                        <label for="funciones" class="col-sm-2 col-form-label" title="-Dato Obligatorio-">(*) Funciones que Desempeña en su puesto de trabajo actual</label>
                        <div class="col-sm-5">
                          <input type="text" class="form-control" id="funciones_desempena" name="funciones_desempena" onkeyup="javascript:this.value=this.value.toUpperCase();"  value="<?php if ($datos_trabajo==false){echo "";}else{ echo $datos_trabajo->funciones;  } 
                            ?>" > 
                        </div>
                     
                   
                  </div>
                </div>
                   <div class="form-group row">
                    <label for="trimestre" class="col-sm-3 col-form-label" title="-Dato Obligatorio-">(*) ¿Es jubilada/o de la administración pública?</label>
                    <div class="col-sm-9">

                        <input type="radio" name="radio_jub" id="radsi" class="css-checkbox" value="1"  <?php if($datos_trabajo->jubilado ==1) echo "checked";?> required/><label>Si</label>
                        <br>
                        <input type="radio" name="radio_jub" id="radno" class="css-checkbox" value="2" <?php if($datos_trabajo->jubilado ==2) echo "checked";?> required /><label>No</label>

                    </div>
                  </div>
                
              <!--   <div id="mostrar_postulado">
                  <div class="form-group row" >
                    <label for="postulado" class="col-sm-3 col-form-label" title="-Dato Obligatorio-">(*) ¿Es postulado por su Lugar de Trabajo?</label>
                    <div class="col-sm-9">

                        <input type="radio" name="radio_pos" id="radpos_si" class="css-checkbox" value="1"  <?php //if($datos_trabajo->postulado ==1) echo "checked";?> required/><label>Si</label>
                        <br>
                        <input type="radio" name="radio_pos" id="radpos_no" class="css-checkbox" value="0" <?php //if($datos_trabajo->postulado ==0) echo "checked";?> required /><label>No</label>

                    </div>-->
         <!--         </div>
                </div>

            fin formulario-->
           
               <button type="submit" class="btn btn-primary"  title="-Hacer clic para Registrar Datos-">Registrar Trabajo Actual</button>
               </body>
            </form>
            </div>
     <!--        
          </div>
         <div class="card">    
             Mensaje de Alerta-->
               <?php  /*if ($this->session->flashdata("error_a")): ?>
                        <div class="alert alert-danger alert-dismissible">
                          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                          <p><i class="icon fa fa-ban"></i> <?php echo $this->session->flashdata("error_a"); ?> </p>
                        </div>
                         <?php endif; ?>
                      <?php  if ($this->session->flashdata("success_a")): ?>
                        <div class="alert alert-success">
                          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                          <p><i class="icon fa fa-check-square"></i> <?php echo $this->session->flashdata("success_a"); ?> </p>
                        </div>
                      <?php endif; ?>
                       <?php  if ($this->session->flashdata("warning_a")): ?>
                        <div class="alert alert-warning">
                          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                          <p><i class="icon fa fa-check-square"></i> <?php echo $this->session->flashdata("warning_a"); ?> </p>
                        </div>
                      <?php endif;*/ ?>
                     
                        <!-- Fin Mensaje de Alerta-->      
         <!--   <div class="card-body">

            <form name="anteriores" action="<?php //echo base_url()?>dashboard08/trabajo_ant_store/<?Php //echo $this->session->userdata('id'); ?>/2" method="POST"  >
            
             <body onload="iniciar_ant()">-->
            <script type="text/javascript">                
          /*         function cincunscripcion_ant(trabajo_ant){
                      var form1=document.forms.anteriores;
                      if(trabajo_ant=="1" ){
                        form1.elements.instituciona.value="MINISTERIO PÚBLICO";  
                        amostrar_mp.style.display = 'block'; // Muestra el div circuncripcion (o 'block' según necesites)          
                        amostrar_na.style.display = 'block'; // Muestra el div cargo funcion y telefono y año ingreso (o 'block' según necesites)                         
                      
                        amostrar_nombre_trab.style.display = 'block'; // Muestra el div (o 'block' según necesites)
                      }else{
                        if(trabajo_ant=="14" || trabajo_ant=="15" || trabajo_ant=="16" || trabajo_ant=="17"){                        
                        //  form1.elements.institucion.value=""; 
                          amostrar_mp.style.display = 'none'; // Oculta el div circuncripcion 
                        
                          amostrar_na.style.display = 'none'; // Oculta el div cargo funcion y telefono y año ingreso                      
                          //form1.elements.circunscripcion.value=""; 
                          amostrar_nombre_trab.style.display = 'none'; // Oculta el div nombre ente año ingreso direccion de adscripcion        
                        }else{
                          if(trabajo_ant=="20" || trabajo_ant=="5" || trabajo_ant=="21" ){   
                         // form1.elements.institucion.value=""; 
                          amostrar_mp.style.display = 'none'; // Oculta el div circuncripcion 
                          amostrar_postulado.style.display = 'none'; // Oculta el div   
                          amostrar_nombre_trab.style.display = 'block'; // Muestra el div (o 'block' según necesites)       
                          amostrar_na.style.display = 'block'; // Muestra el div cargo funcion y telefono y año ingreso (o 'block' según necesites)    
                                
                        //  form1.elements.circunscripcion.value="";           
                        } else{
                        //  form1.elements.institucion.value=""; 
                          amostrar_mp.style.display = 'none'; // Oculta el div circuncripcion 
                          
                          amostrar_nombre_trab.style.display = 'block'; // Muestra el div (o 'block' según necesites)       
                          amostrar_na.style.display = 'block'; // Muestra el div cargo funcion y telefono y año ingreso (o 'block' según necesites)    
                         
                          //form1.elements.circunscripcion.value="";           
                        }   
                      }
                    }
                     
                  }
                 
          
                function iniciar_ant(){
                  alert("HOLAAA");
                  var form1=document.forms.anteriores;
                  var trabajo_ant = form1.getElementById('lugar_trabajo').value;
                  cincunscripcion_ant( trabajo_ant);
                } */
          </script>
         
      <!--      <input type="hidden" name="id_usuario" value="<?Php //echo $this->session->userdata('id'); ?>">        
              
            <input type="hidden" name="fecha_registro" value="<?php //echo date('d-m-Y H:i:s'); ?>">

            <h4> TRABAJO(S) ANTERIOR(ES) </h4>
                <hr style="color;grey;">
                  
                <div class="form-group row">
                    <label for="lugar_trabajo" class="col-sm-2 col-form-label" title="-Dato Obligatorio-">(*) Lugar de Trabajo</label>
                    <div class="col-sm-2">
                       <select class="form-control" name="lugar_trabajoa" id="lugar_trabajoa" onchange="javasript:cincunscripcion_ant(this.value);" required>
                      <option value="">- Seleccione -</option>                                       
                      <?php //foreach($lugartrabajo_ant as $lugartrabajo):?>
                      <option value="<?php //echo $lugartrabajo->id;?>" >
                      <?php 
                       //echo $lugartrabajo->lugar_trabajo;?>
                      </option>
                      <?php //endforeach; ?>
                      </select>   
                    </div>
                </div>
                <div id="amostrar_nombre_trab">
                      <div class="form-group row">
                        <label for="institucion" id="lbinstitucion" class="col-sm-2 col-form-label" title="-Dato Obligatorio-">(*) Nombre del Ente/Órgano/Empresa</label>
                          <div class="col-sm-3">
                            <input type="text" class="form-control" id="institucion" name="institucion" onkeyup="javascript:this.value=this.value.toUpperCase();"  value="" > 
                          </div>
                          <label for="anno_ingreso" class="col-sm-2 col-form-label" id = "lbanno_ingreso" title="-Dato Obligatorio-">(*) Año de Ingreso Ente/Órgano/Empresa  </label>
                          <div class="col-sm-1">
                            <input type="number" class="form-control" id="anno_ingreso" min="0" max="2025"name="anno_ingreso" onkeyup="javascript:this.value=this.value.toUpperCase();"  value="" > 
                          </div>                        
                      </div>              
                      <div class="form-group row">
                        <label for="direccion" class="col-sm-2 col-form-label" title="-Dato Obligatorio-">(*) Dirección de Adscripción</label>
                          <div class="col-sm-2">
                            <input type="text" class="form-control" id="direccion_adscripcion_actual" name="direccion_adscripcion_actual" onkeyup="javascript:this.value=this.value.toUpperCase();"  value="" > 
                          </div>
                      </div>
                </div>
                <div id="amostrar_mp">
                        <div class="form-group row">
                          <label for="cargo_desempena" class="col-sm-2 col-form-label" title="-Dato Obligatorio-">(*) Cargo que Desempeña</label>
                          <div class="col-sm-2">
                            <input type="text" class="form-control" id="cargo_desempena" name="cargo_desempena" onkeyup="javascript:this.value=this.value.toUpperCase();"  value="" > 
                          </div>                          
                          <label id ="lbcircunscripcion" for="lbcircunscripcion" class="col-sm-2 col-form-label" title="-Dato Obligatorio-">(*) Circunscripción (SOLO MINISTERIO PÜBLICO)</label>
                          <div class="col-sm-2">
                            <input type="text" class="form-control" id="circunscripcion" name="circunscripcion" onkeyup="javascript:this.value=this.value.toUpperCase();"  value="" > 
                          </div>
                        </div>
                </div>
                <div id="amostrar_na">
                      <div class="form-group">
                        <div class="row">
                          <label class="col-2" for="cod_teltrab" title="-Dato Obligatorio-">(*) Teléfono de Oficina</label>                   
                          <div class="col-1">
                            <select name="codigo_teltrab" class="form-control"  >
                          <option value="">Seleccione...</option>
                            <?Php // foreach ($cod_hab_ant as $cod_hab){                     

                             // echo "<option value='".$cod_hab->descripcion."'".$selected.">".$cod_hab->descripcion."</option>";  
                           // }
                            ?>
                          </select>
                          </div>
                          <div class="col-2">
                          <input type="text" class="form-control" id="telefono_teltrab" placeholder="" name="telefono_teltrab" onkeypress="return controltagrequired(event)" maxlength="7" value="" >
                          </div>
                          <label for="funciones" class="col-sm-2 col-form-label" title="-Dato Obligatorio-">(*) Funciones que Desempeña en su puesto de trabajo actual</label>
                          <div class="col-sm-5">
                          <input type="text" class="form-control" id="funciones_desempena" name="funciones_desempena" onkeyup="javascript:this.value=this.value.toUpperCase();"  value="" > 
                          </div>
                        </div>
                      </div>
              
                </div>
                  <button type="submit" class="btn btn-primary"  title="-Hacer clic para Registrar Datos-">Registrar Trabajo Anteriores</button>
                </div>
                <br>
            <div class="table-responsive">
                        <table id="example" class="table table-striped table-bordered" style="width:100%"> 
                                    <thead>  
                                        <tr>
                                            <th>Institución</th>
                                            <th>Cargo</th>
                                            <th>Año de Ingreso </th>                                                                         
                                            <th colspan=2>Opción</th>
                                        </tr>
                                    </thead>  
                                    <tbody>    
                                    <?php //if(!empty($datos_trabajo_ant)):?>
                      <?php 
                     
                      //foreach($datos_trabajo_ant as $datos_trabajo_ant):
                                  ?>
                                        <tr>                                                    
                                                <td><?php //echo $datos_trabajo_ant->institucion;?></td>
                                                <td><?php //echo $datos_trabajo_ant->cargo;?></td>
                                                <td><?php //echo $datos_trabajo_ant->anno_ingreso;?></td>
                                                <td colspan=2><a href="<?php //echo base_url()?>dashboard08/trabajo_anterior_edit/<?php //echo $datos_trabajo_ant->id_trabajo; ?>" ><img src="../assets/img/icons8-Edit Property.png" title ="Editar Registro" ></a>
                                                <a href="<?php //echo base_url()?>dashboard08/trabajo_anterior_eliminar/<?php //echo $datos_trabajo_ant->id_trabajo; ?>" ><img src="../assets/img/icons8-Delete.png" title ="Eliminar Registro"></a>
                                              </td>
                                            </tr>
                                            <?php// endforeach;?>
                  <?php //endif;?>     
                                    </tbody>                      
                                    <tfoot>
                                        <tr>
                                        <th>Institución</th>
                                            <th>Cargo</th>
                                            <th>Año de Ingreso </th>                                                                         
                                            <th>Opción</th>
                                            
                                        </tr>
                                    </tfoot>
                        </table>
              </form>    
          </div>
          </div>
 
          <div align="center">
    <input type="button" name="btnSeguiente" value="Siguiente" class="boton btn btn-info" onClick="siguiente();">
  </div> -->    
      <br> <hr>
 <span ><b>(*) Dato Obligatorio</b></span>          
    </div><!-- /.card -->





    </section>
    <!-- /.content -->



  </div>
  <!-- /.content-wrapper -->


