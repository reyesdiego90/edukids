

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
        <input type="text" placeholder="Primer Nombre" name="nombre1" id="primerNombre" required>
      </div>
      <div class="email">
        <label for="Segundo Nombre"></label>
        <input type="text" placeholder="Segundo Nombre" name="nombre2" id="segundoNombre" required>
      </div>

      <div class="name">
        <label for="Primer Apellido"></label>
        <input type="text" placeholder="Primer Apellido" name="apellido1" id="primerApellido" required>
      </div>
      <div class="email">
        <label for="Segundo Apellido"></label>
        <input type="text" placeholder="Segundo Apellido" name="apellido2" id="segundoApellido" required>
      </div>
      <input type="hidden" name="usuarioR" id="usuario">
      <div class="telephone">
        <label for="Number"></label>
        <input type="text" placeholder="Telefono" name="tel" id="tel">
      </div>
      <div class="subject">
        <label for="Grado"></label>
        <select placeholder="Seccion" name="grado" id="Grado" required>
            <option disabled hidden selected>Grado</option>
            <?php
              $base = mysqli_connect("127.0.0.1", "root", "Carlosortega1", "Edukids", "3306");
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
  </div>
</div>
<script src="js/userRandom.js"></script>