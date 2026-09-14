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
      <tr align="center"  bgcolor="#D0E0F4">
         <tr>
                    <th>N°</th>
                    <th>Ingreso</th>   
                    <th>Correo Electrónico</th>     
                    <th>Cédula</th>
                    <th>Nombres</th>
                    <th>Apellidos</th>                  
                    <th>Teléfono Celular</th>
                    <th>Lugar de Trabajo</th>    
                    <th>Especialización y/0 Programa Especializado de Postgrado</th>  
 			<th>Modalidad de Egreso</th> 
                    <th>Estado Domicilio</th>
                    
 		    <th >Estatus del Trámite en el Sistema </th>      
         <th  > Revisión</th>       
          </tr>
      </tr>
      
       <?php $key= count($listado); $i=0;
         foreach($listado as $listado){
          $i++; ?>
           <tr>
              <td><?php echo $i; ?></td>	
              <td></td>	
              <td><?php echo $listado->correo; ?></td>	
              <td><?php echo $listado->cedula_est;?></td>
              <td><?php echo $listado->pri_nombre ?> <?php echo $listado->seg_nombre; ?> </td>
              <td><?php echo $listado->pri_apellido ?> <?php echo $listado->seg_apellido ?></td>
              <td><?php echo $listado->cod_cel.'-'.$listado->tel_celular; ?></td>	                           
              <td> <?php echo $listado->lugar_trabajo;?></td>    
              <td><?php echo $listado->programa;?></td>
		 <td><?php if($listado->id_tipo_reconocimiento==5 )echo "ASISTENCIA AL ACTO SOLEMNE DE GRADO";if($listado->id_tipo_reconocimiento==6 )echo "POR SECRETARIA";?></td>
              <td><?php echo $listado->domicilio;?></td>    
                 
                
              
 <td><?php if( $listado->rev_academica==1 and  $listado->reg_pago==1 ) echo "Trámite Verificado y <b>Aprobado</b>";
elseif( $listado->rev_academica==2 ) echo "Trámite Verificado y <b>Rechazado</b>" ;?>

<td><?php echo $listado->usuario;?></td>   
<td><?php   echo $listado->nombres.'- '.date("d-m-Y H:m:s",strtotime($listado->fecha_actualizacion));?></td>   

          </tr>
        <?php }?>
        <tr>
            <th> <?php echo "Total de Solicitudesde egreso revisados:------->>>>>>>".$key;?></th>       
        </tr>
       </tbody>
       </table>
