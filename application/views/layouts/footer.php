<footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Versión</b> 2.0
    </div>
    <strong>Copyright &copy; 2019-2026 SCE-ENFMP.</strong> All rights
    reserved.
 <div aling ="center">Sugerimos utilizar para mejor funcionamiento el navegador Mozilla Firefox <img src="<?php echo base_url(); ?>assets/img/firefox.jpeg" width="25px"> </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?php echo base_url(); ?>assets/template/plugins/jquery/jquery.min.js"></script>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
 <!--<script src="<?php echo base_url(); ?>assets/template/ajax/libs/jquery/2.2.4/jquery.min.js"></script>-->
<!-- Bootstrap 4 -->
<script src="<?php echo base_url(); ?>assets/template/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url(); ?>assets/template/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url(); ?>assets/template/dist/js/demo.js"></script>
<!-- DataTables -->
<script src="<?php echo base_url(); ?>assets/template/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/template/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?php echo base_url(); ?>assets/template/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<script src="<?php echo base_url(); ?>assets/template/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?php echo base_url(); ?>assets/template/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<!-- bs-custom-file-input -->
<script src="<?php echo base_url(); ?>assets/template/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<!-- DataTables Export -->
<script src="<?php echo base_url();?>assets/template/datatables-export/js/dataTables.buttons.min.js"></script>
<script src="<?php echo base_url();?>assets/template/datatables-export/js/buttons.flash.min.js"></script>
<script src="<?php echo base_url();?>assets/template/datatables-export/js/jszip.min.js"></script>
<script src="<?php echo base_url();?>assets/template/datatables-export/js/pdfmake.min.js"></script>
<script src="<?php echo base_url();?>assets/template/datatables-export/js/vfs_fonts.js"></script>
<script src="<?php echo base_url();?>assets/template/datatables-export/js/buttons.html5.min.js"></script>
<script src="<?php echo base_url();?>assets/template/datatables-export/js/buttons.print.min.js"></script>
<!-- daterangepicker -->
<script src="<?php echo base_url(); ?>assets/template/plugins/moment/moment.min.js"></script>
<script src="<?php echo base_url(); ?>assets/template/plugins/daterangepicker/daterangepicker.js"></script>
<!-- ChartJS -->
<script src="<?php echo base_url(); ?>assets/template/plugins/chart.js/Chart.min.js"></script>
<script type="text/javascript">
$(document).ready(function () {
  bsCustomFileInput.init();
});
</script>
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
   

  });




</script>

<script>
function sumar() {

  var total = 0;

  $(".monto").each(function() {

    if (isNaN(parseFloat($(this).val()))) {

      total += 0;

    } else {

      total += parseFloat($(this).val());

    }

  });

  //alert(total);
  document.getElementById('spTotal').innerHTML = total;

}
</script>
<script >
$('#checkall').change(function () {
    $('.cb-element').prop('checked',this.checked);
});

$('.cb-element').change(function () {
 if ($('.cb-element:checked').length == $('.cb-element').length){
  $('#checkall').prop('checked',true);
 }
 else {
  $('#checkall').prop('checked',false);
 }
});
</script>

<!--FUNCION SOLO NUMERO  -->
<script type="text/javascript"> function controltag(e) {

        tecla = (document.all) ? e.keyCode : e.which;

        if (tecla==8) return true;

        else if (tecla==0||tecla==9)  return true;

       // patron =/[0-9\s]/;// -> solo letras

        patron =/[0-9\s]/;// -> solo numeros

        te = String.fromCharCode(tecla);

        return patron.test(te);

    }

  </script>

<!-- COMBO DE OFERTA ACADEMICA -->
<script>
$(document).ready(function(){

$('#comboprograma').change(function(){
     //alert( "Handler for .change() called." );
     var programa_id = $('#comboprograma').val();
     //alert( "Data Loaded: " + programa_id );
     if(programa_id != '')
     {
       //  alert( "si tiene valor" );
        $.ajax({
        url:"<?php echo base_url(); ?>dashboard09/combotramite/"+programa_id,
        type:"POST",
        data:{programa_id:programa_id},
        success:function(data)
        {
        // alert (data);
         
 $('#combotramite').html(data);
        }
        });
     }
     else
     {
     //alert( "no tiene valor" );
      $('#combotramite').html('<option value="">Seleccionar Tramite</option>');
     }
});
$('#comboprogramaRuc').change(function(){
     //alert( "Handler for .change() called." );
     var programa_id = $('#comboprogramaRuc').val();
     //alert( "Data Loaded: " + programa_id );
     if(programa_id != '')
     {
       //  alert( "si tiene valor" );
        $.ajax({
        url:"<?php echo base_url(); ?>dashboard09/combotramiteRuc/"+programa_id,
        type:"POST",
        data:{programa_id:programa_id},
        success:function(data)
        {
       //  alert (data);
          $('#combotramiteRuc').html(data);
        }
        });
     }
     else
     {
     //alert( "no tiene valor" );
      $('#combotramiteRuc').html('<option value="">Seleccionar Tramite</option>');
     }
});

$('#comboprogramaRucRe').change(function(){
     //alert( "Handler for .change() called." );
     var programa_id = $('#comboprogramaRucRe').val();
     //alert( "Data Loaded: " + programa_id );
     if(programa_id != '')
     {
       //  alert( "si tiene valor" );
        $.ajax({
        url:"<?php echo base_url(); ?>dashboard09/combotramiteRuc_requisito/"+programa_id,
        type:"POST",
        data:{programa_id:programa_id},
        success:function(data)
        {
       //  alert (data);
          $('#combotramiteRucRe').html(data);
        }
        });
     }
     else
     {
     //alert( "no tiene valor" );
      $('#combotramiteRucRe').html('<option value="">Seleccionar Tramite</option>');
     }
});
 $('#programa').change(function(){
      //alert( "Handler for .change() called." );
      var programa_id = $('#programa').val();
      //alert( "Data Loaded: " + programa_id );
      if(programa_id != '')
      {
       // alert( "si tiene valor" );
       $.ajax({
        url:"<?php echo base_url(); ?>admin/oferta_academica/combo_unidad",
        type:"POST",
        data:{programa_id:programa_id},
        success:function(data)
        {
         $('#pensum').html(data);
        }

       });
      }
      else
      {

      //alert( "no tiene valor" );
       $('#pensum').html('<option value="">Select Pensum</option>');
      }
 });

/// optener datos del valor del combo pensu

  $('#pensum').change(function(){
        //alert( "Handler for .change() called." );
        var pensum_id = $('#pensum').val();
        var precio_uc=0;
        //alert( "Data Loaded: " + pensum_id );
        if(pensum_id != '')
        {
         // alert( "si tiene valor" );
         $.ajax({
              url:"<?php echo base_url(); ?>admin/oferta_academica/info_unidad",
              type:"POST",
              data:{pensum_id:pensum_id},
              dataType : 'json',
              success:function(data)
              {
               var jsonstring = JSON.stringify(data);
               var jsonobject = JSON.parse(jsonstring);
              
           //   alert(  JSON.stringify(data)  );
             // alert( "Data Loaded: " + jsonobject.codigo );
         

              $("#codigo").val(jsonobject.codigo) ;
              $("#trimestre").val(jsonobject.trimestre) ;
              $("#unidad").val(jsonobject.unidad_curricular) ;
              $("#tipo_programa").val(jsonobject.tipo_programa) ;
            //    alert(jsonobject.tipo_programa);
              // Calculo de valores  ///
           
                if(jsonobject.tipo_programa=='1'){
                //  alert('especializaciones');
                   var precio_uc = $('#valor_unidad').val();
                   $("#valor").val(precio_uc) ;
                  var valor_unidad = jsonobject.unidad_curricular ;
                  var total_general = parseFloat(precio_uc) * parseFloat(valor_unidad);

                  $("#monto_general").val(total_general) ;

                  var precio_uc_mp = ($('#valor_unidad').val())-($('#valor_unidad').val()*40/100);
                  // valor de la unidad para mp
                  $("#valor_mp").val(precio_uc_mp.toFixed(2) );  
                  // total a pagar por persona del  mp
                  var total_general_mp = parseFloat(precio_uc_mp) * parseFloat(valor_unidad);
                  $("#monto_mp").val(total_general_mp.toFixed(2) );

                 //  alert('especializaciones');
                }else{
                   if(jsonobject.tipo_programa=='2'){
                  var precio_uc = $('#valor_unidadm').val();
                  $("#valor").val(precio_uc) ;
               //   alert('maestria');
                  var valor_unidad = jsonobject.unidad_curricular ;
                  var total_general = parseFloat(precio_uc) * parseFloat(valor_unidad);

                  $("#monto_general").val(total_general) ;

                  var precio_uc_mp = ($('#valor_unidadm').val())-($('#valor_unidadm').val()*40/100);
                  // valor de la unidad para mp
                  $("#valor_mp").val(precio_uc_mp.toFixed(2) );  
                  // total a pagar por persona del  mp
                  var total_general_mp = parseFloat(precio_uc_mp) * parseFloat(valor_unidad);
                  $("#monto_mp").val(total_general_mp.toFixed(2) );
                }
              }
              
             

             

              //alert( "Data Loaded: " + total_general_mp );
              //alert( "Data Loaded: " + valor_unidad );
              //alert( "Data Loaded: " + resultado );
             

              }

          });
        }
        else
        {
        //alert( "no tiene valor" );
         $('#codigo').html('sin valor');
        }
  })

  
 });

////// CHECK BOX de INSCRIPCION

 $(document).ready(function() {

  $('[name="checks[]"]').click(function() {
      
    var arr = $('[name="checks[]"]:checked').map(function(){
      return this.value;
    }).get();

    var str = arr.join(',');
    
    $('#arr').text(JSON.stringify(arr));
    
    //$('#str').text(str);

    $('#str').val(str);
    
  
  });

});

////// sacar lo carculo de costo
</script>
<!-- //FIN COMBO DE OFERTA ACADEMICA -->



<script type="text/javascript">
  ////// CHECK BOX de REGISTRO PAGO

 $(document).ready(function() {

  $('[name="checkspago[]"]').click(function() {
      
        var arr = $('[name="checkspago[]"]:checked').map(function(){
          return this.value;
        }).get(); 
        var str = arr.join(',');
        $('#arr').text(JSON.stringify(arr));
        $('#valor').val(str);
    
        if(str != '');
        {
          //alert( str );
          $.ajax({
                  url:"<?php echo base_url(); ?>dashboard04/valor_pago",
                  type:"POST",
                  data:{str:str},
                  dataType : 'json',
                  success:function(data)
                  {
                  //alert( url );
                  var jsonstring = JSON.stringify(data);
                  var jsonobject = JSON.parse(jsonstring);
                  // alert(  JSON.stringify(data)  );
                  //alert( "Data Loaded: " + jsonobject.codigo );
                  }
            })
                  
        } 
        else
        {
        alert( "no tiene valor" );
         //$('#codigo').html('sin valor');
        }
    


   });

/// optener datos del valor del combo pensu

  //$("#valor").change(function(){
     //   alert( "Handler for .change() called." );
     //   var materias_id = $('#valor').val();
        //alert( "Data Loaded: " + materias_id );
        /*
        if(pensum_id != '')
        {
         // alert( "si tiene valor" );
         $.ajax({
              url:"<?php //echo base_url(); ?>admin/oferta_academica/info_unidad",
              type:"POST",
              data:{pensum_id:pensum_id},
              dataType : 'json',
              success:function(data)
              {
               var jsonstring = JSON.stringify(data);
               var jsonobject = JSON.parse(jsonstring);
              
               //alert(  JSON.stringify(data)  );
              //alert( "Data Loaded: " + jsonobject.codigo );

              $("#codigo").val(jsonobject.codigo) ;
              $("#trimestre").val(jsonobject.trimestre) ;
              $("#unidad").val(jsonobject.unidad_curricular) ;

              // Calculo de valores  ///

              var precio_uc = $('#valor_unidad').val();

              $("#valor").val(precio_uc) ;

              var valor_unidad = jsonobject.unidad_curricular ;
              var total_general = parseFloat(precio_uc) * parseFloat(valor_unidad);

               $("#monto_general").val(total_general) ;

               var precio_uc_mp = ($('#valor_unidad').val())-($('#valor_unidad').val()*40/100);
             // valor de la unidad para mp
             $("#valor_mp").val(precio_uc_mp.toFixed(2) );  
              // total a pagar por persona del  mp
              var total_general_mp = parseFloat(precio_uc_mp) * parseFloat(valor_unidad);
              $("#monto_mp").val(total_general_mp.toFixed(2) );

              //alert( "Data Loaded: " + total_general_mp );
              //alert( "Data Loaded: " + valor_unidad );
              //alert( "Data Loaded: " + resultado );
             

              }

          });
        }
        else
        {
        //alert( "no tiene valor" );
         $('#codigo').html('sin valor');
        }
        */
 // })

});

</script>




<!-- //COMBO ESTADO MUNICIPIO PARROQUIA -->
<script>
$(document).ready(function(){

 $('#comboestado').change(function(){
      //alert( "Handler for .change() called." );
      var comboestado_id = $('#comboestado').val();
      //alert( "Data Loaded: " + programa_id );
      if(comboestado_id != '')
      {
       // alert( "si tiene valor" );
       $.ajax({
        url:"<?php echo base_url(); ?>dashboard04/combo_estado",
        type:"POST",
        data:{comboestado_id:comboestado_id},
       success:function(data)
        {
         $('#combomunicipio').html(data);
        }

       });
      }
      else
      {

      //alert( "no tiene valor" );
       $('#combomunicipio').html('<option value="">Seleccione Municipio</option>');
      }
 });

 $('#combomunicipio').change(function(){
      //alert( "Handler for .change() called." );
      var combomunicipio_id = $('#combomunicipio').val();
      //alert( "Data Loaded: " + programa_id );
      if(combomunicipio_id != '')
      {
       // alert( "si tiene valor" );
       $.ajax({
        url:"<?php echo base_url(); ?>dashboard04/combo_municipio",
        type:"POST",
        data:{combomunicipio_id:combomunicipio_id},
       success:function(data)
        {
         $('#comboparroquia').html(data);
        }

       });
      }
      else
      {

      //alert( "no tiene valor" );
       $('#comboparroquia').html('<option value="">Seleccione Parroquia</option>');
      }
 });

});
</script>
<!-- FIN  COMBO ESTADO MUNICIPIO PARROQUIA -->

</body>
</html>
