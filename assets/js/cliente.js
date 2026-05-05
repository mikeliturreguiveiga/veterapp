//----------funcionamiento del botón de añadir mascota (jquery)---------

$(document).ready(function () {
  $(".botonAñadirMascota").on("click", function () {
    $(".menuAñadirMascota").slideToggle();
  });

  $(".nuevaCita").on("click", function () {
    $(".contenedorCalendario").slideToggle();
  });
});

//---------------Uso de objeto date para mostrar fecha.------------

const fecha = new Date();

const dia = String(fecha.getDate()).padStart(2, "0");
const mes = String(fecha.getMonth() + 1).padStart(2, "0");
const año = fecha.getFullYear();

const fecha_formateada = dia + "/" + mes + "/" + año;

document.getElementById("fecha").innerText = fecha_formateada;


//--------------VALIDACIÓN DEL FORMULARIO DE NUEVA CITA-----------

document.getElementById("formulario_nueva_cita").addEventListener("submit", function (event) {
    const fecha_calendario = document.getElementById("calendario").value; // Formato YYYY-MM-DD
    const hora_seleccionada = document.getElementById("hora_nueva_cita").value; // Formato HH:MM

    let errores = [];

    if (fecha_calendario === "") {
        errores.push("Selecciona una fecha");
    } else {
        const ahora = new Date();
        
        // Creamos un string de hoy en formato YYYY-MM-DD para comparar solo días
        const hoy_formato = ahora.getFullYear() + "-" + 
                            String(ahora.getMonth() + 1).padStart(2, '0') + "-" + 
                            String(ahora.getDate()).padStart(2, '0');

        if (fecha_calendario < hoy_formato) {
            errores.push("La fecha seleccionada ya ha pasado");
        } 
        else if (fecha_calendario === hoy_formato) {
            // SI ES HOY, validamos la hora
            const hora_actual = String(ahora.getHours()).padStart(2, '0') + ":" + 
                                String(ahora.getMinutes()).padStart(2, '0');

            if (hora_seleccionada !== "" && hora_seleccionada <= hora_actual) {
                errores.push("Para hoy, la hora debe ser posterior a la actual (" + hora_actual + ")");
            }
        }
    }

    if (hora_seleccionada === "") {
        errores.push("Selecciona una hora");
    }

    if (errores.length > 0) {
        event.preventDefault();
        alert(errores.join("\n"));
    }
});

//--------------AJAX DEL CLIMA-----------

$(document).ready(function () {
  //He usado open meteo
  const lat = 37.977190;
  const lon = -0.682719;
  const urlMeteo = `https://api.open-meteo.com/v1/forecast?latitude=${lat}&longitude=${lon}&current_weather=true&timezone=Europe%2FBerlin`;

  $.ajax({
    url: urlMeteo,
    method: "GET",
    success: function (data) {
      const temp = Math.round(data.current_weather.temperature);
      const codigoClima = data.current_weather.weathercode;

      const descripcion = interpretarCodigo(codigoClima);

      // Lo añadimos al HTML
      $("#fecha").append(` | ${temp}°C - ${descripcion}`);
    },
    error: function () {
      console.log("Error al conectar con Open-Meteo");
    },
  });
});

// Función auxiliar para traducir los códigos de Open-Meteo ya que en la APi vienen con números
function interpretarCodigo(codigo) {
  const estados = {
    0: "Despejado",
    1: "Principalmente despejado",
    2: "Parcialmente nublado",
    3: "Cubierto",
    45: "Niebla",
    61: "Lluvia débil",
    71: "Nieve débil",
  };
  return estados[codigo] || "Clima variable";
}
