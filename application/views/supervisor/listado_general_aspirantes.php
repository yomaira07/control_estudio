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
                            <h3 class="card-title">LISTADO GENERAL DE ASPIRANTES INSCRITOS A POSTGRADOS <?php foreach ($periodo as $periodo){  echo $periodo->nombre;}  ?></h3>
                          </div>
		 <div class="card-header" align="right">
                           
<span class="card-body" ><b><font color="blue">INSCRITOS:</font></b> El archivo excel muestra todos  los inscritos <br>  y sus distintas especialidades o postgrados 
<a title="Descargar listado a formato Excel(.xls) INSCRITOS" href="<?php  echo base_url()?>dashboard05/dExcel_inscritos_asp/<?php echo $_POST['periodo'];?>" target="_blank"><img src="<?php echo base_url(); ?>assets/img/excel.jpg"  alt="Excel" style="width: 10mm; height: 10mm; margin: 0;" /></a>
</span>
<span class="card-body" ><b><font color="blue">REGISTRADOS SIN PAGO:</font></b> El archivo excel muestra todos  los usuarios registrados sin registro de pago <br>  y sus distintas especialidades o postgrados 
<a title="Descargar listado a formato Excel(.xls) REGISTRADOS SIN PAGO" href="<?php  echo base_url()?>dashboard05/dExcel_inscritos_asp_registrados/<?php echo $_POST['periodo'];?>" target="_blank"><img src="<?php echo base_url(); ?>assets/img/excel.jpg"  alt="Excel" style="width: 10mm; height: 10mm; margin: 0;" /></a>
</span>
<span class="card-body" ><b><font color="blue">REGISTRADOS CON PAGO Y REQUISITOS INCOMPLETOS:</font></b> El archivo excel muestra todos  los usuarios registrados <b>con registro de pago y con los requisitos  incompletos</b> <br>  y sus distintas especialidades o postgrados 
<a title="Descargar listado a formato Excel(.xls) REGISTRADOS SIN PAGO" href="<?php  echo base_url()?>dashboard05/dExcel_inscritos_asp_pagos/<?php echo $_POST['periodo'];?>" target="_blank"><img src="<?php echo base_url(); ?>assets/img/excel.jpg"  alt="Excel" style="width: 10mm; height: 10mm; margin: 0;" /></a>
</span> 
                          <div class="card-body">

                             
                 <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                  	<th>Cédula</th>
                  	<th>Nombres y Apellidos</th>                   
                    <th>Descargar Planilla</th>	
                  </tr>
                  </thead>
                  <tbody>
                    <?php if(!empty($total_inscritos)):?>
                      <?php foreach($total_inscritos as $total_inscritos):?>
                  <tr>
                  	<td><?php echo $total_inscritos->cedula;?></td>
                    <td><?php echo $total_inscritos->primer_nombre;?> <?php echo $total_inscritos->segundo_nombre;?> <?php echo $total_inscritos->primer_apellido;?> <?php echo $total_inscritos->segundo_apellido;?></td>
                   <td><a href="<?php echo base_url()?>dashboard05/postgrado_aspirante/<?php echo $total_inscritos->id_usuario;?>/1" class="btn btn-warning"> Imprimir</a></td>
                      
                  </tr>
                        <?php endforeach;?>
                  <?php endif;?>        
                  </tbody>
                  <tfoot>
                  <tr>
                   <th>Cédula</th>
                  	<th>Nombres y Apellidos</th>                  
					           <th>Descargar Planilla</th>	
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

