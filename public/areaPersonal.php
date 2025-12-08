<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../assets/css/areaPersonal.css">
</head>

<body>
    <!--  Inlcuimos los archivos PHP -->
    <?php include('../includes/conexion.php') ?>
    <?php include('../includes/login.php') ?>

    <!--  HTML -->
    <div class="contenedorAreaPersonal">
        <img class="perroPortadaAreaPersonal" src="../assets/img/areaPersonal/perroAreaPersonal.jpeg" alt="perro portada area personal">
        <div class="contenedorLogin">
            <div class="contenedorLogoClinica">
                <a href="../public/index.php"><img src="../assets/img/logoClinica.svg" alt="logoClinica" class="logoClinica" name="logoClinica"></a>
            </div>
            <form action="" method="post">
                <div class="divNombre">
                    <img src="../assets/img/areaPersonal/nombre.svg" alt="">
                    <input type="text" name="usuario" id="usuario" placeholder="Usuario">
                </div>
                <div class="divContraseña">
                    <img src="../assets/img/areaPersonal/contraseña.svg" alt="">
                    <input type="password" name="contraseña" id="contraseña" placeholder="Contraseña">
                </div>
                <input class="botonInicioSesion" type="submit" value="Iniciar">
            </form>
            <a href="../public/formularioRegistro.php" class="botonRegistrarme" name="registrarme" id="registrarme">Registrarme para coger cita</a>
            <a href="../public/index.php" class="botonVolver" name="volver" id="volver">Volver a la web</a>
        </div>
    </div>
</body>
</html>