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

           
       
    <table border="0" cellpadding="0" cellspacing="0" align="center">       
      <tbody>
        <tr >
          <td  colspan="2" rowspan="3" align="right"><img src="<?php echo base_url(); ?>assets/img/logo1.png" 
                  style="width: 15mm; height: 15mm; margin: 0;" />  </td>
          <td  colspan="2"><div align="center">FUNDACIÓN ESCUELA NACIONAL DE FISCALES DEL MINISTERIO PÚBLICO</div></td>
          <td  colspan="2" rowspan="3" align="left"><img src="<?php echo base_url(); ?>assets/img/logo2.png" 
                  style="width: 15mm; height: 15mm; margin: 0;" />  </td>

        </tr>
        <tr >   

          <td  colspan="2" align="center">DIRECCIÓN DE SECRETARÍA GENERAL</td>                
        </tr>
       
           <tr >
            <th colspan="6"  bgcolor="#D0E0F4" color="#1060C8">LISTADO OFERTA ACADEMICAS ESTATUS DE NOTAS CARGADAS PERIODO <?PHP echo strtoupper($periodo->nombre); ?></th>  

          </tr>
          <tr >
            <td colspan="6">&nbsp;</td>          
          </tr>
          <tr >
            <td colspan="6">&nbsp;</td>          
          </tr>
        
                
        
            <td colspan="6">&nbsp;</td>          
          </tr>
           <tr >
            <td colspan="6">&nbsp;</td>          
          </tr>
         <thead>
                        <tr>
                            <th>N°</th>
                            <th>Especialización</th>
                            <th>Código de la Unidad Curricular</th>
                            <th>Nombre de la Unidad Curricular</th>  
   <th>Total Unidad de Crédito</th>   
 <th>Docente</th>  
                           <th>Modalidad</th>
			<th>Día de Clase</th>
                          
                             <th>Total Estudiantes Inscritos</th>                      
                            <th >Estatus Notas</th>
                            <th >Estatus Plan Evaluación</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?Php $i=0;
                        foreach ($unidades_curriculares as $uc) 
                        { $i++;
                        ?>
                        <tr>
                             <td><?= $i; ?></td>  
                             <td><?= $uc->programa_nombre; ?></td>  
                        <?php echo "<td align='center'>"; ?>                         
                          <?= $uc->codigo; ?>
                                </a>                           
                             </td>                         
                            <td><?= $uc->nombre; ?></td> 
                            <td align="center"><?= $uc->uc; ?></td>
                            <td align="center"><?= $uc->docente; ?></td>
			    <td align="center"><?php if($uc->modalidad==1)echo 'PRESENCIAL'; else echo'A DISTANCIA'; ?></td>
			    <td align="center"><?= $uc->dia; ?></td>
                            <td align="center"><i class="fa fa-users"><?= $total[$i]; ?></i></td>
                            <td> 
                               <?php if($uc->cerrar_proceso==1){ echo 'Proceso Cerrado(Notas cargadas)';} ?>
                              <?php if($uc->cerrar_proceso==0){ echo 'Proceso Sin Cerrar'; } ?>
                            </td>         
                             <td> 

                                <?php if($uc->plan > 0){echo 'Plan Evaluación Cargado'; }else{ echo 'Plan Evaluacion Sin cargar';} ?>   
                            </td>                         

                        </tr>
                        <?php
                        }
                        ?>
                    </tbody>       
      </table>
    
     
