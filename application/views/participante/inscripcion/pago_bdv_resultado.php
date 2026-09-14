<!-- application/views/participante/inscripcion/pago_bdv_resultado.php -->
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Resultado de Pago - BDV</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #f4f6f9;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            padding: 20px;
        }
        .resultado-container {
            background: white;
            border-radius: 16px;
            box-shadow: 0 10px 40px rgba(0,0,0,0.15);
            padding: 40px 35px;
            max-width: 520px;
            width: 100%;
            text-align: center;
            animation: fadeIn 0.6s ease;
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-30px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .icono { font-size: 72px; margin-bottom: 15px; }
        .icono.exito { color: #28a745; }
        .icono.error { color: #dc3545; }
        .icono.pendiente { color: #ffc107; }
        .icono.info { color: #17a2b8; }
        .titulo { font-size: 24px; font-weight: 700; color: #2c3e50; margin-bottom: 8px; }
        .subtitulo { color: #6c757d; font-size: 15px; margin-bottom: 25px; }
        .mensaje { color: #495057; font-size: 15px; margin-bottom: 25px; line-height: 1.7; }
        .detalles {
            background: #f8f9fa;
            border-radius: 10px;
            padding: 18px;
            margin-bottom: 25px;
            text-align: left;
            border: 1px solid #e9ecef;
        }
        .detalles-item {
            display: flex;
            justify-content: space-between;
            padding: 7px 0;
            border-bottom: 1px solid #e9ecef;
            font-size: 14px;
        }
        .detalles-item:last-child { border-bottom: none; }
        .detalles-item .label { color: #6c757d; font-weight: 500; }
        .detalles-item .valor { font-weight: 600; color: #2c3e50; }
        .detalles-item .valor.success { color: #28a745; }
        .detalles-item .valor.pending { color: #ffc107; }
        .detalles-item .valor.error { color: #dc3545; }
        .btn-group {
            display: flex;
            gap: 10px;
            justify-content: center;
            flex-wrap: wrap;
        }
        .btn {
            display: inline-block;
            padding: 12px 30px;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s;
            border: none;
            cursor: pointer;
            font-size: 14px;
            min-width: 140px;
        }
        .btn-primary { background: #003366; color: white; }
        .btn-primary:hover { background: #1a5276; transform: translateY(-2px); box-shadow: 0 4px 15px rgba(0,51,102,0.3); }
        .btn-success { background: #28a745; color: white; }
        .btn-success:hover { background: #218838; transform: translateY(-2px); box-shadow: 0 4px 15px rgba(40,167,69,0.3); }
        .btn-warning { background: #ffc107; color: #2c3e50; }
        .btn-warning:hover { background: #e0a800; transform: translateY(-2px); }
        .btn-danger { background: #dc3545; color: white; }
        .btn-danger:hover { background: #c82333; transform: translateY(-2px); }
        .btn-outline { background: transparent; color: #6c757d; border: 2px solid #dee2e6; }
        .btn-outline:hover { background: #f8f9fa; border-color: #adb5bd; }
        .loader {
            border: 4px solid #f3f3f3;
            border-top: 4px solid #003366;
            border-radius: 50%;
            width: 50px;
            height: 50px;
            animation: spin 1s linear infinite;
            margin: 15px auto;
        }
        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
        .tiempo-restante {
            font-size: 13px;
            color: #6c757d;
            margin-top: 15px;
            padding: 12px;
            background: #e9ecef;
            border-radius: 8px;
        }
        .badge-estado {
            display: inline-block;
            padding: 4px 16px;
            border-radius: 20px;
            font-size: 13px;
            font-weight: 600;
            margin: 5px 0 15px;
        }
        .badge-estado.exito { background: #d4edda; color: #155724; }
        .badge-estado.error { background: #f8d7da; color: #721c24; }
        .badge-estado.pendiente { background: #fff3cd; color: #856404; }
    </style>
</head>
<body>
    <div class="resultado-container" id="resultadoContainer">
        <?php 
        // ✅ Detectar estado de forma robusta
        $esExitoso   = (isset($exitoso) && $exitoso === true);
        $esPendiente = (isset($exitoso) && $exitoso === false && isset($response) && isset($response->status) && $response->status == 0);
        ?>
        
        <?php if ($esExitoso): ?>
            <!-- ============================================================ -->
            <!-- PAGO EXITOSO -->
            <!-- ============================================================ -->
            <div class="icono exito">
                <i class="fas fa-check-circle"></i>
            </div>
            <h1 class="titulo">¡Pago Confirmado!</h1>
            <span class="badge-estado exito">✔ Pagado</span>
            <p class="mensaje"><?php echo $mensaje ?? 'Su pago ha sido procesado exitosamente.'; ?></p>
            
            <div class="detalles">
                <div class="detalles-item">
                    <span class="label"><i class="fas fa-money-bill-wave mr-2"></i>Monto</span>
                    <span class="valor success">Bs. <?php echo number_format($response->amount ?? 0, 2, ',', '.'); ?></span>
                </div>
                <div class="detalles-item">
                    <span class="label"><i class="fas fa-hashtag mr-2"></i>Referencia</span>
                    <span class="valor"><?php echo $response->reference ?? 'N/A'; ?></span>
                </div>
                <div class="detalles-item">
                    <span class="label"><i class="fas fa-calendar-alt mr-2"></i>Fecha</span>
                    <span class="valor"><?php 
                        if (!empty($response->paymentDate)) {
                            $dt = DateTime::createFromFormat('d/m/Y H:i:s', $response->paymentDate);
                            echo $dt ? $dt->format('d/m/Y H:i') : $response->paymentDate;
                        } else {
                            echo date('d/m/Y H:i');
                        }
                    ?></span>
                </div>
                <div class="detalles-item">
                    <span class="label"><i class="fas fa-id-card mr-2"></i>Identificación</span>
                    <span class="valor"><?php echo $response->idLetter ?? 'V'; ?>-<?php echo $response->idNumber ?? ''; ?></span>
                </div>
                <div class="detalles-item">
                    <span class="label"><i class="fas fa-exchange-alt mr-2"></i>Transacción</span>
                    <span class="valor" style="font-size:12px;"><?php echo $response->transactionId ?? 'N/A'; ?></span>
                </div>
                <?php if (!empty($response->authorizationCode)): ?>
                <div class="detalles-item">
                    <span class="label"><i class="fas fa-lock mr-2"></i>Código Autorización</span>
                    <span class="valor"><?php echo $response->authorizationCode; ?></span>
                </div>
                <?php endif; ?>
                <?php if (!empty($response->paymentMethodDescription)): ?>
                <div class="detalles-item">
                    <span class="label"><i class="fas fa-credit-card mr-2"></i>Método de Pago</span>
                    <span class="valor"><?php echo $response->paymentMethodDescription; ?></span>
                </div>
                <?php endif; ?>
            </div>
            
            <div class="btn-group">
                <a href="<?php echo base_url(); ?>dashboard04/proceso" class="btn btn-success">
                    <i class="fas fa-arrow-right mr-2"></i> Continuar
                </a>
            </div>
            
        <?php elseif ($esPendiente): ?>
            <!-- ============================================================ -->
            <!-- PAGO PENDIENTE -->
            <!-- ============================================================ -->
            <div class="icono pendiente">
                <i class="fas fa-clock"></i>
            </div>
            <h1 class="titulo">Pago en Procesamiento</h1>
            <span class="badge-estado pendiente">⏳ Pendiente</span>
            <p class="mensaje"><?php echo $mensaje ?? 'El pago está siendo procesado. Esto puede tomar unos minutos.'; ?></p>
            <div class="loader"></div>
            
            <div class="detalles">
                <div class="detalles-item">
                    <span class="label">Estado</span>
                    <span class="valor pending">Pendiente de confirmación</span>
                </div>
                <div class="detalles-item">
                    <span class="label">Monto</span>
                    <span class="valor">Bs. <?php echo number_format($response->amount ?? 0, 2, ',', '.'); ?></span>
                </div>
                <div class="detalles-item">
                    <span class="label">Referencia</span>
                    <span class="valor"><?php echo $response->reference ?? $referencia ?? 'N/A'; ?></span>
                </div>
                <?php if (!empty($response->token)): ?>
                <div class="detalles-item">
                    <span class="label">Token</span>
                    <span class="valor" style="font-size:11px;"><?php echo substr($response->token, 0, 20) . '...'; ?></span>
                </div>
                <?php endif; ?>
            </div>
            
            <div class="btn-group">
                <button onclick="verificarEstado()" class="btn btn-primary" id="btnVerificar">
                    <i class="fas fa-sync fa-spin mr-2" id="spinnerVerificar" style="display:none;"></i>
                    Verificar Estado
                </button>
                <a href="<?php echo base_url(); ?>pagos/cancelar" class="btn btn-danger">
                    <i class="fas fa-times mr-2"></i> Cancelar
                </a>
            </div>
            <div class="tiempo-restante">
                <i class="fas fa-info-circle mr-2"></i>
                Si el pago no se confirma en 24 horas, se cancelará automáticamente.
                <br>
                <small>Puedes verificar el estado en cualquier momento.</small>
            </div>
            
        <?php else: ?>
            <!-- ============================================================ -->
            <!-- PAGO FALLIDO O ERROR -->
            <!-- ============================================================ -->
            <div class="icono error">
                <i class="fas fa-times-circle"></i>
            </div>
            <h1 class="titulo">Pago No Completado</h1>
            <span class="badge-estado error">✖ Fallido</span>
            <p class="mensaje"><?php echo $mensaje ?? 'Hubo un problema con el procesamiento del pago.'; ?></p>
            
            <?php if (isset($response) && ($response->responseCode ?? 0) > 0): ?>
            <div class="detalles">
                <div class="detalles-item">
                    <span class="label"><i class="fas fa-code mr-2"></i>Código Error</span>
                    <span class="valor error"><?php echo $response->responseCode; ?></span>
                </div>
                <div class="detalles-item">
                    <span class="label"><i class="fas fa-info-circle mr-2"></i>Mensaje</span>
                    <span class="valor" style="font-size:13px;"><?php echo $response->responseMessage ?? 'Error desconocido'; ?></span>
                </div>
            </div>
            <?php endif; ?>
            
            <div class="btn-group">
                <a href="<?php echo base_url(); ?>dashboard04/registro_pago/<?php echo $id_usuario ?? ''; ?>" class="btn btn-warning">
                    <i class="fas fa-redo mr-2"></i> Reintentar
                </a>
                <a href="<?php echo base_url(); ?>dashboard04/inscripcion" class="btn btn-outline">
                    <i class="fas fa-edit mr-2"></i> Modificar Inscripción
                </a>
                <a href="<?php echo base_url(); ?>dashboard04/home" class="btn btn-primary">
                    <i class="fas fa-home mr-2"></i> Inicio
                </a>
            </div>
        <?php endif; ?>
    </div>

    <script>
        <?php if ($esPendiente): ?>
        // Auto-verificar cada 30 segundos si está pendiente
        var intervalId = setInterval(verificarEstado, 30000);
        <?php endif; ?>
        
        function verificarEstado() {
            var btn = document.getElementById('btnVerificar');
            var spinner = document.getElementById('spinnerVerificar');
            
            if (btn) {
                btn.disabled = true;
                spinner.style.display = 'inline-block';
            }
            
            fetch('<?php echo base_url(); ?>pagos/verificar_estado')
                .then(response => response.json())
                .then(data => {
                    if (data.estado === 'pagado') {
                        // ✅ Pago confirmado: recargar la página
                        location.reload();
                    } else if (data.estado === 'pendiente') {
                        alert('⏳ El pago aún está en proceso. Por favor, espera unos minutos.');
                        if (btn) {
                            btn.disabled = false;
                            spinner.style.display = 'none';
                        }
                    } else if (data.estado === 'error') {
                        alert('❌ ' + data.mensaje);
                        if (btn) {
                            btn.disabled = false;
                            spinner.style.display = 'none';
                        }
                    } else {
                        alert('El pago no ha sido registrado. ¿Deseas reintentar?');
                        window.location.href = '<?php echo base_url(); ?>dashboard04/registro_pago/<?php echo $id_usuario ?? ''; ?>';
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Error al verificar el estado. Intenta nuevamente.');
                    if (btn) {
                        btn.disabled = false;
                        spinner.style.display = 'none';
                    }
                });
        }
    </script>
</body>
</html>