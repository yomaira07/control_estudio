<script>
jQuery(document).ready(function($) {
  $('#menu-3').attr('class','active');
});

</script>  

   <!-- Content Wrapper. Contains page content -->

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
    <!-- /.container-fluid -->
    </section>
 
    <!-- Main content -->

    <section class="content">
    <style>
    @page {
        margin-top: 2cm;
          margin-bottom: 0.5cm;
          margin-left: 3cm;
          margin-right: 3cm;   
      }
      
        table{border-collapse: collapse;  font-style: normal; font-weight: normal;  font-size: 11px;break-after:page;}

      </style>
      <div class="card">
          <table width="100%" align="center"   border="0"  cellPadding="2" cellSpacing="1" style=" font-size:8pt; font-family:'Lucida Grande', 'Lucida Sans Unicode', 'Lucida Sans', 'DejaVu Sans', Verdana, sans-serif" >  
            <tr >
              <td colspan="3" height="60" align="left">       <img src="<?php echo base_url(); ?>assets/img/logo1.png" 
              style="width: 25mm; height:25mm; margin: 0;" />  
              </td>         
              <td colspan="3"  height="80" align="center" >  República Bolivariana de Venezuela<br>Ministerio Público<br>Fundación Escuela Nacional de Fiscales del Ministerio Público<br>
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
          <tr  >
          <td colspan="7"></td>
          <td  bgcolor="#D0E0F4" color="#1060C8"  align="right" ><strong><?php echo $nro;?></strong></td>
          </tr>        
          <tr>
          <td  colspan="8" height="40">
          </td>
          </tr>
          <tr>
            <th colspan="8" height="40"> 
            <div style=" font-size:14pt; font-family:'Lucida Grande', 'Lucida Sans Unicode', 'Lucida Sans', 'DejaVu Sans', Verdana, sans-serif"><strong><u>CONSTANCIA DE ESTUDIOS</u></strong>
            </div>
            </th>
          </tr>
          </table>



          <table aling ="center" width="100%" border="0" cellpadding="5" cellspacing="5" style=" font-size:10pt; font-family:'Lucida Grande', 'Lucida Sans Unicode', 'Lucida Sans', 'DejaVu Sans', Verdana, sans-serif">  
          <tr>
          <td  height="20">
          </td>
          </tr>
          <?php setlocale(LC_ALL,"es_ES");
          $el='';
           $programa_es=array(1,2,3,4,5,6);
           $programa_pr=array(14,15,16,17,18,19,20,21,22,23,24,25,26);
           if(in_array($programa->id,$programa_es))$el = 'la';
           if(in_array($programa->id,$programa_pr)) $el= 'el';         

 if ($alumno->id_sexo==2){ $genero= 'la'; $ciud=' ciudadana'; 
 }else{ 
	if ($alumno->id_sexo==1){ $genero= 'el'; $ciud=' ciudadano'; }
}
          ?>
          <tr>
          <td style="text-align: justify;  line-height:24px;" colspan="8">
        Quien suscribe hace constar que  <?php  echo $genero;  echo $ciud;?>: <b>  <?php echo $alumno->apellido_primer.' '.$alumno->apellido_segundo.', '.$alumno->nombre_primer.' '. trim($alumno->nombre_segundo);?></b>, titular de la cédula de identidad N° <b> <?php
          echo $alumno->nacionalidad.'-'.number_format($alumno->cedula, 0, ' ','.'); ?></b>, es estudiante regular en la Escuela Nacional de Fiscales del Ministerio Público en <?php echo $el;?> <b><?php echo $programa->nombre;?></b>, quien se inscribió en el período académico <?php echo strtolower($periodo->nombre);?>, el cual inició el  <?php echo date("d-m-Y",strtotime($oferta->fecha_inicio));?> y culmina el <?php  echo date("d-m-Y",strtotime($oferta->fecha_fin));?>,  
          las siguientes unidades curriculares: </td>      
          </tr>
          <tr>
          </table>
        
            <table aling ="center" width="100%" border="1" style=" font-size:8pt; font-family:'Lucida Grande', 'Lucida Sans Unicode', 'Lucida Sans', 'DejaVu Sans', Verdana, sans-serif">  
            <tr bgcolor="#D0E0F4" color="#1060C8" aling ="center">
                <th >TRIMESTRE</th>
                <th  >UNIDAD CURRICULAR</th>
                <th  >DIA DE CLASES</th>
                <th  >HORARIO</th>
            </tr>
            <?php 
            foreach($materias_inscritas as $materias_inscritas){ ?>
            <tr>
                <td  align ="center" ><?php echo $materias_inscritas->trimestre;?></td>
                <td   align ="center"><div align ="center"><?php echo $materias_inscritas->unidad_curricular;?></td>
                <td   align ="center"><div><?php echo $materias_inscritas->dia_clase;?></div></td>
                <td   align ="center"><?php echo strtolower($materias_inscritas->horario);?></td>
            </tr>   
            <?php }?>
            </table>
       
       
          <?php setlocale(LC_ALL,"es_ES");
                $date= strftime("%d de %B del %Y");
          ?>
 
            <table aling ="center" width="100%" border="0" cellpadding="5" cellspacing="5" style=" font-size:10pt; font-family:'Lucida Grande', 'Lucida Sans Unicode', 'Lucida Sans', 'DejaVu Sans', Verdana, sans-serif">  
            <tr><td colspan="8" height="20" > Constancia que se expide en la ciudad de Caracas, el <?php echo $fecha_letra; ?>.</td>          
            </table>
        </div><!-- /.card -->
<div >
<p align="center"> <img src="<?php echo base_url(); ?>assets/firmas/firma.jpg"  style=" width: 300px;margin: 0;" /> </p> 
        <p align="center" style=" font-size:8pt; font-family:'Lucida Grande', 'Lucida Sans Unicode', 'Lucida Sans', 'DejaVu Sans', Verdana, sans-serif" ><b>Lcda. Yanet de Jesús Martínez</b></p>
         <p align="center" style=" font-size:6pt; font-family:'Lucida Grande', 'Lucida Sans Unicode', 'Lucida Sans', 'DejaVu Sans', Verdana, sans-serif"> Directora de Secretaría General (E)<br>
      Escuela Nacional de Fiscales del Ministerio Público<br>
        Resolución Nº 1399 de fecha 01 de agosto de 2023<br>
        Gaceta Oficial N° 6.766 Extraordinario de fecha 23/10/2023</p>
           
</div>
<footer>
          <table width="100%" border="0" cellpadding="2" cellspacing="2" style=" font-size:6pt; font-family:'Lucida Grande', 'Lucida Sans Unicode', 'Lucida Sans', 'DejaVu Sans', Verdana, sans-serif">
          <tr  >
          <td align="center" >Calle los Naranjos, entre las Avenidas las Acacias y Los Samanes Quinta Kempis, Urbanización La Florida, Caracas 1010</td>
          </tr>
          <tr   bgcolor="#D0E0F4" color="#1060C8" >
          <td  align="center"  >www.enf.edu.ve</td>
          </tr>
          </table>
      
</footer>




    </section>
    <!-- /.content -->



  </div>
  <!-- /.content-wrapper -->       



