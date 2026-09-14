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
          
         <li class="nav-item">
            <a href="<?php echo base_url(); ?>welcome/recuperar_usuario" class="nav-link">
             <i class="fas far fa-bookmark"> 
              Recuperar Usuario</i>
            </a>
          </li>    
       
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

  

