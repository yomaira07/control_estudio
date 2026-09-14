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
    location.href="/control_estudio/dashboard05/revision_ac";
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

     

      <!-- /.card -->
        <div align="center"><h1>REQUISITOS ADJUNTOS POR EL DOCENTE</h1></div>

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
                    <th>Titulo Especialista o Postgrado</th>            
                    
                  </tr>
                  </thead>
                  <tbody>
                 <?php foreach ($data_docente as $data_docente): ?>
                   
                
                  <tr>
                    <?php $rutaarchivo_cedula = base_url().'assets/cedulas/' . $data_docente->id_usuario. '_cedulas_docente.pdf';?>
                    <td> 
                      <a href="<?php echo $rutaarchivo_cedula;?>" target="_new" >
                      <img id='imgFoto' border='2' class='fotomarket' width='150px' height='165px' src='<?php echo base_url().'assets/img/pdf.jpeg' ;?>'  />Ver Documento
                      </a>
                    <?php //if(is_readable($rutaarchivo_cedula)) { echo' <span class="badge badge-success">cargado</span>';}else{
                     // echo' <span class="badge badge-danger">pendiente</span>';
                   // } ?>
                    </td>

                    <?php  $rutaarchivo_foto = base_url().'assets/fotos/' . $data_docente->id_usuario. '_fotos_docente.jpg';
                    echo("<td> <img id='imgFoto' border='2' class='fotomarket' width='150px' height='165px' src='" . $rutaarchivo_foto . "?".+time()."'>");?>
                  </td>

                    <?php $rutaarchivo_titulo = base_url().'assets/titulo/' . $data_docente->id_usuario. '_titulo_docente.pdf';?>
                   <td> 
                      <a href="<?php echo $rutaarchivo_titulo;?>" target="_new" >
                      <img id='imgFoto' border='2' class='fotomarket' width='150px' height='165px' src='<?php echo base_url().'assets/img/pdf.jpeg' ;?>'    />Ver Documento
                      </a>
                      
                    </td>
					
                     <?php $rutaarchivo_especialista = base_url().'assets/especialista/' . $data_docente->id_usuario. '_especialista_docente.pdf';?>
                    <td> 
                      <a href="<?php echo $rutaarchivo_especialista;?>" target="_new" >
                      <img id='imgFoto' border='2' class='fotomarket' width='150px' height='165px' src='<?php echo base_url().'assets/img/pdf.jpeg' ;?>' />Ver Documento
                      </a>
                    
                    </td>
					</tr>
					
                    
                  </tbody>
                </table>
        	<table  class="table  table-hover">
                  <thead>
                  <tr>                  
                    <th>R.I.F. SENIAT</th>
                    <th>Sintesis Curricular</th>
					<th>Carnet o Carta de Trabajo</th>
                                
                    
                  </tr>
                  </thead>
                  <tbody>
				  <tr>
					
                    <?php $rutaarchivo_seniat = base_url().'assets/seniat/' . $data_docente->id_usuario. '_rif_docente.pdf';?>
                    <td>
                     <a href="<?php echo $rutaarchivo_seniat;?>" target="_new" >
                      <img id='imgFoto' border='2' class='fotomarket' width='150px' height='165px' src='<?php echo base_url().'assets/img/pdf.jpeg' ;?>' />Ver Documento
                      </a>
                     
                  </td>
	                 <td>
	                 <?php $rutaarchivo_curriculum = base_url().'assets/curriculim/' . $data_docente->id_usuario. '_curriculum_docente.pdf';?>
                    <a href="<?php echo $rutaarchivo_curriculum;?>" target="_new" >
                      <img id='imgFoto' border='2' class='fotomarket' width='150px' height='165px' src='<?php echo base_url().'assets/img/pdf.jpeg' ;?>' />Ver Documento
                      </a>
                     
                  </td>
                     
					 <?php $rutaarchivo_carnet = base_url().'assets/carnet/' . $listado->id_usuario. '_carnet_docente.pdf';?>
           <td>
                  <a href="<?php echo $rutaarchivo_carnet;?>" target="_new" >
                      <img id='imgFoto' border='2' class='fotomarket' width='150px' height='165px' src='<?php echo base_url().'assets/img/pdf.jpeg' ;?>' />Ver Documento
                      </a>
                      
                  </td>
                  </tr>
                     <?php endforeach ?>?>
                  </tbody>
                </table>
                 
        </div>          	
               
            <input type="button" name="btnSeguiente" value="Regresar" class="boton btn btn-info" onClick="history.back()">
          
          
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