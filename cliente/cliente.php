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
    <?php include('../includes/headerCliente.php');
    session_start();
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
                    <h2>Nombre: <?php //Nombre de animal de base de datos ?></h2>
                    <h2>Especie: <?php //Nombre de animal de base de datos ?></h2>
                    <h2>Edad: <?php //Nombre de animal de base de datos ?></h2>
                </div>
                <input class="botonAñadirMascota" type="button" value="Añadir Mascota" id="botonAñadirMascota" name="botonAñadirMascota"> <!-- Este hacerlo con jquery para esconder el formulario-->
                <form class="menuAñadirMascota" action="" method="post">
                    <input type="text" name="nombre" id="nombre" placeholder="Nombre">
                    <input type="text" name="especie" id="especie" placeholder="Especie">
                    <input type="text" name="raza" id="raza" placeholder="Raza">
                    <input type="text" name="edad" id="edad" placeholder="Edad">
                    <div class="contenedorBotonAñadir">
                        <input class="botonAñadirAnimal" type="submit" value="Añadir">
                    </div>
                </form>
            </div>
            <div class="contenedorCitas">
                <div class="proximasCitas">
                    <h2>Proximas citas</h2>
                    <div class="tarjetaProximaCita tarjeta">
                        <div class="diaHora">
                            <h3>17:00 h</h3>
                            <h4>Jue 7/09</h4>
                        </div>
                        <div class="CitaInformacion">
                            <h2>Paciente: <?php //Nombre del animal de base de datos ?></h2>
                            </h2>
                        </div>
                    </div>
                </div>
                <div class="citasAnteriores">
                    <h2>Citas anteriores</h2>
                    <div class="tarjetaCitaAnterior tarjeta">
                        <div class="diaHora">
                            <h3>17:00 h</h3>
                            <h4>Jue 7/09</h4>
                        </div>
                        <div class="CitaInformacion">
                            <h2>Paciente: <?php //Nombre del animal de base de datos ?></h2>
                            </h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="opciones">
                <input type="button" value="Modificar">
                <input type="button" value="Cancelar">
            </div>
        </div>
    </div>
    <?php include('../includes/footerUsuario.php') ?>
    <script src="../assets/js/cliente.js"></script>
</body>

</html>