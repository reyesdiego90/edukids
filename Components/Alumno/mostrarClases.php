<?php
  session_start();
  $id_usuario = $_SESSION['id_usuario'];
?>

<div>
  <table id="registroTabla" class="table table-striped table-bordered" style="width:100%">
    <thead>
      <tr>
        <th>Clase</th>
      </tr>
    </thead>
    <tbody>
      <?php
        $base = mysqli_connect("127.0.0.1", "root", "toor", "Edukids", "3306");
        mysqli_set_charset($base, 'utf8'); 
        $result = mysqli_query($base, 
        "SELECT id_usuario, id_curso, nombre_curso FROM alumno
        inner join usuario ON USUARIO_id_usuario = id_usuario
        inner join grado ON id_grado = GRADO_id_grado
        inner join curso ON curso.GRADO_id_grado = id_grado
        WHERE id_usuario = $id_usuario");
        while($res = mysqli_fetch_assoc($result)){
      ?>
      <tr>
        <td><?php echo $res["nombre_curso"] ?></td>
      </tr>
      <?php
        }
      ?>
    </tbody>
  </table>
</div>


