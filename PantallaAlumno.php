<?php
  session_start();

  if(!isset($_SESSION['rol'])){
    header('location: login.php');
  }else{
    if($_SESSION['rol'] != 3){
      header('location: login.php');
    }
  }
  $usuario = $_SESSION['user'];
  $id_usuario = $_SESSION['id_usuario'];
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv='cache-control' content='no-cache'>
  <meta http-equiv='expires' content='0'>
  <meta http-equiv='pragma' content='no-cache'>
    <title>Alumno</title>
    <link rel="stylesheet" href="pantallaAlumno.css">
    <link rel="stylesheet" href="css/scss/tablaAlumno.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" charset="utf-8"></script>
  </head>
  <body>

    <input type="checkbox" id="check">
    <!--header area start-->
    <header>
      <div class="aline">
      <label for="check">
        <i class="fas fa-bars" id="sidebar_btn"></i>
      </label>
      <div class="left_area">
      <h3 style="color:#12194F;">EDU
                        <span style="color: #FF033E">K</span>
                        <span style="color: #E66112">I</span>
                        <span style="color: #228B22">D</span>
                        <span style="color: #12194F">S</span>
      </div>
      </div>
      <div class="right_area">
        <a href="login.php?cerrar_sesion=1" class="logout_btn"><i class="fas fa-sign-out-alt" style="text-align:center;"></br>Cerrar Sesion</i></a>
      </div>
    </header>
    <!--header area end-->
    <!--mobile navigation bar start-->
    <div class="mobile_nav">
      <div class="nav_bar">
        <img src="/img/LogoEdu.jpg" class="mobile_profile_image" alt="">
        <i class="fa fa-bars nav_btn"></i>
      </div>
      <div class="mobile_nav_items">
      <a href="#" id='anuncioDiario1'><i class="fas fa-bell"></i><span>ANUNCIOS</span></a>
      <a href="#" id='mostrarCursos1'><i class="fas fa-book"></i><span>CURSOS</span></a>
      <a href="#" id='tareas1'><i class="far fa-file-alt"></i><span>TAREAS</span></a>
      <a href="#" id='calificaciones1'><i class="fas fa-clipboard"></i><span>CALIFICACIONES</span></a>
  
      </div>
    </div>
    <!--mobile navigation bar end-->
    <!--sidebar start-->
    <div class="sidebar">
      <div class="profile_info">
        <img src="/img/LogoEdu.jpg" class="profile_image" alt="">
        <h4><?php echo $usuario ?></h4>
      </div>
      <a href="#" id='anuncioDiario'><i class="fas fa-bell"></i><span>ANUNCIOS</span></a>
      <a href="#" id='mostrarCursos'><i class="fas fa-book"></i><span>CURSOS</span></a>
      <a href="#" id='tareas'><i class="far fa-file-alt"></i><span>TAREAS</span></a>
      <a href="#" id='calificaciones2'><i class="fas fa-clipboard"></i><span>CALIFICACIONES</span></a>
    
    </div>
    <!--sidebar end-->

    <div id='div-results' class="content">
      <?php
        echo '<script> $("#div-results").load("Components/Alumno/anuncioDiario.php"); </script>';
      ?>
    </div>


    <script src="js/dynamicPage.js"></script>
    <script type="text/javascript">
    $(document).ready(function(){
      $('.nav_btn').click(function(){
        $('.mobile_nav_items').toggleClass('active');
      });
    });
    </script>
    
  </body>
</html>