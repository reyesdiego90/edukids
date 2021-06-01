<?php
  session_start();
  $id_usuario = $_SESSION['id_usuario'];
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
                        <th>Promedio</th>
                        <th>Agregar Nota</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    include_once '../../conexion2.php';
                    $result = mysqli_query($base, "SELECT curso.id_curso as cursoid, id_nota ,alumno.id_alumno as id, maestro.id_maestro, concat(alumno.primer_nombre,' ',alumno.segundo_nombre,' ', alumno.primer_apellido,' ', alumno.segundo_apellido) as nombre_alumno,
                    primera_unidad, segunda_unidad, tercera_unidad, cuarta_unidad,
                    curso.nombre_curso as materia, 
                    concat(grado.nombre_grado, ' ', nivel.nombre_nivel) as grado FROM nota
                    INNER JOIN alumno ON nota.alumno_id_alumno =  alumno.id_alumno
                    INNER JOIN curso ON nota.curso_id_curso = curso.id_curso
                    INNER JOIN grado ON curso.GRADO_id_grado = grado.id_grado
                    left JOIN nivel ON nivel.id_nivel = grado.NIVEL_id_nivel
                    left join asignacion_curso ON curso.id_curso = asignacion_curso.CURSO_id_curso
                    left join maestro on asignacion_curso.Maestro_id_maestro = maestro.id_maestro
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
                        <td>
                            <?php echo 
                                ($res ["primera_unidad"] + $res["segunda_unidad"] + $res["tercera_unidad"] +  $res["cuarta_unidad"])/4;
                            ?>
                        </td>
                        <td><a href="./Components/Maestro/agregarCalificacion.php?id=<?php echo $res['id_nota']; ?>" class="btn btn-sm bg-dark text-white">Calificar</a></td>
                    </tr>    
                <?php
                    }
                ?>
                </tbody>    
            </table>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
            
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.20/datatables.min.js"></script>  

<!-- searchPanes   -->
<script src="https://cdn.datatables.net/searchpanes/1.0.1/js/dataTables.searchPanes.min.js"></script>
<!-- select -->
<script src="https://cdn.datatables.net/select/1.3.1/js/dataTables.select.min.js"></script>  

<script src="assets/js/notas.js"></script>
