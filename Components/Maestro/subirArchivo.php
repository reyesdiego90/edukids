<?php
    ob_start();
  include_once '../../conexion2.php';

  $carpetaDestino = 'Tareas/';

  $titulo = $_POST["tituloAnuncio"];
  $descripcion = $_POST["descripcion"];
  
  $file = $_FILES['files'];
  $archivo = $carpetaDestino . basename($_FILES["files"]["name"]);
  $guardado = $_FILES['files']['tmp_name'];

  $fecha = $_POST['fechaEntrega'];
  $hora = $_POST['horaEntrega'].":00";
  date_default_timezone_set('America/Guatemala');
  setlocale(LC_ALL,"es_GT");
  $dia = date("Y-m-d");

  $maestro = $_POST['maestro'];
  $clase = $_POST["clase"];
  $punteo = $_POST['punteo'];


  if(!empty($file)){
    $subir_archivo = "INSERT INTO anuncio(titulo, descripcion, archivo, punteo, fechaSubida, fechaEntrega, horaEntrega, maestro_id_maestro, curso_id_curso, anio,  estado_anuncio_id_estado) VALUES ('$titulo', '$descripcion', '$archivo', $punteo, CURDATE(), '$fecha', '$hora', $maestro, $clase, YEAR(NOW()), 1)";
    if(move_uploaded_file($guardado, $archivo)){
      echo "archivo guardado con exito ";
    } 
    echo $result = mysqli_query($base, $subir_archivo);
    header('location: pantallaMaestro.php');
  }else{
    $subir_archivo = "INSERT INTO anuncio(titulo, descripcion, archivo, punteo, fechaSubida, fechaEntrega, horaEntrega, maestro_id_maestro, curso_id_curso, anio, estado_anuncio_id_estado)
    VALUES ('$titulo', '$descripcion', NULL, '$punteo', 'CURDATE()', '$fecha', '$hora' ,$maestro, $clase, YEAR(NOW()), 1)";
    echo $result = mysqli_query($base, $subir_archivo); 
  }
 
    header('location: http://www.edukids.edu.gt/pantallaMaestro.php');
  ob_end_flush();

?>