<? include_once '../conexion.php'?>

<div class='card'>
  <div class="card-header text-white bg-primary">
    Ingreso De Alumno
  </div>
  <div class="row g-3 container mt-2 align-items-center">
    <div class="col-md">
      <div class="form-floating mb-3">
        <input type="text" class="form-control" placeholder="PrimerNombre">
        <label for="floatingInput">Primer Nombre</label>
      </div>
    </div>
    <div class="col-md">
      <div class="form-floating mb-3">
        <input type="text" class="form-control" placeholder="SegundoNombre">
        <label for="floatingInput">Segundo Nombre</label>
      </div>
    </div>
    <div class="col-md">
      <div class="form-floating mb-3">
        <input type="text" class="form-control" placeholder="TercerApellido">
        <label for="floatingInput">Tercer Nombre</label>
      </div>
    </div>
  </div>
  <div class="row g-2 container mt-2 align-items-center">
    <div class="col-md">
      <div class="form-floating mb-3">
        <input type="text" class="form-control" placeholder="primerApellido">
        <label for="floatingInput">Primer Apellido</label>
      </div>
    </div>
    <div class="col-md">
      <div class="form-floating mb-3">
        <input type="text" class="form-control" placeholder="segundoApellido">
        <label for="floatingInput">Segundo Apellido</label>
      </div>
    </div>
  </div>
  <div class="row g-2 container mt-2 align-items-center">
    <div class="col-md">
        <div class="form-floating mb-3">
          <input type="text" class="form-control" placeholder="telefono">
          <label for="floatingInput">Numero Telefonico de los padres</label>
        </div>
        <div class="form-floating">
          <select class="form-select" id="floatingSelectGrid" aria-label="Floating label select example">
            <option selected>Seccion</option>
            <?php
              $db = mysqli_connect("127.0.0.1", "root", "toor", "Edukids", "3306");
              $result = mysqli_query($db, "SELECT * FROM seccion");
              while($res = mysqli_fetch_assoc($result)){
            ?>
            <option value="<?php echo $res["id_seccion"]?>"><?php echo $res["seccion"] ?></option>
            <?php
              }
            ?>
          </select>
          <label for="floatingSelectGrid">Works with selects</label>
      </div>
    </div>
  </div>
</div>