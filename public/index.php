<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clínica veterinaria Torrevieja</title>
    <link rel="stylesheet" href="../assets/css/main.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>

<body>
    <?php include '../includes/headerUsuario.php'; ?>

    <div class="presentacion">
        <h1>SERVICIOS VETERINARIOS EN TORREVIEJA</h1>
        <p>En Clínica Veterinaria Torrevieja ofrecemos todo tipo de servicios
            veterinarios para su mascota, ya que creemos en la importancia de ofrecer una atención
            integral que garantice el mejor tratamiento para los animales. Nuestro personal cualificado
            y de amplia trayectoria está a su disposición para el mejor cuidado de sus pequeños
            compañeros.
        </p>
    </div>

    <!-- Desde aqui "tarjetas -->

    <div class="divTarjetas">
        <div class="seccionServiciosUsuario tarjeta">
            <div class="cabeceraSeccion">
                <img src="../assets/img/icono_servicios_veterinarios.svg" alt="iconoServiciosVeterinarios" class="iconoServiciosVeterinarios">
                <h2>SERVICIOS VETERINARIOS</h2>
            </div>
            <div class="serviciosUsuario">
                <div>
                    <h3>Medicina interna</h3>
                    <h3>Cirujía y anestesia</h3>
                </div>
                <div>
                    <h3>laboratorio</h3>
                    <h3>Hospitalización</h3>
                </div>
                <div>
                    <h3>Odonotología</h3>
                    <h3>radiología</h3>
                </div>
                <div>
                    <h3>Ecografía</h3>
                    <h3>Endoscopia</h3>
                </div>
                <div>
                    <h3>servicios de residencia</h3>
                </div>
            </div>
        </div>
        <div class="contactoYTienda">
            <div class="estamosEn tarjeta">
                <div class="cabeceraSeccion">
                    <img src="../assets/img/contacto.svg" alt="">
                    <h2>CONTACTO</h2>
                </div>
                <div class="contacto">
                    <h5>Estamos en:</h5>
                    <div class="mapa">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d724.0165686966081!2d-0.6828663722192383!3d37.977606558586736!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e1!3m2!1seu!2ses!4v1761506531103!5m2!1seu!2ses"
                            width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
                <div class="telefonoDireccion">
                    <h5>Telefono y dirección:</h5>
                    <h5>Calle falsa 123</h5>
                    <h5>965764526</h5>
                </div>
            </div>
            <div class="seccionTienda tarjeta">
                <div class="cabeceraSeccion">
                    <img src="../assets/img/tienda.svg" alt="tienda">
                    <h2>TIENDA</h2>
                </div>
                <div class="tienda">
                    <div>
                        <h5>Alimentación aves</h5>
                        <h5>Alimentaciónón hurones</h5>
                    </div>
                    <div>
                        <h5>Alimentación perros</h5>
                        <h5>Alimentación conejos</h5>
                    </div>
                    <div>
                        <h5>Alimentación reptiles</h5>
                    </div>
                </div>
            </div>
        </div>
        <div class="adopta tarjeta">
            <div class="cabeceraSeccion">
                <img src="../assets/img/adopta.svg" alt="adopta">
                <h2>ADOPTA</h2>
            </div>
            <div class="slideshow-container">  <!-- slideshow -->
                <img src="../assets/img/animalesSlideShow/gato1.jpg" alt="gato" class="imagen">
                <img src="../assets/img/animalesSlideShow/gato2.jpg" alt="gato" class="imagen">
                <img src="../assets/img/animalesSlideShow/gato3.jpg" alt="gato" class="imagen">
                <img src="../assets/img/animalesSlideShow/perro1.jpg" alt="perro" class="imagen">
                <img src="../assets/img/animalesSlideShow/perro2.jpg" alt="perro" class="imagen">
                <img src="../assets/img/animalesSlideShow/perro3.jpg" alt="perro" class="imagen">
                <img src="../assets/img/animalesSlideShow/perro4.jpg" alt="perro" class="imagen">
                <img src="../assets/img/animalesSlideShow/perro5.jpg" alt="perro" class="imagen">
                <img src="../assets/img/animalesSlideShow/perro6.jpg" alt="perro" class="imagen">
                <img src="../assets/img/animalesSlideShow/perro7.jpg" alt="perro" class="imagen">
                <img src="../assets/img/animalesSlideShow/perro8.jpg" alt="perro" class="imagen">
            </div>
        </div>
    </div>

    <!-- includes y script -->
     <script src="../assets/js/main.js"></script>
    <?php include '../includes/footerUsuario.php'; ?>
</body>

</html>