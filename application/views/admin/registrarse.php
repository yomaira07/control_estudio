  <!-- Content Wrapper. Contains page content -->

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
    <!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
       <div class="card">
          
                 
                          <div class="card-header"> <a href="<?php echo base_url();?>" title="Ir a inicio"> <img src="<?php echo base_url(); ?>assets/img/logo2.png"  width="100px" height="100px"/></a> <strong> BIENVENIDO (A), Mi estimado (a) Aspirante</strong> 
 </br>
                          <a href="<?php echo base_url();?>" title="Ir a inicio"><img src="<?php echo base_url(); ?>assets/img/home.png"  width="25px" height="25px"/>Ir a Inicio</a> 
                          <div aling="center"><h4>  Sistema de Inscripción en Línea  del <b>Proceso de Selección 2025-2026 de Aspirantes</b> a cursar Programas de Postgrado en la Escuela Nacional de Fiscales del Ministerio Público </h4></div>
                        </div>

                      <div class="card-body">
                        <!-- Mensaje de Alerta-->
                        <?php  if ($this->session->flashdata("error")): ?>
                        <div class="alert alert-danger alert-dismissible">
                          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                          <p><i class="icon fa fa-ban"></i> <?php echo $this->session->flashdata("error"); ?> </p>
                        </div>
                      <?php endif; ?>
                        <?php  if ($this->session->flashdata("info")): ?>

                        <div class="alert alert-info alert-dismissible">
                          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                          <p><i class="icon fa fa-ban"></i> <?php echo $this->session->flashdata("info"); ?> </p>
                        </div>
                      <?php endif; ?>
                        <!-- Fin Mensaje de Alerta-->
                        <!-- Comienzo formulario -->
            <form action="<?php echo base_url()?>admin/aspirante/crear_usuario" method="POST" name=carga  >
                <input type="hidden" name="fecha_registro" value="<?php echo date('d-m-Y H:i:s'); ?>">
 <input type="hidden" name="mensaje" value="<?php echo( $this->uri->segment(3)); ?>">
 <?php if($this->uri->segment(3)==0):?>
                    <div class="form-group" align="center">
                       <div class="row"> 
                            <div class="col-3">
                              <label for="cedula"title="-Dato Obligatorio-Debe indicar el RIF en caso de ser ESTUDIANTE REGULAR O EGRESADO de lo contrario indique su C.I.">(*) Cédula de Identidad o RIF</label>
                            </div>                                   
                            <div class="col-1">
                       <select class="form-control" name="cod_nacionalidad" id="cod_nacionalidad" required>
                              <option value="V">V</option>
                              <option value="E">E</option> 
                             <!-- <option value="P">P</option>-->
                            </select>
                      </div>
                      <div class="col-4">
                        <input type="text" class="form-control" id="cedula" name="cedula" maxlength="9" minlength="6" onkeypress="return controltag(event)" value="" placeholder="Debe indicar el RIF en caso de ser ESTUDIANTE REGULAR O EGRESADO" required>
                      </div>
                    </div>
                </div>
                  <div class="form-group" align="center">
                    <div class="row">
                    <div class="col-3">
                    <label for="nombres"itle="-Dato Obligatorio-">(*) Primer Nombre</label>
                    </div>
                      <div class="col-5">
                        <input type="text" class="form-control" id="primer_nombre" placeholder=""  name="primer_nombre" onkeyup="javascript:this.value=this.value.toUpperCase();" value="" required>
                      </div>
                      </div>
                    </div>


                      <div class="form-group" align="center">
                    <div class="row">
                    <div class="col-3">
                    <label for="nombres"itle="-Dato Obligatorio-"> Segundo Nombre</label>
                    </div>
                       <div class="col-5">
                        <input type="text" class="form-control" id="segundo_nombre" placeholder=""  name="segundo_nombre" onkeyup="javascript:this.value=this.value.toUpperCase();" value="<?php echo $list_usuario->segundo_nombre; ?>" >
                      </div>
                    </div>
                  </div>
                  <div class="form-group" align="center">
                    <div class="row">
                    <div class="col-3">
                    <label for="apellidos"itle="-Dato Obligatorio-">(*) Primer Apellido</label>
                    </div>
                      <div class="col-5">
                        <input type="text" class="form-control" id="primer_apellido" placeholder=""  name="primer_apellido" onkeyup="javascript:this.value=this.value.toUpperCase();" value="<?php echo $list_usuario->apellidos; ?>" required>
                      </div>
                    </div>
                  </div>
                 <div class="form-group" align="center">
                    <div class="row">
                    <div class="col-3">
                    <label for="apellidos"itle="-Dato Obligatorio-"> Segundo Apellido</label>
                    </div>
                      <div class="col-5">
                        <input type="text" class="form-control" id="segundo_apellido" placeholder=""  name="segundo_apellido" onkeyup="javascript:this.value=this.value.toUpperCase();" value="<?php echo $list_usuario->apellidos; ?>" >
                      </div>
                    </div>
                  </div>
                  <div class="form-group" align="center">
                    <div class="row">
                    <div class="col-3">
                    <label for="correo"title="-Dato Obligatorio-">(*) Correo Electrónico</label>
                    </div>
                      <div class="col-5">
                        <input type="email" class="form-control" id="correo" placeholder="Debe indicar un correo 'Gmail', que sea de uso frecuente" name="correo" onkeyup="javascript:this.value=this.value.toUpperCase();" value="<?php echo $list_usuario->email; ?>" required>
                      </div>
                    </div>
                  </div>
                  <div class="form-group" >
                    <div class="row">
                      <div class="col-3" align="center">
                     <label for="programa" >Programa de Postgrado en que desea participar</label>
                     </div>
                     <div class="col-8"   >
                     <?Php foreach ($list_programa as $list_programa){
                        echo '<div required
                         id="programas"><input type="checkbox" name="checks[]" value="'.$list_programa->id.'" >  '.$list_programa->nombre_convocatoria.' (<b>'.$list_programa->modalidad_convocatoria.'</b>)  </div>';
                     }
                        ?>   
                     </div>   
                  </div>
                 </div>
                 <p></p>
                  <hr style="color;grey;">
                   <div class="form-group" align="justify" >
                    <div class="row">
                      <div class="col-12" >
                      <div align="center">
                       <div  class="w-50 p-3" style="background-color: #84b6f4; " align="justify"   >
                          <strong>Nota Informativa:</strong>  El valor de la inversión es de <b>Ref. 63.91 (especialización) ,Ref. 77.94 (maestría) ,Ref. 100 (doctorado)  </b> por programa. <br><p>

El arancel establecido será depositado en las siguientes cuentas bancarias, a nombre de la:<br> <b>FUNDACIÓN ESCUELA NACIONAL DE FISCALES DEL MINISTERIO PÚBLICO, <br>RIF G-200111232,

BANCO DE VENEZUELA N° 0102-0140-30-0000187046,
    BANESCO N° 0134-0044-08-0441052855, </b> </br>

 El monto del arancel está sujeto a la tasa <b>dólar(USD)</b> establecida por el BCV, del día que se realice la transferencia, NO SE PERMITE PAGO INTERBANCARIO NI PAGOMOVIL- en transferencia o efectivo. <br>
 La Escuela Nacional de Fiscales del Ministerio Público <i>no hará devoluciones</i>, por tanto, queda de cada aspirante el compromiso de atender oportunamente el proceso en el que se registrará y participará.
 <br>

 </div>  
 <hr style="color;grey;">
 <div align="center">
<b>IMPORTANTE:</b> El detalle de la información en relación al  <b>Proceso de Selección 2025-2026 </b> se encuentra en nuestra página web <b>WWW.ENF.EDU.VE</b>, en la sección de convocatoria.
<br>La dirección de correo electrónico suministrado será el único medio para comunicarnos con usted durante todo el proceso de selección, mismo con el que podrá recuperar en caso de olvidar o extraviar, su contraseña de acceso al Sistema de Preinscripción en Línea.
</div>
                        </div>  
                         </div>   
                       </div> 
                    </div> 
                     <p></p>
                         <hr style="color;grey;">
                        <div class="form-group" align="center" >
                         <div class="row">
                      <div class="col-12" >
                       <div align="center" >
                          <td align="center" id="termino"><h5><input type="checkbox" id="acepto"name="acepto" value="1" title="Acepto los términos" required> <strong>Todos los datos a suministrar estarán sujetos a verificación. <br> La falsedad de cualquiera de ellos acarreará la nulidad inmediata del procedimiento respectivo, </br>además de posibles sanciones administrativas, civiles y penales.</strong></h5>
                          </td>
                        </div>                    
                     </div>   
                  </div>
                </div>
               


                 <p></p>                  
                 <hr style="color;grey;">
            <!-- fin formulario-->           
                  
                  <div align="center"><button type="submit" class="btn btn-primary">Registrar Aspirante</button>
                  </div>
                  <input type="hidden" name="str" id="str">                 
          </div>
          <?php endif;?>
                </div><!-- /.card -->


    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

