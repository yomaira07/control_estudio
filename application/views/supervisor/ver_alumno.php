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
    location.href="/control_estudio/dashboard05/revision_ac_datos";
  }
  
  </script>
       <!-- Comienzo formulario -->
            <form id="formulario_clausula" method="post" enctype="multipart/form-data" action="<?php echo base_url()?>dashboard05/cargaclausula/<?php echo $this->uri->segment(3);?>">
<tr  >
  <div class="card-body">
    <!-- Mensaje de Alerta-->
     <?php if($this->session->flashdata('success')){ $procesado=1; ?>

        <div class="alert alert-success">
            <a href="#" class="close" data-dismiss="alert">&times;</a>
            <strong>Éxito!</strong> </i> <?php echo $this->session->flashdata('success'); ?>
        </div>

    <?php } else if($this->session->flashdata('error')){ $procesado=2; ?>

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
    <?php }?>

      <!--Informacion del alumno completo -->
      <table align="center" width="50%">
      <div align="center"><h1>INFORMACI&Oacute;N DEL ESTUDIANTE</h1></div>
	      <div align="center">
         	<table align="center">
                <?php if(!empty($datos_alumno)):?>
                    <?php //var_dump ($datos_alumno);//foreach($datos_alumno as $datos_alumno):?> 
 				    <tr>
                        <td> <b>Cedula: </b></td><td><?php echo $datos_alumno->nacionalidad.'-'.$datos_alumno->cedula; ?></td>
                    </tr>
                    <tr>
                        <td> <b>Nombre y Apellido: </b></td>
                        <td> <?php echo $datos_alumno->nombre_primer; ?> <?php echo $datos_alumno->nombre_segundo; ?> <?php echo $atos_alumno->apellido_primer; ?> <?php echo $datos_alumno->apellido_segundo; ?></td>
                    </tr>
                    <tr>
                        <td> <b>Telefonos(s): </b></td>
                        <td><?php echo $datos_alumno->telefono_cel; echo " -- ".$datos_alumno->telefono_hab; ?></td>
                    </tr>
                    <tr>
                        <td> <b>Correo Electronico: </b></td>
                        <td><?php echo $datos_alumno->correo; ?></td>
                    </tr>
                    <?php //endforeach;?>
                     
                    <tr><td> <b>Estado Residencia: </b></td><td><?php echo strtoupper($datos_alumno->residencia); ?></td></tr>
                    <?php endif;?>  
                    <tr><td> <b>Lugar de Trabajo: </b></td><td> <?php echo ($trabajo->lugar_trabajo); ?> </td></tr>
                    <?php if(!empty($listado)):?>
                    <tr ><td colspan="2"><hr></td></tr>
                    <tr ><td colspan="2">Pago(s) Realizado(s)</td></tr>
                    <tr ><td colspan="2"><hr></td></tr>
         <?php foreach($listado as $listado):?>
         

              <tr><td> <b>Monto Depositado: </b></td><td><?php echo number_format($listado->monto_depositado, 2, ",", "."); ?></td></tr>
              <tr><td> <b>Referencia Bancaria: </b></td><td><?php echo $listado->nro_referencia; ?></td></tr>
          <?php endforeach;?>
           <?php endif;?>   
                <tr>
                    <td>
                     <b>Postgrado: </b></td>
                     <?php if(!empty($postgrado)):?>
                     <td><?php foreach ($postgrado as $postgrado):?>
                     <?php echo $postgrado->nombre."<br>";  ?><?php endforeach;?></td>
                </tr>
                  <?php endif;?>   
                       </table>
           
	        </div>
	   </table>
      <!-- -->

      <!-- /.card -->
        <div align="center"><h1>DOCUMENTOS ADJUNTOS POR EL ESTUDIANTE</h1></div>

        <div align="center"><h2></h2></div>
        <br>
        <br>

        <div align="center">

        	<table  class="table  table-hover">
                  <thead>
                  <tr>
                    <th>Cédula de Identidad</th>
                    <th>Titulo Fondo Negro</th>
                    <th>Carta Compromisoria</th>
                    <th>Clausula Compromisoria</th>
                    <th>Foto</th>
                    <th>Carnet</th>
                   
                    
                  </tr>
                  </thead>
                  <tbody>
                 
                  <tr>
                    <?php $rutaarchivo_cedula = base_url().'assets/cedulas/' . $listado->id_usuario. '_cedula.jpg';
                    echo("<td> <img id='imgFoto' border='2' class='fotomarket' width='150px' height='165px' src='" . $rutaarchivo_cedula . "?".+time()."'>");?></td>
                    <?php $rutaarchivo_titulo = base_url().'assets/titulo/' . $listado->id_usuario. '_titulo.jpg';
                    echo("<td> <img id='imgFoto' border='2' class='fotomarket' width='150px' height='165px' src='" . $rutaarchivo_titulo . "?".+time()."'>");?></td>
                     <?php $rutaarchivo_carta = base_url().'assets/carta/' . $listado->id_usuario. '_carta.jpg';
                    echo("<td border='1'> <img id='imgFoto' border='2' class='fotomarket' width='150px' height='165px' src='" . $rutaarchivo_carta . "?".+time()."'>");?></td>
                    <?php $rutaarchivo_clausula = base_url().'assets/clausula/' . $listado->id_usuario. '_clausula.jpg'; $rutaarchivo_clausula_pdf = base_url().'assets/clausula/' . $listado->id_usuario. '_clausula.pdf';
                    echo("<td> <img id='imgFoto' border='2' class='fotomarket' width='150px' height='165px' src='" . $rutaarchivo_clausula . "?".+time()."'> <a href='".$rutaarchivo_clausula_pdf."' target='_new'>VER PDF</a>   ");?>
                
    <input type="file" name="userfile" size="400" required="true" /> 
    <br/><br/>
    <input type="submit" name="upload"  value="Cargar Clausula Compromisoria" class="boton"/>
  
                  </td>
                    <?php $rutaarchivo_foto = base_url().'assets/fotos/' . $listado->id_usuario. '_foto.jpg';
                    echo("<td> <img id='imgFoto' border='2' class='fotomarket' width='150px' height='165px' src='" . $rutaarchivo_foto . "?".+time()."'>");?></td>
                     <?php $rutaarchivo_carnet = base_url().'assets/carnet/' . $listado->id_usuario. '_carnet.jpg';
                    echo("<td> <img id='imgFoto' border='2' class='fotomarket' width='150px' height='165px' src='" . $rutaarchivo_carnet . "?".+time()."'>");?></td>
                  </tr>
                    
                  </tbody>
                </table>
        	
        </div>           	
       
           
            <input type="button" name="btnSeguiente" value="Regresar" class="boton btn btn-info" onClick="anterior();">         
         
          
            </form>  <!-- /.fin de formulario -->           
                      </div><!-- /.card --> 
                  </div><!-- /.card-body -->
              </div><!-- /.card card-primary card-outline -->

        <!-- /.card-body -->

      <!-- /.card card-primary card-outline -->

      </section><!-- /.section-->
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

