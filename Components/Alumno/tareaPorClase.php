<?php
  $base = mysqli_connect("127.0.0.1", "root", "toor", "Edukids", "3306");
  mysqli_set_charset($base, 'utf8'); 
  $result = mysqli_query($base,'SELECT * FROM anuncio');
  date_default_timezone_set('America/Guatemala');
  setlocale(LC_ALL,"es_GT");
  $dia = date("Y-m-d");
  $hora = date("H:i:s");
  echo $dia.' '.$hora;
  while($res = mysqli_fetch_assoc($result)){
    if($res["fechaEntrega"] <= $dia and $hora > $res["horaEntrega"] ){
      echo ' '.$res['horaEntrega'];
      $sqlEstado = "UPDATE anuncio 
      SET estado_anuncio_id_estado = 2
      WHERE id_anuncio = ".$res['id_anuncio'];
      mysqli_query($base, $sqlEstado);
    }else{
      echo "jejej"; 
      $sqlEstado = "UPDATE anuncio 
      SET estado_anuncio_id_estado = 1
      WHERE id_anuncio = ".$res["id_anuncio"];
      mysqli_query($base, $sqlEstado);
    }
  }

  $result = mysqli_query($base, "SELECT * FROM anuncio 
  INNER JOIN curso ON curso_id_curso = id_curso
  INNER JOIN maestro ON maestro_id_maestro = id_maestro
  WHERE curso_id_curso = ". (int) $_GET['id']." && estado_anuncio_id_estado=1");
  while($res = mysqli_fetch_assoc($result)){
?>

<div>
  <h3><?php echo $res['titulo'] ?></h3>
  <p><?php echo $res['descripcion']  ?></p>
  <p>Clase: <?php echo $res['nombre_curso'] ?></p>
  <p>Maestro: <?php echo $res['primer_nombre'].' '.$res['segundo_nombre'].' '.$res['primer_apellido'].' '.$res['segundo_apellido'] ?></p>
  <p>Punteo: <?php echo $res['punteo'] ?></p>
  <a href="../Maestro/<?php echo $res["archivo"] ?>">Archivo</a>
</div>
<?php 
  }
?>