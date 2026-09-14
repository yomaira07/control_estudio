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
                      <h3 class="card-title">
                      <img src="<?php echo base_url(); ?>assets/img/logo2.png"  width="100px" height="100px"/><strong> BIENVENIDO (A), Mi estimado (a) </strong> <br>
                  <a href="<?php echo base_url();?>" title="Ir a inicio"><img src="<?php echo base_url(); ?>assets/img/home.png"  width="25px" height="25px"/>Ir a Inicio</a> 
       </div>

                    <div class="card-header">
                      <h3 class="card-title"> <i class="fas far fa-bookmark"><strong> Cambiar Contraseña.</i> </strong></h3>
                      <br>Sistema de Control de Estudio de la Escuela Nacional de Fiscales del Ministerio Público (SCEENFMP)
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

                        <?php  if ($this->session->flashdata("info")): ?>
                        <div class="alert alert-info alert-dismissible">
                          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                          <p><i class="icon fa fa-ban"></i> <?php echo $this->session->flashdata("info"); ?> </p>
                        </div>
                      <?php endif; ?>
                        <!-- Fin Mensaje de Alerta-->
                        <!-- Comienzo formulario -->
            <form action="<?php echo base_url()?>auth/clave_store" method="POST" name=carga >

              <input type="hidden" name="id_usuario" value="<?Php echo $this->session->userdata('id'); ?>">

                  <div class="form-group row">
                    <label for="clave" class="col-sm-3 col-form-label">Nueva Contraseña</label>
                    <div class="col-sm-3">
                      <input type="text" class="form-control" id="clave" name="clave"  required="true"> 
                    </div>
                  </div>
                
            <!-- fin formulario-->
           
                  <button type="submit" class="btn btn-primary">Cambiar</button>
                
            </form>
          </div>
                </div><!-- /.card -->


    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
