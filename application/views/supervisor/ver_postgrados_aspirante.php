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
    //location.href="/control_estudio/dashboard05/revision_ac";
  }
  
  </script>
      <!-- /
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
                    <th>Postgrado(s) que desea cursar el Aspirante</th>                                   
                  </tr>
                  </thead>
                  <tbody>
                   <?php $suma_unidad=0;?>
                     <?php if(!empty($listado)):?>
                      <?php foreach($listado as $listado):?>
                  <tr>                
                                   
                   <td><?php  echo  $listado->nombre_convocatoria." (".$listado->modalidad_convocatoria.")"; ?></td>
                  
                  </tr>
                        <?php endforeach;?>
                  <?php endif;?>        
                  </tbody>
                  <tfoot>
                  
                       <tr>
                    <td colspan="4" align="center"> <input type="button" name="btnSeguiente" value="Regresar" class="boton btn btn-info" onClick="history.back();"></td>
                    
                 
                  </tr>
                  </tfoot>
                </table>

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
