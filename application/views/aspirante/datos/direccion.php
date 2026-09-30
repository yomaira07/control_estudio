<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" style="background: #f4f6f9;">

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0" style="font-weight: 300; color: #003366;">
                        <i class="fas fa-map-marker-alt" style="color: #003366; margin-right: 8px;"></i>
                        <span style="color: #003366; font-weight: 600;">SCE-ENFMP</span>
                        <span style="color: #2c3e50; font-weight: 300;"> - Dirección de Domicilio</span>
                    </h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right" style="background: transparent;">
                        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>dashboard08/index" style="color: #6c757d;">Inicio</a></li>
                        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>dashboard08/datos" style="color: #6c757d;">Datos Personales</a></li>
                        <li class="breadcrumb-item active" style="color: #003366; font-weight: 600;">Dirección de Domicilio</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">

        <div class="card card-primary card-outline shadow-sm" style="border-radius: 10px; border-top: 4px solid #003366;">
            <div class="card-body p-0">
                <div class="card" style="border: none; border-radius: 10px;">

                    <div class="card-header py-3" style="border-bottom: 1px solid #e8e8e8; border-radius: 10px 10px 0 0; background: #fafafa;">
                        <div class="d-flex align-items-center">
                            <div class="mr-3" style="width: 42px; height: 42px; background: #003366; border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                                <i class="fas fa-map-marker-alt text-white" style="font-size: 1.1rem;"></i>
                            </div>
                            <div>
                                <h5 class="mb-0" style="font-weight: 600; color: #2c3e50;">
                                    <strong>Dirección de Domicilio del Aspirante</strong>
                                </h5>
                                <small class="text-muted" style="font-size: 0.75rem;">
                                    <i class="fas fa-home mr-1"></i>
                                    Complete los datos de residencia
                                </small>
                            </div>
                        </div>
                    </div>

                    <div class="card-body p-4">

                        <?php if ($this->session->flashdata("error")): ?>
                            <div class="alert alert-danger alert-dismissible fade show flash-alert" role="alert">
                                <div class="d-flex align-items-start">
                                    <div class="flash-alert-icon flash-alert-icon-danger"><i class="fas fa-exclamation-triangle"></i></div>
                                    <div class="flex-grow-1">
                                        <h6 class="flash-alert-title">Error</h6>
                                        <p class="flash-alert-text mb-0"><?php echo $this->session->flashdata("error"); ?></p>
                                    </div>
                                </div>
                                <button type="button" class="close flash-alert-close" data-dismiss="alert"><span>&times;</span></button>
                            </div>
                        <?php endif; ?>

                        <form action="<?php echo base_url() ?>dashboard08/direccion_store/<?php echo $this->session->userdata('id'); ?>" method="POST" name="carga">

                            <input type="hidden" name="id_usuario" value="<?php echo $this->session->userdata('id'); ?>">
                            <input type="hidden" name="no_encontrado" value="<?php if ($datos_direccion == false) { echo "falso"; } else { echo $datos_direccion->id; } ?>">
                            <input type="hidden" name="fecha_registro" value="<?php echo date('d-m-Y H:i:s'); ?>">

                            <div class="form-group row">
                                <label for="comboestado" class="col-sm-3 col-form-label" title="-Dato Obligatorio-">
                                    <i class="fas fa-map" style="color: #003366; margin-right: 6px;"></i>
                                    (*) Estado
                                </label>
                                <div class="col-sm-6">
                                    <select name="comboestado" class="form-control" id="comboestado" required style="border-radius: 8px;">
                                        <option value="">Seleccione...</option>
                                        <?php foreach ($combo_estado as $combo_estado) {
                                            if ($datos_direccion->id_estado == $combo_estado->id) {
                                                echo "<option value='" . $combo_estado->id . "' selected>" . $combo_estado->estado . "</option>";
                                            } else {
                                                echo "<option value='" . $combo_estado->id . "'>" . $combo_estado->estado . "</option>";
                                            }
                                        } ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="combomunicipio" class="col-sm-3 col-form-label" title="-Dato Obligatorio-">
                                    <i class="fas fa-city" style="color: #003366; margin-right: 6px;"></i>
                                    (*) Municipio
                                </label>
                                <div class="col-sm-6">
                                    <select name="combomunicipio" id="combomunicipio" class="form-control" required style="border-radius: 8px;">
                                        <option value="">Seleccione...</option>
                                        <?php foreach ($combo_municipio as $combo_municipio) {
                                            if ($datos_direccion->id_municipio == $combo_municipio->id)
                                                echo "<option value='" . $datos_direccion->id_municipio . "' selected>" . $combo_municipio->municipio . "</option>";
                                        } ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="comboparroquia" class="col-sm-3 col-form-label" title="-Dato Obligatorio-">
                                    <i class="fas fa-location-arrow" style="color: #003366; margin-right: 6px;"></i>
                                    (*) Parroquia
                                </label>
                                <div class="col-sm-6">
                                    <select name="comboparroquia" id="comboparroquia" class="form-control" required style="border-radius: 8px;">
                                        <option value="">Seleccione...</option>
                                        <?php foreach ($combo_parroquia as $combo_parroquia) {
                                            if ($datos_direccion->id_parroquia == $combo_parroquia->id)
                                                echo "<option value='" . $datos_direccion->id_parroquia . "' selected>" . $combo_parroquia->parroquia . "</option>";
                                        } ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="domicilio" class="col-sm-3 col-form-label" title="-Dato Obligatorio-">
                                    <i class="fas fa-home" style="color: #003366; margin-right: 6px;"></i>
                                    (*) Dirección de Habitación
                                </label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="domicilio" placeholder="Indicar la dirección de habitación completa y detallada" name="domicilio" onkeyup="javascript:this.value=this.value.toUpperCase();" value="<?php if ($datos_direccion == false) { echo ""; } else { echo $datos_direccion->domicilio; } ?>" required style="border-radius: 8px;">
                                </div>
                            </div>

                              <!-- Botón de Envío -->
                            <div class="row mt-4">
                                <div class="col-md-12 text-center">
                                    <button type="submit" class="btn btn-primary" style="border-radius: 10px; padding: 10px 40px; font-weight: 500; transition: all 0.3s;" title="Hacer clic para Registrar Datos">
                                        <i class="fas fa-save mr-2"></i>
                                        Actualizar Información
                                    </button>
                                    <a href="<?php echo base_url(); ?>dashboard08/datos" class="btn btn-default" style="border-radius: 10px; padding: 10px 30px; font-weight: 500; margin-left: 8px; transition: all 0.3s;">
                                        <i class="fas fa-arrow-left mr-2"></i>
                                        Volver
                                    </a>
                                </div>
                            </div>
                        </form>

                        <hr style="border-color: #e8e8e8; margin: 15px 0;">
                        <div style="text-align: center;">
                            <small style="font-size: 0.75rem; color: #6c757d;"><b>(*) Dato Obligatorio</b></small>
                        </div>

                    </div><!-- /.card-body -->
                </div><!-- /.card -->
            </div><!-- /.card-body -->
        </div><!-- /.card -->

    </section>
</div>

<style>
    .form-control:focus { border-color: #003366; box-shadow: 0 0 0 0.2rem rgba(0,51,102,0.25); }
    .btn-primary { background-color: #003366; border-color: #003366; color: #fff; transition: all 0.2s ease; }
    .btn-primary:hover { background-color: #002244; border-color: #002244; box-shadow: 0 2px 8px rgba(0,51,102,0.3); transform: translateY(-2px); }

    .flash-alert { position: relative; border: none; border-left: 4px solid transparent; border-radius: 10px !important; padding: 12px 16px 12px 14px; box-shadow: 0 4px 12px rgba(0,51,102,0.08); animation: flashSlideIn 0.35s ease-out; margin-bottom: 16px; }
    .flash-alert.alert-danger { background: #fdecea; border-left-color: #dc3545; color: #721c24; }
    .flash-alert-icon { width: 32px; height: 32px; min-width: 32px; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin-right: 12px; color: #fff; font-size: 0.85rem; flex-shrink: 0; }
    .flash-alert-icon-danger { background: linear-gradient(135deg, #dc3545 0%, #a71d2a 100%); box-shadow: 0 3px 8px rgba(220,53,69,0.35); }
    .flash-alert-title { font-size: 0.78rem; font-weight: 700; margin-bottom: 1px; color: inherit; }
    .flash-alert-text { font-size: 0.72rem; line-height: 1.4; color: inherit; opacity: 0.92; }
    .flash-alert-close { position: absolute; top: 8px; right: 10px; font-size: 1rem; opacity: 0.5; color: inherit; padding: 0; line-height: 1; }
    .flash-alert-close:hover { opacity: 1; }
    @keyframes flashSlideIn { from { opacity: 0; transform: translateY(-8px); } to { opacity: 1; transform: translateY(0); } }

    .card { transition: box-shadow 0.25s ease; }
    .card:hover { box-shadow: 0 6px 18px rgba(0,51,102,0.08) !important; }
</style>