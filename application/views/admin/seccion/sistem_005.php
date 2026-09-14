  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
    <!-- /.container-fluid -->
   
    </section>

    <!-- Main content -->
     <section class="content">
      <!-- /.card -->
        <div class="card card-primary card-outline">
          <div class="card-body">
            <h6>Configuracion inicial del condominio <?php echo $this->session->userdata("nombre_condominio") //echo $condominio->nombre; ?></h6>
             <a  type="button" class="btn btn-success">Paso 1</a> <a type="button" class=" btn btn-success">Paso 2</a> <a   class="btn btn-success">Paso 3</a> <a   class="btn btn-success">Paso 4</a> <a   class="btn btn-warning">Paso 5</a>
             <br>
             <font color="teal">Paso 5:</font>  
             <br>
            Enviar email con contraseña. UNa vez que se han registrado a todos los usuarios(residentes) puedes enviar un email a cada uno de los usuario y su contraseña para este sistema. Tu no conoceras sus contraseña a menos que ellos te la compartan. Si es necesario pideles que la revisen en la carpeta SPAM.
            <br><br>
            <a href="<?php echo base_url()?>dashboard/menu3/<?php echo $this->session->userdata("id_condominio"); ?>"  type="button" class="btn btn-default">Anterior</a> <a href="<?php echo base_url()?>dashboard/conta1/<?php echo $this->session->userdata("id_condominio"); ?>" type="button" class="btn btn-success float-right">Configuración Contabilidad</a>
            <br>
            <br>
              <div class="card card-primary card-outline">
                  <div class="card-body">
                      <div class="card">
          
                          <div class="card-header">
                            <h3 class="card-title">Enviar contraseña</h3>
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
                         <form action="<?php echo base_url()?>dashboard/envio_correo/<?php echo $this->session->userdata("id_condominio"); ?>" method="POST" >

                  <div class="form-group">
                    <label for="nombre">1. Redacta el Mensaje (El mensaje cierra automáticamente con el nombre de usuario y password de cada receptor):</label>
                    <textarea class="form-control" rows="3" placeholder="El administrador de tu condominio (<?php echo $this->session->userdata("nombre_condominio") ?>) te ha registrado como usuario en https://www.sistemayamil.com donde podrás participar y tener acceso a información relacionada con la administración del condominio donde habitas." name="cuerpo"></textarea>
                    
                  </div>                    
                      <div class="form-group">
                    <label for="nombre">2. Selecciona los usuarios a los que deseas enviar un e-mail informando su password para este sistema:</label>
                    <table id="usuarios" class="table table-bordered">
          <thead class="bg-orange">
            <tr>
              <td>
                <input type="checkbox" name="all" id="checkall">
              </td>
              <td>Vivienda</td>
              <td>e-mail</td>
              <td>Nombre</td>
              <td>Apellido</td>
              <td>Nombramiento</td>
              <td>Consejo de Admin</td>
            </tr>
          </thead>
          <tbody>
          <?php if(!empty($list_propietarios)):?>
          <?php foreach($list_propietarios as $list_propietario):?>

          <tr>
            <td><input type="checkbox" name="chekbox1[]" id="checkbox1" class="cb-element" value="<?php echo "$list_propietario->correo"?>" >
             <input type="hidden" name="correo[]"  value="<?php echo $list_propietario->correo;?>"><input type="hidden" name="nro_vivienda"  value="<?php echo $list_propietario->nro_vivienda;?>"></td>
             <td><?php echo $list_propietario->nro_vivienda;?></td>
             <td><?php echo $list_propietario->correo;?></td>
             <td><?php echo $list_propietario->nombres;?></td>
             <td><?php echo $list_propietario->apellidos;?></td>
             <td><?php echo $list_propietario->cargo;?></td>
             <td><?php if ($list_propietario->pertenece_concejo==1) {
              echo "Si";
             }else{ echo "NO";} ?></td>
         </tr>
         <?php endforeach;?>
         <?php endif;?>
        </tbody>
      </table>
                  </div>       
                 

               
                <br>
                       
          
              
               
             
              <!-- /.col -->
               
                <button type="submit" class="btn btn-primary">Enviar email con contraseña</button>
                
              <!-- /.col -->
            <!-- /.row -->
            <!-- /.row -->
           
                  
                
            </form>
          </div>

                              
                      </div><!-- /.card --> 
                  </div><!-- /.card-body -->
              </div><!-- /.card card-primary card-outline -->

          </div><!-- /.card-body -->

        </div><!-- /.card card-primary card-outline -->

      </section><!-- /.section-->
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->