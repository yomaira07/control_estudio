  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
    <!-- /.container-fluid -->
   
    </section>

    <!-- Main content -->
     <section class="content">
     <script type="text/javascript">
//<![CDATA[
function imprimir(id){
 location.href="/control_estudio/planilla/index/"+id;
    
}

</script>
      <!-- /.card -->
        <form action="<?php echo base_url()?>dashboard04/inscripcion2" method="POST" >
              <div class="card card-primary card-outline">
                  <div class="card-body">
                      <div class="card">
          
                          <div class="card-header" align="center">
                            <h3 class="card-title" ><strong>Estatus del Perfil Docente</strong></h3>
                            <br>
                          <br>
                          </div>


                          <div class="card-body">

                       <div></div>      
                 <table  class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Nombre del Paso</th>
                    <th align="center"> Estado </th>
                  </tr>
                  </thead>
                  <tbody>
               
                  <tr>
                    <td>Registro y Actualización de Datos</td>
                    <td align="left"><?php 
                   if ($actualizar==true ) {
                     echo "<img width='25px' height='25px'src='../assets/img/button_green.png'> ";
                   }else{
                    echo "<img width='25px' height='25px'src='../assets/img/button_gray.png'> "; 
                    }
                    ?></td>
                  </tr>
                  <tr>
                    <td>Registro y Actualización de Requisitos</td>
                    <td align="left"><?php 
                     if ($requisitos==true) {
                     echo "<img width='25px' height='25px'src='../assets/img/button_green.png'> ";
                   }else{
                    echo "<img width='25px' height='25px'src='../assets/img/button_gray.png'> ";
                    } 
                    ?></td>
                  </tr>
                  
                
                  
                  </tbody>
                </table>
<br>             
<div><strong>Leyenda</strong></div>
<br>
<div><img width='25px' height='25px'src="../assets/img/button_gray.png"> Sin Realizar <img width='25px' height='25px' src="../assets/img/button_blue.jpg"> En Proceso<img width='25px' height='25px' src="../assets/img/button_green.png">Procesado <img width='25px' height='25px' src="../assets/img/button_red.jpeg"> Error</div>


  <div ><input type="hidden" name="str" id="str"></div>
  <br>
 
       </form>                       
                      </div><!-- /.card --> 
                  </div><!-- /.card-body -->
              </div><!-- /.card card-primary card-outline -->

        <!-- /.card-body -->

      <!-- /.card card-primary card-outline -->

      </section><!-- /.section-->
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
