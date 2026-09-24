<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>
                        <i class="fas fa-book"></i> Logs de pagos BDV
                        <small class="text-muted">Registro de transacciones con la pasarela del Banco de Venezuela</small>
                    </h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                        <li class="breadcrumb-item active">Logs BDV</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">

            <!-- Mensajes flash -->
            <?php if ($this->session->flashdata('success')): ?>
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <i class="fas fa-check-circle"></i> <?= $this->session->flashdata('success') ?>
                </div>
            <?php endif; ?>
            <?php if ($this->session->flashdata('error')): ?>
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <i class="fas fa-exclamation-triangle"></i> <?= $this->session->flashdata('error') ?>
                </div>
            <?php endif; ?>

            <!-- Botones de acción -->
            <div class="d-flex justify-content-end mb-3">
                <a href="<?= base_url('admin/logs_bdv/exportar') . '?' . http_build_query($filtros) ?>"
                   class="btn btn-outline-success btn-sm mr-2">
                    <i class="fas fa-download"></i> Exportar CSV
                </a>
                <button type="button" class="btn btn-outline-danger btn-sm"
                        data-toggle="modal" data-target="#modalLimpiar">
                    <i class="fas fa-trash"></i> Limpiar antiguos
                </button>
            </div>

            <!-- Estadísticas -->
            <div class="row">
                <div class="col-lg-2 col-md-4 col-sm-6">
                    <div class="small-box bg-primary">
                        <div class="inner">
                            <h3><?= number_format($estadisticas['total']) ?></h3>
                            <p>Total</p>
                        </div>
                        <div class="icon"><i class="fas fa-database"></i></div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-6">
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3><?= number_format($estadisticas['hoy']) ?></h3>
                            <p>Hoy</p>
                        </div>
                        <div class="icon"><i class="fas fa-calendar-check"></i></div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-6">
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3><?= number_format($estadisticas['exitosos']) ?></h3>
                            <p>Exitosos</p>
                        </div>
                        <div class="icon"><i class="fas fa-check-circle"></i></div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-6">
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3><?= number_format($estadisticas['errores']) ?></h3>
                            <p>Errores</p>
                        </div>
                        <div class="icon"><i class="fas fa-times-circle"></i></div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-6">
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3><?= number_format($estadisticas['excepciones']) ?></h3>
                            <p>Excepciones</p>
                        </div>
                        <div class="icon"><i class="fas fa-exclamation-triangle"></i></div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-6">
                    <div class="small-box bg-secondary">
                        <div class="inner">
                            <h3><?= number_format($estadisticas['cancelaciones']) ?></h3>
                            <p>Cancelados</p>
                        </div>
                        <div class="icon"><i class="fas fa-ban"></i></div>
                    </div>
                </div>
            </div>

            <!-- Filtros -->
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h3 class="card-title"><i class="fas fa-filter"></i> Filtros de búsqueda</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <form method="get" action="<?= base_url('admin/logs_bdv') ?>">
                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label class="small mb-1">ID Usuario</label>
                                    <input type="number" name="id_usuario" class="form-control form-control-sm"
                                           value="<?= htmlspecialchars($filtros['id_usuario']) ?>" placeholder="Ej: 123">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label class="small mb-1">Token</label>
                                    <input type="text" name="token" class="form-control form-control-sm"
                                           value="<?= htmlspecialchars($filtros['token']) ?>" placeholder="paymentId">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label class="small mb-1">Acción</label>
                                    <select name="accion" class="form-control form-control-sm">
                                        <option value="">Todas</option>
                                        <?php foreach ($acciones as $a): ?>
                                            <option value="<?= htmlspecialchars($a->accion) ?>"
                                                <?= ($filtros['accion'] === $a->accion) ? 'selected' : '' ?>>
                                                <?= htmlspecialchars($a->accion) ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label class="small mb-1">Desde</label>
                                    <input type="date" name="fecha_ini" class="form-control form-control-sm"
                                           value="<?= htmlspecialchars($filtros['fecha_ini']) ?>">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label class="small mb-1">Hasta</label>
                                    <input type="date" name="fecha_fin" class="form-control form-control-sm"
                                           value="<?= htmlspecialchars($filtros['fecha_fin']) ?>">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label class="small mb-1">&nbsp;</label>
                                    <button type="submit" class="btn btn-primary btn-sm btn-block">
                                        <i class="fas fa-search"></i> Filtrar
                                    </button>
                                </div>
                            </div>
                            <div class="col-md-10">
                                <div class="form-group">
                                    <label class="small mb-1">Búsqueda libre (acción, token, request, response)</label>
                                    <input type="text" name="busqueda" class="form-control form-control-sm"
                                           value="<?= htmlspecialchars($filtros['busqueda']) ?>"
                                           placeholder="Ej: exception, REF123...">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label class="small mb-1">&nbsp;</label>
                                    <a href="<?= base_url('admin/logs_bdv') ?>"
                                       class="btn btn-outline-secondary btn-sm btn-block">
                                        <i class="fas fa-times-circle"></i> Limpiar
                                    </a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Tabla -->
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-list"></i> Resultados (<?= number_format($total) ?> registros)
                    </h3>
                    <div class="card-tools">
                        <small class="text-muted">Página <?= (int)(($this->input->get('per_page') ?: 0) / 25) + 1 ?></small>
                    </div>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover table-striped table-sm mb-0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Usuario</th>
                                    <th>Token</th>
                                    <th>Método</th>
                                    <th>Acción</th>
                                    <th>Response (resumen)</th>
                                    <th>Fecha</th>
                                    <th>Opción</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (empty($logs)): ?>
                                    <tr>
                                        <td colspan="8" class="text-center text-muted py-4">
                                            <i class="fas fa-inbox" style="font-size: 2rem;"></i>
                                            <p class="mb-0 mt-2">No hay registros con los filtros aplicados</p>
                                        </td>
                                    </tr>
                                <?php else: ?>
                                    <?php foreach ($logs as $log): ?>
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
                                        <tr>
                                            <td><small class="text-muted"><?= $log->id ?></small></td>
                                            <td>
                                                <a href="<?= base_url('admin/logs_bdv/usuario/' . $log->id_usuario) ?>"
                                                   class="text-decoration-none">
                                                    <i class="fas fa-user-circle"></i> <?= (int) $log->id_usuario ?>
                                                </a>
                                            </td>
                                            <td>
                                                <?php if (!empty($log->token)): ?>
                                                    <a href="<?= base_url('admin/logs_bdv/token/' . urlencode($log->token)) ?>"
                                                       class="text-decoration-none">
                                                        <code><?= htmlspecialchars(substr($log->token, 0, 18)) ?>…</code>
                                                    </a>
                                                <?php else: ?>
                                                    <span class="text-muted">—</span>
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <span class="badge badge-secondary"><?= htmlspecialchars($log->metodo) ?></span>
                                            </td>
                                            <td>
                                                <span class="badge badge-<?= $badge ?>"><?= htmlspecialchars($log->accion) ?></span>
                                            </td>
                                            <td>
                                                <span class="text-muted"
                                                      title="<?= htmlspecialchars($log->response) ?>"
                                                      style="display:inline-block; max-width:220px; overflow:hidden; text-overflow:ellipsis; white-space:nowrap; vertical-align:middle;">
                                                    <?= htmlspecialchars(substr((string) $log->response, 0, 80)) ?>
                                                </span>
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

                <?php if (!empty($paginacion)): ?>
                    <div class="card-footer bg-white">
                        <div class="d-flex justify-content-between align-items-center">
                            <small class="text-muted">
                                Mostrando página <?= (int)(($this->input->get('per_page') ?: 0) / 25) + 1 ?>
                                de <?= max(1, ceil($total / 25)) ?>
                            </small>
                            <div><?= $paginacion ?></div>
                        </div>
                    </div>
                <?php endif; ?>
            </div>

        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- Modal Limpiar -->
<div class="modal fade" id="modalLimpiar" tabindex="-1" role="dialog" aria-labelledby="modalLimpiarLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form method="post" action="<?= base_url('admin/logs_bdv/limpiar') ?>">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalLimpiarLabel">
                        <i class="fas fa-trash text-danger"></i> Limpiar logs antiguos
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Esta acción eliminará permanentemente los logs anteriores a la fecha indicada.</p>
                    <label class="form-label">Eliminar logs con más de:</label>
                    <div class="input-group">
                        <input type="number" name="dias" class="form-control" value="90" min="1" max="3650">
                        <div class="input-group-append">
                            <span class="input-group-text">días</span>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                </div>
            </div>
        </form>
    </div>
</div>