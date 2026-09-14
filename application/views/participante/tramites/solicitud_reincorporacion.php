<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" style="background: #f4f6f9;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0" style="font-weight: 300; color: #003366;">
                        <i class="fas fa-undo-alt" style="color: #003366; margin-right: 8px;"></i>
                        <span style="color: #003366; font-weight: 600;">SCE-ENFMP</span>
                        <span style="color: #2c3e50; font-weight: 300;"> - Solicitud de Reincorporación</span>
                    </h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right" style="background: transparent;">
                        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>dashboard04/home" style="color: #6c757d;">Inicio</a></li>
                        <li class="breadcrumb-item"><a href="#" style="color: #6c757d;">Trámites</a></li>
                        <li class="breadcrumb-item active" style="color: #003366; font-weight: 600;">Reincorporación</li>
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
                                    <i class="fas fa-undo-alt text-white" style="font-size: 1.1rem;"></i>
                                </div>
                                <div>
                                    <h5 class="mb-0" style="font-weight: 600; color: #2c3e50;">
                                        <strong>Trámites Administrativos</strong>
                                    </h5>
                                    <small class="text-muted" style="font-size: 0.75rem;">
                                        <i class="fas fa-calendar-alt mr-1"></i>
                                        Solicitud de Reincorporación
                                    </small>
                                </div>
                            </div>
                            <div>
                                <span class="badge" style="font-size: 0.8rem; padding: 5px 16px; border-radius: 20px; font-weight: 500; background: #003366; color: white;">
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
                                    Solicitud de Reincorporación
                                </h6>
                            </div>
                            <div class="card-body p-3">
                                <form action="<?php echo base_url(); ?>dashboard09/registrotramiteReincorporacion_store/2" method="POST" enctype="multipart/form-data">
                                    
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
                                                        Programa y/o Especialización a solicitar Reincorporación:
                                                    </td>
                                                    <td style="padding: 12px 15px;">
                                                        <select class="form-control" name="cbo_programa" id="cbo_programa" required style="border-radius: 0px; border: 1px solid #ced4da; width: 80%;">
                                                            <option value="">- Seleccione -</option>                                       
                                                            <?php foreach($programa as $programa): ?>
                                                                <option value="<?php echo $programa->id; ?>"><?php echo $programa->nombre; ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </td>
                                                </tr>
                                                <tr style="border-bottom: 1px solid #f0f0f0;">
                                                    <td style="padding: 12px 15px; font-weight: 500; color: #2c3e50; vertical-align: middle;">
                                                        <i class="fas fa-file-signature" style="color: #003366; margin-right: 8px;"></i>
                                                        Trámite Académico a solicitar:
                                                    </td>
                                                    <td style="padding: 12px 15px;">
                                                        <select class="form-control" name="combotramitef" id="combotramitef" required style="border-radius: 0px; border: 1px solid #ced4da; width: 80%;">
                                                            <option value="">- Seleccione -</option>                                       
                                                            <option value="16">REINCORPORACIÓN</option>  
                                                        </select>
                                                    </td>
                                                </tr>
                                                <tr style="border-bottom: 1px solid #f0f0f0;">
                                                    <td style="padding: 12px 15px; font-weight: 500; color: #2c3e50; vertical-align: middle;">
                                                        <i class="fas fa-calendar" style="color: #003366; margin-right: 8px;"></i>
                                                        Último Año que cursó estudios en la ENFMP:
                                                    </td>
                                                    <td style="padding: 12px 15px;">
                                                        <input type="number" name="ult_anno_cursado" id="ult_anno_cursado" min="2017" max="2026" class="form-control" required style="border-radius: 0px; border: 1px solid #ced4da; width: 40%;" />
                                                    </td>
                                                </tr>
                                                <tr style="border-bottom: 1px solid #f0f0f0;">
                                                    <td style="padding: 12px 15px; font-weight: 500; color: #2c3e50; vertical-align: middle;">
                                                        <i class="fas fa-layer-group" style="color: #003366; margin-right: 8px;"></i>
                                                        Último Trimestre que cursó en la ENFMP:
                                                    </td>
                                                    <td style="padding: 12px 15px;">
                                                        <select class="form-control" name="ult_trimestre_cursado" id="ult_trimestre_cursado" required style="border-radius: 0px; border: 1px solid #ced4da; width: 40%;">
                                                            <option value="">- Seleccione -</option>                                       
                                                            <?php foreach($trimestre as $trimestre): ?>
                                                                <?php if($trimestre->id <= 8): ?>
                                                                    <option value="<?php echo $trimestre->id; ?>"><?php echo $trimestre->nombre; ?></option>
                                                                <?php endif; ?>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>

                                    <!-- Adjuntar Carta -->
                                    <div class="card card-secondary card-outline" style="border-radius: 8px; border-left: 4px solid #6c757d; border-top: none; margin-top: 15px;">
                                        <div class="card-header" style="background: #f8f9fa; border-bottom: 1px solid #e8e8e8; padding: 10px 18px; border-radius: 8px 8px 0 0;">
                                            <h6 class="mb-0" style="font-weight: 600; color: #2c3e50;">
                                                <i class="fas fa-paperclip text-secondary mr-2"></i>
                                                Adjuntar Carta de Solicitud de Reincorporación de Postgrado
                                            </h6>
                                        </div>
                                        <div class="card-body p-3">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="custom-file">
                                                        <input type="file" name="userfile" class="custom-file-input" id="customFile" required style="border-radius: 0px;">
                                                        <label class="custom-file-label" for="customFile" style="border-radius: 0px; border: 1px solid #ced4da; overflow: hidden;">Seleccionar archivo</label>
                                                    </div>
                                                    <small style="font-size: 0.7rem; color: #6c757d; display: block; margin-top: 5px;">
                                                        <i class="fas fa-info-circle mr-1"></i> Formatos: PDF | Máx: 1 MB
                                                    </small>
                                                    <small style="font-size: 0.7rem; color: #6c757d; display: block;">
                                                        <i class="fas fa-exclamation-circle mr-1"></i> El tamaño máximo permitido del archivo es de 1 MB (1024KB).
                                                    </small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Botón de Envío -->
                                    <div class="row mt-3">
                                        <div class="col-md-12 text-center">
                                            <button type="submit" class="btn btn-primary" style="border-radius: 0px; padding: 10px 40px; font-weight: 500; transition: all 0.3s;">
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
                                        <strong>Solicitudes de Reincorporación realizadas</strong>
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
                                            <i class="fas fa-money-bill-wave mr-2"></i>Arancel
                                        </th>
                                        <th style="padding: 10px 15px; font-weight: 500; font-size: 0.8rem; letter-spacing: 0.5px;">
                                            <i class="fas fa-info-circle mr-2"></i>Estado Solicitud
                                        </th>
                                        <th style="padding: 10px 15px; text-align: center; font-weight: 500; font-size: 0.8rem; letter-spacing: 0.5px;">
                                            <i class="fas fa-cogs mr-2"></i>Opciones
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if(!empty($solicitudes)): ?>
                                        <?php foreach($solicitudes as $solicitudes): ?>
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
                                            <td style="padding: 10px 15px; font-size: 0.85rem; font-weight: 600; color: #28a745;">
                                                <?php 
                                                    if ($solicitudes->monto_apagar == '')
                                                        echo $solicitudes->monto_gen . ' Ref.';
                                                    else 
                                                        echo $solicitudes->monto_apagar . ' Ref.';
                                                ?>
                                            </td>
                                            <td style="padding: 10px 15px; font-size: 0.8rem;">
                                                <?php 
                                                    if($solicitudes->reg_pago == 0): ?>
                                                        <img width="25px" height="25px" src="<?php echo base_url(); ?>/assets/img/button_gray.png" title="Pago Pendiente">
                                                        <?php echo "Pago Pendiente"; 
                                                    else: ?>
                                                        <img width="25px" height="25px" src="<?php echo base_url(); ?>/assets/img/button_green.png" title="Pago Registrado">
                                                        <?php echo "Pago Registrado";  
                                                    endif;
                                                    echo "<br>";
                                                    if($solicitudes->id_tramite == 16):
                                                        if($solicitudes->reg_pago == 1 and $solicitudes->conciliado == 1): ?>
                                                            <img width="25px" height="25px" src="<?php echo base_url(); ?>/assets/img/button_green.png" title="Aprobado">
                                                            <?php echo "Aprobado por <b>Administración</b> ENFMP";  
                                                        else:
                                                            if($solicitudes->reg_pago == 1 and $solicitudes->conciliado == 2): ?>
                                                                <img width="25px" height="25px" src="<?php echo base_url(); ?>/assets/img/button_red.jpeg" title="Rechazado">
                                                                <?php echo "Rechazado por <b>Administración</b> ENFMP";  
                                                            endif;
                                                        endif;
                                                        echo "<br>";
                                                    endif;
                                                ?>
                                                <?php if($solicitudes->id_tramite == 16):
                                                    if($solicitudes->reg_pago == 1 and $solicitudes->conciliado == 1 and $solicitudes->academico == 1 and $solicitudes->rev_academica == 1): ?>
                                                        <img width="25px" height="25px" src="<?php echo base_url(); ?>/assets/img/button_blue.jpg" title="En Proceso">
                                                        <?php echo "Solicitud en Proceso de Revisión por la <b>Dirección de Secretaría General</b> de la ENFMP";  
                                                    else:
                                                        if($solicitudes->reg_pago == 1 and $solicitudes->conciliado == 1 and $solicitudes->academico == 2 and $solicitudes->rev_academica == 2): ?>
                                                            <img width="25px" height="25px" src="<?php echo base_url(); ?>/assets/img/button_red.jpeg" title="Rechazado">
                                                            <?php echo "Rechazado por <b>Secretaría</b> de la ENFMP";  
                                                        elseif($solicitudes->reg_pago == 1 and $solicitudes->conciliado == 1 and $solicitudes->academico == 0 and $solicitudes->rev_academica == 0): ?>
                                                            <img width="25px" height="25px" src="<?php echo base_url(); ?>/assets/img/button_gray.png" title="Pendiente">
                                                            <?php echo "Pendiente la Revisión Académica por la <b>Dirección de Secretaría General</b> de la ENFMP";  
                                                        endif;
                                                    endif;
                                                    echo "<br>";
                                                endif; ?>
                                            </td>
                                            <td style="padding: 10px 15px; text-align: center;">
                                                <?php if($solicitudes->reg_pago == 0 and $solicitudes->id_tramite == 16): ?>
                                                    <div>
                                                        <a href="<?php echo base_url(); ?>dashboard09/registro_pago/<?php echo $solicitudes->id_solicitud . '/' . $solicitudes->id_tipo_tramite; ?>">
                                                            <img src="<?php echo base_url(); ?>/assets/img/dinero.png" style="width:45px; height:45px;" title="Registrar Pago de arancel"> Pagar
                                                        </a>
                                                    </div>
                                                <?php endif; ?>
                                                <?php if($solicitudes->rev_academica == 0 and $solicitudes->id_tramite == 16): ?>
                                                    <div>
                                                        <a href="<?php echo base_url(); ?>dashboard09/edit_reincorporacion/<?php echo $solicitudes->id_solicitud . '/' . $solicitudes->id_tipo_tramite; ?>">
                                                            <img src="<?php echo base_url(); ?>/assets/img/icons8-Edit.png" style="width:45px; height:45px;" title="Editar Carta Solicitud de Reincorporación"> Editar Carta
                                                        </a>
                                                    </div>
                                                <?php endif; ?>
                                                <hr>
                                                <?php if($solicitudes->requisitos == 1 and $solicitudes->id_tramite == 16 and $solicitudes->reg_pago == 1): ?>
                                                    <div>
                                                        <a href="<?php echo base_url(); ?>assets/tramites/reincorporaciones/solicitud/<?php echo $solicitudes->id_usuario . '_' . $solicitudes->id_programa . '_solicitud.pdf'; ?>" target="_new">
                                                            <img src="<?php echo base_url(); ?>/assets/img/pdf.png" style="width:35px; height:35px;" title="Ver Carta de Solicitud"> Solicitud
                                                        </a>
                                                    </div>
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <tr>
                                            <td colspan="6" style="padding: 30px 15px; text-align: center; color: #6c757d;">
                                                <i class="fas fa-info-circle fa-2x d-block mb-2" style="color: #17a2b8;"></i>
                                                <span style="font-size: 1rem;">No hay solicitudes registradas</span>
                                            </td>
                                        </tr>
                                    <?php endif; ?>
                                </tbody>
                                <tfoot style="background: #f8f9fa; border-top: 2px solid #003366;">
                                    <tr>
                                        <th colspan="6" style="padding: 10px 15px; font-size: 0.8rem; color: #6c757d; font-weight: 400; text-align: center;">
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
    
    .btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.15);
    }
    
    /* Estilo para campos de formulario */
    .form-control:focus {
        border-color: #003366;
        box-shadow: 0 0 0 0.2rem rgba(0, 51, 102, 0.25);
    }
    
    /* Estilo para imágenes de estatus */
    .table tbody td img {
        border-radius: 50%;
        border: 2px solid transparent;
        transition: transform 0.2s ease, border-color 0.2s ease;
        vertical-align: middle;
        margin-right: 5px;
    }
    
    .table tbody td img:hover {
        transform: scale(1.1);
        border-color: #003366;
    }
    
    /* Ajuste para móviles */
    @media (max-width: 768px) {
        .card-title {
            font-size: 1rem !important;
        }
        .btn {
            padding: 8px 16px !important;
            font-size: 0.8rem !important;
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
