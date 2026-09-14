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
      
        table{border-collapse: collapse;  font-style: normal; font-weight: normal;  font-size: 11px;}
      </style>
           <form  action="<?php echo base_url();?>planilla/descargar/<?php echo $this->uri->segment(3); ?>/<?php echo $this->uri->segment(4);?>" method="POST">

          <br />
          <table width="100%" align="center"   border="0"  cellPadding="2"c ellSpacing="1" >  
            <tr >
               <td colspan="2">                
                   <img src="<?php echo base_url(); ?>assets/img/logo1.png" 
                    style="width: 15mm; height: 15mm; margin: 0;" />               
              </td>         
              <th colspan="3" >
                 <div align="center">ESCUELA NACIONAL DE FISCALES DEL MINISTERIO PÚBLICO <br>
              DIRECCIÓN DE SECRETARÍA GENERAL </div>
              </th> 
             <td colspan="2" align="right" >               
               <img  src="/control_estudio/assets/img/logo2.png"   style="width: 15mm; height: 15mm; " />
             </td>
         </tr>
          
         <tr bgcolor="#D0E0F4" color="#1060C8" >
          
            <th colspan="7" >
                
	  <?php foreach($titulo as $titulo){    
                if($titulo->id_tramite==1 or $titulo->id_tramite==2){
                  $titulop=' ARANCEL TRABAJO ESPECIAL DE GRADO/TRABAJO DE GRADO';

                }else{
                  $titulop=$titulo->tramite;
                }
                          
                  }?>
		<div align="center"><b>PLANILLA DE PAGO <?php  echo  $titulop;?>  PERÍODO ACADÉMICO <?php// foreach($periodo as $periodo):?> <?php echo strtoupper($periodo->nombre);// endforeach?></b> </div>


            </th>              
            <td  align="right" >   
                 <img  src="<?php echo base_url(); ?>assets/fotos/<?php echo $datos_alumnos->id_usuario;?>_foto.jpg"  style="width: 15mm; height: 15mm; " />
             </td>

            
                 
         </tr>  
          
          </table> 
           <!-- DATOS DE LA PERSONA -->
          <table width="100%" align="center"   border="1"  cellPadding="2" cellSpacing="1"  >          
               
             
                 <tr bgcolor="#999999" color="#FFFFFF">
                  <th colspan="8">
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
                    <th ><div align="center">CORREO ELECTRÓNICO</div></th>  
                    <td ><?php echo $datos_alumnos->correo; ?></td>
                    </tr>
               <tr>
                   <th> Género</th>
                    <td ><?php if ($datos_alumnos->id_sexo==2) echo "Femenino";else echo"Masculino";?></td>
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
                    <th>DOMICILIADO EN</th>
                    <?php if(!empty($direccion) ):// var_dump($direccion);
                     foreach($direccion as $direccion):?>
                      <td colspan="4">
                        <?php echo $direccion->estado; ?>
                      </td>
                     <?php endforeach;?>
                     <?php endif;?> 
                </tr>
                <tr bgcolor="#999999" color="#FFFFFF">
                      <th colspan="8"><div align="center" >DATOS LABORALES</div></th>
                  </tr>
                  <tr>
                    <th>ORGANISMO O INSTITUCIÓN</th>
                    <td><div align="center"><?php echo $datos_trabajo->lugar_trabajo; ?></div></td>
                    <th> <div align="center">CARGO</div></th>
                     <td><?php echo $datos_trabajo->cargo; ?></td>
                    <th>DIRECCIÓN DE ADSCRIPCIÓN <br>(SÓLO MINISTERIO PÚBLICO)</th>
                     <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>                    
                    <th><div align="center">NÚMEROS TELEFÓNICOS DE OFICINA</div></th> 
                     <td><div align="center"><?php echo $datos_trabajo->tel_trabajo; ?></div></td>                     
                  </tr> 
                <tr>               
                    <th >CIRCUNSCRIPCIÓN</th>
                     <?php if(!empty($circunscripcion)):?>
                    
                      <?php foreach($circunscripcion as $circunscripcion):?>
                  <td colspan="7"><?php echo $circunscripcion->estado; ?></td>
                   <?php endforeach;?>
                  <?php endif;?>   
                </tr>
          </table>
          <!-- DATOS tramiteR -->
          <?php if(!empty($solicitud)):
            // var_dump($solicitud);     ?>  
               
          <table width="100%" align="center"  class="mytable" border="1"  cellPadding="2" cellSpacing="1" >
            <tr  bgcolor="#999999" color="#FFFFFF" align="center">
                    <th>TRÄMITE Y/O SOLICITUD</th>
            </tr>
            <?php //foreach($solicitud as $solicitud):?>
                           
                  <tr>
                      
                           <td align="center"> <?php echo $solicitud->tramite; ?> <br> <?php echo $solicitud->programa; ?></td>
                       
                  </tr>     
                  <?php $especializacion=$solicitud->programa;
        $total_unidades_credito=$solicitud->uc;
                // endforeach;?>
               
          </table>
          <?php endif;?>   
        
          <!-- DATOS ADMINISTRATIVO -->
         <table width="100%" align="center"  border="1"  cellPadding="2" cellSpacing="1" >   
               <tr  bgcolor="#D0E0F4" color="#1060C8" >
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
                      <td> <?php if(!empty($telefono_hab) ):?>
                        <?php foreach($telefono_hab as $telefono_hab):
                        echo $telefono_hab->descripcion.'-'.$datos_alumnos->tel_habitacion; echo ' | ';?>
                        <?php endforeach;?>
                      <?php endif;?>  
                      <?php if(!empty($telefono_cel) ):?>
                        <?php foreach($telefono_cel as $telefono_cel):
                        echo $telefono_cel->descripcion.'-'.$datos_alumnos->tel_celular; ?>
                        <?php endforeach;?>
                      <?php endif;?> </td> 

                   <th>ESPECIALIZACIÓN</th>
                      <td><div align="center">  <?php echo $especializacion;?></div></td> 
                    <th>N° DE UNIDADES CRÉDITO (UC)</th>
                      <td><div align="center">  <?php printf('%02d', $total_unidades_credito);?></div></td>                   
                    <th>TRIMESTRE</th>
                        <td><div align="center"> <?php echo $trimestre_c; ?></div></td>
                </tr>
             </table>
            <!-- DATOS PAGO -->
            <table width="100%" align="center"  border="1"  cellPadding="2" cellSpacing="1" >   
               <tr  bgcolor="#D0E0F4" color="#1060C8" >
                  <th colspan="7">DATOS DEL PAGO DE ARANCEL DE INSCRIPCIÓN</th>
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
              $fecha_preinscripcion=$registro_pago->dregistro;
                    endforeach;?>
                      <?php endif;?>
                <tr  bgcolor="#D0E0F4" color="#1060C8" >
                  <th colspan="6" ><div align="right">Monto Total de Pago ------> </div></th>
                   <th > <?php echo $suma_pago; ?></th>
               </tr> 
       
              </table>


      <!-- DATOS ESTUDIANTE -->
        <table width="100%" align="center"  border="1"  cellPadding="2" cellSpacing="1" >   
               <tr  bgcolor="#D0E0F4" color="#1060C8" >
                <th height="3%" colspan="6"><div align="center">FIRMA DEL ESTUDIANTE</div></th>
              
                <th  colspan="6"><div align="center">DIRECCIÓN DE SECRETARÍA GENERAL</div></th>                  
             </tr>
                    <tr>  
                       <td height="139" colspan="6" valign="bottom"><b>Fecha de Emisión Planilla: </b><?php echo $fecha_preinscripcion;?> </td> 
                  
                       <td height="139" colspan="6" > <div align="center" >Fecha:___/___/_____ <br><br>Nombre(s) y Apellido(s) del Funcionario(a):<br>____________________________________<br><br>SELLO</div></td> 
                    </tr>
                   
               
              </table>


                <p align="center"  style="font-style: normal; font-weight: normal;  font-size: 8px;"><b>NOTA: ESTA PLANILLA DEBE SER CONSIGNADA EN EL ENFMP EN DOS (02) EJEMPLARES.</b>
  <p>
<a href="<?php echo base_url();?>dashboard09/descargar/<?php echo $this->uri->segment(3); ?>/<?php echo $this->uri->segment(4);?>"  target="_blank"title="Haz clic para Imprimir/ Descargar la Planilla" class="btn btn-info">Descargar</a>
          </form>
        </div><!-- /.card-body -->
      </div><!-- /.card card-primary card-outline -->

    </section><!-- /.section-->

 </div>
  <!-- /.content-wrapper -->

