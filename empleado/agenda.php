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
        <h2>AGENDA</h2>
        <div class="contenedorFormulario">
            <form class="tarjeta formulario_busqueda" action="" method="post">
                <label for="">Busqueda por campos:</label>
                <input type="text" name="nombre_usuario" id="nombre_usuario" placeholder="Nombre de cliente">
                <input type="text" name="nombre_msacota" id="nombre_mascota" placeholder="Nombre de mascota">
                <input type="date" name="fecha" id="fecha">
                <input type="submit" value="Buscar" name="buscar" id="buscar">
            </form>
        </div>
        <div class="contenedorPanel">
            <div class="tarjeta panel_informacion">
                <table class="info_hoy">
                    <tr>
                        <th>Fecha</th>
                        <th>Hora</th>
                        <th>Nombre de cliente</th>
                        <th>Nombre de mascota</th>
                        <th>Motivo de consulta</th>
                        <th>Especie</th>
                    </tr>
                    <!--  Datos PHP citas hoy  -->
                    <?php foreach ($agendaCitasHoy as $cita): ?>
                        <tr>
                            <td><?php echo $cita['fecha']  ?></td>
                            <td><?php echo $cita['hora']  ?></td>
                            <td><?php echo $cita['nombre_usuario']  ?></td>
                            <td><?php echo $cita['nombre_mascota']  ?></td>
                            <td><?php echo $cita['lesion']  ?></td>
                            <td><?php echo $cita['especie']  ?></td>
                        </tr>
                    <?php endforeach; ?>
                   
                </table>
                <table class="info_pasada">
                    <tr>
                        <th>Fecha</th>
                        <th>Hora</th>
                        <th>Nombre de cliente</th>
                        <th>Nombre de mascota</th>
                        <th>Motivo de consulta</th>
                        <th>Especie</th>
                    </tr>
                    <!--  Datos PHP citas pasadas  -->
                    <?php foreach ($agendaCitasPasadas as $cita):  ?>
                        <tr>
                            <td><?php echo $cita['fecha']  ?></td>
                            <td><?php echo $cita['hora']  ?></td>
                            <td><?php echo $cita['nombre_usuario']  ?></td>
                            <td><?php echo $cita['nombre_mascota']  ?></td>
                            <td><?php echo $cita['lesion']  ?></td>
                            <td><?php echo $cita['especie']  ?></td>
                        </tr>
                    <?php endforeach; ?>
                  
                </table>
                <table class="info_proximas">
                    <tr>
                        <th>Fecha</th>
                        <th>Hora</th>
                        <th>Nombre de cliente</th>
                        <th>Nombre de mascota</th>
                        <th>Motivo de consulta</th>
                        <th>Especie</th>
                    </tr>
                    <!--  Datos PHP citas proximas  -->
                    <?php foreach ($agendaCitasProximas as $cita):  ?>
                        <tr>
                            <td><?php echo $cita['fecha']  ?></td>
                            <td><?php echo $cita['hora']  ?></td>
                            <td><?php echo $cita['nombre_usuario']  ?></td>
                            <td><?php echo $cita['nombre_mascota']  ?></td>
                            <td><?php echo $cita['lesion']  ?></td>
                            <td><?php echo $cita['especie']  ?></td>
                        </tr>
                    <?php endforeach; ?>
                
                </table>
                <div class="formulario_nueva_cita">
                    <form action="" method="post">
                        <h3>DATOS NUEVA CITA</h3>
                        <select name="id_usuario" id="select_cliente">
                            <option value="">Selecciona cliente:</option>
                            <?php foreach ($clientes as $c): ?>
                                <option value="<?= $c['id_usuario'] ?>"><?= $c['nombre'] . " " . $c['apellidos'] ?></option>
                            <?php endforeach; ?>
                        </select>
                        <select name="id_mascota" id="select_mascota" disabled>
                            <?php foreach ($mascota as $m): ?>
                                <option value=""><?= $m['nombre'] . " " ?></option>
                            <?php endforeach; ?>
                        </select>
                        <label for="">Selecciona la fecha:</label>
                        <input type="date" name="fecha_añadir" id="fecha_añadir">
                        <label for="">Introduce la hora:</label>
                        <input type="time" name="hora_añadir" id="hora_añadir">
                        <input type="text" name="lesion" id="lesion" placeholder="Describe la dolencia:">
                        <input type="submit" value="añadir" name="añadir" id="añadir">
                    </form>
                </div>
                <!-- codigo paginacion        No funciona bien-->
                <!--
                <div class="controles-paginacion">
                    <?php //if ($pagina_actual > 1): 
                    ?>
                        <a href="?p=<?php //echo $pagina_actual - 1; 
                                    ?>" class="boton_pagina"> &laquo; Anterior </a>
                    <?php //endif; 
                    ?>

                    <span class="info-pag">Página <?php //echo $pagina_actual; 
                                                    ?></span>

                    <?php //if (count($agendaCitasPasadas) == $resultados_por_pagina): 
                    ?>
                        <a href="?p=<?php //echo $pagina_actual + 1; 
                                    ?>" class="boton_pagina"> Siguiente &raquo; </a>
                    <?php //endif; 
                    ?>
                </div>
                    -->
                <div class="formulario_panel">
                    <!-- <label for="">¿Que ver?</label> -->
                    <button class="anteriores" type="submit" value="Ver citas anteriores" name="anteriores" id="anteriores">Ver citas anteriores</button>
                    <button class="hoy" value="Ver citas de hoy" name="hoy" id="hoy">Ver citas de hoy</button>
                    <button class="proximas" value="Ver proximas citas" name="proximas" id="proximas">Ver próximas citas</button>
                    <button class="boton_añadir_cita" type="submit" name="boton_añadir_cita" id="boton_añadir_cita">Añadir nueva cita</button>
                </div>
            </div>
        </div>
    </div>
    <script src="../assets/js/agenda.js"></script>
    <?php include("../includes/footerUsuario.php") ?>
</body>

</html>