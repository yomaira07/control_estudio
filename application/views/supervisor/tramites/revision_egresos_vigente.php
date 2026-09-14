
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
                                                    <tr> <td><h4><b>Modalidad de Egreso:   </b><?php if($listado->id_tipo_reconocimiento==5){ echo "ASISTENCIA AL ACTO SOLEMNE DE GRADO";}if($listado->id_tipo_reconocimiento==6){ echo "POR SECRETARIA"; }?></h4></td> </tr>


                                                <?php endforeach;?>  
                                            <?php endif;?>  
                                    </table>    
                            </table>  
                            <hr> 
                            <form action="<?php echo base_url()?>dashboard09/validar_egreso_store/<?php echo $listado->id_solicitud.'/'.$listado->id_usuario.'/'.$listado->id_programa;?>" method="POST" >
             <div align="center">    <p>         
 <?php $rutaarchivo_solicitud = base_url().'assets/tramites/egresos/' . $listado->id_usuario.'_solicitud_egreso.pdf';
                      $img=base_url().'assets/img/pdf.jpeg';
                      echo("<td><a href='".$rutaarchivo_solicitud."' target='_new'> <img id='imgFoto' border='2' class='fotomarket' width='150px' height='165px'  src='" . $img ."'>");?>Ver Carta de solicitud de egreso</a></td>
          </p>
            <input type="submit" name="btnguardar" id="btnguardar" class="btn btn-success" value="APROBADO" /> 
                <a href="<?php  echo base_url()?>dashboard09/validar_egreso_store2/<?php echo $listado->id_solicitud.'/'.$listado->id_usuario.'/'.$listado->id_programa;?>"" class="btn btn-danger">RECHAZADO</a>      
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
