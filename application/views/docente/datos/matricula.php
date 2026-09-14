 <!-- Content Wrapper. Contains page content -->

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
    <!-- /.container-fluid -->
    </section>
 
    <!-- Main content -->
    <section class="content">

       <div class="card">
          
                    <div class="card-header">
                      <h3 class="card-title"><strong>Datos Académicos
                      </strong></h3>

                    </div>
                           
                    
                     
                      <div class="card-body">
           
                        <!-- Mensaje de Alerta-->
                        <?php  if ($this->session->flashdata("error")): ?>
                        <div class="alert alert-danger alert-dismissible">
                          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                          <p><i class="icon fa fa-ban"></i> <?php echo $this->session->flashdata("error"); ?> </p>
                        </div>
                      <?php endif; ?>
                        <!-- Fin Mensaje de Alerta-->
                        <!-- Comienzo formulario -->
 <div class="panel panel-default">
            <div class="panel-body">
                <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered table-condensed" id="example" width="100%">
                    <thead>
                        <tr>
                            <th>Cédula</th>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Género</th>
                            <th>Correo</th>
                            <th>Organismo</th>
                            <th>Tipo de Funcionario</th>
                            <th>Cargo</th>
                            <th>Entidad Federal</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    <?Php
                        foreach ($actuacion as $actua) 
                        {
                        ?>
                        <tr>
                        <?php echo "<td align='center'>"; ?>
                            <?php if($editar==1) { ?>
                            <a href="#" id="<?= $actua->numero_identificacion; ?>" name="item" class="">
                                <span class='btn-info badge'>
                                    <?= $actua->numero_identificacion; ?>
                                </span>   
                            </a>
                            <?php } else { 
                                echo $actua->numero_identificacion; 
                            } ?>
                        </td>  
                        <td><?= $actua->nombre; ?></td>  
                        <td><?= $actua->apellido; ?></td> 
                        <td align="center"><?= $actua->genero; ?></td>
                        <td align='center'><?= $actua->email; ?></td>
                        <td align='center'><?= $actua->organismo; ?></td>
                        <td><?= $actua->tipo_funcionario; ?></td> 
                        <td align='center'><?= $actua->cargo; ?></td>
                        <td align='center'><?= $actua->descripcion; ?></td>
                        <td align="center">
                        <?php if($editar==1) { ?>
                          <a href="#" name="btn_eliminar" title="Eliminar Participante" id="e<?= $actua->numero_identificacion ?>"><i style="color:red" class="fa fa-trash fa-lg"></i></a>
                        <?php } ?>
                        </td>
                        </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>              
            </div>
        </div>

              </div>
                </div><!-- /.card -->





    </section>
    <!-- /.content -->



  </div>