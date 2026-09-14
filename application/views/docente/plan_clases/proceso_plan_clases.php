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
 location.href="/control_estudio/dashboard06/descargar_constancia_docente/"+id;
    
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
                <table  class="table table-bordered table-striped" width="50%">
                  <thead>
                  <tr>
                    <th>Nombre del Paso</th>
                    <th  colspan="2"> <div align="center">Estado</div> </th>
                  </tr>
                  </thead>
                  <tbody>
               
                  <tr>
                    <td>Matrícula de Estudiantes</td>
                    <td align="center" colspan="2"><?php 
                   if ($matricula==true ) {
                     echo "<img width='25px' height='25px'src='../assets/img/button_green.png'> ";
                   }else{
                    echo "<img width='25px' height='25px'src='../assets/img/button_gray.png'> "; 
                    }
                    ?></td>
                  </tr>
                    <?php if($matricula>0 ) :?>
                  <tr>
                    <td > Descargar Constancia de Participación Docente  </td>
                   
                          <?php if(!empty($unidades_curriculares)):?>        
                            <td align="center" style="font-size:10pt;">    
                                  <table>    <tr> 
                              <?php foreach ($unidades_curriculares as $unidades_curriculares):?>
                             
                                     <td>
                                        <img width="35px" height="35px" src="../assets/img/imprimir.png" onclick="imprimir(<?Php echo $unidades_curriculares->id;?>)" 
                                        title="Haz clic Para Visualizar la Planilla" align="center" ><br><strong>
                                          <?php echo $unidades_curriculares->programa_nombre.'<br>'. $unidades_curriculares->nombre; ?></strong>   
                                        </td></tr>
                                    
                              <?php 
                            endforeach;?>    </tr>
                             </table>
                              </td>     
                                    
                    <?php endif;?>
                    
                   </tr>   
                   <?php endif;?>                        
                   <tr>
                              <td >Registro Notas</td>
                              <td align="center" colspan="2"><?php 
                              if ($nota_final == true) {
                              echo "<img width='25px' height='25px'src='../assets/img/button_green.png'> ";
                              }else{
                              echo "<img width='25px' height='25px'src='../assets/img/button_gray.png'> ";
                             }
                              ?></td>
                              </tr>
                              <?php //  if ($revicion_academica==true) {
                              //  if ($revicion_academica->rev_academica== 1) { 

                              ?>
                             <!-- <tr>
                              <td> Descargar Plan de Clases y Evaluaciones   </td>
                              <?php// if(!empty($programa_aprobado)):?>
                             
                              <?php //foreach ($programa_aprobado as $programa_aprobado):?>
                               <td align="center" colspan="2" >
                              <img width="25px" height="25px" src="../assets/img/imprimir.png" onclick="imprimir(<?Php echo $programa_aprobado->id;?>)" title="Haz clic Para Visualizar la Planilla"><strong><?php echo $programa_aprobado->nombre; ?></strong>                         
                               </td>
                              <?php //endforeach;?>
                             
                              <?php// endif;?>  
                              </tr>             
                              <?php// }
                              //  }?>
                             <!-- <tr>
                              <td>Aprobación del Registro del Plan de Clases y Evaluaciones </td>
                              <td align="center" colspan="2"><?php 
                             // if ($pago == true) {
                             // if ($result_conciliado->conciliado == 1) {
                             // echo "<img width='25px' height='25px'src='../assets/img/button_green.png'> ";
                             // }
                             //if ($result_conciliado->conciliado == 2) {
                             //echo "<img width='25px' height='25px'src='../assets/img/button_red.jpeg'> " ."(Llamar o Enviar correo: tramitesecretaria.enfmp@gmail.com)" ;
                              //}if ($result_conciliado->conciliado == 0){
                            // echo "<img width='25px' height='25px'src='../assets/img/button_blue.jpg'> "; 
                          //    }
                              //}else{
                              //echo "<img width='25px' height='25px'src='../assets/img/button_gray.png'> "; 
                             // }

                              ?></td>
                              </tr>  
                              <tr>
                                <td> Descargar Plan de Clases y Evaluaciones Definitivo  </td>
                                <?php //if(!empty($programa_aprobado)):?>
                                <td align="center" colspan="2" >
                              <?php// foreach ($programa_aprobado as $programa_aprobado):?>
                                  <img width="25px" height="25px" src="../assets/img/imprimir.png" onclick="imprimir(<?Php echo $programa_aprobado->id;?>)" title="Haz clic Para Visualizar la Planilla"><strong><?php echo $programa_aprobado->nombre; ?></strong>                         

                                <?php //endforeach;?>
                              </td>
                              <?php// endif;?>  
                              </tr>-->
                             <!-- <tr>
                                <td align="left">Descargar Acta de Entrega</td>
                                <?php// if(!empty($programa_aprobado)):?>
                                <td align="center" colspan="2">
                                <?php// foreach ($programa_aprobado as $programa_aprobado):?>
                                <img width="25px" height="25px" src="../assets/img/imprimir.png" onclick="imprimir(<?Php echo $programa_aprobado->id;?>)" title="Haz clic Para Visualizar la Planilla"><strong><?php echo $programa_aprobado->nombre; ?></strong>                         
                                <?php// endforeach;?>
                                </td>
                              <?php //endif;?>  
                              </tr>  -->
                
                  
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
