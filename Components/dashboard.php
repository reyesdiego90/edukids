<div class="container">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <button type="button" class="btn btn-info" id="btnNuevo" data-toggle="modal" data-target="#myModal">NUEVO</button>
      </div>
    </div>
   </div>

   <div class="container">
    <div class="row">
      <div class="col-lg-12">
      <div class="table-responsive">
      <table id="tablaAlumno" class="table table-striped table-bordered table-condensed" style="width:100%">
      <thead class="text-center">
      <tr>
      <th>Nombre</th>
      <th>Apellido</th>
      <th>Correo Electronico</th>
      <th>Grado</th>
      <th>Acciones</th>
      </tr>
      </thead>
      <tbody>
      <tr> 
      <td>Carlos</td>
      <td>Ortega</td>
      <td>dany.ortegas@gmail.com</td>
      <td>Tercero Basico</td>
      <td>
      <div class="text-center">
      <div class="btn-group">
      <button class="btn btn-primary btnEditar">Editar</button>
      <button class="btn btn-danger btnEliminar">Eliminar</button>
      
      </div>
      </div>
      </td>
      </tr>
      </tbody>
      </table>
      </div>
        </div>
    </div>
   </div>

   <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
    Open modal
  </button>

  <!-- The Modal -->
  <div class="modal fade" id="myModal">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Modal Heading</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          Modal body..
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
        
      </div>
    </div>
  </div>

</div>