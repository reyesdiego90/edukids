$(document).ready(function(){
  $('#add').click(function(){
    $("<div>").load("./Components/administrador/listaClases.php", function() {
      $("#addc").append($(this).html());
    });
  })
    
  
  
});