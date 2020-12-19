<?php
  require_once '../conexion.php';

  $base = mysqli_connect("127.0.0.1", "root", "toor", "Edukids", "3306");
  $user = $_POST['usuarioR'];
  $primerNombre = $_POST['nombre1'];
  $segundoNombre = $_POST['nombre2'];
  $primerApellido = $_POST['apellido1'];
  $segundoApellio = $_POST['apellido2'];
  $telefono = $_POST['tel'];
  $grado = $_POST['grado'];
  
  $insertar = "INSERT INTO usuario(nombre_usuario, pass_usuario) VALUES('$user', 'EDUKIDS2020')";
  $result = mysqli_query($base, $insertar);
  
  
  $id_usuario = mysqli_insert_id($base);

  $asinacion_rol ="INSERT INTO asig_rol(ROL_id_rol, USUARIO_id_usuario) VALUES(3, $id_usuario)";
  $result2 = mysqli_query($base, $asinacion_rol);

  $ingresoUsuario = "INSERT INTO alumno(primer_nombre, segundo_nombre, primer_apellido, segundo_apellido, telefono, ESTADO_id_estado, SECCION_id_seccion, GRADO_id_grado, USUARIO_id_usuario) VALUES('$primerNombre', '$segundoNombre', '$primerApellido', '$segundoApellio', '$telefono', 1, 1, $grado, $id_usuario)";
  $result = mysqli_query($base, $ingresoUsuario);

  if(!$result){
    echo "usuario no ingresado exitosamente";
  }else{
    header("location: /edukids/admin.php");
  }


?>