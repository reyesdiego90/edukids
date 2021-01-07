<?php
  $base = mysqli_connect("127.0.0.1", "root", "Carlosortega1", "Edukids", "3306");
  $maestro = $_POST['maestro'];
  $curso = $_POST['codigo_curso'];

  $asignandoCurso = "INSERT INTO asignacion_curso(CURSO_id_curso, SECCION_id_seccion, Maestro_id_maestro)
  VALUES ($curso, 1, $maestro)";

  echo $result = mysqli_query($base, $asignandoCurso);
?>