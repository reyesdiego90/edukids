<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- ===== BOX ICONS ===== -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>
        <link href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css' rel='stylesheet'>
        <link href='https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css' rel='stylesheet'>
        <link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
        <!-- ===== CSS ===== -->
        <link rel="stylesheet" href="css/registro-maestro.css">
        
        

        <title>Maestro</title>
    </head>
    <body>
    <div id="container">
</br>
  <h1>&bull; Ingreso Maestro &bull;</h1>
</br>
  <div class="underline">
  </div>

  <form action="#" method="post" id="contact_form">
    <div class="name">
      <label for="Primer Nombre"></label>
      <input type="text" placeholder="Primer Nombre" name="nombre1" id="primerNombre" required>
    </div>
    <div class="email">
      <label for="Segundo Nombre"></label>
      <input type="text" placeholder="Segundo Nombre" name="nombre2" id="segundoNombre" required>
    </div>
    
    <div class="email">
      <label for="Primer Apellido"></label>
      <input type="text" placeholder="Primer Apellido" name="apellido1" id="primerApellido" required>
    </div>
    <div class="name">
      <label for="Segundo Apellido"></label>
      <input type="text" placeholder="Segundo Apellido" name="apellido2" id="segundoApellido" required>
    </div>
    <div class="telephone">
      <label for="email"></label>
      <input type="text" placeholder="Correo Electronico" name="email" id="email" required>
    </div>
    <div class="telephone">
      <label for="Number"></label>
      <input type="text" placeholder="Telefono" name="tel" id="tel" required>
    </div>
    <div class="subject">
      <label for="Grado"></label>
      <select placeholder="Seccion" name="Grado" id="Grado" required>
        <option disabled hidden selected>Grado A Cargo</option>
        <option>Nurserey</option>
        <option>Pre-Kinder</option>
        <option>Kinder</option>
        <option>Preparatoria</option>
        <option>Primero</option>
        <option>Segundo</option>
        <option>Tercero</option>
        <option>Cuarto</option>
        <option>Quinto</option>
        <option>Sexto</option>
        <option>Primero Basico</option>
        <option>Segundo Basico</option>
        <option>Tercero Basico</option>
      </select>
    </div>
  
    
   
    <div class="submit">
      <input type="submit" value="Guardar" id="guardar" class="btn btn-danger" />
    </div>
  </form><!-- // End form -->
</div>
    </body>
</html>
