<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" style="background: #f4f6f9;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0" style="font-weight: 300; color: #003366;">
                        <i class="fas fa-file-alt" style="color: #003366; margin-right: 8px;"></i>
                        <span style="color: #003366; font-weight: 600;">SCE-ENFMP</span>
                        <span style="color: #2c3e50; font-weight: 300;"> - Retiro Voluntario</span>
                    </h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right" style="background: transparent;">
                        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>dashboard04/home" style="color: #6c757d;">Inicio</a></li>
                        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>dashboard09/index/1" style="color: #6c757d;">Trámites Académicos</a></li>                     
                        <li class="breadcrumb-item active" style="color: #003366; font-weight: 600;"> - Retiro Voluntario</li>
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
                                    <i class="fas fa-user-slash text-white" style="font-size: 1.1rem;"></i>
                                </div>
                                <div>
                                    <h5 class="mb-0" style="font-weight: 600; color: #2c3e50;">
                                        <strong>Trámites Académicos</strong>
                                    </h5>
                                    <small class="text-muted" style="font-size: 0.75rem;">
                                        <i class="fas fa-calendar-alt mr-1"></i>
                                        Retiro Voluntario de Unidades Curriculares
                                    </small>
                                </div>
                            </div>
                            <div>
                                <span class="badge" style="font-size: 0.8rem; padding: 5px 16px; border-radius: 20px; font-weight: 500; background: #dc3545; color: white;">
                                    <i class="fas fa-exclamation-triangle mr-1"></i>
                                    Retiro Voluntario
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

                        <!-- Formulario de Solicitud -->
                        <div class="card card-success card-outline" style="border-radius: 8px; border-left: 4px solid #28a745; border-top: none;">
                            <div class="card-header" style="background: #e8f5e9; border-bottom: 1px solid #e8e8e8; padding: 10px 18px; border-radius: 8px 8px 0 0;">
                                <h6 class="mb-0" style="font-weight: 600; color: #1e7e34;">
                                    <i class="fas fa-plus-circle" style="color: #28a745; margin-right: 8px;"></i>
                                    Solicitud de Retiro Voluntario
                                </h6>
                            </div>
                            <div class="card-body p-3">
                                <form action="<?php echo base_url(); ?>dashboard09/registrotramite_store/1" method="POST" enctype="multipart/form-data">
                                    
                                    <?php if(!empty($listado)): ?>
                                    
                                    <?php 
                                    // Verificar si solo hay línea de investigación
                                    $solo_linea = true;
                                    $hay_linea = false;
                                    foreach($listado as $item){
                                        if(
                                           $item->trimestre == 'LÍNEA DE INVESTIGACIÓN'   ){
                                            $hay_linea = true;
                                        } else {
                                            $solo_linea = false;
                                        }
                                    }
                                    ?>
                                    
                                    <!-- Trámite Académico -->
                                    <div class="table-responsive">
                                        <table class="table table-hover" style="border-radius: 8px; overflow: hidden; margin-bottom: 0;">
                                            <tbody>
                                                <tr style="border-bottom: 1px solid #f0f0f0;">
                                                    <td style="padding: 12px 15px; font-weight: 500; color: #2c3e50; width: 35%; vertical-align: middle;">
                                                        <i class="fas fa-file-signature" style="color: #003366; margin-right: 8px;"></i>
                                                        Trámite Académico a solicitar:
                                                    </td>
                                                    <td style="padding: 12px 15px;">
                                                        <select class="form-control" name="combotramite" id="combotramite" required 
                                                                style="border-radius: 0px; border: 1px solid #ced4da; width: 80%; <?php echo ($solo_linea && $hay_linea) ? 'background: #e9ecef; cursor: not-allowed;' : ''; ?>" 
                                                                <?php echo ($solo_linea && $hay_linea) ? 'disabled' : ''; ?>>
                                                            <option value="">- Seleccione -</option>                                       
                                                            <?php foreach($combotramite as $combotramite): ?>
                                                                <?php if($combotramite->id == 3): ?>
                                                                    <option value="<?php echo $combotramite->id; ?>" selected><?php echo $combotramite->nombre; ?></option>
                                                                <?php endif; ?>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>

                                    <!-- Tabla de Unidades Curriculares -->
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
                                                        <?php foreach($listado as $listado): ?>
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
                                                                    <span class="badge <?php echo (trim($listado->trimestre) == 'TEG' || trim($listado->trimestre) == 'LÍNEA DE INVESTIGACIÓN' || trim($listado->trimestre) == 'TG' || trim($listado->trimestre) == 'TESIS' || trim($listado->trimestre) == 'LI') ? 'badge-danger' : ''; ?>" 
                                                                          style="background: <?php echo (trim($listado->trimestre) == 'TEG' || trim($listado->trimestre) == 'LÍNEA DE INVESTIGACIÓN' || trim($listado->trimestre) == 'TG' || trim($listado->trimestre) == 'TESIS' || trim($listado->trimestre) == 'LI') ? '#dc3545' : '#e9ecef'; ?>; 
                                                                                 color: <?php echo (trim($listado->trimestre) == 'TEG' || trim($listado->trimestre) == 'LÍNEA DE INVESTIGACIÓN' || trim($listado->trimestre) == 'TG' || trim($listado->trimestre) == 'TESIS' || trim($listado->trimestre) == 'LI') ? 'white' : '#495057'; ?>; 
                                                                                 padding: 4px 12px; border-radius: 20px; font-weight: 500; font-size: 0.75rem;">
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
                                                                        } elseif($listado->modalidad == 2) {
                                                                            $modalidad_text = 'A DISTANCIA';
                                                                        } elseif($listado->modalidad == 3) {
                                                                            $modalidad_text = 'SEMIPRESENCIAL';
                                                                        }
                                                                    ?>
                                                                    <span class="badge" style="background: #e9ecef; color: #495057; padding: 4px 12px; border-radius: 20px; font-weight: 500; font-size: 0.75rem;">
                                                                        <?php echo $modalidad_text; ?>
                                                                    </span>
                                                                </td>
                                                                <td style="padding: 10px 15px; text-align: center;">
                                                                    <div class="custom-control custom-checkbox" style="display: inline-block;">
                                                                        <input type="checkbox" class="custom-control-input" id="check_<?php echo $listado->id; ?>" 
                                                                               name="checks[]" value="<?php echo $listado->id; ?>"
                                                                               <?php echo ($solo_linea && $hay_linea) ? 'disabled' : ''; ?>>
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

                                    <!-- Adjuntar Carta -->
                                    <div class="card card-secondary card-outline" style="border-radius: 8px; border-left: 4px solid #6c757d; border-top: none; margin-top: 15px;">
                                        <div class="card-header" style="background: #f8f9fa; border-bottom: 1px solid #e8e8e8; padding: 10px 18px; border-radius: 8px 8px 0 0;">
                                            <h6 class="mb-0" style="font-weight: 600; color: #2c3e50;">
                                                <i class="fas fa-paperclip text-secondary mr-2"></i>
                                                Adjuntar Carta de Retiro Voluntario
                                            </h6>
                                        </div>
                                        <div class="card-body p-3">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="custom-file">
                                                        <input type="file" name="userfile" class="custom-file-input" id="customFile" 
                                                               <?php echo ($solo_linea && $hay_linea) ? 'disabled' : 'required'; ?> 
                                                               style="border-radius: 0px; <?php echo ($solo_linea && $hay_linea) ? 'cursor: not-allowed;' : ''; ?>">
                                                        <label class="custom-file-label" for="customFile" style="border-radius: 0px; border: 1px solid #ced4da; overflow: hidden; <?php echo ($solo_linea && $hay_linea) ? 'background: #e9ecef; cursor: not-allowed;' : ''; ?>">
                                                            <?php echo ($solo_linea && $hay_linea) ? 'No disponible' : 'Seleccionar archivo'; ?>
                                                        </label>
                                                    </div>
                                                    <small style="font-size: 0.7rem; color: #6c757d; display: block; margin-top: 5px;">
                                                        <i class="fas fa-info-circle mr-1"></i> Formatos: PDF | Máx: 1 MB
                                                    </small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- NOTA INFORMATIVA - SOLO LÍNEA DE INVESTIGACIÓN -->
                                    <?php if($solo_linea && $hay_linea): ?>
                                    <div class="card card-danger card-outline" style="border-radius: 8px; border-left: 4px solid #dc3545; border-top: none; margin-top: 15px;">
                                        <div class="card-header" style="background: #fce4e4; border-bottom: 1px solid #e8e8e8; padding: 10px 18px; border-radius: 8px 8px 0 0;">
                                            <h6 class="mb-0" style="font-weight: 700; color: #721c24;">
                                                <i class="fas fa-exclamation-circle" style="color: #dc3545; margin-right: 8px;"></i>
                                                RETIRO NO DISPONIBLE
                                            </h6>
                                        </div>
                                        <div class="card-body p-3">
                                            <div style="display: flex; align-items: flex-start; gap: 12px;">
                                                <div style="background: #dc3545; border-radius: 50%; width: 35px; height: 35px; display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                                                    <i class="fas fa-graduation-cap" style="color: white; font-size: 1rem;"></i>
                                                </div>
                                                <div>
                                                    <p style="margin: 0; font-size: 0.95rem; color: #2c3e50; line-height: 1.6;">
                                                        Actualmente solo tiene activa la 
                                                        <strong style="color: #dc3545;">LÍNEA DE INVESTIGACIÓN</strong>.
                                                    </p>
                                                    <p style="margin: 5px 0 0 0; font-size: 0.85rem; color: #6c757d;">
                                                        <i class="fas fa-info-circle" style="color: #dc3545; margin-right: 4px;"></i>
                                                        Para poder solicitar el retiro voluntario, debe tener al menos 
                                                        <strong>una unidad curricular regular</strong> inscrita además de la línea de investigación.
                                                    </p>
                                                    <p style="margin: 5px 0 0 0; font-size: 0.85rem; color: #6c757d;">
                                                        <i class="fas fa-exclamation-triangle" style="color: #ff9800; margin-right: 4px;"></i>
                                                        Si desea retirarse del programa, debe realizar el trámite de 
                                                        <strong>Retiro Total del Programa</strong>.
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php endif; ?>

                                    <!-- NOTA INFORMATIVA SOBRE RETIRO VOLUNTARIO (solo si hay unidades regulares) -->
                                    <?php if(!$solo_linea): ?>
                                    <div class="card card-warning card-outline" style="border-radius: 8px; border-left: 4px solid #ffc107; border-top: none; margin-top: 15px;">
                                        <div class="card-header" style="background: #fff8e1; border-bottom: 1px solid #e8e8e8; padding: 10px 18px; border-radius: 8px 8px 0 0;">
                                            <h6 class="mb-0" style="font-weight: 600; color: #856404;">
                                                <i class="fas fa-info-circle" style="color: #ffc107; margin-right: 8px;"></i>
                                                INFORMACIÓN IMPORTANTE SOBRE EL RETIRO VOLUNTARIO
                                            </h6>
                                        </div>
                                        <div class="card-body p-3">
                                            <div style="font-size: 0.9rem; color: #2c3e50; line-height: 1.6;">
                                                <p style="margin-bottom: 8px;">
                                                    <i class="fas fa-check-circle" style="color: #28a745; margin-right: 6px;"></i>
                                                    <strong>¿Cómo funciona el Retiro Voluntario?</strong>
                                                </p>
                                                <ul style="padding-left: 25px; margin-bottom: 10px;">
                                                    <li style="margin-bottom: 6px;">
                                                        La <strong style="color: #dc3545;">LÍNEA DE INVESTIGACIÓN</strong> es 
                                                        <strong style="color: #dc3545;">OBLIGATORIA</strong> para cursar el programa de postgrado.
                                                    </li>      
                                                    <li style="margin-bottom: 6px;">
                                                        <strong>Selecciona una o varias unidades curriculares</strong> que deseas retirar.
                                                    </li>
                                                    <li style="margin-bottom: 6px;">
                                                        <strong>Si seleccionas la LÍNEA DE INVESTIGACIÓN</strong>, se retirarán <strong>TODAS</strong> las unidades curriculares del programa automáticamente.
                                                    </li>
                                                    <li style="margin-bottom: 6px;">
                                                        <strong>Si seleccionas TODAS las unidades curriculares</strong> (excepto línea de investigación), solo se retirarán esas unidades, la línea de investigación permanecerá activa.
                                                    </li>
                                                    <li style="margin-bottom: 6px;">
                                                        <strong>Si seleccionas SOLO ALGUNAS unidades curriculares</strong>, únicamente se retirarán las seleccionadas.
                                                    </li>
                                                </ul>
                                                
                                                <div style="background: #e3f2fd; padding: 10px 15px; border-radius: 6px; margin-top: 8px; border-left: 3px solid #2196f3;">
                                                    <p style="margin: 0; font-size: 0.85rem; color: #0d47a1;">
                                                        <i class="fas fa-lightbulb" style="color: #ffc107; margin-right: 6px;"></i>
                                                        <strong>Ejemplo práctico:</strong>
                                                    </p>
                                                    <p style="margin: 4px 0 0 0; font-size: 0.85rem; color: #0d47a1;">
                                                        Si estás cursando 4 materias + Línea de Investigación y seleccionas la Línea de Investigación, 
                                                        se retirarán <strong>todas las 5</strong> (programa completo). 
                                                        Si seleccionas solo 2 materias, solo se retirarán esas 2 materias.
                                                    </p>
                                                </div>
                                                
                                                <div style="background: #fff3e0; padding: 8px 15px; border-radius: 6px; margin-top: 10px; border-left: 3px solid #ff9800;">
                                                    <p style="margin: 0; font-size: 0.8rem; color: #e65100;">
                                                        <i class="fas fa-exclamation-triangle" style="color: #ff9800; margin-right: 6px;"></i>
                                                        <strong>Importante:</strong> Una vez registrado el retiro, la decisión es irreversible.
                                                        Asegúrate de haber seleccionado correctamente las unidades curriculares antes de confirmar.
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php endif; ?>

                                    <!-- Inputs ocultos -->
                                    <input type="hidden" name="str" id="str">

                                    <!-- Botón de Envío -->
                                    <div class="row mt-4">
                                        <div class="col-md-12 text-center">
                                            <button type="submit" class="btn btn-primary" style="border-radius: 10px; padding: 10px 40px; font-weight: 500; transition: all 0.3s; <?php echo ($solo_linea && $hay_linea) ? 'opacity: 0.5; cursor: not-allowed;' : ''; ?>" 
                                                    <?php echo ($solo_linea && $hay_linea) ? 'disabled' : ''; ?>>
                                                <i class="fas fa-save mr-2"></i>
                                                Registrar Trámite
                                            </button>
                                        </div>
                                    </div>

                                    <?php else: ?>
                                 
                                    <div style="padding: 30px 15px; text-align: center; color: #6c757d;">
                                        <i class="fas fa-info-circle fa-2x d-block mb-2" style="color: #17a2b8;"></i>
                                        <span style="font-size: 1rem;">No posee Unidades Curriculares que tramitar para este período académico <?php echo $periodo->nombre;?></span>
                                    </div>
                                    <?php endif; ?>

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
    
    .btn-primary:hover:not(:disabled) {
        background-color: #0069d9;
        border-color: #0062cc;
        box-shadow: 0 2px 8px rgba(0, 123, 255, 0.3);
        transform: translateY(-2px);
    }
    
    .btn-primary:disabled {
        opacity: 0.5;
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
    
    .custom-control-input:disabled ~ .custom-control-label::before {
        background-color: #e9ecef;
        cursor: not-allowed;
    }
    
    /* Estilo para campos de formulario */
    .form-control:focus {
        border-color: #003366;
        box-shadow: 0 0 0 0.2rem rgba(0, 51, 102, 0.25);
    }
    
    .form-control:disabled {
        background-color: #e9ecef;
        opacity: 1;
        cursor: not-allowed;
    }
    
    .custom-file-input:focus ~ .custom-file-label {
        border-color: #003366;
        box-shadow: 0 0 0 0.2rem rgba(0, 51, 102, 0.25);
    }
    
    .custom-file-input:disabled ~ .custom-file-label {
        background-color: #e9ecef;
        cursor: not-allowed;
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
        .table td, .table th {
            padding: 8px 10px !important;
            font-size: 0.75rem !important;
        }
        .form-control {
            width: 100% !important;
        }
        .table tbody td img {
            width: 20px !important;
            height: 20px !important;
        }
        .custom-file-label {
            font-size: 0.8rem !important;
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
        .table tbody td img {
            width: 18px !important;
            height: 18px !important;
        }
    }
</style>

<!-- Script para mostrar nombre del archivo -->
<script>
    document.querySelector('.custom-file-input')?.addEventListener('change', function(e) {
        var fileName = e.target.files[0]?.name || 'Seleccionar archivo';
        var label = e.target.nextElementSibling;
        label.innerHTML = fileName;
    });
</script>