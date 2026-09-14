
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
  location.href="/control_estudio/dashboard09/buscar_cedula_tramite";
}
</script>
    <section class="content">
      <!-- /.card -->
      <div class="card card-primary card-outline">
          <div class="card-body">
              <div class="card">          
                          <div class="info-box">
                            <span class="info-box-icon bg-success"><i class="fas fa-copy"></i></span>
                              <div class="info-box-content">             
                                <span class="info-box-text"><b>TRÁMITES Y/O SOLICITUDES</b> </span> </a>      
                              </div>
                                <!-- /.info-box-content  -->
                          </div>
                          <div class="card-title">
                          Trámites y/o Solicitudes Realizadas por el Estudiante
                          </div>
                          <p> Fecha de Consulta: <?php echo date('d-m-Y H:m:s');?></p>
     <div><input type="button" name="btnSeguiente" value="Regresar" class="boton btn btn-info" onClick="anterior();"></div>
            </div>              
            <div class="card-body">
     

 
    <section id="datos-estudiante">
          <!--Informacion del alumno completo -->
          <table  width="50%">
          <h2>Datos del Estudiante</h2>                     
            <table >
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
        <h2>Solicitudes de Trámites y/o Solicitudes Realizadas</h2>
        <table width="80%" align="center"   cellPadding="5" cellSpacing="5" >   
            <thead>
                <tr bgcolor="#d6eadfd6eadf" color="#1060C8" align="center">
                    <th>Programa de Postgrado o Maestría</th>
                    <th >Trámite Solicitado</th>
                    <th>Fecha de Solicitud</th>
                    <th colspan="2">Estatus</th>                    
                    
                   
                </tr>
                <tr bgcolor="#d6eadf" color="#1060C8" align="center">
                    <th colspan="3"></th>                    
                    <th>Administración</th>
                    <th >Secretaria General</th>  
                </tr>
            </thead>
            <tbody>
            <?php $total=0;?>
                <?php foreach($listado as $listado):?>
                <tr>
                    <td><?php echo $listado->programa; ?></td>
                    <td><?php echo '<b>'.$listado->tramites.'</b> ';?>
                  
                    <td align="center"><?php echo  date('d-m-Y',strtotime($listado->fecha_solicitud) );?></td>     
                  
		<?php if($listado->id_tramite==3){    
                     if ($listado->reg_pago==1 or $listado->reg_pago==0 or is_null($listado->reg_pago) )?>
			<td>
			 <?php echo "No aplica";?>
			</td>
                    <td>
                      <?php
                        if ($listado->rev_academica==2)echo "Revisión Rechazada" ;
                        if ($listado->rev_academica==0)echo "Revisión Pendiente";      
			 if ($listado->rev_academica==1)echo "Revisión Aprobada";                 
                    ?>
                    </td>  
		<?php
		}else{?>
			<td><?php if ($listado->reg_pago==1 and $listado->conciliado ==1  )echo "Pago Registrado: <b>".date('d-m-Y',strtotime($listado->dregistro))."</b> y Conciliado Período académico:".$listado->periodo_conciliacion; 
			if ($listado->reg_pago==2)echo "Conciliación Rechazada" ;
                        if ($listado->reg_pago==0)echo "<b>Pago no Registrado</b>";
                        if ($listado->reg_pago==1 and $listado->conciliado ==0  )echo "Pago Registrado y <b>NO Conciliado</b>";
                        if (is_null($listado->reg_pago)) echo "No aplica";?>
                    </td>
                    <td>
                        <?php if ($listado->conciliado==1 and $listado->academico ==1  )echo "Revisada y/o Aprobada"; 
                        if ($listado->rev_academica==2)echo "Revisión Rechazada" ;
                        if ($listado->conciliado==1 and $listado->rev_academica==0)echo "Revisión Pendiente";                     
                        if (is_null($listado->rev_academica)) echo "No aplica";?>
                    </td>  
		<?php }  
		?>
                    <?php $total++;?>
                </tr>
                    <?php endforeach?>
                <!-- Más filas para otras asignaturas -->
            </tbody>
            <thead>
                <tr bgcolor="#D0E0F4" color="#1060C8" align="center">
                    <th colspan="2">Total Solicitudes Realizadas------------------></th>
                    <th><?php echo $total;?></th>
                    <th colspan="5"></th>
                    
                   
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
    </div><!-- /.cardbody -->
    <footer>
        <p>Lugar y Fecha de Expedición: Caracas, <?php echo date('d-m-Y');?></p>
     
    </footer>


    </div><!-- /.card-->



</section>
<!-- /.content -->



</div>
<!-- /.content-wrapper -->       
