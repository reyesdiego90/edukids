let box = document.querySelectorAll(".box2-info");
let title = document.querySelectorAll('.card-background');
let card = document.querySelectorAll('.card-string');

let animado = () => {
  let scrollTop = document.documentElement.scrollTop;
  for(var i=0; i<box.length; i++){
    let alturaAnimado = box[i].offsetTop;
    if(alturaAnimado - 660 < scrollTop){
      box[i].style.opacity = 1;
      box[i].classList.add("mostrarArriba");
    }
  }
}

let animado2 = () => {
  let scrollTop = document.documentElement.scrollTop;
  for(var i=0; i<title.length; i++){
    let alturaAnimado = title[i].offsetTop;
    if(alturaAnimado - 660 < scrollTop){
      title[i].style.opacity = 1;
      card[i].style.opacity = 1;
      title[i].classList.add("mostrarLado");
      card[i].classList.add("mostrarLado");
    }
  }
}

window.addEventListener('scroll', animado2);
window.addEventListener('scroll', animado);