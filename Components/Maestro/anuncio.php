<?php
  session_start();
  $id_usuario = $_SESSION['id_usuario'];

?>
<div>
  <?php
    $base = mysqli_connect("127.0.0.1", "root", "toor", "Edukids", "3306");
    mysqli_set_charset($base, 'utf8'); 
    $result = mysqli_query($base,
    "SELECT id_maestro, nombre_usuario FROM maestro
    INNER JOIN usuario ON USUARIO_id_usuario = id_usuario
    WHERE id_usuario=$id_usuario");
    while($res = mysqli_fetch_assoc($result)){
      $id_maestro = $res["id_maestro"];
    }
  ?>
  <div class="formulario-tareas">
  <form id="anuncioDiario" name="anuncioDiario"  method="POST">
    <label for="tituloAnuncio" class="labelAnuncio">Titulo</label><br>
    <input class='ingreso-tareas' type="text" name="tituloAnuncio" id="tituloAnuncio" autocomplete='off' required>
    <p class="labelAnuncio">Descripcion</p>
    <textarea class='ingreso-tareas label-tarea' type="text" name="descripcion" id="descripcion" autocomplete='off' required></textarea>
    <p class="labelAnuncio">Clase</p>
    <input type="hidden"  value="<?php echo $id_maestro ?>" name="maestro" id="maestro">
    <select class='ingreso-tareas' placeholder="Seccion" name="clase" id="clase" required>
      <option disabled hidden selected>Clase</option>
    <?php
      $base = mysqli_connect("127.0.0.1", "root", "toor", "Edukids", "3306");
      $result = mysqli_query($base,
      "SELECT id_curso, nombre_curso, nombre_grado, nombre_nivel, Maestro_id_maestro FROM CURSO
      INNER JOIN asignacion_curso ON id_curso = CURSO_id_curso
      INNER JOIN grado ON id_grado = GRADO_id_grado
      INNER JOIN nivel ON  id_nivel = NIVEL_id_nivel
      WHERE Maestro_id_maestro = $id_maestro");
      while($res = mysqli_fetch_assoc($result)){
    ?>
      <option value="<?php echo $res["id_curso"] ?>">
        <?php echo $res["nombre_curso"].'-'.$res["nombre_grado"].' '.$res["nombre_nivel"] ?>
      </option>
    <?php
      }
    ?>
    </select>
    <br><input type="submit" id="subirAnuncioDiario" value="Subir Anuncio" class="btn-Anuncio"/>
  </form>

</div>

<script src="js/pluginMaestro.js"></script>