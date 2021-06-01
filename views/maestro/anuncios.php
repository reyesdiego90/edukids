<?php
    include('../layout/maestroheader.php');
?>
<div id='div-results' class="container content py-5 my-5">
    <div>
    <?php
        include_once '../../conexion2.php';
        mysqli_set_charset($base, 'utf8'); 
        $result = mysqli_query($base,
        "SELECT id_maestro, nombre_usuario FROM maestro
        INNER JOIN usuario ON USUARIO_id_usuario = id_usuario
        WHERE id_usuario=$id_usuario");
        while($res = mysqli_fetch_assoc($result)){
        $id_maestro = $res["id_maestro"];
        }
    ?>
    <div class="containerContenido">
    <div class="formulario-tareas">
    <form id="anuncioDiario" name="anuncioDiario"  method="POST">
        <label for="tituloAnuncio" class="labelAnuncio">Titulo</label><br>
        <input class='ingreso-tareas' type="text" name="tituloAnuncio" id="tituloAnuncio" autocomplete='off' required>
        <p class="labelAnuncio">Descripcion</p>
        <textarea class='ingreso-tareas label-tarea' type="text" name="descripcionDiaria" id="descripcion" autocomplete='off' required></textarea>
        </br>
        </br>

        <label for="FechaAnuncio" class="labelAnuncio">Seleccione Fecha:</label>
        <input type="date" id="FechaAnuncio" name="FechaAnuncio" name="fecha">
        <p class="labelAnuncio">Clase</p>
        <input type="hidden"  value="<?php echo $id_maestro ?>" name="maestro" id="maestro">
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
        <br><input type="submit" id="subirAnuncioDiario" value="Subir Anuncio" class="btn-maestro color-1"/>
    </form>

    </div>
</div>

<script src="../../assets/js/main.js"></script>
  <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
  
  <script type="text/javascript">
    $(document).ready(function () {
      $('.nav_btn').click(function () {
        $('.mobile_nav_items').toggleClass('active');
      });
    });
  </script>
 <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
    crossorigin="anonymous"></script>
  
<script src="../../js/pluginMaestro.js"></script>
<script>
  // Replace the <textarea id="editor1"> with a CKEditor 4
  // instance, using default configuration.
  CKEDITOR.replace( 'descripcion' );
  
</script>