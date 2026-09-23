<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" style="background: #f4f6f9;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0" style="font-weight: 300; color: #003366;">
                        <i class="fas fa-edit" style="color: #003366; margin-right: 8px;"></i>
                        <span style="color: #003366; font-weight: 600;">SCE-ENFMP</span>
                        <span style="color: #2c3e50; font-weight: 300;"> - Actualizar Retiro Voluntario</span>
                    </h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right" style="background: transparent;">
                        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>dashboard04/home" style="color: #6c757d;">Inicio</a></li>
                        <li class="breadcrumb-item"><a href="#" style="color: #6c757d;">Trámites</a></li>
                        <li class="breadcrumb-item"><a href="#" style="color: #6c757d;">Académicos</a></li>
                        <li class="breadcrumb-item active" style="color: #003366; font-weight: 600;">Actualizar Retiro</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <!-- Main content -->
    <section class="content">

        <?php if(!empty($alumno_list)): ?>
        <!-- Card Principal -->
        <div class="card card-primary card-outline shadow-sm" style="border-radius: 10px; border-top: 4px solid #003366;">
            <div class="card-body p-0">
                <div class="card" style="border: none; border-radius: 10px;">
                    
                    <!-- Header -->
                    <div class="card-header py-3" style="border-bottom: 1px solid #e8e8e8; border-radius: 10px 10px 0 0; background: #fafafa;">
                        <div class="d-flex align-items-center justify-content-between flex-wrap">
                            <div class="d-flex align-items-center">
                                <div class="mr-3" style="width: 42px; height: 42px; background: #003366; border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                                    <i class="fas fa-edit text-white" style="font-size: 1.1rem;"></i>
                                </div>
                                <div>
                                    <h5 class="mb-0" style="font-weight: 600; color: #2c3e50;">
                                        <strong>Trámites Académicos</strong>
                                    </h5>
                                    <small class="text-muted" style="font-size: 0.75rem;">
                                        <i class="fas fa-calendar-alt mr-1"></i>
                                        Retiro Voluntario - Actualizar Registro
                                    </small>
                                </div>
                            </div>
                            <div>
                                <span class="badge" style="font-size: 0.8rem; padding: 5px 16px; border-radius: 20px; font-weight: 500; background: #ffc107; color: #856404;">
                                    <i class="fas fa-edit mr-1"></i>
                                    Actualización
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

                        <?php if ($this->session->flashdata("warning")): ?>
                            <div class="alert alert-warning alert-dismissible" style="border-radius: 8px; border-left: 4px solid #ffc107;">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <i class="icon fa fa-exclamation-triangle mr-2"></i> <?php echo $this->session->flashdata("warning"); ?>
                            </div>
                        <?php endif; ?>

                        <?php if ($this->session->flashdata("success")): ?>
                            <div class="alert alert-success alert-dismissible" style="border-radius: 8px; border-left: 4px solid #28a745;">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <i class="icon fa fa-check mr-2"></i> <?php echo $this->session->flashdata("success"); ?>
                            </div>
                        <?php endif; ?>

                        <!-- Información del Alumno -->
                        <div class="card card-info card-outline" style="border-radius: 8px; border-left: 4px solid #003366; border-top: none; margin-bottom: 20px;">
                            <div class="card-header" style="background: #e8f0fe; border-bottom: 1px solid #e8e8e8; padding: 10px 18px; border-radius: 8px 8px 0 0;">
                                <h6 class="mb-0" style="font-weight: 600; color: #003366; text-align: center;">
                                    <i class="fas fa-user-graduate" style="color: #003366; margin-right: 8px;"></i>
                                    INFORMACIÓN DEL ALUMNO
                                </h6>
                            </div>
                            <div class="card-body p-3">
                                <div class="table-responsive">
                                    <table class="table" style="margin-bottom: 0;">
                                        <tbody>
                                            <tr>
                                                <td style="padding: 6px 12px; font-weight: 500; color: #2c3e50; width: 30%;">
                                                    <i class="fas fa-id-card" style="color: #003366; width: 20px;"></i> Cédula de Identidad:
                                                </td>
                                                <td style="padding: 6px 12px; color: #2c3e50; width: 70%;">
                                                    <strong><?php echo $alumno_list->nacionalidad . '-' . $alumno_list->cedula; ?></strong>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="padding: 6px 12px; font-weight: 500; color: #2c3e50;">
                                                    <i class="fas fa-user" style="color: #003366; width: 20px;"></i> Nombre(s) y Apellido(s):
                                                </td>
                                                <td style="padding: 6px 12px; color: #2c3e50;">
                                                    <strong><?php echo $alumno_list->nombre_primer . ' ' . $alumno_list->nombre_segundo . ' ' . $alumno_list->apellido_primer . ' ' . $alumno_list->apellido_segundo; ?></strong>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="padding: 6px 12px; font-weight: 500; color: #2c3e50;">
                                                    <i class="fas fa-envelope" style="color: #003366; width: 20px;"></i> Correo Electrónico:
                                                </td>
                                                <td style="padding: 6px 12px; color: #2c3e50;">
                                                    <strong><?php echo $alumno_list->correo; ?></strong>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="padding: 6px 12px; font-weight: 500; color: #2c3e50;">
                                                    <i class="fas fa-phone" style="color: #003366; width: 20px;"></i> Teléfono(s):
                                                </td>
                                                <td style="padding: 6px 12px; color: #2c3e50;">
                                                    <strong><?php echo $alumno_list->telefono_cel; echo " -- " . $alumno_list->telefono_hab; ?></strong>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="padding: 6px 12px; font-weight: 500; color: #2c3e50;">
                                                    <i class="fas fa-map-marker-alt" style="color: #003366; width: 20px;"></i> Estado Residencia:
                                                </td>
                                                <td style="padding: 6px 12px; color: #2c3e50;">
                                                    <strong><?php echo strtoupper($alumno_list->residencia); ?></strong>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="padding: 6px 12px; font-weight: 500; color: #2c3e50;">
                                                    <i class="fas fa-briefcase" style="color: #003366; width: 20px;"></i> Lugar de Trabajo:
                                                </td>
                                                <td style="padding: 6px 12px; color: #2c3e50;">
                                                    <strong><?php echo $alumno_list->lugar_trabajo; ?></strong>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <!-- Formulario de Actualización -->
                        <div class="card card-success card-outline" style="border-radius: 8px; border-left: 4px solid #28a745; border-top: none;">
                            <div class="card-header" style="background: #e8f5e9; border-bottom: 1px solid #e8e8e8; padding: 10px 18px; border-radius: 8px 8px 0 0;">
                                <h6 class="mb-0" style="font-weight: 600; color: #1e7e34;">
                                    <i class="fas fa-upload" style="color: #28a745; margin-right: 8px;"></i>
                                    Actualizar Solicitud de Retiro Voluntario
                                </h6>
                            </div>
                            <div class="card-body p-3">
                                <form action="<?php echo base_url(); ?>dashboard09/registrotramiteRetiro_update/1" method="POST" enctype="multipart/form-data">
                                    
                                    <input type="hidden" name="id_solicitud" value="<?php echo $solicitud->id; ?>">

                                    <!-- Datos de la Solicitud -->
                                    <div class="table-responsive">
                                        <table class="table table-hover" style="border-radius: 8px; overflow: hidden; margin-bottom: 0;">
                                            <tbody>
                                                <tr style="border-bottom: 1px solid #f0f0f0;">
                                                    <td style="padding: 12px 15px; font-weight: 500; color: #2c3e50; width: 35%; vertical-align: middle;">
                                                        <i class="fas fa-graduation-cap" style="color: #003366; margin-right: 8px;"></i>
                                                        Programa de Postgrado o Especialización:
                                                    </td>
                                                    <td style="padding: 12px 15px;">
                                                        <select class="form-control" name="comboprograma" id="comboprograma" readonly  style="border-radius: 0px; border: 1px solid #ced4da; width: 80%; background: #e9ecef; cursor: not-allowed;">
                                                            <option value="">- Seleccione -</option>                                       
                                                            <?php foreach($programa as $programa):
                                                                if($solicitud->id_programa == $programa->id){
                                                                    echo "<option value='".$programa->id."' selected>".$programa->nombre."</option>";  
                                                                }               
                                                            endforeach; ?>
                                                        </select>
                                                    </td>
                                                </tr>
                                                <tr style="border-bottom: 1px solid #f0f0f0;">
                                                    <td style="padding: 12px 15px; font-weight: 500; color: #2c3e50; vertical-align: middle;">
                                                        <i class="fas fa-file-signature" style="color: #003366; margin-right: 8px;"></i>
                                                        Trámite Administrativo a Solicitar:
                                                    </td>
                                                    <td style="padding: 12px 15px;">
                                                        <select class="form-control" name="combotramite" id="combotramite" readonly disabled style="border-radius: 0px; border: 1px solid #ced4da; width: 80%; background: #e9ecef; cursor: not-allowed;">
                                                            <option value="">- Seleccione -</option>                                       
                                                            <?php foreach($combotramite as $combotramite):
                                                                if($solicitud->id_tramite == $combotramite->id){
                                                                    echo "<option value='".$combotramite->id."' selected>".$combotramite->nombre."</option>";  
                                                                } else { 
                                                                    echo "<option value='".$combotramite->id."'>".$combotramite->nombre."</option>";  
                                                                }                          
                                                            endforeach; ?>
                                                        </select>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>

                                    <!-- Tabla de Unidades Curriculares -->
                                    <?php if(!empty($listado)): ?>
                                    <div class="card card-secondary card-outline" style="border-radius: 8px; border-left: 4px solid #6c757d; border-top: none; margin-top: 15px;">
                                        <div class="card-header" style="background: #f8f9fa; border-bottom: 1px solid #e8e8e8; padding: 8px 15px; border-radius: 8px 8px 0 0;">
                                            <h6 class="mb-0" style="font-weight: 600; color: #2c3e50;">
                                                <i class="fas fa-list" style="color: #003366; margin-right: 8px;"></i>
                                                Unidades de Créditos inscritas en el Período <?php echo $periodo->nombre; ?>
                                            </h6>
                                        </div>
                                        <div class="card-body p-0">
                                            <div class="table-responsive">
                                                <table class="table table-hover" style="border-radius: 8px; overflow: hidden; margin-bottom: 0;">
                                                    <thead style="background: linear-gradient(135deg, #003366 0%, #1a5276 100%); color: white;">
                                                        <tr>
                                                            <th style="padding: 10px 15px; font-weight: 500; font-size: 0.8rem; letter-spacing: 0.5px;">
                                                                <i class="fas fa-graduation-cap mr-2"></i>Programa
                                                            </th>
                                                            <th style="padding: 10px 15px; text-align: center; font-weight: 500; font-size: 0.8rem; letter-spacing: 0.5px;">
                                                                <i class="fas fa-hashtag mr-1"></i>UC
                                                            </th>
                                                            <th style="padding: 10px 15px; font-weight: 500; font-size: 0.8rem; letter-spacing: 0.5px;">
                                                                <i class="fas fa-book mr-2"></i>Unidad Curricular
                                                            </th>
                                                            <th style="padding: 10px 15px; text-align: center; font-weight: 500; font-size: 0.8rem; letter-spacing: 0.5px;">
                                                                <i class="fas fa-calendar-alt mr-1"></i>Trimestre
                                                            </th>
                                                            <th style="padding: 10px 15px; text-align: center; font-weight: 500; font-size: 0.8rem; letter-spacing: 0.5px;">
                                                                <i class="fas fa-clock mr-1"></i>Día
                                                            </th>
                                                            <th style="padding: 10px 15px; text-align: center; font-weight: 500; font-size: 0.8rem; letter-spacing: 0.5px;">
                                                                <i class="fas fa-hourglass-half mr-1"></i>Horario
                                                            </th>
                                                            <th style="padding: 10px 15px; text-align: center; font-weight: 500; font-size: 0.8rem; letter-spacing: 0.5px;">
                                                                <i class="fas fa-laptop mr-1"></i>Modalidad
                                                            </th>
                                                            <th style="padding: 10px 15px; text-align: center; font-weight: 500; font-size: 0.8rem; letter-spacing: 0.5px;">
                                                                <i class="fas fa-check-square mr-1"></i>Seleccionar
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php foreach($listado as $listado):
                                                            if($listado->sol_retiro == 1) $seleccionar = "checked"; else $seleccionar = "";
                                                        ?>
                                                            <tr style="border-bottom: 1px solid #f0f0f0;">
                                                                <td style="padding: 10px 15px; font-size: 0.85rem; color: #2c3e50;">
                                                                    <strong><?php echo $listado->programa; ?></strong>
                                                                </td>
                                                                <td style="padding: 10px 15px; text-align: center; font-size: 0.85rem;">
                                                                    <span class="badge" style="font-size: 0.8rem; padding: 3px 12px; border-radius: 20px; background: #003366; color: white;">
                                                                        <?php echo $listado->uc; ?>
                                                                    </span>
                                                                </td>
                                                                <td style="padding: 10px 15px; font-size: 0.85rem; color: #2c3e50;">
                                                                    <?php echo $listado->unidad_curricular; ?>
                                                                </td>
                                                                <td style="padding: 10px 15px; text-align: center; font-size: 0.85rem;">
                                                                    <span class="badge" style="background: #e9ecef; color: #495057; padding: 4px 12px; border-radius: 20px; font-weight: 500; font-size: 0.75rem;">
                                                                        <?php echo $listado->trimestre; ?>
                                                                    </span>
                                                                </td>
                                                                <td style="padding: 10px 15px; text-align: center; font-size: 0.85rem; color: #2c3e50;">
                                                                    <?php echo $listado->dia; ?>
                                                                </td>
                                                                <td style="padding: 10px 15px; text-align: center; font-size: 0.85rem; color: #2c3e50;">
                                                                <span class="badge" style="background: #e9ecef; color: #495057; padding: 4px 12px; border-radius: 20px; font-weight: 500; font-size: 0.75rem;">
                                                                        <?php echo $listado->horario; ?>
                                                                    </span>
                                                                </td>
                                                                <td style="padding: 10px 15px; text-align: center; font-size: 0.85rem;">
                                                                    <?php 
                                                                        $modalidad_text = '';
                                                                        if($listado->modalidad == 1) {
                                                                            $modalidad_text = 'PRESENCIAL';
                                                                            $badge_class = 'badge-primary';
                                                                        } elseif($listado->modalidad == 2) {
                                                                            $modalidad_text = 'A DISTANCIA';
                                                                            $badge_class = 'badge-success';
                                                                        } elseif($listado->modalidad == 3) {
                                                                            $modalidad_text = 'SEMIPRESENCIAL';
                                                                            $badge_class = 'badge-warning';
                                                                        }
                                                                    ?>
                                                                         <span class="badge" style="background: #e9ecef; color: #495057; padding: 4px 12px; border-radius: 20px; font-weight: 500; font-size: 0.75rem;">
                                                                        <?php echo $modalidad_text; ?>
                                                                    </span>
                                                                </td>
                                                                <td style="padding: 10px 15px; text-align: center;">
                                                                    <div class="custom-control custom-checkbox" style="display: inline-block;">
                                                                        <input type="checkbox" class="custom-control-input" id="check_<?php echo $listado->id; ?>" name="checks[]" value="<?php echo $listado->id; ?>" <?php echo $seleccionar; ?>>
                                                                        <label class="custom-control-label" for="check_<?php echo $listado->id; ?>"></label>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        <?php endforeach; ?>
                                                    </tbody>
                                                    <tfoot style="background: #f8f9fa; border-top: 2px solid #003366;">
                                                        <tr>
                                                            <th colspan="8" style="padding: 10px 15px; font-size: 0.8rem; color: #6c757d; font-weight: 400; text-align: center;">
                                                                <i class="fas fa-info-circle" style="color: #003366; margin-right: 4px;"></i>
                                                                Seleccione las unidades curriculares que desea retirar voluntariamente
                                                            </th>
                                                        </tr>
                                                    </tfoot>
                                                </table>
                                            </div>
                                        </div>
                                    </div>

                                    <input type="hidden" name="str" id="str">

                                    <?php else: ?>
                                        <div class="alert alert-warning" style="border-radius: 8px; border-left: 4px solid #ffc107; text-align: center;">
                                            <i class="fas fa-exclamation-triangle fa-2x d-block mb-2" style="color: #ffc107;"></i>
                                            <h4 style="color: #856404;">No posee Unidades Curriculares inscritas para este período</h4>
                                        </div>
                                    <?php endif; ?>

                                    <!-- Botón de Envío -->
                                    <div class="row mt-4">
                                        <div class="col-md-12 text-center">
                                            <button type="submit" class="btn btn-primary" style="border-radius: 10px; padding: 10px 40px; font-weight: 500; transition: all 0.3s;">
                                                <i class="fas fa-save mr-2"></i>
                                                Actualizar Solicitud de Trámite de Retiro Voluntario
                                            </button>
                                            <a href="<?php echo base_url(); ?>dashboard09/index/1" class="btn btn-default" style="border-radius: 10px; padding: 10px 30px; font-weight: 500; margin-left: 8px; transition: all 0.3s;">
                                                <i class="fas fa-arrow-left mr-2"></i>
                                                Volver
                                            </a>
                                        </div>
                                    </div>

                                </form>
                            </div>
                        </div>

                    </div><!-- /.card-body -->
                </div><!-- /.card -->
            </div><!-- /.card-body -->
        </div><!-- /.card -->

        <?php else: ?>
        <!-- Mensaje de error si no hay datos del alumno -->
        <div class="card card-primary card-outline shadow-sm" style="border-radius: 10px; border-top: 4px solid #dc3545;">
            <div class="card-body p-4">
                <div class="alert alert-danger" style="border-radius: 8px; border-left: 4px solid #dc3545; text-align: center;">
                    <h4 style="color: #721c24; font-weight: 600;">
                        <i class="fas fa-exclamation-circle" style="color: #dc3545; margin-right: 10px;"></i>
                        DEBE CARGAR LOS DATOS DE INFORMACIÓN DEL ESTUDIANTE
                    </h4>
                    <p style="color: #2c3e50; font-size: 1rem;">
                        Ir al menú: <strong style="color: #003366;">Inicio → Control de Estudios → Información del Estudiante → Datos Personales</strong>
                    </p>
                </div>
            </div>
        </div>
        <?php endif; ?>

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- Estilos adicionales -->
<style>
    /* Efectos hover en filas de tabla */
    .table-hover tbody tr:hover {
        background-color: #e8f0fe !important;
        transition: background 0.2s ease;
        cursor: pointer;
    }
    
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
    
    /* Estilo para campos de formulario readonly */
    .form-control[readonly] {
        background-color: #e9ecef;
        cursor: not-allowed;
    }
    
    /* Estilo para checkboxes personalizados */
    .custom-control-input:checked ~ .custom-control-label::before {
        background-color: #003366;
        border-color: #003366;
    }
    
    .custom-control-input:focus ~ .custom-control-label::before {
        box-shadow: 0 0 0 0.2rem rgba(0, 51, 102, 0.25);
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
            padding: 8px 16px !important;
            font-size: 0.8rem !important;
            width: 100%;
            margin-bottom: 5px;
        }
        .btn-default {
            margin-left: 0 !important;
        }
        .table td, .table th {
            padding: 8px 10px !important;
            font-size: 0.75rem !important;
        }
        .form-control {
            width: 100% !important;
        }
    }
    
    @media (max-width: 576px) {
        .table td, .table th {
            padding: 6px 8px !important;
            font-size: 0.7rem !important;
        }
        .badge {
            font-size: 0.6rem !important;
            padding: 2px 8px !important;
        }
        .form-control {
            font-size: 0.8rem !important;
            width: 100% !important;
        }
        .table-responsive {
            border: none;
        }
    }
</style>