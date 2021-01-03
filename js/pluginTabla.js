$(document).ready(function () {
  $('#registroTabla').DataTable({
    'language': {
      "url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
    },
  });

  $('#guardarAlumno').click(function (e) {
    e.preventDefault();    
    const datosAlumno = $('#containerAlumno').serialize();
    $.ajax({
      type: 'POST',
      url: './Components/RegistroAlumno.php',
      data: datosAlumno,
      success: function (r) {
        if (r == 1) {
          $("#div-results").modal('hide'); //ocultamos el modal
          $('body').removeClass('modal-open'); //eliminamos la clase del body para poder hacer scroll
          $('.modal-backdrop').remove();
          $('#div-results').load('Components/administrador/dashboardAlumnos.php');
          alertify.success('Alumno ingresado correctamente');
        } else {
          alert("error al ingresar datos"+datosAlumno);
        }
      }
    });

    return false;
  });

  $('#guardarMaestro').click(function (e) {
    e.preventDefault();
    const dato = $('#containerMaestro').serialize();
    console.log(dato);
    $.ajax({
      type: 'POST',
      url: 'Components/RegistroMaestro.php',
      data: dato,
      success: function (r) {
        if (r == 1) {
          $("#div-results").modal('hide'); //ocultamos el modal
          $('body').removeClass('modal-open'); //eliminamos la clase del body para poder hacer scroll
          $('.modal-backdrop').remove();
          $('#div-results').load('Components/administrador/dashBoardProfesor.php');
          alertify.success('Alumno ingresado correctamente');
        } else {
          alert("error al ingresar datos "+dato);
        }
      }
    });

    return false;
  });

  $('#actualizarDatos').click(function(e){
    e.preventDefault();
    var datos = $('#container2').serialize();
    $.ajax({
      type: 'POST',
      url: 'Components/editarAlumno.php',
      data: datos,
      success: function (r) {
        if (r == 1) {
          $("#div-results").modal('hide'); //ocultamos el modal
          $('body').removeClass('modal-open'); //eliminamos la clase del body para poder hacer scroll
          $('.modal-backdrop').remove();
          $('#div-results').load('Components/administrador/dashboardAlumnos.php');
          alert("alumno actualizado");
        } else {
          alert("error al ingresar datos "+r);
        }
      }
    });
  })
});

function editarAlumno(datos) {
  
  datosAlumnos = datos.split('||')
  $('#idAlumno').val(datosAlumnos[0]);
  $('#primerNombreAc').val(datosAlumnos[1]);
  $('#segundoNombreAc').val(datosAlumnos[2]);
  $('#primerApellidoAc').val(datosAlumnos[3]);
  $('#segundoApellidoAc').val(datosAlumnos[4]);
  $('#usuarioAc').val(datosAlumnos[9]);
  $('#telAc').val(datosAlumnos[5]);
  $('#estado').val(datosAlumnos[6]);
  $('#GradoAc').val(datosAlumnos[8]);
}
