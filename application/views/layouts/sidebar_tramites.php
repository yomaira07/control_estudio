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
                <img src="<?php if ($this->session->userdata("id") and $this->session->userdata("rol") <> 9){
                    echo base_url(); ?>assets/fotos/<?php echo $this->session->userdata("id"); ?>_foto.jpg
                <?php } else {
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
                        if($this->session->userdata("rol")== 5) echo "Estudiante Regular";
                        elseif($this->session->userdata("rol")== 8) echo "Nuevo Ingreso";
                        else echo "Usuario";
                    ?>
                </small>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                <?php if (($this->session->userdata("rol")== 5 or $this->session->userdata("rol")== 8) and $this->session->userdata("estado")== 1 ){ ?>

                    <li class="nav-header header-institucional">
                        <?php if($this->session->userdata("rol")== 5) echo "ESTUDIANTE REGULAR"; ?>
                        <?php if($this->session->userdata("rol")== 8) echo "NUEVO INGRESO"; ?>
                        <br>
                        (Trámites
                        <?php if ( $this->uri->segment(3)==2) echo 'Administrativos'; ?>
                        <?php if ( $this->uri->segment(3)==1) echo 'Académicos'; ?>
                        )
                    </li>

                    <li class="nav-item">
                        <a href="<?php echo base_url(); ?>dashboard04/home" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Inicio</p>
                        </a>
                    </li>

                    <div class="divisor-dorado"></div>

                    <li class="nav-header header-institucional">Trámites Administrativos</li>

                    <li class="nav-item">
                        <a href="<?php echo base_url(); ?>dashboard09/solicitud_reincorporacion/2" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Reincorporación</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="<?php echo base_url(); ?>dashboard09/index/2" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Otros Trámites</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>RUC</p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?php echo base_url(); ?>dashboard09/solicitud_ruc_requisitos/2" class="nav-link">
                                    <i class="far fa-dot-circle nav-icon"></i>
                                    <p>Solicitud RUC</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo base_url(); ?>dashboard09/solicitud_ruc/2" class="nav-link">
                                    <i class="far fa-dot-circle nav-icon"></i>
                                    <p>RUC Aprobadas</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <div class="divisor-dorado"></div>

                    <li class="nav-item">
                        <a href="<?php echo base_url(); ?>dashboard09/index/1" class="nav-link">
                            <i class="far fa-check-circle nav-icon"></i>
                            <p>Trámites Académicos</p>
                        </a>
                    </li>

                    <?php
                        $usuario = array();
                        if(($this->session->userdata("inscripcion")==1) or in_array($this->session->userdata("id"), $usuario)){ ?>
                        <li class="nav-item">
                            <a href="<?php echo base_url(); ?>dashboard09/solicitud_retiros/1" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Retiros Voluntarios</p>
                            </a>
                        </li>
                    <?php } ?>

                <?php } ?>

                <div class="divisor-dorado"></div>

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