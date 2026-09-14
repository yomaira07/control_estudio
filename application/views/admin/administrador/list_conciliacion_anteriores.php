
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
                          <div class="info-box">
              <span class="info-box-icon bg-info"><i class="far fa-bookmark"></i></span>

              <div class="info-box-content">               
                <span class="info-box-text">CONTROL DE ESTUDIO</span> </a>     
             </div>
                            <h3 class="card-title">Listado de 
                               Conciliaciones del Período Académico: <b><?php foreach($periodo as $periodo): echo $periodo->nombre; endforeach;?></b></h3>
                          </div>
                          
                          <div class="card-body">

                             
                 <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                  <th>Periodo académico</th>
                    <th>Cédula del Estudiante</th>
                    <th>Nombres y Apellidos</th>
                     <th>Aspirante/Regular</th>
                    <th>Estado</th>
                    <th>Pago Adicional</th>
                    <th>Banco</th>
                    <th>Nro Ref.</th>
                    <th>Fecha</th>
                    <th>Monto Pagar</th>
                    <th>Monto Depositado</th>
                    <th>Postgrado</th>
                    <th>U.C.</th>
                    <th>Estatus de Conciliación</th>
                   
                 
                  </tr>
                  </thead>
                  <tbody>
                    <?php if(!empty($listado)):?>
                      <?php foreach($listado as $listado):?>
                  <tr>
                  <td><?php echo $listado->periodo; ?></td>
                     <td><?php echo $listado->estudiante_nac; echo $listado->estudiante;?></td>
                    <td><?php echo $listado->pri_nombre ?> <?php echo $listado->seg_nombre; ?> <?php echo $listado->pri_apellido ?> <?php echo $listado->seg_apellido ?></td>
                    <td><?php if($listado->aspirante=='1') echo 'Aspirante'; else  echo 'Regular';?></td>
                    <td><?php echo $listado->nob_estado; ?></td>
                     <td><?php if($listado->pago_adicional=='1')echo 'SI'; else echo 'Primer Pago'; ?></td>
                    <td><?php echo $listado->banco; ?></td>
                    <td><?php echo $listado->nro_referencia;?></td>
                    <td><?php echo  date("d/m/Y", strtotime($listado->fecha_transferencia)); ?></td>
                    <td><?php echo number_format($listado->monto_apagar, 2, ".", ","); ?></td>
                    <td><?php echo number_format($listado->monto_depositado, 2, ".", ","); ?></td>
                    <td><a href="<?php echo base_url()?>consultas/postgrado_conc_periodo/<?php echo $listado->id_usuario;?>/<?php echo $listado->aspirante;?>/<?php echo $listado->id_periodo;?>/<?php echo $url;?>" class="btn btn-info"> Ver Postgrado(s)</a></td>
                    <td><?php echo $listado->uc; ?></td>
                    <td><?php if($listado->conciliado==1) echo "Pago conciliado"; elseif($listado->conciliado==2) echo "<b>Rechazado</b>";?></td>
                  
                  </tr>
                        <?php endforeach;?>
                  <?php endif;?>        
                  </tbody>
                  <tfoot>
                  <tr>
                  <th>Período académico</th>
                  <th>Cédula del Estudiante</th>
                    <th>Nombres y Apellidos</th>
		                <th>Estudiante</th>
                    <th>Estado</th>
                     <th>Pago Adicional</th>
                    <th>Banco</th>
                    <th>Nro Ref.</th>
                    <th>Fecha</th>
                    <th>Monto Pagar</th>
                    <th>Monto Depositado</th>
                    <th>Postgrado</th>
                    <th>U.C.</th>
                    <th>Estatus de Conciliación</th>
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
