<?php
header("Pragma: public");
header("Expires: 0");
$filename = $nombre_archivo . ".xls";
header("Content-type: application/x-msdownload");
header("Content-Disposition: attachment; filename=$filename");
header("Pragma: no-cache");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");

print "\xEF\xBB\xBF"; // UTF-8 BOM
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
</head>
<body>
    
    <!-- Tabla de encabezado -->
    <table border="0" cellpadding="5" cellspacing="0" align="center" width="100%">
        <tr>
            <td colspan="19" bgcolor="#999999" style="color:#FFFFFF; font-weight:bold; text-align:center; font-size:14px;">
                REPORTE DE PAGOS CONCILIADOS
            </td>
        </tr>
        <tr>
            <td colspan="19">&nbsp;</td>
        </tr>
        <tr>
            <td colspan="19" align="center"><h2>LISTADO DE PAGOS CONCILIADOS</h2></td>
        </tr>
        <tr>
            <td colspan="19">&nbsp;</td>
        </tr>
    </table>
    
    <!-- Tabla principal con los datos -->
    <table border="1" cellpadding="5" cellspacing="0" align="center" width="100%">
        <!-- Encabezados de columnas -->
        <tr bgcolor="#D0E0F4">
            <th style="color:#1060C8; font-weight:bold; text-align:center;">N°</th>
            <th style="color:#1060C8; font-weight:bold; text-align:center;">Período Académico</th>
            <th style="color:#1060C8; font-weight:bold; text-align:center;">Cédula</th>
            <th style="color:#1060C8; font-weight:bold; text-align:center;">Nombres y Apellidos</th>
         
	    <th style="color:#1060C8; font-weight:bold; text-align:center;">Correo Electrónico</th>
   <th style="color:#1060C8; font-weight:bold; text-align:center;">Teléfono</th>
            <th style="color:#1060C8; font-weight:bold; text-align:center;">Aspirante/Nuevo Ingreso/Regular</th>          
            <th style="color:#1060C8; font-weight:bold; text-align:center;">Estado Conciliacion</th>
            <th style="color:#1060C8; font-weight:bold; text-align:center;">Pago Adicional</th>
            <th style="color:#1060C8; font-weight:bold; text-align:center;">Banco</th>
            <th style="color:#1060C8; font-weight:bold; text-align:center;">Nro Ref.</th>
            <th style="color:#1060C8; font-weight:bold; text-align:center;">Fecha</th>
            <th style="color:#1060C8; font-weight:bold; text-align:center;">Monto Pagar</th>
            <th style="color:#1060C8; font-weight:bold; text-align:center;">Monto Depositado</th>
            <th style="color:#1060C8; font-weight:bold; text-align:center;">Carnet o Carta de Servicio</th>
            <th style="color:#1060C8; font-weight:bold; text-align:center;">Postgrado</th>          
            <th style="color:#1060C8; font-weight:bold; text-align:center;">Total U.C.</th>

        </tr>
        
        <?php 
        $i = 0;
        $total_monto_pagar = 0;
        $total_monto_depositado = 0;
        $total_uc_general = 0;
        
        if(!empty($listado)):
            foreach($listado as $row): 
                $i++;
                
                // Construir nombre completo
                $nombre_completo = trim(
                    (isset($row->pri_nombre) ? $row->pri_nombre : '') . ' ' . 
                    (isset($row->seg_nombre) ? $row->seg_nombre : '') . ' ' . 
                    (isset($row->pri_apellido) ? $row->pri_apellido : '') . ' ' . 
                    (isset($row->seg_apellido) ? $row->seg_apellido : '')
                );
                $nombre_completo = preg_replace('/\s+/', ' ', $nombre_completo);
                
                // Determinar tipo de estudiante
                $tipo_estudiante = 'Regular';
                if(isset($row->id_estado_estudio)) {
                    if($row->id_estado_estudio == 1) {
                        $tipo_estudiante = 'Aspirante';
                    } elseif($row->id_estado_estudio == 2) {
                        $tipo_estudiante = 'Nuevo Ingreso';
                    }
                }
                
                // Determinar estado del pago
                $estado_pago = 'Pendiente';
                if(isset($row->conciliado)) {
                    if($row->conciliado == 1){
                        $estado_pago = 'Conciliado';
                    } elseif($row->conciliado ==0) {
                        $estado_pago = 'Pendiente';
                    } else {
                        $estado_pago = ucfirst($row->conciliado);
                    }
                }
                    // Determinar tipo de pago
                    $tipo_pago = '';
                    if(isset($row->pago_adicional)) {
                        if($row->pago_adicional == 0) {
                            $tipo_pago = 'Primer Pago';
                        } elseif($row->pago_adicional == 1) {
                            $tipo_pago = 'Pago Adicional';
                        } else {
                            $tipo_pago = $row->pago_adicional;
                        }
                    }
                
                // Formatear fecha
                $fecha = '';
                if(!empty($row->fecha_pago)) {
                    $fecha = date('d/m/Y', strtotime($row->fecha_pago));
                }
                
                // Sumar montos para el total
                $total_monto_pagar += floatval($row->monto_apagar ?? 0);
                $total_monto_depositado += floatval($row->monto_depositado ?? 0);
                $total_uc_general += floatval($row->uc ?? 0);
        ?>
        <tr>
            <td align="center"><?php echo $i; ?></td>
            <td><?php echo isset($row->periodo) ? $row->periodo : ''; ?></td>
            <td><?php echo isset($row->cedula_est) ? $row->cedula_est : ''; ?></td>
            <td><?php echo $nombre_completo; ?></td>
            <td><?php echo isset($row->correo) ? $row->correo : ''; ?></td>
  <td><?php echo isset($row->tel_cel) ? $row->tel_cel : ''; ?></td>
            <td><?php echo $tipo_estudiante; ?></td>
          
            <td><?php echo $estado_pago; ?></td>
            <td><?php echo $tipo_pago; ?></td>
            <td><?php echo isset($row->banco) ? $row->banco : ''; ?></td>
            <td><?php echo isset($row->nro_referencia) ? $row->nro_referencia : ''; ?></td>
            <td><?php echo isset($row->fecha_transferencia) ? $row->fecha_transferencia : ''; ?></td>
            <td align="right"><?php echo $row->monto_apagar; ?></td>
            <td align="right"><?php echo $row->monto_depositado; ?></td>
            <td><?php echo isset($row->trabajo) ? $row->trabajo : ''; ?></td>
            <td><?php echo isset($row->postgrados) ? $row->postgrados : ''; ?></td>
           
            <td><?php echo isset($row->uc) ? $row->uc: ''; ?></td>
         
         
        </tr>
        <?php 
            endforeach; 
        else: 
        ?>
        <tr>
            <td colspan="19" align="center">No hay registros para mostrar</td>
        </tr>
        <?php endif; ?>
        
        <!-- Fila de totales -->
        <tr bgcolor="#999999">
            <th colspan="11" style="color:#FFFFFF; font-weight:bold; text-align:right;">TOTALES</th>
            <td style="color:#FFFFFF; font-weight:bold; text-align:right;"><?php echo number_format($total_monto_pagar, 2, ',', '.'); ?></td>
            <td style="color:#FFFFFF; font-weight:bold; text-align:right;"><?php echo number_format($total_monto_depositado, 2, ',', '.'); ?></td>
            <td style="color:#FFFFFF; font-weight:bold;">&nbsp;</td>
            <td style="color:#FFFFFF; font-weight:bold;">&nbsp;</td>
            <td style="color:#FFFFFF; font-weight:bold;">&nbsp;</td>
        </tr>
        
        <!-- Fila de cantidad de registros y total UC -->
        <tr bgcolor="#999999">
            <th colspan="15" style="color:#FFFFFF; font-weight:bold; text-align:right;">TOTAL REGISTROS: <?php echo $i; ?></th>
            <td style="color:#FFFFFF; font-weight:bold;">&nbsp;</td>
            <td style="color:#FFFFFF; font-weight:bold; text-align:center;">Total U.C.: <?php echo $total_uc_general; ?></td>
            <td style="color:#FFFFFF; font-weight:bold;">&nbsp;</td>
        </tr>
    </table>
  <table>
    <tr>
    <td colspan="<?php // Calcula el número de columnas de tu tabla ?>" style="background-color: #f2f2f2; font-weight: bold; border-top: 2px solid #000;">
        <strong>RESUMEN GENERAL</strong>
    </td>
</tr>
<tr>
    <td colspan="2" style="font-weight: bold; background-color: #e6f3ff;">Total de Cédulas Inscritas:</td>
    <td style="font-weight: bold; background-color: #e6f3ff;"><?php echo number_format($estadisticas->total_cedulas, 0, ',', '.'); ?></td>
    <td colspan="<?php // Ajusta el resto de columnas vacías ?>" style="background-color: #e6f3ff;"></td>
</tr>
<tr>
    <td colspan="<?php // Calcula el número de columnas de tu tabla ?>" style="background-color: #f2f2f2; font-weight: bold;">
        <strong>Estudiantes por Especialización</strong>
    </td>
</tr>
<?php if(!empty($estadisticas->especializaciones)): ?>
    <?php foreach($estadisticas->especializaciones as $espec): ?>
        <tr>
            <td colspan="2" style="padding-left: 20px;"><?php echo $espec->especializacion; ?>:</td>
            <td style="font-weight: bold;"><?php echo number_format($espec->total_estudiantes, 0, ',', '.'); ?></td>
            <td colspan="<?php // Ajusta el resto de columnas vacías ?>" style="background-color: #e6f3ff;"></td>
        </tr>
    <?php endforeach; ?>
    <tr>
        <td colspan="2" style="font-weight: bold; background-color: #d4edda;">TOTAL INSCRIPCIONES:</td>
        <td style="font-weight: bold; background-color: #d4edda;">
            <?php 
                $total_estudiantes = 0;
                foreach($estadisticas->especializaciones as $espec) {
                    $total_estudiantes += $espec->total_estudiantes;
                }
                echo number_format($total_estudiantes, 0, ',', '.');
            ?>
        </td>
        <td colspan="<?php // Ajusta el resto de columnas vacías ?>" style="background-color: #d4edda;"></td>
    </tr>
<?php else: ?>
    <tr>
        <td colspan="4" style="font-style: italic; color: #666;">No hay datos de especializaciones</td>
    </tr>
<?php endif; ?>
    </table>
    <!-- Pie de página -->
    <table border="0" cellpadding="5" cellspacing="0" align="center" width="100%">
        <tr>
            <td colspan="19">&nbsp;</td>
        </tr>
        <tr>
            <td colspan="19" align="center">Reporte generado el: <?php echo date('d/m/Y H:i:s'); ?></td>
        </tr>
    </table>
    
</body>
</html>
<?php exit; ?>
