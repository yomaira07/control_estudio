  <!-- Content Wrapper. Contains page content -->

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
    <!-- /.container-fluid -->
    </section>
 
    <!-- Main content -->
    <section class="content">
<script language="javascript">

  function siguiente()
  { 
    location.href="datos4/";
  }
  </script>
       <div class="card">
          
                    <div class="card-header">
                      <h3 class="card-title"><strong>Transferencia</strong></h3>
                    </div>

                      <div class="card-body">
                        <!-- Mensaje de Alerta-->
                        <?php  if ($this->session->flashdata("error")): ?>
                        <div class="alert alert-danger alert-dismissible">
                          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                          <p><i class="icon fa fa-ban"></i> <?php echo $this->session->flashdata("error"); ?> </p>
                        </div>
                      <?php endif; ?>
                        <!-- Fin Mensaje de Alerta-->
            <!-- Comienzo formulario -->
<p align="center">
    <strong>Transferencia</strong>
  </p>
  <div class="frame3" align="center">
  
  <br />

  <p align="center">
    <!-- MUESTRA LA FOTO DEL USUARIO SI EXISTE, SINO SE MUESTRA LA IMAGEN POR DEFECTO -->
    <?php
    
 $rutaarchivo = base_url().'assets/transferencia/' . $nro_transferencia. '_transferencia.jpg';
    //echo $rutaarchivo ;
    if(!file_exists("$rutaarchivo")) {
      echo("<img id='imgFoto' border='2' class='fotomarket' width='680px' height='480px' src='" . $rutaarchivo . "?".+time()."'>");    
     }
     ?>
  </p>
  <br/>
<div> <?php
	 $rutaarchivopdf = base_url().'assets/transferencia/' . $nro_transferencia. '_transferencia.pdf';
	$img=base_url().'assets/img/pdf.jpeg';
	   if(!file_exists("$rutaarchivopdf")) {
	       echo("<img id='imgFoto' border='2' class='fotomarket' width='50px' height='50px' src='".$img."'>");      
		echo("<a border='2' href='" . $rutaarchivopdf . "?".+time()."' target='_NEW'>En caso de no visualizar la imagen haz clic Aqui para <b>Ver Transferencia</b></a>");
           }?>
</div>
  <div align="center">
    <input type="hidden" name="id_usuario" value="<?Php echo $this->session->userdata('id'); ?>">

 
  
  </div>
  <br/>
  </div>
        <div align="center">
                            <input type="button" name="btnSeguiente" value="Regresar" class="boton btn btn-info"  title="Regresar" onClick="history.back()">
                           
                        </div>
 
            <!-- fin formulario -->
          </div>
                </div><!-- /.card -->





    </section>
    <!-- /.content -->



  </div>
  <!-- /.content-wrapper -->
