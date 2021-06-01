<?php
    session_start();

    if(!isset($_SESSION['rol'])){
      header('location: login.php');
    }else{
      if($_SESSION['rol'] != 2){
        header('location: login.php');
      }
    }
    $usuario = $_SESSION['user'];
    $id_usuario = $_SESSION['id_usuario'];
    include_once '../../conexion2.php';

    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $query = "SELECT curso.id_curso as cursoid, id_nota ,alumno.id_alumno as id, maestro.id_maestro, concat(alumno.primer_nombre,' ',alumno.segundo_nombre,' ', alumno.primer_apellido,' ', alumno.segundo_apellido) as nombre_alumno,
        primera_unidad, segunda_unidad, tercera_unidad, cuarta_unidad,
        curso.nombre_curso as materia, 
        concat(grado.nombre_grado, ' ', nivel.nombre_nivel) as grado FROM nota
        INNER JOIN alumno ON nota.alumno_id_alumno =  alumno.id_alumno
        INNER JOIN curso ON nota.curso_id_curso = curso.id_curso
        INNER JOIN grado ON curso.GRADO_id_grado = grado.id_grado
        left JOIN nivel ON nivel.id_nivel = grado.NIVEL_id_nivel
        left join asignacion_curso ON curso.id_curso = asignacion_curso.CURSO_id_curso
        left join maestro on asignacion_curso.Maestro_id_maestro = maestro.id_maestro
        where id_nota = $id";
        $result = mysqli_query($base, $query);
        if(mysqli_num_rows($result) == 1){
            $row = mysqli_fetch_array($result);
            $idNota = $row['id_nota'];
            $nombre = $row['nombre_alumno'];
            $materia = $row['materia'];
            $grado = $row['grado'];
            $unidad1 = $row['primera_unidad'];
            $unidad2 = $row['segunda_unidad'];
            $unidad3 = $row['tercera_unidad'];
            $unidad4 = $row['cuarta_unidad'];
            $idCurso = $row['cursoid'];
            $idAlumno = $row['id'];
        }
    }

    if(isset($_POST['update'])){
        $id = $_GET['id'];
        $idAlumno = $_POST['idAlumno'];
        $cursoid = $_POST['idCurso'];
        $unidad1 = $_POST['Unidad1'];
        $unidad2 = $_POST['Unidad2'];
        $unidad3 = $_POST['Unidad3'];
        $unidad4 = $_POST['Unidad4'];
        $nota = $_POST['idnota'];

        $query1 = "UPDATE nota set primera_unidad = '$unidad1', 
        segunda_unidad = '$unidad2', 
        tercera_unidad = '$unidad3',
        cuarta_unidad = '$unidad4'
        where id_nota = $nota and alumno_id_alumno = $idAlumno
        and curso_id_curso = $cursoid";
        echo mysqli_query($base, $query1);
        echo $query1;
        header('location: ../../PantallaAlumno.php'); 
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.css">
</head>
<body>
<div class="container">
   <h2 class="text-center">Nota del Alumno</h2>
	<div class="row justify-content-center">
		<div class="col-12 col-md-8 col-lg-6 pb-5">

         <form action="agregarCalificacion.php?id=<?php echo $_GET['id']; ?>" method="POST">

            <div class="card border-primary rounded-0">
                <div class="card-header p-0">
                    <div class="bg-info text-white text-center py-2">
                    <h3>En este formulario</h3>
                    <p class="m-0">podra ingresar la nota del alumno</p>
                    </div>
                </div>
                <div class="card-body p-3">
                    <!--Body-->
                    <div class="form-group">
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text"><i class="fa fa-user text-info"></i></div>
                        </div>
                        <input type="hidden" class="form-control" id="idnota" name="idnota" value="<?php echo $idNota ?>">
                        <input type="text" class="form-control" id="Alumno" name="Alumno" value="<?php echo $nombre ?>" onlyread>
                        <input type="hidden" class="form-control" id="idAlumno" name="idAlumno" value="<?php echo $idAlumno ?>">
                    </div>
                    </div>
                    <div class="form-group">
                    <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fa fa-user text-info"></i></div>
                            </div>
                            <input type="text" class="form-control" id="materia" name="materia" value="<?php echo $materia; ?>" >
                            <input type="hidden" class="form-control" id="idCurso" name="idCurso" value="<?php echo $idCurso; ?>">
                    </div>
                    </div>
                    <div class="form-group">
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text"><i class="fa fa-user text-info"></i></div>
                        </div>
                        <input type="text" class="form-control" id="grado" name="grado" value="<?php echo $grado ?>">
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group mb-2">
                            <div class="input-group-prepend">
                            <div class="input-group-text"><i class="fa fa-user text-info"></i></div>
                            </div>
                            <input type="text" class="form-control" id="Unidad1" name="Unidad1" placeholder="Unidad 1" value="<?php 
                                if(empty($unidad1)){
                                    echo 0;
                                }else{
                                    echo $unidad1; 
                                }
                                ?>" >
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group mb-2">
                            <div class="input-group-prepend">
                            <div class="input-group-text"><i class="fa fa-user text-info"></i></div>
                            </div>
                            <input type="text" class="form-control" id="Unidad2" name="Unidad2" placeholder="Unidad 2" value="<?php
                                if(empty($unidad2)){
                                    echo 0;
                                }else{
                                    echo $unidad2; 
                                }
                                ?>" >
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group mb-2">
                            <div class="input-group-prepend">
                            <div class="input-group-text"><i class="fa fa-user text-info"></i></div>
                            </div>
                            <input type="text" class="form-control" id="Unidad3" name="Unidad3" placeholder="Unidad 3" value="<?php 
                            if(empty($unidad3)){
                                echo 0;
                            }else{
                                echo $unidad3; 
                            }
                            ?>" >
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group mb-2">
                            <div class="input-group-prepend">
                            <div class="input-group-text"><i class="fa fa-user text-info"></i></div>
                            </div>
                            <input type="text" class="form-control" id="Unidad4" name="Unidad4" placeholder="Unidad 4" value="<?php 
                            if(empty($unidad4)){
                                echo 0;
                            }else{
                                echo $unidad4; 
                            }
                            ?>" >
                    </div>
                </div>

                <div class="text-center">
                    <button name="update" type="submit" class="btn btn-info btn-block rounded-0 py-2">
                        Enviar
                    </button>
                </div>
                </div>
            </div>
         </form>
      </div>
	</div>
</di>
</body>
</html>