<?php
  session_start();
  $id_usuario = $_SESSION['id_usuario'];

?>

<div>
  <?php
    include_once '../../conexion2.php';
    $result = mysqli_query($base, 
    "SELECT id_usuario, id_curso, nombre_curso, 
    maestro.primer_nombre, maestro.segundo_nombre, 
    maestro.primer_apellido, maestro.segundo_apellido,
    grado.nombre_grado
    FROM alumno
    inner join usuario ON USUARIO_id_usuario = id_usuario
    inner join grado ON id_grado = GRADO_id_grado
    inner join curso ON curso.GRADO_id_grado = id_grado
    inner join asignacion_curso ON id_curso = CURSO_id_curso
    inner join maestro ON id_maestro = Maestro_id_maestro
    WHERE id_usuario = $id_usuario");
    while($res = mysqli_fetch_assoc($result)){
    ?>
    <div class=boxTareas>
    <div class=container>

  <div class="mostrando_clase">
  
    <a href="Components/Alumno/tareaPorClase.php?id=<?php echo $res['id_curso'] ?>">
      <h3 class="labelAnuncio">Clase: <?php echo $res['nombre_curso'] ?></h3>
      <p class="labelAnuncio"><strong> <?php echo $res['nombre_grado'] ?> </strong></p>
      <p class="labelAnuncio">Maestro: 
        <?php echo $res["primer_nombre"].' '.$res['segundo_nombre'].' '. 
              $res['primer_apellido'].' '.$res['segundo_apellido'];
        ?>
      </p>
    </a>
 </div>
  </div>
    </div>
  <?php
    }
  ?>
</div>