<?php 
  include_once '../conexion.php';
?> 


<div class="container">
</br>
</br>
<table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Primer Nombre</th>
                <th>Segundo Nombre</th>
                <th>Primer Apellido</th>
                <th>Segundo Apellido</th>
                <th>Telefono</th>
                <th>Estado</th>
                <th>Sección</th>
                <th>Grado</th>
                <th>Usuario</th>
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
                <td><?php echo $res['primer_nombre']?></td>
                <td><?php echo $res['segundo_nombre']?></td>
                <td><?php echo $res['primer_apellido']?></td>
                <td><?php echo $res['segundo_apellido']?></td>
                <td><?php echo $res['telefono']?></td>
                <td><?php echo $res['estado']?></td>
                <td><?php echo $res['seccion']?></td>
                <td><?php echo $res['nombre_grado'].' '.$res['nombre_nivel']?></td>
                <td><?php echo $res['nombre_usuario']?></td>
            </tr>
            <?php
              }
            ?>
        </tfoot>
    </table>
</div>

