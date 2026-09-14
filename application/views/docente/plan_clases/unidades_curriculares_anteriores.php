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
                      <h3 class="card-title"><strong>Unidades Curriculares a Impartir
                      </strong></h3>
         	 <br><h3 class="card-title"><strong> Período :  </strong><?php  echo $periodo->nombre;?></h3>

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
 <div class="panel panel-default">
            <div class="panel-body">
                <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered table-condensed" id="example" width="100%">
                    <thead>
                        <tr>
                            <th>N°</th>
                            <th>Período Académico</th>
                            <th>Especialización</th>
                            <th>Código de la Unidad Curricular</th>
                            <th>Nombre de la Unidad Curricular</th>    
                             <th>Total Unidad de Crédito</th>                                               
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
                        <td><?= $uc->periodo; ?></td> 
                        <td><?= $uc->nombre; ?></td> 
                        <td align="center"><?= $uc->uc; ?></td>
                       
                        <td><!-- <div align="center"> <a href="<?php echo base_url(); ?>dashboard06/matricula_estudiantes/<?=$uc->id; ?>"  name="item" class="">
                                <span class='btn-info badge'>
                                 <i class="fa fa-users" aria-hidden="true">Matrícula</i>

                                </span>   
                            </a>
 			  <a href="<?php echo base_url(); ?>dashboard06/asistencia/<?=$uc->id; ?>"  name="item" class="">
                                <span class='btn-primary badge'>
                                <i class="fa fa-check" aria-hidden="true">  Asistencia</i>
                                </span>   
                            </a>
                            <a href="<?php echo base_url(); ?>dashboard06/evaluacion/<?=$uc->id; ?>"  name="item" class="">
                                <span class='btn-success badge'>
                                <i class="fa fa-check">  Plan de Evaluación</i>
                                </span>   
                            </a>
                             <a href="<?php echo base_url(); ?>dashboard06/notas/<?=$uc->id; ?>"  name="item" class="">
                                <span class='btn-warning badge'>
                                  <i class="fa fa-list">    Registrar Notas </i>
                                </span>   
                            </a>-->
                            <a href="<?php echo base_url(); ?>dashboard06/constancia_anterior/<?=$uc->id; ?>/<?=$uc->id_periodo; ?>"  name="item" class="">
                                <span class='btn-warning badge'>
                                  <i class="fa fa-list">    Constancia de Participación </i>
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

              </div>
                </div><!-- /.card -->





    </section>
    <!-- /.content -->



  </div>
