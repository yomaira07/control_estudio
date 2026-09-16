<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4 sidebar-institucional">

    <!-- Brand Logo -->
    <a href="<?php echo base_url(); ?>" class="brand-link brand-institucional">
        <img src="<?php echo base_url(); ?>assets/template/dist/img/Logo.png"
             alt="Logo ENFMP"
             class="brand-image img-circle elevation-3"
             style="opacity: .95">
        <span class="brand-text font-weight-bold">SCE-ENFMP</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex user-panel-institucional">
            <div class="image">
                <img src="<?php
                    if ($this->session->userdata("rol")==5 || $this->session->userdata("rol")==8 || $this->session->userdata("rol")==7) {
                        echo base_url(); ?>assets/fotos/<?php echo $this->session->userdata("id"); ?>_foto.jpg
                    <?php } elseif ($this->session->userdata("rol")==9) {
                        echo base_url(); ?>assets/fotos/<?php echo $this->session->userdata("id"); ?>_fotos_docente.jpg
                    <?php } ?>"
                     class="img-circle elevation-2 img-user-institucional" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block nombre-usuario">
                    <?php echo $this->session->userdata("nombre"); ?> <?php echo $this->session->userdata("apellido"); ?>
                </a>
                <small class="rol-usuario">
                    <?php
                        $roles = [
                            1 => 'Administrador General',
                            2 => 'Supervisor - Secretaría General',
                            3 => 'Revisor',
                            4 => 'Operador - Analista',
                            5 => 'Estudiante Regular',
                            6 => 'Administración',
                            7 => 'Aspirante',
                            8 => 'Nuevo Ingreso',
                            9 => 'Docente',
                            10 => 'Supervisor Docente',
                            11 => 'RRHH - Plantilla Docente',
                            12 => 'Coordinación Inv. y Postgrado'
                        ];
                        $rol_actual = $this->session->userdata("rol");
                        echo isset($roles[$rol_actual]) ? $roles[$rol_actual] : 'Usuario';
                    ?>
                </small>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                <?php if ($this->session->userdata("rol")== 1 and $this->session->userdata("estado")== 1 ){ ?>
                    <li class="nav-header header-institucional">MENU ADMINISTRADOR GENERAL</li>
                    <li class="nav-item">
                        <a href="<?php echo base_url(); ?>admin/usuario/index" class="nav-link">
                            <i class="nav-icon far fa-calendar-alt"></i>
                            <p>Listado Usuario</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo base_url(); ?>admin/usuario/index_regulares" class="nav-link">
                            <i class="nav-icon far fa-calendar-alt"></i>
                            <p>Listado Usuarios Estudiantes Regulares</p>
                        </a>
                    </li>
                <?php } ?>

                <?php if ($this->session->userdata("rol")== 2 and $this->session->userdata("estado")== 1 ){ ?>
                    <li class="nav-header header-institucional">MENU SUPERVISOR <br> Secretaría General</li>

                    <li class="nav-item">
                        <a href="" class="nav-link">
                            <i class="far fa-check-circle"></i>
                            <p>CONTROL DE ESTUDIOS</p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="" class="nav-link">
                                    <i class="nav-icon far fa-user"></i>
                                    <p>DOCENTES</p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="<?php echo base_url(); ?>admin/docente/index" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Docentes Registrados</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="<?php echo base_url(); ?>admin/usuario/index_docente" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Usuarios Docentes Activos</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a href="" class="nav-link">
                                    <i class="nav-icon far fa-user"></i>
                                    <p>USUARIOS</p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="<?php echo base_url(); ?>admin/usuario/index" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Usuarios Est. Regulares</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a href="" class="nav-link">
                                    <i class="fas fa-book-open"></i>
                                    <p>OFERTA ACADÉMICA Y PENSUMS</p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="<?php echo base_url(); ?>admin/oferta_academica" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Oferta Académica</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="<?php echo base_url(); ?>admin/pensum" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Pensum</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>

                            <?php if($this->session->userdata("id")!=2427 and $this->session->userdata('id')!=1639 ){ ?>
                                <li class="nav-item">
                                    <a href="" class="nav-link">
                                        <i class="nav-icon far fa-calendar-alt"></i>
                                        <p>REVISIÓN NOTAS ACADÉMICAS</p>
                                    </a>
                                    <ul class="nav nav-treeview">
                                        <li class="nav-item">
                                            <a href="<?php echo base_url(); ?>dashboard05/revisar_plan_clases" class="nav-link">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>Plan de Clases y Evaluaciones</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="<?php echo base_url(); ?>dashboard05/notas_cargadas" class="nav-link">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>Revisión Notas Academicas Cargadas</p>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            <?php } ?>

                            <li class="nav-item">
                                <a href="" class="nav-link">
                                    <i class="fas fa-highlighter"></i>
                                    <p>REVISIÓN ACADÉMICA</p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="<?php echo base_url(); ?>dashboard05/revision_ac" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Estudiantes Regulares/Nvo Ingreso</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="<?php echo base_url(); ?>dashboard05/revision_ac_asp" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Aspirantes</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>

                            <li class="nav-item">
                                <a href="" class="nav-link">
                                    <i class="fas fa-calendar-check"></i>
                                    <p>PERÍODO INSCRIPCIÓN VIGENTE</p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="<?php echo base_url(); ?>dashboard05/revision_ac_datos" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Información del Estudiante</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="<?php echo base_url(); ?>dashboard05/revision_ac_datos_asp" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Información del Aspirante</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="<?php echo base_url(); ?>dashboard05/cupos_materias" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Cupos Materia</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="<?php echo base_url(); ?>dashboard05/inscritos" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Inscritos Oferta Académica</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="<?php echo base_url(); ?>dashboard05/listado_general/5" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Listado Gral. Regulares</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="<?php echo base_url(); ?>dashboard05/listado_general/8" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Listado Gral. Nuevos Ingresos</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="<?php echo base_url(); ?>dashboard05/listado_general_aspirante" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Listado Gral. Aspirantes</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>

                            <li class="nav-item">
                                <a href="" class="nav-link">
                                    <i class="far fa-calendar-minus"></i>
                                    <p>PERIÓDO INSCRIPCIÓN ANTERIORES</p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="<?php echo base_url(); ?>consultas/index" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Regulares /Nuevos Ingresos <br> Inscritos <br> (Ver Planilla)</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="<?php echo base_url(); ?>consultas/buscar_periodo_aspirantes" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Aspirantes <br> Inscritos <br> (Ver Planilla)</p>
                                        </a>
                                    </li>
                                    <?php if($this->session->userdata("id")!=2427 and $this->session->userdata('id')!=1639  ){ ?>
                                        <li class="nav-header header-institucional">Docentes</li>
                                        <li class="nav-item">
                                            <a href="<?php echo base_url(); ?>dashboard05/buscar_plan_clases" class="nav-link">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>Revisión Plan de Clases y Evaluaciones</p>
                                            </a>
                                        </li>
                                    <?php } ?>
                                </ul>
                            </li>

                            <li class="nav-item">
                                <a href="" class="nav-link">
                                    <i class="fa fa-print"></i>
                                    <p>PLANILLAS Y NOTAS CARGADAS</p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="<?php echo base_url(); ?>consultas/buscar_cedula" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Imprimir Planilla <br> Estudiantes</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="<?php echo base_url(); ?>dashboard07/buscar_cedula" class="nav-link" title="Buscar calificaciones cargadas en el sistema">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Notas Académicas del Estudiante</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>

                    <div class="divisor-dorado"></div>

                    <li class="nav-item">
                        <a href="" class="nav-link">
                            <i class="far fa-check-circle"></i>
                            <p>TRÁMITES Y SOLICITUDES</p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="" class="nav-link">
                                    <i class="fa fa-copy" aria-hidden="true"></i>
                                    <p>Trámites y Solicitudes Revisadas</p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="<?php echo base_url(); ?>dashboard09/tramites_validados_vigentes" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Otros Trámites Administrativos</p>
                                        </a>
                                        <a href="<?php echo base_url(); ?>dashboard09/retiro_voluntario_todos" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Retiro Voluntarios</p>
                                        </a>
                                        <a href="<?php echo base_url(); ?>dashboard09/tramites_validados_vigentes_reincorporacion" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Reincorporaciones</p>
                                        </a>
                                        <a href="<?php echo base_url(); ?>dashboard09/tramites_validados_vigentes_egreso" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Solicitudes de Egreso</p>
                                        </a>
                                        <a href="<?php echo base_url(); ?>dashboard09/constancias_estudios_generadas" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Constancias de Estudios Generadas</p>
                                        </a>
                                        <a href="<?php echo base_url(); ?>dashboard09/solicitudes_ruc_revisadas" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Solicitud de RUC</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>

                            <li class="nav-item">
                                <a href="" class="nav-link">
                                    <i class="fa fa-copy" aria-hidden="true"></i>
                                    <p>Revisión de Trámites y Solicitudes</p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="<?php echo base_url(); ?>dashboard09/tramites_por_validar" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Solicitud de Otros Trámites Administrativos</p>
                                        </a>
                                        <a href="<?php echo base_url(); ?>dashboard09/retiro_voluntario" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Solicitud de Retiro Voluntarios</p>
                                        </a>
                                        <a href="<?php echo base_url(); ?>dashboard09/solicitud_egreso_tramitados" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Solicitud de Egreso</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>

                            <li class="nav-item">
                                <a href="" class="nav-link">
                                    <i class="fa fa-copy" aria-hidden="true"></i>
                                    <p>Consultas de <br>Períodos Anteriores</p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="<?php echo base_url(); ?>dashboard09/buscar_periodo" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Trámites y/o Solicitudes</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>

                            <li class="nav-item">
                                <a href="<?php echo base_url(); ?>dashboard09/buscar_cedula_tramite" class="nav-link">
                                    <i class="fa fa-copy" aria-hidden="true"></i>
                                    <p>Trámites y/o Solicitudes <br> del Estudiante</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                <?php } ?>

                <!-- ============================================================ -->
                <!-- ROL 10: SUPERVISOR DOCENTE -->
                <!-- ============================================================ -->
                <?php if ($this->session->userdata("rol")== 10 and $this->session->userdata("estado")== 1 ){ ?>
                    <li class="nav-header header-institucional">MENU SUPERVISOR DOCENTE</li>
                    <li class="nav-item">
                        <a href="" class="nav-link">
                            <i class="fas fa-book-open"></i>
                            <p>OFERTA ACADÉMICA Y PENSUMS</p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?php echo base_url(); ?>admin/oferta_academica" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Oferta Académica</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="" class="nav-link">
                            <i class="nav-icon far fa-user"></i>
                            <p>DOCENTES</p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?php echo base_url(); ?>admin/docente/index" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Docentes Registrados</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="" class="nav-link">
                            <i class="nav-icon far fa-calendar-alt"></i>
                            <p>REVISIÓN NOTAS ACADÉMICAS</p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?php echo base_url(); ?>dashboard05/revisar_plan_clases" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Plan de Clases y Evaluaciones</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo base_url(); ?>dashboard05/notas_cargadas" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Revisión Notas Academicas <br>Cargadas</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-header header-institucional">Períodos Académicos Anteriores</li>
                    <li class="nav-item">
                        <a href="<?php echo base_url(); ?>dashboard05/buscar_plan_clases" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Revisión Plan de Clases y Evaluaciones</p>
                        </a>
                    </li>
                <?php } ?>

                <!-- ============================================================ -->
                <!-- ROL 12: COORDINACIÓN INV. Y POSTGRADO -->
                <!-- ============================================================ -->
                <?php if ($this->session->userdata("rol")== 12 and $this->session->userdata("estado")== 1 ){ ?>
                    <li class="nav-header header-institucional">MENU SUPERVISOR <br> Coordinación de Inv. y Postgrado</li>
                    <li class="nav-item">
                        <a href="" class="nav-link">
                            <i class="nav-icon far fa-user"></i>
                            <p>DOCENTES</p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?php echo base_url(); ?>admin/docente/index" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Docentes Registrados</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo base_url(); ?>admin/usuario/index_docente" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Usuarios Docentes Activos</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="" class="nav-link">
                            <i class="nav-icon far fa-calendar-alt"></i>
                            <p>REVISIÓN NOTAS ACADÉMICAS</p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?php echo base_url(); ?>dashboard05/notas_cargadas" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Revisión Notas Academicas <br>Cargadas</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-header header-institucional">Períodos Académicos Anteriores</li>
                    <li class="nav-item">
                        <a href="<?php echo base_url(); ?>dashboard05/buscar_plan_clases" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Revisión Plan de Clases y <br>Evaluaciones</p>
                        </a>
                    </li>
                <?php } ?>

                <!-- ============================================================ -->
                <!-- ROL 9: DOCENTE -->
                <!-- ============================================================ -->
                <?php if ($this->session->userdata("rol")== 9 and $this->session->userdata("estado")== 1 ){ ?>
                    <li class="nav-header header-institucional">MENU DOCENTE</li>
                    <li class="nav-item">
                        <a href="<?php echo base_url(); ?>dashboard06/index" class="nav-link">
                            <i class="far fa-check-circle"></i>
                            <p>Inicio</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="" class="nav-link">
                            <i class="far fa-check-circle"></i>
                            <p>Perfil Docente</p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?php echo base_url(); ?>dashboard06/datos" class="nav-link">
                                    <i class="far fa-dot-circle nav-icon"></i>
                                    <p>Datos Personales</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo base_url(); ?>dashboard06/datos1" class="nav-link">
                                    <i class="far fa-dot-circle nav-icon"></i>
                                    <p>Dirección Domicilio</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo base_url(); ?>dashboard06/datos22" class="nav-link">
                                    <i class="far fa-dot-circle nav-icon"></i>
                                    <p>Datos Académicos</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo base_url(); ?>dashboard06/datos2" class="nav-link">
                                    <i class="far fa-dot-circle nav-icon"></i>
                                    <p>Datos Laborales</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo base_url(); ?>dashboard06/datos21" class="nav-link">
                                    <i class="far fa-dot-circle nav-icon"></i>
                                    <p>Datos Bancarios</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="" class="nav-link">
                            <i class="far fa-check-circle"></i>
                            <p>Requisitos</p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?php echo base_url(); ?>dashboard06/requisitos" class="nav-link">
                                    <i class="far fa-dot-circle nav-icon"></i>
                                    <p>Recomendaciones</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo base_url(); ?>dashboard06/datos3" class="nav-link">
                                    <i class="far fa-dot-circle nav-icon"></i>
                                    <p>Adjuntar Cédula</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo base_url(); ?>dashboard06/datos7" class="nav-link">
                                    <i class="far fa-dot-circle nav-icon"></i>
                                    <p>Adjuntar Foto</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo base_url(); ?>dashboard06/datos4" class="nav-link">
                                    <i class="far fa-dot-circle nav-icon"></i>
                                    <p>Adjuntar Título Pregrado</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo base_url(); ?>dashboard06/datos12" title="Adjuntar Titulo de postgrado o Especialista" class="nav-link">
                                    <i class="far fa-dot-circle nav-icon"></i>
                                    <p>Adjuntar Título Postgrado o Especilista</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo base_url(); ?>dashboard06/datos11" title="Adjuntar R.I.F." class="nav-link">
                                    <i class="far fa-dot-circle nav-icon"></i>
                                    <p>Adjuntar Registro de Información Fiscal(R.I.F.)</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo base_url(); ?>dashboard06/datos13" title="Adjuntar R.I.F." class="nav-link">
                                    <i class="far fa-dot-circle nav-icon"></i>
                                    <p>Adjuntar Sintesis Curricular</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo base_url(); ?>dashboard06/datos8" class="nav-link">
                                    <i class="far fa-dot-circle nav-icon"></i>
                                    <p>Adjuntar Carnet de Trabajo</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo base_url(); ?>dashboard06/proceso_perfil" class="nav-link">
                            <i class="far fa-check-circle"></i>
                            <p>Estatus del Perfil Docente</p>
                        </a>
                    </li>
                    <?php if($menu_notas==true) : ?>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="far fa-check-circle"></i>
                                <p>Plan de Clases y Evaluación</p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?php echo base_url(); ?>dashboard06/matricula" class="nav-link">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p>Matrícula de Estudiantes</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?php echo base_url(); ?>dashboard06/matricula" class="nav-link">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p>Registrar Notas</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?php echo base_url(); ?>dashboard06/constancia" class="nav-link">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p>Constancia Participación Docente</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url(); ?>dashboard06/proceso_plan" class="nav-link">
                                <i class="far fa-check-circle"></i>
                                <p>Estatus del Plan de Clases</p>
                            </a>
                        </li>
                    <?php endif ?>
                    <div class="divisor-dorado"></div>
                    <li class="nav-header header-institucional">(Períodos Anteriores)</li>
                    <li class="nav-item">
                        <a href="<?php echo base_url(); ?>dashboard06/buscar_plan_clases" class="nav-link">
                            <i class="far fa-dot-circle nav-icon"></i>
                            <p>Constancia Participación Docente</p>
                        </a>
                    </li>
                <?php } ?>

                <!-- ============================================================ -->
                <!-- ROL 4: OPERADOR - ANALISTA -->
                <!-- ============================================================ -->
                <?php if ($this->session->userdata("rol")== 4 and $this->session->userdata("estado")== 1 ){ ?>
                    <li class="nav-header header-institucional">MENU OPERADOR - ANALISTA</li>
                    <li class="nav-item">
                        <a href="" class="nav-link">
                            <i class="far fa-check-circle"></i>
                            <p>CONTROL DE ESTUDIOS</p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-header header-institucional"><i class="fa fa-bookmark" aria-hidden="true"></i> Período Académico Vigente</li>
                            <ul>
                                <li class="nav-header header-institucional">Revisión Académica</li>
                                <li class="nav-item">
                                    <a href="<?php echo base_url(); ?>dashboard05/revision_ac" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Estudiantes Regulares/Nvo Ingreso</p>
                                    </a>
                                </li>
                            </ul>
                            <li class="nav-item">
                                <a href="<?php echo base_url(); ?>dashboard05/revision_ac_datos" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Información del Estudiante</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo base_url(); ?>dashboard05/inscritos" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Inscritos Oferta Académica</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo base_url(); ?>dashboard05/listado_general/5" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Listado Gral. Regulares</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo base_url(); ?>dashboard05/listado_general/8" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Listado Gral. Nuevos Ingresos</p>
                                </a>
                            </li>
                            <div class="divisor-dorado"></div>
                            <li class="nav-header header-institucional"><i class="fa fa-bookmark" aria-hidden="true"></i> CONSULTAS <br>(Períodos Inscripción Anteriores)</li>
                            <li class="nav-item">
                                <a href="<?php echo base_url(); ?>consultas/index" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Regulares /Nuevos Ingresos <br> Inscritos <br> (Ver Planilla)</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo base_url(); ?>consultas/buscar_periodo_aspirantes" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Aspirantes <br> Inscritos <br> (Ver Planilla)</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo base_url(); ?>consultas/buscar_cedula" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Imprimir Planilla <br> Estudiantes</p>
                                </a>
                            </li>
                            <li class="nav-header header-institucional"><i class="fa fa-bookmark" aria-hidden="true"></i> Revisión Plan de Clases y Evaluaciones<br>(Períodos Académicos Anteriores)</li>
                            <li class="nav-item">
                                <a href="<?php echo base_url(); ?>dashboard05/buscar_plan_clases" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Matrículas y Notas Académicas</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo base_url(); ?>dashboard07/buscar_cedula" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Notas Académicas del Estudiante</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <div class="divisor-dorado"></div>

                    <li class="nav-item">
                        <a href="" class="nav-link">
                            <i class="far fa-check-circle"></i>
                            <p>TRÁMITES Y SOLICITUDES</p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="" class="nav-link">
                                    <i class="fa fa-copy" aria-hidden="true"></i>
                                    <p>Trámites y Solicitudes Revisadas</p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="<?php echo base_url(); ?>dashboard09/tramites_validados_vigentes" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Otros Trámites Administrativos</p>
                                        </a>
                                        <a href="<?php echo base_url(); ?>dashboard09/retiro_voluntario_todos" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Retiro Voluntarios</p>
                                        </a>
                                        <a href="<?php echo base_url(); ?>dashboard09/tramites_validados_vigentes_reincorporacion" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Reincorporaciones</p>
                                        </a>
                                        <a href="<?php echo base_url(); ?>dashboard09/tramites_validados_vigentes_egreso" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Solicitudes de Egreso</p>
                                        </a>
                                        <a href="<?php echo base_url(); ?>dashboard09/constancias_estudios_generadas" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Constancias de Estudios Generadas</p>
                                        </a>
                                        <a href="<?php echo base_url(); ?>dashboard09/solicitudes_ruc_revisadas" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Solicitud de RUC</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a href="" class="nav-link">
                                    <i class="fa fa-copy" aria-hidden="true"></i>
                                    <p>Revisión de Trámites y Solicitudes</p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="<?php echo base_url(); ?>dashboard09/tramites_por_validar" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Solicitud de Otros Trámites Administrativos</p>
                                        </a>
                                        <a href="<?php echo base_url(); ?>dashboard09/retiro_voluntario" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Solicitud de Retiro Voluntarios</p>
                                        </a>
                                        <a href="<?php echo base_url(); ?>dashboard09/solicitud_egreso_tramitados" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Solicitud de Egreso</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a href="" class="nav-link">
                                    <i class="fa fa-copy" aria-hidden="true"></i>
                                    <p>Consultas de <br>Períodos Anteriores</p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="<?php echo base_url(); ?>dashboard09/buscar_periodo" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Trámites y/o Solicitudes</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="<?php echo base_url(); ?>dashboard09/buscar_cedula_tramite" class="nav-link">
                                            <i class="fa fa-copy" aria-hidden="true"></i>
                                            <p>Trámites y/o Solicitudes <br> del Estudiante</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                <?php } ?>

                <!-- ============================================================ -->
                <!-- ROL 5 Y 8: ESTUDIANTE REGULAR / NUEVO INGRESO -->
                <!-- ============================================================ -->
                <?php if (($this->session->userdata("rol")== 5 or $this->session->userdata("rol")== 8) and $this->session->userdata("estado")== 1 ){ ?>
                    <li class="nav-header header-institucional">MENU PARTICIPANTE</li>
                    <div class="nav-header header-institucional">
                        <li class="info"><div align="center"><b><?php if($this->session->userdata("rol")== 5) echo "ESTUDIANTE REGULAR"; ?></b></div></li>
                        <li class="info"><div align="center"><b><?php if($this->session->userdata("rol")== 8) echo "NUEVO INGRESO"; ?></b></div></li>
                        <li class="info"><div align="center"><b>(Control de Estudios)</b></div></li>
                    </div>

                    <li class="nav-item">
                        <a href="<?php echo base_url(); ?>dashboard04/home" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Inicio</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="" class="nav-link">
                            <i class="far fa-check-circle"></i>
                            <p>Información del Estudiante</p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?php echo base_url(); ?>dashboard04/datos" class="nav-link">
                                    <i class="far fa-dot-circle nav-icon"></i>
                                    <p>Datos Personales</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo base_url(); ?>dashboard04/datos1" class="nav-link">
                                    <i class="far fa-dot-circle nav-icon"></i>
                                    <p>Direccion</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo base_url(); ?>dashboard04/datos2" class="nav-link">
                                    <i class="far fa-dot-circle nav-icon"></i>
                                    <p>Lugar de trabajo</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <?php if ($this->session->userdata("planilla")==0 ){ ?>
                        <?php
                            $fecha_actual = date("Y-m-d");
                            $hora_actual = date("H:m:s");
                            $valor_preinscripcion = ($tiempo_pre);
                            if($this->session->inscripcion==1){
                        ?>
                            <li class="nav-item">
                                <a href="<?php echo base_url(); ?>dashboard04/inscripcion" class="nav-link">
                                    <i class="far fa-check-circle"></i>
                                    <p>Inscripciones Postgrado</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo base_url(); ?>dashboard04/registro_pago/<?php echo $this->session->userdata("id"); ?>" class="nav-link">
                                    <i class="far fa-check-circle"></i>
                                    <p>Registro de pago</p>
                                </a>
                            </li>
                        <?php }
                        if ($this->session->userdata("inscripcion")==1){ ?>
                            <li class="nav-item">
                                <a href="<?php echo base_url(); ?>dashboard04/proceso" class="nav-link">
                                    <i class="far fa-check-circle"></i>
                                    <p>Estatus Proceso</p>
                                </a>
                            </li>
                        <?php }
                    } ?>

                    <div class="divisor-dorado"></div>
                    <?php if ($this->session->userdata("rol")== 5){ ?>
                        <li class="nav-header header-institucional">(Períodos Inscripción Anteriores)</li>
                        <li class="nav-item">
                            <a href="<?php echo base_url(); ?>consultas/ver_planilla_cedula" class="nav-link">
                                <i class="far fa-check-circle"></i>
                                <p>Imprimir Planilla Inscripción</p>
                            </a>
                        </li>
                    <?php } ?>
                <?php } ?>

                <!-- ============================================================ -->
                <!-- ROL 6: ADMINISTRACIÓN -->
                <!-- ============================================================ -->
                <?php if ($this->session->userdata("rol")== 6 and $this->session->userdata("estado")== 1 ){ ?>
                    <li class="nav-header header-institucional">MENU ADMINISTRACIÓN</li>
                    <li class="nav-item">
                        <a href="<?php echo base_url(); ?>admin/arancel" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Aranceles de Pago Inscripción</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo base_url(); ?>admin/aranceltram" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Aranceles de Trámites Adminstrativos</p>
                        </a>
                    </li>

                    <div class="divisor-dorado"></div>

                    <li class="nav-item">
                        <a href="" class="nav-link">
                            <i class="fas far fa-bookmark"><p>CONTROL DE ESTUDIOS</p></i>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?php echo base_url(); ?>dashboard05" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Conciliacion</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo base_url(); ?>dashboard05/listconc" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Listado Conciliados</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo base_url(); ?>dashboard05/listconc_error" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Conciliados con Error</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo base_url(); ?>dashboard05/pago_adicional" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Registrar <br> Pagos Adicionales</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item">
                        <a href="" class="nav-link">
                            <i class="fas far fa-copy"><p>TRÁMITES Y SOLICITUDES</p></i>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?php echo base_url(); ?>dashboard09/conciliacion" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Conciliación</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo base_url(); ?>dashboard09/listconc" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Listado Conciliados</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo base_url(); ?>dashboard09/listconc_error" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Conciliados con Error</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo base_url(); ?>dashboard09/pago_adicional" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Registrar <br>Pagos Adicionales</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item">
                        <a href="<?php echo base_url(); ?>dashboard09/buscar_cedula_tramite" class="nav-link">
                            <i class="fa fa-copy" aria-hidden="true"></i>
                            <p>Trámites y/o Solicitudes <br> del Estudiante por cédula</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="" class="nav-link">
                            <p>- PERIODOS ANTERIORES<br>(Consultas)</p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?php echo base_url(); ?>consultas/buscar_periodo_conciliaciones_regulares" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Estudiantes Aspirantes/Regulares</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo base_url(); ?>consultas/buscar_periodo_conciliaciones_tramites" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Tramites Y Solicitudes</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                <?php } ?>

                <!-- ============================================================ -->
                <!-- ROL 7: ASPIRANTE -->
                <!-- ============================================================ -->
                <?php if ($this->session->userdata("rol")== 7 and $this->session->userdata("estado")== 1 ){ ?>
                    <li class="nav-header header-institucional">MENU ASPIRANTE</li>
                    <?php
                        $fecha_actual = date("Y-m-d");
                        $hora_actual = date("H:i:s");
                        $hora = (localtime(time(),true));
                        $valor_preinscripcion = ($tiempo_pre);
                    ?>
                    <li class="nav-item">
                        <a href="<?php echo base_url(); ?>dashboard08/index" class="nav-link">
                            <i class="far fa-check-circle"></i>
                            <p>Inicio</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="" class="nav-link">
                            <i class="far fa-check-circle"></i>
                            <p>Información del Aspirante</p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?php echo base_url(); ?>dashboard08/datos" class="nav-link">
                                    <i class="far fa-dot-circle nav-icon"></i>
                                    <p>Datos Personales</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo base_url(); ?>dashboard08/datos1" class="nav-link">
                                    <i class="far fa-dot-circle nav-icon"></i>
                                    <p>Direccion</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo base_url(); ?>dashboard08/academico" class="nav-link">
                                    <i class="far fa-dot-circle nav-icon"></i>
                                    <p>Datos Académicos</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo base_url(); ?>dashboard08/datos2" class="nav-link">
                                    <i class="far fa-dot-circle nav-icon"></i>
                                    <p>Datos Laborales</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo base_url(); ?>dashboard08/inscripcion" class="nav-link">
                            <i class="far fa-check-circle"></i>
                            <p>Registro de pago</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo base_url(); ?>dashboard08/requisitos" class="nav-link">
                            <i class="far fa-check-circle"></i>
                            <p>Requisitos</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo base_url(); ?>dashboard08/proceso" class="nav-link">
                            <i class="far fa-check-circle"></i>
                            <p>Estatus del Proceso Inscripción</p>
                        </a>
                    </li>
                <?php } ?>

                <!-- ============================================================ -->
                <!-- ROL 11: RRHH - PLANTILLA DOCENTE -->
                <!-- ============================================================ -->
                <?php if ($this->session->userdata("rol")== 11 and $this->session->userdata("estado")== 1 ){ ?>
                    <li class="nav-header header-institucional">MENU RRHH - PLANTILLA DOCENTE</li>
                    <li class="nav-item">
                        <a href="<?php echo base_url(); ?>admin/docente/index" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Docentes</p>
                        </a>
                    </li>
                <?php } ?>

                <!-- ============================================================ -->
                <!-- ROL 3: REVISOR -->
                <!-- ============================================================ -->
                <?php if ($this->session->userdata("rol")== 3 and $this->session->userdata("estado")== 1 ){ ?>
                    <li class="nav-header header-institucional">MENU REVISOR</li>
                    <li class="nav-item">
                        <a href="" class="nav-link">
                            <i class="far fa-check-circle"></i>
                            <p>CONTROL DE ESTUDIOS</p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-header header-institucional"><i class="fa fa-bookmark" aria-hidden="true"></i> Período Académico Vigente</li>
                            <ul>
                                <li class="nav-header header-institucional">Revisión Académica</li>
                                <li class="nav-item">
                                    <a href="<?php echo base_url(); ?>dashboard05/revision_ac" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Estudiantes Regulares/Nvo Ingreso</p>
                                    </a>
                                </li>
                            </ul>
                            <li class="nav-item">
                                <a href="<?php echo base_url(); ?>dashboard05/revision_ac_datos" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Información del Estudiante</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo base_url(); ?>dashboard05/inscritos" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Inscritos Oferta Académica</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo base_url(); ?>dashboard05/listado_general/5" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Listado Gral. Regulares</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo base_url(); ?>dashboard05/listado_general/8" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Listado Gral. Nuevos Ingresos</p>
                                </a>
                            </li>
                            <div class="divisor-dorado"></div>
                            <li class="nav-header header-institucional"><i class="fa fa-bookmark" aria-hidden="true"></i> CONSULTAS <br>(Períodos Inscripción Anteriores)</li>
                            <li class="nav-item">
                                <a href="<?php echo base_url(); ?>consultas/index" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Regulares /Nuevos Ingresos <br> Inscritos <br> (Ver Planilla)</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo base_url(); ?>consultas/buscar_periodo_aspirantes" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Aspirantes <br> Inscritos <br> (Ver Planilla)</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo base_url(); ?>consultas/buscar_cedula" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Imprimir Planilla <br> Estudiantes</p>
                                </a>
                            </li>
                            <li class="nav-header header-institucional"><i class="fa fa-bookmark" aria-hidden="true"></i> Revisión Plan de Clases y Evaluaciones<br>(Períodos Académicos Anteriores)</li>
                            <li class="nav-item">
                                <a href="<?php echo base_url(); ?>dashboard05/buscar_plan_clases" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Matrículas y Notas Académicas</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo base_url(); ?>dashboard07/buscar_cedula" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Notas Académicas del Estudiante</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <div class="divisor-dorado"></div>

                    <li class="nav-item">
                        <a href="" class="nav-link">
                            <i class="far fa-check-circle"></i>
                            <p>TRÁMITES Y SOLICITUDES</p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="" class="nav-link">
                                    <i class="fa fa-copy" aria-hidden="true"></i>
                                    <p>Trámites y Solicitudes Revisadas</p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="<?php echo base_url(); ?>dashboard09/tramites_validados_vigentes" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Otros Trámites Administrativos</p>
                                        </a>
                                        <a href="<?php echo base_url(); ?>dashboard09/retiro_voluntario_todos" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Retiro Voluntarios</p>
                                        </a>
                                        <a href="<?php echo base_url(); ?>dashboard09/tramites_validados_vigentes_reincorporacion" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Reincorporaciones</p>
                                        </a>
                                        <a href="<?php echo base_url(); ?>dashboard09/tramites_validados_vigentes_egreso" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Solicitudes de Egreso</p>
                                        </a>
                                        <a href="<?php echo base_url(); ?>dashboard09/constancias_estudios_generadas" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Constancias de Estudios Generadas</p>
                                        </a>
                                        <a href="<?php echo base_url(); ?>dashboard09/solicitudes_ruc_revisadas" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Solicitud de RUC</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a href="" class="nav-link">
                                    <i class="fa fa-copy" aria-hidden="true"></i>
                                    <p>Revisión de Trámites y Solicitudes</p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="<?php echo base_url(); ?>dashboard09/tramites_por_validar" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Solicitud de Otros Trámites Administrativos</p>
                                        </a>
                                        <a href="<?php echo base_url(); ?>dashboard09/retiro_voluntario" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Solicitud de Retiro Voluntarios</p>
                                        </a>
                                        <a href="<?php echo base_url(); ?>dashboard09/solicitud_egreso_tramitados" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Solicitud de Egreso</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a href="" class="nav-link">
                                    <i class="fa fa-copy" aria-hidden="true"></i>
                                    <p>Consultas de <br>Períodos Anteriores</p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="<?php echo base_url(); ?>dashboard09/buscar_periodo" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Trámites y/o Solicitudes</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                <?php } ?>

                <div class="divisor-dorado"></div>

                <!-- ===== OPCIONES COMUNES ===== -->
                <li class="nav-item">
                    <a href="<?php echo base_url(); ?>auth/cambio_clave" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Cambio de Clave</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo base_url(); ?>auth/logout" class="nav-link nav-link-salir">
                        <i class="fas fa-sign-out-alt nav-icon"></i>
                        <p>Salir</p>
                    </a>
                </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>

<!-- ============================================================ -->
<!-- ESTILOS INSTITUCIONALES DEL SIDEBAR -->
<!-- ============================================================ -->
<style>
    /* ===== SIDEBAR INSTITUCIONAL - TONOS DE EDIT.PHP ===== */
    .sidebar-institucional {
        background: linear-gradient(180deg, #0a2a4a 0%, #0d3556 60%, #0a2a4a 100%) !important;
        border-right: 1px solid rgba(201, 168, 76, 0.2);
        font-family: 'Montserrat', 'Segoe UI', sans-serif;
    }

    /* ===== LOGO / BRAND ===== */
    .brand-institucional {
        border-bottom: 1px solid rgba(201, 168, 76, 0.35) !important;
        padding: 16px 18px !important;
        background: rgba(26, 75, 122, 0.25);
        transition: all 0.3s ease;
    }
    .brand-institucional:hover {
        background: rgba(201, 168, 76, 0.08);
    }
    .brand-institucional .brand-text {
        color: #ffffff !important;
        font-weight: 700 !important;
        letter-spacing: 1.5px;
        font-size: 1.1rem;
        text-shadow: 0 1px 2px rgba(0,0,0,0.2);
    }
    .brand-institucional .brand-image {
        border: 2px solid #c9a84c;
        padding: 2px;
        background: #fff;
        box-shadow: 0 2px 8px rgba(201, 168, 76, 0.3);
    }

    /* ===== USER PANEL ===== */
    .user-panel-institucional {
        border-bottom: 1px solid rgba(201, 168, 76, 0.15);
        padding: 14px 18px 16px !important;
        background: rgba(26, 75, 122, 0.15);
        margin: 0 !important;
    }
    .img-user-institucional {
        border: 2px solid #c9a84c;
        padding: 2px;
        background: #fff;
        transition: all 0.3s ease;
        box-shadow: 0 2px 8px rgba(0,0,0,0.2);
    }
    .img-user-institucional:hover {
        transform: scale(1.05);
        box-shadow: 0 0 14px rgba(201, 168, 76, 0.55);
    }
    .nombre-usuario {
        color: #ffffff !important;
        font-weight: 600 !important;
        font-size: 0.92rem;
        letter-spacing: 0.3px;
        transition: color 0.3s ease;
    }
    .nombre-usuario:hover {
        color: #c9a84c !important;
    }
    .rol-usuario {
        display: block;
        color: #e8d9a0;
        font-size: 0.72rem;
        font-weight: 500;
        letter-spacing: 0.5px;
        margin-top: 2px;
        text-transform: uppercase;
    }

    /* ===== HEADERS DE SECCIÓN ===== */
    .header-institucional {
        color: #e8d9a0 !important;
        font-size: 0.7rem !important;
        font-weight: 700 !important;
        letter-spacing: 1.3px !important;
        text-transform: uppercase;
        padding: 16px 18px 8px !important;
        border-bottom: 1px solid rgba(201, 168, 76, 0.12);
        margin-bottom: 6px;
    }

    /* ===== LINKS PRINCIPALES ===== */
    .sidebar-institucional .nav-sidebar > .nav-item > .nav-link {
        color: rgba(255, 255, 255, 0.85) !important;
        border-radius: 8px;
        margin: 3px 12px;
        padding: 10px 14px;
        transition: all 0.25s ease;
        font-size: 0.88rem;
        font-weight: 500;
        letter-spacing: 0.2px;
    }
    .sidebar-institucional .nav-sidebar > .nav-item > .nav-link:hover {
        background: rgba(26, 75, 122, 0.5) !important;
        color: #ffffff !important;
        transform: translateX(4px);
        box-shadow: 0 2px 8px rgba(0,0,0,0.15);
    }
    .sidebar-institucional .nav-sidebar > .nav-item > .nav-link.active {
        background: linear-gradient(90deg, rgba(201, 168, 76, 0.25) 0%, rgba(26, 75, 122, 0.3) 100%) !important;
        color: #ffffff !important;
        border-left: 3px solid #c9a84c;
        font-weight: 600;
        box-shadow: 0 2px 10px rgba(201, 168, 76, 0.2);
    }

    /* ===== SUBMENÚS ===== */
    .sidebar-institucional .nav-treeview > .nav-item > .nav-link {
        color: rgba(255, 255, 255, 0.7) !important;
        font-size: 0.82rem;
        padding: 7px 14px 7px 28px;
        border-radius: 6px;
        margin: 1px 12px;
        transition: all 0.25s ease;
        font-weight: 400;
    }
    .sidebar-institucional .nav-treeview > .nav-item > .nav-link:hover {
        color: #ffffff !important;
        background: rgba(26, 75, 122, 0.4) !important;
        padding-left: 34px;
    }
    .sidebar-institucional .nav-treeview > .nav-item > .nav-link.active {
        color: #c9a84c !important;
        background: rgba(201, 168, 76, 0.1) !important;
        font-weight: 600;
    }

    /* ===== ICONOS ===== */
    .sidebar-institucional .nav-icon {
        font-size: 0.95rem;
        margin-right: 8px;
        transition: all 0.25s ease;
        color: rgba(255, 255, 255, 0.7);
    }
    .sidebar-institucional .nav-link:hover .nav-icon {
        color: #c9a84c !important;
        transform: scale(1.1);
    }
    .sidebar-institucional .nav-link.active .nav-icon {
        color: #c9a84c !important;
    }

    /* ===== DIVISOR DORADO ===== */
    .divisor-dorado {
        height: 1px;
        background: linear-gradient(90deg, transparent, rgba(201, 168, 76, 0.5), transparent);
        margin: 14px 18px;
    }

    /* ===== BOTÓN SALIR ===== */
    .nav-link-salir {
        color: rgba(255, 180, 180, 0.9) !important;
        font-weight: 600 !important;
    }
    .nav-link-salir:hover {
        background: rgba(220, 53, 69, 0.15) !important;
        color: #ff8a8a !important;
    }
    .nav-link-salir .nav-icon {
        color: rgba(255, 180, 180, 0.9) !important;
    }

    /* ===== SCROLLBAR PERSONALIZADO ===== */
    .sidebar-institucional .sidebar {
        scrollbar-width: thin;
        scrollbar-color: rgba(201, 168, 76, 0.6) transparent;
    }
    .sidebar-institucional .sidebar::-webkit-scrollbar {
        width: 6px;
    }
    .sidebar-institucional .sidebar::-webkit-scrollbar-track {
        background: rgba(0,0,0,0.1);
    }
    .sidebar-institucional .sidebar::-webkit-scrollbar-thumb {
        background: rgba(201, 168, 76, 0.5);
        border-radius: 3px;
    }
    .sidebar-institucional .sidebar::-webkit-scrollbar-thumb:hover {
        background: rgba(201, 168, 76, 0.8);
    }

    /* ===== AJUSTES GENERALES ===== */
    .sidebar-institucional .nav-sidebar .nav-link p {
        margin: 0;
        line-height: 1.4;
        white-space: normal;
    }
    .sidebar-institucional .nav-sidebar .nav-header {
        background: transparent !important;
    }

    /* ===== TRANSICIONES SUAVES ===== */
    .sidebar-institucional * {
        transition-property: background-color, color, border-color, box-shadow, transform;
        transition-duration: 0.25s;
        transition-timing-function: ease;
    }
    /* ===== CORRECCIÓN DE TRUNCAMIENTO DE TEXTO ===== */

/* Permitir que los textos largos se acomoden en varias líneas */
.sidebar-institucional .nav-sidebar .nav-link {
    white-space: normal !important;
    overflow: visible !important;
    text-overflow: clip !important;
    word-wrap: break-word !important;
    overflow-wrap: break-word !important;
    word-break: normal !important;
}

/* Los párrafos dentro de los links deben poder crecer en alto */
.sidebar-institucional .nav-sidebar .nav-link p {
    margin: 0 !important;
    line-height: 1.4 !important;
    white-space: normal !important;
    overflow: visible !important;
    text-overflow: clip !important;
    word-wrap: break-word !important;
    overflow-wrap: break-word !important;
    display: block !important;
    width: 100% !important;
}

/* Evitar que el <i> del ícono empuje el texto hacia afuera */
.sidebar-institucional .nav-sidebar .nav-link > .nav-icon {
    flex-shrink: 0;
}

/* El link como flexbox para alinear ícono + texto correctamente */
.sidebar-institucional .nav-sidebar > .nav-item > .nav-link {
    display: flex !important;
    align-items: flex-start !important;
    gap: 8px;
}

/* Submenús: mismo tratamiento */
.sidebar-institucional .nav-treeview > .nav-item > .nav-link {
    display: flex !important;
    align-items: flex-start !important;
    white-space: normal !important;
    overflow: visible !important;
    text-overflow: clip !important;
    word-wrap: break-word !important;
    overflow-wrap: break-word !important;
    padding-top: 8px !important;
    padding-bottom: 8px !important;
}

/* Encabezados de sección: también permitir multilínea */
.sidebar-institucional .nav-sidebar .nav-header {
    white-space: normal !important;
    overflow: visible !important;
    text-overflow: clip !important;
    word-wrap: break-word !important;
    line-height: 1.4 !important;
}

/* Ajustar el ancho mínimo del sidebar si es necesario */
.sidebar-institucional {
    min-width: 260px;
}

/* Evitar que el ícono se desplace raro cuando el texto es multilínea */
.sidebar-institucional .nav-sidebar .nav-link .nav-icon {
    margin-top: 2px;
}

/* Corregir el <br> dentro de <p> que a veces causa problemas */
.sidebar-institucional .nav-sidebar .nav-link p br {
    display: block;
    content: "";
    margin-top: 2px;
}
</style>