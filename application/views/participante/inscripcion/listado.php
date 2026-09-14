<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" style="background: #f4f6f9;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">             
                    <h1 class="m-0" style="font-weight: 300; color: #003366;">
                        <i class="fas fa-graduation-cap" style="color: #003366; margin-right: 8px;"></i>                       
                        <span style="color: #2c3e50; font-weight: 300;"> Proceso de Inscripción</span>
                    </h1>
                </div>              
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right" style="background: transparent;">
                        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>dashboard04/home" style="color: #6c757d;">Inicio</a></li>
                        <li class="breadcrumb-item active" style="color: #003366; font-weight: 600;">Inscripciones Postgrado - Oferta Académica</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <!-- Main content -->
    <section class="content">
        <form action="<?php echo base_url(); ?>dashboard04/inscripcion2" method="POST" id="formInscripcion">
            
            <!-- Card Principal -->
            <div class="card card-primary card-outline shadow-sm" style="border-radius: 10px; border-top: 4px solid #003366;">
                <div class="card-body p-0">
                    <div class="card" style="border: none; border-radius: 10px;">
                        
                        <!-- Header -->
                        <div class="card-header py-3" style="border-bottom: 1px solid #e8e8e8; border-radius: 10px 10px 0 0; background: #fafafa;">
                            <div class="d-flex align-items-center justify-content-between flex-wrap">
                                <div class="d-flex align-items-center">
                                    <div class="mr-3" style="width: 42px; height: 42px; background: #003366; border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                                        <img src="<?php echo base_url(); ?>assets/img/logo2.png" alt="Logo" style="width: 55px; height: 55px; border-radius: 50%; border: 2px solid #e9ecef; padding: 3px; background: white;">
                                    </div>
                                    <div>
                                        <h5 class="mb-0" style="font-weight: 600; color: #2c3e50;">
                                            Inscripciones Postgrado - Oferta Académica
                                        </h5>
                                        <small class="text-muted" style="font-size: 0.75rem;">
                                            <i class="fas fa-calendar-alt mr-1"></i>
                                            Período: <strong><?php echo $periodo->nombre; ?></strong>
                                        </small>
                                    </div>
                                </div>
                                <div>
                                    <span class="badge" style="font-size: 0.8rem; padding: 5px 16px; border-radius: 10px; font-weight: 500; background: #003366; color: white;">
                                        <i class="fas fa-list mr-1"></i>
                                        Seleccione las materias a pre-inscribir
                                    </span>
                                </div>
                            </div>
                        </div>

                        <!-- Body -->
                        <div class="card-body p-4">

                            <!-- Mensajes de Alerta -->
                            <?php if($this->session->flashdata('success')): ?>
                                <div class="alert alert-success alert-dismissible" style="border-radius: 8px; border-left: 4px solid #28a745;">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    <i class="icon fa fa-check mr-2"></i> <?php echo $this->session->flashdata('success'); ?>
                                </div>
                            <?php endif; ?>

                            <?php if($this->session->flashdata('error')): ?>
                                <div class="alert alert-danger alert-dismissible" style="border-radius: 8px; border-left: 4px solid #dc3545;">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    <i class="icon fa fa-ban mr-2"></i> <?php echo $this->session->flashdata('error'); ?>
                                </div>
                            <?php endif; ?>

                            <?php if($this->session->flashdata('warning')): ?>
                                <div class="alert alert-warning alert-dismissible" style="border-radius: 8px; border-left: 4px solid #ffc107;">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    <i class="icon fa fa-exclamation-triangle mr-2"></i> <?php echo $this->session->flashdata('warning'); ?>
                                </div>
                            <?php endif; ?>

                            <?php if($this->session->flashdata('info')): ?>
                                <div class="alert alert-info alert-dismissible" style="border-radius: 8px; border-left: 4px solid #17a2b8;">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    <i class="icon fa fa-info-circle mr-2"></i> <?php echo $this->session->flashdata('info'); ?>
                                </div>
                            <?php endif; ?>

                            <!-- Tabla de Oferta Académica -->
                            <div class="table-responsive">
                                <table class="table table-hover" style="border-radius: 8px; overflow: hidden;" id="tablaOferta">
                                    <thead style="background: linear-gradient(135deg, #003366 0%, #1a5276 100%); color: white;">
                                        <tr>
                                            <th style="padding: 10px 15px; font-weight: 500; font-size: 0.8rem; letter-spacing: 0.5px; white-space: nowrap;">
                                                <i class="fas fa-graduation-cap mr-2"></i>Programa de Estudio
                                            </th>
                                            <th style="padding: 10px 15px; text-align: center; font-weight: 500; font-size: 0.8rem; letter-spacing: 0.5px; white-space: nowrap;">
                                                <i class="fas fa-hashtag mr-1"></i>UC
                                            </th>
                                            <th style="padding: 10px 15px; font-weight: 500; font-size: 0.8rem; letter-spacing: 0.5px;">
                                                <i class="fas fa-book mr-2"></i>Unidad Curricular
                                            </th>
                                            <th style="padding: 10px 15px; text-align: center; font-weight: 500; font-size: 0.8rem; letter-spacing: 0.5px; white-space: nowrap;">
                                                <i class="fas fa-calendar-alt mr-1"></i>Trimestre
                                            </th>
                                            <th style="padding: 10px 15px; text-align: center; font-weight: 500; font-size: 0.8rem; letter-spacing: 0.5px; white-space: nowrap;">
                                                <i class="fas fa-clock mr-1"></i>Día
                                            </th>
                                            <th style="padding: 10px 15px; text-align: center; font-weight: 500; font-size: 0.8rem; letter-spacing: 0.5px; white-space: nowrap;">
                                                <i class="fas fa-hourglass-half mr-1"></i>Horario
                                            </th>
                                            <th style="padding: 10px 15px; text-align: center; font-weight: 500; font-size: 0.8rem; letter-spacing: 0.5px; white-space: nowrap;">
                                                <i class="fas fa-laptop mr-1"></i>Modalidad
                                            </th>
                                            <th style="padding: 10px 15px; text-align: center; font-weight: 500; font-size: 0.8rem; letter-spacing: 0.5px; white-space: nowrap;">
                                                <i class="fas fa-check-square mr-1"></i>Seleccionar
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if(!empty($listado)): ?>
                                            <?php foreach($listado as $listado): ?>
                                                <tr class="fila-checkbox" style="border-bottom: 1px solid #f0f0f0; transition: background 0.2s; cursor: pointer;">
                                                    <td style="padding: 10px 15px; font-size: 0.85rem; color: #2c3e50;">
                                                        <strong><?php echo $listado->programas; ?></strong>
                                                    </td>
                                                    <td style="padding: 10px 15px; text-align: center; font-size: 0.85rem; color: #2c3e50;">
                                                        <?php if(trim($listado->trimestre) == 'LÍNEA DE INVESTIGACIÓN'): ?>
                                                            <span class="badge badge-secondary" style="font-size: 0.7rem; padding: 3px 10px; border-radius: 20px;">-</span>
                                                        <?php else: ?>
                                                            <span class="badge" style="font-size: 0.8rem; padding: 3px 12px; border-radius: 20px; background: #003366; color: white;">
                                                                <?php echo $listado->unidades_creditos; ?>
                                                            </span>
                                                        <?php endif; ?>
                                                    </td>
                                                    <td style="padding: 10px 15px; font-size: 0.85rem; color: #2c3e50;">
                                                        <?php echo $listado->pensums; ?>
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
                                                            $modalidad = '';
                                                            if($listado->modalidad == 1) {
                                                                $modalidad = 'PRESENCIAL';
                                                            } elseif($listado->modalidad == 2) {
                                                                $modalidad = 'A DISTANCIA';
                                                            } elseif($listado->modalidad == 3) {
                                                                $modalidad = 'SEMIPRESENCIAL';
                                                            }
                                                        ?>
                                                        <span class="badge" style="background: #e9ecef; color: #495057; padding: 4px 12px; border-radius: 20px; font-weight: 500; font-size: 0.75rem;">
                                                            <?php echo $modalidad; ?>
                                                        </span>
                                                    </td>
                                                    <td style="padding: 10px 15px; text-align: center;">
                                                        <div class="custom-control custom-checkbox" style="display: inline-block; pointer-events: none;">
                                                            <input type="checkbox" class="custom-control-input checkbox-item" id="check_<?php echo $listado->id; ?>" name="checks[]" value="<?php echo $listado->id; ?>">
                                                            <label class="custom-control-label" for="check_<?php echo $listado->id; ?>"></label>
                                                        </div>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        <?php else: ?>
                                            <tr>
                                                <td colspan="8" style="padding: 30px 15px; text-align: center; color: #6c757d;">
                                                    <i class="fas fa-info-circle fa-2x d-block mb-2" style="color: #17a2b8;"></i>
                                                    <span style="font-size: 1rem;">No hay oferta académica disponible para este período</span>
                                                </td>
                                            </tr>
                                        <?php endif; ?>
                                    </tbody>
                                    <tfoot style="background: #f8f9fa; border-top: 2px solid #003366;">
                                        <tr>
                                            <th colspan="8" style="padding: 10px 15px; font-size: 0.8rem; color: #6c757d; font-weight: 400; text-align: center;">
                                                <i class="fas fa-info-circle" style="color: #003366; margin-right: 4px;"></i>
                                                Seleccione las unidades curriculares que desea pre-inscribir
                                            </th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>

                            <!-- Campo oculto para almacenar los IDs seleccionados -->
                            <div>
                                <input type="hidden" name="str" id="str" value="">
                            </div>

                            <!-- Botones de Acción (AdminLTE rectangulares) -->
                            <div class="row mt-4">
                                <div class="col-md-12 text-center">
                                    <button type="submit" name="btnguardar" value="Pre-inscribir" class="btn btn-primary" style="border-radius: 10px; padding: 10px 40px; font-weight: 500; transition: all 0.3s;">
                                        <i class="fas fa-save mr-2"></i>
                                        Pre-inscribir
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
    /* Efectos hover en filas de tabla */
    .table-hover tbody tr:hover {
        background-color: #e8f0fe !important;
        transition: background 0.2s ease;
    }
    
    /* Sombras y bordes redondeados */
    .card {
        border-radius: 10px !important;
        overflow: hidden;
    }
    
    /* Efecto hover en botones AdminLTE */
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
    
    /* Estilo para checkboxes personalizados */
    .custom-control-input:checked ~ .custom-control-label::before {
        background-color: #003366;
        border-color: #003366;
    }
    
    .custom-control-input:focus ~ .custom-control-label::before {
        box-shadow: 0 0 0 0.2rem rgba(0, 51, 102, 0.25);
    }
    
    /* Animación para filas al seleccionar */
    .custom-control-input:checked ~ .custom-control-label::after {
        animation: checkmark 0.2s ease;
    }
    
    @keyframes checkmark {
        0% {
            transform: scale(0.5);
        }
        100% {
            transform: scale(1);
        }
    }
    
    /* Alertas con iconos */
    .alert i.icon {
        margin-right: 5px;
    }
    
    /* Ajuste para móviles */
    @media (max-width: 992px) {
        .table {
            font-size: 0.8rem !important;
        }
        .table td, .table th {
            padding: 8px 10px !important;
            font-size: 0.75rem !important;
            white-space: nowrap;
        }
        .btn {
            padding: 8px 20px !important;
            font-size: 0.9rem !important;
        }
    }
    
    @media (max-width: 768px) {
        .card-title {
            font-size: 1rem !important;
        }
        .table td, .table th {
            padding: 6px 8px !important;
            font-size: 0.7rem !important;
        }
        .badge {
            font-size: 0.6rem !important;
            padding: 2px 8px !important;
        }
        .btn {
            padding: 6px 16px !important;
            font-size: 0.8rem !important;
            width: 100%;
            margin-bottom: 5px;
        }
        .btn-default {
            margin-left: 0 !important;
        }
    }
    
    @media (max-width: 576px) {
        .table td, .table th {
            padding: 4px 6px !important;
            font-size: 0.65rem !important;
        }
        .table-responsive {
            border: none;
        }
    }
</style>

<!-- Script para seleccionar checkboxes al hacer clic en la fila y llenar campo oculto -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Seleccionar todas las filas con la clase 'fila-checkbox'
        var rows = document.querySelectorAll('.fila-checkbox');
        
        rows.forEach(function(row) {
            row.addEventListener('click', function(e) {
                // Buscar el checkbox dentro de la fila
                var checkbox = this.querySelector('.checkbox-item');
                
                if (checkbox) {
                    // Cambiar el estado del checkbox
                    checkbox.checked = !checkbox.checked;
                    
                    // Disparar evento change para actualizar estilos visuales
                    var changeEvent = new Event('change', { bubbles: true });
                    checkbox.dispatchEvent(changeEvent);
                }
            });
        });

        // Actualizar campo oculto cuando se marque/desmarque un checkbox
        var checkboxes = document.querySelectorAll('.checkbox-item');
        var inputHidden = document.getElementById('str');
        
        checkboxes.forEach(function(checkbox) {
            checkbox.addEventListener('change', function() {
                var selected = [];
                checkboxes.forEach(function(cb) {
                    if (cb.checked) {
                        selected.push(cb.value);
                    }
                });
                inputHidden.value = selected.join(',');
                console.log('IDs seleccionados:', inputHidden.value);
            });
        });
    });

    // Antes de enviar el formulario, asegurar que el campo oculto esté actualizado
    document.addEventListener('submit', function(e) {
        if (e.target.id === 'formInscripcion' || e.target.querySelector('#formInscripcion')) {
            var checkboxes = document.querySelectorAll('.checkbox-item');
            var inputHidden = document.getElementById('str');
            var selected = [];
            
            checkboxes.forEach(function(cb) {
                if (cb.checked) {
                    selected.push(cb.value);
                }
            });
            
            inputHidden.value = selected.join(',');
            console.log('Enviando IDs:', inputHidden.value);
        }
    });
</script>