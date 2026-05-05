<?php
//---------------------------CODIGO PARA AÑADIR LA NUEVA CITA YA DENTRO DEL FORMULARIO. ----------------------------
session_start();
include('conexion.php');

if (isset($_POST['registrarme'])) {
    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    $telefono = $_POST['telefono'];
    $mail = $_POST['mail'];
    $direccion = $_POST['direccion'];
    $usuario = $_POST['usuario'];
    $contraseña = $_POST['contraseña'];

    //PRIMERO COMPRUEBO QUE NO HAYA YA OTRO CLIENTE CON EL MISMO USUARIO

    $consulta_existe = "SELECT id_usuario FROM tipo_usuarios_contraseñas WHERE usuario = '$usuario'";
    $resultado_existe = $conexion->query($consulta_existe);

    if ($resultado_existe->num_rows > 0) {
        echo "<script>
                alert('Lo sentimos, el nombre de usuario ya está en uso. Elige otro.');
                window.history.back(); 
              </script>";
    }

    //UAN VEZ COMPROBADO SEGUIMOS

    $consulta_añadir_usuario = "INSERT INTO usuarios (nombre, apellidos, telefono, correo_electronico, direccion)
                                    VALUES ('$nombre', '$apellidos', '$telefono', '$mail', '$direccion');
                                        ";

    $ejecucion_consulta_usuario = $conexion->query($consulta_añadir_usuario);

    $ultimo_id = $conexion->insert_id; //Devuleve el último ID de autoincrement

    $consulta_añadir_usuario_contraseña = "INSERT INTO tipo_usuarios_contraseñas (id_usuario, id_empleado, usuario, contraseña)
                                    VALUES ('$ultimo_id', NULL, '$usuario', '$contraseña');
                                        ";

    $ejecucion_consulta_usuario = $conexion->query($consulta_añadir_usuario_contraseña);


    if ($ejecucion_consulta_usuario) {
        $_SESSION['usuario'] = $usuario;
            $_SESSION['roll'] = "cliente";
            $_SESSION['id'] = $ultimo_id;
            header("Location: ../cliente/cliente.php");
    } else {
        echo "<script>alert('Usuario o contraseña erroneos');</script>";
    }
}
