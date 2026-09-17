<footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Versión</b> 2.0
    </div>
    <strong>Copyright &copy; 2019-2026 SCE-ENFMP.</strong> Todos los derechos reservados.

    <div class="footer-navegador">
        <i class="fas fa-info-circle"></i>
        Sugerimos utilizar para mejor funcionamiento el navegador
        <strong>Mozilla Firefox</strong>
        <img src="<?php echo base_url(); ?>assets/img/firefox.jpeg" alt="Firefox">
    </div>
</footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- ============================================================ -->
<!-- SCRIPTS - ORDEN CORRECTO PARA ADMINLTE                        -->
<!-- ============================================================ -->

<!-- jQuery (SOLO UNA VEZ, sin duplicados de CDN) -->
<script src="<?php echo base_url(); ?>assets/template/plugins/jquery/jquery.min.js"></script>

<!-- Bootstrap 4 -->
<script src="<?php echo base_url(); ?>assets/template/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- AdminLTE App (DEBE ir DESPUÉS de jQuery) -->
<script src="<?php echo base_url(); ?>assets/template/dist/js/adminlte.min.js"></script>

<!-- overlayScrollbars -->
<script src="<?php echo base_url(); ?>assets/template/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>

<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url(); ?>assets/template/dist/js/demo.js"></script>

<!-- DataTables -->
<script src="<?php echo base_url(); ?>assets/template/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/template/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo base_url(); ?>assets/template/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?php echo base_url(); ?>assets/template/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>

<!-- bs-custom-file-input -->
<script src="<?php echo base_url(); ?>assets/template/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>

<!-- DataTables Export -->
<script src="<?php echo base_url();?>assets/template/datatables-export/js/dataTables.buttons.min.js"></script>
<script src="<?php echo base_url();?>assets/template/datatables-export/js/buttons.flash.min.js"></script>
<script src="<?php echo base_url();?>assets/template/datatables-export/js/jszip.min.js"></script>
<script src="<?php echo base_url();?>assets/template/datatables-export/js/pdfmake.min.js"></script>
<script src="<?php echo base_url();?>assets/template/datatables-export/js/vfs_fonts.js"></script>
<script src="<?php echo base_url();?>assets/template/datatables-export/js/buttons.html5.min.js"></script>
<script src="<?php echo base_url();?>assets/template/datatables-export/js/buttons.print.min.js"></script>

<!-- daterangepicker -->
<script src="<?php echo base_url(); ?>assets/template/plugins/moment/moment.min.js"></script>
<script src="<?php echo base_url(); ?>assets/template/plugins/daterangepicker/daterangepicker.js"></script>

<!-- ChartJS -->
<script src="<?php echo base_url(); ?>assets/template/plugins/chart.js/Chart.min.js"></script>

<script type="text/javascript">
$(document).ready(function () {
  bsCustomFileInput.init();
});
</script>
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>

<script>
function sumar() {
  var total = 0;
  $(".monto").each(function() {
    if (isNaN(parseFloat($(this).val()))) {
      total += 0;
    } else {
      total += parseFloat($(this).val());
    }
  });
  document.getElementById('spTotal').innerHTML = total;
}
</script>
<script>
$('#checkall').change(function () {
    $('.cb-element').prop('checked',this.checked);
});

$('.cb-element').change(function () {
 if ($('.cb-element:checked').length == $('.cb-element').length){
  $('#checkall').prop('checked',true);
 }
 else {
  $('#checkall').prop('checked',false);
 }
});
</script>

<!-- FUNCION SOLO NUMERO -->
<script type="text/javascript">
function controltag(e) {
    tecla = (document.all) ? e.keyCode : e.which;
    if (tecla==8) return true;
    else if (tecla==0||tecla==9) return true;
    patron =/[0-9\s]/;
    te = String.fromCharCode(tecla);
    return patron.test(te);
}
</script>

<!-- COMBO DE OFERTA ACADEMICA -->
<script>
$(document).ready(function(){

$('#comboprograma').change(function(){
     var programa_id = $('#comboprograma').val();
     if(programa_id != '')
     {
        $.ajax({
        url:"<?php echo base_url(); ?>dashboard09/combotramite/"+programa_id,
        type:"POST",
        data:{programa_id:programa_id},
        success:function(data)
        {
          $('#combotramite').html(data);
        }
        });
     }
     else
     {
      $('#combotramite').html('<option value="">Seleccionar Tramite</option>');
     }
});

$('#comboprogramaRuc').change(function(){
     var programa_id = $('#comboprogramaRuc').val();
     if(programa_id != '')
     {
        $.ajax({
        url:"<?php echo base_url(); ?>dashboard09/combotramiteRuc/"+programa_id,
        type:"POST",
        data:{programa_id:programa_id},
        success:function(data)
        {
          $('#combotramiteRuc').html(data);
        }
        });
     }
     else
     {
      $('#combotramiteRuc').html('<option value="">Seleccionar Tramite</option>');
     }
});

$('#comboprogramaRucRe').change(function(){
     var programa_id = $('#comboprogramaRucRe').val();
     if(programa_id != '')
     {
        $.ajax({
        url:"<?php echo base_url(); ?>dashboard09/combotramiteRuc_requisito/"+programa_id,
        type:"POST",
        data:{programa_id:programa_id},
        success:function(data)
        {
          $('#combotramiteRucRe').html(data);
        }
        });
     }
     else
     {
      $('#combotramiteRucRe').html('<option value="">Seleccionar Tramite</option>');
     }
});

$('#programa').change(function(){
      var programa_id = $('#programa').val();
      if(programa_id != '')
      {
       $.ajax({
        url:"<?php echo base_url(); ?>admin/oferta_academica/combo_unidad",
        type:"POST",
        data:{programa_id:programa_id},
        success:function(data)
        {
         $('#pensum').html(data);
        }
       });
      }
      else
      {
       $('#pensum').html('<option value="">Select Pensum</option>');
      }
 });

$('#pensum').change(function(){
        var pensum_id = $('#pensum').val();
        var precio_uc=0;
        if(pensum_id != '')
        {
         $.ajax({
              url:"<?php echo base_url(); ?>admin/oferta_academica/info_unidad",
              type:"POST",
              data:{pensum_id:pensum_id},
              dataType : 'json',
              success:function(data)
              {
               var jsonstring = JSON.stringify(data);
               var jsonobject = JSON.parse(jsonstring);

              $("#codigo").val(jsonobject.codigo) ;
              $("#trimestre").val(jsonobject.trimestre) ;
              $("#unidad").val(jsonobject.unidad_curricular) ;
              $("#tipo_programa").val(jsonobject.tipo_programa) ;

                if(jsonobject.tipo_programa=='1'){
                   var precio_uc = $('#valor_unidad').val();
                   $("#valor").val(precio_uc) ;
                  var valor_unidad = jsonobject.unidad_curricular ;
                  var total_general = parseFloat(precio_uc) * parseFloat(valor_unidad);
                  $("#monto_general").val(total_general) ;
                  var precio_uc_mp = ($('#valor_unidad').val())-($('#valor_unidad').val()*40/100);
                  $("#valor_mp").val(precio_uc_mp.toFixed(2) );
                  var total_general_mp = parseFloat(precio_uc_mp) * parseFloat(valor_unidad);
                  $("#monto_mp").val(total_general_mp.toFixed(2) );
                }else{
                   if(jsonobject.tipo_programa=='2'){
                  var precio_uc = $('#valor_unidadm').val();
                  $("#valor").val(precio_uc) ;
                  var valor_unidad = jsonobject.unidad_curricular ;
                  var total_general = parseFloat(precio_uc) * parseFloat(valor_unidad);
                  $("#monto_general").val(total_general) ;
                  var precio_uc_mp = ($('#valor_unidadm').val())-($('#valor_unidadm').val()*40/100);
                  $("#valor_mp").val(precio_uc_mp.toFixed(2) );
                  var total_general_mp = parseFloat(precio_uc_mp) * parseFloat(valor_unidad);
                  $("#monto_mp").val(total_general_mp.toFixed(2) );
                }
              }
              }
          });
        }
        else
        {
         $('#codigo').html('sin valor');
        }
  })
 });
</script>

<!-- CHECK BOX de INSCRIPCION -->
<script>
 $(document).ready(function() {
  $('[name="checks[]"]').click(function() {
    var arr = $('[name="checks[]"]:checked').map(function(){
      return this.value;
    }).get();
    var str = arr.join(',');
    $('#arr').text(JSON.stringify(arr));
    $('#str').val(str);
  });
});
</script>

<!-- CHECK BOX de REGISTRO PAGO -->
<script type="text/javascript">
 $(document).ready(function() {
  $('[name="checkspago[]"]').click(function() {
        var arr = $('[name="checkspago[]"]:checked').map(function(){
          return this.value;
        }).get();
        var str = arr.join(',');
        $('#arr').text(JSON.stringify(arr));
        $('#valor').val(str);

        if(str != ''); 
        {
          $.ajax({
                  url:"<?php echo base_url(); ?>dashboard04/valor_pago",
                  type:"POST",
                  data:{str:str},
                  dataType : 'json',
                  success:function(data)
                  {
                  var jsonstring = JSON.stringify(data);
                  var jsonobject = JSON.parse(jsonstring);
                  }
            })
        }
   });
});
</script>

<!-- COMBO ESTADO MUNICIPIO PARROQUIA -->
<script>
$(document).ready(function(){

 $('#comboestado').change(function(){
      var comboestado_id = $('#comboestado').val();
      if(comboestado_id != '')
      {
       $.ajax({
        url:"<?php echo base_url(); ?>dashboard04/combo_estado",
        type:"POST",
        data:{comboestado_id:comboestado_id},
       success:function(data)
        {
         $('#combomunicipio').html(data);
        }
       });
      }
      else
      {
       $('#combomunicipio').html('<option value="">Seleccione Municipio</option>');
      }
 });

 $('#combomunicipio').change(function(){
      var combomunicipio_id = $('#combomunicipio').val();
      if(combomunicipio_id != '')
      {
       $.ajax({
        url:"<?php echo base_url(); ?>dashboard04/combo_municipio",
        type:"POST",
        data:{combomunicipio_id:combomunicipio_id},
       success:function(data)
        {
         $('#comboparroquia').html(data);
        }
       });
      }
      else
      {
       $('#comboparroquia').html('<option value="">Seleccione Parroquia</option>');
      }
 });
});
</script>

<!-- ============================================================ -->
<!-- 🔔 WIDGET ALERTAS CRON BDV (SOLO ROL 1 = ADMINISTRADOR)      -->
<!-- ============================================================ -->
<?php if ((int) $this->session->userdata('rol') === 1): ?>
<script>
/**
 * Widget de alertas CRON BDV
 * Se ejecuta solo para rol 1 (administrador)
 */
(function () {
    'use strict';

    var URL_AJAX       = '<?= base_url('admin/cron_dashboard/alertas_ajax') ?>';
    var URL_LOGS_BLOQ  = '<?= base_url('admin/logs_bdv?accion=cron_checkPayment') ?>';
    var URL_LOGS_ERR   = '<?= base_url('admin/logs_bdv?accion=exception') ?>';
    var URL_LIBERAR    = '<?= base_url('admin/cron_dashboard/liberar_bloqueados') ?>';

    var ultimaAlertaCount = 0;
    var primeraCarga      = true;

    function cargarAlertas() {
        // Evitar la llamada si el widget no está en el DOM (por si acaso)
        if (!document.getElementById('badge-alertas-cron')) {
            return;
        }

        fetch(URL_AJAX, { credentials: 'same-origin' })
            .then(function (r) { return r.json(); })
            .then(function (data) {
                if (!data.ok) return;
                renderWidget(data);
            })
            .catch(function () {
                // Silencioso - si falla no rompemos la UI
            });
    }

    function renderWidget(data) {
        var badge        = document.getElementById('badge-alertas-cron');
        var contenido    = document.getElementById('contenido-alertas-cron');
        var ultimaActual = document.getElementById('ultima-actualizacion-cron');

        if (!badge || !contenido) return;

        var totalAlertas = (data.bloqueados || 0) + (data.errores_hoy || 0);

        // Toast si aumentó el número de alertas
        if (!primeraCarga && totalAlertas > ultimaAlertaCount) {
            mostrarToast(
                'Nueva alerta CRON',
                'Se detectaron ' + totalAlertas + ' alertas en el sistema',
                'warning'
            );
        }
        ultimaAlertaCount = totalAlertas;
        primeraCarga = false;

        // Actualizar badge
        if (totalAlertas > 0) {
            badge.textContent = totalAlertas > 99 ? '99+' : totalAlertas;
            badge.style.display = 'inline-block';
        } else {
            badge.style.display = 'none';
        }

        // Actualizar hora
        if (ultimaActual) {
            ultimaActual.textContent = data.hora || '';
        }

        // Construir contenido
        var html = '';

        // 1) Pagos bloqueados
        if (data.bloqueados > 0) {
            html += '<div class="dropdown-item bg-light" style="white-space: normal;">';
            html += '  <div class="d-flex align-items-start">';
            html += '    <i class="fas fa-lock text-danger mr-2 mt-1"></i>';
            html += '    <div class="flex-grow-1">';
            html += '      <strong class="text-danger">' + data.bloqueados + ' pago(s) bloqueado(s)</strong>';
            html += '      <p class="text-muted small mb-1">Llevan más de 5 min en estado procesando.</p>';
            html += '      <a href="' + URL_LIBERAR + '" class="btn btn-xs btn-danger" ';
            html += '         onclick="return confirm(\'¿Liberar pagos bloqueados?\')">';
            html += '        <i class="fas fa-unlock"></i> Liberar ahora';
            html += '      </a>';
            html += '    </div>';
            html += '  </div>';
            html += '</div>';
        }

        // 2) Errores del día
        if (data.errores_hoy > 0) {
            html += '<div class="dropdown-item" style="white-space: normal;">';
            html += '  <div class="d-flex align-items-start">';
            html += '    <i class="fas fa-exclamation-triangle text-warning mr-2 mt-1"></i>';
            html += '    <div class="flex-grow-1">';
            html += '      <strong class="text-warning">' + data.errores_hoy + ' error(es) hoy</strong>';
            html += '      <p class="text-muted small mb-1">Excepciones registradas en BDV.</p>';
            html += '      <a href="' + URL_LOGS_ERR + '" class="btn btn-xs btn-outline-warning">';
            html += '        <i class="fas fa-search"></i> Ver detalles';
            html += '      </a>';
            html += '    </div>';
            html += '  </div>';
            html += '</div>';
        }

        // 3) Pendientes (informativo)
        if (data.pendientes > 0) {
            html += '<div class="dropdown-item text-muted small" style="white-space: normal;">';
            html += '  <i class="fas fa-hourglass-half mr-2"></i>';
            html += '  <b>' + data.pendientes + '</b> pago(s) pendiente(s) de verificar.';
            html += '</div>';
        }

        // 4) Sin alertas
        if (totalAlertas === 0 && (!data.pendientes || data.pendientes === 0)) {
            html += '<div class="text-center p-4 text-success">';
            html += '  <i class="fas fa-check-circle fa-2x mb-2"></i>';
            html += '  <p class="mb-0">Todo funciona correctamente</p>';
            html += '  <small class="text-muted">Sin pagos bloqueados ni errores</small>';
            html += '</div>';
        } else if (totalAlertas === 0 && data.pendientes > 0) {
            html += '<div class="text-center p-3 text-info">';
            html += '  <i class="fas fa-check-circle"></i> Sin alertas críticas';
            html += '</div>';
        }

        contenido.innerHTML = html;
    }

    // Función para mostrar un toast
    function mostrarToast(titulo, mensaje, tipo) {
        var cont = document.getElementById('toast-container-cron');
        if (!cont) {
            cont = document.createElement('div');
            cont.id = 'toast-container-cron';
            cont.style.cssText = 'position: fixed; top: 70px; right: 20px; z-index: 9999; max-width: 350px;';
            document.body.appendChild(cont);
        }

        var toast = document.createElement('div');
        toast.className = 'alert alert-' + tipo + ' alert-dismissible fade show shadow';
        toast.style.cssText = 'animation: slideInRight 0.3s ease-out;';
        toast.innerHTML =
            '<i class="fas fa-bell"></i> <strong>' + titulo + '</strong><br>' +
            '<small>' + mensaje + '</small>' +
            '<button type="button" class="close" data-dismiss="alert">&times;</button>';

        cont.appendChild(toast);

        setTimeout(function () {
            toast.remove();
        }, 5000);
    }

    // Carga inicial
    cargarAlertas();

    // Auto-refresh cada 60 segundos
    setInterval(cargarAlertas, 60000);

    // Refrescar al abrir el dropdown
    var btn = document.getElementById('btn-alertas-cron');
    if (btn) {
        btn.addEventListener('click', function () {
            cargarAlertas();
        });
    }

})();
</script>
<?php endif; ?>

</body>
</html>