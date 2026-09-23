<!-- Content Wrapper -->
<div class="content-wrapper">

    <!-- Content Header -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>
                        <i class="fas fa-robot"></i> Monitoreo CRON BDV
                        <small class="text-muted">Estado de pagos automáticos</small>
                    </h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url() ?>dashboard04/home">Inicio</a></li>
                        <li class="breadcrumb-item"><a href="<?= base_url('admin/logs_bdv') ?>">Logs BDV</a></li>
                        <li class="breadcrumb-item active">CRON Dashboard</li>
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
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <i class="fas fa-check-circle"></i> <?= $this->session->flashdata('success') ?>
                </div>
            <?php endif; ?>
            <?php if ($this->session->flashdata('error')): ?>
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <i class="fas fa-exclamation-triangle"></i> <?= $this->session->flashdata('error') ?>
                </div>
            <?php endif; ?>

            <!-- Botones de acción -->
            <div class="d-flex justify-content-end mb-3">
                <button type="button" class="btn btn-outline-secondary btn-sm mr-2"
                        onclick="location.reload()">
                    <i class="fas fa-sync-alt"></i> Refrescar
                </button>
                <a href="<?= base_url('admin/cron_dashboard/ejecutar') ?>"
                   class="btn btn-primary btn-sm mr-2"
                   onclick="return confirm('¿Ejecutar el CRON ahora?')">
                    <i class="fas fa-play"></i> Ejecutar CRON ahora
                </a>
                <a href="<?= base_url('admin/cron_dashboard/liberar_bloqueados') ?>"
                   class="btn btn-warning btn-sm"
                   onclick="return confirm('¿Liberar pagos bloqueados?')">
                    <i class="fas fa-unlock"></i> Liberar bloqueados
                </a>
            </div>

            <!-- Tarjetas KPI -->
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3 id="kpi-pendientes"><?= number_format($stats['pendientes']) ?></h3>
                            <p>Pendientes</p>
                        </div>
                        <div class="icon"><i class="fas fa-hourglass-half"></i></div>
                        <a href="<?= base_url('admin/logs_bdv?accion=cron_checkPayment') ?>" class="small-box-footer">
                            Ver detalle <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3 id="kpi-procesando"><?= number_format($stats['procesando']) ?></h3>
                            <p>Procesando ahora</p>
                        </div>
                        <div class="icon"><i class="fas fa-cog fa-spin"></i></div>
                        <span class="small-box-footer">En curso</span>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3 id="kpi-confirmados"><?= number_format($stats['confirmados_hoy']) ?></h3>
                            <p>Confirmados hoy</p>
                        </div>
                        <div class="icon"><i class="fas fa-check-circle"></i></div>
                        <span class="small-box-footer">
                            Total histórico: <b><?= number_format($stats['total_confirmados']) ?></b>
                        </span>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3 id="kpi-errores"><?= number_format($stats['errores_hoy']) ?></h3>
                            <p>Errores hoy</p>
                        </div>
                        <div class="icon"><i class="fas fa-exclamation-triangle"></i></div>
                        <a href="<?= base_url('admin/logs_bdv?accion=exception') ?>" class="small-box-footer">
                            Ver errores <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Alerta de bloqueados -->
            <?php if ($stats['bloqueados'] > 0): ?>
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <h5><i class="fas fa-exclamation-triangle"></i> ¡Atención!</h5>
                    Hay <b><?= $stats['bloqueados'] ?></b> pagos bloqueados por más de 5 minutos.
                    <a href="<?= base_url('admin/cron_dashboard/liberar_bloqueados') ?>"
                       class="btn btn-sm btn-danger ml-2">
                        <i class="fas fa-unlock"></i> Liberar ahora
                    </a>
                </div>
            <?php endif; ?>

            <!-- Gráfico + Tabla -->
            <div class="row">

                <!-- Gráfico de 7 días -->
                <div class="col-lg-8">
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="fas fa-chart-line"></i> Pagos confirmados (últimos 7 días)
                            </h3>
                        </div>
                        <div class="card-body">
                            <canvas id="chartPagos" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                        </div>
                    </div>
                </div>

                <!-- Info de la última ejecución -->
                <div class="col-lg-4">
                    <div class="card card-info card-outline">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="fas fa-info-circle"></i> Estado del sistema
                            </h3>
                        </div>
                        <div class="card-body">
                            <table class="table table-sm table-borderless mb-0">
                                <tr>
                                    <td><i class="fas fa-clock text-muted"></i> Última actualización</td>
                                    <td class="text-right" id="ultima-actualizacion"><?= date('H:i:s') ?></td>
                                </tr>
                                <tr>
                                    <td><i class="fas fa-robot text-muted"></i> Estado CRON</td>
                                    <td class="text-right">
                                        <span class="badge badge-success">
                                            <i class="fas fa-check"></i> Activo
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td><i class="fas fa-tachometer-alt text-muted"></i> Intentos promedio</td>
                                    <td class="text-right"><?= $stats['intentos_promedio'] ?></td>
                                </tr>
                                <tr>
                                    <td><i class="fas fa-database text-muted"></i> Total procesados</td>
                                    <td class="text-right"><?= number_format($stats['total_confirmados']) ?></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Tabla de pagos bloqueados -->
            <?php if (!empty($pagos_bloqueados)): ?>
                <div class="card card-warning card-outline">
                    <div class="card-header">
                        <h3 class="card-title">
                            <i class="fas fa-lock"></i> Pagos bloqueados (> 5 min)
                        </h3>
                    </div>
                    <div class="card-body p-0">
                        <table class="table table-sm table-striped mb-0">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Usuario</th>
                                    <th>Token</th>
                                    <th>Monto</th>
                                    <th>Intentos</th>
                                    <th>Última actualización</th>
                                    <th>Acción</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($pagos_bloqueados as $p): ?>
                                    <tr>
                                        <td>#<?= (int) $p->id ?></td>
                                        <td>
                                            <a href="<?= base_url('admin/logs_bdv/usuario/' . $p->id_usuario) ?>">
                                                #<?= (int) $p->id_usuario ?>
                                            </a>
                                        </td>
                                        <td><code><?= htmlspecialchars(substr($p->token_bdv, 0, 18)) ?>…</code></td>
                                        <td><?= number_format($p->monto_apagar, 2) ?></td>
                                        <td><span class="badge badge-danger"><?= (int) $p->intento_cron ?></span></td>
                                        <td><small><?= htmlspecialchars($p->fecha_transferencia) ?></small></td>
                                        <td>
                                            <a href="<?= base_url('admin/logs_bdv/detalle/0') ?>" 
                                               class="btn btn-xs btn-outline-primary">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            <?php endif; ?>

            <!-- Historial por día -->
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-history"></i> Historial de ejecuciones (últimos 15 días)
                    </h3>
                </div>
                <div class="card-body p-0">
                    <table class="table table-sm table-hover mb-0">
                        <thead>
                            <tr>
                                <th>Día</th>
                                <th>Total eventos</th>
                                <th>Confirmados</th>
                                <th>Errores</th>
                                <th>Ratio</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (empty($historial)): ?>
                                <tr>
                                    <td colspan="5" class="text-center text-muted py-4">
                                        <i class="fas fa-inbox"></i> Sin historial aún
                                    </td>
                                </tr>
                            <?php else: ?>
                                <?php foreach ($historial as $h): ?>
                                    <?php
                                        $ratio = $h->total > 0 ? round(($h->confirmados / $h->total) * 100, 1) : 0;
                                        $badge = 'success';
                                        if ($ratio < 50) $badge = 'danger';
                                        elseif ($ratio < 80) $badge = 'warning';
                                    ?>
                                    <tr>
                                        <td><?= htmlspecialchars($h->dia) ?></td>
                                        <td><span class="badge badge-secondary"><?= number_format($h->total) ?></span></td>
                                        <td><span class="badge badge-success"><?= number_format($h->confirmados) ?></span></td>
                                        <td><span class="badge badge-danger"><?= number_format($h->errores) ?></span></td>
                                        <td><span class="badge badge-<?= $badge ?>"><?= $ratio ?>%</span></td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </section>
</div>

<!-- Chart.js -->
<script>
document.addEventListener('DOMContentLoaded', function () {

    // Datos de la serie
    var serie = <?= json_encode($serie_7dias) ?>;

    var labels = serie.map(function (s) { return s.label; });
    var datos  = serie.map(function (s) { return s.confirmados; });

    var ctx = document.getElementById('chartPagos').getContext('2d');
    new Chart(ctx, {
        type: 'line',
        data: {
            labels: labels,
            datasets: [{
                label: 'Pagos confirmados',
                data: datos,
                backgroundColor: 'rgba(40, 167, 69, 0.2)',
                borderColor: 'rgba(40, 167, 69, 1)',
                borderWidth: 2,
                pointBackgroundColor: 'rgba(40, 167, 69, 1)',
                pointBorderColor: '#fff',
                pointRadius: 4,
                tension: 0.3,
                fill: true
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: { display: false },
                tooltip: {
                    callbacks: {
                        label: function (context) {
                            return 'Confirmados: ' + context.parsed.y;
                        }
                    }
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: { precision: 0 }
                }
            }
        }
    });

    // Auto-refresh de KPIs cada 60 segundos
    setInterval(function () {
        fetch('<?= base_url('admin/cron_dashboard/stats_ajax') ?>')
            .then(function (r) { return r.json(); })
            .then(function (data) {
                if (!data.ok) return;
                document.getElementById('kpi-pendientes').textContent = data.stats.pendientes.toLocaleString();
                document.getElementById('kpi-procesando').textContent = data.stats.procesando.toLocaleString();
                document.getElementById('kpi-confirmados').textContent = data.stats.confirmados_hoy.toLocaleString();
                document.getElementById('kpi-errores').textContent = data.stats.errores_hoy.toLocaleString();
                document.getElementById('ultima-actualizacion').textContent = data.fecha.split(' ')[1];
            })
            .catch(function () { /* silencioso */ });
    }, 60000);

});
</script>