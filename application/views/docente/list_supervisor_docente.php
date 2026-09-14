  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
    <!-- /.container-fluid -->
   
    </section>

    <!-- Main content -->
     <section class="content">
      <script language="javascript">

  function anterior()
  { 
    location.href="inscripcion/";
  }
  </script>
  <div class="card-body">
                        <!-- Mensaje de Alerta-->
                        <?php  if ($this->session->flashdata("error")): ?>
                        <div class="alert alert-danger alert-dismissible">
                          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                          <p><i class="icon fa fa-ban"></i> <?php echo $this->session->flashdata("error"); ?> </p>
                        </div>
                      <?php endif; ?>
      <!-- /.card -->
      <div class="card-header"> <img src="<?php echo base_url(); ?>assets/img/logo2.png"  width="50px" height="50px"/> BIENVENIDO (A), Mi estimada y estimado Supervisor docente adscrito a la Dirección de Investigación y Postgrado</div>
       
       
        <hr>
        <br><br>
        <div ><h4><b>NOTA INFORMATIVA:</b></h4></div>
         <br>
        <div>
          <h4>En esta sección podrán ser revisadas y actualizadas las notas académicas de los estudiantes y planes de evaluaciones cargados por el personal docente en las respectivas unidades curriculares del período académico vigente.          
          </h4>
          </div>

          </div>  


                      </div><!-- /.card --> 
                  </div><!-- /.card-body -->
              </div><!-- /.card card-primary card-outline -->

        <!-- /.card-body -->

      <!-- /.card card-primary card-outline -->

      </section><!-- /.section-->
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
