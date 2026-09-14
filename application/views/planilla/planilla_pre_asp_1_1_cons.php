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
   <form  action="<?php echo base_url();?>consultas/descargar_pla_pre_asp/<?php echo $this->uri->segment(3).'/'.$this->uri->segment(4).'/'.$this->uri->segment(5);?> " method="POST">
         
          <br />
          <table width="100%" align="center"   border="0"  cellPadding="2"c ellSpacing="1" >  
            <tr >
               <td colspan="2">                
                   <img src="<?php echo base_url(); ?>assets/img/logo1.png" 
                    style="width: 15mm; height: 15mm; margin: 0;" />               
              </td>         
              <th colspan="4" >
              <div align="center">REPÚBLICA BOLIVARIANA DE VENEZUELA <br> MINISTERIO PÚBLICO<BR> ESCUELA NACIONAL DE FISCALES  <br>
              DIRECCIÓN DE SECRETARÍA GENERAL </div>
              </th> 
             <td colspan="2" align="right" >               
               <img  src="/control_estudio/assets/img/logo2.png"   style="width: 15mm; height: 15mm; " />
             </td>
         </tr>
         <tr bgcolor="#D0E0F4" color="#1060C8" >
          
            <th colspan="8" >
                 <?php  // var_dump($data) ;var_dump($this->id_programa) ;

                // if(!empty($periodo)):?>
              <?php // foreach($periodo as $periodo):

              ?>
                <div align="center"><b>REGISTRO DE ASPIRANTES A CURSAR PROGRAMAS DE POSTGRADO <br>  <?php echo $especializacion->nombre; ?>  <br>SEDE: DISTRITO CAPITAL <br> Período: <b> <?php foreach($periodo as $periodo): echo $periodo->nombre; endforeach ?> </b>   </div>
            </th>              
              <?php  $especializacion=$especializacion->nombre;//endforeach;?>
              <?php //endif;?>   
               <td  align="right" >   
                 <img  src="<?php echo base_url(); ?>assets/fotos/<?php echo $datos_alumnos->id_usuario;?>_foto.jpg"  style="width: 15mm; height: 15mm; " />
             </td>
                 
         </tr>  
          
          </table> 
          <!-- DATOS DE LA PERSONA -->
          <table width="100%" align="center"   border="1"  cellPadding="2" cellSpacing="1"  >          
           

                      
                <tr bgcolor="#999999" color="#FFFFFF">
                  <th colspan="9">
                    <div align="center" >DATOS PERSONALES</div>
                  </th>
                </tr>
                <tr>
                    <th >APELLIDOS</th>
                    <td ><?php echo trim($datos_alumnos->apellido_primer); ?><?php echo ' '.trim($datos_alumnos->apellido_segundo); ?></td>
                    <th >NOMBRES</th>
                    <td ><div align="center"><?php echo $datos_alumnos->nombre_primer; ?><?php echo ' '.$datos_alumnos->nombre_segundo; ?></div></td>
                    <th ><div align="center">CÉDULA N°</div></th>
                     <td > <?php echo $datos_alumnos->cedula; ?></td>
                    <th colspan="2"><div align="center">CORREO ELECTRÓNICO</div></th>  
                    <td ><?php echo $datos_alumnos->correo; ?></td>
                    </tr>
                <tr>
                   <th> SEXO</th>
                    <td ><?php if ($datos_alumnos->id_sexo==2) echo "FEMENINO";else echo"MASCULINO";?></td>
                    <th> NÚMEROS TELEFÓNICOS</th>
                    <td >
                      <?php if(!empty($telefono_hab) ):?>
                        <?php foreach($telefono_hab as $telefono_hab):
                        echo $telefono_hab->descripcion.'-'.$datos_alumnos->tel_habitacion; echo ' | ';?>
                        <?php endforeach;?>
                      <?php endif;?>  
                      <?php if(!empty($telefono_cel) ):?>
                        <?php foreach($telefono_cel as $telefono_cel):
                        echo $telefono_cel->descripcion.'-'.$datos_alumnos->tel_celular; ?>
                        <?php endforeach;?>
                      <?php endif;?> 

                    </td>
                    <th>DIRECCIÓN DE HABITACIÓN</th>
                    <?php if(!empty($direccion) ):// var_dump($direccion);
                     foreach($direccion as $direccion):?>
                      <td colspan="4">
                        <?php echo $direccion->domicilio.',ESTADO '.strtoupper($direccion->estado).', MUNICIPIO '.strtoupper($direccion->municipio).', PARROQUIA '.strtoupper($direccion->parroquia); ?>
                      </td>
                     <?php endforeach;?>
                     <?php endif;?> 
                </tr>
              </table>

              <table width="100%" align="center"   border="1"  cellPadding="2" cellSpacing="1"  >      
                <tr bgcolor="#999999" color="#FFFFFF">
                  <th colspan="8">
                    <div align="center" >DATOS ACADÉMICOS (ESTUDIOS CULMINADOS)</div>
                  </th>
                </tr>
                <tr>
                    <th bgcolor="#D0E0F4" color="#1060C8" >CARRERA DE PREGRADO</th>
                    <td ><?php echo trim($datos_academicos_pre->ult_titulo); ?></td>
                    <th >UNIVERSIDAD</th>
                    <td ><div align="center"><?php echo $datos_academicos_pre->institucion; ?></div></td>
                    <th ><div align="center">AÑO DE INGRESO</div></th>
                     <td > <?php echo $datos_academicos_pre->anno_ingreso; ?></td>
                    <th ><div align="center">AÑO DE GRADUACION</div></th>  
                    <td ><?php echo $datos_academicos_pre->anno_graduacion; ?></td>
                    </tr>
                <tr>
                   <th> INDICE ACADÉMICO</th>
                    <td ><?php echo $datos_academicos_pre->indice_academico;?></td>
                    <th> TÍTULO OBTENIDO</th>
                    <td colspan=5 ><?php echo $datos_academicos_pre->titulo_obtener;?></td>
                </tr>
                <tr>
                      <th colspan="8" bgcolor="#D0E0F4" color="#1060C8" ><div align="center" >ESTUDIOS DE POSTGRADO REALIZADOS</div></th>
                </tr>    
                <tr>
                      <th colspan="2" >PROGRAMA DE POSTGRADO</th><th >UNIVERSIDAD</th>
                      <th >AÑO DE INGRESO</th><th >AÑO DE GRADUACIÓN</th>
                      <th >ÍNDICE ACADÉMICO</th><th colspan=2 >TEMA DE TRABAJO DE GRADO</th>
                </tr>  
                          
                    <?php  if(!empty($datos_academicos_post) ):// var_dump($direccion);
                     foreach($datos_academicos_post as $datos_academicos_post):?>
                      <tr>     
                      <td colspan="2">
                        <?php  echo $datos_academicos_post->ult_titulo; ?>
                      </td>
                      <td >
                        <?php echo $datos_academicos_post->institucion; ?>
                      </td>
                      <td >
                        <?php echo $datos_academicos_post->anno_ingreso; ?>
                      </td>
                      <td >
                        <?php echo $datos_academicos_post->anno_graduacion; ?>
                      </td>
                      <td >
                        <?php echo $datos_academicos_post->indice_academico; ?>
                      </td>
                      <td colspan="2">
                        <?php echo $datos_academicos_post->tema_grado; ?>
                      </td>
                      </tr>
                     <?php endforeach;?>
                     <?php endif;?> 

                     <tr >
                  <th colspan="8"  bgcolor="#D0E0F4" color="#1060C8">
                    <div align="center" >FORMACIÓN NO CONDUCENTE A GRADO: CURSOS, TALLERES, DIPLOMADOS (realizados en los últimos cinco años)</div>
                  </th>
                </tr>
                  
                <tr> 
                     <th colspan=4>NOMBRE</th>
                    <th colspan=3> INSTITUCIÓN</th>
                    <th>AÑO</th>
                    
                </tr>

                    <?php if(!empty($datos_academicos) ):// var_dump($direccion);
                     foreach($datos_academicos as $datos_academicos):?>
                <tr>
                      <td colspan=4>
                        <?php echo $datos_academicos->estudio_realizado; ?>
                      </td>
                      <td colspan=3>
                        <?php echo $datos_academicos->institucion; ?>
                      </td>
                      <td >
                        <?php echo $datos_academicos->anno_realizado; ?>
                      </td>
                </tr>                     
                     <?php endforeach;?>
                     <?php endif;?> 

              </table>
                <table width="100%" align="center"   border="1"  cellPadding="2" cellSpacing="1"  >      
                <tr bgcolor="#999999" color="#FFFFFF">
                      <th colspan="8"><div align="center" >DATOS LABORALES </div></th>
                  </tr>
                  <tr bgcolor="#D0E0F4" color="#1060C8">
                      <th colspan="8"><div align="center" >TRABAJO ACTUAL</div></th>
                  </tr>
                  <tr> 
                    <th><div align="center">ENTE / ORGANO / EMPRESA</div></th>
                    <td><div align="center"><?php echo $trabajo->lugar_trabajo; ?></div></td>
                    <th> <div align="center">AÑO DE INGRESO</div></th>
                    <td><?php echo $datos_trabajo->anno_ingreso; ?></td>                   
                    <th>DIRECCIÓN DE ADSCRIPCIÓN </th>
                    <td><?php echo $datos_trabajo->direccion_adscripcion; ?></td>                    
                    <th >CIRCUNSCRIPCIÓN <br>(SÓLO MINISTERIO PÚBLICO)</th>   
                    <td ><?php if($datos_trabajo->circunscripcion=='') echo "NO APLICA"; else echo $datos_trabajo->circunscripcion; ?></td>
                                   
                  </tr> 
                  <tr>                
                     <th><div align="center">NÚMEROS TELEFÓNICOS DE OFICINA</div></th> 
                     <td><div align="center"><?php echo $datos_trabajo->tel_trabajo; ?></div></td>   
                     <th> <div align="center">CARGO</div></th>
                     <td><?php echo $datos_trabajo->cargo; ?></td>
                     <th > <div align="center">FUNCIONES</div></th>
                     <td colspan=3 ><?php echo $datos_trabajo->funciones; ?></td>
                  </tr>
                  <tr bgcolor="#D0E0F4" color="#1060C8">
                      <th colspan="8"><div align="center" >TRABAJO(S) ANTERIOR(ES) </div></th>
                  </tr>
                  <tr>
                    <th><div align="center">ENTE / ORGANO / EMPRESA</div></th>
                    <th> <div align="center">AÑO DE INGRESO</div></th>
                    <th>DIRECCIÓN DE ADSCRIPCIÓN </th>
                    <th >CIRCUNSCRIPCIÓN <br>(SÓLO MINISTERIO PÚBLICO)</th>
                    <th><div align="center">NÚMEROS TELEFÓNICOS DE OFICINA</div></th> 
                    <th> <div align="center">CARGO</div></th>
                    <th colspan=2 > <div align="center">FUNCIONES</div></th>
                  </tr>
                  <?php if(!empty($datos_trabajo_ant)):?>                    
                    <?php foreach($datos_trabajo_ant as $datos_trabajo_ant):?>
                  <tr>
                      <td><div align="center"><?php echo $datos_trabajo_ant->lugar_trabajo; ?></div></td>                   
                      <td><?php echo $datos_trabajo_ant->anno_ingreso; ?></td> 
                      <td><?php echo $datos_trabajo_ant->direccion_adscripcion; ?></td> 
                      <td ><?php echo $datos_trabajo_ant->circunscripcion; ?></td>
                      <td ><div align="center"><?php echo $datos_trabajo_ant->tel_trabajo; ?></div></td>   
                      <td><?php  echo $datos_trabajo_ant->cargo; ?></td>
                      <td colspan=2 ><?php echo $datos_trabajo_ant->funciones; ?></td>  
                    </tr>      
                     <?php endforeach;?>
                    <?php endif;?>     
                          
                                
              
          </table>
        <P> 
          
          <!-- DATOS ADMINISTRATIVO -->
         <table width="100%" align="center"  border="1"  cellPadding="2" cellSpacing="1" >   
               <tr bgcolor="#999999" color="#FFFFFF" >
                  <th colspan="8"><div align="center" >DIRECCIÓN DE GESTIÓN ADMINISTRATIVA</div></th>
                </tr>
                <tr>
                    <th >APELLIDOS</th>
                      <td><?php echo trim($datos_alumnos->apellido_primer); ?><?php echo ' '.trim($datos_alumnos->apellido_segundo); ?></td> 
                    <th>NOMBRES</th>
                      <td><?php echo $datos_alumnos->nombre_primer; ?><?php echo ' '.$datos_alumnos->nombre_segundo; ?></td> 
                    <th>CÉDULA N°</th>
                      <td><?php echo $datos_alumnos->cedula; ?></td> 
                    <th >CORREO ELECTRÓNICO</th>  
                     <td><?php echo $datos_alumnos->correo; ?></td> 
                 </tr>
                 <tr>
                  <th> NÚMEROS TELEFÓNICOS</th>
                 <td> 
                        <?php 
                        echo $telefono_hab->descripcion.'-'.$datos_alumnos->tel_habitacion; echo ' | ';    
                        echo $telefono_cel->descripcion.'-'.$datos_alumnos->tel_celular; ?>
                 </td>
                    <th>ESPECIALIZACIÓN</th>
                      <td colspan="11"><div align="center">  <?php echo $especializacion; ?></div></td> 
                
                </tr>
             </table>
            <!-- DATOS PAGO -->
            <!-- DATOS PAGO -->
            <table width="100%" align="center"  border="1"  cellPadding="2" cellSpacing="1" >   
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
                  <td ><?php echo $registro_pago->monto_depositado; ?></td>
                   <td ><?php if($registro_pago->conciliado==1)echo 'SI'; else echo 'NO';  ?></td>
                </tr>

              <?php $suma_pago=$registro_pago->monto_depositado+$suma_pago;
                    endforeach;?>
                      <?php endif;?>
                <tr  bgcolor="#D0E0F4" color="#1060C8" >
                  <th colspan="6" ><div align="right">Monto Total de Pago ------> </div></th>
                   <th > <?php echo $suma_pago; ?></th>
               </tr> 
                  </table>

                  <P> <P> <P> 
                  <table width="100%" align="center"  border="1"  cellPadding="2" cellSpacing="1" >   
               <tr  bgcolor="#999999" color="#FFFFFF" >
                  <th colspan="8"><div align="center" >DATOS DE INTERÉS</div></th>
                </tr>
                <tr>
                    <th >EXPERIENCIA RELACIONADA CON EL PROGRAMA DE POSTGRADO SELECCIONADO</th>
                    <td colspan="2"><?php if ($datos_admitido->experiencia_postgrado==1)echo 'SI '.trim($datos_admitido->senale_experiencia); else echo 'NO '?></td> 
                     
                    <th>SEÑALE TRES FORTALEZAS QUE LE CARACTERICEN</th>
                      <td><?php echo $datos_admitido->fortalezas; ?></td> 
                    <th>SEÑALE TRES CARACTERÍSTICAS DE SU PERSONALIDAD QUE CONSIDERE PUEDE MEJORAR </th>
                      <td><?php echo $datos_admitido->personalidad; ?></td> 
                   
                 </tr>
               
             </table>
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


            <p align="center"  style="font-style: normal; font-weight: normal;  font-size: 8px;"><b>NOTA: ESTA PLANILLA DEBE SER CONSIGNADA EN LA ENFMP EN DOS (02) EJEMPLARES. <br> EN CASO DE  QUEDAR SELECCIONADA/O EN LA FASE DE ENTREVISTA, DEBERÁ IMPRIMIR, FIRMAR Y PRESENTAR ESTA PLANILLA JUNTO A LA FOTOCOPIA DE LA CÉDULA DE IDENTIDAD EL DÍA QUE LE CORRESPONDA.</b>
  <p>
           <input  type="submit" name="btnDownload" value ="Descargar" title="Haz clic para Imprimir/ Descargar la Planilla"> 
          </form>
        </div><!-- /.card-body -->
      </div><!-- /.card card-primary card-outline -->

    </section><!-- /.section-->

 </div>
  <!-- /.content-wrapper -->

