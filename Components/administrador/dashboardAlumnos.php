<div class="container-xl">
  <div class="table-responsive">
    <div class="table-wrapper">
      <div class="table-title">
        <div class="row">
          <div class="col-sm-6">
            <h2>Manage <b>Employees</b></h2>
          </div>
          <div class="col-sm-6">
            <a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal"><i
                class="material-icons">&#xE147;</i> <span>Add New Employee</span></a>
            <a href="#deleteEmployeeModal" class="btn btn-danger" data-toggle="modal"><i
                class="material-icons">&#xE15C;</i> <span>Delete</span></a>
          </div>
        </div>
      </div>
      <table class="table table-striped table-hover" id="registroTabla">
        <thead>
          <tr>
            <th>
              <span class="custom-checkbox">
                <input type="checkbox" id="selectAll">
                <label for="selectAll"></label>
              </span>
            </th>
            <th>Primer Nombre</th>
            <th>Segundo Nombre</th>
            <th>Primer Apellido</th>
            <th>Segundo Apellido</th>
            <th>Telefono</th>
            <th>Estado</th>
            <th>Sección</th>
            <th>Grado</th>
            <th>Usuario</th>
            <th>Opcion</th>
          </tr>
        </thead>
        <tbody>

          <?php
            $base = mysqli_connect("127.0.0.1", "root", "toor", "Edukids", "3306");
            $result = mysqli_query($base, 
            "SELECT alumno.id_alumno, alumno.primer_nombre, alumno.segundo_nombre, alumno.primer_apellido, alumno.segundo_apellido, alumno.telefono, estado.estado, seccion.seccion, grado.nombre_grado, nivel.nombre_nivel, usuario.nombre_usuario FROM alumno
            INNER JOIN grado ON grado.id_grado = alumno.GRADO_id_grado
            INNER JOIN nivel ON grado.NIVEL_id_nivel = nivel.id_nivel
            INNER JOIN seccion ON seccion.id_seccion = alumno.SECCION_id_seccion
            INNER JOIN estado ON alumno.ESTADO_id_estado = estado.id_estado
            INNER JOIN usuario ON alumno.USUARIO_id_usuario = usuario.id_usuario");
            while($res = mysqli_fetch_assoc($result)){
          ?>
          <tr>
            <td>
              <span class="custom-checkbox">
                <input type="checkbox" id="checkbox1" name="options[]" value="1">
                <label for="checkbox1"></label>
              </span>
            </td>
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
              <a href="#editEmployeeModal" class="edit" data-toggle="modal"><i class="material-icons"
                  data-toggle="tooltip" title="Edit">&#xE254;</i></a>
              <a href="#deleteEmployeeModal" class="delete" data-toggle="modal"><i class="material-icons"
                  data-toggle="tooltip" title="Delete">&#xE872;</i></a>
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
<!-- Edit Modal HTML -->
<div id="addEmployeeModal" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <form>
        <div class="modal-header">
          <h4 class="modal-title">Add Employee</h4>
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label>Name</label>
            <input type="text" class="form-control" required>
          </div>
          <div class="form-group">
            <label>Email</label>
            <input type="email" class="form-control" required>
          </div>
          <div class="form-group">
            <label>Address</label>
            <textarea class="form-control" required></textarea>
          </div>
          <div class="form-group">
            <label>Phone</label>
            <input type="text" class="form-control" required>
          </div>
        </div>
        <div class="modal-footer">
          <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
          <input type="submit" class="btn btn-success" value="Add">
        </div>
      </form>
    </div>
  </div>
</div>
<!-- Edit Modal HTML -->
<div id="editEmployeeModal" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <form>
        <div class="modal-header">
          <h4 class="modal-title">Edit Employee</h4>
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label>Name</label>
            <input type="text" class="form-control" required>
          </div>
          <div class="form-group">
            <label>Email</label>
            <input type="email" class="form-control" required>
          </div>
          <div class="form-group">
            <label>Address</label>
            <textarea class="form-control" required></textarea>
          </div>
          <div class="form-group">
            <label>Phone</label>
            <input type="text" class="form-control" required>
          </div>
        </div>
        <div class="modal-footer">
          <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
          <input type="submit" class="btn btn-info" value="Save">
        </div>
      </form>
    </div>
  </div>
</div>
<!-- Delete Modal HTML -->
<div id="deleteEmployeeModal" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <form>
        <div class="modal-header">
          <h4 class="modal-title">Delete Employee</h4>
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        </div>
        <div class="modal-body">
          <p>Are you sure you want to delete these Records?</p>
          <p class="text-warning"><small>This action cannot be undone.</small></p>
        </div>
        <div class="modal-footer">
          <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
          <input type="submit" class="btn btn-danger" value="Delete">
        </div>
      </form>
    </div>
  </div>
</div>


<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.js"></script>
<script src="js/pluginTabla.js"></script>