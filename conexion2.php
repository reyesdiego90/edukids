<?php
   $localhost = "127.0.0.1";
   $user = "root";
   $password = "Carlosortega1";
  $db = "edukids";
 // $localhost = "edukids.edu.gt";
  // $user = "edukids_reyesdiego90";
 // $password = "KCKBd7!G!z0n";
 // $db = "edukids_edukidsDatos";
$base = mysqli_connect($localhost, $user, $password, $db);
  mysqli_set_charset($base, 'utf8');
?>