<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" style="background: #f4f6f9;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0" style="font-weight: 300; color: #003366;">
                        <i class="fas fa-check-circle" style="color: #003366; margin-right: 8px;"></i>
                        <span style="color: #003366; font-weight: 600;">SCE-ENFMP</span>
                        <span style="color: #2c3e50; font-weight: 300;"> - Unidades Curriculares Inscritas</span>
                    </h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right" style="background: transparent;">
                        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>dashboard04/home" style="color: #6c757d;">Inicio</a></li>

                        <li class="breadcrumb-item active" style="color: #003366; font-weight: 600;">Inscripciones Postgrado - Unidades Inscritas</li>
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

        <!-- Card Principal -->
        <div class="card card-primary card-outline shadow-sm" style="border-radius: 10px; border-top: 4px solid #003366;">
            <div class="card-body p-0">
                <div class="card" style="border: none; border-radius: 10px;">
                    
                    <!-- Header -->
                    <div class="card-header py-3" style="border-bottom: 1px solid #e8e8e8; border-radius: 10px 10px 0 0; background: #fafafa;">
                        <div class="d-flex align-items-center justify-content-between flex-wrap">
                            <div class="d-flex align-items-center">
                                <div class="mr-3" style="width: 42px; height: 42px; background: #003366; border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                                    <i class="fas fa-graduation-cap text-white" style="font-size: 1.1rem;"></i>
                                </div>
                                <div>
                                    <h5 class="mb-0" style="font-weight: 600; color: #2c3e50;">
                                        <strong>Unidades Curriculares Inscritas</strong>
                                    </h5>
                                    <small class="text-muted" style="font-size: 0.75rem;">
                                        <i class="fas fa-calendar-alt mr-1"></i>
                                        Período: <strong><?php echo $periodo->nombre; ?></strong>
                                    </small>
                                </div>
                            </div>
                            <div>
                                <span class="badge" style="font-size: 0.8rem; padding: 5px 16px; border-radius: 10px; font-weight: 500; background: #28a745; color: white;">
                                    <i class="fas fa-check-circle mr-1"></i>
                                    Inscripción Confirmada
                                </span>
                            </div>
                        </div>
                    </div>

                    <!-- Body -->
                    <div class="card-body p-4">

                        <!-- Mensajes de Alerta -->
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

                        <!-- Mensaje de Confirmación -->
                        <div class="alert alert-success" style="border-radius: 8px; border-left: 4px solid #28a745; background: #e8f5e9; text-align: center;">
                            <h4 style="color: #1e7e34; font-weight: 600; margin: 0;">
                                <i class="fas fa-check-circle" style="color: #28a745; margin-right: 10px;"></i>
                                USTED YA INSCRIBIÓ LAS SIGUIENTES UNIDADES CURRICULARES
                            </h4>
                        </div>

                        <br>

                        <!-- Tabla de Materias Inscritas -->
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
                                            <i class="fas fa-laptop mr-1"></i>Modalidad
                                        </th>
                                        <th style="padding: 10px 15px; text-align: center; font-weight: 500; font-size: 0.8rem; letter-spacing: 0.5px; white-space: nowrap;">
                                            <i class="fas fa-clock mr-1"></i>Día
                                        </th>
                                        <th style="padding: 10px 15px; text-align: center; font-weight: 500; font-size: 0.8rem; letter-spacing: 0.5px; white-space: nowrap;">
                                            <i class="fas fa-hourglass-half mr-1"></i>Horario
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if(!empty($materias)): ?>
                                        <?php foreach($materias as $materias): ?>
                                            <tr style="border-bottom: 1px solid #f0f0f0; transition: background 0.2s;">
                                                <td style="padding: 10px 15px; font-size: 0.85rem; color: #2c3e50;">
                                                    <strong><?php echo $materias->programa; ?></strong>
                                                </td>
                                                <td style="padding: 10px 15px; text-align: center; font-size: 0.85rem;">
                                                    <?php if(trim($materias->trimestre) == 'LÍNEA DE INVESTIGACIÓN'): ?>
                                                        <span class="badge badge-secondary" style="font-size: 0.7rem; padding: 3px 10px; border-radius: 20px;">-</span>
                                                    <?php else: ?>
                                                        <span class="badge" style="font-size: 0.8rem; padding: 3px 12px; border-radius: 20px; background: #003366; color: white;">
                                                            <?php echo $materias->uc; ?>
                                                        </span>
                                                    <?php endif; ?>
                                                </td>
                                                <td style="padding: 10px 15px; font-size: 0.85rem; color: #2c3e50;">
                                                    <?php echo $materias->unidad_curricular; ?>
                                                </td>
                                                <td style="padding: 10px 15px; text-align: center; font-size: 0.85rem;">
                                                    <span class="badge" style="background: #e9ecef; color: #495057; padding: 4px 12px; border-radius: 20px; font-weight: 500; font-size: 0.75rem;">
                                                        <?php echo $materias->trimestre; ?>
                                                    </span>
                                                </td>
                                                <td style="padding: 10px 15px; text-align: center; font-size: 0.85rem;">
                                                    <?php 
                                                        $modalidad_text = '';
                                                        $badge_class = '';
                                                        if($materias->modalidad == 1) {
                                                            $modalidad_text = 'PRESENCIAL';
                                                            $badge_class = 'badge-primary';
                                                        } elseif($materias->modalidad == 2) {
                                                            $modalidad_text = 'A DISTANCIA';
                                                            $badge_class = 'badge-success';
                                                        } elseif($materias->modalidad == 3) {
                                                            $modalidad_text = 'SEMIPRESENCIAL';
                                                            $badge_class = 'badge-warning';
                                                        }
                                                    ?>
                                                      <span class="badge" style="background: #e9ecef; color: #495057; padding: 4px 12px; border-radius: 20px; font-weight: 500; font-size: 0.75rem;">
                                                        <?php echo $modalidad_text; ?>
                                                    </span>
                                                </td>
                                                <td style="padding: 10px 15px; text-align: center; font-size: 0.85rem; color: #2c3e50;">
                                                    <?php echo $materias->dia_clase; ?>
                                                </td>
                                                <td style="padding: 10px 15px; text-align: center; font-size: 0.85rem; color: #2c3e50;">
                                                <span class="badge" style="background: #e9ecef; color: #495057; padding: 4px 12px; border-radius: 20px; font-weight: 500; font-size: 0.75rem;">
                                                        <?php echo $materias->horario; ?>
                                                    </span>
                                                </td>
                                            </tr>
                                        <?php $total ++;
                                      endforeach; ?>
                                    <?php else: ?>
                                        <tr>
                                            <td colspan="7" style="padding: 30px 15px; text-align: center; color: #6c757d;">
                                                <i class="fas fa-info-circle fa-2x d-block mb-2" style="color: #17a2b8;"></i>
                                                <span style="font-size: 1rem;">No hay unidades curriculares inscritas para este período</span>
                                            </td>
                                        </tr>
                                    <?php endif; ?>
                                </tbody>
                                <tfoot style="background: #f8f9fa; border-top: 2px solid #003366;">
                                    <tr>
                                        <th colspan="7" style="padding: 10px 15px; font-size: 0.8rem; color: #6c757d; font-weight: 400; text-align: center;">
                                            <i class="fas fa-info-circle" style="color: #003366; margin-right: 4px;"></i>
                                            Total de unidades curriculares inscritas: <strong><?php echo isset($materias) ? $total : 0; ?></strong>
                                        </th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>

                        <br>

                        <!-- Botones de Acción -->
                        <div class="row mt-4">
                            <div class="col-md-12 text-center">
                               
                                <a href="<?php echo base_url(); ?>dashboard04/home" class="btn btn-default" style="border-radius: 10px; padding: 10px 30px; font-weight: 500; margin-left: 8px; transition: all 0.3s;">
                                    <i class="fas fa-home mr-2"></i>
                                    Ir al Inicio
                                </a>                               
                            </div>
                        </div>

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
    
    /* Efecto hover en botones */
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
            padding: 8px 20px !important;
            font-size: 0.85rem !important;
            width: 100%;
            margin-bottom: 5px;
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
        .badge {
            font-size: 0.6rem !important;
            padding: 2px 8px !important;
        }
        .alert h4 {
            font-size: 1rem !important;
        }
    }
</style>