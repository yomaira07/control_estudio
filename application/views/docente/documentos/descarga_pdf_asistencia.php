
       
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
          <td   colspan="2" rowspan="3" align="right"><img src="<?php echo base_url(); ?>assets/img/logo1.png" 
                style="width: 15mm; height: 15mm; margin: 0;" />  </td>
          <td   colspan="2"><div align="center">FUNDACIÓN ESCUELA NACIONAL DE FISCALES DEL MINISTERIO PÚBLICO</div></td>
          <td  rowspan="3" colspan="2" align="left"><img src="<?php echo base_url(); ?>assets/img/logo2.png" 
                  style="width: 15mm; height: 15mm; margin: 0;" />  </td>

        </tr>
        <tr >   

          <td  colspan="2" align="center">DIRECCIÓN DE SECRETARÍA GENERAL</td>                
        </tr>
        <tr>             
          <td  colspan="2" align="center">CENTRO DE FORMACIÓN: DISTRITO CAPITAL</td>
        </tr>     
        <tr >
            <td colspan="6">&nbsp;</td>
          </tr>
          <tr >
            <td colspan="6">&nbsp;</td>
          </tr>
          <tr >
            <td colspan="6">&nbsp;</td>
          </tr>   
      </tbody>
    </table>   
    <table>
      <tbody>
          <tr align="center">
           
            <th bgcolor="#D0E0F4" color="#1060C8" colspan="2" >TRIMESTRE</th>
            <td bgcolor="#999999" color="#FFFFFF" colspan="2" ><?php echo $oferta->trimestre;  ?></td>
          
          </tr>
          <tr align="center">
           
            <th bgcolor="#D0E0F4" color="#1060C8" colspan="2">SECCIÓN</th>
            <td bgcolor="#999999" color="#FFFFFF" colspan="2"><?php echo $oferta->seccion;  ?></td>
            
          </tr>
          <tr >
            <td colspan="6">&nbsp;</td>
          </tr>
          <tr >
            <td colspan="6">&nbsp;</td>
          </tr>
          <tr align="center">
           <?php if($oferta->trimestre<>'LÍNEA DE INVESTIGACIÓN'):?>
            <th bgcolor="#D0E0F4" color="#1060C8" colspan="2" >NOMBRE DE LA ESPECIALIZACIÓN</th>   
                           
            <td colspan="2" bgcolor="#999999" color="#FFFFFF"><?php echo $oferta->programa_nombre;  ?></td>
            <?php endif;?>
            <td colspan="2">&nbsp;</td>
          </tr>
        
          <tr align="center">
            
            <th bgcolor="#D0E0F4" color="#1060C8" colspan="2">FECHA</th>
            <td colspan="2" bgcolor="#999999" color="#FFFFFF"><?php echo date('d-m-Y') ?></td>            
          </tr>
        
           <tr >
            <td colspan="6">&nbsp;</td>          
          </tr>
           <tr >
            <td colspan="6">&nbsp;</td>          
          </tr>
          <tr align="center">
                 
            <th bgcolor="#D0E0F4" color="#1060C8" colspan="2">NOMBRE DEL DOCENTE</th>
            <td colspan="2" bgcolor="#999999" color="#FFFFFF"><?php echo $oferta->primer_nombre.' '.$oferta->primer_apellido;  ?></td>      
             
            
          </tr>
             <?php foreach($unidad_curricular as $unidad_curricular){?>
                
          <tr >
         
            <th colspan="2" bgcolor="#D0E0F4" color="#1060C8">NOMBRE UNIDAD CURRICULAR</th>
            <td colspan="2" bgcolor="#999999" color="#FFFFFF"><?php echo $unidad_curricular->codigo.' '.$unidad_curricular->nombre;?></td>      
             
          </tr>       
       <?php   }?>
           <tr >
            <td colspan="6">&nbsp;</td>          
          </tr>
          <tr >
            <td colspan="6">&nbsp;</td>          
          </tr>
          <tr >
            <td colspan="6">&nbsp;</td>          
          </tr>
           <tr align="center" >
            <th colspan="6"  bgcolor="#D0E0F4" color="#1060C8">LISTADO DE ASISTENCIA DE LA MATRICULA ESTUDIANTIL PERIODO <?PHP echo strtoupper($periodo->nombre); ?></th>  

          </tr>
          
        
        <tr >
            <td colspan="6">&nbsp;</td>          
          </tr>
           <tr >
            <td colspan="6">&nbsp;</td>          
          </tr>
        </tbody>
      </table>
           <table border="1" cellpadding="5" cellspacing="0" align="center">       
      <tbody>
          <tr >
            <th  bgcolor="#D0E0F4" color="#1060C8" >N°</th>
            <th  bgcolor="#D0E0F4" color="#1060C8">CÉDULA</th>
            <th  bgcolor="#D0E0F4" color="#1060C8">NOMBRES</th>
            <th  bgcolor="#D0E0F4" color="#1060C8">APELLIDOS</td>
            <th  bgcolor="#D0E0F4" color="#1060C8">GENERO</td>
            <th  bgcolor="#D0E0F4" color="#1060C8">CORREO/TELEFONO</td>           
            <th  bgcolor="#D0E0F4" color="#1060C8">CONTROL ASISTENCIA</td>
          <th  bgcolor="#D0E0F4" color="#1060C8">OBSERVACIONES</td>

          
          </tr>
         
        
            
            <?php $i=0;$asistente=0;$inasistente=0;
            foreach($matricula as $matricula){ 
              $i++;?>
          <tr >
            <td ><?php echo $i;?></td>
             <td ><?php echo $matricula->nacionalidad.'-'.$matricula->cedula;?></td>
            <td ><?php echo $matricula->primer_nombre.' '.$matricula->segundo_nombre;?></td>
            <td ><?php echo $matricula->primer_apellido.' '.$matricula->segundo_apellido;?></td>           
            <td align="center"><?php if ($matricula->id_sexo=='2')echo 'FEMENINO'; if ($matricula->id_sexo=='1')echo 'MASCULINO';?></td>
            <td align='center'><?= $matricula->correo.'<br> TLF. '.$matricula->tel_cel; ?></td>                
             <td align='center'><?PHP if ($matricula->asistencia==1) {echo 'ASISTENTE'; $asistente++;} if($matricula->asistencia==0) {echo 'INASISTENTE';  $inasistente++; } ?> </td>  
             <td align='center'><?PHP if ($matricula->retiro==1) echo 'RETIRO VOLUNTARIO'; if($matricula->retiro==2) echo 'RETIRO MATERIA';if($matricula->retiro==0) echo 'ACTIVO'; ?> </td>  
          </tr>
          <?php } ?>
          <tr>
            <th   bgcolor="#D0E0F4" color="#1060C8" colspan="6">TOTAL MATRíCULA ESTUDIANTIL</th>
            <td   bgcolor="#999999" color="#FFFFFF"colspan="2"><?php echo $i;?></td>
          </tr>
          <tr>
            <th   bgcolor="#D0E0F4" color="#1060C8" colspan="6">TOTAL ASISTENTES</th>
            <td   bgcolor="#999999" color="#FFFFFF"colspan="2"><?php echo $asistente;?></td>
            </tr>
          <tr>
            <th   bgcolor="#D0E0F4" color="#1060C8" colspan="6">TOTAL INASISTENTES</th>
            <td   bgcolor="#999999" color="#FFFFFF"colspan="2"><?php echo $inasistente;?></td>
          </tr>
        </tbody>        
      </table>
    
     