  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
    <!-- /.container-fluid -->
   
    </section>

    <!-- Main content -->
     <section class="content">
     	<script language="javascript">

  function anterior()
  { 
    location.href="/control_estudio/dashboard05/revision_ac";
  }
  function ver_documentos()
  { 
  var id=document.getElementById("id_usuario").value;
    location.href="<?php  echo base_url()?>dashboard05/documentos/"+id+"/0";

	
  }
  function Inscribir()
  { 
  //document.getElementById('btnguardar').disabled = false;
var id=document.getElementById("id_usuario").value;
    location.href="<?php  echo base_url()?>dashboard05/inscripcion2_rev/"+id;
   
   // $procesado=1;
   
  }
  </script>
  
  </head>
  </head>
   <form action="<?php  echo base_url()?>dashboard05/registro_materias_revisadas/<?Php echo $id_usuario; ?>" method="POST" >
  <div class="card-body">
                        <!-- Mensaje de Alerta-->
 <?php if($this->session->flashdata('success')){ ?>

        <div class="alert alert-success">
            <a href="#" class="close" data-dismiss="alert">&times;</a>
            <strong>Éxito!</strong> </i> <?php echo $this->session->flashdata('success'); ?>
        </div>

    <?php } else if($this->session->flashdata('error')){   $procesado=2;  ?>

        <div class="alert alert-danger">
            <a href="#" class="close" data-dismiss="alert">&times;</a>
            <i class="icon fa fa-ban"></i> <?php echo $this->session->flashdata('error'); ?>
        </div>

    <?php } else if($this->session->flashdata('warning')){  ?>

        <div class="alert alert-warning">
            <a href="#" class="close" data-dismiss="alert">&times;</a>
            <strong>Alerta!</strong> <?php echo $this->session->flashdata('warning'); ?>
        </div>

    <?php } else if($this->session->flashdata('info')){  ?>

        <div class="alert alert-info">
            <a href="#" class="close" data-dismiss="alert">&times;</a>
            <strong>Informacion!</strong> <?php echo $this->session->flashdata('info'); ?>
        </div>
    <?php }else{$procesado=2;} ?>


                     

      <!--Informacion del alumno completo -->
      <table align="center" width="50%">
      <div align="center"><h1>INFORMACI&Oacute;N DEL ALUMNO</h1></div>
	      <div align="center">
			
	        	<table align="center">
 				<?php if(!empty($datos_alumno)):?>
                    <?php //var_dump ($datos_alumno);//foreach($datos_alumno as $datos_alumno):?> 
            <tr>
                        <td> <b>Cedula: </b></td><td><?php echo $datos_alumno->nacionalidad.'-'.$datos_alumno->cedula; ?></td>
                    </tr>
                    <tr>
                        <td> <b>Nombre y Apellido: </b></td>
                        <td> <?php echo $datos_alumno->nombre_primer; ?> <?php echo $datos_alumno->nombre_segundo; ?> <?php echo $atos_alumno->apellido_primer; ?> <?php echo $datos_alumno->apellido_segundo; ?></td>
                    </tr>
                    <tr>
                        <td> <b>Telefonos(s): </b></td>
                        <td><?php echo $datos_alumno->telefono_cel; echo " -- ".$datos_alumno->telefono_hab; ?></td>
                    </tr>
                    <tr>
                        <td> <b>Correo Electronico: </b></td>
                        <td><?php echo $datos_alumno->correo; ?></td>
                    </tr>
                    <?php //endforeach;?>
                     
                    <tr><td> <b>Estado Residencia: </b></td><td><?php echo strtoupper($datos_alumno->residencia); ?></td></tr>
                    <?php endif;?>  
                    <tr><td> <b>Lugar de Trabajo: </b></td><td> <?php echo ($trabajo->lugar_trabajo); ?> </td></tr>
                    <?php if(!empty($listado)):?>
                    <tr ><td colspan="2"><hr></td></tr>
                    <tr ><td colspan="2">Pago(s) Realizado(s)</td></tr>
                    <tr ><td colspan="2"><hr></td></tr>
      
                      <?php foreach($listado as $listado):?>
 					<tr><td> <b>Monto Depositado: </b></td><td><?php echo number_format($listado->monto_depositado, 2, ",", "."); ?></td></tr>
 					<tr><td> <b>Referencia Bancaria: </b></td><td><?php echo $listado->nro_referencia; ?></td></tr>
            <?php endforeach;?>
                  <?php endif;?>  
 					<tr><td> <b>Lugar de Trabajo: </b></td><td> <?php echo ($trabajo->lugar_trabajo); ?> </td></tr>
 		    </table>
	        	 
	        </div>
	   </table>
      <!-- -->

      <!-- /.card -->
        <div align="center"><h1>MATERIAS POR APROBAR</h1></div>

        <div align="center"><h2></h2></div>
        <br>
        <br>

        <div align="center">

        	<table  class="table  table-hover">
                  <thead>
                  <tr>
                    <th>Programa de Postgrado</th>
                    <th>UC</th>
                    <th>Unidad Curricular</th>
                    <th>Trimestre</th>
		    <th>Sección</th>
                    <th>Dia</th>
                    <th>Horario</th>
                    <th>Modalidad</th>

                    <th>Docente</th>
                    <th>Aprobar UC</th>
                    
                  </tr>
                  </thead>
                  <tbody>
                    <?php if(!empty($materias_pre)):?>
                       <?php $total_unidades_credito=0;?>
                      <?php foreach($materias_pre as $materias_pre):?>
                  <tr>

                    <td><?php echo $materias_pre->programa; ?></td>
                    <td><?php echo $materias_pre->uc; ?></td>
                    <td><?php echo $materias_pre->unidad_curricular; ?></td>
                    <td><?php echo $materias_pre->trimestre;?></td>
			 <td><?php echo $materias_pre->secc;?></td>
                    <td><?php echo $materias_pre->dia_clase;?></td>
                    <td><?php echo $materias_pre->horario;?></td>
		    <td><?php if($materias_pre->modalidad==1) echo "PRESENCIAL";if($materias_pre->modalidad==2)echo "VIRTUAL";;if($materias_pre->modalidad==3)echo "SEMIPRESENCIAL";?></td>
                    <td><?php echo $materias_pre->nombre;?> <?php echo $materias_pre->apellido;?></td>
                   
                    <td align="center" id="listado"><input type="checkbox" name="checks[]" value="<?php echo $materias_pre->id ;?>"></td>
                     
                    
                  </tr>
                        <?php $total_unidades_credito=$total_unidades_credito + $materias_pre->uc;?>
                        <?php endforeach;?>
                  <?php endif;?>        
                   <tr><td ><div align="center"><b> Total de Unidades Créditos por Aprobar:<b> </td><td><?php printf('%02d', $total_unidades_credito);?></div></td></tr>
           <?php if(!empty($unidades_creditos_pagadas)):?>
                       <?php $total_unidades_credito=0; ?>
                        <tr><td >
                              <div align="center"><b> Total de Unidades Créditos Pagadas por el Alumno:<b> </td><td>
                      <?php foreach($unidades_creditos_pagadas as $unidades_creditos_pagadas):?>
                           <?php $total_unidades_credito_pagadas+=$unidades_creditos_pagadas->uc;?>                
                      <?php endforeach;?>
                      <?php printf('%02d', $total_unidades_credito_pagadas);?>
                       </div>
                          </td></tr>
                  <?php endif;?>       
                  </tbody>
                </table>
        	
        </div>
        <div aling="center">
        <table width="100%">

          <tr>

            <td height="25">
            
          </td>
        </tr>
          <div >
                <input type="hidden" name="str" id="str">
              
                <input type="hidden" name="id_usuario" id="id_usuario" value="<?php echo $id_usuario; ?>">
               
          </div>

        	<tr>

            <td>
        		<input type="button" name="btnSeguiente" value="Regresar" class="boton btn btn-info" onClick="anterior();">
        	</td>

         
          <td>
             <input type="submit" name="btnguardar" id="btnguardar" value="1. Procesar Materias Inscritas" class="btn btn-warning" title="Paso 1" <?php  //if($procesado==1)echo  'disabled="disabled"';?>  >
          </td>
          <td>
            <input type="button" name="btnInscribir" value="Inscribir Nuevas Materias" class="btn btn-primary" title="Proceso para Inscribir nuevas Materias de ser necesario" onClick="Inscribir(); ">

          </td>
           <td> 
           <input type="button" name="btnDocumentos" value="2.Verificar Documentos" class="btn btn-warning" <?php  if($procesado==2)echo  'disabled="disabled"';?> title="Paso 2" onClick="ver_documentos();">
          </td>
        </tr>
        </table>
         </div>
</form>   
          </div>                    
                      </div><!-- /.card --> 
                  </div><!-- /.card-body -->
              </div><!-- /.card card-primary card-outline -->

        <!-- /.card-body -->

      <!-- /.card card-primary card-outline -->

      </section><!-- /.section-->
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
