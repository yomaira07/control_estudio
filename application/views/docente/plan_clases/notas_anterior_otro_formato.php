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
            if( document.forms[0].elements.rol.value=='2'|| document.forms[0].elements.rol.value=='4'){
                    location.href="/control_estudio/dashboard05/buscar_plan_clases";
                 }else{
                    location.href="/control_estudio/dashboard06/matricula";
                 }
        }
        function cerrar_proceso(oferta_academica)
        { 
            var id=oferta_academica;
            //  alert(id);
            
            location.href="/control_estudio/dashboard06/cerrar_proceso/"+id;
           // document.forms.carga.elements.cargar.disabled=true;
        }
         function activar_proceso(oferta_academica)
        { 
            var id=oferta_academica;
            //  alert(id);
            
            location.href="/control_estudio/dashboard06/activar_proceso/"+id;
           // document.forms.carga.elements.cargar.disabled=true;
        }

     function punto1(valor,id){       
            var total_ptos = 0; 
            var total_final=0;
            var total=0;
            var unidad =document.forms[id].unidad.value;
            var retiro=document.forms[id].retiro.value;
            valor = parseInt(valor); // Convertir el valor a un entero (número).
            valor2=document.forms[id].elements.nota2.value;
            valor3=document.forms[id].elements.nota3.value;
            valor4=document.forms[id].elements.nota4.value;
            total = Number.parseFloat(document.forms[id].elements.nota2_f.value)+Number.parseFloat(document.forms[id].elements.nota3_f.value)+Number.parseFloat(document.forms[id].elements.nota4_f.value);
            porcentaje=document.forms[id].elements.nota1_e.value /100;
            //alert(document.forms[id].elements.nota2.value);
            // alert(total); 
            //  alert(porcentaje); 
            // Aquí valido si hay un valor previo, si no hay datos, le pongo un cero "0".
            total = (total == null || total == undefined || total == "") ? 0 : total;
            valor2 = (valor2 == null || valor2 == undefined || valor2 == "") ? 0 : parseInt(valor2);
           valor3 = (valor3 == null || valor3 == undefined || valor3 == "") ? 0 : parseInt(valor3);
           valor4 = (valor4 == null || valor4 == undefined || valor4 == "") ? 0 : parseInt(valor4);

            /* Esta es la suma. */

            total_ptos=valor  * porcentaje;
              total_final = Number.parseFloat(total) + Number.parseFloat(total_ptos);
              //alert(Math.ceil(total_final));
            // Colocar el resultado de la suma en el control "span".
            document.forms[id].elements.nota1_f.value = total_ptos;
            document.forms[id].elements.final.value = Math.round(total_final);
            // alert(unidad);
            if((valor2< 15 || valor3 <15 || valor4<15 ) && unidad=='SEM' && retiro ==0){
                document.forms[id].elements.observaciones.value='REPROBADO';
                document.forms[id].elements.observaciones.style.color="Red";
                document.forms[id].elements.final.value =14;
            }else{
                document.forms[id].elements.observaciones.value=' ';
             //    document.forms[id].elements.final.value =total_final;
            }
    }
    function punto2(valor,id){       
        var total_ptos = 0; 
        var total_final=0;
        var total=0;
        var retiro=document.forms[id].retiro.value;

            valor = parseInt(valor); // Convertir el valor a un entero (número).
            valor3=document.forms[id].elements.nota3.value;
            valor4=document.forms[id].elements.nota4.value;
            unidad=  document.forms[id].elements.unidad.value;

            total = Number.parseFloat(document.forms[id].elements.nota1_f.value)+Number.parseFloat(document.forms[id].elements.nota3_f.value)+Number.parseFloat(document.forms[id].elements.nota4_f.value);

            porcentaje=document.forms[id].elements.nota2_e.value /100;
            //alert(valor);
            //  alert(total); 
            //  alert(porcentaje); 
            // Aquí valido si hay un valor previo, si no hay datos, le pongo un cero "0".
            total = (total == null || total == undefined || total == "") ? 0 : total;
              valor3 = (valor3 == null || valor3 == undefined || valor3 == "") ? 0 : parseInt(valor3);
           valor4 = (valor4 == null || valor4 == undefined || valor4 == "") ? 0 : parseInt(valor4);
            /* Esta es la suma. */

            total_ptos=valor  * porcentaje;
            total_final = Number.parseFloat(total) + Number.parseFloat(total_ptos);
            // Colocar el resultado de la suma en el control "span".
            document.forms[id].elements.nota2_f.value = total_ptos;
            document.forms[id].elements.final.value =Math.round(total_final);
             if((valor< 15 || valor3 <15 || valor4<15 ) && unidad=='SEM' && retiro ==0){
                document.forms[id].elements.observaciones.value='REPROBADO';
                document.forms[id].elements.observaciones.style.color="Red";
                document.forms[id].elements.final.value =14;
            }else{
                document.forms[id].elements.observaciones.value=' ';
             //    document.forms[id].elements.final.value =total_final;
            }
    }
    function punto3(valor,id){       
            var total_ptos = 0; 
            var total_final=0;
            var total=0;
             var retiro=document.forms[id].retiro.value;

            valor = parseInt(valor); // Convertir el valor a un entero (número).
            valor2=document.forms[id].elements.nota2.value;
            valor4=document.forms[id].elements.nota4.value;
             unidad=  document.forms[id].elements.unidad.value;
             total = Number.parseFloat(document.forms[id].elements.nota1_f.value)+Number.parseFloat(document.forms[id].elements.nota2_f.value)+Number.parseFloat(document.forms[id].elements.nota4_f.value);

            porcentaje=document.forms[id].elements.nota3_e.value /100;
           // alert(valor);
          //   alert(total); 
            //  alert(porcentaje); 
            // Aquí valido si hay un valor previo, si no hay datos, le pongo un cero "0".
            total = (total == null || total == undefined || total == "") ? 0 : total;
            valor2 = (valor2 == null || valor2 == undefined || valor2 == "") ? 0 : parseInt(valor2);
            valor4 = (valor4 == null || valor4 == undefined || valor4 == "") ? 0 : parseInt(valor4);
            /* Esta es la suma. */

            total_ptos=valor  * porcentaje;
           total_final = Number.parseFloat(total) + Number.parseFloat(total_ptos);
            // Colocar el resultado de la suma en el control "span".
            document.forms[id].elements.nota3_f.value = total_ptos;
           document.forms[id].elements.final.value =Math.round(total_final);

               if((valor< 15 || valor2 <15 || valor4<15)&& unidad=='SEM'&& retiro ==0){
                document.forms[id].elements.observaciones.value='REPROBADO';
                document.forms[id].elements.observaciones.style.color="Red";
                  document.forms[id].elements.final.value =14;
            }else{
                document.forms[id].elements.observaciones.value=' ';
            //     document.forms[id].elements.final.value =total_final;
            }
    }   
    function punto4(valor,id){       
            var total_ptos = 0; 
            var total_final=0;
              var total=0;
               var retiro=document.forms[id].retiro.value;

            valor = parseInt(valor); // Convertir el valor a un entero (número).
            valor2=document.forms[id].elements.nota2.value;
            valor3=document.forms[id].elements.nota3.value;
             unidad=  document.forms[id].elements.unidad.value;
             total = Number.parseFloat(document.forms[id].elements.nota1_f.value)+Number.parseFloat(document.forms[id].elements.nota2_f.value)+Number.parseFloat(document.forms[id].elements.nota3_f.value);

            porcentaje=document.forms[id].elements.nota4_e.value /100;
            //alert(valor);
            //  alert(total); 
            //  alert(porcentaje); 
            // Aquí valido si hay un valor previo, si no hay datos, le pongo un cero "0".
            total = (total == null || total == undefined || total == "") ? 0 : total;
             valor2 = (valor2 == null || valor2 == undefined || valor2 == "") ? 0 : parseInt(valor2);
            valor3 = (valor3 == null || valor3 == undefined || valor3 == "") ? 0 : parseInt(valor3);
            /* Esta es la suma. */

            total_ptos=valor  * porcentaje;
            total_final = Number.parseFloat(total) + Number.parseFloat(total_ptos);
            // Colocar el resultado de la suma en el control "span".
            document.forms[id].elements.nota4_f.value = total_ptos;
            document.forms[id].elements.final.value =Math.round(total_final);
                if((valor< 15 || valor2 <15 || valor3<15)&& unidad=='SEM' && retiro==0){
                document.forms[id].elements.observaciones.value='REPROBADO';
                document.forms[id].elements.observaciones.style.color="Red";
                document.forms[id].elements.final.value =14;
            }else{
                document.forms[id].elements.observaciones.value=' ';
               //  document.forms[id].elements.final.value =total_final;
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
                       <h3 class="card-title"><strong>Unidad Curricular :  </strong><?php foreach($unidad_curricular as $unidad_curricular){echo $unidad_curricular->codigo.' '.$unidad_curricular->nombre;

                                 if($unidad_curricular->sigla_uc=='SEI' or $unidad_curricular->sigla_uc=='SEII' or $unidad_curricular->sigla_uc=='SEIII' or $unidad_curricular->sigla_uc=='SI1'){                        
                        $unidad='SEM';
                        $nota1_e=40;$nota2_e=20;$nota3_e=20;$nota4_e=20;
                    }else{
                        $unidad='OTRA';
                        $nota1_e=40;$nota2_e=30;$nota3_e=40;$nota4_e=10;
                    }
                   }?>
                      </strong></h3>
                        <div align="center">
                            <input type="button" name="btnSeguiente" value="Regresar" class="boton btn btn-info"  title="Regresar" onClick="history.back()">
                           
                        </div>
                     
                         <hr>
                          <div align="right">
                         <?php if( ($rol_usuario->rol_id==2 or $rol_usuario->rol_id==10) and ($proceso_cerrado<>false and $revision<>'1')){ ?>
                                        <input type="button" name="btnCerrar" value="Activar Registro de Notas" class="boton btn btn-success"  title="Activar Registro de Notas" onClick="activar_proceso(<?php echo $oferta_academica;?>);">
					   &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
                                         <a title="Descargar Plan de Clases y Evaluaciones" href="<?php  echo base_url()?>dashboard06/dPDF/<?php echo $oferta_academica;?>"" target="_blank"><img src="<?php echo base_url(); ?>assets/img/pdf.jpeg"  alt="PDF" style="width: 10mm; height: 10mm; margin: 0;" /></a>
                                    <?php 
                        }else{ 
                            if($rol_usuario->rol_id==9 or $rol_usuario->rol_id==2 or $rol_usuario->rol_id==10 ){
                                if($revision<>'1' ){?>
                            <input type="button" name="btnCerrar" value="Cerrar Registro de Notas" class="boton btn btn-success"  title="Cerrar Registro de Notas" onClick="cerrar_proceso(<?php echo $oferta_academica;?>);">
                            
                             <a title="Descargar Plan de Clases y Evaluaciones" href="<?php  echo base_url()?>dashboard06/dPDF/<?php echo $oferta_academica;?>"" target="_blank"><img src="<?php echo base_url(); ?>assets/img/pdf.jpeg"  alt="PDF" style="width: 10mm; height: 10mm; margin: 0;" /></a>
                             <?php }else{?>
                                <a title="Descargar Plan de Clases y Evaluaciones" href="<?php  echo base_url()?>dashboard06/dPDF/<?php echo $oferta_academica;?>"" target="_blank"><img src="<?php echo base_url(); ?>assets/img/pdf.jpeg"  alt="PDF" style="width: 10mm; height: 10mm; margin: 0;" /></a>
                             <?php } ?>
                        <?php } } ?>
                      </div>
                    </div>
                    
                           
                    
                     
                      <div class="card-body">
                     
                            <?php $cerrado=0; ?>                            
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
              
              <?php $i=0;   $n=0;
                    foreach ($notas as $notas) 
                    { 
                  $n++;
              //    echo $notas->nota_final;
                    if((is_null($notas->nota_final) and $notas->retiro<>1) or(is_null($notas->nota_final) and $notas->observaciones<>'RETIRO VOLUNTARIO')  ){
                    $check=0;
                   }else{
			if($notas->retiro==1 or $notas->nota_final>=1){
                    $check=1;
			}
                   }
                    ?>
                <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered table-condensed" id="example1" width="100%">
                            
                  
            

                    <form  name="carga" action="<?php echo base_url()?>dashboard06/guardar_notas" method="POST">  
                    <input type="hidden" name="rol" id ="rol" value="<?php print  $this->session->userdata("rol"); ?>" >
                    <input type="hidden" name="id_oferta_academica" id ="id_oferta_academica" value="<?php print  $this->uri->segments[3]; ?>" >
                    <thead>
                        <tr>
                            <th>N°</th>
                            <th>Cédula</th>
                            <th>Nombre</th>
                            <th>Apellido</th>                           
                            <th> Nota N° 1 <br>(<?php echo $nota1_e; ?>%)</th>
                            <th> Nota N° 2 <br>(<?php echo $nota2_e; ?>%)</th>
                            <th> Nota N° 3 <br>(<?php echo $nota3_e; ?>%)</th>
                            <th> Nota N° 4 <br>(<?php echo $nota4_e; ?>%)</th>
                            <th > Nota Definitiva<br>(100%)</th>
                            <th colspan="2"> Observaciones</th>
                        </tr>
                    </thead>
                 <tbody>
                   <?php if( $rol_usuario->rol_id==2 and $revision=='1' ){ $readonly='readonly';}else{$readonly='';}?>
                    <tr>
                        <input type="hidden" name="nota1_e" id ="nota1_e" value="<?php print $nota1_e ?>">
                        <input type="hidden" name="nota2_e" id ="nota2_e" value="<?php print $nota2_e; ?>">
                        <input type="hidden" name="nota3_e" id ="nota3_e" value="<?php print $nota3_e; ?>">
                        <input type="hidden" name="nota4_e" id ="nota4_e" value="<?php print $nota4_e; ?>">

                        <input type="hidden" name="unidad" id ="unidad" value="<?php print $unidad; ?>">
                        <input type="text" name="retiro[]" id ="retiro" value="<?php print $notas->retiro; ?>">                            
                        <input type="text" name="id_materias_preinscrita[]" id ="id_materias_preinscrita" value="<?php print  $notas->id_mp; ?>" >
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
                

                        <?php if (($notas->retiro=='1' or $notas->retiro=='2' or $notas->retiro=='3') and ($this->session->userdata("rol")==9 or $this->session->userdata("rol")==10 or $this->session->userdata("rol")==2) ){ $bloqueo='readonly'; }else{ $bloqueo=' '; }?>
                        <td><input type="number"  max="20" min="0" onkeypress="return controltag(event);"   name="nota1" id="nota1" onblur="javasript:punto1(this.value,<?php echo $i?>);" value="<?php echo $nota1=$notas->nota_1;?>" <?php print $readonly; print $bloqueo;?>> <div><input type="text"  id ="nota1_f" name="nota1_f"  size="4"  readonly value="<?php $total1=(($nota1 * $nota1_e)/100); echo $total1;?> " >ptos.</div></td>
                   
                        <td><input type="number" max="20" min="0"onkeypress="return controltag(event)" name="nota2" id="nota2"   onblur="javasript:punto2(this.value,<?php echo $i?>);"  value="<?php echo $nota2=$notas->nota_2;?>" <?php print $readonly; print $bloqueo;?>> <div><input type="text" name="nota2_f" id ="nota2_f" size="4" readonly value="<?php   $total2=(($nota2 * $nota2_e)/100); echo $total2; ?> " >ptos.</div></td>

                        <td><input type="number" max="20" min="0"onkeypress="return controltag(event)"  name="nota3" onblur="javasript:punto3(this.value,<?php echo $i?>);"  value="<?php echo $nota3=$notas->nota_3;?>" <?php print $readonly; print $bloqueo;?>> <div><input type="text"  name="nota3_f" id ="nota3_f"  size="4" readonly value="<?php   $total3=(($nota3 * $nota3_e)/100); echo $total3;?> " >ptos.</div></td>
                        <td><input type="number" max="20" min="0"onkeypress="return controltag(event)"  name="nota4" onblur="javasript:punto4(this.value,<?php echo $i?>);"  value="<?php echo $nota4=$notas->nota_4;?>" <?php print $readonly; print $bloqueo;?>> <div><input type="text"  id ="nota4_f"  name="nota4_f" size="4" readonly value="<?php   $total4=(($nota4 * $nota4_e)/100); echo $total4?> " >ptos.</div></td>
                       <?php if(( $this->session->userdata("rol")==10 OR $this->session->userdata("rol")==2 OR $this->session->userdata("rol")==4) and $revision<>'1' ){ ?>
                        <td><input type="number" max="20" min="0"   id ="final" name="final" value="<?php echo $notas->nota_final; ?>"> <div> <?php echo'ptos.';?></div></td>
      <?php } else{?>
		 <td><input type="text" max="20" min="0"   readonly id ="final" name="final" value="<?php echo $notas->nota_final; ?>"> <div> <?php echo'ptos.';?></div></td>
<?php }?>
                        <td>  <input type="text" name="observaciones" id ="observaciones" value="<?php print $notas->observaciones; ?>" onkeyup="javascript:this.value=this.value.toUpperCase();" <?php print $bloqueo; ?> ><br> <span style="color: red;"><?php if($notas->retiro==1) echo "RETIRO VOLUNTARIO"; if($notas->retiro==2) echo "RETIRO MATRÍCULA POR CAUSALES ACADÉMICAS"; if($notas->retiro==3) echo "DECISIÓN CAIP";?></span></td>
			
                         <?php if($this->session->userdata("rol")==9   ){?>
				<td> <div> <button type="submit" name="cargar" id="cargar" <?php if ($proceso_cerrado <> false)$disabled='disabled'; else $disabled='';?> <?php print $disabled; ?>  class="btn btn-primary"title="-Hacer clic para Registrar Nota-"> Cargar</button> </div></td>
                         <?php } ?>
			<?php if( ($this->session->userdata("rol")==10 OR $this->session->userdata("rol")==2)  OR ($this->session->userdata("rol")==4  and $periodo->id < 8) and $revision<>'1'   ){ ?>
                        
                            <td><div><button type="submit" name="cargar" id="cargar"  class="btn btn-primary"title="-Hacer clic para Registrar Nota-"> Cargar</button> </div></td>
                            
                        <?php } ?>
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
                         <?php if( $rol_usuario->rol_id==2 or $rol_usuario->rol_id==10 ){
                                     if( $proceso_cerrado<>false and $revision<>'1'){ ?>
                                        <input type="button" name="btnCerrar" value="Activar Registro de Notas" class="boton btn btn-success"  title="Activar Registro de Notas" onClick="activar_proceso(<?php echo $oferta_academica;?>);">
                       &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
                                         <a title="Descargar Plan de Clases y Evaluaciones" href="<?php  echo base_url()?>dashboard06/dPDF/<?php echo $oferta_academica;?>"" target="_blank"><img src="<?php echo base_url(); ?>assets/img/pdf.jpeg"  alt="PDF" style="width: 10mm; height: 10mm; margin: 0;" /></a>
                                    <?php }
                        }else{ if(($rol_usuario->rol_id==9 or $rol_usuario->rol_id==2 or $rol_usuario->rol_id==10)and $revision<>'1' ){?>
                            <input type="button" name="btnCerrar" value="Cerrar Registro de Notas" class="boton btn btn-success"  title="Cerrar Registro de Notas" onClick="cerrar_proceso(<?php echo $oferta_academica;?>);">
                            <?php } ?>
                             <a title="Descargar Plan de Clases y Evaluaciones" href="<?php  echo base_url()?>dashboard06/dPDF/<?php echo $oferta_academica;?>"" target="_blank"><img src="<?php echo base_url(); ?>assets/img/pdf.jpeg"  alt="PDF" style="width: 10mm; height: 10mm; margin: 0;" /></a>
                        <?php } ?>
                      </div>
      
</div>
              </div>
                </div><!-- /.card -->





    </section>
    <!-- /.content -->
 


  </div>
