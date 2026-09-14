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
<h3> Período  <?php 
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
                  <th>Fecha de Solicitud del Tramite</th>
                  <th>Correo Electrónico</th>
                  <th>Cédula</th>
                  <th>Nombres</th>
                  <th>Apellidos</th>
                  <th>Teléfono Habitación</th>
                  <th>Teléfono Celular</th>  
                  <th>Especialización y/0 Programa Especializado de Postgrado</th>  
                  <th>Período Académicos</th>
                  <th>Horario de Clase </th>            
                  <th>Unidad(es) Curricular(es) o Trimestre a retirar</th>     
                  <th>Estatus del Trámite</th>   
                  <th>Motivo de solicitud de retiro voluntario ( CARTA )</th>                 
                  </tr>
        </tr>
      
       <?php $key= count($listado);
         foreach($listado as $listado){?>
           <tr>
              <td><?php echo  date("d/m/Y", strtotime($listado->fecha_solicitud)); ?></td>
              <td><?php echo $listado->correo; ?></td>	
              <td><?php echo $listado->cedula_est;?></td>
              <td><?php echo $listado->pri_nombre ?> <?php echo $listado->seg_nombre; ?></td>
              <td> <?php echo $listado->pri_apellido ?> <?php echo $listado->seg_apellido ?></td>              
              <td><?php echo $listado->cod_hab.'-'.$listado->tel_habitacion;?></td>
              <td><?php echo $listado->cod_cel.'-'.$listado->tel_celular; ?></td>		   
              <td><?php echo $listado->programa;?></td>
              <td> <?php echo $listado->periodo; ?></td> 
              <td><?php echo "<b>".$listado->pensum."</b>";?>  </td>
              <td><?php echo "<b>Modalidad:</b>" ;if($listado->modalidad==1) echo "Presencial <br>"; elseif($listado->modalidad==2)echo "A Distancia <br>"; elseif($listado->modalidad==3)echo "Semipresencial <br>";
              echo "<b> Día de Clases: </b>".$listado->dia_clase; echo "<br><b> Horario: </b>".$listado->horario;?>  </td>
                 <td> <?php  if( $listado->revision_solicitud==0 ) echo "Trámite Pendiente por Revisión y Aprobación";elseif( $listado->rev_academica==1 and  $listado->retiro==0 and $listado->revision_solicitud==1) echo "Trámite Revisado sin Aprobación";elseif( $listado->rev_academica==1 and  $listado->retiro==1 and $listado->revision_solicitud==1) echo "Trámite Revisado y Aprobado" ;elseif($listado->revision_solicitud==2 ) echo "Trámite Revisado y Rechazado" ;?></td> 

                     </tr>
        <?php }?>
        <tr>
            <th> <?php echo "Total de retiros voluntarios revisados".$key;?></th>
       
        </tr>
       </tbody>
       </table>

