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
                      <img src="<?php echo base_url(); ?>assets/img/logo2.png"  width="100px" height="100px"/><strong> BIENVENIDO (A), Mi estimado (a) Estudiante</strong> <br>
                  <a href="<?php echo base_url();?>" title="Ir a inicio"><img src="<?php echo base_url(); ?>assets/img/home.png"  width="25px" height="25px"/>Ir a Inicio</a> 
       </div>

                    <div class="card-header">
                      <h3 class="card-title"> <i class="fas far fa-bookmark"><strong> Cambiar Correo Electrónico.</i> (SOLO ESTUDIANTES REGULARES O EGRESADOS)</strong></h3>
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
            <form action="<?php echo base_url()?>auth/enviar_correo" method="POST" name=carga >
            <input type="hidden" name="id_usuario" id="id_usuario" value="<?php echo $this->session->userdata("id");?>"/>
            <p>Indique el correo electrónico a registrar como estudiante regular en nuestra plataforma SCE-ENFMP.</p>
             

           
                  <div class="form-group row">
                    <label for="clave" class="col-sm-2 col-form-label">Correo Electrónico a Registrar:</label>
                    <div class="col-sm-3">
                     <input type="email" class="form-control" id="correo" title ="Debe indicar el correo 'Gmail' registrado"placeholder="Debe indicar el correo 'Gmail' registrado" name="correo" onkeyup="javascript:this.value=this.value.toUpperCase();" value="" required>
                  </div>
                
        
            <div class="form-group row">
              <div class=" col-sm-3">
                  <button type="submit" class="btn btn-primary">Enviar</button>
              </div>
            </div>
                  <div class="form-group row"> 
                     <div class="col-sm-6">
                      <span style="color: red;">
                        
                      </span>  
                    </div>
                  </div>
                <!-- fin formulario-->
            </form>
          </div>
                </div><!-- /.card -->


    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
