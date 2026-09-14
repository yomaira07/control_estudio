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
                      <h3 class="card-title"><strong>Nueva Actividad</strong></h3>
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
            <form action="<?php echo base_url()?>dashboard01/actividad_store" method="POST" >
              <input type="hidden" name="id_usuario" value="<?Php echo $this->session->userdata('id'); ?>">
                <input type="hidden" name="id_cod" value="<?php echo $codigo_actividad; ?>">  
                <input type="hidden" name="fecha_registro" value="<?php echo date('d-m-Y H:i:s'); ?>">

                  <div class="form-group row">
                    <label for="codigo" class="col-sm-3 col-form-label">Codigo de la actividad</label>
                    <div class="col-sm-9">
                      <input type="hidden" name="fecha_activ" value="<?Php echo date("Y"); ?>">
                      <input type="text" class="form-control" id="codigo" name="codigo"  value="<?php echo $codigo_actividad."-".date("Y"); ?>" disabled >
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="nombre" class="col-sm-3 col-form-label">Nombre de la actividad</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="nombre" name="nombre" 
                      placeholder="Nombre de la actividad" required="true" onkeyup="javascript:this.value=this.value.toUpperCase();">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="clasificacion" class="col-sm-3 col-form-label">Clasificación de Actividad</label>
                    <div class="col-sm-9">
                      <select name="clasificacion" class="form-control" required>
                      <option value="">Seleccione...</option>
                        <?Php foreach ($clasificaciones as $clasificaciones){
                          echo "<option value='".$clasificaciones->id."'>".$clasificaciones->descripcion."</option>";  
                        }
                        ?>
                      </select>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="tematica" class="col-sm-3 col-form-label">Temática de Actividad</label>
                    <div class="col-sm-9">
                      <select name="tematica" class="form-control" required>
                      <option value="">Seleccione...</option>
                        <?Php foreach ($tematicas as $tematicas){
                          echo "<option value='".$tematicas->id."'>".$tematicas->descripcion."</option>";  
                        }
                        ?>
                      </select>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="alcance" class="col-sm-3 col-form-label">Alcance de la Actividad</label>
                    <div class="col-sm-9">
                      <select name="alcance" class="form-control" required>
                      <option value="">Seleccione...</option>
                        <?Php foreach ($alcances as $alcances){
                          echo "<option value='".$alcances->id."'>".$alcances->descripcion."</option>";  
                        }
                        ?>
                      </select>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="tipo_actividad" class="col-sm-3 col-form-label">Tipo de Actividad</label>
                    <div class="col-sm-9">
                       <select name="tipo_actividad" class="form-control" required>
                      <option value="">Seleccione...</option>
                        <?Php foreach ($tipo_actividad as $tipo_actividad){
                          echo "<option value='".$tipo_actividad->id."'>".$tipo_actividad->descripcion."</option>";  
                        }
                        ?>
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