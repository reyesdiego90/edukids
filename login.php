<?php
  include_once 'conexion.php';
  session_start();

$responde = array();

if(isset($_GET['cerrar_sesion'])){
  session_unset();

  session_destroy();
}

if(isset($_SESSION['rol'])){
  switch($_SESSION['rol']){
      case 1:
          header('location: admin.php');
      break;


      default:
  }
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
      $rol = $row[2];
      $user = $row[0];
      $_SESSION['rol'] = $rol;
      $_SESSION['user'] = $user;
      
      switch($rol){
        case 1:
          header('location: admin.php');  
        break;
   
        
        default;
      }
    } else {
      echo "El usuario o contrasena son incorrectos";
    }  
  }
?> 

<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" href="login.css">
	<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/a81368914c.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
	
	<div class="container">
		<div class="img">
			<img class="wave" src="Images/Fondos/manos.jpg">
		</div>
		<div class="login-content">
			<form class="content" method="POST">
				<img src="Images/Logos/LogoEdu.jpg">
				<h2 class="title">BIENVENIDO</h2>
           		<div class="input-div one">
           		   <div class="i">
           		   		<i class="fas fa-user"></i>
           		   </div>
           		   <div class="div">
           		   		<h5>Usuario</h5>
                    <input name='username' ID="username" type="text" class="input">
           		   </div>
           		</div>
           		<div class="input-div pass">
           		   <div class="i"> 
           		    	<i class="fas fa-lock"></i>
           		   </div>
           		   <div class="div">
           		    	<h5>Contraseña</h5>
           		    	<input name="password" type="password" class="input">
            	   </div>
            	</div>
            	<br />
             <input ID="btnIngreso"  type="submit" class="btn" value="Ingresar" />

          </form>
        </div>
    </div>
    <script type="text/javascript" src="login.js"></script>

</body>
</html>