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
                      <h3 class="card-title"><strong>Carnet o Carta de Servicio</strong></h3>
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
    <strong>Carnet o Carta de Servicio</strong>
  </p>
  <div class="frame3" align="center">
  
  <br />

  <p align="center">
    <!-- MUESTRA LA FOTO DEL USUARIO SI EXISTE, SINO SE MUESTRA LA IMAGEN POR DEFECTO -->
    <?php
    
    $rutaarchivo = base_url().'assets/carnet/' . $usuario. '_carnet.jpg';
    //echo $rutaarchivo ;
    if(!file_exists("$rutaarchivo")) {
      echo("<img id='imgFoto' border='2' class='fotomarket' width='1200px' height='500px' src='" . $rutaarchivo . "?".+time()."'>");
     }  
     ?>
  </p>
  <br/>
  <div align="center">
    <input type="hidden" name="id_usuario" value="<?Php echo $this->session->userdata('id'); ?>">

 
  
  </div>
  <br/>
  </div>
 
            <!-- fin formulario -->
          </div>
                </div><!-- /.card -->





    </section>
    <!-- /.content -->



  </div>
  <!-- /.content-wrapper -->