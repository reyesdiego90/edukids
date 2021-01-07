<?php

  $base = mysqli_connect("127.0.0.1", "root", "Carlosortega1", "Edukids", "3306");
  mysqli_set_charset($base, 'utf8'); 

  $carpetaDestino = 'Tareas/';

  $titulo = $_POST["tituloAnuncio"];
  $descripcion = $_POST["descripcion"];
  
  $file = $_FILES['files'];
  $archivo = $carpetaDestino . basename($_FILES["files"]["name"]);
  $guardado = $_FILES['files']['tmp_name'];

  $maestro = $_POST['maestro'];
  $clase = $_POST["clase"];
  $punteo = $_POST['punteo'];


  if(!empty($file)){
    $subir_archivo = "INSERT INTO anuncio(titulo, descripcion, archivo, punteo, maestro_id_maestro, curso_id_curso, anio, estado_anuncio_id_estado)
    VALUES ('$titulo', '$descripcion', '$archivo', '$punteo', $maestro, $clase, YEAR(NOW()), 1)";
    if(move_uploaded_file($guardado, $archivo)){
      echo "archivo guardado con exito";
    }else{
      echo "error";
    }
    echo $result = mysqli_query($base, $subir_archivo);  
  }else{
    $subir_archivo = "INSERT INTO anuncio(titulo, descripcion, archivo, punteo, maestro_id_maestro, curso_id_curso, anio, estado_anuncio_id_estado)
    VALUES ('$titulo', '$descripcion', NULL, '$punteo', $maestro, $clase, YEAR(NOW()), 1)";
    echo $result = mysqli_query($base, $subir_archivo); 
  }

  echo $archivo;

?>