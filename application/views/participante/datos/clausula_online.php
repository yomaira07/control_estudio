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
                        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>dashboard04/inscripcion" style="color: #6c757d;">Inscripciones Posgrado - Oferta Académica</a></li>
                        <li class="breadcrumb-item active" style="color: #003366; font-weight: 600;">- Cláusula de Compromiso</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <!-- Main content -->
    <section class="content">
        <form action="<?php echo base_url(); ?>dashboard04/registrar_clausula/<?php echo $this->session->userdata('id'); ?>" 
              method="POST" 
              id="formClausula"
              name="formClausula"
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
                                    <img src="<?php echo base_url(); ?>assets/img/logo2.png" alt="Logo" style="width: 55px; height: 55px; border-radius: 50%; border: 2px solid #e9ecef; padding: 3px; background: white;">
                                    </div>
                                    <div>
                                        <h5 class="mb-0" style="font-weight: 600; color: #2c3e50;">
                                            <strong>Cláusula de Compromiso</strong>
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
                                        Aceptación Obligatoria
                                    </span>
                                </div>
                            </div>
                        </div>

                        <!-- Body -->
                        <div class="card-body p-4">

                            <!-- Mensajes de Alerta -->
                            <?php if ($this->session->flashdata("success")): ?>
                                <div class="alert alert-success alert-dismissible" style="border-radius: 8px; border-left: 4px solid #28a745;">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    <i class="icon fa fa-check-square mr-2"></i> <?php echo $this->session->flashdata("success"); ?>
                                </div>
                            <?php endif; ?>

                            <?php if ($this->session->flashdata("warning")): ?>
                                <div class="alert alert-warning alert-dismissible" style="border-radius: 8px; border-left: 4px solid #ffc107;">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    <i class="icon fa fa-exclamation-triangle mr-2"></i> <?php echo $this->session->flashdata("warning"); ?>
                                </div>
                            <?php endif; ?>

                            <?php if ($this->session->flashdata("error")): ?>
                                <div class="alert alert-danger alert-dismissible" style="border-radius: 8px; border-left: 4px solid #dc3545;">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    <i class="icon fa fa-ban mr-2"></i> <?php echo $this->session->flashdata("error"); ?>
                                </div>
                            <?php endif; ?>

                            <!-- Campos ocultos -->
                            <input type="hidden" name="id_usuario" value="<?php echo $this->session->userdata('id'); ?>">
                            <input type="hidden" name="id" value="<?php if ($datos_alumnos==false){echo "falso";}else{ echo $datos_alumnos->id; } ?>">
                            <input type="hidden" name="no_encontrado" value="<?php if ($datos_alumnos==false){echo "falso";}else{ echo $datos_alumnos->id; } ?>"> 
                            <input type="hidden" name="fecha_actualizacion" value="<?php echo date('d-m-Y H:i:s'); ?>">

                            <!-- Variables para controlar qué cláusulas se deben mostrar -->
                            <?php 
                            $tienePresencial = false;
                            $tieneDistancia = false;
                            $tieneSemipresencial = false;
                            $tieneTEG = false;
                            
                            foreach($modalidad as $mod){
                                if($mod->trimestre == 'TEG'){
                                    $tieneTEG = true;
                                } else {
                                    if($mod->modalidad == 1) $tienePresencial = true;
                                    if($mod->modalidad == 2) $tieneDistancia = true;
                                    if($mod->modalidad == 3) $tieneSemipresencial = true;
                                }
                            }
                            ?>

                            <!-- Información del Estudiante -->
                            <div class="row" align="justify">
                                <div class="col-md-12">
                                    <div class="alert" style="border-radius: 8px; border-left: 4px solid #003366; background: #e8f0fe; color: #2c3e50;">
                                        <i class="fas fa-user-graduate mr-2" style="color: #003366;"></i>
                                        Se acuerda suscribir la presente Cláusula Compromisoria entre el o la estudiante, 
                                        <b><?php echo $datos_alumnos->nombre_primer.' '. $datos_alumnos->nombre_segundo.' '.$datos_alumnos->apellido_primer.' '.$datos_alumnos->apellido_segundo; ?></b> 
                                        titular de la Cédula de Identidad Nº <b><?php echo number_format($datos_alumnos->cedula,0,'', '.');?></b>, 
                                        aspirante a cursar las siguientes unidades curriculares:
                                    </div>
                                </div>
                            </div>

                            <!-- BOTONES PARA VER CLÁUSULAS - COLORES ADMINLTE -->
                            <div align="center" title="Debe hacer clic en cada botón para ver y aceptar las cláusulas correspondientes">
                                <div class="row">
                                    <div class="col-md-12">
                                        <?php if($tienePresencial): ?>
                                        <div style="display: inline-block; margin: 10px;">
                                            <img src="<?php echo base_url(); ?>assets/img/presencial.png" style="width: 25mm; height: 25mm; margin: 0;"/>
                                            <button type="button" class="btn btn-info" data-toggle="collapse" href="#multiCollapseExample1" role="button" aria-expanded="false" aria-controls="multiCollapseExample1" onclick="marcarVisto('presencial')" style="border-radius: 10px; padding: 8px 16px; transition: all 0.2s;">
                                                <b>Ver Cláusula Compromisoria</b> Modalidad Presencial
                                            </button>
                                            <span id="estado_presencial" style="display: none; color: #28a745; margin-left: 10px;">
                                                <i class="fa fa-check-circle"></i> Visto
                                            </span>
                                        </div>
                                        <?php endif; ?>
                                        
                                        <?php if($tieneDistancia): ?>
                                        <div style="display: inline-block; margin: 10px;">
                                            <img src="<?php echo base_url(); ?>assets/img/virtual.png" style="width: 20mm; height: 20mm; margin: 0;"/>
                                            <button type="button" class="btn btn-success" data-toggle="collapse" href="#multiCollapseExample2" role="button" aria-expanded="false" aria-controls="multiCollapseExample2" onclick="marcarVisto('distancia')" style="border-radius: 10px; padding: 8px 16px; transition: all 0.2s;">
                                                <b>Ver Cláusula Compromisoria</b> Modalidad A Distancia
                                            </button>
                                            <span id="estado_distancia" style="display: none; color: #28a745; margin-left: 10px;">
                                                <i class="fa fa-check-circle"></i> Visto
                                            </span>
                                        </div>
                                        <?php endif; ?>
                                        
                                        <?php if($tieneSemipresencial): ?>
                                        <div style="display: inline-block; margin: 10px;">
                                            <img src="<?php echo base_url(); ?>assets/img/semip.png" style="width: 20mm; height: 20mm; margin: 0;"/>
                                            <button type="button" class="btn btn-warning" data-toggle="collapse" href="#multiCollapseExample3" role="button" aria-expanded="false" aria-controls="multiCollapseExample3" onclick="marcarVisto('semipresencial')" style="border-radius: 10px; padding: 8px 16px; transition: all 0.2s;">
                                                <b>Ver Cláusula Compromisoria</b> Modalidad Semipresencial
                                            </button>
                                            <span id="estado_semipresencial" style="display: none; color: #28a745; margin-left: 10px;">
                                                <i class="fa fa-check-circle"></i> Visto
                                            </span>
                                        </div>
                                        <?php endif; ?>
                                        
                                        <?php if($tieneTEG): ?>
                                        <div style="display: inline-block; margin: 10px;">
                                            <img src="<?php echo base_url(); ?>assets/img/teg.png" style="width: 20mm; height: 20mm; margin: 0;"/>
                                            <button type="button" class="btn btn-danger" data-toggle="collapse" href="#multiCollapseExample4" role="button" aria-expanded="false" aria-controls="multiCollapseExample4" onclick="marcarVisto('teg')" style="border-radius: 1px; padding: 8px 16px; transition: all 0.2s;">
                                                <b>Ver Cláusula Compromisoria</b> TEG ó TG
                                            </button>
                                            <span id="estado_teg" style="display: none; color: #28a745; margin-left: 10px;">
                                                <i class="fa fa-check-circle"></i> Visto
                                            </span>
                                        </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                          
                            </div>

                            <!-- CONTENIDO DE LAS CLÁUSULAS -->
                            <!-- Modalidad Presencial -->
                            <?php if($tienePresencial): ?>
                            <div class="row">
                                <div class="col">
                                    <div class="collapse multi-collapse" id="multiCollapseExample1">
                                        <div class="card card-body" style="border-radius: 8px; border: 1px solid #e8e8e8; margin-top: 15px;">
                                            <div class="table-responsive">
                                                <table class="table table-hover" style="border-radius: 8px; overflow: hidden; font-size:12pt;">
                                                    <thead style="background: linear-gradient(135deg, #003366 0%, #1a5276 100%); color: white;">
                                                        <tr>
                                                            <th align="center" style="padding: 10px 15px;">ESPECIALIZACIÓN</th>
                                                            <th align="center" style="padding: 10px 15px;">TRIMESTRE</th>
                                                            <th align="center" style="padding: 10px 15px;">UNIDAD CURRICULAR</th>  
                                                            <th align="center" style="padding: 10px 15px;">DÍA DE CLASE</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php foreach($materiasP as $materias){ 
                                                            if($materias->modalidad==1){ ?>
                                                        <tr style="border-bottom: 1px solid #f0f0f0;">
                                                            <td align="center" style="padding: 10px 15px;"><?php echo $materias->programa;?></td>
                                                            <td align="center" style="padding: 10px 15px;"><span class="badge" style="background: #e9ecef; color: #495057; padding: 4px 12px; border-radius: 20px;"><?php echo $materias->trimestre;?></span></td>
                                                            <td align="center" style="padding: 10px 15px;"><?php echo $materias->unidad_curricular;?></td>    
                                                            <td align="center" style="padding: 10px 15px;"><?php if($materias->id_dia_clase>=1 and $materias->id_dia_clase<=5 or $materias->id_dia_clase==8) echo "Semanal"; elseif($materias->id_dia_clase>=6 and $materias->id_dia_clase<=7) echo "Sabatino"; ?></td>
                                                        </tr>   
                                                        <?php }
                                                        }?>
                                                    </tbody>
                                                </table>
                                            </div>
                                            
                                            <div style="margin-top: 15px;">
                                                <p align="justify"><img src="<?php echo base_url(); ?>assets/img/presencial.png" title="MODALIDAD PRESENCIAL" style="width: 15mm; height: 15mm; margin: 0 10px 0 0; float: left;"/>La Escuela Nacional de Fiscales del Ministerio Público, donde se establece que:</p>
                                                <p><b>1.</b> Si estando en el ejercicio de sus funciones como fiscal, funcionario o funcionaria, empleado o empleada del Ministerio Público resulta ser objeto de retiro, remoción, cese de comisión de servicio o renuncia, durante su régimen de permanencia en esta Institución, el o la estudiante reconoce, acepta y acuerda abandonar su asistencia académica total y de forma inmediata en el mencionado programa de postgrado, asumiendo que no puede continuar sus estudios en la ENFMP.</p>
                                                <p><b>2.</b> Acepta que este trimestre será en todo su desarrollo <b>bajo MODALIDAD PRESENCIAL</b> y se apegará al horario de clases establecido por la ENFMP</p>
                                                <p><b>3.</b> Conoce que la <b>participación activa</b> será evaluada en cada encuentro académico y tendrá una ponderación en el plan de evaluación.</p>
                                                <p><b>4.</b> Como miembro responsable de la ENFMP, <b>respetará a las y los docentes, autoridades y personal administrativo que forma parte de esta casa de estudios,</b> dejando claro que el Reglamento Interno de Estudios de la Escuela Nacional de Fiscales del Ministerio Público <b>sanciona</b> cualquier actitud que vulnere a quienes forman parte de la comunidad académica y es <b>motivo de retiro.</b></p>
                                                <p><b>5.</b> Acatará los acuerdos entre docente y grupo de clases,</b> en relación al desarrollo de las actividades académicas y las estrategias evaluativas a utilizar, dejando explícitamente establecido que queda a criterio de cada docente proporcionar la alternativa de recuperar alguna evaluación y las normas que regirán su desarrollo, teniendo autonomía para tomar tal decisión.</p>
                                                <p><b>6.</b> Seguirá los canales regulares de comunicación establecidos por la ENFMP, siendo el horario de atención de lunes a viernes de 8:00 a.m. a 4:00 p.m., a través de medios electrónicos o entornos virtuales, mientras que de forma presencial serán atendidos por el personal que se encuentre de guardia en las Direcciones de Secretaría General e Investigación y Postgrado, de lunes a viernes de 8:00 a.m. a 3:30 p.m. y los sábados de 8:30 a.m. a 3:30 p.m.</p>
                                                <p><b>7.</b> <b>Actuará con la moral y ética que exige toda actividad académica,</b> siguiendo los lineamientos de la ENFMP, su metodología de estudio, normas de redacción, originalidad en las ideas que exprese y reconociendo la autoría de cualquier material de referencia que permita expresar las ideas que se soliciten en alguna actividad participativa o evaluativa, comprendiendo que <b>el plagio académico es motivo de retiro en cualquier momento del postgrado.</b></p>
                                                <p><b>8.</b> Hará buen uso de las instalaciones, mobiliario y equipos de trabajo de la Escuela Nacional de Fiscales del Ministerio Público, durante su permanencia en el recinto.</p>
                                                <p><b>9.</b> Asume que es una <b>falta leve</b> trasladar materiales o mobiliario de un recinto a otro, dentro de la Escuela y es una <b>falta grave</b> trasladar bienes muebles fuera de la sede de la Escuela Nacional de Fiscales del Ministerio Público sin la debida autorización.</p>
                                                <p><b>10.</b> Estará atento(a) para discutir con el/la docente los resultados de las actividades de evaluación a medida que se vayan produciendo, así como recibir las recomendaciones y realizar las medidas necesarias para la corrección de las deficiencias observadas en su proceso de aprendizaje.</p>
                                                <p><b>11.</b> Conoce que el resultado de su proceso de aprendizaje será evaluado de forma independiente en cada unidad curricular, con la escala de calificaciones que va desde uno (01) a veinte (20) puntos, ambas inclusive y que para ser aprobada la unidad curricular se requiere obtener la calificación definitiva mínima de quince (15) puntos, mientras que para egresar del Programa de Postgrado debe obtener un índice académico acumulado de quince (15) puntos en adelante.</p>
                                                <p><b>12.</b> Conoce que podrá repetir solo una unidad curricular y en una sola oportunidad en todo el programa de postgrado.</p>
                                                <p><b>13.</b> Conoce que si cursa simultáneamente dos o más programas de postgrado y sea reprobada o reprobado en una (1) unidad curricular en cada uno de los programas, deberá decidir continuar en uno (1) de los mismos, aplicándose en los demás el retiro por causales académicas. Una vez haya egresado del postgrado de su elección, podrá participar en el proceso de selección de aspirantes para el o los programas inconclusos y una vez haya realizado la inscripción formal, solicitará el reconocimiento de unidades crédito por las unidades curriculares aprobadas.</p>
                                                <p><b>14.</b> <b>Es responsable de la veracidad de la información suministrada</b> y asume las implicaciones que se pudieran derivar de proporcionar datos falsos o erróneos: <b>Cada estudiante es responsable de la información que coloca en este registro.</b></p>
                                                <br>
                                                <p>Asimismo, reconoce, acepta y acuerda el o la estudiante <b><?php echo $datos_alumnos->nombre_primer.' '. $datos_alumnos->nombre_segundo.' '.$datos_alumnos->apellido_primer.' '.$datos_alumnos->apellido_segundo; ?></b> titular de la Cédula de Identidad Nº <b><?php echo number_format($datos_alumnos->cedula,0,'', '.');?></b> que, la Escuela Nacional de Fiscales del Ministerio Público, queda exonerada de indemnizarle en forma alguna o de cualquier intento de demanda civil o penal, lo que no implica en modo alguno menoscabo de su derecho a la defensa, establecido en el artículo 49, numeral 2 de la Constitución de la República Bolivariana de Venezuela.</p>
                                            </div>
                                            
                                            <div class="col-12">
                                                <div align="center" style="margin-top: 20px; padding: 15px; background: #e8f0fe; border-radius: 8px;">
                                                    <h2 style="font-size: 1.1rem; margin: 0;">
                                                        <input type="checkbox" id="acepto_presencial" name="acepto_presencial" value="1" title="Acepto los términos" onclick="validarCheckbox('presencial')" style="transform: scale(1.2); margin-right: 10px;">
                                                        <strong>Acepto términos y condiciones <b style="color: #17a2b8;">MODALIDAD PRESENCIAL</b></strong>
                                                    </h2>
                                                </div>                    
                                            </div>  
                                        </div>                
                                    </div>
                                </div>
                            </div>
                            <?php endif; ?>

                            <!-- Modalidad A Distancia -->
                            <?php if($tieneDistancia): ?>
                            <div class="row">
                                <div class="col">
                                    <div class="collapse multi-collapse" id="multiCollapseExample2">
                                        <div class="card card-body" style="border-radius: 8px; border: 1px solid #e8e8e8; margin-top: 15px;">
                                            <div class="table-responsive">
                                                <table class="table table-hover" style="border-radius: 8px; overflow: hidden; font-size:12pt;">
                                                    <thead style="background: linear-gradient(135deg, #003366 0%, #1a5276 100%); color: white;">
                                                        <tr>
                                                            <th align="center" style="padding: 10px 15px;">ESPECIALIZACIÓN</th>
                                                            <th align="center" style="padding: 10px 15px;">TRIMESTRE</th>
                                                            <th align="center" style="padding: 10px 15px;">UNIDAD CURRICULAR</th>    
                                                            <th align="center" style="padding: 10px 15px;">DÍA DE CLASES</th>                            
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php foreach($materiasV as $materias){ 
                                                            if($materias->modalidad==2){ ?>
                                                        <tr style="border-bottom: 1px solid #f0f0f0;">
                                                            <td align="center" style="padding: 10px 15px;"><?php echo $materias->programa;?></td>
                                                            <td align="center" style="padding: 10px 15px;"><span class="badge" style="background: #e9ecef; color: #495057; padding: 4px 12px; border-radius: 20px;"><?php echo $materias->trimestre;?></span></td>
                                                            <td align="center" style="padding: 10px 15px;"><?php echo $materias->unidad_curricular;?></td>   
                                                            <td align="center" style="padding: 10px 15px;"><?php if($materias->id_dia_clase>=1 and $materias->id_dia_clase<=5 or $materias->id_dia_clase==8) echo "Semanal"; elseif($materias->id_dia_clase>=6 and $materias->id_dia_clase<=7) echo "Sabatino"; ?></td>
                                                        </tr>   
                                                        <?php }
                                                        }?>
                                                    </tbody>
                                                </table>
                                            </div>
                                            
                                            <div style="margin-top: 15px;">
                                                <p align="justify"><img src="<?php echo base_url(); ?>assets/img/virtual.png" title="MODALIDAD A DISTANCIA" style="width: 15mm; height: 15mm; margin: 0 10px 0 0; float: left;"/>La Escuela Nacional de Fiscales del Ministerio Público, donde se establece que:</p>
                                                <p><b>1.</b> Si estando en el ejercicio de sus funciones como fiscal, funcionario o funcionaria, empleado o empleada del Ministerio Público resulta ser objeto de retiro, remoción, cese de comisión de servicio o renuncia, durante su régimen de permanencia en esta Institución, el o la estudiante reconoce, acepta y acuerda abandonar su asistencia académica total y de forma inmediata, a los grupos de WhatsApp y Google Classroom, en los que se impartan las unidades curriculares respectivas a la malla curricular establecida para el mencionado postgrado, asumiendo que no puede continuar sus estudios en la ENFMP.</p>
                                                <p><b>2.</b> Acepta que este trimestre será en todo su desarrollo <b>modalidad a distancia</b>, que cuenta con servicio de internet y se apegará al horario de clases establecido por la ENFMP.</p>
                                                <p><b>3.</b> Conoce que la <b>participación activa</b> será evaluada en cada encuentro académico y tendrá una ponderación en el plan de evaluación.</p>
                                                <p><b>4.</b> Tiene <b>conocimiento instrumental</b> de recursos como correo electrónico <b>GMAIL, teléfono con aplicación WhatsApp, Classroom, Google Meet, formularios en Google Forms</b> (recursos y aplicaciones que conoce su funcionalidad y comprende que sirven como medio instruccional para escuchar, visualizar, transmitir contenido y adjuntar documentos según lo solicite el o la docente).</p>
                                                <p><b>5.</b> Se compromete a <b>asistir puntualmente y participar activamente</b> en la actividad académica en los horarios señalados y <b>está consciente que las limitaciones de servicio eléctrico, internet u otros servicios en la zona donde reside no son responsabilidad de la ENFMP,</b> por lo cual solamente <b>podrá optar a aprobar</b> la(s) unidad (es) curricular(es) <b>si cumple con lo señalado.</b></p>
                                                <p><b>6.</b> Como miembro responsable de la ENFMP, <b>respetará a las y los docentes, autoridades y personal administrativo y obrero que forma parte de esta casa de estudios,</b> dejando claro que el Reglamento Interno de Estudios de la Escuela Nacional de Fiscales del Ministerio Público <b>sanciona</b> cualquier actitud que vulnere a quienes forman parte de la comunidad académica y es <b>motivo de retiro.</b></p>
                                                <p><b>7.</b> <b>Acatará los acuerdos entre docente y grupo de clases,</b> en relación al desarrollo de las actividades académicas y las estrategias evaluativas a utilizar, dejando explícitamente establecido que queda a criterio de cada docente proporcionar la alternativa de recuperar alguna evaluación y las normas que regirán su desarrollo, teniendo autonomía para tomar tal decisión.</p>
                                                <p><b>8.</b> Seguirá los canales regulares de comunicación establecidos por la ENFMP, siendo el horario de atención de lunes a viernes de 8:00 a.m. a 4:00 p.m., a través de medios electrónicos o entornos virtuales.</p>
                                                <p><b>9.</b> <b>Actuará con la moral y ética que exige toda actividad académica,</b> siguiendo los lineamientos de la ENFMP, su metodología de estudio, normas de redacción, originalidad en las ideas que exprese y reconociendo la autoría de cualquier material de referencia que permita expresar las ideas que se soliciten en alguna actividad participativa o evaluativa, comprendiendo que <b>el plagio académico es motivo de retiro en cualquier momento del postgrado.</b></p>
                                                <p><b>10.</b> Estará atento(a) para discutir con el/la docente los resultados de las actividades de evaluación a medida que se vayan produciendo, así como recibir las recomendaciones y realizar las medidas necesarias para la corrección de las deficiencias observadas en su proceso de aprendizaje.</p>
                                                <p><b>11.</b> Conoce que las calificaciones estarán disponibles en <b>Google Classroom</b> y serán cargadas por la/el docente en el Sistema de Control de Estudios. Estará atento(a) para discutir con el/la docente los resultados de las actividades de evaluación a medida que se vayan produciendo, así como recibir las recomendaciones y realizar las medidas necesarias para la corrección de las deficiencias observadas en su proceso de aprendizaje.</p>
                                                <p><b>12.</b> Conoce que el resultado de su proceso de aprendizaje será evaluado de forma independiente en cada unidad curricular, con la escala de calificaciones que va desde uno (01) a veinte (20) puntos, ambas inclusive y que para ser aprobada la unidad curricular se requiere obtener la calificación definitiva mínima de quince (15) puntos, mientras que para egresar del Programa de Postgrado debe obtener un índice académico acumulado de quince (15) puntos en adelante.</p>
                                                <p><b>13.</b> Conoce que podrá repetir solo una unidad curricular y en una sola oportunidad en todo el programa de postgrado.</p>
                                                <p><b>14.</b> Conoce que si cursa simultáneamente dos o más programas de postgrado y sea reprobada o reprobado en una (1) unidad curricular en cada uno de los programas, deberá decidir continuar en uno (1) de los mismos, aplicándose en los demás el retiro por causales académicas. Una vez haya egresado del postgrado de su elección, podrá participar en el proceso de selección de aspirantes para el o los programas inconclusos y una vez haya realizado la inscripción formal, solicitará el reconocimiento de unidades crédito por las unidades curriculares aprobadas.</p>
                                                <p><b>15.</b> <b>Es responsable de la veracidad de la información suministrada</b> y asume las implicaciones que se pudieran derivar de proporcionar datos falsos o erróneos: <b>Cada estudiante es responsable de la información que coloca en este registro.</b></p>
                                                <p>Asimismo, reconoce, acepta y acuerda el o la estudiante <b><?php echo $datos_alumnos->nombre_primer.' '. $datos_alumnos->nombre_segundo.' '.$datos_alumnos->apellido_primer.' '.$datos_alumnos->apellido_segundo; ?></b> titular de la Cédula de Identidad Nº <b><?php echo number_format($datos_alumnos->cedula,0,'', '.');?></b> que, la Escuela Nacional de Fiscales del Ministerio Público, queda exonerada de indemnizarle en forma alguna o de cualquier intento de demanda civil o penal, lo que no implica en modo alguno menoscabo de su derecho a la defensa, establecido en el artículo 49, numeral 2 de la Constitución de la República Bolivariana de Venezuela.</p>
                                            </div>
                                            
                                            <div class="col-12">
                                                <div align="center" style="margin-top: 20px; padding: 15px; background: #e8f0fe; border-radius: 8px;">
                                                    <h2 style="font-size: 1.1rem; margin: 0;">
                                                        <input type="checkbox" id="acepto_distancia" name="acepto_distancia" value="2" title="Acepto los términos y condiciones" onclick="validarCheckbox('distancia')" style="transform: scale(1.2); margin-right: 10px;">
                                                        <strong>Acepto términos y condiciones <b style="color: #28a745;">MODALIDAD A DISTANCIA</b></strong>
                                                    </h2>
                                                </div>                    
                                            </div>                   
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php endif; ?>

                            <!-- Modalidad Semipresencial -->
                            <?php if($tieneSemipresencial): ?>
                            <div class="row">
                                <div class="col">
                                    <div class="collapse multi-collapse" id="multiCollapseExample3">
                                        <div class="card card-body" style="border-radius: 8px; border: 1px solid #e8e8e8; margin-top: 15px;">
                                            <div class="table-responsive">
                                                <table class="table table-hover" style="border-radius: 8px; overflow: hidden; font-size:12pt;">
                                                    <thead style="background: linear-gradient(135deg, #003366 0%, #1a5276 100%); color: white;">
                                                        <tr>
                                                            <th align="center" style="padding: 10px 15px;">ESPECIALIZACIÓN</th>
                                                            <th align="center" style="padding: 10px 15px;">TRIMESTRE</th>
                                                            <th align="center" style="padding: 10px 15px;">UNIDAD CURRICULAR</th>    
                                                            <th align="center" style="padding: 10px 15px;">DÍA DE CLASES</th>                            
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php foreach($materiasSP as $materias){ 
                                                            if($materias->modalidad==3){ ?>
                                                        <tr style="border-bottom: 1px solid #f0f0f0;">
                                                            <td align="center" style="padding: 10px 15px;"><?php echo $materias->programa;?></td>
                                                            <td align="center" style="padding: 10px 15px;"><span class="badge" style="background: #e9ecef; color: #495057; padding: 4px 12px; border-radius: 20px;"><?php echo $materias->trimestre;?></span></td>
                                                            <td align="center" style="padding: 10px 15px;"><?php echo $materias->unidad_curricular;?></td>   
                                                            <td align="center" style="padding: 10px 15px;"><?php if($materias->id_dia_clase>=1 and $materias->id_dia_clase<=5 or $materias->id_dia_clase==8) echo "Semanal"; elseif($materias->id_dia_clase>=6 and $materias->id_dia_clase<=7) echo "Sabatino"; ?></td>
                                                        </tr>   
                                                        <?php }
                                                        }?>
                                                    </tbody>
                                                </table>
                                            </div>
                                            
                                            <div style="margin-top: 15px;">
                                                <p align="justify"><img src="<?php echo base_url(); ?>assets/img/semip.png" style="width: 15mm; height: 15mm; margin: 0 10px 0 0; float: left;" title="MODALIDAD SEMIPRESENCIAL"/>La Escuela Nacional de Fiscales del Ministerio Público, donde se establece que:</p>
                                                <p><b>1.</b> Si estando en el ejercicio de sus funciones como fiscal, funcionario o funcionaria, empleado o empleada del Ministerio Público resulta ser objeto de retiro, remoción, cese de comisión de servicio o renuncia, durante su régimen de permanencia en esta Institución, el o la estudiante reconoce, acepta y acuerda abandonar su asistencia académica total y de forma inmediata, a los grupos de WhatsApp y Google Classroom, en los que se impartan las unidades curriculares respectivas a la malla curricular establecida para el mencionado postgrado, asumiendo que no puede continuar sus estudios en la ENFMP.</p>
                                                <p><b>2.</b> Acepta que este trimestre será en todo su desarrollo <b>bajo MODALIDAD SEMIPRESENCIAL</b>, que cuenta con servicio de internet y se apegará al horario de clases establecido por la ENFMP.</p>
                                                <p><b>3.</b> Conoce que la <b>participación activa</b> será evaluada en cada encuentro académico y tendrá una ponderación en el plan de evaluación.</p>
                                                <p><b>4.</b> Tiene <b>conocimiento instrumental</b> de recursos como correo electrónico <b>GMAIL, teléfono con aplicación WhatsApp, Classroom, Google Meet, formularios en Google Forms</b> (recursos y aplicaciones que conoce su funcionalidad y comprende que sirven como medio instruccional para escuchar, visualizar, transmitir contenido y adjuntar documentos según lo solicite el o la docente).</p>
                                                <p><b>5.</b> Se compromete a <b>asistir puntualmente y participar activamente</b> en la actividad académica en los horarios señalados y <b>está consciente que las limitaciones de servicio eléctrico, internet u otros servicios en la zona donde reside no son responsabilidad de la ENFMP,</b> por lo cual solamente <b>podrá optar a aprobar</b> la(s) unidad (es) curricular(es) <b>si cumple con lo señalado.</b></p>
                                                <p><b>6.</b> Como miembro responsable de la ENFMP, <b>respetará a las y los docentes, autoridades y personal administrativo y obrero que forma parte de esta casa de estudios,</b> dejando claro que el Reglamento Interno de Estudios de la Escuela Nacional de Fiscales del Ministerio Público <b>sanciona</b> cualquier actitud que vulnere a quienes forman parte de la comunidad académica y es <b>motivo de retiro.</b></p>
                                                <p><b>7.</b> <b>Acatará los acuerdos entre docente y grupo de clases,</b> en relación al desarrollo de las actividades académicas y las estrategias evaluativas a utilizar, dejando explícitamente establecido que queda a criterio de cada docente proporcionar la alternativa de recuperar alguna evaluación y las normas que regirán su desarrollo, teniendo autonomía para tomar tal decisión.</p>
                                                <p><b>8.</b> Seguirá los canales regulares de comunicación establecidos por la ENFMP, siendo el horario de atención de lunes a viernes de 8:00 a.m. a 4:00 p.m., a través de medios electrónicos o entornos virtuales.</p>
                                                <p><b>9.</b> <b>Actuará con la moral y ética que exige toda actividad académica,</b> siguiendo los lineamientos de la ENFMP, su metodología de estudio, normas de redacción, originalidad en las ideas que exprese y reconociendo la autoría de cualquier material de referencia que permita expresar las ideas que se soliciten en alguna actividad participativa o evaluativa, comprendiendo que <b>el plagio académico es motivo de retiro en cualquier momento del postgrado.</b></p>
                                                <p><b>10.</b> Estará atento(a) para discutir con el/la docente los resultados de las actividades de evaluación a medida que se vayan produciendo, así como recibir las recomendaciones y realizar las medidas necesarias para la corrección de las deficiencias observadas en su proceso de aprendizaje.</p>
                                                <p><b>11.</b> Conoce que las calificaciones estarán disponibles en <b>Google Classroom</b> y serán cargadas por la/el docente en el Sistema de Control de Estudios. Estará atento(a) para discutir con el/la docente los resultados de las actividades de evaluación a medida que se vayan produciendo, así como recibir las recomendaciones y realizar las medidas necesarias para la corrección de las deficiencias observadas en su proceso de aprendizaje.</p>
                                                <p><b>12.</b> Conoce que el resultado de su proceso de aprendizaje será evaluado de forma independiente en cada unidad curricular, con la escala de calificaciones que va desde uno (01) a veinte (20) puntos, ambas inclusive y que para ser aprobada la unidad curricular se requiere obtener la calificación definitiva mínima de quince (15) puntos, mientras que para egresar del Programa de Postgrado debe obtener un índice académico acumulado de quince (15) puntos en adelante.</p>
                                                <p><b>13.</b> Conoce que podrá repetir solo una unidad curricular y en una sola oportunidad en todo el programa de postgrado.</p>
                                                <p><b>14.</b> Conoce que si cursa simultáneamente dos o más programas de postgrado y sea reprobada o reprobado en una (1) unidad curricular en cada uno de los programas, deberá decidir continuar en uno (1) de los mismos, aplicándose en los demás el retiro por causales académicas. Una vez haya egresado del postgrado de su elección, podrá participar en el proceso de selección de aspirantes para el o los programas inconclusos y una vez haya realizado la inscripción formal, solicitará el reconocimiento de unidades crédito por las unidades curriculares aprobadas.</p>
                                                <p><b>15.</b> <b>Es responsable de la veracidad de la información suministrada</b> y asume las implicaciones que se pudieran derivar de proporcionar datos falsos o erróneos: <b>Cada estudiante es responsable de la información que coloca en este registro.</b></p>
                                                <p>Asimismo, reconoce, acepta y acuerda el o la estudiante <b><?php echo $datos_alumnos->nombre_primer.' '. $datos_alumnos->nombre_segundo.' '.$datos_alumnos->apellido_primer.' '.$datos_alumnos->apellido_segundo; ?></b> titular de la Cédula de Identidad Nº <b><?php echo number_format($datos_alumnos->cedula,0,'', '.');?></b> que, la Escuela Nacional de Fiscales del Ministerio Público, queda exonerada de indemnizarle en forma alguna o de cualquier intento de demanda civil o penal, lo que no implica en modo alguno menoscabo de su derecho a la defensa, establecido en el artículo 49, numeral 2 de la Constitución de la República Bolivariana de Venezuela.</p>
                                            </div>
                                            
                                            <div align="center" style="margin-top: 20px; padding: 15px; background: #e8f0fe; border-radius: 8px;">
                                                <h2 style="font-size: 1.1rem; margin: 0;">
                                                    <input type="checkbox" id="acepto_semip" name="acepto_semip" value="3" title="Acepto los términos y condiciones" onclick="validarCheckbox('semipresencial')" style="transform: scale(1.2); margin-right: 10px;">
                                                    <strong>Acepto términos y condiciones <b style="color: #ffc107;">MODALIDAD SEMIPRESENCIAL</b></strong>
                                                </h2>
                                            </div>                    
                                        </div>                   
                                    </div>
                                </div>
                            </div>
                            <?php endif; ?>

                            <!-- TEG o TG -->
                            <?php if($tieneTEG): ?>
                            <div class="row">
                                <div class="col">
                                    <div class="collapse multi-collapse" id="multiCollapseExample4">
                                        <div class="card card-body" style="border-radius: 8px; border: 1px solid #e8e8e8; margin-top: 15px;">
                                            <div class="table-responsive">
                                                <table class="table table-hover" style="border-radius: 8px; overflow: hidden; font-size:12pt;">
                                                    <thead style="background: linear-gradient(135deg, #003366 0%, #1a5276 100%); color: white;">
                                                        <tr>
                                                            <th align="center" style="padding: 10px 15px;">ESPECIALIZACIÓN</th>
                                                            <th align="center" style="padding: 10px 15px;">TRIMESTRE</th>
                                                            <th align="center" style="padding: 10px 15px;">UNIDAD CURRICULAR</th>    
                                                            <th align="center" style="padding: 10px 15px;">DÍA DE CLASES</th>                            
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php foreach($materiasTG as $materias){ ?>
                                                        <tr style="border-bottom: 1px solid #f0f0f0;">
                                                            <td align="center" style="padding: 10px 15px;"><?php echo $materias->programa;?></td>
                                                            <td align="center" style="padding: 10px 15px;"><span class="badge" style="background: #e9ecef; color: #495057; padding: 4px 12px; border-radius: 20px;"><?php echo $materias->trimestre;?></span></td>
                                                            <td align="center" style="padding: 10px 15px;"><?php echo $materias->unidad_curricular;?></td>   
                                                            <td align="center" style="padding: 10px 15px;"><?php if($materias->id_dia_clase>=1 and $materias->id_dia_clase<=5 or $materias->id_dia_clase==8) echo "Semanal"; elseif($materias->id_dia_clase>=6 and $materias->id_dia_clase<=7) echo "Sabatino"; ?></td>
                                                        </tr>   
                                                        <?php }?>
                                                    </tbody>
                                                </table>
                                            </div>
                                            
                                            <div style="margin-top: 15px;">
                                                <p align="justify"><img src="<?php echo base_url(); ?>assets/img/teg.png" style="width: 15mm; height: 15mm; margin: 0 10px 0 0; float: left;" title="CLAÚSULA TEG O TG"/>La Escuela Nacional de Fiscales del Ministerio Público, donde se establece que:</p>
                                                <p><b>1.</b> Si estando en el ejercicio de sus funciones como fiscal, funcionario o funcionaria, empleado o empleada del Ministerio Público resulta ser objeto de retiro, remoción, cese de comisión de servicio o renuncia, durante su régimen de permanencia en esta Institución, el o la estudiante reconoce, acepta y acuerda abandonar su asistencia académica total y de forma inmediata, a los grupos de WhatsApp y Google Classroom, en los que se impartan las unidades curriculares respectivas a la malla curricular establecida para el mencionado postgrado, asumiendo que no puede continuar sus estudios en la ENFMP.</p>
                                                <p><b>2.</b> Tiene <b>conocimiento instrumental</b> de recursos como correo electrónico <b>GMAIL, teléfono con aplicación WhatsApp, Classroom, Google Meet, formularios en Google Forms</b> (recursos y aplicaciones que conoce su funcionalidad y comprende que sirven como medio instruccional para escuchar, visualizar, transmitir contenido y adjuntar documentos según lo solicite el o la docente).</p>
                                                <p><b>3.</b> Como miembro responsable de la ENFMP, <b>respetará a las y los docentes, autoridades y personal administrativo y obrero que forma parte de esta casa de estudios,</b> dejando claro que el Reglamento Interno de Estudios de la Escuela Nacional de Fiscales del Ministerio Público <b>sanciona</b> cualquier actitud que vulnere a quienes forman parte de la comunidad académica y es <b>motivo de retiro.</b></p>
                                                <p><b>4.</b> <b>Acatará los acuerdos entre docente y grupo de clases,</b> en relación al desarrollo de las actividades académicas y las estrategias evaluativas a utilizar, dejando explícitamente establecido que queda a criterio de cada docente proporcionar la alternativa de recuperar alguna evaluación y las normas que regirán su desarrollo, teniendo autonomía para tomar tal decisión.</p>
                                                <p><b>5.</b> Seguirá los canales regulares de comunicación establecidos por la ENFMP, siendo el horario de atención de lunes a viernes de 8:00 a.m. a 4:00 p.m., a través de medios electrónicos o entornos virtuales.</p>
                                                <p><b>6.</b> <b>Actuará con la moral y ética que exige toda actividad académica,</b> siguiendo los lineamientos de la ENFMP, su metodología de estudio, normas de redacción, originalidad en las ideas que exprese y reconociendo la autoría de cualquier material de referencia que permita expresar las ideas que se soliciten en alguna actividad participativa o evaluativa, comprendiendo que <b>el plagio académico es motivo de retiro en cualquier momento del postgrado.</b></p>
                                                <p><b>7.</b> Atender a las observaciones realizadas por cualquier miembro del jurado evaluador a medida que se vayan produciendo, así como recibir las recomendaciones y realizar las medidas necesarias para la corrección de las deficiencias observadas en su proceso de aprendizaje.</p>
                                                <p><b>8.</b> Conoce que el <b>Trabajo Especial de Grado o Trabajo de Grado</b> será evaluado por cada miembro del jurado evaluador con la escala de calificaciones que va desde uno (01) a veinte (20) puntos, ambas inclusive y que para aprobar se requiere obtener la calificación definitiva mínima de quince (15) puntos.</p>
                                                <p><b>9.</b> Conoce que si cursa simultáneamente dos o más programas de postgrado y sea reprobada o reprobado por incurrir en plagio en el Trabajo Especial de Grado, será aplicado el Retiro de Matrícula de los demás, por causales académicas.</p>
                                                <p><b>10.</b> <b>Es responsable de la veracidad de la información suministrada</b> y asume las implicaciones que se pudieran derivar de proporcionar datos falsos o erróneos: <b>Cada estudiante es responsable de la información que coloca en este registro.</b></p>
                                                <p>Asimismo, reconoce, acepta y acuerda el o la estudiante <b><?php echo $datos_alumnos->nombre_primer.' '. $datos_alumnos->nombre_segundo.' '.$datos_alumnos->apellido_primer.' '.$datos_alumnos->apellido_segundo; ?></b> titular de la Cédula de Identidad Nº <b><?php echo number_format($datos_alumnos->cedula,0,'', '.');?></b> que, la Escuela Nacional de Fiscales del Ministerio Público, queda exonerada de indemnizarle en forma alguna o de cualquier intento de demanda civil o penal, lo que no implica en modo alguno menoscabo de su derecho a la defensa, establecido en el artículo 49, numeral 2 de la Constitución de la República Bolivariana de Venezuela.</p>
                                            </div>
                                            
                                            <div align="center" style="margin-top: 20px; padding: 15px; background: #e8f0fe; border-radius: 8px;">
                                                <h2 style="font-size: 1.1rem; margin: 0;">
                                                    <input type="checkbox" id="acepto_teg" name="acepto_teg" value="4" title="Acepto los términos y condiciones" onclick="validarCheckbox('teg')" style="transform: scale(1.2); margin-right: 10px;">
                                                    <strong>Acepto términos y condiciones <b style="color: #dc3545;">CLAUSULA COMPROMISO DE TEG ó TG</b></strong>
                                                </h2>
                                            </div>                    
                                        </div>                   
                                    </div>
                                </div>
                            </div>
                            <?php endif; ?>

                           <!-- Mensajes de ayuda - LETRAS OSCURAS -->
<div class="row mt-3">
    <div class="col-md-12">
        <?php if($this->session->userdata('rol')==8){ ?>
        <div class="alert alert-info" style="border-radius: 8px; border-left: 4px solid #003366; background: #e8f0fe; color: #2c3e50;">
        

            <i class="fas fa-info-circle" style="color: #003366; margin-right: 8px;"></i>
            <b>ATENCIÓN NUEVO INGRESO:</b>
            <span style="color: #2c3e50;">
                Para registrar tu cláusula de compromiso, debes aceptar los términos y condiciones de cada cláusula según tu modalidad de estudio (<b>presencial</b> o <b>a distancia</b>).
                <br><small style="color: #555;">Lee cada cláusula, revisa su contenido y luego marca el check de aceptación.</small>
            </span>
        </div>
        <?php } else { ?>
        <div class="alert alert-info" style="border-radius: 8px; border-left: 4px solid #003366; background: #e8f0fe; color: #2c3e50;">
            <i class="fas fa-info-circle" style="color: #003366; margin-right: 8px;"></i>
            <b>ATENCIÓN ESTUDIANTE REGULAR:</b>
            <span style="color: #2c3e50;">
                Para registrar tu cláusula de compromiso, debes aceptar los términos y condiciones que correspondan a tu <b>modalidad de estudio</b> (presencial, a distancia o semipresencial), según las unidades curriculares que inscribiste.
                <br><strong>Importante:</strong> Si inscribiste <b>Trabajo Especial de Grado (TEG)</b> o <b>Trabajo de Grado (TG)</b>, también debes aceptar la cláusula específica para tu proyecto, de acuerdo a tu <b>especialidad</b>.
                <br><small style="color: #555;">Recuerda: haz clic en cada cláusula para desplegar la información, léela con atención y luego marca el check de "Acepto términos y condiciones...".</small>
            </span>
        </div>
        <?php } ?>
    </div>
</div>

                            <!-- Botón de Registrar (AdminLTE rectangular) -->
                            <div class="row mt-4">
                                <div class="col-md-12 text-center">
                                    <button type="submit" class="btn btn-primary" style="border-radius: 10px; padding: 10px 40px; font-weight: 500; transition: all 0.3s;">
                                        <i class="fa fa-check-circle mr-2"></i> Confirmar y Aceptar Compromiso
                                    </button>
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

<!-- JavaScript para validaciones -->
<script type="text/javascript">
    // Variables para controlar qué cláusulas se han visto
    var clausulasVistas = {
        presencial: false,
        distancia: false,
        semipresencial: false,
        teg: false
    };
    
    var clausulasAceptadas = {
        presencial: false,
        distancia: false,
        semipresencial: false,
        teg: false
    };
    
    // Determinar qué cláusulas son requeridas según las modalidades
    <?php
    $clausulasRequeridas = array();
    if($tienePresencial) $clausulasRequeridas[] = 'presencial';
    if($tieneDistancia) $clausulasRequeridas[] = 'distancia';
    if($tieneSemipresencial) $clausulasRequeridas[] = 'semipresencial';
    if($tieneTEG) $clausulasRequeridas[] = 'teg';
    ?>
    
    var clausulasRequeridas = <?php echo json_encode($clausulasRequeridas); ?>;
    
    // Función para marcar una cláusula como vista
    function marcarVisto(tipo) {
        clausulasVistas[tipo] = true;
        document.getElementById('estado_' + tipo).style.display = 'inline';
        
        // Verificar si el checkbox correspondiente está marcado
        var checkboxId = '';
        switch(tipo) {
            case 'presencial': checkboxId = 'acepto_presencial'; break;
            case 'distancia': checkboxId = 'acepto_distancia'; break;
            case 'semipresencial': checkboxId = 'acepto_semip'; break;
            case 'teg': checkboxId = 'acepto_teg'; break;
        }
        
        var checkbox = document.getElementById(checkboxId);
        if (checkbox && checkbox.checked) {
            clausulasAceptadas[tipo] = true;
        }
    }
    
    // Función para validar el checkbox
    function validarCheckbox(tipo) {
        var checkboxId = '';
        switch(tipo) {
            case 'presencial': checkboxId = 'acepto_presencial'; break;
            case 'distancia': checkboxId = 'acepto_distancia'; break;
            case 'semipresencial': checkboxId = 'acepto_semip'; break;
            case 'teg': checkboxId = 'acepto_teg'; break;
        }
        
        var checkbox = document.getElementById(checkboxId);
        if (checkbox && checkbox.checked) {
            clausulasAceptadas[tipo] = true;
            // Si el checkbox está marcado pero no se ha visto la cláusula, mostrar advertencia
            if (!clausulasVistas[tipo]) {
                alert('Debe leer la cláusula de compromiso antes de aceptarla. Haga clic en el botón "Ver Cláusula" primero.');
                checkbox.checked = false;
                clausulasAceptadas[tipo] = false;
                return false;
            }
        } else {
            clausulasAceptadas[tipo] = false;
        }
        return true;
    }
    
    // Función para validar el formulario antes de enviar
    function validarFormulario() {
        var errores = [];
        
        // Verificar que todas las cláusulas requeridas hayan sido vistas y aceptadas
        for (var i = 0; i < clausulasRequeridas.length; i++) {
            var tipo = clausulasRequeridas[i];
            var nombreTipo = '';
            switch(tipo) {
                case 'presencial': nombreTipo = 'Presencial'; break;
                case 'distancia': nombreTipo = 'A Distancia'; break;
                case 'semipresencial': nombreTipo = 'Semipresencial'; break;
                case 'teg': nombreTipo = 'TEG/TG'; break;
            }
            
            if (!clausulasVistas[tipo]) {
                errores.push('Debe leer la cláusula de compromiso modalidad ' + nombreTipo + ' haciendo clic en el botón correspondiente.');
            } else if (!clausulasAceptadas[tipo]) {
                errores.push('Debe aceptar los términos de la cláusula de modalidad ' + nombreTipo + ' marcando el checkbox correspondiente.');
            }
        }
        
        if (errores.length > 0) {
            var mensaje = 'Para registrar la cláusula de compromiso debe cumplir con lo siguiente:\n\n';
            for (var i = 0; i < errores.length; i++) {
                mensaje += '• ' + errores[i] + '\n';
            }
            alert(mensaje);
            return false;
        }
        
        return true;
    }
    
    // Función para verificar si una cláusula ha sido vista (para eventos de collapse)
    $(document).ready(function() {
        // Cuando se abre un collapse, marcar como visto
        $('.collapse').on('shown.bs.collapse', function() {
            var id = this.id;
            var tipo = '';
            switch(id) {
                case 'multiCollapseExample1': tipo = 'presencial'; break;
                case 'multiCollapseExample2': tipo = 'distancia'; break;
                case 'multiCollapseExample3': tipo = 'semipresencial'; break;
                case 'multiCollapseExample4': tipo = 'teg'; break;
            }
            if (tipo) {
                clausulasVistas[tipo] = true;
                document.getElementById('estado_' + tipo).style.display = 'inline';
            }
        });
    });
</script>

<!-- Incluir jQuery y Bootstrap JS si no están cargados -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">