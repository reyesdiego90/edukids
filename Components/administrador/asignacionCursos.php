<div>
  <div class="curso-botones__Orden">
    <button id="btnNuevo" type="button" class="btn btn-success d-flex justify-content-center" data-toggle="modal"
      data-target="#agregarCurso">
      Agreagar Curso
      <span class="material-icons">
        library_books
      </span>
    </button>
    <button id="btnNuevo" type="button" class="btn btn-success d-flex justify-content-center" data-toggle="modal"
      data-target="#agregarCurso">
      Asignar Curso
      <span class="material-icons">
        how_to_reg
      </span>
    </button>
  </div>

  <table id="registroTabla" class="table table-striped table-bordered" style="width:100%">
    <thead>
      <tr>
        <th>Maestro</th>
        <th>Curso</th>
        <th>Grado</th>
      </tr>
    </thead>
    <tbody>
      <?php
        $base = mysqli_connect("127.0.0.1", "root", "toor", "Edukids", "3306");
        mysqli_set_charset($base, 'utf8');
      ?>
    </tbody>
  </table>
</div>

<div id="agregarCurso" class="modal fade">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="addCourse" name="formulario" method="POST">
        <h1>&bull; Ingreso de Curso &bull;</h1>
        <div class="modal-body">
          <div class="name">
            <label for="Curso"></label>
            <input type="text" placeholder="Curso" name="curso" id="curso" autocomplete='off' required>
          </div>
          <div class="subject">
            <label for="Grado"></label>
            <select placeholder="Seccion" name="grado" id="Grado" required>
              <option disabled hidden selected>Grado</option>
              <?php
                      $result = mysqli_query($base, 
                      "SELECT id_grado, nombre_grado, nombre_nivel 
                      FROM grado
                      INNER JOIN nivel ON grado.NIVEL_id_nivel = nivel.id_nivel");
                      while($res = mysqli_fetch_assoc($result)){
                    ?>
              <option value="<?php echo $res["id_grado"]?>"><?php echo $res["nombre_grado"].' '.$res['nombre_nivel'] ?>
              </option>
              <?php
                      }
                    ?>
            </select>
          </div>
        </div>
        <div class="modal-footer">
          <div class="submit">
            <input type="submit" value="Guardar Curso" id="guardarCurso" class="btn btn-danger" />
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.js"></script>
<script src="js/pluginTabla.js"></script>