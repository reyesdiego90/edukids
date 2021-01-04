<?php
  session_start();

  if(!isset($_SESSION['rol'])){
    header('location: login.php');
  }else{
    if($_SESSION['rol'] != 1){
      header('location: login.php');
    }
  }

?>
<!doctype html>
<html lang="en">

<head>
  <title>Sidebar 05</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


  <!-- Alertify -->
  <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
  <!-- Default theme -->
  <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css"/>
  <!-- Semantic UI theme -->
  <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.min.css"/>
  <!-- Bootstrap theme -->
  <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css"/>

  <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.css">



  <link rel="stylesheet" href="css/registro.css">
  <link rel="stylesheet" href="css/style2.css">

  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.js">
  </script>
</head>

<body>

  <div class="wrapper d-flex align-items-stretch">
    <nav id="sidebar">
      <div class="custom-menu">
        <button type="button" id="sidebarCollapse" class="btn btn-primary">
          <i class="fa fa-bars"></i>
          <span class="sr-only">Toggle Menu</span>
        </button>
      </div>
      <div class="altura p-4">
        <h1><a href="index.html" class="logo">EDUKIDS</a></h1>
        <ul class="list-unstyled components mb-5">
          <li class="active">
            <a href="#" id="dashboard"><span class="fa fa-user mr-3"></span> ALUMNO</a>
          </li>
          <li>
            <a href="#" id="maestroDash"><span class="fa fa-user mr-3"></span> MAESTRO</a>
          </li>
          <li>
            <a href="#" id="agregarCursos"><span class="fa fa-briefcase mr-3"></span> Asignacion</a>
          </li>
          <li>
            <a href="#"><span class="fa fa-sticky-note mr-3"></span> Blog</a>
          </li>
          <li>
            <a href="#"><span class="fa fa-suitcase mr-3"></span> Gallery</a>
          </li>
          <li>
            <a href="#"><span class="fa fa-cogs mr-3"></span> Services</a>
          </li>
          <li>
            <a href="#"><span class="fa fa-paper-plane mr-3"></span> Contacts</a>
          </li>
        </ul>
      </div>
    </nav>

    <!-- Page Content  -->
    <div id="div-results" class="p-4 p-md-5 pt-5">

    </div>
  </div>
  
  

  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
    crossorigin="anonymous"></script>
  <script src="js/popper.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>
  <script src="js/dynamicPage.js"></script>
  <script src="js/datatable.js"></script>
  <script src="js/userRandom.js"></script>
  <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>



</body>

</html>