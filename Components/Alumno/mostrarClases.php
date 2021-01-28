<?php
  session_start();
  $id_usuario = $_SESSION['id_usuario'];
?>
<div class="containerCurso">
<div>
  <table id="registroTabla" class="table table-striped table-bordered" style="width:100%">
    <thead>
      <tr>
        <th class='title-top top-left'></th>
        <th class='title-topC2'>Lunes</th>
        <th class='title-topC3'>Martes</th>
        <th class='title-topC4'>Miercoles</th>
        <th class='title-topC5'>Jueves</th>
        <th class='title-topC6 top-right'>Viernes</th>
      </tr>
    </thead>
    <tbody>
      <?php
        include_once '../../conexion2.php';
        $result = mysqli_query($base, 
        "SELECT * FROM (
            SELECT DISTINCT horario_entrada, horario_salida FROM horario
            ) horas LEFT JOIN (
            SELECT horario_entrada, horario_salida,
              GROUP_CONCAT(nombre_curso) lunes
              FROM alumno
                  left join usuario ON USUARIO_id_usuario = id_usuario
                  left join grado ON id_grado = GRADO_id_grado
                  left join curso ON curso.GRADO_id_grado = id_grado
                  left join asignacion_horario ON id_curso = curso_id_curso
                  left join horario ON id_horario = horario_id_horario
                  left join dias ON id_dia = dias_id_dia
                WHERE USUARIO_id_usuario = $id_usuario && id_dia = 1
              GROUP BY horario_entrada,horario_salida    
        ) lunes USING(horario_entrada, horario_salida) LEFT JOIN (
            SELECT horario_entrada, horario_salida,
              GROUP_CONCAT(nombre_curso) martes
              FROM alumno
                  left join usuario ON USUARIO_id_usuario = id_usuario
                  left join grado ON id_grado = GRADO_id_grado
                  left join curso ON curso.GRADO_id_grado = id_grado
                  left join asignacion_horario ON id_curso = curso_id_curso
                  left join horario ON id_horario = horario_id_horario
                  left join dias ON id_dia = dias_id_dia
                WHERE USUARIO_id_usuario = $id_usuario && dia = 'Martes'
              GROUP BY 1,2    
        ) martes USING(horario_entrada, horario_salida) LEFT JOIN (
            SELECT horario_entrada, horario_salida,
              GROUP_CONCAT(nombre_curso) miercoles
              FROM alumno
                  inner join usuario ON USUARIO_id_usuario = id_usuario
                  INNER JOIN grado ON id_grado = GRADO_id_grado
                  inner join curso ON curso.GRADO_id_grado = id_grado
                  INNER JOIN asignacion_horario ON id_curso = curso_id_curso
                  INNER JOIN horario ON id_horario = horario_id_horario
                  INNER JOIN dias ON id_dia = dias_id_dia
                WHERE USUARIO_id_usuario = $id_usuario && dia = 'Miercoles'
              GROUP BY 1,2    
        ) miercoles USING(horario_entrada, horario_salida) LEFT JOIN (
            SELECT horario_entrada, horario_salida,
              GROUP_CONCAT(nombre_curso) jueves
              FROM alumno
                  inner join usuario ON USUARIO_id_usuario = id_usuario
                  INNER JOIN grado ON id_grado = GRADO_id_grado
                  inner join curso ON curso.GRADO_id_grado = id_grado
                  INNER JOIN asignacion_horario ON id_curso = curso_id_curso
                  INNER JOIN horario ON id_horario = horario_id_horario
                  INNER JOIN dias ON id_dia = dias_id_dia
                WHERE USUARIO_id_usuario = $id_usuario && dia = 'Jueves'
              GROUP BY 1,2    
        ) jueves USING(horario_entrada, horario_salida) LEFT JOIN (
            SELECT horario_entrada, horario_salida,
              GROUP_CONCAT(nombre_curso) viernes
              FROM alumno
                  inner join usuario ON USUARIO_id_usuario = id_usuario
                  INNER JOIN grado ON id_grado = GRADO_id_grado
                  inner join curso ON curso.GRADO_id_grado = id_grado
                  INNER JOIN asignacion_horario ON id_curso = curso_id_curso
                  INNER JOIN horario ON id_horario = horario_id_horario
                  INNER JOIN dias ON id_dia = dias_id_dia
                WHERE USUARIO_id_usuario = $id_usuario && dia = 'Viernes'
              GROUP BY 1,2    
        ) viernes USING(horario_entrada, horario_salida)
        ORDER BY horas.horario_entrada, horas.horario_salida");
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
      </div>
      <div class="clases">
      <a href="pantallaClases.php" class="button orange">Sociales</a>
      <p class="containerp">Profesor X</p>
      </div>
   
