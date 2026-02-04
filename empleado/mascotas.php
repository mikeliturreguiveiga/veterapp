<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuarios</title>
    <link rel="stylesheet" href="../assets/css/mascotas.css">
</head>

<body>
    <?php
    session_start();
    include("../includes/headerEmpleado.php");
    include("../includes/conexion.php");
    include("../includes/mascotas.php");
    ?>

    <!-- HTML -->

    <div class="contenedorGeneral">
        <h2>MASCOTAS</h2>
        <div class="contenedorPanel">
            <div class="tarjeta panel_informacion">
                <table class="tabla_mascotas" <?php if(isset($_POST['id_mascota_editar']) || isset($_POST['id_mascota_borrar'])) echo 'style=display:none;' //con esto hacemos que no aparezca al usar el "editar_usuario", ya que al seleccionar el usuario se recarga y entonces se superponen los div?>>
                    <tr>
                        <th>Nombre</th>
                        <th>Especie</th>
                        <th>Raza</th>
                        <th>Sexo</th>
                        <th>Fecha nacimiento</th>
                        <th>Características físicas</th>
                        <th>Peso</th>
                        <th>Dieta</th>
                        <th>Estirilizado</th>
                        <th>Vacunas</th>
                        <th>Exámenes</th>
                        <th>Tratamientos</th>
                    </tr>
                    <!--  Datos  -->
                    <?php foreach ($array_datos_mascotas as $dato):
                    ?>
                        <tr>
                            <td><?php echo $dato['nombre']  ?></td>
                            <td><?php echo $dato['especie']  ?></td>
                            <td><?php echo $dato['raza']  ?></td>
                            <td><?php echo $dato['sexo']  ?></td>
                            <td><?php echo $dato['fecha_nacimiento']  ?></td>
                            <td><?php echo $dato['caracteristicas_fisicas'] ?></td>
                            <td><?php echo $dato['peso'] ?></td>
                            <td><?php echo $dato['dieta']  ?></td>
                            <td><?php echo $dato['esterilizado']  ?></td>
                            <td><?php echo $dato['vacunas']  ?></td>
                            <td><?php echo $dato['examenes']  ?></td>
                            <td><?php echo $dato['tratamientos']  ?></td>
                        </tr>
                    <?php endforeach; ?>
                </table>

                <div class="formulario_nueva_mascota">
                    <form action="" method="post">
                        <h3>DATOS NUEVA MASCOTA</h3>
                        <input type="text" name="nombre_nueva_mascota" id="nombre_nueva_mascota" placeholder="Nombre">
                        <input type="text" name="especie_nueva_mascota" id="especie_nueva_mascota" placeholder="Especie">
                        <input type="tel" name="raza_nueva_mascota" id="raza_nueva_mascota" placeholder="Raza">
                        <input type="mail" name="fecha_acimiento_nueva_mascota" id="fecha_acimiento_nueva_mascota" placeholder="Fecha nacimiento">
                        <input type="text" name="caracteristicas_fisicas_nueva_mascota" id="caracteristicas_fisicas_nueva_mascota" placeholder="Características físicas">
                        <input type="text" name="peso_nueva_mascota" id="peso_nueva_mascota" placeholder="peso">
                        <input type="text" name="dieta_nueva_mascota" id="dieta_nueva_mascota" placeholder="dieta">
                        <input type="text" name="esterilizado_nueva_mascota" id="esterilizado_nueva_mascota" placeholder="Esterilizado">
                        <input type="text" name="vacunas_nueva_mascota" id="vacunas_nueva_mascota" placeholder="vacunas">
                        <input type="text" name="examenes_nueva_mascota" id="examenes_nueva_mascota" placeholder="Examenes">
                        <input type="text" name="tratamientos_nueva_mascota" id="tratamientos_nueva_mascota" placeholder="tratamientos">
                        <input type="submit" value="Añadir" name="boton_añadir_nueva_mascota" id="boton_añadir_nueva_mascota">
                    </form>
                </div>

                <div class="formulario_editar_mascota"  <?php if(isset($_POST['id_mascota_editar'])) echo 'style=display:block;' //con esto hacemos que no aparezca al usar el "editar_usuario", ya que al seleccionar el usuario se recarga y entonces se superponen los div?>>
                    <form action="" method="post">
                        <h3>EDITAR MASCOTA</h3>
                        <select name="id_mascota_editar" onchange="this.form.submit()">
                            <option value="">-- Selecciona la mascota (ID - Nombre Raza) --</option>
                            <?php foreach ($array_datos_mascota as $mascota): ?>
                                <option value="<?php echo $mascota['id_mascota']; ?>"
                                    <?php if (isset($_POST['id_mascota_editar']) && $_POST['id_msacota_editar'] == $mascota['id_mascota']) echo 'selected'; ?>>

                                    <?php echo "ID: " . $mascota['id_mascota'] . " - " . $mascota['nombre'] . " " . $mascota['raza']; ?>

                                </option>
                            <?php endforeach; ?>
                        </select>
                        <input type="text" name="nombre_editar_mascota" id="nombre_editar_mascota" placeholder="Nombre">
                        <input type="text" name="especie_editar_mascota" id="especie_editar_mascota" placeholder="Especie">
                        <input type="text" name="raza_editar_mascota" id="raza_editar_mascota" placeholder="Raza">
                        <input type="date" name="fecha_acimiento_editar_mascota" id="fecha_acimiento_editar_mascota" placeholder="Fecha nacimiento">
                        <input type="text" name="caracteristicas_fisicas_editar_mascota" id="caracteristicas_fisicas_editar_mascota" placeholder="Características físicas">
                        <input type="text" name="peso_editar_mascota" id="peso_editar_mascota" placeholder="peso">
                        <input type="text" name="dieta_editar_mascota" id="dieta_editar_mascota" placeholder="dieta">
                        <input type="text" name="esterilizado_editar_mascota" id="esterilizado_editar_mascota" placeholder="Esterilizado">
                        <input type="text" name="vacunas_editar_mascota" id="vacunas_editar_mascota" placeholder="vacunas">
                        <input type="text" name="examenes_editar_mascota" id="examenes_editar_mascota" placeholder="Examenes">
                        <input type="text" name="tratamientos_editar_mascota" id="tratamientos_editar_mascota" placeholder="tratamientos">
                        <input type="submit" value="Confirmar cambios" name="boton_editar_mascota" id="boton_editar_mascota">
                    </form>
                </div>

                <div class="formulario_borrar_mascota" <?php if(isset($_POST['id_mascota_borrar'])) echo 'style=display:block;' //con esto hacemos que no aparezca al usar el "editar_usuario", ya que al seleccionar el usuario se recarga y entonces se superponen los div?>>
                    <form action="" method="post">
                        <h3>BORRAR MASCOTA</h3>
                        <select name="id_mascota_borrar" onchange="this.form.submit()">
                            <option value="">-- Selecciona la mascota (ID - Nombre Raza) --</option>
                            <?php foreach ($array_datos_mascota as $mascota): ?>
                                <option value="<?php echo $mascota['id_mascota']; ?>"
                                    <?php if (isset($_POST['id_mascota_borrar']) && $_POST['id_mascota_borrar'] == $mascota['id_mascota']) echo 'selected'; ?>>

                                    <?php echo "ID: " . $mascota['id_mascota'] . " - " . $mascota['nombre'] . " " . $mascota['raza']; ?>

                            </option>
                            <?php endforeach; ?>
                        </select>
                        <input type="submit" value="Eliminar" name="boton_eliminar_mascota" id="boton_eliminar_mascota">
                    </form>
                </div>
            </div>

            <div class="contenedor_formulario">
                <input type="button" value="Ver mascotas" name="ver_mascota" id="ver_mascota" class="ver_mascota">
                <input type="button" value="Eliminar mascotas" name="eliminar_mascota" id="eliminar_mascota" class="eliminar_mascota">
                <input type="button" value="Editar mascotas" name="editar_mascota" id="editar_mascota" class="editar_mascota">
                <input type="button" value="Añadir mascotas" name="añadir_mascota" id="añadir_mascota" class="añadir_mascota">
        </div>
    </div>
    <script src="../assets/js/mascotas.js"></script>
    <?php include("../includes/footerUsuario.php") ?>
</body>

</html>