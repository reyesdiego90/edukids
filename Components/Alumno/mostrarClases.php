<?php
  session_start();
  $id_usuario = $_SESSION['id_usuario'];
?>

<div>
  <table id="registroTabla" class="table table-striped table-bordered" style="width:100%">
    <thead>
      <tr>
        <th class='title-top top-left'>Horarios</th>
        <th class='title-top'>Lunes</th>
        <th class='title-top'>Martes</th>
        <th class='title-top'>Miercoles</th>
        <th class='title-top'>Jueves</th>
        <th class='title-top top-right'>Viernes</th>
      </tr>
    </thead>
    <tbody>
      <?php
        $base = mysqli_connect("127.0.0.1", "root", "Carlosortega1", "Edukids", "3306");
        mysqli_set_charset($base, 'utf8'); 
        $result = mysqli_query($base, 
        "call new_procedure()");
        while($res = mysqli_fetch_assoc($result)){
      ?>
      <tr>
        <td class="column-schedule column-hour">
        <?php 
          echo $res["horario_entrada"].' - '.$res["horario_salida"] 
        ?>
        </td>
        <td class="column-schedule">
          <?php
            echo $res['lunes'];
          ?>
        </td>
        <td class="column-schedule">
          <?php
            echo $res['martes'];
          ?>
        </td>
        <td class="column-schedule">
          <?php
            echo $res['miercoles'];
          ?>
        </td>
        <td class="column-schedule">
          <?php
            echo $res['jueves'];
          ?>
        </td>
        <td class="column-schedule">
          <?php
            echo $res['viernes'];
          ?>
        </td>
      </tr>
      <?php
        }
      ?>
    </tbody>
  </table>
</div>


