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
                <h2 class="card-title"><strong>   <i class="fas far fa-copy"> Trámites Administrativos</i>                    
                </strong></h2> <br>
                <h3 class="card-title"><strong>   Solicitud de Egreso   </strong></h3>
            </div>            
            <div class="card-body">           
                <!--Informacion del alumno completo -->   
                <div align="center"><h4>INFORMACI&Oacute;N DEL ALUMNO</h4></div>
                  <div align="center">
                      <?php if(!empty($alumno_list)):?>
                                  <div class="card-header">
                                      <table align="center" >      
                                  <tr>
                                      <td><b>Cédula de Identidad:</b> </td>
                                      <td align="center"><?php echo $alumno_list->nacionalidad.'-'.$alumno_list->cedula;?></td>
                                  </tr>                          
                                  <tr>
                                      <td> <b>Nombre(s) y Apellido(s): </b></td>                                               
                                      <td align="center"><?php echo $alumno_list->nombre_primer.' '.$alumno_list->nombre_segundo.' '.$alumno_list->apellido_primer.' '.$alumno_list->apellido_segundo;?></td> 
                                  </tr>                          
                                  <tr>                          
                                      <td> <b>Correo Electronico: </b></td>
                                      <td align="center"><?php echo $alumno_list->correo; ?></td>   
                                  </tr>                          
                                  <tr>
                                      <td> <b>Telefonos(s): </b></td>
                                      <td align="center"><?php echo $alumno_list->telefono_cel; echo " -- ".$alumno_list->telefono_hab; ?>
                                      </td>                        
                                  </tr>                          
                                  <tr>                          
                                      <td > <b>Estado Residencia: </b></td>
                                      <td align="center"><?php echo strtoupper($alumno_list->residencia); ?></td>                     
                                  </tr>                          
                                  <tr>                          
                                      <td> <b>Lugar de Trabajo: </b></td>
                                      <td align="center"> <?php echo ($alumno_list->lugar_trabajo); ?> </td>      
                                  </tr>
                                  </table>                                           
                              </div>                         
                   </div>
                   </div><!-- /.cardbody -->
          </div><!-- /.card -->
          <div class="card">
             <div class="card-body">  
                    <form  action="<?php echo base_url()?>dashboard09/registrotramiteEgreso_store/2" method="POST" enctype="multipart/form-data">
   
                            <!-- Mensaje de Alerta-->
                            <?php  if ($this->session->flashdata("error")): ?>
                            <div class="alert alert-danger alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <p><i class="icon fa fa-ban"></i> <?php echo $this->session->flashdata("error"); ?> </p>
                            </div>
                        <?php endif; ?>
                        <?php  if ($this->session->flashdata("warning")): ?>
                            <div class="alert alert-warning">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <p><i class="icon fa fa-check-square"></i> <?php echo $this->session->flashdata("warning"); ?> </p>
                            </div>
                        <?php endif; ?>

<table class="table table-bordered"> 
<tr>
    <td><b>Programa y/o Especialización:</b></td>
    <td>
    <div class="row" class="col-2">
    <select class="form-control" name="cbo_programa" id="cbo_programa"   required>
    <option value="">- Seleccione -</option>                                       
    <?php foreach($programa as $programa):?>
    <option value="<?php echo $programa->id;?> "                     
    </option><?php 
    echo $programa->nombre;?>
    <?php endforeach; ?>
    </select>     
    </div>
    </td>
    </tr>             
    <tr>
    <td><b>Trámite Académico a solicitar:</b></td>
    <td>
    <div class="row" class="col-2">
    <select class="form-control" name="combotramite" id="combotramite"   required>
    <option value="">- Seleccione -</option>                                       
    <?php foreach($combotramite as $combotramite):?>
    <?php if($combotramite->id):?>
    <option value="<?php echo $combotramite->id;?> "                     
    </option><?php 
    echo $combotramite->nombre;?>
    <?php endif;?>
    <?php endforeach; ?>
    </select>     
    </div>
    </td>
    </tr>   
    <tr>   
    <td><b>Modalidad:</b></td>
    <td>
    <div class="row" class="col-2">
    <select class="form-control" name="comboreconocimiento" id="comboreconocimiento"   required>
    <option value="">- Seleccione -</option>                                       
    <?php foreach($reconocimiento as $reconocimiento):?>

    <option value="<?php echo $reconocimiento->id;?> "                     
    </option><?php 
    echo $reconocimiento->nombre;?>

    <?php endforeach; ?>
    </select>     
    </div>
    </td>
    </tr>
    </table>
    <div  align="center"> <b>Adjuntar Carta de Soicitud de Egreso de Postgrado</b><br><br>
        <input type="file" name="userfile" size="400" required="true" /> 
        <div class="frame3" align="center">
        <p align="center">
            Para poder enviarnos su documento , el archivo debe estar en formato *.PDF 
        </p>
        <p align="center">
            El tama&ntilde;o m&aacute;ximo permitido del archivo es de 1 MB (1024KB).
        </p>
    </div>
    </div>

<br /><div align="center">  <button type="submit" class="btn btn-primary">Registrar Tramite</button></div>
<br>
 </div>
 </div>
<div  class="card"><!-- /.cardbody -->
  <div class="card-header">
    <h2 class="card-title"> 
      <i class="fas far fa-list"><strong> Solicitudes de Egresos realizadas </strong></i>
    </h2>
  </div>  
    <div class="table-responsive">
    <table id="example" class="table table-striped table-bordered" style="width:100%"> 
      <thead>  
                                      
                                        <tr>
                                            <th>Trámite Solicitado</th>
                                            <th>Programa y/o Especialización</th>
                                            <th>Fecha de Solicitud </th>                                          
                                            <th>Arancel de pago </th>  
                                            <th>Estado Solicitud </th>                                                                              
                                            <th>Opción</th>
                                          
                                        </tr>
                                    </thead>  
                                    <tbody>      
                                   <?php if(!empty($solicitudes)):?>
                                        <?php foreach($solicitudes as $solicitudes):?>
                                        <tr>                                                    
                                                <td><?php echo $solicitudes->tramite;?></td>
                                                <td><?php echo $solicitudes->programa;?></td>
                                                <td><?php echo $solicitudes->fecha_solicitud;?></td>                                             
                                                <td> <?php echo $solicitudes->monto_gen;?> .Ref</td>
                                                <td> 
                                                    <?php 
                                                    if($solicitudes->reg_pago==0){?>
                                                      <img img width='25px' height='25px'src="<?php echo base_url()?>/assets/img/button_gray.png">
                                                       <?php echo "Pago Pendiente"; 
                                                    }else{ ?>
                                                        <img img width='25px' height='25px'src="<?php echo base_url()?>/assets/img/button_green.png">
                                                        <?php   echo "Pago Registrado";
                                                            ?>
                                                            <hr>
                                                            <?php 
                                                            if($solicitudes->reg_pago==1 and $solicitudes->conciliado==1){
                                                                echo "<br>  ";?>
                                                                <img img width='25px' height='25px'src="<?php echo base_url()?>/assets/img/button_green.png">
                                                                <?php  
                                                                echo "Aprobado por <b>Administración</b> ENFMP ";  
                                                            } else{
                                                                echo " <br>";
                                                                if($solicitudes->reg_pago==1 and $solicitudes->conciliado==2){
                                                                ?>
                                                                <img img width='25px' height='25px'src="<?php echo base_url()?>/assets/img/button_red.jpeg">
                                                                <?php   echo "Rechazado por <b>Administración</b> ENFMP ";  
                                                                }else{?>
                                                                    <img img width='25px' height='25px'src="<?php echo base_url()?>/assets/img/button_gray.png">
                                                                <?php   echo "Pendiente por Aprobar <b>Administración</b> ENFMP ";  
								}
							   }

                                                                ?>  
                                                                <hr>       
                                                                <?php 
                                                                    if($solicitudes->reg_pago==1 and $solicitudes->conciliado==1 and $solicitudes->academico==1){
                                                                            echo "<br>  ";?>
                                                                            <img img width='25px' height='25px'src="<?php echo base_url()?>/assets/img/button_green.png">
                                                                            <?php  
                                                                            echo "Aprobado por <b>Secretaría</b> ENFMP ";  
                                                                     } else{
                                                                            echo " <br>";
                                                                            ?>
                                                                            <img img width='25px' height='25px'src="<?php echo base_url()?>/assets/img/button_gray.png">
                                                                            <?php   echo "Pendiente por Aprobar <b>Secretaría</b> ENFMP ";  
                                                                    }                                                                   
                                                                                                             
                                                   } 
                                                    ?>  
                                                </td>
                                                <td>
                                                    <div>
                                                    <?php  
                                                        if ($solicitudes->requisitos==1):?>                                               
                                                            <a href="<?php echo base_url()?>assets/tramites/egresos/<?php echo $solicitudes->id_usuario.'_solicitud_egreso.pdf'; ?>" target="_new"><img src="<?php echo base_url()?>/assets/img/blanco.png"   title ="Ver Requisitos"> Requisitos</a>
                                                        <?php endif; ?>
                                                    </div>
                                                   <?php echo " <br>";?>
                                                  
                                                    <div>
                                                        <?php if($solicitudes->reg_pago==0 ):?>
                                                            <a href="<?php echo base_url()?>dashboard09/registro_pago/<?php echo $solicitudes->id_solicitud.'/'.$solicitudes->id_tipo_tramite; ?>" ><img src="<?php echo base_url()?>/assets/img/dinero.png" style="width:50px;heigth=50px;" title ="Registrar Pago">Pagar</a>
                                                        <?php endif; ?>
                                                    </div>
                                                    <?php echo " <br>"; echo " <hr>"; echo " <br>";?>
                                                    <div>
                                                        <?php if($solicitudes->reg_pago==1 and $solicitudes->conciliado==1 and $solicitudes->academico==1):?>
                                                            <a href="<?php echo base_url()?>dashboard09/planilla/<?php echo $solicitudes->id_usuario.'/'.$solicitudes->id_solicitud?>"><img src="<?php echo base_url()?>/assets/img/imprimir.png" title ="Imprimir Planilla"> Planilla</a> 
                                                        <?php endif; ?>
                                                    </div>
                                                   
                                              </td>                                                   
                                            </tr>
                                            <?php endforeach;
          else:?>
          <tr>
          <td colspan=6>
          <div align="center">No hay registros que mostrar...</div>
          </td>           
          </tr>
          <?php
          endif ;?>
      </tbody>                      
      <tfoot>
        <tr>
        <th>Trámite Solicitado</th>                                           
        <th>Programa y/o Especialización</th>
        <th>Fecha de Solicitud </th>                                          
        <th>Arancel de pago </th>   
        <th>Estado Solicitud </th>                                                                        
        <th>Opción</th>                                    
        </tr>
      </tfoot>
    </table>                  
    </div>            
           
  </form>    
</div><!-- /.cardbody -->

  
  <?php else: ?> 
	  <div align="center"><h4>DEBE CARGAR LOS DATOS DE INFORMACI&Oacute;N DEL ESTUDIANTE EN EL SISTEMA DE CONTROL DE ESTUDIOS 
<br>ir al menú: Inicio->Control de Estudios-> Información del Estudiante-> Datos Personales</h4></div>

       <?php endif ?>   
  </div><!-- /.card -->

</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
