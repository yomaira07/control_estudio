  <!-- Content Wrapper. Contains page content -->

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
    <!-- /.container-fluid -->
    </section>
 
    <!-- Main content -->
    <section class="content">

       <div class="card">
         
<div class="card-header">
  <h3 class="card-title" >Especialización y/o Programa de Postgrado:  <b> <?php echo $buscaroferca->programa_nombre; ?></b></h3>
</div>
<div class="card-header">
  <h3 class="card-title" >Unidad Curricular; <b><?php echo $buscaroferca->pensum_nombre; ?> </b></h3>
</div>
<div class="card-header">
  <h3 class="card-title"> Código:  <b> <?php echo $buscaroferca->codigo; ?></b></h3>
</div> 
                    <div class="card-header">
                      <h3 class="card-title"><strong>Editar Oferta Academicas</strong></h3>
                    </div>

                      <div class="card-body">
                        <!-- Mensaje de Alerta-->
                        <?php  if ($this->session->flashdata("error")): ?>
                        <div class="alert alert-danger alert-dismissible">
                          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                          <p><i class="icon fa fa-ban"></i> <?php echo $this->session->flashdata("error"); ?> </p>
                        </div>
                      <?php endif; ?>
                        <!-- Fin Mensaje de Alerta-->
                        <!-- Comienzo formulario -->
            <form action="<?php echo base_url()?>admin/oferta_academica/oferta_edit_store" method="POST" name=carga >
            	<input type="hidden" name="id_oferta_academica" value="<?php echo $buscaroferca->id_oferta; ?>">
              <input type="hidden" name="id_usuario" value="<?Php echo $this->session->userdata('id'); ?>">
              <input type="hidden" name="valor_unidad" id="valor_unidad" value="<?Php echo $unidadcredito->monto; ?>">
                  
                <input type="hidden" name="fecha_registro" value="<?php echo date('d-m-Y H:i:s'); ?>">

                 <div class="form-group row">
                    <label for="seccion" class="col-sm-3 col-form-label"title="-Dato Obligatorio-">(*) Modalidad</label>
                    <div class="col-sm-9">
                      <select name="modalidad" id="modalidad" class="form-control" required>
                        <option value="0" <?php if($buscaroferca->modalidad==0) echo 'selected'; ?>>  Seleccione...</option>
                        <option value="1" <?php if($buscaroferca->modalidad==1) echo 'selected'; ?>>PRESENCIAL</option>  
                        <option value="2" <?php if($buscaroferca->modalidad==2) echo 'selected'; ?>>VIRTUAL</option>                      
                        <option value="3" <?php if($buscaroferca->modalidad==3) echo 'selected'; ?>>SEMIPRESENCIAL</option>                      
                      </select>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="dia_label" class="col-sm-3 col-form-label"title="-Dato Obligatorio-">(*)Dia de Clases</label>
                    <div class="col-sm-9">
                      <select name="dia" id="dia" class="form-control" required>
                      <option value="">Seleccione...</option>
                        <?Php foreach ($list_dia as $list_dia){
                        	if($list_dia->id== $buscaroferca->id_dia_clase){
                        	echo "<option value='".$list_dia->id."' selected>".$list_dia->descripcion."</option>";
                             }else{
	                          echo "<option value='".$list_dia->id."'>".$list_dia->descripcion."</option>"; 
	                          } 
                        }
                        ?>
                      </select>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="docente_label" class="col-sm-3 col-form-label"title="-Dato Obligatorio-">(*)Docente que Impartira la Unidad Curricular</label>
                    <div class="col-sm-9">
                      <select name="docente" id="docente" class="form-control" required>
                      <option value="">Seleccione...</option>
                        <?Php foreach ($list_docente as $list_docente){
                        	if($list_docente->id_docente== $buscaroferca->id_docente){
                        	echo "<option value='".$list_docente->id_docente."' selected>".$list_docente->primer_nombre." ".$list_docente->segundo_nombre." ".$list_docente->primer_apellido." ".$list_docente->segundo_apellido."</option>";
                             }else{
                               	echo "<option value='".$list_docente->id_docente."' >".$list_docente->primer_nombre." ".$list_docente->segundo_nombre." ".$list_docente->primer_apellido." ".$list_docente->segundo_apellido."</option>";
                      		}
                        }
                        ?>
                      </select>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="horario" class="col-sm-3 col-form-label"title="-Dato Obligatorio-">(*)Horario de Clase</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="horario" name="horario" 
                      placeholder="ejemplo: 4:00pm a 6:15pm" required="true" onkeyup="javascript:this.value=this.value.toUpperCase();" value="<?php echo $buscaroferca->horario; ?>" >
                    </div>
                  </div>
                 
                  <div class="form-group row">
                    <label for="seccion" class="col-sm-3 col-form-label"title="-Dato Obligatorio-">(*) Seccion</label>
                    <div class="col-sm-9">
                      <select name="seccion" id="seccion" class="form-control" required>
                      <option value="">Seleccione...</option>
                        <?Php foreach ($list_seccion as $list_seccion){
                        	if($list_seccion->nombre== $buscaroferca->seccion){
                        	echo "<option value='".$list_seccion->id."' selected>".$list_seccion->nombre."</option>";
                             }else{
                          	echo "<option value='".$list_seccion->id."'>".$list_seccion->nombre."</option>";
                          	}  
                        }
                        ?>
                      </select>
                    </div>
                  </div>
                   <div class="form-group row">
                    <label for="cupos" class="col-sm-3 col-form-label"title="-Dato Obligatorio-">(*) Cupos de la Seccion</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="cupos" name="cupos" 
                      placeholder="Cantidad de cupo de la seccion" required="true" onkeyup="javascript:this.value=this.value.toUpperCase();" value="<?php echo $buscaroferca->cupos; ?>" >
                    </div>
                  </div>
                  
            <!-- fin formulario-->
           
                  <button type="submit" class="btn btn-primary">Cargar</button>
                
            </form>
          </div>
                </div><!-- /.card -->





    </section>
    <!-- /.content -->



  </div>
  <!-- /.content-wrapper -->
