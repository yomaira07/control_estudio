<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>
                        <i class="fas fa-file-code"></i> Detalle del log
                        <small class="text-muted">#<?= (int) $log->id ?></small>
                    </h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url() ?>dashboard04/home">Inicio</a></li>
                        <li class="breadcrumb-item"><a href="<?= base_url('admin/logs_bdv') ?>">Logs BDV</a></li>
                        <li class="breadcrumb-item active">Detalle #<?= (int) $log->id ?></li>
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
                <?php if (!empty($log->token)): ?>
                    <a href="<?= base_url('admin/logs_bdv/token/' . urlencode($log->token)) ?>"
                       class="btn btn-outline-info btn-sm">
                        <i class="fas fa-project-diagram"></i> Ver trazabilidad del token
                    </a>
                <?php endif; ?>
                <a href="<?= base_url('admin/logs_bdv/usuario/' . $log->id_usuario) ?>"
                   class="btn btn-outline-primary btn-sm">
                    <i class="fas fa-user"></i> Ver logs del usuario
                </a>
            </div>

            <!-- Información general -->
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h3 class="card-title"><i class="fas fa-info-circle"></i> Información general</h3>
                </div>
                <div class="card-body p-0">
                    <table class="table table-striped table-sm mb-0">
                        <tbody>
                            <tr>
                                <th style="width: 200px;">ID Log</th>
                                <td><strong><?= (int) $log->id ?></strong></td>
                            </tr>
                            <tr>
                                <th>ID Usuario</th>
                                <td>
                                    <a href="<?= base_url('admin/logs_bdv/usuario/' . $log->id_usuario) ?>">
                                        <i class="fas fa-user-circle"></i> <?= (int) $log->id_usuario ?>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <th>Token</th>
                                <td>
                                    <?php if (!empty($log->token)): ?>
                                        <a href="<?= base_url('admin/logs_bdv/token/' . urlencode($log->token)) ?>">
                                            <code><?= htmlspecialchars($log->token) ?></code>
                                        </a>
                                    <?php else: ?>
                                        <span class="text-muted">—</span>
                                    <?php endif; ?>
                                </td>
                            </tr>
                            <tr>
                                <th>Método</th>
                                <td><span class="badge badge-secondary"><?= htmlspecialchars($log->metodo) ?></span></td>
                            </tr>
                            <tr>
                                <th>Acción</th>
                                <td>
                                    <?php
                                        $badge = 'secondary';
                                        if (strpos($log->accion, 'exitoso') !== false || strpos($log->accion, '_ok') !== false) {
                                            $badge = 'success';
                                        } elseif (strpos($log->accion, 'exception') !== false) {
                                            $badge = 'warning';
                                        } elseif (strpos($log->accion, 'error') !== false) {
                                            $badge = 'danger';
                                        } elseif (strpos($log->accion, 'cancelacion') !== false) {
                                            $badge = 'dark';
                                        } elseif (strpos($log->accion, 'pendiente') !== false) {
                                            $badge = 'info';
                                        }
                                    ?>
                                    <span class="badge badge-<?= $badge ?>"><?= htmlspecialchars($log->accion) ?></span>
                                </td>
                            </tr>
                            <tr>
                                <th>Fecha</th>
                                <td><?= htmlspecialchars($log->fecha) ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Request y Response -->
            <div class="row">
                <div class="col-md-6">
                    <div class="card card-success card-outline">
                        <div class="card-header">
                            <h3 class="card-title"><i class="fas fa-arrow-up"></i> Request</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool"
                                        onclick="copiarTexto('request-content', this)" title="Copiar">
                                    <i class="fas fa-copy"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <?php if (!empty($request_pretty)): ?>
                                <pre id="request-content" class="json-viewer mb-0"><?= htmlspecialchars($request_pretty) ?></pre>
                            <?php else: ?>
                                <p class="text-muted text-center py-4 mb-0">— Sin datos —</p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card card-info card-outline">
                        <div class="card-header">
                            <h3 class="card-title"><i class="fas fa-arrow-down"></i> Response</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool"
                                        onclick="copiarTexto('response-content', this)" title="Copiar">
                                    <i class="fas fa-copy"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <?php if (!empty($response_pretty)): ?>
                                <pre id="response-content" class="json-viewer mb-0"><?= htmlspecialchars($response_pretty) ?></pre>
                            <?php else: ?>
                                <p class="text-muted text-center py-4 mb-0">— Sin datos —</p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
</div>

<style>
    .json-viewer {
        background: #1e1e2e;
        color: #d4d4d4;
        padding: 15px;
        max-height: 550px;
        overflow: auto;
        font-size: 12px;
        line-height: 1.6;
        font-family: 'Consolas', 'Monaco', 'Courier New', monospace;
        white-space: pre-wrap;
        word-break: break-all;
    }
</style>

<script>
function copiarTexto(idElemento, btn) {
    var el = document.getElementById(idElemento);
    if (!el) return;
    var texto = el.innerText || el.textContent;
    if (navigator.clipboard && window.isSecureContext) {
        navigator.clipboard.writeText(texto).then(function () { mostrarCopiado(btn); });
    } else {
        var textarea = document.createElement('textarea');
        textarea.value = texto;
        textarea.style.position = 'fixed';
        textarea.style.opacity = 0;
        document.body.appendChild(textarea);
        textarea.select();
        try { document.execCommand('copy'); mostrarCopiado(btn); }
        catch (err) { alert('No se pudo copiar'); }
        document.body.removeChild(textarea);
    }
}
function mostrarCopiado(btn) {
    var htmlOrig = btn.innerHTML;
    btn.innerHTML = '<i class="fas fa-check text-success"></i>';
    setTimeout(function () { btn.innerHTML = htmlOrig; }, 1500);
}
</script>