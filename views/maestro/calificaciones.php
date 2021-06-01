<?php
    include('../layout/maestroheader.php');
?>
<div class="container">
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
    <div class="row table-responsive">
        <div class="col table-wrapper">
            <table id="example" class="table table-bordered display nowrap" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Grado</th>
                        <th>Materia</th>
                        <th>Primera Unidad</th>
                        <th>Segunda Unidad</th>
                        <th>Tercera Unidad</th>
                        <th>Cuarta Unidad</th>
                        <th>Agregar Nota</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    include_once '../../conexion2.php';
                    $result = mysqli_query($base, "SELECT alumno.id_alumno, maestro.id_maestro, concat(alumno.primer_nombre, ' ',alumno.segundo_nombre, ' ', alumno.primer_apellido, ' ', alumno.segundo_apellido) as nombre_alumno,
                        primera_unidad, segunda_unidad, tercera_unidad, cuarta_unidad,
                        curso.nombre_curso as materia, 
                        concat(grado.nombre_grado, ' ', nivel.nombre_nivel) as grado
                        FROM edukids.nota
                        inner join asignacion_curso on asignacion_curso.CURSO_id_curso = nota.curso_id_curso
                        inner join curso on curso.id_curso = nota.curso_id_curso
                        inner join grado on grado.id_grado = curso.GRADO_id_grado
                        inner join nivel on grado.NIVEL_id_nivel = nivel.id_nivel
                        inner join maestro on asignacion_curso.Maestro_id_maestro = maestro.id_maestro
                        inner join alumno on alumno.id_alumno = nota.alumno_id_alumno
                        where id_maestro = $id_maestro");
                while($res = mysqli_fetch_assoc($result)){
                ?>
                    <tr>
                        <td><?php echo strtoupper($res["nombre_alumno"]) ?></td>
                        <td><?php echo strtoupper($res["grado"]) ?></td>
                        <td><?php echo strtoupper($res["materia"]) ?></td>
                        <td><?php echo $res["primera_unidad"] ?></td>
                        <td><?php echo $res["segunda_unidad"] ?></td>
                        <td><?php echo $res["tercera_unidad"] ?></td>
                        <td><?php echo $res["cuarta_unidad"] ?></td>
                        <td>a</td>
                    </tr>    
                <?php
                    }
                ?>
                </tbody>    
            </table>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.20/datatables.min.js"></script>  

<!-- searchPanes   -->
<script src="https://cdn.datatables.net/searchpanes/1.0.1/js/dataTables.searchPanes.min.js"></script>
<!-- select -->
<script src="https://cdn.datatables.net/select/1.3.1/js/dataTables.select.min.js"></script>  

<script src="../../assets/js/notas.js"></script>

</body>

</html>