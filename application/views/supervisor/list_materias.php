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
                            <h3 class="card-title">Listado de Materias Pre-Inscritas Período Académico  <?php  echo $periodo->nombre;?> </h3>
                          </div>
                          
                         	 <div class="card-body">
                         	 	<div class="row">
                         	 		<div class="col-md-6">
                         	 			<div class="card">
								              <div class="card-header border-transparent">
								                <h3 class="card-title">ESPECIALIZACIÓN EN EJERCICIO DE LA FUNCIÓN FISCAL</h3>

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
								                      <th>Código</th>
								                      <th>Materia</th>
								                      <th>Modalidad</th>
										      <th>Horario</th>
								                      <th>Trimestre</th>
								                      <th><div  align="center">Total de Estudiantes </div></th>	
								                      <th><div  align="center">Secciones Abiertas </div> </th >
								                      <th><div  align="center">Cupos Disponibles </div></th>                 
								                       
								                    </tr>
								                    </thead>
								                    <tbody>
								                    <?php if(!empty($materias_eeff)): ?>
                      									<?php 

                      									foreach($materias_eeff as $materias_eeff):?>
								                    <tr>
								                      <td><a href="<?php echo base_url()?>dashboard05/materias_inscritas/<?php echo $materias_eeff->id; ?>"><?php echo $materias_eeff->codigo; ?></a></td>
								                      <td><?php echo $materias_eeff->unidad_curricular; ?></td>
											  <td><span class="badge badge-info"><?php if($materias_eeff->modalidad==1) echo "PRESENCIAL";elseif($materias_eeff->modalidad==2) echo "VIRTUAL";elseif($materias_eeff->modalidad==3) echo "SEMIPRESENCIAL"; ?></span></td>
<td><span ><?php echo $materias_eeff->dia.'- '.$materias_eeff->horario; ?></span></td>
								                      <td><span class="badge badge-success"><?php echo $materias_eeff->trimestre; ?></span></td>
								                      <td>
								                        <div class="sparkbar" data-color="#00a65a" data-height="20" align="center"><?php 
								                        echo $materias_eeff->ocupados; ?>
								                        	
								                        </div>
								                      </td>								                       
								                        <?php
								                        if($materias_eeff->ocupados > $materias_eeff->cupos){
															$seccion=$materias_eeff->ocupados/$materias_eeff->cupos;
															list($entero, $decimal) =explode('.', $seccion);
															//echo $entero;
															//echo $decimal;
															$disponible=0;
															$seccion_ent=0;
															if($decimal>0){
																$seccion=$entero + 1;

																$seccion_ent=$entero;
																
																$disponible=$seccion_ent * $materias_eeff->cupos;

																$disponible= $materias_eeff->ocupados- $disponible ;
																$disponible= $materias_eeff->cupos- $disponible ;
															}				
								                    	}else{
															$seccion=1;
															$disponible=$materias_eeff->cupos - $materias_eeff->ocupados;
								                        }?>
								                        <td>
								                        <div class="sparkbar" data-color="#00a65a" data-height="20" align="center" ><?php echo  $seccion; ?></div>
								                        </td>
								                        <td>
								                        <div class="sparkbar" data-color="#00a65a" data-height="20"  align="center" ><?php echo $disponible; ?></div>
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
								            <div class="card">
								              <div class="card-header border-transparent">
								                <h3 class="card-title">ESPECIALIZACIÓN EN DERECHO PENAL</h3>

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
								                      <th>Código</th>
								                      <th>Materia</th>

								                      <th>Modalidad</th>
 <th>Horario</th>
								                      <th>Trimestre</th>
								                      <th><div  align="center">Total de Estudiantes </div></th>	
								                      <th><div  align="center">Secciones Abiertas </div> </th >
								                      <th><div  align="center">Cupos Disponibles </div></th>                     
								                    </tr>
								                    </thead>
								                    <tbody>
								                    <?php if(!empty($materias_edp)):?>
                      									<?php foreach($materias_edp as $materias_edp):?>
								                    <tr>
								                      <td><a href="<?php echo base_url()?>dashboard05/materias_inscritas/<?php echo $materias_edp->id; ?>"><?php echo $materias_edp->codigo; ?></a>
								                      </td>
								                      <td><?php echo $materias_edp->unidad_curricular; ?></td>								                        
  <td><span class="badge badge-info"><?php if($materias_edp->modalidad==1) echo "PRESENCIAL";elseif($materias_edp->modalidad==2) echo "VIRTUAL";elseif($materias_edp->modalidad==3) echo "SEMIPRESENCIAL" ?></span></td>		
<td><span ><?php echo $materias_edp->dia.'- '.$materias_edp->horario; ?></span></td>						           
           <td><span class="badge badge-success">
								                      		<?php echo $materias_edp->trimestre; ?> 
								                      </span>
								                      </td>		
								                       <td>
								                        <div class="sparkbar" data-color="#00a65a" data-height="20" align="center"><?php // $materias_edp->ocupados=80; 
								                        echo $materias_edp->ocupados; ?>
								                        	
								                        </div>
								                      </td>							                       
								                        <?php
								                        if($materias_edp->ocupados > $materias_edp->cupos){
															$seccion=$materias_edp->ocupados/$materias_edp->cupos;
															list($entero, $decimal) =explode('.', $seccion);
															//echo $entero;
															//echo $decimal;
															$disponible=0;
															$seccion_ent=0;
															$seccion=0;
															if($decimal>0){
																$seccion=$entero + 1;

																$seccion_ent=$entero;
																
																$disponible=$seccion_ent * $materias_edp->cupos;

																$disponible= $materias_edp->ocupados- $disponible ;
																$disponible= $materias_edp->cupos- $disponible ;
															}				
								                    	}else{
															$seccion=1;
															$disponible=$materias_edp->cupos - $materias_edp->ocupados;
								                        }?>
								                        <td>
								                        	<div class="sparkbar" data-color="#00a65a" data-height="20" align="center" ><?php echo  $seccion; ?></div>
								                        </td>
								                        <td>
								                        	<div class="sparkbar" data-color="#00a65a" data-height="20"  align="center" ><?php echo $disponible; ?></div>
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

								            <div class="card">
								              <div class="card-header border-transparent">
								                <h3 class="card-title">ESPECIALIZACIÓN EN DERECHO PROBATORIO</h3>

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
								                      <th>Código</th>
								                      <th>Materia</th>
										      <th>Modalidad</th>
											 <th>Horario</th>
								                      <th>Trimestre</th>
								                      <th><div  align="center">Total de Estudiantes </div></th>	
								                      <th><div  align="center">Secciones Abiertas </div> </th >
								                      <th><div  align="center">Cupos Disponibles </div></th>                 
								                       
								                    </tr>
								                    </thead>
								                    <tbody>
								                   <?php if(!empty($materias_edpr)):?>
                      									<?php foreach($materias_edpr as $materias_edpr):?>
								                    <tr>
								                      <td><a href="<?php echo base_url()?>dashboard05/materias_inscritas/<?php echo $materias_edpr->id; ?>"><?php echo $materias_edpr->codigo; ?></a></td>
								                      <td><?php echo $materias_edpr->unidad_curricular; ?></td>
										  <td><span class="badge badge-info"><?php if($materias_edpr->modalidad==1) echo "PRESENCIAL";elseif($materias_edpr->modalidad==2) echo "VIRTUAL";elseif($materias_edpr->modalidad==3) echo "SEMIPRESENCIAL" ?></span></td>
<td><span ><?php echo $materias_edpr->dia.'- '.$materias_edpr->horario; ?></span></td>
								                      <td><span class="badge badge-success"><?php echo $materias_edpr->trimestre; ?></span>
								                      </td>
								                     
								                     <td>
								                        <div class="sparkbar" data-color="#00a65a" data-height="20" align="center"><?php // $materias_edp->ocupados=80; 
								                        echo $materias_edpr->ocupados; ?>
								                        	
								                        </div>
								                      </td>							                       
								                        <?php
								                        if($materias_edpr->ocupados > $materias_edpr->cupos){
															$seccion=$materias_edpr->ocupados/$materias_edpr->cupos;
															list($entero, $decimal) =explode('.', $seccion);
															//echo $entero;
															//echo $decimal;
															$disponible=0;
															$seccion_ent=0;
															$seccion=0;
															if($decimal>0){
																$seccion=$entero + 1;

																$seccion_ent=$entero;
																
																$disponible=$seccion_ent * $materias_edpr->cupos;

																$disponible= $materias_edpr->ocupados- $disponible ;
																$disponible= $materias_edpr->cupos- $disponible ;
															}				
								                    	}else{
															$seccion=1;
															$disponible=$materias_edpr->cupos - $materias_edpr->ocupados;
								                        }?>
								                        <td>
								                        	<div class="sparkbar" data-color="#00a65a" data-height="20" align="center" ><?php echo  $seccion; ?></div>
								                        </td>
								                        <td>
								                        	<div class="sparkbar" data-color="#00a65a" data-height="20"  align="center" ><?php echo $disponible; ?></div>
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
    <div class="card">
								              <div class="card-header border-transparent">
								                <h3 class="card-title">ESPECIALIZACIÓN EN DEFENSA DE LA MUJER</h3>

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
								                      <th>Código</th>
								                      <th>Materia</th>
											<th>Modalidad/>
								                       <th>Horario</th>
											<th>Trimestre</th>
								                      <th><div  align="center">Total de Estudiantes </div></th>	
								                      <th><div  align="center">Secciones Abiertas </div> </th >
								                      <th><div  align="center">Cupos Disponibles </div></th>                     
								                    </tr>
								                    </thead>
								                    <tbody>
								                    <?php if(!empty($materias_cppdm)):?>
                      									<?php foreach($materias_cppdm as $materias_cppdm):?>
								                    <tr>
								                      <td><a href="<?php echo base_url()?>dashboard05/materias_inscritas/<?php echo $materias_cppdm->id; ?>"><?php echo $materias_cppdm->codigo; ?></a>
								                      </td>
								                      <td><?php echo $materias_cppdm->unidad_curricular; ?></td>
										      <td><span class="badge badge-info"><?php if($materias_cppdm->modalidad==1) echo "PRESENCIAL";elseif($materias_cppdm->modalidad==2) echo "VIRTUAL"; elseif($materias_cppdm->modalidad==3) echo "SEMIPRESENCIAL";?></span></td>
<td><span ><?php echo $materias_cppdm->dia.'- '.$materias_cppdm->horario; ?></span></td>								           
								                      <td><span class="badge badge-success">
								                      		<?php echo $materias_cppdm->trimestre; ?> 
								                      </span>
								                      </td>		
								                       <td>
								                        <div class="sparkbar" data-color="#00a65a" data-height="20" align="center"><?php // $materias_cppdm->ocupados=80; 
								                        echo $materias_cppdm->ocupados; ?>
								                        	
								                        </div>
								                      </td>							                       
								                        <?php
								                        if($materias_cppdm->ocupados > $materias_cppdm->cupos){
															$seccion=$materias_cppdm->ocupados/$materias_cppdm->cupos;
															list($entero, $decimal) =explode('.', $seccion);
															//echo $entero;
															//echo $decimal;
															$disponible=0;
															$seccion_ent=0;
															$seccion=0;
															if($decimal>0){
																$seccion=$entero + 1;

																$seccion_ent=$entero;
																
																$disponible=$seccion_ent * $materias_cppdm->cupos;

																$disponible= $materias_cppdm->ocupados- $disponible ;
																$disponible= $materias_cppdm->cupos- $disponible ;
															}				
								                    	}else{
															$seccion=1;
															$disponible=$materias_cppdm->cupos - $materias_cppdm->ocupados;
								                        }?>
								                        <td>
								                        	<div class="sparkbar" data-color="#00a65a" data-height="20" align="center" ><?php echo  $seccion; ?></div>
								                        </td>
								                        <td>
								                        	<div class="sparkbar" data-color="#00a65a" data-height="20"  align="center" ><?php echo $disponible; ?></div>
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
 <div class="card">
										<div class="card-header border-transparent">
								                <h3 class="card-title">LÍNEAS DE INVESTIGACIÓN ESPECIALIZACIONES</h3>

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
								                      <th>Código</th>
								                      <th>Materia</th>
											<th>Modalidad</th>
											<th>Horario</th>
								                      <th>Trimestre</th>
								                      <th><div  align="center">Total de Estudiantes </div></th>	
								                      <th><div  align="center">Secciones Abiertas </div> </th >
								                      <th><div  align="center">Cupos Disponibles </div></th>   
								                    </tr>
								                    </thead>
								                    <tbody>
								                    <?php if(!empty($materias_tegr)):?>
                      									<?php foreach($materias_tegr as $materias_tegr):?>
								                    <tr>
								                      <td><a href="<?php echo base_url()?>dashboard05/materias_inscritas/<?php echo $materias_tegr->id; ?>"><?php echo $materias_tegr->codigo; ?></a></td>
								                      <td><?php echo $materias_tegr->unidad_curricular; ?></td>
										      <td><span class="badge badge-info"><?php if($materias_tegr->modalidad==1) echo "PRESENCIAL";elseif($materias_tegr->modalidad==2) echo "VIRTUAL"; elseif($materias_tegr->modalidad==3) echo "SEMIPRESENCIAL";?></span></td>
<td><span ><?php echo $materias_tegr->dia.'- '.$materias_tegr->horario; ?></span></td>							           
								                      <td><span class="badge  badge-success"><?php echo $materias_tegr->trimestre; ?></span></td>
								                     
								                       <td>
								                        <div class="sparkbar" data-color="#00a65a" data-height="20" align="center"><?php // $materias_ecc->ocupados=80; 
								                        echo $materias_tegr->ocupados; ?>
								                        	
								                        </div>
								                      </td>							                       
								                        <?php
								                        if($materias_tegr->ocupados > $materias_tegr->cupos){
															$seccion=$materias_tegr->ocupados/$materias_tegr->cupos;
															list($entero, $decimal) =explode('.', $seccion);
															//echo $entero;
															//echo $decimal;
															$disponible=0;
															$seccion_ent=0;
															$seccion=0;
															if($decimal>0){
																$seccion=$entero + 1;

																$seccion_ent=$entero;
																
																$disponible=$seccion_ent * $materias_tegr->cupos;

																$disponible= $materias_tegr->ocupados- $disponible ;
																$disponible= $materias_tegr->cupos- $disponible ;
															}				
								                    	}else{
															$seccion=1;
															$disponible=$materias_tegr->cupos - $materias_tegr->ocupados;
								                        }?>
								                        <td>
								                        	<div class="sparkbar" data-color="#00a65a" data-height="20" align="center" ><?php echo  $seccion; ?></div>
								                        </td>
								                        <td>
								                        	<div class="sparkbar" data-color="#00a65a" data-height="20"  align="center" ><?php echo $disponible; ?></div>
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
                         	 			<div class="card">
								              <div class="card-header border-transparent">
								                <h3 class="card-title">MAESTRIA JUSTICIA PENAL</h3>

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
								                      <th>Código</th>
								                      <th>Materia</th>
										     <th>Modalidad</th>
										     <th>Horario</th>
								                      <th>Trimestre</th>
								                      <th><div  align="center">Total de Estudiantes </div></th>	
								                      <th><div  align="center">Secciones Abiertas </div> </th >
								                      <th><div  align="center">Cupos Disponibles </div></th>                 
								                       
								                    </tr>
								                    </thead>
								                    <tbody>
								                    <?php if(!empty($materias_cppjp)): ?>
                      									<?php 

                      									foreach($materias_cppjp as $materias_cppjp):?>
								                    <tr>
								                      <td><a href="<?php echo base_url()?>dashboard05/materias_inscritas/<?php echo $materias_cppjp->id; ?>"><?php echo $materias_cppjp->codigo; ?></a></td>
								                      <td><?php echo $materias_cppjp->unidad_curricular; ?></td>
										 <td><span class="badge badge-info"><?php if($materias_cppjp->modalidad==1) echo "PRESENCIAL";elseif($materias_cppjp->modalidad==2) echo "VIRTUAL";elseif($materias_cppjp->modalidad==3) echo "SEMIPRESENCIAL"; ?></span></td>
<td><span ><?php echo $materias_cppjp->dia.'- '.$materias_cppjp->horario; ?></span></td>								           
								                      <td><span class="badge badge-success"><?php echo $materias_cppjp->trimestre; ?></span></td>
								                      <td>
								                        <div class="sparkbar" data-color="#00a65a" data-height="20" align="center"><?php 
								                        echo $materias_cppjp->ocupados; ?>
								                        	
								                        </div>
								                      </td>								                       
								                        <?php
								                        if($materias_cppjp->ocupados > $materias_cppjp->cupos){
															$seccion=$materias_cppjp->ocupados/$materias_cppjp->cupos;
															list($entero, $decimal) =explode('.', $seccion);
															//echo $entero;
															//echo $decimal;
															$disponible=0;
															$seccion_ent=0;
															if($decimal>0){
																$seccion=$entero + 1;

																$seccion_ent=$entero;
																
																$disponible=$seccion_ent * $materias_cppjp->cupos;

																$disponible= $materias_cppjp->ocupados- $disponible ;
																$disponible= $materias_cppjp->cupos- $disponible ;
															}				
								                    	}else{
															$seccion=1;
															$disponible=$materias_cppjp->cupos - $materias_cppjp->ocupados;
								                        }?>
								                        <td>
								                        <div class="sparkbar" data-color="#00a65a" data-height="20" align="center" ><?php echo  $seccion; ?></div>
								                        </td>
								                        <td>
								                        <div class="sparkbar" data-color="#00a65a" data-height="20"  align="center" ><?php echo $disponible; ?></div>
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
                         	 		</div>
  <br>
								            <br>
                         	 		<div class="col-md-6">
                         	 			
                         	 			<div class="card">
								              <div class="card-header border-transparent">
								                <h3 class="card-title">ESPECIALIZACIÓN EN DERECHO PROCESAL PENAL</h3>

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
								                      <th>Código</th>
								                      <th>Materia</th>
										      <th>Modalidad</th>
											 <th>Horario</th>
								                      <th>Trimestre</th>
								                      <th><div  align="center">Total de Estudiantes </div></th>	
								                      <th><div  align="center">Secciones Abiertas </div> </th >
								                      <th><div  align="center">Cupos Disponibles </div></th>   
								                    </tr>
								                    </thead>
								                    <tbody>
								                   <?php if(!empty($materias_edpp)):?>
                      									<?php foreach($materias_edpp as $materias_edpp):?>
								                    <tr>
								                      <td><a href="<?php echo base_url()?>dashboard05/materias_inscritas/<?php echo $materias_edpp->id; ?>"><?php echo $materias_edpp->codigo; ?></a></td>
								                      <td><?php echo $materias_edpp->unidad_curricular; ?></td>
										  <td><span class="badge badge-info"><?php if($materias_edpp->modalidad==1) echo "PRESENCIAL";elseif($materias_edpp->modalidad==2) echo "VIRTUAL";elseif($materias_edpp->modalidad==3) echo "SEMIPRESENCIAL"; ?></span></td>	
<td><span ><?php echo $materias_edpp->dia.'- '.$materias_edpp->horario; ?></span></td>							           
								                      <td><span class="badge badge-success"><?php echo $materias_edpp->trimestre; ?></span></td>
								                      
								                       <td>
								                        <div class="sparkbar" data-color="#00a65a" data-height="20" align="center"><?php // $materias_edp->ocupados=80; 
								                        echo $materias_edpp->ocupados; ?>
								                        	
								                        </div>
								                      </td>							                       
								                        <?php
								                        if($materias_edpp->ocupados > $materias_edpp->cupos){
															$seccion=$materias_edpp->ocupados/$materias_edpp->cupos;
															list($entero, $decimal) =explode('.', $seccion);
															//echo $entero;
															//echo $decimal;
															$disponible=0;
															$seccion_ent=0;
															$seccion=0;
															if($decimal>0){
																$seccion=$entero + 1;

																$seccion_ent=$entero;
																
																$disponible=$seccion_ent * $materias_edpp->cupos;

																$disponible= $materias_edpp->ocupados- $disponible ;
																$disponible= $materias_edpp->cupos- $disponible ;
															}				
								                    	}else{
															$seccion=1;
															$disponible=$materias_edpp->cupos - $materias_edpp->ocupados;
								                        }?>
								                        <td>
								                        	<div class="sparkbar" data-color="#00a65a" data-height="20" align="center" ><?php echo  $seccion; ?></div>
								                        </td>
								                        <td>
								                        	<div class="sparkbar" data-color="#00a65a" data-height="20"  align="center" ><?php echo $disponible; ?></div>
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

								            <div class="card">
								              <div class="card-header border-transparent">
								                <h3 class="card-title">ESPECIALIZACIÓN EN MEDICINA FORENSE</h3>

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
								                      <th>Código</th>
								                      <th>Materia</th>
											<th>Modalidad</th>
											 <th>Horario</th>
								                      <th>Trimestre</th>
								                      <th><div  align="center">Total de Estudiantes </div></th>	
								                      <th><div  align="center">Secciones Abiertas </div> </th >
								                      <th><div  align="center">Cupos Disponibles </div></th>   
								                    </tr>
								                    </thead>
								                    <tbody>
								                   <?php if(!empty($materias_emf)):?>
                      									<?php foreach($materias_emf as $materias_emf):?>
								                    <tr>
								                      <td><a href="<?php echo base_url()?>dashboard05/materias_inscritas/<?php echo $materias_emf->id; ?>"><?php echo $materias_emf->codigo; ?></a></td>
								                      <td><?php echo $materias_emf->unidad_curricular; ?></td>
  										  <td><span class="badge badge-info"><?php if($materias_emf->modalidad==1) echo "PRESENCIAL";elseif($materias_emf->modalidad==2) echo "VIRTUAL";elseif($materias_emf->modalidad==3) echo "SEMIPRESENCIAL"; ?></span></td>		
<td><span ><?php echo $materias_emf->dia.'- '.$materias_emf->horario; ?></span></td>							           
								                      <td><span class="badge badge-success"><?php echo $materias_emf->trimestre; ?></span></td>
								                     
								                      
								                       <td>
								                        <div class="sparkbar" data-color="#00a65a" data-height="20" align="center"><?php // $materias_edp->ocupados=80; 
								                        echo $materias_emf->ocupados; ?>
								                        	
								                        </div>
								                      </td>							                       
								                        <?php
								                        if($materias_emf->ocupados > $materias_emf->cupos){
															$seccion=$materias_emf->ocupados/$materias_emf->cupos;
															list($entero, $decimal) =explode('.', $seccion);
															//echo $entero;
															//echo $decimal;
															$disponible=0;
															$seccion_ent=0;
															$seccion=0;
															if($decimal>0){
																$seccion=$entero + 1;

																$seccion_ent=$entero;
																
																$disponible=$seccion_ent * $materias_emf->cupos;

																$disponible= $materias_emf->ocupados- $disponible ;
																$disponible= $materias_emf->cupos- $disponible ;
															}				
								                    	}else{
															$seccion=1;
															$disponible=$materias_emf->cupos - $materias_emf->ocupados;
								                        }?>
								                        <td>
								                        	<div class="sparkbar" data-color="#00a65a" data-height="20" align="center" ><?php echo  $seccion; ?></div>
								                        </td>
								                        <td>
								                        	<div class="sparkbar" data-color="#00a65a" data-height="20"  align="center" ><?php echo $disponible; ?></div>
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
								            <div class="card">
								              <div class="card-header border-transparent">
								                <h3 class="card-title">ESPECIALIZACIÓN EN CRIMINALÍSTICA DE CAMPO</h3>

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
								                      <th>Código</th>
								                      <th>Materia</th>
											<th>Modalidad</th>
											 <th>Horario</th>
								                      <th>Trimestre</th>
								                      <th><div  align="center">Total de Estudiantes </div></th>	
								                      <th><div  align="center">Secciones Abiertas </div> </th >
								                      <th><div  align="center">Cupos Disponibles </div></th>   
								                    </tr>
								                    </thead>
								                    <tbody>
								                    <?php if(!empty($materias_ecc)):?>
                      									<?php foreach($materias_ecc as $materias_ecc):?>
								                    <tr>
								                      <td><a href="<?php echo base_url()?>dashboard05/materias_inscritas/<?php echo $materias_ecc->id; ?>"><?php echo $materias_ecc->codigo; ?></a></td>
								                      <td><?php echo $materias_ecc->unidad_curricular; ?></td>
											 <td><span class="badge badge-info"><?php if($materias_ecc->modalidad==1) echo "PRESENCIAL";elseif($materias_ecc->modalidad==2) echo "VIRTUAL";elseif($materias_ecc->modalidad==3) echo "SEMIPRESENCIAL"; ?></span></td>	
<td><span ><?php echo $materias_ecc->dia.'- '.$materias_ecc->horario; ?></span></td>								           
								                      <td><span class="badge  badge-success"><?php echo $materias_ecc->trimestre; ?></span></td>
								                     
								                       <td>
								                        <div class="sparkbar" data-color="#00a65a" data-height="20" align="center"><?php // $materias_ecc->ocupados=80; 
								                        echo $materias_ecc->ocupados; ?>
								                        	
								                        </div>
								                      </td>							                       
								                        <?php
								                        if($materias_ecc->ocupados > $materias_ecc->cupos){
															$seccion=$materias_ecc->ocupados/$materias_ecc->cupos;
															list($entero, $decimal) =explode('.', $seccion);
															//echo $entero;
															//echo $decimal;
															$disponible=0;
															$seccion_ent=0;
															$seccion=0;
															if($decimal>0){
																$seccion=$entero + 1;

																$seccion_ent=$entero;
																
																$disponible=$seccion_ent * $materias_ecc->cupos;

																$disponible= $materias_ecc->ocupados- $disponible ;
																$disponible= $materias_ecc->cupos- $disponible ;
															}				
								                    	}else{
															$seccion=1;
															$disponible=$materias_ecc->cupos - $materias_ecc->ocupados;
								                        }?>
								                        <td>
								                        	<div class="sparkbar" data-color="#00a65a" data-height="20" align="center" ><?php echo  $seccion; ?></div>
								                        </td>
								                        <td>
								                        	<div class="sparkbar" data-color="#00a65a" data-height="20"  align="center" ><?php echo $disponible; ?></div>
								                        </td>
								                    </tr>
								                   		<?php endforeach;?>
                  									<?php endif;?>
								                    
								                    </tbody>
								                  </table>
								                </div>
								                <!-- /.table-responsive -->
								              </div>
</div>
  <br>
								            <br>
  <div class="card">
								              <div class="card-header border-transparent">
								                <h3 class="card-title">ESPECIALIZACIÓN EN DEFENSA DE LOS DERECHOS HUMANOS</h3>

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
								                      <th>Código</th>
								                      <th>Materia</th>
											<th>Modalidad</th>
											 <th>Horario</th>
								                      <th>Trimestre</th>
								                      <th><div  align="center">Total de Estudiantes </div></th>	
								                      <th><div  align="center">Secciones Abiertas </div> </th >
								                      <th><div  align="center">Cupos Disponibles </div></th>   
								                    </tr>
								                    </thead>
								                    <tbody>
								                    <?php if(!empty($materias_eddhh)):?>
                      									<?php foreach($materias_eddhh as $materias_eddhh):?>
								                    <tr>
								                      <td><a href="<?php echo base_url()?>dashboard05/materias_inscritas/<?php echo $materias_eddhh->id; ?>"><?php echo $materias_eddhh->codigo; ?></a></td>
								                      <td><?php echo $materias_eddhh->unidad_curricular; ?></td>
											 <td><span class="badge badge-info"><?php if($materias_eddhh->modalidad==1) echo "PRESENCIAL";elseif($materias_eddhh->modalidad==2) echo "VIRTUAL";elseif($materias_eddhh->modalidad==3) echo "SEMIPRESENCIAL"; ?></span></td>		
<td><span ><?php echo $materias_eddhh->dia.'- '.$materias_eddhh->horario; ?></span></td>						           
								                      <td><span class="badge  badge-success"><?php echo $materias_eddhh->trimestre; ?></span></td>
								                     
								                       <td>
								                        <div class="sparkbar" data-color="#00a65a" data-height="20" align="center"><?php // $materias_ecc->ocupados=80; 
								                        echo $materias_eddhh->ocupados; ?>
								                        	
								                        </div>
								                      </td>							                       
								                        <?php
								                        if($materias_eddhh->ocupados > $materias_eddhh->cupos){
															$seccion=$materias_eddhh->ocupados/$materias_eddhh->cupos;
															list($entero, $decimal) =explode('.', $seccion);
															//echo $entero;
															//echo $decimal;
															$disponible=0;
															$seccion_ent=0;
															$seccion=0;
															if($decimal>0){
																$seccion=$entero + 1;

																$seccion_ent=$entero;
																
																$disponible=$seccion_ent * $materias_eddhh->cupos;

																$disponible= $materias_eddhh->ocupados- $disponible ;
																$disponible= $materias_eddhh->cupos- $disponible ;
															}				
								                    	}else{
															$seccion=1;
															$disponible=$materias_eddhh->cupos - $materias_eddhh->ocupados;
								                        }?>
								                        <td>
								                        	<div class="sparkbar" data-color="#00a65a" data-height="20" align="center" ><?php echo  $seccion; ?></div>
								                        </td>
								                        <td>
								                        	<div class="sparkbar" data-color="#00a65a" data-height="20"  align="center" ><?php echo $disponible; ?></div>
								                        </td>
								                    </tr>
								                   		<?php endforeach;?>
                  									<?php endif;?>
								                    
								                    </tbody>
								                  </table>
								                </div>
								                <!-- /.table-responsive -->
								              </div>
									</div>	
								              <!-- /.card-body -->
								           
								            <div class="card">
										<div class="card-header border-transparent">
								                <h3 class="card-title">LÍNEAS DE INVESTIGACIÓN MAESTRIAS</h3>

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
								                      <th>Código</th>
								                      <th>Materia</th>
											<th>Modalidad</th>
											 <th>Horario</th>
								                      <th>Trimestre</th>
								                      <th><div  align="center">Total de Estudiantes </div></th>	
								                      <th><div  align="center">Secciones Abiertas </div> </th >
								                      <th><div  align="center">Cupos Disponibles </div></th>   
								                    </tr>
								                    </thead>
								                    <tbody>
								                    <?php if(!empty($materias_tegre)):?>
                      									<?php foreach($materias_tegre as $materias_tegre):?>
								                    <tr>
								                      <td><a href="<?php echo base_url()?>dashboard05/materias_inscritas/<?php echo $materias_tegre->id; ?>"><?php echo $materias_tegre->codigo; ?></a></td>
								                      <td><?php echo $materias_tegre->unidad_curricular; ?></td>
											 <td><span class="badge badge-info"><?php if($materias_tegre->modalidad==1) echo "PRESENCIAL";elseif($materias_tegre->modalidad==2) echo "VIRTUAL";elseif($materias_tegre->modalidad==3) echo "SEMIPRESENCIAL"; ?></span></td>		
<td><span ><?php echo $materias_tegre->dia.'- '.$materias_tegre->horario; ?></span></td>								           
								                      <td><span class="badge  badge-success"><?php echo $materias_tegre->trimestre; ?></span></td>
								                     
								                       <td>
								                        <div class="sparkbar" data-color="#00a65a" data-height="20" align="center"><?php // $materias_ecc->ocupados=80; 
								                        echo $materias_tegre->ocupados; ?>
								                        	
								                        </div>
								                      </td>							                       
								                        <?php
								                        if($materias_tegre->ocupados > $materias_tegre->cupos){
															$seccion=$materias_tegre->ocupados/$materias_tegre->cupos;
															list($entero, $decimal) =explode('.', $seccion);
															//echo $entero;
															//echo $decimal;
															$disponible=0;
															$seccion_ent=0;
															$seccion=0;
															if($decimal>0){
																$seccion=$entero + 1;

																$seccion_ent=$entero;
																
																$disponible=$seccion_ent * $materias_tegre->cupos;

																$disponible= $materias_tegre->ocupados- $disponible ;
																$disponible= $materias_tegre->cupos- $disponible ;
															}				
								                    	}else{
															$seccion=1;
															$disponible=$materias_tegre->cupos - $materias_tegre->ocupados;
								                        }?>
								                        <td>
								                        	<div class="sparkbar" data-color="#00a65a" data-height="20" align="center" ><?php echo  $seccion; ?></div>
								                        </td>
								                        <td>
								                        	<div class="sparkbar" data-color="#00a65a" data-height="20"  align="center" ><?php echo $disponible; ?></div>
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
								<div class="card">
									<div class="card-header border-transparent">
										<h3 class="card-title">MAESTRÍA EN VICTIMOLOGÍA</h3>

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
										<th>Código</th>
										<th>Materia</th>
										<th>Modalidad</th>
										 <th>Horario</th>	
										<th>Trimestre</th>
										<th><div  align="center">Total de Estudiantes </div></th>	
										<th><div  align="center">Secciones Abiertas </div> </th >
										<th><div  align="center">Cupos Disponibles </div></th>                 

										</tr>
										</thead>
										<tbody>
										<?php if(!empty($materias_cppvic)):?>
										<?php foreach($materias_cppvic as $materias_cppvic):?>
										<tr>
										<td><a href="<?php echo base_url()?>dashboard05/materias_inscritas/<?php echo $materias_cppvic->id; ?>"><?php echo $materias_cppvic->codigo; ?></a></td>
										<td><?php echo $materias_cppvic->unidad_curricular; ?></td>
										<td><span class="badge badge-info"><?php if($materias_cppvic->modalidad==1) echo "PRESENCIAL";elseif($materias_cppvic->modalidad==2) echo "VIRTUAL";elseif($materias_cppvic->modalidad==3) echo "SEMIPRESENCIAL"; ?></span></td>			
<td><span ><?php echo $materias_cppvic->dia.'- '.$materias_cppvic->horario; ?></span></td>					           
										<td><span class="badge badge-success"><?php echo $materias_cppvic->trimestre; ?></span>
										</td>

										<td>
										<div class="sparkbar" data-color="#00a65a" data-height="20" align="center"><?php // $materias_edp->ocupados=80; 
										echo $materias_cppvic->ocupados; ?>

										</div>
										</td>							                       
										<?php
										if($materias_cppvic->ocupados > $materias_cppvic->cupos){
										$seccion=$materias_cppvic->ocupados/$materias_cppvic->cupos;
										list($entero, $decimal) =explode('.', $seccion);
										//echo $entero;
										//echo $decimal;
										$disponible=0;
										$seccion_ent=0;
										$seccion=0;
										if($decimal>0){
										$seccion=$entero + 1;

										$seccion_ent=$entero;

										$disponible=$seccion_ent * $materias_cppvic->cupos;

										$disponible= $materias_cppvic->ocupados- $disponible ;
										$disponible= $materias_cppvic->cupos- $disponible ;
										}				
										}else{
										$seccion=1;
										$disponible=$materias_cppvic->cupos - $materias_cppvic->ocupados;
										}?>
										<td>
										<div class="sparkbar" data-color="#00a65a" data-height="20" align="center" ><?php echo  $seccion; ?></div>
										</td>
										<td>
										<div class="sparkbar" data-color="#00a65a" data-height="20"  align="center" ><?php echo $disponible; ?></div>
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
										</div>
																						 
									</div>
								</div>                         	 		
								<br>
								<br>


</div>

</div>
<!-- /.card-body -->
</div>

								         
                        
          				
              </div><!-- /.card card-primary card-outline -->

    </section><!-- /.section-->
    <!-- /.content -->

 </div>
  <!-- /.content-wrapper -->

