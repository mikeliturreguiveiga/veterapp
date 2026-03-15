//funcionamiento del botón de añadir mascota (jquery)

$(document).ready(function() {
      $('.botonAñadirMascota').on('click', function() {
        $('.menuAñadirMascota').slideToggle();
      });

      $('.nuevaCita').on('click', function() {
        $('.contenedorCalendario').slideToggle();
      });
});

//Uso de objeto date para mostrar fecha.

const fecha = new Date();

const dia = String(fecha.getDate()).padStart(2, '0');
const mes = String(fecha.getMonth() + 1).padStart(2, '0');
const año = fecha.getFullYear();

const fecha_formateada = dia + "/" + mes + "/" + año;

document.getElementById('fecha').innerText = fecha_formateada;