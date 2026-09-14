 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="" class="brand-link">
      <img src="<?php echo base_url(); ?>assets/template/dist/img/Logo.png"
           alt="Logo ENFMP"
           class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">SCE-ENFMP</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?php if ( $this->session->userdata("id") and $this->session->userdata("rol")<>9){

          echo base_url(); ?>assets/fotos/<?php echo $this->session->userdata("id"); ?>_foto.jpg
           <?php }else{
            echo base_url(); ?>assets/fotos/<?php echo $this->session->userdata("id"); ?>_fotos_docente.jpg

          <?php }?>
          " class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php echo $this->session->userdata("nombre" );?> <?php echo $this->session->userdata("apellido" );?></a>
         
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-4">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">        

           <?php if (($this->session->userdata("rol")== 5 or $this->session->userdata("rol")== 8) and $this->session->userdata("estado")== 1 ){?>
          
          <li class="nav-header">MENU PARTICIPANTE</li>
          <div class="nav-header">
            <li class="info"><div align="center"> <b><?php if($this->session->userdata("rol")== 5)  echo " ESTUDIANTE REGULAR ";?></b></div></li>
            <li class="info"><div align="center"> <b><?php if($this->session->userdata("rol")== 8)  echo "NUEVO INGRESO";?></b></div></li>
            <li class="info"><div align="center"><b>(Trámites <?PHP if ( $this->uri->segment(3)==2) echo 'Administrativos'; if ( $this->uri->segment(3)==1) echo 'Académicos';?>)</b></div>
            </li>
          </div>	
        <li class="nav-item">
                <a href="<?php echo base_url(); ?>dashboard04/home" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Inicio </p>
                </a>
          </li>      
          <li class="nav-header"><b>Trámites Administrativos</b></li>            
          
                <li class="nav-item">            
                    <a href="<?php echo base_url(); ?>dashboard09/solicitud_reincorporacion/2" class="nav-link">                
                          <i class="far fa-circle nav-icon"></i> <p>Reincorporación</p>
                    </a>            
                  </li>
          <?php   ?>
         <?php  //if ( $this->session->userdata("egresado")==1){?>
              <!-- <li class="nav-item">
        
            <a href="<?php echo base_url(); ?>dashboard09/solicitud_egreso/2" class="nav-link">                
                  <i class="far fa-circle nav-icon"></i> <p>Solicitud de Egreso</p>
                 </a>
            <a href="<?php echo base_url(); ?>dashboard09/pago_grado/2" class="nav-link">                
                  <i class="far fa-circle nav-icon"></i> <p>Pago de Aranceles de Grado</p>
                 </a>            
              </li>-->
              <?php // } ?>
            <li class="nav-item">
                <a href="<?php echo base_url(); ?>dashboard09/index/2" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Otros Trámites </p>
                </a>
              </li>


        
		
			
 <li class="nav-item">
		        <a href="" class="nav-link">
		            <i class="far fa-circle nav-icon"></i>
		            <p>RUC</p>
		         </a>
		<ul class="nav nav-treeview">		
				<li class="nav-item">                    
					<a href="<?php echo base_url(); ?>dashboard09/solicitud_ruc_requisitos/2" class="nav-link">                
					<i class="far fa-dot-circle nav-icon"></i>     <p>Solicitud RUC</p>
					</a>
				</li>	
        <li class="nav-item">                         
          <a href="<?php echo base_url(); ?>dashboard09/solicitud_ruc/2" class="nav-link">                
          <i class="far fa-dot-circle nav-icon"></i>     <p>RUC Aprobadas</p>
          </a>                        
        </li>		
    </ul>
  </li>

           <hr>
          <li class="nav-item">
            <a href="<?php echo base_url(); ?>dashboard09/index/1" class="nav-link">
             <i class="far fa-check-circle"></i><b>Trámites Académicos</b></a>
             </li>
             <?php 
         	    $usuario=array();           
              if(($this->session->userdata("inscripcion")==1) or in_array($this->session->userdata("id"), $usuario)){?>
               <li class="nav-item">             
                  <a href="<?php echo base_url(); ?>dashboard09/solicitud_retiros/1" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>    <p>Retiros Voluntarios</p>
                  </a>
                </li>
       
        
        <?php } ?>
        <hr>
        
          <li class="nav-item">
            <a href="<?php echo base_url()?>auth/logout" class="nav-link">
              <i class="nav-icon "></i>
               <p>Salir</p>
            </a>
          </li>
          
   
          </nav>
      <?php } ?> 
       </ul>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
  



