<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" style="background: #f4f6f9;">

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0" style="font-weight: 300; color: #003366;">
                        <i class="fas fa-tasks" style="color: #003366; margin-right: 8px;"></i>
                        <span style="color: #2c3e50; font-weight: 300;"> Proceso de Inscripción</span>
                    </h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right" style="background: transparent;">
                        <li class="breadcrumb-item">
                            <a href="<?php echo base_url(); ?>dashboard04/index" style="color: #6c757d;">Inicio</a>
                        </li>
                        <li class="breadcrumb-item active" style="color: #003366;">Estatus del Proceso de Inscripción</li>
                    </ol>
                    <?php if ($this->session->flashdata("error")): ?>
                        <div class="alert alert-danger alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <p><i class="icon fa fa-ban"></i> <?php echo $this->session->flashdata("error"); ?> </p>
                        </div>
                    <?php endif; ?>
                    <?php if ($this->session->flashdata("warning")): ?>
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
        <script type="text/javascript">
        //<![CDATA[
        function imprimir(id){
            location.href = "/control_estudio/planilla/planilla_pre/" + id;
        }
        //]]>
        </script>

        <form action="<?php echo base_url(); ?>dashboard04/inscripcion2" method="POST">
            <!-- Card Principal -->
            <div class="card card-primary card-outline shadow-lg" style="border-radius: 12px; border-top: 4px solid #003366;">
                <div class="card-body p-0">
                    <div class="card" style="border: none; border-radius: 12px; box-shadow: 0 4px 6px rgba(0,0,0,0.05);">

                        <!-- Header -->
                        <div class="card-header bg-gradient-white py-4" style="border-bottom: 2px solid #e9ecef; border-radius: 12px 12px 0 0; background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);">
                            <div class="text-center">
                                <h3 class="card-title" style="font-size: 1.4rem; font-weight: 600; color: #2c3e50;">
                                    <div class="mr-3" style="flex-shrink: 0;">
                                        <img src="<?php echo base_url(); ?>assets/img/logo2.png" alt="Logo" style="width: 55px; height: 55px; border-radius: 50%; border: 2px solid #e9ecef; padding: 3px; background: white;">
                                        <span style="color: #2c3e50;"> Estatus del Proceso de Inscripción</span>
                                    </div>
                                </h3>
                                <div class="mt-2">
                                    <span class="badge" style="font-size: 1rem; padding: 8px 20px; border-radius: 10px; background: #003366; color: white;">
                                        <i class="fas fa-calendar-alt mr-2"></i>
                                        Período: <strong><?php echo $periodo->nombre; ?></strong>
                                    </span>
                                </div>
                            </div>
                        </div>

                        <!-- Body -->
                        <div class="card-body p-4">

                            <!-- Tabla de estado -->
                            <div class="table-responsive">
                                <table class="table table-hover" style="border-radius: 10px; overflow: hidden;">
                                    <thead style="background: linear-gradient(135deg, #003366 0%, #1a5276 100%); color: white;">
                                        <tr>
                                            <th style="width: 70%; padding: 15px 20px; font-weight: 500; font-size: 0.95rem;">
                                                <i class="fas fa-list-ul mr-2"></i>Nombre del Paso
                                            </th>
                                            <th style="width: 30%; padding: 15px 20px; text-align: center; font-weight: 500; font-size: 0.95rem;">
                                                <i class="fas fa-info-circle mr-2"></i>Estado
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <!-- Fila 1: Actualización de Datos -->
                                        <tr style="border-bottom: 1px solid #f1f3f5; transition: background 0.2s;">
                                            <td style="padding: 14px 20px; font-weight: 500; color: #2c3e50;">
                                                <i class="fas fa-user-edit" style="color: #003366; margin-right: 12px; width: 20px;"></i>
                                                Actualización de Datos
                                                <a href="<?php echo base_url(); ?>dashboard08/inscripcion"
                                                   title="Ir a Programas Inscritos"
                                                   class="ml-2 text-decoration-none"
                                                   style="font-size: 0.75rem; color: #17a2b8;">
                                                    <i class="fas fa-external-link-alt"></i> Ver Programas Inscritos
                                                </a>
                                            </td>
                                            <td style="padding: 14px 20px; text-align: center;">
                                                <?php if ($trabajo == false || $academico == false || $direccion == false): ?>
                                                    <img width="28px" height="28px" src="../assets/img/button_gray.png" title="Sin Realizar">
                                                <?php else: ?>
                                                    <img width="28px" height="28px" src="../assets/img/button_green.png" title="Procesado">
                                                <?php endif; ?>
                                            </td>
                                        </tr>

                                        <!-- Fila 2: Registro de Pago -->
                                        <tr style="border-bottom: 1px solid #f1f3f5; transition: background 0.2s;">
                                            <td style="padding: 14px 20px; font-weight: 500; color: #2c3e50;">
                                                <i class="fas fa-money-bill-wave" style="color: #c9a84c; margin-right: 12px; width: 20px;"></i>
                                                Registro de Pago
                                                <?php if ($pago_aspirante == true): $pago = true; ?>
                                                    <a href="<?php echo base_url() ?>dashboard05/transferencia/<?php echo $this->session->userdata('id'); ?>"
                                                       class="ml-2 text-decoration-none"
                                                       style="font-size: 0.75rem; color: #17a2b8;">
                                                        <i class="fas fa-external-link-alt"></i> Ver Pago
                                                    </a>
                                                <?php endif; ?>
                                            </td>
                                            <td style="padding: 14px 20px; text-align: center;">
                                                <?php if ($pago == true): ?>
                                                    <img width="28px" height="28px" src="../assets/img/button_green.png" title="Procesado">
                                                <?php else: ?>
                                                    <img width="28px" height="28px" src="../assets/img/button_gray.png" title="Sin Realizar">
                                                <?php endif; ?>
                                            </td>
                                        </tr>

                                        <!-- Fila 3: Requisitos -->
                                        <tr style="border-bottom: 1px solid #f1f3f5; transition: background 0.2s;">
                                            <td style="padding: 14px 20px; font-weight: 500; color: #2c3e50;">
                                                <i class="fas fa-file-alt" style="color: #003366; margin-right: 12px; width: 20px;"></i>
                                                Actualización y/o Registro de Requisitos
                                                <a href="<?php echo base_url(); ?>/dashboard08/requisitos"
                                                   title="Ir a Estatus de Requisitos"
                                                   class="ml-2 text-decoration-none"
                                                   style="font-size: 0.75rem; color: #17a2b8;">
                                                    <i class="fas fa-external-link-alt"></i> Ver Requisitos
                                                </a>
                                            </td>
                                            <td style="padding: 14px 20px; text-align: center;">
                                                <?php
                                                if ($trabajo != false || $academico != false || $direccion != false) {
                                                    $cuenta = 0;
                                                    foreach ($requisito as $requisito) {
                                                        if ($requisito->id_requisito == 1) $cuenta = $cuenta + 1;
                                                        if ($requisito->id_requisito == 2) $cuenta = $cuenta + 1;
                                                    }
                                                    if ($cuenta >= 2): ?>
                                                        <img width="28px" height="28px" src="../assets/img/button_green.png" title="Procesado">
                                                    <?php else: ?>
                                                        <img width="28px" height="28px" src="../assets/img/button_gray.png" title="Pendiente">
                                                        <div style="margin-top: 6px; font-size: 0.7rem; color: #dc3545; font-weight: 600; line-height: 1.3;">
                                                            <i class="fas fa-exclamation-triangle mr-1"></i>
                                                            FALTA CONSIGNAR REQUISITOS
                                                        </div>
                                                        <div style="margin-top: 4px; font-size: 0.68rem; color: #721c24; line-height: 1.3;">
                                                            Recuerde cargar los requisitos solicitados en el registro.
                                                            De lo contrario su inscripción como ASPIRANTE en el proceso de selección en curso QUEDARÁ SIN EFECTO.
                                                        </div>
                                                    <?php endif;
                                                } else { ?>
                                                    <img width="28px" height="28px" src="../assets/img/button_gray.png" title="Sin Realizar">
                                                <?php } ?>
                                            </td>
                                        </tr>

                                        <!-- Fila 4: Aprobación de Pago -->
                                        <tr style="border-bottom: 1px solid #f1f3f5; transition: background 0.2s;">
                                            <td style="padding: 14px 20px; font-weight: 500; color: #2c3e50;">
                                                <i class="fas fa-check-double" style="color: #003366; margin-right: 12px; width: 20px;"></i>
                                                Aprobación de Pago
                                            </td>
                                            <td style="padding: 14px 20px; text-align: center;">
                                                <?php
                                                if ($pago_aspirante == true && $cuenta >= 2) {
                                                    if ($result_conciliado->conciliado == 1): ?>
                                                        <img width="28px" height="28px" src="../assets/img/button_green.png" title="Aprobado">
                                                    <?php elseif ($result_conciliado->conciliado == 2): ?>
                                                        <div>
                                                            <img width="28px" height="28px" src="../assets/img/button_red.jpeg" title="Rechazado">
                                                            <small class="d-block text-danger mt-1" style="font-size: 0.7rem;">
                                                                <i class="fas fa-envelope mr-1"></i> tramitesecretaria.enfmp2023@gmail.com
                                                            </small>
                                                        </div>
                                                    <?php else: ?>
                                                        <img width="28px" height="28px" src="../assets/img/button_blue.jpg" title="En Proceso">
                                                    <?php endif;
                                                } else { ?>
                                                    <img width="28px" height="28px" src="../assets/img/button_gray.png" title="Sin Realizar">
                                                <?php } ?>
                                            </td>
                                        </tr>

                                        <!-- Fila 5: Revisión Documentos -->
                                        <tr style="border-bottom: 1px solid #f1f3f5; transition: background 0.2s;">
                                            <td style="padding: 14px 20px; font-weight: 500; color: #2c3e50;">
                                                <i class="fas fa-search" style="color: #c9a84c; margin-right: 12px; width: 20px;"></i>
                                                Revisión Documentos
                                            </td>
                                            <td style="padding: 14px 20px; text-align: center;">
                                                <?php
                                                if ($revision_documentos == true) {
                                                    if ($result_conciliado->academico == 1): ?>
                                                        <img width="28px" height="28px" src="../assets/img/button_green.png" title="Aprobado">
                                                        <strong style="display: block; font-size: 0.8rem; color: #28a745;">REGISTRO APROBADO</strong>
                                                    <?php endif;
                                                } else {
                                                    if ($result_conciliado->conciliado == 1 && $cuenta >= 3) {
                                                        if ($result_conciliado->academico == 2): ?>
                                                            <div>
                                                                <img width="28px" height="28px" src="../assets/img/button_red.jpeg" title="Rechazado">
                                                                <strong style="display: block; font-size: 0.8rem; color: #dc3545;">REGISTRO RECHAZADO</strong>
                                                                <small class="d-block text-danger mt-1" style="font-size: 0.7rem;">
                                                                    <i class="fas fa-envelope mr-1"></i> tramitesecretaria.enfmp2023@gmail.com
                                                                </small>
                                                            </div>
                                                        <?php elseif ($result_conciliado->academico == 0): ?>
                                                            <img width="28px" height="28px" src="../assets/img/button_blue.jpg" title="En Proceso">
                                                        <?php endif;
                                                    } else { ?>
                                                        <img width="28px" height="28px" src="../assets/img/button_gray.png" title="Sin Realizar">
                                                    <?php }
                                                }
                                                ?>
                                            </td>
                                        </tr>

                                        <!-- Fila 6: Planillas (solo si aprobado) -->
                                        <?php if ($revision_documentos == true && $result_conciliado->academico == 1): ?>
                                            <tr style="background: #f8f9fa; border-bottom: 1px solid #f1f3f5;">
                                                <td style="padding: 14px 20px; font-weight: 500; color: #2c3e50;">
                                                    <i class="fas fa-print" style="color: #c9a84c; margin-right: 12px; width: 20px;"></i>
                                                    Descargar Planilla(s) del Proceso de Selección
                                                </td>
                                                <td style="padding: 14px 20px;">
                                                    <div class="d-flex flex-wrap justify-content-center" style="gap: 8px;">
                                                        <?php if (!empty($programa_aprobado)): ?>
                                                            <?php foreach ($programa_aprobado as $programa_aprobado): ?>
                                                                <button type="button" class="btn btn-sm"
                                                                        onclick="imprimir(<?php echo $programa_aprobado->id; ?>)"
                                                                        title="Haz clic para visualizar la planilla"
                                                                        style="border-radius: 10px; padding: 4px 16px; margin: 2px; transition: all 0.2s; background: #003366; color: white; border: none;">
                                                                    <i class="fas fa-print mr-1"></i>
                                                                    <?php echo $programa_aprobado->nombre; ?>
                                                                </button>
                                                            <?php endforeach; ?>
                                                        <?php endif; ?>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php endif; ?>

                                    </tbody>
                                </table>
                            </div>

                            <!-- Leyenda con imágenes -->
                            <div class="mt-4 p-3" style="background: #f8f9fa; border-radius: 10px; border-left: 4px solid #003366;">
                                <div class="row align-items-center">
                                    <div class="col-md-3">
                                        <strong style="color: #2c3e50;">
                                            <i class="fas fa-info-circle" style="color: #003366; margin-right: 4px;"></i> Leyenda
                                        </strong>
                                    </div>
                                    <div class="col-md-9">
                                        <div class="d-flex flex-wrap align-items-center" style="gap: 15px;">
                                            <div class="d-flex align-items-center">
                                                <img width="25px" height="25px" src="../assets/img/button_gray.png" class="mr-2">
                                                <span style="font-size: 0.8rem; color: #6c757d;">Sin Realizar</span>
                                            </div>
                                            <div class="d-flex align-items-center">
                                                <img width="25px" height="25px" src="../assets/img/button_blue.jpg" class="mr-2">
                                                <span style="font-size: 0.8rem; color: #17a2b8;">En Proceso</span>
                                            </div>
                                            <div class="d-flex align-items-center">
                                                <img width="25px" height="25px" src="../assets/img/button_green.png" class="mr-2">
                                                <span style="font-size: 0.8rem; color: #28a745;">Procesado</span>
                                            </div>
                                            <div class="d-flex align-items-center">
                                                <img width="25px" height="25px" src="../assets/img/button_red.jpeg" class="mr-2">
                                                <span style="font-size: 0.8rem; color: #dc3545;">Error</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Input oculto -->
                            <div>
                                <input type="hidden" name="str" id="str">
                            </div>

                            <!-- Botones de Acción -->
                            <div class="row mt-4">
                                <div class="col-md-12 text-center">
                                    <a href="<?php echo base_url(); ?>dashboard08/index" class="btn btn-default" style="border-radius: 10px; padding: 10px 30px; font-weight: 500; transition: all 0.3s;">
                                        <i class="fas fa-home mr-2"></i>
                                        Ir al Inicio
                                    </a>
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
    .table-hover tbody tr:hover {
        background-color: #e8f0fe !important;
        transition: background 0.2s ease;
    }

    .card {
        border-radius: 12px !important;
        overflow: hidden;
    }

    .table tbody td img {
        border-radius: 50%;
        border: 2px solid transparent;
        transition: transform 0.2s ease, border-color 0.2s ease;
    }

    .table tbody td img:hover {
        transform: scale(1.1);
        border-color: #003366;
    }

    .btn:hover {
        opacity: 0.85;
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(0, 51, 102, 0.3);
    }

    @media (max-width: 768px) {
        .card-title { font-size: 1rem !important; }
        .table td, .table th { padding: 10px 12px !important; font-size: 0.85rem; }
        .table tbody td img { width: 22px !important; height: 22px !important; }
        .d-flex.flex-wrap { gap: 8px !important; }
    }

    @media (max-width: 576px) {
        .table td, .table th { padding: 8px 10px !important; font-size: 0.75rem; }
        .table tbody td img { width: 20px !important; height: 20px !important; }
        .badge { font-size: 0.7rem !important; padding: 4px 10px !important; }
    }
</style>