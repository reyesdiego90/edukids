<?php
  session_start();

  if(!isset($_SESSION['rol'])){
    header('location: login.php');
  }else{
    if($_SESSION['rol'] != 2){
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
  <title>Alumno</title>
  <link rel="stylesheet" href="./css/pantallaMaestro.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css">

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" charset="utf-8"></script>
<script>
$(document).ready(function() {
    $('#example').DataTable();
} );
</script>
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
      <a href="index.php" class="logout_btn"><i class="fas fa-sign-out-alt"></i></a>
    </div>
  </header>
  <!--header area end-->
  <!--mobile navigation bar start-->
  <div class="mobile_nav">
    <div class="nav_bar">
      <img src="images/Logos/LogoEdu.jpg" class="mobile_profile_image" alt="">
      <i class="fa fa-bars nav_btn"></i>
    </div>
    <div class="mobile_nav_items">
      <a href="#"><i class="fas fa-bell"></i><span>ANUNCIOS</span></a>
      <a href="#"><i class="far fa-file-alt"></i><span>TAREAS</span></a>
      <a href="#"><i class="fas fa-clipboard"></i><span>CALIFICACIONES</span></a>
     
    </div>
  </div>
  <!--mobile navigation bar end-->
  <!--sidebar start-->
  <div class="sidebar">
    <div class="profile_info">
      <img src="images/Logos/LogoEdu.jpg" class="profile_image" alt="">
      <h4><?php echo $usuario ?></h4>
    </div>
    <a href="#" id="anuncioPublicados" ><i class="fas fa-bell"></i><span>ANUNCIOS</span></a>
    <a href="#" id="anunciosMaestro"><i class="far fa-file-alt"></i><span>TAREAS</span></a>
    <a href="#" id="calificacionesAlumno"><i class="fas fa-clipboard"></i><span>CALIFICACIONES</span></a>
    
  </div>
  <!--sidebar end-->

  <div id='div-results' class="content">
    
  </div>

  <script src="js/bootstrap.min.js"></script>
  <script src="js/dynamicPage.js"></script>
  <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
  
  <script type="text/javascript">
    $(document).ready(function () {
      $('.nav_btn').click(function () {
        $('.mobile_nav_items').toggleClass('active');
      });
    });
  </script>
 <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
    crossorigin="anonymous"></script>
  
</body>

</html>