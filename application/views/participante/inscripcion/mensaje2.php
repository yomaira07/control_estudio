<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" style="background: #f4f6f9;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0" style="font-weight: 300; color: #003366;">
                        <i class="fas fa-exclamation-triangle" style="color: #ffc107; margin-right: 8px;"></i>
                        <span style="color: #003366; font-weight: 600;">SCE-ENFMP</span>
                        <span style="color: #2c3e50; font-weight: 300;"> - Información Requerida</span>
                    </h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right" style="background: transparent;">
                        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>dashboard04/home" style="color: #6c757d;">Inicio</a></li>
                        <li class="breadcrumb-item"><a href="#" style="color: #6c757d;">Inscripción</a></li>
                        <li class="breadcrumb-item active" style="color: #003366; font-weight: 600;">Información Requerida</li>
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
                                <div class="mr-3" style="width: 42px; height: 42px; background: #ffc107; border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                                    <i class="fas fa-exclamation text-white" style="font-size: 1.1rem;"></i>
                                </div>
                                <div>
                                    <h5 class="mb-0" style="font-weight: 600; color: #2c3e50;">
                                        <strong>Actualización de Datos Requerida</strong>
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
                                    Datos Pendientes
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

                        <?php if ($this->session->flashdata("warning")): ?>
                            <div class="alert alert-warning alert-dismissible" style="border-radius: 8px; border-left: 4px solid #ffc107;">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <i class="icon fa fa-exclamation-triangle mr-2"></i> <?php echo $this->session->flashdata("warning"); ?>
                            </div>
                        <?php endif; ?>

                        <!-- Mensaje Principal -->
                        <div class="alert alert-warning" style="border-radius: 8px; border-left: 4px solid #ffc107; background: #fffbf0; text-align: center;">
                            <h3 style="color: #856404; font-weight: 700; margin: 0;">
                                <i class="fas fa-exclamation-triangle" style="color: #ffc107; margin-right: 10px;"></i>
                                DEBE REGISTRAR LOS DATOS SOLICITADOS EN LA OPCIÓN INFORMACIÓN DEL ESTUDIANTE
                            </h3>
                        </div>

                        <hr style="border-top: 2px solid #e9ecef;">

                        <!-- Nota Informativa -->
                        <div class="alert alert-info" style="border-radius: 8px; border-left: 4px solid #003366; background: #e8f0fe; text-align: center;">
                            <h4 style="color: #003366; font-weight: 600; margin: 0;">
                                <i class="fas fa-info-circle" style="color: #003366; margin-right: 10px;"></i>
                                NOTA INFORMATIVA
                            </h4>
                            <br>
                            <h5 style="color: #2c3e50; font-weight: 400; line-height: 1.8;">
                                Debe revisar que sus <strong>Datos Básicos</strong>, <strong>Dirección</strong> y <strong>Lugar de Trabajo</strong> estén actualizados, 
                                <br>ya que depende de ello para la inscripción ante este registro.
                            </h5>
                        </div>

                        <br>

                        <!-- Botones de Acción -->
                        <div class="row mt-4">
                            <div class="col-md-12 text-center">
                                <a href="<?php echo base_url(); ?>dashboard04/index" class="btn btn-primary" style="border-radius: 10px; padding: 10px 30px; font-weight: 500; transition: all 0.3s;">
                                    <i class="fas fa-edit mr-2"></i>
                                    Actualizar Datos
                                </a>
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
        .btn {
            padding: 8px 20px !important;
            font-size: 0.85rem !important;
            width: 100%;
            margin-bottom: 5px;
        }
        .btn-default {
            margin-left: 0 !important;
        }
        .alert h3 {
            font-size: 1.2rem !important;
        }
        .alert h5 {
            font-size: 1rem !important;
        }
    }
    
    @media (max-width: 576px) {
        .alert h3 {
            font-size: 1rem !important;
        }
        .alert h4 {
            font-size: 1rem !important;
        }
        .alert h5 {
            font-size: 0.9rem !important;
        }
    }
</style>