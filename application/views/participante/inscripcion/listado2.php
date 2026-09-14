<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" style="background: #f4f6f9;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">             
                    <h1 class="m-0" style="font-weight: 300; color: #003366;">
                        <i class="fas fa-file-invoice" style="color: #003366; margin-right: 8px;"></i>                       
                         <span style="color: #2c3e50; font-weight: 300;"> Proceso de Inscripción</span>
                    </h1>
                </div>              
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right" style="background: transparent;">
                        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>dashboard04/home" style="color: #6c757d;">Inicio</a></li>
                        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>dashboard04/inscripcion" style="color: #6c757d;">Inscripciones Posgrado - Oferta Académica</a></li>
                        <li class="breadcrumb-item active" style="color: #003366; font-weight: 600;">- Confirmación</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <!-- Main content -->
    <section class="content">
        <script language="javascript">
            function anterior() { 
                location.href="inscripcion/";
            }
        </script>

        <form action="<?php echo base_url(); ?>dashboard04/registro_materias/<?php echo $this->session->userdata('id'); ?>" method="POST">
            
            <!-- Card Principal -->
            <div class="card card-primary card-outline shadow-sm" style="border-radius: 10px; border-top: 4px solid #003366;">
                <div class="card-body p-0">
                    <div class="card" style="border: none; border-radius: 10px;">
                        
                        <!-- Header -->
                        <div class="card-header py-3" style="border-bottom: 1px solid #e8e8e8; border-radius: 10px 10px 0 0; background: #fafafa;">
                            <div class="d-flex align-items-center justify-content-between flex-wrap">
                                <div class="d-flex align-items-center">
                                    <div class="mr-3" style="width: 42px; height: 42px; background: #003366; border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                                    <img src="<?php echo base_url(); ?>assets/img/logo2.png" alt="Logo" style="width: 55px; height: 55px; border-radius: 50%; border: 2px solid #e9ecef; padding: 3px; background: white;">
                                    </div>
                                    <div>
                                        <h5 class="mb-0" style="font-weight: 600; color: #2c3e50;">
                                        Pre-Inscripción de Unidades Curriculares  -  Unidades Curriculares Seleccionadas
                                        </h5>
                                        <small class="text-muted" style="font-size: 0.75rem;">
                                            <i class="fas fa-calendar-alt mr-1"></i>
                                            Período: <strong><?php echo $periodo->nombre; ?></strong>
                                        </small>
                                    </div>
                                </div>
                                <div>
                                    <span class="badge" style="font-size: 0.8rem; padding: 5px 16px; border-radius: 10px; font-weight: 500; background: #003366; color: white;">
                                        <i class="fas fa-check-circle mr-1"></i>
                                        Confirme su selección
                                    </span>
                                </div>
                            </div>
                        </div>

                        <!-- Body -->
                        <div class="card-body p-4">

                            <!-- Mensajes de Alerta -->
                            <?php if($this->session->flashdata('success')): ?>
                                <div class="alert alert-success alert-dismissible" style="border-radius: 8px; border-left: 4px solid #28a745;">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    <i class="icon fa fa-check mr-2"></i> <?php echo $this->session->flashdata('success'); ?>
                                </div>
                            <?php endif; ?>

                            <?php if($this->session->flashdata('error')): ?>
                                <div class="alert alert-danger alert-dismissible" style="border-radius: 8px; border-left: 4px solid #dc3545;">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    <i class="icon fa fa-ban mr-2"></i> <?php echo $this->session->flashdata('error'); ?>
                                </div>
                            <?php endif; ?>

                            <?php if($this->session->flashdata('warning')): ?>
                                <div class="alert alert-warning alert-dismissible" style="border-radius: 8px; border-left: 4px solid #ffc107;">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    <i class="icon fa fa-exclamation-triangle mr-2"></i> <?php echo $this->session->flashdata('warning'); ?>
                                </div>
                            <?php endif; ?>

                            <?php if($this->session->flashdata('info')): ?>
                                <div class="alert alert-info alert-dismissible" style="border-radius: 8px; border-left: 4px solid #17a2b8;">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    <i class="icon fa fa-info-circle mr-2"></i> <?php echo $this->session->flashdata('info'); ?>
                                </div>
                            <?php endif; ?>

                            <!-- Campos ocultos -->
                            <input type="hidden" name="datos_str" value="<?php echo $datos_str; ?>">
                            <input type="hidden" name="periodo" value="<?php echo $periodo->id; ?>">
                            <input type="hidden" name="id_usuario" value="<?php echo $this->session->userdata('id'); ?>">
                            <input type="hidden" name="valor_ucredito" value="<?php if ($lista_trabajo->descuento > 0) { echo $listado->valorpubmp; } else { echo $listado->valorpubgen; } ?>">

                            <!-- Tabla de Unidades Curriculares Seleccionadas -->
                            <div class="table-responsive">
                                <table class="table table-hover" style="border-radius: 8px; overflow: hidden;">
                                    <thead style="background: linear-gradient(135deg, #003366 0%, #1a5276 100%); color: white;">
                                        <tr>
                                            <th style="padding: 10px 15px; font-weight: 500; font-size: 0.8rem; letter-spacing: 0.5px; white-space: nowrap;">
                                                <i class="fas fa-graduation-cap mr-2"></i>Programa de Postgrado
                                            </th>
                                            <th style="padding: 10px 15px; text-align: center; font-weight: 500; font-size: 0.8rem; letter-spacing: 0.5px; white-space: nowrap;">
                                                <i class="fas fa-hashtag mr-1"></i>UC
                                            </th>
                                            <th style="padding: 10px 15px; font-weight: 500; font-size: 0.8rem; letter-spacing: 0.5px;">
                                                <i class="fas fa-book mr-2"></i>Unidad Curricular
                                            </th>
                                            <th style="padding: 10px 15px; text-align: center; font-weight: 500; font-size: 0.8rem; letter-spacing: 0.5px; white-space: nowrap;">
                                                <i class="fas fa-calendar-alt mr-1"></i>Trimestre
                                            </th>
                                            <th style="padding: 10px 15px; text-align: center; font-weight: 500; font-size: 0.8rem; letter-spacing: 0.5px; white-space: nowrap;">
                                                <i class="fas fa-dollar-sign mr-1"></i>Valor UC
                                            </th>
                                            <th style="padding: 10px 15px; text-align: center; font-weight: 500; font-size: 0.8rem; letter-spacing: 0.5px; white-space: nowrap;">
                                                <i class="fas fa-money-bill-wave mr-1"></i>Total a Pagar
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if(!empty($listado)): ?>
                                            <?php 
                                                $precio_venta = 0;
                                                $Total_Pagar_uc = 0;
                                                foreach($listado as $listado):
                                                    $precio_venta += $listado->unidades_creditos;
                                            ?>
                                                <tr style="border-bottom: 1px solid #f0f0f0; transition: background 0.2s;">
                                                    <td style="padding: 10px 15px; font-size: 0.85rem; color: #2c3e50;">
                                                        <strong><?php echo $listado->programas; ?></strong>
                                                    </td>
                                                    <td style="padding: 10px 15px; text-align: center; font-size: 0.85rem;">
                                                        <span class="badge" style="font-size: 0.8rem; padding: 3px 12px; border-radius: 20px; background: #003366; color: white;">
                                                            <?php echo $listado->unidades_creditos; ?>
                                                        </span>
                                                    </td>
                                                    <td style="padding: 10px 15px; font-size: 0.85rem; color: #2c3e50;">
                                                        <?php echo $listado->pensums; ?>
                                                    </td>
                                                    <td style="padding: 10px 15px; text-align: center; font-size: 0.85rem;">
                                                        <span class="badge" style="background: #e9ecef; color: #495057; padding: 4px 12px; border-radius: 20px; font-weight: 500; font-size: 0.75rem;">
                                                            <?php echo $listado->trimestre; ?>
                                                        </span>
                                                    </td>
                                                    <td style="padding: 10px 15px; text-align: center; font-size: 0.85rem;">
                                                        <?php 
                                                            if ($lista_trabajo->descuento > 0) {
                                                                $valor_ucredito = $listado->valorpubmp;
                                                            } else {
                                                                $valor_ucredito = $listado->valorpubgen;
                                                            }
                                                            echo number_format($valor_ucredito, 2, ",", ".") . " Ref.";
                                                        ?>
                                                    </td>
                                                    <td style="padding: 10px 15px; text-align: center; font-size: 0.85rem; font-weight: 600; color: #003366;">
                                                        <?php
                                                            if($listado->tipo_programa == 3) {
                                                                $Total_Pagar = 1 * $valor_ucredito;
                                                            } else {
                                                                $Total_Pagar = $listado->unidades_creditos * $valor_ucredito;
                                                            }
                                                            $Total_Pagar_uc += $Total_Pagar;
                                                            echo number_format($Total_Pagar, 2, ",", ".") . " Ref.";
                                                        ?>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        <?php else: ?>
                                            <tr>
                                                <td colspan="6" style="padding: 30px 15px; text-align: center; color: #6c757d;">
                                                    <i class="fas fa-info-circle fa-2x d-block mb-2" style="color: #17a2b8;"></i>
                                                    <span style="font-size: 1rem;">No hay unidades curriculares seleccionadas</span>
                                                </td>
                                            </tr>
                                        <?php endif; ?>
                                    </tbody>
                                    <tfoot style="background: #f8f9fa; border-top: 2px solid #003366;">
                                        <tr>
                                            <th colspan="5" style="padding: 10px 15px; font-size: 0.9rem; color: #2c3e50; font-weight: 600; text-align: right;">
                                                <i class="fas fa-calculator" style="color: #003366; margin-right: 8px;"></i>
                                                Total a Pagar por unidades curriculares
                                            </th>
                                            <th style="padding: 10px 15px; text-align: center; font-size: 0.9rem; font-weight: 700; color: #003366; background: #e8f0fe;">
                                                <?php echo number_format($Total_Pagar_uc, 2, ",", ".") . " Ref."; ?>
                                            </th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>

                            <!-- ============================================================ -->
                            <!-- NOTA INFORMATIVA - COMPOSICIÓN DEL TOTAL A PAGAR               -->
                            <!-- ============================================================ -->
                            <div class="row mt-4">
                                <div class="col-md-12">
                                    <div class="alert alert-info" style="border-radius: 10px; border-left: 6px solid #003366; background: #e8f0fe; color: #2c3e50; box-shadow: 0 2px 8px rgba(0,0,0,0.06); padding: 16px 22px;">
                                        <div class="d-flex align-items-start flex-wrap">
                                            <!-- Ícono -->
                                            <div style="flex-shrink: 0; margin-right: 16px; margin-top: 2px;">
                                                <i class="fas fa-info-circle" style="color: #003366; font-size: 28px;"></i>
                                            </div>
                                            <!-- Contenido -->
                                            <div style="flex-grow: 1;">
                                                <h6 style="font-weight: 700; color: #003366; margin-bottom: 5px; font-size: 0.95rem;">
                                                    <i class="fas fa-calculator" style="margin-right: 6px;"></i>
                                                    Composición del Total a Pagar (Resumen de Pago)
                                                </h6>
                                                <p style="margin-bottom: 3px; color: #2c3e50; font-size: 0.9rem;">
                                                    El <strong>total a pagar</strong> está compuesto por:
                                                </p>
                                                <div style="display: flex; flex-wrap: wrap; gap: 5px 20px; margin-top: 4px;">
                                                    <span style="font-size: 0.85rem; color: #2c3e50;">
                                                        <i class="fas fa-book-open" style="color: #28a745;"></i>
                                                        <strong>+</strong> Unidades curriculares
                                                    </span>
                                                    <span style="font-size: 0.85rem; color: #2c3e50;">
                                                        <i class="fas fa-file-signature" style="color: #003366;"></i>
                                                        <strong>+</strong> Arancel de Inscripción
                                                    </span>
                                                    <span style="font-size: 0.85rem; color: #2c3e50;">
                                                        <i class="fas fa-clock" style="color: #e67e22;"></i>
                                                        <strong>+</strong> Arancel de Permanencia
                                                    </span>
                                                    <span style="font-size: 0.85rem; color: #2c3e50;">
                                                        <i class="fas fa-exclamation-triangle" style="color: #dc3545;"></i>
                                                        <strong>+</strong> Recargo Fuera de Lapso
                                                    </span>
                                                    <span style="font-size: 0.85rem; color: #6c757d;">
                                                        <i class="fas fa-ellipsis-h"></i>
                                                        otros conceptos aplicables
                                                    </span>
                                                </div>
                                                <hr style="margin: 6px 0; border-top: 1px dashed #ced4da;">
                                                <p style="margin-bottom: 0; font-size: 0.82rem; color: #495057;">
                                                    <i class="fas fa-check-circle" style="color: #28a745;"></i>
                                                    <strong>Fórmula:</strong> 
                                                    <span style="background: #ffffff; padding: 2px 14px; border-radius: 12px; font-weight: 500; border: 1px solid #dee2e6;">
                                                        Total = UC + Inscripción + Permanencia + Fuera de lapso + otros
                                                    </span>
                                                </p>
                                            </div>
                                            <!-- Badge -->
                                            <div style="flex-shrink: 0; margin-left: 15px;">
                                                <span class="badge" style="background: #003366; color: white; padding: 6px 14px; border-radius: 20px; font-size: 0.7rem; font-weight: 600;">
                                                    <i class="fas fa-info-circle"></i> Importante
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- ============================================================ -->
                            <!-- FIN NOTA INFORMATIVA                                          -->
                            <!-- ============================================================ -->

                            <!-- Botones de Acción (AdminLTE rectangulares) -->
                            <div class="row mt-4">
                                <div class="col-md-12 text-center">
                                    <button type="submit" name="btnguardar" value="Guardar" class="btn btn-primary" style="border-radius: 10px; padding: 10px 40px; font-weight: 500; transition: all 0.3s; margin-left: 8px;">
                                        <i class="fas fa-save mr-2"></i>
                                        Registrar Unidades Curriculares
                                    </button>
                                    <button type="button" name="btnAnterior" class="btn btn-default" style="border-radius: 10px; padding: 10px 30px; font-weight: 500; transition: all 0.3s;" onClick="anterior();">
                                        <i class="fas fa-arrow-left mr-2"></i>
                                        Volver
                                    </button>
                                </div>
                            </div>

                        </div><!-- /.card-body -->
                    </div><!-- /.card -->
                </div><!-- /.card-body -->
            </div><!-- /.card -->
        </form>
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
    
    /* Alertas con iconos */
    .alert i.icon {
        margin-right: 5px;
    }
    
    /* Ajuste para móviles */
    @media (max-width: 992px) {
        .table {
            font-size: 0.8rem !important;
        }
        .table td, .table th {
            padding: 8px 10px !important;
            font-size: 0.75rem !important;
            white-space: nowrap;
        }
        .btn {
            padding: 8px 20px !important;
            font-size: 0.9rem !important;
        }
    }
    
    @media (max-width: 768px) {
        .card-title {
            font-size: 1rem !important;
        }
        .table td, .table th {
            padding: 6px 8px !important;
            font-size: 0.7rem !important;
        }
        .badge {
            font-size: 0.6rem !important;
            padding: 2px 8px !important;
        }
        .btn {
            padding: 6px 16px !important;
            font-size: 0.8rem !important;
            width: 100%;
            margin-bottom: 5px;
        }
        .btn-default {
            margin-left: 0 !important;
        }
    }
    
    @media (max-width: 576px) {
        .table td, .table th {
            padding: 4px 6px !important;
            font-size: 0.65rem !important;
        }
        .table-responsive {
            border: none;
        }
    }
</style>