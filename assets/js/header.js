//funcionamiento del botón hamburguesa (jquery)

$(document).ready(function() {
      $('.hamburguesa').on('click', function() {
        $('.navMenu').slideToggle();
      });
});