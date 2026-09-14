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
                      <h3 class="card-title"><strong>Nuevo Valor de Aranceles</strong></h3>
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
            <form action="<?php echo base_url()?>admin/arancel/arancel_store" method="POST" name=carga >

              <input type="hidden" name="id_usuario" value="<?Php echo $this->session->userdata('id'); ?>"> 
                <input type="hidden" name="fecha_registro" value="<?php echo date('d-m-Y H:i:s'); ?>">

                  <div class="form-group row">
                    <label for="valor" class="col-sm-3 col-form-label"title="-Dato Obligatorio-">(*) Tipo de Arancel</label>
                    <div class="col-sm-9">
                      <select class="form-control" name="tipo_arancel" required>

                              <option value="1" >Arancel de Inscripción Especialidad</option>
                              <option value="2" >Arancel de Permanencia</option>
                              <option value="3" >Arancel de Fuera de Rango</option>
                               <option value="4" >Arancel de Inscripción Maestría</option>
                               <option value="5" >Arancel de Inscripción Aspirante Especialidad</option>
                               <option value="6" >Arancel de Inscripción Aspirante Maestría</option>
                               <option value="7" >Arancel de Inscripción Aspirante Doctorado</option>
 			<option value="8" >Arancel de Inscripción Doctorado</option>
                            </select>
                    </div>
                  </div>
                 <div class="form-group row">
                    <label for="valor" class="col-sm-3 col-form-label"title="-Dato Obligatorio-">(*) Monto por Arancel Público General</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="valor" name="valor" 
                      placeholder="Ejemplo: 1000000.00" required="true" onkeyup="javascript:this.value=this.value.toUpperCase();">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="valor2" class="col-sm-3 col-form-label"title="-Dato Obligatorio-">(*) Monto por Arancel MInisterio Público</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="valor2" name="valor2" 
                      placeholder="Ejemplo: 1000000.00" required="true" onkeyup="javascript:this.value=this.value.toUpperCase();">
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

