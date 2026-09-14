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
       <div class="card-header"> <img src="<?php echo base_url(); ?>assets/img/logo2.png"  width="50px" height="50px"/> BIENVENIDO (A), Mi estimada y estimado docente</div>
       
      <div align="center"><h4>Para prestar servicios en la Escuela Nacional de Fiscales del Ministerio Público, como docente adscrito a la Dirección de Investigación y Postgrado </h4></div>
        <div align="center"><h1><b>PROPORCIONAR LA INFORMACIÓN SOLICITADA EN EL MENÚ DE PERFIL DOCENTE Y ADJUNTAR LOS REQUISITOS <br>(ver a la izquierda).</b></h1></div>
        <hr>
        <br><br>
        <div ><h4><b>NOTA INFORMATIVA:</b></h4></div>
         <br>
        <div><h4>
          <h4>Para lograr el éxito en su registro en línea, debe suministrar los datos y documentos necesarios a fin de tener su perfil docente completo en nuestra casa de estudios. Este requerimiento se hará cada trimestre que sea convocada(o) a dar clases, a efectos de mantenerlo actualizado.
          <br> <br> 
          Dichos datos y requisitos son exigidos para: elaborar contrato y generar pago, base de datos actualizada de docentes, verificación del plan de clases y evaluación, carga de calificaciones con base a cada estrategia evaluativa, notas finales y constancia de servicio prestado.
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
