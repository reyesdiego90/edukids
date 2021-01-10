<?php
  $base = mysqli_connect("127.0.0.1", "root", "Carlosortega1", "Edukids", "3306");
  mysqli_set_charset($base, 'utf8'); 
  
  $titulo_Anuncio = $_POST['tituloAnuncio'];
  $descripcion = $_POST['descripcion'];
  $clase = $_POST['clase'];
  $maestro = $_POST['maestro'];
  
  $insertar = "INSERT INTO anunciodiario(titulo, descripcion, fecha, maestro_id_maestro, curso_id_curso, estado_anuncio_id_estado) 
  VALUES('$titulo_Anuncio', '$descripcion', CURDATE(), $maestro, $clase, 1)";
  $result = mysqli_query($base, $insertar);

  echo $result;
?>