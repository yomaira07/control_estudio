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
                            <h3 class="card-title">Registro de Pago Adicional</h3>
                          </div>
                          <div class="card-header">
                            <h4>Registro de pago depósito o Transferencia Adicional.</h4> 
                          </div>

                          <div class="card-body">
                            <br>              
                        <!-- Mensaje de Alerta-->
                        <?php  if ($this->session->flashdata("error")): ?>
                        <div class="alert alert-danger alert-dismissible">
                          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                          <p><i class="icon fa fa-ban"></i> <?php echo $this->session->flashdata("error"); ?> </p>
                        </div>
                      <?php endif; ?>
                        <!-- Fin Mensaje de Alerta-->
                         <form action="<?php echo base_url()?>dashboard05/store_pago_adicional" method="POST" enctype="multipart/form-data" >
                            <div class="row">
                            <div class="col-md-9">
                            <!-- Formulario de registro-->
                            <table class="table table-bordered"> 
                                <input type="hidden" name="id_estudiante" value="<?php echo $datos_alumno->id; ?>">
                                <input type="hidden" name="id_estado_estudio" value="<?php echo $estado_estudio->id_estado_inscribio; ?>">
                                <input type="hidden" name="total_pagar" value="<?php echo $total_pagar; ?>">
                                <input type="hidden" name="postgrado" value="<?php echo $unidad_credito->postgrado; ?>">
                                <input type="hidden" name="total_ucredito" value="<?php echo $total_ucredito; ?>">
                                <input type="hidden" name="id_periodo" value="<?php echo $periodo->id; ?>">
                    
                                <input type="hidden" name="id_usuario_sesion" value="<?Php echo $this->session->userdata('id'); ?>">
                                <input type="hidden" name="id_usuario" value="<?Php echo $datos_alumno->id_usuario; ?>">
                                <input type="hidden" name="rol_usuario" value="<?Php echo $rol_alumno->rol_id; ?>">
                                <input type="hidden" name="cod_nacionalidad" value="<?Php echo $datos_alumno->nacionalidad; ?>">
                                <input type="hidden" name="cedula" value="<?Php echo $datos_alumno->cedula; ?>"> 
		 <div class="card-header">
                            <h4>Cédula de Identidad: <?php echo $datos_alumno->cedula;?><br>Nombres y Apellidos: <?php echo $datos_alumno->nombre_primer.' '.$datos_alumno->apellido_primer; ?><br>Período Academico: <?php echo $periodo->nombre; ?> </h4> 
                          </div>
                                    <tr>
                                      <td>Cuenta Bancaria</td>
                                      <td>
                                        <select name="id_banco" class="form-control" required>
                                         <option value="">Seleccione...</option>
                                         <?Php foreach ($list_banco as $list_banco){
                                           echo "<option value='".$list_banco->id."'> ". $list_banco->nombre.' Nro cuenta: '. $list_banco->nro_cuenta."</option>";  
                                          }
                                        ?>
                                      </select>
                                      </td>
                                    </tr>
                                    <tr>
                                      <td>Fecha de Operación</td>
                                      <td><input class='form-control' placeholder='Fecha de la operacion' value='' type=date name='fecha_transferencia' required></td>
                                    </tr>
                                    <tr>
                                      <td>Nro. de Transferencia / Depósito</td>
                                      <td><input class='form-control' placeholder='(8 Digitos)' value='' type=text name='nro_referencia'  maxlength='8' maxlength='6'  required></td>
                                    </tr>
                                 <tr>
                                      <td>Total de Unidades de Crédito Adicionales Canceladas:</td>
                                      <td> <input class='form-control'  type="text" name="unidad_credito" placeholder='00' id="valor" value="00" maxlength='15' value="00" required>
                                       
                                    </tr>   
				 <tr>
                                      <td>Monto depositado:</td>
                                      <td><input class='form-control' placeholder='(Use . para decimales)'  type=text name='monto'  maxlength='15' value="0.00" required></td>
                                    </tr>
                                </table> 
                            </div>
                            <!-- /.col -->
                           
                            </div> <!-- /.row -->
                             <div class="col-md-3"> 
                                <button type="submit" class="btn btn-primary">Registrar pago</button>                            
                            </div><!-- /.col -->
                            <!-- /.row -->   
                      </form>
                        </div>                              
                      </div><!-- /.card --> 
                  </div><!-- /.card-body -->
              </div><!-- /.card card-primary card-outline -->
      </section><!-- /.section-->
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
