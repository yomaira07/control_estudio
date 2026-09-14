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
                            <h3 class="card-title">Listado de Inscritos en la materia </h3>
                          </div>
                          
                         	 <div class="card-body">
                         	 	
                         	 		
                         	 			<div class="card">
								              <div class="card-header border-transparent">
								                <h3 class="card-title"> 
								                	PROGRAMA : <strong><?php echo $datos_materia_programa->programa_nombre ?></strong>
								                	<br>
								                	MATERIA : <strong><?php echo $datos_materia_programa->pensum_nombre ?></strong>
<br>
								                	DOCENTE : <strong><?php echo $datos_materia_programa->primer_nombre.' '.  $datos_materia_programa->primer_apellido;?></strong>
<br>
								                	SECCIÓN : <strong><?php echo $datos_materia_programa->secc ?></strong>
								                	
								                </h3>
							<div class="card-header" align="right">
							<a title="Descargar listado a formato Excel(.xls)" href="<?php  echo base_url()?>dashboard05/dExcel/<?php echo $this->uri->segment(3);?>" target="_blank"><img src="<?php echo base_url(); ?>assets/img/excel.jpg"  alt="Excel" style="width: 10mm; height: 10mm; margin: 0;" /></a>

<a title="Descargar listado a formato Excel(.xls)" href="<?php  echo base_url()?>dashboard05/dPDF_matricula/<?php echo $this->uri->segment(3);?>" target="_blank"><img src="<?php echo base_url(); ?>assets/img/pdf.jpeg"  alt="PDF" style="width: 10mm; height: 10mm; margin: 0;" /></a>
							</div>

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
								                      <th>correo</th>
								                      <th>Tel-Casa</th>
								                      <th>Tel-Celular</th>
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
