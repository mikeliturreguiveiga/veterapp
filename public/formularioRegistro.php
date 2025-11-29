<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../assets/css/formularioRegistro.css">
</head>

<body>
    <?php include('../includes/headerUsuario.php') ?>
    <div class="contenedorRegistro">
        <div class="contenedorFormularioCompleto">
            <div class="contenedorLogoClinica">
                <a href="../public/index.php"><img src="../assets/img/logoClinica.svg" alt="logoClinica" class="logoClinica" name="logoClinica"></a>
            </div>
            <div class="contenedorFormulario">
                <form action="" method="post">
                    <input type="text" name="nombre" id="nombre" placeholder="Nombre">
                    <input type="text" name="apellidos" id="apellidos" placeholder="Apellidos">
                    <input type="text" name="telefono" id="telefono" placeholder="Teléfono">
                    <input type="email" name="mail" id="mail" placeholder="Correo electrónico">
                    <input type="text" name="direccion" id="direccion" placeholder="Dirección">
                    <input type="password" name="contraseña" id="contraseña" placeholder="Contraseña">
                    <div class="botonRegistarme">
                       <input type="submit" value="Registrarme" name="registrarme" id="registrarme" class="botonRegistrarme"> 
                    </div>
                </form>
            </div>
        </div>

    </div>
    <?php include('../includes/footerUsuario.php') ?>

</body>

</html>