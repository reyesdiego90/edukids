<?php
  include_once 'conexion.php';
  session_start();

$responde = array();

if(isset($_GET['cerrar_sesion'])){
  session_unset();

  session_destroy();
}

  if(isset($_POST['username']) && isset($_POST['password'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $db = new Database();
    $query = $db->connect()->prepare('SELECT usuario.nombre_usuario, usuario.pass_usuario, rol.id_rol, rol.nombre_rol 
    FROM asig_rol
    INNER JOIN usuario 
    ON asig_rol.USUARIO_id_usuario = usuario.id_usuario 
    INNER JOIN rol
    ON rol.id_rol = asig_rol.ROL_id_rol WHERE usuario.nombre_usuario = :username AND usuario.pass_usuario = :password');
    $query->execute(['username' => $username, 'password' => $password]);
  
    $row = $query->fetch(PDO::FETCH_NUM);
    if($row == true){
      $responde['status'] = 1;
      
    } else {
      echo "El usuario o contrasena son incorrectos";
    }  
    echo json_encode($responde);
  }
?> 