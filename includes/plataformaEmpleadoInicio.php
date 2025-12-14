<?php
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
        $consultaPasadas = $consulta . " WHERE C.fecha < '$fechaActual' ORDER BY C.fecha, C.hora DESC LIMIT 10";

        $resultadoConsultaPasadas = $conexion->query($consultaPasadas);

        //Pasamo los datos a un array por filas
        $agendaCitasPasadas = array();
        while ($fila = $resultadoConsultaPasadas->fetch_assoc()) {
            $agendaCitasPasadas[] = $fila;
        }

        //PARA LAS DE HOY
        $consultaHoy = $consulta . " WHERE C.fecha = '$fechaActual' ORDER BY C.fecha, C.hora DESC LIMIT 10";

        $resultadoConsultaHoy = $conexion->query($consultaHoy);

        //Pasamo los datos a un array por filas
        $agendaCitasHoy = array();
        while ($fila = $resultadoConsultaHoy->fetch_assoc()) {
            $agendaCitasHoy[] = $fila;
        }

        //PARA LAS PASADAS
        $consultaProximas = $consulta . " WHERE C.fecha > '$fechaActual' ORDER BY C.fecha, C.hora DESC LIMIT 10";

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
                WHERE C.fecha = '$fechaActual' ORDER BY C.fecha, C.hora DESC LIMIT 10";

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
                WHERE C.fecha = '$fechaActual' ORDER BY C.fecha, C.hora DESC LIMIT 10";

        //PARA FILTRAR SOLO LAS DE HOY

        $resultadoConsultaMascotasHoy = $conexion->query($consultaMascotasHoy);

        //Pasamo los datos a un array por filas
        $agenda_citas_mascotas_hoy = array();
        while ($fila = $resultadoConsultaMascotasHoy->fetch_assoc()) {
            $agenda_citas_mascotas_hoy[] = $fila;
        }
?>