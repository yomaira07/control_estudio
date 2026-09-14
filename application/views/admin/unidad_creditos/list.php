  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
    <!-- /.container-fluid -->
   
    </section>

    <!-- Main content -->
     <section class="content">
      <!-- /.card -->
              <div class="card card-primary card-outline">
                  <div class="card-body">
                      <div class="card">
          
                          <div class="card-header">
                            <h3 class="card-title">Unidad de Credito</h3><a href="<?php echo base_url()?>admin/unidad_c/crear/" type="button" class="btn btn-info float-right"><strong>Crear Unidad de Credito</strong></a>
                          </div>
                          
                          <div class="card-body">

                             
                 <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Cod</th>
                    <th>Monto</th>
                    <th>Estatus</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php if(!empty($list_uc)):?>
                      <?php foreach($list_uc as $list_uc):?>
                  <tr>
                    <td><?php echo $list_uc->id;?></td>
                    <td><?php echo number_format($list_uc->monto, 2, ",", "."); ?></td>
                    <td><?php echo $list_uc->status; ?></td>
                  </tr>
                        <?php endforeach;?>
                  <?php endif;?>        
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Cod</th>
                    <th>Monto</th>
                    <th>Estatus</th>
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
