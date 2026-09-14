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
                      <h3 class="card-title"><strong>Unidades Curriculares a Impartir Período :<?php echo $periodo->nombre;?>
                      </strong></h3>
                    </div>
			      <?php if($this->uri->segment(2)=='revisar_plan_clases'){?>
            <div align="right" ><strong>Unidades Curriculares Estatus por Carga de Notas: </strong><a title="Descargar a Excel" href="<?php  echo base_url()?>dashboard05/dExcel_control_notas_estatus" target="_blank"><img src="<?php echo base_url(); ?>assets/img/excel.jpg"  alt="Excel" style="width: 10mm; height: 10mm; margin: 0;" /></a></div>                           
           <?php }   ?>
        
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
        <div class="panel panel-default">
            <div class="panel-body">
                <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered table-condensed" id="example1" width="100%">
                    <thead>
                        <tr>
                            <th>N°</th>
                            <th>Especialización</th>
                            <th>Código de la Unidad Curricular</th>
			                      <th>Trimestre</th>  
                            <th >Nombre de la Unidad Curricular</th>  
			                      <th>Modalidad</th>  
                            <th>Docente</th>  
                            <th>Total Unidad de Crédito</th>   
                            <th>Total Estudiantes Inscritos</th>                      
                            <th ><div align="center">Opción</div></th>
                        </tr>
                    </thead>
                    <tbody>
                    <?Php $i=0;
                        foreach ($unidades_curriculares as $uc) 
                        { $i++;
                        ?>
                        <tr>
                             <td><?= $i; ?></td>  
                             <td><?= $uc->programa_nombre; ?></td>  
                        <?php echo "<td align='center'>"; ?>                         
                          <?= $uc->codigo; ?>
                                </a>                           
                             </td>                        
                              <td>  <?= $uc->trimestre; ?></td> <td><?= $uc->nombre; ?></td> 
                            <td><?php if($uc->modalidad=='1') echo "PRESENCIAL"; if( $uc->modalidad=='2') echo "A DISTANCIA"; if( $uc->modalidad=='3') echo "SEMIPRESENCIAL"; ?></td> 
                            <td align="center"><?= $uc->docente; ?></td>
                            <td align="center"><?= $uc->uc; ?></td>
                            <td align="center"><i class="fa fa-users"><?= $uc->matricula; ?></i></td>
                            <td> <div align="center"> <a href="<?php echo base_url(); ?>dashboard06/matricula_estudiantes/<?=$uc->id; ?>"  name="item" class="">
                                    <span class='btn-info badge'>
                                     <i class="fa fa-users" aria-hidden="true">Matrícula</i>
                                    </span>   
                                </a>
				            <a href="<?php echo base_url(); ?>dashboard06/asistencia/<?=$uc->id; ?>"  name="item" class="">
                                <span class='btn-primary badge'>
                                <i class="fa fa-check" aria-hidden="true">  Asistencia</i>
                                </span>   
                            </a>
                                <a href="<?php echo base_url(); ?>dashboard06/evaluacion/<?=$uc->id; ?>/<?=$periodo->id; ?>"  name="item" class="">
                                    <span class='btn-success badge'>
                                    <i class="fa fa-check">  Plan de Evaluación</i>
                                    </span>   
                                </a>
                               <a href="<?php echo base_url(); ?>dashboard06/notas/<?=$uc->id; ?>/<?=$revision;?>/<?=$periodo->id; ?>"  name="item" class="">
                                    <span class='btn-warning badge'> <!-- title="En Revisión">-->
                                      <i class="fa fa-list">Ver Notas </i>
                                    </span>   
                                </a>
                            </div>
                            </td>                                  
                        </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                    
                </table>              
            </div>
        </div>

         <div class="card-header">
          <h3 class="card-title"><strong>Líneas de Investigación a Impartir Período :<?php echo $periodo->nombre;?>
         </strong></h3>
        </div>
        <div class="panel panel-default">
        <div class="panel-body">
        <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered table-condensed" id="example" width="100%">
            <thead>
                <tr>
                    <th>N°</th>
                    <th>Especialización</th>
                    <th>Código de la Unidad Curricular</th>
                    <th colspan="2">Nombre de la Unidad Curricular</th>    
                    <th>Total Unidad de Crédito</th>   
                    <th>Total Estudiantes Inscritos</th>                      
                    <th ><div align="center">Opción</div></th>
                </tr>
            </thead>
            <tbody>
            <?Php $i=0;
                foreach ($unidades_curricularesli as $uc) 
                { $i++;
                ?>
                <tr>
                        <td><?= $i; ?></td>  
                        <td><?= $uc->trimestre; ?></td>  
                <?php echo "<td align='center'>"; ?>
                  
                  
                            <?= $uc->codigo; ?>
                    
                    </a>
                  
                </td>  
              
                  <td>  <?= $uc->trimestre; ?></td> <td><?= $uc->nombre; ?></td> 
                <td align="center"><?= $uc->uc; ?></td>
                <td align="center"><i class="fa fa-users"><?= $totalli[$i]; ?></i></td>
                <td> <div align="center"> <a href="<?php echo base_url(); ?>dashboard06/matricula_estudiantesli/<?=$uc->codigo; ?>/<?=$periodo->id; ?>"  name="item" class="">
                        <span class='btn-info badge'>
                        <i class="fa fa-users" aria-hidden="true">Matrícula</i>

                        </span>   
                    </a>
        <a href="<?php echo base_url(); ?>dashboard06/asistenciali/<?=$uc->codigo; ?>/<?=$periodo->id; ?>"  name="item" class="">
                        <span class='btn-primary badge'>
                        <i class="fa fa-check" aria-hidden="true">  Asistencia</i>
                        </span>   
                    </a>
                    <a href="<?php echo base_url(); ?>dashboard06/evaluacionli/<?=$uc->codigo; ?>/<?=$periodo->id; ?>"  name="item" class="">
                        <span class='btn-success badge'>
                        <i class="fa fa-check">  Plan de Evaluación</i>
                        </span>   
                    </a>
                    <a href="<?php echo base_url(); ?>dashboard06/notasli/<?=$uc->codigo; ?>/<?=$periodo->id; ?>"  name="item" class="">
                        <span class='btn-warning badge'>
                          <i class="fa fa-list">    Registrar Notas </i>
                        </span>   
                    </a>
                </div>
                </td>
        
              
                </tr>
                <?php
                }
                ?>
            </tbody>
        </table>            
        </div>
        </div>


</div><!-- /.card -->
</div><!-- /.card -->
</div><!-- /.card -->
    </section>  <!-- /.content -->
  </div>


