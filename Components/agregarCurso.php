<?php
  $base = mysqli_connect("127.0.0.1", "root", "toor", "Edukids", "3306");
  $curso = strtolower($_POST['curso']);
  $grado = $_POST['grado'];
  $horaEntrada = $_POST['horario1'];
  $horaSalida = $_POST['horario2'];
  $dia1 = $_POST['dia1'];
  $dia2 = $_POST['dia2'];
  $dia3 = $_POST['dia3'];
  $insertar_curso = "INSERT INTO curso(nombre_curso, GRADO_id_grado, horarioEntrada, horarioSalida, DIAS_dia1, DIAS_dia2, DIAS_dia3)
  VALUES('$curso', $grado, '$horaEntrada', '$horaSalida', $dia1, $dia2, $dia3)";

  echo $result = mysqli_query($base, $insertar_curso);
?>