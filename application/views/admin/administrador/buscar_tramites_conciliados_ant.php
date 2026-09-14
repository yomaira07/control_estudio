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
                      <div class="alert alert-success" role="alert">Buscar Período del Registro del <b>Trámites Administrativos Conciliados</b></div>
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
                        <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-success"><i class="fas fa-copy"></i></span>

              <div class="info-box-content">             
                <span class="info-box-text">TRÁMITES Y/O SOLICITUDES </span> </a> 
                <span class="info-box-number">Conciliaciones de Trámites Administrativos</span>              
                <span class="info-box-number"></br></span>             
              </div>
              <!-- /.info-box-content  -->
            </div>
            <!-- /.info-box  -->
          </div> 
           <div class="col-md-3">
            <form action="<?php echo base_url()?>consultas/listconc_tramites/" method="POST" name=carga >
              <div class="form-group">
                <label for="periodo" title="-Dato Obligatorio-">(*) Periodo a Consultar</label>
                      <select class="form-control" name="periodo" id="periodo" required>
                      <option value="">- Seleccione -</option>                                       
                      <?php foreach($periodo as $periodo):
			if($periodo->id>=13){?>
			      <option value="<?php echo $periodo->id;?> "                     
			      </option><?php 
			      echo $periodo->nombre;
			}?>
                      <?php endforeach; ?>
                      </select>              
                  </div>            
                  <div class="col-md-3">
                    <input type="submit" value=" Buscar " class="btn btn-secondary" />
                  </div>      
            </form>  <!-- fin formulario-->
            </div>
          </div>
                </div><!-- /.card -->





    </section>
    <!-- /.content -->



  </div>
  <!-- /.content-wrapper -->       
