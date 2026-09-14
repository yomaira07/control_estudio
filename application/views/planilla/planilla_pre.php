  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <section class="content">
      <div class="card card-primary card-outline">
        <div class="card-body">
          <style>@page {
          margin-top: 0.5cm;
          margin-bottom: 0.5cm;
          margin-left: 0.5cm;
          margin-right: 0.5cm;
      }
      
        table{border-collapse: collapse;  font-style: normal; font-weight: normal;  font-size: 11px;break-after:page;}

          </style>
          <form  action="<?php echo base_url();?>planilla/descargar_pla_pre/<?php echo $this->uri->segment(3); ?>" method="POST">
         
          <br />
          <table width="100%" align="center"   border="0"  cellPadding="2"cellSpacing="1" >  
            <tr >
               <td  align="right">                
                   <img src="<?php echo base_url(); ?>assets/img/logo1.png" 
                    style="width: 15mm; height: 15mm; margin: 0;" />               
              </td>         
              <th colspan="9" >
              <div align="center">REPÚBLICA BOLIVARIANA DE VENEZUELA <br> MINISTERIO PÚBLICO<BR> ESCUELA NACIONAL DE FISCALES  <br>
              DIRECCIÓN DE SECRETARÍA GENERAL<BR> PROGRAMAS CONDUCENTES A GRADO ACADÉMICO  <br> </div>
              </th> 
             <td  align="right" >               
               <img  src="/control_estudio/assets/img/logo2.png"   style="width: 15mm; height: 15mm; " />
             </td>
         </tr>
         <tr  >
            <th colspan="10" >
                <div align="center"><b>PLANILLA DE REGISTRO DE ASPIRANTES PROCESO DE SELECCIÓN <?php $periodo=2025; echo $periodo; echo "-"; echo $periodo+1; ?> </b></div>
            </th>  
            <td colspan="2" align="center" style="border:1;">   
                 <img  src="<?php echo base_url(); ?>assets/fotos/<?php echo $datos_alumnos->id_usuario;?>_foto.jpg"  style="width: 20mm; height: 20mm; " />
            </td>
          </tr>
          <tr bgcolor="#D0E0F4" color="#1060C8" style="border:1;"> 
            <td colspan="12"><b>PROGRAMA DE POSTGRADO: <?php echo $especializacion=$especializacion->nombre; ?> </b></td>           
          </tr>            
          </table> 
          <!-- DATOS DE LA PERSONA -->
          <table width="100%" align="center"   border="1"  cellPadding="2" cellSpacing="1"  >      
                <tr bgcolor="#999999" color="#FFFFFF">
                  <th colspan="10">
                    <div align="center" >DATOS PERSONALES</div>
                  </th>
                </tr>
                <tr>
                    <th >APELLIDOS</th>
                    <td ><?php echo trim($datos_alumnos->apellido_primer); ?><?php echo ' '.trim($datos_alumnos->apellido_segundo); ?></td>
                    <th >NOMBRES</th>
                    <td ><div align="rigth"><?php echo $datos_alumnos->nombre_primer; ?><?php echo ' '.$datos_alumnos->nombre_segundo; ?></div></td>
                    <th ><div align="rigth">NACIONALIDAD:</div></th><td ><div align="center"> <?php echo $datos_alumnos->nacionalidad; ?></div></td>
                    <th ><div align="rigth">CÉDULA N°</div></th><td > <?php echo $datos_alumnos->cedula; ?></td>
                   
                    </tr>
                <tr>
                <th ><div align="rigth">CORREO ELECTRÓNICO</div></th>  
                    <td ><?php echo $datos_alumnos->correo; ?></td>
                   <th> SEXO</th>
                    <td ><?php if ($datos_alumnos->id_sexo==2) echo "FEMENINO";else echo"MASCULINO";?></td>
                    
                    
                    <th> FECHA DE NACIMIENTO </th>
                    <td ><?php echo date('d-m-Y',strtotime($datos_alumnos->fecha_nac));?>
                    <th> EDAD</th> <td><?php echo $edad.' años';?></td>
                    
           </tr>
                    </table>

                    <table width="100%" align="center"   border="1"  cellPadding="2" cellSpacing="1"  >      
                  <tr      bgcolor="#999999" color="#FFFFFF" >
                      <th colspan="10" ><div align="center">DIRECCIÓN DE DOMICILIO / CONTACTO</div></th>
                </tr>
                <tr>
                    <?php if(!empty($direccion) ):// var_dump($direccion);
                     foreach($direccion as $direccion):?>
                      <td><b>ESTADO :</b> <?php echo strtoupper($direccion->estado);?> </td>
                      <td><b>MUNICIPIO :</b>  <?php echo strtoupper($direccion->municipio);?></td>
                      <td><b>PARROQUIA : </b> <?php echo strtoupper($direccion->estado);?></td>

                      <td colspan="3"><b>DIRECCIÓN DE HABITACIÓN (DETALLADA):</b>  <?php echo $direccion->domicilio;?>       
                     <?php endforeach;?>
                     <?php endif;?> 
                     <th> N° TELÉFONO HABITACIÓN</th>
                    <td >
                      <?php if(!empty($telefono_hab) ):?>
                        <?php foreach($telefono_hab as $telefono_hab):
                        echo $telefono_hab->descripcion.'-'.$datos_alumnos->tel_habitacion; echo ' | ';?>
                        <?php endforeach;?>
                      <?php endif;?>  
                      </td>
                      <th> N° TELÉFONO CELULAR</th>
                    <td >
                      <?php if(!empty($telefono_cel) ):?>
                        <?php foreach($telefono_cel as $telefono_cel):
                        echo $telefono_cel->descripcion.'-'.$datos_alumnos->tel_celular; ?>
                        <?php endforeach;?>
                      <?php endif;?> 

                    </td>
                </tr>
            </table>

              <table width="100%" align="center"   border="1"  cellPadding="2" cellSpacing="1"  >      
                <tr bgcolor="#999999" color="#FFFFFF">
                  <th colspan="11">
                    <div align="center" >DATOS ACADÉMICOS (ESTUDIOS CULMINADOS)</div>
                  </th>
                </tr>
                <tr>
                    <th bgcolor="#D0E0F4" color="#1060C8" colspan="3" >CARRERA DE PREGRADO</th>
                    <td colspan="2"><?php echo trim($datos_academicos_pre->ult_titulo); ?></td>
                    <th >UNIVERSIDAD</th>
                    <td colspan="5"><div align="center"><?php echo $datos_academicos_pre->institucion; ?></div></td>
                </tr>            
                <tr>
                      <th colspan="11" bgcolor="#D0E0F4" color="#1060C8" ><div align="center" >ESTUDIOS DE POSTGRADO REALIZADOS</div></th>
                </tr>    
                <tr>
                      <th colspan="5">PROGRAMA(S) DE POSTGRADO</th>
                      <th  colspan="6" >UNIVERSIDAD</th>
                   
                </tr>  
                          
                    <?php  if(!empty($datos_academicos_post) ):// var_dump($direccion);
                     foreach($datos_academicos_post as $datos_academicos_post):?>
                      <tr>     
                      <td colspan="5">
                        <?php  echo $datos_academicos_post->ult_titulo; ?>
                      </td>
                      <td  colspan="6">
                        <?php echo $datos_academicos_post->institucion; ?>
                      </td>
                 
                      </tr>
                     <?php endforeach;?>
                     <?php else:?> 
                      <tr>     
                      <td colspan="11"><div align="center">
                        NO POSEE ESTUDIOS DE POSTGRADO
                     </div>
                      </td>
                     <?php endif;?>       

              </table>
                <table width="100%" align="center"   border="1"  cellPadding="2" cellSpacing="1"  >      
                <tr bgcolor="#999999" color="#FFFFFF">
                      <th colspan="10"><div align="center" >DATOS LABORALES </div></th>
                  </tr>
                  <tr bgcolor="#D0E0F4" color="#1060C8">
                      <th colspan="10"><div align="center" >TRABAJO ACTUAL</div></th>
                  </tr>
                  <tr> 
                    <th><div align="center">ENTE / ORGANO / EMPRESA</div></th>
                    <td><div align="center"><?php echo $trabajo->lugar_trabajo; ?></div></td>
                    <th> <div align="center">AÑO DE INGRESO</div></th>
                    <td><?php echo $datos_trabajo->anno_ingreso; ?></td>                   
                    <th>DIRECCIÓN DE ADSCRIPCIÓN </th>
                    <td  colspan="3"><?php echo $datos_trabajo->direccion_adscripcion; ?></td>                    
                   
                    <th >ESTADO DE CIRCUNSCRIPCIÓN <br>(SÓLO MINISTERIO PÚBLICO)</th>   
                    <td ><?php if($datos_trabajo->est_cir=='') echo "NO APLICA"; else echo $datos_trabajo->est_cir; ?></td>
                                   
                  </tr> 
                  <tr>                
                     <th><div align="center">NÚMEROS TELEFÓNICOS DE OFICINA</div></th> 
                     <td><div align="center"><?php echo $datos_trabajo->tel_trabajo; ?></div></td>   
                     <th> <div align="center">CARGO</div></th>
                     <td><?php echo $datos_trabajo->cargo; ?></td>
                     <th > <div align="center">FUNCIONES</div></th>
                     <td  colspan="3"><?php echo $datos_trabajo->funciones; ?></td>
                     <th > <div align="center">JUBILADA (O) DE LA ADMINISTRACIÓN PÚBLICA: </div></th>
                     <td  ><?php  if ($datos_trabajo->jubilado==1)echo "SI"; if ($datos_trabajo->jubilado==2)echo "NO";?></td>
                  </tr>
          
                                
              
          </table>
   
          
          <!-- DATOS ADMINISTRATIVO -->
         <table width="100%" align="center"  border="1"  cellPadding="2" cellSpacing="1" >   
               <tr bgcolor="#999999" color="#FFFFFF" >
                  <th colspan="8"><div align="center" >DIRECCIÓN DE GESTIÓN ADMINISTRATIVA</div></th>
                </tr>
               
               <tr  bgcolor="#D0E0F4" color="#1060C8" >
                  <th colspan="7">DATOS DEL PAGO DE ARANCEL</th>
               </tr>  
               <tr>
                  <th>FORMA DE PAGO</th>         
                  <th>NÚMERO DE TRANSFERENCIA</th>     
                  <th>NOMBRE BANCO ORIGEN</th>                   
                  <th>NOMBRE BANCO DESTINO</th> 
                  <th>FECHA DE TRANSFERENCIA</th> 
                  <th>MONTO DE PAGO</th> 
                   <th>APROBADO</th> 
              </tr>
             
                <?php if(!empty($registro_pago) ):
                 // var_dump($registro_pago);
                   foreach($registro_pago as $registro_pago):?>
                <tr>
                  <td><div align="center"><?php if($registro_pago->nro_referencia<>'')echo 'TRANSFERENCIA'; ?></div></td>
                  <td><?php echo $registro_pago->nro_referencia; ?></td>
            
                  <td><?php echo $registro_pago->nombre; ?></td> 
                  <td><?php echo $registro_pago->nombre; ?></td> 
                  <td ><?php echo $registro_pago->fecha_transferencia; ?></td>
                  <td ><?php echo number_format($registro_pago->monto_depositado, 2, ',', '.'); echo ' <b>('.$registro_pago->monto_apagar.' REF.$)</b>' ?></td>
                   <td ><?php if($registro_pago->conciliado==1)echo 'SI'; else echo 'NO';  ?></td>
                </tr>

              <?php $suma_pago=$registro_pago->monto_depositado+$suma_pago;
                    endforeach;?>
                      <?php endif;?>
                <tr  bgcolor="#D0E0F4" color="#1060C8" >
                  <th colspan="6" ><div align="right">Monto Total de Pago ------> </div></th>
                   <th > <?php echo number_format($suma_pago, 2, ',', '.'); ?></th>
               </tr> 
                  </table>
                  <P> 
         
      <!-- DATOS ESTUDIANTE -->
        <table width="100%" align="center"  border="1"  cellPadding="2" cellSpacing="1" >   
               <tr  bgcolor="#D0E0F4" color="#1060C8" >
                <th height="3%" colspan="6"><div align="center">FIRMA DEL ASPIRANTE</div></th>
             
                <th  colspan="6"><div align="center">DIRECCIÓN DE SECRETARÍA GENERAL</div></th>                  
             </tr>
                    <tr>  
                       <td height="139" colspan="6" > </td> 
                      
                       <td height="139" colspan="6" > <div align="center" >Fecha:___/___/_____ <br><br>Nombre(s) y Apellido(s) del Funcionario(a):<br>____________________________________<br><br>SELLO</div></td> 
                    </tr>
                   
               
              </table>


              <p align="center"  style="font-style: normal; font-weight: normal;  font-size: 8px;"><b>NOTA: PRESENTAR ESTA PLANILLA, EL DÍA DE LA PRUEBA PSICOLÓGICA/PSICOMÉTRICA, CON UNA SÍNTESIS CURRICULAR ACTUALIZADA, NO MAYOR A DOS (02) PÁGINAS.  JUNTO A LA FOTOCOPIA DE LA CÉDULA DE IDENTIDAD.</b>
  <p>
           <input  type="submit" name="btnDownload" value ="Descargar" title="Haz clic para Imprimir/ Descargar la Planilla"> 
          </form>
        </div><!-- /.card-body -->
      </div><!-- /.card card-primary card-outline -->

    </section><!-- /.section-->

 </div>
  <!-- /.content-wrapper -->

