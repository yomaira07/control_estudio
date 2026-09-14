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
                        <!-- Fin Mensaje de Alerta-->
                        <!-- Comienzo formulario -->
        
            <div class="card-body">

            <form name="anteriores" action="<?php echo base_url()?>dashboard08/actualiza_trabajo_ant/<?Php echo $datos_trabajo->id; ?>/2" method="POST"  >
            <script>
                 window.onload = iniciar_ant();
               function iniciar_ant(){
                  var trabajo ='';
                  cincunscripcion_ant( trabajo);
                }
                    function cincunscripcion_ant(trabajo){
                      var form1=document.forms[0];
                      if(trabajo=="1" || trabajo=="4" ){
                        form1.elements.institucion.value="MINISTERIO PÚBLICO";    
                        form1.elements.circunscripcion.required=true;   
                        form1.elements.circunscripcion.hidden=false;
                        form1.elements.lbcircunscripcion.hidden=false;     
                      } else{                        
                        form1.elements.circunscripcion.hidden=true;
                        form1.elements.lbcircunscripcion.hidden=true;
                        form1.elements.circunscripcion.required=false; 
                        form1.elements.circunscripcion.value="";                    
                      }    
                  }                
               
            </script>
            <input type="hidden" name="id_usuario" value="<?Php echo $this->session->userdata('id'); ?>">   
            <input type="hidden" name="id_trabajo" value="<?Php echo $datos_trabajo->id; ?>">          
            <input type="hidden" name="fecha_registro" value="<?php echo date('d-m-Y H:i:s'); ?>">

            <h4> TRABAJO(S) ANTERIOR(ES) </h4>
                <hr style="color;grey;">
                  
                <div class="form-group row">
                    <label for="lugar_trabajo" class="col-sm-2 col-form-label" title="-Dato Obligatorio-">(*) Lugar de Trabajo</label>
                    <div class="col-sm-2">
                       <select class="form-control" name="lugar_trabajo" id="lugar_trabajo" onchange="javasript:cincunscripcion_ant(this.value);" onblur="javasript:cincunscripcion_ant(this.value);"required>
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
                   
                  <label for="institucion" id="lbinstitucion" class="col-sm-2 col-form-label" title="-Dato Obligatorio-">(*) Nombre del Ente/Órgano/Empresa</label>
                    <div class="col-sm-3">
                      <input type="text" class="form-control" id="institucion" name="institucion" onkeyup="javascript:this.value=this.value.toUpperCase();"  value="<?php if ($datos_trabajo==false){echo "";}else{ echo $datos_trabajo->institucion;  } 
                        ?>"  
                    </div>
                    <label for="anno_ingreso" class="col-sm-2 col-form-label" id = "lbanno_ingreso" title="-Dato Obligatorio-">(*) Año de Ingreso Ente/Órgano/Empresa  </label>
                    <div class="col-sm-1">
                      <input type="number" class="form-control" id="anno_ingreso" min="1900" max="2023"name="anno_ingreso" onkeyup="javascript:this.value=this.value.toUpperCase();"  value="<?php if ($datos_trabajo==false){echo "";}else{ echo $datos_trabajo->anno_ingreso;  } 
                        ?>" > 
                    </div>
                   
                  </div>
                  
                  <div class="form-group row">
                  <label for="direccion" class="col-sm-2 col-form-label" title="-Dato Obligatorio-">(*) Dirección de Adscripción</label>
                    <div class="col-sm-2">
                      <input type="text" class="form-control" id="direccion_adscripcion_actual" name="direccion_adscripcion_actual" onkeyup="javascript:this.value=this.value.toUpperCase();"  value="<?php if ($datos_trabajo==false){echo "";}else{ echo $datos_trabajo->direccion_adscripcion;  } 
                        ?>" > 
                    </div>
                   
                   
                    <label for="cargo_desempena" class="col-sm-2 col-form-label" title="-Dato Obligatorio-">(*) Cargo que Desempeña</label>
                    <div class="col-sm-2">
                      <input type="text" class="form-control" id="cargo_desempena" name="cargo_desempena" onkeyup="javascript:this.value=this.value.toUpperCase();"  value="<?php if ($datos_trabajo==false){echo "";}else{ echo $datos_trabajo->cargo;  } 
                        ?>" > 
                    </div>
                    
                    <label id ="lbcircunscripcion" for="lbcircunscripcion" class="col-sm-2 col-form-label" title="-Dato Obligatorio-">(*) Circunscripción (SOLO MINISTERIO PÜBLICO)</label>
                    <div class="col-sm-2">
                      <input type="text" class="form-control" id="circunscripcion" name="circunscripcion" onkeyup="javascript:this.value=this.value.toUpperCase();"  value="<?php if ($datos_trabajo==false){echo "";}else{ echo $datos_trabajo->circunscripcion;  } 
                        ?>" > 
                    </div>
                    </div>
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
                      <label for="funciones" class="col-sm-2 col-form-label" title="-Dato Obligatorio-">(*) Funciones que Desempeña en su puesto de trabajo actual</label>
                    <div class="col-sm-5">
                      <input type="text" class="form-control" id="funciones_desempena" name="funciones_desempena" onkeyup="javascript:this.value=this.value.toUpperCase();"  value="<?php if ($datos_trabajo==false){echo "";}else{ echo $datos_trabajo->funciones;  } 
                        ?>" > 
                    </div>
                    </div>
                  </div>
                 <div> 
                  <button type="submit" class="btn btn-primary"  title="-Hacer clic para Registrar Datos-">Guardar Trabajo Anteriores</button>
                </div>
             
                </div><!-- /.card -->





    </section>
    <!-- /.content -->



  </div>
  <!-- /.content-wrapper -->
