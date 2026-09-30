<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Acceso Aspirantes | SCE-ENFMP</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,900&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/template/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/template/dist/css/adminlte.min.css">
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/template/plugins/sweetalert2/sweetalert2.min.css">

    <style>
        /* ============================================================
           PALETA NEUTRA + FONDO AZUL INSTITUCIONAL
           ============================================================ */
        :root {
            --enf-azul-oscuro:  #0a3b66;
            --enf-azul-gris:    #6b7c8d;
            --enf-gris-medio:   #5c6e7e;
            --enf-gris-hover:   #4a5a68;
            --enf-gris-claro:   #8a9ba8;
            --enf-borde:        #e2e8f0;
            --enf-fondo-input:  #fafbfc;
            --enf-texto:        #2c3e50;
            --enf-texto-suave:  #64748b;
            --enf-dorado:       #d4a574;
            --enf-dorado-texto: #8b6914;
            --enf-dorado-fondo: #fef5e7;

            /* ✅ Azul institucional para el fondo */
            --enf-azul-inst-oscuro: #0A1E33;
            --enf-azul-inst-medio:  #0F2A47;
            --enf-azul-inst-claro:  #1B4F72;
        }

        /* ============================================================
           FONDO AZUL INSTITUCIONAL
           ============================================================ */
        body.login-aspirante {
            background: linear-gradient(135deg, var(--enf-azul-inst-oscuro) 0%, var(--enf-azul-inst-medio) 50%, var(--enf-azul-inst-claro) 100%);
            background-attachment: fixed;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0;
            padding: 20px;
            font-family: 'Source Sans Pro', sans-serif;
            position: relative;
            overflow-x: hidden;
        }

        /* Patrón decorativo sutil sobre el azul */
        body.login-aspirante::before {
            content: '';
            position: fixed;
            top: 0; left: 0;
            width: 100%; height: 100%;
            background-image:
                radial-gradient(circle at 15% 20%, rgba(107,124,141,0.15) 0%, transparent 45%),
                radial-gradient(circle at 85% 80%, rgba(27,79,114,0.30) 0%, transparent 50%),
                linear-gradient(115deg, transparent 65%, rgba(255,255,255,0.03) 65%, rgba(255,255,255,0.03) 66%, transparent 66%);
            pointer-events: none;
            z-index: 0;
        }

        /* ============================================================
           TARJETA DEL LOGIN
           ============================================================ */
        .login-card {
            position: relative;
            z-index: 1;
            width: 100%;
            max-width: 460px;
            background: #ffffff;
            border-radius: 35px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.25);
            overflow: hidden;
            animation: fadeInUp 0.55s ease-out;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .login-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.35);
        }

        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(24px); }
            to   { opacity: 1; transform: translateY(0); }
        }

        /* ============================================================
           CABECERA CON LOGO Y TÍTULO (degradado gris-azulado)
           ============================================================ */
        .login-card-header {
            background: linear-gradient(135deg, var(--enf-azul-oscuro) 0%, var(--enf-azul-gris) 100%);
            padding: 32px 30px 24px;
            text-align: center;
            color: white;
            position: relative;
            overflow: hidden;
        }

        /* Línea decorativa sutil inferior */
        .login-card-header::after {
            content: '';
            position: absolute;
            left: 0; right: 0; bottom: 0;
            height: 3px;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.25), transparent);
        }

        .login-card-header img {
            width: 92px;
            height: 92px;
            background: white;
            border-radius: 50%;
            padding: 8px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.15);
            margin-bottom: 14px;
            position: relative;
            z-index: 1;
        }

        .login-card-header h1 {
            font-size: 1.5rem;
            font-weight: 600;
            margin: 0 0 6px;
            letter-spacing: 0.3px;
            color: #ffffff;
            position: relative;
            z-index: 1;
            line-height: 1.3;
        }

        .login-card-header h1 .accent {
            color: #ffffff;
            font-weight: 600;
            opacity: 0.95;
        }

        .login-card-header p {
            font-size: 0.9rem;
            margin: 0;
            opacity: 0.85;
            font-weight: 400;
            position: relative;
            z-index: 1;
            letter-spacing: 0.2px;
        }

        /* ============================================================
           CUERPO DEL FORMULARIO
           ============================================================ */
        .login-card-body {
            padding: 35px 30px;
        }

        .login-card-body .form-group {
            margin-bottom: 22px;
        }

        .login-card-body label {
            font-weight: 600;
            color: var(--enf-texto);
            font-size: 0.88rem;
            margin-bottom: 7px;
            display: block;
            letter-spacing: 0.2px;
        }

        .login-card-body label i {
            color: var(--enf-gris-claro) !important;
        }

        .login-card-body .input-group-text {
            background: var(--enf-fondo-input);
            border: 2px solid var(--enf-borde);
            border-right: none;
            color: var(--enf-gris-claro);
            transition: all 0.25s ease;
            border-radius: 50px 0 0 50px;
            padding-left: 18px;
            padding-right: 14px;
        }

        .login-card-body .form-control {
            border-left: none;
            height: 50px;
            font-size: 0.95rem;
            border: 2px solid var(--enf-borde);
            color: var(--enf-texto);
            font-weight: 500;
            background: var(--enf-fondo-input);
            border-radius: 0 50px 50px 0;
            transition: all 0.25s ease;
        }

        .login-card-body .form-control::placeholder {
            color: #a0aec0;
            font-weight: 400;
        }

        .login-card-body .form-control:focus {
            border-color: var(--enf-gris-claro);
            background: #ffffff;
            box-shadow: 0 0 0 3px rgba(138, 155, 168, 0.15);
        }

        .login-card-body .input-group:focus-within .input-group-text {
            border-color: var(--enf-gris-claro);
            color: var(--enf-gris-medio);
            background: #ffffff;
        }

        /* Botón de mostrar/ocultar contraseña */
        .login-card-body .input-group-append .btn {
            border: 2px solid var(--enf-borde);
            border-left: none;
            background: var(--enf-fondo-input);
            color: var(--enf-gris-claro);
            border-radius: 0 50px 50px 0;
            padding: 0 18px;
            transition: all 0.25s ease;
        }

        .login-card-body .input-group-append .btn:hover {
            color: var(--enf-gris-medio);
            background: #ffffff;
        }

        /* ============================================================
           BOTONES
           ============================================================ */

        /* Botón principal - Ingresar */
        .btn-login {
            background: var(--enf-gris-medio);
            border: none;
            color: white;
            height: 50px;
            font-weight: 600;
            font-size: 1rem;
            letter-spacing: 0.3px;
            border-radius: 50px;
            transition: all 0.3s ease;
            width: 100%;
        }

        .btn-login:hover {
            background: var(--enf-gris-hover);
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(92, 110, 126, 0.3);
        }

        .btn-login:active {
            transform: translateY(0);
        }

        .btn-login:disabled {
            opacity: 0.75;
            cursor: not-allowed;
            transform: none;
        }

        /* Separador */
        .divider {
            text-align: center;
            margin: 22px 0 18px;
            position: relative;
            font-size: 0.85rem;
        }

        .divider::before,
        .divider::after {
            content: '';
            position: absolute;
            top: 50%;
            width: calc(50% - 60px);
            height: 1px;
            background: linear-gradient(90deg, transparent, var(--enf-borde), transparent);
        }

        .divider::before { left: 0; }
        .divider::after  { right: 0; }

        .divider span {
            background: white;
            padding: 0 15px;
            color: var(--enf-texto-suave);
            font-size: 0.85rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            font-weight: 500;
        }

        /* Botón registrarse - estilo warning amarillo suave */
        .btn-register {
            background: var(--enf-dorado-fondo);
            border: 2px solid var(--enf-dorado);
            color: var(--enf-dorado-texto);
            height: 50px;
            font-weight: 600;
            font-size: 0.9rem;
            letter-spacing: 0.3px;
            border-radius: 50px;
            transition: all 0.3s ease;
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            text-decoration: none;
        }

        .btn-register:hover {
            background: var(--enf-dorado);
            border-color: var(--enf-dorado);
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(212, 165, 116, 0.3);
            text-decoration: none;
        }

        .btn-register i {
            color: var(--enf-dorado-texto);
            transition: color 0.3s ease;
        }

        .btn-register:hover i {
            color: white;
        }

        /* ============================================================
           FOOTER
           ============================================================ */
        .login-footer {
            text-align: center;
            padding: 20px 30px 22px;
            background: #f8fafc;
            border-top: 1px solid var(--enf-borde);
            font-size: 0.82rem;
            color: var(--enf-texto-suave);
        }

        .login-footer a {
            color: var(--enf-gris-medio);
            font-weight: 600;
            text-decoration: none;
            transition: color 0.2s ease;
        }

        .login-footer a:hover {
            color: var(--enf-gris-hover);
            text-decoration: underline;
        }

        .login-footer .brand {
            display: block;
            margin-top: 8px;
            font-size: 0.72rem;
            color: var(--enf-texto-suave);
            letter-spacing: 0.3px;
        }

        .login-footer .brand i {
            color: var(--enf-gris-claro);
        }

        /* ============================================================
           ALERTAS
           ============================================================ */
        .login-card-body .alert {
            border-radius: 15px;
            font-size: 0.85rem;
            padding: 12px 18px;
            border: none;
            border-left: 4px solid;
            animation: slideDown 0.4s ease;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .login-card-body .alert-danger {
            background: #fee2e2;
            color: #991b1b;
            border-left-color: #dc2626;
        }

        .login-card-body .alert-info {
            background: #e0f2fe;
            color: #1e40af;
            border-left-color: #0ea5e9;
        }

        .login-card-body .alert-warning {
            background: #fef3c7;
            color: #92400e;
            border-left-color: #f59e0b;
        }

        .login-card-body .alert-success {
            background: #dcfce7;
            color: #166534;
            border-left-color: #22c55e;
        }

        @keyframes slideDown {
            from { opacity: 0; transform: translateY(-20px); }
            to   { opacity: 1; transform: translateY(0); }
        }

        /* Texto de ayuda */
        .form-text {
            font-size: 0.75rem !important;
            color: var(--enf-texto-suave) !important;
        }

        .form-text .text-info {
            color: var(--enf-gris-claro) !important;
        }

        /* ============================================================
           RESPONSIVE
           ============================================================ */
        @media (max-width: 480px) {
            body.login-aspirante { padding: 15px; }
            .login-card-header h1   { font-size: 1.25rem; }
            .login-card-header p    { font-size: 0.8rem; }
            .login-card-header img  { width: 76px; height: 76px; }
            .login-card-body        { padding: 25px 20px; }
            .login-footer           { padding: 15px 20px 18px; }
            .btn-login, .btn-register { font-size: 0.85rem; }
        }
    </style>
</head>
<body class="login-aspirante">

    <div class="login-card">

        <!-- ============================================================ -->
        <!-- HEADER CON LOGO Y TÍTULO                                     -->
        <!-- ============================================================ -->
        <div class="login-card-header">
            <img src="<?php echo base_url(); ?>assets/img/logo2.png" alt="ENFMP">
            <h1>
                Proceso<br>
                <span class="accent">de Selección</span>
            </h1>
            <p>Período 2026-2027 · Aspirantes a Postgrado</p>
        </div>

        <!-- ============================================================ -->
        <!-- CUERPO DEL FORMULARIO                                        -->
        <!-- ============================================================ -->
        <div class="login-card-body">

            <!-- Mensajes de alerta -->
            <?php if ($this->session->flashdata("error")): ?>
                <div class="alert alert-danger alert-dismissible fade show">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <i class="fas fa-exclamation-triangle"></i>
                    <span><?php echo $this->session->flashdata("error"); ?></span>
                </div>
            <?php endif; ?>

            <?php if ($this->session->flashdata("info")): ?>
                <div class="alert alert-info alert-dismissible fade show">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <i class="fas fa-info-circle"></i>
                    <span><?php echo $this->session->flashdata("info"); ?></span>
                </div>
            <?php endif; ?>

            <?php if ($this->session->flashdata("warning")): ?>
                <div class="alert alert-warning alert-dismissible fade show">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <i class="fas fa-exclamation-circle"></i>
                    <span><?php echo $this->session->flashdata("warning"); ?></span>
                </div>
            <?php endif; ?>

            <?php if ($this->session->flashdata("success")): ?>
                <div class="alert alert-success alert-dismissible fade show">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <i class="fas fa-check-circle"></i>
                    <span><?php echo $this->session->flashdata("success"); ?></span>
                </div>
            <?php endif; ?>

            <!-- Formulario de login -->
            <form action="<?php echo base_url(); ?>auth/loginaspirante" method="POST" autocomplete="off" id="formLoginAspirante">
                
                <!-- Usuario: cédula o RIF -->
                <div class="form-group">
                    <label for="username">
                        <i class="fas fa-user mr-1"></i>
                        Cédula de Identidad o RIF
                    </label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fas fa-id-card"></i>
                            </span>
                        </div>
                        <input type="text" 
                               class="form-control" 
                               id="username" 
                               name="username" 
                               placeholder="Ej: V12345678 ó J123456789"
                               maxlength="15"
                               required
                               autofocus
                               style="text-transform: uppercase;">
                    </div>
                    <small class="form-text">
                        <i class="fas fa-info-circle"></i>
                        Puede ingresar su cédula solo números o RIF (V/E) seguido de números. Sin puntos ni guiones.
                    </small>
                </div>

                <!-- Contraseña -->
                <div class="form-group">
                    <label for="password">
                        <i class="fas fa-lock mr-1"></i>
                        Contraseña
                    </label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fas fa-key"></i>
                            </span>
                        </div>
                        <input type="password" 
                               class="form-control" 
                               id="password" 
                               name="password" 
                               placeholder="Contraseña"
                               required>
                        <div class="input-group-append">
                            <button type="button" 
                                    class="btn"
                                    id="togglePassword"
                                    tabindex="-1">
                                <i class="fas fa-eye" id="toggleIcon"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Botón Ingresar -->
                <div class="form-group mt-4">
                    <button type="submit" class="btn btn-login">
                        <i class="fas fa-sign-in-alt mr-2"></i>
                        Ingresar
                    </button>
                </div>

            </form>

            <!-- Separador -->
            <div class="divider">
                <span>¿No tienes cuenta?</span>
            </div>

            <!-- Botón Registrarse -->
            <a href="<?php echo base_url(); ?>welcome/registrarse/0" 
               class="btn btn-register">
                <i class="fas fa-user-plus"></i>
                Registrarse como Aspirante
            </a>

        </div>

        <!-- ============================================================ -->
        <!-- FOOTER                                                       -->
        <!-- ============================================================ -->
        <div class="login-footer">
          <!--  <a href="<?php echo base_url(); ?>welcome/olvido_contrasena">
                <i class="fas fa-question-circle mr-1"></i>¿Olvidó su contraseña?
            </a>-->
            <span class="brand">
                <i class="fas fa-shield-alt mr-1"></i>
                Escuela Nacional de Fiscales del Ministerio Público
            </span>
        </div>

    </div>

    <!-- ============================================================ -->
    <!-- SCRIPTS                                                       -->
    <!-- ============================================================ -->
    <script src="<?php echo base_url(); ?>assets/template/plugins/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/template/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/template/plugins/sweetalert2/sweetalert2.min.js"></script>

    <script>
    $(document).ready(function() {

        // ✅ Mostrar / ocultar contraseña
        $('#togglePassword').on('click', function() {
            var input = $('#password');
            var icon  = $('#toggleIcon');
            
            if (input.attr('type') === 'password') {
                input.attr('type', 'text');
                icon.removeClass('fa-eye').addClass('fa-eye-slash');
            } else {
                input.attr('type', 'password');
                icon.removeClass('fa-eye-slash').addClass('fa-eye');
            }
        });

        // ✅ Permitir letras (solo V, E, J, G, P) al inicio y números después
        $('#username').on('input', function() {
            var val = this.value.toUpperCase();
            
            if (/^[VEJGP]/.test(val)) {
                val = val.charAt(0) + val.slice(1).replace(/[^0-9]/g, '');
            } else {
                val = val.replace(/[^0-9]/g, '');
            }
            
            this.value = val;
        });

        // ✅ Validar antes de enviar
        $('#formLoginAspirante').on('submit', function(e) {
            var username = $('#username').val().trim().toUpperCase();
            var password = $('#password').val().trim();

            if (!username) {
                e.preventDefault();
                Swal.fire({
                    icon: 'warning',
                    title: 'Campo requerido',
                    text: 'Debe ingresar su cédula o RIF.'
                });
                $('#username').focus();
                return false;
            }

            // ✅ Formato: [VEJGP]?[0-9]{6,10}
            if (!/^[VEJGP]?[0-9]{6,10}$/.test(username)) {
                e.preventDefault();
                Swal.fire({
                    icon: 'warning',
                    title: 'Formato inválido',
                    text: 'Ingrese una cédula (V/E), RIF (J/G/P) o solo números. Ejemplos: V12345678, J123456789, 12345678.'
                });
                $('#username').focus();
                return false;
            }

            if (!password) {
                e.preventDefault();
                Swal.fire({
                    icon: 'warning',
                    title: 'Campo requerido',
                    text: 'Debe ingresar su contraseña.'
                });
                $('#password').focus();
                return false;
            }

            $('#username').val(username);

            $(this).find('button[type="submit"]')
                   .prop('disabled', true)
                   .html('<i class="fas fa-spinner fa-spin mr-2"></i> Ingresando...');
        });

        // ✅ Auto-cerrar alertas después de 5 segundos
        setTimeout(function() {
            $(".alert").fadeOut(500);
        }, 5000);

    });
    </script>

</body>
</html>