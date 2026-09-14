
   <!-- Content Wrapper. Contains page content -->

   <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
    <!-- /.container-fluid -->
    </section>
 
    <!-- Main content -->
<script>
function anterior()
{ 
  location.href="/control_estudio/dashboard07/buscar_cedula";
}
</script>
    <section class="content">

    <div class="card-body">
              <div class="card">          
                          <div class="info-box">
                            <span class="info-box-icon bg-info"><i class="fas fa-bookmark"></i></span>
                              <div class="info-box-content">             
                                <span class="info-box-text"><b>CONTROL DE ESTUDIOS</b> </span> </a>      
                              </div>
                                <!-- /.info-box-content  -->
                          </div>
                          <div class="card-title">
                            Notas Académicas del Estudiante
                          </div>
                          <p> Fecha de Consulta: <?php echo date('d-m-Y H:m:s');?></p>
 <div><input type="button" name="btnSeguiente" value="Regresar" class="boton btn btn-info" onClick="anterior();"></div>
            </div>    


    <section id="datos-estudiante">
          <!--Informacion del alumno completo -->
          <table align="center" width="50%">
          <h2>Datos del Estudiante</h2>                     
            <table  align="center">
                    <?php if(!empty($datos_alumno)):?>
                    <?php //var_dump ($datos_alumno);//foreach($datos_alumno as $datos_alumno):?> 
                    <tr>
                    <td> <b>Cédula de identidad del estudiante: </b><?php echo $datos_alumno->nacionalidad.'-'.$datos_alumno->cedula; ?></td>
                    </tr>
                    <tr>
                    <td> <b>Nombre y Apellido: </b><?php echo $datos_alumno->nombre_primer; ?> <?php echo $datos_alumno->nombre_segundo; ?> <?php echo $atos_alumno->apellido_primer; ?> <?php echo $datos_alumno->apellido_segundo; ?></td>
                    </tr>
                    <tr>
                    <td> <b>Telefonos(s): </b><?php echo $datos_alumno->telefono_cel; echo " -- ".$datos_alumno->telefono_hab; ?></td>
                    </tr>
                    <tr>
                    <td> <b>Correo Electronico: </b><?php echo $datos_alumno->correo; ?></td>
                    </tr>
                    <tr><td> <b>Estado Residencia: </b><?php echo strtoupper($datos_alumno->residencia); ?></td></tr>
                 
                    <tr><td> <b>Cargo:</b> <?php echo ($datos_alumno->cargo); ?></td></tr>
                    <tr><td><b> Lugar de Trabajo: </b><?php echo ($datos_alumno->lugar_trabajo); ?> </td></tr>
                    <?php endif;?>  
                          
                   
            </table>    

    </section>

    <section id="calificaciones">
        <h2>Calificaciones Cargadas</h2>
        <table width="80%" align="center"   cellPadding="5" cellSpacing="5" >   
            <thead>
                <tr bgcolor="#D0E0F4" color="#1060C8" align="center">
                    <th>Programa de Postgrado o Maestría</th>
                    <th colspan="2">Unidad Curricular</th>
                    <th>Unidades Crédito</th>
                    <th>Calificación</th>                    
                    <th>Trimestre</th>                    
                    <th>Período Académico</th>
                    <th>Observaciones</th>
                   
                </tr>
            </thead>
            <tbody>
            <?php $reprobada=0;?>
                <?php foreach($listado as $listado):?>
                <tr>
                    <td><?php echo $listado->programa; ?></td>
                    <td><?php echo '<b>'.$listado->nomenclatura.'</b> ';?></td><td><?php echo $listado->materia; ?></td>
                    <td align="center"><?php echo str_pad($listado->unidad_curricular, 2, "0", STR_PAD_LEFT); ?></td> 
                  				  <?php if( is_null($listado->nota_final)){ 
								echo "<td align='center'><b >Sin Cargar</b></td>"; 
							}else{
                                if($listado->trimestre!='LÍNEA DE INVESTIGACIÓN'){
                                    if($listado->nota_final<15 and !is_null($listado->nota_final  and $listado->trimestre!='LÍNEA DE INVESTIGACIÓN')){
                                        $reprobada++;
                                        echo  "<td align='center' style='color: red;'><b>".$listado->nota_final."</b></td>";  
                                        }else{
                                            echo  "<td align='center'>".$listado->nota_final."</td>";
                                        }
                                    }else{
                                    if(round($listado->nota_final)<20 and !is_null($listado->nota_final) and $listado->trimestre=='LÍNEA DE INVESTIGACIÓN' ){
									    echo  "<td align='center' style='color: red;'>REPROBADA</td>";
                                    }else{
                                        echo  "<td align='center' style='color: blue;'>APROBADA</td>";
                                    }
                                }
								
							}?>	



                    <td><?php echo $listado->trimestre; ?></td>
                    <td><?php echo $listado->periodo; ?></td>
                    <td><?php if ( $listado->retiro==1 )echo "Retiro Voluntario"; else echo $listado->observaciones;?></td>    
                </tr>
                    <?php endforeach?>
                <!-- Más filas para otras asignaturas -->
            </tbody>
            <thead>
                <tr bgcolor="#D0E0F4" color="#1060C8" align="center">
                    <th>Total Unidades Curriculares Reprobadas </th>
                    <th><?php echo $reprobada;?></th>
                    <th colspan="6"></th>
                    
                   
                </tr>
            </thead>
        </table>
    </section>

    <section id="firma-autoridades">
        
   <!--  
 <table width="70%" align="center"  border="1"  cellPadding="5" cellSpacing="5" >   
    <tr  bgcolor="#D0E0F4" color="#1060C8" >
        <th colspan="6"><div align="center">FIRMA DIRECCIÓN INVESTIGACIÓN Y POSTGRADO</div></th>           
        <th  colspan="6"><div align="center">RECIBIDO Y CONFORME DIRECCIÓN DE SECRETARÍA GENERAL</div></th>                
    </tr>
    <tr>  
       <td  colspan="6" > <div align="center" ><br>Fecha:___/___/_____ <br><br>Nombre(s) y Apellido(s) del Funcionario(a):<br><br><br>__________________________________________<br><br><br><br><br><br>SELLO</div></td> 
        <td colspan="6" > <div align="center" ><br>Fecha:___/___/_____ <br><br>Nombre(s) y Apellido(s) del Funcionario(a):<br><br><br>__________________________________________<br><br><br><br><br><br>SELLO</div></td> 
    </tr>       
               
              </table>-->
    </section>

    <footer>
        <p>Lugar y Fecha de Expedición: Caracas, <?php echo date('d-m-Y');?></p>
     
    </footer>
    </div><!-- /.card -->





</section>
<!-- /.content -->



</div>
<!-- /.content-wrapper -->       
