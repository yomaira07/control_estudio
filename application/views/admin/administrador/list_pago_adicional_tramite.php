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
                      <div class="card">
          
                          <div class="card-header">
                            <h3 class="card-title">Listado de Trámites y/o Solicitudes </h3>
                          </div>
                          <div class="card-header">
                            <h4 ><b>Registro de Pagos Adicionales</b></h4>
                          </div>
                          <div class="card-body">

                             
                 <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Cedula</th>
                    <th>Nombres y Apellidos</th>
             		    <th>Correo Electrónico</th>
            		   
                    <th>Estado</th>

                     <th>Fecha de Solicitud del Tramite</th>
                    <th>Tramite y/o Solicitud</th>          
                    <th>Opcion</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php if(!empty($listado)):?>
                      <?php foreach($listado as $listado):?>
                  <tr>
                    <td><?php echo $listado->cedula_est;?></td>
                    <td><?php echo $listado->pri_nombre ?> <?php echo $listado->seg_nombre; ?> <?php echo $listado->pri_apellido ?> <?php echo $listado->seg_apellido ?></td>
		    <td><?php echo $listado->correo; ?></td>			
                 
            
                    <td><?php echo $listado->nob_estado; ?></td>
                    <td><?php echo $listado->fecha_solicitud; ?></td>

                    <td><?php echo $listado->programa.'<br><hr>'.'<b>Trámite: </b>'.$listado->tramite; ?></td>                 
                    
                                    
                     <td><div align="center"><a href="<?php echo base_url()?>dashboard09/registro_pago_adicional/<?php echo $listado->id_usuario.'/'.$listado->id_solicitud;?>" class="btn btn-success" title="Registrar Pago Adicional">REGISTRAR</a> </div>
                  </tr>
                        <?php endforeach;?>
                  <?php endif;?>        
                  </tbody>
                  <tfoot>
                  <tr>
                  <th>Cedula</th>
                    <th>Nombres y Apellidos</th>
             		    <th>Correo Electrónico</th>
            		   
                    <th>Estado</th>

                     <th>Fecha de Solicitud del Tramite</th>
                    <th>Tramite y/o Solicitud</th>          
                    <th>Opcion</th>
                  </tr>
                  </tfoot>
                </table>

               <br>
              
          </div>
         

                              
                      </div><!-- /.card --> 
                  </div><!-- /.card-body -->
              </div><!-- /.card card-primary card-outline -->

        <!-- /.card-body -->

      <!-- /.card card-primary card-outline -->

      </section><!-- /.section-->
    <!-- /.content -->

 </div>
  <!-- /.content-wrapper -->
