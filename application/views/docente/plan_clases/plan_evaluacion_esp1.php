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
                if( document.getElementById('rol').value=='2'){
                    location.href="/control_estudio/dashboard05/buscar_plan_clases";
                 }else{
                    location.href="/control_estudio/dashboard06/matricula";
                 }
            }
          
        </script>
        <div class="card">
            <div class="card-header">
                <h3 class="card-title"><strong>Registrar Notas Período :  </strong><?php  echo $periodo->nombre;?>
                </h3>
                <br>
                <h3 class="card-title"><strong>Docente :  </strong><?php  echo $docente->primer_nombre.' '.$docente->segundo_apellido.' '.$docente->primer_apellido.' '.$docente->segundo_apellido ;?>
                </h3>
                <br>
                <h3 class="card-title"><strong>Unidad Curricular :  </strong><?php 
                foreach($unidad_curricular as $unidad_curricular){
                    echo $unidad_curricular->codigo.' '.$unidad_curricular->nombre.$unidad_curricular->des_programa;
                       $nota1_e=30;$nota2_e=20;$nota3_e=20;$nota4_e=20;$nota5_e=10;
                        $plan1='AVANCES';
                        $plan2='BORRADOR DEL TRABAJO DE GRADO';                    ;
                        $plan3='REVISIÓN DEL PROYECTO POR PARTE DEL ASESOR METODOLÓGICO';
                        $plan4='REVISIÓN DEL PROYECTO POR PARTE DEL EXPERTO EVALUADOR';
                        $plan5='REVISIÓN DEL PROYECTO POR PARTE DEL TUTOR';
                        $readonly_plan1='readonly';
                        $readonly_plan2='readonly';
                        $readonly_plan3='readonly';
                        $readonly_plan4='readonly';
                        $readonly_plan5='readonly';
                                          
                        $programa=2;// maestria*/
                        
                  
                 
            }?>
                </strong></h3>  
            </div><!--card-header-->
            <div class="card-body">            
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
                <?php $i=1;   ?>
                     <form  name="carga" action="<?php echo base_url()?>dashboard06/guardar_evaluacion/<?Php echo $oferta_academica;?>" method="POST">  
                     <input type="hidden" name="rol" id ="rol" value="<?php print  $this->session->userdata("rol"); ?>" >
                        <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered table-condensed" id="example1" width="100%">
                     
                            <thead>
                                <tr>
                                <th>N°</th>
                                <th> VALOR NOTA %</th>
                                <th>TIPO DE EVALUACION A APLICAR</th>                            
                                <th>FECHA DE LA EVALUACION</th>
                                </tr>              
                            </thead>                         
                 <?php  if (!empty($eva)){
                    foreach ($eva as $eva ) { ?>    
                         <input type="hidden" name="id" id ="id" value="<?php print $eva->id_evaluacion; ?>" >
                            <tbody>
                                <tr>
                                <td><?php echo $i++;?></td>

                                <td>     
                                <input type="text" name="nota1" id ="nota1" value="<?php print $nota1_e; ?>" readonly size="5">
                                </td>
                                <td><input type="text" name="tipo_evaluacion1" id ="tipo_evaluacion1" value="<?php print $eva->tipo_evaluacion1; ?>" onkeyup="javascript:this.value=this.value.toUpperCase();" <?php echo $readonly_plan1;?> size="80" placeholder="Ejemplo. Prueba Oral,Trabajo Escrito,etc." required></td>
                                <td><input type="date" name="fecha_evaluacion1" id ="fecha_evaluacion1" value="<?php print $eva->fecha_evaluacion1; ?>" required></td>                  
                                </tr>       
                                <tr>
                                <td><?php echo $i++;?></td>
                                <td><input type="text" name="nota2" id ="nota2" value="<?php print $nota2_e; ?>" readonly size="5"></td>
                                <td><input type="text" name="tipo_evaluacion2" id ="tipo_evaluacion2" value="<?php print $eva->tipo_evaluacion2; ?>" onkeyup="javascript:this.value=this.value.toUpperCase();" <?php echo $readonly_plan2;?> size="80" placeholder="Ejemplo. Prueba Oral,Trabajo Escrito,etc." required></td>
                                <td><input type="date" name="fecha_evaluacion2" id ="fecha_evaluacion2" value="<?php print $eva->fecha_evaluacion2; ?>" required></td>                 
                                </tr>
                                <tr>
                                <td><?php echo $i++;?></td>
                                <td><input type="text" name="nota3" id ="nota3" value="<?php print $nota3_e; ?>" readonly size="5"></td>
                                <td><input type="text" name="tipo_evaluacion3" id ="tipo_evaluacion3" value="<?php print $eva->tipo_evaluacion3; ?>" onkeyup="javascript:this.value=this.value.toUpperCase();" <?php echo $readonly_plan3;?> size="80" placeholder="Ejemplo. Prueba Oral,Trabajo Escrito,etc." required></td>
                                <td><input type="date" name="fecha_evaluacion3" id ="fecha_evaluacion3" value="<?php print $eva->fecha_evaluacion3; ?>" required></td>
                                </tr>
                                <tr>
                                <td><?php echo $i++;?></td>
                                <td><input type="text" name="nota4" id ="nota4" value="<?php print $nota4_e; ?>" readonly size="5"></td>
                                <td><input type="text" name="tipo_evaluacion4" id ="tipo_evaluacion4" value="<?php print $eva->tipo_evaluacion4; ?>" onkeyup="javascript:this.value=this.value.toUpperCase();" <?php echo $readonly_plan4;?> size="80" placeholder="Ejemplo. Prueba Oral,Trabajo Escrito,etc." required></td>
                                <td><input type="date" name="fecha_evaluacion4" id ="fecha_evaluacion4" value="<?php print $eva->fecha_evaluacion4; ?>" required></td>
                            </tr>
                              
                                <tr>
                                       <td><?php echo $i++;?></td>
                                <td><input type="text" name="nota5" id ="nota5" value="<?php print $nota5_e; ?>" readonly size="5"></td>
                                <td><input type="text" name="tipo_evaluacion5" id ="tipo_evaluacion5" value="<?php print $eva->tipo_evaluacion5; ?>" onkeyup="javascript:this.value=this.value.toUpperCase();" <?php echo $readonly_plan5;?> size="80" placeholder="Ejemplo. Prueba Oral,Trabajo Escrito,etc." required></td>
                                <td><input type="date" name="fecha_evaluacion5" id ="fecha_evaluacion5" value="<?php print $eva->fecha_evaluacion5; ?>" required></td>
                                </tr>                                                    
                            </tbody>   
                            <?php }

                            }else{?>
                                <tbody>
                                <tr>
                                <td><?php echo $i++;?></td>

                                <td>     
                                <input type="text" name="nota1" id ="nota1" value="<?php print $nota1_e; ?>" readonly size="5">
                                </td>
                                <td><input type="text" name="tipo_evaluacion1" id ="tipo_evaluacion1" value="<?php print $plan1; ?>" onkeyup="javascript:this.value=this.value.toUpperCase();" <?php echo $readonly_plan1;?> size="80" placeholder="Ejemplo. Prueba Oral,Trabajo Escrito,etc." required></td>
                                <td><input type="date" name="fecha_evaluacion1" id ="fecha_evaluacion1" value="<?php print $eva->fecha_evaluacion1; ?>" required></td>                  
                                </tr>       
                                <tr>
                                <td><?php echo $i++;?></td>
                                <td><input type="text" name="nota2" id ="nota2" value="<?php print $nota2_e; ?>" readonly size="5"></td>
                                <td><input type="text" name="tipo_evaluacion2" id ="tipo_evaluacion2" value="<?php print  $plan2; ?>" onkeyup="javascript:this.value=this.value.toUpperCase();" <?php echo $readonly_plan2;?> size="80" placeholder="Ejemplo. Prueba Oral,Trabajo Escrito,etc." required></td>
                                <td><input type="date" name="fecha_evaluacion2" id ="fecha_evaluacion2" value="<?php print $eva->fecha_evaluacion2; ?>" required></td>                 
                                </tr>
                                <tr>
                                <td><?php echo $i++;?></td>
                                <td><input type="text" name="nota3" id ="nota3" value="<?php print $nota3_e; ?>" readonly size="5"></td>
                                <td><input type="text" name="tipo_evaluacion3" id ="tipo_evaluacion3" value="<?php print  $plan3; ?>" onkeyup="javascript:this.value=this.value.toUpperCase();" <?php echo $readonly_plan3;?> size="80" placeholder="Ejemplo. Prueba Oral,Trabajo Escrito,etc." required></td>
                                <td><input type="date" name="fecha_evaluacion3" id ="fecha_evaluacion3" value="<?php print $eva->fecha_evaluacion3; ?>" required></td>
                                </tr>
                                <tr>
                                <td><?php echo $i++;?></td>
                                <td><input type="text" name="nota4" id ="nota4" value="<?php print $nota4_e; ?>" readonly size="5"></td>
                                <td><input type="text" name="tipo_evaluacion4" id ="tipo_evaluacion4" value="<?php print  $plan4; ?>" onkeyup="javascript:this.value=this.value.toUpperCase();" <?php echo $readonly_plan4;?> size="80" placeholder="Ejemplo. Prueba Oral,Trabajo Escrito,etc." required></td>
                                <td><input type="date" name="fecha_evaluacion4" id ="fecha_evaluacion4" value="<?php print $eva->fecha_evaluacion4; ?>" required></td>
                                </tr>
                               
                                <tr>
                                     <td><?php echo $i++;?></td>
                                <td><input type="text" name="nota5" id ="nota5" value="<?php print $nota5_e; ?>" readonly size="5"></td>
                                <td><input type="text" name="tipo_evaluacion5" id ="tipo_evaluacion5" value="<?php print  $plan5; ?>" onkeyup="javascript:this.value=this.value.toUpperCase();" <?php echo $readonly_plan5;?> size="80" placeholder="Ejemplo. Prueba Oral,Trabajo Escrito,etc." required></td>
                                <td><input type="date" name="fecha_evaluacion5" id ="fecha_evaluacion5" value="<?php print $eva->fecha_evaluacion5; ?>" required></td>
                                </tr>
                                                        
                                
                                </tbody>   
                                <?php }
                                 ?>
                             
                        </table>
                            <div align="center">
                                <button type="submit" name="cargar" id="cargar" class="btn btn-success"title="-Hacer clic para Registrar Nota-"> Registrar Evaluación</button>
                                &nbsp
                                <input type="button" name="btnSeguiente" value="Regresar" class="boton btn btn-info"  title="Regresar" onClick="anterior()">
                            </div>                        
                    </form>                           
                </div><!-- /.panel-body-->
            </div><!-- /.panel panel-default-->
        </div><!-- /.card -->
    </section>
    <!-- /.content -->
</div>