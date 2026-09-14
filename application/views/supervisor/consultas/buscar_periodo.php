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
			<table>
				<tr>
					<td colspan="2" >
					<img src="<?php echo base_url(); ?>assets/img/excel.jpg"  alt="Excel" style="width: 10mm; height: 10mm; margin: 0;" /><a href="<?php echo base_url()?>consultas/dExcel_inscritos_anual" title="2024">Año 2024</a>
					</td>
				</tr>
			</table>  
            	</div>
          </div>
                </div><!-- /.card -->


    </section>
    <!-- /.content -->



  </div>
  <!-- /.content-wrapper -->       
