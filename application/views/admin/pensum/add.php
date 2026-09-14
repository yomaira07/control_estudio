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
                      <h3 class="card-title"><strong>Nueva Unidad Curricular de <?php echo $list_programa->nombre;?></strong></h3>
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
            <form action="<?php echo base_url()?>admin/pensum/pensum_store" method="POST" name=carga >

              <input type="hidden" name="id_usuario" value="<?Php echo $this->session->userdata('id'); ?>">
                <input type="hidden" name="cod_programa" value="<?php echo $list_programa->id; ?>">  
                <input type="hidden" name="fecha_registro" value="<?php echo date('d-m-Y H:i:s'); ?>">

                  <div class="form-group row">
                    <label for="nombre" class="col-sm-3 col-form-label">Nombre</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="codigo" name="nombre" onkeyup="javascript:this.value=this.value.toUpperCase();" required="true"> 
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="siglas" class="col-sm-3 col-form-label">Siglas</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="siglas" name="siglas" 
                      placeholder="Siglas de la unidad curricular" required="true" onkeyup="javascript:this.value=this.value.toUpperCase();">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="trimestre" class="col-sm-3 col-form-label">Trimestre</label>
                    <div class="col-sm-9">
                      <select name="trimestre" class="form-control" required>
                      <option value="">Seleccione...</option>
                        <?Php foreach ($trimestres as $trimestre){
                          echo "<option value='".$trimestre->id."'>".$trimestre->nombre."</option>";  
                        }
                        ?>
                      </select>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="horas" class="col-sm-3 col-form-label">Horas</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="horas" name="horas" 
                      placeholder="Horas de la unidad curricular" required="true" onkeyup="javascript:this.value=this.value.toUpperCase();">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="unidad_curricular" class="col-sm-3 col-form-label">Unidad Crédito</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="unidad_curricular" name="unidad_curricular" 
                      placeholder="Unidad crédito Ej. 02" required="true" onkeyup="javascript:this.value=this.value.toUpperCase();">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="codigo" class="col-sm-3 col-form-label">Codigo</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="codigo" name="codigo" 
                      placeholder="Codigo de la unidad" required="true" onkeyup="javascript:this.value=this.value.toUpperCase();">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="eje" class="col-sm-3 col-form-label">Eje</label>
                    <div class="col-sm-9">
                      <select name="eje" class="form-control" required>
                      <option value="">Seleccione...</option>
                        <?Php foreach ($ejes as $eje){
                          echo "<option value='".$eje->id."'>".$eje->nombre."</option>";  
                        }
                        ?>
                      </select>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="status" class="col-sm-3 col-form-label">Status</label>
                    <div class="col-sm-9">
                      <select class="form-control" name="status">
                          <option value="1">Activo</option>
                          <option value="2">Inactivo</option>
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
