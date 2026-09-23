<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SCE-ENFMP</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/template/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/template/plugins/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">

  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/template/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- DataTables Export -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/template/datatables-export/css/buttons.dataTables.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/template/dist/css/adminlte.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/template/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/template/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/template/plugins/daterangepicker/daterangepicker.css">

  <!-- ===== ESTILOS INSTITUCIONALES UNIFICADOS ===== -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/institucional.css">
</head>
<body class="hold-transition sidebar-mini layout-fixed">

<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- 🔔 WIDGET ALERTAS CRON BDV (solo admin) -->
<?php if ((int) $this->session->userdata('rol') === 1): ?>
    <li class="nav-item dropdown" id="widget-cron-bdv">
        <a class="nav-link" data-toggle="dropdown" href="#" id="btn-alertas-cron">
            <i class="far fa-bell"></i>
            <span class="badge badge-danger navbar-badge" id="badge-alertas-cron" style="display: none;">0</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right" id="dropdown-alertas-cron">
            <span class="dropdown-header">
                <i class="fas fa-robot"></i> Alertas CRON BDV
                <small class="float-right text-muted" id="ultima-actualizacion-cron"></small>
            </span>
            <div class="dropdown-divider"></div>

            <!-- Contenedor dinámico de alertas -->
            <div id="contenido-alertas-cron">
                <div class="text-center p-3 text-muted">
                    <i class="fas fa-spinner fa-spin"></i> Cargando...
                </div>
            </div>

            <div class="dropdown-divider"></div>

            <!-- Acciones rápidas -->
            <a href="<?= base_url('admin/cron_dashboard') ?>" class="dropdown-item dropdown-footer">
                <i class="fas fa-tachometer-alt"></i> Ver dashboard completo
            </a>
            <a href="<?= base_url('admin/cron_dashboard/ejecutar') ?>" 
               class="dropdown-item dropdown-footer"
               onclick="return confirm('¿Ejecutar el CRON ahora?')">
                <i class="fas fa-play"></i> Ejecutar CRON ahora
            </a>
        </div>
    </li>
<?php endif; ?>
      <!-- User Account -->
      <li class="dropdown user user-menu">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
          <img src="<?php if ($this->session->userdata("id")){
              if ($this->session->userdata("rol")==5 or $this->session->userdata("rol")==8 or $this->session->userdata("rol")==7) {
                echo base_url(); ?>assets/fotos/<?php echo $this->session->userdata("id"); ?>_foto.jpg
              <?php } else {
                if ($this->session->userdata("rol")==9) {
                  echo base_url(); ?>assets/fotos/<?php echo $this->session->userdata("id"); ?>_fotos_docente.jpg
                <?php } else {
                  echo base_url(); ?>assets/img/enfmp.jpg
                <?php }
              }
            } ?>" class="user-image" alt="User Image">
          <span class="hidden-xs"><?php echo $this->session->userdata("nombre"); ?> <?php echo $this->session->userdata("apellido"); ?></span>
        </a>
        <ul class="dropdown-menu dropdown-menu-right">
          <li class="user-body">
            <div class="row">
              <div class="col-xs-12 text-center">
                <a href="<?php echo base_url(); ?>auth/logout">
                  <i class="fas fa-sign-out-alt mr-2"></i>Cerrar Sesión
                </a>
              </div>
            </div>
          </li>
        </ul>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->