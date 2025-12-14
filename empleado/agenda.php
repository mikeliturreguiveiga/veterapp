<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../assets/css/agenda.css">
</head>

<body>
    <?php
    session_start();
    include("../includes/headerEmpleado.php");
    include("../includes/conexion.php");
    include("../includes/agenda.php");
    ?>

    <!-- HTML -->

    <div class="contenedorGeneral">
        <div class="contenedorFormulario">
            <form class="tarjeta formulario" action="" method="post">
                <div class="arriba">
                    <label for="">Busqueda por campos</label>
                    <input type="text" name="nombre_usuario" id="nombre_usuario" placeholder="Nombre de cliente">
                    <input type="text" name="nombre_msacota" id="nombre_mascota" placeholder="Nombre de mascota">
                    <input type="date" name="fecha" id="fecha">
                    <input type="submit" value="Buscar" name="buscar" id="buscar">
                </div>
                <div class="abajo">
                    <label for="">¿Que ver?</label>
                    <input type="submit" value="Citas anteriores" name="anteriores" id="anteriores">
                    <input type="submit" value="Citas de hoy" name="hoy" id="hoy">
                    <input type="submit" value="Proximas citas" name="proximas" id="proximas">
                    <label for="">¿Que hacer?</label>
                    <input type="submit" value="Añadir cita" name="añadir" id="añadir">
                </div>
            </form>
        </div>
        <div class="contenedorPanel">
            <div class="tarjeta panel_informacion">
                <table>
                    <tr>
                        <th>Fecha</th>
                        <th>Hora</th>
                        <th>Nombre de cliente</th>
                        <th>Nombre de mascota</th>
                        <th>Motivo de consulta</th>
                        <th>Especie</th>
                    </tr>
                    <!--  Se introducne datos con PHP  -->
                    <?php //foreach datos  
                    ?>
                    <tr>
                        <td><?php //foreach echo datos  
                            ?></td>
                        <td><?php //foreach echo datos  
                            ?></td>
                        <td><?php //foreach echo datos  
                            ?></td>
                        <td><?php //foreach echo datos  
                            ?></td>
                        <td><?php //foreach echo datos  
                            ?></td>
                        <td><?php //foreach echo datos  
                            ?></td>
                    </tr>
                    <?php //endforeach  
                    ?>
                </table>
            </div>
        </div>
    </div>





    <?php include("../includes/footerUsuario.php") ?>
</body>

</html>