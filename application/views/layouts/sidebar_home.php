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

                <!-- Menú participante -->
                <?php if (($this->session->userdata("rol")== 5 or $this->session->userdata("rol")== 8) and $this->session->userdata("estado")== 1 ){ ?>
                    <li class="nav-header header-institucional">
                        <?php if($this->session->userdata("rol")== 5) echo "ESTUDIANTE REGULAR"; ?>
                        <?php if($this->session->userdata("rol")== 8) echo "NUEVO INGRESO"; ?>
                    </li>

                    <li class="nav-item">
                        <a href="<?php echo base_url(); ?>dashboard04/index" class="nav-link">
                            <i class="fas fa-bookmark nav-icon"></i>
                            <p>CONTROL DE ESTUDIO</p>
                        </a>
                    </li>

                    <?php if($this->session->userdata("rol")==5 ){ ?>
                        <li class="nav-item">
                            <a href="<?php echo base_url(); ?>dashboard09/index/2" class="nav-link">
                                <i class="fas fa-copy nav-icon"></i>
                                <p>TRÁMITES</p>
                            </a>
                        </li>
                    <?php } ?>
                <?php } ?>

                <div class="divisor-dorado"></div>

                <!-- Mi Perfil -->
                <li class="nav-item">
                    <a href="" class="nav-link">
                        <i class="fas fa-user nav-icon"></i>
                        <p>Mi Perfil</p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?php echo base_url(); ?>auth/cambio_clave" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Cambiar de Clave</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url(); ?>admin/usuario/cambiar_correo" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Cambiar de Correo Electrónico</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url(); ?>dashboard04/datos7" class="nav-link">
                                <i class="far fa-dot-circle nav-icon"></i>
                                <p>Cambiar Fotografía</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <div class="divisor-dorado"></div>

                <!-- Salir -->
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