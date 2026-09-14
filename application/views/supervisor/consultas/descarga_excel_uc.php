<?php
header("Pragma: public");
header("Expires: 0");
$filename = "oferta_academica_aprobadas.xls";
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
<h3 >Listado de Inscritos por Oferta Académica Aprobadas con Revisión Academica</h3>
<h1> Período  <?php foreach($periodo as $periodo){
    echo $periodo->nombre.'</b>';
      }?>
</h1>
</th>
</tr>
        <tr align="center" style="background: grey;">
           <td> <b>POSTGRADO O ESPECIALIZACÖN</b></td>
            <td><b>CÓDIGO UNIDAD CURRICULAR</b></td>
            <td><b>UNIDAD CURRICULAR</b></td>
            <td><b>TRIMESTRE</b></td>
            <td><b>DÍA DE CLASE</b></td>
            <td><b>HORARIO</b></td>
            <td><b>MODALIDAD</b></td>
            <td><b>CEDULA ESTUDIANTE</b></td>
            <td><b>NOMBRES</b></td>
            <td><b>APELLIDOS</b></td>
            <td><b>GENERO</b></td>
            <td><b>CORREO ELECTRÓNICO</b></td>
             <td><b>TÉL. CELULAR</b></td>
            <td><b>TÉL. HABITACIÓN</b></td>
            <td><b>ORGANISMO DONDE TRABAJA</b></td>
            <td><b>CARGO</b></td>
            <td><b>ESTADO DONDE RESIDE</b></td>
            <td><b>TIPO DE PARTICIPANTE</b></td>
           
        </tr>
      
       <?php $key= count($inscritos);
         foreach($inscritos as $inscritos){?>
           <tr>
              <td ><?php echo $inscritos->programa;?></td>     
              <td ><?php echo $inscritos->codigo;?></td>    
              <td ><?php echo $inscritos->unidad_curricular;?></td>     
              <td ><?php echo $inscritos->trimestre;?></td>          
              <td ><?php echo $inscritos->dia;?></td>   
              <td ><?php echo $inscritos->horario;?></td> 
	   <td ><?php if($inscritos->modalidad==1) echo "PRESENCIAL";if($inscritos->modalidad==2) echo "VIRTUAL";if($inscritos->modalidad==3) echo "SEMIPRESENCIAL"?></td> 
              <td ><?php echo $inscritos->cedula;?></td>          
              <td ><?php echo $inscritos->nombre;?></td> 
              <td ><?php echo $inscritos->apellido;?></td>
              <td ><?php if($inscritos->sexo==2)echo "FEMENINO";if($inscritos->sexo==1)echo "MASCULINO";?></td>     
              <td ><?php echo $inscritos->correo;?></td>  
              <td ><?php echo $inscritos->telefono_cel;?></td>          
              <td ><?php echo $inscritos->telefono_hab;?></td> 
              <td ><?php echo $inscritos->trabajo;?></td> 
               <td ><?php echo $inscritos->cargo;?></td> 
               <td ><?php echo $inscritos->residencia;?></td> 
              <td ><?php if($inscritos->rol_id==5) echo "Regular"; elseif ($inscritos->rol_id==8)echo "Nuevo Ingreso" ;{
                  // code...
              }?></td>   
  
       <?php  }?>
        
        <tr>
            <th> <?php echo $key;?></th>
       
        </tr>
       </tbody>
       </table>
