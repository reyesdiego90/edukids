<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alumno</title>
    <link rel="stylesheet" href="../../pantallaAlumno.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" charset="utf-8"></script>
  </head>
<?php
  include_once '../../conexion2.php';
  mysqli_set_charset($base, 'utf8'); 
  $result = mysqli_query($base,'SELECT * FROM anuncio');
  date_default_timezone_set('America/Guatemala');
  setlocale(LC_ALL,"es_GT");
  $dia = date("Y-m-d");
  $hora = date("H:i:s");
  echo $dia.' '.$hora;
  while($res = mysqli_fetch_assoc($result)){
    if($dia = $res['fechaEntrega'] and $hora > $res["horaEntrega"] ){
      echo ' '.$res['horaEntrega'];
      $sqlEstado = "UPDATE anuncio 
      SET estado_anuncio_id_estado = 2
      WHERE id_anuncio = ".$res['id_anuncio'];
      mysqli_query($base, $sqlEstado);
    }
  }

  $result = mysqli_query($base, "SELECT * FROM anuncio 
  INNER JOIN curso ON curso_id_curso = id_curso
  INNER JOIN maestro ON maestro_id_maestro = id_maestro
  WHERE curso_id_curso = ". (int) $_GET['id']." && estado_anuncio_id_estado=1");
  while($res = mysqli_fetch_assoc($result)){
?>
<div class=box>
  <div class=container>


  <h3 class="labelAnuncioTitulo"><?php echo $res['titulo'] ?></h3>
  <p class="labelD"><?php echo $res['descripcion']  ?></p>
  <p class="labelD">Clase: <?php echo $res['nombre_curso'] ?></p>
  <p class="labelD">Fecha de Entrega: <?php echo $res['fechaEntrega'].' - '.$res['horaEntrega']?></p>
  <p class="labelD">Maestro: <?php echo $res['primer_nombre'].' '.$res['segundo_nombre'].' '.$res['primer_apellido'].' '.$res['segundo_apellido'] ?></p>
  <p class="labelD">Punteo: <?php echo $res['punteo'] ?></p>
  <a class="archivo" href="../Maestro/<?php echo $res["archivo"] ?>">Archivo</a>
  
</div>
  </div>
<?php 
  }
?>