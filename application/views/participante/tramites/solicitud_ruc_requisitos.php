<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" style="background: #f4f6f9;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0" style="font-weight: 300; color: #003366;">
                        <i class="fas fa-certificate" style="color: #003366; margin-right: 8px;"></i>
                        <span style="color: #003366; font-weight: 600;">SCE-ENFMP</span>
                        <span style="color: #2c3e50; font-weight: 300;"> - Solicitud RUC</span>
                    </h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right" style="background: transparent;">
                        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>dashboard04/home" style="color: #6c757d;">Inicio</a></li>
                        <li class="breadcrumb-item" style="color: #6c757d;">Trámites Administrativos</li>
                        <li class="breadcrumb-item active" style="color: #003366; font-weight: 600;">Solicitud RUC</li>
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
                                    <i class="fas fa-certificate text-white" style="font-size: 1.1rem;"></i>
                                </div>
                                <div>
                                    <h5 class="mb-0" style="font-weight: 600; color: #2c3e50;">
                                        <strong>Trámites Administrativos</strong>
                                    </h5>
                                    <small class="text-muted" style="font-size: 0.75rem;">
                                        <i class="fas fa-calendar-alt mr-1"></i>
                                        Solicitud de Reconocimiento de Unidades de Créditos (RUC)
                                    </small>
                                </div>
                            </div>
                            <div>
                                <span class="badge" style="font-size: 0.8rem; padding: 5px 16px; border-radius: 10px; font-weight: 500; background: #003366; color: white;">
                                    <i class="fas fa-edit mr-1"></i>
                                    Nueva Solicitud
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

                        <!-- Formulario de Solicitud -->
                        <div class="card card-success card-outline" style="border-radius: 8px; border-left: 4px solid #28a745; border-top: none;">
                            <div class="card-header" style="background: #e8f5e9; border-bottom: 1px solid #e8e8e8; padding: 10px 18px; border-radius: 8px 8px 0 0;">
                                <h6 class="mb-0" style="font-weight: 600; color: #1e7e34;">
                                    <i class="fas fa-plus-circle" style="color: #28a745; margin-right: 8px;"></i>
                                    Solicitud de Reconocimiento de Unidades de Créditos (RUC)
                                </h6>
                            </div>
                            <div class="card-body p-3">
                                <form action="<?php echo base_url(); ?>dashboard09/registrotramiteRucReq_store/2" method="POST" enctype="multipart/form-data" id="formRuc">
                                    
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
                                                        <i class="fas fa-file-signature" style="color: #003366; margin-right: 8px;"></i>
                                                        Trámite Administrativo a Solicitar:
                                                    </td>
                                                    <td style="padding: 12px 15px;">
                                                        <select class="form-control" name="combotramiteRucRef" id="combotramiteRucRef" required style="border-radius: 0px; border: 1px solid #ced4da; width: 80%;">
                                                            <option value="">- Seleccione -</option>  
                                                            <option value="28" selected>SOLICITUD RECONOCIMIENTO DE UNIDADES CRÉDITO (RUC)</option>   
                                                        </select>
                                                    </td>
                                                </tr>
                                                <tr style="border-bottom: 1px solid #f0f0f0;">
                                                    <td style="padding: 12px 15px; font-weight: 500; color: #2c3e50; vertical-align: middle;">
                                                        <i class="fas fa-tag" style="color: #003366; margin-right: 8px;"></i>
                                                        Tipo de Reconocimiento:
                                                    </td>
                                                    <td style="padding: 12px 15px;">
                                                        <select class="form-control" name="comboreconocimiento" id="comboreconocimiento" required style="border-radius: 0px; border: 1px solid #ced4da; width: 80%;">
                                                            <option value="">- Seleccione -</option>                                       
                                                            <?php foreach($reconocimiento as $reconocimiento_item): ?>
                                                                <option value="<?php echo $reconocimiento_item->id; ?>"><?php echo $reconocimiento_item->nombre; ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </td>
                                                </tr>
                                                <tr style="border-bottom: 1px solid #f0f0f0;">
                                                    <td style="padding: 12px 15px; font-weight: 500; color: #2c3e50; vertical-align: middle;">
                                                        <i class="fas fa-graduation-cap" style="color: #003366; margin-right: 8px;"></i>
                                                        Programa que Cursa:
                                                    </td>
                                                    <td style="padding: 12px 15px;">
                                                        <div class="input-group">
                                                            <select class="form-control" name="comboprogramaActual" id="comboprogramaActual" required style="border-radius: 0px; border: 1px solid #ced4da; width: 80%;">
                                                                <option value="">- Seleccione -</option>                                       
                                                                <?php foreach($programa as $programa_item): ?>
                                                                    <option value="<?php echo $programa_item->id; ?>"><?php echo $programa_item->nombre; ?></option>
                                                                <?php endforeach; ?>
                                                            </select>
                                                            <div class="input-group-append">
                                                                <button class="btn btn-info" type="button" id="btnVerPensum" onclick="verPensumCursa()" disabled style="border-radius: 10px;">
                                                                    <i class="fas fa-eye"></i> Ver Pensum
                                                                </button>
                                                            </div>
                                                        </div>
                                                        <small class="text-muted" style="font-size: 0.7rem;">
                                                            <i class="fas fa-info-circle" style="color: #003366;"></i> Seleccione su programa actual para ver las unidades curriculares
                                                        </small>
                                                    </td>
                                                </tr>
                                                <tr style="border-bottom: 1px solid #f0f0f0;">
                                                    <td style="padding: 12px 15px; font-weight: 500; color: #2c3e50; vertical-align: middle;">
                                                        <i class="fas fa-history" style="color: #003366; margin-right: 8px;"></i>
                                                        Programa Cursado:
                                                    </td>
                                                    <td style="padding: 12px 15px;">
                                                        <div class="input-group" id="divProgramaCursado" style="display:none;">
                                                            <select class="form-control" name="comboprogramaRucRe" id="comboprogramaRucRe" style="border-radius: 0px; border: 1px solid #ced4da; width: 80%;">
                                                                <option value="">- Seleccione -</option>                                       
                                                                <?php foreach($programa as $programa_item): ?>
                                                                    <option value="<?php echo $programa_item->id; ?>"><?php echo $programa_item->nombre; ?></option>
                                                                <?php endforeach; ?>
                                                            </select>
                                                            <div class="input-group-append">
                                                                <button class="btn btn-success" type="button" id="btnVerPensumCursado" onclick="verPensumCursado()" disabled style="border-radius: 10px;">
                                                                    <i class="fas fa-eye"></i> Ver Pensum
                                                                </button>
                                                            </div>
                                                        </div>
                                                        <small class="text-muted" style="font-size: 0.7rem;">
                                                            <i class="fas fa-info-circle" style="color: #003366;"></i> Seleccione el programa cursado para ver las unidades curriculares
                                                        </small>
                                                    </td>
                                                </tr>
                                                
                                                <!-- Resumen de programas -->
                                                <tr>
                                                    <td colspan="2" style="padding: 0;">
                                                        <div id="resumenProgramaCursa" style="margin-top: 10px;"></div>
                                                        <div id="resumenProgramaCursado" style="margin-top: 10px;"></div>
                                                    </td>
                                                </tr>
                                                
                                                <tr style="border-bottom: 1px solid #f0f0f0;">
                                                    <td style="padding: 12px 15px; font-weight: 500; color: #2c3e50; vertical-align: middle;">
                                                        <i class="fas fa-university" style="color: #003366; margin-right: 8px;"></i>
                                                        Institución de Origen:
                                                    </td>
                                                    <td style="padding: 12px 15px;">
                                                        <input type="text" id="institucion" name="institucion" onkeyup="javascript:this.value=this.value.toUpperCase();" value="" class="form-control" required style="border-radius: 0px; border: 1px solid #ced4da; width: 80%;" />
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="padding: 12px 15px; font-weight: 500; color: #2c3e50; vertical-align: middle;">
                                                        <i class="fas fa-paperclip" style="color: #003366; margin-right: 8px;"></i>
                                                        Adjuntar Carta de Solicitud:
                                                    </td>
                                                    <td style="padding: 12px 15px;">
                                                        <div class="custom-file" style="width: 80%;">
                                                            <input type="file" id="solicitud" name="solicitud" class="custom-file-input" required style="border-radius: 0px;">
                                                            <label class="custom-file-label" for="solicitud" style="border-radius: 0px; border: 1px solid #ced4da; overflow: hidden;">Seleccionar archivo</label>
                                                        </div>
                                                        <small style="font-size: 0.7rem; color: #6c757d; display: block; margin-top: 5px;">
                                                            <i class="fas fa-info-circle mr-1"></i> Formatos: PDF | Máx: 1 MB
                                                        </small>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>

                                    <!-- Documentos ENFMP -->
                                    <div class="card card-secondary card-outline" style="border-radius: 8px; border-left: 4px solid #6c757d; border-top: none; margin-top: 15px; display:none;" id="documentos_enfmp">
                                        <div class="card-header" style="background: #f8f9fa; border-bottom: 1px solid #e8e8e8; padding: 10px 18px; border-radius: 8px 8px 0 0;">
                                            <h6 class="mb-0" style="font-weight: 600; color: #2c3e50;">
                                                <i class="fas fa-file-pdf text-secondary mr-2"></i>
                                                Adjuntar Títulos de programa de postgrado - ENFMP
                                            </h6>
                                        </div>
                                        <div class="card-body p-3">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="custom-file">
                                                        <input type="file" id="titulos[]" name="titulos[]" class="custom-file-input" multiple style="border-radius: 0px;">
                                                        <label class="custom-file-label" for="titulos[]" style="border-radius: 0px; border: 1px solid #ced4da; overflow: hidden;">Seleccionar archivos (máx. 10)</label>
                                                    </div>
                                                    <small style="font-size: 0.7rem; color: #6c757d; display: block; margin-top: 5px;">
                                                        <i class="fas fa-info-circle mr-1"></i> Formatos: PDF, JPG, JPEG, PNG | Máx: 1 MB por archivo | Máx. 10 documentos
                                                    </small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Documentos Externos -->
                                    <div class="card card-secondary card-outline" style="border-radius: 8px; border-left: 4px solid #6c757d; border-top: none; margin-top: 15px; display:none;" id="documentos_externos">
                                        <div class="card-header" style="background: #f8f9fa; border-bottom: 1px solid #e8e8e8; padding: 10px 18px; border-radius: 8px 8px 0 0;">
                                            <h6 class="mb-0" style="font-weight: 600; color: #2c3e50;">
                                                <i class="fas fa-file-alt text-secondary mr-2"></i>
                                                Adjuntar Documentos de Otras Instituciones
                                            </h6>
                                        </div>
                                        <div class="card-body p-3">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="custom-file">
                                                        <input type="file" id="programas[]" name="programas[]" class="custom-file-input" multiple style="border-radius: 0px;">
                                                        <label class="custom-file-label" for="programas[]" style="border-radius: 0px; border: 1px solid #ced4da; overflow: hidden;">Seleccionar archivos (máx. 10)</label>
                                                    </div>
                                                    <small style="font-size: 0.7rem; color: #6c757d; display: block; margin-top: 5px;">
                                                        <i class="fas fa-info-circle mr-1"></i> Formatos: PDF, JPG, JPEG, PNG | Máx: 1 MB por archivo | Máx. 10 documentos
                                                    </small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Documentos Laborales -->
                                    <div class="card card-secondary card-outline" style="border-radius: 8px; border-left: 4px solid #6c757d; border-top: none; margin-top: 15px; display:none;" id="documentos_laboral">
                                        <div class="card-header" style="background: #f8f9fa; border-bottom: 1px solid #e8e8e8; padding: 10px 18px; border-radius: 8px 8px 0 0;">
                                            <h6 class="mb-0" style="font-weight: 600; color: #2c3e50;">
                                                <i class="fas fa-briefcase text-secondary mr-2"></i>
                                                Adjuntar Documentos de Experiencia Laboral
                                            </h6>
                                        </div>
                                        <div class="card-body p-3">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="custom-file">
                                                        <input type="file" id="laboral[]" name="laboral[]" class="custom-file-input" multiple style="border-radius: 0px;">
                                                        <label class="custom-file-label" for="laboral[]" style="border-radius: 0px; border: 1px solid #ced4da; overflow: hidden;">Seleccionar archivos (máx. 10)</label>
                                                    </div>
                                                    <small style="font-size: 0.7rem; color: #6c757d; display: block; margin-top: 5px;">
                                                        <i class="fas fa-info-circle mr-1"></i> Formatos: PDF, JPG, JPEG, PNG | Máx: 1 MB por archivo | Máx. 10 documentos
                                                    </small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Botón de Envío -->
                                    <div class="row mt-4">
                                        <div class="col-md-12 text-center">
                                            <button type="submit" class="btn btn-primary" style="border-radius: 10px; padding: 10px 40px; font-weight: 500; transition: all 0.3s;">
                                                <i class="fas fa-save mr-2"></i>
                                                Registrar Trámite
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

        <!-- Tabla de Solicitudes -->
        <div class="card card-primary card-outline shadow-sm" style="border-radius: 10px; border-top: 4px solid #003366; margin-top: 20px;">
            <div class="card-body p-0">
                <div class="card" style="border: none; border-radius: 10px;">
                    
                    <!-- Header -->
                    <div class="card-header py-3" style="border-bottom: 1px solid #e8e8e8; border-radius: 10px 10px 0 0; background: #fafafa;">
                        <div class="d-flex align-items-center justify-content-between flex-wrap">
                            <div class="d-flex align-items-center">
                                <div class="mr-3" style="width: 42px; height: 42px; background: #ffc107; border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                                    <i class="fas fa-list text-white" style="font-size: 1.1rem;"></i>
                                </div>
                                <div>
                                    <h5 class="mb-0" style="font-weight: 600; color: #2c3e50;">
                                        <strong>Solicitudes Realizadas de RUC</strong>
                                    </h5>
                                    <small class="text-muted" style="font-size: 0.75rem;">
                                        <i class="fas fa-clock mr-1"></i>
                                        Historial de solicitudes
                                    </small>
                                </div>
                            </div>
                            <div>
                                <span class="badge" style="font-size: 0.8rem; padding: 5px 16px; border-radius: 20px; font-weight: 500; background: #17a2b8; color: white;">
                                    <i class="fas fa-history mr-1"></i>
                                    Historial
                                </span>
                            </div>
                        </div>
                    </div>

                    <!-- Body -->
                    <div class="card-body p-4">
                        <div class="table-responsive">
                            <table id="example" class="table table-hover" style="border-radius: 8px; overflow: hidden; width: 100%;">
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
                                    <?php if(!empty($solicitudes)): ?>
                                        <?php foreach($solicitudes as $solicitud): ?>
                                        <tr style="border-bottom: 1px solid #f0f0f0;">
                                            <td style="padding: 10px 15px; font-size: 0.85rem; color: #2c3e50;">
                                                <strong><?php echo $solicitud->tramite; ?></strong>
                                            </td>
                                            <td style="padding: 10px 15px; font-size: 0.85rem; color: #2c3e50;">
                                                <?php echo $solicitud->programa; ?>
                                            </td>
                                            <td style="padding: 10px 15px; font-size: 0.85rem; color: #2c3e50;">
                                                <?php echo $solicitud->fecha_solicitud; ?>
                                            </td>
                                            <td style="padding: 10px 15px; font-size: 0.8rem;">
                                                <?php if($solicitud->reg_pago == 0): ?>
                                                    <img width="25px" height="25px" src="<?php echo base_url(); ?>/assets/img/button_gray.png" title="Pago Pendiente">
                                                    <?php echo "Pago Pendiente"; 
                                                else: ?>
                                                    <img width="25px" height="25px" src="<?php echo base_url(); ?>/assets/img/button_green.png" title="Pago Registrado">
                                                    <?php echo "Pago Registrado"; 
                                                    echo "<br>";
                                                    if($solicitud->reg_pago == 1 && $solicitud->conciliado == 1 ): ?>
                                                        <img width="25px" height="25px" src="<?php echo base_url(); ?>/assets/img/button_green.png" title="Aprobado">
                                                        <?php echo "Aprobado por Administración ENFMP";  
                                                    else: ?>
                                                        <br>
                                                        <?php if($solicitud->reg_pago == 1 && $solicitud->conciliado == 2): ?>
                                                            <img width="25px" height="25px" src="<?php echo base_url(); ?>/assets/img/button_red.jpeg" title="Rechazado">
                                                            <?php echo "Rechazado por Administración ENFMP";  
                                                        else: ?>
                                                            <img width="25px" height="25px" src="<?php echo base_url(); ?>/assets/img/button_gray.png" title="Pendiente">
                                                            <?php echo "Pendiente por Aprobar Administración ENFMP";  
                                                        endif; 
                                                    endif; 
                                                        if($solicitud->reg_pago == 1 && $solicitud->conciliado == 1 && $solicitud->rev_academica == 1 && $solicitud->academico == 1 ): ?>
                                                            <img width="25px" height="25px" src="<?php echo base_url(); ?>/assets/img/button_green.png" title="Aprobado">
                                                            <?php echo "Aprobado por Secretaría General ENFMP";  
                                                         else: ?>
                                                            <br>
                                                            <?php if($solicitud->rev_academica == 2 && $solicitud->academico == 2): ?>
                                                                <img width="25px" height="25px" src="<?php echo base_url(); ?>/assets/img/button_red.jpeg" title="Rechazado">
                                                                <?php echo "Rechazado por Secretaría General ENFMP";  
                                                            else: ?>
                                                                <img width="25px" height="25px" src="<?php echo base_url(); ?>/assets/img/button_gray.png" title="Pendiente">
                                                                <?php echo "Pendiente por Revisión  Secretaría General ENFMP";  
                                                            endif; 
                                                        endif;                                                     
                                                endif; ?>
                                            </td>
                                            <td style="padding: 10px 15px; text-align: center; vertical-align: middle;">
                                                <div class="d-flex flex-column align-items-center" style="gap: 8px;">
                                                    <?php if($solicitud->reg_pago == 0 && $this->session->userdata("ruc") == 1): ?>
                                                        <a href="<?php echo base_url(); ?>dashboard09/registro_pago/<?php echo $solicitud->id_solicitud . '/' . $solicitud->id_tipo_tramite; ?>" 
                                                        class="btn btn-success btn-sm btn-accion" 
                                                        style="border-radius: 6px; padding: 6px 14px; font-size: 0.75rem; font-weight: 600; border: none; box-shadow: 0 2px 8px rgba(40, 167, 69, 0.3); transition: all 0.25s ease; width: 100%; display: inline-flex; align-items: center; justify-content: center;">
                                                            <i class="fas fa-money-bill-wave mr-2"></i> Pagar
                                                        </a>
                                                    <?php elseif($solicitud->reg_pago == 0 && ($this->session->userdata("ruc") == 0)): ?>
                                                        <span style="background: #dc3545; color: white; border-radius: 6px; padding: 6px 14px; font-size: 0.75rem; font-weight: 600; width: 100%; display: inline-flex; align-items: center; justify-content: center; box-shadow: 0 2px 8px rgba(220, 53, 69, 0.3);">
                                                            <i class="fas fa-times-circle mr-2"></i> TIEMPO CERRADO
                                                        </span>
                                                    <?php endif; ?>
                                                    
                                                    <?php if($solicitud->rev_academica == 0): ?>
                                                        <a href="<?php echo base_url(); ?>dashboard09/solicitud_ruc_requisitos_edit/<?php echo $solicitud->id_solicitud; ?>" 
                                                        class="btn btn-info btn-sm btn-accion" 
                                                        style="border-radius: 6px; padding: 6px 14px; font-size: 0.75rem; font-weight: 600; border: none; box-shadow: 0 2px 8px rgba(23, 162, 184, 0.3); transition: all 0.25s ease; width: 100%; display: inline-flex; align-items: center; justify-content: center;">
                                                            <i class="fas fa-eye mr-2"></i> Ver Docs
                                                        </a>
                                                    <?php endif; ?>
                                                    
                                                    <?php if($solicitud->reg_pago == 1 && $solicitud->rev_academica == 1): ?>
                                                        <a href="<?php echo base_url(); ?>dashboard09/planilla/<?php echo $solicitud->id_usuario . '/' . $solicitud->id_solicitud; ?>" 
                                                        class="btn btn-secondary btn-sm btn-accion" 
                                                        style="border-radius: 6px; padding: 6px 14px; font-size: 0.75rem; font-weight: 600; border: none; box-shadow: 0 2px 8px rgba(108, 117, 125, 0.3); transition: all 0.25s ease; width: 100%; display: inline-flex; align-items: center; justify-content: center;">
                                                            <i class="fas fa-print mr-2"></i> Planilla
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
                                            Total de solicitudes: <strong><?php echo isset($solicitudes) ? count($solicitudes) : 0; ?></strong>
                                        </th>
                                    </tr>
                                </tfoot>
                            </table>
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

<!-- ============================================ -->
<!-- INCLUIR PRIMERO LAS LIBRERÍAS -->
<!-- ============================================ -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<!-- ============================================ -->
<!-- MODALES PARA LA SOLICITUD RUC -->
<!-- ============================================ -->

<!-- MODAL PARA PROGRAMA QUE CURSA -->
<div class="modal fade" id="modalUnidadesCurricularesCursa" tabindex="-1" role="dialog" aria-labelledby="modalUnidadesLabelCursa" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background: #003366; color: white; border-radius: 8px 8px 0 0;">
                <h5 class="modal-title" id="modalUnidadesLabelCursa">
                    <i class="fas fa-book-open"></i> Unidades Curriculares
                </h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="loadingUnidadesCursa" class="text-center" style="display:none;">
                    <i class="fas fa-spinner fa-spin fa-3x"></i>
                    <p class="mt-2">Cargando unidades curriculares...</p>
                </div>
                <div id="contenidoUnidadesCursa" style="display:none;">
                    <div class="alert alert-info">
                        <i class="fas fa-info-circle"></i> 
                        <strong>Instrucciones:</strong> Seleccione las unidades curriculares que desea que le sean reconocidas.
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover">
                            <thead style="background: #e8f0fe;">
                                <tr>
                                    <th width="5%"><input type="checkbox" id="seleccionarTodasCheckCursa" title="Seleccionar todas"></th>
                                    <th width="8%">Código</th>
                                    <th width="32%">Unidad Curricular</th>
                                    <th width="8%" class="text-center">Horas</th>
                                    <th width="10%">Trimestre</th>
                                    <th width="12%">Eje Curricular</th>
                                    <th width="8%" class="text-center">UC</th>
                                </tr>
                            </thead>
                            <tbody id="tbodyUnidadesCursa"></tbody>
                            <tfoot style="background: #e8f0fe;">
                                <tr>
                                    <td colspan="5"><strong>Total Unidades Seleccionadas:</strong></td>
                                    <td class="text-center"><strong id="totalUnidadesSeleccionadasCursa">0</strong></td>
                                    <td class="text-center"><strong id="totalUcSeleccionadasCursa">0</strong></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
                <div id="sinUnidadesCursa" class="alert alert-warning text-center" style="display:none;">
                    <i class="fas fa-exclamation-triangle fa-2x"></i>
                    <p>No se encontraron unidades curriculares para este programa.</p>
                </div>
                <div id="errorUnidadesCursa" class="alert alert-danger text-center" style="display:none;">
                    <i class="fas fa-exclamation-circle fa-2x"></i>
                    <p id="errorMensajeCursa"></p>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" style="border-radius: 0px;">
                    <i class="fas fa-times"></i> Cancelar
                </button>
                <button type="button" class="btn btn-warning" onclick="deseleccionarTodasCursa()" style="border-radius: 0px;">
                    <i class="fas fa-times-circle"></i> Deseleccionar Todas
                </button>
                <button type="button" class="btn btn-primary" onclick="seleccionarTodasCursa()" style="border-radius: 0px;">
                    <i class="fas fa-check-double"></i> Seleccionar Todas
                </button>
                <button type="button" class="btn btn-success" onclick="guardarSeleccionUnidadesCursa()" style="border-radius: 0px;">
                    <i class="fas fa-save"></i> Guardar Selección
                </button>
            </div>
        </div>
    </div>
</div>

<!-- MODAL DE CONFIRMACIÓN PARA PROGRAMA QUE CURSA -->
<div class="modal fade" id="modalConfirmarGuardadoCursa" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background: #003366; color: white;">
                <h5 class="modal-title">
                    <i class="fas fa-check-circle"></i> Confirmar Selección - Programa que Cursa
                </h5>
                <button type="button" class="close text-white" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body" id="contenidoConfirmacionCursa"></div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" style="border-radius: 0px;">Cancelar</button>
                <button type="button" class="btn btn-success" onclick="confirmarGuardadoUnidadesCursa()" style="border-radius: 0px;">Confirmar</button>
            </div>
        </div>
    </div>
</div>

<!-- MODAL PARA PROGRAMA CURSADO -->
<div class="modal fade" id="modalUnidadesCurricularesCursado" tabindex="-1" role="dialog" aria-labelledby="modalUnidadesLabelCursado" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background: #28a745; color: white; border-radius: 8px 8px 0 0;">
                <h5 class="modal-title" id="modalUnidadesLabelCursado">
                    <i class="fas fa-book-open"></i> Unidades Curriculares del Programa Cursado
                </h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="loadingUnidadesCursado" class="text-center" style="display:none;">
                    <i class="fas fa-spinner fa-spin fa-3x"></i>
                    <p class="mt-2">Cargando unidades curriculares...</p>
                </div>
                <div id="contenidoUnidadesCursado" style="display:none;">
                    <div class="alert alert-info">
                        <i class="fas fa-info-circle"></i> 
                        <strong>Instrucciones:</strong> Seleccione las unidades curriculares que cursó y desea que le sean reconocidas.
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover">
                            <thead style="background: #e8f5e9;">
                                <tr>
                                    <th width="5%"><input type="checkbox" id="seleccionarTodasCheckCursado" title="Seleccionar todas"></th>
                                    <th width="8%">Código</th>
                                    <th width="32%">Unidad Curricular</th>
                                    <th width="8%" class="text-center">Horas</th>
                                    <th width="10%">Trimestre</th>
                                    <th width="12%">Eje Curricular</th>
                                    <th width="8%" class="text-center">UC</th>
                                </tr>
                            </thead>
                            <tbody id="tbodyUnidadesCursado"></tbody>
                            <tfoot style="background: #e8f5e9;">
                                <tr>
                                    <td colspan="5"><strong>Total Unidades Seleccionadas:</strong></td>
                                    <td class="text-center"><strong id="totalUnidadesSeleccionadasCursado">0</strong></td>
                                    <td class="text-center"><strong id="totalUcSeleccionadasCursado">0</strong></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
                <div id="sinUnidadesCursado" class="alert alert-warning text-center" style="display:none;">
                    <i class="fas fa-exclamation-triangle fa-2x"></i>
                    <p>No se encontraron unidades curriculares para este programa.</p>
                </div>
                <div id="errorUnidadesCursado" class="alert alert-danger text-center" style="display:none;">
                    <i class="fas fa-exclamation-circle fa-2x"></i>
                    <p id="errorMensajeCursado"></p>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" style="border-radius: 0px;">
                    <i class="fas fa-times"></i> Cancelar
                </button>
                <button type="button" class="btn btn-warning" onclick="deseleccionarTodasCursado()" style="border-radius: 0px;">
                    <i class="fas fa-times-circle"></i> Deseleccionar Todas
                </button>
                <button type="button" class="btn btn-primary" onclick="seleccionarTodasCursado()" style="border-radius: 0px;">
                    <i class="fas fa-check-double"></i> Seleccionar Todas
                </button>
                <button type="button" class="btn btn-success" onclick="guardarSeleccionUnidadesCursado()" style="border-radius: 0px;">
                    <i class="fas fa-save"></i> Guardar Selección
                </button>
            </div>
        </div>
    </div>
</div>

<!-- MODAL DE CONFIRMACIÓN PARA PROGRAMA CURSADO -->
<div class="modal fade" id="modalConfirmarGuardadoCursado" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background: #28a745; color: white;">
                <h5 class="modal-title">
                    <i class="fas fa-check-circle"></i> Confirmar Selección - Programa Cursado
                </h5>
                <button type="button" class="close text-white" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body" id="contenidoConfirmacionCursado"></div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" style="border-radius: 0px;">Cancelar</button>
                <button type="button" class="btn btn-success" onclick="confirmarGuardadoUnidadesCursado()" style="border-radius: 0px;">Confirmar</button>
            </div>
        </div>
    </div>
</div>

<!-- ============================================ -->
<!-- JAVASCRIPT COMPLETO - CORREGIDO -->
<!-- ============================================ -->
<script type="text/javascript">
// ==================== VARIABLES GLOBALES ====================
var programaCursaSeleccionadoId = '';
var programaCursaSeleccionadoNombre = '';
var unidadesCurricularesCursaData = [];
var unidadesSeleccionadasCursaList = [];

var programaCursadoSeleccionadoId = '';
var programaCursadoSeleccionadoNombre = '';
var unidadesCurricularesCursadoData = [];
var unidadesSeleccionadasCursadoList = [];

// ==================== FUNCIÓN DOCUMENTOS ====================
function documentos(reconocimiento) {
    console.log("Tipo de reconocimiento seleccionado:", reconocimiento);
    
    var tablaEnfmp = document.getElementById('documentos_enfmp');
    var tablaExternos = document.getElementById('documentos_externos');
    var tabaLaboral = document.getElementById('documentos_laboral');
    var divProgramaCursado = document.getElementById('divProgramaCursado');
    var comboprogramaRucRe = document.getElementById('comboprogramaRucRe');
    var institucionInput = document.getElementById('institucion');
    
    // Ocultar todo
    if(tablaEnfmp) tablaEnfmp.style.display = 'none';
    if(tablaExternos) tablaExternos.style.display = 'none';
    if(tabaLaboral) tabaLaboral.style.display = 'none';
    if(divProgramaCursado) divProgramaCursado.style.display = 'none';
    if(comboprogramaRucRe) comboprogramaRucRe.required = false;
    
    // Si es reconocimiento tipo 1 (ENFMP)
    if(reconocimiento === '1') {
        if(tablaEnfmp) tablaEnfmp.style.display = 'block';
        if(divProgramaCursado){ 
            divProgramaCursado.style.display = 'block';
            comboprogramaRucRe.required = true;
        }
        if(institucionInput) {
            institucionInput.value = 'ESCUELA NACIONAL DE FISCALES (ENFMP)';
            institucionInput.readOnly = true;
            institucionInput.style.backgroundColor = '#e9ecef';
            institucionInput.required = false;
        }
    } else {
        if(institucionInput) {
            institucionInput.value = '';
            institucionInput.readOnly = false;
            institucionInput.style.backgroundColor = '';
            institucionInput.required = true;
        }
        if(reconocimiento === '2') {
            if(tablaExternos) tablaExternos.style.display = 'block';
        } else if(reconocimiento === '3' || reconocimiento === '4') {
            if(tabaLaboral) tabaLaboral.style.display = 'block';
        }
    }
}

// ==================== FUNCIONES PROGRAMA QUE CURSA ====================
function verPensumCursa() {
    if(!programaCursaSeleccionadoId) {
        alert('Por favor, seleccione un programa actual primero.');
        return;
    }
    
    $('#modalUnidadesCurricularesCursa').modal('show');
    $('#loadingUnidadesCursa').show();
    $('#contenidoUnidadesCursa').hide();
    $('#sinUnidadesCursa').hide();
    $('#errorUnidadesCursa').hide();
    $('#tbodyUnidadesCursa').empty();
    $('#totalUcSeleccionadasCursa').text('0');
    $('#totalUnidadesSeleccionadasCursa').text('0');
    $('#seleccionarTodasCheckCursa').prop('checked', false);
    
    $('#modalUnidadesLabelCursa').html('<i class="fas fa-book-open"></i> Unidades Curriculares - ' + programaCursaSeleccionadoNombre);
    
    var url = '<?php echo base_url(); ?>dashboard09/programa_pensun_seleccionado/' + programaCursaSeleccionadoId;
    
    $.ajax({
        url: url,
        type: 'GET',
        dataType: 'json',
        success: function(response) {
            $('#loadingUnidadesCursa').hide();
            if(response && response.length > 0) {
                unidadesCurricularesCursaData = response;
                cargarTablaUnidadesCursa(response);
                $('#contenidoUnidadesCursa').show();
            } else {
                $('#sinUnidadesCursa').show();
            }
        },
        error: function(xhr, status, error) {
            $('#loadingUnidadesCursa').hide();
            $('#errorMensajeCursa').text('Error al cargar las unidades: ' + error);
            $('#errorUnidadesCursa').show();
        }
    });
}

function cargarTablaUnidadesCursa(unidades) {
    var html = '';
    $.each(unidades, function(index, item) {
        var uc = parseFloat(item.unidad_curricular) || 0;
        html += '<tr id="fila_cursa_' + index + '">';
        html += '<td class="text-center">';
        html += '<input type="checkbox" class="chk-unidad-cursa" data-id="' + item.id_pensum + '" data-codigo="' + escapeHtml(item.codigo || 'N/A') + '" data-nombre="' + escapeHtml(item.nombre || 'N/A') + '" data-uc="' + uc + '" data-horas="' + (item.horas || 0) + '" data-trimestre="' + escapeHtml(item.des_trimestre || 'N/A') + '" data-eje="' + escapeHtml(item.des_eje || 'N/A') + '">';
        html += '</td>';
        html += '<td>' + escapeHtml(item.codigo || 'N/A') + '</td>';
        html += '<td>' + escapeHtml(item.nombre || 'N/A') + '</td>';
        html += '<td class="text-center">' + (item.horas || 0) + '</td>';
        html += '<td>' + escapeHtml(item.des_trimestre || 'N/A') + '</td>';
        html += '<td>' + escapeHtml(item.des_eje || 'N/A') + '</td>';
        html += '<td class="text-center">' + uc + '</td>';
        html += '</tr>';
    });
    $('#tbodyUnidadesCursa').html(html);
    $('.chk-unidad-cursa').on('change', function() { actualizarTotalesCursa(); });
}

function actualizarTotalesCursa() {
    var totalUc = 0;
    var totalUnidades = 0;
    $('.chk-unidad-cursa:checked').each(function() {
        totalUc += parseFloat($(this).data('uc')) || 0;
        totalUnidades++;
    });
    $('#totalUcSeleccionadasCursa').text(totalUc.toFixed(2));
    $('#totalUnidadesSeleccionadasCursa').text(totalUnidades);
}

function seleccionarTodasCursa() {
    $('.chk-unidad-cursa').prop('checked', true);
    $('#seleccionarTodasCheckCursa').prop('checked', true);
    actualizarTotalesCursa();
}

function deseleccionarTodasCursa() {
    $('.chk-unidad-cursa').prop('checked', false);
    $('#seleccionarTodasCheckCursa').prop('checked', false);
    actualizarTotalesCursa();
}

function guardarSeleccionUnidadesCursa() {
    var seleccionadas = [];
    $('.chk-unidad-cursa:checked').each(function() {
        seleccionadas.push({
            id: $(this).data('id'),
            codigo: $(this).data('codigo'),
            nombre: $(this).data('nombre'),
            uc: $(this).data('uc'),
            horas: $(this).data('horas'),
            trimestre: $(this).data('trimestre'),
            eje: $(this).data('eje')
        });
    });
    
    if(seleccionadas.length === 0) {
        alert('Debe seleccionar al menos una unidad curricular.');
        return;
    }
    
    unidadesSeleccionadasCursaList = seleccionadas;
    
    var totalUc = 0;
    var html = '<div class="alert alert-info"><i class="fas fa-info-circle"></i> <strong>Resumen del Programa que Cursa:</strong></div>';
    html += '<div class="table-responsive"><table class="table table-sm table-bordered">';
    html += '<thead><tr><th>Código</th><th>Unidad Curricular</th><th class="text-center">UC</th></tr></thead><tbody>';
    
    $.each(seleccionadas, function(i, uc) {
        html += '<tr>';
        html += '<td>' + escapeHtml(uc.codigo) + '</td>';
        html += '<td>' + escapeHtml(uc.nombre) + '</td>';
        html += '<td class="text-center">' + uc.uc + '</td>';
        html += '</tr>';
        totalUc += parseFloat(uc.uc);
    });
    
    html += '<tr class="table-info"><td colspan="2"><strong>Total UC:</strong></td>';
    html += '<td class="text-center"><strong>' + totalUc.toFixed(2) + '</strong></td></tr>';
    html += '</tbody></table></div>';
    html += '<div class="mt-2"><button type="button" class="btn btn-danger btn-sm" onclick="limpiarSeleccionCursa()"><i class="fas fa-trash"></i> Limpiar Selección</button></div>';
    
    $('#contenidoConfirmacionCursa').html(html);
    $('#modalConfirmarGuardadoCursa').modal('show');
}

function confirmarGuardadoUnidadesCursa() {
    $('#modalConfirmarGuardadoCursa').modal('hide');
    $('#modalUnidadesCurricularesCursa').modal('hide');
    
    $('input[name="unidades_cursa_seleccionadas_json"]').remove();
    $('input[name="total_unidades_cursa"]').remove();
    $('input[name="total_uc_cursa"]').remove();
    
    var totalUc = 0;
    $.each(unidadesSeleccionadasCursaList, function(i, uc) {
        totalUc += parseFloat(uc.uc);
    });
    
    $('<input>').attr({type: 'hidden', name: 'unidades_cursa_seleccionadas_json', value: JSON.stringify(unidadesSeleccionadasCursaList)}).appendTo('#formRuc');
    $('<input>').attr({type: 'hidden', name: 'total_unidades_cursa', value: unidadesSeleccionadasCursaList.length}).appendTo('#formRuc');
    $('<input>').attr({type: 'hidden', name: 'total_uc_cursa', value: totalUc.toFixed(2)}).appendTo('#formRuc');
    
    mostrarResumenPaginaCursa();
    alert('Programa que Cursa: ' + unidadesSeleccionadasCursaList.length + ' unidades seleccionadas.\nTotal UC: ' + totalUc.toFixed(2));
}

function mostrarResumenPaginaCursa() {
    var totalUc = 0;
    var html = '<div class="card card-info mt-3" id="resumenUnidadesCursa" style="border-radius: 8px; border-left: 4px solid #003366;">';
    html += '<div class="card-header" style="background: #e8f0fe; border-bottom: 1px solid #e8e8e8; padding: 8px 15px; border-radius: 8px 8px 0 0;">';
    html += '<h4 style="font-weight: 600; color: #003366; margin: 0;"><i class="fas fa-check-circle" style="color: #003366;"></i> Resumen - Programa que Cursa</h4>';
    html += '</div><div class="card-body p-3">';
    html += '<strong>Programa: ' + programaCursaSeleccionadoNombre + '</strong><br>';
    html += '<div class="table-responsive mt-2"><table class="table table-sm table-bordered">';
    html += '<thead><tr><th>Código</th><th>Unidad Curricular</th><th class="text-center">UC</th></tr></thead><tbody>';
    
    $.each(unidadesSeleccionadasCursaList, function(i, uc) {
        html += '<tr>';
        html += '<td>' + escapeHtml(uc.codigo) + '</td>';
        html += '<td>' + escapeHtml(uc.nombre) + '</td>';
        html += '<td class="text-center">' + uc.uc + '</td>';
        html += '</tr>';
        totalUc += parseFloat(uc.uc);
    });
    
    html += '<tr class="table-info"><td colspan="2"><strong>Total UC:</strong></td>';
    html += '<td class="text-center"><strong>' + totalUc.toFixed(2) + '</strong></td>';
    html += '</tbody></table></div>';
    html += '<button type="button" class="btn btn-warning btn-sm mt-2" style="border-radius: 0px;" onclick="editarSeleccionCursa()"><i class="fas fa-edit"></i> Editar Selección</button>';
    html += '<button type="button" class="btn btn-danger btn-sm mt-2 ml-2" style="border-radius: 0px;" onclick="limpiarSeleccionCursa()"><i class="fas fa-trash"></i> Eliminar</button>';
    html += '</div></div>';
    
    $('#resumenProgramaCursa').html(html);
}

function editarSeleccionCursa() {
    if(programaCursaSeleccionadoId && unidadesCurricularesCursaData.length > 0) {
        $('#modalUnidadesCurricularesCursa').modal('show');
        $('#contenidoUnidadesCursa').show();
        setTimeout(function() {
            $('.chk-unidad-cursa').each(function() {
                var codigo = $(this).data('codigo');
                if(unidadesSeleccionadasCursaList.some(function(uc) { return uc.codigo === codigo; })) {
                    $(this).prop('checked', true);
                }
            });
            actualizarTotalesCursa();
        }, 100);
    } else {
        verPensumCursa();
    }
}

function limpiarSeleccionCursa() {
    if(confirm('¿Está seguro de limpiar todas las unidades seleccionadas del programa que cursa?')) {
        unidadesSeleccionadasCursaList = [];
        $('input[name="unidades_cursa_seleccionadas_json"]').remove();
        $('input[name="total_unidades_cursa"]').remove();
        $('input[name="total_uc_cursa"]').remove();
        $('#resumenUnidadesCursa').remove();
        $('#resumenProgramaCursa').html('');
        alert('Selección del programa que cursa limpiada');
    }
}

// ==================== FUNCIONES PROGRAMA CURSADO ====================
function verPensumCursado() {
    if(!programaCursadoSeleccionadoId) {
        alert('Por favor, seleccione un programa cursado primero.');
        return;
    }
    
    $('#modalUnidadesCurricularesCursado').modal('show');
    $('#loadingUnidadesCursado').show();
    $('#contenidoUnidadesCursado').hide();
    $('#sinUnidadesCursado').hide();
    $('#errorUnidadesCursado').hide();
    $('#tbodyUnidadesCursado').empty();
    $('#totalUcSeleccionadasCursado').text('0');
    $('#totalUnidadesSeleccionadasCursado').text('0');
    $('#seleccionarTodasCheckCursado').prop('checked', false);
    
    $('#modalUnidadesLabelCursado').html('<i class="fas fa-book-open"></i> Unidades Curriculares - ' + programaCursadoSeleccionadoNombre);
    
    var url = '<?php echo base_url(); ?>dashboard09/programa_pensun_seleccionado/' + programaCursadoSeleccionadoId;
    
    $.ajax({
        url: url,
        type: 'GET',
        dataType: 'json',
        success: function(response) {
            $('#loadingUnidadesCursado').hide();
            if(response && response.length > 0) {
                unidadesCurricularesCursadoData = response;
                cargarTablaUnidadesCursado(response);
                $('#contenidoUnidadesCursado').show();
            } else {
                $('#sinUnidadesCursado').show();
            }
        },
        error: function(xhr, status, error) {
            $('#loadingUnidadesCursado').hide();
            $('#errorMensajeCursado').text('Error al cargar las unidades: ' + error);
            $('#errorUnidadesCursado').show();
        }
    });
}

function cargarTablaUnidadesCursado(unidades) {
    var html = '';
    $.each(unidades, function(index, item) {
        var uc = parseFloat(item.unidad_curricular) || 0;
        html += '<tr id="fila_cursado_' + index + '">';
        html += '<td class="text-center">';
        html += '<input type="checkbox" class="chk-unidad-cursado" data-id="' + item.id_pensum + '" data-codigo="' + escapeHtml(item.codigo || 'N/A') + '" data-nombre="' + escapeHtml(item.nombre || 'N/A') + '" data-uc="' + uc + '" data-horas="' + (item.horas || 0) + '" data-trimestre="' + escapeHtml(item.des_trimestre || 'N/A') + '" data-eje="' + escapeHtml(item.des_eje || 'N/A') + '">';
        html += '</td>';
        html += '<td>' + escapeHtml(item.codigo || 'N/A') + '</td>';
        html += '<td>' + escapeHtml(item.nombre || 'N/A') + '</td>';
        html += '<td class="text-center">' + (item.horas || 0) + '</td>';
        html += '<td>' + escapeHtml(item.des_trimestre || 'N/A') + '</td>';
        html += '<td>' + escapeHtml(item.des_eje || 'N/A') + '</td>';
        html += '<td class="text-center">' + uc + '</td>';
        html += '</tr>';
    });
    $('#tbodyUnidadesCursado').html(html);
    $('.chk-unidad-cursado').on('change', function() { actualizarTotalesCursado(); });
}

function actualizarTotalesCursado() {
    var totalUc = 0;
    var totalUnidades = 0;
    $('.chk-unidad-cursado:checked').each(function() {
        totalUc += parseFloat($(this).data('uc')) || 0;
        totalUnidades++;
    });
    $('#totalUcSeleccionadasCursado').text(totalUc.toFixed(2));
    $('#totalUnidadesSeleccionadasCursado').text(totalUnidades);
}

function seleccionarTodasCursado() {
    $('.chk-unidad-cursado').prop('checked', true);
    $('#seleccionarTodasCheckCursado').prop('checked', true);
    actualizarTotalesCursado();
}

function deseleccionarTodasCursado() {
    $('.chk-unidad-cursado').prop('checked', false);
    $('#seleccionarTodasCheckCursado').prop('checked', false);
    actualizarTotalesCursado();
}

function guardarSeleccionUnidadesCursado() {
    var seleccionadas = [];
    $('.chk-unidad-cursado:checked').each(function() {
        seleccionadas.push({
            id: $(this).data('id'),
            codigo: $(this).data('codigo'),
            nombre: $(this).data('nombre'),
            uc: $(this).data('uc'),
            horas: $(this).data('horas'),
            trimestre: $(this).data('trimestre'),
            eje: $(this).data('eje')
        });
    });
    
    if(seleccionadas.length === 0) {
        alert('Debe seleccionar al menos una unidad curricular.');
        return;
    }
    
    unidadesSeleccionadasCursadoList = seleccionadas;
    
    var totalUc = 0;
    var html = '<div class="alert alert-info"><i class="fas fa-info-circle"></i> <strong>Resumen del Programa Cursado:</strong></div>';
    html += '<div class="table-responsive"><table class="table table-sm table-bordered">';
    html += '<thead><tr><th>Código</th><th>Unidad Curricular</th><th class="text-center">UC</th></tr></thead><tbody>';
    
    $.each(seleccionadas, function(i, uc) {
        html += '<tr>';
        html += '<td>' + escapeHtml(uc.codigo) + '</td>';
        html += '<td>' + escapeHtml(uc.nombre) + '</td>';
        html += '<td class="text-center">' + uc.uc + '</td>';
        html += '</tr>';
        totalUc += parseFloat(uc.uc);
    });
    
    html += '<tr class="table-info"><td colspan="2"><strong>Total UC:</strong></td>';
    html += '<td class="text-center"><strong>' + totalUc.toFixed(2) + '</strong></td></tr>';
    html += '</tbody></table></div>';
    html += '<div class="mt-2"><button type="button" class="btn btn-danger btn-sm" onclick="limpiarSeleccionCursado()"><i class="fas fa-trash"></i> Limpiar Selección</button></div>';
    
    $('#contenidoConfirmacionCursado').html(html);
    $('#modalConfirmarGuardadoCursado').modal('show');
}

function confirmarGuardadoUnidadesCursado() {
    $('#modalConfirmarGuardadoCursado').modal('hide');
    $('#modalUnidadesCurricularesCursado').modal('hide');
    
    $('input[name="unidades_cursado_seleccionadas_json"]').remove();
    $('input[name="total_unidades_cursado"]').remove();
    $('input[name="total_uc_cursado"]').remove();
    
    var totalUc = 0;
    $.each(unidadesSeleccionadasCursadoList, function(i, uc) {
        totalUc += parseFloat(uc.uc);
    });
    
    $('<input>').attr({type: 'hidden', name: 'unidades_cursado_seleccionadas_json', value: JSON.stringify(unidadesSeleccionadasCursadoList)}).appendTo('#formRuc');
    $('<input>').attr({type: 'hidden', name: 'total_unidades_cursado', value: unidadesSeleccionadasCursadoList.length}).appendTo('#formRuc');
    $('<input>').attr({type: 'hidden', name: 'total_uc_cursado', value: totalUc.toFixed(2)}).appendTo('#formRuc');
    
    mostrarResumenPaginaCursado();
    alert('Programa Cursado: ' + unidadesSeleccionadasCursadoList.length + ' unidades seleccionadas.\nTotal UC: ' + totalUc.toFixed(2));
}

function mostrarResumenPaginaCursado() {
    var totalUc = 0;
    var html = '<div class="card card-success mt-3" id="resumenUnidadesCursado" style="border-radius: 8px; border-left: 4px solid #28a745;">';
    html += '<div class="card-header" style="background: #e8f5e9; border-bottom: 1px solid #e8e8e8; padding: 8px 15px; border-radius: 8px 8px 0 0;">';
    html += '<h4 style="font-weight: 600; color: #1e7e34; margin: 0;"><i class="fas fa-check-circle" style="color: #28a745;"></i> Resumen - Programa Cursado</h4>';
    html += '</div><div class="card-body p-3">';
    html += '<strong>Programa: ' + programaCursadoSeleccionadoNombre + '</strong><br>';
    html += '<div class="table-responsive mt-2"><table class="table table-sm table-bordered">';
    html += '<thead><tr><th>Código</th><th>Unidad Curricular</th><th class="text-center">UC</th></tr></thead><tbody>';
    
    $.each(unidadesSeleccionadasCursadoList, function(i, uc) {
        html += '<tr>';
        html += '<td>' + escapeHtml(uc.codigo) + '</td>';
        html += '<td>' + escapeHtml(uc.nombre) + '</td>';
        html += '<td class="text-center">' + uc.uc + '</td>';
        html += '</tr>';
        totalUc += parseFloat(uc.uc);
    });
    
    html += '<tr class="table-info"><td colspan="2"><strong>Total UC:</strong></td>';
    html += '<td class="text-center"><strong>' + totalUc.toFixed(2) + '</strong></td>';
    html += '</tbody></table></div>';
    html += '<button type="button" class="btn btn-warning btn-sm mt-2" style="border-radius: 0px;" onclick="editarSeleccionCursado()"><i class="fas fa-edit"></i> Editar Selección</button>';
    html += '<button type="button" class="btn btn-danger btn-sm mt-2 ml-2" style="border-radius: 0px;" onclick="limpiarSeleccionCursado()"><i class="fas fa-trash"></i> Eliminar</button>';
    html += '</div></div>';
    
    $('#resumenProgramaCursado').html(html);
}

function editarSeleccionCursado() {
    if(programaCursadoSeleccionadoId && unidadesCurricularesCursadoData.length > 0) {
        $('#modalUnidadesCurricularesCursado').modal('show');
        $('#contenidoUnidadesCursado').show();
        setTimeout(function() {
            $('.chk-unidad-cursado').each(function() {
                var codigo = $(this).data('codigo');
                if(unidadesSeleccionadasCursadoList.some(function(uc) { return uc.codigo === codigo; })) {
                    $(this).prop('checked', true);
                }
            });
            actualizarTotalesCursado();
        }, 100);
    } else {
        verPensumCursado();
    }
}

function limpiarSeleccionCursado() {
    if(confirm('¿Está seguro de limpiar todas las unidades seleccionadas del programa cursado?')) {
        unidadesSeleccionadasCursadoList = [];
        $('input[name="unidades_cursado_seleccionadas_json"]').remove();
        $('input[name="total_unidades_cursado"]').remove();
        $('input[name="total_uc_cursado"]').remove();
        $('#resumenUnidadesCursado').remove();
        $('#resumenProgramaCursado').html('');
        alert('Selección del programa cursado limpiada');
    }
}

// ==================== FUNCIÓN ESCAPE HTML ====================
function escapeHtml(str) {
    if(!str) return '';
    return String(str).replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;').replace(/"/g, '&quot;').replace(/'/g, '&#39;');
}

// ==================== INICIALIZACIÓN ====================
$(document).ready(function() {
    console.log('Document ready - Inicializando scripts RUC');
    
    // 1. Ocultar todas las tablas al inicio
    $('#documentos_enfmp').hide();
    $('#documentos_externos').hide();
    $('#documentos_laboral').hide();
    $('#divProgramaCursado').hide();
    
    // 2. Evento del select de tipo reconocimiento
    $('#comboreconocimiento').on('change', function() {
        var valor = $(this).val();
        console.log('Cambio de reconocimiento a:', valor);
        documentos(valor);
    });
    
    // 3. Evento del select programa que cursa
    function actualizarBotonCursa() {
        var select = $('#comboprogramaActual');
        if(select.val()) {
            $('#btnVerPensum').prop('disabled', false);
            programaCursaSeleccionadoId = select.val();
            programaCursaSeleccionadoNombre = select.find('option:selected').text();
            console.log('Programa cursa seleccionado:', programaCursaSeleccionadoId, programaCursaSeleccionadoNombre);
        } else {
            $('#btnVerPensum').prop('disabled', true);
            programaCursaSeleccionadoId = '';
            programaCursaSeleccionadoNombre = '';
        }
    }
    
    $('#comboprogramaActual').on('change', actualizarBotonCursa);
    actualizarBotonCursa();
    
    // 4. Evento del select programa cursado
    function actualizarBotonCursado() {
        var select = $('#comboprogramaRucRe');
        if(select.val()) {
            $('#btnVerPensumCursado').prop('disabled', false);
            programaCursadoSeleccionadoId = select.val();
            programaCursadoSeleccionadoNombre = select.find('option:selected').text();
            console.log('Programa cursado seleccionado:', programaCursadoSeleccionadoId, programaCursadoSeleccionadoNombre);
        } else {
            $('#btnVerPensumCursado').prop('disabled', true);
            programaCursadoSeleccionadoId = '';
            programaCursadoSeleccionadoNombre = '';
        }
    }
    
    $('#comboprogramaRucRe').on('change', actualizarBotonCursado);
    actualizarBotonCursado();
    
    // 5. Verificar si hay un valor inicial en el select de reconocimiento
    var valorInicial = $('#comboreconocimiento').val();
    if(valorInicial) {
        console.log('Valor inicial de reconocimiento:', valorInicial);
        documentos(valorInicial);
    }
    
    // 6. Selector de todas las unidades - Cursa
    $('#seleccionarTodasCheckCursa').on('change', function() {
        var checked = $(this).prop('checked');
        $('.chk-unidad-cursa').prop('checked', checked);
        actualizarTotalesCursa();
    });
    
    // 7. Selector de todas las unidades - Cursado
    $('#seleccionarTodasCheckCursado').on('change', function() {
        var checked = $(this).prop('checked');
        $('.chk-unidad-cursado').prop('checked', checked);
        actualizarTotalesCursado();
    });
    
    console.log('Inicialización completada');
});
</script>