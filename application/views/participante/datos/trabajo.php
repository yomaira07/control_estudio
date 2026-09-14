<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" style="background: #f4f6f9;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0" style="font-weight: 300; color: #003366;">
                        <i class="fas fa-briefcase" style="color: #003366; margin-right: 8px;"></i>
                        <span style="color: #003366; font-weight: 600;">SCE-ENFMP</span>
                        <span style="color: #2c3e50; font-weight: 300;"> - Datos Laborales</span>
                    </h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right" style="background: transparent;">
                        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>dashboard04/home" style="color: #6c757d;">Información del Estudiante - Datos Personales</a></li>
                        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>dashboard04/datos1" style="color: #6c757d;"> - Dirección</a></li>
                        <li class="breadcrumb-item active" style="color: #003366; font-weight: 600;"> - Datos Laborales</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <!-- Main content -->
    <section class="content">
        <form action="<?php echo base_url(); ?>dashboard04/trabajo_store/<?php echo $this->session->userdata('id'); ?>" 
              enctype="multipart/form-data" 
              method="POST" 
              id="carga"
              name="carga"
              onsubmit="return validarFormulario();">
            
            <!-- Card Principal -->
            <div class="card card-primary card-outline shadow-sm" style="border-radius: 10px; border-top: 4px solid #003366;">
                <div class="card-body p-0">
                    <div class="card" style="border: none; border-radius: 10px;">
                        
                        <!-- Header -->
                        <div class="card-header py-3" style="border-bottom: 1px solid #e8e8e8; border-radius: 10px 10px 0 0; background: #fafafa;">
                            <div class="d-flex align-items-center justify-content-between flex-wrap">
                                <div class="d-flex align-items-center">
                                    <div class="mr-3" style="width: 42px; height: 42px; background: #003366; border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                                        <i class="fas fa-briefcase text-white" style="font-size: 1.1rem;"></i>
                                    </div>
                                    <div>
                                        <h5 class="mb-0" style="font-weight: 600; color: #2c3e50;">
                                            <strong>Datos Laborales - Actual</strong>
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


                            <!-- Campos ocultos -->
                            <input type="hidden" name="id_usuario" value="<?php echo $this->session->userdata('id'); ?>">
                            <input type="hidden" name="no_encontrado" value="<?php if ($datos_trabajo==false){echo "falso";}else{ echo $datos_trabajo->id_trabajo; } ?>">
                            <input type="hidden" name="fecha_registro" value="<?php echo date('d-m-Y H:i:s'); ?>">
                            <input type="hidden" name="fecha_actualizacion" value="<?php echo $datos_trabajo->dactualizacion; ?>">
                            <input type="hidden" name="fecha_tiempo_pre" value="<?php echo $tiempo_pre->fecha_inicio; ?>">
                            
                            <hr style="border-top: 2px solid #e9ecef;">

                            <!-- Lugar de Trabajo -->
                            <div class="form-group row">
                                <label for="lugar_trabajo" class="col-sm-3 col-form-label" style="font-weight: 500; color: #2c3e50;">
                                    <i class="fas fa-building" style="color: #003366; margin-right: 6px;"></i> (*) Lugar de Trabajo
                                </label>
                                <div class="col-sm-5">
                                    <select class="form-control" name="lugar_trabajo" id="lugar_trabajo" onchange="cincunscripcion(this.value);" required style="border-radius: 0px; border: 1px solid #ced4da;">
                                        <option value="">- Seleccione -</option>                                       
                                        <?php foreach($lugartrabajo as $lugartrabajo): ?>
                                            <option value="<?php echo $lugartrabajo->id; ?>" <?php if($datos_trabajo->id_lugar_trabajo == $lugartrabajo->id){ echo " selected"; } ?>><?php echo $lugartrabajo->lugar_trabajo; ?></option>
                                        <?php endforeach; ?>
                                    </select>   
                                </div>
                            </div>
                            
                            <!-- Nombre del Ente/Órgano/Empresa -->
                            <div id="mostrar_nombre_trab">
                                <div class="form-group row">
                                    <label for="institucion" id="lbinstitucion" class="col-sm-3 col-form-label" style="font-weight: 500; color: #2c3e50;">
                                        <i class="fas fa-university" style="color: #003366; margin-right: 6px;"></i> (*) Nombre del Ente/Órgano/Empresa
                                    </label>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control" id="institucion" name="institucion" onkeyup="javascript:this.value=this.value.toUpperCase();" value="<?php if ($datos_trabajo==false){echo "";}elseif(date('Y-m-d',strtotime($datos_trabajo->dactualizacion)) >= $tiempo_pre->fecha_inicio){ echo $datos_trabajo->institucion; } ?>" style="border-radius: 0px; border: 1px solid #ced4da;"> 
                                    </div>
                                    <label for="anno_ingreso" id="lbanno_ingreso" class="col-sm-2 col-form-label" style="font-weight: 500; color: #2c3e50;">
                                        <i class="fas fa-calendar" style="color: #003366; margin-right: 6px;"></i> (*) Año de Ingreso
                                    </label>
                                    <div class="col-sm-2">
                                        <input type="number" class="form-control" id="anno_ingreso" max="2026" name="anno_ingreso" onkeyup="javascript:this.value=this.value.toUpperCase();" value="<?php if ($datos_trabajo==false){echo "";}elseif(date('Y-m-d',strtotime($datos_trabajo->dactualizacion)) >= $tiempo_pre->fecha_inicio){ echo $datos_trabajo->anno_ingreso; } ?>" style="border-radius: 0px; border: 1px solid #ced4da;"> 
                                    </div>                   
                                </div>                  
                                
                                <!-- Dirección de Adscripción -->
                                <div class="form-group row">
                                    <label for="direccion_adscripcion_actual" class="col-sm-3 col-form-label" style="font-weight: 500; color: #2c3e50;">
                                        <i class="fas fa-map-pin" style="color: #003366; margin-right: 6px;"></i> (*) Dirección de Adscripción
                                    </label>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control" id="direccion_adscripcion_actual" name="direccion_adscripcion_actual" onkeyup="javascript:this.value=this.value.toUpperCase();" value="<?php if ($datos_trabajo==false){echo "";}elseif(date('Y-m-d',strtotime($datos_trabajo->dactualizacion)) >= $tiempo_pre->fecha_inicio){ echo $datos_trabajo->direccion_adscripcion; } ?>" style="border-radius: 0px; border: 1px solid #ced4da;"> 
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Estado de Circunscripción (MP) -->
                            <div id="mostrar_mp">
                                <div class="form-group row">
                                    <label for="comboestado" class="col-sm-3 col-form-label" style="font-weight: 500; color: #2c3e50;">
                                        <i class="fas fa-flag" style="color: #003366; margin-right: 6px;"></i> (*) Estado de Circunscripción (SOLO MINISTERIO PÚBLICO)
                                    </label>
                                    <div class="col-sm-5">
                                        <select name="comboestado" class="form-control" id="comboestado" style="border-radius: 0px; border: 1px solid #ced4da;">
                                            <option value="">Seleccione...</option>
                                            <?php foreach ($estadotrabajo as $combo_estado): ?>
                                                <?php if($datos_trabajo->estado_circunscripcion == $combo_estado->id && date('Y-m-d',strtotime($datos_trabajo->dactualizacion)) >= $tiempo_pre->fecha_inicio): ?>
                                                    <option value="<?php echo $combo_estado->id; ?>" selected><?php echo $combo_estado->estado; ?></option>
                                                <?php else: ?>
                                                    <option value="<?php echo $combo_estado->id; ?>"><?php echo $combo_estado->estado; ?></option>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>                       
                                </div>                         
                            </div>
                            
                            <!-- Teléfono de Oficina y Cargo -->
                            <div id="mostrar_na">
                                <div class="form-group row">
                                    <label for="telefono_teltrab" class="col-sm-3 col-form-label" style="font-weight: 500; color: #2c3e50;">
                                        <i class="fas fa-phone" style="color: #003366; margin-right: 6px;"></i> (*) Teléfono de Oficina
                                    </label>                   
                                    <div class="col-sm-2">
                                        <select name="codigo_teltrab" class="form-control" style="border-radius: 0px; border: 1px solid #ced4da;">
                                            <?php foreach ($cod_hab as $cod_hab): ?>
                                                <?php if (substr(trim($datos_trabajo->tel_trabajo),0,4) == trim($cod_hab->descripcion)): ?>
                                                    <option value="<?php echo $cod_hab->descripcion; ?>" selected><?php echo $cod_hab->descripcion; ?></option>
                                                <?php else: ?>
                                                    <option value="<?php echo $cod_hab->descripcion; ?>"><?php echo $cod_hab->descripcion; ?></option>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>                   
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control" id="telefono_teltrab" placeholder="Teléfono" name="telefono_teltrab" onkeypress="return controltag(event)" maxlength="7" value="<?php if ($datos_trabajo==false){echo "";}else{ echo substr($datos_trabajo->tel_trabajo,4); } ?>" style="border-radius: 0px; border: 1px solid #ced4da;">
                                    </div>
                                </div>
                         
                                <!-- Cargo y Funciones -->
                                <div class="form-group row">
                                    <label for="cargo_desempena" class="col-sm-3 col-form-label" style="font-weight: 500; color: #2c3e50;">
                                        <i class="fas fa-user-tie" style="color: #003366; margin-right: 6px;"></i> (*) Cargo que Desempeña
                                    </label>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control" id="cargo_desempena" name="cargo_desempena" onkeyup="javascript:this.value=this.value.toUpperCase();" value="<?php if ($datos_trabajo==false){echo "";}else{ echo $datos_trabajo->cargo; } ?>" style="border-radius: 0px; border: 1px solid #ced4da;"> 
                                    </div>
                                    <label for="funciones_desempena" class="col-sm-2 col-form-label" style="font-weight: 500; color: #2c3e50;">
                                        <i class="fas fa-tasks" style="color: #003366; margin-right: 6px;"></i> (*) Funciones
                                    </label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" id="funciones_desempena" name="funciones_desempena" onkeyup="javascript:this.value=this.value.toUpperCase();" value="<?php if ($datos_trabajo==false){echo "";}else{ echo $datos_trabajo->funciones; } ?>" style="border-radius: 0px; border: 1px solid #ced4da;"> 
                                    </div>
                                </div>
                            </div>
                            
                            <!-- ¿Es jubilado? -->
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label" style="font-weight: 500; color: #2c3e50;">
                                    <i class="fas fa-user-clock" style="color: #003366; margin-right: 6px;"></i> (*) ¿Es jubilada/o de la administración pública?
                                </label>
                                <div class="col-sm-9">
                                    <div class="form-check form-check-inline">
                                        <input type="radio" name="radio_jub" id="radsi" class="form-check-input" value="1" <?php if($datos_trabajo->jubilado == 1) echo "checked"; ?> required/>
                                        <label class="form-check-label" for="radsi" style="color: #2c3e50; font-weight: 500;">Sí</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input type="radio" name="radio_jub" id="radno" class="form-check-input" value="2" <?php if($datos_trabajo->jubilado == 2) echo "checked"; ?> required/>
                                        <label class="form-check-label" for="radno" style="color: #2c3e50; font-weight: 500;">No</label>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Adjuntar Carnet -->
                            <div id="mostrar_carnet">
                                <div class="card" style="border-radius: 8px; border: 1px solid #e8e8e8; background: #fafafa;">
                                    <div class="card-body">
                                        <div align="center">
                                            <h6 style="font-weight: 600; color: #2c3e50;">
                                                <i class="fas fa-id-card" style="color: #003366; margin-right: 8px;"></i>
                                                Adjuntar Carnet de Trabajo o Nombramiento
                                            </h6>
                                            <div class="custom-file" style="max-width: 400px;">
                                                <input type="file" name="userfile" id="userfile" class="custom-file-input" style="border-radius: 0px;">
                                                <label class="custom-file-label" for="userfile" style="border-radius: 0px; border: 1px solid #ced4da; text-align: left;">Seleccionar archivo</label>
                                            </div>
                                            <div class="frame3" align="center" style="margin-top: 10px;">
                                                <p style="font-size: 0.8rem; color: #6c757d; margin: 5px 0;">
                                                    <i class="fas fa-info-circle" style="color: #003366;"></i>
                                                    Para poder enviarnos su documento, el archivo debe estar en formato *.jpg, *.png, *.jpeg
                                                </p>
                                                <p style="font-size: 0.8rem; color: #6c757d; margin: 5px 0;">
                                                    <i class="fas fa-exclamation-circle" style="color: #ffc107;"></i>
                                                    El tamaño máximo permitido del archivo es de 1 MB (1024KB).
                                                </p>
                                                <div id="mensaje_carnet" style="margin-top: 10px;">
                                                    <?php 
                                                    $id_usuario_actual = $this->session->userdata('id');
                                                    $ruta_carnet_actual = FCPATH . 'assets/carnet/' . $id_usuario_actual . '_carnet.jpg';
                                                    if (file_exists($ruta_carnet_actual)): 
                                                    ?>
                                                        <span style="color: #28a745;">
                                                            <i class="fa fa-check-circle"></i> Ya tiene un carnet registrado. No es obligatorio subir otro, solo si desea actualizarlo.
                                                        </span>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                            <p align="center" style="margin-top: 15px;">
                                                <?php
                                                $id_usuario_actual = $this->session->userdata('id');
                                                $rutaarchivo = 'assets/carnet/' . $id_usuario_actual . '_carnet.jpg';
                                                $ruta_completa = FCPATH . $rutaarchivo;
                                                
                                                if(file_exists($ruta_completa)) {
                                                    $url_imagen = base_url() . $rutaarchivo . '?' . time();
                                                    echo "<img id='imgFoto' border='2' class='fotomarket' width='150px' height='165px' src='" . $url_imagen . "' style='border-radius: 4px; border: 2px solid #e8e8e8;'>";
                                                    echo "<br><small style='color: #6c757d;'><i class='fas fa-image' style='color: #003366;'></i> Imagen actual del carnet</small>";
                                                } else { 
                                                    echo "<img id='imgFoto' border='2' class='fotomarket' width='150px' height='165px' src='" . base_url() . "assets/img/no-foto.jpg' style='border-radius: 4px; border: 2px solid #e8e8e8;'>";
                                                    echo "<br><small style='color: #6c757d;'><i class='fas fa-warning' style='color: #ffc107;'></i> No hay carnet registrado</small>";
                                                } 
                                                ?>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Botón de Envío -->
                            <div class="row mt-4">
                                <div class="col-md-12 text-center">
                                    <button type="submit" name="upload" class="btn btn-primary" style="border-radius: 10px; padding: 10px 40px; font-weight: 500; transition: all 0.3s;" title="Hacer clic para Registrar Datos">
                                        <i class="fas fa-save mr-2"></i>
                                        Actualizar Información
                                    </button>
                                    <a href="<?php echo base_url(); ?>dashboard04/datos1" class="btn btn-default" style="border-radius: 10px; padding: 10px 30px; font-weight: 500; margin-left: 8px; transition: all 0.3s;">
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
    
    /* Estilo para radio buttons */
    .form-check-input:checked {
        background-color: #003366;
        border-color: #003366;
    }
    
    .form-check-input:focus {
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
        .custom-file-label {
            font-size: 0.8rem !important;
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

<!-- Scripts existentes -->
<script type="text/javascript">
    // Función para verificar si existe imagen de carnet mediante AJAX
    function verificarExistenciaImagen(idUsuario) {
        $.ajax({
            url: '<?php echo base_url(); ?>dashboard04/verificar_imagen_carnet',
            type: 'POST',
            data: { id_usuario: idUsuario },
            dataType: 'json',
            async: false,
            success: function(response) {
                if (response.existe) {
                    document.getElementById('userfile').required = false;
                    if (document.getElementById('mensaje_carnet')) {
                        document.getElementById('mensaje_carnet').innerHTML = 
                            '<span style="color: #28a745;"><i class="fa fa-check-circle"></i> Ya tiene carnet registrado. No es obligatorio subir otro.</span>';
                    }
                } else {
                    if (document.getElementById('mensaje_carnet')) {
                        document.getElementById('mensaje_carnet').innerHTML = 
                            '<span style="color: #dc3545;"><i class="fa fa-exclamation-circle"></i> Debe subir su carnet de trabajo.</span>';
                    }
                }
            }
        });
    }

    function verificarRequerimientoArchivo(idUsuario, form0) {
        var existeImagen = false;
        $.ajax({
            url: '<?php echo base_url(); ?>dashboard04/verificar_imagen_carnet',
            type: 'POST',
            data: { id_usuario: idUsuario },
            dataType: 'json',
            async: false,
            success: function(response) {
                existeImagen = response.existe;
            }
        });
        
        if (existeImagen) {
            form0.elements.userfile.required = false;
            if (document.getElementById('mensaje_carnet')) {
                document.getElementById('mensaje_carnet').innerHTML = 
                    '<span style="color: #28a745;"><i class="fa fa-check-circle"></i> Ya tiene carnet registrado. No es obligatorio subir otro.</span>';
            }
        } else {
            form0.elements.userfile.required = true;
            if (document.getElementById('mensaje_carnet')) {
                document.getElementById('mensaje_carnet').innerHTML = 
                    '<span style="color: #dc3545;"><i class="fa fa-exclamation-circle"></i> Debe subir su carnet de trabajo.</span>';
            }
        }
    }

    function cincunscripcion(trabajo){
        var form0 = document.forms.carga;
        var idUsuario = '<?php echo $this->session->userdata('id'); ?>';
        
        if( form0.elements.fecha_actualizacion.value < form0.elements.fecha_tiempo_pre.value ){   
            form0.elements.anno_ingreso.value = "";                         
            form0.elements.direccion_adscripcion_actual.value = "";                           
            form0.elements.comboestado.value = "";                         
            form0.elements.codigo_teltrab.value = "";                              
            form0.elements.telefono_teltrab.value = "";                             
            form0.elements.cargo_desempena.value = "";                             
            form0.elements.funciones_desempena.value = "";
            form0.elements.institucion.value = "";     
        }   
        
        if(trabajo == "1"){                       
            document.getElementById('mostrar_na').style.display = 'block';
            document.getElementById('mostrar_nombre_trab').style.display = 'block';
            document.getElementById('mostrar_mp').style.display = 'block';
            document.getElementById('mostrar_carnet').style.display = 'block';
            
            form0.elements.institucion.value = "MINISTERIO PÚBLICO";
            form0.elements.institucion.required = true;
            form0.elements.comboestado.required = true;
            form0.elements.anno_ingreso.required = true;
            form0.elements.direccion_adscripcion_actual.required = true;
            form0.elements.codigo_teltrab.required = true;
            form0.elements.telefono_teltrab.required = true;
            form0.elements.cargo_desempena.required = true;
            form0.elements.funciones_desempena.required = true;
            
            verificarRequerimientoArchivo(idUsuario, form0);
            
        } else if(trabajo == "14" || trabajo == "15" || trabajo == "16" || trabajo == "17"){
            document.getElementById('mostrar_mp').style.display = 'none';
            document.getElementById('mostrar_nombre_trab').style.display = 'none';
            document.getElementById('mostrar_na').style.display = 'none';
            document.getElementById('mostrar_carnet').style.display = 'none';
            
            form0.elements.institucion.required = false;
            form0.elements.anno_ingreso.required = false;
            form0.elements.direccion_adscripcion_actual.required = false;
            form0.elements.comboestado.required = false;
            form0.elements.codigo_teltrab.required = false;
            form0.elements.telefono_teltrab.required = false;
            form0.elements.cargo_desempena.required = false;
            form0.elements.funciones_desempena.required = false;
            form0.elements.userfile.required = false;
            
            if (document.getElementById('mensaje_carnet')) {
                document.getElementById('mensaje_carnet').innerHTML = '';
            }
            
        } else if(trabajo == "2" || trabajo == "20" || trabajo == "5" || trabajo == "21" || trabajo == "22"){
            document.getElementById('mostrar_mp').style.display = 'none';
            document.getElementById('mostrar_na').style.display = 'block';
            document.getElementById('mostrar_nombre_trab').style.display = 'block';
            document.getElementById('mostrar_carnet').style.display = 'block';
            
            form0.elements.institucion.required = true;
            form0.elements.anno_ingreso.required = true;
            form0.elements.direccion_adscripcion_actual.required = true;
            form0.elements.comboestado.required = false;
            form0.elements.codigo_teltrab.required = true;
            form0.elements.telefono_teltrab.required = true;
            form0.elements.cargo_desempena.required = true;
            form0.elements.funciones_desempena.required = true;
            
            verificarRequerimientoArchivo(idUsuario, form0);
            
        } else {
            document.getElementById('mostrar_mp').style.display = 'none';
            document.getElementById('mostrar_nombre_trab').style.display = 'block';
            document.getElementById('mostrar_na').style.display = 'block';
            document.getElementById('mostrar_carnet').style.display = 'none';
            
            form0.elements.institucion.required = true;
            form0.elements.anno_ingreso.required = true;
            form0.elements.direccion_adscripcion_actual.required = true;
            form0.elements.comboestado.required = false;
            form0.elements.codigo_teltrab.required = true;
            form0.elements.telefono_teltrab.required = true;
            form0.elements.cargo_desempena.required = true;
            form0.elements.funciones_desempena.required = true;
            form0.elements.userfile.required = false;
            
            if (document.getElementById('mensaje_carnet')) {
                document.getElementById('mensaje_carnet').innerHTML = '';
            }
        }
    }

    function validarFormulario() {
        var trabajo = document.getElementById('lugar_trabajo').value;
        var fileInput = document.getElementById('userfile');
        var idUsuario = '<?php echo $this->session->userdata('id'); ?>';
        
        var valoresRequierenCarnet = ['1', '2', '5', '20', '21', '22'];
        if (valoresRequierenCarnet.indexOf(trabajo) !== -1) {
            var existeImagen = false;
            $.ajax({
                url: '<?php echo base_url(); ?>dashboard04/verificar_imagen_carnet',
                type: 'POST',
                data: { id_usuario: idUsuario },
                dataType: 'json',
                async: false,
                success: function(response) {
                    existeImagen = response.existe;
                }
            });
            
            if (!existeImagen && fileInput.files.length === 0) {
                alert('Debe seleccionar un archivo de carnet de trabajo.');
                fileInput.focus();
                return false;
            }
            
            if (fileInput.files.length > 0) {
                var fileSize = fileInput.files[0].size / 1024;
                if (fileSize > 1024) {
                    alert('El archivo no debe superar 1 MB (1024KB).');
                    fileInput.value = '';
                    return false;
                }
                
                var fileType = fileInput.files[0].type;
                var allowedTypes = ['image/jpeg', 'image/png', 'image/jpg'];
                if (allowedTypes.indexOf(fileType) === -1) {
                    alert('Solo se permiten archivos JPG, JPEG o PNG.');
                    fileInput.value = '';
                    return false;
                }
            }
        }
        
        return true;
    }

    function iniciar(){
        var trabajo = document.getElementById('lugar_trabajo').value;
        cincunscripcion(trabajo);
        
        var idUsuario = '<?php echo $this->session->userdata('id'); ?>';
        verificarExistenciaImagen(idUsuario);
    }

    function controltag(e) {
        var key;
        if(window.event) {
            key = e.keyCode;
        } else if(e.which) {
            key = e.which;
        }
        return (key >= 48 && key <= 57) || key == 8 || key == 9 || key == 46;
    }
</script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
        iniciar();
        
        $('#lugar_trabajo').on('change', function() {
            var trabajo = this.value;
            cincunscripcion(trabajo);
        });
        
        $('#userfile').on('change', function() {
            if (this.files.length > 0) {
                var fileSize = this.files[0].size / 1024;
                if (fileSize > 1024) {
                    alert('El archivo no debe superar 1 MB (1024KB).');
                    this.value = '';
                    return false;
                }
                
                var fileType = this.files[0].type;
                var allowedTypes = ['image/jpeg', 'image/png', 'image/jpg'];
                if (allowedTypes.indexOf(fileType) === -1) {
                    alert('Solo se permiten archivos JPG, JPEG o PNG.');
                    this.value = '';
                    return false;
                }
                
                var reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('imgFoto').src = e.target.result;
                }
                reader.readAsDataURL(this.files[0]);
                
                if (document.getElementById('mensaje_carnet')) {
                    document.getElementById('mensaje_carnet').innerHTML = 
                        '<span style="color: #003366;"><i class="fa fa-upload"></i> Nuevo carnet seleccionado para actualizar.</span>';
                }
            }
        });
    });
</script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">