jQuery(document).ready(function() 
{
    /*********************feCha */
    d=new Date();
    m=d.getUTCMonth()+1
    $fecha=d.getDate()+'/'+m+'/'+d.getFullYear()
    $("#fechaparaordenes").val($fecha.split("/").reverse().join("-"))
    //--taller
    cargarordenesdeservicio();
    cargarsolicitud();
    cargarordenescliente();
    //----cliente
    getdatosactualautocliente();
    getclienteproximoservicio();
    
    $('#serviciocheckorden').slimScroll({
      height: '150px'
    });
    $('#tallerserviciochek').slimScroll({
      height: '150px'
    });
    
    $('#slimtest2').slimScroll({
          height: '150px'
    });
    $('#serviciosscroll').slimScroll({
        height: '150px'
    });
    $('#tablaeditarserviciodeorden').slimScroll({
      height: '150px'
    });
    $('#tallerservicio').slimScroll({
      height: '150px'
    });
    $('#nuevo-turnoscroll').slimScroll({
      height: '150px'
    });
    $('#asignarturnonuevo').slimScroll({
      height: '150px'
    });
    $('#modificarturnochek').slimScroll({
      height: '150px'
    });
    
  


  $('#sa-warning').click(function(){
      swal({
          title: "Quiere eliminar el vehiculo?",
          text: "Una vez eliminado, no podra ver el historial",
          icon: "warning",
          buttons: true,
          dangerMode: true,
        })
        .then((willDelete) => {
          if (willDelete) {
            swal({
              title:"Listo!",
              text:"Tu vehiculo se a eliminado", 
              icon: "success",
            });
          } else {
            swal({   
                  title:"Tu vehiculo esta a salvo",  
                  icon: "error"});
          }
      });
  });
  $('#cancelarturno').click(function(){
      swal({
          title: "¿Quiere eliminar el Turno?",
          text: "Una vez eliminado, Tendra que sacar uno nuevo",
          icon: "warning",
          buttons: true,
          dangerMode: true,
        })
        .then((willDelete) => {
          if (willDelete) {
            swal({
              title:"Listo!",
              text:"ya no tienes mas turno", 
              icon: "success",
            });
          } else {
            swal({   
                title:"!Su turno continua agendado¡", 
                text:" lo estaremos esperando...", 
                  icon: "error"});
          }
        });
  });

  $('.eliminarorden').click(function(){
    swal({
        title: "¿Quiere eliminar el Orden?",
        text: "Una vez eliminado, Tendra que crear lo de nuevo",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
          swal({
            title:"Listo!",
            text:"se elimino", 
            icon: "success",
          });
        } else {
          swal({   
              title:"!Cancelado¡", 
                icon: "error"});
        }
      });
  });

  $('.eliminarsolicitud').click(function(){
    swal({
        title: "¿Quiere eliminar la Solicitud?",
        text: "Una vez eliminado, Tendra que crear lo de nuevo",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
          swal({
            title:"Listo!",
            text:"se elimino", 
            icon: "success",
          });
        } else {
          swal({   
              title:"!Cancelado¡", 
                icon: "error"});
        }
      });
  });

  $('.eliminarServicio').click(function(){
    swal({
        title: "¿Quiere eliminar el servicio?",
        text: "Una vez eliminado, Tendra que crear lo de nuevo",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
          swal({
            title:"Listo!",
            text:"se elimino", 
            icon: "success",
          });
        } else {
          swal({   
              title:"!Cancelado¡", 
                icon: "error"});
        }
      });
  });

  $('.baja-taller').click(function(){
    swal({
        title: "¿Quiere eliminar el Taller?",
        text: "Una vez eliminado, Tendra que crear lo de nuevo",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
          swal({
            title:"Listo!",
            text:"se elimino", 
            icon: "success",
          });
        } else {
          swal({   
              title:"!Cancelado¡", 
                icon: "error"});
        }
      });
  });


  $('#cargarkm').click(function(){
      swal({
          title:"Ingrese el Kilometraje",
          content: "input",
        }).then((value) => {
          swal(`Se modifico el Kilometraje a: ${value} Km`);
        });
  });



  $("#btnasignarturno").click(asignarorden)

////------------------botones con funciones de ajax-------------------

  $("#formasignarturnonuevo").submit(function(e){
      e.preventDefault();
      var select = [];
      $tid=0;
      $dominio=$("#dominionuevoturno").val();
      $fecha=$("#fechaordennuevoturno").val();
      $horario=$("#horaordennuevoturno").val();
      console.log($fecha,$horario);
      $obs=$("#obsdennuevoturno").val();
      $.each($("input[name='checkservicio']:checked"), function(){            
        select.push($(this).val());
        console.log($(this).val());
      });
      if(select.length>0){
        $.ajax({
          url: "../clases/tabla.php",
          method: "GET",
          async: false,
          data: {funcion: "setordendeservicio",tid:$tid,dominio:$dominio,fecha:$fecha,select:select,horario:$horario,obs:$obs},
          success: function(result) {
            if(result){
              swal({
                title: "¡Se cargo con exito!",
                text: " Turno para "+$dominio+" el dia "+$fecha,
                icon: "success",
                dangerMode: true,
              })
              cargarordenesdeservicio();
            }
            else{
              swal({
                title: "¡Ups!",
                text: "Pruebe de nuevo",
                icon: "error",
                dangerMode: true,
              })
            }

          }
      });
      }
      else{
        swal({
          title: "¡No selecciono servicio!",
          text: "Tiene que seleccionar un servicio",
          icon: "warning",
          dangerMode: true,
        })
      }
  })  

  $("#fechaparaordenes").change(cargarordenesdeservicio);

  $('#btnguardarturnomodificado').on("click",guardarturnoeditado);



$('#formeditarturno :checkbox').change(function() {
   $("#btnguardarturnomodificado").prop( "disabled", false );
});
$("#editarordenfecha").change(function(){
  $("#btnguardarturnomodificado").prop( "disabled", false );
})
$("#editarordenhorario").change(function(){
  $("#btnguardarturnomodificado").prop( "disabled", false );
})

$('#tallerserviciochek :checkbox').change(function() {
  $("#modificarserviciostaller").prop( "disabled", false );
});

$("#modificarserviciostaller").click(btnmodificarserviciotaller);

}) ///fin load





/****funciones de ajax */


function getsesion(){
  $.ajax({
    url: "../clases/tabla.php",
    method: "GET",
    async: false,
    data: {funcion: "getsesion"},
    dataType: "json",
    success: function(respuesta) {      
        if(respuesta != null){
         //  console.log(respuesta)
        }
  }
})

}



function cargarordenesdeservicio(){
  $fecha=$("#fechaparaordenes").val();
  $tid=0;
  $.ajax({
    url: "../clases/tabla.php",
    method: "GET",
    async: false,
    data: {funcion: "gettablaordenes",fecha:$fecha,tid:$tid},
    dataType: "json",
    success: function(respuesta) {
      if ( $.fn.dataTable.isDataTable( '#tordenes') ) {
        table = $('#tordenes').DataTable();
        table.destroy();
      }
      if(respuesta != null && $.isArray(respuesta)){
        $('#tordenesbody').html("");      
            $.each(respuesta, function(index, value){ 
               if(value.estado==2){
                $("#tordenesbody").append("<tr class='bg-green'><td>" + value.oid + "</td><td>" + value.dominio + "</td><td><span class='text-muted'><i class='fa fa-clock-o'></i>" + value.horario +'</td><td class="d-none sm-block ">'+value.nombre+'</td><td> <a href="#" data-toggle="modal" data-target="#ver-orden" onclick="verdetalleorden('+value.oid+','+value.tipo+')"> <span class="label bg-info"><i class="fa fa-eye"></i></span></a><a href="#" onclick=eliminarorden('+value.oid+','+value.tipo+')> <span class="label label-danger"><i class="fa fa-ban"></i></span></a></td></tr>');
               }
               else{
                $("#tordenesbody").append("<tr><td>" + value.oid + "</td><td>" + value.dominio + "</td><td><span class='text-muted'><i class='fa fa-clock-o'></i>" + value.horario +'</td><td class="d-none sm-block ">'+value.nombre+'</td><td> <a href="#" data-toggle="modal" data-target="#editar-orden" onclick="cargareditarorden('+value.oid+','+value.tipo+')"> <span class="label bg-green"><i class="fa fa-pencil"></i></span></a><a href="#" onclick=eliminarorden('+value.oid+','+value.tipo+')> <span class="label label-danger"><i class="fa fa-ban"></i></span><a href="#" onclick=cumplimentarorden('+value.oid+','+value.tipo+','+value.vid+')> <span class="label label-info"><i class="fa fa-check"></a></td></tr>');
               }
            });
          
            $('#tordenes').DataTable( {
              dom: 'Bfrtip',
              buttons: [
                  'copyHtml5',
                  'excelHtml5',
                  'csvHtml5',
                  'pdfHtml5',
                  'print'
              ]
              });
        }
      else{
        console.log("salio error")
      } 
  }
})
}


function cargarsolicitud(){
  var $tid =tengotaller();
  $.ajax({
    url: "../clases/tabla.php",
    method: "GET",
    async: false,
    data: {funcion: "gettablaservicio",tid:$tid},
    dataType: "json",
    success: function(respuesta) {
      if ( $.fn.dataTable.isDataTable( '#solturnos') ) {
        table = $('#solturnos').DataTable();
        table.destroy();
      }
      if(respuesta != null && $.isArray(respuesta)){
        $('#Solicitudbody').html("");      
            $.each(respuesta, function(index, value){ 
                var val="'"+value.observacion+"'";
                $("#Solicitudbody").append("<tr><td>"+ value.sid +"</td><td>" + value.dominio + "</td><td >"+value.nombre+'</td><td> <a href="#" data-toggle="modal" data-target="#asignar-turno" onclick="generarordenservicio('+value.sid+','+val+')"> <span class="label bg-green"><i class="fa fa-pencil"></i></span></a><a href="#" onclick=eliminarsolicitudservicio('+value.sid+')> <span class="label label-danger"><i class="fa fa-ban"></i></span></a></td></tr>');
            });
            $('#solturnos').DataTable( {
              dom: 'Bfrtip',
              buttons: [
                  'copyHtml5',
                  'excelHtml5',
                  'csvHtml5',
                  'pdfHtml5',
                  'print'
              ]
              });
          
        }
      else{
        console.log("salio error");
      }
              
  }
})
}

function cargareditarorden($oid,$t){
  if($t==1){
    $buscar="select `ordenes-detalle`.oid, servicios.nombre, vehiculos.dominio,`ordenes-detalle`.observacion,  ordenes.fecha, ordenes.horario, codser as codserv from `ordenes-detalle` inner join ordenes on `ordenes-detalle`.oid = ordenes.oid inner join vehiculos on vehiculos.vid = ordenes.vid inner join servicios on servicios.codserv = `ordenes-detalle`.codser where `ordenes-detalle`.estado!=0 and ordenes.estado!=0 and  ordenes.oid="+$oid
    $("#editarordenestitulo").text("Edicion de orden generada por solicitud")
  }
  else{
    $buscar='select ordenentaller.otid as oid, `ordenentaller-detalle`.codserv,`ordenentaller-detalle`.observacion, servicios.nombre, ordenentaller.fecha, ordenentaller.horario, ordenentaller.dominio from `ordenentaller-detalle` inner join  ordenentaller on ordenentaller.otid =`ordenentaller-detalle`.otid inner join servicios on servicios.codserv=`ordenentaller-detalle`.codserv where ordenentaller.estado!=0 and `ordenentaller-detalle`.estado!=0 and ordenentaller.otid='+$oid
   $("#editarordenestitulo").text("Edicion de orden generada en taller")
  }
  $.ajax({
    url: "../clases/tabla.php",
    method: "GET",
    async: false,
    data: {funcion: "cargareditarorden",buscar:$buscar},
    dataType: "json",
    success: function(respuesta) {      
        if(respuesta != null && $.isArray(respuesta)){
            $("#modificarturnochek").find('input:checkbox').removeAttr('checked');
            $.each(respuesta, function(index, value){               
              $("#modificarturnochek").find("input:checkbox[value="+value.codserv+"]").attr("checked", true);
            });
          $("#dominioeditarorden").val(respuesta[0].dominio);
          $("#editarordenfecha").val(respuesta[0].fecha.split("/").reverse().join("-"));
          $("#editarordenhorario").val(respuesta[0].horario);
          $("#modificarturnoobservacion").val(respuesta[0].observacion);
          $("#editarordennumero").text(respuesta[0].oid);
        }
        
      }
  });
}

function verdetalleorden($oid,$t){
  if($t==1){
    $buscar="select `ordenes-detalle`.oid, servicios.nombre, vehiculos.dominio,`ordenes-detalle`.observacion,  ordenes.fecha, ordenes.horario, codser as codserv from `ordenes-detalle` inner join ordenes on `ordenes-detalle`.oid = ordenes.oid inner join vehiculos on vehiculos.vid = ordenes.vid inner join servicios on servicios.codserv = `ordenes-detalle`.codser where `ordenes-detalle`.estado!=0 and ordenes.estado!=0 and  ordenes.oid="+$oid
    $("#editarordenestitulo").text("Edicion de orden generada por solicitud")
  }
  else{
    $buscar='select ordenentaller.otid as oid, `ordenentaller-detalle`.codserv,`ordenentaller-detalle`.observacion, servicios.nombre, ordenentaller.fecha, ordenentaller.horario, ordenentaller.dominio from `ordenentaller-detalle` inner join  ordenentaller on ordenentaller.otid =`ordenentaller-detalle`.otid inner join servicios on servicios.codserv=`ordenentaller-detalle`.codserv where ordenentaller.estado!=0 and `ordenentaller-detalle`.estado!=0 and ordenentaller.otid='+$oid
   $("#editarordenestitulo").text("Edicion de orden generada en taller")
  }
  $.ajax({
    url: "../clases/tabla.php",
    method: "GET",
    async: false,
    data: {funcion: "cargareditarorden",buscar:$buscar},
    dataType: "json",
    success: function(respuesta) {     
        if(respuesta != null && $.isArray(respuesta)){
            $("#verturnochek").find('input:checkbox').removeAttr('checked');
            $.each(respuesta, function(index, value){               
              $("#verturnochek").find("input:checkbox[value="+value.codserv+"]").attr("checked", true);
            });
          $("#verdominioeditarorden").val(respuesta[0].dominio);
          $("#verordenfecha").val(respuesta[0].fecha.split("/").reverse().join("-"));
          $("#verordenhorario").val(respuesta[0].horario);
          $("#verturnoobservacion").val(respuesta[0].observacion);
          $("#verdennumero").text(respuesta[0].oid);
        }
        
      }
  });
}

function verdetalleordenclieten($oid){
  $buscar="select `ordenes-detalle`.oid, servicios.nombre, vehiculos.dominio,`ordenes-detalle`.observacion,  ordenes.fecha, ordenes.horario, codser as codserv from `ordenes-detalle` inner join ordenes on `ordenes-detalle`.oid = ordenes.oid inner join vehiculos on vehiculos.vid = ordenes.vid inner join servicios on servicios.codserv = `ordenes-detalle`.codser where `ordenes-detalle`.estado!=0 and ordenes.estado!=0 and  ordenes.oid="+$oid 
  $.ajax({
    url: "../clases/tabla.php",
    method: "GET",
    async: false,
    data: {funcion: "cargareditarorden",buscar:$buscar},
    dataType: "json",
    success: function(respuesta) {     
        if(respuesta != null && $.isArray(respuesta)){
            $("#verturnochekcliente").find('input:checkbox').removeAttr('checked');
            $.each(respuesta, function(index, value){               
              $("#verturnochekcliente").find("input:checkbox[value="+value.codserv+"]").attr("checked", true);
            });
          $("#verdominioeditarordencliente").val(respuesta[0].dominio);
          $("#verordenfechacliente").val(respuesta[0].fecha.split("/").reverse().join("-"));
          $("#verordenhorariocliente").val(respuesta[0].horario);
          $("#verordenobservacioncliente").val(respuesta[0].observacion);
          $("#vernumeroordencliente").text(respuesta[0].oid);
        }
        
      }
  });
}
function extrastabla(){
  $('.tablas').DataTable( {
    dom: 'Bfrtip',
    buttons: [
        'copyHtml5',
        'excelHtml5',
        'csvHtml5',
        'pdfHtml5',
        'print'
    ]
    });
}

function guardarturnoeditado(){
  var select = [];
  $oid=$("#editarordennumero").text();
  if($("#editarordenestitulo").text()=="Edicion de orden generada por solicitud"){
    $t=true;
  }
  else{
    $t=false;
  }
  $dominio=$("#dominionuevoturno").val();
  $fecha=$("#editarordenfecha").val();
  $horario=$("#editarordenhorario").val();
  $obs=$("#modificarturnoobservacion").val();
  $.each($("input[name='checkserviciomodificar']:checked"), function(){            
    select.push($(this).val());
  });
  if(select.length>0){
    $.ajax({
      url: "../clases/tabla.php",
      method: "GET",
      async: false,
      data: {funcion: "modificarturnoasignado",oid:$oid,t:$t,dominio:$dominio,fecha:$fecha,select:select,horario:$horario,obs:$obs},
      success: function(result) {
        console.log(result);
        if(result){
          swal({
            title: "¡Se modificado con exito!",
            text: " el Turno para el vehiculo: "+$dominio,
            icon: "success",
            dangerMode: true,
          })
          cargarordenesdeservicio();
        }
        else{
          swal({
            title: "¡Ups!",
            text: "Pruebe de nuevo",
            icon: "error",
            dangerMode: true,
          })
        }

      }
    });
    
  }
  else{
    swal({
      title: "¡No selecciono servicio!",
      text: "Tiene que seleccionar un servicio",
      icon: "warning",
      dangerMode: true,
    })
  }
}  

function eliminarorden($oid,$t){
  swal({
    title: "¿Quiere eliminar el servicio?",
    text: "Una vez eliminado, Tendra que crear lo de nuevo",
    icon: "warning",
    buttons: true,
    dangerMode: true,
  })
  .then((willDelete) => {
    if (willDelete) {
      $.ajax({
        url: "../clases/tabla.php",
        method: "GET",
        async: false,
        data: {funcion: "eliminarorden", oid:$oid, t:$t},
        success: function(result) {
          if(result){
            swal({
              title: "¡Se eliminado con exito!",
              text: "No se podra recuperar",
              icon: "success",
              dangerMode: true,
            })
            cargarordenesdeservicio();
          }
          else{
            swal({
              title: "¡Ups!",
              text: "Pruebe de nuevo",
              icon: "error",
              dangerMode: true,
            })
          }
    
        }
      });
    } else {
      swal({   
          title:"!Cancelado¡", 
            icon: "error"});
    }
  });
}
function generarordenservicio($sid,$ob)
{
  $("#observacioneclientesolicitud").val($ob);
  $("#asignarturnosolicitudnro").text($sid);

  $.ajax({
    url: "../clases/tabla.php",
    method: "GET",
    async: false,
    data: {funcion: "cargarordenservicio",sid:$sid},
    dataType: "json",
    success: function(respuesta) {     
        if(respuesta != null && $.isArray(respuesta)){
            $("#serviciocheckorden").find('input:checkbox').removeAttr('checked');
            $.each(respuesta, function(index, value){               
              $("#serviciocheckorden").find("input:checkbox[value="+value.codserv+"]").attr("checked", true);

            });
            $("#dominioserv").val(respuesta[0].dominio)
        }
        
        
      }
  });
  

}
function asignarorden(){
  $sid=$("#asignarturnosolicitudnro").text();
  var $hora=$("#horasolicitudorden").val();
  var $fecha=$("#fechasolicitudorden").val();
  var $vid;
  var $tid;
  var $select=[];
  var $observacion=$("#tallerobservacioneclientesolicitud").val()
    $.ajax({
      url: "../clases/tabla.php",
      method: "GET",
      async: false,
      data: {funcion: "cargarordenservicio",sid:$sid},
      dataType: "json",
      success: function(respuesta) {     
          if(respuesta != null){
          $vid=respuesta[0].vid;
          $tid=respuesta[0].tid    
          }
          $.each($("input[name='checkservicioserviciosorden']:checked"), function(){            
            $select.push($(this).val());
          });
        }
        
    });

    $.ajax({
      url: "../clases/tabla.php",
      method: "GET",
      async: false,
      data: {funcion: "asignarturno", sid:$sid, vid:$vid, tid:$tid, fecha:$fecha, hora:$hora, select:$select, observacion:$observacion},
      dataType: "json",
      success: function(respuesta) {  
        console.log(respuesta)
        if(respuesta){
          swal({
            title: "¡Se generado la orden con exito!",
            text: " el Turno para la solicitud "+$sid,
            icon: "success",
            dangerMode: true,
          })
        }
        cargarsolicitud();
      }
    });

    $(".modal .close").click();

}

function eliminarsolicitudservicio($sid){
  console.log($sid);
  swal({
    title: "¿Quiere eliminar la solicitud?",
    text: "Una vez eliminada, el cliente tendra que crearla denuevo",
    icon: "warning",
    buttons: true,
    dangerMode: true,
  })
  .then((willDelete) => {
    if (willDelete) {
      $.ajax({
        url: "../clases/tabla.php",
        method: "GET",
        async: false,
        data: {funcion: "anularsolicitud", sid:$sid},
        dataType: "json",
        success: function(respuesta) {     
            if(respuesta){
              swal({
                title:"Listo!",
                text:"se elimino la solicitud", 
                icon: "success",
              });
              cargarsolicitud();
            }
          }
      });
    } else {
      swal({   
          title:"!Cancelado¡", 
            icon: "error"});
    }
  });
}

function cargarserviciostaller(){
  var $tid =tengotaller();
  $.ajax({
    url: "../clases/tabla.php",
    method: "GET",
    async: false,
    data: {funcion: "serviciostaller", tid:$tid},
    dataType: "json",
    success: function(respuesta) {     
        if(respuesta){
          $("#editartallernombre").val(respuesta[0].taller);
          $("#talleradministrador").val(respuesta[0].nombre);
          $("#tallerserviciochek").find('input:checkbox').removeAttr('checked');
            $.each(respuesta, function(index, value){               
              $("#tallerserviciochek").find("input:checkbox[value="+value.codserv+"]").attr("checked", true);

            });
          
        }
      }
  });

}

function btnmodificarserviciotaller(){

  var $tid =tengotaller();
  var $select=[];
  $.each($("input[name='tallerservicioeditar']:checked"), function(){            
    $select.push($(this).val());
  });
  console.log($select);
  $.ajax({
    url: "../clases/tabla.php",
    method: "GET",
    async: false,
    data: {funcion: "modificarserviciotaller",tid:$tid,select:$select},
    dataType: "json",
    success: function(respuesta) {     
        if(respuesta){
          swal({
            title: "¡Se modificado con exito!",
            text: "ya se encuentran disponibles los servicios configurados",
            icon: "success",
            dangerMode: true,
          })

            
        }
    }
  });
  $(".modal .close").click();
}

function tengotaller(){
  var $tid;
  $.ajax({
    url: "../clases/tabla.php",
    method: "GET",
    async: false,
    data: {funcion: "tengotaller"},
    dataType: "json",
    success: function(respuesta) {     
        if(respuesta){
          $tid=respuesta[0].tid;
        }
    }
  });
  return $tid;
}

function cumplimentarorden($oid,$tipo,$vid){
   $fecha=$("#fechaparaordenes").val();
  swal({
      title: "¿Orden finalizada?",
      text: "¿Quiere dar por finalizada la Orden?",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
    .then((willDelete) => {
      if (willDelete) {
        if($tipo==1){
          swal({
            title:"Cumplimentar Orden",
            text:"Ingrese el quilometraje",
            content: "input",
          }).then((value) => {
            if($.isNumeric(value)){
              $.ajax({
                url: "../clases/tabla.php",
                method: "GET",
                async: false,
                data: {funcion: "cumplimentarorden", oid:$oid,tipo:true, vid:$vid,km:value,fecha:$fecha},
                dataType: "json",
                success: function(respuesta) { 
                  if(respuesta){
                    cargarordenesdeservicio();
                    swal({
                      title:"Listo!",
                      text:`Se dio por finalizada la orden y se cargaron los ${value} Km`, 
                      icon: "success",
                      
                    });
                  }
                 
                }
              });   
            }
            else{
              swal({
                title:"Error!",
                text:`El km debe de ser numerico`, 
                icon: "error",
                
              });
            }
                    
          });
        }
        else{
          $.ajax({
            url: "../clases/tabla.php",
            method: "GET",
            async: false,
            data: {funcion: "cumplimentarorden",oid:$oid,tipo:$tipo,vid:"null",km:"null",fecha:"null"},
            dataType: "json",
            success: function(respuesta) {  
              console.log("sdasd");
              if(respuesta){
                cargarordenesdeservicio();
                swal({
                  title:"Listo!",
                  text:`Se dio por finalizada la orden`, 
                  icon: "success",
                  
                });
              }
            }
          });
        }   
      } 
      else {
        swal({   
            title:"!Cancelado¡", 
              icon: "error"
        });
      }
    });
}


//cliente

function getdatosactualautocliente(){
$vid=1;
$.ajax({
  url: "../clases/tabla.php",
  method: "GET",
  async: false,
  data: {funcion: "getkmydomautocliente",vid:$vid},
  dataType: "json",
  success: function(respuesta) {     
      if(respuesta != null){
          $("#dominioautocliente").text(respuesta[0].dominio);
          $("#kmautocliente").text(respuesta[0].km);
      }
      
    }
});

}

function getclienteproximoservicio(){
$vid=1;
$.ajax({
  url: "../clases/tabla.php",
  method: "GET",
  async: false,
  data: {funcion: "getproximoserviciocliente",vid:$vid},
  dataType: "json",
  success: function(respuesta) {   
    console.log(respuesta)
      if(respuesta != null){
        if(respuesta[0].servicio=="No registra proximo servicio"){
          $("#proximoserviciocliente").text("No registra proximo servicio");
        }
        else {
          if(new Date(respuesta[0].servicio).getTime()< new Date().getTime()){
            $("#proximoserviciocliente").text("No registra proximo servicio");
          }
          else
          {
            $("#proximoserviciocliente").text(respuesta[0].servicio);
          }
          
        }
          
      }
      
    }
});
}

function proximoturnoscliente(){
  $.ajax({
    url: "../clases/tabla.php",
    method: "GET",
    async: false,
    data: {funcion: "proximoturnoscliente"},
    dataType: "json",
    success: function(respuesta) {
      if ( $.fn.dataTable.isDataTable( '#proximosturnosclientetabla') ) {
        table = $('#proximosturnosclientetabla').DataTable();
        table.destroy();
      }
      if(respuesta != null){
        $('#proximosturnosclientebody').html("");      
            $.each(respuesta, function(index, value){ 
              console.log("entro")
                $("#proximosturnosclientebody").append("<tr><td>" + value.oid + "</td><td>" + value.dominio + "</td><td>" + value.nombre+ "</td><td>" + value.fecha +'</td><td>'+value.servicios+'</td></tr>');
            });
          
            $('#proximosturnosclientetabla').DataTable( {
              dom: 'Bfrtip',
              buttons: [
                  'copyHtml5',
                  'excelHtml5',
                  'csvHtml5',
                  'pdfHtml5',
                  'print'
              ]
              });
        }
      else{
        console.log("salio error")
      } 
  }
})
}

function cargarordenescliente(){
  $vid=1;
  $.ajax({
    url: "../clases/tabla.php",
    method: "GET",
    async: false,
    data: {funcion: "servicioauto",vid:$vid},
    dataType: "json",
    success: function(respuesta) {
      if ( $.fn.dataTable.isDataTable( '#ordenescliente') ) {
        table = $('#ordenescliente').DataTable();
        table.destroy();
      }
      if(respuesta != null && $.isArray(respuesta)){
        console.log(respuesta)
        $('#ordenesclientebody').html("");      
            $.each(respuesta, function(index, value){ 
                $("#ordenesclientebody").append("<tr><td>" + value.oid + "</td><td>" + value.taller+ "</td><td><span class='text-muted'><i class='fa fa-clock-o'></i>" + value.fecha +'</td><td>'+value.servicio+'</td><td >'+value.km+'</td><td> <a href="#" data-toggle="modal" data-target="#ver-ordencliente" onclick="verdetalleordenclieten('+value.oid+')"> <span class="label bg-info"><i class="fa fa-eye"></i></span></a></span></a></td></tr>');
            });
          
            $('#ordenescliente').DataTable( {
              dom: 'Bfrtip',
              buttons: [
                  'copyHtml5',
                  'excelHtml5',
                  'csvHtml5',
                  'pdfHtml5',
                  'print'
              ]
              });
        }
      else{
        console.log("salio error")
      } 
  }
})
}