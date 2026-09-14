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
                      <h3 class="card-title"><strong>Oferta Academicas</strong></h3>
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
            <form action="<?php echo base_url()?>admin/oferta_academica/oferta_store" method="POST" name=carga >

              <input type="hidden" name="id_usuario" value="<?Php echo $this->session->userdata('id'); ?>">
              <input type="hidden" name="valor_unidad" id="valor_unidad" value="<?Php echo $unidadcredito->monto; ?>">
  		<input type="hidden" name="valor_unidadm" id="valor_unidadm" value="<?Php echo $unidadcredito_maestria->monto; ?>">
     
                  
                <input type="hidden" name="fecha_registro" value="<?php echo date('d-m-Y H:i:s'); ?>">
		 <div class="form-group row">
                    <label for="fecha_inicio" class="col-sm-3 col-form-label"title="-Dato Obligatorio-">(*) Fecha Inicio</label>
                    <div class="col-sm-9">
                      <input type="date" class="form-control" id="fecha_inicio" name="fecha_inicio"  required="true" value="2026-09-07"> 
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="fecha_fin" class="col-sm-3 col-form-label"title="-Dato Obligatorio-">(*) Fecha Fin</label>
                    <div class="col-sm-9">
                      <input type="date" class="form-control" id="fecha_fin" name="fecha_fin"  required="true" value="2026-11-28"> 
                    </div>
                  </div>
                   <div class="form-group row">
                    <label for="periodo" class="col-sm-3 col-form-label"title="-Dato Obligatorio-">(*) Período</label>
                    <div class="col-sm-9">
                      <select name="periodo" class="form-control" required>
                      <option value="">Seleccione...</option>
                        <?Php foreach ($list_periodo as $list_periodo){
                         if ($list_periodo->id==23)  echo "<option value='".$list_periodo->id."' selected >".$list_periodo->nombre."</option>";  
                        }
                        ?>
                      </select>
                    </div>
                  </div>		

                   <div class="form-group row">
                    <label for="programa_label" class="col-sm-3 col-form-label"title="-Dato Obligatorio-">(*) Programa de Postgrado</label>
                    <div class="col-sm-9">
                      <select name="programa" id="programa" class="form-control" required>
                      <option value="">Seleccione...</option>
                        <?Php foreach ($list_programa as $list_programa){
                          echo "<option value='".$list_programa->id."'>".$list_programa->nombre.' - '.$list_programa->modalidad_convocatoria."</option>";  
                        }
                        ?>
                      </select>
                    </div>
                  </div>
                   <div class="form-group row">
                    <label for="pensum" class="col-sm-3 col-form-label"title="-Dato Obligatorio-">(*) Unidad Curricular</label>
                    <div class="col-sm-9">
                      <select name="pensum" id="pensum" class="form-control input-lg">
                        <option value="">Seleccione...</option>
                       </select>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="codigo" class="col-sm-3 col-form-label"title="-Dato Obligatorio-">(*) Codigo</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="codigo" name="codigo" onkeyup="javascript:this.value=this.value.toUpperCase();" required="true"  readonly > 
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="trimestre" class="col-sm-3 col-form-label"title="-Dato Obligatorio-">(*) Trimestre</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="trimestre" name="trimestre" 
                      placeholder="Trimestre de la unidad curricular" required="true" onkeyup="javascript:this.value=this.value.toUpperCase();" readonly>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="dia_label" class="col-sm-3 col-form-label"title="-Dato Obligatorio-">(*) Dia de Clases</label>
                    <div class="col-sm-9">
                      <select name="dia" id="dia" class="form-control" required>
                      <option value="">Seleccione...</option>
                        <?Php foreach ($list_dia as $list_dia){
                          echo "<option value='".$list_dia->id."'>".$list_dia->descripcion."</option>";  
                        }
                        ?>
                      </select>
                    </div>
                  </div>
                   <div class="form-group row">
                    <label for="seccion" class="col-sm-3 col-form-label"title="-Dato Obligatorio-">(*) Modalidad</label>
                    <div class="col-sm-9">
                      <select name="modalidad" id="modalidad" class="form-control" required>
                        <option value="0">Seleccione...</option>
                        <option value='1'>Presencial</option>  
                        <option value='2'>Virtual</option>                      
                        <option value='3'>Semipresencial</option>                      
                      </select>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="docente_label" class="col-sm-3 col-form-label">Docente que Impartira la Unidad Curricular</label>
                    <div class="col-sm-9">
                      <select name="docente" id="docente" class="form-control" 
                      <option value="">Seleccione...</option>
                        <?Php foreach ($list_docente as $list_docente){
				if($list_docente ->id_docente==78){
                          		echo "<option value='".$list_docente->id_docente."' selected>".$list_docente->primer_nombre."  ". $list_docente->primer_apellido."</option>";  
				}else{
					echo "<option value='".$list_docente->id_docente."' >".$list_docente->primer_nombre." ".$list_docente->primer_apellido."</option>";
				}
			}
                        ?>
                      </select>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="horario" class="col-sm-3 col-form-label"title="-Dato Obligatorio-">(*) Horario de Clase</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="horario" name="horario" 
                      placeholder="ejemplo: 4:00pm a 6:15pm" required="true" onkeyup="javascript:this.value=this.value.toUpperCase();" >
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="unidad" class="col-sm-3 col-form-label"title="-Dato Obligatorio-">(*) Unidad de Credito</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="unidad" name="unidad" 
                      placeholder="Nro unidad curricular" required="true" onkeyup="javascript:this.value=this.value.toUpperCase();"readonly >
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="seccion" class="col-sm-3 col-form-label"title="-Dato Obligatorio-">(*) Seccion</label>
                    <div class="col-sm-9">
                      <select name="seccion" id="seccion" class="form-control" required>
                      <option value="">Seleccione...</option>
                        <?Php foreach ($list_seccion as $list_seccion){
                          echo "<option value='".$list_seccion->id."'>".$list_seccion->nombre."</option>";  
                        }
                        ?>
                      </select>
                    </div>
                  </div>
                   <div class="form-group row">
                    <label for="cupos" class="col-sm-3 col-form-label"title="-Dato Obligatorio-">(*) Cupos de la Seccion</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="cupos" name="cupos" 
                      placeholder="Cantidad de cupo de la seccion" required="true" onkeyup="javascript:this.value=this.value.toUpperCase();" >
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="valor" class="col-sm-3 col-form-label"title="-Dato Obligatorio-">(*) Valor Publico General</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="valor" name="valor" 
                      placeholder="Valor al publico" required="true" onkeyup="javascript:this.value=this.value.toUpperCase();" >
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="monto_general" class="col-sm-3 col-form-label"title="-Dato Obligatorio-">(*) Monto Total Publico General</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="monto_general" name="monto_general" 
                      placeholder="Monto General a pagar" required="true" onkeyup="javascript:this.value=this.value.toUpperCase();" >
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="valor_mp" class="col-sm-3 col-form-label"title="-Dato Obligatorio-">(*) Valor Personal MP</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="valor_mp" name="valor_mp" 
                      placeholder="Valor al personal mp" required="true" onkeyup="javascript:this.value=this.value.toUpperCase();" >
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="monto_mp" class="col-sm-3 col-form-label"title="-Dato Obligatorio-">(*) Monto Total Personal MP</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="monto_mp" name="monto_mp" 
                      placeholder="Monto total personal mp" required="true" onkeyup="javascript:this.value=this.value.toUpperCase();" >
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
