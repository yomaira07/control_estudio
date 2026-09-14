<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" style="background: #f4f6f9;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0" style="font-weight: 300; color: #003366;">
                        <i class="fas fa-graduation-cap" style="color: #003366; margin-right: 8px;"></i>
                        <span style="color: #003366; font-weight: 600;">SCE-ENFMP</span>
                        <span style="color: #2c3e50; font-weight: 300;"> - Trámites Académicos</span>
                    </h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right" style="background: transparent;">
                        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>dashboard04/home" style="color: #6c757d;">Inicio</a></li>
                        <li class="breadcrumb-item"><a href="#" style="color: #6c757d;">Trámites</a></li>
                        <li class="breadcrumb-item active" style="color: #003366; font-weight: 600;">Solicitudes de Trámites Académicos</li>
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
                                    <i class="fas fa-graduation-cap text-white" style="font-size: 1.1rem;"></i>
                                </div>
                                <div>
                                    <h5 class="mb-0" style="font-weight: 600; color: #2c3e50;">
                                        <strong>Solicitud de Trámites Académicos</strong>
                                    </h5>
                                    <small class="text-muted" style="font-size: 0.75rem;">
                                        <i class="fas fa-calendar-alt mr-1"></i>
                                        Período: <strong><?php echo $periodo->nombre; ?></strong>
                                    </small>
                                </div>
                            </div>
                            <div>
                                <span class="badge" style="font-size: 0.8rem; padding: 5px 16px; border-radius: 20px; font-weight: 500; background: #003366; color: white;">
                                    <i class="fas fa-list mr-1"></i>
                                    Historial de Solicitudes
                                </span>
                            </div>
                        </div>
                    </div>

                    <!-- Body -->
                    <div class="card-body p-4">

                        <!-- Mensajes de Alerta -->
                        <?php if($this->session->flashdata('success')){ ?>
                            <div class="alert alert-success alert-dismissible" style="border-radius: 8px; border-left: 4px solid #28a745;">
                                <a href="#" class="close" data-dismiss="alert">&times;</a>
                                <i class="fas fa-check-circle mr-2" style="color: #28a745;"></i>
                                <strong>¡Éxito!</strong> <?php echo $this->session->flashdata('success'); ?>
                            </div>
                        <?php } else if($this->session->flashdata('error')){ ?>
                            <div class="alert alert-danger alert-dismissible" style="border-radius: 8px; border-left: 4px solid #dc3545;">
                                <a href="#" class="close" data-dismiss="alert">&times;</a>
                                <i class="fas fa-exclamation-circle mr-2" style="color: #dc3545;"></i>
                                <strong>¡Error!</strong> <?php echo $this->session->flashdata('error'); ?>
                            </div>
                        <?php } else if($this->session->flashdata('warning')){ ?>
                            <div class="alert alert-warning alert-dismissible" style="border-radius: 8px; border-left: 4px solid #ffc107;">
                                <a href="#" class="close" data-dismiss="alert">&times;</a>
                                <i class="fas fa-exclamation-triangle mr-2" style="color: #856404;"></i>
                                <strong>¡Alerta!</strong> <?php echo $this->session->flashdata('warning'); ?>
                            </div>
                        <?php } else if($this->session->flashdata('info')){ ?>
                            <div class="alert alert-info alert-dismissible" style="border-radius: 8px; border-left: 4px solid #17a2b8;">
                                <a href="#" class="close" data-dismiss="alert">&times;</a>
                                <i class="fas fa-info-circle mr-2" style="color: #17a2b8;"></i>
                                <strong>Información:</strong> <?php echo $this->session->flashdata('info'); ?>
                            </div>
                        <?php } ?>

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

                        <!-- Tabla de Solicitudes -->
                        <div class="card card-primary card-outline" style="border-radius: 8px; border-left: 4px solid #003366; border-top: none;">
                            <div class="card-header" style="background: #e8f0fe; border-bottom: 1px solid #e8e8e8; padding: 10px 18px; border-radius: 8px 8px 0 0;">
                                <h6 class="mb-0" style="font-weight: 600; color: #003366;">
                                    <i class="fas fa-list" style="color: #003366; margin-right: 8px;"></i>
                                    Solicitudes de Trámites Académicos 
                                </h6>
                            </div>
                            <div class="card-body p-0">
                                <div class="table-responsive">
                                    <table id="example" class="table table-hover" style="border-radius: 8px; overflow: hidden; width: 100%; margin-bottom: 0;">
                                        <thead style="background: linear-gradient(135deg, #003366 0%, #1a5276 100%); color: white;">
                                            <tr>
                                                <th style="padding: 10px 15px; font-weight: 500; font-size: 0.8rem; letter-spacing: 0.5px;">
                                                    <i class="fas fa-file-signature mr-2"></i>Trámite Solicitado
                                                </th>
                                                <th style="padding: 10px 15px; font-weight: 500; font-size: 0.8rem; letter-spacing: 0.5px;">
                                                    <i class="fas fa-graduation-cap mr-2"></i>Programa
                                                </th>
                                                <th style="padding: 10px 15px; font-weight: 500; font-size: 0.8rem; letter-spacing: 0.5px;">
                                                    <i class="fas fa-calendar-alt mr-2"></i>Fecha Solicitud
                                                </th>
                                                <th style="padding: 10px 15px; font-weight: 500; font-size: 0.8rem; letter-spacing: 0.5px;">
                                                    <i class="fas fa-info-circle mr-2"></i>Estado Solicitud
                                                </th>
                                                <th style="padding: 10px 15px; text-align: center; font-weight: 500; font-size: 0.8rem; letter-spacing: 0.5px;">
                                                    <i class="fas fa-cogs mr-2"></i>Opción
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if(!empty($solicitudesAca)): ?>
                                                <?php foreach($solicitudesAca as $solicitudes): ?>
                                                <tr style="border-bottom: 1px solid #f0f0f0;">
                                                    <td style="padding: 10px 15px; font-size: 0.85rem; color: #2c3e50;">
                                                        <strong><?php echo $solicitudes->tramite; ?></strong>
                                                    </td>
                                                    <td style="padding: 10px 15px; font-size: 0.85rem; color: #2c3e50;">
                                                        <?php echo $solicitudes->programa; ?>
                                                    </td>
                                                    <td style="padding: 10px 15px; font-size: 0.85rem; color: #2c3e50;">
                                                        <?php echo $solicitudes->fecha_solicitud; ?>
                                                    </td>
                                                    <td style="padding: 10px 15px; font-size: 0.8rem;">
                                                        <?php if($solicitudes->id_tramite == 3): ?>
                                                            <?php if($solicitudes->rev_academica == 0): ?>
                                                                <div class="status-badge">
                                                                    <img width="24px" height="24px" src="<?php echo base_url(); ?>/assets/img/button_gray.png" title="Pendiente" class="status-img">
                                                                    <span style="color: #856404; font-weight: 500;">Trámite pendiente por aprobar por la ENFMP</span>
                                                                </div>
                                                            <?php elseif($solicitudes->rev_academica == 1): ?>
                                                                <div class="status-badge">
                                                                    <img width="24px" height="24px" src="<?php echo base_url(); ?>/assets/img/button_green.png" title="Aprobado" class="status-img">
                                                                    <span style="color: #155724; font-weight: 500;">Trámite Aprobado por la ENFMP</span>
                                                                </div>
                                                            <?php elseif($solicitudes->rev_academica == 2): ?>
                                                                <div class="status-badge">
                                                                    <img width="24px" height="24px" src="<?php echo base_url(); ?>/assets/img/button_red.jpeg" title="Rechazado" class="status-img">
                                                                    <span style="color: #721c24; font-weight: 500;">Trámite Rechazado por la ENFMP</span>
                                                                </div>
                                                            <?php endif; ?>
                                                        <?php else: ?>
                                                            <div class="d-flex flex-column">
                                                                <?php if($solicitudes->reg_pago == 1): ?>
                                                                    <span class="badge badge-success" style="font-size: 0.75rem; padding: 5px 14px; border-radius: 20px; display: inline-flex; align-items: center; gap: 6px;">
                                                                        <i class="fas fa-check-circle"></i> Pago Registrado
                                                                    </span>
                                                                <?php else: ?>
                                                                    <span class="badge badge-secondary" style="font-size: 0.75rem; padding: 5px 14px; border-radius: 20px; display: inline-flex; align-items: center; gap: 6px;">
                                                                        <i class="fas fa-clock"></i> Pago Pendiente
                                                                    </span>
                                                                <?php endif; ?>
                                                                <?php if($solicitudes->reg_pago == 1 and $solicitudes->rev_academica == 1): ?>
                                                                    <div class="mt-1 d-flex align-items-center flex-wrap gap-1">
                                                                        <span class="badge badge-success" style="font-size: 0.7rem; padding: 4px 12px; border-radius: 20px; display: inline-flex; align-items: center; gap: 4px;">
                                                                            <i class="fas fa-check-circle"></i> Aprobado por Adm ENFMP
                                                                        </span>
                                                                        <a href="<?php echo base_url(); ?>dashboard09/planilla/<?php echo $solicitudes->id_usuario . '/' . $solicitudes->id_solicitud; ?>" class="btn btn-info btn-sm" style="border-radius: 6px; padding: 3px 12px; font-size: 0.7rem; font-weight: 500; border: none; box-shadow: 0 2px 6px rgba(23, 162, 184, 0.3); transition: all 0.25s ease;">
                                                                            <i class="fas fa-print mr-1"></i> Planilla
                                                                        </a>
                                                                    </div>
                                                                <?php endif; ?>
                                                                <?php if($solicitudes->reg_pago == 1 and $solicitudes->rev_academica == 0): ?>
                                                                    <div class="mt-1">
                                                                        <span class="badge badge-warning" style="font-size: 0.7rem; padding: 4px 12px; border-radius: 20px; color: #856404; display: inline-flex; align-items: center; gap: 4px;">
                                                                            <i class="fas fa-clock"></i> Pendiente Aprobación Adm ENFMP
                                                                        </span>
                                                                    </div>
                                                                <?php endif; ?>
                                                            </div>
                                                        <?php endif; ?>
                                                    </td>
                                                    <td style="padding: 10px 15px; text-align: center; vertical-align: middle;">
                                                        <div class="d-flex flex-column align-items-center gap-1">
                                                            <?php if($solicitudes->requisitos == 1 and $solicitudes->id_tramite == 3 and $solicitudes->rev_academica == 0): ?>
                                                                <a href="<?php echo base_url(); ?>dashboard09/retiros_edit/<?php echo $solicitudes->id_solicitud . '/' . $solicitudes->id_tipo_tramite; ?>" class="btn btn-primary btn-sm" style="border-radius: 6px; padding: 4px 14px; font-size: 0.7rem; font-weight: 500; border: none; box-shadow: 0 2px 6px rgba(0, 51, 102, 0.3); transition: all 0.25s ease; width: 100%;">
                                                                    <i class="fas fa-edit mr-1"></i> Editar
                                                                </a>
                                                                <div class="mt-1">
                                                                    <span style="font-size: 0.65rem; font-weight: 700; color: #003366; text-transform: uppercase; letter-spacing: 0.5px;">REQUISITOS</span>
                                                                </div>
                                                                <?php if($solicitudes->rev_academica == 0): ?>
                                                                    <a href="<?php echo base_url(); ?>dashboard09/retiros_archivo_edit/<?php echo $solicitudes->id_solicitud . '/' . $solicitudes->id_tipo_tramite; ?>" class="btn btn-warning btn-sm" style="border-radius: 6px; padding: 4px 12px; font-size: 0.65rem; font-weight: 500; color: #856404; border: none; box-shadow: 0 2px 6px rgba(255, 193, 7, 0.3); transition: all 0.25s ease; width: 100%;">
                                                                        <i class="fas fa-upload mr-1"></i> Actualizar
                                                                    </a>
                                                                <?php endif; ?>
                                                            <?php endif; ?>
                                                            
                                                            <?php 
// Determinar la ruta correcta del archivo según el período de la solicitud
$ruta_archivo_retiro = '';
$archivo_retiro_existe = false;

if (!empty($solicitudes->periodo_solicitud_retiro)) {
    // Usar el período guardado en la solicitud
    $ruta_archivo_retiro = 'assets/tramites/retiro_voluntario/' . $solicitudes->periodo_solicitud_retiro . '/' . $solicitudes->id_usuario . '_retiro_voluntario.pdf';
    $archivo_retiro_existe = file_exists(FCPATH . $ruta_archivo_retiro);
} else {
    // Fallback: buscar en todas las carpetas de período
    $ruta_base = 'assets/tramites/retiro_voluntario/';
    $nombre_archivo = $solicitudes->id_usuario . '_retiro_voluntario.pdf';
    
    if (is_dir($ruta_base)) {
        $carpetas = scandir($ruta_base);
        foreach ($carpetas as $carpeta) {
            if ($carpeta != '.' && $carpeta != '..' && is_dir($ruta_base . $carpeta)) {
                $ruta_temp = $ruta_base . $carpeta . '/' . $nombre_archivo;
                if (file_exists(FCPATH . $ruta_temp)) {
                    $ruta_archivo_retiro = $ruta_temp;
                    $archivo_retiro_existe = true;
                    break;
                }
            }
        }
    }
}
?>

<?php if ($archivo_retiro_existe && !empty($ruta_archivo_retiro)): ?>
    <a href="<?php echo base_url() . $ruta_archivo_retiro; ?>" target="_blank" class="btn btn-secondary btn-sm" style="border-radius: 6px; padding: 4px 14px; font-size: 0.7rem; font-weight: 500; border: none; box-shadow: 0 2px 6px rgba(108, 117, 125, 0.3); transition: all 0.25s ease; width: 100%;">
        <i class="fas fa-file-pdf mr-1"></i> Ver
    </a>
<?php else: ?>
    <button class="btn btn-secondary btn-sm" disabled style="border-radius: 6px; padding: 4px 14px; font-size: 0.7rem; font-weight: 500; width: 100%; opacity: 0.6; cursor: not-allowed;">
        <i class="fas fa-file-pdf mr-1"></i> No disponible
    </button>
<?php endif; ?>
                                               
                                                            <button onclick="verUnidadesRetiro('<?php echo $solicitudes->id_solicitud; ?>')" 
                                                                 class="btn btn-info btn-sm" 
                                                                 style="border-radius: 6px; padding: 4px 14px; font-size: 0.7rem; font-weight: 500; border: none; box-shadow: 0 2px 6px rgba(23, 162, 184, 0.3); transition: all 0.25s ease; width: 100%;">
                                                                <i class="fas fa-eye mr-1"></i> Ver Unidades Aprobadas
                                                            </button>

                                                            <?php if($solicitudes->reg_pago == 0 and ($solicitudes->id_tramite <> 3)): ?>
                                                                <a href="<?php echo base_url(); ?>dashboard09/registro_pago/<?php echo $solicitudes->id_solicitud . '/' . $solicitudes->id_tipo_tramite; ?>" class="btn btn-success btn-sm" style="border-radius: 6px; padding: 5px 16px; font-size: 0.75rem; font-weight: 600; border: none; box-shadow: 0 2px 8px rgba(40, 167, 69, 0.3); transition: all 0.25s ease; width: 100%;">
                                                                    <i class="fas fa-money-bill-wave mr-1"></i> Pagar
                                                                </a>
                                                            <?php endif; ?>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <?php endforeach; ?>
                                            <?php else: ?>
                                                <tr>
                                                    <td colspan="5" style="padding: 30px 15px; text-align: center; color: #6c757d;">
                                                        <i class="fas fa-info-circle fa-2x d-block mb-2" style="color: #17a2b8;"></i>
                                                        <span style="font-size: 1rem;">No hay solicitudes registradas</span>
                                                    </td>
                                                </tr>
                                            <?php endif; ?>
                                        </tbody>
                                        <tfoot style="background: #f8f9fa; border-top: 2px solid #003366;">
                                            <tr>
                                                <th colspan="5" style="padding: 10px 15px; font-size: 0.8rem; color: #6c757d; font-weight: 400; text-align: center;">
                                                    <i class="fas fa-info-circle" style="color: #003366; margin-right: 4px;"></i>
                                                    Total de solicitudes: <strong><?php echo isset($solicitudesAca) ? count($solicitudesAca) : 0; ?></strong>
                                                </th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
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
    <!-- Modal para visualizar Unidades Aprobadas de Retiro -->
<div class="modal fade" id="modalUnidadesRetiro" tabindex="-1" role="dialog" aria-labelledby="modalUnidadesRetiroLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content" style="border-radius: 12px; border-top: 4px solid #003366;">
            <div class="modal-header" style="background: linear-gradient(135deg, #003366 0%, #1a5276 100%); color: white; border-radius: 8px 8px 0 0;">
                <h5 class="modal-title" id="modalUnidadesRetiroLabel" style="font-weight: 600;">
                    <i class="fas fa-check-circle mr-2"></i>
                    Unidades Aprobadas de Retiro Voluntario
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: white; opacity: 0.8;">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="padding: 20px;">
                <div id="contenido-unidades-retiro">
                    <!-- Contenido cargado vía AJAX -->
                    <div class="text-center" style="padding: 40px 0;">
                        <div class="spinner-border text-primary" role="status" style="width: 3rem; height: 3rem;">
                            <span class="sr-only">Cargando...</span>
                        </div>
                        <p class="mt-3" style="color: #6c757d; font-weight: 500;">Cargando unidades aprobadas...</p>
                    </div>
                </div>
            </div>
            <div class="modal-footer" style="border-top: 1px solid #e8e8e8; background: #f8f9fa; border-radius: 0 0 8px 8px;">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" style="border-radius: 8px; padding: 8px 30px; font-weight: 500;">
                    <i class="fas fa-times mr-2"></i>Cerrar
                </button>
            </div>
        </div>
    </div>
</div>
</div>
<!-- /.content-wrapper -->
<script>
function verUnidadesRetiro(id_solicitud) {
    // Mostrar el modal
    $('#modalUnidadesRetiro').modal('show');
    
    // Mostrar indicador de carga
    var contenido = document.getElementById('contenido-unidades-retiro');
    contenido.innerHTML = `
        <div class="text-center" style="padding: 40px 0;">
            <div class="spinner-border text-primary" role="status" style="width: 3rem; height: 3rem;">
                <span class="sr-only">Cargando...</span>
            </div>
            <p class="mt-3" style="color: #6c757d; font-weight: 500;">Cargando unidades aprobadas...</p>
        </div>
    `;
    
    // Construir la URL para CodeIgniter
    var base_url = '<?php echo base_url(); ?>';
    var url = base_url + 'dashboard09/get_unidades_retiro/' + id_solicitud;
    
    // Realizar petición AJAX
    $.ajax({
        url: url,
        type: 'GET',
        dataType: 'json',
        success: function(response) {
            if (response.success) {
                var html = '';
                
                if (response.data && response.data.length > 0) {
                    html += `
                        <div style="background: #e8f0fe; padding: 10px 15px; border-radius: 8px; margin-bottom: 15px;">
                            <div style="display: flex; flex-wrap: wrap; gap: 15px; font-size: 0.85rem; color: #2c3e50;">
                                <div><strong style="color: #003366;">Trámite:</strong> ${response.info?.tramite || 'N/A'}</div>
                                <div><strong style="color: #003366;">Programa:</strong> ${response.info?.programa || 'N/A'}</div>
                                <div><strong style="color: #003366;">Período:</strong> ${response.info?.periodo || 'N/A'}</div>
                                <div><strong style="color: #003366;">Total UC Retiradas:</strong> 
                                    <span style="background: #dc3545; color: white; padding: 2px 12px; border-radius: 20px; font-weight: 600;">${response.total_uc || 0}</span>
                                </div>
                            </div>
                        </div>
                        <div style="max-height: 400px; overflow-y: auto;">
                            <table class="table table-hover" style="border-radius: 8px; overflow: hidden;">
                                <thead style="background: linear-gradient(135deg, #003366 0%, #1a5276 100%); color: white;">
                                    <tr>
                                        <th style="padding: 8px 12px; font-size: 0.8rem; font-weight: 500;">Código</th>
                                        <th style="padding: 8px 12px; font-size: 0.8rem; font-weight: 500;">Unidad Curricular</th>
                                        <th style="padding: 8px 12px; text-align: center; font-size: 0.8rem; font-weight: 500;">UC</th>
                                        <th style="padding: 8px 12px; text-align: center; font-size: 0.8rem; font-weight: 500;">Trimestre</th>
                                    </tr>
                                </thead>
                                <tbody>
                    `;
                    
                    response.data.forEach(function(item) {
                        var es_linea = (item.trimestre == 'LÍNEA DE INVESTIGACIÓN');
                        
                        html += `
                            <tr style="border-bottom: 1px solid #f0f0f0; ${es_linea ? 'background: #fce4e4;' : ''}">
                                <td style="padding: 8px 12px; font-size: 0.85rem;">
                                    <span class="badge" style="background: #e9ecef; color: #495057; padding: 2px 10px; border-radius: 15px;">
                                        ${item.codigo || 'N/A'}
                                    </span>
                                </td>
                                <td style="padding: 8px 12px; font-size: 0.85rem; color: #2c3e50;">
                                    ${es_linea ? '<span style="background: #dc3545; color: white; padding: 2px 10px; border-radius: 20px; font-size: 0.6rem; font-weight: 700; margin-right: 6px;">TEG</span>' : ''}
                                    ${item.unidad_curricular || 'N/A'}
                                </td>
                                <td style="padding: 8px 12px; text-align: center; font-size: 0.85rem;">
                                    <span class="badge" style="background: ${es_linea ? '#dc3545' : '#003366'}; color: white; padding: 3px 12px; border-radius: 20px;">
                                        ${item.uc || '0'}
                                    </span>
                                </td>
                                <td style="padding: 8px 12px; text-align: center; font-size: 0.85rem;">
                                    <span class="badge" style="background: #e9ecef; color: #495057; padding: 3px 12px; border-radius: 20px;">
                                        ${item.trimestre || 'N/A'}
                                    </span>
                                </td>
                            </tr>
                        `;
                    });
                    
                    html += `
                                </tbody>
                                <tfoot style="background: #f8f9fa; border-top: 2px solid #003366;">
                                    <tr>
                                        <th colspan="4" style="padding: 8px 15px; font-size: 0.75rem; color: #6c757d; text-align: center;">
                                            <i class="fas fa-info-circle" style="color: #003366; margin-right: 4px;"></i>
                                            Los registros en <span style="color: #dc3545; font-weight: 600;">rojo</span> corresponden a la Línea de Investigación
                                        </th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    `;
                } else {
                    html = `
                        <div style="padding: 40px 20px; text-align: center;">
                            <i class="fas fa-check-circle" style="font-size: 3rem; color: #28a745; margin-bottom: 15px; display: block;"></i>
                            <h6 style="color: #2c3e50; font-weight: 600;">No hay unidades con retiro aprobado</h6>
                            <p style="color: #6c757d; font-size: 0.9rem;">Este trámite no tiene unidades curriculares retiradas registradas.</p>
                        </div>
                    `;
                }
                
                document.getElementById('contenido-unidades-retiro').innerHTML = html;
            } else {
                document.getElementById('contenido-unidades-retiro').innerHTML = `
                    <div class="alert alert-danger" style="border-radius: 8px; border-left: 4px solid #dc3545;">
                        <i class="fas fa-exclamation-circle mr-2"></i>
                        <strong>Error:</strong> ${response.message || 'No se pudieron cargar los datos.'}
                    </div>
                `;
            }
        },
        error: function(xhr, status, error) {
            document.getElementById('contenido-unidades-retiro').innerHTML = `
                <div class="alert alert-danger" style="border-radius: 8px; border-left: 4px solid #dc3545;">
                    <i class="fas fa-exclamation-circle mr-2"></i>
                    <strong>Error:</strong> Ocurrió un problema al cargar los datos.<br>
                    <small>${xhr.responseText || 'Intente nuevamente.'}</small>
                </div>
            `;
        }
    });
}
</script>
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
    .btn-sm {
        transition: all 0.25s ease !important;
    }
    
    .btn-sm:hover {
        transform: translateY(-2px) scale(1.02);
        box-shadow: 0 4px 16px rgba(0, 0, 0, 0.2) !important;
    }
    
    /* Badges de estado */
    .badge {
        font-weight: 600;
        padding: 5px 14px;
        border-radius: 20px;
        font-size: 0.75rem;
        letter-spacing: 0.3px;
    }
    
    .badge-success {
        background: linear-gradient(135deg, #28a745 0%, #20c997 100%);
        color: white;
        box-shadow: 0 2px 8px rgba(40, 167, 69, 0.25);
    }
    
    .badge-secondary {
        background: linear-gradient(135deg, #6c757d 0%, #8a929a 100%);
        color: white;
        box-shadow: 0 2px 8px rgba(108, 117, 125, 0.25);
    }
    
    .badge-warning {
        background: linear-gradient(135deg, #ffc107 0%, #ffca2c 100%);
        color: #856404;
        box-shadow: 0 2px 8px rgba(255, 193, 7, 0.25);
    }
    
    .badge-info {
        background: linear-gradient(135deg, #17a2b8 0%, #20c997 100%);
        color: white;
        box-shadow: 0 2px 8px rgba(23, 162, 184, 0.25);
    }
    
    /* Contenedor de estado */
    .status-badge {
        display: inline-flex;
        align-items: center;
        font-size: 0.8rem;
        padding: 2px 0;
    }
    
    /* Estilo para imágenes de estado */
    .status-img {
        width: 24px;
        height: 24px;
        border-radius: 50%;
        border: 2px solid transparent;
        transition: all 0.3s ease;
        object-fit: cover;
        flex-shrink: 0;
        margin-right: 8px;
    }
    
    .status-img:hover {
        transform: scale(1.2) rotate(5deg);
        border-color: #003366 !important;
        box-shadow: 0 0 20px rgba(0, 51, 102, 0.4) !important;
    }
    
    /* Alertas mejoradas */
    .alert {
        border-radius: 10px !important;
        padding: 15px 20px !important;
    }
    
    .alert-dismissible .close {
        padding: 12px 20px !important;
        opacity: 0.7;
        transition: opacity 0.2s ease;
    }
    
    .alert-dismissible .close:hover {
        opacity: 1;
    }
    
    /* Ajuste para móviles */
    @media (max-width: 768px) {
        .card-title {
            font-size: 1rem !important;
        }
        .btn-sm {
            padding: 4px 10px !important;
            font-size: 0.6rem !important;
            width: 100% !important;
        }
        .table td, .table th {
            padding: 10px 12px !important;
            font-size: 0.75rem !important;
        }
        .status-img {
            width: 20px !important;
            height: 20px !important;
            margin-right: 5px !important;
        }
        .badge {
            font-size: 0.6rem !important;
            padding: 3px 10px !important;
        }
        .status-badge {
            font-size: 0.7rem !important;
        }
        .alert .fa-3x {
            font-size: 2rem !important;
        }
        .alert .d-flex {
            flex-direction: column !important;
            text-align: center !important;
        }
        .alert .fa-3x {
            margin-right: 0 !important;
            margin-bottom: 15px !important;
        }
    }
    
    @media (max-width: 576px) {
        .table td, .table th {
            padding: 8px 10px !important;
            font-size: 0.7rem !important;
        }
        .table-responsive {
            border: none;
        }
        .status-img {
            width: 16px !important;
            height: 16px !important;
            margin-right: 4px !important;
        }
        .btn-sm {
            font-size: 0.55rem !important;
            padding: 3px 8px !important;
        }
        .badge {
            font-size: 0.55rem !important;
            padding: 2px 8px !important;
        }
        .status-badge {
            font-size: 0.65rem !important;
        }
        .alert {
            padding: 12px 15px !important;
            font-size: 0.85rem !important;
        }
    }
</style>

