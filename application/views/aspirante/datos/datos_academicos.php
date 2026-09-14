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


 location.href="datos2";

}
</script>
    <!-- Main content -->
    <section class="content">

       <div class="card">
          
                    <div class="card-header">
                      <h3 class="card-title"><strong>Datos Académicos Culminados del Aspirante 
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
                <form action="<?php echo base_url()?>dashboard08/registrar_pregrado/<?Php echo $this->session->userdata('id'); ?>" method="POST" >
                  <input type="hidden" name="id_usuario" value="<?Php echo $this->session->userdata('id'); ?>">
                
                  <input type="hidden" name="id_academico" value="<?php if ($datos_academicos_pre==false){echo "falso";}else{ echo $datos_academicos_pre->id;  } 
                        ?>">
                 <input type="hidden" name="no_encontrado" value="<?php if ($datos_academicos_pre==false){echo "falso";}else{ echo $datos_academicos_pre->id;  } 
                        ?>"> 
                <input type="hidden" name="fecha_actualizacion" value="<?php echo date('d-m-Y H:i:s'); ?>">
                <input type="hidden" name="nivel_academico" value="1">
              
                <h4> ESTUDIOS DE PREGRADO </h4>
                <hr style="color;grey;">
              <div class="row">
                <div class="col-md-6">   
                  <div class="form-group">              
                  <label for="titulo" title="-Dato Obligatorio-">(*) Carrera Pregrado</label>
                      <input type="text" class="form-control" id="carrera_pre" placeholder="Indique la carrera de pregrado obtenida" name="carrera_pre"  onkeyup="javascript:this.value=this.value.toUpperCase();" value="<?php if ($datos_academicos_pre==false){echo "";}else{ echo $datos_academicos_pre->ult_titulo;  } 
                          ?>" required> 
                 
                
                  </div>
                </div>     
             
              <div class="col-md-6">  
                  <div class="form-group">

                  <label for="institución" title="-Dato Obligatorio-">(*) Nombre de la casa de estudio donde obtuvo el titulo de Pregrado</label>
                      <input type="text" class="form-control" id="institucion_pre" placeholder="Indique el Nombre de la casa de estudio donde obtuvo el titulo " name="institucion_pre"  onkeyup="javascript:this.value=this.value.toUpperCase();" value="<?php if ($datos_academicos_pre==false){echo "";}else{ echo $datos_academicos_pre->institucion;  } 
                          ?>" required>
        
                 
                  
                  </div>
                
              </div>  
            </div>               
               <div aling="center"><button type="submit" class="btn btn-primary"  title="-Hacer clic para Registrar Datos-"> Registrar Pregrado</button></div>   
               
           </form>
                   
          
           </div>
           <div class="card-body" style="color;grey;">
            <!-- Mensaje de Alerta-->
            <?php  if ($this->session->flashdata("error_a")): ?>
                        <div class="alert alert-danger alert-dismissible">
                          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                          <p><i class="icon fa fa-ban"></i> <?php echo $this->session->flashdata("error_a"); ?> </p>
                        </div>
                         <?php endif; ?>
                      <?php  if ($this->session->flashdata("success_a")): ?>
                        <div class="alert alert-success">
                          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                          <p><i class="icon fa fa-check-square"></i> <?php echo $this->session->flashdata("success_a"); ?> </p>
                        </div>
                      <?php endif; ?>
                       <?php  if ($this->session->flashdata("warning_a")): ?>
                        <div class="alert alert-warning">
                          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                          <p><i class="icon fa fa-check-square"></i> <?php echo $this->session->flashdata("warning_a"); ?> </p>
                        </div>
                      <?php endif; ?>
                     
                        <!-- Fin Mensaje de Alerta-->
          <h4> ESTUDIO DE POSTGRADO </h4>
           <hr style="color;grey;">
           <form name="postgrado" method="POST" action="<?php echo base_url()?>dashboard08/registrar_postgrado/<?Php echo $this->session->userdata('id'); ?>">                
           <input type="hidden" name="id_academico" value="<?php if ($datos_academicos_post==false){echo "falso";}else{ echo $datos_academicos_post->id;  } 
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
                     
                  <div aling="right" > <button type="submit" class="btn btn-primary" title="-Hacer clic para Registrar Datos-"> (+) Registrar Postgrado</button></div>   
                  </div> 
                  <div class="table-responsive">
                        <table id="example" class="table table-striped table-bordered" style="width:100%"> 
                                    <thead>  
                                        <tr>
                                            <th>Postgrado</th>
                                            <th>Casa de Estudio</th>
                                            <th>Año de Ingreso</th>
                                            <th>Año de Graduación</th>
                                            <th>Tema de trabajo de grado</th>                              
                                            <th>Opción</th>
                                          
                                        </tr>
                                    </thead>  
                                    <tbody>    
                                             <?php foreach($datos_academicos_post as $datos_academicos_post){?>                                     
                                        <tr>                                                    
                                                <td><?php echo $datos_academicos_post->ult_titulo;?></td>
                                                <td><?php echo $datos_academicos_post->institucion;?></td>
                                                <td><?php echo $datos_academicos_post->anno_ingreso;?></td>
                                                <td><?php echo $datos_academicos_post->anno_graduacion;?></td>
                                                <td><?php echo $datos_academicos_post->tema_grado;?></td>
                                                <td><a href="<?php echo base_url()?>dashboard08/academico_post_edit/<?php echo $datos_academicos_post->id; ?>" ><img src="../assets/img/icons8-Edit Property.png" ></a>
                                                <a href="<?php echo base_url()?>dashboard08/postgrado_eliminar/<?php echo $datos_academicos_post->id; ?>" ><img src="../assets/img/icons8-Delete.png" title ="Eliminar Registro"></a>
                                              </td>
                                                                                                      
                                            </tr>
                                              <?php } ?>
                                    </tbody>                      
                                    <tfoot>
                                        <tr>
                                            <th>Postgrado</th>
                                            <th>Casa de Estudio</th>
                                            <th>Año de Ingreso</th>
                                            <th>Año de Graduación</th>
                                            <th>Tema de trabajo de grado</th>                              
                                            <th>Opción</th>
                                            
                                        </tr>
                                    </tfoot>
                        </table>
              </form>    
            
              <div align="center">
    <input type="button" name="btnSeguiente" value="Siguiente" class="boton btn btn-info" onClick="siguiente();">
  </div> 
   <br> <hr>
 <span ><b>(*) Dato Obligatorio</b></span>      
          </div>
          
                </div><!-- /.card -->





    </section>

  
    <!-- /.content -->



  </div>
  <!-- /.content-wrapper -->
