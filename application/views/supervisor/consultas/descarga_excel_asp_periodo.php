<?php
$nombre_archivo='aspirantes_inscritos'.date("dmyhis");
$titulo='LISTADO DE ASPIRANTES INSCRITOS';
header("Pragma: public");
header("Expires: 0");
$filename = $nombre_archivo.".xls";
header("Content-type: application/x-msdownload");
header("Content-Disposition: attachment; filename=$filename");
header("Pragma: no-cache");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");

        print "\xEF\xBB\xBF"; // UTF-8 BOM
       
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
    echo '<b>'.$periodo->nombre.'</b>';
      }
    ?>
</h1>
</th>
</tr>
        <tr align="center" style="background: grey;">
           <td> <b>Cédula de Identidad</b></td>
            <td><b>Nombre(s)</b></td>
            <td><b> Apellido(s)</b></td>     
            <td><b> Género</b></td>       
            <td><b>Correo</b></td>
            <td><b>Tél. Celular</b></td>
            <td><b>Tél. Habitación</b></td>
            <td><b>ültimo Título Académico Obtenido</b></td>
            <td><b>Especialización</b></td>
            <td><b>Organismo donde Trabaja</b></td>
            <td><b>Cargo</b></td>
            <td><b>Estado donde Reside</b></td>
        </tr>
      
       <?php $key= count($registros);

       //var_dump( $registros);
         foreach($registros as $registros ){
            
            ?>
           <tr>
              <td ><?php echo $registros->nacionalidad.'-'.$registros->cedula;?></td>     
              <td ><?php echo $registros->primer_nombre.','.$registros->segundo_nombre;?></td>                  
              <td ><?php echo $registros->primer_apellido.','.$registros->segundo_apellido;?></td>    
              <td ><?php if ($registros->id_sexo=='1') echo 'MASCULINO';  else echo 'FEMENINO';  ?></td>                    
              <td ><?php echo $registros->email;?></td> 
              <td ><?php echo $registros->telefono_cel;?></td>          
              <td ><?php echo $registros->telefono_hab;?></td> 
 	      <td ><?php echo $registros->ult_titulo;?></td>      
              <td ><?php echo $registros->programa;?></td>   
              <td ><?php echo $registros->lugar_trabajo;?></td>   
              <td ><?php echo $registros->cargo;?></td>   
              <td ><?php echo $registros->residencia;?></td>   
             
           </tr>
       <?php  }?>
        
        <tr>
            <th> <?php echo $key;?></th>
       
        </tr>
       </tbody>
        </table>






