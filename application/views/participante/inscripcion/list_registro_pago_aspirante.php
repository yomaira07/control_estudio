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
                            <h3 class="card-title">Registro de Pago</h3>
                          </div>

                          <div class="card-body">
 <input type="hidden" name="datos_str" value="<?php// echo $datos_str; ?>">
 <input type="hidden" name="str" value="<?php // echo $str; ?>">
                              
                 <table class="table table-bordered table-striped" width="50%">
                  <thead>
                  <tr>
                    <th>Programas de Postgrado que aspira cursar</th>
                     <th>Arancel de Inscripción</th>
                                      </tr>
                  </thead>
                <?php  if (!empty($aranceles)){
  foreach($aranceles as $aranceles){
 //   echo $aranceles->id_tipo_arancel;
  if ($aranceles->id_tipo_arancel=='5')$arancel_ins=$aranceles->monto_gen;//inscripcion
//  if ($aranceles->id_tipo_arancel=='2')$total_arancel_permanencia=$aranceles->monto_gen; //permanencia
$monto_gen=0.00;
  }
}
?>
                  <tbody>
                    <?php if(!empty($programas)):?>
                      <?php 
                     
                      foreach($programas as $programas):
                                  ?>
                  <tr>
                    <td><?php echo $programas->nombre;?></td>             
                     <td align="right"><?php echo $arancel_ins.' $';?></td>                  
                    <?php $monto_gen+= $arancel_ins;?>
                  </tr>
                 
                        <?php endforeach;?>
                  <?php endif;?>        
                  </tbody>
                 <tfooter>
                  <tr>
                    <th>Total General a Pagar por concepto a inscripción --------------------------------></th>
                     <td align="right"><b><?php echo $monto_gen.' $'; ?><b></td>
                    </tr>
                  </tfooter>
                </table>

               <br>
               <br>
               <h4>Reporte de pago deposito o Transferencia.</h4> 
                <br>
                
                        <!-- Mensaje de Alerta-->
                        <?php  if ($this->session->flashdata("error")): ?>
                        <div class="alert alert-danger alert-dismissible">
                          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                          <p><i class="icon fa fa-ban"></i> <?php echo $this->session->flashdata("error"); ?> </p>
                        </div>
                      <?php endif; ?>
                        <!-- Fin Mensaje de Alerta-->
                         <form action="<?php echo base_url()?>dashboard04/registropago_store" method="POST" enctype="multipart/form-data" >
            <div class="row">
              <div class="col-md-9">
            <!-- Formulario de reporte-->
                  
<table class="table table-bordered">
  <?php 
/*$valor_ucredito=0;
$total_pagar = 0;

                if ($lista_trabajo->descuento > 0) {
                  $valor_ucredito = $list_registro->valorpubmp;
                }else{

                  $valor_ucredito = $list_registro->valorpubgen;
                }
      //echo number_format($valor_ucredito, 2, ",", "."). "  Bs." ;
              $total_pagar = $total_ucredito * $valor_ucredito;*/
       ?>
      <?php 
             //   if ($lista_trabajo->descuento > 0) {
             //     $valor_ucredito = $list_registro->valorpubmp;
             //   }else{
              //    $valor_ucredito = $list_registro->valorpubgen;
            //    }
 //$Total_Pagar= $precio_venta * $listado->valorpubgen;
    // $total_pagar = $total_ucredito * $valor_ucredito;
 // echo number_format($total_pagar, 2, ",", ".")."  Bs.";

   ?>
 <input type="hidden" name="id_estudiante" value="<?php echo $datos_alumno->id; ?>">
  <input type="hidden" name="id_estado_estudio" value="<?php echo $estado_estudio->id_estado_inscribio; ?>">
 <input type="hidden" name="total_pagar" value="<?php echo $monto_gen; ?>">
<input type="hidden" name="postgrado" value="<?php echo $programas->nombre; ?>">
 <input type="hidden" name="total_ucredito" value="<?php echo $total_ucredito=0; ?>">
 <input type="hidden" name="id_periodo" value="<?php echo $periodo->id; ?>">
 <input type="hidden" name="valor_ucredito2" id="valor" value="<?php $valor_ucredito=0; echo number_format($valor_ucredito, 2, ",", ".") ?>">
 <input type="hidden" name="id_usuario" value="<?Php echo $this->session->userdata('id'); ?>">
                  <tr>
                    <td>Cuenta Bancaria</td>
                    <td><select name="id_banco" class="form-control" required>
                      <option value="">Seleccione...</option>
                        <?Php foreach ($list_banco as $list_banco){
                          echo "<option value='".$list_banco->id."'> ". $list_banco->nombre.' Nro cuenta: '. $list_banco->nro_cuenta."</option>";  
                        }
                        ?>
                      </select></td>
                  </tr>
                  <tr>
                    <td>Fecha de Operacion</td>
                    <td><input class='form-control' placeholder='Fecha de la operación' value='' type=date name='fecha_transferencia' required></td>
                  </tr>
                  <tr>
                    <td>Nro de Transferencia / Deposito</td>
                    <td><input class='form-control' placeholder='(Ultimos (8) Digitos)' value='' type=text name='nro_referencia'  maxlength='8' required></td>
                  </tr>
                  <tr>
                    <td>Cédula-RIF:</td>
                    <td><div class="row">
                      <div class="col-2">
                       <select class="form-control" name="cod_nacionalidad">
                              <option value="V">V</option>
                              <option value="E">E</option>
                            </select>
                      </div>
                      <div class="col-5">
                        <input type="text" class="form-control" id="cedula" maxlength="8" minlength="6" name="cedula" onkeypress="return controltag(event)" value="" required>
                      </div>
                    </div></td>
                  </tr>
                  
                  <tr>
                    <td>Monto Depositado (BS.):</td>
                    <td><div class="row"><div class="col-5"><input class='form-control' placeholder='(Use . para decimales Ej. 0.00)'  type='text' name='monto' id="monto" maxlength='15' value=""></div>Bs.</div></td>            
                  </tr>
                  <tr>
                    <td>Tipo de Operacion:</td>                    <td> 
                      <input class="form-check-input" type="radio" name="radio1" checked value="1">   
                          <label class="form-check-label">Deposito-Transferencia mismo banco</label>
                          <br>
                    </td>
                  </tr>
                  <tr>
                    <td>Adjuntar transferencia
                    </td>
                    <td> <p align="center">
    Para poder enviarnos la imagen de transferencia, el archivo debe estar en cualquiera 
    de los formatos *.JPG, *.JPEG, *.GIF, *.PNG., *.PDF
  </p>
  <p align="center">
    El tama&ntilde;o m&aacute;ximo permitido de la imagen es de 1 MB (1024KB).
  </p>
                       <input type="file" name="userfile" size="400" required="true" /> 
                    </td>
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

