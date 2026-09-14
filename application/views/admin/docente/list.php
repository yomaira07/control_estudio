  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
    <!-- /.container-fluid -->
   
    </section>

    <!-- Main content -->
     <section class="content">
      <!-- /.card -->
              <div class="card card-primary card-outline">
                  <div class="card-body">
                      <div class="card">
          
                          <div class="card-header">
                            <h3 class="card-title">Listado de docentes</h3><a href="<?php echo base_url()?>admin/docente/crear/" type="button" class="btn btn-info float-right"><strong>Crear Nuevo Docente</strong></a>
                          </div>
                          
                          <div class="card-body">

                             
                 <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Cedula</th>
                    <th>Rif</th>
                    <th>Nombres y Apellidos</th>
                    <th>Tel Habitacion</th>
                    <th>Correo</th>
                    <th>Nivel</th>
                    <th>Usuario asignado</th>
                    <th>Tel Celular</th>
                    <th >Opción</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php if(!empty($lista_docente)):?>
                      <?php foreach($lista_docente as $lista_docente):?>
                  <tr>
                    <td><?php echo $lista_docente->cedula;?></td>
                    <td><?php echo $lista_docente->cod_rif.$lista_docente->rif; ?></td>
                    <td><?php echo $lista_docente->primer_nombre; ?> <?php echo $lista_docente->segundo_nombre; ?> <?php echo $lista_docente->primer_apellido; ?> <?php echo $lista_docente->segundo_apellido; ?></td>
                    <td><?php echo $lista_docente->telefono_hab; ?></td>
                    <td><?php echo $lista_docente->correo; ?></td>
                    <td><?php echo $lista_docente->nivel_acad; ?></td>
                    <td><?php echo '<b>'.strtolower($lista_docente->username).'</b><br>Estatus Usuario:'; if($lista_docente->estado==1): echo'ACTIVO'; else: echo 'INACTIVO'; endif; ?></td>
                    <td><?php echo $lista_docente->telefono_cel; ?></td>
                    <td colspan="2"><a href="<?php echo base_url()?>admin/docente/editar/<?php echo $lista_docente->id_docente; ?>" ><img src="../../assets/img/icons8-Edit Property.png" title="Editar"></a>
                    <a href="<?php echo base_url()?>admin/docente/requisitos_docentes/<?php echo $lista_docente->id_docente; ?>" ><img src="../../assets/img/imagen.jpg" height="40px" width="40px" title="Requisitos"></a>
   <a href="<?php echo base_url()?>dashboard06/buscar_constancias/<?php echo $lista_docente->id_usuario; ?>" ><img src="../../assets/img/certificado.png" height="40px" width="40px" title="Constancias de Participación Docente"></a>
                  </td>
                  </tr>
                        <?php endforeach;?>
                  <?php endif;?>        
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Cedula</th>
                    <th>Rif</th>
                    <th>Nombres y Apellidos</th>
                    <th>Tel Habitacion</th>
                    <th>Correo</th>
                    <th>Nivel</th>
                    <th>Usuario asignado</th>
                    <th>Tel Celular</th>
                    <th>Opcion</th>
                  </tr>
                  </tfoot>
                </table>

               <br>
              
          </div>

                              
                      </div><!-- /.card --> 
                  </div><!-- /.card-body -->
              </div><!-- /.card card-primary card-outline -->

        <!-- /.card-body -->

      <!-- /.card card-primary card-outline -->

      </section><!-- /.section-->
    <!-- /.content -->

 </div>
  <!-- /.content-wrapper -->
