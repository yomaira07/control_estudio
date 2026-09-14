<?php
$nombre_archivo='pagos_sin conciliar'.date("dmyhis");
$titulo='
Listado de Pagos Reportados sin conciliación de los Nuevos Ingresos registrados en la nueva campaña de registro';
header("Pragma: public");
header("Expires: 0");
$filename = $nombre_archivo.".xls";
header("Content-type: application/x-msdownload");
header("Content-Disposition: attachment; filename=$filename");
header("Pragma: no-cache");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");

        print "\xEF\xBB\xBF"; // UTF-8 BOM
       
?>
       

           
       
       <table border="0.1" cellpadding="5" cellspacing="3">
<tbody>
                  <thead>
                  <tr>
                  <th>Período académico</th>
                    <th>Cédula</th>
                    <th>Nombres y Apellidos</th>
 		    <th>Correo Electrónico</th>
 			<th>Teléfonos</th>
		    <th>/Nuevo Ingreso/Regular</th>
                    <th>Estado</th>
                     <th>Pago Adicional</th>
                    <th>Banco</th>
                    <th>Nro Ref.</th>
                    <th>Fecha</th>
                    <th>Monto Pagar</th>
                    <th>Monto Depositado</th>                 
                    <th>Programa</th>
	         
                  </tr>
                  </thead>
                  <tbody>
                    <?php if(!empty($listado)):?>
                      <?php foreach($listado as $listado):
                         
                    if ($listado->aspirante==0 ){ ?>
                       <tr>
                       <td><?php echo $listado->periodo;?></td>
                    <td><?php echo $listado->cedula_est;?></td>
                    <td><?php echo $listado->pri_nombre ?> <?php echo $listado->seg_nombre; ?> <?php echo $listado->pri_apellido ?> <?php echo $listado->seg_apellido ?></td>
        <td><?php echo $listado->correo; ?></td>   
  <td><?php echo $listado->cod_hab.'-'.$listado->telefono_hab.' '.$listado->cod_cel.'-'.$listado->telefono_cel; ?></td>    
                    <td><?php  if($listado->rol_id==5)echo 'REGULAR';  if($listado->rol_id=='8' AND $listado->inscrito==61)echo 'NUEVO INGRESO ÚLTIMA CAMPAÑA'; if($listado->rol_id=='8' AND $listado->inscrito!=61 ) echo 'NUEVO INGRESO ADMITIDO';?></td>
                    <td><?php echo $listado->nob_estado; ?></td>
                    <td><?php if($listado->pago_adicional=='1')echo 'SI'; else echo 'Primer Pago'; ?></td>
                    <td><?php echo $listado->banco; ?></td>
                    <td><?php if ($listado->pago_adicional==0){echo '<b>Primer Pago</b>'.$listado->nro_referencia;}else{echo 'Pago Adicional'.$listado->nro_referencia;}?></a></td>
                   
                    <td><?php echo  date("d/m/Y", strtotime($listado->fecha_transferencia)); ?></td>
                    <td><?php echo number_format($listado->monto_apagar, 2, ".", ","); ?></td>
                    <td><?php echo number_format($listado->monto_depositado, 2, ".", ","); ?></td>
                     
                    <td><?php echo $listado->programa; ?></td>

                  
                                  

                  </tr>
                        <?php }
                         endforeach;?>
                  <?php endif;?>        
                  </tbody>
              
                </table>

