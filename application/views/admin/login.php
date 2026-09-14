<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SCE-ENFMP - Control de Acceso</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome - USANDO CDN en lugar de local -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/template/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/template/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,600,700&display=swap" rel="stylesheet">
  
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: 'Source Sans Pro', sans-serif;
      min-height: 100vh;
      margin: 0;
      padding: 0;
      background: #e8edf2;
    }

    /* Layout principal con Grid - 4 columnas para formulario, 8 para imagen */
    .main-layout {
      display: grid;
      grid-template-columns: 4fr 8fr;
      min-height: 100vh;
    }

    /* Sección izquierda - Formulario (4 columnas) con colores neutros y suaves */
    .form-section {
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 40px 30px;
      position: relative;
      overflow-y: auto;
     
    
    }

    /* Patrón de fondo sutil */
    .form-section::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background-image: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" opacity="0.05"><path fill="white" d="M20,20 L80,20 L80,80 L20,80 Z"/><circle cx="50" cy="50" r="10"/></svg>');
      background-repeat: repeat;
      pointer-events: none;
    }

    /* Contenedor del formulario */
    .login-container {
      width: 100%;
      max-width: 450px;
      position: relative;
      z-index: 1;
    }

    /* Tarjeta principal - más neutra */
    .login-card {
      background: #ffffff;
      border-radius: 35px;
      box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
      overflow: hidden;
      transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .login-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 25px 50px rgba(0, 0, 0, 0.2);
    }

    /* Encabezado - colores neutros */
    .login-header {
      background: linear-gradient(135deg, #0a3b66 0%, #6b7c8d 100%);
      padding: 30px 20px;
      text-align: center;
      color: white;
    }

    .login-header h2 {
      font-size: 1.8rem;
      font-weight: 600;
      margin: 15px 0 5px;
    }

    .login-header p {
      font-size: 0.9rem;
      opacity: 0.85;
      margin: 0;
    }

    .logo-wrapper {
      background: white;
      width: 90px;
      height: 90px;
      border-radius: 50%;
      display: inline-flex;
      align-items: center;
      justify-content: center;
      margin-bottom: 10px;
      box-shadow: 0 5px 15px rgba(0, 0, 0, 0.15);
    }

    .logo-wrapper img {
      width: 70px;
      height: 70px;
      border-radius: 50%;
      object-fit: cover;
    }

    /* Cuerpo del formulario */
    .login-body {
      padding: 35px 30px;
    }

    /* Grupos de input - tonos neutros */
    .input-group-custom {
      position: relative;
      margin-bottom: 25px;
    }

    .input-group-custom i {
      position: absolute;
      left: 18px;
      top: 50%;
      transform: translateY(-50%);
      color: #8a9ba8;
      font-size: 1.1rem;
      z-index: 1;
    }

    .input-group-custom input {
      width: 100%;
      padding: 14px 20px 14px 48px;
      border: 2px solid #e2e8f0;
      border-radius: 50px;
      font-size: 0.95rem;
      font-family: 'Source Sans Pro', sans-serif;
      transition: all 0.3s ease;
      background: #fafbfc;
    }

    .input-group-custom input:focus {
      outline: none;
      border-color: #8a9ba8;
      background: white;
      box-shadow: 0 0 0 3px rgba(138, 155, 168, 0.15);
    }

    .input-group-custom input::placeholder {
      color: #a0aec0;
      font-weight: 400;
    }

    /* Botón principal - neutro */
    .btn-login {
      width: 100%;
      padding: 14px;
      background: #5c6e7e;
      color: white;
      border: none;
      border-radius: 50px;
      font-size: 1rem;
      font-weight: 600;
      font-family: 'Source Sans Pro', sans-serif;
      cursor: pointer;
      transition: all 0.3s ease;
      margin-bottom: 20px;
    }

    .btn-login:hover {
      background: #4a5a68;
      transform: translateY(-2px);
      box-shadow: 0 8px 20px rgba(92, 110, 126, 0.3);
    }

    .btn-login:active {
      transform: translateY(0);
    }

    /* Botones secundarios - neutros */
    .btn-secondary-custom {
      width: 100%;
      padding: 12px;
      border: 2px solid;
      border-radius: 50px;
      font-size: 0.9rem;
      font-weight: 500;
      font-family: 'Source Sans Pro', sans-serif;
      cursor: pointer;
      transition: all 0.3s ease;
      margin-bottom: 12px;
      background: transparent;
    }

    .btn-warning-custom {
      border-color: #d4a574;
      color: #8b6914;
      background: #fef5e7;
    }

    .btn-warning-custom:hover {
      background: #d4a574;
      color: #fff;
      transform: translateY(-2px);
      box-shadow: 0 8px 20px rgba(212, 165, 116, 0.25);
    }

    .btn-info-custom {
      border-color: #7f8c8d;
      color: #2c3e50;
      background: #ecf0f1;
    }

    .btn-info-custom:hover {
      background: #7f8c8d;
      color: #fff;
      transform: translateY(-2px);
      box-shadow: 0 8px 20px rgba(127, 140, 141, 0.25);
    }

    .btn-outline-custom {
      border-color: #95a5a6;
      color: #5c6e7e;
      background: transparent;
    }

    .btn-outline-custom:hover {
      background: #95a5a6;
      color: white;
      transform: translateY(-2px);
      box-shadow: 0 8px 20px rgba(149, 165, 166, 0.25);
    }

    /* Separador */
    .divider {
      text-align: center;
      margin: 20px 0;
      position: relative;
    }

    .divider::before,
    .divider::after {
      content: '';
      position: absolute;
      top: 50%;
      width: calc(50% - 60px);
      height: 1px;
      background: linear-gradient(90deg, transparent, #e2e8f0, transparent);
    }

    .divider::before {
      left: 0;
    }

    .divider::after {
      right: 0;
    }

    .divider span {
      background: white;
      padding: 0 15px;
      color: #94a3b8;
      font-size: 0.85rem;
    }

    /* Footer del formulario */
    .login-footer {
      background: #f8fafc;
      padding: 20px;
      text-align: center;
      border-top: 1px solid #e2e8f0;
    }

    .login-footer small {
      font-size: 0.75rem;
      color: #64748b;
    }

    .browser-icon {
      width: 18px;
      vertical-align: middle;
      margin: 0 3px;
      border-radius: 4px;
    }

    /* Alertas redondeadas - neutras */
    .alert-custom {
      padding: 12px 18px;
      border-radius: 15px;
      margin-bottom: 20px;
      font-size: 0.85rem;
      display: flex;
      align-items: center;
      gap: 10px;
      animation: slideDown 0.4s ease;
    }

    .alert-custom i {
      font-size: 1.1rem;
    }

    .alert-danger-custom {
      background: #fee2e2;
      color: #991b1b;
      border-left: 4px solid #dc2626;
    }

    .alert-success-custom {
      background: #dcfce7;
      color: #166534;
      border-left: 4px solid #22c55e;
    }

    .alert-info-custom {
      background: #e0f2fe;
      color: #1e40af;
      border-left: 4px solid #0ea5e9;
    }

    .alert-warning-custom {
      background: #fef3c7;
      color: #92400e;
      border-left: 4px solid #f59e0b;
    }

    @keyframes slideDown {
      from {
        opacity: 0;
        transform: translateY(-20px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    /* Sección derecha - Imagen (8 columnas) */
    .image-section {
      position: relative;
      overflow: hidden;
      background: #e8edf2;
    }

    .image-section img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      object-position: center;
    }

    .image-section::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background: linear-gradient(135deg, rgba(92, 110, 126, 0.15), rgba(107, 124, 141, 0.15));
      pointer-events: none;
    }

    .image-overlay {
      position: absolute;
      bottom: 40px;
      left: 0;
      right: 0;
      text-align: center;
      color: white;
      z-index: 1;
      padding: 20px;
      background: linear-gradient(transparent, rgba(0,0,0,0.6));
    }

    .image-overlay h3 {
      font-size: 1.5rem;
      font-weight: 600;
      margin-bottom: 10px;
      text-shadow: 2px 2px 4px rgba(0,0,0,0.5);
    }

    .image-overlay p {
      font-size: 0.9rem;
      opacity: 0.9;
    }

    /* Responsive */
    @media (max-width: 992px) {
      .main-layout {
        grid-template-columns: 1fr;
      }
      
      .image-section {
        min-height: 300px;
      }
      
      .image-section img {
        object-fit: cover;
      }
      
      .form-section {
        padding: 40px 20px;
      }
    }

    @media (max-width: 576px) {
      .form-section {
        padding: 30px 15px;
      }
      
      .login-body {
        padding: 25px 20px;
      }
      
      .login-header h2 {
        font-size: 1.4rem;
      }
      
      .btn-secondary-custom {
        font-size: 0.8rem;
        padding: 10px;
      }
      
      .image-section {
        min-height: 250px;
      }
      
      .image-overlay h3 {
        font-size: 1.2rem;
      }
    }
  </style>
</head>

<body>
  <div class="main-layout">
    <!-- Sección izquierda: Formulario (4 columnas) con colores neutros -->
    <div class="form-section">
      <div class="login-container">
        <div class="login-card">
          <!-- Header con logo -->
          <div class="login-header">
            <div class="logo-wrapper">
              <img src="<?php echo base_url(); ?>assets/img/logo2.png" alt="Logo">
            </div>
            <h2>Control de Acceso</h2>
            <p>Sistema de Control de Estudios</p>
          </div>

          <!-- Formulario -->
          <div class="login-body">
            <!-- Mensajes de alerta -->
            <?php if($this->session->flashdata("error")): ?>
              <div class="alert-custom alert-danger-custom">
                <i class="fas fa-exclamation-triangle"></i>
                <span><?php echo $this->session->flashdata("error"); ?></span>
              </div>
            <?php endif; ?>
            
            <?php if($this->session->flashdata("info")): ?>
              <div class="alert-custom alert-info-custom">
                <i class="fas fa-info-circle"></i>
                <span><?php echo $this->session->flashdata("info"); ?></span>
              </div>
            <?php endif; ?>
            
            <?php if($this->session->flashdata("warning")): ?>
              <div class="alert-custom alert-warning-custom">
                <i class="fas fa-exclamation-circle"></i>
                <span><?php echo $this->session->flashdata("warning"); ?></span>
              </div>
            <?php endif; ?>
            
            <?php if($this->session->flashdata("success")): ?>
              <div class="alert-custom alert-success-custom">
                <i class="fas fa-check-circle"></i>
                <span><?php echo $this->session->flashdata("success"); ?></span>
              </div>
            <?php endif; ?>

            <!-- Formulario de login -->
            <form action="<?php echo base_url()?>auth/login" method="post">
              <div class="input-group-custom">
                <i class="fas fa-user"></i>
                <input type="text" placeholder="Usuario" name="username" required autofocus>
              </div>
              
              <div class="input-group-custom">
                <i class="fas fa-lock"></i>
                <input type="password" placeholder="Contraseña" name="password" required>
              </div>
              
              <button type="submit" class="btn-login">
                <i class="fas fa-sign-in-alt"></i> Ingresar
              </button>
            </form>

            <div class="divider">
              <span>Opciones adicionales</span>
            </div>

            <!-- Botones dinámicos según fechas -->
            <?php  
            $fecha_actual = date("Y-m-d");
            $hora_actual = date("H:i:s");
            if(($fecha_actual <= '2026-05-10') && ($hora_actual <= '23:59:00')): 
            ?>
              <button type="button" onclick="registrarse_nvo_ingreso()" class="btn-secondary-custom btn-warning-custom">
                <i class="fas fa-user-plus"></i> <strong>NUEVO INGRESO</strong> - Regístrese Aquí
              </button>
            <?php endif; ?>
            
            <?php  
            if(($fecha_actual <= '2025-12-05') && ($hora_actual <= '23:59:00')): 
            ?>
              <button type="button" onclick="registrarse()" class="btn-secondary-custom btn-warning-custom">
                <i class="fas fa-graduation-cap"></i> <strong>ASPIRANTES</strong> (Proceso Selección) - Regístrese
              </button>
              
              <button type="button" onclick="recuperar_acceso()" class="btn-secondary-custom btn-outline-custom">
                <i class="fas fa-key"></i> <strong>ESTUDIANTE REGULAR/EGRESADO</strong> - Recuperar Acceso
              </button>
            <?php else: ?>
              <button type="button" onclick="recuperar_acceso()" class="btn-secondary-custom btn-info-custom">
                <i class="fas fa-key"></i> <strong>ESTUDIANTE REGULAR/EGRESADO</strong> - Recuperar Acceso
              </button>
            <?php endif; ?>
          </div>

          <!-- Footer -->
          <div class="login-footer">
            <small>
              <i class="fab fa-firefox"></i> Recomendamos <strong>Mozilla Firefox</strong>
              <img src="<?php echo base_url(); ?>assets/img/firefox.jpeg" class="browser-icon">
              <br>
              <strong>Versión 2.0</strong> | 
              <i class="far fa-copyright"></i> 2019-<?php echo date('Y'); ?> SCE-ENFMP
            </small>
          </div>
        </div>
      </div>
    </div>

    <!-- Sección derecha: Imagen (8 columnas) -->
    <div class="image-section">
      <img src="<?php echo base_url(); ?>assets/template/dist/img/portada.jpg" alt="Portada CEENFMP">
      <div class="image-overlay">
        <h3>Bienvenido al SCE-ENFMP</h3>
        <p>Comprometidos con la excelencia educativa</p>
      </div>
    </div>
  </div>

  <script type="text/javascript">
    function registrarse(){
      location.href = "<?php echo base_url(); ?>welcome/registrarse";
    }
    
    function registrarse_nvo_ingreso(){
      location.href = "<?php echo base_url(); ?>welcome/registrarse_nvo_ingreso";
    }
    
    function recuperar_acceso(){
      location.href = "<?php echo base_url(); ?>welcome/recuperar_acceso";
    }
  </script>

  <!-- jQuery -->
  <script src="<?php echo base_url(); ?>assets/template/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="<?php echo base_url(); ?>assets/template/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="<?php echo base_url(); ?>assets/template/dist/js/adminlte.min.js"></script>

  <script>
    // Auto-cerrar alertas después de 5 segundos
    $(document).ready(function(){
      setTimeout(function() {
        $(".alert-custom").fadeOut(500);
      }, 5000);
    });
  </script>
</body>
</html>
