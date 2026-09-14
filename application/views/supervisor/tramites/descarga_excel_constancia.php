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
<th colspan="9" >
<h1 ><?php echo $titulo; echo "Fecha de Emisión:".date('d-m-Y');?></h1>
<h3> Período Académico <?php 
    echo $periodo->nombre;
    foreach($periodo as $periodo):
      echo $periodo->nombre;
    endforeach
      ?>
</h3>
</th>
</tr>
        <tr align="center" style="background: grey;">
         <tr>
                  <th>Cédula</th>
                    <th>Nombres</th>
                    <th>Apellidos</th>
                    <th>Correo Electrónico</th>
                    <th>Teléfono de Habitación</th>
		    <th>Teléfono Celular</th>
                    <th>Especialización y/o Programa Especializado de Postgrado</th>   
                    <th>Trimestre</th>  
                    <th>Período</th>      
                    <th>Código Asignado</th>      
                    <th>Fecha de Solicitud del Tramite</th>
                    <th>Fecha de validación pago del arancel</th>    
        </tr>
        </tr>
      
       <?php $key= count($listado);
         foreach($listado as $listado){?>
           <tr>
           <td><?php echo $listado->cedula_est;?></td>
                    <td><?php echo $listado->pri_nombre ?> <?php echo $listado->seg_nombre; ?></td> 
                    <td> <?php echo $listado->pri_apellido ?> <?php echo $listado->seg_apellido ?></td>
		            <td><?php echo $listado->correo; ?></td>	
  			        <td><?php echo $listado->cod_hab.'-'.$listado->tel_habitacion;?></td>
                <td> <?php echo $listado->cod_cel.'-'.$listado->tel_celular; ?></td>		                           
                   <td><?php echo $listado->programa;?></td>
                     <td> <?php echo $listado->trimestre; ?></td> 
                     <td> <?php echo $listado->periodo; ?></td> 
                     <td><?php echo "<b>".$listado->nro_constancia."</b>";?>  </td>
                     <td><?php echo  date("d/m/Y", strtotime($listado->fecha_solicitud)); ?></td>
                     <td><?php echo  date("d/m/Y", strtotime($listado->dactualizo)); ?></td>
        
                     </tr>
        <?php }?>
        <tr>
            <th> <?php echo "Total de constancia de canceladas: ".$key;?></th>
       
        </tr>
       </tbody>
       </table>

