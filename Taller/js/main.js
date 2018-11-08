jQuery(document).ready(function() {
    $('#Serv').DataTable( {
    dom: 'Bfrtip',
    buttons: [
        'copyHtml5',
        'excelHtml5',
        'csvHtml5',
        'pdfHtml5',
        'print'
    ]
    });
    
    $('#slimtest2').slimScroll({
        height: '150px'
    });
    $('#serviciosscroll').slimScroll({
      height: '150px'
  });
  $('#tallerservicio').slimScroll({
    height: '150px'
  });
    !function(window, document, $) {
                    "use strict";
                    $("input,select,textarea").not("[type=submit]").jqBootstrapValidation();
        }(window, document, jQuery);

            $("#paginator3").datepaginator({
                size: "small"
            }), 



    $('#ordenes').DataTable( {
    dom: 'Bfrtip',
    buttons: [
        'copyHtml5',
        'excelHtml5',
        'csvHtml5',
        'pdfHtml5',
        'print'
    ]
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

}); 

