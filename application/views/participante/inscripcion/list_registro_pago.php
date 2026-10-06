<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" style="background: #f4f6f9;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0" style="font-weight: 300; color: #003366;">
                        <i class="fas fa-money-bill-wave" style="color: #003366; margin-right: 8px;"></i>
                        <span style="color: #003366; font-weight: 600;">SCE-ENFMP</span>
                        <span style="color: #2c3e50; font-weight: 300;"> - Registro de Pago</span>
                    </h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right" style="background: transparent;">
                        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>dashboard04/home" style="color: #6c757d;">Inicio</a></li>
                        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>dashboard04/inscripcion" style="color: #6c757d;">Inscripciones Posgrado</a></li>
                        <li class="breadcrumb-item active" style="color: #003366; font-weight: 600;">Registro de Pago</li>
                    </ol>
                     <!-- Mensaje de Alerta-->
                     <?php  if ($this->session->flashdata("error")): ?>
                            <div class="alert alert-danger alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <p><i class="icon fa fa-ban"></i> <?php echo $this->session->flashdata("error"); ?> </p>
                            </div>
                     <?php endif; ?>
                     <?php  if ($this->session->flashdata("warning")): ?>
                            <div class="alert alert-warning">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <p><i class="icon fa fa-check-square"></i> <?php echo $this->session->flashdata("warning"); ?> </p>
                            </div>
                        <?php endif; ?>
                </div>
            </div>
        </div>
    </section>

    <!-- Main content -->
    <section class="content">
        
        <!-- Card Principal -->
        <div class="card card-primary card-outline shadow-sm" style="border-radius: 10px; border-top: 4px solid #003366;">
            <div class="card-body p-0">
                <div class="card" style="border: none; border-radius: 10px;">
                    
                    <!-- Header -->
                    <div class="card-header py-3" style="border-bottom: 1px solid #e8e8e8; border-radius: 10px 10px 0 0; background: #fafafa;">
                        <div class="d-flex align-items-center justify-content-between flex-wrap">
                            <div class="d-flex align-items-center">
                                <div class="mr-3" style="width: 42px; height: 42px; background: #003366; border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                                    <i class="fas fa-file-invoice text-white" style="font-size: 1.1rem;"></i>
                                </div>
                                <div>
                                    <h5 class="mb-0" style="font-weight: 600; color: #2c3e50;">
                                        Detalle de Inscripción
                                    </h5>
                                    <small class="text-muted" style="font-size: 0.75rem;">
                                        <i class="fas fa-calendar-alt mr-1"></i>
                                        Período: <?php echo $periodo->nombre; ?>
                                    </small>
                                </div>
                            </div>
                            <div class="d-flex align-items-center flex-wrap">
                                <span class="badge" style="font-size: 0.8rem; padding: 5px 16px; border-radius: 20px; font-weight: 500; background: #003366; color: white;">
                                    <i class="fas fa-user mr-1"></i>
                                    <?php echo $datos_alumno->nombre . ' ' . $datos_alumno->apellido; ?>
                                </span>
                                <span class="badge" style="font-size: 0.7rem; padding: 5px 14px; border-radius: 20px; font-weight: 500; background: #6c757d; color: white; margin-left: 8px;">
                                    <i class="fas fa-id-card mr-1"></i>
                                    <?php echo $datos_alumno->cedula; ?>
                                </span>
                            </div>
                        </div>
                    </div>

                    <!-- Body -->
                    <div class="card-body p-4">

                        <!-- ============================================================ -->
                        <!-- CAMPOS OCULTOS GLOBALES (Fuera del foreach)                   -->
                        <!-- ============================================================ -->
                        <input type="hidden" name="id_estudiante" value="<?php echo $datos_alumno->id; ?>">
                        <input type="hidden" name="id_estado_estudio" value="<?php echo isset($estado_estudio->id_estado_inscribio) ? $estado_estudio->id_estado_inscribio : ''; ?>">
                        <input type="hidden" name="id_periodo" value="<?php echo $periodo->id; ?>">
                        <input type="hidden" name="id_usuario" value="<?php echo $this->session->userdata('id'); ?>">
                        
                        <!-- ============================================================ -->
                        <!-- Tabla de Materias                                            -->
                        <!-- ============================================================ -->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="table-responsive">
                                    <table class="table table-hover" style="border-radius: 8px; overflow: hidden;">
                                        <thead style="background: linear-gradient(135deg, #003366 0%, #1a5276 100%); color: white;">
                                            <tr>
                                                <th style="padding: 10px 15px; font-weight: 500; font-size: 0.8rem; letter-spacing: 0.5px;">
                                                    <i class="fas fa-graduation-cap mr-2"></i>Programa
                                                </th>
                                                <th style="padding: 10px 15px; text-align: center; font-weight: 500; font-size: 0.8rem; letter-spacing: 0.5px;">
                                                    <i class="fas fa-hashtag mr-1"></i>UC
                                                </th>
                                                <th style="padding: 10px 15px; font-weight: 500; font-size: 0.8rem; letter-spacing: 0.5px;">
                                                    <i class="fas fa-book mr-2"></i>Unidad Curricular
                                                </th>
                                                <th style="padding: 10px 15px; text-align: center; font-weight: 500; font-size: 0.8rem; letter-spacing: 0.5px;">
                                                    <i class="fas fa-calendar-alt mr-1"></i>Trimestre
                                                </th>
                                                <th style="padding: 10px 15px; text-align: right; font-weight: 500; font-size: 0.8rem; letter-spacing: 0.5px;">
                                                    <i class="fas fa-money-bill-wave mr-1"></i>Monto UC
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                            // ============================================================
                                            // INICIALIZAR VARIABLES (siempre, aunque no haya UC)
                                            // ============================================================
                                            $total_uc = 0;
                                            $total_ucredito_gen = 0;
                                            $valor_ucredito = 0;
                                            $programas_list = [];
                                            $nombre_programa = '';
                                            
                                            if(!empty($list_registro)): 
                                                foreach($list_registro as $registro):
                                                    // Obtener valor UC según descuento
                                                    if ($lista_trabajo->descuento > 0) {
                                                        $valor_ucredito = $registro->valorpubmp;
                                                    } else {
                                                        $valor_ucredito = $registro->valorpubgen;
                                                    }
                                                    
                                                    // Agregar programa al array
                                                    if (!in_array($registro->programa, $programas_list)) {
                                                        $programas_list[] = $registro->programa;
                                                    }
                                                    
                                                    // Sumar unidades de crédito
                                                    $total_uc += $registro->uc;
                                            ?>
                                            <tr style="border-bottom: 1px solid #f0f0f0;">
                                                <td style="padding: 10px 15px; font-size: 0.85rem; color: #2c3e50;">
                                                    <strong><?php echo $registro->programa; ?></strong>
                                                </td>
                                                <td style="padding: 10px 15px; text-align: center; font-size: 0.85rem;">
                                                    <span class="badge" style="font-size: 0.8rem; padding: 3px 12px; border-radius: 20px; background: #003366; color: white;">
                                                        <?php echo $registro->uc; ?>
                                                    </span>
                                                </td>
                                                <td style="padding: 10px 15px; font-size: 0.85rem; color: #2c3e50;">
                                                    <?php echo $registro->unidad_curricular; ?>
                                                </td>
                                                <td style="padding: 10px 15px; text-align: center; font-size: 0.85rem;">
                                                    <span class="badge" style="background: #e9ecef; color: #495057; padding: 4px 12px; border-radius: 20px; font-weight: 500; font-size: 0.75rem;">
                                                        <?php echo $registro->trimestre; ?>
                                                    </span>
                                                </td>
                                                <td style="padding: 10px 15px; text-align: right; font-size: 0.85rem; font-weight: 600; color: #28a745;">
                                                    <?php 
                                                        if($registro->tipo_programa == 3) {
                                                            $total_ucredito = 1 * $valor_ucredito;
                                                        } else {
                                                            $total_ucredito = $registro->uc * $valor_ucredito;
                                                        }
                                                        $total_ucredito_gen += $total_ucredito;
                                                        echo number_format($total_ucredito, 2, ',', '.') . ' Ref.';
                                                    ?>
                                                </td>
                                            </tr>
                                            <?php 
                                                endforeach; 
                                                // Convertir array de programas a string separado por comas
                                                $nombre_programa = implode(', ', $programas_list);
                                            ?>
                                            <tr style="background: #f8f9fa; font-weight: 600; border-top: 2px solid #003366;">
                                                <td colspan="4" style="padding: 10px 15px; text-align: right; font-size: 0.9rem; color: #2c3e50;">
                                                    <i class="fas fa-calculator" style="color: #003366; margin-right: 8px;"></i>Total a pagar por U.C: 
                                                    <span class="badge" style="font-size: 0.85rem; padding: 4px 14px; border-radius: 20px; background: #003366; color: white;">
                                                        <?php echo $total_uc; ?>
                                                    </span>
                                                </td>
                                                <td style="padding: 10px 15px; text-align: right; font-size: 0.9rem; color: #28a745; font-weight: 700;">
                                                    <?php echo number_format($total_ucredito_gen, 2, ',', '.') . ' Ref.'; ?>
                                                </td>
                                            </tr>
                                            <?php else: ?>
                                            <tr>
                                                <td colspan="5" style="padding: 30px 15px; text-align: center; color: #6c757d;">
                                                    <i class="fas fa-info-circle fa-2x d-block mb-2" style="color: #17a2b8;"></i>
                                                    <span style="font-size: 1rem;">No hay unidades curriculares registradas</span>
                                                </td>
                                            </tr>
                                            <?php endif; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <!-- ============================================================ -->
                        <!-- CAMPOS OCULTOS (Después de calcular)                         -->
                        <!-- ============================================================ -->
                        <input type="hidden" name="postgrado" value="<?php echo isset($nombre_programa) ? $nombre_programa : ''; ?>">
                        <input type="hidden" name="total_ucredito" value="<?php echo isset($total_uc) ? $total_uc : 0; ?>">
                        <input type="hidden" name="valor_ucredito2" id="valor" value="<?php echo isset($valor_ucredito) ? number_format($valor_ucredito, 2, ",", ".") : '0,00'; ?>">

                        <!-- ============================================================ -->
                        <!-- Tabla de Exonerados                                         -->
                        <!-- ============================================================ -->
                        <?php if(!empty($exonerados)): ?>
                        <div class="row mt-4">
                            <div class="col-md-12">
                                <div class="card card-warning card-outline" style="border-radius: 8px; border-left: 4px solid #ffc107; border-top: none;">
                                    <div class="card-header" style="background: #fffbf0; border-bottom: 1px solid #e8e8e8; padding: 8px 15px; border-radius: 8px 8px 0 0;">
                                        <h6 class="mb-0" style="font-weight: 600; color: #856404;">
                                            <i class="fas fa-star text-warning mr-2"></i>
                                            Unidades de Crédito Exoneradas
                                        </h6>
                                    </div>
                                    <div class="card-body p-0">
                                        <div class="table-responsive">
                                            <table class="table table-hover" style="border-radius: 8px; overflow: hidden; margin-bottom: 0;">
                                                <thead style="background: #fff3cd; color: #856404;">
                                                    <tr>
                                                        <th style="padding: 8px 15px; font-size: 0.75rem; font-weight: 600; text-transform: uppercase; letter-spacing: 0.5px;">Programa</th>
                                                        <th style="padding: 8px 15px; text-align: center; font-size: 0.75rem; font-weight: 600; text-transform: uppercase; letter-spacing: 0.5px;">UC</th>
                                                        <th style="padding: 8px 15px; font-size: 0.75rem; font-weight: 600; text-transform: uppercase; letter-spacing: 0.5px;">Unidad Curricular</th>
                                                        <th style="padding: 8px 15px; text-align: center; font-size: 0.75rem; font-weight: 600; text-transform: uppercase; letter-spacing: 0.5px;">Trimestre</th>
                                                        <th style="padding: 8px 15px; text-align: right; font-size: 0.75rem; font-weight: 600; text-transform: uppercase; letter-spacing: 0.5px;">Monto a Exonerar</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php 
                                                    $ucreditoE = 0;
                                                    $total_ucredito_gen_exonerados = 0;
                                                    
                                                    foreach($exonerados as $exonerado):
                                                        $tipo_ex = isset($exonerado->tipo_exoneracion) ? (int)$exonerado->tipo_exoneracion : 0;
                                                        
                                                        if($tipo_ex === 0):
                                                            // Exoneración PARCIAL: solo la UC de esa materia
                                                            $uc_fila = isset($exonerado->uc) ? (int)$exonerado->uc : 0;
                                                            $monto_fila = $uc_fila * $valor_ucredito;
                                                            $ucreditoE += $uc_fila;
                                                            $total_ucredito_gen_exonerados += $monto_fila;
                                                    ?>
                                                    <tr style="border-bottom: 1px solid #f0f0f0;">
                                                        <td style="padding: 8px 15px; font-size: 0.8rem; color: #2c3e50;">
                                                            <?php echo !empty($exonerado->programa) ? $exonerado->programa : 'N/D'; ?>
                                                        </td>
                                                        <td style="padding: 8px 15px; text-align: center; font-size: 0.8rem;">
                                                            <span class="badge" style="font-size: 0.7rem; padding: 2px 10px; border-radius: 20px; background: #ffc107; color: #856404;">
                                                                <?php echo $uc_fila; ?>
                                                            </span>
                                                        </td>
                                                        <td style="padding: 8px 15px; font-size: 0.8rem; color: #2c3e50;">
                                                            <?php echo !empty($exonerado->unidad_curricular) ? $exonerado->unidad_curricular : 'N/D'; ?>
                                                        </td>
                                                        <td style="padding: 8px 15px; text-align: center; font-size: 0.8rem;">
                                                            <span class="badge" style="background: #e9ecef; color: #495057; padding: 2px 10px; border-radius: 20px; font-size: 0.7rem;">
                                                                <?php echo !empty($exonerado->trimestre) ? $exonerado->trimestre : 'N/D'; ?>
                                                            </span>
                                                        </td>
                                                        <td style="padding: 8px 15px; text-align: right; font-size: 0.8rem; color: #856404; font-weight: 500;">
                                                            <?php echo number_format($monto_fila, 2, ',', '.') . ' Ref.'; ?>
                                                        </td>
                                                    </tr>
                                                    
                                                    <?php 
                                                        elseif($tipo_ex === 1):
                                                            // Exoneración TOTAL: todas las UC inscritas
                                                            $ucreditoE += $total_uc;
                                                            $total_ucredito_gen_exonerados += $total_ucredito_gen;
                                                    ?>
                                                    <tr style="border-bottom: 1px solid #f0f0f0; background: #fffdf5;">
                                                        <td style="padding: 8px 15px; font-size: 0.8rem; color: #2c3e50;">
                                                            <?php echo !empty($exonerado->programa) ? $exonerado->programa : 'Todos los programas'; ?>
                                                        </td>
                                                        <td style="padding: 8px 15px; text-align: center; font-size: 0.8rem;">
                                                            <span class="badge" style="font-size: 0.7rem; padding: 2px 10px; border-radius: 20px; background: #ffc107; color: #856404;">
                                                                <?php echo $total_uc; ?>
                                                            </span>
                                                        </td>
                                                        <td style="padding: 8px 15px; font-size: 0.8rem; color: #2c3e50;">
                                                            Todas las Unidades Curriculares inscritas
                                                        </td>
                                                        <td style="padding: 8px 15px; text-align: center; font-size: 0.8rem;">
                                                            <span class="badge" style="background: #e9ecef; color: #495057; padding: 2px 10px; border-radius: 20px; font-size: 0.7rem;">
                                                                Todos
                                                            </span>
                                                        </td>
                                                        <td style="padding: 8px 15px; text-align: right; font-size: 0.8rem; color: #856404; font-weight: 500;">
                                                            <?php echo number_format($total_ucredito_gen, 2, ',', '.') . ' Ref.'; ?>
                                                        </td>
                                                    </tr>
                                                    <?php 
                                                        endif;
                                                    endforeach; 
                                                    ?>
                                                                                                        
                                                    <tr style="background: #fff8e1; font-weight: 600; border-top: 2px solid #ffc107;">
                                                        <td colspan="4" style="padding: 8px 15px; text-align: right; font-size: 0.8rem; color: #856404;">
                                                            <i class="fas fa-calculator text-warning mr-2"></i>Total U.C Exoneradas: 
                                                            <span class="badge badge-warning" style="font-size: 0.8rem; padding: 3px 12px; border-radius: 20px;">
                                                                <?php echo $ucreditoE; ?>
                                                            </span>
                                                        </td>
                                                        <td style="padding: 8px 15px; text-align: right; font-size: 0.8rem; color: #856404; font-weight: 700;">
                                                            <?php echo number_format($total_ucredito_gen_exonerados, 2, ',', '.') . ' Ref.'; ?>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endif; ?>
                                                   
                        <!-- ============================================================ -->
                        <!-- Formulario de Pago                                          -->
                        <!-- ============================================================ -->
                        <form action="#" method="POST" enctype="multipart/form-data">
                            
                            <!-- Mensajes de Alerta -->
                            <?php if ($this->session->flashdata("error")): ?>
                            <div class="alert alert-danger alert-dismissible mt-3" style="border-radius: 8px; border-left: 4px solid #dc3545;">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <i class="icon fa fa-ban mr-2"></i> <?php echo $this->session->flashdata("error"); ?>
                            </div>
                            <?php endif; ?>

                            <?php if ($this->session->flashdata("success")): ?>
                            <div class="alert alert-success alert-dismissible mt-3" style="border-radius: 8px; border-left: 4px solid #28a745;">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <i class="icon fa fa-check mr-2"></i> <?php echo $this->session->flashdata("success"); ?>
                            </div>
                            <?php endif; ?>

                            <?php 
                            // ============================================================
                            // CÁLCULO DE MONTOS
                            // ============================================================
                            $arancel_ins = 0;
                            $arancel_insMaes = 0;
                            $total_arancel_permanencia = 0;
                            $arancel_fuera_lapso_programa = 0;
                            $arancel_fuera_lapso = 0;
                            $total_arancel_permanencia_gen = 0;
                            $total_arancel_ins = 0;
                            $total_arancel_insMaes = 0;
                            $total_arancel_insEsp = 0;
                            $total_arancel_insDoc = 0;
                            $total_arancel_LineainsEsp = 0;
                            $total_arancel_LineainsMaes = 0;
                            $total_programas = 0;
                            
                            if (!empty($aranceles)) {
                                foreach($aranceles as $arancel) {
                                    if ($arancel->id_tipo_arancel == '1') $arancel_ins = $arancel->monto_gen;
                                    if ($arancel->id_tipo_arancel == '4') $arancel_insMaes = $arancel->monto_gen;
                                    if ($arancel->id_tipo_arancel == '2') $total_arancel_permanencia = $arancel->monto_gen;
                                    if ($arancel->id_tipo_arancel == '3') $arancel_fuera_lapso_programa = $arancel->monto_gen;
                                }
                            }

                            // Calcular fuera de lapso
                            if (!empty($lapso)) {
                                if (($this->session->userdata("rol") == 5 || $this->session->userdata("rol") == 8) && 
                                    ($lapso->tipo_lapso == 2 || $this->session->userdata("tramite_fuera_lapso") == 1 || $this->session->userdata("tiempo_preinscripcion") <> 73)) {
                                    $arancel_fuera_lapso = $arancel_fuera_lapso_programa;
                                }
                            }

                            // Calcular aranceles por programa
                            if (!empty($programa_preinscrito)) {
                                foreach($programa_preinscrito as $programa) {
                                    if($programa->id_programa <> 27 && $programa->id_programa <> 28) {
                                        if($programa->tipo_programa == 1) {
                                            $total_arancel_insEsp += $arancel_ins;
                                        } elseif($programa->tipo_programa == 2) {
                                            $total_arancel_insMaes += $arancel_insMaes;
                                        } elseif($programa->tipo_programa == 3) {
                                            $total_arancel_insDoc += $arancel_insDoc;
                                        }
                                        $total_programas++;
                                    } else {
                                        if($programa->id_programa == 27) { $total_arancel_LineainsEsp += $arancel_ins; }
                                        if($programa->id_programa == 28) { $total_arancel_LineainsMaes += $arancel_insMaes; }
                                    }
                                }
                            }

                            $arancel_fuera_lapso = $arancel_fuera_lapso * $total_programas;
                            $total_arancel_ins = ($total_arancel_insMaes) + ($total_arancel_insEsp) + ($total_arancel_insDoc);
                            
                            if($total_arancel_ins == 0) {
                                $total_arancel_ins = ($total_arancel_LineainsEsp + $total_arancel_LineainsMaes);
                            }

                            // Calcular permanencia
                            if (!empty($reincorporaciones)) {
                                foreach($reincorporaciones as $reinc) {
                                    $total_arancel_permanencia_gen += $total_arancel_permanencia;
                                }
                            }

                            $monto_uc = isset($total_ucredito_gen) ? $total_ucredito_gen : 0;
                            $total_pagar_gen = $monto_uc + $total_arancel_ins;

                            // ============================================================
                            // DETECTAR SI HAY EXONERACIÓN TOTAL (tipo_exoneracion == 1)
                            // ============================================================
                            $exoneracion_total = false;
                            if (!empty($exonerados)) {
                                foreach ($exonerados as $ex) {
                                    if (isset($ex->tipo_exoneracion) && (int)$ex->tipo_exoneracion === 1) {
                                        $exoneracion_total = true;
                                        break;
                                    }
                                }
                            }

                            // ============================================================
                            // CÁLCULO DEL MONTO A EXONERAR
                            // ============================================================
                            $monto_exonerar = 0;

                            // Exoneración de UC (siempre que exista)
                            if (isset($total_ucredito_gen_exonerados) && $total_ucredito_gen_exonerados > 0) {
                                $monto_exonerar += $total_ucredito_gen_exonerados;
                            }

                            // Si es exoneración TOTAL, sumar también los aranceles
                            if ($exoneracion_total) {
                                $monto_exonerar += $total_arancel_ins;
                                $monto_exonerar += $total_arancel_permanencia_gen;
                                $monto_exonerar += $arancel_fuera_lapso;
                            }

                            // ============================================================
                            // TOTAL FINAL
                            // ============================================================
                            $total_final = $total_pagar_gen + $total_arancel_permanencia_gen + $arancel_fuera_lapso - $monto_exonerar;

                            if ($total_final < 0) {
                                $total_final = 0;
                            }

                            // ============================================================
                            // PREPARAR CÉDULA/RIF POR DEFECTO PARA LA PASARELA
                            // ============================================================
                            $cedula_default_raw = isset($datos_alumno->cedula) ? $datos_alumno->cedula : '';
                            $cedula_default_numeros = preg_replace('/[^0-9]/', '', $cedula_default_raw);
                            $tipo_doc_default = 'V';
                            if (stripos($cedula_default_raw, 'E') === 0) { $tipo_doc_default = 'E'; }
                           
                            ?>

                            <!-- ============================================================ -->
                            <!-- CAMPOS OCULTOS DEL FORMULARIO                               -->
                            <!-- ============================================================ -->
                            <input type="hidden" name="id_estudiante" value="<?php echo $datos_alumno->id; ?>">
                            <input type="hidden" name="id_estado_estudio" value="<?php echo isset($estado_estudio->id_estado_inscribio) ? $estado_estudio->id_estado_inscribio : ''; ?>">
                            <input type="hidden" name="total_pagar" value="<?php echo $total_final; ?>">
                            <input type="hidden" name="postgrado" value="<?php echo isset($nombre_programa) ? $nombre_programa : ''; ?>">
                            <input type="hidden" name="total_ucredito" value="<?php echo isset($total_uc) ? $total_uc : 0; ?>">
                            <input type="hidden" name="id_periodo" value="<?php echo $periodo->id; ?>">
                            <input type="hidden" name="valor_ucredito2" id="valor" value="<?php echo isset($valor_ucredito) ? number_format($valor_ucredito, 2, ",", ".") : '0,00'; ?>">
                            <input type="hidden" name="id_usuario" value="<?php echo $this->session->userdata('id'); ?>">
                            <input type="hidden" name="monto_exoneracion" value="<?php echo $monto_exonerado?>">

                            <!-- ============================================================ -->
                            <!-- Tabla de Resumen de Pagos                                   -->
                            <!-- ============================================================ -->
                            <div class="row mt-4">
                                <div class="col-md-12">
                                    <div class="card card-info card-outline" style="border-radius: 8px; border-left: 4px solid #17a2b8; border-top: none;">
                                        <div class="card-header" style="background: #f0f9ff; border-bottom: 1px solid #e8e8e8; padding: 8px 15px; border-radius: 8px 8px 0 0;">
                                            <h6 class="mb-0" style="font-weight: 600; color: #0c5460;">
                                                <i class="fas fa-calculator text-info mr-2"></i>
                                                Resúmen de Pago
                                            </h6>
                                        </div>
                                        <div class="card-body p-0">
                                            <div class="table-responsive">
                                                <table class="table" style="margin-bottom: 0;">
                                                    <tbody>
                                                        <!-- Reincorporaciones / Permanencia -->
                                                        <?php if(!empty($reincorporaciones)): ?>
                                                        <tr style="border-bottom: 1px solid #f0f0f0;">
                                                            <td style="padding: 8px 15px; font-weight: 500; color: #2c3e50; width: 50%; font-size: 0.85rem;">
                                                                <i class="fas fa-clock text-info mr-2"></i>Arancel por Permanencia
                                                            </td>
                                                            <td style="padding: 8px 15px; text-align: right; font-weight: 500; color: #17a2b8; font-size: 0.85rem;">
                                                                <?php echo number_format($total_arancel_permanencia_gen, 2, ',', '.') . ' Ref.'; ?>
                                                            </td>
                                                        </tr>
                                                        <?php endif; ?>

                                                        <!-- Inscripción -->
                                                        <tr style="border-bottom: 1px solid #f0f0f0;">
                                                            <td style="padding: 8px 15px; font-weight: 500; color: #2c3e50; font-size: 0.85rem;">
                                                                <i class="fas fa-file-signature" style="color: #003366; margin-right: 8px;"></i>Arancel de Inscripción
                                                            </td>
                                                            <td style="padding: 8px 15px; text-align: right; font-weight: 500; color: #003366; font-size: 0.85rem;">
                                                                <?php echo number_format($total_arancel_ins, 2, ',', '.') . ' Ref.'; ?>
                                                            </td>
                                                        </tr>

                                                        <!-- Fuera de Lapso -->
                                                        <?php if($arancel_fuera_lapso > 0): ?>
                                                        <tr style="border-bottom: 1px solid #f0f0f0;">
                                                            <td style="padding: 8px 15px; font-weight: 500; color: #2c3e50; font-size: 0.85rem;">
                                                                <i class="fas fa-exclamation-triangle text-warning mr-2"></i>Arancel Fuera de Lapso
                                                            </td>
                                                            <td style="padding: 8px 15px; text-align: right; font-weight: 500; color: #ffc107; font-size: 0.85rem;">
                                                                <?php echo number_format($arancel_fuera_lapso, 2, ',', '.') . ' Ref.'; ?>
                                                            </td>
                                                        </tr>
                                                        <?php endif; ?>

                                                        <!-- Unidades de Crédito -->
                                                        <tr style="border-bottom: 1px solid #f0f0f0;">
                                                            <td style="padding: 8px 15px; font-weight: 500; color: #2c3e50; font-size: 0.85rem;">
                                                                <i class="fas fa-book-open text-success mr-2"></i>Unidades de Crédito
                                                            </td>
                                                            <td style="padding: 8px 15px; text-align: right; font-weight: 500; color: #28a745; font-size: 0.85rem;">
                                                                <?php echo number_format($monto_uc, 2, ',', '.') . ' Ref.'; ?>
                                                            </td>
                                                        </tr>

                                                        <!-- Exoneración -->
                                                        <?php if($monto_exonerar > 0): ?>
                                                        <tr style="border-bottom: 1px solid #f0f0f0; background: #fffbf0;">
                                                            <td style="padding: 8px 15px; font-weight: 500; color: #856404; font-size: 0.85rem;">
                                                                <i class="fas fa-star text-warning mr-2"></i>
                                                                Monto a Exonerar
                                                                <?php if($exoneracion_total): ?>
                                                                    <small class="d-block text-muted" style="font-size: 0.72rem;">
                                                                        (UC + aranceles administrativos)
                                                                    </small>
                                                                <?php endif; ?>
                                                            </td>
                                                            <td style="padding: 8px 15px; text-align: right; font-weight: 500; color: #856404; font-size: 0.85rem;">
                                                                - <?php echo number_format($monto_exonerar, 2, ',', '.') . ' Ref.'; ?>
                                                            </td>
                                                        </tr>
                                                        <?php endif; ?>

                                                        <!-- Total a Pagar -->
                                                        <tr style="background: #e8f5e9; border-top: 3px solid #28a745;">
                                                            <td style="padding: 12px 15px; font-weight: 700; color: #1e7e34; font-size: 1.05rem;">
                                                                <i class="fas fa-money-bill-wave text-success mr-2"></i>
                                                                TOTAL A PAGAR
                                                            </td>
                                                            <td style="padding: 12px 15px; text-align: right; font-weight: 700; color: #28a745; font-size: 1.2rem;">
                                                                <?php echo number_format($total_final, 2, ',', '.') . ' Ref.'; ?>
                                                                <input type="hidden" name="total_pagar_final" value="<?php echo number_format($total_final, 2, ',', '.') ?>">
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                          
                        <?php if(!$exoneracion_total): ?>
                            <!-- ============================================================ -->
                            <!-- NOTA INFORMATIVA - ACTUALIZACIÓN DE INSCRIPCIÓN              -->
                            <!-- ============================================================ -->
                            <div class="row mt-4">
                                <div class="col-md-12">
                                    <div class="alert alert-warning" style="border-radius: 10px; border-left: 6px solid #e67e22; background: #fff8e1; color: #2c3e50; box-shadow: 0 2px 10px rgba(0,0,0,0.08); padding: 18px 22px;">
                                        <div class="d-flex align-items-start flex-wrap">
                                            <div style="flex-shrink: 0; margin-right: 18px; margin-top: 2px;">
                                                <i class="fas fa-clock" style="color: #e67e22; font-size: 32px;"></i>
                                            </div>
                                            <div style="flex-grow: 1;">
                                                <h6 style="font-weight: 700; color: #e67e22; margin-bottom: 6px; font-size: 1rem;">
                                                    <i class="fas fa-pen" style="margin-right: 8px;"></i>
                                                    ¿Aún no has confirmado tu pago? ¡Puedes actualizar tu inscripción!
                                                </h6>
                                                <p style="margin-bottom: 4px; color: #2c3e50; font-size: 0.92rem;">
                                                    Mientras <strong>no realices la confirmación del pago</strong> de tu inscripción, 
                                                    tienes la posibilidad de <strong>modificar y actualizar</strong> las 
                                                    <strong>unidades curriculares</strong> y los <strong>aranceles correspondientes</strong> 
                                                    según los cambios que realices.
                                                </p>
                                                <p style="margin-bottom: 4px; color: #2c3e50; font-size: 0.92rem;">
                                                    Si <strong>tienes dudas en relación a tu inscripción</strong>, 
                                                    puedes consultar a la Dirección de Secretaría General.
                                                </p>
                                                <p style="margin-bottom: 0; color: #c0392b; font-size: 0.88rem;">
                                                    <i class="fas fa-exclamation-circle" style="color: #c0392b;"></i> 
                                                    <strong>Importante:</strong> Una vez confirmado el pago, 
                                                    <strong>no se permitirán cambios</strong> en tu inscripción.
                                                </p>
                                                <div style="margin-top: 10px;">
                                                    <a href="<?php echo base_url(); ?>dashboard04/inscripcion" class="btn btn-sm btn-warning" style="border-radius: 20px; padding: 4px 18px; font-weight: 500; background: #e67e22; border-color: #e67e22; color: white; transition: all 0.3s;">
                                                        <i class="fas fa-edit"></i> Ir a actualizar inscripción
                                                    </a>
                                                    <span style="font-size: 0.75rem; color: #6c757d; margin-left: 10px;">
                                                        <i class="fas fa-info-circle"></i> Solo disponible antes de confirmar el pago
                                                    </span>
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- ============================================================ -->
                            <!-- CAMPO: CÉDULA / RIF PARA LA PASARELA DE PAGO                 -->
                            <!-- ============================================================ -->
                            <div class="row mt-4">
                                <div class="col-md-12">
                                    <div class="card card-outline" style="border-radius: 8px; border-left: 4px solid #1a8a3f; border-top: none; box-shadow: 0 2px 8px rgba(0,0,0,0.05);">
                                        <div class="card-header" style="background: #f0fdf4; border-bottom: 1px solid #e8e8e8; padding: 8px 15px; border-radius: 8px 8px 0 0;">
                                            <h6 class="mb-0" style="font-weight: 600; color: #1a8a3f;">
                                                <i class="fas fa-id-card mr-2"></i>
                                                Datos para el Botón de PagoBDV
                                            </h6>
                                        </div>
                                        <div class="card-body p-3">
                                            <div class="form-group mb-0">
                                                <label for="cedula_rif_pago" class="form-label" style="font-weight: 600; color: #2c3e50; font-size: 0.9rem;">
                                                    Cédula del Estudiante o Depositante <span class="text-danger">*</span>
                                                </label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <select name="tipo_documento_pago" id="tipo_documento_pago" class="form-control" style="border-radius: 8px 0 0 8px; font-weight: 500; background: #f8f9fa;">
                                                            <option value="V" <?php echo ($tipo_doc_default == 'V') ? 'selected' : ''; ?>>V</option>
                                                            <option value="E" <?php echo ($tipo_doc_default == 'E') ? 'selected' : ''; ?>>E</option>
                                                            
                                                        </select>
                                                    </div>
                                                    <input type="text" 
                                                           class="form-control" 
                                                           id="cedula_rif_pago" 
                                                           name="cedula_rif_pago" 
                                                           placeholder="Ej: 12345678" 
                                                            pattern="[0-9]{6,8}"
                                                            maxlength="8"
                                                            minlength="6"
                                                            inputmode="numeric"
                                                           required
                                                           value="<?php echo htmlspecialchars($cedula_default_numeros); ?>"
                                                           style="border-radius: 0 8px 8px 0; font-weight: 500; letter-spacing: 0.5px;">
                                                </div>
                                                <small class="form-text text-muted" style="font-size: 0.78rem;">
                                                    <i class="fas fa-info-circle text-info"></i>
                                                    Se ha precargado tu cédula, pero puedes <strong>modificarla</strong> si deseas usar otro documento que posea cuenta en el Banco de Venezuela. Solo números, sin guiones ni puntos.
                                                </small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- ============================================================ -->
                            <!-- Sección de Botones de Pago                                   -->
                            <!-- ============================================================ -->
                            <div class="row mt-4">
                                <div class="col-md-12 text-center">
                                    <div class="d-flex justify-content-center flex-wrap" style="gap: 12px;">
                                        
                                        <!-- BOTÓN PAGO BDV - NUEVO -->
                                        <a href="javascript:void(0);" 
                                        class="btn btn-success" 
                                        id="btnPagoBDV" 
                                        data-url="<?php echo base_url(); ?>pagos/iniciar"
                                        data-uc="<?php echo $total_uc; ?>"
                                        data-monto="<?php echo $total_final; ?>"
                                        style="border-radius: 10px; padding: 12px 45px; font-weight: 600; transition: all 0.3s; min-width: 220px; font-size: 16px; background: #1a8a3f; border-color: #1a8a3f;">
                                            <i class="fas fa-credit-card mr-2"></i>
                                            Pagar con Botón de PagoBDV
                                        </a>
      
                                        <!-- BOTÓN CANCELAR -->
                                        <a href="<?php echo base_url(); ?>dashboard04/proceso" 
                                        class="btn btn-default" 
                                        style="border-radius: 10px; padding: 12px 30px; font-weight: 500; transition: all 0.3s; min-width: 150px;">
                                            <i class="fas fa-times mr-2"></i>
                                            Cancelar
                                        </a>
                                    </div>
                                </div>
                            </div>
       

                            <!-- ============================================================ -->
                            <!-- NOTA DE CONFIRMACIÓN ANTES DE REALIZAR EL PAGO              -->
                            <!-- ============================================================ -->
                            <div class="row mt-3">
                                <div class="col-md-12">
                                    <div class="alert alert-danger" style="border-radius: 10px; border-left: 6px solid #dc3545; background: #fff5f5; color: #2c3e50; box-shadow: 0 2px 10px rgba(0,0,0,0.08); padding: 16px 22px;">
                                        <div class="d-flex align-items-start flex-wrap">
                                            <div style="flex-shrink: 0; margin-right: 16px; margin-top: 2px;">
                                                <i class="fas fa-exclamation-triangle" style="color: #dc3545; font-size: 30px;"></i>
                                            </div>
                                            <div style="flex-grow: 1;">
                                                <h6 style="font-weight: 700; color: #dc3545; margin-bottom: 6px; font-size: 1rem;">
                                                    <i class="fas fa-shield-alt" style="margin-right: 6px;"></i>
                                                    Antes de realizar tu pago, revisa esta información:
                                                </h6>
                                                <ul style="margin-bottom: 4px; padding-left: 20px; color: #2c3e50; font-size: 0.9rem;">
                                                    <li><strong>Verifica</strong> que las <strong>unidades curriculares</strong> seleccionadas sean las correctas.</li>
                                                    <li><strong>Revisa</strong> los <strong>montos</strong> del resumen de pago (UC + aranceles administrativos).</li>
                                                    <li><strong>Asegúrate</strong> de terner a mano tus instrumentos bancarios.</li>
                                                </ul>
                                                <p style="margin-bottom: 0; color: #c0392b; font-size: 0.9rem; font-weight: 600; margin-top: 4px;">
                                                    <i class="fas fa-exclamation-circle" style="color: #dc3545;"></i> 
                                                    Una vez confirmado el pago, <strong>NO podrás modificar</strong> tu inscripción ni los aranceles asociados.
                                                </p>
                                            </div>
                                            <div style="flex-shrink: 0; margin-left: 15px;">
                                                <span class="badge" style="background: #dc3545; color: white; padding: 6px 14px; border-radius: 20px; font-size: 0.7rem; font-weight: 600;">
                                                    <i class="fas fa-lock"></i> Confirmación final
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php endif; ?>

                        </form>
  <?php if($exoneracion_total): ?>
                                  <!-- ============================================================ -->
                            <!-- MENSAJE: EXONERACIÓN TOTAL - NO REQUIERE PAGO                -->
                            <!-- ============================================================ -->
                            <div class="row mt-4">
                                <div class="col-md-12">
                                    <div class="alert alert-success" style="border-radius: 10px; border-left: 6px solid #1a8a3f; background: #f0fdf4; color: #2c3e50; box-shadow: 0 2px 10px rgba(0,0,0,0.08); padding: 20px 24px;">
                                        <div class="d-flex align-items-start flex-wrap">
                                            <div style="flex-shrink: 0; margin-right: 18px; margin-top: 2px;">
                                                <i class="fas fa-check-circle" style="color: #1a8a3f; font-size: 38px;"></i>
                                            </div>
                                            <div style="flex-grow: 1;">
                                                <h5 style="font-weight: 700; color: #1a8a3f; margin-bottom: 8px; font-size: 1.1rem;">
                                                    <i class="fas fa-star" style="margin-right: 8px;"></i>
                                                    ¡Felicidades! Tienes Exoneración Total
                                                </h5>
                                                <p style="margin-bottom: 8px; color: #2c3e50; font-size: 0.95rem;">
                                                    Has sido beneficiado con una <strong>exoneración del 100%</strong> de los conceptos 
                                                    de tu inscripción: <strong>Unidades de Crédito</strong>, <strong>Arancel de Inscripción</strong>, 
                                                    <strong>Arancel por Permanencia</strong> y <strong>Arancel Fuera de Lapso</strong> (si aplica).
                                                </p>
                                                <p style="margin-bottom: 8px; color: #2c3e50; font-size: 0.95rem;">
                                                    <i class="fas fa-info-circle" style="color: #1a8a3f;"></i>
                                                    <strong>No se requiere realizar ningún pago</strong> a través del Botón de Pago BDV.
                                                </p>
                                                <p style="margin-bottom: 0; color: #2c3e50; font-size: 0.9rem;">
                                                    Si tienes alguna duda, puedes consultar a la Dirección de Secretaría General.
                                                </p>
                                                <div style="margin-top: 16px;">
    <form action="<?php echo base_url(); ?>dashboard04/registropago_store" 
          method="POST" 
          enctype="multipart/form-data" 
          id="formRegistroExoneracion">
        
        <!-- Campos ocultos necesarios para el registro -->
        <input type="text" name="ex_id_estudiante" value="<?php echo $datos_alumno->id; ?>">
        <input type="text" name="ex_id_estado_estudio" value="<?php echo isset($estado_estudio->id_estado_inscribio) ? $estado_estudio->id_estado_inscribio : ''; ?>">
        <input type="text" name="ex_id_periodo" value="<?php echo $periodo->id; ?>">
        <input type="text" name="ex_id_usuario" value="<?php echo $this->session->userdata('id'); ?>">
        <input type="text" name="ex_postgrado" value="<?php echo isset($nombre_programa) ? $nombre_programa : ''; ?>">
        <input type="text" name="ex_total_ucredito" value="<?php echo isset($total_uc) ? $total_uc : 0; ?>">
        <input type="text" name="ex_total_pagar" value="<?php echo $total_final; ?>">
        <input type="text" name="ex_tipo_registro" value="exoneracion_total">
        <input type="text" name="ex_monto_exoneracion" value="<?php echo $monto_exonerar; ?>">

        <!-- Bloque de carga de archivo obligatorio -->
        <div class="card" style="border-radius: 10px; border: 2px dashed #1a8a3f; background: #ffffff; margin-bottom: 16px;">
            <div class="card-body p-3">
                <label for="avale_exoneracion" style="font-weight: 600; color: #1a8a3f; font-size: 0.95rem; display: block; margin-bottom: 8px;">
                    <i class="fas fa-file-upload mr-2"></i>
                    Documento que avala la exoneración <span class="text-danger">*</span>
                </label>
                <div class="custom-file">
                    <input type="file" 
                           class="custom-file-input" 
                           id="avale_exoneracion" 
                           name="avale_exoneracion" 
                           accept=".pdf,.jpg,.jpeg,.png"
                           required>
                    <label class="custom-file-label" for="avale_exoneracion" style="border-radius: 8px;">
                        Seleccionar archivo...
                    </label>
                </div>
                <small class="form-text text-muted" style="font-size: 0.78rem; margin-top: 6px;">
                    <i class="fas fa-info-circle text-info"></i>
                    Formatos permitidos: PDF, JPG, JPEG, PNG. Tamaño máximo: 5 MB.
                    Este documento es <strong>obligatorio</strong> para registrar tu inscripción con exoneración.
                </small>
            </div>
        </div>

        <!-- Botones -->
        <div class="d-flex flex-wrap" style="gap: 10px;">
            <button type="submit" 
                    class="btn btn-success" 
                    id="btnRegistrarExoneracion"
                    style="border-radius: 20px; padding: 8px 26px; font-weight: 600; background: #1a8a3f; border-color: #1a8a3f; color: white;">
                <i class="fas fa-save mr-2"></i>
                Registrar Inscripción
            </button>
            <a href="<?php echo base_url(); ?>dashboard04/proceso" 
                class="btn btn-default" 
                style="border-radius: 20px; padding: 8px 24px; font-weight: 500;">
                <i class="fas fa-arrow-left mr-2"></i>
                Volver al proceso
            </a>
        </div>
        </form>
        </div>
          <?php endif; ?>
                    </div><!-- /.card-body -->
                </div><!-- /.card -->
            </div><!-- /.card-body -->
        </div><!-- /.card -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- Estilos adicionales -->
<style>
    /* Efectos hover en filas de tabla */
    .table-hover tbody tr:hover {
        background-color: #e8f0fe !important;
        transition: background 0.2s ease;
    }
    
    /* Sombras y bordes redondeados */
    .card {
        border-radius: 10px !important;
        overflow: hidden;
    }
    
    /* Efecto hover en botones AdminLTE */
    .btn-primary {
        background-color: #007bff;
        border-color: #007bff;
        color: #fff;
        transition: all 0.2s ease;
    }
    
    .btn-primary:hover {
        background-color: #0069d9;
        border-color: #0062cc;
        box-shadow: 0 2px 8px rgba(0, 123, 255, 0.3);
        transform: translateY(-2px);
    }
    
    .btn-default {
        background-color: #fff;
        border: 1px solid #ced4da;
        color: #6c757d;
        transition: all 0.2s ease;
    }
    
    .btn-default:hover {
        background-color: #e9ecef;
        border-color: #ced4da;
        color: #343a40;
        transform: translateY(-2px);
    }
    
    /* Ajuste para móviles */
    @media (max-width: 768px) {
        .card-title {
            font-size: 1rem !important;
        }
        .table td, .table th {
            padding: 8px 10px !important;
            font-size: 0.75rem !important;
        }
        .btn {
            padding: 8px 25px !important;
            font-size: 0.9rem !important;
        }
        .form-group.row {
            margin-bottom: 10px;
        }
        .col-form-label {
            text-align: left !important;
            padding-bottom: 2px;
        }
        .btn-default {
            margin-left: 0 !important;
        }
    }
    
    @media (max-width: 576px) {
        .table td, .table th {
            padding: 6px 8px !important;
            font-size: 0.7rem !important;
        }
        .btn {
            padding: 6px 20px !important;
            font-size: 0.8rem !important;
            width: 100%;
            margin-bottom: 5px;
        }
    }
</style>

<!-- Script para mostrar nombre del archivo -->
<script>
    document.querySelector('.custom-file-input')?.addEventListener('change', function(e) {
        var fileName = e.target.files[0]?.name || 'Seleccionar archivo';
        var label = e.target.nextElementSibling;
        label.innerHTML = fileName;
    });
    
    // Script de confirmación antes de enviar
    document.addEventListener('DOMContentLoaded', function() {
        var btnConfirmar = document.getElementById('btnConfirmarPago');
        if (btnConfirmar) {
            btnConfirmar.addEventListener('click', function(e) {
                var form = this.closest('form');
                var camposRequeridos = form.querySelectorAll('[required]');
                var camposValidos = true;
                
                camposRequeridos.forEach(function(campo) {
                    if (!campo.value.trim()) {
                        camposValidos = false;
                        campo.style.borderColor = '#dc3545';
                        campo.style.borderWidth = '2px';
                    } else {
                        campo.style.borderColor = '';
                        campo.style.borderWidth = '';
                    }
                });
                
                if (!camposValidos) {
                    e.preventDefault();
                    alert('⚠️ Por favor, completa todos los campos requeridos antes de confirmar el pago.');
                    return;
                }
                
                var mensaje = "🔒 ¿CONFIRMAR PAGO?\n\n" +
                              "Esta acción es irreversible.\n\n" +
                              "Antes de confirmar, verifica:\n" +
                              "✅ Unidades curriculares y pagos de aranceles correctas\n" +
                              "✅ Monto adecuado\n" +
                              "✅ Cèdula de Identidad del Depositante\n\n" +
                              "⚠️ Una vez confirmado, NO podrás modificar tu inscripción.\n\n" +
                              "¿Estás seguro de continuar?";
                
                if (!confirm(mensaje)) {
                    e.preventDefault();
                    alert('📋 Pago cancelado. Puedes revisar tu inscripción antes de confirmar.');
                    return;
                }
            });
        }
    });
   

// Si hay un pago BDV pendiente, mostrar alerta
<?php if ($this->session->userdata('pago_bdv_token')): ?>
    setTimeout(function() {
        var mensaje = "⚠️ Tienes un pago pendiente con Botón de PagoBDV.\n" +
                      "¿Deseas verificar el estado del pago?";
        if (confirm(mensaje)) {
            window.location.href = '<?php echo base_url(); ?>pagos/confirmacion';
        }
    }, 2000);
<?php endif; ?>


<!-- Script para manejar el botón BDV -->

document.addEventListener('DOMContentLoaded', function() {
    var btnPagoBDV = document.getElementById('btnPagoBDV');
    if (btnPagoBDV) {
        btnPagoBDV.addEventListener('click', function(e) {
            e.preventDefault();
            
            // ============================================================
            // VALIDACIÓN DE CÉDULA / RIF
            // ============================================================
            var cedulaInput = document.getElementById('cedula_rif_pago');
            var cedulaValor = cedulaInput.value.trim();
            
             if (!/^[0-9]{6,8}$/.test(cedulaValor)) {
                alert('⚠️ Debes ingresar una cédula válido antes de continuar.\n\n' +
                      'Solo números, entre 6 y 8 dígitos.\n' +
                      'Ejemplo: 12345678');
                cedulaInput.focus();
                cedulaInput.style.borderColor = '#dc3545';
                cedulaInput.style.borderWidth = '2px';
                return;
            }
            // Limpiar el resaltado si ya es válido
            cedulaInput.style.borderColor = '';
            cedulaInput.style.borderWidth = '';
            
            var monto = '<?php echo number_format($total_final, 2, ",", "."); ?>';
            var tipoDoc = document.getElementById('tipo_documento_pago').value;
            var mensaje = "💳 PAGO CON BOTÓN DE PAGOBDV\n\n" +
                          "Serás redirigido al Botón de PagoBDV.\n\n" +
                          "📌 Documento: " + tipoDoc + "-" + cedulaValor + "\n" +
                          "📌 Monto a pagar: Ref. " + monto + "\n\n" +
                          "⚠️ Antes de continuar, asegúrate de:\n" +
                          "✅ Tener saldo suficiente en tu cuenta BDV\n" +
                          "✅ Tener a la mano los datos de tus productos y servicios del banco\n" +
                          "✅ Conexión estable a internet\n\n" +
                          "¿Continuar con el pago?";
            
            if (confirm(mensaje)) {
                this.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i> Redirigiendo...';
                this.disabled = true;
                // 1. Crear un formulario temporal de manera oculta
                var form = document.createElement('form');
                form.method = 'POST';
                form.action = "<?php echo base_url(); ?>pagos/iniciar";

                // 2. Definir las variables que quieres enviar por POST
                var total_final = document.createElement('input');
                total_final.type = 'hidden';
                total_final.name = 'total_final';
                total_final.value = '<?php echo $total_final; ?>';
                form.appendChild(total_final);

                var total_uc = document.createElement('input');
                total_uc.type = 'hidden';
                total_uc.name = 'total_uc';
                total_uc.value = '<?php echo $total_uc; ?>';
                form.appendChild(total_uc);

                // ============================================================
                // NUEVOS CAMPOS: TIPO DE DOCUMENTO Y CÉDULA/RIF
                // ============================================================
                var tipo_documento = document.createElement('input');
                tipo_documento.type = 'hidden';
                tipo_documento.name = 'tipo_documento';
                tipo_documento.value = tipoDoc;
                form.appendChild(tipo_documento);

                var cedula_rif = document.createElement('input');
                cedula_rif.type = 'hidden';
                cedula_rif.name = 'cedula_rif';
                cedula_rif.value = cedulaValor;
                form.appendChild(cedula_rif);

                // 3. Añadir el formulario al documento y enviarlo
                document.body.appendChild(form);
                form.submit();
            }
        });
    }
});
// ============================================================
// MANEJO DEL FORMULARIO DE EXONERACIÓN TOTAL
// ============================================================
document.addEventListener('DOMContentLoaded', function() {
    // Mostrar nombre del archivo seleccionado
    var inputAval = document.getElementById('avale_exoneracion');
    if (inputAval) {
        inputAval.addEventListener('change', function(e) {
            var fileName = e.target.files[0]?.name || 'Seleccionar archivo...';
            var label = e.target.nextElementSibling;
            if (label) label.innerHTML = fileName;
        });
    }

    // Validación antes de enviar
    var formExo = document.getElementById('formRegistroExoneracion');
    if (formExo) {
        formExo.addEventListener('submit', function(e) {
            var inputAval = document.getElementById('avale_exoneracion');
            var archivo = inputAval.files[0];

            if (!archivo) {
                e.preventDefault();
                alert('⚠️ Debes cargar el documento que avala la exoneración antes de registrar tu inscripción.');
                inputAval.focus();
                inputAval.style.borderColor = '#dc3545';
                return false;
            }

            // Validar extensión
            var extensionesPermitidas = ['pdf', 'jpg', 'jpeg', 'png'];
            var extension = archivo.name.split('.').pop().toLowerCase();
            if (!extensionesPermitidas.includes(extension)) {
                e.preventDefault();
                alert('⚠️ Solo se permiten archivos PDF, JPG, JPEG o PNG.');
                inputAval.value = '';
                inputAval.nextElementSibling.innerHTML = 'Seleccionar archivo...';
                return false;
            }

            // Validar tamaño (5 MB)
            var maxSize = 5 * 1024 * 1024;
            if (archivo.size > maxSize) {
                e.preventDefault();
                alert('⚠️ El archivo no debe superar los 5 MB.');
                inputAval.value = '';
                inputAval.nextElementSibling.innerHTML = 'Seleccionar archivo...';
                return false;
            }

            // Confirmación final
            if (!confirm('📄 ¿Confirmar el registro de tu inscripción con exoneración total?\n\n' +
                         'Una vez registrado, no podrás modificar tu inscripción.')) {
                e.preventDefault();
                return false;
            }

            // Deshabilitar botón para evitar doble envío
            var btn = document.getElementById('btnRegistrarExoneracion');
            if (btn) {
                btn.disabled = true;
                btn.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i> Registrando...';
            }
        });
    }
});
</script>