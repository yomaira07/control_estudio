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
 location.href="/control_estudio/planilla/planilla_pre/"+id;
    
}

</script>
      <!-- /.card -->
        <form action="<?php echo base_url()?>dashboard04/inscripcion2" method="POST" >
              <div class="card card-primary card-outline">
                  <div class="card-body">
                      <div class="card">
          
                      <div align="center"><h1> <img src="<?php echo base_url(); ?>assets/img/logo2.png"  width="100px" height="100px"/>  <strong> Estatus del Proceso de Inscripción en Línea del Aspirante en la ENFMP. </strong> </h1>
                      </div>
                        


                 <table  class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th colspan="2"><strong>Proceso de Selección 2025-2026</strong> Período <?php echo $periodo->nombre;?>
                  </tr>
                  <tr>
                    <th></th>
                    <th align="center"> Estado </th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php //if(!empty($listado)):?>
                      <?php //foreach($listado as $listado):?>
                     
		<tr>

		<td>Actualización de Datos <a href="<?php echo base_url();?>dashboard08/inscripcion" title="Ir a Programas Inscritos"><img src="<?php echo base_url(); ?>assets/img/listado.png"  width="25px" height="25px"/>Ver Programas Inscritos</a></td>

			<td align="left"><?php 
if ($trabajo==false or $academico==false  or $direccion==false ) {
        echo "<img width='25px' height='25px'src='../assets/img/button_gray.png'> "; 
			
				            
			}else{
        echo "<img width='25px' height='25px'src='../assets/img/button_green.png'> ";?>
				
			<?php }
		?></td>
		</tr>                 
                  <tr>
                    <td>Registro de Pago    <?php if ($pago_aspirante == true) :
$pago=true;?><a href="<?php echo base_url()?>dashboard05/transferencia/<?php echo $this->session->userdata("id");?>"><img src="<?php echo base_url(); ?>assets/img/dinero.png"  width="25px" height="25px"/>Ver Pago</a><?php endif;?></td>
                    <td align="left">
                      
                      <?php 
                     if ($pago == true) {
                     echo "<img width='25px' height='25px'src='../assets/img/button_green.png'> ";
                   }else{
                    echo "<img width='25px' height='25px'src='../assets/img/button_gray.png'> ";?>
                   
                   <?php  }
                     ?></td>
                  </tr>
                  
            
                    <tr>
                    <td>Actualización y/o Registro de Requisitos <a href="<?php echo base_url();?>/dashboard08/requisitos" title="Ir a Estatus de Requisitos"><img src="<?php echo base_url(); ?>assets/img/icons8-Test Passed.png"  width="25px" height="25px"/>Ver Requisitos</a></td>

<td align="left"><?php 
if ($trabajo<>false or $academico<>false  or $direccion<>false ) {
  $cuenta=0;
  foreach($requisito as $requisito){

  If($requisito->id_requisito==1)$cuenta=$cuenta +1;
  If($requisito->id_requisito==2)$cuenta=$cuenta +1;
  //If($requisito->id_requisito==3)$cuenta=$cuenta +1;
  //If($requisito->id_requisito==8 AND in_array($this->session->userdata("programaid"),$programas=array(1,2,3,6,14,15,16,19,20,21,22,23,24,25,26,29,30,31) ))$cuenta=$cuenta +1;    

   
  }
  If($cuenta>=2){
  echo "<img width='25px' height='25px'src='../assets/img/button_green.png'> ";
  } else{
  echo "<img width='25px' height='25px'src='../assets/img/button_gray.png'> ";
echo "<h4><b>FALTA CONSIGNAR REQUISITOS</b></h4> RECUERDE CARGAR LOS REQUSITOS SOLICITADOS EN EL REGISTRO.<br> De lo contrario su inscripción como ASPIRANTE en el proceso de selección en curso QUEDARÁ SIN EFECTO. "; 
  }                  
}else{
  echo "<img width='25px' height='25px'src='../assets/img/button_gray.png'> "; 
}
?></td>
</tr> 
<tr>
              <td>Aprobación de Pago</td>
              <td align="left"><?php // echo $cuenta;
            if ($pago_aspirante == true and $cuenta>=2) { 
                if ($result_conciliado->conciliado == 1) {
                  echo "<img width='25px' height='25px'src='../assets/img/button_green.png'> ";
                }
                if ($result_conciliado->conciliado == 2) {
                  echo "<img width='25px' height='25px'src='../assets/img/button_red.jpeg'> " ."(Llamar o Enviar correo: tramitesecretaria.enfmp2023@gmail.com)" ;
                }if ($result_conciliado->conciliado == 0){
                echo "<img width='25px' height='25px'src='../assets/img/button_blue.jpg'> "; 
                }
            }else{
              echo "<img width='25px' height='25px'src='../assets/img/button_gray.png'> "; 
            }

              ?></td>
            </tr>
    
                   <tr>
                    <td>Revisión Documentos</td>
                    <td align="left"><?php 
                      if ($revision_documentos==true  ) {
                        if ($result_conciliado->academico== 1) {
                          echo "<img width='25px' height='25px'src='../assets/img/button_green.png'> <strong> REGISTRO APROBADO </strong>";
                        }
                      }else{
                          if($result_conciliado->conciliado == 1 and $cuenta>=3 ){
                              if ($result_conciliado->academico== 2) {
                          echo "<img width='25px' height='25px'src='../assets/img/button_red.jpeg'><strong> REGISTRO RECHAZADO </strong> " ."(Llamar o Enviar correo: tramitesecretaria.enfmp2023@gmail.com)" ;
                               }
                              if ($result_conciliado->academico== 0 ){
                              echo "<img width='25px' height='25px'src='../assets/img/button_blue.jpg'> "; 
                             }
                          }else{
                              echo "<img width='25px' height='25px'src='../assets/img/button_gray.png'> "; 
                          }
                  }   
                  
                    ?></td>
                  </tr>
                 
                  </tr>
                  <?php  if ($revision_documentos==true) {
                     if ($result_conciliado->academico== 1) { 
                     
                      ?>
                   <tr>
                    <td> Descargar Planilla(s) del Proceso de Selección</td>
                     <?php if(!empty($programa_aprobado)):?>
                         <td align="left">
<table>

                              <?php foreach ($programa_aprobado as $programa_aprobado):?>
<tr>
<td>
                             
                      
                            <img width="25px" height="25px" src="../assets/img/imprimir.png" onclick="imprimir(<?Php echo $programa_aprobado->id;?>)" title="Haz clic Para Visualizar la Planilla"><strong><?php echo $programa_aprobado->nombre; ?></strong>                         
       </td>   
</tr>          
                          <?php endforeach;?>

</table>
                            </td>
                  <?php endif;?>  
                  </tr>             
                  <?php }
                  }?>  
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

