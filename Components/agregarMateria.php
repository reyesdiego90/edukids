<?php
  include_once '../conexion2.php';
  $curso = strtolower($_POST['curso']);

  $insertar_curso = "INSERT INTO materia(materia) VALUES('$curso')";
  $result = mysqli_query($base, $insertar_curso);

  
  echo $result;

?>