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
          <img src="<?php echo base_url(); ?>assets/img/logo2.png"  width="100px" height="100px"/><strong> Bienvenido (a), Mi estimado (a) Estudiante</strong> <br>
          <a href="<?php echo base_url();?>" title="Ir a inicio"><img src="<?php echo base_url(); ?>assets/img/home.png"  width="25px" height="25px"/>Ir a Inicio</a> 
          <div aling="center"><br>   <i class="fas far fa-bookmark"> Recuperar Contraseña.</i>
            <br>(SOLO ESTUDIANTES REGULARES O EGRESADOS)
            <br>Sistema de Control de Estudio de la Escuela Nacional de Fiscales del Ministerio Público (SCE-ENFMP).
          </div>                   
      </div>  
                
               

                    
                      <div class="card-body">
                        <!-- Mensaje de Alerta-->
                        <?php  if ($this->session->flashdata("error")): ?>
                        <div class="alert alert-danger alert-dismissible">
                          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                          <p><i class="icon fa fa-ban"></i> <?php echo $this->session->flashdata("error"); ?> </p>
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
            <form action="<?php echo base_url()?>auth/enviar_clave" method="POST" name=carga >
            <p>Indique el correo electrónico registrado como estudiante regular o egresado en nuestra plataforma.</p>
             

              <!-- <div class="form-group row">
                    <label for="clave" class="col-sm-3 col-form-label">Usuario</label>
                    <div class="col-sm-3">
                      <input type="text" class="form-control" id="username" name="username"  required="true" placeholder="Usuario Registrado"> 
                    </div>
                  </div>-->
                  <div class="form-group row">
                    <label for="clave" class="col-sm-2 col-form-label">Correo Electrónico Registrado:</label>
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
                        <b>Nota:</b> En caso de no recordar su correo electrónico registrado como estudiante regular o egresado en nuestra plataforma (SCE-ENFMP) se recomienda utilizar la opción  <a href="<?php echo base_url().'welcome/recuperar_usuario';?>" title="Ir a Recuperar Acceso">Recuperar Acceso</b></a>.
                      </span>  
                    </div>
                  </div>
                <!-- fin formulario-->
            </form>
 
                </div><!-- /.card -->


    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
