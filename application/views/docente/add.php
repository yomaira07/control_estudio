  <!-- Content Wrapper. Contains page content -->
<script type="text/javascript">
  function cerrar(){
    window.close()
  }
</script>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
    <!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
       <div class="card">
          
                    <div class="card-header">
                      <h3 class="card-title"><strong>Nueva Actuacion</strong></h3>
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
            <form action="<?php echo base_url()?>dashboard01/store" method="POST" >
                  
                  <div class="form-group row">
                    <label for="nombre" class="col-sm-3 col-form-label">Codigo Actuacion</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="codigo_actua"  value="<?php echo $cod_actividad."-".$anio.'-'.$cod_actuacion; ?> | <?php echo $acti->nombre ?>">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="nombre" class="col-sm-3 col-form-label">Nombre Actividad</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="codigo_actua"  value="<?php echo $acti->nombre ?>">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="nombre" class="col-sm-3 col-form-label">Nombre de la actividad</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="nombre" placeholder="Nombre de la actividad">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="clasificacion" class="col-sm-3 col-form-label">Clasificación de Actividad</label>
                    <div class="col-sm-9">
                      <select name="clasificacion" id="clasificacion" class="form-control">
                                    <?php //foreach($tipos_egreso as $tipo_egreso):?>
                                        <option value="<?php// echo $tipo_egreso->id?>"><?php //echo $tipo_egreso->nombre;?></option>
                                    <?php //endforeach;?>
                      </select>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="tematica" class="col-sm-3 col-form-label">Temática de Actividad</label>
                    <div class="col-sm-9">
                      <select name="tematica" id="tematica" class="form-control">
                                    <?php //foreach($tipos_egreso as $tipo_egreso):?>
                                        <option value="<?php// echo $tipo_egreso->id?>"><?php //echo $tipo_egreso->nombre;?></option>
                                    <?php // endforeach;?>
                      </select>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="alcance" class="col-sm-3 col-form-label">Alcance de la Actividad</label>
                    <div class="col-sm-9">
                      <select name="alcance" id="alcance" class="form-control">
                                    <?php //foreach($tipos_egreso as $tipo_egreso):?>
                                        <option value="<?php// echo $tipo_egreso->id?>"><?php //echo $tipo_egreso->nombre;?></option>
                                    <?php //endforeach;?>
                      </select>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="tipo_alcance" class="col-sm-3 col-form-label">Tipo de Actividad</label>
                    <div class="col-sm-9">
                      <select name="tipo_alcance" id="tipo_alcance" class="form-control">
                                    <?php //foreach($tipos_egreso as $tipo_egreso):?>
                                        <option value="<?php// echo $tipo_egreso->id?>"><?php //echo $tipo_egreso->nombre;?></option>
                                    <?php // endforeach;?>
                      </select>
                    </div>
                  </div>
            <!-- fin formulario-->
           
                  <button type="submit" class="btn btn-primary">Cargar</button>
                  <input name="input" type="button" value=" Cerrar " onclick="cerrar()" class="btn btn-default" /> 
                
            </form>
          </div>
                </div><!-- /.card -->


    </section>

        <section class="content">
       <div class="card">
          
                    <div class="card-header">
                      <h3 class="card-title"><strong> Nueva Actuacion  </strong></h3> <?php   echo $cod_actividad."-".$anio.'-'.$cod_actuacion; ?> | <?php echo $acti->nombre ?>
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
            <form action="<?php echo base_url()?>dashboard01/store" method="POST" >
                  
                  <!-- right column -->
          <div class="col-md-12">
            <!-- general form elements disabled -->
            <div class="card card-secondary">
              <div class="card-header">
                <h3 class="card-title">General Elements</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form role="form">
                  <div class="row">
                    <div class="col-sm-3">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Text</label>
                        <input type="text" class="form-control" placeholder="Enter ...">
                      </div>
                     
                    </div>
                     <div class="col-sm-3">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Text</label>
                        <input type="text" class="form-control" placeholder="Enter ...">
                      </div>
                    
                    </div>
                     <div class="col-sm-3">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Text</label>
                        <input type="text" class="form-control" placeholder="Enter ...">
                      </div>
                     
                    </div>
                     <div class="col-sm-3">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Text</label>
                        <input type="text" class="form-control" placeholder="Enter ...">
                      </div>
                      
                    </div>
                  </div>
                 
                </form>

              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
            <!-- general form elements disabled -->
            <div class="card card-secondary">
              <div class="card-header">
                <h3 class="card-title">Custom Elements</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form role="form">
                  <div class="row">
                    <div class="col-sm-3">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Text</label>
                        <input type="text" class="form-control" placeholder="Enter ...">
                      </div>
                      <div class="form-group">
                        <label>Text</label>
                        <input type="text" class="form-control" placeholder="Enter ...">
                      </div>
                    </div>
                    <div class="col-sm-3">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Text</label>
                        <input type="text" class="form-control" placeholder="Enter ...">
                      </div>
                      <div class="form-group">
                        <label>Text</label>
                        <input type="text" class="form-control" placeholder="Enter ...">
                      </div>
                    </div>
                    <div class="col-sm-3">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Text</label>
                        <input type="text" class="form-control" placeholder="Enter ...">
                      </div>
                    </div>
                    <div class="col-sm-3">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Text</label>
                        <input type="text" class="form-control" placeholder="Enter ...">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-6">
                      <!-- textarea -->
                      <div class="form-group">
                        <label>Textarea</label>
                        <textarea class="form-control" rows="3" placeholder="Enter ..."></textarea>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Textarea</label>
                        <textarea class="form-control" rows="3" placeholder="Enter ..."></textarea>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

                        <div class="card card-secondary">
              <div class="card-header">
                <h3 class="card-title">Custom Elements</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form role="form">
                  <div class="row">
                    <div class="col-sm-3">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Text</label>
                        <input type="text" class="form-control" placeholder="Enter ...">
                      </div>
                      <div class="form-group">
                        <label>Text</label>
                        <input type="text" class="form-control" placeholder="Enter ...">
                      </div>
                    </div>
                    <div class="col-sm-3">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Text</label>
                        <input type="text" class="form-control" placeholder="Enter ...">
                      </div>
                      <div class="form-group">
                        <label>Text</label>
                        <input type="text" class="form-control" placeholder="Enter ...">
                      </div>
                    </div>
                    <div class="col-sm-3">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Text</label>
                        <input type="text" class="form-control" placeholder="Enter ...">
                      </div>
                      
                    </div>
                    <div class="col-sm-3">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Text</label>
                        <input type="text" class="form-control" placeholder="Enter ...">
                      </div>
                      
                    </div>
                    
                    
                  </div>
                  
                </form>
              </div>
              <!-- /.card-body -->
            </div>

          </div>
          <!--/.col (right) -->
                  <button class="btn btn-info">Guardar</button>
                
            </form>
          </div>
                </div><!-- /.card -->


    </section>
    <!-- /.content -->

  </div>
  <!-- /.content-wrapper -->