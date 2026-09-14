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

<table border="1" cellpadding="5" cellspacing="3">
 <thead>
	<tr>
	<th colspan="9" >
	<?php echo $titulo; echo "Fecha de Emisión:".date('d-m-Y');?>
	 Período 
	   <?php foreach($periodo as $periodo): echo $periodo->nombre; endforeach?>
	</th>
	</tr> 
        <tr align="center" style="background: grey;">
        	    <td>Cédula</td>
                    <td>Nombres y Apellidos</td>
                    <td>Correo Electrónico</td>
                    <td>Nuevo Ingreso/Regular</td>                    
                    <td>Fecha de Solicitud del Tramite</td>
                    <td>Especialización y/0 Programa Especializado de Postgrado</td>  
                    <td>Tramite y/o Solicitud</td>   
                    <td >Unidades de Crédito Aprobadas</td>               
                    <td >Estatus de Conciliación</td> 
                    <td >Estatus del Trámite y/o Solicitud</td> 
        </tr>      
  </thead>
<tbody>
       <?php $key= count($listado);
         foreach($listado as $listado){?>
           <tr>
           	<td><?php echo $listado->cedula_est;?></td>
                <td><?php echo $listado->pri_nombre; ?> <?php echo $listado->seg_nombre; ?> <?php echo $listado->pri_apellido; ?> <?php echo $listado->seg_apellido; ?></td>
		<td><?php echo $listado->correo; ?></td>			
                    <td><?php  if($listado->rol_id==5)echo 'REGULAR';  else if($listado->rol_id=='8')echo 'NUEVO INGRESO'; ?></td>                  
                    <td><?php echo  date("d/m/Y", strtotime($listado->fecha_solicitud)); ?></td>
                     <td><?php echo $listado->programa;?></td>
                     <td> <?php echo $listado->tramite; ?></td>  
                     <td> <?php echo $listado->uc; ?></td> 
                     <td> <?php if($listado->reg_pago==1) echo "Pago Conciliado"; else echo "Pago No Conciliado" ;?></td>  
                     <td> <?php if( $listado->rev_academica==1) echo "Trámite Aprobado";else echo "Trámite Pendiente por Aprobar" ;?></td>         
                     </tr>
        <?php }?>
        <tr>
            <th> <?php echo "Total de trámites y/o solicitudes".$key;?></th>       
        </tr>
       </tbody>
       </table>
