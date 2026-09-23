<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Aranceles de Trámites Administrativos</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo base_url()?>admin/dashboard">Inicio</a></li>
                        <li class="breadcrumb-item active">Aranceles Trámites</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    

    <!-- Main content -->
    <section class="content">
        <div class="card card-primary card-outline">
            <div class="card-body">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Aranceles de Trámites Administrativos Vigentes</h3>
                       <!-- <a href="<?php echo base_url()?>admin/aranceltram/crear/" type="button" class="btn btn-info float-right">
                            <strong><i class="fas fa-plus"></i> Crear Arancel</strong>
                        </a>-->
                    </div>
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Tipo de Trámite</th>
                                    <th>Monto Público General</th>
                                    <th>Monto MP</th>
                                    <th>Estatus</th>
                                    <th>Fecha Registro</th>
                              <!--      <th>Acciones</th>-->
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(!empty($list_arancel_tram)): ?>
                                    <?php foreach($list_arancel_tram as $arancel): ?>
                                        <tr>
                                            
                                            <td><?php echo $arancel->nombre_tramite;?></td>
                                           
                                            <td><?php echo number_format($arancel->monto_gen, 2, ",", "."); ?> Bs.</td>
                                            <td><?php echo number_format($arancel->monto_mp, 2, ",", "."); ?> Bs.</td>
                                            <td>
                                                <?php if($arancel->status == 1): ?>
                                                    <span class="badge badge-success">Activo</span>
                                                <?php else: ?>
                                                    <span class="badge badge-danger">Inactivo</span>
                                                <?php endif; ?>
                                            </td>
                                            <td><?php echo date('d-m-Y H:i', strtotime($arancel->fecha_registro)); ?></td>
                                        <!--    <td>
                                                <div class="btn-group">
                                                    <a href="<?php echo base_url()?>admin/aranceltram/editar/<?php echo $arancel->id; ?>" 
                                                       class="btn btn-warning btn-sm" title="Editar">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <?php if($arancel->status == 1): ?>
                                                        <a href="<?php echo base_url()?>admin/aranceltram/eliminar/<?php echo $arancel->id; ?>" 
                                                           class="btn btn-danger btn-sm" 
                                                           onclick="return confirm('¿Está seguro de desactivar este arancel?')" 
                                                           title="Desactivar">
                                                            <i class="fas fa-toggle-off"></i>
                                                        </a>
                                                    <?php else: ?>
                                                        <a href="<?php echo base_url()?>admin/aranceltram/activar/<?php echo $arancel->id; ?>" 
                                                           class="btn btn-success btn-sm" 
                                                           onclick="return confirm('¿Está seguro de activar este arancel?')" 
                                                           title="Activar">
                                                            <i class="fas fa-toggle-on"></i>
                                                        </a>
                                                    <?php endif; ?>
                                                </div>
                                            </td>-->
                                        </tr>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="6" class="text-center">
                                            <div class="alert alert-info">
                                                <i class="fas fa-info-circle"></i> No hay aranceles de trámites registrados
                                            </div>
                                        </td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Tipo de Trámite</th>
                                    <th>Monto Público General</th>
                                    <th>Monto MP</th>
                                    <th>Estatus</th>
                                    <th>Fecha Registro</th>
                                 <!--   <th>Acciones</th>-->
                                </tr>
                            </tfoot>
                        </table>
                        <br>
                    </div>
                </div><!-- /.card -->
            </div><!-- /.card-body -->
        </div><!-- /.card card-primary card-outline -->
    </section><!-- /.section -->
</div><!-- /.content-wrapper -->