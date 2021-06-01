<?php
  include_once '../conexion2.php';
  $id_curso = $_POST['idCurso'];
  $id_grado = $_POST['idGradoEliminar'];

  $eliminarTarea = "DELETE FROM anuncio WHERE curso_id_curso=$id_curso";
  $result1 = mysqli_query($base, $eliminarTarea);
  $eliminarAnuncio = "DELETE FROM anunciodiario WHERE curso_id_curso=$id_curso";
  $result2 = mysqli_query($base, $eliminarAnuncio);
  $eliminarHorario  = "DELETE FROM asignacion_horario WHERE curso_id_curso=$id_curso";
  $result3 = mysqli_query($base, $eliminarHorario);
  $eliminar = "DELETE FROM curso WHERE id_curso = $id_curso and GRADO_id_grado = $id_grado";

  echo $result = mysqli_query($base, $eliminar);
?>