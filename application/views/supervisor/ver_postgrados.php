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
  
  </script>
      <!-- /.card -->
              <div class="card card-primary card-outline">
                  <div class="card-body">
                      <div class="card">
          
                          <div class="card-header">
                            <h3 class="card-title">Postgrado(s)</h3>
                          </div>
                          
                          <div class="card-body">

                             
                 <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Cedula</th>
                    <th colspan="3">Nombres y Apellidos</th>
                  </tr>       
                    <?php if(!empty($alumno)):?>
                      <?php foreach($alumno as $alumno):?>                    
                  <tr>
                 
                    <td><?php echo $alumno->cedula_est;?></td>
                    <td colspan="3"><?php echo $alumno->pri_nombre ?> <?php echo $alumno->seg_nombre; ?> <?php echo $alumno->pri_apellido ?> <?php echo $alumno->seg_apellido ?></td>
                  </tr>  
                             <?php endforeach;?>
                  <?php endif;?>     
                  <tr>                   
                    <th>Trimestre</th>
                     <th>Postgrado</th>
                    <th>Unidad Curricular</th>
                    <th>U.C.</th>                  
                  </tr>
                  </thead>
                  <tbody>
                   <?php $suma_unidad=0;?>
                     <?php if(!empty($listado)):?>
                      <?php foreach($listado as $listado):?>
                  <tr>
                    
                     <td><?php echo $listado->trimestre; ?></td>
                   
                   <td><?php echo $listado->programa; ?></td>
                   <td><?php echo $listado->materia; ?></td>
                    <td><?php echo $listado->uc; ?></td>
                    <?php $suma_unidad=$listado->uc+$suma_unidad;?>
                  </tr>
                        <?php endforeach;?>
                  <?php endif;?>        
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Postgrado</th>
                    <th>Trimestre</th>
                    <th>Total de Umidades Creditos Canceladas------------------------------------------------------------>  <?php echo str_pad($suma_unidad, 2,0,STR_PAD_LEFT); ?> </th>       
                 
                  </tr>
                       <tr>
                    <td colspan="4" align="center"> <input type="button" name="btnSeguiente" value="Regresar" class="boton btn btn-info" onClick="anterior();"></td>
                    
                 
                  </tr>
                  </tfoot>
                </table>

               <br>                          
                     <?php if(!empty($reincorporaciones)):?>
                    <table class="table table-bordered table-striped">
                      <thead>
                      <tr>
                        <th><b>Programa Postgrado Reincorporación</b></th>
                      <th><b>Trimestre</b></th>
                      </tr>
                    </thead>
                    <tbody>
                        <?php foreach($reincorporaciones as $reincorporaciones):?>
                      <tr>
			<td>
                        <?php echo $reincorporaciones->programa;?>
			</td>
			<td>
                        <?php echo $reincorporaciones->trimestre;?>
                      </td>
                   </tr>
                       <?php endforeach ?>
                  
                    </tbody>
                  </table>

                <?php endif ?>
          <br>
              
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
