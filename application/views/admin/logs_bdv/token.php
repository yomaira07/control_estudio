<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-8">
                    <h1>
                        <i class="fas fa-project-diagram"></i> Trazabilidad del token
                    </h1>
                    <p class="text-muted mb-0">
                        <code><?= htmlspecialchars($token) ?></code>
                    </p>
                </div>
                <div class="col-sm-4">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url() ?>dashboard04/home">Inicio</a></li>
                        <li class="breadcrumb-item"><a href="<?= base_url('admin/logs_bdv') ?>">Logs BDV</a></li>
                        <li class="breadcrumb-item active">Token</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">

            <div class="mb-3">
                <a href="<?= base_url('admin/logs_bdv') ?>" class="btn btn-outline-secondary btn-sm">
                    <i class="fas fa-arrow-left"></i> Volver al listado
                </a>
                <a href="<?= base_url('admin/logs_bdv') . '?token=' . urlencode($token) ?>"
                   class="btn btn-outline-primary btn-sm">
                    <i class="fas fa-filter"></i> Filtrar en el listado principal
                </a>
                <button type="button" class="btn btn-outline-info btn-sm" onclick="copiarToken()">
                    <i class="fas fa-copy"></i> Copiar token
                </button>
            </div>

            <!-- Tarjetas resumen -->
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3><?= number_format(count($logs)) ?></h3>
                            <p>Eventos registrados</p>
                        </div>
                        <div class="icon"><i class="fas fa-stream"></i></div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="small-box bg-success">
                        <div class="inner">
                            <?php
                                $exitosos = 0;
                                foreach ($logs as $l) {
                                    if (strpos($l->accion, 'exitoso') !== false || strpos($l->accion, '_ok') !== false) $exitosos++;
                                }
                            ?>
                            <h3><?= number_format($exitosos) ?></h3>
                            <p>Exitosos</p>
                        </div>
                        <div class="icon"><i class="fas fa-check-circle"></i></div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <?php
                                $errores = 0;
                                foreach ($logs as $l) {
                                    if (strpos($l->accion, 'error') !== false || strpos($l->accion, 'exception') !== false) $errores++;
                                }
                            ?>
                            <h3><?= number_format($errores) ?></h3>
                            <p>Errores / Excepciones</p>
                        </div>
                        <div class="icon"><i class="fas fa-exclamation-triangle"></i></div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="small-box bg-secondary">
                        <div class="inner">
                            <h3><?= !empty($logs) ? (int) $logs[0]->id_usuario : '—' ?></h3>
                            <p>ID Usuario</p>
                        </div>
                        <div class="icon"><i class="fas fa-user"></i></div>
                    </div>
                </div>
            </div>

            <!-- Timeline -->
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h3 class="card-title"><i class="fas fa-clock"></i> Línea de tiempo de la transacción</h3>
                </div>
                <div class="card-body">
                    <?php if (empty($logs)): ?>
                        <div class="text-center text-muted py-5">
                            <i class="fas fa-inbox" style="font-size: 3rem;"></i>
                            <p class="mt-2 mb-0">Sin eventos para este token</p>
                        </div>
                    <?php else: ?>
                        <div class="timeline">
                            <?php foreach ($logs as $log): ?>
                                <?php
                                    $icono = 'fa-circle';
                                    $color = 'primary';
                                    if (strpos($log->accion, 'exitoso') !== false || strpos($log->accion, '_ok') !== false) {
                                        $icono = 'fa-check'; $color = 'success';
                                    } elseif (strpos($log->accion, 'exception') !== false) {
                                        $icono = 'fa-exclamation'; $color = 'warning';
                                    } elseif (strpos($log->accion, 'error') !== false) {
                                        $icono = 'fa-times'; $color = 'danger';
                                    } elseif (strpos($log->accion, 'cancelacion') !== false) {
                                        $icono = 'fa-ban'; $color = 'secondary';
                                    } elseif (strpos($log->accion, 'pendiente') !== false) {
                                        $icono = 'fa-hourglass-half'; $color = 'info';
                                    }
                                ?>
                                <div>
                                    <i class="fas <?= $icono ?> bg-<?= $color ?>"></i>
                                    <div class="timeline-item">
                                        <span class="time"><i class="fas fa-clock"></i> <?= htmlspecialchars($log->fecha) ?></span>
                                        <h3 class="timeline-header">
                                            <span class="badge badge-<?= $color ?>"><?= htmlspecialchars($log->accion) ?></span>
                                            <?php if (!empty($log->metodo)): ?>
                                                <span class="badge badge-secondary ml-1"><?= htmlspecialchars($log->metodo) ?></span>
                                            <?php endif; ?>
                                        </h3>
                                        <div class="timeline-body">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <small class="text-muted d-block">ID Log</small>
                                                    <strong>#<?= (int) $log->id ?></strong>
                                                </div>
                                                <div class="col-md-3">
                                                    <small class="text-muted d-block">Usuario</small>
                                                    <a href="<?= base_url('admin/logs_bdv/usuario/' . $log->id_usuario) ?>">
                                                        <i class="fas fa-user-circle"></i> #<?= (int) $log->id_usuario ?>
                                                    </a>
                                                </div>
                                                <div class="col-md-6 text-right">
                                                    <a href="<?= base_url('admin/logs_bdv/detalle/' . $log->id) ?>"
                                                       class="btn btn-outline-primary btn-xs">
                                                        <i class="fas fa-eye"></i> Ver detalle completo
                                                    </a>
                                                </div>
                                            </div>
                                            <?php if (!empty($log->response)): ?>
                                                <div class="mt-2">
                                                    <small class="text-muted d-block">Response (resumen)</small>
                                                    <code class="d-block p-2 bg-light" style="font-size: 11px;">
                                                        <?= htmlspecialchars(substr((string) $log->response, 0, 200)) ?>
                                                        <?= (strlen((string) $log->response) > 200) ? '…' : '' ?>
                                                    </code>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                            <div>
                                <i class="fas fa-flag-checkered bg-gray"></i>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>

        </div>
    </section>
</div>

<style>
    .timeline > div > .timeline-item { margin-left: 15px; }
    .timeline-item .timeline-header {
        font-size: 14px;
        border-bottom: 1px solid #dee2e6;
        padding-bottom: 8px;
    }
    .timeline-item .timeline-body code { border-radius: 4px; word-break: break-all; }
    .bg-gray { background-color: #6c757d !important; color: #fff; }
</style>

<script>
function copiarToken() {
    var token = <?= json_encode($token) ?>;
    if (navigator.clipboard && window.isSecureContext) {
        navigator.clipboard.writeText(token).then(function () {
            alert('Token copiado al portapapeles');
        });
    } else {
        var textarea = document.createElement('textarea');
        textarea.value = token;
        textarea.style.position = 'fixed';
        textarea.style.opacity = 0;
        document.body.appendChild(textarea);
        textarea.select();
        try { document.execCommand('copy'); alert('Token copiado'); }
        catch (err) { alert('No se pudo copiar'); }
        document.body.removeChild(textarea);
    }
}
</script>