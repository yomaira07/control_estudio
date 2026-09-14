<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <section class="content">
        <div class="card card-primary card-outline">
            <div class="card-body">
                <style>
                    /* Estilos para impresión y PDF */
                    @page {
                        margin-top: 0.8cm;
                        margin-bottom: 0.8cm;
                        margin-left: 0.8cm;
                        margin-right: 0.8cm;
                    }
                    
                    * {
                        font-family: 'Arial', 'Helvetica', sans-serif;
                    }
                    
                    body {
                        background: #fff;
                        color: #333;
                    }
                    
                    table {
                        border-collapse: collapse;
                        font-size: 10px;
                        width: 100%;
                    }
                    
                    .header-table {
                        border: none;
                        margin-bottom: 5px;
                    }
                    
                    .header-table th {
                        font-size: 11px;
                        color: #1a3c6e;
                    }
                    
                    .section-title {
                        background: #1a3c6e !important;
                        color: #ffffff !important;
                        font-weight: bold;
                        text-align: center;
                        padding: 6px;
                        font-size: 11px;
                        text-transform: uppercase;
                        letter-spacing: 0.5px;
                    }
                    
                    .section-title-light {
                        background: #d0e0f4 !important;
                        color: #1a3c6e !important;
                        font-weight: bold;
                        text-align: center;
                        padding: 6px;
                        font-size: 11px;
                        text-transform: uppercase;
                    }
                    
                    .label-cell {
                        background: #f5f7fa;
                        font-weight: 600;
                        color: #1a3c6e;
                        padding: 4px 6px;
                        font-size: 9px;
                    }
                    
                    .data-cell {
                        padding: 4px 6px;
                        font-size: 9px;
                        color: #333;
                    }
                    
                    .table-bordered {
                        border: 1px solid #ccc;
                    }
                    
                    .table-bordered th,
                    .table-bordered td {
                        border: 1px solid #ccc;
                        padding: 4px 6px;
                    }
                    
                    .total-row {
                        background: #d0e0f4 !important;
                        font-weight: bold;
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
                    
                    .badge-success {
                        color: #28a745;
                        font-weight: bold;
                    }
                    
                    .badge-warning {
                        color: #856404;
                        font-weight: bold;
                    }
                    
                    .badge-danger {
                        color: #dc3545;
                        font-weight: bold;
                    }
                    
                    .logo-img {
                        width: 14mm;
                        height: 14mm;
                        object-fit: contain;
                    }
                    
                    .main-title {
                        font-size: 12px;
                        font-weight: bold;
                        color: #1a3c6e;
                        text-align: center;
                        line-height: 1.4;
                    }
                    
                    .sub-title {
                        font-size: 10px;
                        font-weight: normal;
                        color: #555;
                    }
                    
                    .note-box {
                        background: #fff9e6;
                        border: 1px solid #d4a843;
                        border-left: 4px solid #d4a843;
                        padding: 8px 10px;
                        font-size: 9px;
                        border-radius: 4px;
                        margin: 5px 0;
                    }
                    
                    .signature-box {
                        padding: 20px 10px;
                        text-align: center;
                        min-height: 80px;
                    }
                    
                    .signature-line {
                        border-top: 1px solid #333;
                        width: 80%;
                        margin: 25px auto 5px auto;
                    }
                    
                    .btn-download {
                        border-radius: 25px;
                        padding: 12px 50px;
                        font-weight: 600;
                        background: #1a3c6e;
                        color: #fff;
                        border: none;
                        transition: all 0.3s;
                        text-decoration: none;
                        display: inline-block;
                    }
                    
                    .btn-download:hover {
                        background: #0f2a4a;
                        transform: translateY(-2px);
                        box-shadow: 0 4px 12px rgba(26, 60, 110, 0.3);
                    }
                    
                    /* Estilos para impresión */
                    @media print {
                        .btn-download {
                            display: none !important;
                        }
                        .card {
                            border: none !important;
                            box-shadow: none !important;
                        }
                        .card-body {
                            padding: 0 !important;
                        }
                        body {
                            background: #fff !important;
                        }
                        .no-print {
                            display: none !important;
                        }
                    }
                </style>

                <form action="<?php echo base_url();?>consultas/descargar_pla_pre_asp/<?php echo $this->uri->segment(3).'/'.$this->uri->segment(4).'/'.$this->uri->segment(5);?>" method="POST" target="_blank">
                    
                    <!-- ENCABEZADO -->
                    <table width="100%" class="header-table" cellPadding="3">
                        <tr>
                            <td width="15%" style="text-align: left;">
                                <img src="<?php echo base_url(); ?>assets/img/logo1.png" class="logo-img" />
                            </td>
                            <td width="70%" style="text-align: center;">
                                <div style="font-size: 13px; font-weight: bold; color: #1a3c6e; line-height: 1.4;">
                                    ESCUELA NACIONAL DE FISCALES<br>
                                    DEL MINISTERIO PÚBLICO
                                </div>
                                <div style="font-size: 10px; color: #555;">
                                    DIRECCIÓN DE SECRETARÍA GENERAL
                                </div>
                            </td>
                            <td width="15%" style="text-align: right;">
                                <img src="/control_estudio/assets/img/logo2.png" class="logo-img" />
                            </td>
                        </tr>
                    </table>

                    <!-- TÍTULO PRINCIPAL -->
                    <table width="100%" cellPadding="4" style="margin: 3px 0;">
                        <tr>
                            <td style="background: #d0e0f4; border-radius: 4px; text-align: center; padding: 8px;">
                                <div style="font-size: 12px; font-weight: bold; color: #1a3c6e;">
                                    PLANILLA DE REGISTRO DE ASPIRANTES
                                </div>
                                <div style="font-size: 11px; color: #1a3c6e; font-weight: 600;">
                                    A CURSAR PROGRAMAS DE POSTGRADO EN LA ENFMP
                                </div>
                                <div style="font-size: 10px; color: #1a3c6e; margin-top: 3px;">
                                    <?php echo $especializacion->nombre; ?> - AÑO <?php echo date("Y"); ?> - SEDE: DISTRITO CAPITAL
                                </div>
                            </td>
                            <td width="12%" style="text-align: center;">
                                <img src="<?php echo base_url(); ?>assets/fotos/<?php echo $datos_alumnos->id_usuario;?>_foto.jpg" 
                                     style="width: 14mm; height: 14mm; border: 2px solid #1a3c6e; border-radius: 4px; object-fit: cover;" />
                            </td>
                        </tr>
                    </table>

                    <!-- DATOS PERSONALES -->
                    <table class="table-bordered" cellPadding="3">
                        <tr>
                            <th colspan="8" class="section-title">DATOS PERSONALES</th>
                        </tr>
                        <tr>
                            <td class="label-cell" width="10%">APELLIDOS</td>
                            <td class="data-cell" width="18%"><?php echo trim($datos_alumnos->apellido_primer) . ' ' . trim($datos_alumnos->apellido_segundo); ?></td>
                            <td class="label-cell" width="10%">NOMBRES</td>
                            <td class="data-cell" width="18%"><?php echo trim($datos_alumnos->nombre_primer) . ' ' . trim($datos_alumnos->nombre_segundo); ?></td>
                            <td class="label-cell" width="8%">CÉDULA N°</td>
                            <td class="data-cell" width="10%"><?php echo $datos_alumnos->cedula; ?></td>
                            <td class="label-cell" width="10%">CORREO</td>
                            <td class="data-cell" width="16%"><?php echo $datos_alumnos->correo; ?></td>
                        </tr>
                        <tr>
                            <td class="label-cell">GÉNERO</td>
                            <td class="data-cell"><?php echo ($datos_alumnos->id_sexo == 2) ? 'Femenino' : 'Masculino'; ?></td>
                            <td class="label-cell">TELÉFONOS</td>
                            <td class="data-cell" colspan="2">
                                <?php if(!empty($telefono_hab)):
                                    foreach($telefono_hab as $telefono_hab):
                                        echo $telefono_hab->descripcion . '-' . $datos_alumnos->tel_habitacion . ' | ';
                                    endforeach;
                                endif; ?>
                                <?php if(!empty($telefono_cel)):
                                    foreach($telefono_cel as $telefono_cel):
                                        echo $telefono_cel->descripcion . '-' . $datos_alumnos->tel_celular;
                                    endforeach;
                                endif; ?>
                            </td>
                            <td class="label-cell">DOMICILIADO EN</td>
                            <td class="data-cell" colspan="2">
                                <?php if(!empty($direccion)):
                                    foreach($direccion as $direccion):
                                        echo $direccion->estado;
                                    endforeach;
                                endif; ?>
                            </td>
                        </tr>
                    </table>

                    <!-- DATOS LABORALES -->
                    <table class="table-bordered" cellPadding="3" style="margin-top: 2px;">
                        <tr>
                            <th colspan="8" class="section-title">DATOS LABORALES</th>
                        </tr>
                        <tr>
                            <td class="label-cell" width="15%">ORGANISMO</td>
                            <td class="data-cell" width="20%"><?php echo $trabajo->lugar_trabajo; ?></td>
                            <td class="label-cell" width="10%">CARGO</td>
                            <td class="data-cell" width="18%"><?php echo $datos_trabajo->cargo; ?></td>
                            <td class="label-cell" width="15%">ADSCRIPCIÓN (MP)</td>
                            <td class="data-cell" width="10%">&nbsp;</td>
                            <td class="label-cell" width="12%">TEL. OFICINA</td>
                            <td class="data-cell" width="10%"><?php echo $datos_trabajo->tel_trabajo; ?></td>
                        </tr>
                        <tr>
                            <td class="label-cell">CIRCUNSCRIPCIÓN</td>
                            <td class="data-cell" colspan="7">
                                <?php if(!empty($circunscripcion)):
                                    foreach($circunscripcion as $circunscripcion):
                                        echo $circunscripcion->estado;
                                    endforeach;
                                endif; ?>
                            </td>
                        </tr>
                    </table>

                    <!-- DATOS ADMINISTRATIVOS -->
                    <table class="table-bordered" cellPadding="3" style="margin-top: 2px;">
                        <tr>
                            <th colspan="8" class="section-title-light">DIRECCIÓN DE GESTIÓN ADMINISTRATIVA</th>
                        </tr>
                        <tr>
                            <td class="label-cell" width="10%">APELLIDOS</td>
                            <td class="data-cell" width="18%"><?php echo trim($datos_alumnos->apellido_primer) . ' ' . trim($datos_alumnos->apellido_segundo); ?></td>
                            <td class="label-cell" width="10%">NOMBRES</td>
                            <td class="data-cell" width="18%"><?php echo trim($datos_alumnos->nombre_primer) . ' ' . trim($datos_alumnos->nombre_segundo); ?></td>
                            <td class="label-cell" width="10%">CÉDULA</td>
                            <td class="data-cell" width="10%"><?php echo $datos_alumnos->cedula; ?></td>
                            <td class="label-cell" width="10%">CORREO</td>
                            <td class="data-cell" width="14%"><?php echo $datos_alumnos->correo; ?></td>
                        </tr>
                        <tr>
                            <td class="label-cell">TELÉFONOS</td>
                            <td class="data-cell" colspan="3">
                                <?php if(!empty($telefono_hab)):
                                    foreach($telefono_hab as $telefono_hab):
                                        echo $telefono_hab->descripcion . '-' . $datos_alumnos->tel_habitacion . ' | ';
                                    endforeach;
                                endif; ?>
                                <?php if(!empty($telefono_cel)):
                                    foreach($telefono_cel as $telefono_cel):
                                        echo $telefono_cel->descripcion . '-' . $datos_alumnos->tel_celular;
                                    endforeach;
                                endif; ?>
                            </td>
                            <td class="label-cell">ESPECIALIZACIÓN</td>
                            <td class="data-cell" colspan="3" style="text-align: center; font-weight: bold; color: #1a3c6e;">
                                <?php echo $especializacion->nombre; ?>
                            </td>
                        </tr>
                    </table>

                    <!-- DATOS DE PAGO -->
                    <table class="table-bordered" cellPadding="3" style="margin-top: 2px;">
                        <tr>
                            <th colspan="7" class="section-title-light">DATOS DEL PAGO DE ARANCEL DE INSCRIPCIÓN</th>
                        </tr>
                        <tr style="background: #e8ecf1;">
                            <th class="label-cell text-center" width="12%">FORMA DE PAGO</th>
                            <th class="label-cell text-center" width="15%">NÚMERO DE TRANSFERENCIA</th>
                            <th class="label-cell text-center" width="15%">BANCO ORIGEN</th>
                            <th class="label-cell text-center" width="15%">BANCO DESTINO</th>
                            <th class="label-cell text-center" width="15%">FECHA TRANSFERENCIA</th>
                            <th class="label-cell text-center" width="15%">MONTO DE PAGO</th>
                            <th class="label-cell text-center" width="13%">APROBADO</th>
                        </tr>
                        <?php if(!empty($registro_pago)):
                            $suma_pago = 0;
                            foreach($registro_pago as $registro_pago):
                        ?>
                        <tr>
                            <td class="data-cell text-center"><?php echo ($registro_pago->nro_referencia != '') ? 'TRANSFERENCIA' : ''; ?></td>
                            <td class="data-cell text-center"><?php echo $registro_pago->nro_referencia; ?></td>
                            <td class="data-cell text-center"><?php echo $registro_pago->nombre; ?></td>
                            <td class="data-cell text-center"><?php echo $registro_pago->nombre; ?></td>
                            <td class="data-cell text-center"><?php echo date('d/m/Y', strtotime($registro_pago->fecha_transferencia)); ?></td>
                            <td class="data-cell text-right"><strong><?php echo number_format($registro_pago->monto_depositado, 2, ',', '.'); ?></strong></td>
                            <td class="data-cell text-center <?php echo ($registro_pago->conciliado == 1) ? 'badge-success' : 'badge-warning'; ?>">
                                <?php echo ($registro_pago->conciliado == 1) ? '✓ SI' : '⏳ NO'; ?>
                            </td>
                        </tr>
                        <?php 
                            $suma_pago += $registro_pago->monto_depositado;
                        endforeach; ?>
                        <?php endif; ?>
                        <tr class="total-row">
                            <th colspan="6" class="text-right" style="padding: 6px 10px; font-size: 10px;">
                                MONTO TOTAL DE PAGO &rarr;
                            </th>
                            <th class="text-center" style="padding: 6px; font-size: 11px; color: #1a3c6e;">
                                <?php echo isset($suma_pago) ? number_format($suma_pago, 2, ',', '.') : '0,00'; ?> Bs.
                            </th>
                        </tr>
                    </table>

                    <!-- NOTA EXPLICATIVA DE PAGOS -->
                    <table width="100%" cellPadding="3" style="margin-top: 3px;">
                        <tr>
                            <td>
                                <div class="note-box">
                                    <strong>📌 NOTA IMPORTANTE SOBRE LOS PAGOS:</strong><br>
                                    Los comprobantes bancarios presentados corresponden al pago del costo de la 
                                    <strong>Inscripción</strong> en los <strong>programas de postgrado </strong> 
                                    selccionados.
                                    <br>
                                    <span style="font-size: 8px; color: #666;">
                                        <i>Total cancelado: <?php echo isset($suma_pago) ? number_format($suma_pago, 2, ',', '.') : '0,00'; ?> Bs.</i>
                                    </span>
                                </div>
                            </td>
                        </tr>
                    </table>

                    <!-- FIRMAS -->
                    <table class="table-bordered" cellPadding="3" style="margin-top: 2px;">
                        <tr>
                            <th colspan="6" class="section-title-light" style="width: 50%;">FIRMA DEL ESTUDIANTE</th>
                            <th colspan="6" class="section-title-light" style="width: 50%;">DIRECCIÓN DE SECRETARÍA GENERAL</th>
                        </tr>
                        <tr>
                            <td colspan="6" style="height: 100px; vertical-align: bottom; padding: 8px;">
                                <div style="font-size: 9px; color: #999;">
                                    <em>Fecha de registro del aspirante</em>
                                </div>
                                <div style="margin-top: 15px; padding-top: 20px;">
                                    <div style="border-top: 1px solid #333; width: 60%; margin: 0 auto;"></div>
                                    <div style="text-align: center; font-size: 8px; padding-top: 3px;">
                                        Firma del Aspirante
                                    </div>
                                </div>
                            </td>
                            <td colspan="6" style="height: 100px; text-align: center; padding: 8px;">
                                <div style="font-size: 9px;">
                                    Fecha: ___/___/_____
                                    <br><br>
                                    Nombre y Apellido del Funcionario(a):
                                    <br>
                                    <div style="border-bottom: 1px solid #333; width: 70%; margin: 5px auto 2px auto;"></div>
                                    <br>
                                    <div style="border: 1px solid #666; width: 50px; height: 50px; margin: 5px auto; border-radius: 4px;">
                                        <div style="font-size: 7px; color: #999; padding-top: 18px;">SELLO</div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </table>

                    <!-- NOTA FINAL -->
                    <p style="text-align: center; font-size: 8px; color: #666; margin-top: 5px; padding: 4px; border-top: 1px solid #ccc;">
                        <strong>NOTA:</strong> ESTA PLANILLA DEBE SER CONSIGNADA EN EL ENFMP EN DOS (02) EJEMPLARES.
                    </p>

                    <!-- BOTÓN DE DESCARGA -->
                    <div style="text-align: center; margin-top: 15px;" class="no-print">
                        <a href="<?php echo base_url();?>consultas/descargar_pla_pre_asp/<?php echo $this->uri->segment(3).'/'.$this->uri->segment(4).'/'.$this->uri->segment(5);?>" 
                           target="_blank" 
                           class="btn-download">
                            <i class="fas fa-download"></i> DESCARGAR PLANILLA PDF
                        </a>
                    </div>

                </form>
            </div>
        </div>
    </section>
</div>