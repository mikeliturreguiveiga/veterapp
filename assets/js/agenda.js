//funcionamiento de los botones de citas (jquery)

$(document).ready(function () {
  $('.anteriores').on('click', function () {
    $('.info_hoy').hide();
    $('.controles-paginacion_hoy').hide();
    $('.info_proximas').hide();
    $('.controles-paginacion_proximas').hide();
    $('.formulario_nueva_cita').hide();
    $('.info_pasada').show();
    $('.controles-paginacion_pasadas').show();
  });

  $('.proximas').on('click', function () {
    $('.info_hoy').hide();
    $('.controles-paginacion_hoy').hide();
    $('.info_pasada').hide();
    $('.controles-paginacion_pasadas').hide();
    $('.formulario_nueva_cita').hide();
    $('.info_proximas').show();
    $('.controles-paginacion_proximas').show();
  });

  $('.hoy').on('click', function () {
    $('.info_pasada').hide();
    $('.controles-paginacion_pasadas').hide();
    $('.info_proximas').hide();
    $('.controles-paginacion_proximas').hide();
    $('.formulario_nueva_cita').hide();
    $('.info_hoy').show();
    $('.controles-paginacion_hoy').show();
  });

  $('.boton_añadir_cita').on('click', function () {
    $('.info_pasada').hide();
    $('.controles-paginacion_pasadas').hide();
    $('.info_proximas').hide();
    $('.controles-paginacion_proximas').hide();
    $('.info_hoy').hide();
    $('.controles-paginacion_hoy').hide();
    $('.formulario_nueva_cita').show();
  });

  //CODIGO PARA QUE APAREZCAN LAS MASCOTAS EN FUNCION A CADA USUARIO EN EL AÑADIR CITA


  $('#select_cliente').on('change', function () {
    var idUsuario = $(this).val();
    var $selectMascota = $('#select_mascota');

    if (idUsuario) {
      // Petición AJAX vista con Miguel Angel
      $.ajax({
        url: '../includes/consigue_mascota.php',
        type: 'POST',
        data: { id_usuario: idUsuario },
        success: function (response) {
          console.log("Datos recibidos del servidor:", response);

          var mascotas = response;
          // Si por alguna razón llega como texto, lo convertimos
          if (typeof response === 'string') {
            try {
              mascotas = JSON.parse(response);
            } catch (e) {
              console.error("El servidor no envió un JSON, envió esto:", response);
              return; 
            }
          }

          $selectMascota.empty().append('<option value="">-- Selecciona mascota --</option>');
          mascotas.forEach(function (m) {
            $selectMascota.append('<option value="' + m.id_mascota + '">' + m.nombre + '</option>');
          });
          $selectMascota.prop('disabled', false);
        },
        error: function (xhr) {
          console.error("Error de conexión. El servidor respondió con código:", xhr.status);
          console.log("Contenido del error:", xhr.responseText);
        }
      });
    } else {
      $selectMascota.empty().append('<option value="">-- Primero selecciona un cliente --</option>').prop('disabled', true);
    }
  });

});