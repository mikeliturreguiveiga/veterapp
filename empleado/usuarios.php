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
                <table class="tabla_usuarios" <?php if(isset($_POST['id_usuario_editar']) || isset($_POST['id_usuario_borrar'])) echo 'style=display:none;' //con esto hacemos que no aparezca al usar el "editar_usuario", ya que al seleccionar el usuario se recarga y entonces se superponen los div?>>
                    <tr>
                        <th>Nombre</th>
                        <th>Apellidos</th>
                        <th>Teléfono</th>
                        <th>Correo electróinco</th>
                        <th>Dirección</th>
                    </tr>
                    <!--  Datos  -->
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
                 <!--    PAGINADO   -->
                    <div class="controles-paginacion">
                        <?php if ($pagina > 1): ?>
                            <a href="?p=<?php echo $pagina - 1; ?>" class="boton_pagina"> &laquo; Anterior </a>
                        <?php endif; ?>

                        <span class="info-pag">Página <?php echo $pagina; ?></span>

                        <?php if (count($array_datos_usuarios) == $resultados_por_pagina): ?>
                            <a href="?p=<?php echo $pagina + 1; ?>" class="boton_pagina"> Siguiente &raquo; </a>
                        <?php endif; ?>
                    </div>
                    <!--    PAGINADO   -->

                <div class="formulario_nuevo_usuario">
                    <form action="" method="post">
                        <h3>DATOS NUEVO USUARIO</h3>
                        <input type="text" name="nombre_nuevo_usuario" id="nombre_nuevo_usuario" placeholder="Nombre" required>
                        <input type="text" name="apellido_nuevo_usuario" id="apellido_nuevo_usuario" placeholder="apellido" required>
                        <input type="tel" name="telefono_nuevo_usuario" id="telefono_nuevo_usuario" placeholder="telefono +34600000000" required>
                        <input type="mail" name="mail_nuevo_usuario" id="mail_nuevo_usuario" placeholder="mail@correo.com" required>
                        <input type="text" name="direccion_nuevo_usuario" id="direccion_nuevo_usuario" placeholder="C/ejemplo 5" required>
                        <input type="text" name="usuario_nuevo_usuario" id="usuario_nuevo_usuario" placeholder="Usuario (Para login)" required>
                        <input type="text" name="contraseña_nuevo_usuario" id="contraseña_nuevo_usuario" placeholder="Generar contraseña" required>
                        <input type="submit" value="Añadir" name="boton_añadir_nuevo_usuario" id="boton_añadir_nuevo_usuario" required>
                    </form>
                </div>

                <div class="formulario_editar_usuario"  <?php if(isset($_POST['id_usuario_editar'])) echo 'style=display:block;' //con esto hacemos que no aparezca al usar el "editar_usuario", ya que al seleccionar el usuario se recarga y entonces se superponen los div?>>
                    <form action="" method="post">
                        <h3>EDITAR USUARIO</h3>
                        <select name="id_usuario_editar" onchange="this.form.submit()">
                            <option value="">-- Selecciona el usuario (ID - Nombre Apellidos) --</option>
                            <?php foreach ($array_datos_usuarios as $usuario): ?>
                                <option value="<?php echo $usuario['id_usuario']; ?>"
                                    <?php if (isset($_POST['id_usuario_editar']) && $_POST['id_usuario_editar'] == $usuario['id_usuario']) echo 'selected'; ?>>

                                    <?php echo "ID: " . $usuario['id_usuario'] . " - " . $usuario['nombre'] . " " . $usuario['apellidos']; ?>

                                </option>
                            <?php endforeach; ?>
                        </select>
                        <input type="text" name="nombre_editar_usuario" id="nombre_editar_usuario" placeholder="Nombre">
                        <input type="text" name="apellido_editar_usuario" id="apellido_editar_usuario" placeholder="apellido">
                        <input type="tel" name="telefono_editar_usuario" id="telefono_editar_usuario" placeholder="600000000">
                        <input type="mail" name="mail_editar_usuario" id="mail_editar_usuario" placeholder="mail@correo.com">
                        <input type="text" name="direccion_editar_usuario" id="direccion_editar_usuario" placeholder="C/ejemplo 5">
                        <input type="submit" value="Confirmar cambios" name="boton_editar_usuario" id="boton_editar_usuario">
                    </form>
                </div>

                <div class="formulario_borrar_usuario" <?php if(isset($_POST['id_usuario_borrar'])) echo 'style=display:block;' //con esto hacemos que no aparezca al usar el "editar_usuario", ya que al seleccionar el usuario se recarga y entonces se superponen los div?>>
                    <form action="" method="post">
                        <h3>BORRAR USUARIO</h3>
                        <select name="id_usuario_borrar" onchange="this.form.submit()">
                            <option value="">-- Selecciona el usuario (ID - Nombre Apellidos) --</option>
                            <?php foreach ($array_datos_usuarios as $usuario): ?>
                                <option value="<?php echo $usuario['id_usuario']; ?>"
                                    <?php if (isset($_POST['id_usuario_borrar']) && $_POST['id_usuario_borrar'] == $usuario['id_usuario']) echo 'selected'; ?>>

                                    <?php echo "ID: " . $usuario['id_usuario'] . " - " . $usuario['nombre'] . " " . $usuario['apellidos']; ?>

                                </option>
                            <?php endforeach; ?>
                        </select>
                        <input type="submit" value="Eliminar" name="boton_eliminar_usuario" id="boton_eliminar_usuario">
                    </form>
                </div>
            </div>

            <div class="contenedor_formulario">
                <input type="button" value="Ver usuarios" name="ver_usuario" id="ver_usuario" class="ver_usuario">
                <input type="button" value="Eliminar usuario" name="eliminar_usuario" id="eliminar_usuario" class="eliminar_usuario">
                <input type="button" value="Editar usuario" name="editar_usuario" id="editar_usuario" class="editar_usuario">
                <input type="button" value="Añadir usuario" name="añadir_usuario" id="añadir_usuario" class="añadir_usuario">
                <form action="" method="post">
                    <input type="submit" value="Exportar en PDF" name="exportar_PDF" id="exportar_PDF" class="exportar_PDF">
                </form>
            </div>

        </div>
    </div>
    <script src="../assets/js/usuarios.js"></script>
    <?php include("../includes/footerUsuario.php") ?>
</body>

</html>