  <!-- Content Wrapper. Contains page content -->

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
    <!-- /.container-fluid -->
    </section>

  <div class="content-wrapper">  
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">      
   
      <div class="card-header">
      <h3 class="card-title">TRÁMITES Y SOLICITUDES  - Período Académico: <b><?php foreach($periodo as $periodo): echo $periodo->nombre;endforeach?></b></h3>                          
        </div>
      </div>
      <div class="card-header">
         <div class="row">
        
       <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-success"><i class="fas fa-copy"></i></span>

              <div class="info-box-content">
             
                <span class="info-box-text"><b>TRÁMITES ADMINISTRATIVOS </b></span> 
                <a href="<?php echo base_url(); ?>dashboard09/tramites_aprobados/<?php echo $periodo->id; ?>" > <span class="info-box-number">Trámites Administrativos</span></a>
                
                <a href="<?php echo base_url(); ?>dashboard09/tramites_validados_reincorporacion_periodo/<?php echo $periodo->id; ?>" > <span class="info-box-number">Reincorporaciones</span></a>
                <span class="info-box-number"></br></span>

             
              </div>
              <!-- /.info-box-content  -->
            </div>
            <!-- /.info-box  -->
          </div> 

         <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-warning"><i class="fas fa-graduation-cap"></i></span>

              <div class="info-box-content">
            
                <span class="info-box-text"><b>TRÁMITES ACADEMICOS</b></span>
                <a href="<?php echo base_url(); ?>dashboard09/retiro_voluntario_periodo/<?php echo $periodo->id; ?>" > <span class="info-box-number">Retiros Voluntarios</span></a>
                <span class="info-box-number"></br></br></span>

              </div>
              <!-- /.info-box-content  -->
            </div>
            <!-- /.info-box  -->
          </div> 
        </div>
        <!-- /.row -->    
      </div><!-- /.container-fluid -->
      </div><!-- /.content -->
    </section>
    <!-- /. section content -->   
  </div>
  <!-- /.content-wrapper -->






