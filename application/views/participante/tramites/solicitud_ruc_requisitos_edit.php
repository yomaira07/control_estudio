<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" style="background: #f4f6f9;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0" style="font-weight: 300; color: #003366;">
                        <i class="fas fa-file-upload" style="color: #003366; margin-right: 8px;"></i>
                        <span style="color: #003366; font-weight: 600;">SCE-ENFMP</span>
                        <span style="color: #2c3e50; font-weight: 300;"> - Actualizar Documentos RUC</span>
                    </h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right" style="background: transparent;">
                        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>dashboard04/home" style="color: #6c757d;">Inicio</a></li>
                        <li class="breadcrumb-item"><a href="#" style="color: #6c757d;">Trámites</a></li>
                        <li class="breadcrumb-item"><a href="#" style="color: #6c757d;">RUC</a></li>
                        <li class="breadcrumb-item active" style="color: #003366; font-weight: 600;">Actualizar Documentos</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <!-- Main content -->
    <section class="content">
        <script language="javascript">
            function anterior() { 
                location.href = "/control_estudio/dashboard09/solicitud_ruc_requisitos/2";
            }
        </script>

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
                                    <i class="fas fa-file-upload text-white" style="font-size: 1.1rem;"></i>
                                </div>
                                <div>
                                    <h5 class="mb-0" style="font-weight: 600; color: #2c3e50;">
                                        <strong>Trámites Académicos</strong>
                                    </h5>
                                    <small class="text-muted" style="font-size: 0.75rem;">
                                        <i class="fas fa-calendar-alt mr-1"></i>
                                        Solicitud RUC - Actualizar Documentos
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
                                    Actualizar Documentos RUC
                                </h6>
                            </div>
                            <div class="card-body p-3">
                                <form action="<?php echo base_url(); ?>dashboard09/update_ruc_requisitos_edit/<?php echo $solicitud->id; ?>" method="POST" enctype="multipart/form-data">
                                    
                                    <input type="hidden" id="id_solicitud" name="id_solicitud" value="<?php echo $solicitud->id; ?>">
                                    <input type="hidden" id="id_reconocimiento" name="id_reconocimiento" value="<?php echo $solicitud->id_tipo_reconocimiento; ?>">
                                    <input type="hidden" id="id_programa_cursa" name="id_programa_cursa" value="<?php echo $solicitud->id_programa; ?>">
                                    
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

                                    <div class="table-responsive">
                                        <table class="table table-hover" style="border-radius: 8px; overflow: hidden; margin-bottom: 0;">
                                            <tbody>
                                                <tr style="border-bottom: 1px solid #f0f0f0;">
                                                    <td style="padding: 12px 15px; font-weight: 500; color: #2c3e50; width: 35%; vertical-align: middle;">
                                                        <i class="fas fa-graduation-cap" style="color: #003366; margin-right: 8px;"></i>
                                                        Programa de Postgrado o Especialización a Cursar:
                                                    </td>
                                                    <td style="padding: 12px 15px;">
                                                        <select class="form-control" name="comboprogramaActual" id="comboprogramaActual" readonly disabled style="border-radius: 0px; border: 1px solid #ced4da; width: 80%; background: #e9ecef; cursor: not-allowed;">
                                                            <option value="">- Seleccione -</option>                                       
                                                            <?php foreach($programa as $programa_item):
                                                                if($solicitud->id_programa == $programa_item->id){
                                                                    echo "<option value='".$programa_item->id."' selected>".$programa_item->nombre."</option>";  
                                                                } else { 
                                                                    echo "<option value='".$programa_item->id."'>".$programa_item->nombre."</option>";  
                                                                }                          
                                                            endforeach; ?>
                                                        </select>
                                                    </td>
                                                </tr>
                                                
                                                <tr style="border-bottom: 1px solid #f0f0f0;">
                                                    <td style="padding: 12px 15px; font-weight: 500; color: #2c3e50; vertical-align: middle;">
                                                        <i class="fas fa-history" style="color: #003366; margin-right: 8px;"></i>
                                                        Programa de Postgrado o Especialización Cursado:
                                                    </td>
                                                    <td style="padding: 12px 15px;">
                                                        <select class="form-control" name="comboprogramaRucRe" id="comboprogramaRucRe" readonly disabled style="border-radius: 0px; border: 1px solid #ced4da; width: 80%; background: #e9ecef; cursor: not-allowed;">
                                                            <option value="">- Seleccione -</option>                                       
                                                            <?php foreach($programaCursado as $programa): 
                                                                if($solicitud->id_programa_ruc_cursado == $programa->id){
                                                                    echo "<option value='".$programa->id."' selected>".$programa->nombre."</option>";  
                                                                } else { 
                                                                    echo "<option value='".$programa->id."'>".$programa->nombre."</option>";  
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
                                                            <?php foreach($combotramite as $tramite):
                                                                if($solicitud->id_tramite == $tramite->id){
                                                                    echo "<option value='".$tramite->id."' selected>".$tramite->nombre."</option>";  
                                                                } else { 
                                                                    echo "<option value='".$tramite->id."'>".$tramite->nombre."</option>";  
                                                                }                          
                                                            endforeach; ?>
                                                        </select>
                                                    </td>
                                                </tr>
                                                
                                                <tr style="border-bottom: 1px solid #f0f0f0;">
                                                    <td style="padding: 12px 15px; font-weight: 500; color: #2c3e50; vertical-align: middle;">
                                                        <i class="fas fa-tag" style="color: #003366; margin-right: 8px;"></i>
                                                        Tipo de Reconocimiento:
                                                    </td>
                                                    <td style="padding: 12px 15px;">
                                                        <select class="form-control" name="comboreconocimiento" id="comboreconocimiento" readonly disabled style="border-radius: 0px; border: 1px solid #ced4da; width: 80%; background: #e9ecef; cursor: not-allowed;">
                                                            <option value="">- Seleccione -</option>                                       
                                                            <?php foreach($reconocimiento as $reconocimiento_item):
                                                                if($solicitud->id_tipo_reconocimiento == $reconocimiento_item->id){    
                                                                    echo "<option value='".$reconocimiento_item->id."' selected>".$reconocimiento_item->nombre."</option>";  
                                                                } else { 
                                                                    echo "<option value='".$reconocimiento_item->id."'>".$reconocimiento_item->nombre."</option>";  
                                                                }                          
                                                            endforeach; ?>
                                                        </select>
                                                    </td>
                                                </tr>
                                                
                                                <tr style="border-bottom: 1px solid #f0f0f0;">
                                                    <td style="padding: 12px 15px; font-weight: 500; color: #2c3e50; vertical-align: middle;">
                                                        <i class="fas fa-file-pdf" style="color: #003366; margin-right: 8px;"></i>
                                                        Actualizar su Carta de Solicitud:
                                                    </td>
                                                    <td style="padding: 12px 15px;">
                                                        <div>
                                                            <?php 
                                                            $ruta_solicitud = base_url().'assets/tramites/ruc/'.$solicitud->id.'_'.$solicitud->id_usuario.'_ruc.pdf';
                                                            if(file_exists('assets/tramites/ruc/'.$solicitud->id.'_'.$solicitud->id_usuario.'_ruc.pdf')): ?>
                                                                <a href="<?php echo $ruta_solicitud; ?>" target="_blank" class="btn" style="border-radius: 0px; padding: 4px 16px; background: #ffc107; color: #856404; margin-bottom: 8px; display: inline-block;">
                                                                    <i class="fas fa-file-pdf mr-1"></i> Ver Carta de Solicitud Cargada
                                                                </a>
                                                            <?php else: ?>
                                                                <p class="text-warning" style="color: #856404;">
                                                                    <i class="fas fa-exclamation-triangle mr-1"></i> No hay carta de solicitud cargada
                                                                </p>
                                                            <?php endif; ?>
                                                            <div class="custom-file" style="width: 80%;">
                                                                <input type="file" id="solicitud" name="solicitud" class="custom-file-input" accept=".pdf" style="border-radius: 0px;">
                                                                <label class="custom-file-label" for="solicitud" style="border-radius: 0px; border: 1px solid #ced4da; overflow: hidden;">Seleccionar archivo</label>
                                                            </div>
                                                            <small style="font-size: 0.7rem; color: #6c757d; display: block; margin-top: 5px;">
                                                                <i class="fas fa-info-circle mr-1"></i> Formatos: PDF | Máx: 1 MB
                                                            </small>
                                                        </div>
                                                    </td>
                                                </tr>
                                                
                                                <tr>
                                                    <td style="padding: 12px 15px; font-weight: 500; color: #2c3e50; vertical-align: middle;">
                                                        <i class="fas fa-list" style="color: #003366; margin-right: 8px;"></i>
                                                        Unidades Curriculares del programa que cursa:
                                                    </td>
                                                    <td style="padding: 12px 15px;">
                                                        <button type="button" class="btn btn-info" onclick="verUnidadesCurriculares()" style="border-radius: 0px; padding: 6px 20px;">
                                                            <i class="fas fa-eye mr-1"></i> Ver Unidades Curriculares Solicitadas
                                                        </button>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>

                                    <!-- ============================================= -->
                                    <!-- DOCUMENTOS ENFMP (Tipo 1) - TÍTULOS -->
                                    <!-- ============================================= -->
                                    <div class="card card-secondary card-outline" style="border-radius: 8px; border-left: 4px solid #6c757d; border-top: none; margin-top: 15px; display:none;" id="documentos_enfmp">
                                        <div class="card-header" style="background: #f8f9fa; border-bottom: 1px solid #e8e8e8; padding: 10px 18px; border-radius: 8px 8px 0 0;">
                                            <h6 class="mb-0" style="font-weight: 600; color: #2c3e50;">
                                                <i class="fas fa-file-pdf text-secondary mr-2"></i>
                                                Títulos de programa de postgrado - ENFMP
                                            </h6>
                                        </div>
                                        <div class="card-body p-3">
                                            <div class="alert alert-secondary" style="border-radius: 8px; border-left: 4px solid #6c757d; background: #f8f9fa; color: #2c3e50; text-align: center;">
                                                <i class="fas fa-info-circle mr-2"></i> 
                                                <strong>Títulos de programa de postgrado debidamente registrados, certificados o diplomas de los estudios realizados en la ENFMP</strong><br>
                                                <small style="color: #6c757d;">Máximo 10 documentos | Formatos: PDF, JPG, JPEG, PNG | Máx. 1 MB por archivo</small>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label style="font-weight: 500; color: #2c3e50;">
                                                    <i class="fas fa-cloud-upload-alt" style="color: #003366; margin-right: 4px;"></i> Seleccionar archivos:
                                                </label>
                                                <div class="custom-file">
                                                    <input type="file" id="titulos" name="titulos[]" multiple accept=".pdf,.jpg,.jpeg,.png" class="custom-file-input" style="border-radius: 0px;">
                                                    <label class="custom-file-label" for="titulos" style="border-radius: 0px; border: 1px solid #ced4da; overflow: hidden;">Seleccionar archivos (máx. 10)</label>
                                                </div>
                                            </div>
                                            
                                            <div class="mt-3">
                                                <p style="font-weight: 600; color: #2c3e50;">
                                                    <i class="fas fa-folder-open" style="color: #003366; margin-right: 8px;"></i> Documentos Cargados en esta carpeta:
                                                </p>
                                                <?php  
                                                $dir = 'assets/tramites/ruc_tit_'.trim($solicitud->id_programa).'_'.trim($alumno_list->cedula).'/';
                                                if (is_dir($dir)) {
                                                    $archivos = scandir($dir);
                                                    $archivos_validos = array_filter($archivos, function($archivo) {
                                                        return $archivo != "." && $archivo != "..";
                                                    });
                                                    
                                                    if(count($archivos_validos) > 0) { ?>
                                                        <div class="table-responsive">
                                                            <table class="table table-hover table-bordered" style="border-radius: 8px; overflow: hidden;">
                                                                <thead style="background: #f8f9fa;">
                                                                    <tr>
                                                                        <th width="5%" style="padding: 6px 12px;">#</th>
                                                                        <th width="55%" style="padding: 6px 12px;">Nombre del Documento</th>
                                                                        <th width="20%" style="padding: 6px 12px; text-align: center;">Tamaño</th>
                                                                        <th width="20%" style="padding: 6px 12px; text-align: center;">Acción</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                <?php $i = 1;
                                                                foreach ($archivos as $archivo) {
                                                                    if ($archivo != "." && $archivo != "..") {
                                                                        $ruta_completa = $dir . $archivo;
                                                                        $tamaño = filesize($ruta_completa);
                                                                        $tamaño_kb = number_format($tamaño / 1024, 2);
                                                                        $icono = (pathinfo($archivo, PATHINFO_EXTENSION) == 'pdf') ? 'fa-file-pdf text-danger' : 'fa-file-image text-primary';
                                                                        ?>
                                                                        <tr style="border-bottom: 1px solid #f0f0f0;">
                                                                            <td class="text-center" style="padding: 6px 12px;"><?php echo $i++; ?></td>
                                                                            <td style="padding: 6px 12px;">
                                                                                <a href="<?php echo base_url().$dir.$archivo; ?>" target="_blank" title="Ver documento" style="color: #2c3e50; text-decoration: none;">
                                                                                    <i class="fas <?php echo $icono; ?> fa-lg mr-2"></i>
                                                                                    <?php echo $archivo; ?>
                                                                                </a>
                                                                            </td>
                                                                            <td class="text-center" style="padding: 6px 12px;"><?php echo $tamaño_kb; ?> KB</td>
                                                                            <td class="text-center" style="padding: 6px 12px;">
                                                                                <a href="<?php echo base_url(); ?>dashboard09/eliminar_archivo_directorio/tit/<?php echo $solicitud->id_programa.'/'.$alumno_list->cedula.'/'.$archivo.'/'.$solicitud->id; ?>" 
                                                                                   class="btn btn-sm btn-danger" style="border-radius: 0px; padding: 2px 12px;" 
                                                                                   onclick="return confirm('¿Está seguro de eliminar este archivo?')">
                                                                                    <i class="fas fa-trash-alt"></i> Eliminar
                                                                                </a>
                                                                            </td>
                                                                        </tr>
                                                                    <?php }
                                                                } ?>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    <?php } else { ?>
                                                        <div class="alert alert-warning" style="border-radius: 8px; border-left: 4px solid #ffc107; background: #fffbf0; color: #856404;">
                                                            <i class="fas fa-exclamation-triangle mr-2"></i> No hay documentos cargados en este directorio.
                                                        </div>
                                                    <?php }
                                                } else { ?>
                                                    <div class="alert alert-secondary" style="border-radius: 8px; border-left: 4px solid #6c757d; background: #f8f9fa; color: #2c3e50;">
                                                        <i class="fas fa-folder mr-2"></i> No hay documentos cargados. El directorio se creará al subir su primer archivo.
                                                    </div>
                                                <?php } ?>      
                                            </div>
                                        </div>
                                    </div>

                                    <!-- ============================================= -->
                                    <!-- DOCUMENTOS OTRAS UNIVERSIDADES (Tipo 2) - PROGRAMAS -->
                                    <!-- ============================================= -->
                                    <div class="card card-secondary card-outline" style="border-radius: 8px; border-left: 4px solid #6c757d; border-top: none; margin-top: 15px; display:none;" id="documentos_externos">
                                        <div class="card-header" style="background: #f8f9fa; border-bottom: 1px solid #e8e8e8; padding: 10px 18px; border-radius: 8px 8px 0 0;">
                                            <h6 class="mb-0" style="font-weight: 600; color: #2c3e50;">
                                                <i class="fas fa-file-alt text-secondary mr-2"></i>
                                                Documentos de Otras Instituciones
                                            </h6>
                                        </div>
                                        <div class="card-body p-3">
                                            <div class="alert alert-secondary" style="border-radius: 8px; border-left: 4px solid #6c757d; background: #f8f9fa; color: #2c3e50; text-align: center;">
                                                <i class="fas fa-info-circle mr-2"></i> 
                                                <strong>Programas de estudios, contenido programático, notas certificadas, diplomas o Récord Académico de Calificaciones de otras instituciones</strong><br>
                                                <small style="color: #6c757d;">Máximo 10 documentos | Formatos: PDF, JPG, JPEG, PNG | Máx. 1 MB por archivo</small>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label style="font-weight: 500; color: #2c3e50;">
                                                    <i class="fas fa-cloud-upload-alt" style="color: #003366; margin-right: 4px;"></i> Seleccionar archivos:
                                                </label>
                                                <div class="custom-file">
                                                    <input type="file" id="programas" name="programas[]" multiple accept=".pdf,.jpg,.jpeg,.png" class="custom-file-input" style="border-radius: 0px;">
                                                    <label class="custom-file-label" for="programas" style="border-radius: 0px; border: 1px solid #ced4da; overflow: hidden;">Seleccionar archivos (máx. 10)</label>
                                                </div>
                                            </div>
                                            
                                            <div class="mt-3">
                                                <p style="font-weight: 600; color: #2c3e50;">
                                                    <i class="fas fa-folder-open" style="color: #003366; margin-right: 8px;"></i> Documentos Cargados en esta carpeta:
                                                </p>
                                                <?php  
                                                $dir = 'assets/tramites/ruc_pro_'.trim($solicitud->id_programa).'_'.trim($alumno_list->cedula).'/';
                                                if (is_dir($dir)) {
                                                    $archivos = scandir($dir);
                                                    $archivos_validos = array_filter($archivos, function($archivo) {
                                                        return $archivo != "." && $archivo != "..";
                                                    });
                                                    
                                                    if(count($archivos_validos) > 0) { ?>
                                                        <div class="table-responsive">
                                                            <table class="table table-hover table-bordered" style="border-radius: 8px; overflow: hidden;">
                                                                <thead style="background: #f8f9fa;">
                                                                    <tr>
                                                                        <th width="5%" style="padding: 6px 12px;">#</th>
                                                                        <th width="55%" style="padding: 6px 12px;">Nombre del Documento</th>
                                                                        <th width="20%" style="padding: 6px 12px; text-align: center;">Tamaño</th>
                                                                        <th width="20%" style="padding: 6px 12px; text-align: center;">Acción</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                <?php $i = 1;
                                                                foreach ($archivos as $archivo) {
                                                                    if ($archivo != "." && $archivo != "..") {
                                                                        $ruta_completa = $dir . $archivo;
                                                                        $tamaño = filesize($ruta_completa);
                                                                        $tamaño_kb = number_format($tamaño / 1024, 2);
                                                                        $icono = (pathinfo($archivo, PATHINFO_EXTENSION) == 'pdf') ? 'fa-file-pdf text-danger' : 'fa-file-image text-primary';
                                                                        ?>
                                                                        <tr style="border-bottom: 1px solid #f0f0f0;">
                                                                            <td class="text-center" style="padding: 6px 12px;"><?php echo $i++; ?></td>
                                                                            <td style="padding: 6px 12px;">
                                                                                <a href="<?php echo base_url().$dir.$archivo; ?>" target="_blank" title="Ver documento" style="color: #2c3e50; text-decoration: none;">
                                                                                    <i class="fas <?php echo $icono; ?> fa-lg mr-2"></i>
                                                                                    <?php echo $archivo; ?>
                                                                                </a>
                                                                            </td>
                                                                            <td class="text-center" style="padding: 6px 12px;"><?php echo $tamaño_kb; ?> KB</td>
                                                                            <td class="text-center" style="padding: 6px 12px;">
                                                                                <a href="<?php echo base_url(); ?>dashboard09/eliminar_archivo_directorio/pro/<?php echo $solicitud->id_programa.'/'.$alumno_list->cedula.'/'.$archivo.'/'.$solicitud->id; ?>" 
                                                                                   class="btn btn-sm btn-danger" style="border-radius: 0px; padding: 2px 12px;" 
                                                                                   onclick="return confirm('¿Está seguro de eliminar este archivo?')">
                                                                                    <i class="fas fa-trash-alt"></i> Eliminar
                                                                                </a>
                                                                            </td>
                                                                        </tr>
                                                                    <?php }
                                                                } ?>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    <?php } else { ?>
                                                        <div class="alert alert-warning" style="border-radius: 8px; border-left: 4px solid #ffc107; background: #fffbf0; color: #856404;">
                                                            <i class="fas fa-exclamation-triangle mr-2"></i> No hay documentos cargados en este directorio.
                                                        </div>
                                                    <?php }
                                                } else { ?>
                                                    <div class="alert alert-secondary" style="border-radius: 8px; border-left: 4px solid #6c757d; background: #f8f9fa; color: #2c3e50;">
                                                        <i class="fas fa-folder mr-2"></i> No hay documentos cargados. El directorio se creará al subir su primer archivo.
                                                    </div>
                                                <?php } ?>      
                                            </div>
                                        </div>
                                    </div>

                                    <!-- ============================================= -->
                                    <!-- DOCUMENTOS EXPERIENCIA LABORAL/DOCENTE (Tipo 3 y 4) -->
                                    <!-- ============================================= -->
                                    <div class="card card-secondary card-outline" style="border-radius: 8px; border-left: 4px solid #6c757d; border-top: none; margin-top: 15px; display:none;" id="documentos_laboral">
                                        <div class="card-header" style="background: #f8f9fa; border-bottom: 1px solid #e8e8e8; padding: 10px 18px; border-radius: 8px 8px 0 0;">
                                            <h6 class="mb-0" style="font-weight: 600; color: #2c3e50;">
                                                <i class="fas fa-briefcase text-secondary mr-2"></i>
                                                Documentos de Experiencia Laboral
                                            </h6>
                                        </div>
                                        <div class="card-body p-3">
                                            <div class="alert alert-secondary" style="border-radius: 8px; border-left: 4px solid #6c757d; background: #f8f9fa; color: #2c3e50; text-align: center;">
                                                <i class="fas fa-info-circle mr-2"></i> 
                                                <strong>Constancias de experiencia laboral o docente que demuestran conocimiento en un área determinada</strong><br>
                                                <small style="color: #6c757d;">Máximo 10 documentos | Formatos: PDF, JPG, JPEG, PNG | Máx. 1 MB por archivo</small>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label style="font-weight: 500; color: #2c3e50;">
                                                    <i class="fas fa-cloud-upload-alt" style="color: #003366; margin-right: 4px;"></i> Seleccionar archivos:
                                                </label>
                                                <div class="custom-file">
                                                    <input type="file" id="laboral" name="laboral[]" multiple accept=".pdf,.jpg,.jpeg,.png" class="custom-file-input" style="border-radius: 0px;">
                                                    <label class="custom-file-label" for="laboral" style="border-radius: 0px; border: 1px solid #ced4da; overflow: hidden;">Seleccionar archivos (máx. 10)</label>
                                                </div>
                                            </div>
                                            
                                            <div class="mt-3">
                                                <p style="font-weight: 600; color: #2c3e50;">
                                                    <i class="fas fa-folder-open" style="color: #003366; margin-right: 8px;"></i> Documentos Cargados en esta carpeta:
                                                </p>
                                                <?php  
                                                $dir = 'assets/tramites/ruc_lab_'.trim($solicitud->id_programa).'_'.trim($alumno_list->cedula).'/';
                                                if (is_dir($dir)) {
                                                    $archivos = scandir($dir);
                                                    $archivos_validos = array_filter($archivos, function($archivo) {
                                                        return $archivo != "." && $archivo != "..";
                                                    });
                                                    
                                                    if(count($archivos_validos) > 0) { ?>
                                                        <div class="table-responsive">
                                                            <table class="table table-hover table-bordered" style="border-radius: 8px; overflow: hidden;">
                                                                <thead style="background: #f8f9fa;">
                                                                    <tr>
                                                                        <th width="5%" style="padding: 6px 12px;">#</th>
                                                                        <th width="55%" style="padding: 6px 12px;">Nombre del Documento</th>
                                                                        <th width="20%" style="padding: 6px 12px; text-align: center;">Tamaño</th>
                                                                        <th width="20%" style="padding: 6px 12px; text-align: center;">Acción</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                <?php $i = 1;
                                                                foreach ($archivos as $archivo) {
                                                                    if ($archivo != "." && $archivo != "..") {
                                                                        $ruta_completa = $dir . $archivo;
                                                                        $tamaño = filesize($ruta_completa);
                                                                        $tamaño_kb = number_format($tamaño / 1024, 2);
                                                                        $icono = (pathinfo($archivo, PATHINFO_EXTENSION) == 'pdf') ? 'fa-file-pdf text-danger' : 'fa-file-image text-primary';
                                                                        ?>
                                                                        <tr style="border-bottom: 1px solid #f0f0f0;">
                                                                            <td class="text-center" style="padding: 6px 12px;"><?php echo $i++; ?></td>
                                                                            <td style="padding: 6px 12px;">
                                                                                <a href="<?php echo base_url().$dir.$archivo; ?>" target="_blank" title="Ver documento" style="color: #2c3e50; text-decoration: none;">
                                                                                    <i class="fas <?php echo $icono; ?> fa-lg mr-2"></i>
                                                                                    <?php echo $archivo; ?>
                                                                                </a>
                                                                            </td>
                                                                            <td class="text-center" style="padding: 6px 12px;"><?php echo $tamaño_kb; ?> KB</td>
                                                                            <td class="text-center" style="padding: 6px 12px;">
                                                                                <a href="<?php echo base_url(); ?>dashboard09/eliminar_archivo_directorio/lab/<?php echo $solicitud->id_programa.'/'.$alumno_list->cedula.'/'.$archivo.'/'.$solicitud->id; ?>" 
                                                                                   class="btn btn-sm btn-danger" style="border-radius: 0px; padding: 2px 12px;" 
                                                                                   onclick="return confirm('¿Está seguro de eliminar este archivo?')">
                                                                                    <i class="fas fa-trash-alt"></i> Eliminar
                                                                                </a>
                                                                            </td>
                                                                        </tr>
                                                                    <?php }
                                                                } ?>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    <?php } else { ?>
                                                        <div class="alert alert-warning" style="border-radius: 8px; border-left: 4px solid #ffc107; background: #fffbf0; color: #856404;">
                                                            <i class="fas fa-exclamation-triangle mr-2"></i> No hay documentos cargados en este directorio.
                                                        </div>
                                                    <?php }
                                                } else { ?>
                                                    <div class="alert alert-secondary" style="border-radius: 8px; border-left: 4px solid #6c757d; background: #f8f9fa; color: #2c3e50;">
                                                        <i class="fas fa-folder mr-2"></i> No hay documentos cargados. El directorio se creará al subir su primer archivo.
                                                    </div>
                                                <?php } ?>      
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Botones de Acción -->
                                    <div class="row mt-4">
                                        <div class="col-md-12 text-center">
                                            <button type="submit" class="btn btn-primary" style="border-radius: 0px; padding: 10px 40px; font-weight: 500; transition: all 0.3s;">
                                                <i class="fas fa-save mr-2"></i>
                                                Actualizar Documentos
                                            </button>
                                            <button type="button" name="btnSeguiente" class="btn btn-default" style="border-radius: 0px; padding: 10px 30px; font-weight: 500; margin-left: 8px; transition: all 0.3s;" onClick="anterior();">
                                                <i class="fas fa-arrow-left mr-2"></i>
                                                Regresar
                                            </button>
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

        <!-- MODAL PARA VER UNIDADES CURRICULARES -->
        <div class="modal fade" id="modalUnidades" tabindex="-1" role="dialog" aria-labelledby="modalUnidadesLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content" style="border-radius: 10px;">
                    <div class="modal-header" style="background: linear-gradient(135deg, #003366 0%, #1a5276 100%); color: white; border-radius: 10px 10px 0 0;">
                        <h5 class="modal-title" id="modalUnidadesLabel">
                            <i class="fas fa-book"></i> Unidades Curriculares Solicitadas
                        </h5>
                        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!-- Tabla de unidades que CURSA actualmente -->
                        <div class="card card-info card-outline" style="border-radius: 8px; border-left: 4px solid #003366; border-top: none; margin-bottom: 15px;">
                            <div class="card-header" style="background: #e8f0fe; border-bottom: 1px solid #e8e8e8; padding: 8px 15px; border-radius: 8px 8px 0 0;">
                                <h5 class="card-title mb-0" style="font-weight: 600; color: #003366;">
                                    <i class="fas fa-graduation-cap" style="color: #003366; margin-right: 8px;"></i>
                                    Unidades Curriculares que CURSA (Programa Actual)
                                </h5>
                            </div>
                            <div class="card-body p-2">
                                <div class="table-responsive">
                                    <table class="table table-hover" style="border-radius: 8px; overflow: hidden; margin-bottom: 0;">
                                        <thead style="background: #f8f9fa;">
                                            <tr>
                                                <th style="padding: 8px 12px; font-weight: 500;">Código</th>
                                                <th style="padding: 8px 12px; font-weight: 500;">Nombre de la Unidad</th>
                                                <th style="padding: 8px 12px; text-align: center; font-weight: 500;">Trimestre</th>
                                                <th style="padding: 8px 12px; text-align: center; font-weight: 500;">UC</th>
                                            </tr>
                                        </thead>
                                        <tbody id="tablaUnidadesCursa">
                                            <tr><td colspan="4" class="text-center" style="padding: 20px; color: #6c757d;"><i class="fas fa-spinner fa-spin mr-2"></i> Cargando unidades que cursa...</td></tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Tabla de unidades CURSADAS (para reconocimiento) -->
                        <div class="card card-success card-outline" style="border-radius: 8px; border-left: 4px solid #28a745; border-top: none;">
                            <div class="card-header" style="background: #e8f5e9; border-bottom: 1px solid #e8e8e8; padding: 8px 15px; border-radius: 8px 8px 0 0;">
                                <h5 class="card-title mb-0" style="font-weight: 600; color: #1e7e34;">
                                    <i class="fas fa-check-circle" style="color: #28a745; margin-right: 8px;"></i>
                                    Unidades Curriculares CURSADAS (Para Reconocimiento)
                                </h5>
                            </div>
                            <div class="card-body p-2">
                                <div class="table-responsive">
                                    <table class="table table-hover" style="border-radius: 8px; overflow: hidden; margin-bottom: 0;">
                                        <thead style="background: #f8f9fa;">
                                            <tr>
                                                <th style="padding: 8px 12px; font-weight: 500;">Código</th>
                                                <th style="padding: 8px 12px; font-weight: 500;">Nombre de la Unidad</th>
                                                <th style="padding: 8px 12px; text-align: center; font-weight: 500;">Trimestre</th>
                                                <th style="padding: 8px 12px; text-align: center; font-weight: 500;">UC</th>
                                            </tr>
                                        </thead>
                                        <tbody id="tablaUnidadesCursadas">
                                            <tr><td colspan="4" class="text-center" style="padding: 20px; color: #6c757d;"><i class="fas fa-spinner fa-spin mr-2"></i> Cargando unidades cursadas...</td></tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer" style="border-top: 1px solid #e8e8e8;">
                        <button type="button" class="btn btn-default" data-dismiss="modal" style="border-radius: 0px; padding: 8px 25px;">
                            <i class="fas fa-times mr-1"></i> Cerrar
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- JAVASCRIPT -->
        <script type="text/javascript">
        // Función para ver unidades curriculares
        function verUnidadesCurriculares() {
            $('#modalUnidades').modal('show');
            
            $('#tablaUnidadesCursa').html('<tr><td colspan="4" class="text-center" style="padding: 20px; color: #6c757d;"><i class="fas fa-spinner fa-spin mr-2"></i> Cargando unidades que cursa...</td></tr>');
            $('#tablaUnidadesCursadas').html('<tr><td colspan="4" class="text-center" style="padding: 20px; color: #6c757d;"><i class="fas fa-spinner fa-spin mr-2"></i> Cargando unidades cursadas...</td></tr>');
            
            var xhr = new XMLHttpRequest();
            xhr.open('GET', '<?php echo base_url();?>dashboard09/get_unidades_curriculares/<?php echo $solicitud->id; ?>', true);
            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    try {
                        var response = JSON.parse(xhr.responseText);
                        
                        if(response.unidades_cursa && response.unidades_cursa.length > 0) {
                            var html = '';
                            for(var i = 0; i < response.unidades_cursa.length; i++) {
                                html += '<tr style="border-bottom: 1px solid #f0f0f0;">';
                                html += '<td style="padding: 8px 12px;">' + (response.unidades_cursa[i].codigo || 'N/A') + '</td>';
                                html += '<td style="padding: 8px 12px;">' + (response.unidades_cursa[i].nombre_unidad || 'N/A') + '</td>';
                                html += '<td style="padding: 8px 12px; text-align: center;"><span class="badge" style="background: #e9ecef; color: #495057; padding: 3px 12px; border-radius: 20px;">' + (response.unidades_cursa[i].trimestre || 'N/A') + '</span></td>';
                                html += '<td style="padding: 8px 12px; text-align: center;"><span class="badge" style="background: #003366; color: white; padding: 3px 12px; border-radius: 20px;">' + (response.unidades_cursa[i].creditos || 'N/A') + '</span></td>';
                                html += '</tr>';
                            }
                            $('#tablaUnidadesCursa').html(html);
                        } else {
                            $('#tablaUnidadesCursa').html('<tr><td colspan="4" class="text-center" style="padding: 20px; color: #6c757d;"><i class="fas fa-info-circle mr-2"></i> No hay unidades curriculares asignadas para cursar</td></tr>');
                        }
                        
                        if(response.unidades_cursadas && response.unidades_cursadas.length > 0) {
                            var html = '';
                            for(var i = 0; i < response.unidades_cursadas.length; i++) {
                                html += '<tr style="border-bottom: 1px solid #f0f0f0;">';
                                html += '<td style="padding: 8px 12px;">' + (response.unidades_cursadas[i].codigo || 'N/A') + '</td>';
                                html += '<td style="padding: 8px 12px;">' + (response.unidades_cursadas[i].nombre_unidad || 'N/A') + '</td>';
                                html += '<td style="padding: 8px 12px; text-align: center;"><span class="badge" style="background: #e9ecef; color: #495057; padding: 3px 12px; border-radius: 20px;">' + (response.unidades_cursadas[i].trimestre || 'N/A') + '</span></td>';
                                html += '<td style="padding: 8px 12px; text-align: center;"><span class="badge" style="background: #28a745; color: white; padding: 3px 12px; border-radius: 20px;">' + (response.unidades_cursadas[i].creditos || 'N/A') + '</span></td>';
                                html += '</tr>';
                            }
                            $('#tablaUnidadesCursadas').html(html);
                        } else {
                            $('#tablaUnidadesCursadas').html('<tr><td colspan="4" class="text-center" style="padding: 20px; color: #6c757d;"><i class="fas fa-info-circle mr-2"></i> No hay unidades curriculares cursadas para reconocimiento</td></tr>');
                        }
                    } catch(e) {
                        console.error('Error:', e);
                        $('#tablaUnidadesCursa').html('<tr><td colspan="4" class="text-center text-danger" style="padding: 20px;"><i class="fas fa-exclamation-circle mr-2"></i> Error al cargar los datos</td></tr>');
                        $('#tablaUnidadesCursadas').html('<tr><td colspan="4" class="text-center text-danger" style="padding: 20px;"><i class="fas fa-exclamation-circle mr-2"></i> Error al cargar los datos</td></tr>');
                    }
                }
            };
            xhr.send();
        }

        // Mostrar/ocultar secciones según tipo de reconocimiento
        var selectReconocimiento = document.getElementById('comboreconocimiento');
        if(selectReconocimiento) {
            function mostrarDocumentos() {
                var valor = selectReconocimiento.value;
                var enfmp = document.getElementById('documentos_enfmp');
                var externos = document.getElementById('documentos_externos');
                var laboral = document.getElementById('documentos_laboral');
                
                if(enfmp) enfmp.style.display = 'none';
                if(externos) externos.style.display = 'none';
                if(laboral) laboral.style.display = 'none';
                
                if(valor === '1' && enfmp) enfmp.style.display = 'block';
                else if(valor === '2' && externos) externos.style.display = 'block';
                else if((valor === '3' || valor === '4') && laboral) laboral.style.display = 'block';
            }
            
            selectReconocimiento.addEventListener('change', mostrarDocumentos);
            mostrarDocumentos();
        }
        
        $(document).ready(function() {
            $('#modalUnidades').on('hidden.bs.modal', function() {
                console.log('Modal cerrado');
            });
        });
        </script>
    </section>
</div>