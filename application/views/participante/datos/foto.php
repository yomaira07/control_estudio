<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" style="background: #f4f6f9;">

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0" style="font-weight: 300; color: #003366;">
                        <i class="fas fa-camera" style="color: #003366; margin-right: 8px;"></i>
                        <span style="color: #003366; font-weight: 600;">SCE-ENFMP</span>
                        <span style="color: #2c3e50; font-weight: 300;"> - Adjuntar Foto</span>
                    </h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right" style="background: transparent;">
                        <li class="breadcrumb-item">
                            <a href="<?php echo base_url(); ?>dashboard04/home" style="color: #6c757d;">Inicio</a>
                        </li>
                        <li class="breadcrumb-item active" style="color: #003366; font-weight: 600;">
                            Requisitos - Adjuntar Foto Tipo Carnet
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">

            <!-- Card Principal -->
            <div class="card card-primary card-outline shadow-sm"
                 style="border-radius: 10px; border-top: 4px solid #003366;">
                <div class="card-body p-0">
                    <div class="card" style="border: none; border-radius: 10px;">

                        <!-- Header -->
                        <div class="card-header py-3"
                             style="border-bottom: 1px solid #e8e8e8; border-radius: 10px 10px 0 0; background: #fafafa;">
                            <div class="d-flex align-items-center justify-content-between flex-wrap">
                                <div class="d-flex align-items-center">
                                    <div class="mr-3"
                                         style="width: 42px; height: 42px; background: #003366; border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                                        <i class="fas fa-camera text-white" style="font-size: 1.1rem;"></i>
                                    </div>
                                    <div>
                                        <h5 class="mb-0" style="font-weight: 600; color: #2c3e50;">
                                            <strong>Adjuntar Foto Tipo Carnet</strong>
                                        </h5>
                                        <small class="text-muted" style="font-size: 0.75rem;">
                                            <i class="fas fa-info-circle mr-1"></i>
                                            Requisito obligatorio del proceso
                                        </small>
                                    </div>
                                </div>
                                <div>
                                    <span class="badge-institucional"
                                          style="font-size: 0.8rem; padding: 5px 16px; border-radius: 10px; font-weight: 500; background: #003366; color: white;">
                                        <i class="fas fa-check-circle mr-1"></i>
                                        Requisito Obligatorio
                                    </span>
                                </div>
                            </div>
                        </div>

                        <!-- Body -->
                        <div class="card-body p-4">

                            <!-- Mensajes de Alerta -->
                            <?php if ($this->session->flashdata("error")): ?>
                                <div class="alert alert-danger alert-dismissible"
                                     style="border-radius: 8px; border-left: 4px solid #dc3545;">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    <i class="icon fa fa-ban mr-2"></i>
                                    <?php echo $this->session->flashdata("error"); ?>
                                </div>
                            <?php endif; ?>

                            <?php if ($this->session->flashdata("success")): ?>
                                <div class="alert alert-success alert-dismissible"
                                     style="border-radius: 8px; border-left: 4px solid #28a745;">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    <i class="icon fa fa-check-square mr-2"></i>
                                    <?php echo $this->session->flashdata("success"); ?>
                                </div>
                            <?php endif; ?>

                            <?php if ($this->session->flashdata("warning")): ?>
                                <div class="alert alert-warning alert-dismissible"
                                     style="border-radius: 8px; border-left: 4px solid #ffc107;">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    <i class="icon fa fa-exclamation-triangle mr-2"></i>
                                    <?php echo $this->session->flashdata("warning"); ?>
                                </div>
                            <?php endif; ?>

                            <!-- Instrucciones -->
                            <div class="row mb-4">
                                <div class="col-md-12">
                                    <div class="alert alert-info"
                                         style="border-radius: 8px; border-left: 4px solid #17a2b8; background: #e8f6f9;">
                                        <p class="mb-2" style="color: #2c3e50; font-weight: 500;">
                                            <i class="fas fa-info-circle mr-2" style="color: #17a2b8;"></i>
                                            <strong>En esta sección usted debe de manera obligatoria remitirnos su foto personal</strong>
                                        </p>
                                        <ul class="mb-0 pl-4" style="color: #6c757d; font-size: 0.88rem;">
                                            <li>El archivo debe estar en cualquiera de los formatos:
                                                <strong style="color: #003366;">*.JPG, *.JPEG, *.GIF, *.PNG</strong>.
                                            </li>
                                            <li>El tamaño máximo permitido de la foto es de
                                                <strong style="color: #003366;">1 MB (1024 KB)</strong>.
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <!-- Formulario -->
                            <form id="formulario" method="post" enctype="multipart/form-data" action="cargafoto">
                                <input type="hidden" name="id_usuario"
                                       value="<?php echo $this->session->userdata('id'); ?>">

                                <div class="row">
                                    <!-- Vista previa de la foto -->
                                    <div class="col-md-4 text-center mb-4 mb-md-0">
                                        <div class="card"
                                             style="border: none; border-radius: 10px; box-shadow: 0 2px 8px rgba(0,0,0,0.08); padding: 20px; background: #fafafa;">
                                            <p class="mb-3" style="font-weight: 600; color: #2c3e50; font-size: 0.85rem;">
                                                <i class="fas fa-image mr-1" style="color: #003366;"></i>
                                                Vista Previa
                                            </p>
                                            <?php
                                                $rutaarchivo = base_url() . 'assets/fotos/' . $this->session->userdata('id') . '_foto.jpg';
                                                if (!file_exists("$rutaarchivo")) {
                                                    echo "<img id='imgFoto' class='fotomarket' width='150px' height='165px' src='" . $rutaarchivo . "?" . time() . "' style='border: 3px solid #c9a84c; border-radius: 10px; padding: 3px; background: #fff; box-shadow: 0 4px 12px rgba(201,168,76,0.3); object-fit: cover;'>";
                                                } else {
                                                    echo "<img id='imgFoto' class='fotomarket' width='150px' height='165px' src='" . base_url() . "assets/img/no-foto.jpg' style='border: 3px solid #c9a84c; border-radius: 10px; padding: 3px; background: #fff; box-shadow: 0 4px 12px rgba(201,168,76,0.3); object-fit: cover;'>";
                                                }
                                            ?>
                                            <p class="mt-3 mb-0" style="font-size: 0.75rem; color: #6c757d;">
                                                Foto actual del usuario
                                            </p>
                                        </div>
                                    </div>

                                    <!-- Input de archivo -->
                                    <div class="col-md-8">
                                        <div class="card"
                                             style="border: 2px dashed #ced4da; border-radius: 10px; padding: 30px 20px; text-align: center; background: #fafafa; transition: all 0.3s ease;"
                                             id="drop-zone">
                                            <i class="fas fa-cloud-upload-alt"
                                               style="font-size: 3rem; color: #003366; margin-bottom: 15px; display: block;"></i>
                                            <p style="font-weight: 500; color: #2c3e50; margin-bottom: 8px;">
                                                Seleccione su foto personal
                                            </p>
                                            <p style="font-size: 0.82rem; color: #6c757d; margin-bottom: 20px;">
                                                Formatos permitidos: JPG, JPEG, GIF, PNG · Máx. 1 MB
                                            </p>

                                            <div class="form-group mb-0">
                                                <div class="custom-file" style="max-width: 380px; margin: 0 auto;">
                                                    <input type="file" name="userfile" size="400" required="true"
                                                           class="custom-file-input" id="userfile">
                                                    <label class="custom-file-label" for="userfile"
                                                           style="border-radius: 10px; text-align: left; color: #6c757d;">
                                                        <i class="fas fa-folder-open mr-2"></i>Seleccionar archivo...
                                                    </label>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Botones -->
                                        <div class="text-center mt-4">
                                            <button type="submit" name="upload" value="Cargar foto"
                                                    class="btn btn-primary"
                                                    style="border-radius: 10px; padding: 10px 40px; font-weight: 500; transition: all 0.3s;"
                                                    title="Hacer clic para cargar la foto">
                                                <i class="fas fa-upload mr-2"></i>
                                                Cargar Foto
                                            </button>
                                            <a href="<?php echo base_url(); ?>dashboard04/home"
                                               class="btn btn-default"
                                               style="border-radius: 10px; padding: 10px 30px; font-weight: 500; margin-left: 8px; transition: all 0.3s;">
                                                <i class="fas fa-arrow-left mr-2"></i>
                                                Volver
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </form>

                        </div><!-- /.card-body -->
                    </div><!-- /.card -->
                </div><!-- /.card-body -->
            </div><!-- /.card card-primary card-outline -->

        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- Script para mostrar nombre del archivo seleccionado -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var input = document.getElementById('userfile');
        var dropZone = document.getElementById('drop-zone');

        if (input) {
            input.addEventListener('change', function (e) {
                var fileName = e.target.files[0] ? e.target.files[0].name : 'Seleccionar archivo...';
                var label = input.nextElementSibling;
                if (label) {
                    label.innerHTML = '<i class="fas fa-file-image mr-2" style="color:#003366;"></i>' + fileName;
                    label.style.color = '#003366';
                }
                if (dropZone) {
                    dropZone.style.borderColor = '#003366';
                    dropZone.style.background = '#f0f4f9';
                }
            });
        }

        // Efecto hover en drop-zone
        if (dropZone) {
            dropZone.addEventListener('dragover', function (e) {
                e.preventDefault();
                dropZone.style.borderColor = '#c9a84c';
                dropZone.style.background = '#fdfaf0';
            });
            dropZone.addEventListener('dragleave', function () {
                dropZone.style.borderColor = '#ced4da';
                dropZone.style.background = '#fafafa';
            });
            dropZone.addEventListener('drop', function () {
                dropZone.style.borderColor = '#003366';
                dropZone.style.background = '#f0f4f9';
            });
        }
    });
</script>