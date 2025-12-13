<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../assets/css/plataformaEmpleado.css">
</head>
<body>
    <!-- Includes PHP  -->
    <?php include("../includes/headerEmpleado.php");?>


    <!-- javaScript para ancho mínimo de pantalla para uso de plataforma  -->
    <script>
        if (window.innerWidth < 1024) {
            alert("La plataforma de empleado unicamente se puede usar en versión escritorio");
            window.location.href = "../includes/logOut.php";
        }
    </script>


    <!-- HTML  -->
    <div class="contenedorAgenda">
        <h1>PREVISUALIZACIÓN DE AGENDA</h1>
        <div class="contenedorCitas">
            <div class="contenedorCitasPasadas contenedorDeTarjetas">
                <div class="tarjeta citasPasadas">
                    <table>
                        <caption>Citas anteriores</caption>
                        <tr>
                            <th>Fecha</th>
                            <th>Hora</th>
                            <th>Cliente</th>
                            <th>Mascota</th>
                        </tr>
                        <tr><!-- Esto se hace con php  -->
                            <td></td>
                            <td></td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="contenedorCitasHoy contenedorDeTarjetas">
                <div class="tarjeta citasPasadas">
                    <table>
                        <caption>Citas de hoy</caption>
                        <tr>
                            <th>Fecha</th>
                            <th>Hora</th>
                            <th>Cliente</th>
                            <th>Mascota</th>
                        </tr>
                        <tr><!-- Esto se hace con php  -->
                            <td></td>
                            <td></td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="contenedorProximasCitas contenedorDeTarjetas">
                <div class="tarjeta citasPasadas">
                    <table>
                        <caption>Próximas citas</caption>
                        <tr>
                            <th>Fecha</th>
                            <th>Hora</th>
                            <th>Cliente</th>
                            <th>Mascota</th>
                        </tr>
                        <tr><!-- Esto se hace con php  -->
                            <td></td>
                            <td></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="contenedorGeneralClientesMascotas">
        <div class="contenedorClientes">
            <div class="tarjeta tarjetaClientes">
                <table>
                <caption>Previsualización clientes</caption>
                    <tr>
                        <th>Nombre</th>
                        <th>Apellidos</th>
                        <th>Teléfono</th>
                    </tr>
                    <tr><!-- Esto se hace con php  -->
                        <td></td>
                        <td></td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="contenedorMascotas">
            <div class="tarjeta tarjetaMascotas">
                <table>
                <caption>Previsualizacion mascotas</caption>
                    <tr>
                        <th>Nombre</th>
                        <th>Apellidos</th>
                        <th>Teléfono</th>
                    </tr>
                    <tr><!-- Esto se hace con php  -->
                        <td></td>
                        <td></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>

    <?php include("../includes/footerUsuario.php") ?>
</body>
</html>