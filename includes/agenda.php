<?php
//-----------------------------------------CODIGO PAGINADO---------------------------------------
    $resultados_por_pagina = 6;

//capturamos la página actual
    $pagina_actual = isset($_GET['p']) ? (int)$_GET['p'] : 1;
    if ($pagina_actual < 1) {
        $pagina_actual = 1;
    }

//calculamos el punto inicio para el SQL
    $inicio = ($pagina_actual - 1) * $resultados_por_pagina;


//---------------------------CODIGO PARA LA PREVISUALIZACION DE LA AGENDA------------------------------
    $fechaActual = date("Y-m-d");
    $consulta = "SELECT
                        C.fecha,
                        C.hora,
                        U.nombre AS nombre_usuario,
                        C.lesion AS lesion,
                        M.especie AS especie,
                        M.nombre AS nombre_mascota
                        FROM
                        citas C
                        --  Uno Citas con Usuarios
                        INNER JOIN 
                        usuarios U ON C.id_usuario = U.id_usuario
                        --  Uno Citas con Mascotas
                        INNER JOIN
                        mascotas M ON C.id_mascota = M.id_mascota ";


//Separamos en diferentes arrays los datos de citas por fechas

//PARA LAS PASADAS
    $consultaPasadas = $consulta . " WHERE C.fecha < '$fechaActual' ORDER BY C.fecha, C.hora DESC LIMIT $resultados_por_pagina OFFSET $inicio";

    $resultadoConsultaPasadas = $conexion->query($consultaPasadas);

//Pasamo los datos a un array por filas
    $agendaCitasPasadas = array();
    while ($fila = $resultadoConsultaPasadas->fetch_assoc()) {
        $agendaCitasPasadas[] = $fila;
    }

//PARA LAS DE HOY
    $consultaHoy = $consulta . " WHERE C.fecha = '$fechaActual' ORDER BY C.fecha, C.hora DESC LIMIT $resultados_por_pagina OFFSET $inicio";

    $resultadoConsultaHoy = $conexion->query($consultaHoy);

//Pasamo los datos a un array por filas
    $agendaCitasHoy = array();
    while ($fila = $resultadoConsultaHoy->fetch_assoc()) {
       $agendaCitasHoy[] = $fila;
    }

//PARA LAS PRÓXIMAS
    $consultaProximas = $consulta . " WHERE C.fecha > '$fechaActual' ORDER BY C.fecha, C.hora DESC LIMIT $resultados_por_pagina OFFSET $inicio";

    $resultadoConsultaProximas = $conexion->query($consultaProximas);

//Pasamo los datos a un array por filas
    $agendaCitasProximas = array();
    while ($fila = $resultadoConsultaProximas->fetch_assoc()) {
        $agendaCitasProximas[] = $fila;
    }

//---------------------------CODIGO PARA LA EL AÑADIR NUEVA CITA------------------------
// Consulta para el desplegable de clientes
    $consultaClientes = "SELECT id_usuario, nombre, apellidos FROM usuarios ORDER BY nombre ASC";
    $resClientes = $conexion->query($consultaClientes);
    $clientes = $resClientes->fetch_all(MYSQLI_ASSOC);

    
//---------------------------CODIGO PARA AÑADIR LA NUEVA CITA YA DENTRO DEL FORMULARIO. ----------------------------
    if (isset($_POST['añadir'])) {
        $id_usuario = $_POST['id_usuario'];
        $id_mascota = $_POST['id_mascota'];
        $fecha = $_POST['fecha_añadir'];
        $hora = $_POST['hora_añadir'];
        $lesion = $_POST['lesion'];

        //CONSULTA DE COMPROBACION SI YA EXISTE UNA CITA A ESA HORA
        $consulta_comprobacion_cita = "SELECT *
                                        FROM citas
                                        WHERE fecha = '$fecha'
                                        AND hora = '$hora';
                                        ";

        $resultado_comprobacion_cita = $conexion->query($consulta_comprobacion_cita);

        while ($fila = $resultado_comprobacion_cita->fetch_assoc()) {
            $resultado_cita[] = $fila;
        }


        if ($resultado_comprobacion_cita->num_rows > 0) { //si existe hacemos lo siguiente
            echo "<script>alert('Error: Ya hay una cita a esa hora.'); window.history.back();</script>";
        }else{ //Si no existe hacemos esto
            $consulta_insertar_nueva_cita = "INSERT INTO citas (id_usuario, id_mascota, lesion, fecha, hora) 
                                            VALUES ($id_usuario, $id_mascota, '$lesion', '$fecha', '$hora')";

            $añadimos_cita = $conexion->query($consulta_insertar_nueva_cita);

            if ($añadimos_cita) {
                echo "<script>
                    alert('Cita añadida con éxito.');
                    window.location.href = 'agenda.php'; 
                  </script>";
            }
        }
    }







?>