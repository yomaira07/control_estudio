 <!-- Content Wrapper. Contains page content -->

 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
    <!-- /.container-fluid -->
    </section>
 
    <!-- Main content -->
    <section class="content">
  
    <script language="javascript">

        function anterior()
        { 
            if( document.forms[0].elements.rol.value=='2'){
                    location.href="/control_estudio/dashboard05/buscar_plan_clases";
                 }else{
                    location.href="/control_estudio/dashboard06/matricula";
                 }
        }
        
        function punto1(valor,id){       
            
            var total=0;
            var unidad =document.forms[id].unidad.value;
            var retiro=document.forms[id].retiro.value;
            valor = valor; // Convertir el valor a un entero (número).
           alert (valor);
            valor2=document.forms[id].elements.nota2.value;
            valor3=document.forms[id].elements.nota3.value;
            alert (valor2);
            alert (valor3);
            total =Number.parseFloat( valor)+Number.parseFloat(valor2)+Number.parseFloat(valor3);
           
           
            total = (total == null || total == undefined || total == "") ? 0 : total;
          
            alert (total);
            
            if (retiro ==0){
                if((valor2< 33.3 || valor3 <33.3|| valor<33.3 ) ){
                    document.forms[id].elements.observaciones.value='NO APROBADO';
                    document.forms[id].elements.observaciones.style.color="Red";
                    document.forms[id].elements.final.value =0;
                }else{
                    document.forms[id].elements.observaciones.value='APROBADO ';
                    document.forms[id].elements.final.value =total
                }
            }
    }
    function punto2(valor,id){       
            
            var total=0;
            var unidad =document.forms[id].unidad.value;
            var retiro=document.forms[id].retiro.value;
            valor = valor; // Convertir el valor a un entero (número).
           alert (valor);
            valor2=document.forms[id].elements.nota1.value;
            valor3=document.forms[id].elements.nota3.value;
            alert (valor2);
            alert (valor3);
            total =Number.parseFloat( valor)+Number.parseFloat(valor2)+Number.parseFloat(valor3);
           
           
            total = (total == null || total == undefined || total == "") ? 0 : total;
          
            alert (total);
            
            if (retiro ==0){
                if((valor2< 33.3 || valor3 <33.3|| valor<33.3 ) ){
                    document.forms[id].elements.observaciones.value='NO APROBADO';
                    document.forms[id].elements.observaciones.style.color="Red";
                    document.forms[id].elements.final.value =0;
                }else{
                    document.forms[id].elements.observaciones.value='APROBADO ';
                    document.forms[id].elements.final.value =total
                }
            }
    }
     
    </script>
       <div class="card">
          
                     <div class="card-header">

                      <h3 class="card-title"><strong>Registrar Notas Período :  </strong><?php  echo $periodo->nombre;?>
                     </h3>
                      <br>
                      <h3 class="card-title"><strong>Docente :  </strong><?php  echo $docente->primer_nombre.' '.$docente->segundo_nombre.' '.$docente->primer_apellido.' '.$docente->segundo_apellido ;?>
                     </h3>
                      <br>
                       <h3 class="card-title"><strong>Unidad Curricular :  </strong>
                       <?php foreach($unidad_curricular as $unidad_curricular){
                            echo $unidad_curricular->codigo.' '.$unidad_curricular->nombre;
                           
                                    $nota1_e=33.3;$nota2_e=33.3;$nota3_e=33.3;
                                
                      }?>
                      </strong></h3>
                        <div align="center">
                            <input type="button" name="btnSeguiente" value="Regresar" class="boton btn btn-info"  title="Regresar" onClick="history.back()">
                          
                        </div>
                        
                       
                     
                        <hr>
                          <div align="right">
                         <?php 
                         //	echo($proceso_cerrado)	;
                         if( ( ($rol_usuario->rol_id==2 or  $rol_usuario->rol_id==10 )  and ($proceso_cerrado==0)) ){      
                          //  echo"sin cerrar";                   ?>              
                                        <a  value="<b>Cerrar</b> Registro de Notas" class="boton btn btn-success"  title="<b>Cerrar</b> Registro de Notas"href="<?php  echo base_url()?>dashboard06/cerrar_procesoli/<?php echo $oferta_academica;?>/<?php echo $periodo->id;?>" ><b>Cerrar</b> Registro de Notas</a>   
                                        <a title="Descargar Plan de Clases y Evaluaciones" href="<?php  echo base_url()?>dashboard06/dPDF_lineas/<?php echo $oferta_academica;?>/<?php echo $periodo->id;?>" target="_blank"><img src="<?php echo base_url(); ?>assets/img/pdf.jpeg"  alt="PDF" style="width: 10mm; height: 10mm; margin: 0;" /></a>                              <?php 
                                $cerrado=0;  
                               }elseif( ($rol_usuario->rol_id==2 or  $rol_usuario->rol_id==10 )  and ($proceso_cerrado>0)){?>
                                <a  value="<b>Activar</b> Registro de Notas" class="boton btn btn-success"  title="<b>Activar</b> Registro de Notas" href="<?php  echo base_url()?>dashboard06/activar_procesoli/<?php echo $oferta_academica;?>/<?php echo $periodo->id;?>" ><b>Activar</b> Registro de Notas</a>
                                <a title="Descargar Plan de Clases y Evaluaciones" href="<?php  echo base_url()?>dashboard06/dPDF_lineas/<?php echo $oferta_academica;?>/<?php echo $periodo->id;?>" target="_blank"><img src="<?php echo base_url(); ?>assets/img/pdf.jpeg"  alt="PDF" style="width: 10mm; height: 10mm; margin: 0;" /></a>
                                <?php 
                                $cerrado=1;  
                               } 
                        if($rol_usuario->rol_id==9 and $proceso_cerrado==0){?>                           
                            <a  value="<b>Cerrar</b> Registro de Notas" class="boton btn btn-success"  title="Cerrar Registro de Notas"href="<?php  echo base_url()?>dashboard06/cerrar_procesoli/<?php echo $oferta_academica;?>/<?php echo $periodo->id;?>" ><b>Cerrar</b> Registro de Notas</a>                                       
                          <?php
                            $cerrado=0;  
                          }elseif( $rol_usuario->rol_id==9 and $proceso_cerrado>0){?>
                            <b>Proceso Cerrado</b>
                            <a title="Descargar Plan de Clases y Evaluaciones" href="<?php  echo base_url()?>dashboard06/dPDF_lineas/<?php echo $oferta_academica;?>/<?php echo $periodo->id;?>" target="_blank"><img src="<?php echo base_url(); ?>assets/img/pdf.jpeg"  alt="PDF" style="width: 10mm; height: 10mm; margin: 0;" /></a>
                       <?php
                         $cerrado=1;  

                        }   
                         if( $rol_usuario->rol_id==9 and $cerrado==1 ) $disabled='disabled';  else $disabled='';
                    ?>
                      </div>
                     
                    </div>
                    
                           
                    
                     
                      <div class="card-body">
                     <?php if( ($rol_usuario->rol_id==9 and $cerrado==0) or  $rol_usuario->rol_id==2 or  $rol_usuario->rol_id==10 ){?>
                      <a  value="todos no aprobaron" class="boton btn btn-secondary"  title="Todos No Aprobaron"  href="<?php  echo base_url()?>dashboard06/asistencia_incompleta_lineas/<?php echo $oferta_academica;?>/<?php echo $periodo->id;?>" >Todos NO Aprobaron</a>
                      
                      <a  value="todos aprobaron" class="boton btn btn-primary"  title="Todos Aprobaron"  href="<?php  echo base_url()?>dashboard06/asistencia_completa_lineas/<?php echo $oferta_academica;?>/<?php echo $periodo->id;?>" >Todos Aprobaron</a>
                    <?php } ?>                              
                             <!-- Mensaje de Alerta-->
                            <?php if($this->session->flashdata('success')){ ?>                            
                                <div class="alert alert-success">
                                <a href="#" class="close" data-dismiss="alert">&times;</a>
                                <strong>Éxito!</strong> </i> <?php echo $this->session->flashdata('success'); ?>
                                </div>
                            
                            <?php } else if($this->session->flashdata('error')){  ?>
                            
                            <div class="alert alert-danger">
                            <a href="#" class="close" data-dismiss="alert">&times;</a>
                            <i class="icon fa fa-ban"></i> <?php echo $this->session->flashdata('error'); ?>
                            </div>
                            
                            <?php } else if($this->session->flashdata('warning')){?>
                            
                            
                            <div class="alert alert-warning"  >
                            <a href="#" class="close" data-dismiss="alert">&times;</a>
                            <strong>Alerta!</strong> <?php echo $this->session->flashdata('warning'); ?>

                            </div>
                            
                            <?php } else if($this->session->flashdata('info')){  ?>
                          
                            <div class="alert alert-info">
                             
                            <a href="#" class="close" data-dismiss="alert">&times;</a>
                            <strong>Información!</strong> <?php echo $this->session->flashdata('info'); ?>
                            </div>
                            <?php } ?>
                            <!-- Fin Mensaje de Alerta-->
                            <!-- Fin Mensaje de Alerta-->
                 
                        <!-- Comienzo formulario -->
  <div class="panel panel-default">
            <div class="panel-body">
              
              <?php $i=0;   $n=0;$obs='';
                    foreach ($notas as $notas) 
                    { 
                  $n++;
              //    echo $notas->nota_final;
                    if(is_null($notas->nota_final) and $notas->retiro==0){
                        $check=0;
                    $obs="<input type=text readonly value='PENDIENTE POR REGISTRAR'/>";
$disabled='';
                   }else{
			if($notas->retiro==1 or $notas->retiro==2 or $notas->retiro==3){
 $obs="<input type=text style='color:RED;'readonly value=''/>";
$disabled='disabled';
                    $check=1;
			}//echo round($notas->nota_final, 0);
            if( round($notas->nota_final, 0)==20){
                $obs="<input type=text style='color:green;'readonly value='APROBADO'/>";
 $check=1;
$disabled='';
        }elseif(round($notas->nota_final, 0)<20 and $notas->retiro==0 ){
            $obs="<input type=text style='color:Red;'readonly value='NO APROBADO'/>";
 $check=1;
$disabled='';
        }
                   }
                    ?>
                <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered table-condensed" id="example1" width="100%">
                            
                  
            

                    <form  name="carga" action="<?php echo base_url()?>dashboard06/guardar_notas_lineas/<?Php echo $notas->id_mp.'/'.$oferta_academica;?>" method="POST">  
                    <input type="hidden" name="rol" id ="rol" value="<?php print  $this->session->userdata("rol"); ?>" >
                    <input type="hidden" name="periodo" id ="periodo" value="<?php print  $periodo->id; ?>" >
                    <thead>
                        <tr>
                            <th>N°</th>
                            <th>Cédula</th>
                            <th>Nombre</th>
                            <th>Apellido</th>                           
                            <th> Nota N° 1 <br>(<?php echo "<b>Aprobado / NO Aprobado</b>"?>)</th>
                            <th> Nota N° 2 <br>(<?php  echo "<b>Aprobado / NO Aprobado</b>"?>)</th>
                            <th> Nota N° 3 <br>(<?php echo "<b>Aprobado/ NO Aprobado</b>"?>)</th>
                         
                            <th > Nota Definitiva</th>
                            <th colspan="2"> Observaciones</th>
                        </tr>
                    </thead>
                 <tbody>
                   <?php if( $rol_usuario->rol_id==9 and $notas->cerrar_proceso==1 ){ $revision=1;  $readonly='readonly';}else{$readonly='';$revision='0';}?>
                    <tr>
                       
                       
                        <input type="hidden" name="retiro" id ="retiro" value="<?php print $notas->retiro; ?>">
                        <input type="hidden" name="unidad" id ="unidad" value="<?php print $unidad; ?>">
                        <td align='center'><?php echo $n;
                        if($check==1){
                            echo "<br> <span class='btn-success badge'><i class='fa fa-check' title='Nota Registrada'></i></span>"; 
                        }
                         if($check==0){
                             echo "<br><span class='btn-danger badge'><i class='fa fa-times' title='Nota Registrada'></i></span>";
                        }
                         ?> </td>
                        <td><?= $notas->nacionalidad.'-'.$notas->cedula; ?> </td>  
                        <td><?= $notas->primer_nombre.' '.$notas->segundo_nombre; ?></td>  
                        <td><?= $notas->primer_apellido.' '.$notas->segundo_apellido; ?></td>                     
                

                        <?php if (($notas->retiro=='1'  or $notas->retiro=='3' or $notas->retiro=='2') and ($this->session->userdata("rol")==9 or $this->session->userdata("rol")==10 or $this->session->userdata("rol")==2 ) ){ $bloqueo='readonly'; $disabled='disabled'; }else{ $bloqueo=' ';$disabled=''; }?>
                        <?php if ($cerrado==1 and ($this->session->userdata("rol")==9)){ $disabled='disabled'; }else{ $bloqueo=' ';$disabled=''; }?>
                        <td>
                        <input type="checkbox"  name="nota1" id="nota1" value="6.66"  <?php  if( $notas->nota_1>=6.66) echo "checked";echo $disabled;?> >
                    </td>
                   
                        <td> <input type="checkbox"  name="nota2" id="nota2" value="6.66"<?php if( $notas->nota_2>=6.66) echo "checked";echo $disabled;?> >
                    </td>

                        <td><input type="checkbox"  name="nota3" id="nota3" value="6.66" <?php  if( $notas->nota_3>=6.66) echo "checked";echo $disabled;?> >
                    </td>
                       
                        <td><input type="hidden" readonly  id ="final" name="final" value="<?php echo $notas->nota_final; ?>"> 
                        <div> <?php //echo'ptos.';?></div>
                       <?php echo $obs;?></td>

                        <td>  <input type="text" name="observaciones" id ="observaciones" value="<?php print $notas->observaciones; ?>" onkeyup="javascript:this.value=this.value.toUpperCase();" <?php print $bloqueo; ?> ><br> <span style="color: red;"><?php if($notas->retiro==1) echo "RETIRO VOLUNTARIO"; if($notas->retiro==2) echo "RETIRO MATRÍCULA POR CAUSALES ACADÉMICAS"; if($notas->retiro==3) echo "DECISIÓN CAIP";?></span></td>
			
                      
			   <?php if(($rol_usuario->rol_id==9 or $rol_usuario->rol_id==2) and $proceso_cerrado==0){?>    
                      
                            <td><div><button type="submit" name="cargar" id="cargar"  class="btn btn-primary"title="-Hacer clic para Registrar Nota-" <?php echo $disabled;?>> Cargar</button> </div></td> <?php } ?>
                            
                      
                    </tr>   
                    </tbody>
              
                 </form>                     
            </table>     
            <?php   $i++;
             }?>
             
                
               
            </div>
        </div>
        <div align="center">
                            <input type="button" name="btnSeguiente" value="Regresar" class="boton btn btn-info"  title="Regresar" onClick="anterior()">
                           
                        </div>
                     
                        <hr>
                          <div align="right">
                          <?php 
                         //	echo($proceso_cerrado)	;
                         if( ( ($rol_usuario->rol_id==2 or  $rol_usuario->rol_id==10 )  and ($proceso_cerrado==0)) ){      
                          //  echo"sin cerrar";                   ?>              
                                        <a  value="<b>Cerrar</b> Registro de Notas" class="boton btn btn-success"  title="<b>Cerrar</b> Registro de Notas"href="<?php  echo base_url()?>dashboard06/cerrar_procesoli/<?php echo $oferta_academica;?>/<?php echo $periodo->id;?>" ><b>Cerrar</b> Registro de Notas</a>   
                                        <a title="Descargar Plan de Clases y Evaluaciones" href="<?php  echo base_url()?>dashboard06/dPDF_lineas/<?php echo $oferta_academica;?>/<?php echo $periodo->id;?>" target="_blank"><img src="<?php echo base_url(); ?>assets/img/pdf.jpeg"  alt="PDF" style="width: 10mm; height: 10mm; margin: 0;" /></a>                              <?php 
                                $cerrado=0;  
                               }elseif(  ($rol_usuario->rol_id==2 or  $rol_usuario->rol_id==10 )  and ($proceso_cerrado>0)){?>
                                <a  value="<b>Activar</b> Registro de Notas" class="boton btn btn-success"  title="<b>Activar</b> Registro de Notas" href="<?php  echo base_url()?>dashboard06/activar_procesoli/<?php echo $oferta_academica;?>/<?php echo $periodo->id;?>" ><b>Activar</b> Registro de Notas</a>
                                <a title="Descargar Plan de Clases y Evaluaciones" href="<?php  echo base_url()?>dashboard06/dPDF_lineas/<?php echo $oferta_academica;?>/<?php echo $periodo->id;?>" target="_blank"><img src="<?php echo base_url(); ?>assets/img/pdf.jpeg"  alt="PDF" style="width: 10mm; height: 10mm; margin: 0;" /></a>
                                <?php 
                                $cerrado=1;  
                               } 
                        if($rol_usuario->rol_id==9 and $proceso_cerrado==0){?>                           
                            <a  value="<b>Cerrar</b> Registro de Notas" class="boton btn btn-success"  title="Cerrar Registro de Notas"href="<?php  echo base_url()?>dashboard06/cerrar_procesoli/<?php echo $oferta_academica;?>/<?php echo $periodo->id;?>" ><b>Cerrar</b> Registro de Notas</a>                                       
                          <?php
                            $cerrado=0;  
                          }elseif( $rol_usuario->rol_id==9 and $proceso_cerrado>0){?>
                            <b>Proceso Cerrado</b>
                            <a title="Descargar Plan de Clases y Evaluaciones" href="<?php  echo base_url()?>dashboard06/dPDF_lineas/<?php echo $oferta_academica;?>/<?php echo $periodo->id;?>" target="_blank"><img src="<?php echo base_url(); ?>assets/img/pdf.jpeg"  alt="PDF" style="width: 10mm; height: 10mm; margin: 0;" /></a>
                       <?php
                         $cerrado=1;  

                        }   
                            
                    ?>
                      </div>
      
</div>
              </div>
                </div><!-- /.card -->





    </section>
    <!-- /.content -->
 


  </div>
