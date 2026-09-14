<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <script language="javascript">
            function anterior() { 
                location.href = "/control_estudio/dashboard09/solicitudes_ruc_revisadas";
            }
        </script>

        <!-- Mensajes de Alerta -->
        <?php if($this->session->flashdata('success')){ ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Éxito!</strong> <?php echo $this->session->flashdata('success'); ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php } else if($this->session->flashdata('error')){ ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="icon fa fa-ban"></i> <?php echo $this->session->flashdata('error'); ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php } else if($this->session->flashdata('warning')){ ?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Alerta!</strong> <?php echo $this->session->flashdata('warning'); ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php } else if($this->session->flashdata('info')){ ?>
            <div class="alert alert-info alert-dismissible fade show" role="alert">
                <strong>Informacion!</strong> <?php echo $this->session->flashdata('info'); ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php } ?>

        <div class="card card-primary card-outline">
            <div class="card-body">
                <!-- INFORMACIÓN DEL ALUMNO -->
                <div class="card mb-4">                   
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="card-header bg-primary text-white">
                                    <h3 class="card-title mb-0">INFORMACIÓN DEL ALUMNO</h3>
                                </div>
                                <table class="table table-sm table-borderless">
                                    <?php if(!empty($datos_alumno)): ?>
                                    <tr>
                                        <th width="40%">Cédula de identidad:</th>
                                        <td><?php echo $datos_alumno->nacionalidad.'-'.$datos_alumno->cedula; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Nombre y Apellido:</th>
                                        <td><?php echo $datos_alumno->nombre_primer . ' ' . $datos_alumno->nombre_segundo . ' ' . $datos_alumno->apellido_primer . ' ' . $datos_alumno->apellido_segundo; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Teléfono(s):</th>
                                        <td><?php echo $datos_alumno->telefono_cel . " / " . $datos_alumno->telefono_hab; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Correo Electrónico:</th>
                                        <td><?php echo $datos_alumno->correo; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Estado Residencia:</th>
                                        <td><?php echo strtoupper($datos_alumno->residencia); ?></td>
                                    </tr>
                                    <?php endif; ?>
                                    <tr>
                                        <th>Lugar de Trabajo:</th>
                                        <td><?php echo ($trabajo->lugar_trabajo); ?></td>
                                    </tr>
                                </table>
                            </div>
                            <div class="col-md-6">
                                <div class="card-header bg-primary text-white">
                                    <h3 class="card-title mb-0">TRÁMITES Y SOLICITUDES REGISTRADAS - Período Académico: <strong><?php echo $periodo->nombre; ?></strong></h3>
                                </div>
                                <?php if(!empty($datos_alumno)): ?>
                                    <?php foreach($listado as $listado): ?>
                                    <table class="table table-sm table-borderless">
                                        <tr>
                                            <th width="40%">Fecha de Solicitud:</th>
                                            <td><?php echo date("d/m/Y", strtotime($listado->fecha_solicitud)); ?></td>
                                        </tr>
                                        <tr>
                                            <th>Programa/Especialización:</th>
                                            <td><?php echo $listado->programa; ?></td>
                                        </tr>
                                        <tr>
                                            <th>Tipo de Trámite:</th>
                                            <td><h5><?php echo $listado->tramite; ?></h5></td>
                                        </tr>
                                       
                                        
                                        <?php if($listado->id_tramite==28): ?>
                                        <tr>
                                            <th>Tipo de Reconocimiento:</th>
                                            <td>
                                                <?php 
                                                    if($listado->id_tipo_reconocimiento==1){ echo "ESTUDIOS REALIZADOS EN LA ESCUELA NACIONAL DE FISCALES DEL MINISTERIO PÚBLICO";}
                                                    if($listado->id_tipo_reconocimiento==2){ echo "ESTUDIOS REALIZADOS EN OTRAS UNIVERSIDADES O INSTITUTOS"; }
                                                    if($listado->id_tipo_reconocimiento==3){ echo "EXPERIENCIA DOCENTE"; }
                                                    if($listado->id_tipo_reconocimiento==4){ echo "EXPERIENCIA LABORAL"; }
                                                ?>
                                            </td>
                                        </tr>
                                        <?php endif; ?>
                                    </table>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- FORMULARIO DE VALIDACIÓN -->
                <?php if(!empty($listado)): ?>
                <form action="<?php echo base_url()?>dashboard09/registro_validacion_tramite_store/<?php echo $listado->id_solicitud.'/'.$listado->id_usuario.'/'.$listado->id_programa; ?>" method="POST">
                    
                  

                    <!-- DOCUMENTOS PARA TRÁMITE ID=28 (SOLICITUD DE RUC) -->
                    <?php if($listado->id_tramite=="28"): ?>
                    <div class="card mb-4">
                        <div class="card-header bg-secondary text-white">
                            <h4 class="card-title mb-0">Documentos de la Solicitud RUC y Unidades Curriculares Solicitadas</h4>
                        </div>
                        <div class="card-body">
                            <div class="text-center mb-3">
                                <a href="<?php echo base_url()?>assets/tramites/ruc/<?php echo $listado->id_solicitud.'_'.$listado->id_usuario.'_ruc.pdf'?>" target="_new" class="btn btn-warning">
                                    <i class="fas fa-file-pdf"></i> Ver Carta de Solicitud RUC
                                </a>
                                <button type="button" class="btn btn-info ml-2" onclick="verUnidadesCurriculares()">
                                    <i class="fas fa-eye"></i> Ver Unidades Curriculares Solicitadas
                                </button>
                            </div>
                            
                            <!-- Mostrar documentos según el tipo de reconocimiento -->
                            <?php if($listado->id_tipo_reconocimiento==1): ?>
                                <!-- Reconocimiento de estudios ENFMP -->
                                <div class="alert alert-light">
                                    <h5>Documentos requeridos para reconocimiento de estudios ENFMP:</h5>
                                    <ul>
                                        <li>Títulos de programa de postgrado debidamente registrado, certificados o diplomas de los estudios realizados</li>
                                    </ul>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="card">
                                            <div class="card-header bg-secondary text-white">
                                                <strong>Títulos de programas de postgrado</strong>
                                            </div>
                                            <div class="card-body">
                                                <?php  
                                                    $dir='assets/tramites/ruc_tit_'.trim($listado->id_programa).'_'.trim($datos_alumno->cedula).'/';
                                                    if (is_dir($dir)) {
                                                        $archivos = scandir($dir);
                                                        foreach ($archivos as $archivo) {
                                                            if ($archivo != "." && $archivo != "..") {
                                                                echo "<a href='".base_url().'assets/tramites/ruc_tit_'.$listado->id_programa.'_'.$datos_alumno->cedula.'/'.$archivo."' target='_blank' class='d-block mb-2'>📄 ".$archivo."</a>";
                                                            }
                                                        }
                                                    } else {
                                                        echo "<p class='text-muted'>No hay documentos cargados.</p>";
                                                    }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>                              
                                
                            <?php elseif($listado->id_tipo_reconocimiento==2): ?>
                                <!-- Reconocimiento de otras universidades -->
                                <div class="alert alert-info">
                                    <h5>Documentos requeridos para reconocimiento de otras universidades:</h5>
                                    <ul>
                                        <li>Programas de estudios o contenido programático detallado, notas certificadas que se desprende de cada título, certificados o diplomas o Récord Académico de Calificaciones</li>
                                    </ul>
                                </div>
                                
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="card">
                                            <div class="card-header bg-secondary text-white">
                                                <strong>Programas de estudio</strong>
                                            </div>
                                            <div class="card-body">
                                                <?php  
                                                    $dir='assets/tramites/ruc_pro_'.trim($listado->id_programa).'_'.trim($datos_alumno->cedula).'/';
                                                    if (is_dir($dir)) {
                                                        $archivos = scandir($dir);
                                                        foreach ($archivos as $archivo) {
                                                            if ($archivo != "." && $archivo != "..") {
                                                                echo "<a href='".base_url().'assets/tramites/ruc_pro_'.$listado->id_programa.'_'.$datos_alumno->cedula.'/'.$archivo."' target='_blank' class='d-block mb-2'>📄 ".$archivo."</a>";
                                                            }
                                                        }
                                                    } else {
                                                        echo "<p class='text-muted'>No hay documentos cargados.</p>";
                                                    }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                            <?php elseif($listado->id_tipo_reconocimiento==3 or $listado->id_tipo_reconocimiento==4): ?>
                                <!-- Reconocimiento de experiencia docente o laboral -->
                                <div class="alert alert-info">
                                    <h5>Documentos requeridos para experiencia laboral y/o docente:</h5>
                                    <ul>
                                        <li>Constancias de experiencia laboral o docente en una determinada área del conocimiento</li>
                                    </ul>
                                </div>
                                
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="card">
                                            <div class="card-header bg-secondary text-white">
                                                <strong>Experiencia laboral y formación</strong>
                                            </div>
                                            <div class="card-body">
                                                <?php  
                                                    $dir='assets/tramites/ruc_lab_'.trim($listado->id_programa).'_'.trim($datos_alumno->cedula).'/';
                                                    if (is_dir($dir)) {
                                                        $archivos = scandir($dir);
                                                        foreach ($archivos as $archivo) {
                                                            if ($archivo != "." && $archivo != "..") {
                                                                echo "<a href='".base_url().'assets/tramites/ruc_lab_'.$listado->id_programa.'_'.$datos_alumno->cedula.'/'.$archivo."' target='_blank' class='d-block mb-2'>📄 ".$archivo."</a>";
                                                            }
                                                        }
                                                    } else {
                                                        echo "<p class='text-muted'>No hay documentos cargados.</p>";
                                                    }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <?php endif; ?>

                    <input type="hidden" name="str" id="str">

                    <!-- BOTONES DE ACCIÓN -->
                    <div class="row mt-4">
                        <div class="col-12 text-center">
                            <input type="button" value="Regresar" class="btn btn-info" onClick="anterior();">
                            
                            
                        </div>
                        
                    </div>
                </form>
                <?php endif; ?>
            </div>
        </div>
    </section>
</div>

<!-- MODAL PARA VER UNIDADES CURRICULARES - SOLO PARA TRÁMITE 28 -->
<?php if(!empty($listado) && $listado->id_tramite=="28"): ?>
<div class="modal fade" id="modalUnidades" tabindex="-1" role="dialog" aria-labelledby="modalUnidadesLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="modalUnidadesLabel">
                    <i class="fas fa-book"></i> Unidades Curriculares Solicitadas
                </h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="contenidoUnidades">
                    <!-- Tabla de unidades que CURSA actualmente -->
                    <div class="card mb-4">
                        <div class="card-header bg-info text-white">
                            <h5 class="card-title mb-0">Unidades Curriculares que CURSA (Programa Actual)</h5>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>Código</th>
                                            <th>Nombre de la Unidad</th>
                                            <th>Trimestre</th>
                                            <th>Unidad de Crédito</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tablaUnidadesCursa">
                                        <tr id="cargandoCursa">
                                            <td colspan="4" class="text-center">
                                                <div class="spinner-border spinner-border-sm text-primary" role="status">
                                                    <span class="sr-only">Cargando...</span>
                                                </div>
                                                Cargando unidades que cursa...
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Tabla de unidades CURSADAS (para reconocimiento) -->
                    <div class="card">
                        <div class="card-header bg-success text-white">
                            <h5 class="card-title mb-0">Unidades Curriculares CURSADAS (Para Reconocimiento)</h5>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>Código</th>
                                            <th>Nombre de la Unidad</th>
                                            <th>Trimestre</th>
                                            <th>Unidad de Crédito</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tablaUnidadesCursadas">
                                        <tr id="cargandoCursadas">
                                            <td colspan="4" class="text-center">
                                                <div class="spinner-border spinner-border-sm text-primary" role="status">
                                                    <span class="sr-only">Cargando...</span>
                                                </div>
                                                Cargando unidades cursadas...
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<script>
function verUnidadesCurriculares() {
    // Mostrar modal de Bootstrap
    $('#modalUnidades').modal('show');
    
    // Mostrar mensajes de carga con spinner
    $('#tablaUnidadesCursa').html('<tr><td colspan="4" class="text-center"><div class="spinner-border spinner-border-sm text-primary" role="status"><span class="sr-only">Cargando...</span></div> Cargando unidades que cursa...</td></tr>');
    $('#tablaUnidadesCursadas').html('<tr><td colspan="4" class="text-center"><div class="spinner-border spinner-border-sm text-primary" role="status"><span class="sr-only">Cargando...</span></div> Cargando unidades cursadas...</td></tr>');
    
    // Cargar unidades curriculares vía AJAX
    var xhr = new XMLHttpRequest();
    xhr.open('GET', '<?php echo base_url()?>dashboard09/get_unidades_curriculares/<?php echo $listado->id_solicitud; ?>', true);
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            try {
                var response = JSON.parse(xhr.responseText);
                
                // Cargar tabla de unidades que cursa
                if(response.unidades_cursa && response.unidades_cursa.length > 0) {
                    var html = '';
                    for(var i = 0; i < response.unidades_cursa.length; i++) {
                        html += '<tr>';
                        html += '<td>' + (response.unidades_cursa[i].codigo || 'N/A') + '</td>';
                        html += '<td>' + (response.unidades_cursa[i].nombre_unidad || 'N/A') + '</td>';
                        html += '<td>' + (response.unidades_cursa[i].trimestre || 'N/A') + '</td>';
                        html += '<td>' + (response.unidades_cursa[i].creditos || 'N/A') + '</td>';
                        html += '</tr>';
                    }
                    $('#tablaUnidadesCursa').html(html);
                } else {
                    $('#tablaUnidadesCursa').html('<tr><td colspan="4" class="text-center text-muted">No hay unidades curriculares asignadas para cursar</td></tr>');
                }
                
                // Cargar tabla de unidades cursadas
                if(response.unidades_cursadas && response.unidades_cursadas.length > 0) {
                    var html = '';
                    for(var i = 0; i < response.unidades_cursadas.length; i++) {
                        html += '<tr>';
                        html += '<td>' + (response.unidades_cursadas[i].codigo || 'N/A') + '</td>';
                        html += '<td>' + (response.unidades_cursadas[i].nombre_unidad || 'N/A') + '</td>';
                        html += '<td>' + (response.unidades_cursadas[i].trimestre || 'N/A') + '</td>';
                        html += '<td>' + (response.unidades_cursadas[i].creditos || 'N/A') + '</td>';
                        html += '</tr>';
                    }
                    $('#tablaUnidadesCursadas').html(html);
                } else {
                    $('#tablaUnidadesCursadas').html('<tr><td colspan="4" class="text-center text-muted">No hay unidades curriculares cursadas para reconocimiento</td></tr>');
                }
            } catch(e) {
                console.error('Error parsing JSON:', e);
                $('#tablaUnidadesCursa').html('<tr><td colspan="4" class="text-center text-danger">Error al cargar los datos</td></tr>');
                $('#tablaUnidadesCursadas').html('<tr><td colspan="4" class="text-center text-danger">Error al cargar los datos</td></tr>');
            }
        }
    };
    xhr.onerror = function() {
        $('#tablaUnidadesCursa').html('<tr><td colspan="4" class="text-center text-danger">Error de conexión</td></tr>');
        $('#tablaUnidadesCursadas').html('<tr><td colspan="4" class="text-center text-danger">Error de conexión</td></tr>');
    };
    xhr.send();
}

// Asegurar que el modal se inicialice correctamente
$(document).ready(function() {
    // Inicialización del modal si es necesario
    $('#modalUnidades').on('hidden.bs.modal', function () {
        // Limpiar contenido al cerrar el modal (opcional)
        console.log('Modal cerrado');
    });
});
</script>
<?php endif; ?>
