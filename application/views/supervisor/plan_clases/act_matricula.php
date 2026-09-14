 <!-- Content Wrapper. Contains page content -->

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
    <!-- /.container-fluid -->
    </section>
 
    <!-- Main content -->
    <section class="content">
 <script language="javascript">

    function anterior()
    { 
    location.href="/control_estudio/dashboard06/matricula";
    }
    </script>
       <div class="card">
          
              <div class="card-header">

                <h3 class="card-title"><strong>Estatus de la Matrícula del Estudiante Período :  </strong><?php  echo $periodo->nombre;?>
               </h3>
                <br>
                <?php foreach($estudiante as $estudiante){ ?>
                 <h3 class="card-title"><strong>Estudiante :  </strong><?php  echo $estudiante->nacionalidad.'-'.$estudiante->cedula.' '.$estudiante->datos;?>
              
               </h3>
                <br>
                <h3 class="card-title"><strong>Docente :  </strong><?php  echo $estudiante->nombre.' '.$estudiante->apellido;?>
               </h3>
              
                <br>
                 <h3 class="card-title"><strong>Unidad Curricular :  </strong> <?php echo $estudiante->codigo.' '.$estudiante->unidad_curricular; ?>
                </strong></h3>
                <?php
              }
              ?>
              </div>
                           
                    
                     
                      <div class="card-body">
           
                        <!-- Mensaje de Alerta-->
                        <?php if($this->session->flashdata('success')){ ?>                            
                                <div class="alert alert-success">
                                <a href="#" class="close" data-dismiss="alert">&times;</a>
                                <strong>Éxito!</strong> </i> <?php echo $this->session->flashdata('success'); ?>
                                </div>
                            
                            <?php } else if($this->session->flashdata('error')){  ?>
                            
                            <div class="alert alert-danger">
                            <a href="#" class="close" data-dismiss="alert">&times;</a>
                            <i class="icon fa fa-ban"></i> <?php echo $this->session->flashdata('error'); ?>
                            </div>
                            
                            <?php } else if($this->session->flashdata('warning')){?>
                            
                            
                            <div class="alert alert-warning"  >
                            <a href="#" class="close" data-dismiss="alert">&times;</a>
                            <strong>Alerta!</strong> <?php echo $this->session->flashdata('warning'); ?>

                            </div>
                            
                            <?php } else if($this->session->flashdata('info')){  ?>
                          
                            <div class="alert alert-info">
                             
                            <a href="#" class="close" data-dismiss="alert">&times;</a>
                            <strong>Información!</strong> <?php echo $this->session->flashdata('info'); ?>
                            </div>
                            <?php } ?>
                        <!-- Fin Mensaje de Alerta-->
                        <!-- Comienzo formulario -->
 <div class="panel panel-default">
            <div class="panel-body">
                <?php foreach ($matricula as $matricula) {?>
                 <form action="<?php echo base_url()?>dashboard06/cambiar_estatus/<?php echo $matricula->id.'/'.$periodo->id;?>" method="POST" >
              
                
                  <div class="form-group row">
                    <label for="estatus" class="col-sm-3 col-form-label">Estatus del estudiante </label>
                    <div class="col-sm-9">
                      <select class="form-control" name="retiro" id="retiro" required>
                              <option value="0" <?php  if($matricula->retiro=='0') echo " selected";?> >ACTIVO</option>
                              <option value="1" <?php  if($matricula->retiro=='1') echo " selected";?> >RETIRO VOLUNTARIO</option>
                              <option value="2" <?php  if($matricula->retiro=='2') echo " selected";?> >RETIRO MATRÍCULA POR CAUSALES ACADÉMICAS (Parágrafo Uno del artículo 105)</option>
                              <option value="3" <?php  if($matricula->retiro=='3') echo " selected";?> >RETIRO MATRÍCULA POR DECISIÓN CAIP</option>
                            </select>             
                    </div>
                  </div>
                   <?php
                }
                ?>
            <!-- fin formulario-->
           
                  <button type="submit" class="btn btn-primary">Actualizar</button>
                
                
            </form>             
            </div>
        </div>

            
               
<div align="center">
      
                  <input type="button" name="btnSeguiente" value="Regresar" class="boton btn btn-info"  title="Regresar" onClick="history.back()"></div>
      
</div>
<br>
 </div><!-- /.card -->
  </div>



    </section>
    <!-- /.content -->



  </div>
