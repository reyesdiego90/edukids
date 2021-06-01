<?php
  session_start();
  $id_usuario = $_SESSION['id_usuario'];
  include_once '../../conexion2.php';
    mysqli_set_charset($base, 'utf8'); 
    $result = mysqli_query($base,
    "SELECT id_alumno FROM alumno
    INNER JOIN usuario ON USUARIO_id_usuario = id_usuario
    WHERE id_usuario=$id_usuario");
    while($res = mysqli_fetch_assoc($result)){
      $id_alumno = $res["id_alumno"];
    }
?>


<div class="calificacion">
    <table class="calificacion__tabla">
        <thead class="calificacion__cabecera">
            <th class="calificacion__cabecera--inicio">Clase</th>
            <th>Maestro</th>
            <th>Primera Unidad</th>
            <th>Segunda Unidad</th>
            <th>Tercera Unidad</th>
            <th>Cuarta Unidad</th>
            <th class="calificacion__cabecera--final">Promedio</th>
        </thead>
        <tbody class="calificacion__body">
        <?php
            mysqli_set_charset($base, 'utf8'); 
            $result = mysqli_query($base, 
            "SELECT alumno.id_alumno, 
            concat(maestro.primer_nombre,' ',maestro.segundo_nombre,' ', maestro.primer_apellido,' ', maestro.segundo_apellido) as nombre_maestro,
            curso.nombre_curso as materia, 
            primera_unidad, segunda_unidad, tercera_unidad, cuarta_unidad
            FROM nota
            inner join alumno on nota.alumno_id_alumno = alumno.id_alumno
            inner join curso on nota.curso_id_curso = curso.id_curso
            inner join asignacion_curso on curso.id_curso = asignacion_curso.CURSO_id_curso
            inner join maestro on asignacion_curso.Maestro_id_maestro = maestro.id_maestro
            where id_alumno = $id_alumno");
            while($res = mysqli_fetch_assoc($result)){
        ?>
            <tr>
                <td><?php echo $res["materia"] ?></td>
                <td><?php echo $res["nombre_maestro"] ?></td>
                <td><?php echo $res["primera_unidad"] ?></td>
                <td><?php echo $res["segunda_unidad"] ?></td>
                <td><?php echo $res["tercera_unidad"] ?></td>
                <td><?php echo $res["cuarta_unidad"] ?></td>
                <td>
                    <?php echo 
                        ($res ["primera_unidad"] + $res["segunda_unidad"] + $res["tercera_unidad"] +  $res["cuarta_unidad"])/4;
                    ?>
                </td>
            </tr>
        <?php
            }
        ?>
        </tbody>
    </table>
</div>