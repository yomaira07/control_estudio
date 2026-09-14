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
    location.href="/control_estudio/dashboard05/revision_ac_datos_asp";
  }
  
  </script>
       <!-- Comienzo formulario -->
          <form action="<?php echo base_url()?>dashboard05/documentos/<?Php echo $listado->id_usuario; ?>" method="POST" >
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
    

        <div align="center"><h1>INFORMACI&Oacute;N DEL ASPIRANTE</h1></div>
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
                        <b>Postgrado: </b>
                    </td>
                        <?php if(!empty($programa)):?>
                        <td><?php 
                          foreach ($programa as $programa):?>
                        <?php echo $programa->nombre."<br>";  ?>
                        <?php endforeach;?>
                    </td>
                </tr>
                  <?php endif;?>  
    <tr><td> <b>Postulado: </b></td><td> <?php if ($postular->postulado==1) echo "SI"; if (!$postular->postulado)echo "NO"; ?> </td></tr> 
                       </table>
           
	        </div>
	   </table>

      <!-- /.card -->
        <div align="center"><h1>DOCUMENTOS ADJUNTOS POR EL ASPIRANTE</h1></div>

        <div align="center"><h2></h2></div>
        <br>
        <br>

        <div align="center">
		<?php foreach($requisitos as $requisitos):
			if($requisitos->id_requisito==1) $cedula_act="<img width='80px' height='80px' src='".base_url()."assets/img/nuevo.gif'/>";
			if($requisitos->id_requisito==2) $foto_act="<img width='80px' height='80px' src='".base_url()."assets/img/nuevo.gif'/>";
			if($requisitos->id_requisito==3) $titulo_act="<img width='80px' height='80px' src='".base_url()."assets/img/nuevo.gif'/>";
			if($requisitos->id_requisito==6) $carnet_act="<img width='80px' height='80px' src='".base_url()."assets/img/nuevo.gif'/>";
			if($requisitos->id_requisito==8) $inpre_act="<img width='80px' height='80px' src='".base_url()."assets/img/nuevo.gif'/>";
			if($requisitos->id_requisito==9) $colegio_act="<img width='80px' height='80px' src='".base_url()."assets/img/nuevo.gif'/>";
			if($requisitos->id_requisito==10) $art8_act="<img width='80px' height='80px' src='".base_url()."assets/img/nuevo.gif'/>";
			if($requisitos->id_requisito==11) $especialista_act="<img width='80px' height='80px' src='".base_url()."assets/img/nuevo.gif'/>";
			if($requisitos->id_requisito==17) $postulacion_act="<img width='80px' height='80px' src='".base_url()."assets/img/nuevo.gif'/>";
			if($requisitos->id_requisito==19) $magister_act="<img width='80px' height='80px' src='".base_url()."assets/img/nuevo.gif'/>";
		endforeach;?>
        	<table  class="table  table-hover">
                  <thead>
                  <tr>
                    <th>Cédula de Identidad <?php echo $cedula_act;?></th>
			<th>Foto <?php echo $foto_act;?></th>
                    <th>Titulo Fondo Negro</br>Pre-grado<?php echo $titulo_act;?></th>
                    <th>Título  Magíster<?php echo $magister_act;?></th>
                    <th>Titulo Especialista<?php echo $especialista_act;?></th>            
                    
                  </tr>
                  </thead>
                  <tbody>
                 
                  <tr>
                    <?php $rutaarchivo_cedula = base_url().'assets/cedulas/' . $listado->id_usuario. '_cedula.jpg';
                    echo("<td> <img id='imgFoto' border='2' class='fotomarket' width='150px' height='165px' src='" . $rutaarchivo_cedula . "?".+time()."'>");?></td>

                    <?php $rutaarchivo_foto = base_url().'assets/fotos/' . $listado->id_usuario. '_foto.jpg';
                    echo("<td> <img id='imgFoto' border='2' class='fotomarket' width='150px' height='165px' src='" . $rutaarchivo_foto . "?".+time()."'>");?></td>
		

                    <?php $rutaarchivo_titulo = base_url().'assets/titulo/' . $listado->id_usuario. '_titulo.jpg';
                    echo("<td> <img id='imgFoto' border='2' class='fotomarket' width='150px' height='165px' src='" . $rutaarchivo_titulo . "?".+time()."'>");?></td>

		      <?php $rutaarchivo_magister = base_url().'assets/magister/' . $listado->id_usuario. '_magister.jpg';
                    echo("<td> <img id='imgFoto' border='2' class='fotomarket' width='150px' height='165px' src='" . $rutaarchivo_magister. "?".+time()."'>");?></td>

					
                     <?php $rutaarchivo_especialista = base_url().'assets/especialista/' . $listado->id_usuario. '_especialista.jpg';
                    echo("<td> <img id='imgFoto' border='2' class='fotomarket' width='150px' height='165px' src='" . $rutaarchivo_especialista . "?".+time()."'>");?></td>
					</tr>
					
                    
                  </tbody>
                </table>
        	<table  class="table  table-hover">
                  <thead>
                  <tr>                  
                    <th>IMPRES-INPRE <?php echo $inpre_act;?></th>
                    <th>Colegiatura<?php echo $colegio_act;?></th>
					<th>Cumplimiento Rural <?php echo $art8_act;?></th>
                    <th>Carnet Trabajo<?php echo $carnet_act;?></th>                
                    
                  </tr>
                  </thead>
                  <tbody>
				  <tr>
					
                    <?php $rutaarchivo_impres = base_url().'assets/impres/' . $listado->id_usuario. '_impres.jpg';
                    echo("<td> <img id='imgFoto' border='2' class='fotomarket' width='150px' height='165px' src='" . $rutaarchivo_impres . "?".+time()."'>");?></td>
	
	                 <?php $rutaarchivo_colegiatura = base_url().'assets/colegiatura/' . $listado->id_usuario. '_colegiatura.jpg';
                    echo("<td> <img id='imgFoto' border='2' class='fotomarket' width='150px' height='165px' src='" . $rutaarchivo_colegiatura . "?".+time()."'>");?></td>
					 <?php $rutaarchivo_rural = base_url().'assets/rural/' . $listado->id_usuario. '_rural.jpg';
                    echo("<td> <img id='imgFoto' border='2' class='fotomarket' width='150px' height='165px' src='" . $rutaarchivo_rural . "?".+time()."'>");?></td>
                     
					 <?php $rutaarchivo_carnet = base_url().'assets/carnet/' . $listado->id_usuario. '_carnet.jpg';
                    echo("<td> <img id='imgFoto' border='2' class='fotomarket' width='150px' height='165px' src='" . $rutaarchivo_carnet . "?".+time()."'>");?></td>
                  </tr>
                    
                  </tbody>
                </table>
               <div> <?php $rutaarchivo_postulacion_pdf = base_url().'assets/postulaciones/' . $listado->id_usuario. '_postulaciones.pdf'; 
	            echo("<td>'".$postulacion_act."'<a href='".$rutaarchivo_postulacion_pdf."' target='_new'><img id='imgFoto' border='2' class='fotomarket' width='150px' height='165px' src=");?>
			<?php echo base_url().'assets/img/pdf.jpeg';?>
			<?php echo ("> Ver Oficio o Carta de Postulación </a> </td>");?>   
                      </div>
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
