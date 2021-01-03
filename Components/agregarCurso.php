<?php
  $base = mysqli_connect("127.0.0.1", "root", "toor", "Edukids", "3306");
  $curso = strtolower($_POST['curso']);
  $grado = $_POST['grado'];

  $insertar_curso = "INSERT INTO curso(nombre_curso, GRADO_id_grado)
  VALUES('$curso', $grado)";

  echo $result = mysqli_query($base, $insertar_curso);
?>