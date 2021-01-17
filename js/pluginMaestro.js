$(document).ready(function () {
  $("#subirAnuncioDiario").click(function(e){
    e.preventDefault();    
    const tituloAnuncio = $('#tituloAnuncio').val();
    const descripcionAnuncio = CKEDITOR.instances['descripcion'].getData();
    var descripicion = descripcionAnuncio.replace(/&nbsp;/gi, ' ');
    descripicion = descripicion.replace(/&/g, "%26");
    const idMaestro = $('#maestro').val();
    const grado  = $('#clase').val();
    const fecha = $('#FechaAnuncio').val();
    const datos = `tituloAnuncio=${tituloAnuncio}&descripcionDiaria=${descripicion}&fecha=${fecha}&maestro=${idMaestro}&clase=${grado}`;
    console.log(descripicion);
    $.ajax({
      type: 'POST',
      url: './Components/Maestro/anuncioDiarioSQL.php',
      data: datos,
      success: function (r) {
        if (r == 1) {
          $('#div-results').load('Components/Maestro/anuncio.php');
          alertify.success('Alumno ingresado correctamente');
        } else {
          alert("error al ingresar datos"+datos);
        }
      }
    });

    return false;
  });

});