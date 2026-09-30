<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" style="background: #f4f6f9;">

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0" style="font-weight: 300; color: #003366;">
                        <i class="fas fa-exclamation-circle" style="color: #003366; margin-right: 8px;"></i>
                        <span style="color: #003366; font-weight: 600;">SCE-ENFMP</span>
                        <span style="color: #2c3e50; font-weight: 300;"> - Aviso Importante</span>
                    </h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right" style="background: transparent;">
                        <li class="breadcrumb-item">
                            <a href="<?php echo base_url(); ?>dashboard08/" style="color: #6c757d;">Inicio</a>
                        </li>
                        <li class="breadcrumb-item active" style="color: #003366; font-weight: 600;">Aviso Informativo</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Script anterior -->
        <script language="javascript">
            function anterior() {
                location.href = "inscripcion/";
            }
        </script>

        <!-- ============================================= -->
        <!-- CARD PRINCIPAL                                 -->
        <!-- ============================================= -->
        <div class="card card-primary card-outline shadow-sm" style="border-radius: 10px; border-top: 4px solid #003366;">
            <div class="card-body p-0">
                <div class="card" style="border: none; border-radius: 10px;">

                    <!-- Header -->
                    <div class="card-header py-3" style="border-bottom: 1px solid #e8e8e8; border-radius: 10px 10px 0 0; background: #fafafa;">
                        <div class="d-flex align-items-center justify-content-between flex-wrap">
                            <div class="d-flex align-items-center">
                                <div class="mr-3" style="width: 42px; height: 42px; background: #003366; border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                                    <i class="fas fa-info-circle text-white" style="font-size: 1.1rem;"></i>
                                </div>
                                <div>
                                    <h5 class="mb-0" style="font-weight: 600; color: #2c3e50;">
                                        <strong>Aviso del Registro</strong>
                                    </h5>
                                    <small class="text-muted" style="font-size: 0.75rem;">
                                        <i class="fas fa-calendar-alt mr-1"></i>
                                        Sistema de Inscripción en Línea - Proceso de Selección 2026-2027
                                    </small>
                                </div>
                            </div>
                            <div>
                                <span class="badge" style="font-size: 0.8rem; padding: 5px 16px; border-radius: 10px; font-weight: 500; background: #dc3545; color: white;">
                                    <i class="fas fa-exclamation-triangle mr-1"></i>
                                    Acción Requerida
                                </span>
                            </div>
                        </div>
                    </div>

                    <!-- Body -->
                    <div class="card-body p-4">

                        <!-- ============================================= -->
                        <!-- MENSAJE FLASH (error)                          -->
                        <!-- ============================================= -->
                        <?php if ($this->session->flashdata("error")): ?>
                            <div class="alert alert-danger alert-dismissible fade show flash-alert" role="alert">
                                <div class="d-flex align-items-start">
                                    <div class="flash-alert-icon flash-alert-icon-danger">
                                        <i class="fas fa-exclamation-triangle"></i>
                                    </div>
                                    <div class="flex-grow-1">
                                        <h6 class="flash-alert-title">Ha ocurrido un error</h6>
                                        <p class="flash-alert-text mb-0">
                                            <?php echo $this->session->flashdata("error"); ?>
                                        </p>
                                    </div>
                                </div>
                                <button type="button" class="close flash-alert-close" data-dismiss="alert" aria-label="Cerrar">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        <?php endif; ?>

                        <!-- ============================================= -->
                        <!-- CARD: AVISO PRINCIPAL                          -->
                        <!-- ============================================= -->
                        <div class="card card-warning card-outline" style="border-radius: 8px; border-left: 4px solid #ffc107; border-top: none; margin-bottom: 20px;">
                            <div class="card-header" style="background: #fff3cd; border-bottom: 1px solid #e8e8e8; padding: 10px 18px; border-radius: 8px 8px 0 0;">
                                <h6 class="mb-0" style="font-weight: 600; color: #856404; font-size: 0.85rem; letter-spacing: 0.5px; text-align: center;">
                                    <i class="fas fa-exclamation-triangle" style="color: #ffc107; margin-right: 6px;"></i>
                                    REGISTRO DE DATOS REQUERIDO
                                </h6>
                            </div>
                            <div class="card-body p-4 text-center">

                                <img src="<?php echo base_url(); ?>assets/img/logo2.png"
                                     alt="Logo"
                                     style="width: 90px; height: 90px; border-radius: 50%; border: 3px solid #e9ecef; padding: 5px; background: white; margin-bottom: 15px;">

                                <h5 style="font-weight: 600; color: #003366; font-size: 1rem; margin-bottom: 12px;">
                                    Debe registrar los datos solicitados en el menú de
                                    <b>Información del Aspirante</b> y sus <b>Requisitos</b>
                                </h5>

                                <p style="font-size: 0.82rem; color: #2c3e50; line-height: 1.6; margin: 0 auto; max-width: 720px; text-align: justify;">
                                    Debe revisar que sus <b>Datos Básicos, Académicos y Laborales</b>, además de los
                                    <b>Requisitos exigidos</b> de acuerdo al(los) programa(s) de postgrado a inscribirse como aspirante,
                                    tales como: <b>Cédula de Identidad, Foto Tipo Carnet</b>, estén cargados.
                                </p>

                            </div>
                        </div>

                        <!-- ============================================= -->
                        <!-- CARD: NOTA INFORMATIVA                         -->
                        <!-- ============================================= -->
                        <div class="card card-info card-outline" style="border-radius: 8px; border-left: 4px solid #17a2b8; border-top: none; margin-bottom: 20px;">
                            <div class="card-header" style="background: #e8f4f8; border-bottom: 1px solid #e8e8e8; padding: 10px 18px; border-radius: 8px 8px 0 0;">
                                <h6 class="mb-0" style="font-weight: 600; color: #117a8b; font-size: 0.85rem; letter-spacing: 0.5px; text-align: center;">
                                    <i class="fas fa-info-circle" style="color: #17a2b8; margin-right: 6px;"></i>
                                    NOTA INFORMATIVA
                                </h6>
                            </div>
                            <div class="card-body p-3" style="font-size: 0.78rem; line-height: 1.6; color: #2c3e50; text-align: justify;">

                                <p class="mb-2">
                                    Dichos requisitos son exigidos para la inscripción como aspirante según la
                                    <b>especialización / maestría </b> deseado, por lo que deben estar
                                    correctamente <b>cargados, nítidos y previamente actualizados</b>, ya que de ello
                                    depende la inscripción ante este registro.
                                </p>

                            </div>
                        </div>

                        <!-- ============================================= -->
                        <!-- ACCESOS RÁPIDOS                                -->
                        <!-- ============================================= -->
                        <div class="row mt-3 justify-content-center">

                            <!-- Acceso 1: Estatus del Proceso -->
                            <div class="col-md-5 col-sm-6 mb-3">
                                <div class="card card-success card-outline" style="border-radius: 8px; border-left: 4px solid #28a745; border-top: none; height: 100%; margin-bottom: 0;">
                                    <div class="card-header" style="background: #e8f5e9; border-bottom: 1px solid #e8e8e8; padding: 10px 18px; border-radius: 8px 8px 0 0;">
                                        <div class="d-flex align-items-center">
                                            <div class="mr-2" style="width: 34px; height: 34px; background: #28a745; border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                                                <i class="fas fa-list-alt text-white" style="font-size: 0.9rem;"></i>
                                            </div>
                                            <h6 class="mb-0" style="font-weight: 600; color: #1e7e34; font-size: 0.82rem; letter-spacing: 0.3px;">
                                                ESTATUS DEL PROCESO
                                            </h6>
                                        </div>
                                    </div>
                                    <div class="card-body p-3">
                                        <a href="<?php echo base_url(); ?>dashboard08/proceso"
                                           title="Ir a Estatus del Proceso de Inscripción"
                                           class="d-flex align-items-center text-decoration-none"
                                           style="color: inherit; transition: all 0.2s ease;">
                                            <i class="fas fa-chevron-right text-success mr-2" style="font-size: 0.6rem;"></i>
                                            <small style="font-size: 0.78rem; color: #2c3e50;">
                                                Ver Estatus del Proceso del Registro en línea
                                            </small>
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <!-- Acceso 2: Información del Aspirante -->
                            <div class="col-md-5 col-sm-6 mb-3">
                                <div class="card card-info card-outline" style="border-radius: 8px; border-left: 4px solid #003366; border-top: none; height: 100%; margin-bottom: 0;">
                                    <div class="card-header" style="background: #e8f0fe; border-bottom: 1px solid #e8e8e8; padding: 10px 18px; border-radius: 8px 8px 0 0;">
                                        <div class="d-flex align-items-center">
                                            <div class="mr-2" style="width: 34px; height: 34px; background: #003366; border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                                                <i class="fas fa-user-circle text-white" style="font-size: 0.9rem;"></i>
                                            </div>
                                            <h6 class="mb-0" style="font-weight: 600; color: #003366; font-size: 0.82rem; letter-spacing: 0.3px;">
                                                INFORMACIÓN DEL ASPIRANTE
                                            </h6>
                                        </div>
                                    </div>
                                    <div class="card-body p-3">
                                        <a href="<?php echo base_url(); ?>dashboard08/datos"
                                           title="Ir a Información del Aspirante"
                                           class="d-flex align-items-center text-decoration-none"
                                           style="color: inherit; transition: all 0.2s ease;">
                                            <i class="fas fa-chevron-right mr-2" style="font-size: 0.6rem; color: #003366;"></i>
                                            <small style="font-size: 0.78rem; color: #2c3e50;">
                                                Ver Información del Aspirante
                                            </small>
                                        </a>
                                    </div>
                                </div>
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

<!-- ============================================= -->
<!-- ESTILOS ADICIONALES                            -->
<!-- ============================================= -->
<style>
    /* Efectos hover en cards */
    .card {
        transition: transform 0.25s ease, box-shadow 0.25s ease;
    }

    .card:hover {
        box-shadow: 0 6px 18px rgba(0, 51, 102, 0.08) !important;
    }

    /* Enlaces dentro de las cards */
    .card-body a {
        transition: color 0.2s ease, transform 0.2s ease;
    }

    .card-body a:hover {
        color: #003366 !important;
        transform: translateX(3px);
    }

    /* ============================================= */
    /* MENSAJES FLASH ELEGANTES                       */
    /* ============================================= */
    .flash-alert {
        position: relative;
        border: none;
        border-left: 4px solid transparent;
        border-radius: 10px !important;
        padding: 12px 16px 12px 14px;
        box-shadow: 0 4px 12px rgba(0, 51, 102, 0.08);
        animation: flashSlideIn 0.35s ease-out;
        margin-bottom: 16px;
    }

    .flash-alert.alert-danger {
        background: #fdecea;
        border-left-color: #dc3545;
        color: #721c24;
    }

    .flash-alert-icon {
        width: 32px;
        height: 32px;
        min-width: 32px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-right: 12px;
        color: #fff;
        font-size: 0.85rem;
        flex-shrink: 0;
    }

    .flash-alert-icon-danger {
        background: linear-gradient(135deg, #dc3545 0%, #a71d2a 100%);
        box-shadow: 0 3px 8px rgba(220, 53, 69, 0.35);
    }

    .flash-alert-title {
        font-size: 0.78rem;
        font-weight: 700;
        margin-bottom: 1px;
        letter-spacing: 0.2px;
        color: inherit;
    }

    .flash-alert-text {
        font-size: 0.72rem;
        line-height: 1.4;
        color: inherit;
        opacity: 0.92;
    }

    .flash-alert-close {
        position: absolute;
        top: 8px;
        right: 10px;
        font-size: 1rem;
        opacity: 0.5;
        color: inherit;
        transition: opacity 0.2s ease, transform 0.2s ease;
        padding: 0;
        line-height: 1;
    }

    .flash-alert-close:hover {
        opacity: 1;
        transform: scale(1.1);
    }

    @keyframes flashSlideIn {
        from { opacity: 0; transform: translateY(-8px); }
        to   { opacity: 1; transform: translateY(0); }
    }

    /* Ajustes responsive */
    @media (max-width: 768px) {
        .card-header h5 { font-size: 0.95rem !important; }
        .card-header h6 { font-size: 0.78rem !important; }
        .card-body small { font-size: 0.72rem !important; }
    }

    @media (max-width: 576px) {
        .card-body { padding: 12px !important; }
        .badge { font-size: 0.65rem !important; padding: 3px 10px !important; }
        .flash-alert { padding: 10px 12px; }
        .flash-alert-icon { width: 28px; height: 28px; min-width: 28px; font-size: 0.75rem; margin-right: 10px; }
        .flash-alert-title { font-size: 0.72rem; }
        .flash-alert-text { font-size: 0.68rem; }
    }
</style>