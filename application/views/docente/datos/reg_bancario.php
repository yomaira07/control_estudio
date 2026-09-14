  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
    <!-- /.container-fluid -->
   
    </section>

    <!-- Main content -->
     <section class="content">
      <!-- /.card -->
                
            <section class="content">

       <div class="card">
          
                    <div class="card-header">
                      <h3 class="card-title"><strong>Datos Bancarios del Docente
                      </strong></h3>

                    </div>
                           
                    
                     
                      <div class="card-body">
                     <form action="<?php echo base_url()?>dashboard06/reg_bancario_store/<?Php echo $this->session->userdata('id'); ?>" method="POST"   >
                 <input type="hidden" name="id_usuario" value="<?Php echo $this->session->userdata('id'); ?>">
                 <input type="hidden" name="no_encontrado" value="<?php if ($datos_bancarios==false){echo "falso";}else{ echo $datos_bancarios->id_usuario;  } 
                        ?>">         
               
                <input type="hidden" name="fecha_registro" value="<?php echo date('d-m-Y H:i:s'); ?>">
              <br>                          
                      <div class="col-md-6">
                    <tr>
                        <td>
                           <div class="form-group row">
                            <label for="cuenta" class="col-sm-3 col-form-label" title="-Dato Obligatorio-">(*) Cuenta Bancaria N°</label>
                            <div class="col-sm-9">                    
                            <input type="text" class="form-control" required name="num_cuenta" id="num_cuenta" value="<?php echo $datos_bancarios->nro_cuenta; ?>" onkeypress="return controltag(event);"maxlength="20"  />
                        </div>
                        </div>
                        </td>
                        <td>
                           <div class="form-group row">
                            <label for="cuenta" class="col-sm-3 col-form-label" title="-Dato Obligatorio-">(*) Tipo de Cuenta</label>
                            <div class="col-sm-9">                          
                            <select id="tipo_cuenta" name="tipo_cuenta"class="form-control" required >
                                            <option value="0">Seleccione...</option>
                                            <option value="1" <?php if($datos_bancarios->tipo_cuenta=='1') echo 'selected';?>>CORRIENTE</option>
                                            <option value="2" <?php if($datos_bancarios->tipo_cuenta=='2') echo 'selected';?>>AHORRO</option>                                        
                                    </select>  
                            </div>
                            </div>
                        </td>
                        <td>
                         <div class="form-group row">
                            <label for="cuenta" class="col-sm-3 col-form-label" title="-Dato Obligatorio-">(*) Nombre de la Entidad Bancaria</label>
                            <div class="col-sm-9">   
                            <select id="nom_banco" name="nom_banco"class="form-control" required >
                            <option value="0">Seleccione...</option>                       
                            <option value="">Seleccione...</option>
                            <?Php foreach ($list_banco as $list_banco){
                                if($list_banco->id== $datos_bancarios->id_banco){
                                    echo "<option value='".$list_banco->id."' selected>".$list_banco->nombre."</option>";
                                 }else{

                                    echo "<option value='".$list_banco->id."'> ". $list_banco->nombre." </option>";  
                                 }
                            }
                            ?>
                      </select>
                  </div>
                  </div>
                        </td>
                        </tr>       
                 
              
                 

             
             <div class="col-md-3">                      
                <button type="submit" class="btn btn-primary">Registrar Cuenta Bancaria</button> 
            </div>                
              <!-- /.col -->
           
                
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
