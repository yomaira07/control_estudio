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
                        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>" style="color: #6c757d;">Inicio</a></li>
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
                                    <i class="fas fa-user-graduate text-white" style="font-size: 1.1rem;"></i>
                                </div>
                                <div>
                                    <h5 class="mb-0" style="font-weight: 600; color: #2c3e50;">
                                        <strong>Bienvenido(a), estimado(a) Aspirante</strong>
                                    </h5>
                                    <small class="text-muted" style="font-size: 0.75rem;">
                                        <i class="fas fa-calendar-alt mr-1"></i>
                                        Sistema de Inscripción en Línea - Proceso de Selección 2025-2026
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

                        <!-- Logo e Institución -->
                        <div class="text-center mb-4">
                            <a href="<?php echo base_url(); ?>" title="Ir a inicio">
                                <img src="<?php echo base_url(); ?>assets/img/logo2.png" width="100px" height="100px" style="border-radius: 10px; box-shadow: 0 4px 12px rgba(0,51,102,0.15);" />
                            </a>
                            <h5 class="mt-3" style="color: #003366; font-weight: 600;">
                                Sistema de Inscripción en Línea
                            </h5>
                            <p style="color: #2c3e50; font-size: 0.9rem;">
                                <b>Proceso de Selección 2025-2026 de Aspirantes</b> a cursar Programas de Postgrado en la
                                Escuela Nacional de Fiscales del Ministerio Público
                            </p>
                            <a href="<?php echo base_url(); ?>" title="Ir a inicio" class="btn btn-outline-primary btn-sm" style="border-radius: 8px; padding: 5px 16px;">
                                <i class="fas fa-home mr-1"></i> Ir a Inicio
                            </a>
                        </div>

                        <!-- Mensajes de Alerta -->
                        <?php if ($this->session->flashdata("error")): ?>
                            <div class="alert alert-danger alert-dismissible" style="border-radius: 8px; border-left: 4px solid #dc3545;">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <i class="icon fa fa-ban mr-2"></i> <?php echo $this->session->flashdata("error"); ?>
                            </div>
                        <?php endif; ?>

                        <?php if ($this->session->flashdata("info")): ?>
                            <div class="alert alert-info alert-dismissible" style="border-radius: 8px; border-left: 4px solid #17a2b8;">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <i class="icon fa fa-info-circle mr-2"></i> <?php echo $this->session->flashdata("info"); ?>
                            </div>
                        <?php endif; ?>

                        <!-- Formulario -->
                        <?php if ($this->uri->segment(3) == 0): ?>
                            <form action="<?php echo base_url() ?>admin/aspirante/crear_usuario" method="POST" name="carga">
                                <input type="hidden" name="fecha_registro" value="<?php echo date('d-m-Y H:i:s'); ?>">
                                <input type="hidden" name="mensaje" value="<?php echo ($this->uri->segment(3)); ?>">

                                <!-- Datos Personales -->
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
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                                <!-- Programas de Postgrado -->
                                <div class="card card-success card-outline" style="border-radius: 8px; border-left: 4px solid #28a745; border-top: none; margin-bottom: 20px;">
                                    <div class="card-header" style="background: #e8f5e9; border-bottom: 1px solid #e8e8e8; padding: 10px 18px; border-radius: 8px 8px 0 0;">
                                        <h6 class="mb-0" style="font-weight: 600; color: #1e7e34;">
                                            <i class="fas fa-graduation-cap" style="color: #28a745; margin-right: 8px;"></i>
                                            PROGRAMA DE POSTGRADO EN QUE DESEA PARTICIPAR
                                        </h6>
                                    </div>
                                    <div class="card-body p-3">
                                        <div class="row">
                                            <?php foreach ($list_programa as $list_programa): ?>
                                                <div class="col-md-6 mb-2">
                                                    <div class="form-check" style="background: #f8f9fa; border-radius: 8px; padding: 10px 15px; border-left: 4px solid #28a745;">
                                                        <input type="checkbox" name="checks[]" value="<?php echo $list_programa->id; ?>" id="prog_<?php echo $list_programa->id; ?>" required>
                                                        <label class="form-check-label" for="prog_<?php echo $list_programa->id; ?>" style="font-size: 0.85rem; color: #2c3e50; margin-left: 8px;">
                                                            <?php echo $list_programa->nombre_convocatoria; ?>
                                                            (<b><?php echo $list_programa->modalidad_convocatoria; ?></b>)
                                                        </label>
                                                    </div>
                                                </div>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                </div>

                                <!-- Nota Informativa -->
                                <div class="card card-warning card-outline" style="border-radius: 8px; border-left: 4px solid #ffc107; border-top: none; margin-bottom: 20px;">
                                    <div class="card-header" style="background: #fff3cd; border-bottom: 1px solid #e8e8e8; padding: 10px 18px; border-radius: 8px 8px 0 0;">
                                        <h6 class="mb-0" style="font-weight: 600; color: #856404; text-align: center;">
                                            <i class="fas fa-info-circle" style="color: #ffc107; margin-right: 8px;"></i>
                                            NOTA INFORMATIVA
                                        </h6>
                                    </div>
                                    <div class="card-body p-3" style="font-size: 0.85rem; color: #2c3e50; text-align: justify;">
                                        <p>
                                            <strong>Nota Informativa:</strong> El valor de la inversión es de
                                            <b>Ref. 63.91 (especialización), Ref. 77.94 (maestría), Ref. 100 (doctorado)</b> por programa.
                                        </p>
                                        <p>
                                            El arancel establecido será depositado en las siguientes cuentas bancarias, a nombre de la:<br>
                                            <b>FUNDACIÓN ESCUELA NACIONAL DE FISCALES DEL MINISTERIO PÚBLICO,<br>
                                            RIF G-200111232,<br>
                                            BANCO DE VENEZUELA N° 0102-0140-30-0000187046,<br>
                                            BANESCO N° 0134-0044-08-0441052855.</b>
                                        </p>
                                        <p>
                                            El monto del arancel está sujeto a la tasa <b>dólar (USD)</b> establecida por el BCV, del día que se realice la transferencia, NO SE PERMITE PAGO INTERBANCARIO NI PAGOMOVIL - en transferencia o efectivo.<br>
                                            La Escuela Nacional de Fiscales del Ministerio Público <i>no hará devoluciones</i>, por tanto, queda de cada aspirante el compromiso de atender oportunamente el proceso en el que se registrará y participará.
                                        </p>
                                        <hr style="border-color: #e8e8e8;">
                                        <div align="center">
                                            <b>IMPORTANTE:</b> El detalle de la información en relación al
                                            <b>Proceso de Selección 2025-2026</b> se encuentra en nuestra página web
                                            <b>WWW.ENF.EDU.VE</b>, en la sección de convocatoria.<br>
                                            La dirección de correo electrónico suministrado será el único medio para comunicarnos con usted durante todo el proceso de selección, mismo con el que podrá recuperar en caso de olvidar o extraviar, su contraseña de acceso al Sistema de Preinscripción en Línea.
                                        </div>
                                    </div>
                                </div>

                                <!-- Términos y Condiciones -->
                                <div class="card card-danger card-outline" style="border-radius: 8px; border-left: 4px solid #dc3545; border-top: none; margin-bottom: 20px;">
                                    <div class="card-header" style="background: #f8d7da; border-bottom: 1px solid #e8e8e8; padding: 10px 18px; border-radius: 8px 8px 0 0;">
                                        <h6 class="mb-0" style="font-weight: 600; color: #721c24; text-align: center;">
                                            <i class="fas fa-exclamation-triangle" style="color: #dc3545; margin-right: 8px;"></i>
                                            TÉRMINOS Y CONDICIONES
                                        </h6>
                                    </div>
                                    <div class="card-body p-3">
                                        <div class="form-check" style="background: #fff3cd; border-radius: 8px; padding: 15px; border-left: 4px solid #dc3545;">
                                            <input type="checkbox" id="acepto" name="acepto" value="1" title="Acepto los términos" required>
                                            <label class="form-check-label" for="acepto" style="font-size: 0.85rem; color: #721c24; margin-left: 8px;">
                                                <strong>Todos los datos a suministrar estarán sujetos a verificación.<br>
                                                La falsedad de cualquiera de ellos acarreará la nulidad inmediata del procedimiento respectivo,<br>
                                                además de posibles sanciones administrativas, civiles y penales.</strong>
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <!-- Botón de Registro -->
                                <div class="row mt-3">
                                    <div class="col-md-12 text-center">
                                        <button type="submit" class="btn btn-primary" style="border-radius: 10px; padding: 10px 40px; font-weight: 500; transition: all 0.3s;">
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

    /* Checkboxes */
    .form-check-input {
        margin-top: 0.3rem;
    }

    .form-check-input:checked {
        background-color: #003366;
        border-color: #003366;
    }

    /* Ajuste para móviles */
    @media (max-width: 768px) {
        .card-title {
            font-size: 1rem !important;
        }
        .btn {
            padding: 8px 16px !important;
            font-size: 0.8rem !important;
        }
        .table td, .table th {
            padding: 8px 10px !important;
            font-size: 0.75rem !important;
        }
        .form-control {
            width: 100% !important;
        }
        .btn-default {
            margin-left: 0 !important;
        }
    }

    @media (max-width: 576px) {
        .table td, .table th {
            padding: 6px 8px !important;
            font-size: 0.7rem !important;
        }
        .badge {
            font-size: 0.6rem !important;
            padding: 2px 8px !important;
        }
        .form-control {
            font-size: 0.8rem !important;
            width: 100% !important;
        }
        .table-responsive {
            border: none;
        }
    }
</style>