<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" style="background: #f4f6f9;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-3">
                <div class="col-12">
                    <div class="d-flex justify-content-between align-items-center flex-wrap">
                        <h4 class="m-0" style="font-weight: 300; color: #003366;">
                            <i class="fas fa-university" style="color: #003366; margin-right: 8px;"></i>
                            <span style="color: #003366; font-weight: 600;">SCE-</span>
                            <span style="color: #2c3e50; font-weight: 300;">ENFMP</span>
                        </h4>
                        
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            
            <!-- Tarjeta de Bienvenida -->
            <div class="row">
                <div class="col-12">
                    <div class="card shadow-sm" style="border-radius: 12px; border: none; border-left: 5px solid #003366; background: linear-gradient(135deg, #ffffff 0%, #f8f9fa 100%);">
                        <div class="card-body py-3">
                            <div class="d-flex align-items-center flex-wrap">
                                <div class="mr-3" style="flex-shrink: 0;">
                                    <img src="<?php echo base_url(); ?>assets/img/logo2.png" alt="Logo" style="width: 55px; height: 55px; border-radius: 50%; border: 2px solid #e9ecef; padding: 3px; background: white;">
                                </div>
                                <div class="flex-grow-1">
                                    <h5 class="mb-1" style="font-weight: 400; color: #2c3e50;">
                                        <i class="fas fa-hand-wave text-warning mr-2"></i>
                                        Bienvenido/a, 
                                        <strong style="color: #003366;">
                                            <?php echo $this->session->userdata('nombre') . ' ' . $this->session->userdata('apellido'); ?>
                                        </strong>
                                    </h5>
                                    <div class="d-flex align-items-center flex-wrap">
                                    <span class="badge" style="font-size: 1rem; padding: 5px 8px; border-radius: 20px; background: #003366; color: white;">
                                            <i class="fas fa-user-graduate mr-1"></i>
                                            <?php if($this->session->userdata('rol') == 5): ?>
                                                ESTUDIANTE REGULAR
                                            <?php elseif($this->session->userdata('rol') == 8): ?>
                                                NUEVO INGRESO
                                            <?php endif; ?>
                                        </span>

                                        <span class="text-muted" style="font-size: 0.85rem; margin-left: 12px;">
                                            <i class="fas fa-calendar-alt mr-1"> </i>
                                            <?php echo date('d/m/Y'); ?>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Tarjetas de Acceso Rápido -->
            <div class="row mt-4 justify-content-center">
                
                <!-- Control de Estudio -->
                <div class="col-md-3 col-sm-6 col-12 mb-3">
                    <div class="info-box shadow-sm" style="border-radius: 12px; border: none; border-bottom: 4px solid #17a2b8; background: white; transition: transform 0.2s, box-shadow 0.2s; height: 100%;">
                        <span class="info-box-icon" style="background: linear-gradient(135deg, #17a2b8 0%, #0f7c8f 100%); border-radius: 12px 0 0 12px; min-width: 70px;">
                            <i class="fas fa-graduation-cap" style="font-size: 1.8rem;"></i>
                        </span>
                        <div class="info-box-content p-3">
                            <span class="info-box-text" style="font-weight: 600; font-size: 0.85rem; text-transform: uppercase; color: #17a2b8; letter-spacing: 0.5px;">
                                CONTROL DE ESTUDIO
                            </span>
                            <div class="mt-2">
                                <a href="<?php echo base_url(); ?>dashboard04/index" style="text-decoration: none; color: inherit;">
                                    <small class="d-block text-muted" style="font-size: 0.8rem;">
                                        <i class="fas fa-chevron-right text-info mr-1" style="font-size: 0.6rem;"></i>
                                        Información del estudiante
                                    </small>
                                </a>
                                <a href="<?php echo base_url(); ?>dashboard04/proceso" style="text-decoration: none; color: inherit;">
                                    <small class="d-block text-muted" style="font-size: 0.8rem;">
                                        <i class="fas fa-chevron-right text-info mr-1" style="font-size: 0.6rem;"></i>
                                        Estatus Proceso Inscripciones Postgrado 
                                    </small>
                                </a>
                                <a href="<?php echo base_url(); ?>consultas/ver_planilla_cedula" class="d-block" style="font-size: 0.8rem; color: #495057; text-decoration: none; transition: color 0.2s;">
                                    <small class="d-block text-muted" style="font-size: 0.8rem;">
                                        <i class="fas fa-chevron-right text-info mr-1" style="font-size: 0.6rem;"></i>
                                        Planillas de Inscripción
                                    </small>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Trámites -->
                <?php if($this->session->userdata('rol') == 5 || $this->session->userdata('inscripcion') == 1): ?>
                <div class="col-md-3 col-sm-6 col-12 mb-3">
                    <div class="info-box shadow-sm" style="border-radius: 12px; border: none; border-bottom: 4px solid #28a745; background: white; transition: transform 0.2s, box-shadow 0.2s; height: 100%;">
                        <span class="info-box-icon" style="background: linear-gradient(135deg, #28a745 0%, #1e7e34 100%); border-radius: 12px 0 0 12px; min-width: 70px;">
                            <i class="fas fa-file-alt" style="font-size: 1.8rem;"></i>
                        </span>
                        <div class="info-box-content p-3">
                            <span class="info-box-text" style="font-weight: 600; font-size: 0.85rem; text-transform: uppercase; color: #28a745; letter-spacing: 0.5px;">
                                TRÁMITES
                            </span>
                            <div class="mt-2">
                                <a href="<?php echo base_url(); ?>dashboard09/index/2" class="d-block" style="font-size: 0.8rem; color: #495057; text-decoration: none; transition: color 0.2s;">
                                    <i class="fas fa-chevron-right text-success mr-1" style="font-size: 0.6rem;"></i>
                                    Otros Trámites Administrativos
                                </a>
                                
                                <?php                               
                                if($this->session->userdata('ruc') == 1 ):
                                ?>
                                   <a href="<?php echo base_url(); ?>dashboard09/solicitud_ruc_requisitos/2" class="d-block" style="font-size: 0.8rem; color: #495057; text-decoration: none; transition: color 0.2s;">
                                        <i class="fas fa-chevron-right text-success mr-1" style="font-size: 0.6rem;"></i>
                                        Solicitud de RUC
                                   </a>
                                <?php endif; 
                                if($this->session->userdata('ruc_aprobadas') == 1): ?>
                                  <a href="<?php echo base_url(); ?>dashboard09/solicitud_ruc/2" class="d-block" style="font-size: 0.8rem; color: #495057; text-decoration: none; transition: color 0.2s;">
                                        <i class="fas fa-chevron-right text-success mr-1" style="font-size: 0.6rem;"></i>
                                        Pago de RUC Aprobadas
                                   </a>
                                 <?php endif; 
                                if($this->session->userdata('reincorporacion') == 1): ?>
                                    <a href="<?php echo base_url(); ?>dashboard09/solicitud_reincorporacion/2" class="d-block" style="font-size: 0.8rem; color: #495057; text-decoration: none; transition: color 0.2s;">
                                        <i class="fas fa-chevron-right text-success mr-1" style="font-size: 0.6rem;"></i>
                                        Reincorporación
                                    </a>
                                <?php endif; ?>
                                
                                <a href="<?php echo base_url(); ?>dashboard09/index/1" class="d-block mt-1" style="font-size: 0.8rem; color: #495057; text-decoration: none; transition: color 0.2s;">
                                    <i class="fas fa-chevron-right text-success mr-1" style="font-size: 0.6rem;"></i>
                                    Solicitudes de Trámites Académicos
                                </a>
                                <small class="d-block text-muted" style="font-size: 0.8rem;">
                                    <i class="fas fa-chevron-right text-success mr-1" style="font-size: 0.6rem;"></i>
                                    Retiro Voluntario
                                </small>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endif; ?>

                <!-- Tarjeta de Información Adicional -->
                <div class="col-md-3 col-sm-6 col-12 mb-3">
                    <div class="info-box shadow-sm" style="border-radius: 12px; border: none; border-bottom: 4px solid #6f42c1; background: white; transition: transform 0.2s, box-shadow 0.2s; height: 100%;">
                        <span class="info-box-icon" style="background: linear-gradient(135deg, #6f42c1 0%, #5a2d91 100%); border-radius: 12px 0 0 12px; min-width: 70px;">
                            <i class="fas fa-info-circle" style="font-size: 1.8rem;"></i>
                        </span>
                        <div class="info-box-content p-3">
                            <span class="info-box-text" style="font-weight: 600; font-size: 0.85rem; text-transform: uppercase; color: #6f42c1; letter-spacing: 0.5px;">
                                MI PERFIL
                            </span>
                            <div class="mt-2">
                                <small class="d-block text-muted" style="font-size: 0.8rem;">
                                    <i class="fas fa-chevron-right text-primary mr-1" style="font-size: 0.6rem;"></i>
                                    <?php echo $this->session->userdata('username') ? 'Usuario Activo: ' . $this->session->userdata('username') : 'Cédula no registrada'; ?>
                                </small>
                                <small class="d-block text-muted" style="font-size: 0.8rem;">
                                    <i class="fas fa-chevron-right text-primary mr-1" style="font-size: 0.6rem;"></i>
                                    <a href="<?php echo base_url(); ?>auth/cambio_clave" style="text-decoration: none; color: inherit;"> Cambiar de Clave</a>
                                </small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Separador decorativo -->
            <div class="row mt-3">
                <div class="col-12">
                    <hr style="border-top: 2px solid #e9ecef; width: 100%; margin: 10px 0;">
                </div>
            </div>

            <!-- Anuncios y Noticias -->
            <div class="row mt-3">
                <div class="col-12">
                    <div class="card shadow-sm" style="border-radius: 12px; border: none; background: white;">
                        <div class="card-header bg-transparent" style="border-bottom: 2px solid #e9ecef; padding: 15px 20px;">
                            <h6 class="mb-0" style="font-weight: 600; color: #2c3e50;">
                                <i class="fas fa-bullhorn text-warning mr-2"></i>
                                Anuncios Institucionales
                            </h6>
                        </div>
                        <div class="card-body" style="padding: 15px 20px;">
                            <div class="row">
                                <div class="col-md-6 mb-2">
                                    <div class="d-flex align-items-start">
                                        <i class="fas fa-circle text-success mr-2" style="font-size: 0.5rem; margin-top: 6px;"></i>
                                        <div>
                                            <small class="d-block" style="font-size: 0.85rem; color: #2c3e50;">
                                                <strong>Período de Inscripción:</strong> <?php echo$periodo->nombre;?>
                                            </small>
                                        </div>
                                    </div>
                                </div>
                               
                                <div class="col-md-6 mb-2">
                                    <div class="d-flex align-items-start">
                                        <i class="fas fa-circle text-danger mr-2" style="font-size: 0.5rem; margin-top: 6px;"></i>
                                        <div>
                                            <small class="d-block" style="font-size: 0.85rem; color: #2c3e50;">
                                                <strong>Fechas Importantes:</strong> Consulta el calendario académico
                                            </small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div><!-- /.container-fluid -->
    </section>
    <!-- /.section content -->
</div>
<!-- /.content-wrapper -->

<!-- Estilos adicionales para CodeIgniter 3 -->
<style>
    /* Efectos hover para tarjetas */
    .info-box {
        transition: transform 0.3s ease, box-shadow 0.3s ease !important;
        cursor: default;
    }
    
    .info-box:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0,0,0,0.1) !important;
    }
    
    /* Enlaces dentro de tarjetas */
    .info-box-content a {
        transition: color 0.2s ease;
    }
    
    .info-box-content a:hover {
        color: #007bff !important;
        text-decoration: underline !important;
    }
    
    /* Mejora de tipografía */
    body {
        font-family: 'Segoe UI', Roboto, 'Helvetica Neue', sans-serif;
    }
    
    /* Asegurar que los estilos de CodeIgniter se mantengan */
    .content-wrapper {
        min-height: 100vh;
    }
    
    /* Responsive */
    @media (max-width: 576px) {
        .info-box {
            flex-direction: column;
        }
        .info-box-icon {
            border-radius: 12px 12px 0 0 !important;
            min-width: 100% !important;
            padding: 15px 0;
            text-align: center;
        }
        .info-box-content {
            padding: 12px !important;
        }
        .card-header .d-flex {
            flex-direction: column;
            align-items: flex-start !important;
        }
        .breadcrumb {
            margin-top: 8px;
        }
    }
    
    /* Mejora de visibilidad en móviles */
    @media (max-width: 768px) {
        .badge {
            font-size: 0.75rem !important;
            padding: 4px 12px !important;
        }
        .info-box-text {
            font-size: 0.75rem !important;
        }
    }
</style>