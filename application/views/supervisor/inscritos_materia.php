<script language="javascript">

 function anterior()
  { 
    location.href="/control_estudio/dashboard05/cupos_materias";
  }

</script>
 <!-- Content Wrapper. Contains page content -->
  
	<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
    <!-- /.container-fluid -->
   
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- /.card -->
              <div class="card card-primary card-outline">
                  <div class="card-body">
                      <div class="card">
          
                          <div class="card-header">
                            <h3 class="card-title"><b> Listado de Estudiantes con Materias Pre-Inscritas     </b></h3>    
                            <tr>
                            <td ><div align="center">
        						<input type="button" name="btnSeguiente" value="Regresar" class="boton btn btn-info"  title="Regresar" onClick="anterior();"></div>
        					</td>
        					</tr>
                          </div>

                         	 <div class="card-body">                    	 	
                         	 		
                         	 			<div class="card">
								              <div class="card-header border-transparent">
								                <h3 class="card-title"><?php
								                if(!empty($materia_inscrita)):													
                      									foreach($materia_inscrita as $materia_inscrita1):
                      									$codigo =$materia_inscrita1->codigo;
                      									$nombre=$materia_inscrita1->nombre;
                      									$nombre_programa=$materia_inscrita1->programa_nombre;
                      									 endforeach;
                      									endif;
                      									
                      									 ?>
                      									  <b><?php echo $nombre_programa?></b> <br>
                      									 <b>Materia:</b><?php echo $codigo?><b><br>
                      									 <?php echo $nombre?></b>	
                      									 </h3>

								                <div class="card-tools">
								                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
								                    <i class="fas fa-minus"></i>
								                  </button>
								                  <button type="button" class="btn btn-tool" data-card-widget="remove">
								                    <i class="fas fa-times"></i>
								                  </button>
								                </div>
								              </div>
								              <!-- /.card-header -->
								              <div class="card-body p-0">
								                <div class="table-responsive">
								                  <table class="table m-0">
								                    <thead>
								                    <tr>
								                      <th>#</th>
								                      <th>Nac</th>
								                      <th>Cedula</th>
								                      <th>Nombre</th>
								                      <th>Correo</th>
								                      <th>Tel-Casa</th>
								                      <th>Tel-Celular</th>
								                      <th>Status</th>
								                    </tr>
								                    </thead>
								                    <tbody>
								                    <?php if(!empty($materia_inscrita)):?>
                      									<?php 
														$num = 0 ;
                      									foreach($materia_inscrita as $materia_inscrita):
                      									$num = $num + 1;
                      										?>
								                    <tr>
								                      <td><?php echo $num; ?></td>
								                      <td><?php echo $materia_inscrita->nacionalidad; ?></td>
								                      <td><?php echo $materia_inscrita->cedula; ?></td>
								                      <td><?php echo $materia_inscrita->primer_nombre; ?> <?php echo $materia_inscrita->segundo_nombre; ?> <?php echo $materia_inscrita->primer_apellido; ?> <?php echo $materia_inscrita->segundo_apellido; ?></td>
								                      <td><?php echo $materia_inscrita->correo; ?></td>
								                      <td><?php echo $materia_inscrita->tel_hab; ?></td>
								                      <td><?php echo $materia_inscrita->tel_cel; ?>
								                      </td>
								                      <td>
								                      	<?php
								                      	if ($materia_inscrita->rev_academica==1) {
									                     echo "<img width='25px' height='25px'src='../../assets/img/button_green.png'> ";
									                   }else{
									                    echo "<img width='25px' height='25px'src='../../assets/img/button_gray.png'> ";
									                    }
									                     ?>
								                      </td>
								                    </tr>
								                   		<?php endforeach;?>
                  									<?php endif;?> 
								                    </tbody>
								                  </table>
								                </div>
								                <!-- /.table-responsive -->
								              </div>
								              <!-- /.card-body -->
								            </div>
								         <br>
								         <br>
								          
								            

                         	 		
          					</div>
                              
                      </div><!-- /.card --> 
                  </div><!-- /.card-body -->
              </div><!-- /.card card-primary card-outline -->

    </section><!-- /.section-->
    <!-- /.content -->

 </div>
  <!-- /.content-wrapper -->
