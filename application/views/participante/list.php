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
                            <h3 class="card-title">Oferta del Mes de Agosto 2020</h3>
                          </div>

                          <div class="card-body">

                             
                 <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Fecha</th>
                    <th>Nombre</th>
                    <th>Horario</th>
                    <th>Facilitador</th>
                    <th>Inversión</th>
                    <th>Duración</th>
                    <th>Inscribirse</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php //if(!empty($propietarios)):?>
                      <?php //foreach($propietarios as $propietario):?>
                  <tr>
                    <td>10-08-2020<?php //echo $propietario->seccion_id;?></td>
                    <td>ANÁLISIS DEL ITER CRIMINIS EN CASOS PRACTICOS<?php //echo $propietario->nro_vivienda;?></td>
                    <td>9:00a.m a 1:30pm<?php //echo $propietario->apellidos; ?></td>
                    <td>ABG.ESP.Isabella Vecchionacce<?php //echo $propietario->correo; ?></td>
                    <td>Bs. 1.142.506,40<?php //echo $propietario->telefono;?></td>
                    <td>6 horas académicas<?php //echo $propietario->telefono;?></td>
                    <td><input type="checkbox" name=""></td>
                  </tr>
                  <tr>
                    <td>14-08-2020<?php //echo $propietario->seccion_id;?></td>
                    <td>ROL DE LA PSICOLOGÏA EN EL PROCESO PERNAL<?php //echo $propietario->nro_vivienda;?></td>
                    <td>9:00a.m a 12:00pm<?php //echo $propietario->apellidos; ?></td>
                    <td>PSIC.Elza Barraza<?php //echo $propietario->correo; ?></td>
                    <td>Bs. 870.266,92<?php //echo $propietario->telefono;?></td>
                    <td>4 horas académicas<?php //echo $propietario->telefono;?></td>
                    <td><input type="checkbox" name=""></td>
                  </tr>
                  <tr>
                    <td>18-08-2020<?php //echo $propietario->seccion_id;?></td>
                    <td>IMPORTACIA DE LA CADENA DE CUSTODIA EN EL PROCESO PENAL VENEZOLANO<?php //echo $propietario->nro_vivienda;?></td>
                    <td>9:00a.m a 1:30pm<?php //echo $propietario->apellidos; ?></td>
                    <td>ESP:Roberto Trejo Cava<?php //echo $propietario->correo; ?></td>
                    <td>Bs. 1.142.506,40<?php //echo $propietario->telefono;?></td>
                    <td>6 horas académicas<?php //echo $propietario->telefono;?></td>
                    <td><input type="checkbox" name=""></td>
                  </tr>
                        <?php //endforeach;?>
                  <?php //endif;?>        
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Fecha</th>
                    <th>Nombre</th>
                    <th>Horario</th>
                    <th>Facilitador</th>
                    <th>Inversión</th>
                    <th>Duración</th>
                    <th>Inscribirse</th>
                  </tr>
                  </tfoot>
                </table>

               <br>
               <br>
               <h5>Reporte de pago deposito o Transferencia.</h5> 
                <br>
                        <!-- Mensaje de Alerta-->
                        <?php  if ($this->session->flashdata("error")): ?>
                        <div class="alert alert-danger alert-dismissible">
                          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                          <p><i class="icon fa fa-ban"></i> <?php echo $this->session->flashdata("error"); ?> </p>
                        </div>
                      <?php endif; ?>
                        <!-- Fin Mensaje de Alerta-->
                         <form action="<?php echo base_url()?>dashboard/propietario_store/<?php echo $this->session->userdata("id_condominio") ?>" method="POST" >
            <div class="row">
              <div class="col-md-9">
            <!-- Formulario de reporte-->
                  
<table class="table table-bordered">
                  <tr>
                    <td>Cuenta Bancaria</td>
                    <td>Banco Mercantil(01910171142100015646)</td>
                  </tr>
                  <tr>
                    <td>Fecha de Operacion</td>
                    <td><input class='form-control' placeholder='Fecha de la operacion' value='' type=date name='fecha' ></td>
                  </tr>
                  <tr>
                    <td>Nro de Operacion</td>
                    <td><input class='form-control' placeholder='(Ultimos 6 Digitos)' value='' type=text name='nro_operacion'  maxlength='6' ></td>
                  </tr>
                  <tr>
                    <td>Cédula-RIF:</td>
                    <td><input class='form-control' placeholder='Cedula o Rif' value='' type=text name='cirif'  maxlength='15' ></td>
                  </tr>
                  <tr>
                    <td>Monto:</td>
                    <td><input class='form-control' placeholder='(Use . para decimales)'  type=text name='monto'  maxlength='15' ></td>
                  </tr>
                  <tr>
                    <td>Tipo de Operacion:</td>
                    <td> <input class="form-check-input" type="radio" name="radio1" checked>
                          <label class="form-check-label">Deposito-Transferencia mismo banco</label>
                          <br>
                          <input class="form-check-input" type="radio" name="radio1" checked>
                          <label class="form-check-label">Transferencia otro banco</label>
                    </td>
                  </tr>
                  <tr>
                    <td>Correo:</td>
                    <td><input class='form-control' type=text name='correo'  ></td>
                  </tr>
                  <tr>
                    <td>Monto en letra:</td>
                    <td><input class='form-control' type=text name='monto_letra' disabled="true"></td>
                  </tr>
                </table> 
                

              
                  
              </div>
              <!-- /.col -->
                <div class="col-md-3"> 
                 

                </div>
                <button type="submit" class="btn btn-primary">Registrar pago</button>
                
              <!-- /.col -->
            </div>
            <!-- /.row -->
            <!-- /.row -->
           
                  
                
            </form>
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