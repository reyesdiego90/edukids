$(document).ready(function () {
  // $('#registroTabla').DataTable({
  //   'language': {
  //     "url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
  //   },
  // });

  $("#subirAnuncioDiario").click(function(e){
    e.preventDefault();    
    const datosAlumno = $('#anuncioDiario').serialize();
    console.log(datosAlumno);
    $.ajax({
      type: 'POST',
      url: './Components/Maestro/anuncioDiarioSQL.php',
      data: datosAlumno,
      success: function (r) {
        if (r == 1) {
          $('#div-results').load('Components/Maestro/anuncio.php');
          alertify.success('Alumno ingresado correctamente');
        } else {
          alert("error al ingresar datos"+datosAlumno);
        }
      }
    });

    return false;
  });

});