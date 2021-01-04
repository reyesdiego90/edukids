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
        $base = mysqli_connect("127.0.0.1", "root", "Carlosortega1", "edukids");
        mysqli_set_charset($base, 'utf8'); 
        $result = mysqli_query($base, "SELECT id_maestro, primer_nombre,
        segundo_nombre, primer_apellido,
        segundo_apellido, correo,
        telefono, estado, nombre_usuario 
        FROM maestro
        INNER JOIN estado ON maestro.ESTADO_id_estado = estado.id_estado
        INNER JOIN usuario ON maestro.USUARIO_id_usuario = usuario.id_usuario");
        while($res = mysqli_fetch_assoc($result)){
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
<div id="agregarMaestro" class="modal fade">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="containerMaestro" name="formularioM">
        <h1>&bull; Ingreso Alumnos &bull;</h1>
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


<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.js"></script>
<script src="js/pluginTabla.js"></script>