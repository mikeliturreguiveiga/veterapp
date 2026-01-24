<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../assets/css/cliente.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>

<body>
    <?php 
    session_start();
    include('../includes/headerCliente.php');
    include('../includes/cliente.php');
    ?>
    
    <div class="contenedorPantallaCompleta">
        <div class="contenedorCabecera">
            <h1>Hola <?php echo $_SESSION['usuario'];?></h1>
        </div>
        <div class="contenedorPedirCita">
            <img src="../assets/img/cliente/calendar.svg" alt="">
            <h2 class="nuevaCita">Solicitar nueva cita</h2>
        </div>
        <div class="contenedorCalendario">
            <input type="date" name="calendrio" id="calendario">
        </div>
        <div class="contenedorInformacion">
            <div class="contenedorInformacionMascotas">
                <h2>Mis mascotas</h2>
                <div class="tarjetaMascotas">
                    <?php foreach ($array_datos_mascota as $fila): ?>
                    <h2>Nombre: <?php echo $fila['nombre'] ?></h2>
                    <h2>Especie: <?php echo $fila['especie'] ?></h2>
                    <h2>Edad: <?php echo $edad ?></h2>
                    <?php endforeach; ?>
                </div>
                <input class="botonAñadirMascota" type="button" value="Añadir Mascota" id="botonAñadirMascota" name="botonAñadirMascota"> <!-- Este hacerlo con jquery para esconder el formulario-->
                <form class="menuAñadirMascota" action="" method="post">
                    <input type="text" name="nombre_mascota_nueva" id="nombre_mascota_nueva" placeholder="Nombre">
                    <input type="text" name="especie_mascota_nueva" id="especie_mascota_nueva" placeholder="Especie">
                    <input type="text" name="raza_mascota_nueva" id="raza_mascota_nueva" placeholder="Raza">
                    <input type="text" name="fecha_nacimiento_mascota_nueva" id="fecha_nacimiento_mascota_nueva" placeholder="Fecha nac. año-mes-día">
                    <div class="contenedorBotonAñadir">
                        <input class="botonAñadirAnimal" type="submit" value="Añadir" id="añadir_mascota_cliente" name="añadir_mascota_cliente">
                    </div>
                </form>
            </div>
            <div class="contenedorCitas">
                <div class="proximasCitas">
                    <h2>Proximas citas</h2>
                    <div class="tarjetaProximaCita tarjeta">
                        <div class="diaHora">
                            <?php foreach ($array_proximas as $cita): ?>
                            <h3><?php echo $cita['fecha'] ?></h3>
                            <h4><?php echo $cita['hora'] ?></h4>
                            <?php endforeach; ?>
                        </div>
                        <div class="CitaInformacion">
                            <?php foreach ($array_datos_mascota as $fila): ?>
                                <h2>Paciente: <?php echo $fila['nombre'] ?></h2>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
                <div class="citasAnteriores">
                    <h2>Citas anteriores</h2>
                    <div class="tarjetaCitaAnterior tarjeta">
                        <div class="diaHora">
                            <?php foreach ($array_anteriores as $cita): ?>
                            <h3><?php echo $cita['fecha'] ?></h3>
                            <h4><?php echo $cita['hora'] ?></h4>
                            <?php endforeach; ?>
                        </div>
                        <div class="CitaInformacion">
                            <?php foreach ($array_datos_mascota as $fila): ?>
                                <h2>Paciente: <?php echo $fila['nombre'] ?></h2>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="opciones">
                <input type="button" value="Modificar proxima cita">
                <input type="button" value="Cancelar proxima cita">
            </div>
        </div>
    </div>
    <?php include('../includes/footerUsuario.php') ?>
    <script src="../assets/js/cliente.js"></script>
</body>

</html>