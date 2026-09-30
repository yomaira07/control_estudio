<<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" style="background: #f4f6f9;">

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0" style="font-weight: 300; color: #003366;">
                        <i class="fas fa-graduation-cap" style="color: #003366; margin-right: 8px;"></i>
                        <span style="color: #003366; font-weight: 600;">SCE-ENFMP</span>
                        <span style="color: #2c3e50; font-weight: 300;"> - Datos Académicos</span>
                    </h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right" style="background: transparent;">
                        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>dashboard08/index" style="color: #6c757d;">Inicio</a></li>
                        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>dashboard08/datos" style="color: #6c757d;">Datos Personales</a></li>                      
                        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>dashboard08/datos1" style="color: #6c757d;">Domicilio</a></li>                        
                        <li class="breadcrumb-item active" style="color: #003366; font-weight: 600;">Datos Académicos</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <script type="text/javascript">
        function iniciar(){ borrar_valor(); }
        function borrar_valor(){
            if(document.getElementById('estudia').value=="2"){
                document.getElementById('nivel_cursa').value='';
                document.getElementById('titulo_obtener').value='';
                document.querySelector('#nivel_cursa').required = false;
                document.querySelector('#titulo_obtener').required = false;
            } else {
                if(document.getElementById('estudia').value=="1"){
                    document.querySelector('#nivel_cursa').required = true;
                    document.querySelector('#titulo_obtener').required = true;
                }
            }
        }
        window.onload = iniciar();
        </script>
        <script language="javascript">
        function siguiente(){ location.href="datos2"; }
        </script>

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
                                        <strong>Datos Académicos Culminados del Aspirante</strong>
                                    </h5>
                                    <small class="text-muted" style="font-size: 0.75rem;">
                                        <i class="fas fa-book mr-1"></i>
                                        Pregrado y Postgrado
                                    </small>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Body -->
                    <div class="card-body p-4">

                        <!-- Alertas -->
                        <?php if ($this->session->flashdata("error")): ?>
                            <div class="alert alert-danger alert-dismissible fade show flash-alert" role="alert">
                                <div class="d-flex align-items-start">
                                    <div class="flash-alert-icon flash-alert-icon-danger"><i class="fas fa-exclamation-triangle"></i></div>
                                    <div class="flex-grow-1">
                                        <h6 class="flash-alert-title">Error</h6>
                                        <p class="flash-alert-text mb-0"><?php echo $this->session->flashdata("error"); ?></p>
                                    </div>
                                </div>
                                <button type="button" class="close flash-alert-close" data-dismiss="alert"><span>&times;</span></button>
                            </div>
                        <?php endif; ?>
                        <?php if ($this->session->flashdata("success")): ?>
                            <div class="alert alert-success alert-dismissible fade show flash-alert" role="alert" style="background:#e8f5e9; border-left-color:#28a745; color:#1e7e34;">
                                <div class="d-flex align-items-start">
                                    <div class="flash-alert-icon" style="background: linear-gradient(135deg, #28a745 0%, #1e7e34 100%);"><i class="fas fa-check"></i></div>
                                    <div class="flex-grow-1">
                                        <h6 class="flash-alert-title">Éxito</h6>
                                        <p class="flash-alert-text mb-0"><?php echo $this->session->flashdata("success"); ?></p>
                                    </div>
                                </div>
                                <button type="button" class="close flash-alert-close" data-dismiss="alert"><span>&times;</span></button>
                            </div>
                        <?php endif; ?>
                        <?php if ($this->session->flashdata("warning")): ?>
                            <div class="alert alert-warning alert-dismissible fade show flash-alert" role="alert" style="background:#fff3cd; border-left-color:#ffc107; color:#856404;">
                                <div class="d-flex align-items-start">
                                    <div class="flash-alert-icon" style="background: linear-gradient(135deg, #ffc107 0%, #d39e00 100%);"><i class="fas fa-exclamation-circle"></i></div>
                                    <div class="flex-grow-1">
                                        <h6 class="flash-alert-title">Advertencia</h6>
                                        <p class="flash-alert-text mb-0"><?php echo $this->session->flashdata("warning"); ?></p>
                                    </div>
                                </div>
                                <button type="button" class="close flash-alert-close" data-dismiss="alert"><span>&times;</span></button>
                            </div>
                        <?php endif; ?>

                        <!-- CARD PREGRADO -->
                        <div class="card card-info card-outline" style="border-radius: 8px; border-left: 4px solid #003366; border-top: none; margin-bottom: 20px;">
                            <div class="card-header" style="background: #e8f0fe; border-bottom: 1px solid #e8e8e8; padding: 10px 18px; border-radius: 8px 8px 0 0;">
                                <h6 class="mb-0" style="font-weight: 600; color: #003366; font-size: 0.85rem; letter-spacing: 0.5px; text-align: center;">
                                    <i class="fas fa-book" style="color: #003366; margin-right: 6px;"></i>
                                    ESTUDIOS DE PREGRADO
                                </h6>
                            </div>
                            <div class="card-body p-3">
                                <form action="<?php echo base_url() ?>dashboard08/registrar_pregrado/<?php echo $this->session->userdata('id'); ?>" method="POST">
                                    <input type="hidden" name="id_usuario" value="<?php echo $this->session->userdata('id'); ?>">
                                    <input type="hidden" name="id_academico" value="<?php if ($datos_academicos_pre == false) { echo "falso"; } else { echo $datos_academicos_pre->id; } ?>">
                                    <input type="hidden" name="no_encontrado" value="<?php if ($datos_academicos_pre == false) { echo "falso"; } else { echo $datos_academicos_pre->id; } ?>">
                                    <input type="hidden" name="fecha_actualizacion" value="<?php echo date('d-m-Y H:i:s'); ?>">
                                    <input type="hidden" name="nivel_academico" value="1">

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="carrera_pre" title="-Dato Obligatorio-">
                                                    <i class="fas fa-bookmark" style="color: #003366; margin-right: 4px;"></i>
                                                    (*) Carrera Pregrado
                                                </label>
                                                <input type="text" class="form-control" id="carrera_pre" placeholder="Indique la carrera de pregrado obtenida" name="carrera_pre" onkeyup="javascript:this.value=this.value.toUpperCase();" value="<?php if ($datos_academicos_pre == false) { echo ""; } else { echo $datos_academicos_pre->ult_titulo; } ?>" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="institucion_pre" title="-Dato Obligatorio-">
                                                    <i class="fas fa-university" style="color: #003366; margin-right: 4px;"></i>
                                                    (*) Nombre de la casa de estudio
                                                </label>
                                                <input type="text" class="form-control" id="institucion_pre" placeholder="Indique el nombre de la casa de estudio" name="institucion_pre" onkeyup="javascript:this.value=this.value.toUpperCase();" value="<?php if ($datos_academicos_pre == false) { echo ""; } else { echo $datos_academicos_pre->institucion; } ?>" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="text-center mt-2">
                                        <button type="submit" class="btn btn-primary" title="Registrar Pregrado" style="border-radius: 10px; padding: 10px 30px; font-weight: 500; transition: all 0.3s;">
                                            <i class="fas fa-save mr-2"></i>
                                            Registrar Pregrado
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <!-- CARD POSTGRADO -->
                        <div class="card card-success card-outline" style="border-radius: 8px; border-left: 4px solid #28a745; border-top: none; margin-bottom: 20px;">
                            <div class="card-header" style="background: #e8f5e9; border-bottom: 1px solid #e8e8e8; padding: 10px 18px; border-radius: 8px 8px 0 0;">
                                <h6 class="mb-0" style="font-weight: 600; color: #1e7e34; font-size: 0.85rem; letter-spacing: 0.5px; text-align: center;">
                                    <i class="fas fa-user-graduate" style="color: #28a745; margin-right: 6px;"></i>
                                    ESTUDIOS DE POSTGRADO
                                </h6>
                            </div>
                            <div class="card-body p-3">

                                <!-- Alertas postgrado -->
                                <?php if ($this->session->flashdata("error_a")): ?>
                                    <div class="alert alert-danger alert-dismissible fade show flash-alert" role="alert">
                                        <div class="d-flex align-items-start">
                                            <div class="flash-alert-icon flash-alert-icon-danger"><i class="fas fa-exclamation-triangle"></i></div>
                                            <div class="flex-grow-1">
                                                <h6 class="flash-alert-title">Error</h6>
                                                <p class="flash-alert-text mb-0"><?php echo $this->session->flashdata("error_a"); ?></p>
                                            </div>
                                        </div>
                                        <button type="button" class="close flash-alert-close" data-dismiss="alert"><span>&times;</span></button>
                                    </div>
                                <?php endif; ?>
                                <?php if ($this->session->flashdata("success_a")): ?>
                                    <div class="alert alert-success alert-dismissible fade show flash-alert" role="alert" style="background:#e8f5e9; border-left-color:#28a745; color:#1e7e34;">
                                        <div class="d-flex align-items-start">
                                            <div class="flash-alert-icon" style="background: linear-gradient(135deg, #28a745 0%, #1e7e34 100%);"><i class="fas fa-check"></i></div>
                                            <div class="flex-grow-1">
                                                <h6 class="flash-alert-title">Éxito</h6>
                                                <p class="flash-alert-text mb-0"><?php echo $this->session->flashdata("success_a"); ?></p>
                                            </div>
                                        </div>
                                        <button type="button" class="close flash-alert-close" data-dismiss="alert"><span>&times;</span></button>
                                    </div>
                                <?php endif; ?>
                                <?php if ($this->session->flashdata("warning_a")): ?>
                                    <div class="alert alert-warning alert-dismissible fade show flash-alert" role="alert" style="background:#fff3cd; border-left-color:#ffc107; color:#856404;">
                                        <div class="d-flex align-items-start">
                                            <div class="flash-alert-icon" style="background: linear-gradient(135deg, #ffc107 0%, #d39e00 100%);"><i class="fas fa-exclamation-circle"></i></div>
                                            <div class="flex-grow-1">
                                                <h6 class="flash-alert-title">Advertencia</h6>
                                                <p class="flash-alert-text mb-0"><?php echo $this->session->flashdata("warning_a"); ?></p>
                                            </div>
                                        </div>
                                        <button type="button" class="close flash-alert-close" data-dismiss="alert"><span>&times;</span></button>
                                    </div>
                                <?php endif; ?>

                                <form name="postgrado" method="POST" action="<?php echo base_url() ?>dashboard08/registrar_postgrado/<?php echo $this->session->userdata('id'); ?>">
                                    <input type="hidden" name="id_academico" value="<?php if ($datos_academicos_post == false) { echo "falso"; } else { echo $datos_academicos_post->id; } ?>">
                                    <input type="hidden" name="id_usuario" value="<?php echo $this->session->userdata('id'); ?>">
                                    <input type="hidden" name="nivel_academico_post" value="2">
                                    <input type="hidden" name="fecha_actualizacion" value="<?php echo date('d-m-Y H:i:s'); ?>">

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="ult_titulo_post" title="-Dato Obligatorio-">
                                                    <i class="fas fa-award" style="color: #28a745; margin-right: 4px;"></i>
                                                    (*) Postgrado
                                                </label>
                                                <input type="text" class="form-control" id="ult_titulo_post" placeholder="Indique el Título de Postgrado Obtenido" name="ult_titulo_post" onkeyup="javascript:this.value=this.value.toUpperCase();" value="<?php if ($datos_academicos_post == false) { echo ""; } else { echo $datos_academicos_post->titulo_obtener; } ?>" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="institucion_post" title="-Dato Obligatorio-">
                                                    <i class="fas fa-university" style="color: #28a745; margin-right: 4px;"></i>
                                                    (*) Casa de estudio
                                                </label>
                                                <input type="text" class="form-control" id="institucion_post" placeholder="Indique el nombre de la casa de estudio" name="institucion_post" onkeyup="javascript:this.value=this.value.toUpperCase();" value="<?php if ($datos_academicos_post == false) { echo ""; } else { echo $datos_academicos_post->institucion; } ?>" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="text-center mt-2">
                                        <button type="submit" class="btn btn-success" title="Registrar Postgrado" style="border-radius: 10px; padding: 10px 30px; font-weight: 500; background:#28a745; border-color:#28a745; transition: all 0.3s;">
                                            <i class="fas fa-plus-circle mr-2"></i>
                                            Registrar Postgrado
                                        </button>
                                    </div>
                                </form>

                                <!-- Tabla postgrados -->
                                <div class="table-responsive mt-3">
                                    <table id="example" class="table table-hover" style="border-radius: 8px; overflow: hidden; margin-bottom: 0;">
                                        <thead>
                                            <tr style="background: #f8f9fa;">
                                                <th style="padding: 12px 15px; font-weight: 600; color: #2c3e50; font-size: 0.78rem; border-bottom: 2px solid #e8e8e8;">Postgrado</th>
                                                <th style="padding: 12px 15px; font-weight: 600; color: #2c3e50; font-size: 0.78rem; border-bottom: 2px solid #e8e8e8;">Casa de Estudio</th>
                                                <th style="padding: 12px 15px; font-weight: 600; color: #2c3e50; font-size: 0.78rem; border-bottom: 2px solid #e8e8e8;">Año Ingreso</th>
                                                <th style="padding: 12px 15px; font-weight: 600; color: #2c3e50; font-size: 0.78rem; border-bottom: 2px solid #e8e8e8;">Año Graduación</th>
                                                <th style="padding: 12px 15px; font-weight: 600; color: #2c3e50; font-size: 0.78rem; border-bottom: 2px solid #e8e8e8;">Tema de grado</th>
                                                <th style="padding: 12px 15px; font-weight: 600; color: #2c3e50; font-size: 0.78rem; border-bottom: 2px solid #e8e8e8; text-align: center;">Opción</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($datos_academicos_post as $datos_academicos_post) { ?>
                                                <tr style="border-bottom: 1px solid #f0f0f0;">
                                                    <td style="padding: 10px 15px; font-size: 0.78rem; color: #2c3e50;"><?php echo $datos_academicos_post->ult_titulo; ?></td>
                                                    <td style="padding: 10px 15px; font-size: 0.78rem; color: #2c3e50;"><?php echo $datos_academicos_post->institucion; ?></td>
                                                    <td style="padding: 10px 15px; font-size: 0.78rem; color: #2c3e50;"><?php echo $datos_academicos_post->anno_ingreso; ?></td>
                                                    <td style="padding: 10px 15px; font-size: 0.78rem; color: #2c3e50;"><?php echo $datos_academicos_post->anno_graduacion; ?></td>
                                                    <td style="padding: 10px 15px; font-size: 0.78rem; color: #2c3e50;"><?php echo $datos_academicos_post->tema_grado; ?></td>
                                                    <td style="padding: 10px 15px; text-align: center;">
                                                        <a href="<?php echo base_url() ?>dashboard08/academico_post_edit/<?php echo $datos_academicos_post->id; ?>" class="mr-2" title="Editar">
                                                            <i class="fas fa-edit" style="color: #17a2b8; font-size: 0.9rem;"></i>
                                                        </a>
                                                        <a href="<?php echo base_url() ?>dashboard08/postgrado_eliminar/<?php echo $datos_academicos_post->id; ?>" title="Eliminar">
                                                            <i class="fas fa-trash" style="color: #dc3545; font-size: 0.9rem;"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <!-- Botón siguiente -->
                        <div class="row justify-content-center mt-3">
                            <div class="col-lg-9 col-md-11 text-center">
                                <button type="button" class="btn btn-default" onClick="siguiente();" style="border-radius: 10px; padding: 10px 40px; font-weight: 500; transition: all 0.3s;">
                                    <i class="fas fa-arrow-right mr-2"></i>
                                    Siguiente
                                </button>
                                <div style="margin-top: 10px;">
                                    <small style="font-size: 0.75rem; color: #6c757d;"><b>(*) Dato Obligatorio</b></small>
                                </div>
                            </div>
                        </div>

                    </div><!-- /.card-body -->
                </div><!-- /.card -->
            </div><!-- /.card-body -->
        </div><!-- /.card -->
    </section>
</div>

<style>
    .form-control:focus { border-color: #003366; box-shadow: 0 0 0 0.2rem rgba(0,51,102,0.25); }
    .btn-primary { background-color: #003366; border-color: #003366; color: #fff; transition: all 0.2s ease; }
    .btn-primary:hover { background-color: #002244; border-color: #002244; box-shadow: 0 2px 8px rgba(0,51,102,0.3); transform: translateY(-2px); }
    .btn-success { background-color: #28a745; border-color: #28a745; color: #fff; transition: all 0.2s ease; }
    .btn-success:hover { background-color: #1e7e34; border-color: #1e7e34; box-shadow: 0 2px 8px rgba(40,167,69,0.3); transform: translateY(-2px); }
    .btn-info { background-color: #17a2b8; border-color: #17a2b8; color: #fff; }
    .btn-info:hover { background-color: #117a8b; border-color: #117a8b; transform: translateY(-2px); }

    .table-hover tbody tr:hover { background-color: #e8f0fe !important; transition: background 0.2s ease; }
    .card { transition: box-shadow 0.25s ease; }
    .card:hover { box-shadow: 0 6px 18px rgba(0,51,102,0.08) !important; }

    .flash-alert { position: relative; border: none; border-left: 4px solid transparent; border-radius: 10px !important; padding: 12px 16px 12px 14px; box-shadow: 0 4px 12px rgba(0,51,102,0.08); animation: flashSlideIn 0.35s ease-out; margin-bottom: 16px; }
    .flash-alert.alert-danger { background: #fdecea; border-left-color: #dc3545; color: #721c24; }
    .flash-alert-icon { width: 32px; height: 32px; min-width: 32px; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin-right: 12px; color: #fff; font-size: 0.85rem; flex-shrink: 0; }
    .flash-alert-icon-danger { background: linear-gradient(135deg, #dc3545 0%, #a71d2a 100%); box-shadow: 0 3px 8px rgba(220,53,69,0.35); }
    .flash-alert-title { font-size: 0.78rem; font-weight: 700; margin-bottom: 1px; color: inherit; }
    .flash-alert-text { font-size: 0.72rem; line-height: 1.4; color: inherit; opacity: 0.92; }
    .flash-alert-close { position: absolute; top: 8px; right: 10px; font-size: 1rem; opacity: 0.5; color: inherit; padding: 0; line-height: 1; }
    .flash-alert-close:hover { opacity: 1; }
    @keyframes flashSlideIn { from { opacity: 0; transform: translateY(-8px); } to { opacity: 1; transform: translateY(0); } }

    @media (max-width: 768px) {
        .card-header h5 { font-size: 0.95rem !important; }
        .table td, .table th { padding: 8px 10px !important; font-size: 0.72rem !important; }
    }
</style>