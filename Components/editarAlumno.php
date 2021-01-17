<?php
  include_once '../conexion2.php';

  $id_alumno = strtolower($_POST['idEstudiante']);
  $primer_nombre =  strtolower($_POST['nombre1Ac']);
  $segundo_nombre =  strtolower($_POST['nombre2Ac']);
  $primer_apellido =  strtolower($_POST['apellido1Ac']);
  $segundo_apellido =  strtolower($_POST['apellido2Ac']);
  $telefono = $_POST['telAc'];
  $estado = $_POST['estadoAc'];
  $grado = $_POST['gradoAc'];
  
  $actualizacion = "UPDATE alumno SET primer_nombre='$primer_nombre',
  segundo_nombre='$segundo_nombre', primer_apellido='$primer_apellido',
  segundo_apellido='$segundo_apellido', telefono= '$telefono',
  ESTADO_id_estado = $estado, GRADO_id_grado = $grado
  WHERE id_alumno = $id_alumno";
  
  echo $result = mysqli_query($base, $actualizacion);
?>