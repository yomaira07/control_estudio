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
                         <h3 class="card-title"><strong>Constancia de Participación Docente</strong></h3>
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
            <form action="<?php echo base_url()?>dashboard06/descargar_constancia_docente" method="POST" name=carga >
              <div class="form-group">
                <label for="periodo" title="-Dato Obligatorio-">(*) Indicar la unidad curricular para generar la constancia</label>
                      <select class="form-control" name="unidad_curricular" id="unidad_curricular" required>
                      <option value="">- Seleccione -</option>                                       
                      <?php foreach($unidades_curriculares as $unidades_curriculares):?>
                      <option value="<?php echo $unidades_curriculares->id;?>"                     
                      </option><?php 
                      echo $unidades_curriculares->programa_nombre.' / '.$unidades_curriculares->nombre;?>
                      <?php endforeach; ?>
                      </select>              
                  </div>            
                  <div class="col-md-3">
                    <input type="submit" value=" Generar Constancia " class="btn btn-primary" />
                  </div>      
            </form>  <!-- fin formulario-->
            </div>
          </div>
                </div><!-- /.card -->





    </section>
    <!-- /.content -->



  </div>
  <!-- /.content-wrapper -->       
