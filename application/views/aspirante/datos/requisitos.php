<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" style="background: #f4f6f9;">

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0" style="font-weight: 300; color: #003366;">
                        <i class="fas fa-clipboard-check" style="color: #003366; margin-right: 8px;"></i>
                        <span style="color: #003366; font-weight: 600;">SCE-ENFMP</span>
                        <span style="color: #2c3e50; font-weight: 300;"> - Requisitos</span>
                    </h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right" style="background: transparent;">
                        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>dashboard04/index" style="color: #6c757d;">Inicio</a></li>
                        <li class="breadcrumb-item active" style="color: #003366; font-weight: 600;">Requisitos</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">

        <div class="card card-primary card-outline shadow-sm" style="border-radius: 10px; border-top: 4px solid #003366;">
            <div class="card-body p-0">
                <div class="card" style="border: none; border-radius: 10px;">

                    <!-- Header -->
                    <div class="card-header py-3" style="border-bottom: 1px solid #e8e8e8; border-radius: 10px 10px 0 0; background: #fafafa;">
                        <div class="d-flex align-items-center justify-content-between flex-wrap">
                            <div class="d-flex align-items-center">
                                <div class="mr-3" style="width: 42px; height: 42px; background: #003366; border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                                    <i class="fas fa-clipboard-check text-white" style="font-size: 1.1rem;"></i>
                                </div>
                                <div>
                                    <h5 class="mb-0" style="font-weight: 600; color: #2c3e50;">
                                        <strong>Requisitos del Aspirante</strong>
                                    </h5>
                                    <small class="text-muted" style="font-size: 0.75rem;">
                                        <i class="fas fa-file-upload mr-1"></i>
                                        Carga de documentos exigidos
                                    </small>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Body -->
                    <div class="card-body p-4">

                        <!-- Card informativa -->
                        <div class="card card-info card-outline" style="border-radius: 8px; border-left: 4px solid #17a2b8; border-top: none; margin-bottom: 20px;">
                            <div class="card-header" style="background: #e8f4f8; border-bottom: 1px solid #e8e8e8; padding: 10px 18px; border-radius: 8px 8px 0 0;">
                                <h6 class="mb-0" style="font-weight: 600; color: #117a8b; font-size: 0.85rem; text-align: center;">
                                    <i class="fas fa-info-circle" style="color: #17a2b8; margin-right: 6px;"></i>
                                    RECOMENDACIONES
                                </h6>
                            </div>
                            <div class="card-body p-3" style="font-size: 0.78rem; line-height: 1.6; color: #2c3e50;">
                                <p class="mb-2 text-justify">
                                    En esta sección debe cargar los documentos exigidos para el registro como aspirante a cursar estudios en la <b>ENFMP</b>.
                                </p>
                                <ul class="mb-2 pl-3">
                                    <li>El archivo debe estar en formato <b>*.JPG, *.JPEG, *.PNG, *.PDF</b></li>
                                    <li>Tamaño máximo permitido: <b>1 MB (1024 KB)</b></li>
                                    <li>Debe <b>actualizar o registrar</b> su información para obtener un registro exitoso</li>
                                </ul>
                                <div class="text-center mt-2">
                                    <a href="<?php echo base_url(); ?>guia/guia_rapida_requisitos.pdf" target="_blank" class="btn btn-sm" style="background:#17a2b8; color:white; border-radius:8px; padding:6px 16px;">
                                        <i class="fas fa-download mr-1"></i> Descargar Guía Rápida
                                    </a>
                                </div>
                            </div>
                        </div>

                        <!-- Tabla de requisitos -->
                        <div class="card card-info card-outline" style="border-radius: 8px; border-left: 4px solid #003366; border-top: none; margin-bottom: 20px;">
                            <div class="card-header" style="background: #e8f0fe; border-bottom: 1px solid #e8e8e8; padding: 10px 18px; border-radius: 8px 8px 0 0;">
                                <h6 class="mb-0" style="font-weight: 600; color: #003366; font-size: 0.85rem; letter-spacing: 0.5px; text-align: center;">
                                    <i class="fas fa-list-check" style="color: #003366; margin-right: 8px;"></i>
                                    ESTATUS DE CARGA DE LOS REQUISITOS
                                </h6>
                            </div>
                            <div class="card-body p-3">

                                <?php
                                $prog_seleccionado = explode(",", $aspirante->programa_id);
                                $especialidad = array(1, 2, 3, 6, 14, 15, 16, 19, 22, 23, 26);
                                $maestrias = array(20, 21, 24, 25, 29, 30);
                                $doctorado = array(31);
                                $forense = array(4, 17);
                                $criminalistica = array(5, 18);
                                foreach ($prog_seleccionado as $prog_seleccionado):
                                    if (in_array($prog_seleccionado, $especialidad)) $tipo_req1 = 1;
                                    if (in_array($prog_seleccionado, $maestrias)) $tipo_req2 = 2;
                                    if (in_array($prog_seleccionado, $doctorado)) $tipo_req3 = 3;
                                    if (in_array($prog_seleccionado, $forense)) $tipo_req4 = 4;
                                    if (in_array($prog_seleccionado, $criminalistica)) $tipo_req5 = 5;
                                endforeach;
                                $check = '<i class="fas fa-times-circle" style="color:#dc3545; font-size:1.3rem;"></i>';
                                $check2 = '<i class="fas fa-times-circle" style="color:#dc3545; font-size:1.3rem;"></i>';
                                $carga = 0;
                                $carga1 = 0;
                                foreach ($requisitos as $requisitos): ?>
                                    <?php if ($requisitos->id_requisito == 1): $carga = 1; $check = '<i class="fas fa-check-circle" style="color:#28a745; font-size:1.3rem;"></i>'; endif; ?>
                                    <?php if ($requisitos->id_requisito == 2): $carga1 = 1; $check2 = '<i class="fas fa-check-circle" style="color:#28a745; font-size:1.3rem;"></i>'; endif; ?>
                                <?php endforeach; ?>

                                <div class="table-responsive">
                                    <table class="table table-hover" style="border-radius: 8px; overflow: hidden; margin-bottom: 0;">
                                        <thead>
                                            <tr style="background: #f8f9fa;">
                                                <th style="padding: 12px 15px; font-weight: 600; color: #2c3e50; font-size: 0.78rem; border-bottom: 2px solid #e8e8e8; text-align: center; width: 10%;">Estatus</th>
                                                <th style="padding: 12px 15px; font-weight: 600; color: #2c3e50; font-size: 0.78rem; border-bottom: 2px solid #e8e8e8;">Requisito</th>
                                                <th style="padding: 12px 15px; font-weight: 600; color: #2c3e50; font-size: 0.78rem; border-bottom: 2px solid #e8e8e8; text-align: center;">Visualización</th>
                                                <th style="padding: 12px 15px; font-weight: 600; color: #2c3e50; font-size: 0.78rem; border-bottom: 2px solid #e8e8e8; text-align: center;">Acción</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <!-- Cédula -->
                                            <tr style="border-bottom: 1px solid #f0f0f0;">
                                                <td style="padding: 12px 15px; text-align: center;"><?php echo $check; ?></td>
                                                <td style="padding: 12px 15px; font-size: 0.8rem; color: #2c3e50;">
                                                    <?php if ($tipo_req1 == 1 || $tipo_req2 == 2 || $tipo_req3 == 3 || $tipo_req4 == 4 || $tipo_req5 == 5): ?>
                                                        <span style="color: red;"><b>(*)</b></span>
                                                    <?php endif; ?>
                                                    <i class="fas fa-id-card" style="color: #003366; margin-right: 6px;"></i>
                                                    Cédula de Identidad
                                                </td>
                                                <?php if ($carga == 0): ?>
                                                    <td style="padding: 12px 15px; text-align: center; font-size: 0.75rem; color: #6c757d;">
                                                        <i class="fas fa-eye-slash mr-1"></i> Sin Visualizaciones
                                                    </td>
                                                    <td style="padding: 12px 15px; text-align: center;">
                                                        <a href="<?php echo base_url(); ?>dashboard08/datos3" class="btn btn-sm" style="background:#003366; color:white; border-radius:8px; padding:4px 14px; font-size:0.72rem;">
                                                            <i class="fas fa-upload mr-1"></i> Cargar
                                                        </a>
                                                    </td>
                                                <?php elseif ($carga == 1): ?>
                                                    <td style="padding: 12px 15px; text-align: center;">
                                                        <a href="<?php echo base_url(); ?>assets/cedulas/<?php echo $this->session->userdata('id') ?>_cedula.jpg" target="_new" class="text-decoration-none" style="font-size: 0.75rem; color: #17a2b8;">
                                                            <i class="fas fa-eye mr-1"></i> Ver Documento
                                                        </a>
                                                    </td>
                                                    <td style="padding: 12px 15px; text-align: center;">
                                                        <a href="<?php echo base_url(); ?>dashboard08/datos3" class="btn btn-sm" style="background:#17a2b8; color:white; border-radius:8px; padding:4px 14px; font-size:0.72rem;">
                                                            <i class="fas fa-sync-alt mr-1"></i> Actualizar
                                                        </a>
                                                    </td>
                                                <?php endif; ?>
                                            </tr>

                                            <!-- Fotografía -->
                                            <tr style="border-bottom: 1px solid #f0f0f0;">
                                                <td style="padding: 12px 15px; text-align: center;"><?php echo $check2; ?></td>
                                                <td style="padding: 12px 15px; font-size: 0.8rem; color: #2c3e50;">
                                                    <?php if ($tipo_req1 == 1 || $tipo_req2 == 2 || $tipo_req3 == 3 || $tipo_req4 == 4 || $tipo_req5 == 5): ?>
                                                        <span style="color: red;"><b>(*)</b></span>
                                                    <?php endif; ?>
                                                    <i class="fas fa-camera" style="color: #003366; margin-right: 6px;"></i>
                                                    Fotografía
                                                </td>
                                                <?php if ($carga1 == 0): ?>
                                                    <td style="padding: 12px 15px; text-align: center; font-size: 0.75rem; color: #6c757d;">
                                                        <i class="fas fa-eye-slash mr-1"></i> Sin Visualizaciones
                                                    </td>
                                                    <td style="padding: 12px 15px; text-align: center;">
                                                        <a href="<?php echo base_url(); ?>dashboard08/datos7" class="btn btn-sm" style="background:#003366; color:white; border-radius:8px; padding:4px 14px; font-size:0.72rem;">
                                                            <i class="fas fa-upload mr-1"></i> Cargar
                                                        </a>
                                                    </td>
                                                <?php elseif ($carga1 == 1): ?>
                                                    <td style="padding: 12px 15px; text-align: center;">
                                                        <a href="<?php echo base_url(); ?>assets/fotos/<?php echo $this->session->userdata('id') ?>_foto.jpg" target="_new" class="text-decoration-none" style="font-size: 0.75rem; color: #17a2b8;">
                                                            <i class="fas fa-eye mr-1"></i> Ver Documento
                                                        </a>
                                                    </td>
                                                    <td style="padding: 12px 15px; text-align: center;">
                                                        <a href="<?php echo base_url(); ?>dashboard08/datos7" class="btn btn-sm" style="background:#17a2b8; color:white; border-radius:8px; padding:4px 14px; font-size:0.72rem;">
                                                            <i class="fas fa-sync-alt mr-1"></i> Actualizar
                                                        </a>
                                                    </td>
                                                <?php endif; ?>
                                            </tr>

                                            <tr>
                                                <td colspan="4" style="padding: 8px 15px; font-size: 0.72rem; color: #dc3545;">
                                                    <b>(*)</b> Requisito Obligatorio
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <!-- Botón al proceso -->
                        <div class="text-center">
                            <a href="<?php echo base_url(); ?>/dashboard08/proceso" class="btn" style="background:#003366; color:white; border-radius:10px; padding:10px 30px; font-weight:500; transition: all 0.3s;">
                                <i class="fas fa-tasks mr-2"></i>
                                Ver Estatus del Proceso de Inscripción
                            </a>
                        </div>

                    </div><!-- /.card-body -->
                </div><!-- /.card -->
            </div><!-- /.card-body -->
        </div><!-- /.card -->

    </section>
</div>

<style>
    .btn:hover { transform: translateY(-2px); box-shadow: 0 2px 8px rgba(0,51,102,0.3); }
    .btn-primary { background-color: #003366; border-color: #003366; color: #fff; }
    .btn-primary:hover { background-color: #002244; border-color: #002244; }
    .btn-info { background-color: #17a2b8; border-color: #17a2b8; color: #fff; }
    .btn-info:hover { background-color: #117a8b; border-color: #117a8b; }

    .table-hover tbody tr:hover { background-color: #e8f0fe !important; transition: background 0.2s ease; }
    .card { transition: box-shadow 0.25s ease; }
    .card:hover { box-shadow: 0 6px 18px rgba(0,51,102,0.08) !important; }
</style>