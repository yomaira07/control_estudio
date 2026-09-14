<?php
header("Pragma: public");
header("Expires: 0");
$filename = "matricula_activa.xls";
header("Content-type: application/x-msdownload");
header("Content-Disposition: attachment; filename=$filename");
header("Pragma: no-cache");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");

        print "\xEF\xBB\xBF"; // UTF-8 BOM
?>
<table border="1" cellpadding="5" cellspacing="3">
<tbody>
<tr align="center" style="background: grey;"><td colspan="12">MATRÍCULA ESTUDIANTIL PERÍODO ACADEMICO <?PHP echo $periodo->nombre;?></td></tr>
<tr align="center" style="background: grey;">
  <th>Cédula</th>
  <th>Primer Nombre</th>
  <th>Segundo Nombre</th>
  <th>Primer Apellido</th>  
  <th>Segundo Apellido</th>  
  <th>Programa de Postgrado</th>
  <th>Ultimo Trimestre inscrito</th>
  <th>Sección</th>
  <th>Dia de Clase</th>
  <th>Modalidad</th>
</tr>
      
       <?php $key= count($listado);
       $i=0;
         foreach($listado as $listado){?>
           <tr>
           <td><?php echo $listado->nacionalidad.'-'.$listado->cedula;?></td>
                  <td><?php echo $listado->primer_nombre; ?></td>                    
                    <td><?php echo $listado->segundo_nombre;?></td>
                    <td><?php echo $listado->primer_apellido; ?></td>                    
                    <td><?php echo $listado->segundo_apellido;?></td> 
                  <td><?php echo $listado->programa; ?></td>                    
                    <td><?php echo $listado->trimestre;?></td>

    		    <td><?php echo $listado->secciones;?></td>
                    <td><?php echo $listado->dia;?></td>
                  
                    <td><?php if($listado->modalidad==1)echo "PRESENCIAL";if ($listado->modalidad==2)echo "VIRTUAL";if($listado->modalidad==3)echo "SEMIPRESENCIAL" ?></td>
           </tr>
          
       <?php   $i++;
      }?>
        
        <tr>
            <th> <?php echo $key;?></th>
       
        </tr>
       </tbody>
       </table>
