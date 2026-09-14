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
                          <div aling="center"><br>   <i class="fas far fa-bookmark"> Recuperar Usuario.</i>
                          <br>(SOLO ESTUDIANTES REGULARES O EGRESADOS)
                      <br>Sistema de Control de Estudio de la Escuela Nacional de Fiscales del Ministerio Público (SCE-ENFMP)
                         
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
            <form action="<?php echo base_url()?>admin/usuario/recuperar_acceso" method="POST" name=carga  >
                <input type="hidden" name="fecha_registro" value="<?php echo date('d-m-Y H:i:s'); ?>">
                <p>Indique su N° de cédula de identidad registrada en nuestra plataforma.</p>

                    <div class="form-group" align="center">
                       <div class="row"> 
                            <div class="col-3">
                              <label for="cedula">(*) Cédula de Identidad:</label>
                            </div>                                   
                            <div class="col-1">
                       <select class="form-control" name="cod_nacionalidad" id="cod_nacionalidad" required>
                              <option value="V">V</option>
                              <option value="E">E</option> 
                             
                            </select>
                      </div>
                      <div class="col-4">
                        <input type="text" class="form-control" id="cedula" name="cedula" maxlength="9" minlength="6" onkeypress="return controltag(event)" onkeypress="javascript:validar(this.value);" value=""required>
                      </div>
                    </div>
                </div>
                       <p></p>
                  <hr style="color;grey;">
                   <d
                   
                         <hr style="color;grey;">
                        <div class="form-group" align="center" >
                         <div class="row">                      
                  </div>
                </div>
               


                 <p></p>                  
                 <hr style="color;grey;">
            <!-- fin formulario-->           
                  
                  <div align="center"><button type="submit" class="btn btn-primary">Recuperar</button>
                  </div>
                         
   
                </div><!-- /.card -->


    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
