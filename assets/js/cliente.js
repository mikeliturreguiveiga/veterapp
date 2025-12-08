//funcionamiento del botón de añadir mascota (jquery)

$(document).ready(function() {
      $('.botonAñadirMascota').on('click', function() {
        $('.menuAñadirMascota').slideToggle();
      });

      $('.nuevaCita').on('click', function() {
        $('.contenedorCalendario').slideToggle();
      });
});