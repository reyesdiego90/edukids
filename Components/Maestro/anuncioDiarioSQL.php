<?php
  include_once '../../conexion2.php';
  mysqli_set_charset($base, 'utf8'); 
  
  header('Content-Type: text/html; charset=utf-8');

  $titulo_Anuncio = $_POST['tituloAnuncio'];
  $descripcion = $_POST['descripcionDiaria'];
  $clase = $_POST['clase'];
  $fecha = $_POST['fecha'];
  $maestro = $_POST['maestro'];
  
  $insertar = "INSERT INTO anunciodiario(titulo, descripcion, fecha, maestro_id_maestro, curso_id_curso, estado_anuncio_id_estado) 
  VALUES('$titulo_Anuncio', '$descripcion', '$fecha', $maestro, $clase, 1)";
  $result = mysqli_query($base, $insertar);

  echo $result;
?>