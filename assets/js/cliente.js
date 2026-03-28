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

document
  .getElementById("formulario_nueva_cita")
  .addEventListener("submit", function (event) {
    const fecha_calendario = document.getElementById("calendario").value;
    const hora = document.getElementById("hora_nueva_cita").value;

    let errores = [];

    if (fecha_calendario === "") {
      errores.push("Selecciona una fecha");
    } else {
      const fecha_seleccionada = new Date(fecha_calendario);

      const hoy = new Date();

      hoy.setHours(0, 0, 0, 0);

      if (fecha_seleccionada < fecha) {
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
