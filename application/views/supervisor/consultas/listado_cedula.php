<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" style="background: #f4f6f9;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0" style="font-weight: 300; color: #003366;">
                        <i class="fas fa-file-pdf" style="color: #003366; margin-right: 8px;"></i>
                        <span style="color: #003366; font-weight: 600;">SCE-ENFMP</span>
                        <span style="color: #2c3e50; font-weight: 300;"> - Planillas de Inscripción</span>
                    </h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right" style="background: transparent;">
                        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>dashboard04/home" style="color: #6c757d;">Inicio</a></li>
                    
                        <li class="breadcrumb-item active" style="color: #003366; font-weight: 600;">Períodos Inscripción Anteriores - Planillas</li>
                    </ol>
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
                                    <i class="fas fa-file-alt text-white" style="font-size: 1.1rem;"></i>
                                </div>
                                <div>
                                    <h5 class="mb-0" style="font-weight: 600; color: #2c3e50;">
                                        <strong>Planillas de Inscripción del Estudiante</strong>
                                    </h5>
                                    <small class="text-muted" style="font-size: 0.75rem;">
                                        <i class="fas fa-calendar-alt mr-1"></i>
                                        Consulta de planillas registradas
                                    </small>
                                </div>
                            </div>
                            <div>
                                <span class="badge" style="font-size: 0.8rem; padding: 5px 16px; border-radius: 20px; font-weight: 500; background: #003366; color: white;">
                                    <i class="fas fa-print mr-1"></i>
                                    Descargar Planillas
                                </span>
                            </div>
                        </div>
                    </div>

                    <!-- Body -->
                    <div class="card-body p-4">

                        <!-- Alertas -->
                        <?php if ($this->session->flashdata("error")): ?>
                            <div class="alert alert-danger alert-dismissible" style="border-radius: 8px; border-left: 4px solid #dc3545;">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <i class="icon fa fa-ban mr-2"></i> <?php echo $this->session->flashdata("error"); ?>
                            </div>
                        <?php endif; ?>

                        <?php if ($this->session->flashdata("success")): ?>
                            <div class="alert alert-success alert-dismissible" style="border-radius: 8px; border-left: 4px solid #28a745;">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <i class="icon fa fa-check mr-2"></i> <?php echo $this->session->flashdata("success"); ?>
                            </div>
                        <?php endif; ?>

                        <?php if(!empty($alumno_list)): ?>
                        <!-- Datos del Estudiante -->
                        <div class="card card-info card-outline" style="border-radius: 8px; border-left: 4px solid #003366; border-top: none;">
                            <div class="card-header" style="background: #e8f0fe; border-bottom: 1px solid #e8e8e8; padding: 10px 18px; border-radius: 8px 8px 0 0;">
                                <div class="d-flex align-items-center justify-content-between flex-wrap">
                                    <h6 class="mb-0" style="font-weight: 600; color: #003366;">
                                        <i class="fas fa-user-graduate" style="color: #003366; margin-right: 8px;"></i>
                                        Datos del Estudiante
                                    </h6>
                                    <?php if($this->session->userdata("rol")==2 or $this->session->userdata("rol")==4): ?>
                                        <a href="<?php echo base_url(); ?>consultas/modificar_datos/<?php echo $alumno_list->id_usuario; ?>" class="btn btn-primary" style="border-radius: 0px; padding: 4px 16px; font-size: 0.8rem;">
                                            <i class="fas fa-edit mr-1"></i> Editar
                                        </a>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="card-body p-3">
                                <div class="table-responsive">
                                    <table class="table" style="margin-bottom: 0;">
                                        <tbody>
                                            <tr>
                                                <td style="padding: 6px 12px; font-weight: 500; color: #2c3e50; width: 30%;">
                                                    <i class="fas fa-id-card" style="color: #003366; width: 20px;"></i> Cédula de Identidad:
                                                </td>
                                                <td style="padding: 6px 12px; color: #2c3e50; width: 70%;">
                                                    <strong><?php echo $alumno_list->nacionalidad . '-' . $alumno_list->cedula; ?></strong>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="padding: 6px 12px; font-weight: 500; color: #2c3e50;">
                                                    <i class="fas fa-user" style="color: #003366; width: 20px;"></i> Nombre(s) y Apellido(s):
                                                </td>
                                                <td style="padding: 6px 12px; color: #2c3e50;">
                                                    <strong><?php echo $alumno_list->nombre_primer . ' ' . $alumno_list->nombre_segundo . ' ' . $alumno_list->apellido_primer . ' ' . $alumno_list->apellido_segundo; ?></strong>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="padding: 6px 12px; font-weight: 500; color: #2c3e50;">
                                                    <i class="fas fa-envelope" style="color: #003366; width: 20px;"></i> Correo Electrónico:
                                                </td>
                                                <td style="padding: 6px 12px; color: #2c3e50;">
                                                    <strong><?php echo $alumno_list->correo; ?></strong>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="padding: 6px 12px; font-weight: 500; color: #2c3e50;">
                                                    <i class="fas fa-phone" style="color: #003366; width: 20px;"></i> Teléfono(s):
                                                </td>
                                                <td style="padding: 6px 12px; color: #2c3e50;">
                                                    <strong><?php echo $alumno_list->telefono_cel; echo " -- " . $alumno_list->telefono_hab; ?></strong>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="padding: 6px 12px; font-weight: 500; color: #2c3e50;">
                                                    <i class="fas fa-map-marker-alt" style="color: #003366; width: 20px;"></i> Estado Residencia:
                                                </td>
                                                <td style="padding: 6px 12px; color: #2c3e50;">
                                                    <strong><?php echo strtoupper($alumno_list->residencia); ?></strong>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="padding: 6px 12px; font-weight: 500; color: #2c3e50;">
                                                    <i class="fas fa-briefcase" style="color: #003366; width: 20px;"></i> Lugar de Trabajo:
                                                </td>
                                                <td style="padding: 6px 12px; color: #2c3e50;">
                                                    <strong><?php echo $alumno_list->lugar_trabajo; ?></strong>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <?php endif; ?>

                        <?php if ($rol==5 or $rol==2 or $rol==4 or $rol==3): ?>
                        <!-- Períodos Inscritos - Estudiante Regular -->
                        <div class="card card-success card-outline" style="border-radius: 8px; border-left: 4px solid #28a745; border-top: none; margin-top: 20px;">
                            <div class="card-header" style="background: #e8f5e9; border-bottom: 1px solid #e8e8e8; padding: 10px 18px; border-radius: 8px 8px 0 0;">
                                <h6 class="mb-0" style="font-weight: 600; color: #1e7e34;">
                                    <i class="fas fa-user-graduate" style="color: #28a745; margin-right: 8px;"></i>
                                    Períodos Inscritos - Estudiante Regular
                                </h6>
                            </div>
                            <div class="card-body p-0">
                                <div class="table-responsive">
                                    <table class="table table-hover" style="border-radius: 8px; overflow: hidden; margin-bottom: 0;">
                                        <thead style="background: linear-gradient(135deg, #003366 0%, #1a5276 100%); color: white;">
                                            <tr>
                                                <th style="padding: 10px 15px; font-weight: 500; font-size: 0.8rem; letter-spacing: 0.5px;">
                                                    <i class="fas fa-calendar-alt mr-2"></i>Período
                                                </th>
                                                <th style="padding: 10px 15px; font-weight: 500; font-size: 0.8rem; letter-spacing: 0.5px;">
                                                    <i class="fas fa-graduation-cap mr-2"></i>Especialización
                                                </th>
                                                <th style="padding: 10px 15px; text-align: center; font-weight: 500; font-size: 0.8rem; letter-spacing: 0.5px;">
                                                    <i class="fas fa-print mr-2"></i>Descargar Planilla
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if(!empty($total_inscritos)): ?>
                                                <?php foreach($total_inscritos as $total_inscritos): ?>
                                                    <tr style="border-bottom: 1px solid #f0f0f0;">
                                                        <td style="padding: 10px 15px; font-size: 0.85rem; color: #2c3e50;">
                                                            <strong><?php echo $total_inscritos->periodo; ?></strong>
                                                        </td>
                                                        <td style="padding: 10px 15px; font-size: 0.85rem; color: #2c3e50;">
                                                            <?php echo $total_inscritos->programa; ?>
                                                        </td>
                                                        <td style="padding: 10px 15px; text-align: center;">
                                                            <a href="<?php echo base_url(); ?>consultas/planilla/<?php echo $total_inscritos->id_usuario; ?>/<?php echo $total_inscritos->id_programa; ?>/<?php echo $total_inscritos->id_periodo; ?>" class="btn" style="border-radius: 10px; padding: 4px 16px; background: #ffc107; color: #856404; font-weight: 500; transition: all 0.2s;">
                                                                <i class="fas fa-print mr-1"></i> Imprimir
                                                            </a>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            <?php else: ?>
                                                <tr>
                                                    <td colspan="3" style="padding: 20px 15px; text-align: center; color: #6c757d;">
                                                        <i class="fas fa-info-circle fa-2x d-block mb-2" style="color: #17a2b8;"></i>
                                                        <span style="font-size: 1rem;">No hay períodos inscritos como estudiante regular</span>
                                                    </td>
                                                </tr>
                                            <?php endif; ?>
                                        </tbody>
                                        <tfoot style="background: #f8f9fa; border-top: 2px solid #003366;">
                                            <tr>
                                                <th colspan="3" style="padding: 10px 15px; font-size: 0.8rem; color: #6c757d; font-weight: 400; text-align: center;">
                                                    <i class="fas fa-info-circle" style="color: #003366; margin-right: 4px;"></i>
                                                    Total de períodos inscritos: <strong><?php echo isset($total_inscritos) ? count($total_inscritos) : 0; ?></strong>
                                                </th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <?php endif; ?>

                        <?php if ($rol==7 or $rol==2 or $rol==5 or $rol==4 or $rol==3): ?>
                        <!-- Períodos Inscritos - Aspirante -->
                        <div class="card card-warning card-outline" style="border-radius: 8px; border-left: 4px solid #ffc107; border-top: none; margin-top: 20px;">
                            <div class="card-header" style="background: #fffbf0; border-bottom: 1px solid #e8e8e8; padding: 10px 18px; border-radius: 8px 8px 0 0;">
                                <h6 class="mb-0" style="font-weight: 600; color: #856404;">
                                    <i class="fas fa-user-plus" style="color: #ffc107; margin-right: 8px;"></i>
                                    Períodos Inscritos - Aspirante
                                </h6>
                            </div>
                            <div class="card-body p-0">
                                <div class="table-responsive">
                                    <table class="table table-hover" style="border-radius: 8px; overflow: hidden; margin-bottom: 0;">
                                        <thead style="background: linear-gradient(135deg, #003366 0%, #1a5276 100%); color: white;">
                                            <tr>
                                                <th style="padding: 10px 15px; font-weight: 500; font-size: 0.8rem; letter-spacing: 0.5px;">
                                                    <i class="fas fa-calendar-alt mr-2"></i>Período
                                                </th>
                                                <th style="padding: 10px 15px; font-weight: 500; font-size: 0.8rem; letter-spacing: 0.5px;">
                                                    <i class="fas fa-graduation-cap mr-2"></i>Especialización
                                                </th>
                                                <th style="padding: 10px 15px; text-align: center; font-weight: 500; font-size: 0.8rem; letter-spacing: 0.5px;">
                                                    <i class="fas fa-print mr-2"></i>Descargar Planilla
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if(!empty($aspirante)): ?>
                                                <?php foreach($aspirante as $aspirante): ?>
                                                    <tr style="border-bottom: 1px solid #f0f0f0;">
                                                        <td style="padding: 10px 15px; font-size: 0.85rem; color: #2c3e50;">
                                                            <strong><?php echo $aspirante->periodo; ?></strong>
                                                        </td>
                                                        <td style="padding: 10px 15px; font-size: 0.85rem; color: #2c3e50;">
                                                            <?php echo $aspirante->programa; ?>
                                                        </td>
                                                        <td style="padding: 10px 15px; text-align: center;">
                                                            <a href="<?php echo base_url(); ?>consultas/planilla_pre_asp/<?php echo $aspirante->id_usuario; ?>/<?php echo $aspirante->id_programa; ?>/<?php echo $aspirante->id_periodo; ?>" class="btn" style="border-radius: 10px; padding: 4px 16px; background: #ffc107; color: #856404; font-weight: 500; transition: all 0.2s;">
                                                                <i class="fas fa-print mr-1"></i> Imprimir
                                                            </a>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            <?php else: ?>
                                                <tr>
                                                    <td colspan="3" style="padding: 20px 15px; text-align: center; color: #6c757d;">
                                                        <i class="fas fa-info-circle fa-2x d-block mb-2" style="color: #17a2b8;"></i>
                                                        <span style="font-size: 1rem;">No hay períodos inscritos como aspirante</span>
                                                    </td>
                                                </tr>
                                            <?php endif; ?>
                                        </tbody>
                                        <tfoot style="background: #f8f9fa; border-top: 2px solid #003366;">
                                            <tr>
                                                <th colspan="3" style="padding: 10px 15px; font-size: 0.8rem; color: #6c757d; font-weight: 400; text-align: center;">
                                                    <i class="fas fa-info-circle" style="color: #003366; margin-right: 4px;"></i>
                                                    Total de períodos inscritos: <strong><?php echo isset($aspirante) ? count($aspirante) : 0; ?></strong>
                                                </th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <?php endif; ?>

                        <!-- Botón Regresar -->
                        <?php if ($this->session->userdata('rol')==2): ?>
                            <div class="row mt-4">
                                <div class="col-md-12 text-center">
                                    <a href="<?php echo base_url(); ?>consultas/buscar_cedula" class="btn btn-info" style="border-radius: 0px; padding: 10px 30px; font-weight: 500; transition: all 0.3s;" title="Haz clic para REGRESAR">
                                        <i class="fas fa-arrow-left mr-2"></i>
                                        Regresar
                                    </a>
                                </div>
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
    
    /* Efecto hover en botones de imprimir */
    .btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.15);
    }
    
    /* Efecto hover en botón regresar */
    .btn-info {
        background-color: #17a2b8;
        border-color: #17a2b8;
        color: #fff;
        transition: all 0.2s ease;
    }
    
    .btn-info:hover {
        background-color: #138496;
        border-color: #117a8b;
        box-shadow: 0 2px 8px rgba(23, 162, 184, 0.3);
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
            padding: 6px 16px !important;
            font-size: 0.8rem !important;
            width: 100%;
            margin-bottom: 5px;
        }
        .d-flex.align-items-center.justify-content-between {
            flex-direction: column;
            align-items: flex-start !important;
        }
        .d-flex.align-items-center.justify-content-between .btn {
            margin-top: 8px;
        }
    }
    
    @media (max-width: 576px) {
        .table td, .table th {
            padding: 6px 8px !important;
            font-size: 0.7rem !important;
        }
        .badge {
            font-size: 0.6rem !important;
        }
        .table-responsive {
            border: none;
        }
    }
</style>