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
                            <h4 >Registro de Pago de Materias Inscritas</h4>
                          </div>

                          <div class="card-body">

                           <input type="hidden" name="datos_str" value="<?php// echo $datos_str; ?>">
                           <input type="hidden" name="str" value="<?php // echo $str; ?>">
                <div class="row">
                  <div class="col-md-9">                        
                 <table class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Programa de Postgrado</th>
                    <th>UC</th>
                    <th>Unidad Curricular</th>
                   
                  </tr>
                  </thead>
                  <tbody>
                    <?php if(!empty($list_registro)):?>
                      <?php 
                      $total_ucredito = 0;
                       $ucredito=0;
                    //  var_dump($list_registro);
                      foreach($list_registro as $list_registro):
              
                       if ($lista_trabajo->descuento > 0) {

                      $valor_ucredito = $list_registro->valorpubmp;
                    }else{

                      $valor_ucredito = $list_registro->valorpubgen;
                    }
                      ?>
                  <tr>
                    <td><?php echo $list_registro->programa;?></td>
                    <td><?php echo $list_registro->uc;
                          $ucredito +=$list_registro->uc ;
                    ?></td>
                    <td><?php echo $list_registro->unidad_curricular; ?></td>
                    <td><?php echo $list_registro->trimestre; ?></td>
                                      
                  </tr>
                 
                        <?php endforeach;?>
                  <?php endif;?>        
                  </tbody>
                 <thead>
                  <tr>
                    <th>Programa de Postgrado</th>
                    <th>Total U.C ---> <?php echo $ucredito;?></th>
                    <th>Unidad Curricular</th>
                   
                  </tr>
                  </thead>
                </table>
                    <?php if(!empty($exonerados)):?>

                 <table class="table table-bordered table-striped">
                  <thead>
                    <tr><th colspan="5">UNIDADES DE CREDITOS EXONERADAS</th></tr>
                  <tr>
                    <th>Programa de Postgrado</th>
                    <th>UC</th>
                    <th>Unidad Curricular</th>
                    <th>Trimestre</th>
                    <th>Monto Unidad de Credito a exonerar</th>
                  </tr>
                  </thead>
                  <tbody>
                      <?php 
                      $total_ucredito = 0;
                       $ucreditoE=0;
                       $total_ucredito_gen_exonerados=0;
                    //  var_dump($list_registro);
                      foreach($exonerados as $exonerados):
            //  echo $lista_trabajo->descuento ;
                       if ($lista_trabajo->descuento > 0) {

                      $valor_ucredito = $exonerados->valorpubmp;
                    }else{

                      $valor_ucredito = $exonerados->valorpubgen;
                    } 
                    // echo "uc ".$valor_ucredito ;
                      ?>

                  <tr>
                    <td><?php echo $exonerados->programa;?></td>
                    <td><?php echo $exonerados->uc;
                          $ucreditoE +=$exonerados->uc ;
                    ?></td>
                    <td><?php echo $exonerados->unidad_curricular; ?></td>
                    <td><?php echo $exonerados->trimestre; ?></td>
                     <td><?php $total_ucredito = $exonerados->uc * $valor_ucredito;
                              $total_ucredito_gen_exonerados +=$total_ucredito ;
                    echo $total_ucredito.' Ref.';?> </td>                    
                  </tr>
                 
                        <?php endforeach;?>

                  </tbody>
                 <thead>
                  <tr>
                    <th>Programa de Postgrado</th>
                    <th>Total U.C ---> <?php echo $ucreditoE;?></th>
                    <th>Unidad Curricular</th>
                    <th>Trimestre</th>
                   
                    <th>Monto a Exonerar por U.C.--><?php echo $total_ucredito_gen_exonerados.' $';?></th>
                  </tr>
                  </thead>
                </table>

                  <?php endif;?>        
</div>
</div>
           
             <form action="<?php echo base_url()?>dashboard04/registropago_store" method="POST" enctype="multipart/form-data" >
                           <!-- Mensaje de Alerta-->
                        <?php  if ($this->session->flashdata("error")): ?>
                        <div class="alert alert-danger alert-dismissible">
                          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                          <p><i class="icon fa fa-ban"></i> <?php echo $this->session->flashdata("error"); ?> </p>
                        </div>
                      <?php endif; ?>
                     
                        <!-- Fin Mensaje de Alerta-->
             <div class="row">
              <div class="col-md-9">
            
  <?php 
 $valor_ucredito=0;
  $total_pagar = 0;
  $total_uc = 0;
  $total_arancel_ins=0;
  $arancel_fuera_lapso=0.00;
  $total_arancel_permanencia_gen=0;
  $total_pagar_gen = 0;
//valor inscripcion y permanencia

if (!empty($aranceles)){
  foreach($aranceles as $aranceles){
 //   echo $aranceles->id_tipo_arancel;
 if ($aranceles->id_tipo_arancel=='1')$arancel_ins=$aranceles->monto_gen; //inscripcion
   if ($aranceles->id_tipo_arancel=='4')$arancel_insMaes=$aranceles->monto_gen; //inscripcion
  if ($aranceles->id_tipo_arancel=='2')$total_arancel_permanencia=$aranceles->monto_gen; //permanencia

   if (!empty($lapso)){
      if ($aranceles->id_tipo_arancel=='3' and $lapso->tipo_lapso==2 )$arancel_fuera_lapso_programa=$aranceles->monto_gen; //fuera de lapso    
//      if ($aranceles->id_tipo_arancel=='3' and $this->session->userdata("rol")==5 and $this->session->userdata('tiempo_preinscripcion')<>23 )$arancel_fuera_lapso=$aranceles->monto_gen; //fuera de lapso    

  }
  }
}

   
               
             // var_dump($programa_preinscrito);
$total_programas=0;
              foreach($programa_preinscrito as $programas){ 
                if($programas->id_programa==8 OR $programas->id_programa==9) {  
                  
                            
                  $total_arancel_ins+=$arancel_ins;    
                  $total_pagar += $valor_ucredito * $programas->unidades_creditos;                 
                   
                
                }else{      
                    if($programas->id_programa==10 OR $programas->id_programa==11) {  
                      $total_programas=+1;
                      $total_arancel_ins+= $arancel_insMaes ;      
                      $total_pagar +=  $total_arancel_ins +($valor_ucredito*$programas->unidades_creditos);
                    }else{
                      $total_programas+=1;
//                  echo $arancel_ins;
                  $total_arancel_ins+= $arancel_ins ;      
		    $arancel_fuera_lapso += $arancel_fuera_lapso_programa ;
                     $total_pagar +=  $total_arancel_ins +($valor_ucredito*$programas->unidades_creditos);
                    }
                }
               
              
              }
              $total_arancel_ins  =0;// NO PAGAN INSCRIPCION
             
              
              $monto_uc=$total_ucredito_gen;
              $total_ucredito=$ucredito ;
              $total_pagar_gen=$monto_uc+$total_arancel_ins;
              if($total_ucredito_gen_exonerados>0){
                $monto_exonerar=($total_ucredito_gen_exonerados+$total_arancel_ins+$arancel_fuera_lapso+ $total_arancel_permanencia_gen);
              }else{
                $monto_exonerar=0.00;
              }
       ?>
      <?php     

   ?>
 <input type="hidden" name="id_estudiante" value="<?php echo $datos_alumno->id; ?>">
  <input type="hidden" name="id_estado_estudio" value="<?php echo $estado_estudio->id_estado_inscribio; ?>">
 <input type="hidden" name="total_pagar" value="<?php echo $total_pagar; ?>">
  <input type="hidden" name="postgrado" value="<?php echo $list_registro->programa; ?>">
 <input type="hidden" name="total_ucredito" value="<?php echo $total_ucredito; ?>">
 <input type="hidden" name="id_periodo" value="<?php echo $periodo->id; ?>">
 <input type="hidden" name="valor_ucredito2" id="valor" value="<?php echo number_format($valor_ucredito, 2, ",", ".") ?>">
 <input type="hidden" name="id_usuario" value="<?Php echo $this->session->userdata('id'); ?>">
<br>                          
                     <?php if(!empty($reincorporaciones)):?>
                    <table class="table table-bordered table-striped">
                      <thead>
                      <tr>
                        <th colspan="2"><b>Programa Postgrado por Permanencia</b></th>
                        <th><b>Monto por Arancel por Permanencia</b></th>
                      </tr>
                    </thead>
                    <tbody>
                        <?php foreach($reincorporaciones as $reincorporaciones):?>
                      <tr><td>
                        <?php echo $reincorporaciones->programa;?>
                      </td>
       <td>
                        <?php echo $reincorporaciones->trimestre;?>
                      </td>
                    <td>
                        <?php echo $total_arancel_permanencia.' Ref.';
                       $total_arancel_permanencia_gen+=$total_arancel_permanencia;
                        ?>
                      </td></tr>
                       <?php endforeach ?>
                       <td colspan="2" ><b>Monto a Pagar por Arancel por Permanencia</b></td>
                       <td><b><?php echo $total_arancel_permanencia_gen.' $';?></b></td>
                    </tbody>
                  </table>

                <?php endif ?>
          <br>
         
            <table class="table table-bordered">
              
                
                  <tr>
                    <td>Monto por Arancel Fuera de lapso:</td>
                    <td>
                      <div class="row">
                       <div class="col-5">
                      <input class='form-control' value='<?php echo number_format($arancel_fuera_lapso, 2, ".", ","); ?>' type=text name='fuera_lapso'   maxlength='2' readonly  > 
                    </div>Ref.
                  </div></td>
                  </tr>
                  <tr>
                    <td>Monto por Arancel por Permanencia:</td>
                    <td>  
                    <div class="row">                 
                         <div class="col-5">
                        <input class='form-control' value='<?php echo number_format($total_arancel_permanencia_gen,2,".", ","); ?>' type=text name='permanencia'  maxlength='2' readonly >
                         </div>
                           Ref.
                        </div>
                    </td>
                   </tr>  
                  
                   
                    <td>Monto a Exonerar:</td>
                    <td>  
                    <div class="row">                 
                         <div class="col-5">
                        <input class='form-control' value='<?php  echo number_format($monto_exonerar,2,".", ","); ?>' type=text name='exonerado'  maxlength='2' readonly >
                         </div>
                           Ref.
                        </div>
                    </td>
                   </tr>  
                  <tr>
                    <td><b>Monto a Pagar o Depositar:</b></td>
                    <td><div class="row"><div class="col-5"><input class='form-control' placeholder='(Use el punto . para decimales Ej. 0.00)' readonly  type='text' name='total_pagar'  maxlength='15' value="<?php  $total_pagar_gen += $total_arancel_permanencia_gen +$arancel_fuera_lapso;
                    echo $total_pagar_gen - $monto_exonerar ; //echo number_format($total_pagar, 2, ",", "."); ?>"></div>Ref.</div> No se aceptan divisas. El pago debe ser realizado a la tasa de cambio establecida por el Banco Central de Venezuela (BCV) correspondiente al día que realiza el registro. </td>
                  
                  </tr>
                 
                </table> 
            </div>
            </div>
               <br>
          <div class="row">
              <div class="col-md-9">
               <div class="card-header">
                  <h4 >Reporte de Pago Depósito o Transferencia.</h4>
               </div>
                <br>

            <!-- Formulario de reporte-->
                  
                <table class="table table-bordered">   
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
                    <td><input class='form-control' placeholder='(Últimos 8 Digitos)' value='' type=text name='nro_referencia'  maxlength='8' minlength='6'required></td>
                  </tr>
                  <tr>
                    <td>Cédula-RIF que realizo el depósito:</td>
                    <td><div class="row">
                      <div class="col-2">
                       <select class="form-control" name="cod_nacionalidad">
                              <option value="V">V</option>
                              <option value="E">E</option>
                            </select>
                      </div>
                      <div class="col-2">
                        <input type="text" class="form-control" id="cedula" maxlength="8" minlength="6" name="cedula" onkeypress="return controltag(event)" value="" required>
                      </div>
                    </div>
                  </td>
                  </tr>                      
                   <tr>
                    <td>Tipo de Operación:</td>
                    <td> 
                      <input class="form-check-input" type="radio" name="radio1" checked value="1">   
                          <label class="form-check-label">Deposito-Transferencia mismo banco</label>
                          <br>
                    </td>
                  </tr>
                   <tr>
                    <td><b>Monto Depositado (BS.):</b></td>
                    <td><div class="row"><div class="col-5"><input class='form-control' placeholder='(Use el punto (.) para identificar los decimales Ej. 1.01)'  type='text' name='monto' id="monto" maxlength='15' value=""></div>Bs.</div></td>                  
                  </tr>
                  <tr>
                    <td>Adjuntar transferencia
                    </td>
                    <td> <p align="center">
    Para poder enviarnos la imagen de transferencia, el archivo debe estar en cualquiera 
    de los formatos *.JPG, *.JPEG, *.GIF, *.PNG.,*.PDF
  </p>
  <p align="center">
    El tama&ntilde;o m&aacute;ximo permitido de la imagen es de 1 MB (1024KB).
  </p>
                       <input type="file" name="userfile" size="400" required="true" /> 
                    </td>
                  </tr>           
                </table>  
            </div>
          </div>
              <!-- /.col -->
                <div class="col-md-3"> 
                 

             
                <button type="submit" class="btn btn-primary">Registrar pago</button>
                
              <!-- /.col -->
            </div>
            <!-- /.row -->
            <!-- /.row -->
                  
                
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>


