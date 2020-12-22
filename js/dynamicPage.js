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

});