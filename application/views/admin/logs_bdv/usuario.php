<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>
                        <i class="fas fa-user-circle"></i> Logs del usuario
                        <small class="text-muted">#<?= (int) $id_usuario ?></small>
                    </h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url() ?>dashboard04/home">Inicio</a></li>
                        <li class="breadcrumb-item"><a href="<?= base_url('admin/logs_bdv') ?>">Logs BDV</a></li>
                        <li class="breadcrumb-item active">Usuario #<?= (int) $id_usuario ?></li>
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
                <a href="<?= base_url('admin/logs_bdv') . '?id_usuario=' . (int) $id_usuario ?>"
                   class="btn btn-outline-primary btn-sm">
                    <i class="fas fa-filter"></i> Filtrar en el listado principal
                </a>
            </div>

            <!-- Tarjetas resumen -->
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3><?= number_format(count($logs)) ?></h3>
                            <p>Registros totales</p>
                        </div>
                        <div class="icon"><i class="fas fa-list"></i></div>
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
                            <h3><?= !empty($logs) ? htmlspecialchars(substr($logs[0]->fecha, 0, 10)) : '—' ?></h3>
                            <p>Última actividad</p>
                        </div>
                        <div class="icon"><i class="fas fa-clock"></i></div>
                    </div>
                </div>
            </div>

            <!-- Tabla -->
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h3 class="card-title"><i class="fas fa-list-ul"></i> Historial de transacciones</h3>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover table-striped table-sm mb-0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Token</th>
                                    <th>Acción</th>
                                    <th>Response</th>
                                    <th>Fecha</th>
                                    <th>Opción</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (empty($logs)): ?>
                                    <tr>
                                        <td colspan="6" class="text-center text-muted py-4">
                                            <i class="fas fa-inbox" style="font-size: 2rem;"></i>
                                            <p class="mb-0 mt-2">Sin registros para este usuario</p>
                                        </td>
                                    </tr>
                                <?php else: ?>
                                    <?php foreach ($logs as $log): ?>
                                        <?php
                                            $badge = 'secondary';
                                            if (strpos($log->accion, 'exitoso') !== false || strpos($log->accion, '_ok') !== false) $badge = 'success';
                                            elseif (strpos($log->accion, 'exception') !== false) $badge = 'warning';
                                            elseif (strpos($log->accion, 'error') !== false) $badge = 'danger';
                                            elseif (strpos($log->accion, 'cancelacion') !== false) $badge = 'dark';
                                            elseif (strpos($log->accion, 'pendiente') !== false) $badge = 'info';
                                        ?>
                                        <tr>
                                            <td><small class="text-muted"><?= $log->id ?></small></td>
                                            <td>
                                                <?php if (!empty($log->token)): ?>
                                                    <a href="<?= base_url('admin/logs_bdv/token/' . urlencode($log->token)) ?>">
                                                        <code><?= htmlspecialchars(substr($log->token, 0, 18)) ?>…</code>
                                                    </a>
                                                <?php else: ?>
                                                    <span class="text-muted">—</span>
                                                <?php endif; ?>
                                            </td>
                                            <td><span class="badge badge-<?= $badge ?>"><?= htmlspecialchars($log->accion) ?></span></td>
                                            <td>
                                                <small class="text-muted"
                                                       title="<?= htmlspecialchars($log->response) ?>"
                                                       style="display:inline-block; max-width:300px; overflow:hidden; text-overflow:ellipsis; white-space:nowrap; vertical-align:middle;">
                                                    <?= htmlspecialchars(substr((string) $log->response, 0, 100)) ?>
                                                </small>
                                            </td>
                                            <td><small><?= htmlspecialchars($log->fecha) ?></small></td>
                                            <td>
                                                <a href="<?= base_url('admin/logs_bdv/detalle/' . $log->id) ?>"
                                                   class="btn btn-outline-primary btn-xs" title="Ver detalle">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer bg-white">
                    <small class="text-muted">Mostrando <?= count($logs) ?> registros (máximo 200)</small>
                </div>
            </div>

        </div>
    </section>
</div>