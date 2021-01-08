<div>
  <div class="curso-botones__Orden">

    <button id="btnNuevo" type="button" class="btn-hover color-1" data-toggle="modal"
      data-target="#agregarCurso">
      Agregar Curso
    </button>
    
    <button id="btnNuevo" type="button" class="btn-hover color-1" data-toggle="modal"
      data-target="#asignarMaestro">
      Asignar Curso
    </button>

    <button id="btnNuevo" type="button" class="btn-hover color-1" data-toggle="modal"
      data-target="#mostrarClases">
      Mostrar Cursos
    </button>

  </div>
  <hr>
  
  </hr>

  <table id="registroTabla" class="table table-striped table-bordered" style="width:100%">
    <thead class="thead-dark">
      <tr>
        <th>Maestro</th>
        <th>Curso</th>
        <th>Grado</th>
        <th>Nivel</th>
      </tr>
    </thead>
    <tbody>
      <?php
        $base = mysqli_connect("127.0.0.1", "root", "toor", "Edukids", "3306");
        mysqli_set_charset($base, 'utf8');
        $result =  mysqli_query($base, 'SELECT id_asignacion, id_curso, nombre_curso, id_grado, nombre_grado, nombre_nivel, primer_nombre, segundo_nombre, primer_apellido, segundo_apellido FROM asignacion_curso
        INNER JOIN curso ON curso.id_curso = asignacion_curso.CURSO_id_curso
        INNER JOIN grado ON grado.id_grado = curso.GRADO_id_grado
        INNER JOIN nivel ON nivel.id_nivel = grado.NIVEL_id_nivel
        INNER JOIN maestro ON maestro.id_maestro = asignacion_curso.Maestro_id_maestro');
        while($res = mysqli_fetch_assoc($result)){
      ?>
      <tr>
        <td>
          <?php echo $res['primer_nombre'].' '.$res['segundo_nombre'].' '.$res['primer_apellido'].' '.$res['segundo_apellido'] ?>
        </td>
        <td>
          <?php echo $res['nombre_curso'] ?>
        </td>
        <td>
          <?php echo $res['nombre_grado']?>
        </td>
        <td>
          <?php echo $res['nombre_nivel']?>
        </td>
      </tr>
      <?php
        }
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
      <form id="addCourse" name="formulario" method="POST" action='./Components/agregarCurso.php'>

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
         <?php
          include 'listaClases.php';
         ?>
      
          <div id="addc"></div>
          <button type="button" name="add" id="add" class="btn btn-success" onclick="AgregarMas()">Agregar Más</button>

        </div>
        <div class="modal-footer">
          <div class="submit">
            <input type="submit" value="Guardar Curso" id="" class="btn btn-danger" />
          </div>
        </div>

        
      </form>
    </div>
  </div>
</div>

<div id="asignarMaestro" class="modal fade">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="assigment" name="formulario" method="POST">
        <h1>&bull; Asignacion de Curso &bull;</h1>
        <div class="modal-body">
          <div class="subject">
            <label for="maestro"></label>
            <select placeholder="Maestro" name="maestro" id="maestro" required>
              <option disabled hidden selected>Maestro</option>
                <?php
                  $result = mysqli_query($base, 
                  "SELECT id_maestro, primer_nombre, segundo_nombre, primer_apellido, segundo_apellido 
                  FROM maestro");
                  while($res = mysqli_fetch_assoc($result)){
                ?>
              <option value="<?php echo $res["id_maestro"]?>"><?php echo $res["primer_nombre"].' '.$res['segundo_nombre'].' '. 
                $res["primer_apellido"].' '.$res["segundo_apellido"]?>
              </option>
                <?php
                  }
                ?>
            </select>
          </div>

          <div class="subject">
            <label for="curso"></label>
            <select placeholder="Curso a Asignar" name="codigo_curso" id="codigo_curso" required>
              <option disabled hidden selected>Cursos</option>
                <?php
                  $result = mysqli_query($base,"SELECT id_curso, nombre_curso, nombre_grado, nombre_nivel FROM curso
                  INNER JOIN grado ON grado.id_grado = curso.GRADO_id_grado
                  INNER JOIN nivel ON nivel.id_nivel = grado.NIVEL_id_nivel
                  WHERE NOT EXISTS (SELECT NULL
                  from asignacion_curso WHERE curso.id_curso = asignacion_curso.CURSO_id_curso)");
                  while($res = mysqli_fetch_assoc($result)){
                ?>
              <option value="<?php echo $res["id_curso"]?>">
                <?php 
                echo $res["nombre_curso"].' - '.$res['nombre_grado'].' '.$res["nombre_nivel"]
                ?>
              </option>
                <?php
                  } 
                ?>
            </select>
          </div>
        </div>

        <div class="modal-footer">
          <div class="submit">
            <input type="submit" value="Asignar Curso" id="courseAssignment" class="btn btn-danger" />
          </div>
        </div>
      </form>
    </div>
  </div>
</div>


<div id="mostrarClases" class="modal fade">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <table id="registroTabla" class="table table-striped table-bordered" style="width:100%">
          <thead class="thead-dark">
          
            <tr>
              <th>Curso</th>
              <th>Grado</th>
              <th>Dias</th>
            </tr>
          </thead>
          <tbody> 

            <tr>
              <td>s</td>
              <td>d</td>
              <td>f</td>
            </tr>

          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>


<script src="js/add.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.js"></script>
<script src="js/pluginTabla.js"></script>