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
<?php 
 if ($datos_docente->id_sexo==2){ $genero= 'la'; $ciud=' ciudadana'; $contrad=' contratada';
 }else{ 
	if ($datos_docente->id_sexo==1){ $genero= 'el'; $ciud=' ciudadano';  $contrad=' contratado'; }
}
?>
    <section class="content">
    <style>@page {
          margin-top: 2cm;
          margin-bottom: 0.5cm;
          margin-left: 3cm;
          margin-right: 3cm;         
         

      }
      </style>
      <div class="card">
          <table width="100%" align="center"   border="0"  cellPadding="2" cellSpacing="1" style=" font-size:8pt; font-family:'Lucida Grande', 'Lucida Sans Unicode', 'Lucida Sans', 'DejaVu Sans', Verdana, sans-serif" >  
            <tr >
              <td colspan="3" height="60" align="left">       <img src="<?php echo base_url(); ?>assets/img/logo1.png" 
              style="width: 25mm; height:25mm; margin: 0;" />  
              </td>         
              <td colspan="3"  height="80" align="center" >  República Bolivariana de Venezuela<br>Ministerio Público<br>Fundación Escuela Nacional de Fiscales del Ministerio Público<br>
              Dirección de Investigación y Postgrado
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
            <div style=" font-size:14pt; font-family:'Lucida Grande', 'Lucida Sans Unicode', 'Lucida Sans', 'DejaVu Sans', Verdana, sans-serif"><strong>CONSTANCIA DE PARTICIPACIÓN DOCENTE</strong>
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
               
          ?>

          <tr>
          <td style="text-align: justify;  line-height:24px;" colspan="8">

        Quien suscribe hace constar que  <?php  echo $genero;  echo $ciud;?>: <b>  <?php echo $datos_docente->primer_apellido.' '.$datos_docente->segundo_apellido.' '.$datos_docente->primer_nombre.' '. trim($datos_docente->segundo_nombre);?></b>, titular de la cédula de identidad N° <b> <?php
          echo $datos_docente->nacionalidad.'-'.number_format($datos_docente->cedula, 0, ' ','.'); ?></b>, presta sus servicios en la Escuela Nacional de Fiscales del Ministerio Público  en la Coordinación de Postgrado como <b>docente <?php  echo $contrad; ?></b>,                   
          durante el periodo académico <?php echo strtolower($oferta->periodo);?>, el cual inicia  <?php echo date("d-m-Y",strtotime($oferta->fecha_inicio));?> y finaliza el <?php  echo date("d-m-Y",strtotime($oferta->fecha_fin));?>, impartiendo la unidad curricular <b><?php echo $oferta->pensum;?></b> para el programa de postgrado <b><?php echo $oferta->programa_nombre;?></b>, con una carga académica de <?php echo strtolower($oferta->letras);?> (<?php echo $oferta->horas;?>) horas el día <?php echo strtolower($oferta->dia).' de '.$oferta->horario;?>.</td>      
          </tr>
          <tr>
          <td  height="20">

          </td>
          </tr>
          <?php setlocale(LC_ALL,"es_ES");
                $date= strftime("%d de %B del %Y");
          ?>

          <tr><td colspan="8" > Constancia que se expide en al ciudad de Caracas, el <?php echo $fecha_letra; ?>.</td>          <tr>
          <td  height="20">

          </td>
          </tr>
          </table>
          <table width="100%" border="0" cellpadding="2" cellspacing="2" style=" font-size:8pt; font-family:'Lucida Grande', 'Lucida Sans Unicode', 'Lucida Sans', 'DejaVu Sans', Verdana, sans-serif">
          
          <tr>
          <td colspan="8" align="center" >
           <img src="<?php echo base_url(); ?>assets/firmas/firma_lilian.jpg"  style="margin: 0;"/> 
          </td>
          </tr>
<tr><td></td></tr>
<tr><td></td></tr>
<tr><td></td></tr>
<tr><td></td></tr>
<tr><td></td></tr>
<tr><td></td></tr>
<tr><td></td></tr>
<tr><td></td></tr>
          </table>
          </div><!-- /.card -->
<footer>
          <table width="100%" border="0" cellpadding="2" cellspacing="2" style=" font-size:6pt; font-family:'Lucida Grande', 'Lucida Sans Unicode', 'Lucida Sans', 'DejaVu Sans', Verdana, sans-serif">
          <tr  >
          <td  >Calle los Naranjos, entre las Avenidas las Acacias y Los Samanes Quinta Kempis, Urbanización La Florida, Caracas 1010</td>
          </tr>

          <tr   bgcolor="#D0E0F4" color="#1060C8" >
          <td  align="right"  >www.enf.edu.ve</td>
          </tr>
          </table>
      
</footer>




    </section>
    <!-- /.content -->



  </div>
  <!-- /.content-wrapper -->       


