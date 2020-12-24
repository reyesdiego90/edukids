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
        <h1><a href="index.html" class="logo">Portfolic <span>Portfolio Agency</span></a></h1>
        <ul class="list-unstyled components mb-5">
          <li class="active">
            <a href="#" id="dashboard"><span class="fa fa-home mr-3"></span> Home</a>
          </li>
          <li>
            <a href="#"><span class="fa fa-user mr-3"></span> About</a>
          </li>
          <li>
            <a href="#"><span class="fa fa-briefcase mr-3"></span> Works</a>
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

        <div class="mb-5">
          <h3 class="h6 mb-3">Subscribe for newsletter</h3>
          <form action="#" class="subscribe-form">
            <div class="form-group d-flex">
              <div class="icon"><span class="icon-paper-plane"></span></div>
              <input type="text" class="form-control" placeholder="Enter Email Address">
            </div>
          </form>
        </div>

        <div class="footer">
          <p>
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            Copyright &copy;<script>
              document.write(new Date().getFullYear());
            </script> All rights reserved | This template is made with <i class="icon-heart" aria-hidden="true"></i> by
            <a href="https://colorlib.com" target="_blank">Colorlib.com</a>
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
          </p>
        </div>

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



</body>

</html>