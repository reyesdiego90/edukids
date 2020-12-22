
function getRandomArbitrary(minimo, max) {
  return parseInt(Math.random() * (max - minimo) + minimo);
}

function nombreRandomUsuario(){
  const minimo = 0;
  const max = 200;
  const Usuario = document.getElementById('usuario');
  const primerNombre = new String(document.getElementById("primerNombre").value);
  const primerApellido = new String(document.getElementById('primerApellido').value);
  const segundoApellido =  new String(document.getElementById('segundoApellido').value);
  const primerNombreUsuario = primerNombre.charAt(0).toLocaleLowerCase();
  const segundoNombreUsuario = segundoApellido.charAt(0).toLocaleLowerCase();

  const usuarioFinal = primerNombreUsuario.concat(primerApellido.toLocaleLowerCase(),segundoNombreUsuario,getRandomArbitrary(minimo,max));
  Usuario.value = usuarioFinal;
}







