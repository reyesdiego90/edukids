$(document).ready(function () {
  // $('#registroTabla').DataTable({
  //   'language': {
  //     "url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
  //   },
  // });

  $("#calificaciones").click(function(e){
    e.preventDefault();    
    const datosAlumno = $('#formAnuncio').serialize();
    console.log(datosAlumno);
    $.ajax({
      type: 'POST',
      url: './Components/Maestro/calificaciones.php',
      data: datosAlumno,
      success: function (r) {
        if (r == 1) {
          $("#div-results").modal('hide'); //ocultamos el modal
          $('body').removeClass('modal-open'); //eliminamos la clase del body para poder hacer scroll
          $('.modal-backdrop').remove();
          $('#div-results').load('Components/administrador/anuncioMaestro.php');
          alertify.success('Alumno ingresado correctamente');
        } else {
          alert("error al ingresar datos"+datosAlumno);
        }
      }
    });

    return false;
  });

});