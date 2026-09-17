<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <section class="content">
        <div class="card card-primary card-outline">
            <div class="card-body">
                <style>
                    @page {
                        margin-top: 0.5cm;
                        margin-bottom: 0.5cm;
                        margin-left: 0.5cm;
                        margin-right: 0.5cm;
                    }
                    table {
                        border-collapse: collapse;
                        font-style: normal;
                        font-weight: normal;
                        font-size: 10px;
                        width: 100%;
                    }
                    .header-title {
                        font-size: 10px;
                        font-weight: bold;
                        text-align: center;
                    }
                    .section-title {
                        background-color: #D0E0F4;
                        color: #1060C8;
                        font-weight: bold;
                        text-align: center;
                    }
                    .section-title-gray {
                        background-color: #999999;
                        color: #FFFFFF;
                        font-weight: bold;
                        text-align: center;
                    }
                    .label-cell {
                        font-weight: bold;
                        background-color: #f0f0f0;
                    }
                    .border-all {
                        border: 1px solid #000;
                    }
                    .text-center {
                        text-align: center;
                    }
                    .text-right {
                        text-align: right;
                    }
                    .text-left {
                        text-align: left;
                    }
                    .small-text {
                        font-size: 8px;
                    }
                    .uc-cell {
                        text-align: center;
                        font-weight: bold;
                    }
                    .checkbox-cell {
                        text-align: center;
                        font-size: 14px;
                    }
                    .fila-vacia {
                        height: 20px;
                    }
                    .total-row {
                        background-color: #f0f0f0;
                        font-weight: bold;
                    }
                    .badge-ruc {
                        background-color: #1060C8;
                        color: white;
                        padding: 2px 8px;
                        border-radius: 3px;
                        font-size: 9px;
                        font-weight: bold;
                    }
                </style>

                <form action="<?php echo base_url(); ?>planilla/descargar/<?php echo $this->uri->segment(3); ?>/<?php echo $this->uri->segment(4); ?>" method="POST">

                    <!-- ============================================================ -->
                    <!-- ENCABEZADO: LOGOS + TÍTULO PRINCIPAL                          -->
                    <!-- ============================================================ -->
                    <table width="100%" align="center" border="0" cellpadding="2" cellspacing="1">
                        <tr>
                            <td width="15%" align="left">
                                <img src="<?php echo base_url(); ?>assets/img/logo1.png" style="width: 15mm; height: 15mm;" />
                            </td>
                            <td width="70%" align="center">
                                <div style="font-size: 11px; font-weight: bold; line-height: 1.3;">
                                    REPÚBLICA BOLIVARIANA DE VENEZUELA<br>
                                    MINISTERIO PÚBLICO<br>
                                    ESCUELA NACIONAL DE FISCALES DEL MINISTERIO PÚBLICO
                                </div>
                                <div style="font-size: 13px; font-weight: bold; margin-top: 5px;">
                                    SOLICITUD DE RECONOCIMIENTO DE UNIDADES CRÉDITO
                                  
                                </div>
                            </td>
                            <td width="15%" align="right">
                                <img src="/control_estudio/assets/img/logo2.png" style="width: 15mm; height: 15mm;" />
                            </td>
                        </tr>
                    </table>

                    <!-- ============================================================ -->
                    <!-- SECCIÓN: DATOS GENERALES                                      -->
                    <!-- ============================================================ -->
                    <table width="100%" align="center" border="1" cellpadding="2" cellspacing="0" style="margin-top: 5px;">
                        <tr>
                            <th colspan="8" class="section-title">DATOS GENERALES</th>
                        </tr>
                        <tr>
                            <td class="label-cell" width="12%">SOLICITANTE</td>
                            <td width="38%" colspan="3">
                                <?php 
                                    echo trim($datos_alumnos->nombre_primer) . ' ' . 
                                         trim($datos_alumnos->nombre_segundo) . ' ' . 
                                         trim($datos_alumnos->apellido_primer) . ' ' . 
                                         trim($datos_alumnos->apellido_segundo); 
                                ?>
                            </td>
                            <td class="label-cell" width="12%">N° IDENTIDAD</td>
                            <td width="15%"><?php echo $datos_alumnos->cedula; ?></td>
                            <td class="label-cell" width="10%">GÉNERO</td>
                            <td width="13%"><?php echo ($datos_alumnos->id_sexo == 2) ? 'Femenino' : 'Masculino'; ?></td>
                        </tr>
                        <tr>
                            <td class="label-cell">PROGRAMA ACTUAL</td>
                            <td colspan="3">
                                <?php 
                                    if(isset($solicitud) && !empty($solicitud)) {
                                        echo isset($solicitud->programa) ? strtoupper($solicitud->programa) : 'FALTA ESPECIALIZACIÓN A CURSAR';
                                    } else {
                                        echo 'FALTA ESPECIALIZACIÓN  A CURSAR';
                                    }
                                ?>
                            </td>
                            <td class="label-cell">TELÉFONO</td>
                            <td><?php echo $datos_alumnos->tel_celular; ?></td>
                            <td class="label-cell">E-MAIL</td>
                            <td><?php echo $datos_alumnos->correo; ?></td>
                        </tr>
                        <tr>
                            <td class="label-cell">PROGRAMA CURSADO</td>
                            <td colspan="3">
                                <?php 
                                    if(isset($programaCursado) && !empty($programaCursado)) {
                                        echo isset($programaCursado->nombre) ? strtoupper($programaCursado->nombre) : 'FALTA ESPECIALIZACIÓN CURSADA';
                                    } else {
                                        echo 'FALTA ESPECIALIZACIÓN CURSADA';
                                    }
                                ?>
                            </td>
                            <td class="label-cell" colspan="4"></td>
                            
                        </tr>
                        <tr>
                            <td class="label-cell">INSTITUCIÓN DE ORIGEN</td>
                            <td colspan="3"> <?php 
                                    if(isset($solicitud) && !empty($solicitud)) {
                                        echo isset($solicitud->institucion_origen) ? strtoupper($solicitud->institucion_origen) : 'FALTA INSTITUCIÓN ORIGEN';
                                    } else {
                                        echo 'FALTA INSTITUCIÓN ORIGEN';
                                    }
                                ?></td>
                            <td class="label-cell">FECHA SOLICITUD</td>
                            <td colspan="3">
                                <?php 
                                    if(isset($solicitud) && !empty($solicitud)) {
                                        echo date('d/m/Y', strtotime($solicitud->fecha_registro));
                                    } else {
                                        echo date('d/m/Y');
                                    }
                                ?>
                            </td>
                        </tr>
                    </table>

                    <!-- ============================================================ -->
                    <!-- SECCIÓN: RECONOCIMIENTO SOLICITADO (RUC)                      -->
                    <!-- ============================================================ -->
                    <table width="100%" align="center" border="1" cellpadding="2" cellspacing="0" style="margin-top: 5px;">
                        <tr>
                            <th colspan="5" class="section-title">RECONOCIMIENTO SOLICITADO</th>
                        </tr>
                        <tr>
                            <th width="35%" class="text-center">UNIDADES CURRICULARES SOLICITADAS (PROGRAMA ACTUAL)</th>
                            <th width="10%" class="text-center">UC</th>
                            <th width="10%" class="text-center">TRIMESTRE</th>
                            <th width="35%" class="text-center">CONVALIDAR POR (PROGRAMA CURSADO)</th>
                            <th width="10%" class="text-center">UC</th>
                        </tr>
                        <?php 
                            // Determinar cuántas filas mostrar (máximo entre ambos arrays)
                            $total_cursa = isset($unidades_cursa) ? count($unidades_cursa) : 0;
                            $total_cursadas = isset($unidades_cursadas) ? count($unidades_cursadas) : 0;
                            $max_filas = max($total_cursa, $total_cursadas, 4); // Mínimo 4 filas
                            
                            $total_uc_cursa = 0;
                            $total_uc_cursadas = 0;
                            
                            // Calcular totales
                            if(isset($unidades_cursa) && !empty($unidades_cursa)) {
                                foreach($unidades_cursa as $uc) {
                                    $total_uc_cursa += $uc->creditos;
                                }
                            }
                            if(isset($unidades_cursadas) && !empty($unidades_cursadas)) {
                                foreach($unidades_cursadas as $uc) {
                                    $total_uc_cursadas += $uc->creditos;
                                }
                            }
                            
                            for ($i = 0; $i < $max_filas; $i++):
                                $cursa = isset($unidades_cursa[$i]) ? $unidades_cursa[$i] : null;
                                $cursadas = isset($unidades_cursadas[$i]) ? $unidades_cursadas[$i] : null;
                        ?>
                        <tr>
                            <td>
                                <?php 
                                    if($cursa) {
                                        echo $cursa->codigo . ' - ' . $cursa->nombre_unidad;
                                    } else {
                                        echo '&nbsp;';
                                    }
                                ?>
                            </td>
                            <td class="text-center">
                                <?php echo $cursa ? $cursa->creditos : '&nbsp;'; ?>
                            </td>
                            <td class="text-center">
                                <?php echo $cursa ? $cursa->trimestre : '&nbsp;'; ?>
                            </td>
                            <td>
                                <?php 
                                    if($cursadas) {
                                        echo $cursadas->codigo . ' - ' . $cursadas->nombre_unidad;
                                    } else {
                                        echo '&nbsp;';
                                    }
                                ?>
                            </td>
                            <td class="text-center">
                                <?php echo $cursadas ? $cursadas->creditos : '&nbsp;'; ?>
                            </td>
                        </tr>
                        <?php endfor; ?>
                        
                        <!-- Fila de totales -->
                        <tr class="total-row">
                            <td class="text-right">TOTAL UC PROGRAMA ACTUAL:</td>
                            <td class="text-center"><?php echo $total_uc_cursa; ?></td>
                            <td></td>
                            <td class="text-right">TOTAL UC A CONVALIDAR:</td>
                            <td class="text-center"><?php echo $total_uc_cursadas; ?></td>
                        </tr>
                    </table>

                  

                    <!-- ============================================================ -->
                    <!-- SECCIÓN: DATOS LABORALES                                      -->
                    <!-- ============================================================ -->
                    <table width="100%" align="center" border="1" cellpadding="2" cellspacing="0" style="margin-top: 5px;">
                        <tr>
                            <th colspan="6" class="section-title-gray">DATOS LABORALES</th>
                        </tr>
                        <tr>
                            <td class="label-cell" width="15%">ORGANISMO O INSTITUCIÓN</td>
                            <td width="25%"><?php echo isset($datos_trabajo->lugar_trabajo) ? $datos_trabajo->lugar_trabajo : 'MINISTERIO PÚBLICO'; ?></td>
                            <td class="label-cell" width="12%">CARGO</td>
                            <td width="20%"><?php echo isset($datos_trabajo->cargo) ? $datos_trabajo->cargo : ''; ?></td>
                            <td class="label-cell" width="15%">TELÉFONO OFICINA</td>
                            <td width="13%"><?php echo isset($datos_trabajo->tel_trabajo) ? $datos_trabajo->tel_trabajo : ''; ?></td>
                        </tr>
                        <tr>
                            <td class="label-cell">DIRECCIÓN DE ADSCRIPCIÓN</td>
                            <td colspan="2">
                                <?php 
                                    if(isset($solicitud) && !empty($solicitud)) {
                                        echo isset($solicitud->direccion_adscripcion) ? $solicitud->direccion_adscripcion : '';
                                    }
                                ?>
                            </td>
                            <td class="label-cell">CIRCUNSCRIPCIÓN</td>
                            <td colspan="2">
                                <?php 
                                    if (!empty($circunscripcion)) {
                                        foreach ($circunscripcion as $circ) {
                                            echo $circ->estado;
                                        }
                                    } else if(isset($solicitud) && !empty($solicitud) && isset($solicitud->circunscripcion)) {
                                        echo $solicitud->circunscripcion;
                                    } else {
                                        echo 'Distrito Capital';
                                    }
                                ?>
                            </td>
                        </tr>
                    </table>

                    <!-- ============================================================ -->
                    <!-- SECCIÓN: DIRECCIÓN DE GESTIÓN ADMINISTRATIVA                 -->
                    <!-- ============================================================ -->
                    <table width="100%" align="center" border="1" cellpadding="2" cellspacing="0" style="margin-top: 5px;">
                        <tr>
                            <th colspan="8" class="section-title">DIRECCIÓN DE GESTIÓN ADMINISTRATIVA</th>
                        </tr>
                        <tr>
                            <td class="label-cell" width="10%">APELLIDOS</td>
                            <td width="20%">
                                <?php echo trim($datos_alumnos->apellido_primer) . ' ' . trim($datos_alumnos->apellido_segundo); ?>
                            </td>
                            <td class="label-cell" width="10%">NOMBRES</td>
                            <td width="20%">
                                <?php echo trim($datos_alumnos->nombre_primer) . ' ' . trim($datos_alumnos->nombre_segundo); ?>
                            </td>
                            <td class="label-cell" width="10%">CÉDULA N°</td>
                            <td width="10%"><?php echo $datos_alumnos->cedula; ?></td>
                            <td class="label-cell" width="10%">CORREO</td>
                            <td width="10%"><?php echo $datos_alumnos->correo; ?></td>
                        </tr>
                        <tr>
                            <td class="label-cell">TELÉFONOS</td>
                            <td colspan="3">
                                <?php 
                                    echo 'HAB: ' . $datos_alumnos->tel_habitacion . ' | CEL: ' . $datos_alumnos->tel_celular;
                                ?>
                            </td>
                            <td class="label-cell">ESPECIALIZACIÓN</td>
                            <td colspan="3" class="text-center">
                                <?php 
                                    if(isset($solicitud) && !empty($solicitud)) {
                                        echo isset($solicitud->programa) ? strtoupper($solicitud->programa) : 'ESPECIALIZACIÓN EN EJERCICIO DE LA FUNCIÓN FISCAL';
                                    } else {
                                        echo 'ESPECIALIZACIÓN EN EJERCICIO DE LA FUNCIÓN FISCAL';
                                    }
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td class="label-cell">N° UC</td>
                            <td class="text-center">
                                <?php 
                                    if(isset($solicitud) && !empty($solicitud) && isset($solicitud->uc)) {
                                        printf('%02d', $solicitud->uc);
                                    } else if(isset($total_uc_cursadas) && $total_uc_cursadas > 0) {
                                        printf('%02d', $total_uc_cursadas);
                                    } else {
                                        echo '00';
                                    }
                                ?>
                            </td>
                            <td class="label-cell">TRIMESTRE</td>
                            <td class="text-center">
                                <?php 
                                    if(isset($solicitud) && !empty($solicitud) && isset($solicitud->trimestre)) {
                                        echo $solicitud->trimestre;
                                    } else {
                                        echo isset($trimestre_c) ? $trimestre_c : '';
                                    }
                                ?>
                            </td>
                            <td class="label-cell">TIPO RECONOCIMIENTO</td>
                            <td colspan="3" class="text-center">
                                <?php 
                                    if(isset($tipo_reconocimiento) && !empty($tipo_reconocimiento) && isset($tipo_reconocimiento->id)) {
                                        echo strtoupper($tipo_reconocimiento->nombre);
                                    } else {
                                        echo 'REVISAR TIPO DE RECONOCIMIENTO RUC';
                                    }
                                ?>
                            </td>
                        </tr>
                    </table>

                    <!-- ============================================================ -->
                    <!-- SECCIÓN: DATOS DEL PAGO                                       -->
                    <!-- ============================================================ -->
                    <table width="100%" align="center" border="1" cellpadding="2" cellspacing="0" style="margin-top: 5px;">
                        <tr>
                            <th colspan="7" class="section-title">DATOS DEL PAGO DE ARANCEL DE INSCRIPCIÓN</th>
                        </tr>
                        <tr>
                            <th class="text-center" width="10%">FORMA DE PAGO</th>
                            <th class="text-center" width="12%">NÚMERO DE TRANSFERENCIA</th>
                            <th class="text-center" width="15%">BANCO ORIGEN</th>
                            <th class="text-center" width="15%">BANCO DESTINO</th>
                            <th class="text-center" width="15%">FECHA TRANSFERENCIA</th>
                            <th class="text-center" width="12%">MONTO DE PAGO</th>
                            <th class="text-center" width="8%">APROBADO</th>
                        </tr>
                        <?php if (!empty($registro_pago)): ?>
                            <?php foreach ($registro_pago as $pago): ?>
                                <tr>
                                    <td class="text-center"><?php echo ($pago->nro_referencia != '') ? 'TRANSFERENCIA' : ''; ?></td>
                                    <td class="text-center"><?php echo $pago->nro_referencia; ?></td>
                                    <td><?php echo $pago->nombre; ?></td>
                                    <td><?php echo $pago->nombre; ?></td>
                                    <td class="text-center"><?php echo date('d/m/Y', strtotime($pago->fecha_transferencia)); ?></td>
                                    <td class="text-right"><?php echo number_format($pago->monto_depositado, 2, ',', '.'); ?></td>
                                    <td class="text-center"><?php echo ($pago->conciliado == 1) ? 'SI' : 'NO'; ?></td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td class="text-center">TRANSFERENCIA</td>
                                <td class="text-center">00000000</td>
                                <td>Banco de Venezuela</td>
                                <td>Banco de Venezuela</td>
                                <td class="text-center"><?php echo date('d/m/Y'); ?></td>
                                <td class="text-right">0,00</td>
                                <td class="text-center">NO</td>
                            </tr>
                        <?php endif; ?>
                        <tr>
                            <th colspan="5" class="text-right section-title">MONTO TOTAL DE PAGO ------></th>
                            <th class="text-right">
                                <?php 
                                    $total_pago = 0;
                                    if (!empty($registro_pago)) {
                                        foreach ($registro_pago as $pago) {
                                            $total_pago += $pago->monto_depositado;
                                        }
                                    }
                                    echo number_format($total_pago, 2, ',', '.');
                                ?>
                            </th>
                            <th></th>
                        </tr>
                    </table>

                    <!-- ============================================================ -->
                    <!-- SECCIÓN: FIRMAS                                               -->
                    <!-- ============================================================ -->
                    <table width="100%" align="center" border="1" cellpadding="2" cellspacing="0" style="margin-top: 5px;">
                        <tr>
                            <th colspan="6" class="section-title">FIRMA DEL ESTUDIANTE</th>
                            <th colspan="6" class="section-title">DIRECCIÓN DE SECRETARÍA GENERAL</th>
                        </tr>
                        <tr>
                            <td colspan="6" height="80" valign="bottom">
                                <b>Fecha de Emisión Planilla: </b>
                                <?php 
                                    if(isset($registro_pago) && !empty($registro_pago)) {
                                        echo date('d/m/Y h:i:s', strtotime($registro_pago[0]->dregistro));
                                    } else {
                                        echo date('d/m/Y h:i:s');
                                    }
                                ?>
                            </td>
                            <td colspan="6" height="80">
                                <div class="text-center">
                                    Fecha: ___/___/_____<br><br>
                                    Nombre(s) y Apellido(s) del Funcionario(a):<br>
                                    ____________________________________<br><br>
                                    SELLO
                                </div>
                            </td>
                        </tr>
                    </table>

                    <!-- ============================================================ -->
                    <!-- PROCESADO POR / REVISADO POR                                 -->
                    <!-- ============================================================ -->
                    <table width="100%" align="center" border="1" cellpadding="2" cellspacing="0" style="margin-top: 5px;">
                        <tr>
                            <td width="50%" class="text-center" style="padding: 8px;">
                                <b>PROCESADO POR:</b><br><br>
                                <?php 
                                    if(isset($solicitud) && !empty($solicitud) && isset($solicitud->procesado_por)) {
                                        echo $solicitud->procesado_por;
                                    } else {
                                        echo '___________________';
                                    }
                                ?>
                            </td>
                            <td width="50%" class="text-center" style="padding: 8px;">
                                <b>REVISADO POR:</b><br><br>
                                <?php 
                                    if(isset($solicitud) && !empty($solicitud) && isset($solicitud->revisado_por)) {
                                        echo $solicitud->revisado_por;
                                    } else {
                                        echo '___________________';
                                    }
                                ?>
                            </td>
                        </tr>
                    </table>

                    <!-- NOTA FINAL -->
                    <p align="center" style="font-size: 7px; margin-top: 6px;">
                        <b>NOTA: ESTA PLANILLA DEBE SER CONSIGNADA EN EL ENFMP EN DOS (02) EJEMPLARES.</b>
                    </p>

                    <p align="center">
                        <a href="<?php echo base_url(); ?>dashboard09/descargar/<?php echo $this->uri->segment(3); ?>/<?php echo $this->uri->segment(4); ?>" target="_blank" title="Haz clic para Imprimir/Descargar la Planilla" class="btn btn-info">
                            Descargar
                        </a>
                    </p>

                </form>
            </div><!-- /.card-body -->
        </div><!-- /.card -->
    </section><!-- /.section -->
</div><!-- /.content-wrapper -->
