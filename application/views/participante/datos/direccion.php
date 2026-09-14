<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" style="background: #f4f6f9;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0" style="font-weight: 300; color: #003366;">
                        <i class="fas fa-map-marker-alt" style="color: #003366; margin-right: 8px;"></i>
                        <span style="color: #003366; font-weight: 600;">SCE-ENFMP</span>
                        <span style="color: #2c3e50; font-weight: 300;"> - Dirección de Domicilio</span>
                    </h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right" style="background: transparent;">
                        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>dashboard04/home" style="color: #6c757d;">Inicio</a></li>
                        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>dashboard04/index" style="color: #6c757d;">Información del Estudiante - Datos Personales</a></li>
                        <li class="breadcrumb-item active" style="color: #003366; font-weight: 600;"> - Dirección</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <!-- Main content -->
    <section class="content">
        <form action="<?php echo base_url(); ?>dashboard04/direccion_store/<?php echo $this->session->userdata('id'); ?>" method="POST" name="carga">
            
            <!-- Card Principal -->
            <div class="card card-primary card-outline shadow-sm" style="border-radius: 10px; border-top: 4px solid #003366;">
                <div class="card-body p-0">
                    <div class="card" style="border: none; border-radius: 10px;">
                        
                        <!-- Header -->
                        <div class="card-header py-3" style="border-bottom: 1px solid #e8e8e8; border-radius: 10px 10px 0 0; background: #fafafa;">
                            <div class="d-flex align-items-center justify-content-between flex-wrap">
                                <div class="d-flex align-items-center">
                                    <div class="mr-3" style="width: 42px; height: 42px; background: #003366; border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                                        <i class="fas fa-map-marker-alt text-white" style="font-size: 1.1rem;"></i>
                                    </div>
                                    <div>
                                        <h5 class="mb-0" style="font-weight: 600; color: #2c3e50;">
                                            <strong>Dirección de Domicilio</strong>
                                        </h5>
                                        <small class="text-muted" style="font-size: 0.75rem;">
                                            <i class="fas fa-calendar-alt mr-1"></i>
                                            Período: <strong><?php echo $periodo->nombre; ?></strong>
                                        </small>
                                    </div>
                                </div>
                                <div>
                                    <span class="badge" style="font-size: 0.8rem; padding: 5px 16px; border-radius: 10px; font-weight: 500; background: #003366; color: white;">
                                        <i class="fas fa-check-circle mr-1"></i>
                                        Datos Obligatorios (*)
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

                            <!-- Campos ocultos -->
                            <input type="hidden" name="id_usuario" value="<?php echo $this->session->userdata('id'); ?>">
                            <input type="hidden" name="no_encontrado" value="<?php if ($datos_direccion==false){echo "falso";}else{ echo $datos_direccion->id; } ?>">
                            <input type="hidden" name="fecha_registro" value="<?php echo date('d-m-Y H:i:s'); ?>">

                            <!-- Estado -->
                            <div class="form-group row">
                                <label for="comboestado" class="col-sm-3 col-form-label" style="font-weight: 500; color: #2c3e50;">
                                    <i class="fas fa-flag" style="color: #003366; margin-right: 6px;"></i> (*) Estado
                                </label>
                                <div class="col-sm-9">
                                    <select name="comboestado" class="form-control" id="comboestado" required style="border-radius: 0px; border: 1px solid #ced4da;">
                                        <option value="">Seleccione...</option>
                                        <?php foreach ($combo_estado as $combo_estado): ?>
                                            <?php if($datos_direccion->id_estado == $combo_estado->id): ?>
                                                <option value="<?php echo $combo_estado->id; ?>" selected><?php echo $combo_estado->estado; ?></option>
                                            <?php else: ?>
                                                <option value="<?php echo $combo_estado->id; ?>"><?php echo $combo_estado->estado; ?></option>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>

                            <!-- Municipio -->
                            <div class="form-group row">
                                <label for="combomunicipio" class="col-sm-3 col-form-label" style="font-weight: 500; color: #2c3e50;">
                                    <i class="fas fa-city" style="color: #003366; margin-right: 6px;"></i> (*) Municipio
                                </label>
                                <div class="col-sm-9">
                                    <select name="combomunicipio" id="combomunicipio" class="form-control" required style="border-radius: 0px; border: 1px solid #ced4da;">
                                        <option value="">Seleccione...</option>
                                        <?php foreach ($combo_municipio as $combo_municipio): ?>
                                            <?php if ($datos_direccion->id_municipio == $combo_municipio->id): ?>
                                                <option value="<?php echo $datos_direccion->id_municipio; ?>" selected><?php echo $combo_municipio->municipio; ?></option>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>

                            <!-- Parroquia -->
                            <div class="form-group row">
                                <label for="comboparroquia" class="col-sm-3 col-form-label" style="font-weight: 500; color: #2c3e50;">
                                    <i class="fas fa-church" style="color: #003366; margin-right: 6px;"></i> (*) Parroquia
                                </label>
                                <div class="col-sm-9">
                                    <select name="comboparroquia" id="comboparroquia" class="form-control" required style="border-radius: 0px; border: 1px solid #ced4da;">
                                        <option value="">Seleccione...</option>
                                        <?php foreach ($combo_parroquia as $combo_parroquia): ?>
                                            <?php if ($datos_direccion->id_parroquia == $combo_parroquia->id): ?>
                                                <option value="<?php echo $datos_direccion->id_parroquia; ?>" selected><?php echo $combo_parroquia->parroquia; ?></option>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>

                            <!-- Botón de Envío -->
                            <div class="row mt-4">
                                <div class="col-md-12 text-center">
                                    <button type="submit" class="btn btn-primary" style="border-radius: 10px; padding: 10px 40px; font-weight: 500; transition: all 0.3s;" title="Hacer clic para Registrar Datos">
                                        <i class="fas fa-save mr-2"></i>
                                        Actualizar Información
                                    </button>
                                    <a href="<?php echo base_url(); ?>dashboard04/datos" class="btn btn-default" style="border-radius: 10px; padding: 10px 30px; font-weight: 500; margin-left: 8px; transition: all 0.3s;">
                                        <i class="fas fa-arrow-left mr-2"></i>
                                        Volver
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
        .btn-default {
            margin-left: 0 !important;
        }
        .form-group label {
            font-size: 0.85rem !important;
            text-align: left !important;
        }
        .col-form-label {
            padding-bottom: 5px;
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

<!-- Script para carga dinámica de Municipios y Parroquias -->
<script type="text/javascript">
    $(document).ready(function() {
        // Cargar municipios al cambiar estado
        $('#comboestado').change(function() {
            var id_estado = $(this).val();
            $.ajax({
                type: 'POST',
                url: '<?php echo base_url(); ?>dashboard04/get_municipios',
                data: {id_estado: id_estado},
                dataType: 'json',
                success: function(data) {
                    $('#combomunicipio').html('<option value="">Seleccione...</option>');
                    $.each(data, function(key, value) {
                        $('#combomunicipio').append('<option value="' + value.id + '">' + value.municipio + '</option>');
                    });
                    $('#comboparroquia').html('<option value="">Seleccione...</option>');
                }
            });
        });

        // Cargar parroquias al cambiar municipio
        $('#combomunicipio').change(function() {
            var id_municipio = $(this).val();
            $.ajax({
                type: 'POST',
                url: '<?php echo base_url(); ?>dashboard04/get_parroquias',
                data: {id_municipio: id_municipio},
                dataType: 'json',
                success: function(data) {
                    $('#comboparroquia').html('<option value="">Seleccione...</option>');
                    $.each(data, function(key, value) {
                        $('#comboparroquia').append('<option value="' + value.id + '">' + value.parroquia + '</option>');
                    });
                }
            });
        });
    });
</script>