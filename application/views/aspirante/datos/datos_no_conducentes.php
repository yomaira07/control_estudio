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
                      <h3 class="card-title"><strong>Estudios No Conducentes a Grado del Aspirante 
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
                <form action="<?php echo base_url()?>dashboard08/registrar_no_conducente/<?Php echo $this->session->userdata('id'); ?>" method="POST" >
                  <input type="hidden" name="id_usuario" value="<?Php echo $this->session->userdata('id'); ?>">
                  
                     
                  
                  <input type="hidden" name="id_academico" value="<?php if ($datos_academicos==false){echo "falso";}else{ echo $datos_academicos->id;  } 
                        ?>">
               
                <input type="hidden" name="fecha_actualizacion" value="<?php echo date('d-m-Y H:i:s'); ?>">
              
         
          
          <h4> CURSOS, TALLERES, DIPLOMADOS (realizados en los últimos cinco años) </h4>
           <hr style="color;grey;">
         
                  <div class="row">                                     
                    <div class="col-md-3">  
                        <div class="form-group">
                            <label for="institución" title="-Dato Obligatorio-">(*) Nombre del Estudio realizado</label>
                              <input type="text" class="form-control" id="estudio_realizado" placeholder="Indique el Nombre del estudio realizado "                             
                              name="estudio_realizado"  onkeyup="javascript:this.value=this.value.toUpperCase();" value="<?php if ($datos_academicos==false){echo "";}else{ echo $datos_academicos->institucion;  } 
                                  ?>" required> 
                        </div>    
                        <div class="form-group">
                            <label for="año_pregrado" title="-Dato Obligatorio-">(*)  Nombre de la institución donde obtuvo su certificación</label>
                            <input type="text" class="form-control" size="10" id="instituto" placeholder="" name="instituto"  onkeyup="javascript:this.value=this.value.toUpperCase();" value="<?php if ($datos_academicos==false){echo "";}else{ echo $datos_academicos->institucion;  } 
                                ?>" required>
                        </div>    
                        <div class="form-group">
                          <label for="titulo" title="-Dato Obligatorio-">(*) Año en que realizó el estudio</label>
                              <input type="number" class="form-control" id="anno_realizado" placeholder="Indique el año en que realizó el estudio" name="anno_realizado"  onkeyup="javascript:this.value=this.value.toUpperCase();" value="<?php if ($datos_academicos==false){echo "";}else{ echo $datos_academicos->ult_titulo;  } 
                                  ?>" required>
                        </div>                      
                        </div>
                    </div>             
                           <div aling="right" > <button type="submit" class="btn btn-primary" title="-Hacer clic para Registrar Datos-"> (+) Registrar Estudio</button></div>   
                  </div> 

                  <div class="table-responsive">
                        <table id="example" class="table table-striped table-bordered" style="width:100%"> 
                                    <thead>  
                                        <tr>
                                            <th>Nombre</th>
                                            <th>Institución</th>
                                            <th>Año </th>                                                                         
                                            <th>Opción</th>
                                          
                                        </tr>
                                    </thead>  
                                    <tbody>      
                                      <?php foreach($datos_academicos as $datos_academicos){?>
                                        <tr>                                                    
                                                <td><?php echo $datos_academicos->estudio_realizado;?></td>
                                                <td><?php echo $datos_academicos->institucion;?></td>
                                                <td><?php echo $datos_academicos->anno_realizado;?></td>
                                                <td><a href="<?php echo base_url()?>dashboard08/no_conducente_edit/<?php echo $datos_academicos->id; ?>" ><img src="../assets/img/icons8-Edit Property.png" title ="Editar Registro"></a>
                                                <a href="<?php echo base_url()?>dashboard08/no_conducente_eliminar/<?php echo $datos_academicos->id; ?>" ><img src="../assets/img/icons8-Delete.png" title ="Eliminar Registro"></a>
                                              </td>                                                                                    
                                                                                                      
                                            </tr>
                                  <?php } ?>
                                    </tbody>                      
                                    <tfoot>
                                        <tr>
                                        <th>Nombre</th>
                                            <th>Institución</th>
                                            <th>Año </th>                                                                         
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
