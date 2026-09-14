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
          <img src="<?php   if ($this->session->userdata("rol")==5 or $this->session->userdata("rol")==8 or $this->session->userdata("rol")==7 ) {

          echo base_url(); ?>assets/fotos/<?php echo $this->session->userdata("id"); ?>_foto.jpg
           <?php }elseif(   $this->session->userdata("rol")==9 ) {
            echo base_url(); ?>assets/fotos/<?php echo $this->session->userdata("id"); ?>_fotos_docente.jpg

          <?php } ?>
          " class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php echo $this->session->userdata("nombre" );?> <?php echo $this->session->userdata("apellido" );?></a>
         
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                 with font-awesome or any other icon font library -->
                 <?php if ($this->session->userdata("rol")== 1 and $this->session->userdata("estado")== 1 ){ ?>
             <li class="nav-header">MENU ADMINISTRADOR GENERAL</li>
            <li class="nav-item">
              <a href="<?php echo base_url(); ?>admin/usuario/index" class="nav-link">
                <i class="nav-icon far fa-calendar-alt"></i>
                <p>
                  Listado Usuario
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo base_url(); ?>admin/usuario/index_regulares" class="nav-link">
                <i class="nav-icon far fa-calendar-alt"></i>
                <p>
                  Listado Usuarios Estudiantes Regulares
                </p>
              </a>
            </li>
           

          <?php } if ($this->session->userdata("rol")== 2 and $this->session->userdata("estado")== 1 ){?>
          
             <li class="nav-header">MENU SUPERVISOR <br> Secretaría General</li>
            <li class="nav-item">
                <a href="" class="nav-link">
                  <i class="far fa-check-circle"></i>
                  <p>CONTROL DE ESTUDIOS</p>
                </a>
            
              <ul class="nav nav-treeview">
                <li class="nav-item">     
			            <a href="" class="nav-link">  
                    <i class="nav-icon far fa-user"></i>
                      <p>DOCENTES</p>
                   </a>            
                  <ul class="nav nav-treeview">
                    <li class="nav-item">
                          <a href="<?php echo base_url(); ?>admin/docente/index" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Docentes Registrados</p>
                          </a>
                    </li>
                    <li class="nav-item">
                          <a href="<?php echo base_url(); ?>admin/usuario/index_docente" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Usuarios Docentes Activos</p>
                          </a>
                    </li>
                   </ul>
                </li>
                <li class="nav-item">
                    <a href="" class="nav-link">
                    <i class="nav-icon far fa-user"></i>
                      <p>USUARIOS</p>
                    </a>
                  <ul class="nav nav-treeview">
                    <li class="nav-item">
                                  <a href="<?php echo base_url(); ?>admin/usuario/index" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                    <p>
                                      Usuarios Est. Regulares
                                    </p>
                                  </a>
                    </li>
                  </ul>         
                </li>
        
              <li class="nav-item">
                  <a href="" class="nav-link">
                 	 <i class="fas fa-book-open"></i>
                   	 <p>OFERTA ACADÉMICA Y PENSUMS</p>
                  </a>
                  <ul class="nav nav-treeview">
                  	<li class="nav-item">
                      <a href="<?php echo base_url(); ?>admin/oferta_academica" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Oferta Académica</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="<?php echo base_url(); ?>admin/pensum" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Pensum</p>
                      </a>
                    </li>            
                  </ul>
              </li>
    <?php if($this->session->userdata("id")!=2427 and $this->session->userdata('id')!=1639 ){ ?> <!--//Mirian y Daniela (no ven Plan de clases )-->
              <li class="nav-item">
                    <a href="" class="nav-link">
                    <i class="nav-icon far fa-calendar-alt"></i>
                      <p>REVISIÓN NOTAS ACADÉMICAS </p>
                    </a>
                   <ul class="nav nav-treeview">
                    <li class="nav-item">

                          <a href="<?php echo base_url(); ?>dashboard05/revisar_plan_clases" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Plan de Clases y Evaluaciones</p>
                          </a>
                    </li>
      
                    <li class="nav-item">
                        <a href="<?php echo base_url(); ?>dashboard05/notas_cargadas" class="nav-link">
                          <i class="far fa-circle nav-icon"></i>
                          <p>Revisión Notas Academicas Cargadas</p>
                        </a>
                    </li>
                  </ul>
              </li>
      <?php } ?> 
       <li class="nav-item">
          <a href="" class="nav-link">
          <i class="fas fa-highlighter"></i>
            <p>REVISIÓN ACADÉMICA </p>
          </a>
          <ul class="nav nav-treeview">
              <li class="nav-item">
                    <a href="<?php echo base_url(); ?>dashboard05/revision_ac" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Estudiantes Regulares/Nvo Ingreso</p>
                    </a>
              </li>  
              <li class="nav-item">
                    <a href="<?php echo base_url(); ?>dashboard05/revision_ac_asp" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Aspirantes</p>
                    </a>
              </li>            
          </ul>
      </li>
      <li class="nav-item">
          <a href="" class="nav-link">
          <i class="fas fa-calendar-check"></i>
            <p>PERÍODO INSCRIPCIÓN VIGENTE </p>
          </a>
          <ul class="nav nav-treeview">
              <li class="nav-item">
                    <a href="<?php echo base_url(); ?>dashboard05/revision_ac_datos" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Información del Estudiante</p>
                    </a>
              </li>
              <li class="nav-item">
                    <a href="<?php echo base_url(); ?>dashboard05/revision_ac_datos_asp" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Información del Aspirante</p>
                    </a>
              </li>
 	     <!-- <li class="nav-item">
                    <a href="<?php echo base_url(); ?>dashboard05/index_nuevo_ingreso" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Pagos Pendientes por conciliar <br>Nuevos Ingresos/Regulares</p>
                    </a>
              </li>-->
              <li class="nav-item">
                    <a href="<?php echo base_url(); ?>dashboard05/cupos_materias" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Cupos Materia</p>
                    </a>
              </li>
              <li class="nav-item">
                    <a href="<?php echo base_url(); ?>dashboard05/inscritos" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Inscritos Oferta Acadéḿica</p>
                    </a>
              </li>
              <li class="nav-item">
                    <a href="<?php echo base_url(); ?>dashboard05/listado_general/5" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Listado Gral. Regulares</p>
                    </a>
              </li>
              <li class="nav-item">
                    <a href="<?php echo base_url(); ?>dashboard05/listado_general/8" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Listado Gral. Nuevos Ingresos</p>
                    </a>
              </li>

            <li class="nav-item">
                    <a href="<?php echo base_url(); ?>dashboard05/listado_general_aspirante" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Listado Gral. Aspirantes</p>
                    </a>
            </li>         
        </ul>
      </li>
      <li class="nav-item">
            <a href="" class="nav-link">
            <i class="far fa-calendar-minus"></i>
              <p>PERIÓDO INSCRIPCIÓN ANTERIORES</p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                    <a href="<?php echo base_url(); ?>consultas/index" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Regulares /Nuevos Ingresos
                      <br> Inscritos <br> (Ver Planilla)</p>
                    </a>
              </li>
              <li class="nav-item">
                    <a href="<?php echo base_url(); ?>consultas/buscar_periodo_aspirantes" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Aspirantes
                      <br> Inscritos <br> (Ver Planilla)</p>
                    </a>
              </li>
          
              <?php if($this->session->userdata("id")!=2427 and $this->session->userdata('id')!=1639  ){?><!--//Mirian y Daniela (no ven Plan de clases )-->
                  <li class="nav-header">Docentes</li>
                    <li class="nav-item">
                      <a href="<?php echo base_url(); ?>dashboard05/buscar_plan_clases" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Revisión Plan de Clases y Evaluaciones</p>
                      </a>
                    </li>    
                
              <?php } ?>
            </ul>   
      </li>       
 
      <li class="nav-item">
          <a href="" class="nav-link">
          <i class="fa fa-print"></i>
          <p>PLANILLAS Y NOTAS CARGADAS</p>
          </a>     
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?php echo base_url(); ?>consultas/buscar_cedula" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Imprimir Planilla
              <br> Estudiantes <br> </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo base_url(); ?>dashboard07/buscar_cedula" class="nav-link" title="Buscar calificaciones cargadas en el sistema">
              <i class="far fa-circle nav-icon"></i>
              <p>Notas Académicas del Estudiante</p>
              </a>
            </li>            
          </ul>                     
      </li>
    </ul>
  </li>
        <hr  style="background-color: #212529;">
          <li class="nav-item">
                <a href="" class="nav-link">
                  <i class="far fa-check-circle"></i>
                  <p>TRÁMITES Y SOLICITUDES</p>
                </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">     
                  <a href="" class="nav-link">  
                  <i class="fa fa-copy" aria-hidden="true"></i>               
                    <p>Trámites y Solicitudes Revisadas</p>
                  </a>
	    		      <ul class="nav nav-treeview">  
	   		 <li class="nav-item">   
	      
	    		<a href="<?php echo base_url(); ?>dashboard09/tramites_validados_vigentes" class="nav-link">
			      <i class="far fa-circle nav-icon"></i>
			      <p>Otros Trámites <br>Administrativos </p>
			</a>   
	      		<a href="<?php echo base_url(); ?>dashboard09/retiro_voluntario_todos" class="nav-link">
		              <i class="far fa-circle nav-icon"></i>
		              <p>Retiro Voluntarios </p>
		          </a>
			<a href="<?php echo base_url(); ?>dashboard09/tramites_validados_vigentes_reincorporacion" class="nav-link">
				<i class="far fa-circle nav-icon"></i>
				<p>Reincorporaciones </p>
			</a>
			<a href="<?php echo base_url(); ?>dashboard09/tramites_validados_vigentes_egreso" class="nav-link">
				<i class="far fa-circle nav-icon"></i>
				<p>Solicitudes de Egreso </p>
			</a>

			<a href="<?php echo base_url(); ?>dashboard09/constancias_estudios_generadas" class="nav-link">
				<i class="far fa-circle nav-icon"></i>
				<p>Constancias de Estudios Generadas</p>
			</a>
			<a href="<?php echo base_url(); ?>dashboard09/solicitudes_ruc_revisadas" class="nav-link">
				<i class="far fa-circle nav-icon"></i>
				<p>Solicitud de RUC </p>
			</a>  
              </li>
          </ul>
              <li class="nav-item">
  
                <a href="" class="nav-link">     
                <i class="fa fa-copy" aria-hidden="true"></i>            
                <p>Revisión de Trámites y Solicitudes</p>
                </a>
            <ul class="nav nav-treeview">  
            <li class="nav-item">   

                 <a href="<?php echo base_url(); ?>dashboard09/tramites_por_validar" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Solicitud de Otros Trámites <br>Administrativos </p>
                  </a>

              <a href="<?php echo base_url(); ?>dashboard09/retiro_voluntario" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Solicitud de Retiro Voluntarios</p>
                  </a>
                  <a href="<?php echo base_url(); ?>dashboard09/solicitud_egreso_tramitados" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Solicitud de Egreso</p>
                  </a>                 
               </li>
                 </ul>
                </li>
                </ul>
            
                 <ul class="nav nav-treeview">
                <li class="nav-item">     
                  <a href="" class="nav-link">  
                  <i class="fa fa-copy" aria-hidden="true"></i>
                <p>Consultas de <br>Períodos Anteriores</p>
                </a>
                  <ul class="nav nav-treeview">  
                          <li class="nav-item">   
                                <a href="<?php echo base_url(); ?>dashboard09/buscar_periodo" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Trámites y/o Solicitudes </p>
                                </a>
                          </li>
                 </ul>
  
                
                </li>

                <li class="nav-item">
                  <a href="<?php echo base_url(); ?>dashboard09/buscar_cedula_tramite" class="nav-link">
                  <i class="fa fa-copy" aria-hidden="true"></i>
                    <p>Trámites y/o Solicitudes <br> del Estudiante</p>
                  </a>
                </li>  
                </ul>
          


          <?php } 
            if ($this->session->userdata("rol")== 10 and $this->session->userdata("estado")== 1 ){?>
          
          <li class="nav-header">MENU SUPERVISOR DOCENTE</li>
<li class="nav-item">
                  <a href="" class="nav-link">
                 	 <i class="fas fa-book-open"></i>
                   	 <p>OFERTA ACADÉMICA Y PENSUMS</p>
                  </a>
                  <ul class="nav nav-treeview">
                  	<li class="nav-item">
                      <a href="<?php echo base_url(); ?>admin/oferta_academica" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Oferta Académica</p>
                      </a>
                    </li>

                             
                  </ul>
              </li>		
<li class="nav-item">
		            <a href="" class="nav-link">
		            <i class="nav-icon far fa-user"></i>
		              <p>DOCENTES</p>
		            </a>
		    
		     	 <ul class="nav nav-treeview">
			      <li class="nav-item">
				    <a href="<?php echo base_url(); ?>admin/docente/index" class="nav-link">
				      <i class="far fa-circle nav-icon"></i>
				      <p>Docentes Registrados</p>
				    </a>
			      </li>
	         	 </ul>
 		</li>
           
    <li class="nav-item">
                    <a href="" class="nav-link">
                    <i class="nav-icon far fa-calendar-alt"></i>
                      <p>REVISIÓN NOTAS ACADÉMICAS </p>
                    </a>
          <ul class="nav nav-treeview">
          
                  <li class="nav-item">

                        <a href="<?php echo base_url(); ?>dashboard05/revisar_plan_clases" class="nav-link">
                          <i class="far fa-circle nav-icon"></i>
                          <p>Plan de Clases y Evaluaciones</p>
                        </a>
                  </li>
     
                  <li class="nav-item">
                      <a href="<?php echo base_url(); ?>dashboard05/notas_cargadas" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Revisión Notas Academicas <br>Cargadas</p>
                      </a>
                  </li>
 
            </ul>
<li class="nav-header">Períodos Académicos Anteriores</li>
              <li class="nav-item">
                    <a href="<?php echo base_url(); ?>dashboard05/buscar_plan_clases" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Revisión Plan de Clases y Evaluaciones</p>
                    </a>
              </li>     
          <?php }
if ($this->session->userdata("rol")== 12 and $this->session->userdata("estado")== 1 ){?>
          
          <li class="nav-header">MENU SUPERVISOR <br> Coordinación de Inv. y Postgrado</li>
 
             
		      <li class="nav-item">
		            <a href="" class="nav-link">
		            <i class="nav-icon far fa-user"></i>
		              <p>DOCENTES</p>
		            </a>
		    
		      <ul class="nav nav-treeview">
			      <li class="nav-item">
				    <a href="<?php echo base_url(); ?>admin/docente/index" class="nav-link">
				      <i class="far fa-circle nav-icon"></i>
				      <p>Docentes Registrados</p>
				    </a>
			      </li>
			      <li class="nav-item">
				     <a href="<?php echo base_url(); ?>admin/usuario/index_docente" class="nav-link">
				      <i class="far fa-circle nav-icon"></i>
				      <p>Usuarios Docentes Activos</p>
				    </a>
				</li>

		 
          </ul>
 </li>

   	  <li class="nav-item">
                    <a href="" class="nav-link">
                    <i class="nav-icon far fa-calendar-alt"></i>
                      <p>REVISIÓN NOTAS ACADÉMICAS </p>
                    </a>
          <ul class="nav nav-treeview">
          
                 
     
                  <li class="nav-item">
                      <a href="<?php echo base_url(); ?>dashboard05/notas_cargadas" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Revisión Notas Academicas <br>Cargadas</p>
                      </a>
                  </li>
 
            </ul>
<li class="nav-header">Períodos Académicos Anteriores</li>
              <li class="nav-item">
                    <a href="<?php echo base_url(); ?>dashboard05/buscar_plan_clases" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Revisión Plan de Clases y <br>Evaluaciones</p>
                    </a>
              </li>                   
    

          <?php }

          if ($this->session->userdata("rol")== 9 and $this->session->userdata("estado")== 1 ){?>
          
          <li class="nav-header">MENU DOCENTE</li>
           <li class="nav-item">
                <a href="<?php echo base_url(); ?>dashboard06/index" class="nav-link">
                  <i class="far fa-check-circle"></i>
                  <p>Inicio</p>
                </a>
              </li>
       
           <li class="nav-item">
                <a href="" class="nav-link">
                  <i class="far fa-check-circle"></i>
                  <p>Perfil Docente</p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                      <a href="<?php echo base_url(); ?>dashboard06/datos" class="nav-link">
                        <i class="far fa-dot-circle nav-icon"></i>
                        <p>Datos Personales</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="<?php echo base_url(); ?>dashboard06/datos1" class="nav-link">
                        <i class="far fa-dot-circle nav-icon"></i>
                        <p>Dirección Domicilio</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="<?php echo base_url(); ?>dashboard06/datos22" class="nav-link">
                        <i class="far fa-dot-circle nav-icon"></i>
                        <p>Datos Académicos</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="<?php echo base_url(); ?>dashboard06/datos2" class="nav-link">
                        <i class="far fa-dot-circle nav-icon"></i>
                        <p>Datos Laborales</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="<?php echo base_url(); ?>dashboard06/datos21" class="nav-link">
                        <i class="far fa-dot-circle nav-icon"></i>
                        <p>Datos Bancarios</p>
                      </a>
                    </li>
                </ul>             
         </li>
        <li class="nav-item">
                <a href="" class="nav-link">
                  <i class="far fa-check-circle"></i>
                  <p>Requisitos</p>
                </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="<?php echo base_url(); ?>dashboard06/requisitos" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>Recomendaciones</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo base_url(); ?>dashboard06/datos3" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>Adjuntar Cédula</p>
                    </a>
                </li>     
                <li class="nav-item">
                    <a href="<?php echo base_url(); ?>dashboard06/datos7" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>Adjuntar Foto</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo base_url(); ?>dashboard06/datos4" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>Adjuntar Título Pregrado</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo base_url(); ?>dashboard06/datos12" title="Adjuntar Titulo de postgrado o Especialista" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>Adjuntar Título Postgrado o Especilista</p>
                    </a>
                  </li>                   
                  <li class="nav-item">
                    <a href="<?php echo base_url(); ?>dashboard06/datos11" title="Adjuntar R.I.F." class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>Adjuntar Registro de Información Fiscal(R.I.F.)</p>
                    </a>
               </li>
               <li class="nav-item">
                    <a href="<?php echo base_url(); ?>dashboard06/datos13" title="Adjuntar R.I.F." class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>Adjuntar Sintesis Curricular</p>
                    </a>
                </li>
                <li class="nav-item">
                  <a href="<?php echo base_url(); ?>dashboard06/datos8" class="nav-link">
                    <i class="far fa-dot-circle nav-icon"></i>
                    <p>Adjuntar Carnet de Trabajo</p>
                  </a>
                </li>
             </ul>             
         </li>
         <li class="nav-item">
                <a href="<?php echo base_url(); ?>dashboard06/proceso_perfil" class="nav-link">
                  <i class="far fa-check-circle"></i>
                  <p>Estatus del Perfil Docente</p>
                </a>
          </li>
               <?php  if($menu_notas==true) :?>
            <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-check-circle"></i>
                  <p>Plan de Clases y Evaluación</p>
                </a>

              <ul class="nav nav-treeview">
                  <li class="nav-item">
                     <a href="<?php echo base_url(); ?>dashboard06/matricula"  class="nav-link">
                        <i class="far fa-dot-circle nav-icon"></i>
                        <p>Matrícula de Estudiantes</p>
                     </a>
                  </li>
               
                  <li class="nav-item">
                    <a href="<?php echo base_url(); ?>dashboard06/matricula" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                     <p>Registrar Notas</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="<?php echo base_url(); ?>dashboard06/constancia" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                     <p>Constancia Participación Docente</p>
                    </a>
                  </li>

              </ul>
            </li>            
       
            <li class="nav-item">
                <a href="<?php echo base_url(); ?>dashboard06/proceso_plan" class="nav-link">
                  <i class="far fa-check-circle"></i>
                  <p>Estatus del Plan de Clases</p>
                </a>
          </li>
              <?php endif ?>
       
	 <hr>
          <li class="nav-header">(Períodos Anteriores)</li>
          <li class="nav-item">
                    <a href="<?php echo base_url(); ?>dashboard06/buscar_plan_clases" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                     <p>Constancia Participación Docente</p>
                    </a>
          </li>
         
        </ul>

          <?php } if ($this->session->userdata("rol")== 4 and $this->session->userdata("estado")== 1 ){?>
          
          <li class="nav-header">MENU OPERADOR - ANALISTA</li>

          <li class="nav-item">
                <a href="" class="nav-link">
                  <i class="far fa-check-circle"></i>
                  <p>CONTROL DE ESTUDIOS</p>
                </a>
              <ul class="nav nav-treeview">               
                <li class="nav-header">  <i class="fa fa-bookmark" aria-hidden="true"></i>   Período Académico Vigente</li>    
		<ul> <li class="nav-header">Revisión Académica </li>
		      <li class="nav-item">
			    <a href="<?php echo base_url(); ?>dashboard05/revision_ac" class="nav-link">
			      <i class="far fa-circle nav-icon"></i>
			      <p>Estudiantes Regulares/Nvo Ingreso</p>
			    </a>
		      </li>
		</ul>
                <li class="nav-item">
                  <a href="<?php echo base_url(); ?>dashboard05/revision_ac_datos" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Información del Estudiante</p>
                  </a>
                </li>


                <li class="nav-item">
                  <a href="<?php echo base_url(); ?>dashboard05/inscritos" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Inscritos Oferta Acadéḿica</p>
                  </a>
                </li>
              
                <li class="nav-item">
                  <a href="<?php echo base_url(); ?>dashboard05/listado_general/5" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Listado Gral. Regulares</p>
                  </a>
                </li>

                <li class="nav-item">
                  <a href="<?php echo base_url(); ?>dashboard05/listado_general/8" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Listado Gral. Nuevos Ingresos</p>
                  </a>
                </li>
     <hr  style="background-color: #212529;">
                <li class="nav-header">  <i class="fa fa-bookmark" aria-hidden="true"></i>   CONSULTAS <br>(Períodos Inscripción Anteriores)</li>
                <li class="nav-item">
                  <a href="<?php echo base_url(); ?>consultas/index" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Regulares /Nuevos Ingresos
                    <br> Inscritos <br> (Ver Planilla)</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?php echo base_url(); ?>consultas/buscar_periodo_aspirantes" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Aspirantes
                    <br> Inscritos <br> (Ver Planilla)</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?php echo base_url(); ?>consultas/buscar_cedula" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Imprimir Planilla
                    <br> Estudiantes <br> </p>
                  </a>
                </li>
                <li class="nav-header">  <i class="fa fa-bookmark" aria-hidden="true"></i>   Revisión Plan de Clases y Evaluaciones<br>(Períodos Académicos Anteriores)</li>
                <li class="nav-item">
                  <a href="<?php echo base_url(); ?>dashboard05/buscar_plan_clases" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Matrículas y Notas Académicas</p>
                  </a>
                </li>    
                <li class="nav-item">
                  <a href="<?php echo base_url(); ?>dashboard07/buscar_cedula" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Notas Académicas del Estudiante</p>
                  </a>
                </li>    
            </li>  
      </ul>
</li>
       <hr  style="background-color: #212529;">
          <li class="nav-item">
                <a href="" class="nav-link">
                  <i class="far fa-check-circle"></i>
                  <p>TRÁMITES Y SOLICITUDES</p>
                </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">     
                <a href="" class="nav-link">  
                <i class="fa fa-copy" aria-hidden="true"></i>               
                  <p>Trámites y Solicitudes Revisadas</p>
                </a>
            <ul class="nav nav-treeview">  
            <li class="nav-item">   
              
            <a href="<?php echo base_url(); ?>dashboard09/tramites_validados_vigentes" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Otros Trámites <br>Administrativos </p>
                </a>   
              <a href="<?php echo base_url(); ?>dashboard09/retiro_voluntario_todos" class="nav-link">
                              <i class="far fa-circle nav-icon"></i>
                              <p>Retiro Voluntarios </p>
                          </a>
              <a href="<?php echo base_url(); ?>dashboard09/tramites_validados_vigentes_reincorporacion" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Reincorporaciones </p>
              </a>
              <a href="<?php echo base_url(); ?>dashboard09/tramites_validados_vigentes_egreso" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Solicitudes de Egreso </p>
              </a>
                          
                <a href="<?php echo base_url(); ?>dashboard09/constancias_estudios_generadas" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Constancias de Estudios Generadas</p>
                </a>
                <a href="<?php echo base_url(); ?>dashboard09/solicitudes_ruc_revisadas" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Solicitud de RUC </p>
                    </a>  
                </li>
            </ul>   
			 </li>
    </li>
                </ul>
		


            <ul class="nav nav-treeview">
                <li class="nav-item">     
                <a href="" class="nav-link">     
                <i class="fa fa-copy" aria-hidden="true"></i>            
                <p>Revisión de Trámites y Solicitudes</p>
                </a>
            <ul class="nav nav-treeview">  
            <li class="nav-item">   

                 <a href="<?php echo base_url(); ?>dashboard09/tramites_por_validar" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Solicitud de Otros Trámites <br>Administrativos </p>
                  </a>
		
              <a href="<?php echo base_url(); ?>dashboard09/retiro_voluntario" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Solicitud de Retiro Voluntarios</p>
                  </a>
                  <a href="<?php echo base_url(); ?>dashboard09/solicitud_egreso_tramitados" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Solicitud de Egreso</p>
                  </a>                 
               </li>
                 </ul>
                </li>
                </ul>
            
                 <ul class="nav nav-treeview">
                <li class="nav-item">     
                  <a href="" class="nav-link">  
                  <i class="fa fa-copy" aria-hidden="true"></i>
                <p>Consultas de <br>Períodos Anteriores</p>
                </a>
                  <ul class="nav nav-treeview">  
                          <li class="nav-item">   
                                <a href="<?php echo base_url(); ?>dashboard09/buscar_periodo" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Trámites y/o Solicitudes </p>
                                </a>
                          </li>
 <li class="nav-item">
                  <a href="<?php echo base_url(); ?>dashboard09/buscar_cedula_tramite" class="nav-link">
                  <i class="fa fa-copy" aria-hidden="true"></i>
                    <p>Trámites y/o Solicitudes <br> del Estudiante</p>
                  </a>
                </li>  
                 </ul>
  
                
                </li>
                </ul>
           

              <?php } if (($this->session->userdata("rol")== 5 or $this->session->userdata("rol")== 8) and $this->session->userdata("estado")== 1 ){?>
          
          <li class="nav-header">MENU PARTICIPANTE</li>
          <div class="nav-header">
          <li class="info"><div align="center"> <b><?php if($this->session->userdata("rol")== 5)  echo " ESTUDIANTE REGULAR ";?></b></div></li>
          <li class="info"><div align="center"> <b><?php if($this->session->userdata("rol")== 8)  echo "NUEVO INGRESO";?></b></div></li>
          <li class="info"><div align="center"><b>(Control de Estudios)</b></div></li>
        </div>
	
         
<li class="nav-item">
                <a href="<?php echo base_url(); ?>dashboard04/home" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Inicio </p>
                </a>
          </li>
<li class="nav-item">
                <a href="" class="nav-link">
                  <i class="far fa-check-circle"></i>
                  <p>Información del Estudiante</p>
                </a>
            <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="<?php echo base_url(); ?>dashboard04/datos" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>Datos Personales</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="<?php echo base_url(); ?>dashboard04/datos1" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>Direccion</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="<?php echo base_url(); ?>dashboard04/datos2" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>Lugar de trabajo</p>
                    </a>
                  </li>
         </ul>
         </li>
 
<?php if ($this->session->userdata("planilla")==0 ){ ?>
          <?php  
          $fecha_actual = date("Y-m-d");
          $hora_actual =date("H:m:s");


        $valor_preinscripcion=($tiempo_pre); 
  
 //$id_usuario=array(4712,3549,4690,4712); or (in_array($this->session->userdata("id"), $id_usuario)and $this->session->userdata("rol")==8 
if($this->session->inscripcion==1){
// if (($valor_preinscripcion->fecha_inicio <= $fecha_actual) and ($valor_preinscripcion->fecha_fin >= $fecha_actual ) ){//and $hora_actual<=$valor_preinscripcion->hora_fin ) ){

?>
<!--	<li class="nav-item">
                <a href="" class="nav-link">
                  <i class="far fa-check-circle"></i>
                  <p>Requisitos</p>
                </a>
              <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="<?php echo base_url(); ?>dashboard04/requisitos" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>Recomendaciones</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="<?php echo base_url(); ?>dashboard04/datos3" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>Adjuntar Cédula</p>
                    </a>
                  </li>
				  <li class="nav-item">
                    <a href="<?php echo base_url(); ?>dashboard04/datos7" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>Adjuntar Foto</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="<?php echo base_url(); ?>dashboard04/datos4" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>Adjuntar Titulo</p>
                    </a>
                  </li>
             
                  <?php //var_dump($periodo); 
                  if($this->session->userdata("trimestre")<>'INSCRIPCION' and $periodo->id<=15):?>
                  <li class="nav-item">
                    <a href="<?php echo base_url(); ?>dashboard04/datos6" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>Adjuntar Clausula </p>
                    </a>
                  </li>
                  <?php endif ?>
                  			  
                  <li class="nav-item">
                    <a href="<?php echo base_url(); ?>dashboard04/datos8" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>Adjuntar Carnet</p>
                    </a>
                  </li>
           		</ul>
          </li>  -->

         <li class="nav-item">
                <a href="<?php echo base_url(); ?>dashboard04/inscripcion" class="nav-link">
                  <i class="far fa-check-circle"></i>
                  <p>Inscripciones Postgrado</p>
                </a>
          </li>

          <li class="nav-item">
                <a href="<?php echo base_url(); ?>dashboard04/registro_pago/<?php echo $this->session->userdata("id" );?>" class="nav-link">
                  <i class="far fa-check-circle"></i>
                  <p>Registro de pago</p>
                </a>
          </li>

          

          
			
         
         
      
<?php }

 if ($this->session->userdata("inscripcion")==1){ ?>
 <li class="nav-item">
                <a href="<?php echo base_url(); ?>dashboard04/proceso" class="nav-link">
                  <i class="far fa-check-circle"></i>
                  <p>Estatus Proceso</p>
                </a>
          </li>
<?php }
} ?>
	 <hr>
  <?php if ($this->session->userdata("rol")== 5){?>     
     <li class="nav-header">(Períodos Inscripción Anteriores)</li>
          <li class="nav-item">
                <a href="<?php echo base_url(); ?>consultas/ver_planilla_cedula" class="nav-link">
                  <i class="far fa-check-circle"></i>
                  <p>Imprimir Planilla Inscripción <br></p>
                </a>
          </li>
<?php } ?>
           
        </ul>
        <?php } if ($this->session->userdata("rol")== 6 and $this->session->userdata("estado")== 1 ){?>
          
          <li class="nav-header">MENU ADMINISTRACIÓN</li>
             <li class="nav-item">
                     <a href="<?php echo base_url(); ?>admin/arancel" class="nav-link">
                       <i class="far fa-circle nav-icon"></i>
                       <p>Aranceles de Pago Inscripción</p>
                     </a>
               </li>
           <li class="nav-item">
                     <a href="<?php echo base_url(); ?>admin/aranceltram" class="nav-link">
                       <i class="far fa-circle nav-icon"></i>
                       <p>Aranceles de Trámites Adminstrativos</p>
                     </a>
               </li>
             <!--  <li class="nav-item">
                     <a href="<?php echo base_url(); ?>admin/unidad_c" class="nav-link">
                       <i class="far fa-circle nav-icon"></i>
                       <p>Valor Unidad de Crédito</p>
                     </a>
               </li>-->
 
               <hr>
               
               <li class="nav-item">
                     <a href="" class="nav-link">
                     <i class="fas far fa-bookmark">
                       <p>CONTROL DE ESTUDIOS</p></i>
                     </a>
                 <ul class="nav nav-treeview">
                     <li class="nav-item">          
                     <a href="<?php echo base_url(); ?>dashboard05" class="nav-link">
                       <i class="far fa-circle nav-icon"></i>
                       <p>Conciliacion</p>
                     </a>
               </li>
               <li class="nav-item">
                     <a href="<?php echo base_url(); ?>dashboard05/listconc" class="nav-link">
                       <i class="far fa-circle nav-icon"></i>
                       <p>Listado Conciliados</p>
                     </a>
               </li>
               <li class="nav-item">
                     <a href="<?php echo base_url(); ?>dashboard05/listconc_error" class="nav-link">
                       <i class="far fa-circle nav-icon"></i>
                       <p>Conciliados con Error</p>
                     </a>
               </li>
               <li class="nav-item">
                     <a href="<?php echo base_url(); ?>dashboard05/pago_adicional" class="nav-link">
                       <i class="far fa-circle nav-icon"></i>
                       <p>Registrar <br> Pagos Adicionales</p>
                     </a>
               </li>
           </li>
           </ul>
         
           <li class="nav-item">
                     <a href="" class="nav-link">
                     <i class="fas far fa-copy">
                       <p>TRÁMITES Y SOLICITUDES</p></i>
                     </a>
                 <ul class="nav nav-treeview">
                     <li class="nav-item">          
 
             
                     <a href="<?php echo base_url(); ?>dashboard09/conciliacion" class="nav-link">
                       <i class="far fa-circle nav-icon"></i>
                       <p>Conciliación</p>
                     </a>
               </li>
               <li class="nav-item">
                     <a href="<?php echo base_url(); ?>dashboard09/listconc" class="nav-link">
                       <i class="far fa-circle nav-icon"></i>
                       <p>Listado Conciliados</p>
                     </a>
               </li>
               <li class="nav-item">
                     <a href="<?php echo base_url(); ?>dashboard09/listconc_error" class="nav-link">
                       <i class="far fa-circle nav-icon"></i>
                       <p>Conciliados con Error</p>
                     </a>
               </li>
               <li class="nav-item">
                     <a href="<?php echo base_url(); ?>dashboard09/pago_adicional" class="nav-link">
                       <i class="far fa-circle nav-icon"></i>
                       <p>Registrar <br>Pagos Adicionales</p>
                     </a>
               </li>
               </ul>
               
               <li class="nav-item">  
                   <a href="<?php echo base_url(); ?>dashboard09/buscar_cedula_tramite" class="nav-link">
                   <i class="fa fa-copy" aria-hidden="true"></i>
                     <p>Trámites y/o Solicitudes <br> del Estudiante por cédula</p>
                   </a>
                 </li>
 <li class="nav-item">
                     <a href="" class="nav-link">
                 
                       <p> - PERIODOS ANTERIORES<br>(Consultas)</p>
                     </a>
                 <ul class="nav nav-treeview">
                     <li class="nav-item">      
                         <a href="<?php echo base_url(); ?>consultas/buscar_periodo_conciliaciones_regulares" class="nav-link">
                           <i class="far fa-circle nav-icon"></i>
                           <p>Estudiantes Aspirantes/Regulares</p>
                         </a>
                   </li>
                 
                   <li class="nav-item">
                         <a href="<?php echo base_url(); ?>consultas/buscar_periodo_conciliaciones_tramites" class="nav-link">
                           <i class="far fa-circle nav-icon"></i>
                           <p>Tramites Y Solicitudes</p>
                         </a>
                   </li>
      
                 </li>
               </ul>
           <hr>
              
             
            
   
 
          
          <?php } if ($this->session->userdata("rol")== 7 and $this->session->userdata("estado")== 1 ){?>
          
          <li class="nav-header">MENU ASPIRANTE</li>          
          <?php  
          $fecha_actual = date("Y-m-d");
          $hora_actual = date("H:i:s");
          $hora = (localtime(time(),true));
          $valor_preinscripcion=($tiempo_pre);
         // if(  $fecha_actual <=  '2025-04-25'){
          ?>
           <li class="nav-item">
                <a href="<?php echo base_url(); ?>dashboard08/index" class="nav-link">
                  <i class="far fa-check-circle"></i>
                  <p>Inicio </p>
                </a>
          </li>         

          <li class="nav-item">
                <a href="" class="nav-link">
                  <i class="far fa-check-circle"></i>
                  <p>Información del Aspirante</p>
                </a>
            <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="<?php echo base_url(); ?>dashboard08/datos" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>Datos Personales</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="<?php echo base_url(); ?>dashboard08/datos1" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>Direccion</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="<?php echo base_url(); ?>dashboard08/academico" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>Datos Académicos</p>
                    </a>
                  </li>
               <!--   <li class="nav-item">
                    <a href="<?php echo base_url(); ?>dashboard08/no_conducente" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>Estudios No Conducentes a Grado</p>
                    </a>
                  </li>-->
                  <li class="nav-item">
                    <a href="<?php echo base_url(); ?>dashboard08/datos2" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>Datos Laborales</p>
                    </a>
                  </li>
             <!--     <li class="nav-item">
                    <a href="<?php echo base_url(); ?>dashboard08/admitido" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>Datos de Interés</p>
                    </a>
                  </li>-->
              </ul>
			  </li>
  <?php
//if(  $fecha_actual <=  '2025-04-25'){
 // if //(($this->session->userdata("id")==4020 or $this->session->userdata("id")==4020 )or
//if ( '2023-10-20' <= $fecha_actual ){// and (in_array($this->session->userdata("id"), $id_usuario))) ) {
//if (in_array($this->session->userdata("id"), $id_usuario) ) {
  //echo "entra";
  ?>

  <li class="nav-item">
  <a href="<?php echo base_url(); ?>dashboard08/inscripcion" class="nav-link">
    <i class="far fa-check-circle"></i>
    <p>Registro de pago</p>
  </a>
  </li>
 <?php // } ?>
  <li class="nav-item">
        <a href="<?php echo base_url(); ?>dashboard08/requisitos" class="nav-link">
                  <i class="far fa-check-circle"></i>
                  <p>Requisitos</p>
                </a>
            
 	

           <li class="nav-item">
                <a href="<?php echo base_url(); ?>dashboard08/proceso" class="nav-link">
                  <i class="far fa-check-circle"></i>
                  <p>Estatus del Proceso Inscripción</p>
                </a>
          </li>
         
     
<ul>
         
          
          <?php // } 
          }?>
     
        


              <?php  if ($this->session->userdata("rol")== 11 and $this->session->userdata("estado")== 1 ){?>
          
          <li class="nav-header">MENU RRHH - PLANTILLA DOCENTE</li>           
          <li class="nav-item">
                <a href="<?php echo base_url(); ?>admin/docente/index" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Docentes</p>
                </a>
          </li>

          <?php } ?>


          <?php  if ($this->session->userdata("rol")== 3 and $this->session->userdata("estado")== 1 ){?>
          
  
          <li class="nav-header">MENU REVISOR</li>
          <li class="nav-item">
                <a href="" class="nav-link">
                  <i class="far fa-check-circle"></i>
                  <p>CONTROL DE ESTUDIOS</p>
                </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">     
                <li class="nav-header">  <i class="fa fa-bookmark" aria-hidden="true"></i>   Período Académico Vigente</li>    
		<ul> <li class="nav-header">Revisión Académica </li>
		      <li class="nav-item">
			    <a href="<?php echo base_url(); ?>dashboard05/revision_ac" class="nav-link">
			      <i class="far fa-circle nav-icon"></i>
			      <p>Estudiantes Regulares/Nvo Ingreso</p>
			    </a>
		      </li>
		</ul>
                <li class="nav-item">
                  <a href="<?php echo base_url(); ?>dashboard05/revision_ac_datos" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Información del Estudiante</p>
                  </a>
                </li>


                <li class="nav-item">
                  <a href="<?php echo base_url(); ?>dashboard05/inscritos" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Inscritos Oferta Acadéḿica</p>
                  </a>
                </li>
              
                <li class="nav-item">
                  <a href="<?php echo base_url(); ?>dashboard05/listado_general/5" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Listado Gral. Regulares</p>
                  </a>
                </li>

                <li class="nav-item">
                  <a href="<?php echo base_url(); ?>dashboard05/listado_general/8" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Listado Gral. Nuevos Ingresos</p>
                  </a>
                </li>
     <hr  style="background-color: #212529;">
                <li class="nav-header">  <i class="fa fa-bookmark" aria-hidden="true"></i>   CONSULTAS <br>(Períodos Inscripción Anteriores)</li>
                <li class="nav-item">
                  <a href="<?php echo base_url(); ?>consultas/index" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Regulares /Nuevos Ingresos
                    <br> Inscritos <br> (Ver Planilla)</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?php echo base_url(); ?>consultas/buscar_periodo_aspirantes" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Aspirantes
                    <br> Inscritos <br> (Ver Planilla)</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?php echo base_url(); ?>consultas/buscar_cedula" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Imprimir Planilla
                    <br> Estudiantes <br> </p>
                  </a>
                </li>
   <li class="nav-header">  <i class="fa fa-bookmark" aria-hidden="true"></i>   Revisión Plan de Clases y Evaluaciones<br>(Períodos Académicos Anteriores)</li>
                <li class="nav-item">
                  <a href="<?php echo base_url(); ?>dashboard05/buscar_plan_clases" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Matrículas y Notas Académicas</p>
                  </a>
                </li>    
                <li class="nav-item">
                  <a href="<?php echo base_url(); ?>dashboard07/buscar_cedula" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Notas Académicas del Estudiante</p>
                  </a>
                </li>    
            </li>  
        
           
                
      </ul>
</li>
       <hr  style="background-color: #212529;">
          <li class="nav-item">
                <a href="" class="nav-link">
                  <i class="far fa-check-circle"></i>
                  <p>TRÁMITES Y SOLICITUDES</p>
                </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">     
                <a href="" class="nav-link">  
                <i class="fa fa-copy" aria-hidden="true"></i>               
                  <p>Trámites y Solicitudes Revisadas</p>
                </a>
            <ul class="nav nav-treeview">  
            <li class="nav-item">   
              
            <a href="<?php echo base_url(); ?>dashboard09/tramites_validados_vigentes" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Otros Trámites <br>Administrativos </p>
                </a>   
              <a href="<?php echo base_url(); ?>dashboard09/retiro_voluntario_todos" class="nav-link">
                              <i class="far fa-circle nav-icon"></i>
                              <p>Retiro Voluntarios </p>
                          </a>
              <a href="<?php echo base_url(); ?>dashboard09/tramites_validados_vigentes_reincorporacion" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Reincorporaciones </p>
              </a>
              <a href="<?php echo base_url(); ?>dashboard09/tramites_validados_vigentes_egreso" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Solicitudes de Egreso </p>
              </a>
                          
                <a href="<?php echo base_url(); ?>dashboard09/constancias_estudios_generadas" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Constancias de Estudios Generadas</p>
                </a>
                <a href="<?php echo base_url(); ?>dashboard09/solicitudes_ruc_revisadas" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Solicitud de RUC </p>
                    </a>  
                </li>
            </ul>   
			 </li>
    </li>
                </ul>
		


            <ul class="nav nav-treeview">
                <li class="nav-item">     
                <a href="" class="nav-link">     
                <i class="fa fa-copy" aria-hidden="true"></i>            
                <p>Revisión de Trámites y Solicitudes</p>
                </a>
            <ul class="nav nav-treeview">  
            <li class="nav-item">   

                 <a href="<?php echo base_url(); ?>dashboard09/tramites_por_validar" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Solicitud de Otros Trámites <br>Administrativos </p>
                  </a>
 		
              <a href="<?php echo base_url(); ?>dashboard09/retiro_voluntario" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Solicitud de Retiro Voluntarios</p>
                  </a>
                  <a href="<?php echo base_url(); ?>dashboard09/solicitud_egreso_tramitados" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Solicitud de Egreso</p>
                  </a>                 
               </li>
                 </ul>
                </li>
                </ul>
            
                 <ul class="nav nav-treeview">
                <li class="nav-item">     
                  <a href="" class="nav-link">  
                  <i class="fa fa-copy" aria-hidden="true"></i>
                <p>Consultas de <br>Períodos Anteriores</p>
                </a>
                  <ul class="nav nav-treeview">  
                          <li class="nav-item">   
                                <a href="<?php echo base_url(); ?>dashboard09/buscar_periodo" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Trámites y/o Solicitudes </p>
                                </a>
                          </li>
                 </ul>
  
                
                </li>
                </ul>
                <hr  style="background-color: #212529;">

          <?php }    ?>               
 <hr  style="background-color: #212529;">
           <li class="nav-item">
            <a href="<?php echo base_url(); ?>auth/cambio_clave" class="nav-link">
             <i class="far fa-circle nav-icon"></i> 
              <p>Cambio de Clave</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url()?>auth/logout" class="nav-link">
              <i class="nav-icon "></i>
               <p>Salir</p>
            </a>
          </li>
          
       
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  

