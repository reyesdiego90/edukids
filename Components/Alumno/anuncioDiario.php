<?php
  session_start();
  $id_usuario = $_SESSION['id_usuario'];
?>

<div>
<?php

  include_once '../../conexion2.php';

  $result = mysqli_query($base, "SELECT * FROM alumno
	INNER JOIN usuario ON id_usuario = USUARIO_id_usuario
	INNER JOIN grado ON GRADO_id_grado = id_grado
	INNER JOIN curso ON curso.GRADO_id_grado = id_grado
	INNER JOIN anunciodiario on anunciodiario.curso_id_curso = curso.id_curso
	INNER JOIN maestro ON maestro.id_maestro = anunciodiario.maestro_id_maestro
  WHERE id_usuario = $id_usuario && fecha = CURDATE()");
  while($res = mysqli_fetch_assoc($result)){
?>

</br>
<div class=box>
<div class=container>

  <p class="labelAnuncioTitulo">Titulo: <?php echo $res['titulo']?></p>
  <p class="labelD">Fecha: <?php echo $res['fecha']?></p>
  <p class="labelD">Curso: <?php echo $res['nombre_curso']?></p>
  <p class="labelD">Maestro: 
    <?php 
    echo $res['primer_nombre'].' '.$res['segundo_nombre'].' '.$res['primer_apellido'].' '.$res['segundo_apellido'];
    ?>
  </p>
  <p class="labelD">Descripcion: <?php echo $res['descripcion']?></p>

  </div>
  </div>
<?php
  }
?>
</div>

