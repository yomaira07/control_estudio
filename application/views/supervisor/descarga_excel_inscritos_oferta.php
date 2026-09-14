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
       
<style>@page {
          margin-top: 1.0cm;
          margin-bottom: 0.5cm;
          margin-left: 1.0cm;
          margin-right: 1.0cm;
      }

        table{border-collapse: collapse;  font-style: normal; font-weight: normal;  font-size: 10px;  font-family:'Calibri'; }
        .page_break {
  page-break-before: always;
}

</style>  

           
       
   <table border="0" cellpadding="0" cellspacing="5" align="center">       
      <tbody>
      <?php foreach($unidad_curricular as $unidad_curricular){?>                
                <tr >                  
                  <td colspan="6" bgcolor="#999999" color="#FFFFFF"><?php echo $unidad_curricular->codigo;?></td>                       
                </tr>    
                <tr >                  
                  <td colspan="6" >REPÚBLICA BOLIVARIANA DE VENEZUELA</td>                       
                </tr>   
                <tr >                  
                  <td colspan="6" >MINISTERIO PÚBLICO</td>                       
                </tr>   
             <?php   }?>
        <tr >
          <td  colspan="2" rowspan="3" align="right"><img src="<?php echo base_url(); ?>assets/img/logo1.jpeg" 
                  style="width: 15mm; height: 15mm; margin: 0;" />  </td>
          <td  colspan="2"><div align="center">ESCUELA NACIONAL DE FISCALES DEL MINISTERIO PÚBLICO</div></td>
          <td  colspan="2" rowspan="3" align="left"><img src="<?php echo base_url(); ?>assets/img/logo2.jpeg" 
                  style="width: 15mm; height: 15mm; margin: 0;" />  </td>

        </tr>
        <tr >   

          <td  colspan="2" align="center">DIRECCIÓN GENERAL</td>                
        </tr>
        <tr>             
          <td  colspan="2" align="center">DIRECCIÓN DE SECRETARÍA GENERAL</td>
        </tr>     
        <tr >
            <td colspan="2">&nbsp;</td>
          </tr>
 
      </table>
     <table border="1" cellpadding="0" cellspacing="5" align="center">     
     
          <tr >
           
           <th bgcolor="#999999" color="#FFFFFF" colspan="2">NOMBRE DE LA ESPECIALIZACIÓN</th>                    
           <td colspan="2" bgcolor="#999999" color="#FFFFFF"><?php echo $oferta->programa_nombre;  ?></td>
           <td colspan="2"  bgcolor="#D0E0F4" color="#1060C8"><?php echo $periodo->nombre;?></td>
         </tr>
         <tr >           
           <th bgcolor="#999999" color="#FFFFFF" colspan="2">DIRECCIÓN</th>                    
           <td colspan="2" bgcolor="#999999" color="#FFFFFF">INVESTIGACIÓN DE POSTGRADO</td>
           <td colspan="2"  bgcolor="#D0E0F4" color="#1060C8"  ><?php echo $oferta->trimestre;  ?></td>
         </tr>      
         <tr >           
           <th bgcolor="#999999" color="#FFFFFF" colspan="2">COORDINACIÓN</th>                    
           <td colspan="2" bgcolor="#999999" color="#FFFFFF">POSTGRADO</td>
           <td  bgcolor="#D0E0F4" color="#1060C8" colspan="2"><?php echo "DÍA ".$oferta->dia." HORARIO: ".$oferta->horario;?></td>
         </tr> 
         <tr >
           
           <th bgcolor="#999999" color="#FFFFFF"colspan="2" >MODALIDAD</th>
           <td bgcolor="#999999" color="#FFFFFF" colspan="2" ><?php if ($oferta->modalidad==1)echo "PRESENCIAL"; if ($oferta->modalidad==2)echo "A DISTANCIA"; if ($oferta->modalidad==3)echo "SEMIPRESENCIAL";?></td>
           <td colspan="2"  bgcolor="#D0E0F4" color="#1060C8"><?php echo $unidad_curricular->nombre;?></td>  
         </tr>
         <tr>
                 
                 <th bgcolor="#999999" color="#FFFFFF" colspan="2">NOMBRE DEL DOCENTE</th>
                 <td colspan="2"  bgcolor="#999999" color="#FFFFFF"><?php echo $oferta->primer_nombre.' '.$oferta->primer_apellido;  ?></td>      
                 <td bgcolor="#999999" color="#FFFFFF" colspan="2"><?php echo "SECCIÓN ".$oferta->seccion;  ?></td>                  
          </tr>     
         
        
          <tr >
            
            <th bgcolor="#D0E0F4" color="#1060C8" colspan="2">FECHA DE IMPRESIÓN</th>
            <td colspan="2" bgcolor="#999999" color="#FFFFFF"><?php echo date('d-m-Y h:m') ?></td>      
            <td colspan="2">&nbsp;</td>      
          </tr>
        
          </table>
     <table border="1" cellpadding="0" cellspacing="5" align="center">     
           <tr >
            <th colspan="11"   bgcolor="#D0E0F4" color="#1060C8">ESTUDIANTES INSCRITOS <?PHP echo strtoupper($periodo->nombre); ?></th>  

          </tr>
         
          <tr >
            <th bgcolor="#D0E0F4" color="#1060C8" >N°</th>
            <th  bgcolor="#D0E0F4" color="#1060C8">CÉDULA</th>         
            <th bgcolor="#D0E0F4" color="#1060C8">APELLIDOS</td>
   	<th  bgcolor="#D0E0F4" color="#1060C8">NOMBRES</th>
            <th bgcolor="#D0E0F4" color="#1060C8">GÉNERO</td>
            <th  bgcolor="#D0E0F4" color="#1060C8">CORREO ELECTRÓNICO</td>
            <th  bgcolor="#D0E0F4" color="#1060C8">TELÉFONO</td>
            <th  bgcolor="#D0E0F4" color="#1060C8">LUGAR DE TRABAJO</td>
            <th  bgcolor="#D0E0F4" color="#1060C8">INGRESO</td>
            <th  bgcolor="#D0E0F4" color="#1060C8">CONDICIÓN</td>
		<th  bgcolor="#D0E0F4" color="#1060C8">OBSERVACIÓN</td>
          
          </tr>
         
        
            
            <?php $i=0;
            foreach($matricula as $matricula){ 
              $i++;?>
          <tr >
            <td ><?php echo $i;?></td>
             <td ><?php echo $matricula->nacionalidad.'-'.$matricula->cedula;?></td>
	     <td ><?php echo $matricula->primer_apellido.' '.$matricula->segundo_apellido;?></td>  
            <td ><?php echo $matricula->primer_nombre.' '.$matricula->segundo_nombre;?></td>
                     
            <td align="center"><?php if ($matricula->id_sexo=='2')echo 'FEMENINO'; if ($matricula->id_sexo=='1')echo 'MASCULINO';?></td>
            <td align='center'><?= $matricula->correo; ?></td>      
            <td align='center'><?= $matricula->tel_cel; ?></td>      
            <td ><?php echo $matricula->trabajo;?></td>
            <td ></td>
            <td ><?php if($matricula->retiro==0) echo "ACTIVO";if($matricula->retiro==1) echo "RETIRO VOLUNTARIO";if($matricula->retiro==2) echo "RETIRO MATRÍCULA POR CAUSALES ACADÉMICAS (Parágrafo Uno del artículo 105)";if($matricula->retiro==3) echo "RETIRO MATRÍCULA POR DECISIÓN CAIP";?></td>
		<td ></td>
          </tr>
          <?php } ?>
          <tr>
            <th   bgcolor="#D0E0F4" color="#1060C8" colspan="8">TOTAL MATRÍCULA ESTUDIANTIL</th>
            <td   bgcolor="#999999" color="#FFFFFF"colspan="3"><?php echo $i;?></td>
          </tr>
        </tbody>        
      </table>
    
     

