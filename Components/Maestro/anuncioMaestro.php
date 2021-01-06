<?php
  session_start();
  $id_usuario = $_SESSION['id_usuario'];
?>

<div>
  <form action='Components/Maestro/subirArchivo.php' id="formAnuncio" name="formAnuncio" enctype="multipart/form-data" method="POST">
    <?php
      $base = mysqli_connect("127.0.0.1", "root", "Carlosortega1", "Edukids", "3306");
      mysqli_set_charset($base, 'utf8'); 
      $result = mysqli_query($base,
      "SELECT id_maestro, nombre_usuario FROM maestro
      INNER JOIN usuario ON USUARIO_id_usuario = id_usuario
      WHERE id_usuario=$id_usuario");
      while($res = mysqli_fetch_assoc($result)){
        $id_maestro = $res["id_maestro"];
    ?>
    <div class="box-tareas">
    <p>Titulo</p>
    <input type="text" name="tituloAnuncio" id="tituloAnuncio" class="txtSombra" autocomplete='off' required>
    <p>Descripcion</p>
    <textarea type="text" name="descripcion" id="descripcion" class="txtSombra" autocomplete='off' required></textarea>
    <p>Archivo para subir (Opcional)</p>
    <input type="file" name="files" class="txtSombra" id="files" autocomplete='off'>
    <input type="hidden"   value="<?php echo $res["id_maestro"]; ?>" name="maestro" id="maestro">
     
    <?php
      }
    ?>
    <p>Clase</p>
    <select placeholder="Seccion" name="clase" id="clase" class="txtSombra" required>
      <option disabled hidden selected>Clase</option>
    <?php
      
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
    <p>punteo</p>
    <input type="text" name="punteo" id="punteo" autocomplete='off' required>
    <input type="submit" value="Subir Anuncio" class="myButton"/>
    </div>
    
  </form>
</div>

<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.js"></script>
<script src="js/pluginMaestro.js"></script>