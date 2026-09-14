<script>
jQuery(document).ready(function($) {
  $('#menu-3').attr('class','active');
});
</script>  
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
                      <div class="alert alert-info" role="alert">Buscar Cedula del Estudiante </div>
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
           <div class="col-md-3">
            <form action="<?php echo base_url()?>consultas/listado_cedula/" method="POST" name=carga >
              <div class="form-group">
                <label for="periodo" title="-Dato Obligatorio-">(*) Cédula a Consultar</label>
                      <input  type="numeric"class="form-control" name="cedula" id="cedula" placeholder="Indique la cedula sin puntos Ej.13123745"value=""required>
                     
                  </div>            
                  <div class="col-md-3">
                    <input type="submit" value=" Buscar " class="btn btn-info" />
                  </div>      
            </form>  <!-- fin formulario-->
            </div>
          </div>
                </div><!-- /.card -->





    </section>
    <!-- /.content -->



  </div>
  <!-- /.content-wrapper -->       
