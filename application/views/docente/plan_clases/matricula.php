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
    location.href="/control_estudio/dashboard06/matricula";
    }
    </script>
       <div class="card">
          
                    <div class="card-header">

                      <h3 class="card-title"><strong>Matrícula de Estudiantes Período :  </strong><?php  echo $periodo->nombre;?>
                     </h3>
                      <br>
                      <h3 class="card-title"><strong>Docente :  </strong><?php  echo $docente->primer_nombre.' '.$docente->segundo_nombre.' '.$docente->primer_apellido.' '.$docente->segundo_apellido ;?>
                     </h3>
                      <br>
                       <h3 class="card-title"><strong>Unidad Curricular :  </strong><?php foreach($unidad_curricular as $unidad_curricular){echo $unidad_curricular->codigo.' '.$unidad_curricular->nombre;}?>
                      </strong></h3>
                      <?php if ($tipo <>'linea'){?>
                      <div align="right">
                        <a title="Descargar a PDF Matricula de Estudiantes de la Unidad Curricular" href="<?php  echo base_url()?>dashboard06/dPDF_matricula/<?php echo $oferta->id_oferta;?>"" target="_blank"><img src="<?php echo base_url(); ?>assets/img/pdf.jpeg"  alt="PDF" style="width: 10mm; height: 10mm; margin: 0;" /></a>                     


                         <a title="Descargar a Excel Matricula de Estudiantes de la Unidad Curricular" href="<?php  echo base_url()?>dashboard06/dExcel/<?php echo $oferta->id_oferta;?>"" target="_blank"><img src="<?php echo base_url(); ?>assets/img/excel.jpg"  alt="Excel" style="width: 10mm; height: 10mm; margin: 0;" /></a>
                      </div>
                      <?php }?>
                      <?php if ($tipo =='linea'){?>
                      <div align="right">
                        <a title="Descargar a PDF Matricula de Estudiantes de la Unidad Curricular" href="<?php  echo base_url()?>dashboard06/dPDF_matriculali/<?php echo $oferta->codigo;?>/<?php echo $periodo->id;?>" target="_blank"><img src="<?php echo base_url(); ?>assets/img/pdf.jpeg"  alt="PDF" style="width: 10mm; height: 10mm; margin: 0;" /></a>                     


                         <a title="Descargar a Excel Matricula de Estudiantes de la Unidad Curricular" href="<?php  echo base_url()?>dashboard06/dExcelli/<?php echo $oferta->codigo;?>/<?php echo $periodo->id;?>" target="_blank"><img src="<?php echo base_url(); ?>assets/img/excel.jpg"  alt="Excel" style="width: 10mm; height: 10mm; margin: 0;" /></a>
                      </div>
                      <?php }?>
                    </div>
                           
                    
                     
                      <div class="card-body">
           
                        <!-- Mensaje de Alerta-->
                        <?php  if ($this->session->flashdata("error")): ?>
                        <div class="alert alert-danger alert-dismissible">
                          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                          <p><i class="icon fa fa-ban"></i> <?php echo $this->session->flashdata("error"); ?> </p>
                        </div>
                      <?php endif; ?>
                        <!-- Fin Mensaje de Alerta-->
                        <!-- Comienzo formulario -->
 <div class="panel panel-default">
            <div class="panel-body">
                <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered table-condensed" id="example1" width="100%">
                    <thead>
                        <tr>
                             <th>N°</th>
                            <th>Cédula</th>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Género</th>
                            <th>Correo / Teléfono</th>
                            <?php if($this->session->userdata('rol')==2 or $this->session->userdata('rol')==4){ ?><th>Cambiar Estatus</th><?php } ?>
                             <th>Observaciones</th>
                           
                            
                           
                        </tr>
                    </thead>
                    <tbody>
                    <?Php $i=0;
                        foreach ($matricula as $matricula) 
                        {   $i++;
                        ?>
                        <tr>
                        <td align='center'><?= $i; ?></td>
                        <td><?= $matricula->nacionalidad.'-'.$matricula->cedula; ?> </td>  
                        <td><?= $matricula->primer_nombre.' '.$matricula->segundo_nombre; ?></td>  
                        <td><?= $matricula->primer_apellido.' '.$matricula->segundo_apellido; ?></td> 
                        <td align="center"><?php if ($matricula->id_sexo=='2')echo 'FEMENINO'; if ($matricula->id_sexo=='1')echo 'MASCULINO';?></td>
                        <td align='center'><?= $matricula->correo.'<br> TLF. '.$matricula->tel_cel; ?></td>
                          <?php if($this->session->userdata('rol')=='2' or $this->session->userdata('rol')==4){ ?>   <td align='center'>  <a href="<?php echo base_url(); ?>dashboard06/act_matricula/<?=$matricula->id_matricula; ?>/<?=$periodo->id;?>"  name="item" class="">
                                <span class='btn-success badge'>
                                <i class="fa fa-pencil">  Actualizar
                            </a>
                          </td><?php } ?>
                          <td align='center'><?PHP if ($matricula->retiro==1) echo 'RETIRO VOLUNTARIO'; if($matricula->retiro==2) echo 'RETIRO MATRÍCULA POR CAUSALES ACADÉMICAS';if($matricula->retiro==0) echo 'ACTIVO';if($matricula->retiro==3) echo 'DECISIÓN CAIP'; ?> </td>  
                        </tr>

                        <?php
                        }
                        ?>
                    </tbody>
                </table>              
            </div>
        </div>

      
               
<div align="center">
      
                  <input type="button" name="btnSeguiente" value="Regresar" class="boton btn btn-info"  title="Regresar" onClick="history.back()"></div>
      
</div>
<br>
 </div><!-- /.card -->
  </div>



    </section>
    <!-- /.content -->



  </div>
