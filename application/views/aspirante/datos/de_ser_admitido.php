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
                      <h3 class="card-title"><strong>Datos de Interés</strong></h3>
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
            <form action="<?php echo base_url()?>dashboard08/actualiza_de_ser_admitido/<?Php echo $this->session->userdata('id'); ?>" method="POST" name=carga >
            <script type="text/javascript">
function iniciar(){
  rd_experiencia();
}
    function rd_experiencia(valor){
      if(valor=="1"){
       
        document.getElementById('experiencia').hidden=false;      
        document.getElementById('experiencia').required=true;
       
       
      } else{
        document.getElementById('experiencia').required=false;   
        document.getElementById('experiencia').hidden=true;       
        document.getElementById('experiencia').value="";
     
      }    
  }
  function siguiente()
{ 
 location.href="inscripcion/";
}
  window.onload = iniciar();
  </script>
              <input type="hidden" name="id_usuario" value="<?Php echo $this->session->userdata('id'); ?>">
            <input type="hidden" name="no_encontrado" value="<?php if ($datos_admitido==false){echo "falso";}else{ echo $datos_admitido->id;  } 
                        ?>">
            
                  
                <input type="hidden" name="fecha_registro" value="<?php echo date('d-m-Y H:i:s'); ?>">
               
                <div class="form-group row">
                    <label for="trimestre" class="col-sm-3 col-form-label" title="-Dato Obligatorio-">(*) Experiencia relacionada con el programa de postgrado seleccionado</label>
                    <div class="col-sm-9">

                        <input type="radio" name="radio_experiencia" id="radio_experiencia" class="css-checkbox" value="1" onchange="javasript:rd_experiencia(this.value);" <?php if($datos_admitido->experiencia_postgrado ==1) echo "checked";?> required/><label>Si</label>
                        <div class="col-sm-5">
                        <input type="text" class="form-control" id="experiencia" name="experiencia" onkeyup="javascript:this.value=this.value.toUpperCase();"  value="<?php if ($datos_admitido==false){echo "";}else{ echo $datos_admitido->senale_experiencia;  } 
                        ?>" > 
                    </div>
                        <br>
                        <input type="radio" name="radio_experiencia" id="radio_experiencia" class="css-checkbox" value="2" onclick="javascript:rd_experiencia(this.value);" <?php if($datos_admitido->experiencia_postgrado ==2) echo "checked";?> required /><label>No</label>

                    </div>
                  </div>
                  
                   
                  
                  <div class="form-group row">
                  <label for="lbfortalezas" class="col-sm-2 col-form-label" title="-Dato Obligatorio-">(*) Señale tres (3) fortalezas que le caractericen </label>
                    <div class="col-sm-2">
                      <input type="text" class="form-control" id="fortalezas" name="fortalezas" onkeyup="javascript:this.value=this.value.toUpperCase();"  value="<?php if ($datos_admitido==false){echo "";}else{ echo $datos_admitido->fortalezas;  } 
                        ?>" required> 
                    </div>
                   
                   
                    <label for="lbpersonalidad" class="col-sm-2 col-form-label" title="-Dato Obligatorio-">(*) Señale tres (3) caracteristicas de su personalidad que considere pueda mejorar </label>
                    <div class="col-sm-2">
                      <input type="text" class="form-control" id="personalidad" name="personalidad" onkeyup="javascript:this.value=this.value.toUpperCase();"  value="<?php if ($datos_admitido==false){echo "";}else{ echo $datos_admitido->personalidad;  } 
                        ?>" required> 
                    </div>
                    
                  
                    </div>
                  </div>
                  

            <!-- fin formulario-->
           <div>
                  <button type="submit" class="btn btn-primary"  title="-Hacer clic para Registrar Datos-">Guardar</button>
            </div>
                
            </form>
      <br> <hr>
 <span ><b>(*) Dato Obligatorio</b></span>            
                </div><!-- /.card -->





    </section>
    <!-- /.content -->



  </div>
  <!-- /.content-wrapper -->
