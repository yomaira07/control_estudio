<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado del Pago - Inscripción</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: #f4f6f9;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Segoe UI', sans-serif;
            padding: 20px;
        }
        .resultado-card {
            max-width: 660px;
            width: 100%;
            border: none;
            border-radius: 16px;
            box-shadow: 0 8px 30px rgba(0,0,0,0.08);
            overflow: hidden;
        }
        .resultado-header {
            padding: 28px 24px;
            color: #fff;
            text-align: center;
        }
        .resultado-header.exitoso    { background: linear-gradient(135deg, #28a745, #1e7e34); }
        .resultado-header.pendiente  { background: linear-gradient(135deg, #ffc107, #d39e00); color: #212529; }
        .resultado-header.fallido    { background: linear-gradient(135deg, #dc3545, #a71d2a); }
        .resultado-header.advertencia { background: linear-gradient(135deg, #fd7e14, #d35400); }
        .resultado-header .icono {
            font-size: 48px;
            line-height: 1;
            margin-bottom: 8px;
        }
        .resultado-body { padding: 28px 24px; background: #fff; }
        .resultado-body p { color: #555; margin-bottom: 10px; }
        .detalle {
            background: #f8f9fa;
            border-radius: 10px;
            padding: 14px 16px;
            font-size: 14px;
            margin-top: 12px;
        }
        .detalle .fila {
            display: flex;
            justify-content: space-between;
            padding: 6px 0;
            border-bottom: 1px dashed #e3e6ea;
            gap: 10px;
        }
        .detalle .fila:last-child { border-bottom: none; }
        .detalle .label { color: #6c757d; flex-shrink: 0; }
        .detalle .valor { font-weight: 600; color: #212529; word-break: break-all; text-align: right; }
        .acciones { margin-top: 22px; text-align: center; }
        .acciones .btn { min-width: 200px; border-radius: 30px; padding: 10px 22px; }
        .diagnostico-box {
            background: #fff7e6;
            border-left: 4px solid #fd7e14;
            border-radius: 8px;
            padding: 16px;
            margin-top: 16px;
            font-size: 14px;
        }
        .diagnostico-box h6 { color: #b35a00; margin-bottom: 10px; }
        .diagnostico-box .detalle { background: #fff; margin-top: 10px; }
    </style>
</head>
<body>

<?php
    // ============================================================
    // Determinar estado visual
    // ============================================================
    $exitoso     = isset($exitoso) && $exitoso === true;
    $actualizado = isset($actualizado) ? $actualizado : true;
    $mensaje     = isset($mensaje) && $mensaje !== '' ? $mensaje : 'Procesando resultado del pago...';
    
    // Distinguir: éxito, verificado-no-guardado, pendiente, fallido
    if ($exitoso && $actualizado) {
        $clase  = 'exitoso';
        $titulo = '¡Pago exitoso!';
        $icono  = '✅';
    } elseif ($exitoso === false && $actualizado === false) {
        $clase  = 'advertencia';
        $titulo = 'Pago verificado, pero no registrado';
        $icono  = '⚠️';
    } elseif (stripos($mensaje, 'no fue completado') !== false || stripos($mensaje, 'pendiente') !== false) {
        $clase  = 'pendiente';
        $titulo = 'Pago pendiente';
        $icono  = '⏳';
    } else {
        $clase  = 'fallido';
        $titulo = 'Pago no completado';
        $icono  = '❌';
    }

    // URL de continuación (fallback a dashboard04/proceso)
    $url_continuar = isset($url_continuar) && !empty($url_continuar)
        ? $url_continuar
        : base_url() . 'dashboard04/proceso';

    // Referencia visible
    $ref_mostrar = isset($referencia) && !empty($referencia) ? $referencia : '—';

    // Datos del response (si vienen)
    $monto       = isset($response->amount)        ? $response->amount        : null;
    $moneda      = isset($response->currency)      ? $response->currency      : null;
    $fecha_pago  = isset($response->paymentDate)   ? $response->paymentDate   : null;
    $transaction = isset($response->transactionId) ? $response->transactionId : null;
?>

<div class="card resultado-card">
    <div class="resultado-header <?= $clase ?>">
        <div class="icono"><?= $icono ?></div>
        <h4 class="mb-0"><?= htmlspecialchars($titulo) ?></h4>
    </div>

    <div class="resultado-body">
        <p class="text-center"><?= htmlspecialchars($mensaje) ?></p>

        <div class="detalle">
            <div class="fila">
                <span class="label">Referencia</span>
                <span class="valor"><?= htmlspecialchars($ref_mostrar) ?></span>
            </div>
            <?php if (!empty($transaction)): ?>
            <div class="fila">
                <span class="label">ID Transacción BDV</span>
                <span class="valor"><?= htmlspecialchars($transaction) ?></span>
            </div>
            <?php endif; ?>
            <?php if (!empty($monto)): ?>
            <div class="fila">
                <span class="label">Monto</span>
                <span class="valor">
                    <?= number_format((float)$monto, 2, ',', '.') ?>
                    <?= $moneda == 1 ? 'Bs.' : htmlspecialchars($moneda) ?>
                </span>
            </div>
            <?php endif; ?>
            <?php if (!empty($fecha_pago)): ?>
            <div class="fila">
                <span class="label">Fecha del pago</span>
                <span class="valor"><?= htmlspecialchars($fecha_pago) ?></span>
            </div>
            <?php endif; ?>
        </div>

        <?php // ============================================================ ?>
        <?php // BLOQUE DE DIAGNÓSTICO (solo si el pago se verificó pero no se guardó) ?>
        <?php // ============================================================ ?>
        <?php if (isset($actualizado) && $actualizado === false && !empty($diagnostico)): ?>
            <div class="diagnostico-box">
                <h6>⚠️ El pago se verificó con el banco, pero no se pudo registrar en el sistema.</h6>
                <p class="mb-2">Por favor, contacte a soporte con los siguientes datos:</p>
                <div class="detalle">
                    <?php foreach ($diagnostico as $clave => $valor): ?>
                        <?php if (!empty($valor)): ?>
                            <div class="fila">
                                <span class="label"><?= ucfirst(str_replace('_', ' ', $clave)) ?></span>
                                <span class="valor"><?= htmlspecialchars((string)$valor) ?></span>
                            </div>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php endif; ?>

        <div class="acciones">
            <a href="<?= htmlspecialchars($url_continuar) ?>" class="btn btn-primary">
                Continuar
            </a>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>