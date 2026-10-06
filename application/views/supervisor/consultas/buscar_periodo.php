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
                      <div class="alert alert-info" role="alert">Buscar Período de Inscripción</div>
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
            <form action="<?php echo base_url()?>consultas/listado_general/" method="POST" name=carga >
              <div class="form-group">
                <label for="periodo" title="-Dato Obligatorio-">(*) Periodo a Consultar</label>
                      <select class="form-control" name="periodo" id="periodo" required>
                      <option value="">- Seleccione -</option>                                       
                      <?php foreach($periodo as $periodo):?>
                      <option value="<?php echo $periodo->id;?> "                     
                      </option><?php 
                      echo $periodo->nombre;?>
                      <?php endforeach; ?>
                      </select>              
                  </div>            
                  <div class="col-md-3">
                    <input type="submit" value=" Buscar " class="btn btn-info" />
                  </div>      
            </form>  <!-- fin formulario-->
            </div>
          </div>
                </div><!-- /.card -->


<div class="card">
          
                 <div class="card-header">
                      <div class="alert alert-secondary" role="alert">Matrículas Estudiantiles Anuales</div>

                 </div>

                <div class="card-body">
    <div class="card card-outline" style="border-radius:8px; border-left:4px solid #1a8a3f; border-top:none; box-shadow:0 2px 8px rgba(0,0,0,0.05);">
        <div class="card-header" style="background:#f0fdf4; border-bottom:1px solid #e8e8e8; padding:8px 15px; border-radius:8px 8px 0 0;">
            <h6 class="mb-0" style="font-weight:600; color:#1a8a3f;">
                <i class="fas fa-file-excel mr-2"></i>
                Reportes anuales de inscritos
            </h6>
        </div>
        <div class="card-body p-3">
            <p class="mb-3" style="color:#6c757d; font-size:0.85rem;">
                <i class="fas fa-info-circle text-info mr-1"></i>
                Descarga los reportes en formato Excel por año.
            </p>
            <div class="d-flex flex-wrap" style="gap: 10px;">
                <a href="<?php echo base_url(); ?>consultas/dExcel_inscritos_anual"
                   class="btn btn-success"
                   style="border-radius:8px; padding:8px 18px; font-weight:500; display:inline-flex; align-items:center; gap:8px; background:#1a8a3f; border-color:#1a8a3f;"
                   title="Descargar reporte año 2024">
                    <i class="fas fa-file-excel"></i>
                    Año 2024
                </a>
                <a href="<?php echo base_url(); ?>consultas/dExcel_inscritos_anual_2025"
                   class="btn btn-success"
                   style="border-radius:8px; padding:8px 18px; font-weight:500; display:inline-flex; align-items:center; gap:8px; background:#1a8a3f; border-color:#1a8a3f;"
                   title="Descargar reporte año 2025">
                    <i class="fas fa-file-excel"></i>
                    Año 2025
                </a>
                <a href="<?php echo base_url(); ?>consultas/dExcel_inscritos_anual_2026"
                   class="btn btn-success"
                   style="border-radius:8px; padding:8px 18px; font-weight:500; display:inline-flex; align-items:center; gap:8px; background:#1a8a3f; border-color:#1a8a3f;"
                   title="Descargar reporte año 2026">
                    <i class="fas fa-file-excel"></i>
                    Año 2026
                </a>
            </div>
        </div>
    </div>
</div>
          </div>
                </div><!-- /.card -->


    </section>
    <!-- /.content -->



  </div>
  <!-- /.content-wrapper -->       
