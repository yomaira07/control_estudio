  <!-- Content Wrapper. Contains page content -->

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
    <!-- /.container-fluid -->
    </section>
 
    <!-- Main content -->
    <section class="content">
    <style>@page {
          margin-top: 1.0cm;
          margin-bottom: 0.5cm;
          margin-left: 1.0cm;
          margin-right: 1.0cm;
      }
       .pie{
          background-color: #DCDCDC;
          position: fixed;
          bottom: 0;
          height: 30px;
          width: 100%;
          font-size: 8px;  
          font-family:'Arial';
          align-content: justify;
      }
        table{
          border-collapse: collapse;  
          font-style: normal; 
          font-weight: normal;  
          font-size: 10px;  
          font-family:'Arial';
          align-content: justify;
        }
        .page_break {
           page-break-before: always;
        }

</style>  

       <div class="card">
       <table width="100%" align="center"   border="0"  cellPadding="2" cellSpacing="1" style=" font-size:8pt; font-family:'Lucida Grande', 'Lucida Sans Unicode', 'Lucida Sans', 'DejaVu Sans', Verdana, sans-serif" >  
            <tr >
              <td colspan="3" height="60" align="left">       <img src="<?php echo base_url(); ?>assets/img/logo1.png" 
              style="width: 25mm; height:25mm; margin: 0;" />  
              </td>         
              <td colspan="3"  height="80" align="center" >  República Bolivariana de Venezuela<br>Ministerio Público<br>Escuela Nacional de Fiscales del Ministerio Público<br>
              Dirección de Secretaría General 
              </td>
              </td> 
              <td colspan="3" height="60" align="right" > <img  src="/control_estudio/assets/img/logo2.png"   style="width: 25mm; height: 25mm; margin: 0;"/>       </td>
            </tr>
          </table>
          <table width="100%" align="center"   border="0"  cellPadding="2" cellSpacing="1" style=" font-size:8pt; font-family:'Lucida Grande', 'Lucida Sans Unicode', 'Lucida Sans', 'DejaVu Sans', Verdana, sans-serif">
          <tr > 
          <td colspan="8" height="40"> 
          </td>
          </tr>
                
          <tr>
          <td  colspan="8" height="40">
          </td>
          </tr>
         
          </table>  
                    <div class="card-header">
                       <h3 class="card-title" align="center"><strong>Cláusula de Compromiso</strong></h3>
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
                <form action="#" method="POST" >
                  <input type="hidden" name="id_usuario" value="<?Php echo $this->session->userdata('id'); ?>">
                  <input type="hidden" name="id" value="<?php if ($datos_alumnos==false){echo "falso";}else{ echo $datos_alumnos->id;  } 
                        ?>">
                 <input type="hidden" name="no_encontrado" value="<?php if ($datos_alumnos==false){echo "falso";}else{ echo $datos_alumnos->id;  } 
                        ?>"> 
                <input type="hidden" name="fecha_actualizacion" value="<?php echo date('d-m-Y H:i:s'); ?>">
               <?php foreach($clausula  as $clausula): 
                                $acepto=$clausula->feha_registro.' Periodo Académico: '.$periodo->nombre;
                      endforeach?>

                <div class="row" align="justify"  style=" font-size:10pt; font-family:'Lucida Grande', 'Lucida Sans Unicode', 'Lucida Sans', 'DejaVu Sans', Verdana, sans-serif">
                    <div class="col-md-12">
                    <div class="col-md-12">
                    <p>   Se acuerda suscribir la presente Cláusula Compromisoria entre el o la estudiante , <b><?php echo $datos_alumnos->nombre_primer.' '. $datos_alumnos->nombre_segundo.' '.$datos_alumnos->apellido_primer.' '.$datos_alumnos->apellido_segundo; ?></b> titular de la Cédula de Identidad Nº V-<b><?php echo number_format($datos_alumnos->cedula,0,'', '.');?></b> ,
                      aspirante a cursar las siguientes unidades curriculares:   </p>                 
                     
                    </div>
                </div>
                <div class="row">
                <div class="col">
                    <div class="collapse multi-collapse" id="multiCollapseExample1">
                    <div class="card card-body">                     
                <div class="row">
                <div class="col">
                  
                    <div class="card card-body">
                    <div align ="center" > 
                      <table width="60%" border="1"  align="center" style=" font-size:10pt; font-family:'Lucida Grande', 'Lucida Sans Unicode', 'Lucida Sans', 'DejaVu Sans', Verdana, sans-serif">  
                        <tr bgcolor="#D0E0F4" color="#1060C8" aling ="center">
                          <th ><div align ="center">ESPECIALIZACIÓN</div></th>
                          <th ><div align ="center">TRIMESTRE</div></th>
                          <th  ><div align ="center">UNIDAD CURRICULAR</div></th>    
                          <th  ><div align ="center">DÍA DE CLASES</div></th>                            
                        </tr>
                        <?php 
                        foreach($materiasTG as $materias){ 
                        //  if($materias->modalidad==4){
                          ?>
                        <tr>
                            <td  align ="center" ><?php echo $materias->programa;?></td>
                            <td  align ="center" ><?php echo $materias->trimestre;?></td>
                            <td   align ="center"><div align ="center"><?php echo $materias->unidad_curricular;?></td>   
                            <td  align ="center"><div><?php if($materias->id_dia_clase>=1 and $materias->id_dia_clase<=5 or $materias->id_dia_clase==8  ) echo "Semanal"; elseif($materias->id_dia_clase>=6 and $materias->id_dia_clase<=7) echo "Sabatino"; ?></div></td>
                                        
                        </tr>   
                       <?php //}
                      }?>
                       </table>
                  </div>
            </b>               
                    <p aling="justify">  <img src="<?php echo base_url(); ?>assets/img/teg.png" 
                    style="width: 15mm; height: 15mm; margin: 0;" title="CLAÚSULA TEG O TG"/>
                   
                                y la Escuela Nacional de Fiscales del Ministerio Público, donde se establece que:
                                <p> <b>1.</b> Si estando en el ejercicio de sus funciones como fiscal, funcionario o funcionaria, empleado o empleada del Ministerio Público resulta ser objeto de retiro, remoción, cese de comisión de servicio o renuncia, durante su régimen de permanencia en esta Institución, el o la estudiante reconoce, acepta y acuerda abandonar su asistencia académica total y de forma inmediata, a los grupos de WhatsApp y Google Classroom, en los que se impartan las unidades curriculares respectivas a la malla curricular establecida para el mencionado postgrado, asumiendo que no puede continuar sus estudios en la ENFMP.</p>
                                <p> <b>2.</b> Tiene <b>conocimiento instrumental</b> de recursos como correo electrónico <b>GMAIL, teléfono con aplicación WhatsApp, Classroom, Google Meet, formularios en Google Forms</b> (recursos y aplicaciones que conoce su funcionalidad y comprende que sirven como medio instruccional para escuchar, visualizar, transmitir contenido y adjuntar documentos según lo solicite el o la docente).</p>
                                <p> <b>3.</b> Como miembro responsable de la ENFMP, <b>respetará a las y los docentes, autoridades y personal administrativo y obrero que forma parte de esta casa de estudios, </b>dejando claro que el Reglamento Interno de Estudios de la Escuela Nacional de Fiscales del Ministerio Público  <b>sanciona</b> cualquier actitud que vulnere a quienes forman parte de la comunidad académica y es <b>motivo de retiro.</b></p>
                                <p> <b>4.</b> <b>Acatará los acuerdos entre docente y grupo de clases,</b> en relación al desarrollo de las actividades académicas y las estrategias evaluativas a utilizar, dejando explícitamente establecido que queda a criterio de cada docente proporcionar la alternativa de recuperar alguna evaluación y las normas que regirán su desarrollo, teniendo autonomía para tomar tal decisión. </b></p>
                                <p> <b>5.</b> Seguirá los canales regulares de comunicación establecidos por la ENFMP, siendo el horario de atención de lunes a viernes de 8:00 a.m. a 4:00 p.m., a través de medios electrónicos o entornos virtuales. </b></p>
                                <p> <b>6.</b> <b>Actuará con la moral y ética que exige toda actividad académica, </b>siguiendo los lineamientos de la ENFMP, su metodología de estudio, normas de redacción, originalidad en las ideas que exprese y reconociendo la autoría de cualquier material de referencia que permita expresar las ideas que se soliciten en alguna actividad participativa o evaluativa, comprendiendo que<b> el plagio académico es motivo de retiro en cualquier momento del postgrado.</b> </b></p>
                                <p> <b>7.</b> Atender a las observaciones realizadas por cualquier miembro del jurado evaluador a medida que se vayan produciendo, así como recibir las recomendaciones y realizar las medidas necesarias para la corrección de las deficiencias observadas en su proceso de aprendizaje.</p>
                                <p> <b>8.</b> Conoce que el <b>Trabajo Especial de Grado o Trabajo de Grado </b> será evaluado por cada miembro del jurado evaluador con la escala de calificaciones que va desde uno (01) a veinte (20) puntos, ambas inclusive y que para aprobar se requiere obtener la calificación definitiva mínima de quince (15) puntos.</p>
                                <p> <b>9.</b> Conoce que si cursa simultáneamente dos o más programas de postgrado y sea reprobada o reprobado por incurrir en plagio en el Trabajo Especial de Grado, será aplicado el Retiro de Matrícula de los demás, por causales académicas. </p>
                                <p> <b>10.</b> <b>Es responsable de la veracidad de la información suministrada </b> y asume las implicaciones que se pudieran derivar de proporcionar datos falsos o erróneos: <b>Cada estudiante es responsable de la información que coloca en este registro.</b>
                                <p>Asimismo, reconoce, aceptó y acordó el o la estudiante <b><?php echo $datos_alumnos->nombre_primer.' '. $datos_alumnos->nombre_segundo.' '.$datos_alumnos->apellido_primer.' '.$datos_alumnos->apellido_segundo; ?></b> titular de la Cédula de Identidad Nº V-<b><?php echo number_format($datos_alumnos->cedula,0,'', '.');?> </b>que, la Escuela Nacional de Fiscales del Ministerio Público, queda exonerada de indemnizarle en forma alguna o de cualquier intento de demanda civil o penal, lo que no implica en modo alguno menoscabo de su derecho a la defensa, establecido en el artículo 49, numeral 2 de la Constitución de la República Bolivariana de Venezuela.</p>
                                <div align="center" >
                                
                                  <p align="center" >Aceptó los términos y condiciones <b>CLAUSULA COMPROMISO DE TEG ó TG</b> en fecha y hora <?php echo $acepto;?>
                                  </p>
                                 
                                </div>                    
                        </div>                   
                        </div>
                    </div>
                </div>
              
                
             
               
            </form>                
          </div>
                </div><!-- /.card -->





    </section>
    <!-- /.content -->



  </div>
  <!-- /.content-wrapper -->
