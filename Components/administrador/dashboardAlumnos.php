
<!-- Contenedor para poder ingresar Alumnos -->
<div>
  <button id="btnNuevo" type="button" class="btn-hover color-1" data-toggle="modal" data-target="#addEstudentModal">
    Nuevo 
  </button>
  </br>
  <hr>
  
  </hr>
</br>
  <table id="registroTabla" class="table table-striped table-bordered" style="width:100%">
    <thead class="thead-dark">
      <tr>
        <th>id</th>
        <th>Primer Nombre</th>
        <th>Segundo Nombre</th>
        <th>Primer Apellido</th>
        <th>Segundo Apellido</th>
        <th>Telefono</th>
        <th>Estado</th>
        <th>Sección</th>
        <th>Grado</th>
        <th>Usuario</th>
        <th>Editar</th>
      </tr>
    </thead>
    <tbody>
      <?php
        $base = mysqli_connect("127.0.0.1", "root", "toor", "Edukids", "3306");
        mysqli_set_charset($base, 'utf8'); 
        $result = mysqli_query($base, 
        "SELECT alumno.id_alumno, alumno.primer_nombre, alumno.segundo_nombre, alumno.primer_apellido, alumno.segundo_apellido, alumno.telefono, estado.id_estado ,estado.estado, seccion.seccion, grado.id_grado ,grado.nombre_grado, nivel.nombre_nivel, usuario.nombre_usuario FROM alumno
        INNER JOIN grado ON grado.id_grado = alumno.GRADO_id_grado
        INNER JOIN nivel ON grado.NIVEL_id_nivel = nivel.id_nivel
        INNER JOIN seccion ON seccion.id_seccion = alumno.SECCION_id_seccion
        INNER JOIN estado ON alumno.ESTADO_id_estado = estado.id_estado
        INNER JOIN usuario ON alumno.USUARIO_id_usuario = usuario.id_usuario");
        while($res = mysqli_fetch_assoc($result)){
          $datos = $res['id_alumno']."||".
          $res['primer_nombre']."||".
          $res['segundo_nombre']."||".
          $res['primer_apellido']."||".
          $res['segundo_apellido']."||".
          $res['telefono']."||".
          $res['id_estado']."||".
          $res['seccion']."||".
          $res['id_grado']."||".
          $res['nombre_usuario'];
      ?>
      <tr>
        <td><?php echo $res['id_alumno']?></td>
        <td><?php echo $res['primer_nombre']?></td>
        <td><?php echo $res['segundo_nombre']?></td>
        <td><?php echo $res['primer_apellido']?></td>
        <td><?php echo $res['segundo_apellido']?></td>
        <td><?php echo $res['telefono']?></td>
        <td><?php echo $res['estado']?></td>
        <td><?php echo $res['seccion']?></td>
        <td><?php echo $res['nombre_grado'].' '.$res['nombre_nivel']?></td>
        <td><?php echo $res['nombre_usuario']?></td>
        <td>
          <button class="btn btn-info" data-toggle="modal" data-target="#editStudent"
            onclick="editarAlumno('<?php echo $datos; ?>')">
            <span class="material-icons">
              create
            </span>
          </button>
        </td>
      </tr>
      <?php
      }
      ?>

    </tbody>

  </table>
</div>

<!-- Contenedor para poder agregar alumnos -->
<div id="addEstudentModal" class="modal fade">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="containerAlumno" name="formulario" method="POST">
        <h1>&bull; Ingreso Alumnos &bull;</h1>
        <div class="modal-body">
          <div class="name">
            <label for="Primer Nombre"></label>
            <input type="text" placeholder="Primer Nombre" name="nombre1" id="primerNombre" autocomplete='off' required>
          </div>
          <div class="email">
            <label for="Segundo Nombre"></label>
            <input type="text" placeholder="Segundo Nombre" name="nombre2" id="segundoNombre" autocomplete='off' required>
          </div>

          <div class="name">
            <label for="Primer Apellido"></label>
            <input type="text" placeholder="Primer Apellido" name="apellido1" id="primerApellido" autocomplete='off' required>
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
            <input type="submit" value="Guardar" id="guardarAlumno" class="btn btn-danger" onclick="nombreRandomUsuario()" />
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Contenedor para poder editar alumnos -->
<div id="editStudent" class="modal fade">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="container2" name="formularioM">
        <h1>&bull; Actualizar Alumno &bull;</h1>
        <div class="modal-body">
          <input type="hidden" id="idAlumno" name='idEstudiante'>
          <div class="name">
            <label for="Primer Nombre"></label>
            <input type="text" placeholder="Primer Nombre" name="nombre1Ac" id="primerNombreAc" required>
          </div>
          <div class="email">
            <label for="Segundo Nombre"></label>
            <input type="text" placeholder="Segundo Nombre" name="nombre2Ac" id="segundoNombreAc" required>
          </div>

          <div class="name">
            <label for="Primer Apellido"></label>
            <input type="text" placeholder="Primer Apellido" name="apellido1Ac" id="primerApellidoAc" required>
          </div>
          <div class="email">
            <label for="Segundo Apellido"></label>
            <input type="text" placeholder="Segundo Apellido" name="apellido2Ac" id="segundoApellidoAc" required>
          </div>
          <input type="hidden" name="usuarioRAc" id="usuarioAc">
          <div class="telephone">
            <label for="Number"></label>
            <input type="text" placeholder="Telefono" name="telAc" id="telAc" ?>
          </div>
          <div class="telephone">
            <label for="Estado"></label>
            <select name="estadoAc" id="estado">
              <option disabled hidden selected></option>
              <?php
                $result = mysqli_query($base, "SELECT * FROM estado");
                while($res = mysqli_fetch_assoc($result)){
              ?>
                <option value="<?php echo $res['id_estado'] ?>">
                  <?php
                    echo $res['estado'];
                  ?>
                </option>
              <?php
                }
              ?>
            </select>
          </div>
          <div class="subject">
            <label for="Grado"></label>
            <select placeholder="Seccion" name="gradoAc" id="GradoAc" required>
              <option disabled hidden selected"></option>
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
          <br>
        </div>
        <div class="modal-footer">
          <div class="submit">
            <input type="submit" value="actualizar" id="actualizarDatos" class="btn btn-danger"/>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.js"></script>
<script src="js/pluginTabla.js"></script>