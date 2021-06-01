$(document).ready(function() {
  $('#dashboard').on('click', function(){
    $.ajax({
        type: "POST",
        url: "./Components/administrador/dashboardAlumnos.php",
        success: function(response) {
            $('#div-results').html(response);
        }
    });
  }); 
  $('#maestroDash').on('click', function(){
    $.ajax({
        type: "POST",
        url: "./Components/administrador/dashBoardProfesor.php",
        success: function(response) {
            $('#div-results').html(response);
        }
    });
  }); 
  $('#agregarCursos').on('click', function(){
    $.ajax({
        type: "POST",
        url: "./Components/administrador/asignacionCursos.php",
        success: function(response) {
            $('#div-results').html(response);
        }
    });
  }); 

  $("#anunciosMaestro").on('click', function(){
    $.ajax({
      type: "POST",
      url: "./Components/Maestro/anuncioMaestro.php",
      success: function(response) {
          $('#div-results').html(response);
      }
    });
  })

  $("#anunciosMaestro2").on('click', function(){
    $.ajax({
      type: "POST",
      url: "./Components/Maestro/anuncioMaestro.php",
      success: function(response) {
          $('#div-results').html(response);
      }
    });
  })

  $("#mostrarDoc").on('click', function(){
    $.ajax({
      type: "POST",
      url: "./Components/Maestro/mostrarTareas.php",
      success: function(response) {
          $('#div-results').html(response);
      }
    });
  })

  $("#mostrarCursos").on('click', function(){
    $.ajax({
      type: "POST",
      url: "./Components/Alumno/mostrarClases.php",
      success: function(response) {
          $('#div-results').html(response);
      }
    });
  })

  $("#mostrarCursos1").on('click', function(){
    $.ajax({
      type: "POST",
      url: "./Components/Alumno/mostrarClases.php",
      success: function(response) {
          $('#div-results').html(response);
      }
    });
  })

  $("#tareas").on('click', function(){
    $.ajax({
      type: "POST",
      url: "./Components/Alumno/tareaPorClase.php",
      success: function(response) {
          $('#div-results').html(response);
      }
    });
  })

  $("#tareas1").on('click', function(){
    $.ajax({
      type: "POST",
      url: "./Components/Alumno/tareaPorClase.php",
      success: function(response) {
          $('#div-results').html(response);
      }
    });
  })
  
  $("#anuncioPublicados").on('click', function(){
    $.ajax({
      type: "POST",
      url: "./Components/Maestro/anuncio.php",
      success: function(response) {
          $('#div-results').html(response);
      }
    });
  })

  $("#anuncioPublicados1").on('click', function(){
    $.ajax({
      type: "POST",
      url: "./Components/Maestro/anuncio.php",
      success: function(response) {
          $('#div-results').html(response);
      }
    });
  })

  $("#calificacionesAlumno").on('click', function(){
    $.ajax({
      type: "POST",
      url: "./Components/Maestro/calificaciones.php",
      success: function(response) {
          $('#div-results').html(response);
      }
    });
  })

  $("#calificacionesAlumno3").on('click', function(){
    $.ajax({
      type: "POST",
      url: "./Components/Maestro/calificaciones.php",
      success: function(response) {
          $('#div-results').html(response);
      }
    });
  })

  $("#anuncioDiario").on('click', function(){
    $.ajax({
      type: "POST",
      url: "./Components/Alumno/anuncioDiario.php",
      success: function(response) {
          $('#div-results').html(response);
      }
    });
  })

  $("#anuncioDiario1").on('click', function(){
    $.ajax({
      type: "POST",
      url: "./Components/Alumno/anuncioDiario.php",
      success: function(response) {
          $('#div-results').html(response);
      }
    });
  })
  
  $("#calificaciones1").on('click', function(){
    $.ajax({
      type: "POST",
      url: "./Components/Alumno/calificacionAlumno.php",
      success: function(response) {
          $('#div-results').html(response);
      }
    });
  })

  $("#calificaciones2").on('click', function(){
    $.ajax({
      type: "POST",
      url: "./Components/Alumno/calificacionAlumno.php",
      success: function(response) {
          $('#div-results').html(response);
      }
    });
  })

});