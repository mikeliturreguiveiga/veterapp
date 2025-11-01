//slideShow.

$(document).ready(function() {
  let indice = 0;
  const imagenes = $('.slideshow-container .imagen');
  const total = imagenes.length;

  function siguienteImagen() {
    imagenes.eq(indice).removeClass('active');
    indice = (indice + 1) % total;
    imagenes.eq(indice).addClass('active');
  }

   //Cambia de imagen cada 3 segundos
  setInterval(siguienteImagen, 3000);
});