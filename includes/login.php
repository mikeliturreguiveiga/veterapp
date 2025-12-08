<?php
session_start();
include("conexion.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $usuario = $_POST['usuario'];
    $contraseña = $_POST['contraseña'];
    $id;

    $consulta = "SELECT * FROM tipo_usuarios_contraseñas WHERE contraseña = '$contraseña'"; //voy por aqui, con una sola consulta se puede hacer toda la comprobacion
    /**
     * 
     * ALGO ASI
     * 
     * SELECT
     *   TUC.password_hash,
      *  TUC.id_usuario, -- Necesario para verificar si es un usuario
     *   TUC.id_empleado, -- Necesario para verificar si es un empleado
      *  COALESCE(U.nombre, E.nombre) AS nombre_encontrado -- Trae el nombre de U o E, el que no sea NULL
       * FROM
        *tipo_usuarios_contraseñas TUC
        *-- 1. Intenta unir con la tabla de Usuarios
    *    LEFT JOIN
    *    usuarios U ON TUC.id_usuario = U.id_usuario
    *    -- 2. Intenta unir con la tabla de Empleados
    *    LEFT JOIN
    *    empleados E ON TUC.id_empleado = E.id_empleado
    *    WHERE
    *    -- La condición de login: el nombre introducido debe coincidir con el nombre del Usuario O el nombre del Empleado
    *    (U.nombre = :nombre_login OR E.nombre = :nombre_login)
    *    -- Opcional: Asegura que el registro TUC esté correctamente vinculado a al menos una de las tablas
    *    AND
    *    (TUC.id_usuario IS NOT NULL OR TUC.id_empleado IS NOT NULL)
     *   LIMIT 1;
     * 
     * 
     */
}
