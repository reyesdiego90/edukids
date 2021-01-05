<?php
  require_once '../conexion.php';

  $base = mysqli_connect("127.0.0.1", "root", "toor", "Edukids", "3306");

  $user = $_POST['usuarioR'];
  $primerNombre = strtolower($_POST['nombre1']);
  $segundoNombre = strtolower($_POST['nombre2']);
  $primerApellido = strtolower($_POST['apellido1']);
  $segundoApellio = strtolower($_POST['apellido2']);
  $correo = strtolower($_POST['email']);
  $telefono = $_POST['tel'];
    
  $insertar = "INSERT INTO usuario(nombre_usuario, pass_usuario) VALUES('$user', 'EDUKIDS2020')";
  $result = mysqli_query($base, $insertar);
  
  
  $id_usuario = mysqli_insert_id($base);

  $asinacion_rol ="INSERT INTO asig_rol(ROL_id_rol, USUARIO_id_usuario) VALUES(2, $id_usuario)";
  $result2 = mysqli_query($base, $asinacion_rol);

  $ingresoUsuario = "INSERT INTO maestro(primer_nombre, segundo_nombre, primer_apellido, segundo_apellido, USUARIO_id_usuario, correo, telefono, ESTADO_id_estado) VALUES('$primerNombre', '$segundoNombre', '$primerApellido', '$segundoApellio', $id_usuario, '$correo' ,'$telefono', 1)";
    
  
  echo $result = mysqli_query($base, $ingresoUsuario);


  // nombre1=carlos
  // &nombre2=alexander
  // &apellido1=reyes
  // &apellido2=alfaro
  // &usuarioR=creyesa177
  // &tel=42245213
  // &email=jreyesz778%40gmail.com

?>
