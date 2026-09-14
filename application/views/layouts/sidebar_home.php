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
      <nav class="mt-2">
    
          <div class="nav-header">
              <li class="info"><div align="center">
                  <b><?php if($this->session->userdata("rol")== 5)  echo " ESTUDIANTE REGULAR ";?></b></div>
              </li>
              <li class="info"><div align="center">
                <b><?php if($this->session->userdata("rol")== 8)  echo "NUEVO INGRESO";?></b></div>
              </li>  
        </div>
        <li class="nav-item">
            <a href="<?php echo base_url(); ?>dashboard04/index" class="nav-link">
             <i class="fas far fa-bookmark"> 
              CONTROL DE ESTUDIO</i>
            </a>
        </li>    
        <?php if($this->session->userdata("rol")==5 ){?>
          <li class="nav-item">
            <a href="<?php echo base_url(); ?>dashboard09/index/2" class="nav-link">
             <i class="fas far fa-copy">
              TRÁMITES </i> 
            </a>
          </li> 
	<?php }?>
        
         
          <hr  style="background-color: #212529;">

          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false"> 
          
          <li class="nav-item">
                <a href="" class="nav-link">
                  <i class="fas far fa-user"></i>
                  <p>Mi Perfil</p>
                </a>
              <ul class="nav nav-treeview">
               
      
              <li class="nav-item">                 
                  <a href="<?php echo base_url(); ?>auth/cambio_clave" class="nav-link">
                    <i class="far fa-circle nav-icon"></i> 
                    Cambiar de Clave
                  </a>  
                         
                  <a href="<?php echo base_url(); ?>admin/usuario/cambiar_correo" class="nav-link">
                    <i class="far fa-circle nav-icon"></i> 
                    Cambiar de Correo Electrónico
                  </a>   

                    <a href="<?php echo base_url(); ?>dashboard04/datos7" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>Cambiar Fotografía</p>
                    </a>
                  </li>
			      
            </ul> 
        </ul>

		

          

            <li class="nav-item">
            <a href="<?php echo base_url()?>auth/logout" class="nav-link">
            <i class="nav-icon "></i>
            <p><b>Salir</b></p>
                </a>
          
          </li>
          
       
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  

