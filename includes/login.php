<?php
session_start();
include("conexion.php");

if (isset($_SESSION['roll']) == "cliente" || isset($_SESSION['roll']) == "empleado") {
    if ($_SESSION['roll'] == "cliente") {
        header("Location: ../cliente/cliente.php");
    }elseif($_SESSION['roll'] == "empleado") {
        header("Location: ../empleado/plataformaEmpleado.php");
    }
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $usuario = $_POST['usuario'];
    $contraseña = $_POST['contraseña'];

    $consulta = "SELECT id_usuario, id_empleado FROM tipo_usuarios_contraseñas WHERE usuario = '$usuario' AND contraseña = '$contraseña'";
    $resultadoConsulta = $conexion->query($consulta);
    $filaArrayResultadosConsulta = $resultadoConsulta->fetch_assoc(); //Paso a un array los resultados

    if ($resultadoConsulta->num_rows > 0) {
        $_SESSION['usuario'] = $usuario;
        //codigo para hacer un header location a cliente o a empleado
        if ($filaArrayResultadosConsulta['id_usuario'] !== NULL) {
            $_SESSION['roll'] = "cliente";
            $_SESSION['id'] = $filaArrayResultadosConsulta['id_usuario'];
            header("Location: ../cliente/cliente.php");
        }elseif($filaArrayResultadosConsulta['id_empleado'] !== NULL){
            $_SESSION['roll'] = "empleado";
            $_SESSION['id'] = $filaArrayResultadosConsulta['id_empleado'];
            //codigo para que si no es escritorio no puede acceder
            header("Location: ../empleado/plataformaEmpleado.php");
        }
    }else{
        echo "<script>alert('Usuario o contraseña erroneos');</script>";
    }

}
