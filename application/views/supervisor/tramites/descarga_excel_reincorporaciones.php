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
                    <th>Estado Domicilio</th>
                    <th>Ultimo Trimestre Inscrito</th>
                    <th>Centro Formación</th>
                    <th>Indice Académico</th>
                    <th>Lapso de Permanencia</th>
                    <th>Trimestre a Inscribir</th>
                    <th>Motivo del Retiro</th>  
                    <th>Resultado de la Revisión para consideración del consejo académico</th>     
                    <th>Procede Reincorporación</th>                          
                    <th >Documentos pendientes en el expediente académico</th> 
                    <th >Responsable de la Revisión </th>      
 		    <th >Estatus del Trámite en el Sistema </th>            
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
              <td><?php echo $listado->domicilio;?></td>
              <td> <?php echo $listado->ult_trimestre_cursado;?></td>
 
                
              <td></td>	
              <td></td>	
              <td></td>	
              <td></td>	
              <td></td>	
              <td></td>	
              <td></td>	
              <td></td>	
              <td></td>	
              <td></td>	
 <td><?php if( $listado->academico==1 and  $listado->conciliado==1 ) echo "Trámite Verificado y <b>Aprobado</b>";
elseif( $listado->academico==2 ) echo "Trámite Verificado y <b>Rechazado</b>" ;?>
          </tr>
        <?php }?>
        <tr>
            <th> <?php echo "Total de reincorporaciones revisados:------->>>>>>>".$key;?></th>       
        </tr>
       </tbody>
       </table>
