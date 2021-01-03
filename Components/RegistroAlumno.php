<?php

  $base = mysqli_connect("127.0.0.1", "root", "toor", "edukids", "3306");

  $nombre1 = strtolower($_POST['nombre1Alumno']);
  $segundoNombre = strtolower($_POST['nombre2']);
  $primerApellido = strtolower($_POST['apellido1']);
  $segundoApellio = strtolower($_POST['apellido2']);
  $user = $_POST['usuarioR'];
  $telefono = $_POST['tel'];
  $grado = $_POST['grado'];
  
  $insertar = "INSERT INTO usuario(nombre_usuario, pass_usuario) VALUES('$user', 'EDUKIDS2020')";
  $result = mysqli_query($base, $insertar);
  
  
  $id_usuario = mysqli_insert_id($base);

  $asinacion_rol ="INSERT INTO asig_rol(ROL_id_rol, USUARIO_id_usuario) VALUES(3, $id_usuario)";
  $result2 = mysqli_query($base, $asinacion_rol);
  
  $ingresoUsuario = "INSERT INTO alumno(primer_nombre, segundo_nombre, primer_apellido, segundo_apellido, telefono, ESTADO_id_estado, SECCION_id_seccion, GRADO_id_grado, USUARIO_id_usuario) VALUES('$nombre1', '$segundoNombre', '$primerApellido', '$segundoApellio', '$telefono', 1, 1, $grado, $id_usuario)";
  
  echo $result = mysqli_query($base, $ingresoUsuario);

?>