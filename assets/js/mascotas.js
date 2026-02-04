//funcionamiento de los botones de citas (jquery)

$(document).ready(function () {
  $('.eliminar_mascota').on('click', function () {
    $('.tabla_mascotas').hide();
    $('.formulario_nueva_mascota').hide();
    $('.formulario_editar_mascota').hide();
    $('.formulario_borrar_mascota').show();
  });

  $('.editar_mascota').on('click', function () {
    $('.tabla_mascotas').hide();
    $('.formulario_nueva_mascota').hide();
    $('.formulario_borrar_mascota').hide();
    $('.formulario_editar_mascota').show();
  });

  $('.añadir_mascota').on('click', function () {
    $('.tabla_mascotas').hide();
    $('.formulario_borrar_mascota').hide();
    $('.formulario_editar_mascota').hide();
    $('.formulario_nueva_mascota').show();
  });

  $('.ver_mascota').on('click', function () {
    $('.formulario_borrar_mascota').hide();
    $('.formulario_nueva_mascota').hide();
    $('.formulario_editar_mascota').hide();
    $('.tabla_mascotas').show();
  });

});