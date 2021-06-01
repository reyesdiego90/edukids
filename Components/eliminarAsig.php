<?php
  include_once '../conexion2.php';
  $id_Asignacion = $_POST['idAsignacion'];
  $eliminarAnuncio = "";
  $eliminar = "DELETE FROM asignacion_curso WHERE id_asignacion=$id_Asignacion";

  echo $result = mysqli_query($base, $eliminar);
?>