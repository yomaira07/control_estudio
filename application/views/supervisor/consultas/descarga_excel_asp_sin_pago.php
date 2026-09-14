<?php
$nombre_archivo='aspirantes_registrados_sin_pago'.date("dmyhis");
$titulo='LISTADO DE ASPIRANTES REGISTRADOS SIN PAGO<i> Ordenado por: Nombres Alfabeticamente</i>';
header("Pragma: public");
header("Expires: 0");
$filename = $nombre_archivo.".xls";
header("Content-type: application/x-msdownload");
header("Content-Disposition: attachment; filename=$filename");
header("Pragma: no-cache");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");

        print "\xEF\xBB\xBF"; // UTF-8 BOM
        $model->your_method;
?>
       

           
       
       <table border="0.1" cellpadding="5" cellspacing="3">
<tbody>
<tr>
<th colspan="10" >
<h3 ><?php echo $titulo;?>    
</h3>
<h1> <?php 
//var_dump($periodo);
foreach($periodo as $periodo){
    echo '<b>'.$periodo.'</b>';
      }
    ?>
</h1>
</th>
</tr>
        <tr align="center" style="background: grey;">
           <td> <b>Usuario Registrado</b></td>
            <td><b>Nombre(s)</b></td>
            <td><b> Apellido(s)</b></td>    
            <td><b>Correo</b></td>           
            <td><b>Especialización</b></td>
         
        </tr>
      
       <?php $key= count($registros);

      // var_dump( $registro_listado);
         foreach($registros as $registros ){
            
            ?>
           <tr>
              <td ><?php echo $registros['cedula'];?></td>     
              <td ><?php echo $registros['nombres'];?></td>                  
              <td ><?php echo $registros['apellidos'];?></td>    
              <td ><?php echo $registros['email'];?></td>              
              <td ><?php echo $registros['programa'];?></td>                
           </tr>
       <?php  }?>
        
        <tr>
            <th> <?php echo $key;?></th>
       
        </tr>
       </tbody>
        </table>

<table border="1" cellpadding="5" cellspacing="3">
<tbody>
<tr>
<th colspan="2" >
<h3 >RESUMEN POR PROGRAMA O ESPECIALIZACIÓN</h3>
</th>
</tr>

<tr align="center" style="background: grey;">
           <td> <b>Nombre del Programa o Especialización</b></td>
            <td><b>Total por Programas</b></td>
 </tr>
  <?php 

     foreach($resumen as $resumen=>$key ){?>


  <tr >
     
      <td><?php print_r($resumen) ;?></td>
       <td align="right"><?php print_r($key) ;?></td>
 
 </tr>
 
<?php 
$suma=$key+$suma;
 

} ?>
<tr>
            <th style="background: grey;" colspan="2" align="right"> <?php echo "Total Inscritos===>  ".$suma;?></th>
       
        </tr>
       </tbody>
        </table>




