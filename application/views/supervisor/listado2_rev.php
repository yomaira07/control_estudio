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
    location.href="inscripcion2_rev/<?Php echo $alumno->id_usuario;?>";
  }
  </script>


  <!-- /.card -->

  <div class="card-body">    
      <!-- Mensaje de Alerta-->
      <?php  if ($this->session->flashdata("error")): ?>
      <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <p><i class="icon fa fa-ban"></i> <?php echo $this->session->flashdata("error"); ?> </p>
      </div>
    <?php endif; ?>

        <form action="<?php  echo base_url()?>dashboard05/registro_materias/<?Php echo $alumno->id_usuario; ?>" method="POST" >
          <div class="card-body">
            <!-- Mensaje de Alerta-->
            <?php  if ($this->session->flashdata("error")): ?>
            <div class="alert alert-danger alert-dismissible">
               <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
               <p><i class="icon fa fa-ban"></i> <?php echo $this->session->flashdata("error"); ?> </p>
            </div>
          <?php endif; ?>
          <input type="hidden" name="datos_str" value="<?php echo $datos_str; ?>">
          <input type="hidden" name="periodo" value="<?php echo $periodo->id; ?>">
          <input type="hidden" name="id_usuario" value="<?Php echo $this->session->userdata('id'); ?>">
          
          <?php
            /*
                $str = trim($datos_str);

                $strArray = explode(',',$str);

                //print_r($strArray);

                foreach ($strArray as $val) {
                print " <br>";
                    print $val;
                }
           

                if ($lista_trabajo->descuento > 0) {
                  $valor_ucredito = $listado->valorpubmp;
                }else{
                  $valor_ucredito = $listado->valorpubgen;
                }
  */                // var_dump($lista_trabajo);
              
          ?>
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
                        

               <!-- /.card -->
                      <div class="card-body">

                             
                 <table  class="table table-bordered table-striped">
                  <thead>
                 
                  <tr>
                    <th>Programa de Postgrado</th>
                    <th>UC</th>
                    <th>Unidad Curricular</th>
                    <th>Trimestre</th>
                    <th>Docente</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php  if(!empty($listado)):?>
                      <?php 
					 $precio_venta =0;
                      foreach($listado as $listado):
                      	$total_unidades += $listado->unidades_creditos;
                      	?>
                  <tr>
                    <td><?php echo $listado->programas; ?></td>
                    <td><?php  echo $listado->unidades_creditos; ?></td>
                    <td><?php echo $listado->pensums; ?></td>
                    <td><?php echo $listado->trimestre;?></td>
                    <td><?php echo $listado->primernombre;?> <?php echo $listado->primerapellido;?></td>
                  </tr>
                        <?php endforeach;?>
                  <?php endif;?>        
                  </tbody>
                </table>

               <br>

<table class="table table-bordered table-striped">
   <thead>
  <tr>
    <th><div align="center">Total Unidad Crédito a Inscribir</div></th>
  </tr>
   </thead>
  <tbody>
    <tr>
      <td><div align="center"><?php echo $total_unidades; ?></div></td> 
     
    </tr>
   <tr>   <input type="hidden" name="id_usuario" id="id_usuario" value="<?php echo $alumno->id_usuario; ?>">
    <td>
    <input type="button" name="btnSeguiente" value="Anterior" class="boton btn btn-info" onClick="anterior();"> 
    <input type="submit" name="btnguardar" value="Guardar" class="boton btn btn-warning" title="Guardar materias a inscribir">
  </td>
  </tr>
  </tbody>
</table>
  <br>
 
  <div align="center">
    
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
