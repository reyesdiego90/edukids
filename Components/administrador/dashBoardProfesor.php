<div>
  <button id="btnNuevo" type="button" class="btn-hover color-1" data-toggle="modal" data-target="#agregarMaestro">
    Nuevo 
  </button>
</br>
<hr>
  
  </hr>
  <table id="registroTabla" class="table table-striped table-bordered" style="width:100%">
    <thead class="thead-dark">
      <tr>
        <th>id</th>
        <th>Primer Nombre</th>
        <th>Segundo Nombre</th>
        <th>Primer Apellido</th>
        <th>Segundo Apellido</th>
        <th>Correo</th>
        <th>Telefono</th>
        <th>Estado</th>
        <th>Usuario</th>
        <th>Editar</th>
      </tr>
    </thead>
    <tbody>
      <?php
        include_once '../../conexion2.php';
        mysqli_set_charset($base, 'utf8'); 
        $result = mysqli_query($base, "SELECT id_maestro, primer_nombre,
        segundo_nombre, primer_apellido,
        segundo_apellido, correo,
        telefono, estado, nombre_usuario, id_estado 
        FROM maestro
        INNER JOIN estado ON maestro.ESTADO_id_estado = estado.id_estado
        INNER JOIN usuario ON maestro.USUARIO_id_usuario = usuario.id_usuario");
        while($res = mysqli_fetch_assoc($result)){
          $datos = $res['id_maestro']."||".
          $res['primer_nombre']."||".
          $res['segundo_nombre']."||".
          $res['primer_apellido']."||".
          $res['segundo_apellido']."||".
          $res['correo']."||".
          $res['telefono']."||".
          $res['id_estado']."||".
          $res['nombre_usuario'];
      ?>
      <tr>
        <td><?php echo $res['id_maestro']?></td>
        <td><?php echo $res['primer_nombre']?></td>
        <td><?php echo $res['segundo_nombre']?></td>
        <td><?php echo $res['primer_apellido']?></td>
        <td><?php echo $res['segundo_apellido']?></td>
        <td><?php echo $res['correo']?></td>
        <td><?php echo $res['telefono']?></td>
        <td><?php echo $res['estado']?></td>
        <td><?php echo $res['nombre_usuario']?></td>
        <td>
          <button class="btn btn-info" data-toggle="modal" data-target="#editTeacher"
            onclick="editarMaestro('<?php echo $datos; ?>')">
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

<!-- Contenedor para poder agregar profesores -->
<div id="agregarMaestro" class="modal fade">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="containerMaestro" name="formularioM">
        <h1>&bull; Ingreso Maestro &bull;</h1>
        <div class="modal-body">
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
          <div class="telephone">
            <label for="Correo"></label>
            <input type="email" placeholder="Correo Electronico" name="email" id="email">
          </div>
          
        </div>
        <div class="modal-footer">
          <div class="submit">
            <input type="submit" value="Guardar" id="guardarMaestro" class="btn btn-danger" onclick="nombreRandomUsuario()" />
          </div>
        </div>
      </form>
    </div>
  </div>
</div>


<!-- Contenedor para poder editar alumnos -->
<div id="editTeacher" class="modal fade">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="container2" name="formularioM">
        <h1>&bull; Actualizar Maestro &bull;</h1>
        <div class="modal-body">
          <input type="hidden" id="idMaestro" name='idMaestro'>
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
          <div class="names">
            <label for="Segundo Apellido"></label>
            <input type="email" placeholder="Correo Electronico" name="correoAc" id="correoAc" required>
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
          <br>
        </div>
        <div class="modal-footer">
          <div class="submit">
            <input type="submit" value="actualizar" id="actualizarDatosMaestro" class="btn btn-danger"/>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.js"></script>
<script src="js/pluginTabla.js"></script>