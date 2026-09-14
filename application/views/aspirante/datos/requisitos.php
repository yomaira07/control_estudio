  <!-- Content Wrapper. Contains page content -->

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
    <!-- /.container-fluid -->
    </section>
 
    <!-- Main content -->
    <section class="content">
      
        <div class="card">   
            <div class="card-body">
            <div >
                      <h1 > <strong>Requisitos</strong></h1>               
                </div>
               
 <div class="card-header"> 
                  <img src="<?php echo base_url(); ?>assets/img/logo2.png"  width="100px" height="100px"/> 
                  <strong>En esta secci&oacute;n debe cargar los documentos exigidos para el registro como aspirante a cursar estudios en la ENFMP. </strong></h1>
                </div>
                <div class="card-header">
                      
                </div>
                <p >
                    <div >
                      <h3 class="card-title"><strong>Recomendaciones</strong></h3>   
                    </div>
                    <br>
                    <div class="frame3" >
                        Para ello se requiere lo siguiente:<br>               
                        <i class="far fa-check-circle"></i>
                        El archivo que va adjuntar  debe estar en cualquiera de los formatos exigidos como son: <b>*.JPG, *.JPEG, *.PNG., *.PDF</b>, de acuerdo a las exigencias de cada requisito.<br>
                              
                        <i class="far fa-check-circle"></i>
                        El tama&ntilde;o m&aacute;ximo permitido del archivo es de <b>1 MB (1024KB)</b>.<br>
                        
                            
                        <i class="far fa-check-circle"></i>
                        En caso de visualizar documentos en cada una de las secciones de requisitos, debe <b>actualizar o registrar</b> su información a fin de obtener un registro exitoso.
                    </div>
                </p>


                  <table align="center"  cellspanding="5" cellspacing="5" style="background:#f2f2fc;">
                    <tr>
                          <td align="center">
                          Te invitamos a utilizar la herramienta mas cómoda para ti, y que te permita encontrar el formato y tamaño deseado.

                          Hay diversas páginas web que de forma Online te permite realizar esos trabajos de manera sencilla.

                          ¡Animate! en utilizarlos.
                          Aquí solo te damos una opción para el manejo de los formatos de imagenes, descarga la guía rápida para el manejo de tus imagenes. <a href="<?php echo base_url();?>guia/guia_rapida_requisitos.pdf" target="_blank" title="Haz clic aqui y descarga la Guía Rápida para el manejo de imágenes" >
                          <img src="<?php echo base_url(); ?>assets/img/descargar1.png" alt="Descargar Guía"  width="80px" height="50px"/> 
                          </td>
                      </tr>
                  </table>  
                  <br>
                  <table align="center"  cellspanding="5" cellspacing="5" width="80%"  border="1px solid blue" >
                      <thead  >
                                    <tr>
                                      <th style="background:#E6E6FA;" ><img width="25px" height="25px" src="../assets/img/negativo.jpeg"/> Sin Cargar <br>
                                      <img width="25px" height="25px" src="../assets/img/positivo.jpeg"/> Cargado
                                      </th>
                                      <th  colspan="3"><div align="center">   <strong>Estatus de Carga de los Requisitos</strong></div></th>
                                      
                                    </tr>
                                    </thead>    
                                    <?php 
                                    $prog_seleccionado=explode(",",$aspirante->programa_id);
                                  // var_dump($prog_seleccionado);
                                    $especialidad=array(1,2,3,6,14,15,16,19,22,23,26);
                                    $maestrias=array(20,21,24,25,29,30);
                                    $doctorado= array(31);
                                    $forense= array(4,17);
                                    $criminalistica= array(5,18);
                                    //$postulado=$postulado;
                                    foreach($prog_seleccionado as $prog_seleccionado):
                                    if (in_array($prog_seleccionado,$especialidad))$tipo_req1=1;
                                    if (in_array($prog_seleccionado,$maestrias))$tipo_req2=2;
                                    if (in_array($prog_seleccionado,$doctorado))$tipo_req3=3;
                                    if (in_array($prog_seleccionado,$forense))$tipo_req4=4;
                                    if (in_array($prog_seleccionado,$criminalistica))$tipo_req5=5;
                                    endforeach;
                                    $check='<img width="25px" height="25px" src="../assets/img/negativo.jpeg"/>';
                                    $check2='<img width="25px" height="25px" src="../assets/img/negativo.jpeg"/>'; 
                                    $check3='<img width="25px" height="25px" src="../assets/img/negativo.jpeg"/>';
                                    $check4='<img width="25px" height="25px" src="../assets/img/negativo.jpeg"/>'; 
                                    $check5='<img width="25px" height="25px" src="../assets/img/negativo.jpeg"/>'; 
                                    $check6='<img width="25px" height="25px" src="../assets/img/negativo.jpeg"/>'; 
                                    $check7='<img width="25px" height="25px" src="../assets/img/negativo.jpeg"/>';
                                    $check8='<img width="25px" height="25px" src="../assets/img/negativo.jpeg"/>';
                                    $check9='<img width="25px" height="25px" src="../assets/img/negativo.jpeg"/>';
                                    $check10='<img width="25px" height="25px" src="../assets/img/negativo.jpeg"/>';
                                    $carga=0;
                                    $carga1=0;
                                    $carga2=0;
                                    $carga3=0;
                                    $carga4=0;
                                    $carga5=0;
                                    $carga6=0;
                                    $carga7=0;
                                    $carga8=0;
                                    $carga9=0;

                                    foreach($requisitos as $requisitos):?>
                                        <?php  if($requisitos->id_requisito==1): $carga=1; $check='<img width="25px" height="25px" src="../assets/img/positivo.jpeg"/>';// else:  $check='<img width="25px" height="25px" src="../assets/img/negativo.jpeg"/>';
                                      endif;?>
                                        <?php  if($requisitos->id_requisito==2): $carga1=1;$check2='<img width="25px" height="25px" src="../assets/img/positivo.jpeg"/>';// else:  $check2='<img width="25px" height="25px" src="../assets/img/negativo.jpeg"/>'; 
                                      endif;?>
                                        <?php  if($requisitos->id_requisito==3):  $carga2=1;$check3='<img width="25px" height="25px" src="../assets/img/positivo.jpeg"/>'; //else:  $check3='<img width="25px" height="25px" src="../assets/img/negativo.jpeg"/>';
                                      endif;?>
                                        <?php  if($requisitos->id_requisito==11): $carga3=1; $check4='<img width="25px" height="25px" src="../assets/img/positivo.jpeg"/>'; // else:  $check4='<img width="25px" height="25px" src="../assets/img/negativo.jpeg"/>'; 
                                      endif;?>
                                        <?php  if($requisitos->id_requisito==8):  $carga4=1;$check5='<img width="25px" height="25px" src="../assets/img/positivo.jpeg"/>'; // else:  $check5='<img width="25px" height="25px" src="../assets/img/negativo.jpeg"/>'; 
                                      endif;?>
                                        <?php  if($requisitos->id_requisito==9):  $carga5=1;$check6='<img width="25px" height="25px" src="../assets/img/positivo.jpeg"/>'; // else:  $check6='<img width="25px" height="25px" src="../assets/img/negativo.jpeg"/>'; 
                                      endif;?>
                                        <?php  if($requisitos->id_requisito==10): $carga6=1; $check7='<img width="25px" height="25px" src="../assets/img/positivo.jpeg"/>'; // else:  $check7='<img width="25px" height="25px" src="../assets/img/negativo.jpeg"/>';                  
                                      endif;?>
                                        <?php  if($requisitos->id_requisito==6):  $carga7=1;$check8='<img width="25px" height="25px" src="../assets/img/positivo.jpeg"/>'; // else:  $check8='<img width="25px" height="25px" src="../assets/img/negativo.jpeg"/>'; 
                                      endif;?>
                                       <?php  if($requisitos->id_requisito==19):  $carga8=1;$check10='<img width="25px" height="25px" src="../assets/img/positivo.jpeg"/>'; // else:  $check8='<img width="25px" height="25px" src="../assets/img/negativo.jpeg"/>'; 
                                      endif;?>
                                          <?php  if($requisitos->id_requisito==17):  $carga9=1;$check9='<img width="25px" height="25px" src="../assets/img/positivo.jpeg"/>'; // else:  $check8='<img width="25px" height="25px" src="../assets/img/negativo.jpeg"/>'; 
                                      endif;?>
                                    <?php endforeach;?>
                                        <tbody>
                                           <tr>                                
                                                <td align="center"> <?php echo $check;?> </td>
                                                <td align="center"> <?php   if($tipo_req1==1 or $tipo_req2==2 or $tipo_req3==3 or $tipo_req4==4 or $tipo_req5==5):?>
                                                  <span style="color: red;"><b>(*)</b></span><?php endif; ?>Cédula de Identidad</td>
                                                <?php if($carga==0):?>                               
                                                  <td align="center">                                 
                                                      <img src="<?php echo base_url(); ?>assets/img/icons8-Delete.png" width="25px" height="25px" />Sin Visualizaciones       
                                                  </td>
                                                  
                                                  <td align="center">
                                                    <a href="<?php echo base_url(); ?>dashboard08/datos3" class="nav-link">Cargar documento</a>
                                                  </td>  
                                                  <?php elseif($carga==1):
                                                ?>
                                                  <td align="center">     
                                                    <img src="<?php echo base_url(); ?>assets/img/icons8-Show Property.png" width="25px" height="25px"/>                               
                                                    <a href="<?php echo base_url(); ?>assets/cedulas/<?php echo $this->session->userdata('id')?>_cedula.jpg" target="_new" <?php if($carga==0): echo $disabled='disabled'; else: echo $disabled=''; endif;?> >Ver Documento  </a>
                                                  </td>
                                                
                                                  <td align="center">
                                                    <a href="<?php echo base_url(); ?>dashboard08/datos3" class="nav-link">Actualizar documento</a>
                                                  </td>     
                                                  <?php endif;?>                   
                                            </tr>
                                  
                                  
                                    
                                            <tr>
                                                  <td align="center">
                                                  <?php echo $check2;?></td>
                                                  <td align="center">  <?php if($tipo_req1==1 or $tipo_req2==2 or $tipo_req3==3  or $tipo_req4==4 or $tipo_req5==5):?> 
                                                    <span style="color: red;"><b>(*)</b></span><?php endif; ?>Fotografía
                                                  </td>
                                                  <?php if($carga1==0):?>
                                                  <td align="center">
                                                  <img src="<?php echo base_url(); ?>assets/img/icons8-Delete.png" width="25px" height="25px" />Sin Visualizaciones    
                                                  </td>
                                                  <td align="center">
                                                  <a href="<?php echo base_url(); ?>dashboard08/datos7" class="nav-link">Cargar documento</a>
                                                  </td>
                                                  <?php elseif($carga1==1):
                                                ?>
                                                  <td align="center">     
                                                    <img src="<?php echo base_url(); ?>assets/img/icons8-Show Property.png" width="25px" height="25px"/>                               
                                                    <a href="<?php echo base_url(); ?>assets/fotos/<?php echo $this->session->userdata('id')?>_foto.jpg" target="_new"  >Ver Documento  </a>
                                                    </td>                                    
                                                  <td align="center">
                                                  <a href="<?php echo base_url(); ?>dashboard08/datos7" class="nav-link">Actualizar documento</a>
                                                  </td>   
                                                  <?php endif;?>                      
                                            </tr>
                                      
                                      
                                                
                                         
                                          <tr><td colspan="4"><span style="color: red;"><b>(*)</b> Requisito Obligatorio</span></td></tr>
                                        
                    
                    </tbody>
                  </table>  
            </div><!-- /.card-body -->
        </div> <!-- /.card -->
                      <table  width="50%" align="center" border="1px">
                        <tr>
                          <td>
                            <div align="center" >  
                              <a href="<?php echo base_url();?>/dashboard08/proceso" title="Ir a Estatus del Proceso de Inscripción">
                              <img src="<?php echo base_url(); ?>assets/img/icons8-Todo List.png"  width="50px" height="50px"/>
                              Ver Estatus del Proceso de Inscripción en Línea del Aspirante </a>
                            </div> 
                          </td>
                        </tr>                    
                      </table>    
                    
    
    </section><!-- /.section-->
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

