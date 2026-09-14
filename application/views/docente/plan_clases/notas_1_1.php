 <!-- Content Wrapper. Contains page content -->

 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
    <!-- /.container-fluid -->
    </section>
 
    <!-- Main content -->
    <section class="content">
            <script language="javascript">
                  function anterior1()
                { 
                    if( document.forms.form.elements.rol.value=='2'|| document.forms.form.elements.rol.value=='10'){
                        location.href="/control_estudio/dashboard05/revisar_plan_clases";
                    }
                }
                function anterior2()
                { 
                    if( document.forms.form.elements.rol.value=='2' || document.forms.form.elements.rol.value=='10' ){
                            location.href="/control_estudio/dashboard05/notas_cargadas";
                        
                    }
                }
                function anterior3()
                { 
                    if( document.forms.form.elements.rol.value=='9'){
                      
                        location.href="/control_estudio/dashboard06/matricula";
                    }
                }
                function anterior4()
                { 
                    if( document.forms.form.elements.rol.value=='2' || document.forms.form.elements.rol.value=='10'|| document.forms.form.elements.rol.value=='4'){
                      
                        location.href="/control_estudio/dashboard05/buscar_plan_clases";
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
//alert  (id); 
                var total_ptos = 0; 
                var total_final=0;
                var total=0;
                var unidad =document.forms.form.elements.unidad.value ;
                var retiro=document.forms.form.elements.retiro.value ;
                valor = parseInt(valor); // Convertir el valor a un entero (número).
                valor2=document.forms.form.elements.nota2[id].value;
                valor3=document.forms.form.elements.nota3[id].value;
                //    alert(unidad);  
                // alert(valor);    alert(retiro);
              //   alert(valor2);  alert(valor3); 
                if(unidad=='SEM' ){  
                    valor4=document.forms.form.elements.nota4[id].value;
                    total =  Number.parseFloat(document.forms.form.elements.nota2_f[id].value)+Number.parseFloat(document.forms.form.elements.nota3_f[id].value)+Number.parseFloat(document.forms.form.elements.nota4_f[id].value);
                }
                if(unidad=='SEM1' ){  
                        total =  Number.parseFloat(document.forms.form.elements.nota2_f[id].value)+Number.parseFloat(document.forms.form.elements.nota3_f[id].value);
		
                    }else{
                        total =  Number.parseFloat(document.forms.form.elements.nota2_f[id].value)+Number.parseFloat(document.forms.form.elements.nota3_f[id].value) +Number.parseFloat(document.forms.form.elements.nota4_f[id].value);
                }
            
                porcentaje=document.forms.form.elements.nota1_e.value /100;

               //  alert(total); 
                //   alert(porcentaje); 
                // Aquí valido si hay un valor previo, si no hay datos, le pongo un cero "0".
                total = (total == null || total == undefined || total == "") ? 0 : total;
                valor2 = (valor2 == null || valor2 == undefined || valor2 == "") ? 0 : parseInt(valor2);
                valor3 = (valor3 == null || valor3 == undefined || valor3 == "") ? 0 : parseInt(valor3);
                if(unidad=='SEM' ){  valor4 = (valor4 == null || valor4 == undefined || valor4 == "") ? 0 : parseInt(valor4);}

                /* Esta es la suma. */
                total_ptos=valor  * porcentaje;
                total_final = Number.parseFloat(total) + Number.parseFloat(total_ptos);
               
                // Colocar el resultado de la suma en el control "span".
                document.forms.form.elements.nota1_f[id].value = total_ptos;
                document.forms.form.elements.final[id].value = Math.round(total_final);
                // alert(unidad);
                if ( unidad=='SEM' && retiro ==0){
                    if((valor <15 || valor2< 15 || valor3 <15 || valor4<15 )  ){
                     //     alert(unidad);
                        document.forms.form.elements.observaciones[id].value='REPROBADO';
                        document.forms.form.elements.observaciones[id].style.color="Red";
                        document.forms.form.elements.final[id].value =14;                    
                    }
                }
               // alert(valor); alert(valor2); alert(valor3);
                if(unidad=='SEM1' && retiro ==0){
                    if((valor< 15 || valor2< 15 || valor3 <15  )  ){
                      //    alert(unidad);  alert(total_final);
                        document.forms.form.elements.observaciones[id].value='REPROBADO';
                        document.forms.form.elements.observaciones[id].style.color="Red";
                        document.forms.form.elements.final[id].value =14;
                    }else{
                        document.forms.form.elements.observaciones[id].value=' ';                   
                    }
                }   
            }
            function punto2(valor,id){       
                var total_ptos = 0; 
                var total_final=0;
                var total=0;
                var unidad =document.forms.form.elements.unidad.value ;
                var retiro=document.forms.form.elements.retiro.value ;
                valor = parseInt(valor); // Convertir el valor a un entero (número).
                valor1=document.forms.form.elements.nota1[id].value;
                valor3=document.forms.form.elements.nota3[id].value;

                if(unidad=='SEM' ){  
                    valor4=document.forms.form.elements.nota4[id].value;
                    total =  Number.parseFloat(document.forms.form.elements.nota1_f[id].value)+Number.parseFloat(document.forms.form.elements.nota3_f[id].value)+Number.parseFloat(document.forms.form.elements.nota4_f[id].value);
                }
                if(unidad=='SEM1' ){  
                        total =  Number.parseFloat(document.forms.form.elements.nota1_f[id].value)+Number.parseFloat(document.forms.form.elements.nota3_f[id].value);
                    }else{
                        total =  Number.parseFloat(document.forms.form.elements.nota1_f[id].value)+Number.parseFloat(document.forms.form.elements.nota3_f[id].value)+Number.parseFloat(document.forms.form.elements.nota4_f[id].value);
                }
                porcentaje= document.forms.form.elements.nota2_e.value /100;
                //alert(valor);
                //  alert(total); 
                //  alert(porcentaje); 
                // Aquí valido si hay un valor previo, si no hay datos, le pongo un cero "0".
                total = (total == null || total == undefined || total == "") ? 0 : total;
                valor3 = (valor3 == null || valor3 == undefined || valor3 == "") ? 0 : parseInt(valor3);
                if(unidad=='SEM'){   valor4 = (valor4 == null || valor4 == undefined || valor4 == "") ? 0 : parseInt(valor4);}
                /* Esta es la suma. */

                total_ptos=valor  * porcentaje;
                total_final = Number.parseFloat(total) + Number.parseFloat(total_ptos);
                // Colocar el resultado de la suma en el control "span".
                document.forms.form.elements.nota2_f[id].value = total_ptos;
                document.forms.form.elements.final[id].value =Math.round(total_final);
                if ( unidad=='SEM' && retiro ==0){
                    if((valor1 <15 || valor< 15 || valor3 <15 || valor4<15 )  ){
                     //     alert(unidad);
                        document.forms.form.elements.observaciones[id].value='REPROBADO';
                        document.forms.form.elements.observaciones[id].style.color="Red";
                        document.forms.form.elements.final[id].value =14;                    
                    }
                }
               // alert(valor); alert(valor2); alert(valor3);
                if(unidad=='SEM1' && retiro ==0){
                    if((valor1< 15 || valor< 15 || valor3 <15  )  ){
                      //    alert(unidad);  alert(total_final);
                        document.forms.form.elements.observaciones[id].value='REPROBADO';
                        document.forms.form.elements.observaciones[id].style.color="Red";
                        document.forms.form.elements.final[id].value =14;
                    }else{
                        document.forms.form.elements.observaciones[id].value=' ';                   
                    }
                }    
            }
                function punto3(valor,id){       
                var total_ptos = 0; 
                var total_final=0;
                var total=0;
                var unidad =document.forms.form.elements.unidad.value ;
                var retiro=document.forms.form.elements.retiro.value ;

                valor = parseInt(valor); // Convertir el valor a un entero (número).
                valor2=document.forms.form.elements.nota2[id].value;
                valor1=document.forms.form.elements.nota1[id].value;

                if(unidad=='SEM' ){  
                    valor4=document.forms.form.elements.nota4[id].value;
                    total =  Number.parseFloat(document.forms.form.elements.nota1_f[id].value)+Number.parseFloat(document.forms.form.elements.nota2_f[id].value)+Number.parseFloat(document.forms.form.elements.nota4_f[id].value);
                }
                if(unidad=='SEM1' ){  
                        total =  Number.parseFloat(document.forms.form.elements.nota1_f[id].value)+Number.parseFloat(document.forms.form.elements.nota2_f[id].value);
                    }else{
                        total =  Number.parseFloat(document.forms.form.elements.nota1_f[id].value)+Number.parseFloat(document.forms.form.elements.nota2_f[id].value)+Number.parseFloat(document.forms.form.elements.nota4_f[id].value);
                }

                porcentaje=document.forms.form.elements.nota3_e.value /100;
                //  alert(valor);
                //   alert(total); 
                //  alert(porcentaje); 
                // Aquí valido si hay un valor previo, si no hay datos, le pongo un cero "0".
                total = (total == null || total == undefined || total == "") ? 0 : total;
                valor2 = (valor2 == null || valor2 == undefined || valor2 == "") ? 0 : parseInt(valor2);
                if(unidad=='SEM'){valor4 = (valor4 == null || valor4 == undefined || valor4 == "") ? 0 : parseInt(valor4);}
                /* Esta es la suma. */

                total_ptos=valor  * porcentaje;
                total_final = Number.parseFloat(total) + Number.parseFloat(total_ptos);
                // Colocar el resultado de la suma en el control "span".
                document.forms.form.elements.nota3_f[id].value = total_ptos;
                document.forms.form.elements.final[id].value =Math.round(total_final);

                if ( unidad=='SEM' && retiro ==0){
                    if((valor1 <15 || valor2< 15 || valor <15 || valor4<15 )  ){
                     //     alert(unidad);
                        document.forms.form.elements.observaciones[id].value='REPROBADO';
                        document.forms.form.elements.observaciones[id].style.color="Red";
                        document.forms.form.elements.final[id].value =14;                    
                    }
                }
               // alert(valor); alert(valor2); alert(valor3);
                if(unidad=='SEM1' && retiro ==0){
                    if((valor1< 15 || valor2< 15 || valor <15  )  ){
                      //    alert(unidad);  alert(total_final);
                        document.forms.form.elements.observaciones[id].value='REPROBADO';
                        document.forms.form.elements.observaciones[id].style.color="Red";
                        document.forms.form.elements.final[id].value =14;
                    }else{
                        document.forms.form.elements.observaciones[id].value=' ';                   
                    }
                }    
                }   
                function punto4(valor,id){       
                var total_ptos = 0; 
                var total_final=0;
                var total=0;
                var unidad =document.forms.form.elements.unidad.value ;
                var retiro=document.forms.form.elements.retiro.value ;

                valor = parseInt(valor); // Convertir el valor a un entero (número).
                valor2=document.forms.form.elements.nota2[id].value;
                valor1=document.forms.form.elements.nota1[id].value;
                valor3=document.forms.form.elements.nota3[id].value;

                if(unidad=='SEM' ){  
                
                    total =  Number.parseFloat(document.forms.form.elements.nota1_f[id].value)+Number.parseFloat(document.forms.form.elements.nota2_f[id].value)+Number.parseFloat(document.forms.form.elements.nota3_f[id].value);
                }
                if(unidad=='SEM1' ){  
                        total =  Number.parseFloat(document.forms.form.elements.nota1_f[id].value)+Number.parseFloat(document.forms.form.elements.nota2_f[id].value)+Number.parseFloat(document.forms.form.elements.nota3_f[id].value);
                    }else{
                        total =  Number.parseFloat(document.forms.form.elements.nota1_f[id].value)+Number.parseFloat(document.forms.form.elements.nota2_f[id].value)+Number.parseFloat(document.forms.form.elements.nota3_f[id].value);
                }

                porcentaje=document.forms.form.elements.nota4_e.value /100;
                //  alert(valor);
                //   alert(total); 
                //  alert(porcentaje); 
                // Aquí valido si hay un valor previo, si no hay datos, le pongo un cero "0".
                total = (total == null || total == undefined || total == "") ? 0 : total;
                valor2 = (valor2 == null || valor2 == undefined || valor2 == "") ? 0 : parseInt(valor2);
                valor3 = (valor3 == null || valor3 == undefined || valor3 == "") ? 0 : parseInt(valor3);
               {valor1 = (valor1 == null || valor1 == undefined || valor1 == "") ? 0 : parseInt(valor1);}
                /* Esta es la suma. */

                total_ptos=valor  * porcentaje;
                total_final = Number.parseFloat(total) + Number.parseFloat(total_ptos);
                // Colocar el resultado de la suma en el control "span".
                document.forms.form.elements.nota4_f[id].value = total_ptos;
                document.forms.form.elements.final[id].value =Math.round(total_final);               
               // alert(valor); alert(valor2); alert(valor3);
                if(unidad=='SEM1' && retiro ==0){
                    if((valor1< 15 || valor2< 15 || valor3 <15 || valor <15  )  ){
                      //    alert(unidad);  alert(total_final);
                        document.forms.form.elements.observaciones[id].value='REPROBADO';
                        document.forms.form.elements.observaciones[id].style.color="Red";
                        document.forms.form.elements.final[id].value =14;
                    }else{
                        document.forms.form.elements.observaciones[id].value=' ';                   
                    }
                }    
                }
            </script>
            <div class="card">
                <div class="card-header">
                <div align="right">
                         
                          
                         <a href="<?php echo base_url(); ?>dashboard06/matricula_estudiantes/<?=$oferta_academica; ?>"  name="item" class="">
                                  <span class='btn-info badge'>
                                   <i class="fa fa-users" aria-hidden="true">Matrícula</i>
  
                                  </span>   
                              </a>
                 <a href="<?php echo base_url(); ?>dashboard06/asistencia/<?= $oferta_academica; ?>"  name="item" class="">
                                  <span class='btn-primary badge'>
                                  <i class="fa fa-check" aria-hidden="true">  Asistencia</i>
                                  </span>   
                              </a>
                              <a href="<?php echo base_url(); ?>dashboard06/evaluacion/<?=$oferta_academica; ?>/<?=$periodo->id; ?>"  name="item" class="">
                                  <span class='btn-success badge'>
                                  <i class="fa fa-check">  Plan de Evaluación</i>
                                  </span>   
                              </a>
                              
                                              
                          </div>                    
                          <hr>
                    <h3 class="card-title"><strong>Registrar Notas Período :  </strong><?php  echo $periodo->nombre;?>
                    </h3>
                    <br>
                    <h3 class="card-title"><strong>Docente :  </strong><?php  echo $docente->primer_nombre.' '.$docente->segundo_nombre.' '.$docente->primer_apellido.' '.$docente->segundo_apellido ;?>
                    </h3>
                    <br>
                    <h3 class="card-title"><strong>Unidad Curricular :  </strong>
                        <?php foreach($unidad_curricular as $unidad_curricular){
                                echo $unidad_curricular->codigo.' '.$unidad_curricular->nombre;
                                if($unidad_curricular->sigla_uc=='SEI' or $unidad_curricular->sigla_uc=='SEII' or $unidad_curricular->sigla_uc=='SEIII'or  $unidad_curricular->sigla_uc=='SI1'or $unidad_curricular->sigla_uc=='SI'){  
                                    if($unidad_curricular->programa=='10' ){    
                                        $unidad='SEM';
                                        $nota1_e=50;$nota2_e=20;$nota3_e=20;$nota4_e=10;  $ocultar=0;
                                    }else{
                                        $unidad='SEM1';
                                        $nota1_e=40;$nota2_e=30;$nota3_e=30;  $ocultar=1;
                                    }
                                } else{
                                    $unidad='OTRA';
                                    $nota1_e=25;$nota2_e=25;$nota3_e=40;$nota4_e=10;  $ocultar=0;
                                }
                            //  echo $ocultar;
                        }?>
                        </strong>
                    </h3>        
                    <div align="center">
                        <?php if($revision =='1' and ($this->session->userdata("rol")==2 or $this->session->userdata("rol")==10) ){?>
                            <input type="button" name="btnSeguiente" value="Regresar" class="boton btn btn-info"  title="Regresar" onClick="anterior2()">                           
                           
                       <?php } //echo $revision;
                       if($revision =='0' and ($this->session->userdata("rol")==2 or $this->session->userdata("rol")==10 or $this->session->userdata("rol")==4) ){?>
                            <input type="button" name="btnSeguiente" value="Regresar" class="boton btn btn-info"  title="Regresar" onClick="anterior1()">   
                           
                       <?php }
                       if($revision =='2' and ($this->session->userdata("rol")==2 or $this->session->userdata("rol")==10 or $this->session->userdata("rol")==4) ){?>
                        <input type="button" name="btnSeguiente" value="Regresar" class="boton btn btn-info"  title="Regresar" onClick="anterior4()">   
                       
                   <?php }
                       if( $this->session->userdata("rol")==9){ ?>
                            <input type="button" name="btnSeguiente" value="Regresar" class="boton btn btn-info"  title="Regresar" onClick="anterior3()">                           
                             
                        <?php } ?>
                        </div> 
                   
                        <hr>

                        <div align="right">
                    
                            <?php if( ( ($rol_usuario->rol_id==2 or  $rol_usuario->rol_id==10 )  and ($proceso_cerrado==0)) ){ ?>
                                <input type="button" name="btnCerrar" value="Cerrar Registro de Notas" class="boton btn btn-success"  title="Cerrar Registro de Notas" onClick="cerrar_proceso(<?php echo $oferta_academica;?>);">
                                <a title="Descargar Plan de Clases y Evaluaciones" href="<?php  echo base_url()?>dashboard06/dPDF/<?php echo $oferta_academica;?>"" target="_blank"><img src="<?php echo base_url(); ?>assets/img/pdf.jpeg"  alt="PDF" style="width: 10mm; height: 10mm; margin: 0;" /></a>
                                <?php $cerrado=0;
                                }elseif( ($rol_usuario->rol_id==2 or  $rol_usuario->rol_id==10 ) and ($proceso_cerrado>0)){?>
                                    <input type="button" name="btnCerrar" value="Activar Registro de Notas" class="boton btn btn-success"  title="Activar Registro de Notas" onClick="activar_proceso(<?php echo $oferta_academica;?>);">
                                    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
                                    <a title="Descargar Plan de Clases y Evaluaciones" href="<?php  echo base_url()?>dashboard06/dPDF/<?php echo $oferta_academica;?>"" target="_blank"><img src="<?php echo base_url(); ?>assets/img/pdf.jpeg"  alt="PDF" style="width: 10mm; height: 10mm; margin: 0;" /></a>
                                    <?php  $cerrado=1;  
                                 }

                                 if($rol_usuario->rol_id==9 and $proceso_cerrado==0){?>      
                                <input type="button" name="btnCerrar" value="Cerrar Registro de Notas" class="boton btn btn-success"  title="Cerrar Registro de Notas" onClick="cerrar_proceso(<?php echo $oferta_academica;?>);">
                                <?php $cerrado=0;
                               }elseif( $rol_usuario->rol_id==9 and $proceso_cerrado>0){?>
                                <b>Proceso Cerrado</b>
                                <a title="Descargar Plan de Clases y Evaluaciones" href="<?php  echo base_url()?>dashboard06/dPDF/<?php echo $oferta_academica;?>"" target="_blank"><img src="<?php echo base_url(); ?>assets/img/pdf.jpeg"  alt="PDF" style="width: 10mm; height: 10mm; margin: 0;" /></a>
                                <?php 
                              $cerrado=1;  
                            } ?>
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
                

                    <!-- Comienzo formulario -->
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <form name="form" action="<?php echo base_url()?>dashboard06/guardar_notas" method="POST">    
                                <?php $i=0;   $n=0; ?>
                                <input type="hidden" name="rol" id ="rol" value="<?php print  $this->session->userdata("rol"); ?>" >
                                <input type="hidden" name="nota1_e" id ="nota1_e" value="<?php print $nota1_e ?>">
                                <input type="hidden" name="nota2_e" id ="nota2_e" value="<?php print $nota2_e; ?>">
                                <input type="hidden" name="nota3_e" id ="nota3_e" value="<?php print $nota3_e; ?>">
                                <?php if ($ocultar==0){?>
                                <input type="hidden" name="nota4_e" id ="nota4_e" value="<?php print $nota4_e; ?>">
                                <?php } ?>
                                <input type="hidden" name="unidad" id ="unidad" value="<?php print $unidad; ?>">
                                <input type="hidden" name="id_oferta_academica" id ="id_oferta_academica" value="<?php print  $this->uri->segments[3]; ?>" >
                                <table id="example" class="table table-striped">  
                                    <?php if( $rol_usuario->rol_id==2 and $revision=='1' ){ $readonly='readonly';}else{$readonly='';}?>   
                                    <thead>
                                        <tr>
                                            <th>N°</th>
                                            <th>Cédula</th>
                                            <th>Nombre</th>
                                            <th>Apellido</th>                           
                                            <th> Nota N° 1 <br>(<?php echo $nota1_e; ?>%)</th>
                                            <th> Nota N° 2 <br>(<?php echo $nota2_e; ?>%)</th>
                                            <th> Nota N° 3 <br>(<?php echo $nota3_e; ?>%)</th>
                                                <?php  if ($ocultar==0){?>
                                                    <th> Nota N° 4 <br>(<?php echo $nota4_e; ?>%)</th>
                                                <?php } ?>
                                                    <th > Nota Definitiva<br>(100%)</th>
                                                    <th> Observaciones</th>
                                                  <!--  <th>Opción </th>-->
                                        </tr>
                                    </thead>
     <tbody>      
                                    <?php  foreach ($notas as $notas)   {   $n++;?>                                   
                                    
                                           
                                        <?php
                                        //    echo $notas->nota_final;
                                        if((is_null($notas->nota_final) and $notas->retiro==0)   ){
                                        $check=0;
                                        }else{
                                        if($notas->nota_final>=0){
                                            $check=1;
                                        }
                                        }
                                        ?>
                                            <?php if (($notas->retiro=='1'  or $notas->retiro=='2'or $notas->retiro=='3') and ($this->session->userdata("rol")==9 or $this->session->userdata("rol")==10 or $this->session->userdata("rol")==2 or $this->session->userdata("rol")==4) ){ $bloqueo='readonly'; $disabled='disabled';}else{ $bloqueo=' '; $disabled='';}?>
                                        <tr>     
                                            <td >
                                                <div>
                                                <input type="hidden" name="retiro[]" id ="retiro" value="<?php print $notas->retiro; ?>">                            
                                                <input type="hidden" name="id_materias_preinscrita[]" id ="id_materias_preinscrita" value="<?php print  $notas->id_mp; ?>" >
                                                <?php echo $n; 
                                                if($check==1){
                                                echo "<br><span class='btn-success badge'><i class='fa fa-check' title='Nota Registrada'></i></span>"; 
                                                }
                                                if($check==0){
                                                echo "<br><span class='btn-danger badge'><i class='fa fa-times' title='Nota Registrada'></i></span>";
                                                }
                                                ?> 
                                                </div>
                                            </td>
                                            <td><?= $notas->nacionalidad.'-'.$notas->cedula; ?> </td>  
                                            <td><?= $notas->primer_nombre.' '.$notas->segundo_nombre; ?></td>  
                                            <td><?= $notas->primer_apellido.' '.$notas->segundo_apellido; ?></td>      
                                            <?php if (($notas->retiro=='1'  or $notas->retiro=='2') and ($this->session->userdata("rol")==9 or $this->session->userdata("rol")==10 or $this->session->userdata("rol")==2  or $this->session->userdata("rol")==4) ){ $bloqueo='readonly'; }else{ $bloqueo=' '; }?>
                                                <td><input type="number"  max="20" min="0" onkeypress="return controltag(event);"   name="nota1[]" id="nota1" oninput="javasript:punto1(this.value,<?php echo $i;?>);" value="<?php echo $nota1=$notas->nota_1;?>" <?php print $readonly; print $bloqueo;?>> 
                                                <div><input type="text"  id ="nota1_f" name="nota1_f[]"  size="4"  disabled value="<?php $total1=(($nota1 * $nota1_e)/100); echo $total1;?> " >ptos.</div></td>

                                                <td><input type="number" max="20" min="0"onkeypress="return controltag(event)" name="nota2[]" id="nota2"   oninput="javasript:punto2(this.value,<?php echo $i;?>);"  value="<?php echo $nota2=$notas->nota_2;?>" <?php print $readonly; print $bloqueo;?>> 
                                                <div><input type="text" name="nota2_f[]" id ="nota2_f" size="4" disabled value="<?php   $total2=(($nota2 * $nota2_e)/100); echo $total2; ?> " >ptos.</div></td>

                                                <td><input type="number" max="20" min="0"onkeypress="return controltag(event)"  id="nota3" name="nota3[]" oninput="javasript:punto3(this.value,<?php echo $i;?>);"  value="<?php echo $nota3=$notas->nota_3;?>" <?php print $readonly; print $bloqueo;?>> 
                                                <div><input type="text"  name="nota3_f[]" id ="nota3_f"  size="4" disabled value="<?php   $total3=(($nota3 * $nota3_e)/100); echo $total3;?> " >ptos.</div></td>

                                                <?php if ($ocultar==0){?>
                                                <td><input type="number" max="20" min="0"onkeypress="return controltag(event)"  name="nota4[]" oninput="javasript:punto4(this.value,<?php echo $i;?>);"  value="<?php echo $nota4=$notas->nota_4;?>" <?php print $readonly; print $bloqueo;?>> 
                                                <div><input type="text"  id ="nota4_f"  name="nota4_f[]" size="4" disabled value="<?php   $total4=(($nota4 * $nota4_e)/100); echo $total4?> " >ptos.</div></td>
                                            <?php } ?>
                                            <td><input type="text" max="20" min="0" readonly id ="final" name="final[]" value="<?php echo $notas->nota_final; ?>"> <div> <?php echo'ptos.';?></div></td>
                                            <td>  
                                                <input type="text" name="observaciones[]" id ="observaciones" value="<?php print $notas->observaciones; ?>" onkeyup="javascript:this.value=this.value.toUpperCase();" <?php print $bloqueo; ?> >
                                                <div><span style="color: red;">
                                                     <?php if($notas->retiro==1) echo "RETIRO VOLUNTARIO"; if($notas->retiro==2) echo "RETIRO MATRÍCULA POR CAUSALES ACADÉMICAS"; if($notas->retiro==3) echo "DECISIÓN CAIP";?>
                                                </span>
                                                </div>
                                            </td>
                                            <?php if($this->session->userdata("rol")==9  ){?>
                                         <!--   <td>
                                                <div> 
                                                <button type="submit" name="cargar" id="cargar" <?php if ($proceso_cerrado <> false)$disabled='disabled'; else $disabled='';?> <?php print $disabled; ?>  class="btn btn-primary"title="-Hacer clic para Registrar Nota-"> Cargar</button> 
                                                </div>
                                            </td>-->
                                            <?php } ?>
                                            <?php if( ( $this->session->userdata("rol")==2) and $revision<>'1' ){ ?>
                                             <!--   <td>
                                                    <div>
                                                        <button type="submit" name="cargar" id="cargar"  class="btn btn-primary"title="-Hacer clic para Registrar Nota-" <?php echo $disabled;?>> Cargar</button> 
                                                    </div>
                                                </td>-->
                                            <?php } ?>
                                       
                                        </tr>   
                                       
                                   
                                    <?php   $i++;?>
                                    <?php  }?> 
 </tbody>
                                    <tfoot>
                                        <tr>
                                            <th colspan="11"></th>                            
                                        </tr>
                                    </tfoot>
                                </table> 
                                <div align="center">
                                    <?php if($this->session->userdata("rol")==9  or  $rol_usuario->rol_id==10 ){?>
                                        <div> 
                                            <button type="submit" name="cargar" id="cargar" <?php if ($proceso_cerrado <> false)$disabled='disabled'; else $disabled='';?> <?php print $disabled; ?>  class="btn btn-warning"title="-Hacer clic para Registrar Nota-"> <b>Guardar Todas las notas</b></button> 
                                        </div>
                                    <?php } ?>
                                    <?php if(  ($this->session->userdata("rol")==4 and $periodo->id >8) ){ ?>
                                        <div>
                                            <button type="submit" name="cargar" id="cargar"  class="btn btn-warning"title="-Hacer clic para Registrar Nota-"> <b>Guardar Todas las notas</b></button> 
                                        </div>
                                    <?php } ?>
                                </div>
                            </form>   
                            <hr>
                            <div align="right">
                            <?php //echo $proceso_cerrado; 
                            if( ( ($rol_usuario->rol_id==2 or  $rol_usuario->rol_id==10 )  and ($proceso_cerrado==0)) ){ ?>
                                <input type="button" name="btnCerrar" value="Cerrar Registro de Notas" class="boton btn btn-success"  title="Cerrar Registro de Notas" onClick="cerrar_proceso(<?php echo $oferta_academica;?>);">
                                <a title="Descargar Plan de Clases y Evaluaciones" href="<?php  echo base_url()?>dashboard06/dPDF/<?php echo $oferta_academica;?>"" target="_blank"><img src="<?php echo base_url(); ?>assets/img/pdf.jpeg"  alt="PDF" style="width: 10mm; height: 10mm; margin: 0;" /></a>
                                <?php  $cerrado=0;
                            }elseif( ($rol_usuario->rol_id==2 or  $rol_usuario->rol_id==10 )  and ($proceso_cerrado>0)){?>
                                    <input type="button" name="btnCerrar" value="Activar Registro de Notas" class="boton btn btn-success"  title="Activar Registro de Notas" onClick="activar_proceso(<?php echo $oferta_academica;?>);">
                                    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
                                    <a title="Descargar Plan de Clases y Evaluaciones" href="<?php  echo base_url()?>dashboard06/dPDF/<?php echo $oferta_academica;?>"" target="_blank"><img src="<?php echo base_url(); ?>assets/img/pdf.jpeg"  alt="PDF" style="width: 10mm; height: 10mm; margin: 0;" /></a>
                                    <?php  $cerrado=1;  
                            }

                            if($rol_usuario->rol_id==9 and $proceso_cerrado==0){?>      
                                <input type="button" name="btnCerrar" value="Cerrar Registro de Notas" class="boton btn btn-success"  title="Cerrar Registro de Notas" onClick="cerrar_proceso(<?php echo $oferta_academica;?>);">
                                <?php $cerrado=0;

                            }elseif( $rol_usuario->rol_id==9 and $proceso_cerrado>0){?>
                                <b>Proceso Cerrado</b>
                                <a title="Descargar Plan de Clases y Evaluaciones" href="<?php  echo base_url()?>dashboard06/dPDF/<?php echo $oferta_academica;?>"" target="_blank"><img src="<?php echo base_url(); ?>assets/img/pdf.jpeg"  alt="PDF" style="width: 10mm; height: 10mm; margin: 0;" /></a>
                                <?php 
                              $cerrado=1;  
                            } ?>
                            </div>   
                            
                        

                        </div><!-- /.panel-body -->
                    </div><!-- /.panel panel-default -->   
                </div><!-- /.card-body -->
            </div><!-- /.card -->
    </section> <!-- /.content -->
</div>



