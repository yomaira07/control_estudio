<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" style="background: #f4f6f9;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0" style="font-weight: 300; color: #003366;">
                        <i class="fas fa-user-plus" style="color: #003366; margin-right: 8px;"></i>
                        <span style="color: #003366; font-weight: 600;">SCE-ENFMP</span>
                        <span style="color: #2c3e50; font-weight: 300;"> - Registro de Aspirante</span>
                    </h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right" style="background: transparent;">
                        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>auth/loginaspirante" style="color: #6c757d;">Inicio</a></li>
                        <li class="breadcrumb-item active" style="color: #003366; font-weight: 600;">Registro de Aspirante</li>
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
                                    <i class="fas fa-user-plus text-white" style="font-size: 1.1rem;"></i>
                                </div>
                                <div>
                                    <h5 class="mb-0" style="font-weight: 600; color: #2c3e50;">
                                        <strong>Bienvenido(a), estimado(a) Aspirante</strong>
                                    </h5>
                                    <small class="text-muted" style="font-size: 0.75rem;">
                                        <i class="fas fa-calendar-alt mr-1"></i>
                                        Sistema de Inscripción en Línea - Proceso de Selección 2026-2027
                                    </small>
                                </div>
                            </div>
                            <div>
                                <span class="badge" style="font-size: 0.8rem; padding: 5px 16px; border-radius: 10px; font-weight: 500; background: #003366; color: white;">
                                    <i class="fas fa-edit mr-1"></i>
                                    Nuevo Registro
                                </span>
                            </div>
                        </div>
                    </div>

                    <!-- Body -->
                    <div class="card-body p-4">

                        <!-- ============================================= -->
                        <!-- MENSAJES FLASH (error / info)                 -->
                        <!-- ============================================= -->
                        <?php if ($this->session->flashdata("error")): ?>
                            <div class="alert alert-danger alert-dismissible fade show flash-alert" role="alert">
                                <div class="d-flex align-items-start">
                                    <div class="flash-alert-icon flash-alert-icon-danger">
                                        <i class="fas fa-exclamation-triangle"></i>
                                    </div>
                                    <div class="flex-grow-1">
                                        <h6 class="flash-alert-title">Ha ocurrido un error</h6>
                                        <p class="flash-alert-text mb-0">
                                            <?php echo $this->session->flashdata("error"); ?>
                                        </p>
                                    </div>
                                </div>
                                <button type="button" class="close flash-alert-close" data-dismiss="alert" aria-label="Cerrar">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        <?php endif; ?>

                        <?php if ($this->session->flashdata("info")): ?>
                            <div class="alert alert-info alert-dismissible fade show flash-alert" role="alert">
                                <div class="d-flex align-items-start">
                                    <div class="flash-alert-icon flash-alert-icon-info">
                                        <i class="fas fa-info-circle"></i>
                                    </div>
                                    <div class="flex-grow-1">
                                        <h6 class="flash-alert-title">Información</h6>
                                        <p class="flash-alert-text mb-0">
                                            <?php echo $this->session->flashdata("info"); ?>
                                        </p>
                                    </div>
                                </div>
                                <button type="button" class="close flash-alert-close" data-dismiss="alert" aria-label="Cerrar">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        <?php endif; ?>

                        <!-- Formulario -->
                        <?php if ($this->uri->segment(3) == 0): ?>
                            <form action="<?php echo base_url() ?>admin/aspirante/crear_usuario" method="POST" name="carga">
                                <input type="hidden" name="fecha_registro" value="<?php echo date('d-m-Y H:i:s'); ?>">
                                <input type="hidden" name="mensaje" value="<?php echo ($this->uri->segment(3)); ?>">

                                <!-- ============================================= -->
                                <!-- CARD 1: DATOS PERSONALES DEL ASPIRANTE        -->
                                <!-- ============================================= -->
                                <div class="card card-info card-outline" style="border-radius: 8px; border-left: 4px solid #003366; border-top: none; margin-bottom: 20px;">
                                    <div class="card-header" style="background: #e8f0fe; border-bottom: 1px solid #e8e8e8; padding: 10px 18px; border-radius: 8px 8px 0 0;">
                                        <h6 class="mb-0" style="font-weight: 600; color: #003366; text-align: center;">
                                            <i class="fas fa-id-card" style="color: #003366; margin-right: 8px;"></i>
                                            DATOS PERSONALES DEL ASPIRANTE
                                        </h6>
                                    </div>
                                    <div class="card-body p-3">
                                        <div class="table-responsive">
                                            <table class="table table-hover" style="border-radius: 8px; overflow: hidden; margin-bottom: 0;">
                                                <tbody>
                                                    <tr style="border-bottom: 1px solid #f0f0f0;">
                                                        <td style="padding: 12px 15px; font-weight: 500; color: #2c3e50; width: 35%; vertical-align: middle;">
                                                            <i class="fas fa-id-card" style="color: #003366; margin-right: 8px;"></i>
                                                            (*) Cédula de Identidad o RIF:
                                                        </td>
                                                        <td style="padding: 12px 15px;">
                                                            <div class="d-flex" style="gap: 8px;">
                                                                <select class="form-control" name="cod_nacionalidad" id="cod_nacionalidad" required style="border-radius: 0px; border: 1px solid #ced4da; width: 100px;">
                                                                    <option value="V">V</option>
                                                                    <option value="E">E</option>
                                                                </select>
                                                                <input type="text" class="form-control" id="cedula" name="cedula" maxlength="9" minlength="6" onkeypress="return controltag(event)" value="" placeholder="Debe indicar el RIF en caso de ser ESTUDIANTE REGULAR O EGRESADO" required style="border-radius: 0px; border: 1px solid #ced4da; flex: 1;">
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr style="border-bottom: 1px solid #f0f0f0;">
                                                        <td style="padding: 12px 15px; font-weight: 500; color: #2c3e50; vertical-align: middle;">
                                                            <i class="fas fa-user" style="color: #003366; margin-right: 8px;"></i>
                                                            (*) Primer Nombre:
                                                        </td>
                                                        <td style="padding: 12px 15px;">
                                                            <input type="text" class="form-control" id="primer_nombre" name="primer_nombre" onkeyup="javascript:this.value=this.value.toUpperCase();" value="" required style="border-radius: 0px; border: 1px solid #ced4da;">
                                                        </td>
                                                    </tr>
                                                    <tr style="border-bottom: 1px solid #f0f0f0;">
                                                        <td style="padding: 12px 15px; font-weight: 500; color: #2c3e50; vertical-align: middle;">
                                                            <i class="fas fa-user" style="color: #003366; margin-right: 8px;"></i>
                                                            Segundo Nombre:
                                                        </td>
                                                        <td style="padding: 12px 15px;">
                                                            <input type="text" class="form-control" id="segundo_nombre" name="segundo_nombre" onkeyup="javascript:this.value=this.value.toUpperCase();" value="<?php echo $list_usuario->segundo_nombre; ?>" style="border-radius: 0px; border: 1px solid #ced4da;">
                                                        </td>
                                                    </tr>
                                                    <tr style="border-bottom: 1px solid #f0f0f0;">
                                                        <td style="padding: 12px 15px; font-weight: 500; color: #2c3e50; vertical-align: middle;">
                                                            <i class="fas fa-user" style="color: #003366; margin-right: 8px;"></i>
                                                            (*) Primer Apellido:
                                                        </td>
                                                        <td style="padding: 12px 15px;">
                                                            <input type="text" class="form-control" id="primer_apellido" name="primer_apellido" onkeyup="javascript:this.value=this.value.toUpperCase();" value="<?php echo $list_usuario->apellidos; ?>" required style="border-radius: 0px; border: 1px solid #ced4da;">
                                                        </td>
                                                    </tr>
                                                    <tr style="border-bottom: 1px solid #f0f0f0;">
                                                        <td style="padding: 12px 15px; font-weight: 500; color: #2c3e50; vertical-align: middle;">
                                                            <i class="fas fa-user" style="color: #003366; margin-right: 8px;"></i>
                                                            Segundo Apellido:
                                                        </td>
                                                        <td style="padding: 12px 15px;">
                                                            <input type="text" class="form-control" id="segundo_apellido" name="segundo_apellido" onkeyup="javascript:this.value=this.value.toUpperCase();" value="<?php echo $list_usuario->apellidos; ?>" style="border-radius: 0px; border: 1px solid #ced4da;">
                                                        </td>
                                                    </tr>
                                                    <tr style="border-bottom: 1px solid #f0f0f0;">
                                                        <td style="padding: 12px 15px; font-weight: 500; color: #2c3e50; vertical-align: middle;">
                                                            <i class="fas fa-envelope" style="color: #003366; margin-right: 8px;"></i>
                                                            (*) Correo Electrónico:
                                                        </td>
                                                        <td style="padding: 12px 15px;">
                                                            <input type="email" class="form-control" id="correo" name="correo" onkeyup="javascript:this.value=this.value.toUpperCase();" value="<?php echo $list_usuario->email; ?>" placeholder="Debe indicar un correo 'Gmail', que sea de uso frecuente" required style="border-radius: 0px; border: 1px solid #ced4da;">
                                                        </td>
                                                    </tr>
                                                    <tr style="border-bottom: 1px solid #f0f0f0;">
                                                        <td style="padding: 12px 15px; font-weight: 500; color: #2c3e50; vertical-align: middle;">
                                                            <i class="fas fa-briefcase" style="color: #003366; margin-right: 8px;"></i>
                                                            (*) Lugar donde labora:
                                                        </td>
                                                        <td style="padding: 12px 15px;">
                                                            <select class="form-control" name="lugar_trabajo" id="lugar_trabajo" required style="border-radius: 0px; border: 1px solid #ced4da;">
                                                                <option value="">- Seleccione -</option>
                                                                <?php if (!empty($list_lugar_trabajo)): ?>
                                                                    <?php foreach ($list_lugar_trabajo as $lt): ?>
                                                                        <option value="<?php echo $lt->id; ?>">
                                                                            <?php echo $lt->lugar_trabajo; ?>
                                                                        </option>
                                                                    <?php endforeach; ?>
                                                                <?php endif; ?>
                                                            </select>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                                <!-- ============================================= -->
                                <!-- CARD 2: PROGRAMAS DE POSTGRADO                -->
                                <!-- ============================================= -->
                                <div class="card card-success card-outline" style="border-radius: 8px; border-left: 4px solid #28a745; border-top: none; margin-bottom: 20px;">
                                    <div class="card-header" style="background: #e8f5e9; border-bottom: 1px solid #e8e8e8; padding: 10px 18px; border-radius: 8px 8px 0 0;">
                                        <h6 class="mb-0" style="font-weight: 600; color: #1e7e34;">
                                            <i class="fas fa-graduation-cap" style="color: #28a745; margin-right: 8px;"></i>
                                            PROGRAMA DE POSTGRADO EN QUE DESEA PARTICIPAR
                                        </h6>
                                    </div>
                                    <div class="card-body p-3">

                                        <div id="msg_seleccione_lugar" class="alert alert-info mb-0" style="border-radius: 8px; border-left: 4px solid #17a2b8; font-size: 0.85rem;">
                                            <i class="fas fa-info-circle mr-1"></i>
                                            Primero seleccione un <b>Lugar donde labora</b> para ver los programas disponibles.
                                        </div>

                                        <div id="lista_programas" class="row" style="display: none;">
                                            <?php foreach ($list_programa as $prog): ?>
                                                <div class="col-md-6 mb-2 item-programa" data-id="<?php echo $prog->id; ?>">
                                                    <div class="form-check" style="background: #f8f9fa; border-radius: 8px; padding: 10px 15px; border-left: 4px solid #28a745;">
                                                        <input type="checkbox" name="checks[]" value="<?php echo $prog->id; ?>" id="prog_<?php echo $prog->id; ?>">
                                                        <label class="form-check-label" for="prog_<?php echo $prog->id; ?>" style="font-size: 0.85rem; color: #2c3e50; margin-left: 8px;">
                                                            <?php echo $prog->nombre_convocatoria; ?>
                                                            (<b><?php echo $prog->modalidad_convocatoria; ?></b>)
                                                        </label>
                                                    </div>
                                                </div>
                                            <?php endforeach; ?>
                                        </div>

                                    </div>
                                </div>

                                <!-- Nota Informativa -->
                                <div class="row justify-content-center">
                                    <div class="col-lg-9 col-md-11">
                                        <div class="card card-warning card-outline" style="border-radius: 8px; border-left: 4px solid #ffc107; border-top: none; margin-bottom: 15px;">
                                            <div class="card-header" style="background: #fff3cd; border-bottom: 1px solid #e8e8e8; padding: 8px 14px; border-radius: 8px 8px 0 0;">
                                                <h6 class="mb-0" style="font-weight: 600; color: #856404; text-align: center; font-size: 0.85rem; letter-spacing: 0.5px;">
                                                    <i class="fas fa-info-circle" style="color: #ffc107; margin-right: 6px;"></i>
                                                    NOTA INFORMATIVA
                                                </h6>
                                            </div>
                                            <div class="card-body" style="padding: 12px 16px; font-size: 0.78rem; line-height: 1.5; color: #2c3e50; text-align: justify;">
                                                <p class="mb-2">
                                                    <strong>Nota Informativa:</strong> El valor de la inversión es de
                                                    <b>Ref. 63.91 (especialización), Ref. 77.94 (maestría)</b> por programa.
                                                </p>
                                                <p class="mb-2">
                                                    El arancel establecido será depositado en las siguientes cuentas bancarias, a nombre de la:<br>
                                                    <b>FUNDACIÓN ESCUELA NACIONAL DE FISCALES DEL MINISTERIO PÚBLICO,<br>
                                                    RIF G-200111232,<br>
                                                    BANCO DE VENEZUELA N° 0102-0140-30-0000187046,<br>
                                                    BANESCO N° 0134-0044-08-0441052855.</b>
                                                </p>
                                                <p class="mb-2">
                                                    El monto del arancel está sujeto a la tasa <b>dólar (USD)</b> establecida por el BCV, del día que se realice la transferencia. <b>NO SE PERMITE PAGO INTERBANCARIO NI PAGOMOVIL</b> - en transferencia o efectivo.<br>
                                                    La Escuela Nacional de Fiscales del Ministerio Público <i>no hará devoluciones</i>, por tanto, queda de cada aspirante el compromiso de atender oportunamente el proceso en el que se registrará y participará.
                                                </p>
                                                <hr style="border-color: #e8e8e8; margin: 10px 0;">
                                                <div style="text-align: center; font-size: 0.75rem;">
                                                    <b>IMPORTANTE:</b> El detalle de la información en relación al
                                                    <b>Proceso de Selección 2026-2027</b> se encuentra en nuestra página web
                                                    <b>WWW.ENF.EDU.VE</b>, en la sección de convocatoria.<br>
                                                    La dirección de correo electrónico suministrado durante el proceso de registro será el único medio para comunicarnos con usted durante todo el proceso de selección, mismo con el que podrá recuperar en caso de olvidar o extraviar, su contraseña de acceso al Sistema de Preinscripción en Línea.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Términos y Condiciones -->
                                <div class="row justify-content-center">
                                  
                                        <div class="card card-danger card-outline" style="border-radius: 8px; border-left: 4px solid #dc3545; border-top: none; margin-bottom: 15px;">
                                            <div class="card-header" style="background: #f8d7da; border-bottom: 1px solid #e8e8e8; padding: 8px 14px; border-radius: 8px 8px 0 0;">
                                                <h6 class="mb-0" style="font-weight: 600; color: #721c24; text-align: center; font-size: 0.85rem; letter-spacing: 0.5px;">
                                                    <i class="fas fa-exclamation-triangle" style="color: #dc3545; margin-right: 6px;"></i>
                                                    TÉRMINOS Y CONDICIONES
                                                </h6>
                                            </div>
                                            <div class="card-body" style="padding: 12px 16px;">

                                                <label for="acepto"
                                                       class="d-flex align-items-start"
                                                       style="background: #fff3cd; border-radius: 8px; padding: 12px 14px; border-left: 4px solid #dc3545; cursor: pointer; margin: 0;">

                                                    <input type="checkbox"
                                                           id="acepto"
                                                           name="acepto"
                                                           value="1"
                                                           title="Acepto los términos"
                                                           required
                                                           style="margin-top: 2px; margin-right: 10px; flex-shrink: 0; width: 16px; height: 16px; cursor: pointer;">

                                                    <span style="font-size: 0.78rem; line-height: 1.5; color: #721c24; font-weight: 600;">
                                                        Todos los datos a suministrar estarán sujetos a verificación.
                                                        La falsedad de cualquiera de ellos acarreará la nulidad inmediata del procedimiento respectivo,
                                                        además de posibles sanciones administrativas, civiles y penales.
                                                    </span>

                                                </label>

                                            </div>
                                        </div>
                                   
                                </div>

                                <!-- Botón de Registro -->
                                <div class="row justify-content-center mt-3">
                                    <div class="col-lg-9 col-md-11 text-center">
                                        <button type="submit" class="btn btn-primary"
                                                style="border-radius: 10px; padding: 10px 40px; font-weight: 500; transition: all 0.3s;">
                                            <i class="fas fa-user-plus mr-2"></i>
                                            Registrar Aspirante
                                        </button>
                                    </div>
                                </div>

                                <input type="hidden" name="str" id="str">
                            </form>
                        <?php endif; ?>

                    </div><!-- /.card-body -->
                </div><!-- /.card -->
            </div><!-- /.card-body -->
        </div><!-- /.card -->

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- Script unificado: filtrar programas + recalcular #str + validar envío -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var lugarTrabajo   = document.getElementById('lugar_trabajo');
        var listaProgramas = document.getElementById('lista_programas');
        var msgSeleccione  = document.getElementById('msg_seleccione_lugar');
        var items          = document.querySelectorAll('.item-programa');
        var strInput       = document.getElementById('str');
        var form           = document.querySelector('form[name="carga"]');

        // IDs de programas exclusivos para funcionarios del Ministerio Público
        var PROGRAMAS_FUNCION_FISCAL = ['1', '14'];

        // ID del "Ministerio Público" en la tabla lugar_trabajo
        var ID_MINISTERIO_PUBLICO = '1';

        function recalcularStr() {
            var seleccionados = [];
            document.querySelectorAll('input[name="checks[]"]').forEach(function (chk) {
                if (chk.checked) seleccionados.push(chk.value);
            });
            if (strInput) strInput.value = seleccionados.join(',');
        }

        function esMinisterioPublico() {
            return lugarTrabajo && lugarTrabajo.value === ID_MINISTERIO_PUBLICO;
        }

        function filtrarProgramas() {
            var valor = lugarTrabajo.value;

            // Sin selección → ocultar todo
            if (!valor) {
                listaProgramas.style.display = 'none';
                msgSeleccione.style.display = '';
                items.forEach(function (item) {
                    item.style.display = 'none';
                    var chk = item.querySelector('input[type="checkbox"]');
                    if (chk) chk.checked = false;
                });
                recalcularStr();
                return;
            }

            // Con selección → mostrar lista y filtrar
            listaProgramas.style.display = '';
            msgSeleccione.style.display = 'none';

            var esMP = esMinisterioPublico();

            items.forEach(function (item) {
                var id = item.getAttribute('data-id');
                var esFuncionFiscal = PROGRAMAS_FUNCION_FISCAL.indexOf(id) !== -1;

                // Regla:
                // - Si es MP (id 1): mostrar TODOS (incluye 1 y 14)
                // - Si NO es MP: mostrar todos EXCEPTO 1 y 14
                var mostrar = esMP ? true : !esFuncionFiscal;

                item.style.display = mostrar ? '' : 'none';

                if (!mostrar) {
                    var chk = item.querySelector('input[type="checkbox"]');
                    if (chk) chk.checked = false;
                }
            });

            recalcularStr();
        }

        // Listeners de checkboxes
        document.querySelectorAll('input[name="checks[]"]').forEach(function (chk) {
            chk.addEventListener('change', recalcularStr);
        });

        // Cambio de lugar de trabajo
        if (lugarTrabajo) {
            lugarTrabajo.addEventListener('change', filtrarProgramas);
            filtrarProgramas();
        }

        // Validación al enviar
        if (form) {
            form.addEventListener('submit', function (e) {
                var algunMarcado = false;
                document.querySelectorAll('input[name="checks[]"]').forEach(function (chk) {
                    if (chk.checked) algunMarcado = true;
                });

                if (!algunMarcado) {
                    e.preventDefault();
                    alert('Debe seleccionar al menos un Programa de Postgrado.');
                    return false;
                }

                recalcularStr();
            });
        }
    });
</script>

<!-- Estilos adicionales -->
<style>
    /* Efectos hover en filas de tabla */
    .table-hover tbody tr:hover {
        background-color: #e8f0fe !important;
        transition: background 0.2s ease;
    }

    /* Sombras y bordes redondeados */
    .card {
        border-radius: 10px !important;
        overflow: hidden;
    }

    /* Efecto hover en botones */
    .btn-primary {
        background-color: #003366;
        border-color: #003366;
        color: #fff;
        transition: all 0.2s ease;
    }

    .btn-primary:hover {
        background-color: #002244;
        border-color: #002244;
        box-shadow: 0 2px 8px rgba(0, 51, 102, 0.3);
        transform: translateY(-2px);
    }

    .btn-outline-primary {
        color: #003366;
        border-color: #003366;
        transition: all 0.2s ease;
    }

    .btn-outline-primary:hover {
        background-color: #003366;
        color: #fff;
        transform: translateY(-2px);
        box-shadow: 0 2px 8px rgba(0, 51, 102, 0.3);
    }

    .btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.15);
    }

    /* Estilo para campos de formulario */
    .form-control:focus {
        border-color: #003366;
        box-shadow: 0 0 0 0.2rem rgba(0, 51, 102, 0.25);
    }

    /* Ajuste para móviles */
    @media (max-width: 768px) {
        .card-title { font-size: 1rem !important; }
        .btn { padding: 8px 16px !important; font-size: 0.8rem !important; }
        .table td, .table th { padding: 8px 10px !important; font-size: 0.75rem !important; }
        .form-control { width: 100% !important; }
    }

    @media (max-width: 576px) {
        .table td, .table th { padding: 6px 8px !important; font-size: 0.7rem !important; }
        .badge { font-size: 0.6rem !important; padding: 2px 8px !important; }
        .form-control { font-size: 0.8rem !important; width: 100% !important; }
        .table-responsive { border: none; }
    }

    /* ============================================= */
    /* MENSAJES FLASH ELEGANTES                       */
    /* ============================================= */
    .flash-alert {
        position: relative;
        border: none;
        border-left: 4px solid transparent;
        border-radius: 10px !important;
        padding: 12px 16px 12px 14px;
        box-shadow: 0 4px 12px rgba(0, 51, 102, 0.08);
        animation: flashSlideIn 0.35s ease-out;
        margin-bottom: 16px;
    }

    .flash-alert.alert-danger {
        background: #fdecea;
        border-left-color: #dc3545;
        color: #721c24;
    }

    .flash-alert.alert-info {
        background: #e8f4f8;
        border-left-color: #17a2b8;
        color: #0c5460;
    }

    .flash-alert-icon {
        width: 32px;
        height: 32px;
        min-width: 32px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-right: 12px;
        color: #fff;
        font-size: 0.85rem;
        flex-shrink: 0;
    }

    .flash-alert-icon-danger {
        background: linear-gradient(135deg, #dc3545 0%, #a71d2a 100%);
        box-shadow: 0 3px 8px rgba(220, 53, 69, 0.35);
    }

    .flash-alert-icon-info {
        background: linear-gradient(135deg, #17a2b8 0%, #117a8b 100%);
        box-shadow: 0 3px 8px rgba(23, 162, 184, 0.35);
    }

    .flash-alert-title {
        font-size: 0.78rem;
        font-weight: 700;
        margin-bottom: 1px;
        letter-spacing: 0.2px;
        color: inherit;
    }

    .flash-alert-text {
        font-size: 0.72rem;
        line-height: 1.4;
        color: inherit;
        opacity: 0.92;
    }

    .flash-alert-close {
        position: absolute;
        top: 8px;
        right: 10px;
        font-size: 1rem;
        opacity: 0.5;
        color: inherit;
        transition: opacity 0.2s ease, transform 0.2s ease;
        padding: 0;
        line-height: 1;
    }

    .flash-alert-close:hover {
        opacity: 1;
        transform: scale(1.1);
    }

    @keyframes flashSlideIn {
        from { opacity: 0; transform: translateY(-8px); }
        to   { opacity: 1; transform: translateY(0); }
    }

    @media (max-width: 576px) {
        .flash-alert { padding: 10px 12px; }
        .flash-alert-icon { width: 28px; height: 28px; min-width: 28px; font-size: 0.75rem; margin-right: 10px; }
        .flash-alert-title { font-size: 0.72rem; }
        .flash-alert-text { font-size: 0.68rem; }
    }
</style>