  <!-- Content Wrapper. Contains page content -->

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
    <!-- /.container-fluid -->
    </section>

        <script type="text/javascript">

function iniciar(){
   borrar_valor();
}
 


   function borrar_valor(){

      if(document.getElementById('estudia').value=="2"){
        document.getElementById('nivel_cursa').value='';
        document.getElementById('titulo_obtener').value='';

       document.querySelector('#nivel_cursa').required = false;
       document.querySelector('#titulo_obtener').required = false;
      } else{
        if(document.getElementById('estudia').value=="1"){
         document.querySelector('#nivel_cursa').required = true;
       document.querySelector('#titulo_obtener').required = true;
       }
   }


      
  }
window.onload = iniciar();
</script>
<script language="javascript">


function siguiente()
{ 


 location.href="no_conducente";

}
</script>
    <!-- Main content -->
    <section class="content">

       <div class="card">
          
                    <div class="card-header">
                      <h3 class="card-title"><strong>Datos Académicos (Postgrados realizados) 
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
                      <?php  if ($this->session->flashdata("success")): ?>
                        <div class="alert alert-success">
                          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                          <p><i class="icon fa fa-check-square"></i> <?php echo $this->session->flashdata("success"); ?> </p>
                        </div>
                      <?php endif; ?>
                       <?php  if ($this->session->flashdata("warning")): ?>
                        <div class="alert alert-warning">
                          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                          <p><i class="icon fa fa-check-square"></i> <?php echo $this->session->flashdata("warning"); ?> </p>
                        </div>
                      <?php endif; ?>
                     
                        <!-- Fin Mensaje de Alerta-->
            <!-- Comienzo formulario -->
                
           <div class="card-body" style="color;grey;">
          
          <h4> ESTUDIO DE POSTGRADO </h4>
           <hr style="color;grey;">
           <form name="postgrado" method="POST" action="<?php echo base_url()?>dashboard08/actualizar_postgrado/<?Php echo $datos_academicos_post->id; ?>">                
           <input type="HIDDEN" name="id_academico" value="<?php if ($datos_academicos_post==false){echo "falso";}else{ echo $datos_academicos_post->id;  } 
                        ?>">  
           <input type="hidden" name="id_usuario" value="<?Php echo $this->session->userdata('id'); ?>">
           <input type="hidden" name="nivel_academico_post" value="2">
                   
                  <input type="hidden" name="id_academico" value="<?php if ($datos_academicos_post==false){echo "falso";}else{ echo $datos_academicos_post->id;  } 
                        ?>">
               
                <input type="hidden" name="fecha_actualizacion" value="<?php echo date('d-m-Y H:i:s'); ?>"><div class="row">
                      <div class="col-md-6">   
                        <div class="form-group">              
                        <label for="titulo" title="-Dato Obligatorio-">(*) Postgrado</label>
                            <input type="text" class="form-control" id="ult_titulo_post" placeholder="Indique el Titulo de Postgrado Obtenido" name="ult_titulo_post"  onkeyup="javascript:this.value=this.value.toUpperCase();" value="<?php if ($datos_academicos_post==false){echo "";}else{ echo $datos_academicos_post->titulo_obtener;  } 
                                ?>" required> 
                  
                      </div>    
                  
                    <div class="col-md-6">  
                      <div class="form-group">

                          <label for="institución" title="-Dato Obligatorio-">(*) Nombre de la casa de estudio donde obtuvo el titulo de Postgrado</label>
                              <input type="text" class="form-control" id="institucion_post" placeholder="Indique el Nombre de la casa de estudio donde obtuvo el titulo de postgrado "                             
                              name="institucion_post"  onkeyup="javascript:this.value=this.value.toUpperCase();" value="<?php if ($datos_academicos_post==false){echo "";}else{ echo $datos_academicos_post->institucion;  } 
                                  ?>" required>
                
                        
                           
                      </div>                      
                    </div>  
                     
                  <div aling="right" > <button type="submit" class="btn btn-primary" title="-Hacer clic para Registrar Datos-"> Actualizar Postgrado</button></div>   
                  </div> 
                
              </form>    
      <br> <hr>
 <span ><b>(*) Dato Obligatorio</b></span>           
              
          </div>
          
                </div><!-- /.card -->





    </section>

  
    <!-- /.content -->



  </div>
  <!-- /.content-wrapper -->
