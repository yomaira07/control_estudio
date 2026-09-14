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
    location.href="/control_estudio/dashboard05/revision_ac_asp";
  }
  
  </script>
      

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
      <div align="center"><h1>INFORMACI&Oacute;N DEL ALUMNO</h1></div>
	      <div align="center">

	         <?php if(!empty($listado)):?>
                      <?php foreach($listado as $listado):?>
                      	<table align="center">
                            <tr><td> <b>Cedula: </b></td><td><?php echo $listado->cedula; ?></td></tr>
                            <tr><td> <b>Nombre y Apellido: </b></td><td> <?php echo $listado->pri_nombre; ?> <?php echo $listado->seg_nombre; ?> <?php echo $listado->pri_apellido; ?> <?php echo $listado->seg_apellido; ?></td></tr>
                            <tr><td> <b>Telefono Celular: </b></td><td><?php echo "(".$listado->cod_cel.")".$listado->telefono_cel; echo " -- (".$listado->cod_hab.")".$listado->telefono_hab; ?></td></tr>
                            <tr><td> <b>Correo Electronico: </b></td><td><?php echo $listado->correo; ?></td></tr>
                            <tr><td> <b>Estado: </b></td><td><?php echo strtoupper($listado->nob_estado); ?></td></tr>
                            <tr><td> <b>Postgrado(s) Inscrito(s): </b></td><td><?php foreach($programa as $programa):echo $programa->nombre_convocatoria.'<br>'; endforeach?></td></tr>
                            
                            <tr><td> <b>Monto a pagar en Ref. : </b></td><td> <?php echo number_format($listado->monto_apagar, 2, ",", "."); ?></td></tr>
                            <tr><td> <b>Monto Depositado: </b></td><td><?php echo number_format($listado->monto_depositado, 2, ",", "."); ?></td></tr>

                            <tr><td> <b>Referencia Bancaria: </b></td><td><?php echo $listado->nro_referencia; ?></td></tr>
                            <tr><td> <b>Lugar de Trabajo: </b></td><td> <?php echo ($trabajo->lugar_trabajo); ?> </td></tr>
                            <tr><td> <b>Postulado: </b></td><td> <?php if ($postular->postulado==1) echo "SI"; if (!$postular->postulado)echo "NO"; ?> </td></tr>
                           
                                              
	                       </table>
	        	 <?php endforeach;?>
                  <?php endif;?>  
	        </div>
	   </table>
      <!-- -->

      <!-- /.card -->
        <div align="center"><h1>DOCUMENTOS ADJUNTOS POR EL ALUMNO</h1></div>

        <div align="center"><h2></h2></div>
        <br>
        <br>

        <div align="center">

        	<table  class="table  table-hover">
                  <thead>
                  <tr>
                    <th>Cédula de Identidad</th>
					<th>Foto</th>
                    <th>Titulo Fondo Negro</br>Pre-grado</th>
                    <th>Título  Magíster</th>
                    <th>Titulo Especialista</th>            
                    
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
                    <th>IMPRES-INPRE</th>
                    <th>Colegiatura</th>
					<th>Cumplimiento Rural</th>
                    <th>Carnet Trabajo</th>                
                    
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
	            echo("<td><a href='".$rutaarchivo_postulacion_pdf."' target='_new'><img id='imgFoto' border='2' class='fotomarket' width='150px' height='165px' src=");?>
			<?php echo base_url().'assets/img/pdf.jpeg';?>
			<?php echo ("> Ver Oficio o Carta de Postulación </a></td>");?>   
                      </div>
        </div>
            	
               
            <input type="button" name="btnSeguiente" value="Regresar" class="boton btn btn-info" onClick="anterior();">
          
            <a href="<?php echo base_url()?>dashboard05/registro_materia_store_asp/<?php echo $listado->id_usuario?>" class="btn btn-success" >APROBADO</a> 
      
            <a href="<?php  echo base_url()?>dashboard05/registro_materia_store2_asp/<?php echo $listado->id_usuario;?>"" class="btn btn-danger">RECHAZADO</a>
          <!--   <div class="form-group">
                    <label for="observaciones">(*) Observaciones</label>
                      <input type="text" name="observaciones" id="observaciones"  placeholder="Debe indicar el motivo por el cual fue RECHAZADO" onkeyup="javascript:this.value=this.value.toUpperCase();">
                  
            </div>       -->
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

