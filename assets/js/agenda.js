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

//--------------VALIDACIÓN DEL FORMULARIO DE NUEVA CITA EMPLEADO-----------

document
  .getElementById("formulario_nueva_cita_empleado")
  .addEventListener("submit", function (event) {
    const fecha_calendario = document.getElementById("fecha_añadir").value;
    const hora = document.getElementById("hora_añadir").value;

    let errores = [];

    if (fecha_calendario === "") {
      errores.push("Selecciona una fecha");
    } else {
      const fecha_seleccionada = new Date(fecha_calendario);
      const hoy = new Date();

      hoy.setHours(0, 0, 0, 0);
      fecha_seleccionada.setHours(0, 0, 0, 0);

      if (fecha_seleccionada < hoy) {
        errores.push("La fecha seleccionada ya ha pasado");
      }
    }

    if (hora === "") {
      errores.push("Hora vacía");
    }

    if (errores.length > 0) {
      event.preventDefault();
      alert(errores.join("\n"));
    }
  });

  //CODIGO FILTRADO DE CAMPOS PARA MOSTRAR - CON JQUERY ES MAS CORTO - ESTA MUY COMENTADO PORQUE ME HA COSTADP MUCHO Y HE TEMIDO QUE USAR LA IA

  $(document).ready(function() {
    $('#nombre_usuario, #nombre_mascota, #fecha').on('input change', function() {//Uso input para el texto y change para el calendario
        
        const buscarCliente = $('#nombre_usuario').val().toLowerCase();
        const buscarMascota = $('#nombre_mascota').val().toLowerCase();
        const buscarFecha = $('#fecha').val(); // Formato YYYY-MM-DD

        $('.info_hoy tr, .info_pasada tr, .info_proximas tr').each(function() {//Recorremos las filas de datos
            const fila = $(this);
            
            
            if (fila.find('th').length > 0) return;//Para saltar el encabezado - se esa return para decir que es como "siguiente"

            const textoFecha   = fila.find('td:eq(0)').text().trim(); // Columna 1
            const textoCliente = fila.find('td:eq(2)').text().toLowerCase(); // Columna 3
            const textoMascota = fila.find('td:eq(3)').text().toLowerCase(); // Columna 4

            // Si el buscador está vacío o si el texto de la tabla contiene lo buscado
            const coincideCliente = buscarCliente === "" || textoCliente.includes(buscarCliente);
            const coincideMascota = buscarMascota === "" || textoMascota.includes(buscarMascota);
            const coincideFecha   = buscarFecha   === "" || textoFecha.includes(buscarFecha);

            // Mostramos datos
            if (coincideCliente && coincideMascota && coincideFecha) {
                fila.show();
            } else {
                fila.hide();
            }
        });
    });
});
