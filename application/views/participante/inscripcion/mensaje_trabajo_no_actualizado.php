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
                        <span style="color: #2c3e50; font-weight: 300;"> - Validación de Información</span>
                    </h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right" style="background: transparent;">
                        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>dashboard04/home" style="color: #6c757d;">Inicio</a></li>
                        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>dashboard04/index" style="color: #6c757d;">Información del Estudiante</a></li>                        
                        <li class="breadcrumb-item active" style="color: #003366; font-weight: 600;">Inscripciones Postgrado - Validación</li>
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
                                    <i class="fas fa-shield-alt text-white" style="font-size: 1.1rem;"></i>
                                </div>
                                <div>
                                    <h5 class="mb-0" style="font-weight: 600; color: #2c3e50;">
                                        <strong>Validación de Información del Estudiante</strong>
                                    </h5>
                                    <small class="text-muted" style="font-size: 0.75rem;">
                                        <i class="fas fa-calendar-alt mr-1"></i>
                                        Período: <strong><?php echo $periodo->nombre; ?></strong>
                                    </small>
                                </div>
                            </div>
                            <div>
                                <span class="badge" style="font-size: 0.8rem; padding: 5px 16px; border-radius: 10px; font-weight: 500; background: #ffc107; color: #856404;">
                                    <i class="fas fa-exclamation-triangle mr-1"></i>
                                    Requiere Actualización
                                </span>
                            </div>
                        </div>
                    </div>

                    <!-- Body -->
                    <div class="card-body p-4">

                        <!-- Mensaje de Alerta -->
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

                        <!-- Alerta Principal -->
                        <div class="alert alert-warning" style="border-radius: 8px; border-left: 4px solid #ffc107; background: #fffbf0;">
                            <h4 style="color: #856404; font-weight: 600; margin-bottom: 10px;">
                                <i class="icon fa fa-warning" style="color: #ffc107;"></i> ¡Atención!
                            </h4>
                            <p style="color: #2c3e50; font-size: 1rem;"><?php echo $mensaje; ?></p>
                                  

                        <!-- Información del Período -->
                      
                            <div style="display: flex; align-items: flex-start;">
                                <i class="fa fa-info-circle" style="color: #003366; font-size: 1.2rem; margin-right: 12px; margin-top: 2px;"></i>
                                <div>
                                    <p style="color: #2c3e50; margin: 4px 0;">
                                        <strong style="color: #003366;">Fecha de inicio del período:</strong> 
                                        <?php echo date('d-m-Y', strtotime($tiempo_pre->fecha_inicio)); ?>
                                    </p>
                                    <p style="color: #2c3e50; margin: 4px 0;">
                                        <i class="fas fa-check-circle" style="color: #28a745; margin-right: 4px;"></i>
                                        <strong>Sus datos personales como correo electrónico, teléfonos deben estar actualizados a partir de esta fecha.</strong>
                                    </p>
                                    <p style="color: #2c3e50; margin: 4px 0;">
                                        <i class="fas fa-check-circle" style="color: #28a745; margin-right: 4px;"></i>
                                        <strong>Su domicilio debe estar actualizado a partir de esta fecha.</strong>
                                    </p>
                                    <p style="color: #2c3e50; margin: 4px 0;">
                                        <i class="fas fa-check-circle" style="color: #28a745; margin-right: 4px;"></i>
                                        <strong>Sus datos laborales debe estar actualizado a partir de esta fecha.</strong>
                                    </p>
                            </div>
                        </div>
                        </div>
                        <hr style="border-top: 2px solid #e9ecef; margin: 20px 0;">

                        <!-- Callout Requisito -->
                        <div class="callout" style="border-radius: 8px; border-left: 4px solid #dc3545; background: #fef0f0; padding: 20px; margin-bottom: 20px;">
                            <h4 style="color: #721c24; font-weight: 600;">
                                <i class="fas fa-exclamation-circle" style="color: #dc3545; margin-right: 8px;"></i>
                                Requisito para la inscripción
                            </h4>
                            <p style="color: #2c3e50; font-size: 0.95rem;">
                                Para poder realizar su inscripción, debe actualizar sus <strong style="color: #003366;">datos personales,domicilio y laborales</strong> en el período actual.
                            </p>
                            <p style="color: #2c3e50; font-size: 0.95rem;">
                                Por favor, diríjase a la sección <strong style="color: #003366;">"Datos Personales", "Dirección de Domicilio" y "Datos Laborales"</strong> en el menú lateral y registre su información actualizada.
                            </p>
                        </div>
                        <!-- Botones de Acción -->
                        <div class="row">
                            <div class="col-md-4 text-center" style="margin-bottom: 10px;">
                                <a href="<?php echo base_url(); ?>dashboard04/datos" class="btn  btn-primary" style="border-radius: 10px; padding: 12px 30px; font-weight: 500;  transition: all 0.3s; width: 100%; max-width: 280px;">
                                    <i class="fa fa-edit mr-2"></i> Actualizar Datos Personales
                                </a>
                            </div>
                            <div class="col-md-4 text-center" style="margin-bottom: 10px;">
                                <a href="<?php echo base_url(); ?>dashboard04/datos1" class="btn  btn-primary" style="border-radius: 10px; padding: 12px 30px;  transition: all 0.3s; width: 100%; max-width: 280px;">
                                    <i class="fa fa-edit mr-2"></i> Actualizar Dirección de Domicilio
                                </a>
                            </div>
                            <div class="col-md-4 text-center" style="margin-bottom: 10px;">
                                <a href="<?php echo base_url(); ?>dashboard04/datos2" class="btn  btn-primary" style="border-radius: 10px; padding: 12px 30px; font-weight: 500; transition: all 0.3s; width: 100%; max-width: 280px;">
                                    <i class="fa fa-edit mr-2"></i> Actualizar Datos Laborales
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
    /* Sombras y bordes redondeados */
    .card {
        border-radius: 10px !important;
        overflow: hidden;
    }
    
    /* Efecto hover en botones */
    .btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(0, 51, 102, 0.3);
    }
    
    /* Estilo para callout */
    .callout {
        border-radius: 8px;
        padding: 20px;
        margin-bottom: 20px;
        border: 1px solid #f5c6cb;
    }
    
    .callout-danger {
        border-left-color: #dc3545;
        background: #fef0f0;
    }
    
    /* Ajuste para móviles */
    @media (max-width: 768px) {
        .card-title {
            font-size: 1rem !important;
        }
        .btn {
            padding: 10px 20px !important;
            font-size: 0.85rem !important;
            max-width: 100% !important;
        }
        .alert h4 {
            font-size: 1.1rem !important;
        }
        .alert p {
            font-size: 0.9rem !important;
        }
        .callout h4 {
            font-size: 1rem !important;
        }
        .callout p {
            font-size: 0.85rem !important;
        }
    }
    
    @media (max-width: 576px) {
        .badge {
            font-size: 0.6rem !important;
        }
        .alert h4 {
            font-size: 1rem !important;
        }
        .alert p {
            font-size: 0.85rem !important;
        }
        .callout h4 {
            font-size: 0.9rem !important;
        }
        .callout p {
            font-size: 0.8rem !important;
        }
        .col-md-6 {
            margin-bottom: 10px;
        }
    }
</style>