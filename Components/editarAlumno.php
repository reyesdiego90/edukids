<?php
  $id = $_GET['id'];
  $base = mysqli_connect("127.0.0.1", "root", "toor", "Edukids", "3306");
  $result = mysqli_query($base, "SELECT * FROM alumno
  INNER JOIN grado ON alumno.GRADO_id_grado = grado.id_grado 
  INNER JOIN nivel on grado.NIVEL_id_nivel = nivel.id_nivel
  WHERE id_alumno='$id'");
  while($res = mysqli_fetch_assoc($result)){
?>

<div class="container">
  </br>
  </br>
  <div id="container">
    </br>
    <h1>&bull; Ingreso Alumnos &bull;</h1>
    <div class="underline"></div>

    <form name="formulario" action='Components/RegistroAlumno.php' method="POST" >
      <div class="name">
        <label for="Primer Nombre"></label>
        <input type="text" placeholder="Primer Nombre" name="nombre1" id="primerNombre"
        value="<?php echo $res['primer_nombre'] ?>" required>
      </div>
      <div class="email">
        <label for="Segundo Nombre"></label>
        <input type="text" placeholder="Segundo Nombre" name="nombre2" id="segundoNombre"
        value="<?php echo $res['segundo_nombre'] ?>" required>
      </div>

      <div class="name">
        <label for="Primer Apellido"></label>
        <input type="text" placeholder="Primer Apellido" name="apellido1" id="primerApellido" 
        value="<?php echo $res['primer_apellido'] ?>" required>
      </div>
      <div class="email">
        <label for="Segundo Apellido"></label>
        <input type="text" placeholder="Segundo Apellido" name="apellido2" id="segundoApellido" 
        value="<?php echo $res['segundo_apellido'] ?>" required>
      </div>
      <input type="hidden" name="usuarioR" id="usuario" >
      <div class="telephone">
        <label for="Number"></label>
        <input type="text" placeholder="Telefono" name="tel" id="tel" value="<?php echo $res['telefono'] ?>">
      </div>
      <div class="subject">
        <label for="Grado"></label>
        <select placeholder="Seccion" name="grado" id="Grado" required>
            <option disabled hidden selected value="<?php echo $res['id_grado'] ?>">
              <?php echo $res["nombre_grado"].' '.$res['nombre_nivel'] ?>
            </option>
            <?php
              $result = mysqli_query($base, 
              "SELECT id_grado, nombre_grado, nombre_nivel 
              FROM grado
              INNER JOIN nivel ON grado.NIVEL_id_nivel = nivel.id_nivel");
              while($res = mysqli_fetch_assoc($result)){
            ?>
            <option value="<?php echo $res["id_grado"]?>"><?php echo $res["nombre_grado"].' '.$res['nombre_nivel'] ?></option>
            <?php
              }
            ?>
        </select>
      </div>
      <div class="submit">
        <input type="submit" value="Guardar" id="guardar" class="btn btn-danger" onclick="nombreRandomUsuario() " />
      </div>
    </form>
    <?php  
      }
    ?>
  </div>
</div>

<?php
  $nombre1 = 'nombre1';
  $nombre2 = 'nombre2';
  $apellido1 = 'apellido1';
  $apellido2 = 'apellido2';
  $telefono = 'telefono';
  $grado = 'grado';
?>