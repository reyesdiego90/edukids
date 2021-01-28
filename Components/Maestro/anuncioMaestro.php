<?php
  session_start();
  $id_usuario = $_SESSION['id_usuario'];
?>
<div class="containerContenido">
<div class="formulario-tareas">
  <form action='./Components/Maestro/subirArchivo.php' id="formAnuncio" name="formAnuncio" enctype="multipart/form-data" method="POST">
    <?php
      include_once '../../conexion2.php';
      mysqli_set_charset($base, 'utf8'); 
      $result = mysqli_query($base,
      "SELECT id_maestro, nombre_usuario FROM maestro
      INNER JOIN usuario ON USUARIO_id_usuario = id_usuario
      WHERE id_usuario=$id_usuario");
      while($res = mysqli_fetch_assoc($result)){
        $id_maestro = $res["id_maestro"];
    ?>
    <label for="tituloAnuncio" class="labelAnuncio">Titulo</label><br>
    <input class='ingreso-tareas' type="text" name="tituloAnuncio" id="tituloAnuncio" autocomplete='off' required>
    <p class="labelAnuncio">Descripcion</p>
    <textarea class='ingreso-tareas label-tarea' type="text" name="descripcion" id="descripcion" autocomplete='off' required></textarea>
    <p class="labelAnuncio">Archivo para subir (Opcional)</p>
    <input class='ingreso-tareas' type="file" name="files" id="files" autocomplete='off' />
    <input type="hidden"  value="<?php echo $res["id_maestro"]; ?>" name="maestro" id="maestro" />
    <?php
      }
    ?>
    <p class="labelAnuncio">Clase</p>
    <select class='ingreso-tareas' placeholder="Seccion" name="clase" id="clase" required>
      <option disabled hidden selected>Clase</option>
    <?php
      
      $result = mysqli_query($base,
      "SELECT id_curso, nombre_curso, nombre_grado, nombre_nivel, Maestro_id_maestro FROM curso
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
    <p class="labelAnuncio">Fecha y hora de entrega</p>
    <input class='ingreso-tareas' type="date" id="fechaEntrega" name="fechaEntrega" require />
    <input class='ingreso-tareas' type="time" id="horaEntrega" name="horaEntrega" require/ >
    <p class="labelAnuncio">Punteo</p>
    <input class='ingreso-tareas' type="text" name="punteo" id="punteo" autocomplete='off' required><br>
    <input type="submit" value="Subir Tarea" class="btn-maestro color-1"/>

    
  </form>
</div>
    </div>

<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.js"></script>
<script src="js/pluginMaestro.js"></script>