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
 
    <!-- Main content -->
    <section class="content">

       <div class="card">
          
                    <div class="card-header">
                      <h3 class="card-title"><strong>Datos Académicos del Docente
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
                <form action="<?php echo base_url()?>dashboard06/actualizar_datos_academicos/<?Php echo $this->session->userdata('id'); ?>" method="POST" >
                  <input type="hidden" name="id_usuario" value="<?Php echo $this->session->userdata('id'); ?>">
                   <input type="hidden" name="id_docente" value="<?php if ($datos_docente==false){echo "falso";}else{ echo $datos_docente->id;  } 
                        ?>">
                  <input type="hidden" name="id_academico" value="<?php if ($datos_academicos==false){echo "falso";}else{ echo $datos_academicos->id;  } 
                        ?>">
                 <input type="hidden" name="no_encontrado" value="<?php if ($datos_academicos==false){echo "falso";}else{ echo $datos_academicos->id;  } 
                        ?>"> 
                <input type="hidden" name="fecha_actualizacion" value="<?php echo date('d-m-Y H:i:s'); ?>">
            <div class="row">
              <div class="col-md-6">
                 <div class="form-group">
                    <label for="gradoacademico" title="-Dato Obligatorio-">(*) Último Grado Académico Obtenido</label>
                     
                       <select name="nivel_academico" class="form-control" >
                      <option value="">Seleccione...</option>
                     <?php
                        foreach ($nivel_academico as $nivel_academico){

                          if($nivel_academico->id== $datos_docente->id_nivel_academico){
                     
                          echo "<option value='".$nivel_academico->id."' selected>".$nivel_academico->descripcion."</option>";
                             }else{
                    
                            echo "<option value='".$nivel_academico->id."'>".$nivel_academico->descripcion."</option>";  
                          }
                        }
                        ?>
                      </select>
                    <label for="titulo" title="-Dato Obligatorio-">(*) Titulo de Pregrado o Posgrado/Especialización/Maestría/Doctorado Obtenido</label>
                    <input type="text" class="form-control" id="ult_titulo" placeholder="Indique el Titulo Obtenido" name="ult_titulo"  onkeyup="javascript:this.value=this.value.toUpperCase();" value="<?php if ($datos_academicos==false){echo "";}else{ echo $datos_academicos->ult_titulo;  } 
                        ?>" required>
                  </div>
                  <div class="form-group">
                    <label for="institución" title="-Dato Obligatorio-">(*) Nombre de la casa de estudio donde obtuvo el titulo de Pregrado o Posgrado/Especialización/Maestría/Doctorado Obtenido</label>
                    <input type="text" class="form-control" id="institucion" placeholder="Indique el Nombre de la casa de estudio donde obtuvo el titulo " name="institucion"  onkeyup="javascript:this.value=this.value.toUpperCase();" value="<?php if ($datos_academicos==false){echo "";}else{ echo $datos_academicos->institucion;  } 
                        ?>" required>
                  </div>

                  <div class="form-group">
                    <label for="estudia" title="-Dato Obligatorio-">(*) ¿Estudia Actualmente?  <?php echo $datos_academicos->estudia;?></label>                  
                       <select class="form-control" name="estudia" id="estudia" onchange="borrar_valor();" required>
                             <option value="0"  >Seleccione...</option>
                                                           <option value="1" <?php  if($datos_academicos->estudia=='1') echo " selected";?> >SI</option>
                              <option value="2" <?php  if($datos_academicos->estudia=='2') echo " selected";?> >NO</option>
                            </select>              
                      
                    </div>
               
                  <div class="form-group">
                    <label for="nivel" title="-Dato Obligatorio-">Nivel que cursa</label>
                        <input type="text" class="form-control" id="nivel_cursa" placeholder="Indique el Nivel que estudia actualmente " name="nivel_cursa" 
                        onkeyup="javascript:this.value=this.value.toUpperCase();" value="<?php if ($datos_academicos==false ){echo "";}else{ echo $datos_academicos->nivel_cursa;  } 
                        ?>" >     
                  </div>
                 <div class="form-group">
                    <label for="titulo_obtener" title="-Dato Obligatorio-">Titulo a Obtener</label>
                    <input type="text" class="form-control" id="titulo_obtener" placeholder="Indique el Nombre del Título a obtener unas vez culminado sus estudios " name="titulo_obtener"  onkeyup="javascript:this.value=this.value.toUpperCase();" value="<?php if ($datos_academicos==false){echo "";}else{ echo $datos_academicos->titulo_obtener;  } 
                        ?>" >
                  </div>             
                 
              <br>   
               
                <div><button type="submit" class="btn btn-primary"  title="-Hacer clic para Registrar Datos-"> Guardar</button></div>
                

                </div>
              <!-- /.col -->
            </div>

                  
                
            </form>
                
          </div>
                </div><!-- /.card -->





    </section>

  
    <!-- /.content -->



  </div>
  <!-- /.content-wrapper -->