
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
  location.href="/control_estudio/dashboard09/retiro_voluntario";
}

</script>
      <!-- /.card -->
              <div class="card card-primary card-outline">
                  <div class="card-body">
                     <!-- Mensaje de Alerta-->
 <?php if($this->session->flashdata('success')){ ?>

<div class="alert alert-success">
    <a href="#" class="close" data-dismiss="alert">&times;</a>
    <strong>Éxito!</strong> </i> <?php echo $this->session->flashdata('success'); ?>
</div>

<?php } else if($this->session->flashdata('error')){   $procesado=2;  ?>

<div class="alert alert-danger">
    <a href="#" class="close" data-dismiss="alert">&times;</a>
    <i class="icon fa fa-ban"></i> <?php echo $this->session->flashdata('error'); ?>
</div>

<?php } else if($this->session->flashdata('warning')){  ?>

<div class="alert alert-warning">
    <a href="#" class="close" data-dismiss="alert">&times;</a>
    <strong>Alerta!</strong> <?php echo $this->session->flashdata('warning'); ?>
</div>

<?php } else if($this->session->flashdata('info')){  ?>

<div class="alert alert-info">
    <a href="#" class="close" data-dismiss="alert">&times;</a>
    <strong>Informacion!</strong> <?php echo $this->session->flashdata('info'); ?>
</div>
<?php } ?>
                      <div class="card">
                            <!--Informacion del alumno completo -->
                            <table align="center" width="50%">
                                <div align="center"><h1>INFORMACI&Oacute;N DEL ALUMNO</h1></div>
                                <div align="center">
                                    <table align="center">
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
                                            <?php endif;?>  
                                            <tr><td> <b>Lugar de Trabajo: </b> <?php echo ($trabajo->lugar_trabajo); ?> </td></tr>
                                            <tr><td><hr></td></tr>
                                            <?php if(!empty($datos_alumno)):?>
                                                <?php foreach($listado as $listado):?>       
                                                    <tr><td>TRÁMITES Y SOLICITUDES REGISTRADAS - Período Académico: <b><?php echo $periodo->nombre;?></b></td></tr>
                                                    <tr><td><hr></td></tr>
                                                    <tr> <td><b>Fecha de Solicitud del Trámite:   </b><?php echo  date("d/m/Y", strtotime($listado->fecha_solicitud)); ?></td>
                                                    <tr> <td><b>Programa y/o Especialización:   </b><?php echo $listado->programa;?></td></tr>
                                                    <tr> <td><h4><b>Tipo de Trámite:   </b><?php echo $listado->tramite; ?></h4></td> </tr>
                                                <?php endforeach;?>  
                                            <?php endif;?>  
                                    </table>    
                            </table>  
                            <hr> 
                            <form action="<?php echo base_url()?>dashboard09/registro_rettiro_voluntario_store/<?php echo $listado->id_solicitud.'/'.$listado->id_usuario.'/'.$listado->id_programa;?>" method="POST" >
                            <div align="center"><h3>UNIDADES CURRICULARES A TRAMITAR</h3></div>      
                            <hr> 
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>                           
                                    <th>Programa de Postgrado</th>
                                    <th>UC</th>
                                    <th>Unidad Curricular</th>
                                    <th>Trimestre</th>
                                    <th>Dia</th>
                                    <th>Horario</th>
                                    <th>Modalidad</th>
                                    <th>Docente</th>
                                    <th>Aprobar UC</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php if(!empty($materias_solicitadas)):?>
                                    <?php $total_unidades_credito=0;?>
                                    <?php foreach($materias_solicitadas as $materias_solicitadas):?>
                                <tr>
                                    <td><?php echo $materias_solicitadas->programa; ?></td>
                                    <td><?php echo $materias_solicitadas->uc; ?></td>
                                    <td><?php echo $materias_solicitadas->unidad_curricular; ?></td>
                                    <td><?php echo $materias_solicitadas->trimestre;?></td>
                                    <td><?php echo $materias_solicitadas->dia_clase;?></td>
                                    <td><?php echo $materias_solicitadas->horario;?></td>
                                    <td><?php if($materias_solicitadas->modalidad==1) echo "PRESENCIAL";if($materias_solicitadas->modalidad==2)echo "VIRTUAL";if($materias_solicitadas->modalidad==3)echo "SEMIPRESENCIAL";?></td>
                                    <td><?php echo $materias_solicitadas->nombre;?> <?php echo $materias_solicitadas->apellido;?></td>                   
                                    <td align="center" id="listado"><input type="checkbox" name="checks[]" value="<?php echo $materias_solicitadas->id ;?>"></td>                    
                                </tr>
                         
                                      
                                        <?php endforeach;?>
   </table>
                                <?php endif;?>    
                               
                               
              
                            <div><hr><p><b><i>Nota:</i></b> Debe seleccionar la(s) unidad(es) curricular que desea tramitar <b>Retiro Voluntario</b></p></div>
                            
            <div align="left"> 
            <input type="hidden" name="str" id="str">
            <input type="button" name="btnSeguiente" value="Regresar" class="boton btn btn-info" onClick="anterior();">
            <a href="<?php echo base_url()?>assets/tramites/retiro_voluntario/<?php echo $listado->id_usuario.'_retiro_voluntario.pdf'?>" class="btn btn-warning" >Ver Documento</a> 
            </div>
            <div align="center">
            
            <input type="submit" name="btnguardar" id="btnguardar" class="btn btn-success" value="APROBADO" /> 
                <a href="<?php  echo base_url()?>dashboard09/registro_rettiro_voluntario_store2/<?php echo $listado->id_solicitud.'/'.$listado->id_usuario.'/'.$listado->id_programa;?>"" class="btn btn-danger">RECHAZADO</a>      
            </div>
        
        </form>
                              
                      </div><!-- /.card --> 
                      
                  </div><!-- /.card-body -->
              </div><!-- /.card card-primary card-outline -->

        <!-- /.card-body -->

      <!-- /.card card-primary card-outline -->

      </section><!-- /.section-->
    <!-- /.content -->

 </div>
  <!-- /.content-wrapper -->
