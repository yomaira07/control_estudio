<html>
<body>

<style>@page {
          margin-top: 1.0cm;
          margin-bottom: 0.5cm;
          margin-left: 1.0cm;
          margin-right: 1.0cm;
      }
       .pie{
          background-color: #DCDCDC;
          position: fixed;
          bottom: 0;
          height: 30px;
          width: 100%;
          font-size: 8px;  
          font-family:'Arial';
          align-content: justify;
      }
        table{
          border-collapse: collapse;  
          font-style: normal; 
          font-weight: normal;  
          font-size: 10px;  
          font-family:'Arial';
          align-content: justify;
        }
        .page_break {
           page-break-before: always;
        }

</style>  

           
       
    <table border="0" cellpadding="0" cellspacing="0" align="center">       
      <tbody>
        <tr >
          <td  colspan="2" rowspan="3" align="right"><img src="<?php echo base_url(); ?>assets/img/logo1.png" 
                  style="width: 15mm; height: 15mm; margin: 0;" />  </td>
          <td  colspan="10"><div align="center">FUNDACIÓN ESCUELA NACIONAL DE FISCALES DEL MINISTERIO PÚBLICO</div></td>
          <td  colspan="2" rowspan="3" align="left"><img src="<?php echo base_url(); ?>assets/img/logo2.png" 
                  style="width: 15mm; height: 15mm; margin: 0;" />  </td>

        </tr>
        <tr >   

          <td  colspan="10" align="center">DIRECCIÓN DE SECRETARÍA GENERAL</td>                
        </tr>
        <tr>             
          <td  colspan="10" align="center">SEDE: DISTRITO CAPITAL</td>
        </tr>     
        <tr >
            <td colspan="12">&nbsp;</td>
          </tr>
          <tr >
            <td colspan="12">&nbsp;</td>
          </tr>
          <tr >
            <td colspan="12">&nbsp;</td>
          </tr>   
      </tbody>
    </table>   
    <table border="0" cellpadding="5" cellspacing="1" align="center">
          <tr >
            <td colspan="8">&nbsp;</td>
            <th bgcolor="#D0E0F4" color="#1060C8" colspan="3" >TRIMESTRE</th>
            <td bgcolor="#999999" color="#FFFFFF" colspan="3" ><?php echo $oferta->trimestre;  ?></td>
          
          </tr>
          <tr >
            <td colspan="8">&nbsp;</td>
            <th bgcolor="#D0E0F4" color="#1060C8" colspan="3">SECCIÓN</th>
            <td bgcolor="#999999" color="#FFFFFF" colspan="3"><?php echo $oferta->seccion;  ?></td>
            
          </tr>
          <tr >
            <td colspan="12">&nbsp;</td>
          </tr>
          <tr >
            <td colspan="12">&nbsp;</td>
          </tr>
          <tr >
            <td colspan="2">&nbsp;</td>
            <th bgcolor="#D0E0F4" color="#1060C8" colspan="2">PROGRAMA DE POSTGRADO</th>                    
            <td colspan="2" bgcolor="#999999" color="#FFFFFF"><?php echo $oferta->programa_nombre;  ?></td>
            <td colspan="5">&nbsp;</td>
          </tr>
          <tr>
            <td colspan="2">&nbsp;</td>       
            <th colspan="4" bgcolor="#D0E0F4" color="#1060C8">EVALUACIÓN CONTÍNUA Y DEFINITIVA</th>                    
            <td colspan="6">&nbsp;</td>
          </tr>
          <tr >
            <td colspan="10">&nbsp;</td>            
            <th bgcolor="#D0E0F4" color="#1060C8">FECHA</th>
            <td colspan="3" bgcolor="#999999" color="#FFFFFF"> <?php echo date('d-m-Y'); ?></td>            
          </tr>
         
           <tr >
            <td colspan="14">&nbsp;</td>          
          </tr>
           <tr >
            <td colspan="14">&nbsp;</td>          
          </tr>
          <tr>
            <td colspan="3"></td>      
            <th bgcolor="#D0E0F4" color="#1060C8">NOMBRE DEL DOCENTE</th>
            <td colspan="4" bgcolor="#999999" color="#FFFFFF"><?php echo $oferta->primer_nombre.' '.$oferta->primer_apellido;  ?></td>      
            <td colspan="6"></td>   
            
          </tr>

          <?php // }
           $ocultar='';
          foreach($unidad_curricular as $unidad_curricular){
            if($unidad_curricular->sigla_uc=='SEI' or $unidad_curricular->sigla_uc=='SEII' or $unidad_curricular->sigla_uc=='SEIII'or  $unidad_curricular->sigla_uc=='SI1' or $unidad_curricular->sigla_uc=='SI' ){  
              if($unidad_curricular->programa=='10' ){    
                  $nota1_e=50;$nota2_e=20;$nota3_e=20;$nota4_e=10;  
               //   echo "estoy aqui";
                  $ocultar=0;  
                }else{
             //     echo "estoy aqui222";
                  $nota1_e=40;$nota2_e=30;$nota3_e=30;
                  $ocultar=1;
                }
              }else{
                $nota1_e=25;$nota2_e=25;$nota3_e=40;$nota4_e=10;
                $ocultar=0;
            }?>
          <tr >
            <td colspan="3"></td>      
            <th bgcolor="#D0E0F4" color="#1060C8">NOMBRE UNIDAD CURRICULAR</th>
            <td colspan="4" bgcolor="#999999" color="#FFFFFF"><?php echo $unidad_curricular->codigo.' '.$unidad_curricular->nombre;?></td>      
            <td colspan="6"></td>   
          </tr>       
       <?php   }?>
          <tr >
             <td colspan="3"></td>      
<!--            <th bgcolor="#D0E0F4" color="#1060C8">MODALIDAD</th>         
             <td colspan="4" bgcolor="#999999" color="#FFFFFF"><?php if($oferta->modalidad==1)echo "PRESENCIAL";if($oferta->modalidad==2)echo "VIRTUAL";if($oferta->modalidad==3)echo "VIRTUASEMIPRESENCIAL";?></td>      -->
            <td colspan="6"></td>   
          </tr>
          <tr >
            <td colspan="14">&nbsp;</td>
            
          </tr>
           </tbody>
          </table>
          <table border="1" cellpadding="5" cellspacing="0" align="center"  >
            <tbody>
          <tr >
            <td Rowspan="2" colspan="4">&nbsp;</td>      
            <?php if( $ocultar==0) {$col=8;}else{$col=6;}?>      
            <th colspan=<?php echo $col;?> bgcolor="#D0E0F4" color="#1060C8">VALOR TOTAL DE CADA EVALUACIÓN</th>
         
            <th rowspan="3" bgcolor="#D0E0F4" color="#1060C8">SUMATORIA DEFINITIVA</th>
            <th rowspan="3" bgcolor="#D0E0F4" color="#1060C8">OBSERVACIONES</th>
          </tr>
          <tr >
          
            <th colspan="2" bgcolor="#D0E0F4" color="#1060C8">1ª</th>
            <th colspan="2" bgcolor="#D0E0F4" color="#1060C8">2ª</th>
            <th colspan="2" bgcolor="#D0E0F4" color="#1060C8">3ª</th>
            <?php if( $ocultar==0) {
               echo "
            <th colspan='2' bgcolor='#D0E0F4' color='#1060C8'>4ª</th>";
             } 
             ?>
          </tr>
          <tr >
            <th  bgcolor="#D0E0F4" color="#1060C8" >N°</th>
            <th  bgcolor="#D0E0F4" color="#1060C8">CÉDULA</th>
           <th  bgcolor="#D0E0F4" color="#1060C8">NOMBRES</th>
            <th  bgcolor="#D0E0F4" color="#1060C8">APELLIDOS</td>
            <th colspan="2"  bgcolor="#999999" color="#FFFFFF"><?php echo $nota1_e?>%</th>
            <th colspan="2"  bgcolor="#999999" color="#FFFFFF"><?php echo $nota2_e?>%</th>
            <th colspan="2"  bgcolor="#999999" color="#FFFFFF"><?php echo $nota3_e?>%</th>
            <?php if(  $ocultar==0) { 
              echo "<th colspan='2'  bgcolor='#999999' color='#FFFFFF'".">".$nota4_e."%</th>";
            }
            ?>
          </tr>
         
        
            
            <?php $i=0;
            foreach($notas as $notas){ 
              $i++;?>
          <tr >
            <td ><?php echo $i;?></td>
             <td ><?php echo $notas->nacionalidad.'-'.$notas->cedula;?></td>
            <td ><?php echo $notas->primer_nombre.' '.$notas->segundo_nombre;?></td>
            <td ><?php echo $notas->primer_apellido.' '.$notas->segundo_apellido;?></td>           
            <td  align="right"><?php echo $notas->nota_1;?></td>
             <td  align="right" ><?php  $total1=(($notas->nota_1 * $nota1_e)/100); echo number_format($total1,2); ?></td>
            <td  align="right"><?php echo $notas->nota_2;?></td>
               <td  align="right"><?php $total2=(($notas->nota_2 * $nota2_e)/100); echo number_format($total2,2); ?></td>
            <td  align="right"><?php echo $notas->nota_3;?></td>
               <td  align="right"><?php  $total3=(($notas->nota_3 * $nota3_e)/100); echo number_format($total3,2);?></td>
            <?php if(  $ocultar==0) { ?>
               <td  align="right" ><?php echo $notas->nota_4;?></td>
               <td  align="right" ><?php  $total4=(($notas->nota_4 * $nota4_e)/100); echo number_format($total4,2);?></td>       
            <?php }?>  
            <td  align="right"><?php echo  number_format($notas->nota_final,2);?></td>
            <td  align="center"><?php echo $notas->observaciones;?></td>
          </tr>
          <?php } ?>
          <tr>
            <th   bgcolor="#D0E0F4" color="#1060C8" colspan="4">TOTAL MATRíCULA ESTUDIANTIL</th>
            <td   bgcolor="#999999" color="#FFFFFF"colspan="8"><?php echo $i;?></td>
          </tr>
        </tbody>        
      </table>
      <div class="page_break"> 
      </div>

      <table border="1" cellpadding="5" cellspacing="0" align="center">
        <tbody>
          <tr >
            <th rowspan="2" bgcolor="#D0E0F4" color="#1060C8">N°</th>
            <th colspan="9" rowspan="2" bgcolor="#D0E0F4" color="#1060C8">TIPO DE EVALUACIÓN APLICADA EN CADA CASO</th>
            <th colspan="3" bgcolor="#D0E0F4" color="#1060C8">FECHA DE APLICACIÓN DE LA EVALUACIÓN</th>            
          </tr>
          <tr bgcolor="#999999" color="#FFFFFF">
            <th >DÍA</th>
            <th >MES</th>
            <th >AÑO</th>          
          </tr>
          <?php foreach ($eva as $eva) {
              strtotime($fecha);
            ?>
            
          <tr >
            <th bgcolor="#999999" color="#FFFFFF" >1ª</th>
            <td colspan="9"><?php echo $eva->nota1.'% '.$eva->tipo_evaluacion1 ?></td>
            <td align="center"><?php echo  $dia=date("d", strtotime($eva->fecha_evaluacion1)); ?></td>
            <td align="center"><?php echo $mes=date("m", strtotime($eva->fecha_evaluacion1)); ?></td>
            <td align="center"><?php echo  $anno=date("Y", strtotime($eva->fecha_evaluacion1)); ?></td>
           
          </tr>
          <tr >
            <th bgcolor="#999999" color="#FFFFFF">2ª</th>
             <td colspan="9"><?php echo $eva->nota2.'% '.$eva->tipo_evaluacion2 ?></td>
            <td align="center"><?php echo  $dia=date("d", strtotime($eva->fecha_evaluacion2)); ?></td>
            <td align="center"><?php echo $mes=date("m",strtotime($eva->fecha_evaluacion2)); ?></td>
            <td align="center" ><?php echo  $anno=date("Y", strtotime($eva->fecha_evaluacion2)); ?></td>
           

          </tr>
          <tr >
            <th bgcolor="#999999" color="#FFFFFF" >3ª</th>
            <td colspan="9"><?php echo $eva->nota3.'% '.$eva->tipo_evaluacion3 ?></td>
            <td align="center"><?php echo  $dia=date("d", strtotime($eva->fecha_evaluacion3)); ?></td>
            <td align="center"><?php echo $mes=date("m",strtotime($eva->fecha_evaluacion3)); ?></td>
            <td align="center" ><?php echo  $anno=date("Y", strtotime($eva->fecha_evaluacion3)); ?></td>
    
        
          </tr>
          <?php if(  $ocultar==0) { echo "
            <tr >
              <th bgcolor='#999999' color='#FFFFFF'>"."4ª</th>
              <td colspan='9'>".$eva->nota4."%".$eva->tipo_evaluacion4."</td>
              <td align='center'>".$dia=date("d", strtotime($eva->fecha_evaluacion4))."</td>
              <td align='center'>".$mes=date("m",strtotime($eva->fecha_evaluacion4))."</td>
              <td align='center' >".$anno=date("Y", strtotime($eva->fecha_evaluacion3))."</td>              
            </tr>";
          } ?>
          <?php }?>
        </tbody>
      </table>
      <br><br>
      
          <p>
      
     
 <table width="70%" align="center"  border="1"  cellPadding="5" cellSpacing="5" >   
               <tr  bgcolor="#D0E0F4" color="#1060C8" >
                <th colspan="6"><div align="center">FIRMA DIRECCIÓN INVESTIGACIÓN Y POSTGRADO</div></th>
	<!--	<th colspan="6"><div align="center">FIRMA DIRECCIÓN GENERAL</div></th>-->
           
                <th  colspan="6"><div align="center">RECIBIDO Y CONFORME DIRECCIÓN DE SECRETARÍA GENERAL</div></th>                  
             </tr>
                    <tr>  
                         <td height="250" colspan="6" > <div align="center" ><br>Fecha:___/___/_____ <br><br>Nombre(s) y Apellido(s) del Funcionario(a):<br><br><br>__________________________________________<br><br><br><br><br><br>SELLO</div></td> 
                    
                        <td height="250" colspan="6" > <div align="center" ><br>Fecha:___/___/_____ <br><br>Nombre(s) y Apellido(s) del Funcionario(a):<br><br><br>__________________________________________<br><br><br><br><br><br>SELLO</div></td> 
                    </tr>
                   
               
              </table>

    <p>
 <table border="0" cellpadding="5" cellspacing="0" align="center">
        <tbody>
          <tr>
            <td colspan="12">&nbsp;</td>
            
          </tr>
          <tr>
            <td colspan="12">&nbsp;</td>
            
          </tr>
          <tr >
            <td  colspan="12" rowspan="2" style="color:#1060C8;">NOTA:<span style="color:#000000; font-family:'Calibri'; font-size:8px"> ESTE REGISTRO DEBE ENTREGARSE IMPRESO Y FIRMADO EN LA DIRECCIÓN DE SECRETARÍA GENERAL, A LOS CINCO (05) DÍAS HÁBILES POSTERIORES A LA CULMINACIÓN DE LA UNIDAD CURRICULAR.</span></td>            
          </tr>     
          </tbody>
      
       
    </table>
      <footer class="pie">

          "Mediante decisión administrativa del Consejo Académico de Investigación y Postgrado, CAIP N° 012-2022 Ordinario, de fecha 15/12/2022, se acuerda que las Actas de Calificaciones serán firmadas por la Dirección de Investigación y Postgrado como responsable de su emisión y la Dirección de Secretaría General dando conformidad de su recepción".      

      </footer>
</body>
</html>
