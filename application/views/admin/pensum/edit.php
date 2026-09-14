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
                      <h3 class="card-title"><strong>Editar Unidad Curricular de <?php echo $list_pensum->nombre;?></strong></h3>
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
            <form action="<?php echo base_url()?>admin/pensum/pensum_update" method="POST" name=carga >

              <input type="hidden" name="id_usuario" value="<?Php echo $this->session->userdata('id'); ?>">
                <input type="hidden" name="cod_programa" value="<?php echo $list_pensum->programa_id; ?>">  
                <input type="hidden" name="id_pensum" value="<?php echo $list_pensum->id; ?>">  
                <input type="hidden" name="fecha_registro" value="<?php echo date('d-m-Y H:i:s'); ?>">

                  <div class="form-group row">
                    <label for="nombre" class="col-sm-3 col-form-label">Nombre</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="codigo" name="nombre" value="<?php echo $list_pensum->nombre; ?>" onkeyup="javascript:this.value=this.value.toUpperCase();" required="true"> 
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="siglas" class="col-sm-3 col-form-label">Siglas</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="siglas" name="siglas" 
                      placeholder="Siglas de la unidad curricular" required="true" value="<?php echo $list_pensum->sigla_uc; ?>"onkeyup="javascript:this.value=this.value.toUpperCase();">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="trimestre" class="col-sm-3 col-form-label">Trimestre</label>
                    <div class="col-sm-9">
                      <select name="trimestre" class="form-control" required>
                      <option value="">Seleccione...</option>
                        <?Php foreach ($trimestres as $trimestre){
                            if($trimestre->id==$list_pensum->id_trimestre ){
                                echo "<option value='".$trimestre->id."' selected>".$trimestre->nombre."</option>";  
                            }else{
                          echo "<option value='".$trimestre->id."'>".$trimestre->nombre."</option>";  
                        }
                        }
                        ?>
                      </select>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="horas" class="col-sm-3 col-form-label">Horas</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="horas" name="horas" 
                      placeholder="Horas de la unidad curricular" required="true" value="<?php echo $list_pensum->horas; ?>"onkeyup="javascript:this.value=this.value.toUpperCase();">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="unidad_curricular" class="col-sm-3 col-form-label">Unidad Crédito</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="unidad_curricular" name="unidad_curricular" 
                      placeholder="Unidad crédito Ej. 02" required="true" value="<?php echo $list_pensum->unidad_curricular; ?>" onkeyup="javascript:this.value=this.value.toUpperCase();">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="codigo" class="col-sm-3 col-form-label">Codigo</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="codigo" name="codigo" 
                      placeholder="Codigo de la unidad" required="true" value="<?php echo $list_pensum->codigo; ?>" onkeyup="javascript:this.value=this.value.toUpperCase();">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="eje" class="col-sm-3 col-form-label">Eje</label>
                    <div class="col-sm-9">
                      <select name="eje" class="form-control" required>
                      <option value="">Seleccione...</option>
                        <?Php foreach ($ejes as $eje){
                            if($ejes->id==$list_pensum->id_eje){
                                echo "<option value='".$eje->id."' selected>".$eje->nombre."</option>";  
                            }else{
                                echo "<option value='".$eje->id."'>".$eje->nombre."</option>";  
                            }
                        }
                        ?>
                      </select>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="status" class="col-sm-3 col-form-label">Status</label>
                    <div class="col-sm-9">
                      <select class="form-control" name="status">
                          <option value="1">Activo</option>
                          <option value="2">Inactivo</option>
                        </select>
                    </div>
                  </div>
                  <div>
                  <button type="submit" class="btn btn-primary">Actualizar Pensum</button>
                  </div> 
                    </form>
                    </div>
                </div><!-- /.card -->

            <!-- fin formulario-->
            <div class="card">
          
          <div class="card-header">
            <h3 class="card-title"><strong>Prelación de la Unidad Curricular:  <?php echo $list_pensum->nombre;?></strong></h3>
          </div>

            <div class="card-body">
            <form action="<?php echo base_url()?>admin/pensum/prelacion_add" method="POST" name=carga >
            <input type="hidden" name="id_pensum" value="<?php echo $list_pensum->id; ?>">  
            <input type="hidden" name="cod_programa" value="<?php echo $list_pensum->programa_id; ?>">  
                  <div class="form-group row">
                    <label for="trimestre" class="col-sm-3 col-form-label">Unidad Curricular: </label>
                    <div class="col-sm-6">
                      <select name="prelacion" class="form-control" required>
                      <option value="">Seleccione...</option>
                        <?Php foreach ($prelacion as $prelacion){
                            if($prelacion->id == $list_pensum->id_codigo_prelacion){
                                echo "<option value='".$prelacion->id."' selected>".$prelacion->des_trimestre.'  |  '.$prelacion->nombre."</option>";        
                            }else{
                                echo "<option value='".$prelacion->id."'>".$prelacion->des_trimestre.'  |  '.$prelacion->nombre."</option>";  
                            }
                        }
                        ?>
                      </select> 
                      </div>
                      <div class="col-sm-3">
                      <button type="submit" class="btn btn-success" title="-Hacer clic para Registrar Datos-"> (+) Registrar Unidad Curricular</button>
                    </div>
                 
                  </div>
                
           
                  <div class="table-responsive">
                        <table id="example" class="table table-striped table-bordered" style="width:100%"> 
                                    <thead>  
                                        <tr>
                                            <th>Unidad Curricular prelación </th>
                                            <th>Código</th>
                                            <th>Unidad Crédito </th>                                                                         
                                            <th>Opción</th>
                                          
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php if(!empty($List_prelacion)):                                
                                      foreach($List_prelacion as $List_prelacion):?>
                                        <tr>                                                    
                                                <td><?php echo $List_prelacion->nombre;?></td>
                                                <td><?php echo $List_prelacion->codigo;?></td>
                                                <td><?php echo $List_prelacion->unidad_curricular;?></td>
                                                <td><a href="<?php echo base_url()?>admin/pensum/edit_prelacion/<?php echo $List_prelacion->id_prelacion; ?>" ><img src="../assets/img/icons8-Edit Property.png" title ="Editar Registro"></a>
                                                <a href="<?php echo base_url()?>admin/pensum/<?php echo $List_prelacion->id_prelacion; ?>" ><img src="../assets/img/icons8-Delete.png" title ="Eliminar Registro"></a>
                                              </td>  
                                              </td>                                                   
                                            </tr>
                                            <?php endforeach;?>
                                    <?php endif;?>  
                                    </tbody>                      
                                    <tfoot>
                                        <tr>
                                            <th>Unidad Curricular que prelación </th>
                                            <th>Código</th>
                                            <th>Unidad Crédito </th>                                                                         
                                            <th>Opción</th>
                                            
                                        </tr>
                                    </tfoot>
                        </table>
                    </div>
            </form>
          </div>
                </div><!-- /.card -->


    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
