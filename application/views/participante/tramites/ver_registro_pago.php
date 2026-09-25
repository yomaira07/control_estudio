<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" style="background: #f4f6f9;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0" style="font-weight: 300; color: #003366;">
                        <i class="fas fa-receipt" style="color: #003366; margin-right: 8px;"></i>
                        <span style="color: #003366; font-weight: 600;">SCE-ENFMP</span>
                        <span style="color: #2c3e50; font-weight: 300;"> - Comprobante de Pago</span>
                    </h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right" style="background: transparent;">
                        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>dashboard04/home" style="color: #6c757d;">Inicio</a></li>

                        <li class="breadcrumb-item active" style="color: #003366; font-weight: 600;">Comprobante de Pago</li>
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
                                <div class="mr-3" style="width: 42px; height: 42px; background: #28a745; border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                                    <i class="fas fa-check-circle text-white" style="font-size: 1.1rem;"></i>
                                </div>
                                <div>
                                    <h5 class="mb-0" style="font-weight: 600; color: #2c3e50;">
                                        Detalle del Pago Registrado
                                    </h5>
                                   
                                </div>
                            </div>
                            <div class="d-flex align-items-center flex-wrap">
                                <span class="badge" style="font-size: 0.8rem; padding: 5px 16px; border-radius: 20px; font-weight: 500; background: #28a745; color: white;">
                                    <i class="fas fa-check-circle mr-1"></i>
                                    Pago Registrado
                                </span>
                            </div>
                        </div>
                    </div>

                    <!-- Body -->
                    <div class="card-body p-4">

                        <!-- Mensajes de Alerta -->
                        <?php if($this->session->flashdata('success')): ?>
                            <div class="alert alert-success alert-dismissible" style="border-radius: 8px; border-left: 4px solid #28a745;">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <i class="icon fa fa-check mr-2"></i> <?php echo $this->session->flashdata('success'); ?>
                            </div>
                        <?php endif; ?>

                        <?php if($this->session->flashdata('error')): ?>
                            <div class="alert alert-danger alert-dismissible" style="border-radius: 8px; border-left: 4px solid #dc3545;">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <i class="icon fa fa-ban mr-2"></i> <?php echo $this->session->flashdata('error'); ?>
                            </div>
                        <?php endif; ?>

                        <!-- Datos del Estudiante -->
                        <div class="row mb-4">
                            <div class="col-md-12">
                                <div class="card card-outline" style="border-radius: 8px; border-left: 4px solid #003366; border-top: none; background: #f8f9fa;">
                                    <div class="card-body p-3">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <small class="text-muted" style="font-size: 0.7rem;">ESTUDIANTE</small>
                                                <p style="font-weight: 600; color: #2c3e50; margin-bottom: 0;">
                                                    <i class="fas fa-user" style="color: #003366; margin-right: 6px;"></i>
                                                    <?php 
                                                        $nombre_completo = '';
                                                        if (isset($datos_alumno->nombre) && isset($datos_alumno->apellido)) {
                                                            $nombre_completo = $datos_alumno->nombre . ' ' . $datos_alumno->apellido;
                                                        } elseif (isset($datos_alumno->nombre_primer)) {
                                                            $nombre_completo = $datos_alumno->nombre_primer . ' ' . 
                                                                              (isset($datos_alumno->nombre_segundo) ? $datos_alumno->nombre_segundo . ' ' : '') .
                                                                              (isset($datos_alumno->apellido_primer) ? $datos_alumno->apellido_primer . ' ' : '') .
                                                                              (isset($datos_alumno->apellido_segundo) ? $datos_alumno->apellido_segundo : '');
                                                        } else {
                                                            $nombre_completo = 'N/A';
                                                        }
                                                        echo $nombre_completo;
                                                    ?>
                                                </p>
                                            </div>
                                            <div class="col-md-3">
                                                <small class="text-muted" style="font-size: 0.7rem;">CÉDULA</small>
                                                <p style="font-weight: 600; color: #2c3e50; margin-bottom: 0;">
                                                    <i class="fas fa-id-card" style="color: #003366; margin-right: 6px;"></i>
                                                    <?php echo isset($datos_alumno->cedula) ? $datos_alumno->cedula : 'N/A'; ?>
                                                </p>
                                            </div>
                                           
                                            <div class="col-md-2">
                                                <small class="text-muted" style="font-size: 0.7rem;">ESTADO</small>
                                                <p style="margin-bottom: 0;">
                                                    <span class="badge" style="background: #28a745; color: white; padding: 4px 14px; border-radius: 20px; font-size: 0.75rem;">
                                                        <i class="fas fa-check-circle"></i> Pagado
                                                    </span>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- ============================================================ -->
                        <!-- DATOS BANCARIOS DEL PAGO                                     -->
                        <!-- ============================================================ -->
                        <div class="row mt-4">
                            <div class="col-md-6">
                                <div class="card card-secondary card-outline" style="border-radius: 8px; border-left: 4px solid #6c757d; border-top: none;">
                                    <div class="card-header" style="background: #f8f9fa; border-bottom: 1px solid #e8e8e8; padding: 8px 15px; border-radius: 8px 8px 0 0;">
                                        <h6 class="mb-0" style="font-weight: 600; color: #2c3e50;">
                                            <i class="fas fa-university text-secondary mr-2"></i>
                                            Datos Bancarios
                                        </h6>
                                    </div>
                                    <div class="card-body p-3">
                                        <?php if(!empty($pago)): ?>
                                      
                                            <table class="table table-sm" style="margin-bottom: 0;">
                                            <?php 
                                            foreach($pago as $item):
                                            ?>
                                            
                                                <tbody>
                                                    <tr  style="background-color: #f8f9fa; font-weight: 500; color: #2c3e50;">
                                                        <td style="font-weight: 500; color: #2c3e50; width: 40%;"><strong>Tipo de pago</strong></td>
                                                        <td style="color: #2c3e50;">
                                                        <strong>
                                                              <?php echo isset($item->pago_adicional) ? ($item->pago_adicional == 0 ? 'Primer pago' : 'Pago Adicional') : 'No especificado'; ?>
                                                        </strong>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="font-weight: 500; color: #2c3e50; width: 40%;">Unidades de Crédito pagadas</td>
                                                        <td style="color: #2c3e50;">
                                                            <?php echo isset($item->uc) ? $item->uc.' UC' : 'No especificado'; ?>       
                                                            <?php if(isset($item->pago_adicional) && $item->pago_adicional == 1): ?>
                                                                Pago de diferencia en Bs.
                                                            <?php endif; ?>                                                  
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="font-weight: 500; color: #2c3e50; width: 40%;">Solicitud de Tràmite</td>
                                                        <td style="color: #2c3e50;">
                                                        
                                                            <?php echo isset($item->postgrado) ?  $item->postgrado : 'No especificado'; ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="font-weight: 500; color: #2c3e50; width: 40%;">Banco receptor</td>
                                                        <td style="color: #2c3e50;">
                                                            <?php echo isset($item->nombre) ? $item->nombre : (isset($item->banco_nombre) ? $item->banco_nombre : 'No especificado'); ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="font-weight: 500; color: #2c3e50;">Número de Cuenta receptor</td>
                                                        <td style="color: #2c3e50;">
                                                            <?php echo isset($item->nro_cuenta) ? $item->nro_cuenta : 'No especificado'; ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="font-weight: 500; color: #2c3e50;">Fecha de Operación</td>
                                                        <td style="color: #2c3e50;">
                                                            <?php 
                                                                $fecha = isset($item->fecha_transferencia) ? $item->fecha_transferencia : (isset($item->fecha_operacion) ? $item->fecha_operacion : null);
                                                                echo $fecha ? date('d/m/Y', strtotime($fecha)) : 'No especificada'; 
                                                            ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="font-weight: 500; color: #2c3e50;">Nro. Referencia SCE</td>
                                                        <td style="color: #2c3e50;">
                                                            <?php echo isset($item->nro_referencia) ? $item->nro_referencia : 'No especificado'; ?>
                                                        </td>
                                                    </tr>
                                                     <tr>
                                                        <td style="font-weight: 500; color: #2c3e50;">Nro. Operaciòn Banco</td>
                                                        <td style="color: #2c3e50;">
                                                            <?php echo isset($item->transaction_id_bdv) ? $item->transaction_id_bdv : $item->nro_referencia; ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="font-weight: 500; color: #2c3e50;">Mètodo de pago</td>
                                                        <td style="color: #2c3e50;">
                                                            <?php echo isset($item->metodo_pago) ? $item->metodo_pago.' en lìnea' : 'transferencia'; ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="font-weight: 500; color: #2c3e50;">Cédula/RIF depositante</td>
                                                        <td style="color: #2c3e50;">
                                                            <?php echo isset($item->cedula) ? $item->cedula : 'No especificado'; ?>
                                                        </td>
                                                    </tr>
                                                    <?php if(isset($item->pago_adicional) && $item->pago_adicional == 0): ?>
                                                    <tr>
                                                        <td style="font-weight: 500; color: #2c3e50;">Monto Calculado Ref.</td>
                                                        <td style="color: #28a745; font-weight: 600;">
                                                            <?php echo isset($item->monto_apagar) ? number_format($item->monto_apagar, 2, ',', '.') . ' Ref.' : 'No especificado'; ?>
                                                        </td>
                                                    </tr>
                                                    <?php endif;?>
                                                    <tr>
                                                        <td style="font-weight: 500; color: #2c3e50;">Monto Depositado en Bs.</td>
                                                        <td style="color: #28a745; font-weight: 600;">
                                                            <?php echo isset($item->monto_depositado) ? number_format($item->monto_depositado, 2, ',', '.') . ' Bs.' : 'No especificado'; ?>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                                <?php endforeach; ?>
                                            </table>
                                          
                                        <?php else: ?>
                                            <p class="text-center text-muted py-3">
                                                <i class="fas fa-info-circle"></i> No se encontraron datos bancarios del pago
                                            </p>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                        <div class="card card-success card-outline" style="border-radius: 8px; border-left: 4px solid #28a745; border-top: none;">
                                            <div class="card-header" style="background: #f0fff4; border-bottom: 1px solid #e8e8e8; padding: 8px 15px; border-radius: 8px 8px 0 0;">
                                                <h6 class="mb-0" style="font-weight: 600; color: #1e7e34;">
                                                    <i class="fas fa-paperclip text-success mr-2"></i>
                                                    Comprobante de Pago
                                                </h6>
                                            </div>
                                            <div class="card-body p-3 text-center">
                                                <?php 
                                                $archivo_encontrado = false;
                                                $ruta_final = '';
                                                $extension = '';
                                                $fecha_registro = '';
                                                
                                                if(!empty($pago)):
                                                    $primer_item = $pago[0];
                                                    $id_usuario = isset($primer_item->id_usuario) ? $primer_item->id_usuario : '';
                                                    $fecha_registro = isset($primer_item->dregistro) ? $primer_item->dregistro : '';
                                                    
                                                    if(!empty($id_usuario)):
                                                        // Base del nombre del archivo
                                                        $nombre_base = $id_usuario . '_transferencia';
                                                        
                                                        // Extensiones permitidas
                                                        $extensiones_permitidas = ['jpg', 'jpeg', 'png', 'gif', 'pdf'];
                                                        
                                                        // Rutas donde buscar
                                                        $rutas_busqueda = [
                                                            './assets/transferencia/',
                                                            './uploads/pagos/',
                                                            './assets/uploads/pagos/'
                                                        ];
                                                        
                                                        // Buscar el archivo en todas las rutas y extensiones
                                                        foreach($rutas_busqueda as $ruta_base) {
                                                            foreach($extensiones_permitidas as $ext) {
                                                                $ruta_completa = $ruta_base . $nombre_base . '.' . $ext;
                                                                if(file_exists($ruta_completa)) {
                                                                    $archivo_encontrado = true;
                                                                    $extension = $ext;
                                                                    
                                                                    // Determinar la URL base según la ruta
                                                                    if(strpos($ruta_base, 'assets/transferencia/') !== false) {
                                                                        $ruta_final = base_url('assets/transferencia/' . $nombre_base . '.' . $ext);
                                                                    } elseif(strpos($ruta_base, 'uploads/pagos/') !== false) {
                                                                        $ruta_final = base_url('uploads/pagos/' . $nombre_base . '.' . $ext);
                                                                    } elseif(strpos($ruta_base, 'assets/uploads/pagos/') !== false) {
                                                                        $ruta_final = base_url('assets/uploads/pagos/' . $nombre_base . '.' . $ext);
                                                                    }
                                                                    
                                                                    break 2; // Salir de ambos bucles
                                                                }
                                                            }
                                                        }
                                                    endif;
                                                endif;
                                                ?>
                                                
                                                <?php if($archivo_encontrado): ?>
                                                    <?php if(in_array(strtolower($extension), ['jpg', 'jpeg', 'png', 'gif'])): ?>
                                                        <!-- Mostrar imagen -->
                                                        <a href="<?php echo $ruta_final; ?>" target="_blank" class="d-block mb-2">
                                                            <img src="<?php echo $ruta_final; ?>" alt="Comprobante de Pago" class="img-fluid" style="max-height: 250px; border-radius: 8px; border: 1px solid #dee2e6; object-fit: contain;">
                                                        </a>
                                                        <div class="btn-group" role="group">
                                                            <a href="<?php echo $ruta_final; ?>" target="_blank" class="btn btn-sm btn-primary" style="border-radius: 20px;">
                                                                <i class="fas fa-eye"></i> Ver imagen
                                                            </a>
                                                            <a href="<?php echo $ruta_final; ?>" download class="btn btn-sm btn-success" style="border-radius: 20px;">
                                                                <i class="fas fa-download"></i> Descargar
                                                            </a>
                                                        </div>
                                                    <?php elseif(strtolower($extension) == 'pdf'): ?>
                                                        <!-- Mostrar PDF -->
                                                        <div style="padding: 20px 0;">
                                                            <i class="fas fa-file-pdf" style="font-size: 80px; color: #dc3545;"></i>
                                                            <p style="margin-top: 10px; font-weight: 500; color: #2c3e50; word-break: break-all;">
                                                                <?php echo $id_usuario . '_transferencia.' . $extension; ?>
                                                            </p>
                                                        </div>
                                                        <div class="btn-group" role="group">
                                                            <a href="<?php echo $ruta_final; ?>" target="_blank" class="btn btn-sm btn-primary" style="border-radius: 20px;">
                                                                <i class="fas fa-eye"></i> Ver PDF
                                                            </a>
                                                            <a href="<?php echo $ruta_final; ?>" download class="btn btn-sm btn-success" style="border-radius: 20px;">
                                                                <i class="fas fa-download"></i> Descargar
                                                            </a>
                                                        </div>
                                                    <?php else: ?>
                                                        <!-- Otros archivos -->
                                                        <div style="padding: 20px 0;">
                                                            <i class="fas fa-file" style="font-size: 80px; color: #6c757d;"></i>
                                                            <p style="margin-top: 10px; font-weight: 500; color: #2c3e50; word-break: break-all;">
                                                                <?php echo $id_usuario . '_transferencia.' . $extension; ?>
                                                            </p>
                                                        </div>
                                                        <a href="<?php echo $ruta_final; ?>" download class="btn btn-sm btn-success" style="border-radius: 20px;">
                                                            <i class="fas fa-download"></i> Descargar archivo
                                                        </a>
                                                    <?php endif; ?>
                                                    
                                                    <p style="margin-top: 8px; font-size: 0.75rem; color: #6c757d;">
                                                        <i class="fas fa-info-circle"></i> 
                                                        Archivo subido el: <?php echo $fecha_registro ? date('d/m/Y H:i', strtotime($fecha_registro)) : 'N/A'; ?>
                                                    </p>
                                                <?php else: ?>
                                                    <div style="padding: 30px 0;">
                                                        <i class="fas fa-file-upload" style="font-size: 60px; color: #dee2e6;"></i>
                                                        <p style="margin-top: 10px; color: #6c757d;">
                                                            No se encontró el comprobante de pago
                                                        </p>
                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    

                         <!-- ============================================================ -->
                        <!-- BOTONES DE ACCIÓN                                             -->
                        <!-- ============================================================ -->
                        <div class="row mt-4">
                            <div class="col-md-12 text-center">
                                <div class="d-flex justify-content-center flex-wrap" style="gap: 12px;">
                                    
                                    <?php
                                        // Obtenemos el tipo de solicitud (id_tramite) de la solicitud principal                                                                       

                               if (isset($info_solicitud->id_tramite))  $tipo_solicitud = $info_solicitud->id_tramite ;
                                        // Definimos la URL de redirección según el tipo de trámite
                                        switch ($tipo_solicitud) {
                                        case 16:
                                            $url_cancelar = base_url() . 'dashboard09/solicitud_reincorporacion/2';
                                            break;
                                        case 17:
                                        case 19:
                                            $url_cancelar = base_url() . 'dashboard09/solicitud_ruc/2';
                                            break;
                                        case 18:
                                            $url_cancelar = base_url() . 'dashboard09/solicitud_egreso/2';
                                            break;
                                        case 28:
                                            $url_cancelar = base_url() . 'dashboard09/solicitud_ruc_requisitos/2';
                                            break;
                                        default:
                                            $url_cancelar = base_url() . 'dashboard09/index/2';
                                            break;
                                        }
                                    ?>
                                   
                                    <!-- Botón Cancelar con redirección dinámica -->
                                    <a href="<?php echo $url_cancelar; ?>" 
                                    class="btn btn-default" 
                                    style="border-radius: 10px; padding: 12px 30px; font-weight: 500; transition: all 0.3s; min-width: 150px;">
                                    <i class="fas fa-arrow-left mr-2"></i>
                                    Regresar
                                    </a>
                                       <!-- Botón Imprimir pantalla -->
                                    <button onclick="window.print();" class="btn btn-secondary" style="border-radius: 10px; padding: 10px 30px; font-weight: 500; margin-left: 8px; transition: all 0.3s;">
                                    <i class="fas fa-print mr-2"></i>
                                    Imprimir
                                    </button>
                                </div>
                            </div>
                        </div>

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
    .table-hover tbody tr:hover {
        background-color: #e8f0fe !important;
        transition: background 0.2s ease;
    }
    
    .card {
        border-radius: 10px !important;
        overflow: hidden;
    }
    
    .btn-primary {
        background-color: #007bff;
        border-color: #007bff;
        color: #fff;
        transition: all 0.2s ease;
    }
    
    .btn-primary:hover {
        background-color: #0069d9;
        border-color: #0062cc;
        box-shadow: 0 2px 8px rgba(0, 123, 255, 0.3);
        transform: translateY(-2px);
    }
    
    .btn-success {
        background-color: #28a745;
        border-color: #28a745;
        color: #fff;
        transition: all 0.2s ease;
    }
    
    .btn-success:hover {
        background-color: #218838;
        border-color: #1e7e34;
        box-shadow: 0 2px 8px rgba(40, 167, 69, 0.3);
        transform: translateY(-2px);
    }
    
    .btn-secondary {
        background-color: #6c757d;
        border-color: #6c757d;
        color: #fff;
        transition: all 0.2s ease;
    }
    
    .btn-secondary:hover {
        background-color: #5a6268;
        border-color: #545b62;
        box-shadow: 0 2px 8px rgba(108, 117, 125, 0.3);
        transform: translateY(-2px);
    }
    
    @media (max-width: 768px) {
        .card-title {
            font-size: 1rem !important;
        }
        .table td, .table th {
            padding: 8px 10px !important;
            font-size: 0.75rem !important;
        }
        .btn {
            padding: 8px 25px !important;
            font-size: 0.9rem !important;
            margin-bottom: 5px;
            width: 100%;
        }
        .btn-success {
            margin-left: 0 !important;
        }
        .btn-secondary {
            margin-left: 0 !important;
        }
    }
    
    @media (max-width: 576px) {
        .table td, .table th {
            padding: 6px 8px !important;
            font-size: 0.7rem !important;
        }
    }
</style>