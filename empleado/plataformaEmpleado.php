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
    <?php 
        include("../includes/headerEmpleado.php");
        include("../includes/conexion.php");
        include("../includes/plataformaEmpleadoInicio.php");
    ?>


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
                        <!-- Sacamos datos con PHP  -->
                         <?php foreach ($agendaCitasPasadas as $cita): ?>
                        <tr>
                            <td><?php echo $cita['fecha']; ?></td>
                            <td><?php echo $cita['hora']; ?></td>
                            <td><?php echo $cita['nombre_usuario']; ?></td>
                            <td><?php echo $cita['nombre_mascota']; ?></td>
                        </tr>
                        <?php endforeach; ?>
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
                        <!-- Sacasmos datos con php  -->
                        <?php foreach ($agendaCitasHoy as $cita): ?>
                        <tr>
                            <td><?php echo $cita['fecha']; ?></td>
                            <td><?php echo $cita['hora']; ?></td>
                            <td><?php echo $cita['nombre_usuario']; ?></td>
                            <td><?php echo $cita['nombre_mascota']; ?></td>
                        </tr>
                        <?php endforeach; ?>
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
                        <!-- Sacasmos datos con php  -->
                        <?php foreach ($agendaCitasProximas as $cita): ?>
                        <tr>
                            <td><?php echo $cita['fecha']; ?></td>
                            <td><?php echo $cita['hora']; ?></td>
                            <td><?php echo $cita['nombre_usuario']; ?></td>
                            <td><?php echo $cita['nombre_mascota']; ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="contenedorGeneralClientesMascotas">
        <div class="contenedorClientes">
            <div class="tarjeta tarjetaClientes">
                <table>
                <caption>Previsualización clientes con cita hoy</caption>
                    <tr>
                        <th>Nombre</th>
                        <th>Apellidos</th>
                        <th>Teléfono</th>
                    </tr>
                    <!-- Sacamos datos con php  -->
                     <?php foreach ($agenda_citas_usuarios_hoy as $cita): ?>
                    <tr>
                        <td><?php echo $cita['nombre_usuario']; ?></td>
                        <td><?php echo $cita['apellido_usuario']; ?></td>
                        <td><?php echo $cita['telefono_usuario']; ?></td>
                    </tr>
                    <?php endforeach; ?>
                </table>
            </div>
        </div>
        <div class="contenedorMascotas">
            <div class="tarjeta tarjetaMascotas">
                <table>
                <caption>Previsualizacion mascotas con cita hoy</caption>
                    <tr>
                        <th>Nombre usuario</th>
                        <th>Nombre mascota</th>
                        <th>Especie</th>
                        <th>Raza</th>
                        <th>Fecha de nacimiento</th>
                        <th>Lesión</th>
                    </tr>
                    <!-- Esto se hace con php  -->
                    <?php foreach ($agenda_citas_mascotas_hoy as $cita): ?>
                    <tr>
                        <td><?php echo $cita['nombre_usuario']; ?></td>
                        <td><?php echo $cita['nombre_mascota']; ?></td>
                        <td><?php echo $cita['especie']; ?></td>
                        <td><?php echo $cita['raza']; ?></td>
                        <td><?php echo $cita['fecha_nacimiento']; ?></td>
                        <td><?php echo $cita['lesion']; ?></td>
                    </tr>
                    <?php endforeach ?>
                </table>
            </div>
        </div>
    </div>
    <div class="contenedorBotonRefrescarPanel">
        <input type="button" value="Refrescar panel" onclick="location.reload();">
    </div>

    <?php include("../includes/footerUsuario.php") ?>
</body>
</html>