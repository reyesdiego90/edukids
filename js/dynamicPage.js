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


});