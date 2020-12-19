$(document).ready(function() {
  $('#pageStudent').on('click', function(){
      $.ajax({
          type: "POST",
          url: "./Components/Register.php",
          success: function(response) {
              $('#div-results').html(response);
          }
      });
  });

  $('#dashboard').on('click', function(){
      $.ajax({
          type: "POST",
          url: "./Components/alumno.php",
          success: function(response) {
              $('#div-results').html(response);
          }
      });
  });
});