<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" style="background: #f4f6f9;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0" style="font-weight: 300; color: #003366;">
                        <i class="fas fa-id-badge" style="color: #003366; margin-right: 8px;"></i>
                        <span style="color: #003366; font-weight: 600;">SCE-ENFMP</span>
                        <span style="color: #2c3e50; font-weight: 300;"> - Carnet / Carta de Servicio</span>
                    </h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right" style="background: transparent;">
                        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>dashboard08/index" style="color: #6c757d;">Inicio</a></li>
                        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>dashboard08/requisitos" style="color: #6c757d;">Requisitos</a></li>
                        <li class="breadcrumb-item active" style="color: #003366; font-weight: 600;">Carnet / Carta de Servicio</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <!-- Main content -->
    <section class="content">

        <script language="javascript">
        function siguiente()
        {
            <?php
            $fecha_actual = date("Y-m-d");
            $hora_actual = date("H:i:s");
            $hora = (localtime(time(), true));
            $valor_preinscripcion = ($tiempo_pre);
            if (($valor_preinscripcion->fecha_fin >= $fecha_actual or $this->session->userdata('tiempo_preinscripcion') == 49)) { ?>
                if(document.getElementById("rol").value == "5" || document.getElementById("rol").value == "8" ) location.assign("<?php echo base_url(); ?>dashboard04/inscripcion");
                else
                if(document.getElementById("rol").value == "7")
                    location.assign("<?php echo base_url().'dashboard04/proceso'; ?>");
            <?php } else { ?>
                location.assign("<?php echo base_url(); ?>dashboard04/");
            <?php } ?>
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
                                    <i class="fas fa-id-badge text-white" style="font-size: 1.1rem;"></i>
                                </div>
                                <div>
                                    <h5 class="mb-0" style="font-weight: 600; color: #2c3e50;">
                                        <strong>Adjuntar Carnet / Carta de Servicio</strong>
                                    </h5>
                                    <small class="text-muted" style="font-size: 0.75rem;">
                                        <i class="fas fa-calendar-alt mr-1"></i>
                                        Documento laboral
                                    </small>
                                </div>
                            </div>
                            <div>
                                <span class="badge" style="font-size: 0.8rem; padding: 5px 16px; border-radius: 10px; font-weight: 500; background: #003366; color: white;">
                                    <i class="fas fa-info-circle mr-1"></i>
                                    Opcional para Libre Ejercicio
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
                        <?php if ($this->session->flashdata("warning")): ?>
                            <div class="alert alert-warning alert-dismissible" style="border-radius: 8px; border-left: 4px solid #ffc107;">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <i class="icon fa fa-exclamation-triangle mr-2"></i> <?php echo $this->session->flashdata("warning"); ?>
                            </div>
                        <?php endif; ?>

                        <!-- Card Informativa -->
                        <div class="card card-warning card-outline" style="border-radius: 8px; border-left: 4px solid #ffc107; border-top: none; margin-bottom: 20px;">
                            <div class="card-header" style="background: #fff3cd; border-bottom: 1px solid #e8e8e8; padding: 10px 18px; border-radius: 8px 8px 0 0;">
                                <h6 class="mb-0" style="font-weight: 600; color: #856404; font-size: 0.85rem; letter-spacing: 0.5px; text-align: center;">
                                    <i class="fas fa-info-circle" style="color: #ffc107; margin-right: 6px;"></i>
                                    INFORMACIÓN IMPORTANTE
                                </h6>
                            </div>
                            <div class="card-body p-3" style="font-size: 0.78rem; line-height: 1.5; color: #2c3e50;">
                                <p class="mb-2 text-justify">
                                    En esta sección usted debe adjuntar el <b>Carnet u Oficio de Nombramiento en el Cargo</b>, de forma legible. De ser <b>personal de Libre Ejercicio</b>, omitir este documento.
                                </p>
                                <ul class="mb-0 pl-3">
                                    <li>El carnet u oficio debe estar en formato: <b>*.JPG, *.JPEG, *.GIF, *.PNG</b></li>
                                    <li>Tamaño máximo permitido: <b>1 MB (1024 KB)</b></li>
                                </ul>
                            </div>
                        </div>

                        <!-- Vista previa del carnet -->
                        <div class="card card-info card-outline" style="border-radius: 8px; border-left: 4px solid #003366; border-top: none; margin-bottom: 20px;">
                            <div class="card-header" style="background: #e8f0fe; border-bottom: 1px solid #e8e8e8; padding: 10px 18px; border-radius: 8px 8px 0 0;">
                                <h6 class="mb-0" style="font-weight: 600; color: #003366; font-size: 0.85rem; text-align: center;">
                                    <i class="fas fa-image" style="color: #003366; margin-right: 6px;"></i>
                                    DOCUMENTO ACTUAL
                                </h6>
                            </div>
                            <div class="card-body p-3 text-center">
                                <?php
                                $rutaarchivo = base_url() . 'assets/carnet/' . $this->session->userdata('id') . '_carnet.jpg';
                                if (!file_exists("$rutaarchivo")) {
                                    echo "<img id='imgFoto' border='2' class='fotomarket' width='150px' height='165px' src='" . $rutaarchivo . "?" . time() . "' style='border-radius: 8px; border: 2px solid #e8e8e8; padding: 3px;'>";
                                } else {
                                    echo "<img id='imgFoto' border='2' class='fotomarket' width='150px' height='165px' src='../assets/img/no-foto.jpg' style='border-radius: 8px; border: 2px solid #e8e8e8; padding: 3px;'>";
                                }
                                ?>
                                <div class="mt-2">
                                    <small style="color: #6c757d; font-size: 0.78rem;">
                                        <i class="fas fa-info-circle" style="color: #003366;"></i>
                                        Imagen actual del carnet
                                    </small>
                                </div>
                            </div>
                        </div>

                        <!-- Formulario de carga -->
                        <div class="card card-success card-outline" style="border-radius: 8px; border-left: 4px solid #28a745; border-top: none; margin-bottom: 20px;">
                            <div class="card-header" style="background: #e8f5e9; border-bottom: 1px solid #e8e8e8; padding: 10px 18px; border-radius: 8px 8px 0 0;">
                                <h6 class="mb-0" style="font-weight: 600; color: #1e7e34; font-size: 0.85rem; text-align: center;">
                                    <i class="fas fa-cloud-upload-alt" style="color: #28a745; margin-right: 6px;"></i>
                                    CARGAR DOCUMENTO
                                </h6>
                            </div>
                            <div class="card-body p-4 text-center">
                                <form id="formulario" method="post" enctype="multipart/form-data" action="cargacarnet">
                                    <div class="form-group">
                                        <input type="file" name="userfile" size="400" required="true"
                                               style="margin: 0 auto; max-width: 400px; padding: 8px; border: 2px dashed #28a745; border-radius: 8px; background: #f8fff8;">
                                    </div>

                                    <input type="hidden" name="id_usuario" value="<?php echo $this->session->userdata('id'); ?>">
                                    <input type="hidden" name="rol" id="rol" value="<?php echo $this->session->userdata('rol'); ?>">

                                    <button type="submit" name="upload" class="btn btn-primary"
                                            style="border-radius: 10px; padding: 10px 40px; font-weight: 500; background-color: #003366; border-color: #003366; color: white; transition: all 0.3s;">
                                        <i class="fas fa-upload mr-2"></i>
                                        Cargar Carnet / Carta Servicio
                                    </button>
                                </form>
                            </div>
                        </div>

                        <!-- Botón Siguiente -->
                        <div class="row mt-4">
                            <div class="col-md-12 text-center">
                                <button type="button" name="btnSeguiente" class="btn btn-info" onClick="siguiente();"
                                        style="border-radius: 10px; padding: 10px 40px; font-weight: 500; transition: all 0.3s;">
                                    <i class="fas fa-arrow-right mr-2"></i>
                                    Siguiente
                                </button>
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

    /* Botón institucional */
    .btn-primary {
        background-color: #003366;
        border-color: #003366;
        color: #fff;
        transition: all 0.2s ease;
    }

    .btn-primary:hover {
        background-color: #002244;
        border-color: #002244;
        box-shadow: 0 2px 8px rgba(0, 51, 102, 0.3);
        transform: translateY(-2px);
    }

    .btn-info {
        background-color: #17a2b8;
        border-color: #17a2b8;
        color: #fff;
        transition: all 0.2s ease;
    }

    .btn-info:hover {
        background-color: #117a8b;
        border-color: #117a8b;
        transform: translateY(-2px);
        box-shadow: 0 2px 8px rgba(23, 162, 184, 0.3);
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

    /* Estilo para campos de formulario */
    .form-control:focus {
        border-color: #003366;
        box-shadow: 0 0 0 0.2rem rgba(0, 51, 102, 0.25);
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
        .form-group label {
            font-size: 0.85rem !important;
        }
    }

    @media (max-width: 576px) {
        .form-group label {
            font-size: 0.8rem !important;
        }
        .form-control {
            font-size: 0.8rem !important;
        }
        .badge {
            font-size: 0.6rem !important;
        }
    }
</style>