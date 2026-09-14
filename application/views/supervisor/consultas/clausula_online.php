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
          
                    <div class="card-header">
                      <h3 class="card-title"><strong>Cláusula de Compromiso</strong></h3>
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
                                $acepto=$clausula->feha_registro.' Período Académico: '.$periodo->nombre;
                      endforeach?>

                <div class="row" align="justify">
                    <div class="col-md-12">
                      <h5>  Se acuerda suscribir la presente Cláusula Compromisoria entre el o la estudiante , <b><?php echo $datos_alumnos->nombre_primer.' '. $datos_alumnos->nombre_segundo.' '.$datos_alumnos->apellido_primer.' '.$datos_alumnos->apellido_segundo; ?></b> titular de la Cédula de Identidad Nº V-<b><?php echo number_format($datos_alumnos->cedula,0,'', '.');?></b> ,
                      aspirante a cursar las siguientes unidades curriculares:                    
                      </h5>
                    </div>
                </div>
                <div class="row">
                <div class="col">
                    <div class="collapse multi-collapse" id="multiCollapseExample1">
                    <div class="card card-body">
                        
                 
                   <div align ="center" > 
                      <table width="60%" border="1" style=" font-size:12pt; font-family:'Lucida Grande', 'Lucida Sans Unicode', 'Lucida Sans', 'DejaVu Sans', Verdana, sans-serif">  
                        <tr bgcolor="#D0E0F4" color="#1060C8" aling ="center">
                          <th ><div align ="center">ESPECIALIZACIÓN</div></th>
                          <th ><div align ="center">TRIMESTRE</div></th>
                          <th  ><div align ="center">UNIDAD CURRICULAR</div></th>  
                          <th  ><div align ="center">DÏA DE CLASE</div></th>
                               
                        </tr>
                        <?php 
                        foreach($materiasP as $materias){ 
                          if($materias->modalidad==1){                           ?>
                        <tr>
                            <td  align ="center" ><?php echo $materias->programa;?></td>
                            <td  align ="center" ><?php echo $materias->trimestre;?></td>
                            <td   align ="center"><div align ="center"><?php echo $materias->unidad_curricular;?></td>    
                            <td  align ="center"><div><?php if($materias->id_dia_clase>=1 and $materias->id_dia_clase<=5 or $materias->id_dia_clase==8  ) echo "Semanal"; elseif($materias->id_dia_clase>=6 and $materias->id_dia_clase<=7) echo "Sabatino"; ?></div></td>
                              
                        </tr>   
                       <?php }
                      }?>
                       </table>
                  </div>
                  </b>          
            <p aling="justify">   <img src="<?php echo base_url(); ?>assets/img/presencial.jpeg" title="MODALIDAD PRESENCIAL"
                    style="width: 15mm; height: 15mm; margin: 0;"/> y la Escuela Nacional de Fiscales del Ministerio Público, donde se establece que:</p>
                                <p> <b>1.</b> Si estando en el ejercicio de sus funciones como fiscal, funcionario o funcionaria, empleado o empleada del Ministerio Público resulta ser objeto de retiro, remoción, cese de comisión de servicio o renuncia, durante su régimen de permanencia en esta Institución, el o la estudiante reconoce, acepta y acuerda abandonar su asistencia académica total y de forma inmediata en el mencionado programa de postgrado, asumiendo que no puede continuar sus estudios en la ENFMP.</p>
                                <p> <b>2.</b> Acepta que este trimestre será en todo su desarrollo <b>bajo  MODALIDAD PRESENCIAL</b> y se apegará al horario de clases establecido por la ENFMP</p>
                                <p> <b>3.</b> Conoce que la <b>participación activa</b> será evaluada en cada encuentro académico y tendrá una ponderación en el plan de evaluación.</p>
                                <p> <b>4.</b> Como miembro responsable de la ENFMP,<b> respetará a las y los docentes, autoridades y personal administrativo que forma parte de esta casa de estudios,</b> dejando claro que el Reglamento Interno de Estudios de la Escuela Nacional de Fiscales del Ministerio Público <b>sanciona</b>cualquier actitud que vulnere a quienes forman parte de la comunidad académica y es<b> motivo de retiro.</p>
                                <p> <b>5.</b> Acatará los acuerdos entre docente y grupo de clases,</b> en relación al desarrollo de las actividades académicas y las estrategias evaluativas a utilizar, dejando explícitamente establecido que queda a criterio de cada docente proporcionar la alternativa de recuperar alguna evaluación y las normas que regirán su desarrollo, teniendo autonomía para tomar tal decisión. </p>
                                <p> <b>6.</b> Seguirá los canales regulares de comunicación establecidos por la ENFMP, siendo el horario de atención de lunes a viernes de 8:00 a.m. a 4:00 p.m., a través de medios electrónicos o entornos virtuales, mientras que de forma presencial serán atendidos por el personal que se encuentre de guardia en las Direcciones de Secretaría General e Investigación y Postgrado, de lunes a viernes de 8:00 a.m. a 3:30 p.m. y los sábados de 8:30 a.m. a 3:30 p.m.</p>
                                <p> <b>7.</b> <b>Actuará con la moral y ética que exige toda actividad académica,</b> siguiendo los lineamientos de la ENFMP, su metodología de estudio, normas de redacción, originalidad en las ideas que exprese y reconociendo la autoría de cualquier material de referencia que permita expresar las ideas que se soliciten en alguna actividad participativa o evaluativa, comprendiendo que <b>el plagio académico es motivo de retiro en cualquier momento del postgrado.</b> </p>
                                <p> <b>8.</b> Hará buen uso de las instalaciones, mobiliario y equipos de trabajo de la Escuela Nacional de Fiscales del Ministerio Público, durante su permanencia en el recinto.</p>
                                <p> <b>9.</b> Asume que es una <b>falta leve</b> trasladar materiales o mobiliario de un recinto a otro, dentro de la Escuela y es una <b>falta grave</b> trasladar bienes muebles fuera de la sede de la Escuela Nacional de Fiscales del Ministerio Público sin la debida autorización.</p>
                                <p> <b>10.</b> Estará atento(a) para discutir con el/la docente los resultados de las actividades de evaluación a medida que se vayan produciendo, así como recibir las recomendaciones y realizar las medidas necesarias para la corrección de las deficiencias observadas en su proceso de aprendizaje.</p>
                                <p> <b>11.</b> Conoce que el resultado de su proceso de aprendizaje será evaluado de forma independiente en cada unidad curricular, con la escala de calificaciones que va desde uno (01) a veinte (20) puntos, ambas inclusive y que para ser aprobada la unidad curricular se requiere obtener la calificación definitiva mínima de quince (15) puntos, mientras que para egresar del Programa de Postgrado debe obtener un índice académico acumulado de quince (15) puntos en adelante.</p>
                                <p> <b>12.</b> Conoce que podrá repetir solo una unidad curricular y en una sola oportunidad en todo el programa de postgrado.</p>
                                <p> <b>13.</b> Conoce que si cursa simultáneamente dos o más programas de postgrado y sea reprobada o reprobado en una (1) unidad curricular en cada uno de los programas, deberá decidir continuar en uno (1) de los mismos, aplicándose en los demás el retiro por causales académicas. Una vez haya egresado del postgrado de su elección, podrá participar en el proceso de selección de aspirantes para el o los programas inconclusos y una vez haya realizado la inscripción formal, solicitará el reconocimiento de unidades crédito por las unidades curriculares aprobadas.</p>
                                <p> <b>14.</b> <b>Es responsable de la veracidad de la información suministrada </b>y asume las implicaciones que se pudieran derivar de proporcionar datos falsos o erróneos:<b> Cada estudiante es responsable de la información que coloca en este registro.</b></p>
                                <br>
                                <p>Asimismo, reconoce, aceptó y acordó el o la estudiante<b><?php echo $datos_alumnos->nombre_primer.' '. $datos_alumnos->nombre_segundo.' '.$datos_alumnos->apellido_primer.' '.$datos_alumnos->apellido_segundo; ?></b> titular de la Cédula de Identidad Nº V-<b><?php echo number_format($datos_alumnos->cedula,0,'', '.');?> que, la Escuela Nacional de Fiscales del Ministerio Público, queda exonerada de indemnizarle en forma alguna o de cualquier intento de demanda civil o penal, lo que no implica en modo alguno menoscabo de su derecho a la defensa, establecido en el artículo 49, numeral 2 de la Constitución de la República Bolivariana de Venezuela.</p>
                                </p>  
                                <div class="col-12" >
                                <div align="center" >
                                  
                                  <p align="center" ><h5>Aceptó los términos y condiciones <b>MODALIDAD PRESENCIAL</b> <?php echo $acepto;?></strong></h5>
                        </p>
                        <p align="center" > 
                                  <a href="<?php  echo base_url()?>consultas/clausula_pre_descargar/<?php echo $datos_alumnos->id_usuario;?>/<?php echo $periodo->id;?>" target="_blank"><img src="<?php echo base_url(); ?>assets/img/pdf.jpeg"  alt="PDF" style="width: 10mm; height: 10mm; margin: 0;" />Imprimir</a>
               </p>
                                </div>                    
                                </div>  
                        </div>                
                        </div>
                    </div>
                </div>
               
                <div class="row">
                <div class="col">
                    <div class="collapse multi-collapse" id="multiCollapseExample2">
                    <div class="card card-body">
                    <div align ="center" > 
                      <table width="60%" border="1" style=" font-size:12pt; font-family:'Lucida Grande', 'Lucida Sans Unicode', 'Lucida Sans', 'DejaVu Sans', Verdana, sans-serif">  
                        <tr bgcolor="#D0E0F4" color="#1060C8" aling ="center">
                          <th ><div align ="center">ESPECIALIZACIÓN</div></th>
                          <th ><div align ="center">TRIMESTRE</div></th>
                          <th  ><div align ="center">UNIDAD CURRICULAR</div></th>    
                          <th  ><div align ="center">DÍA DE CLASES</div></th>                            
                        </tr>
                        <?php 
                        foreach($materiasV as $materias){ 
                          if($materias->modalidad==2){
                          ?>
                        <tr>
                            <td  align ="center" ><?php echo $materias->programa;?></td>
                            <td  align ="center" ><?php echo $materias->trimestre;?></td>
                            <td   align ="center"><div align ="center"><?php echo $materias->unidad_curricular;?></td>   
                            <td  align ="center"><div><?php if($materias->id_dia_clase>=1 and $materias->id_dia_clase<=5 or $materias->id_dia_clase==8  ) echo "Semanal"; elseif($materias->id_dia_clase>=6 and $materias->id_dia_clase<=7) echo "Sabatino"; ?></div></td>
                                        
                        </tr>   
                       <?php }
                      }
                      ?>
                       </table>
                  </div>
            </b>               
                    <p aling="justify">  <img src="<?php echo base_url(); ?>assets/img/virtual.png" title="MODALIDAD A DISTANCIA"
                    style="width: 15mm; height: 15mm; margin: 0;"/>
                   
                                y la Escuela Nacional de Fiscales del Ministerio Público, donde se establece que:
                               <p>  <b>1.</b> Si estando en el ejercicio de sus funciones como fiscal, funcionario o funcionaria, empleado o empleada del Ministerio Público resulta ser objeto de retiro, remoción, cese de comisión de servicio o renuncia, durante su régimen de permanencia en esta Institución, el o la estudiante reconoce, acepta y acuerda abandonar su asistencia académica total y de forma inmediata, a los grupos de WhatsApp y Google Classroom, en los que se impartan las unidades curriculares respectivas a la malla curricular establecida para el mencionado postgrado, asumiendo que no puede continuar sus estudios en la ENFMP.</p>
                               <p>  <b>2.</b> Acepta que este trimestre será en todo su desarrollo bajo <b>modalidad a distancia</b>, que cuenta con servicio de internet y se apegará al horario de clases establecido por la ENFMP.</p>
                               <p>  <b>3.</b> Conoce que la <b>participación activa</b> será evaluada en cada encuentro académico y tendrá una ponderación en el plan de evaluación.</p>
                               <p>  <b>4.</b> Tiene <b>conocimiento instrumental</b> de recursos como correo electrónico <b>GMAIL, teléfono con aplicación WhatsApp, Classroom, Google Meet, formularios en Google Forms</b> (recursos y aplicaciones que conoce su funcionalidad y comprende que sirven como medio instruccional para escuchar, visualizar, transmitir contenido y adjuntar documentos según lo solicite el o la docente).</p>
                               <p>  <b>5.</b> Se compromete a <b>asistir puntualmente y participar activamente</b> en la actividad académica en los horarios señalados y <b>está consciente que las limitaciones de servicio eléctrico, internet u otros servicios en la zona donde reside no son responsabilidad de la ENFMP,</b> por lo cual solamente  <b>podrá optar a aprobar</b> la(s) unidad (es) curricular(es) <b>si cumple con lo señalado.</b></p>
                               <p> <b>6.</b> Como miembro responsable de la ENFMP, <b>respetará a las y los docentes, autoridades y personal administrativo y obrero que forma parte de esta casa de estudios, </b>dejando claro que el Reglamento Interno de Estudios de la Escuela Nacional de Fiscales del Ministerio Público  <b>sanciona</b> cualquier actitud que vulnere a quienes forman parte de la comunidad académica y es <b>motivo de retiro.</b></p>
                                <p> <b>7.</b> <b>Acatará los acuerdos entre docente y grupo de clases,</b> en relación al desarrollo de las actividades académicas y las estrategias evaluativas a utilizar, dejando explícitamente establecido que queda a criterio de cada docente proporcionar la alternativa de recuperar alguna evaluación y las normas que regirán su desarrollo, teniendo autonomía para tomar tal decisión. </b></p>
                                <p> <b>8.</b> Seguirá los canales regulares de comunicación establecidos por la ENFMP, siendo el horario de atención de lunes a viernes de 8:00 a.m. a 4:00 p.m., a través de medios electrónicos o entornos virtuales. </b></p>
                                <p> <b>9.</b> <b>Actuará con la moral y ética que exige toda actividad académica, </b>siguiendo los lineamientos de la ENFMP, su metodología de estudio, normas de redacción, originalidad en las ideas que exprese y reconociendo la autoría de cualquier material de referencia que permita expresar las ideas que se soliciten en alguna actividad participativa o evaluativa, comprendiendo que<b> el plagio académico es motivo de retiro en cualquier momento del postgrado.</b> </b></p>
                                <p> <b>10.</b> Estará atento(a) para discutir con el/la docente los resultados de las actividades de evaluación a medida que se vayan produciendo, así como recibir las recomendaciones y realizar las medidas necesarias para la corrección de las deficiencias observadas en su proceso de aprendizaje.</p>
                                <p> <b>11.</b> Conoce que las calificaciones estarán disponibles en <b> Google Classroom</b> y serán cargadas por la/el docente en el Sistema de Control de Estudios. Estará atento(a) para discutir con el/la docente los resultados de las actividades de evaluación a medida que se vayan produciendo, así como recibir las recomendaciones y realizar las medidas necesarias para la corrección de las deficiencias observadas en su proceso de aprendizaje.</p>
                                <p> <b>12.</b> Conoce que el resultado de su proceso de aprendizaje será evaluado de forma independiente en cada unidad curricular, con la escala de calificaciones que va desde uno (01) a veinte (20) puntos, ambas inclusive y que para ser aprobada la unidad curricular se requiere obtener la calificación definitiva mínima de quince (15) puntos, mientras que para egresar del Programa de Postgrado debe obtener un índice académico acumulado de quince (15) puntos en adelante.</p>
                                <p> <b>13.</b> Conoce que podrá repetir solo una unidad curricular y en una sola oportunidad en todo el programa de postgrado.</p>
                                <p> <b>14.</b> Conoce que si cursa simultáneamente dos o más programas de postgrado y sea reprobada o reprobado en una (1) unidad curricular en cada uno de los programas, deberá decidir continuar en uno (1) de los mismos, aplicándose en los demás el retiro por causales académicas. Una vez haya egresado del postgrado de su elección, podrá participar en el proceso de selección de aspirantes para el o los programas inconclusos y una vez haya realizado la inscripción formal, solicitará el reconocimiento de unidades crédito por las unidades curriculares aprobadas.</p>
                                <p> <b>15.</b> <b>Es responsable de la veracidad de la información suministrada </b> y asume las implicaciones que se pudieran derivar de proporcionar datos falsos o erróneos: <b>Cada estudiante es responsable de la información que coloca en este registro.</b>
                               <p>Asimismo, reconoce, aceptó y acordó el o la estudiante<b><?php echo $datos_alumnos->nombre_primer.' '. $datos_alumnos->nombre_segundo.' '.$datos_alumnos->apellido_primer.' '.$datos_alumnos->apellido_segundo; ?></b> titular de la Cédula de Identidad Nº V-<b><?php echo number_format($datos_alumnos->cedula,0,'', '.');?> que, la Escuela Nacional de Fiscales del Ministerio Público, queda exonerada de indemnizarle en forma alguna o de cualquier intento de demanda civil o penal, lo que no implica en modo alguno menoscabo de su derecho a la defensa, establecido en el artículo 49, numeral 2 de la Constitución de la República Bolivariana de Venezuela.</p>
                        </p>   
                        <div class="col-12" >
                                <div align="center" >
                                <p align="center" ><h5>"Aceptó los términos y condiciones <b>MODALIDAD A DISTANCIA</b> <?php echo $acepto;?></h5>
                                  </p>
                                  <p align="center" > 
                                  <a href="<?php  echo base_url()?>consultas/clausula_dis_descargar/<?php echo $datos_alumnos->id_usuario;?>/<?php echo $periodo->id;?>" target="_blank"><img src="<?php echo base_url(); ?>assets/img/pdf.jpeg"  alt="PDF" style="width: 10mm; height: 10mm; margin: 0;" />Imprimir</a>
               </p> 
                                </div>                    
                        </div>                   
                        </div>
                    </div>
                </div>
                </div>
                <div class="row">
                <div class="col">
                    <div class="collapse multi-collapse" id="multiCollapseExample3">
                    <div class="card card-body">
                    <div align ="center" > 
                      <table width="60%" border="1" style=" font-size:12pt; font-family:'Lucida Grande', 'Lucida Sans Unicode', 'Lucida Sans', 'DejaVu Sans', Verdana, sans-serif">  
                        <tr bgcolor="#D0E0F4" color="#1060C8" aling ="center">
                          <th ><div align ="center">ESPECIALIZACIÓN</div></th>
                          <th ><div align ="center">TRIMESTRE</div></th>
                          <th  ><div align ="center">UNIDAD CURRICULAR</div></th>    
                          <th  ><div align ="center">DÍA DE CLASES</div></th>                            
                        </tr>
                        <?php 
                        foreach($materiasSP as $materias){ 
                          if($materias->modalidad==3){
                          ?>
                        <tr>
                            <td  align ="center" ><?php echo $materias->programa;?></td>
                            <td  align ="center" ><?php echo $materias->trimestre;?></td>
                            <td   align ="center"><div align ="center"><?php echo $materias->unidad_curricular;?></td>   
                            <td  align ="center"><div><?php if($materias->id_dia_clase>=1 and $materias->id_dia_clase<=5 or $materias->id_dia_clase==8  ) echo "Semanal"; elseif($materias->id_dia_clase>=6 and $materias->id_dia_clase<=7) echo "Sabatino"; ?></div></td>
                                        
                        </tr>   
                       <?php }
                      }?>
                       </table>
                  </div>
            </b>               
                    <p aling="justify">  <img src="<?php echo base_url(); ?>assets/img/semip.png" 
                    style="width: 15mm; height: 15mm; margin: 0;" title="MODALIDAD SEMIPRESENCIAL"/>
                   
                                y la Escuela Nacional de Fiscales del Ministerio Público, donde se establece que:
                                <p>  <b>1.</b> Si estando en el ejercicio de sus funciones como fiscal, funcionario o funcionaria, empleado o empleada del Ministerio Público resulta ser objeto de retiro, remoción, cese de comisión de servicio o renuncia, durante su régimen de permanencia en esta Institución, el o la estudiante reconoce, acepta y acuerda abandonar su asistencia académica total y de forma inmediata, a los grupos de WhatsApp y Google Classroom, en los que se impartan las unidades curriculares respectivas a la malla curricular establecida para el mencionado postgrado, asumiendo que no puede continuar sus estudios en la ENFMP.</p>
                                <p>  <b>2.</b> Acepta que este trimestre será en todo su desarrollo <b>bajo MODALIDAD SEMIPRESENCIAL</b>, que cuenta con servicio de internet y se apegará al horario de clases establecido por la ENFMP.</p>
                                <p> <b>3.</b> Conoce que la <b>participación activa</b> será evaluada en cada encuentro académico y tendrá una ponderación en el plan de evaluación.</p>
                                <p> <b>4.</b> Tiene <b>conocimiento instrumental</b> de recursos como correo electrónico <b>GMAIL, teléfono con aplicación WhatsApp, Classroom, Google Meet, formularios en Google Forms</b> (recursos y aplicaciones que conoce su funcionalidad y comprende que sirven como medio instruccional para escuchar, visualizar, transmitir contenido y adjuntar documentos según lo solicite el o la docente).</p>
                                <p> <b>5.</b> Se compromete a <b>asistir puntualmente y participar activamente</b> en la actividad académica en los horarios señalados y <b>está consciente que las limitaciones de servicio eléctrico, internet u otros servicios en la zona donde reside no son responsabilidad de la ENFMP,</b> por lo cual solamente  <b>podrá optar a aprobar</b> la(s) unidad (es) curricular(es) <b>si cumple con lo señalado.</b></p>
                                <p> <b>6.</b> Como miembro responsable de la ENFMP, <b>respetará a las y los docentes, autoridades y personal administrativo y obrero que forma parte de esta casa de estudios, </b>dejando claro que el Reglamento Interno de Estudios de la Escuela Nacional de Fiscales del Ministerio Público  <b>sanciona</b> cualquier actitud que vulnere a quienes forman parte de la comunidad académica y es <b>motivo de retiro.</b></p>
                                <p> <b>7.</b> <b>Acatará los acuerdos entre docente y grupo de clases,</b> en relación al desarrollo de las actividades académicas y las estrategias evaluativas a utilizar, dejando explícitamente establecido que queda a criterio de cada docente proporcionar la alternativa de recuperar alguna evaluación y las normas que regirán su desarrollo, teniendo autonomía para tomar tal decisión. </b></p>
                                <p> <b>8.</b> Seguirá los canales regulares de comunicación establecidos por la ENFMP, siendo el horario de atención de lunes a viernes de 8:00 a.m. a 4:00 p.m., a través de medios electrónicos o entornos virtuales. </b></p>
                                <p> <b>9.</b> <b>Actuará con la moral y ética que exige toda actividad académica, </b>siguiendo los lineamientos de la ENFMP, su metodología de estudio, normas de redacción, originalidad en las ideas que exprese y reconociendo la autoría de cualquier material de referencia que permita expresar las ideas que se soliciten en alguna actividad participativa o evaluativa, comprendiendo que<b> el plagio académico es motivo de retiro en cualquier momento del postgrado.</b> </b></p>
                                <p> <b>10.</b> Estará atento(a) para discutir con el/la docente los resultados de las actividades de evaluación a medida que se vayan produciendo, así como recibir las recomendaciones y realizar las medidas necesarias para la corrección de las deficiencias observadas en su proceso de aprendizaje.</p>
                                <p> <b>11.</b> Conoce que las calificaciones estarán disponibles en <b> Google Classroom</b> y serán cargadas por la/el docente en el Sistema de Control de Estudios. Estará atento(a) para discutir con el/la docente los resultados de las actividades de evaluación a medida que se vayan produciendo, así como recibir las recomendaciones y realizar las medidas necesarias para la corrección de las deficiencias observadas en su proceso de aprendizaje.</p>
                                <p> <b>12.</b> Conoce que el resultado de su proceso de aprendizaje será evaluado de forma independiente en cada unidad curricular, con la escala de calificaciones que va desde uno (01) a veinte (20) puntos, ambas inclusive y que para ser aprobada la unidad curricular se requiere obtener la calificación definitiva mínima de quince (15) puntos, mientras que para egresar del Programa de Postgrado debe obtener un índice académico acumulado de quince (15) puntos en adelante.</p>
                                <p> <b>13.</b> Conoce que podrá repetir solo una unidad curricular y en una sola oportunidad en todo el programa de postgrado.</p>
                                <p> <b>14.</b> Conoce que si cursa simultáneamente dos o más programas de postgrado y sea reprobada o reprobado en una (1) unidad curricular en cada uno de los programas, deberá decidir continuar en uno (1) de los mismos, aplicándose en los demás el retiro por causales académicas. Una vez haya egresado del postgrado de su elección, podrá participar en el proceso de selección de aspirantes para el o los programas inconclusos y una vez haya realizado la inscripción formal, solicitará el reconocimiento de unidades crédito por las unidades curriculares aprobadas.</p>
                                <p> <b>15.</b> <b>Es responsable de la veracidad de la información suministrada </b> y asume las implicaciones que se pudieran derivar de proporcionar datos falsos o erróneos: <b>Cada estudiante es responsable de la información que coloca en este registro.</b>
                                <p>Asimismo, reconoce, aceptó y acuerdó el o la estudiante<b><?php echo $datos_alumnos->nombre_primer.' '. $datos_alumnos->nombre_segundo.' '.$datos_alumnos->apellido_primer.' '.$datos_alumnos->apellido_segundo; ?></b> titular de la Cédula de Identidad Nº V-<b><?php echo number_format($datos_alumnos->cedula,0,'', '.');?> que, la Escuela Nacional de Fiscales del Ministerio Público, queda exonerada de indemnizarle en forma alguna o de cualquier intento de demanda civil o penal, lo que no implica en modo alguno menoscabo de su derecho a la defensa, establecido en el artículo 49, numeral 2 de la Constitución de la República Bolivariana de Venezuela.</p>
                                <div align="center" >
                                <p align="center" ><h5>"Aceptó los términos y condiciones <b>MODALIDAD SEMIPRESENCIAL</b> <?php echo $acepto;?></h5>
                                  </p>
                                  <p align="center" > 
                                  <a href="<?php  echo base_url()?>consultas/clausula_sp_descargar/<?php echo $datos_alumnos->id_usuario;?>/<?php echo $periodo->id;?>" target="_blank"><img src="<?php echo base_url(); ?>assets/img/pdf.jpeg"  alt="PDF" style="width: 10mm; height: 10mm; margin: 0;" />Imprimir</a>
               </p>
                                </div>                    
                        </div>                   
                        </div>
                    </div>
                </div>
                </div>
                <div class="row">
                <div class="col">
                    <div class="collapse multi-collapse" id="multiCollapseExample4">
                    <div class="card card-body">
                    <div align ="center" > 
                      <table width="60%" border="1" style=" font-size:12pt; font-family:'Lucida Grande', 'Lucida Sans Unicode', 'Lucida Sans', 'DejaVu Sans', Verdana, sans-serif">  
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
                                <p>Asimismo, reconoce, aceptó y acordó el o la estudiante<b><?php echo $datos_alumnos->nombre_primer.' '. $datos_alumnos->nombre_segundo.' '.$datos_alumnos->apellido_primer.' '.$datos_alumnos->apellido_segundo; ?></b> titular de la Cédula de Identidad Nº V-<b><?php echo number_format($datos_alumnos->cedula,0,'', '.');?> </b>que, la Escuela Nacional de Fiscales del Ministerio Público, queda exonerada de indemnizarle en forma alguna o de cualquier intento de demanda civil o penal, lo que no implica en modo alguno menoscabo de su derecho a la defensa, establecido en el artículo 49, numeral 2 de la Constitución de la República Bolivariana de Venezuela.</p>
                                <div align="center" >
                                
                                  <p align="center" ><h5>Aceptó los términos y condiciones <b>CLAUSULA COMPROMISO DE TEG ó TG</b> <?php echo $acepto;?></h5>
                                  </p>
                                  <p align="center" > 
                                  <a href="<?php  echo base_url()?>consultas/clausula_teg_descargar/<?php echo $datos_alumnos->id_usuario;?>/<?php echo $periodo->id;?>" target="_blank"><img src="<?php echo base_url(); ?>assets/img/pdf.jpeg"  alt="PDF" style="width: 10mm; height: 10mm; margin: 0;" />Imprimir</a>
               </p> 
                                  
                                </div>                    
                        </div>                   
                        </div>
                    </div>
                </div>
                </div>
                
                <div align="center" title="Hacer clic en los botones de cada modalidad para aceptar los términos de la cláusula de compromiso">
                <?php //var_dump($modalidad);
                 foreach($modalidad as $modalidad){
                              $valor=array('TEG');
                              if(!in_array($modalidad->trimestre,$valor) ){
                                  if($modalidad->modalidad==1){?>              
                                    <img src="<?php echo base_url(); ?>assets/img/presencial.jpeg"
                                style="width: 25mm; height: 25mm; margin: 0;"/>
                                <a class="btn btn-info" data-toggle="collapse" href="#multiCollapseExample1" role="button" aria-expanded="false" aria-controls="multiCollapseExample1">Modalidad Presencial</a>
                                &nbsp;&nbsp; &nbsp;&nbsp;
                                <?php } else{
                                    if($modalidad->modalidad==2){?>
                                    &nbsp;&nbsp;<img src="<?php echo base_url(); ?>assets/img/virtual.png" 
                                    style="width: 20mm; height: 20mm; margin: 0;"/> <a class="btn btn-secondary" data-toggle="collapse" href="#multiCollapseExample2" role="button" aria-expanded="false" aria-controls="multiCollapseExample2">Modalidad A Distancia</a>
                                    &nbsp;&nbsp; &nbsp;&nbsp; 
                                    <?php }                   
                                    if($modalidad->modalidad==3){?>
                                    &nbsp;&nbsp;<img src="<?php echo base_url(); ?>assets/img/semip.png" 
                                    style="width: 20mm; height: 20mm; margin: 0;"/> <a class="btn btn-warning" data-toggle="collapse" href="#multiCollapseExample3" role="button" aria-expanded="false" aria-controls="multiCollapseExample3">Modalidad Semipresencial</a>
                                    &nbsp;&nbsp; &nbsp;&nbsp; <?php
                                } 
                                }
                            }else{?>
                                    &nbsp;&nbsp;<img src="<?php echo base_url(); ?>assets/img/teg.png" 
                              style="width: 20mm; height: 20mm; margin: 0;"/> <a class="btn btn-light" data-toggle="collapse"  href="#multiCollapseExample4" role="button" aria-expanded="false" aria-controls="multiCollapseExample4">TEG ó TG</a>
                                  <?php 
                              }?>
                       
                        
               <?php }
                ?>                
                </div> 
               
            </form>                
          </div>
                </div><!-- /.card -->





    </section>
    <!-- /.content -->



  </div>
  <!-- /.content-wrapper -->
