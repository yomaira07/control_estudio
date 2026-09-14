<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" style="background: #f4f6f9;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0" style="font-weight: 300; color: #003366;">
                        <i class="fas fa-graduation-cap" style="color: #003366; margin-right: 8px;"></i> 
                      
                        <span style="color: #2c3e50; font-weight: 300;"> Proceso de Inscripción</span>
                    </h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right" style="background: transparent;">
                        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>dashboard04/home" style="color: #6c757d;">Inicio</a></li>
                        <li class="breadcrumb-item active" style="color: #003366;">Estatus del Proceso de Inscripción</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <!-- Main content -->
    <section class="content">
        <script type="text/javascript">
        //<![CDATA[
        function imprimir(id){
            location.href="/control_estudio/planilla/index/"+id;
        }
        </script>

        <form action="<?php echo base_url(); ?>dashboard04/inscripcion2" method="POST">
            <!-- Card Principal -->
            <div class="card card-primary card-outline shadow-lg" style="border-radius: 12px; border-top: 4px solid #003366;">
                <div class="card-body p-0">
                    <div class="card" style="border: none; border-radius: 12px; box-shadow: 0 4px 6px rgba(0,0,0,0.05);">
                        
                        <!-- Header -->
                        <div class="card-header bg-gradient-white py-4" style="border-bottom: 2px solid #e9ecef; border-radius: 12px 12px 0 0; background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);">
                            <div class="text-center">
                                <h3 class="card-title" style="font-size: 1.4rem; font-weight: 600; color: #2c3e50;">
                                <div class="mr-3" style="flex-shrink: 0;">
                                    <img src="<?php echo base_url(); ?>assets/img/logo2.png" alt="Logo" style="width: 55px; height: 55px; border-radius: 50%; border: 2px solid #e9ecef; padding: 3px; background: white;">
                                    <span style="color: #2c3e50;">  Estatus del Proceso de Inscripción</span>
                                </div>
                                </h3>
                                <div class="mt-2">
                                    <span class="badge" style="font-size: 1rem; padding: 8px 20px; border-radius: 10px; background: #003366; color: white;">
                                        <i class="fas fa-calendar-alt mr-2"></i>
                                        Período: <strong><?php echo $periodo->nombre; ?></strong>
                                    </span>
                                </div>
                            </div>
                        </div>

                        <!-- Body -->
                        <div class="card-body p-4">
                            
                            <!-- Tabla de estado -->
                            <div class="table-responsive">
                                <table class="table table-hover" style="border-radius: 10px; overflow: hidden;">
                                    <thead style="background: linear-gradient(135deg, #003366 0%, #1a5276 100%); color: white;">
                                        <tr>
                                            <th style="width: 70%; padding: 15px 20px; font-weight: 500; font-size: 0.95rem;">
                                                <i class="fas fa-list-ul mr-2"></i>Nombre del Paso
                                            </th>
                                            <th style="width: 30%; padding: 15px 20px; text-align: center; font-weight: 500; font-size: 0.95rem;">
                                                <i class="fas fa-info-circle mr-2"></i>Estado
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Actualización de Datos -->
                                        <tr style="border-bottom: 1px solid #f1f3f5; transition: background 0.2s;">
                                            <td style="padding: 14px 20px; font-weight: 500; color: #2c3e50;">
                                                <i class="fas fa-user-edit" style="color: #003366; margin-right: 12px; width: 20px;"></i>
                                                Actualización de Datos
                                            </td>
                                            <td style="padding: 14px 20px; text-align: center;">
                                                <?php if ($actualizar==true && $actualizar_datos==true && $actualizar_direccion==true && $actualizar_trabajo==true): ?>
                                                    <img width="28px" height="28px" src="../assets/img/button_green.png" title="Completado">
                                                <?php else: ?>
                                                    <img width="28px" height="28px" src="../assets/img/button_gray.png" title="Pendiente">
                                                <?php endif; ?>
                                            </td>
                                        </tr>

                                        <!-- Preinscripción -->
                                        <tr style="border-bottom: 1px solid #f1f3f5; transition: background 0.2s;">
                                            <td style="padding: 14px 20px; font-weight: 500; color: #2c3e50;">
                                                <i class="fas fa-book-open" style="color: #c9a84c; margin-right: 12px; width: 20px;"></i>
                                                Preinscripción de Unidades Curriculares
                                            </td>
                                            <td style="padding: 14px 20px; text-align: center;">
                                                <?php if ($materias==true && ($clausula == true && $pago == true)): ?>
                                                    <img width="28px" height="28px" src="../assets/img/button_green.png" title="Completado">
                                                <?php else: ?>
                                                    <img width="28px" height="28px" src="../assets/img/button_gray.png" title="Pendiente">
                                                <?php endif; ?>
                                            </td>
                                        </tr>

                                        <!-- Cláusula de Compromiso -->
                                        <tr style="border-bottom: 1px solid #f1f3f5; transition: background 0.2s;">
                                            <td style="padding: 14px 20px; font-weight: 500; color: #2c3e50;">
                                                <i class="fas fa-file-signature" style="color: #003366; margin-right: 12px; width: 20px;"></i>
                                                Cláusula de Compromiso
                                            </td>
                                            <td style="padding: 14px 20px; text-align: center;">
                                                <?php if ($clausula == true && $pago == true): ?>
                                                    <img width="28px" height="28px" src="../assets/img/button_green.png" title="Completado">
                                                <?php else: ?>
                                                    <img width="28px" height="28px" src="../assets/img/button_gray.png" title="Pendiente">
                                                <?php endif; ?>
                                            </td>
                                        </tr>

                                        <!-- Registro de Pago -->
                                        <tr style="border-bottom: 1px solid #f1f3f5; transition: background 0.2s;">
                                            <td style="padding: 14px 20px; font-weight: 500; color: #2c3e50;">
                                                <i class="fas fa-credit-card" style="color: #c9a84c; margin-right: 12px; width: 20px;"></i>
                                                Registro de Pago
                                            </td>
                                            <td style="padding: 14px 20px; text-align: center;">
                                                <?php if ($pago == true): ?>
                                                    <img width="28px" height="28px" src="../assets/img/button_green.png" title="Completado">
                                                <?php else: ?>
                                                    <img width="28px" height="28px" src="../assets/img/button_gray.png" title="Pendiente">
                                                <?php endif; ?>
                                            </td>
                                        </tr>

                                        <!-- Aprobación de Pago -->
                                        <tr style="border-bottom: 1px solid #f1f3f5; transition: background 0.2s;">
                                            <td style="padding: 14px 20px; font-weight: 500; color: #2c3e50;">
                                                <i class="fas fa-check-double" style="color: #003366; margin-right: 12px; width: 20px;"></i>
                                                Aprobación de Pago
                                            </td>
                                            <td style="padding: 14px 20px; text-align: center;">
                                                <?php if ($pago == true): ?>
                                                    <?php if ($result_conciliado->conciliado == 1): ?>
                                                        <img width="28px" height="28px" src="../assets/img/button_green.png" title="Aprobado">
                                                    <?php elseif ($result_conciliado->conciliado == 2): ?>
                                                        <div>
                                                            <img width="28px" height="28px" src="../assets/img/button_red.jpeg" title="Rechazado">
                                                            <small class="d-block text-danger mt-1" style="font-size: 0.7rem;">
                                                                <i class="fas fa-envelope mr-1"></i> Contactar: secretariageneral.enfmp@gmail.com
                                                            </small>
                                                        </div>
                                                    <?php else: ?>
                                                        <img width="28px" height="28px" src="../assets/img/button_blue.jpg" title="En Proceso">
                                                    <?php endif; ?>
                                                <?php else: ?>
                                                    <img width="28px" height="28px" src="../assets/img/button_gray.png" title="Pendiente">
                                                <?php endif; ?>
                                            </td>
                                        </tr>

                                        <!-- Revisión Académica -->
                                        <tr style="border-bottom: 1px solid #f1f3f5; transition: background 0.2s;">
                                            <td style="padding: 14px 20px; font-weight: 500; color: #2c3e50;">
                                                <i class="fas fa-user-graduate" style="color: #c9a84c; margin-right: 12px; width: 20px;"></i>
                                                Revisión Académica
                                            </td>
                                            <td style="padding: 14px 20px; text-align: center;">
                                                <?php if ($estadoconciliacion==true): ?>
                                                    <?php if ($revicion_academica->rev_academica == 1): ?>
                                                        <img width="28px" height="28px" src="../assets/img/button_green.png" title="Aprobada">
                                                    <?php elseif ($revicion_academica->rev_academica == 2): ?>
                                                        <div>
                                                            <img width="28px" height="28px" src="../assets/img/button_red.jpeg" title="Rechazada">
                                                            <small class="d-block text-danger mt-1" style="font-size: 0.7rem;">
                                                                <i class="fas fa-envelope mr-1"></i> Contactar: secretaria.enfmp@gmail.com
                                                            </small>
                                                        </div>
                                                    <?php else: ?>
                                                        <img width="28px" height="28px" src="../assets/img/button_blue.jpg" title="En Proceso">
                                                    <?php endif; ?>
                                                <?php else: ?>
                                                    <img width="28px" height="28px" src="../assets/img/button_gray.png" title="Pendiente">
                                                <?php endif; ?>
                                            </td>
                                        </tr>

                                        <!-- Unidades Curriculares Inscritas -->
                                        <tr style="border-bottom: 1px solid #f1f3f5; transition: background 0.2s;">
                                            <td style="padding: 14px 20px; font-weight: 500; color: #2c3e50;">
                                                <i class="fas fa-tasks" style="color: #003366; margin-right: 12px; width: 20px;"></i>
                                                Unidades Curriculares Inscritas
                                            </td>
                                            <td style="padding: 14px 20px; text-align: center;">
                                                <?php if ($revicion_academica==true): ?>
                                                    <?php if ($revicion_academica->rev_academica == 1): ?>
                                                        <div>
                                                            <img width="28px" height="28px" src="../assets/img/positivo.jpeg" title="Aprobadas">
                                                            <strong style="display: block; font-size: 0.8rem; color: #28a745;">APROBADAS</strong>
                                                        </div>
                                                    <?php elseif ($revicion_academica->rev_academica == 2): ?>
                                                        <div>
                                                            <img width="28px" height="28px" src="../assets/img/negativo.jpeg" title="Rechazada">
                                                            <strong style="display: block; font-size: 0.8rem; color: #dc3545;">RECHAZADA</strong>
                                                        </div>
                                                    <?php else: ?>
                                                        <img width="28px" height="28px" src="../assets/img/button_gray.png" title="Pendiente">
                                                    <?php endif; ?>
                                                <?php else: ?>
                                                    <img width="28px" height="28px" src="../assets/img/button_gray.png" title="Pendiente">
                                                <?php endif; ?>
                                            </td>
                                        </tr>

                                        <!-- Imprimir Planilla -->
                                        <?php if ($revicion_academica==true && $revicion_academica->rev_academica==1 && !empty($programa_aprobado)): ?>
                                        <tr style="background: #f8f9fa; border-bottom: 1px solid #f1f3f5;">
                                            <td style="padding: 14px 20px; font-weight: 500; color: #2c3e50;">
                                                <i class="fas fa-print" style="color: #c9a84c; margin-right: 12px; width: 20px;"></i>
                                                Imprimir Planilla
                                            </td>
                                            <td style="padding: 14px 20px;">
                                                <div class="d-flex flex-wrap justify-content-center gap-2" style="gap: 8px;">
                                                    <?php foreach ($programa_aprobado as $programa): ?>
                                                        <button type="button" class="btn btn-sm" 
                                                                onclick="imprimir(<?php echo $programa->id_programa; ?>)" 
                                                                style="border-radius: 10px; padding: 4px 16px; margin: 2px; transition: all 0.2s; background: #003366; color: white; border: none;">
                                                            <i class="fas fa-print mr-1"></i>
                                                            <?php echo $programa->nombre; ?>
                                                        </button>
                                                    <?php endforeach; ?>
                                                </div>
                                            </td>
                                        </tr>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                            </div>

                            <!-- Leyenda con círculos -->
                            <div class="mt-4 p-3" style="background: #f8f9fa; border-radius: 10px; border-left: 4px solid #003366;">
                                <div class="row align-items-center">
                                    <div class="col-md-3">
                                        <strong style="color: #2c3e50;">
                                            <i class="fas fa-info-circle" style="color: #003366; margin-right: 4px;"></i> Leyenda
                                        </strong>
                                    </div>
                                    <div class="col-md-9">
                                        <div class="d-flex flex-wrap align-items-center" style="gap: 15px;">
                                            <div class="d-flex align-items-center">
                                                <img width="25px" height="25px" src="../assets/img/button_gray.png" class="mr-2">
                                                <span style="font-size: 0.8rem; color: #6c757d;">Sin Realizar</span>
                                            </div>
                                            <div class="d-flex align-items-center">
                                                <img width="25px" height="25px" src="../assets/img/button_blue.jpg" class="mr-2">
                                                <span style="font-size: 0.8rem; color: #17a2b8;">En Proceso</span>
                                            </div>
                                            <div class="d-flex align-items-center">
                                                <img width="25px" height="25px" src="../assets/img/button_green.png" class="mr-2">
                                                <span style="font-size: 0.8rem; color: #28a745;">Procesado</span>
                                            </div>
                                            <div class="d-flex align-items-center">
                                                <img width="25px" height="25px" src="../assets/img/button_red.jpeg" class="mr-2">
                                                <span style="font-size: 0.8rem; color: #dc3545;">Error</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Input oculto -->
                            <div>
                                <input type="hidden" name="str" id="str">
                            </div>

                            <!-- Botones de Acción (AdminLTE rectangulares) -->
                            <div class="row mt-4">
                                <div class="col-md-12 text-center">
                             
                                    <a href="<?php echo base_url(); ?>dashboard04/home" class="btn btn-default" style="border-radius: 10px; padding: 10px 30px; font-weight: 500; margin-left: 8px; transition: all 0.3s;">
                                        <i class="fas fa-home mr-2"></i>
                                        Ir al Inicio
                                    </a>
                                </div>
                            </div>
                        </div><!-- /.card-body -->
                        
                    </div><!-- /.card -->
                    
                </div><!-- /.card-body -->
            </div><!-- /.card -->
        </form>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- Estilos adicionales para mejor visualización -->
<style>
    /* Transición suave al pasar el mouse sobre las filas */
    .table-hover tbody tr:hover {
        background-color: #e8f0fe !important;
        transition: background 0.2s ease;
    }
    
    /* Sombras y bordes redondeados */
    .card {
        border-radius: 12px !important;
        overflow: hidden;
    }
    
    /* Estilo para los círculos */
    .table tbody td img {
        border-radius: 50%;
        border: 2px solid transparent;
        transition: transform 0.2s ease, border-color 0.2s ease;
    }
    
    .table tbody td img:hover {
        transform: scale(1.1);
        border-color: #003366;
    }
    
    /* Botón de impresión personalizado */
    .btn:hover {
        opacity: 0.85;
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(0,51,102,0.3);
    }
    
    /* Ajuste para dispositivos móviles */
    @media (max-width: 768px) {
        .card-title {
            font-size: 1rem !important;
        }
        .table td, .table th {
            padding: 10px 12px !important;
            font-size: 0.85rem;
        }
        .table tbody td img {
            width: 22px !important;
            height: 22px !important;
        }
        .d-flex.flex-wrap {
            gap: 8px !important;
        }
    }
    
    @media (max-width: 576px) {
        .table td, .table th {
            padding: 8px 10px !important;
            font-size: 0.75rem;
        }
        .table tbody td img {
            width: 20px !important;
            height: 20px !important;
        }
        .badge {
            font-size: 0.7rem !important;
            padding: 4px 10px !important;
        }
    }
</style>