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
    location.href="/control_estudio/dashboard05/revisar_datos/<?php echo $alumno->id_usuario; echo"/0"; ?>";
  }
  </script>
      <!-- /.card -->
        <form action="<?php echo base_url()?>dashboard05/inscripcion2" method="POST" >
              <div class="card card-primary card-outline">
                  <div class="card-body">
                      <div class="card">
          
                          <div class="card-header" align="center">
                            <h3 class="card-title" >Oferta académica para el Periodo <?php echo $periodo->nombre; ?></h3>
                          </div>
                           <div class="card-header" align="center">
                            <h3 class="card-title"  ><div align="center"><strong>MATERIAS A INSCRIBIR</strong></div></h3>
                          </div>
                          <div class="card-header" align="center">
                           <h3><b>Alumno: </b><?php echo $alumno->nombre_primer.' '; echo $alumno->nombre_segundo.', ';echo $alumno->apellido_primer.' ';echo $alumno->apellido_segundo;?> <b> Cédula de Identidad: </b><?php echo $alumno->nacionalidad.$alumno->cedula;  ?></h3>
                            </div>
                                        <!-- Mensaje de Alerta-->
                        <?php  if ($this->session->flashdata("error")): ?>
                        <div class="alert alert-danger alert-dismissible">
                          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                          <p><i class="icon fa fa-ban"></i> <?php echo $this->session->flashdata("error"); ?> </p>
                        </div>
                      <?php endif; ?>
      <!-- /.card -->

                          <div class="card-body">

                             
                 <table  class="table table-bordered table-striped">
                  <thead>
                 
                  <tr>
                    <th>Programa de Postgrado</th>
                    <th>UC</th>
                    <th>Unidad Curricular</th>
                    <th>Trimestre</th>
		    <th>Sección</th>
                    <th>Dia de Clase</th>
                    <th>Horario</th>                    
		    <th>Modalidad</th>
                    <th>Docente</th>
                    <th>Opcion</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php if(!empty($listado)):?>
                      <?php foreach($listado as $listado):?>
                  <tr>
                    <td><?php echo $listado->programas; ?></td>
                    <td><?php echo $listado->unidades_creditos; ?></td>
                    <td><?php echo $listado->pensums; ?></td>
                    <td><?php echo $listado->trimestre;?></td>
    		    <td><?php echo $listado->secc;?></td>
                    <td><?php echo $listado->dia;?></td>
                    <td><?php echo $listado->horario;?></td>
                    <td><?php if($listado->modalidad==1)echo "PRESENCIAL";if ($listado->modalidad==2)echo "VIRTUAL";if($listado->modalidad==3)echo "SEMIPRESENCIAL" ?></td>
                    <td><?php echo $listado->primernombre;?> <?php echo $listado->primerapellido;?></td>
                    <td><input type="checkbox" name="checks[]" value="<?php echo $listado->id;?>"></td>
                  </tr>
                        <?php endforeach;?>
                  <?php endif;?>        
                  </tbody>
                  <tfoot>
                  <tr>
                     <th>Programa de Postgrado</th>
                    <th>UC</th>
                    <th>Unidad Curricular</th>
                    <th>Trimestre</th>
		    <th>Sección</th>
                    <th>Día de Clase</th>
                    <th>Horario</th>
		    <th>Modalidad</th>		
                    <th>Docente</th>
                    <th>Opcion</th>
                  </tr>
                  </tfoot>
                </table>

               <br>


  <div align="center" >
<table width="100%">

          <tr>

            <td height="25">
            
          </td>
        </tr>
  <input type="hidden" name="str" id="str">
   <tr>
   <td>
    <input type="hidden" name="id_usuario" id="id_usuario" value="<?php echo $alumno->id_usuario; ?>">
    </td> 
  </tr>
    <td >
      <input type="button" name="btnSeguiente" value="Regresar" class="boton btn btn-info" onClick="anterior();">
    </td>
  <td > 
    <input type="submit" name="btnguardar" value="Inscribir Materias"  title="Inscribir Materias Seleccionadas" class="btn btn-warning">
  </td>   
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
