<?php
    //------------------------------------CODIGO PAGINADO DE TABLAS----------------------------------------
    session_start();
    $id_empleado = $_SESSION['id'];
    
    $resultados_por_pagina = 5; //Defino el numero máximo de filas en la tabla

        //Capturo la pagina actual de la URL
        $pagina_pasadas = isset($_GET['pp']) ? (int)$_GET['pp'] : 1;
        $pagina_hoy = isset($_GET['ph']) ? (int)$_GET['ph'] : 1;
        $pagina_proximas = isset($_GET['pr']) ? (int)$_GET['pr'] : 1;

        //Calculamos el punto de inicio para el SQL
        $inicio_pasadas = ($pagina_pasadas - 1) * $resultados_por_pagina;
        $inicio_hoy = ($pagina_hoy - 1) * $resultados_por_pagina;
        $inicio_proximas = ($pagina_proximas - 1) * $resultados_por_pagina;




    //---------------------------CODIGO PARA LA PREVISUALIZACION DE LA AGENDA------------------------------
        $fechaActual = date("Y-m-d");
        $consulta = "SELECT
                    C.fecha,
                    C.hora,
                    U.nombre AS nombre_usuario,
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
        $consultaPasadas = $consulta . " WHERE C.id_empleado = $id_empleado AND C.fecha < '$fechaActual' ORDER BY C.fecha, C.hora DESC LIMIT $resultados_por_pagina OFFSET $inicio_pasadas";

        $resultadoConsultaPasadas = $conexion->query($consultaPasadas);

        //Pasamo los datos a un array por filas
        $agendaCitasPasadas = array();
        while ($fila = $resultadoConsultaPasadas->fetch_assoc()) {
            $agendaCitasPasadas[] = $fila;
        }

        //PARA LAS DE HOY
        $consultaHoy = $consulta . " WHERE C.id_empleado = $id_empleado AND C.fecha = '$fechaActual' ORDER BY C.fecha, C.hora DESC LIMIT $resultados_por_pagina OFFSET $inicio_hoy";

        $resultadoConsultaHoy = $conexion->query($consultaHoy);

        //Pasamo los datos a un array por filas
        $agendaCitasHoy = array();
        while ($fila = $resultadoConsultaHoy->fetch_assoc()) {
            $agendaCitasHoy[] = $fila;
        }

        //PARA LAS PASADAS
        $consultaProximas = $consulta . " WHERE C.id_empleado = $id_empleado AND C.fecha > '$fechaActual' ORDER BY C.fecha, C.hora DESC LIMIT $resultados_por_pagina OFFSET $inicio_proximas";

        $resultadoConsultaProximas = $conexion->query($consultaProximas);

        //Pasamo los datos a un array por filas
        $agendaCitasProximas = array();
        while ($fila = $resultadoConsultaProximas->fetch_assoc()) {
            $agendaCitasProximas[] = $fila;
        }


    //---------------------------CODIGO PARA LA PREVISUALIZACION DE CLIENTES------------------------------
        $consultaUsuariosHoy = "SELECT
                C.fecha,
                U.nombre AS nombre_usuario,
                U.apellidos AS apellido_usuario,
                U.telefono AS telefono_usuario
                FROM
                 citas C
                --  Uno Citas con Usuarios
                INNER JOIN 
                usuarios U ON C.id_usuario = U.id_usuario 
                WHERE C.id_empleado = $id_empleado AND C.fecha = '$fechaActual' ORDER BY C.fecha, C.hora DESC LIMIT 10";

        //PARA FILTRAR SOLO LAS DE HOY

        $resultadoConsultaUsuariosHoy = $conexion->query($consultaUsuariosHoy);

        //Pasamo los datos a un array por filas
        $agenda_citas_usuarios_hoy = array();
        while ($fila = $resultadoConsultaUsuariosHoy->fetch_assoc()) {
            $agenda_citas_usuarios_hoy[] = $fila;
        }


    //---------------------------CODIGO PARA LA PREVISUALIZACION DE MASCOTAS------------------------------

        $consultaMascotasHoy = "SELECT
                C.fecha,
                U.nombre AS nombre_usuario,
                M.nombre AS nombre_mascota,
                M.especie AS especie,
                M.raza AS raza,
                M.fecha_nacimiento AS fecha_nacimiento,
                C.lesion AS lesion
                FROM
                 citas C
                --  Uno Citas con usuarios para unir el id y ver que mascota es de cada usuario
                INNER JOIN 
                usuarios U ON C.id_usuario = U.id_usuario 
                INNER JOIN 
                mascotas M ON C.id_mascota = M.id_mascota
                WHERE C.id_empleado = $id_empleado AND C.fecha = '$fechaActual' ORDER BY C.fecha, C.hora DESC LIMIT 10";

        //PARA FILTRAR SOLO LAS DE HOY

        $resultadoConsultaMascotasHoy = $conexion->query($consultaMascotasHoy);

        //Pasamo los datos a un array por filas
        $agenda_citas_mascotas_hoy = array();
        while ($fila = $resultadoConsultaMascotasHoy->fetch_assoc()) {
            $agenda_citas_mascotas_hoy[] = $fila;
        }
?>