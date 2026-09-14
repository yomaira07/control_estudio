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
                      <h2 class="card-title"><strong>  <i class="fas fa-graduation-cap"> Solicitud de Trámites Académicos</i>
                      </strong></h2>

                    </div>            
                      <div class="card-body">           
                          <!--Informacion del alumno completo -->   
      <div align="center"><h4>INFORMACI&Oacute;N DEL ALUMNO</h4></div>
	      <div align="center">

            <?php if(!empty($alumno_list)):?>
                                <div class="card-header">
                                    <table align="center" >      
                                  <tr>
                                      <td><b>Cédula de Identidad:</b> </td>
                                      <td align="center"><?php echo $alumno_list->nacionalidad.'-'.$alumno_list->cedula;?></td>
                                  </tr>                          
                                  <tr>
                                    <td> <b>Nombre(s) y Apellido(s): </b></td>                                               
                                    <td align="center"><?php echo $alumno_list->nombre_primer.' '.$alumno_list->nombre_segundo.' '.$alumno_list->apellido_primer.' '.$alumno_list->apellido_segundo;?></td> 
                                  </tr>                          
                                  <tr>                          
                                    <td> <b>Correo Electronico: </b></td>
                                      <td align="center"><?php echo $alumno_list->correo; ?></td>   
                                  </tr>                          
                                  <tr>
                                    <td> <b>Telefonos(s): </b></td>
                                    <td align="center"><?php echo $alumno_list->telefono_cel; echo " -- ".$alumno_list->telefono_hab; ?>
                                    </td>                        
                                  </tr>                          
                                  <tr>                          
                                    <td > <b>Estado Residencia: </b></td>
                                    <td align="center"><?php echo strtoupper($alumno_list->residencia); ?></td>                     
                                  </tr>                          
                                  <tr>                          
                                    <td> <b>Lugar de Trabajo: </b></td>
                                    <td align="center"> <?php echo ($alumno_list->lugar_trabajo); ?> </td>      
                                  </tr>
                                  </table>                                           
                              </div>
            <?php endif ?>
	        </div>

      </div>     
   <form>
  
   <table class="table table-bordered">
              <tr>
              <td><b>Programa de Postgrado o Especialización:</b></td>
                 <td>
                   <div class="row" class="col-5">
                            <select class="form-control" name="comboprograma" id="comboprograma"  required>
                              <option value="">- Seleccione -</option>                                       
                              <?php foreach($programa as $programa):?>
                              <option value="<?php echo $programa->id;?> "                     
                              </option><?php 
                              echo $programa->nombre;?>
                              <?php endforeach; ?>
                            </select>     
                    </div>
                 </td>
               </tr>      
              <tr>
                 <td><b>Trámite Administrativo a Solicitar:</b></td>
                 <td>
                   <div class="row" class="col-5">
                            <select class="form-control" name="combotramite" id="combotramite"required>
                              <option value="">- Seleccione -</option>      
                           
                            </select>     
                              
                    </div>
                 </td>
               </tr>    
               <?php // echo $this->input['copias'];// if(  $copias==1):?>
               <tr>
                 <td><b>Número de Ejemplares:</b></td>
                 <td>
                   <div class="row" class="col-5">
                        <input class='form-control'   type='number' name='copias' min=1  max=5 maxlength='5' value="" required/>            
                 
                        </div>
                 </td>                       
               </tr> 
               <tr>
                 <td colspan=2 align="center">
               <input type="file" name="userfile" size="400" required="true" /> 
    <br/><br/>
    <input type="submit" name="upload"  value="Cargar Requisito Digitalizado" class="boton"/>
    </td>                         
               </tr>           
              
    </table> 
    

                
           
                  
                <!-- /.col -->
              </div>
              <!-- /.row -->
              <!-- /.row -->
              <div class="table-responsive">
                        <table id="example" class="table table-striped table-bordered" style="width:100%"> 
                                    <thead>  
                                        <tr>
                                            <th>Requisitos</th>
                                            <th>Archivo Adjunto</th>
                                                                                                                    
                                            <th>Opción</th>
                                          
                                        </tr>
                                    </thead>  
                                    <tbody>      
                                      <?php foreach($solicitudes as $solicitudes){?>
                                        <tr>                                                    
                                                <td><?php echo $solictudes->nombre;?></td>
                                                <td><?php echo $solicitudes->copias;?></td>                                             
                                                <td><a href="<?php echo base_url()?>dashboard09/tramites_edit/<?php echo $solicitudes->id; ?>" ><img src="../assets/img/icons8-Edit Property.png" title ="Editar Registro"></a>
                                                <a href="<?php echo base_url()?>dashboard09/tramites_eliminar/<?php echo $solicitudes->id; ?>" ><img src="../assets/img/icons8-Delete.png" title ="Eliminar Registro"></a>
                                              </td>                                                                                    
                                                                                                      
                                            </tr>
                                  <?php } ?>
                                    </tbody>                      
                                    <tfoot>
                                        <tr>
                                        <th>Requisitos</th>
                                            <th>Archivo Adjunto</th>                                                                                                                    
                                            <th>Opción</th>                                      
                                        </tr>
                                    </tfoot>
                        </table>                  
              </div>
              <button type="submit" class="btn btn-primary">Registrar Tramite</button>
         </form>             
                </div>
                      </div><!-- /.card -->


    </section>
    <!-- /.content -->



  </div>
  <!-- /.content-wrapper -->