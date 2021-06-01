<?php
  include_once '../conexion2.php';

  $id_maestro = strtolower($_POST['idMaestro']);
  $primer_nombre =  strtolower($_POST['nombre1Ac']);
  $segundo_nombre =  strtolower($_POST['nombre2Ac']);
  $primer_apellido =  strtolower($_POST['apellido1Ac']);
  $segundo_apellido =  strtolower($_POST['apellido2Ac']);
  $telefono = $_POST['telAc'];
  $correo = $_POST['correoAc'];
  $estado = $_POST['estadoAc'];
  
  $actualizacion = "UPDATE maestro SET primer_nombre='$primer_nombre',
  segundo_nombre='$segundo_nombre', primer_apellido='$primer_apellido',
  segundo_apellido='$segundo_apellido', correo = '$correo', telefono= '$telefono', 
  ESTADO_id_estado = $estado
  WHERE id_maestro = $id_maestro";
  
  echo $result = mysqli_query($base, $actualizacion);
?>