<?php
include_once '../../conexion2.php';
echo 'hola';
  $result = mysqli_query($base,'SELECT * FROM anuncio');
  date_default_timezone_set('America/Guatemala');
  setlocale(LC_ALL,"es_GT");
  $dia = date("Y-m-d");
  $hora = date("H:i:s");
  echo $dia."<br>";
  while($res = mysqli_fetch_assoc($result)){
    if($dia == $res['fechaEntrega']){
        if($hora >= $res["horaEntrega"]){
             mysqli_query($base, "UPDATE `anuncio` 
              SET `estado_anuncio_id_estado` = '2'
              WHERE `fechaEntrega` = ".$dia);
            echo " Tarea eliminada ".$res['titulo']." - hora: ".$res["horaEntrega"]." - dia ".$res['fechaEntrega']."<br>";
        }
    }
  }
?>