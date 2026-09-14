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
                            <h3 class="card-title">Aranceles de Pago Vigentes</h3><a href="<?php echo base_url()?>admin/arancel/crear/" type="button" class="btn btn-info float-right"><strong>Crear Arancel</strong></a>
                          </div>
                          
                          <div class="card-body">

                             
                 <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Tipo de Arancel</th>
                    <th>Monto Público General</th>
                     <th>Monto MP</th>
                    <th>Estatus</th>
                    <th>Fecha registro</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php if(!empty($list_arancel)):?>
                      <?php foreach($list_arancel as $list_arancel):?>
                  <tr>
                    <td><?php if ($list_arancel->id_tipo_arancel==1) {
                      echo "INSCRIPCIÓN ESPECIALIDAD"; 
                    }
                    if ($list_arancel->id_tipo_arancel==2) {
                      echo "PERMANENCIA";
                    }
                    if ($list_arancel->id_tipo_arancel==3){ 
                      echo "INSCRIPCION DE FUERA DE LAPSO";
                    }
                    if ($list_arancel->id_tipo_arancel==4){
                     echo "INSCRIPCIÓN MAESTRÍA";
                    }
 		if ($list_arancel->id_tipo_arancel==5){
                     echo "INSCRIPCIÓN ASPIRANTE POR ESPECIALIDAD";
                    }
                    if ($list_arancel->id_tipo_arancel==6){
                      echo "INSCRIPCIÓN ASPIRANTE POR MAESTRÍA";
                     }
                     if ($list_arancel->id_tipo_arancel==7){
                      echo "INSCRIPCIÓN ASPIRANTE POR DOCTORADO";
                     }
 if ($list_arancel->id_tipo_arancel==8){
                      echo "INSCRIPCIÓN DOCTORADO";
                     }
			?></td>
                    <td><?php echo number_format($list_arancel->monto_gen, 2, ",", "."); ?></td>
                     <td><?php echo number_format($list_arancel->monto_mp, 2, ",", "."); ?></td>
                    <td><?php echo $list_arancel->status; ?></td>
                    <td><?php print $list_arancel->fecha_registro; ?></td>
                  </tr>
                        <?php endforeach;?>
                  <?php endif;?>        
                  </tbody>
                  <tfoot>
                  <tr>
                     <th>Tipo de Arancel</th>
                    <th>Monto Público General</th>
                     <th>Monto MP</th>
                    <th>Estatus</th>
                    <th>Fecha registro</th>
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

