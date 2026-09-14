<?php
header("Pragma: public");
header("Expires: 0");
$filename = $nombre_archivo.".xls";
header("Content-type: application/x-msdownload");
header("Content-Disposition: attachment; filename=$filename");
header("Pragma: no-cache");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");

        print "\xEF\xBB\xBF"; // UTF-8 BOM
?>
       

           
       
       <table border="1" cellpadding="5" cellspacing="3">
<tbody>
<tr>
<th colspan="12" >
<h3 ><?php echo $titulo;?>    
</h3>
<h1> <?php foreach($periodo as $periodo){
    echo $periodo->nombre.'</b>';
      }?>
</h1>
</th>
</tr>
        <tr align="center" style="background: grey;">
           <td> <b>Cédula de Identidad</b></td>
            <td><b>Primer Nombre</b></td>
            <td><b>Segundo Nombre</b></td>
            <td><b>Primer Apellido</b></td>
            <td><b>Segundo Apellido</b></td>
	  <td><b>Género</b></td>
 <td><b>Fecha de Nacimiento</b></td>
            <td><b>Correo</b></td>
            <td><b>Tél. Celular</b></td>
            <td><b>Tél. Habitación</b></td>
            <td><b>Especialización</b></td>
    <td><b>Modalidad</b></td>
 <td><b>Trimestre</b></td>
<td><b>Unidades Créditos Inscritas</b></td>
  
            <td><b>Organismo donde Trabaja</b></td>
 <td><b>Circunscripción</b></td>
            <td><b>Cargo</b></td>
            <td><b>Estado donde Reside</b></td>
            <td><b>Titulo Pregrado</b></td>
            <td><b>institucion</b></td>
        </tr>
      
       <?php $key= count($registros);
         foreach($registros as $registros){?>
           <tr>
              <td ><?php echo $registros->nacionalidad.'-'.$registros->cedula;?></td>     
              <td ><?php echo $registros->primer_nombre;?></td>    
              <td ><?php echo $registros->segundo_nombre;?></td>     
              <td ><?php echo $registros->primer_apellido;?></td>          
              <td ><?php echo $registros->segundo_apellido;?></td>   
  <td ><?php if($registros->sexo==2)echo "FEMENINO";if($registros->sexo==1)echo "MASCULINO";?></td>  
      <td ><?php strtotime($registros->fecha_nac);echo date('d-m-Y',strtotime($registros->fecha_nac));?></td>   
              <td ><?php echo $registros->correo;?></td> 
              <td ><?php echo $registros->telefono_cel;?></td>          
              <td ><?php echo $registros->telefono_hab;?></td> 
              <td ><?php echo $registros->programa;?></td>   
    <td ><?php if($registros->modalidad==1) echo "PRESENCIAL";if($registros->modalidad==2) echo "A DISTANCIA";if($registros->modalidad==3) echo "SEMIPRESENCIAL";?></td>
 <td ><?php echo $registros->trimestre;?></td> 
 <td ><?php echo $registros->uc;?></td> 
              <td ><?php echo $registros->trabajo;?></td>   
<td ><?php echo $registros->circunscripción;?></td>   
              <td ><?php echo $registros->cargo;?></td>   
              <td ><?php echo $registros->residencia;?></td> 
		<td ><?php echo $registros->ult_titulo;?></td> 
		<td ><?php echo $registros->institucion;?></td>   
           </tr>
       <?php  }?>
        
        <tr>
            <th> <?php echo $key;?></th>
       
        </tr>
       </tbody>
       </table>
