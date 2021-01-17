<?php
  include_once '../conexion2.php';
  $maestro = $_POST['maestro'];
  $curso = $_POST['codigo_curso'];

  $asignandoCurso = "INSERT INTO asignacion_curso(CURSO_id_curso, SECCION_id_seccion, Maestro_id_maestro)
  VALUES ($curso, 1, $maestro)";

  echo $result = mysqli_query($base, $asignandoCurso);
?>