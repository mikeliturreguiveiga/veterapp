//funcionamiento de los botones de citas (jquery)

$(document).ready(function () {
  $('.eliminar_usuario').on('click', function () {
    $('.tabla_usuarios').hide();
    $('.formulario_nuevo_usuario').hide();
    $('.formulario_editar_usuario').hide();
    $('.formulario_borrar_usuario').show();
  });

  $('.editar_usuario').on('click', function () {
    $('.tabla_usuarios').hide();
    $('.formulario_nuevo_usuario').hide();
    $('.formulario_borrar_usuario').hide();
    $('.formulario_editar_usuario').show();
  });

  $('.añadir_usuario').on('click', function () {
    $('.tabla_usuarios').hide();
    $('.formulario_borrar_usuario').hide();
    $('.formulario_editar_usuario').hide();
    $('.formulario_nuevo_usuario').show();
  });

  $('.ver_usuario').on('click', function () {
    $('.formulario_borrar_usuario').hide();
    $('.formulario_nuevo_usuario').hide();
    $('.formulario_editar_usuario').hide();
    $('.tabla_usuarios').show();
  });

});