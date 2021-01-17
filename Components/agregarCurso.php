<?php
  include_once '../conexion2.php';
  $curso = strtolower($_POST['curso']);
  $grado = $_POST['grado'];

  $insertar_curso = "INSERT INTO curso(nombre_curso, GRADO_id_grado) VALUES('$curso', $grado)";
  $result = mysqli_query($base, $insertar_curso);

  $id_curso = mysqli_insert_id($base);

  $query = "INSERT INTO asignacion_horario(horario_id_horario, dias_id_dia, curso_id_curso) VALUES ";
  $queryValue = "";
  $number = count($_POST['Hora']);
  $var = $number;
  for($i=0; $i<$var; $i++) {
    if(!empty($_POST["Hora"][$i]) || !empty($_POST["dia"][$i])) {
        if($queryValue!="") {
            $queryValue .= ",";
        }
        $queryValue .= "(".$_POST["Hora"][$i].",".$_POST["dia"][$i].", $id_curso)";

    }
  }

  $horario = $query.$queryValue;
  $result = mysqli_query($base, $horario);
  echo $result;
  
  
?>