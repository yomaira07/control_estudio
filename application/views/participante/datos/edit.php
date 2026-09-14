<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" style="background: #f4f6f9;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0" style="font-weight: 300; color: #003366;">
                        <i class="fas fa-user-edit" style="color: #003366; margin-right: 8px;"></i>
                        <span style="color: #003366; font-weight: 600;">SCE-ENFMP</span>
                        <span style="color: #2c3e50; font-weight: 300;"> - Datos Personales</span>
                    </h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right" style="background: transparent;">
                        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>dashboard04/home" style="color: #6c757d;">Inicio</a></li>
                    
                        <li class="breadcrumb-item active" style="color: #003366; font-weight: 600;">Información del Estudiante - Datos Personales</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <!-- Main content -->
    <section class="content">
        <form action="<?php echo base_url(); ?>dashboard04/actualizar/<?php echo $this->session->userdata('id'); ?>" method="POST">
            
            <!-- Card Principal -->
            <div class="card card-primary card-outline shadow-sm" style="border-radius: 10px; border-top: 4px solid #003366;">
                <div class="card-body p-0">
                    <div class="card" style="border: none; border-radius: 10px;">
                        
                        <!-- Header -->
                        <div class="card-header py-3" style="border-bottom: 1px solid #e8e8e8; border-radius: 10px 10px 0 0; background: #fafafa;">
                            <div class="d-flex align-items-center justify-content-between flex-wrap">
                                <div class="d-flex align-items-center">
                                    <div class="mr-3" style="width: 42px; height: 42px; background: #003366; border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                                        <i class="fas fa-user-edit text-white" style="font-size: 1.1rem;"></i>
                                    </div>
                                    <div>
                                        <h5 class="mb-0" style="font-weight: 600; color: #2c3e50;">
                                            <strong>Datos Personales</strong>
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

                          
                            <?php if ($this->session->flashdata("info")): ?>
                                <div class="alert alert-info alert-dismissible" style="border-radius: 8px; border-left: 4px solid #17a2b8;">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    <i class="icon fa fa-info-circle mr-2"></i> <?php echo $this->session->flashdata("info"); ?>
                                </div>
                            <?php endif; ?>

                            <!-- Campos ocultos -->
                            <input type="hidden" name="id_usuario" value="<?php echo $this->session->userdata('id'); ?>">
                            <input type="hidden" name="id" value="<?php if ($datos_alumnos==false){echo "falso";}else{ echo $datos_alumnos->id; } ?>">
                            <input type="hidden" name="no_encontrado" value="<?php if ($datos_alumnos==false){echo "falso";}else{ echo $datos_alumnos->id; } ?>"> 
                            <input type="hidden" name="fecha_actualizacion" value="<?php echo date('Y-m-d H:i:s'); ?>">

                            <!-- Datos Personales -->
                            <div class="row">
                                <div class="col-md-6">
                                    <!-- Primer Nombre -->
                                    <div class="form-group">
                                        <label for="primer_nombre" style="font-weight: 500; color: #2c3e50;">
                                            <i class="fas fa-user" style="color: #003366; margin-right: 6px;"></i> (*) Primer Nombre
                                        </label>
                                        <input type="text" class="form-control" id="primer_nombre" placeholder="Primer Nombre" name="primer_nombre" onkeyup="javascript:this.value=this.value.toUpperCase();" value="<?php if ($datos_alumnos==false){echo "";}else{ echo $datos_alumnos->nombre_primer; } ?>" required style="border-radius: 0px; border: 1px solid #ced4da;">
                                    </div>

                                    <!-- Primer Apellido -->
                                    <div class="form-group">
                                        <label for="primer_apellido" style="font-weight: 500; color: #2c3e50;">
                                        <i class="fas fa-user" style="color: #003366; margin-right: 6px;"></i> (*) Primer Apellido
                                        </label>
                                        <input type="text" class="form-control" id="primer_apellido" placeholder="Primer Apellido" name="primer_apellido" onkeyup="javascript:this.value=this.value.toUpperCase();" value="<?php if ($datos_alumnos==false){echo "";}else{ echo $datos_alumnos->apellido_primer; } ?>" required style="border-radius: 0px; border: 1px solid #ced4da;">
                                    </div>

                                    <!-- Cédula -->
                                    <div class="form-group">
                                        <label for="cedula" style="font-weight: 500; color: #2c3e50;">
                                            <i class="fas fa-id-card" style="color: #003366; margin-right: 6px;"></i> (*) Cédula
                                        </label>
                                        <div class="row no-gutters">
                                            <div class="col-2">
                                                <select class="form-control" name="cod_nacionalidad" required style="border-radius: 0px; border: 1px solid #ced4da; border-right: none;">
                                                    <option value="V" <?php if($datos_alumnos->nacionalidad=='V') echo " selected"; ?>>V</option>
                                                    <option value="E" <?php if($datos_alumnos->nacionalidad=='E') echo " selected"; ?>>E</option>
                                                </select>
                                            </div>
                                            <div class="col-5">
                                                <input type="text" class="form-control" id="cedula" maxlength="8" minlength="6" name="cedula" onkeypress="return controltag(event)" value="<?php if ($datos_alumnos==false){echo "";}else{ echo $datos_alumnos->cedula; } ?>" required style="border-radius: 0px; border: 1px solid #ced4da;">
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Estado Civil -->
                                    <div class="form-group">
                                        <label for="estado_civil" style="font-weight: 500; color: #2c3e50;">
                                            <i class="fas fa-ring" style="color: #003366; margin-right: 6px;"></i> (*) Estado Civil
                                        </label>
                                        <select class="form-control" name="estado_civil" id="estado_civil" required style="border-radius: 0px; border: 1px solid #ced4da;">
                                            <option value="">- Seleccione -</option>                                       
                                            <?php foreach($lista_estadocivil as $lista_estadocivil): ?>
                                                <option value="<?php echo $lista_estadocivil->id; ?>" <?php if($datos_alumnos->id_estado_civil == $lista_estadocivil->id){ echo " selected"; } ?>><?php echo $lista_estadocivil->descripcion; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>

                                    <!-- Teléfono de Habitación -->
                                    <div class="form-group">
                                        <label for="telefono_hab" style="font-weight: 500; color: #2c3e50;">
                                            <i class="fas fa-phone" style="color: #003366; margin-right: 6px;"></i> (*) Teléfono de Habitación
                                        </label>
                                        <div class="row no-gutters">
                                            <div class="col-3">
                                                <select class="form-control" name="codigo_telhab" id="codigo_telhab" required style="border-radius: 0px; border: 1px solid #ced4da; border-right: none;">
                                                    <option value="">- Cód -</option>                                       
                                                    <?php foreach($cod_hab as $cod_hab): ?>
                                                        <option value="<?php echo $cod_hab->id; ?>" <?php if($datos_alumnos->id_codigo_hab == $cod_hab->id){ echo " selected"; } ?>><?php echo $cod_hab->descripcion; ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                            <div class="col-5">
                                                <input type="text" class="form-control" id="telefono_hab" maxlength="7" placeholder="Teléfono" onkeypress="return controltag(event)" name="telefono_hab" value="<?php if ($datos_alumnos==false){echo "";}else{ echo $datos_alumnos->tel_habitacion; } ?>" required style="border-radius: 0px; border: 1px solid #ced4da;">
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Teléfono con Whatsapp -->
                                    <div class="form-group">
                                        <label for="telefono_celwhat" style="font-weight: 500; color: #2c3e50;">
                                            <i class="fab fa-whatsapp" style="color: #003366; margin-right: 6px;"></i> (*) Teléfono con Whatsapp
                                        </label>
                                        <div class="row no-gutters">
                                            <div class="col-3">
                                                <select class="form-control" name="codigo_telcelwhat" id="codigo_telcelwhat" required style="border-radius: 0px; border: 1px solid #ced4da; border-right: none;">
                                                    <option value="">- Cód -</option>                                       
                                                    <?php foreach($cod_celwhat as $cod_celwhat): ?>
                                                        <option value="<?php echo $cod_celwhat->id; ?>" <?php if($datos_alumnos->id_codigo_cel_whatsapp == $cod_celwhat->id && (date('Y-m-d',strtotime($datos_alumnos->dactualizacion)) >= $tiempo_pre->fecha_inicio)){ echo " selected"; } ?>><?php echo $cod_celwhat->descripcion; ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                            <div class="col-5">
                                                <input type="text" class="form-control" id="telefono_celwhat" maxlength="7" placeholder="Whatsapp" onkeypress="return controltag(event)" name="telefono_celwhat" required value="<?php if ($datos_alumnos==false){echo "";}elseif($datos_alumnos->dactualizacion >= $tiempo_pre->fecha_inicio){ echo $datos_alumnos->telefono_whatsapp; } ?>" style="border-radius: 0px; border: 1px solid #ced4da;">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <!-- Segundo Nombre -->
                                    <div class="form-group">
                                        <label for="segundo_nombre" style="font-weight: 500; color: #2c3e50;">
                                            <i class="fas fa-user text-muted mr-1"></i> Segundo Nombre
                                        </label>
                                        <input type="text" class="form-control" id="segundo_nombre" placeholder="Segundo nombre" name="segundo_nombre" onkeyup="javascript:this.value=this.value.toUpperCase();" value="<?php if ($datos_alumnos==false){echo "";}else{ echo $datos_alumnos->nombre_segundo; } ?>" style="border-radius: 0px; border: 1px solid #ced4da;">
                                    </div>

                                    <!-- Segundo Apellido -->
                                    <div class="form-group">
                                        <label for="segundo_apellido" style="font-weight: 500; color: #2c3e50;">
                                            <i class="fas fa-user text-muted mr-1"></i> Segundo Apellido
                                        </label>
                                        <input type="text" class="form-control" id="segundo_apellido" placeholder="Segundo apellido" name="segundo_apellido" onkeyup="javascript:this.value=this.value.toUpperCase();" value="<?php if ($datos_alumnos==false){echo "";}else{ echo $datos_alumnos->apellido_segundo; } ?>" style="border-radius: 0px; border: 1px solid #ced4da;">
                                    </div>

                                    <!-- Sexo -->
                                    <div class="form-group">
                                        <label for="sexo" style="font-weight: 500; color: #2c3e50;">
                                            <i class="fas fa-venus-mars" style="color: #003366; margin-right: 6px;"></i> (*) Sexo
                                        </label>
                                        <select class="form-control" name="sexo" id="sexo" required style="border-radius: 0px; border: 1px solid #ced4da;">
                                            <option value="">- Seleccione -</option>                                    
                                            <?php foreach($lista_sexo as $lista_sexo): ?>
                                                <option value="<?php echo $lista_sexo->id; ?>" <?php if($datos_alumnos->id_sexo == $lista_sexo->id){ echo " selected"; } ?>><?php echo $lista_sexo->descripcion; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>

                                       <!-- Correo - CORREGIDO: sin toUpperCase ni toLowerCase -->
                                    <div class="form-group">
                                        <label for="correo" style="font-weight: 500; color: #2c3e50;">
                                            <i class="fas fa-envelope" style="color: #003366; margin-right: 6px;"></i> (*) Correo
                                        </label>
                                        <input type="email" class="form-control" id="correo" placeholder="ejemplo@gmail.com" name="correo" value="<?php if ($datos_alumnos==false){echo "";}elseif($datos_alumnos->dactualizacion >= $tiempo_pre->fecha_inicio){ echo $datos_alumnos->correo; } ?>" required style="border-radius: 0px; border: 1px solid #ced4da;">
                                    </div>
                                    <!-- Fecha de Nacimiento -->
                                    <div class="form-group">
                                        <label for="fec_nac" style="font-weight: 500; color: #2c3e50;">
                                            <i class="fas fa-calendar-alt" style="color: #003366; margin-right: 6px;"></i> (*) Fecha de Nacimiento
                                        </label>
                                        <input type="date" class="form-control" id="fec_nac" name="fec_nac" value="<?php if ($datos_alumnos==false){echo "";}else{ echo $datos_alumnos->fecha_nac; } ?>" required style="border-radius: 0px; border: 1px solid #ced4da;">
                                    </div>

                                    <!-- Teléfono Celular -->
                                    <div class="form-group">
                                        <label for="telefono_cel" style="font-weight: 500; color: #2c3e50;">
                                            <i class="fas fa-mobile-alt" style="color: #003366; margin-right: 6px;"></i> (*) Teléfono Celular
                                        </label>
                                        <div class="row no-gutters">
                                            <div class="col-3">
                                                <select class="form-control" name="codigo_telcel" id="codigo_telcel" required style="border-radius: 0px; border: 1px solid #ced4da; border-right: none;">
                                                    <option value="">- Cód -</option>                                       
                                                    <?php foreach($cod_cel as $cod_cel): ?>
                                                        <option value="<?php echo $cod_cel->id; ?>" <?php if($datos_alumnos->id_codigo_cel == $cod_cel->id && (date('Y-m-d',strtotime($datos_alumnos->dactualizacion)) >= $tiempo_pre->fecha_inicio)){ echo " selected"; } ?>><?php echo $cod_cel->descripcion; ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                            <div class="col-5">
                                                <input type="text" class="form-control" id="telefono_cel" maxlength="7" placeholder="Celular" onkeypress="return controltag(event)" name="telefono_cel" required value="<?php if ($datos_alumnos==false){echo "";}elseif($datos_alumnos->dactualizacion >= $tiempo_pre->fecha_inicio){ echo $datos_alumnos->tel_celular; } ?>" style="border-radius: 0px; border: 1px solid #ced4da;">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Botón de Envío -->
                            <div class="row mt-4">
                                <div class="col-md-12 text-center">
                                    <button type="submit" class="btn btn-primary" style="border-radius: 10px; padding: 10px 40px; font-weight: 500; transition: all 0.3s;" title="Hacer clic para Registrar Datos">
                                        <i class="fas fa-save mr-2"></i>
                                        Actualizar Información
                                    </button>
                                    <a href="<?php echo base_url(); ?>dashboard04/home" class="btn btn-default" style="border-radius: 10px; padding: 10px 30px; font-weight: 500; margin-left: 8px; transition: all 0.3s;">
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

<!-- Script para validación de teclado -->
<script>
    function controltag(event) {
        var key = event.keyCode || event.which;
        var tecla = String.fromCharCode(key).toLowerCase();
        var numeros = "0123456789";
        if (numeros.indexOf(tecla) == -1 && key != 8 && key != 46 && key != 37 && key != 39) {
            return false;
        }
        return true;
    }
</script>