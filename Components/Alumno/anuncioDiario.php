<div>
<?php
  $base = mysqli_connect("127.0.0.1", "root", "Carlosortega1", "edukids");
  mysqli_set_charset($base, 'utf8');
  $result = mysqli_query($base, "SELECT * FROM anunciodiario
	INNER JOIN maestro ON id_maestro = maestro_id_maestro
  INNER JOIN curso ON curso_id_curso = id_curso
  INNER JOIN grado ON GRADO_id_grado = id_grado
  WHERE id_grado = 8 && fecha = CURDATE()");
  while($res = mysqli_fetch_assoc($result)){
?>
<div class=container>
<hr></hr>
  <p class="labelAnuncioTitulo">Titulo: <?php echo $res['titulo']?></p>
  <p class="labelAnuncio">Fecha: <?php echo $res['fecha']?></p>
  <p class="labelAnuncio">Curso: <?php echo $res['nombre_curso']?></p>
  <p class="labelAnuncio">Maestro: 
    <?php 
    echo $res['primer_nombre'].' '.$res['segundo_nombre'].' '.$res['primer_apellido'].' '.$res['segundo_apellido'];
    ?>
  </p>
  <p class="labelAnuncio">Descripcion: <?php echo $res['descripcion']?></p>
<hr></hr>
  </div>
<?php
  }
?>
</div>