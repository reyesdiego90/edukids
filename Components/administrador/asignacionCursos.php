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

        <div class="telephone">
          <label for="horario">Horario de Entrada</label>
          <input type="time" placeholder="Horario de Entrada" name="horario1" id="horario1"  max="12:00:00" min="6:00:00" step="3600" required>
        </div>
        <div class="telephone">
          <label for="horario">Horario de Salido</label>
          <input type="time" placeholder="Horario de Salida" name="horario2" id="horario2" max="12:00:00" min="6:00:00" step="3600" required>
        </div>

        <div class="subject">
          <label for="Dia"></label>
          <select placeholder="Dia" name="dia1" id="dia1" required>
            <option disabled hidden selected>Dia 1</option>
            <?php
              $result = mysqli_query($base, 
              "Select * from dias");
              while($res = mysqli_fetch_assoc($result)){
            ?>
            <option value="<?php echo $res["id_dia"]?>"><?php echo $res["dia"] ?>
            </option>
            <?php
                    }
                  ?>
            </select>
        </div>

        <div class="subject">
          <label for="Dia"></label>
          <select placeholder="Dia" name="dia2" id="dia2" required>
            <option disabled hidden selected>Dia 2</option>
            <?php
              $result = mysqli_query($base, 
              "Select * from dias");
              while($res = mysqli_fetch_assoc($result)){
            ?>
            <option value="<?php echo $res["id_dia"]?>"><?php echo $res["dia"] ?>
            </option>
            <?php
                    }
                  ?>
            </select>
        </div>

        <div class="subject">
          <label for="Dia"></label>
          <select placeholder="Dia" name="dia3" id="dia3" required>
            <option disabled hidden selected>Dia 3</option>
            <?php
              $result = mysqli_query($base, 
              "Select * from dias");
              while($res = mysqli_fetch_assoc($result)){
            ?>
            <option value="<?php echo $res["id_dia"]?>"><?php echo $res["dia"] ?>
            </option>
            <?php
              }
            ?>
            </select>
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
            <?php
              $result = mysqli_query($base, 
              "SELECT nombre_curso, nombre_grado, dia1.dia, dia2.dia, dia3.dia FROM curso
              inner join grado on GRADO_id_grado = id_grado
              inner join dias dia1 on dia1.id_dia = DIAS_dia1 
              inner join dias dia2 on dia2.id_dia = DIAS_diA2
              inner join dias dia3 on dia3.id_dia = DIAS_diA3");
            ?>
            <tr>
              <th>Curso</th>
              <th>Grado</th>
              <th>Dias</th>
            </tr>
          </thead>
          <tbody> 
            <?php
              while($res = mysqli_fetch_array($result)){
            ?>
            <tr>
              <td><?php echo $res[0] ?></td>
              <td><?php echo $res[1] ?></td>
              <td>
                <?php 
                    if($res[3] == 'Ninguno' && $res[4] == 'Ninguno'){
                      echo $res[2];
                    }else if($res[3] == 'Ninguno'){
                      echo $res[2].', '.$res[4];
                    }else if($res[4] == 'Ninguno'){
                      echo $res[2].', '.$res[3];
                    }else{
                      echo $res[2].', '.$res[3].', '.$res[4];
                    }      
                ?>
              </td>
            </tr>
            <?php
              }
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.js"></script>
<script src="js/pluginTabla.js"></script>