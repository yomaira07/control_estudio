  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
    <!-- /.container-fluid -->
   
    </section>

    <!-- Main content -->
     <section class="content">
      <!-- /.card -->
      <script language="javascript">


function regresar()
{ 

 location.assign("<?php echo base_url(); ?>dashboard08/inscripcion");  

}
</script>
              <div class="card card-secondary card-outline">
                
                      <div class="card">
          
                          <div class="card-header">
                            <h3 class="card-title"><b>Registro de Pago de Aranceles de Inscripcción del Aspirante</b></h3>
                          </div>
                          <div align="center"><h1> 
                  <img src="<?php echo base_url(); ?>assets/img/logo2.png"  width="100px" height="100px"/> 
                  <strong>El monto del arancel de inscripción está sujeto a la tasa del BCV, del día que se realice la transferencia. </strong></h1>
                </div>


                          <div class="card-body">
<!-- Mensaje de Alerta-->
                        <?php  if ($this->session->flashdata("error")): ?>
                        <div class="alert alert-danger alert-dismissible">
                          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                          <p><i class="icon fa fa-ban"></i> <?php echo $this->session->flashdata("error"); ?> </p>
                        </div>
                      <?php endif; ?>
                      <?php  if ($this->session->flashdata("success")): ?>
                        <div class="alert alert-success">
                          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                          <p><i class="icon fa fa-check-square"></i> <?php echo $this->session->flashdata("success"); ?> </p>
                        </div>
                      <?php endif; ?>
                      <?php  if ($this->session->flashdata("warning")): ?>
                        <div class="alert alert-warning">
                          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                          <p><i class="icon fa fa-check-square"></i> <?php echo $this->session->flashdata("warning"); ?> </p>
                        </div>
                      <?php endif; ?>       

                        <?php  if ($this->session->flashdata("info")): ?>
                        <div class="alert alert-info alert-dismissible">
                          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                          <p><i class="icon fa fa-ban"></i> <?php echo $this->session->flashdata("info"); ?> </p>
                        </div>
                      <?php endif; ?>
                        <!-- Fin Mensaje de Alerta-->
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
$arancel_fuera_lapso=0.00;
  foreach($aranceles as $aranceles){
 //   echo $aranceles->id_tipo_arancel;
  if ($aranceles->id_tipo_arancel=='5')$arancel_ins_esp=$aranceles->monto_gen;//inscripcion
  if ($aranceles->id_tipo_arancel=='6')$arancel_ins_maes=$aranceles->monto_gen;//inscripcion
  if ($aranceles->id_tipo_arancel=='7')$arancel_ins_doc=$aranceles->monto_gen;//inscripcion
if ($aranceles->id_tipo_arancel=='3' and $aranceles->status==1 and (date('Y-m-d')=='2025-01-08'))$arancel_fuera_lapso=$aranceles->monto_gen;//fuera_lapso

$monto_gen=0.00;
$total_programa=0;
  }
}
?>
                  <tbody>
                    <?php if(!empty($programas)):?>
                      <?php 
                     
                      foreach($programas as $programas):
                        if($programas->tipo_programa==1):
                          $arancel_ins=$arancel_ins_esp;
                        endif;
                        if($programas->tipo_programa==2):
                          $arancel_ins=$arancel_ins_maes;
                        endif;
                        if($programas->tipo_programa==3):
                          $arancel_ins=$arancel_ins_doc;
                        endif;
                                  ?>
                  <tr>
                    <td><?php echo $programas->nombre_convocatoria;?></td>             
                     <td align="right"><?php echo 'Ref. '.$arancel_ins;?></td>                  
                    <?php $monto_gen+= $arancel_ins;
		$total_programa++;?>
                  </tr>
                 
                        <?php endforeach;?>
                  <?php endif;?>        
                  </tbody>
                 <tfooter>
<tr>
                    <th>Total Arancel fuera de lapso                      --------------------------------></th>
                     <td align="right"><b><?php echo 'Ref. '. $monto_gen_fuera_lapso=$arancel_fuera_lapso*$total_programa; ?><b></td>
                    </tr>
                  <tr>
                    <th>Total General a Pagar por concepto de inscripción --------------------------------></th>
                     <td align="right"><b><?php   $monto_gen=$monto_gen + $arancel_fuera_lapso; echo 'Ref. '. $monto_gen ; ?><b></td>
                    </tr>
                  </tfooter>
                </table>

                </div><!-- /.card card-primary card-outline -->    
                </div><!-- /.card-body -->
                </div><!-- /.card --> 
                <div class="card card-primary card-outline">
                
                      <div class="card">
                <div class="card-body">
               <div class="card-header">
                  <h3 class="card-title"><strong>Reporte de pago deposito o Transferencia</strong></h3>  
                  <br><h3 class="card-title"> No se permite pagos interbancarios ni pago móvil - en transferencia o efectivo.<br>
 La Escuela Nacional de Fiscales del Ministerio Público <i>no hará devoluciones</i>.        </h3>       
                </div>
                <br>
                
                        <!-- Mensaje de Alerta-->
                        <?php  if ($this->session->flashdata("error")): ?>
                        <div class="alert alert-danger alert-dismissible">
                          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                          <p><i class="icon fa fa-ban"></i> <?php echo $this->session->flashdata("error"); ?> </p>
                        </div>
                      <?php endif; ?>
                        <!-- Fin Mensaje de Alerta-->
                  <form action="<?php echo base_url()?>dashboard08/registropago_store" method="POST" enctype="multipart/form-data" >
                  <div class="row">
                  <div class="col-md-9">
                  <!-- Formulario de reporte-->
                                
                  <table class="table table-bordered">
                  <input type="hidden" name="id_estudiante" value="<?php echo $datos_alumno->id; ?>">
                  <input type="hidden" name="id_estado_estudio" value="24">
                  <input type="hidden" name="total_pagar" value="<?php echo $monto_gen; ?>">
                  <input type="hidden" name="postgrado" value="INSCRIPCION ASPIRANTE">
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
                
            
                 
                        
              <!-- /.col -->
            </div>
            <div align="rigth">            
            <button type="submit" class="btn btn-primary">Registrar pago</button>
            </div> 
            <div align="center">       
            <input type="button" name="btnSeguiente" value="Regresar" class="boton btn btn-info" onClick="regresar();">
            </div>    
            <!-- /.row -->
            <!-- /.row -->
           
                  
                
            </form>
            </div><!-- /.card card-primary card-outline -->    
                </div><!-- /.card-body -->
                </div><!-- /.card --> 
                     

    

      </section><!-- /.section-->
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

