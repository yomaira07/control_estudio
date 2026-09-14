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
  
    location.href="inscripcion/";
  }
  </script>
  <div class="card-body">
                        <!-- Mensaje de Alerta-->
                        <?php  if ($this->session->flashdata("error")): ?>
                        <div class="alert alert-danger alert-dismissible">
                          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                          <p><i class="icon fa fa-ban"></i> <?php echo $this->session->flashdata("error"); ?> </p>
                        </div>
                      <?php endif; ?>
      <!-- /.card -->
        <form action="<?php echo base_url()?>dashboard04/registro_materias/<?Php echo $this->session->userdata('id'); ?>" method="POST" >
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
                            <h3 class="card-title" >Unidades curriculares que desea preinscribir en el Periodo <?php echo $periodo->nombre; ?></h3>
                          </div>

                          <div class="card-body">

                             
                 <table  class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Programa de Postgrado</th>
                    <th>UC</th>
                    <th>Unidad Curricular</th>
                    <th>Trimestre</th>
                  <!--  <th>Docente</th>-->
                   <th>Valor Unidad de Crédito</th>
                   <th>Total a pagar Unidades de Crédito</th>

                  </tr>
                  </thead>
                  <tbody>
                    <?php  if(!empty($listado)):?>
                      <?php 
					 $precio_venta =0;
                      foreach($listado as $listado):
                      	$precio_venta += $listado->unidades_creditos;
                      	?>
                  <tr>
                    <td><?php echo $listado->programas; ?></td>
                    <td><?php  echo $listado->unidades_creditos; ?></td>
                    <td><?php echo $listado->pensums; ?></td>
                    <td><?php echo $listado->trimestre;?></td>
                  <!--  <td><?php echo $listado->primernombre;?> <?php echo $listado->primerapellido;?></td>-->
                  <td><?php 
 if ($lista_trabajo->descuento > 0) {
                  $valor_ucredito = $listado->valorpubmp;
                }else{
                  $valor_ucredito = $listado->valorpubgen;
                }
      echo number_format($valor_ucredito, 2, ",", "."). "  $." ; ?>
      </td>
      <td><?php
        $Total_Pagar= $listado->unidades_creditos * $valor_ucredito;
         $Total_Pagar_uc+= $Total_Pagar;
  echo number_format($Total_Pagar, 2, ",", ".")."  $."; ?></td>
                  </tr>
                        <?php endforeach;?>
                  <?php endif;?>        
                  </tbody>
                </table>

               <br>

<table class="table table-bordered table-striped">
   <thead align="center">
  <tr>
    
    <th>Total a pagar Unidades de Crédito</th>

  </tr>
   </thead>
  <tbody align="center">
    <tr>
      <td><?php
  echo number_format($Total_Pagar_uc, 2, ",", ".")."  $."; ?></td>
    </tr>
  </tbody>
</table>
  <br>
 
  <div align="center">
    <input type="hidden" name="valor_ucredito" value="<?php if ($lista_trabajo->descuento > 0) {
                  echo $listado->valorpubmp;
                }else{
                  echo $listado->valorpubgen;
                }?>">
    <input type="button" name="btnSeguiente" value="Anterior" class="boton btn btn-info" onClick="anterior();">  <input type="submit" name="btnguardar" value="Guardar" class="boton btn btn-info">
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

