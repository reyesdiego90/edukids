<?php
    session_start();
?>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alumno</title>
    <link rel="stylesheet" href="../../pantallaAlumno.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" charset="utf-8"></script>
  </head>
<?php

$id_usuario = $_SESSION['id_usuario'];
  include_once '../../conexion2.php';
  mysqli_set_charset($base, 'utf8'); 
  $result = mysqli_query($base,'SELECT * FROM anuncio');
  date_default_timezone_set('America/Guatemala');
  setlocale(LC_ALL,"es_GT");
  $dia = date("Y-m-d");
  $hora = date("H:i:s");
  while($res = mysqli_fetch_assoc($result)){
    if($dia = $res['fechaEntrega'] and $hora > $res["horaEntrega"] ){
      $sqlEstado = "UPDATE anuncio 
      SET estado_anuncio_id_estado = 2
      WHERE fechaEntrega = ".$dia;
      mysqli_query($base, $sqlEstado);
    }
  }

  $result = mysqli_query($base, "SELECT *, 
  maestro.primer_nombre AS nombre1, maestro.segundo_nombre AS nombre2,
  maestro.primer_apellido AS apellido1,
  maestro.segundo_apellido AS apellido2 FROM anuncio 
  INNER JOIN curso ON curso_id_curso = id_curso
  INNER JOIN maestro ON maestro_id_maestro = id_maestro 
  INNER JOIN grado ON Grado_id_grado= id_grado
  INNER JOIN nivel ON id_nivel = NIVEL_id_nivel
  INNER JOIN alumno ON alumno.Grado_id_grado=grado.id_grado
  INNER JOIN usuario ON usuario.id_usuario= alumno.USUARIO_id_usuario
  WHERE id_usuario = $id_usuario  && estado_anuncio_id_estado=1");
  while($res = mysqli_fetch_assoc($result)){
?>
<div class=box>
  <div class=container>


  <h3 class="labelAnuncioTitulo"><?php echo $res['titulo'] ?></h3>
  <p class="labelD"><?php echo $res['descripcion']  ?></p>
  <p class="labelD">Clase: <?php echo $res['nombre_curso'] ?></p>
  <p class="labelD">Fecha de Entrega: <?php echo $res['fechaEntrega'].' - '.$res['horaEntrega']?></p>
  <p class="labelD">Maestro: <?php echo $res['nombre1'].' '.$res['nombre2'].' '.$res['apellido1'].' '.$res['apellido2'] ?></p>
  <p class="labelD">Correo Electronico: <a href='<?php echo "mailto:".$res["correo"].
  "?Subject=".$res['al.primer_nombre']."%20".$res['primer_apellido']."%20-%20".$res['nombre_curso']."%20-%20".$res["nombre_grado"]."%20".$res["nombre_nivel"]
  ."&body=".$res['titulo'] ?>''><?php echo $res['correo'] ?></a></p>
  <?php
if(!empty($res["archivo"])){
  ?>
    <a class="archivo" href="./Components/Maestro/<?php echo $res["archivo"] ?>">Archivo</a>
    <?php
    }
  ?>
</div>
</div>
<?php 
}
?>
