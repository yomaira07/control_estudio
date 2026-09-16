<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" style="background: #f4f6f9;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0" style="font-weight: 300; color: #003366;">
                        <i class="fas fa-money-bill-wave" style="color: #003366; margin-right: 8px;"></i>
                        <span style="color: #003366; font-weight: 600;">SCE-ENFMP</span>
                        <span style="color: #2c3e50; font-weight: 300;"> - Registro de Pago de Trámites</span>
                    </h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right" style="background: transparent;">
                        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>dashboard04/home" style="color: #6c757d;">Inicio</a></li>
                        <li class="breadcrumb-item"><a href="#" style="color: #6c757d;">Trámites</a></li>
                        <li class="breadcrumb-item active" style="color: #003366; font-weight: 600;">Registro de Pago</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Card Principal -->
        <div class="card card-primary card-outline shadow-sm" style="border-radius: 10px; border-top: 4px solid #003366;">
            <div class="card-body p-0">
                <div class="card" style="border: none; border-radius: 10px;">
                    
                    <!-- Header -->
                    <div class="card-header py-3" style="border-bottom: 1px solid #e8e8e8; border-radius: 10px 10px 0 0; background: #fafafa;">
                        <div class="d-flex align-items-center justify-content-between flex-wrap">
                            <div class="d-flex align-items-center">
                                <div class="mr-3" style="width: 42px; height: 42px; background: #003366; border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                                    <i class="fas fa-file-invoice text-white" style="font-size: 1.1rem;"></i>
                                </div>
                                <div>
                                    <h5 class="mb-0" style="font-weight: 600; color: #2c3e50;">
                                        <strong>Trámites Solicitados</strong>
                                    </h5>
                                    <small class="text-muted" style="font-size: 0.75rem;">
                                        <i class="fas fa-calendar-alt mr-1"></i>
                                        Registro de Pago de Trámites
                                    </small>
                                </div>
                            </div>
                            <div>
                                <span class="badge" style="font-size: 0.8rem; padding: 5px 16px; border-radius: 20px; font-weight: 500; background: #28a745; color: white;">
                                    <i class="fas fa-check-circle mr-1"></i>
                                    Pago Pendiente
                                </span>
                            </div>
                        </div>
                    </div>

                    <!-- Body -->
                    <div class="card-body p-4">

                        <!-- Mensajes de Alerta -->
                        <?php if ($this->session->flashdata("error")): ?>
                            <div class="alert alert-danger alert-dismissible" style="border-radius: 8px; border-left: 4px solid #dc3545;">
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                <i class="fas fa-ban mr-2"></i> <?php echo $this->session->flashdata("error"); ?>
                            </div>
                        <?php endif; ?>
                        <?php if ($this->session->flashdata("warning")): ?>
                            <div class="alert alert-warning alert-dismissible" style="border-radius: 8px; border-left: 4px solid #ffc107;">
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                <i class="fas fa-exclamation-triangle mr-2"></i> <?php echo $this->session->flashdata("warning"); ?>
                            </div>
                        <?php endif; ?>
                        <?php if ($this->session->flashdata("success")): ?>
                            <div class="alert alert-success alert-dismissible" style="border-radius: 8px; border-left: 4px solid #28a745;">
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                <i class="fas fa-check mr-2"></i> <?php echo $this->session->flashdata("success"); ?>
                            </div>
                        <?php endif; ?>

                        <?php if (!empty($list_solicitud)): 
                            // ✅ Guardar referencia a la primera solicitud
                            $solicitud_principal = reset($list_solicitud);
                        ?>

                        <!-- ============================================================ -->
                        <!-- TABLA: DETALLE DE TRÁMITES A PAGAR                            -->
                        <!-- ============================================================ -->
                        <div class="card card-info card-outline" style="border-radius: 8px; border-left: 4px solid #003366; border-top: none; margin-bottom: 20px;">
                            <div class="card-header" style="background: #e8f0fe; border-bottom: 1px solid #e8e8e8; padding: 10px 18px; border-radius: 8px 8px 0 0;">
                                <h6 class="mb-0" style="font-weight: 600; color: #003366;">
                                    <i class="fas fa-list" style="color: #003366; margin-right: 8px;"></i>
                                    Detalle de Trámites a Pagar
                                </h6>
                            </div>
                            <div class="card-body p-0">
                                <div class="table-responsive">
                                    <table class="table table-hover" style="border-radius: 8px; overflow: hidden; margin-bottom: 0;">
                                        <thead style="background: linear-gradient(135deg, #003366 0%, #1a5276 100%); color: white;">
                                            <tr>
                                                <th style="padding: 10px 15px; font-weight: 500; font-size: 0.8rem;">
                                                    <i class="fas fa-file-signature mr-2"></i>Nombre del Trámite
                                                </th>
                                                <th style="padding: 10px 15px; text-align: right; font-weight: 500; font-size: 0.8rem;">
                                                    <i class="fas fa-money-bill-wave mr-2"></i>Monto
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                            $total_pagar = 0;
                                            foreach ($list_solicitud as $solicitud): 
                                                // Determinar monto base según descuento
                                                $monto = ($alumno_list->descuento == 1) ? $solicitud->monto_mp : $solicitud->monto_gen;
                                                
                                                // Calcular monto del arancel según tipo de trámite
                                                if ($solicitud->id_tramite == 19 || $solicitud->id_tramite == 17) {
                                                    $uc = !empty($solicitud->uc) ? (int)$solicitud->uc : 0;
                                                    $monto_arancel = $uc * $monto;
                                                } else {
                                                    $monto_arancel = $monto;
                                                }
                                                
                                                $total_pagar += $monto_arancel;
                                            ?>
                                                <tr style="border-bottom: 1px solid #f0f0f0;">
                                                    <td style="padding: 10px 15px; font-size: 0.85rem; color: #2c3e50;">
                                                        <?php if ($solicitud->id_tramite == 16): ?>
                                                            <?php echo $solicitud->nombre; ?> 
                                                            <strong style="color: #003366;">(incluye el Récord Académico de Calificaciones)</strong>
                                                        <?php elseif ($solicitud->id_tramite == 17 || $solicitud->id_tramite == 19): ?>
                                                            <?php echo $solicitud->nombre; ?><br>
                                                            <strong>Unidades Créditos Aprobadas: <?php echo (int)$solicitud->uc; ?></strong>
                                                        <?php else: ?>
                                                            <?php echo $solicitud->nombre; ?>
                                                        <?php endif; ?>
                                                    </td>
                                                    <td style="padding: 10px 15px; text-align: right; font-size: 0.85rem; font-weight: 600; color: #28a745;">
                                                        <?php echo number_format($monto_arancel, 2, ',', '.') . ' Bs.'; ?>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <!-- ============================================================ -->
                        <!-- RESUMEN: TOTAL A PAGAR (ÚNICO)                                -->
                        <!-- ============================================================ -->
                        <?php 
                        // Calcular fuera de lapso (si aplica)
                        $mp = ($datos_trabajo->descuento == "1") ? 1 : 0;
                        $total_pagar_fuera_lapso = 0;
                        
                        if ($this->session->userdata('fuera_lapso_tra_adm') == 1) {
                            foreach ($aranceles as $arancel) {
                                $ids_fuera_lapso = array(33, 34, 1, 2);
                                if (in_array((int)$arancel->id_tramites, $ids_fuera_lapso)) {
                                    $total_pagar_fuera_lapso = ($mp == 1) ? $arancel->monto_mp : $arancel->monto_gen;
                                }
                            }
                        }
                        
                        $total_pagar_gen = $total_pagar + $total_pagar_fuera_lapso;
                        ?>

                        <div class="card card-success card-outline" style="border-radius: 8px; border-left: 4px solid #28a745; border-top: none; margin-bottom: 20px;">
                            <div class="card-header" style="background: #e8f5e9; border-bottom: 1px solid #e8e8e8; padding: 10px 18px; border-radius: 8px 8px 0 0;">
                                <h6 class="mb-0" style="font-weight: 600; color: #1e7e34;">
                                    <i class="fas fa-calculator" style="color: #28a745; margin-right: 8px;"></i>
                                    Resumen del Pago
                                </h6>
                            </div>
                            <div class="card-body p-0">
                                <div class="table-responsive">
                                    <table class="table" style="margin-bottom: 0;">
                                        <tbody>
                                            <tr style="border-bottom: 1px solid #f0f0f0;">
                                                <td style="padding: 10px 15px; font-weight: 500; color: #2c3e50; width: 50%;">
                                                    <i class="fas fa-file-signature text-primary mr-2"></i>Subtotal Trámites
                                                </td>
                                                <td style="padding: 10px 15px; text-align: right; font-weight: 500; color: #2c3e50;">
                                                    <?php echo number_format($total_pagar, 2, ',', '.') . ' Bs.'; ?>
                                                </td>
                                            </tr>
                                            <?php if ($total_pagar_fuera_lapso > 0): ?>
                                            <tr style="border-bottom: 1px solid #f0f0f0;">
                                                <td style="padding: 10px 15px; font-weight: 500; color: #2c3e50;">
                                                    <i class="fas fa-clock text-warning mr-2"></i>Monto por Arancel Fuera de Lapso
                                                </td>
                                                <td style="padding: 10px 15px; text-align: right; font-weight: 500; color: #ffc107;">
                                                    <?php echo number_format($total_pagar_fuera_lapso, 2, ',', '.') . ' Bs.'; ?>
                                                </td>
                                            </tr>
                                            <?php endif; ?>
                                            <tr style="background: #e8f5e9; border-top: 2px solid #28a745;">
                                                <td style="padding: 12px 15px; font-weight: 700; color: #1e7e34; font-size: 1.05rem;">
                                                    <i class="fas fa-money-bill-wave text-success mr-2"></i>
                                                    TOTAL A PAGAR
                                                </td>
                                                <td style="padding: 12px 15px; text-align: right; font-weight: 700; color: #28a745; font-size: 1.2rem;">
                                                    <?php echo number_format($total_pagar_gen, 2, ',', '.') . ' Bs.'; ?>
                                                    <br><small style="font-size: 0.7rem; color: #6c757d; font-weight: 400;">
                                                        <i class="fas fa-info-circle mr-1"></i> No se aceptan divisas. El pago debe ser realizado a la tasa de cambio establecida por el BCV correspondiente al día que realiza el registro.
                                                    </small>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2" style="padding: 10px 15px; text-align: center; background: #f0f9ff;">
                                                    <small style="color: #003366; font-weight: 600;">
                                                        <i class="fas fa-chart-line mr-1"></i> Tasa BCV Vigente: Consulte www.bcv.org.ve
                                                    </small>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <!-- ============================================================ -->
                        <!-- BOTONES DE ACCIÓN                                             -->
                        <!-- ============================================================ -->
                        <div class="row mt-4">
                            <div class="col-md-12 text-center">
                                <div class="d-flex justify-content-center flex-wrap" style="gap: 12px;">
                                    <button type="button"
                                            class="btn btn-success" 
                                            id="btnPagoBDV"
                                            data-solicitud="<?php echo $solicitud_principal->id_solicitud; ?>"
                                            data-tramite="<?php echo $solicitud_principal->id_tramite; ?>"
                                            data-total="<?php echo number_format($total_pagar_gen, 2, '.', ''); ?>"
                                            style="border-radius: 10px; padding: 12px 45px; font-weight: 600; transition: all 0.3s; min-width: 220px; font-size: 16px; background: #1a8a3f; border-color: #1a8a3f;">
                                        <i class="fas fa-credit-card mr-2"></i>
                                        Pagar con BDV
                                    </button>

                                    <a href="<?php echo base_url(); ?>dashboard04/index" 
                                       class="btn btn-default" 
                                       style="border-radius: 10px; padding: 12px 30px; font-weight: 500; transition: all 0.3s; min-width: 150px;">
                                        <i class="fas fa-times mr-2"></i>
                                        Cancelar
                                    </a>
                                </div>
                            </div>
                        </div>

                        <?php else: ?>
                        <!-- Mensaje si no hay solicitudes -->
                        <div class="alert alert-warning" style="border-radius: 8px; border-left: 4px solid #ffc107; text-align: center;">
                            <i class="fas fa-exclamation-triangle fa-2x d-block mb-2" style="color: #ffc107;"></i>
                            <h5 style="color: #856404;">No hay trámites solicitados para procesar el pago</h5>
                            <p style="color: #2c3e50;">Debe realizar una solicitud de trámite administrativo primero.</p>
                            <a href="<?php echo base_url(); ?>dashboard09/index/2" class="btn btn-primary" style="border-radius: 0px; padding: 8px 25px;">
                                <i class="fas fa-plus-circle mr-2"></i> Solicitar Trámite
                            </a>
                        </div>
                        <?php endif; ?>

                    </div><!-- /.card-body -->
                </div><!-- /.card -->
            </div><!-- /.card-body -->
        </div><!-- /.card -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- ============================================================ -->
<!-- ESTILOS                                                        -->
<!-- ============================================================ -->
<style>
    .card { border-radius: 10px !important; overflow: hidden; }
    .btn-primary { background-color: #007bff; border-color: #007bff; color: #fff; transition: all 0.2s ease; }
    .btn-primary:hover { background-color: #0069d9; border-color: #0062cc; box-shadow: 0 2px 8px rgba(0, 123, 255, 0.3); transform: translateY(-2px); }
    .btn-default { background-color: #fff; border: 1px solid #ced4da; color: #6c757d; transition: all 0.2s ease; }
    .btn-default:hover { background-color: #e9ecef; border-color: #ced4da; color: #343a40; transform: translateY(-2px); }
    .table-hover tbody tr:hover { background-color: #e8f0fe !important; transition: background 0.2s ease; }
    
    @media (max-width: 768px) {
        .btn { padding: 8px 20px !important; font-size: 0.85rem !important; width: 100%; margin-bottom: 5px; }
        .btn-default { margin-left: 0 !important; }
        .table td, .table th { padding: 8px 10px !important; font-size: 0.75rem !important; }
    }
</style>

<!-- ============================================================ -->
<!-- SCRIPT                                                         -->
<!-- ============================================================ -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    
    // ✅ Botón de pago BDV
    var btnPagoBDV = document.getElementById('btnPagoBDV');
    if (btnPagoBDV) {
        btnPagoBDV.addEventListener('click', function(e) {
            e.preventDefault();
            
            // ✅ Leer datos desde los data-attributes
            var solicitud = this.getAttribute('data-solicitud');
            var tramite   = this.getAttribute('data-tramite');
            var total     = parseFloat(this.getAttribute('data-total'));
            
            if (!solicitud || !tramite || isNaN(total) || total <= 0) {
                alert('Error: no se pudieron obtener los datos del trámite. Recargue la página.');
                return;
            }
            
            var montoFormateado = total.toLocaleString('es-VE', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
            
            var mensaje = "💳 PAGO CON BANCO DE VENEZUELA\n\n" +
                          "Serás redirigido a la pasarela de pago BDV.\n\n" +
                          "📌 Monto a pagar: Bs. " + montoFormateado + "\n\n" +
                          "⚠️ Antes de continuar, asegúrate de:\n" +
                          "✅ Tener saldo suficiente en tu cuenta BDV\n" +
                          "✅ Tener a la mano los datos de tu tarjeta\n" +
                          "✅ Conexión estable a internet\n\n" +
                          "¿Continuar con el pago?";
            
            if (confirm(mensaje)) {
                this.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i> Redirigiendo...';
                this.disabled = true;
                
                // ✅ Crear formulario temporal
                var form = document.createElement('form');
                form.method = 'POST';
                form.action = "<?php echo base_url(); ?>pagos/iniciar_tramite_adm";
                
                // ✅ Enviar los 3 campos que espera el controlador
                var inputs = {
                    'solicitud': solicitud,
                    'tramite': tramite,
                    'total_final': total.toFixed(2)  // número limpio, sin formato
                };
                
                for (var name in inputs) {
                    var input = document.createElement('input');
                    input.type = 'hidden';
                    input.name = name;
                    input.value = inputs[name];
                    form.appendChild(input);
                }
                
                document.body.appendChild(form);
                form.submit();
            }
        });
    }
    
    // ✅ Banner de pago pendiente (más elegante que confirm)
    <?php if ($this->session->userdata('pago_bdv_token')): ?>
    var banner = document.createElement('div');
    banner.style.cssText = 'position:fixed;top:80px;right:20px;z-index:9999;background:#fff3cd;border-left:4px solid #ffc107;padding:14px 20px;border-radius:8px;box-shadow:0 4px 12px rgba(0,0,0,0.15);max-width:380px;';
    banner.innerHTML = 
        '<div style="font-size:0.9rem;color:#856404;position:relative;">' +
        '<strong><i class="fas fa-exclamation-triangle mr-2"></i>Tienes un pago pendiente con BDV</strong><br>' +
        '<a href="<?php echo base_url(); ?>pagos/confirmacion" style="color:#003366;font-weight:600;text-decoration:underline;margin-top:6px;display:inline-block;">Verificar estado del pago →</a>' +
        '<button onclick="this.parentNode.parentNode.remove()" style="position:absolute;top:-4px;right:-4px;background:none;border:none;font-size:1.2rem;cursor:pointer;color:#856404;">&times;</button>' +
        '</div>';
    document.body.appendChild(banner);
    <?php endif; ?>
    
});
</script>