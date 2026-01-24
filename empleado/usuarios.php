<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuarios</title>
    <link rel="stylesheet" href="../assets/css/usuarios.css">
</head>

<body>
    <?php
    session_start();
    include("../includes/headerEmpleado.php");
    include("../includes/conexion.php");
    include("../includes/usuarios.php");
    ?>

    <!-- HTML -->

    <div class="contenedorGeneral">
        <h2>USUARIOS</h2>
        <div class="contenedorPanel">
            <div class="tarjeta panel_informacion">
                <table class="tabla_usuarios">
                    <tr>
                        <th>Nombre</th>
                        <th>Apellidos</th>
                        <th>Teléfono</th>
                        <th>Correo electróinco</th>
                        <th>Dirección</th>
                    </tr>
                    <!--  Datos PHP citas hoy  -->
                    <?php foreach ($array_datos_usuarios as $dato): 
                    ?>
                    <tr>
                        <td><?php echo $dato['nombre']  ?></td>
                        <td><?php echo $dato['apellidos']  ?></td>
                        <td><?php echo $dato['telefono']  ?></td>
                        <td><?php echo $dato['correo_electronico']  ?></td>
                        <td><?php echo $dato['direccion']  ?></td>
                    </tr>
                    <?php endforeach; ?>
                </table>

                <div class="formulario_nuevo_usuario">
                    <form action="" method="post">
                        <h3>DATOS NUEVO USUARIO</h3>
                        <input type="text" name="nombre_nuevo_usuario" id="nombre_nuevo_usuario" placeholder="Nombre">
                        <input type="text" name="apellido_nuevo_usuario" id="apellido_nuevo_usuario" placeholder="apellido">
                        <input type="tel" name="telefono_nuevo_usuario" id="telefono_nuevo_usuario" placeholder="600000000">
                        <input type="mail" name="mail_nuevo_usuario" id="mail_nuevo_usuario" placeholder="mail@correo.com">
                        <input type="text" name="direccion_nuevo_usuario" id="direccion_nuevo_usuario" placeholder="C/ejemplo 5">
                        <input type="submit" value="añadir" name="añadir" id="añadir">
                    </form>
                </div>

                <div class="formulario_editar_usuario">
                    <form action="" method="post">
                        <h3>EDITAR USUARIO</h3>
                        <input type="text" name="nombre_nuevo_usuario" id="nombre_nuevo_usuario" placeholder="Nombre">
                        <input type="text" name="apellido_nuevo_usuario" id="apellido_nuevo_usuario" placeholder="apellido">
                        <input type="tel" name="telefono_nuevo_usuario" id="telefono_nuevo_usuario" placeholder="600000000">
                        <input type="mail" name="mail_nuevo_usuario" id="mail_nuevo_usuario" placeholder="mail@correo.com">
                        <input type="text" name="direccion_nuevo_usuario" id="direccion_nuevo_usuario" placeholder="C/ejemplo 5">
                        <input type="submit" value="añadir" name="añadir" id="añadir">
                    </form>
                </div>

                <div class="formulario_borrar_usuario">
                    <form action="" method="post">
                        <h3>BORRAR USUARIO</h3>
                        <input type="text" name="nombre_nuevo_usuario" id="nombre_nuevo_usuario" placeholder="Nombre">
                        <input type="text" name="apellido_nuevo_usuario" id="apellido_nuevo_usuario" placeholder="apellido">
                        <input type="tel" name="telefono_nuevo_usuario" id="telefono_nuevo_usuario" placeholder="600000000">
                        <input type="mail" name="mail_nuevo_usuario" id="mail_nuevo_usuario" placeholder="mail@correo.com">
                        <input type="text" name="direccion_nuevo_usuario" id="direccion_nuevo_usuario" placeholder="C/ejemplo 5">
                        <input type="submit" value="añadir" name="añadir" id="añadir">
                    </form>
                </div>
            </div>
            
            <div class="contenedor_formulario">
                <form class="formulario_botones" action="" method="post">
                    <input type="submit" value="Ver usuarios" name="ver_usuario" id="ver_usuario">
                    <input type="submit" value="Eliminar usuario" name="eliminar_usuario" id="eliminar_usuario">
                    <input type="submit" value="Editar usuario" name="editar_usuario" id="editar_usuario">
                    <input type="submit" value="Añadir usuario" name="añadir_usuario" id="añadir_usuario">
                </form>
            </div>
            
        </div>
    </div>
    <script src="../assets/js/agenda.js"></script>
    <?php include("../includes/footerUsuario.php") ?>
</body>

</html>