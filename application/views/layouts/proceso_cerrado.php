<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" style="background: #f4f6f9;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0" style="font-weight: 300; color: #003366;">
                        <i class="fas fa-lock" style="color: #003366; margin-right: 8px;"></i>
                        <span style="color: #003366; font-weight: 600;">SCE-ENFMP</span>
                        <span style="color: #2c3e50; font-weight: 300;"> - Proceso Cerrado</span>
                    </h1>
                </div>
            </div>
        </div>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">

            <!-- Card Principal -->
            <div class="card card-primary card-outline shadow-sm" style="border-radius: 10px; border-top: 4px solid #003366;">
                <div class="card-body p-0">
                    <div class="card" style="border: none; border-radius: 10px;">

                        <!-- Header -->
                        <div class="card-header py-3" style="border-bottom: 1px solid #e8e8e8; border-radius: 10px 10px 0 0; background: #fafafa;">
                            <div class="d-flex align-items-center flex-wrap">
                                <div class="mr-3" style="width: 42px; height: 42px; background: #003366; border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                                    <i class="fas fa-lock text-white" style="font-size: 1.1rem;"></i>
                                </div>
                                <div>
                                    <img src="<?php echo base_url(); ?>assets/img/logo2.png" alt="Logo" style="height: 32px; margin-right: 10px;">
                                    <span style="font-weight: 600; color: #2c3e50;">
                                        Mi estimad(o)a, <b style="color: #003366;"><?php echo $this->session->userdata("nombre"); ?> <?php echo $this->session->userdata("apellido"); ?></b>,
                                        el proceso solicitado se encuentra <b style="color: #dc3545;">CERRADO</b>.
                                    </span>
                                </div>
                            </div>
                        </div>

                        <!-- Body -->
                        <div class="card-body p-4 text-center">
                            <div align="center">
                                <img src="<?php echo base_url(); ?>assets/img/casaazulSF.png"
                                     class="img-fluid"
                                     style="max-width: 100%; height: auto; border-radius: 10px; box-shadow: 0 2px 8px rgba(0,0,0,0.08);"
                                     alt="Proceso cerrado">
                            </div>
                        </div>

                    </div><!-- /.card -->
                </div><!-- /.card-body -->
            </div><!-- /.card card-primary card-outline -->

            <!-- Nota -->
            <div class="card shadow-sm" style="border-radius: 10px; border: none; border-left: 4px solid #ffc107;">
                <div class="card-header" style="background: #fff8e1; border-bottom: 1px solid #ffe082; border-radius: 10px 10px 0 0;">
                    <i class="fa fa-exclamation-triangle" style="color: #ffc107; margin-right: 8px;"></i>
                    <b style="color: #2c3e50;">Nota:</b>
                    <span style="color: #6c757d;">En caso de requerir información de este trámite a solicitar diríjase a la Dirección de Secretaría General de la ENFMP, o envíe un correo electrónico a: <b style="color: #003366;">secretaria.enfmp@gmail.com</b>, y exponga sus dudas o requerimiento en cuanto a la apertura de este trámite.</span>
                </div>
            </div>

        </div><!-- /.container-fluid -->
    </section><!-- /.section -->
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->