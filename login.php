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
			<form runat="server">
				<img src="Images/Logos/LogoEdu.jpg">
				<h2 class="title">BIENVENIDO</h2>
           		<div class="input-div one">
           		   <div class="i">
           		   		<i class="fas fa-user"></i>
           		   </div>
           		   <div class="div">
           		   		<h5>Usuario</h5>
                          <input ID="txtUsuario" runat="server" type="text" class="input">
           		   </div>
           		</div>
           		<div class="input-div pass">
           		   <div class="i"> 
           		    	<i class="fas fa-lock"></i>
           		   </div>
           		   <div class="div">
           		    	<h5>Contraseña</h5>
           		    	<input ID="txtPassword" runat="server" type="password" class="input">
            	   </div>
            	</div>
            	<br />
             <button ID="btnIngreso" runat="server" type="submit" class="btn">Ingresar</button>

            </form>
        </div>
    </div>
    <script type="text/javascript" src="login.js"></script>

</body>
</html>