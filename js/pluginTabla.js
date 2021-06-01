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

  $('#actualizarDatosMaestro').click(function(e){
    e.preventDefault();
    var datos = $('#container2').serialize();
    $.ajax({
      type: 'POST',
      url: 'Components/editMaestro.php',
      data: datos,
      success: function (r) {
        if (r == 1) {
          $("#div-results").modal('hide'); //ocultamos el modal
          $('body').removeClass('modal-open'); //eliminamos la clase del body para poder hacer scroll
          $('.modal-backdrop').remove();
          $('#div-results').load('Components/administrador/dashBoardProfesor.php');
          alert("alumno actualizado");
        } else {
          alert("error al ingresar datos "+r);
        }
      }
    });
  })

  $('#guardarCurso').click(function(e){
    e.preventDefault();
    var datos = $('#addCourse').serialize();
    $.ajax({
      type: 'POST',
      url: 'Components/agregarCurso.php',
      data: datos,
      success: function (r) {
        if (r == 1) {
          $("#div-results").modal('hide'); //ocultamos el modal
          $('body').removeClass('modal-open'); //eliminamos la clase del body para poder hacer scroll
          $('.modal-backdrop').remove();
          $('#div-results').load('Components/administrador/asignacionCursos.php');
          alertify.success("Curso Agregado con Exito");
        } else {
          alertify.error("La materia que quiso agregar ya existe");
        }
      }
    });
  })

  $('#Materia').click(function(e){
    e.preventDefault();
    var datos = $('#addMateria').serialize();
    $.ajax({
      type: 'POST',
      url: 'Components/agregarMateria.php',
      data: datos,
      success: function (r) {
        if (r == 1) {
          $("#div-results").modal('hide'); //ocultamos el modal
          $('body').removeClass('modal-open'); //eliminamos la clase del body para poder hacer scroll
          $('.modal-backdrop').remove();
          $('#div-results').load('Components/administrador/asignacionCursos.php');
          alertify.success("Materia Agregado con Exito");
        } else {
          alertify.error("La materia que quiso agregar ya existe");
        }
      }
    });
  })

  $('#courseAssignment').click(function(e){
    e.preventDefault();
    var datos = $('#assigment').serialize();
    $.ajax({
      type: 'POST',
      url: 'Components/asignarCurso.php',
      data: datos,
      success: function (r) {
        if (r == 1) {
          $("#div-results").modal('hide'); //ocultamos el modal
          $('body').removeClass('modal-open'); //eliminamos la clase del body para poder hacer scroll
          $('.modal-backdrop').remove();
          $('#div-results').load('Components/administrador/asignacionCursos.php');
          alert("curso asignado correctamente");
        } else {
          alert("error al ingresar datos "+r);
        }
      }
    });
  })

  $('#eliminarAsignacion').click(function(e){
    e.preventDefault();
    var datos = $('#assigment1').serialize();
    $.ajax({
      type: 'POST',
      url: 'Components/eliminarAsig.php',
      data: datos,
      success: function (r) {
        if (r == 1) {
          $("#div-results").modal('hide'); //ocultamos el modal
          $('body').removeClass('modal-open'); //eliminamos la clase del body para poder hacer scroll
          $('.modal-backdrop').remove();
          $('#div-results').load('Components/administrador/asignacionCursos.php');
          alertify.success("curso eliminado correctamente");
        } else {
          alert("error al ingresar datos "+r);
        }
      }
    });
  })

  $('#eliminarCurso1').click(function(e){
    e.preventDefault();
    var datos = $('#assigment2').serialize();
    $.ajax({
      type: 'POST',
      url: 'Components/eliminarCurso.php',
      data: datos,
      success: function (r) {
        if (r == 1) {
          $("#div-results").modal('hide'); //ocultamos el modal
          $('body').removeClass('modal-open'); //eliminamos la clase del body para poder hacer scroll
          $('.modal-backdrop').remove();
          $('#div-results').load('Components/administrador/asignacionCursos.php');
          alertify.success("curso eliminado correctamente");
        } else {
          alertify.error("error al Eliminar el curso, revise si algun maestro esta asignado a esa clase");
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

function editarMaestro(datos) {
  datosMaestro = datos.split('||')
  console.log(datosMaestro);
  $('#idMaestro').val(datosMaestro[0]);
  $('#primerNombreAc').val(datosMaestro[1]);
  $('#segundoNombreAc').val(datosMaestro[2]);
  $('#primerApellidoAc').val(datosMaestro[3]);
  $('#segundoApellidoAc').val(datosMaestro[4]);
  $('#correoAc').val(datosMaestro[5]);
  $('#usuarioAc').val(datosMaestro[8]);
  $('#telAc').val(datosMaestro[6]);
  $('#estado').val(datosMaestro[7]);
}

function eliminarAsignacion(datos) {
  datosAsignacion = datos.split('||')
  console.log(datosAsignacion);
  $('#idAsignacion').val(datosAsignacion[0]);
}

function eliminarCur(datos) {
  datosAsignacion = datos.split('||')
  console.log(datosAsignacion);
  $('#idCurso').val(datosAsignacion[0]);
  $('#idGradoEliminar').val(datosAsignacion[1]);
}
