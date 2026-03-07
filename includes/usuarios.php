<?php
//-----------------------------------------CODIGO PAGINADO-----------------------------------------
    $resultados_por_pagina = 8;

    //capturamos la página actual
    $pagina = isset($_GET['p']) ? (int)$_GET['p'] : 1;

    //calculamos el punto inicio para el SQL
    $inicio = (max(1, $pagina) - 1) * $resultados_por_pagina;
    if ($pagina < 1) $pagina = 1;
    $inicio = ($pagina - 1) * $resultados_por_pagina;
//------------------------------CODIGO TABLA DE VER USUARIOS----------------------------------
    $consulta_usuarios = "SELECT * FROM usuarios LIMIT $resultados_por_pagina OFFSET $inicio";
    $resultado_consulta_usuarios = $conexion->query($consulta_usuarios);
    $array_datos_usuarios = array();
    while($fila = $resultado_consulta_usuarios->fetch_assoc()){
        $array_datos_usuarios[] = $fila;
    }

//------------------------------CODIGO AÑADIR USUARIO----------------------------------
$comprobacion = true;//Siempre comprobamos que no haya ningún campo vacío

if (isset($_POST['boton_añadir_nuevo_usuario'])) {
    $nombre = $_POST['nombre_nuevo_usuario'];
    $apellidos = $_POST['apellido_nuevo_usuario'];
    $telefono = $_POST['telefono_nuevo_usuario'];
    $mail = $_POST['mail_nuevo_usuario'];
    $direccion = $_POST['direccion_nuevo_usuario'];
    $usuario = $_POST['usuario_nuevo_usuario'];;
    $contraseña = $_POST['contraseña_nuevo_usuario'];

    if (empty($nombre) 
        || empty($apellidos)
        || empty($telefono)
        || empty($mail)
        || empty($direccion)
        || empty($usuario)
        || empty($contraseña)) 
        {
        $comprobacion = false;
        
    }

    if ($comprobacion) { //si no hay campos vacíos se ejecuta todo
        $consulta_insertar_usuario = "INSERT INTO usuarios 
                                    (nombre, apellidos, telefono, correo_electronico, direccion)
                                    VALUES 
                                    ('$nombre', '$apellidos', '$telefono', '$mail',
                                     '$direccion')";
        $ejecutamos_consulta_insertar_usuario = $conexion->query($consulta_insertar_usuario);

        if($ejecutamos_consulta_insertar_usuario){
            $id_nuevo_usuario = $conexion->insert_id;//la función insert_id -> te devuelve el ultimo id de la última insercción
            $consulta_login = "INSERT INTO tipo_usuarios_contraseñas 
                            (id_usuario, id_empleado, usuario, contraseña)
                            VALUES
                            ('$id_nuevo_usuario', NULL, '$usuario', '$contraseña')";
            $ejecutamos_inserccion_de_login = $conexion->query($consulta_login);
            if ($ejecutamos_inserccion_de_login) {
            echo "<script>
                alert('Usuario añadido con éxito.');
                window.location.href = 'usuarios.php'; 
                </script>";
            }
        }
    }else{
        echo "<script>
                alert('Usuario no añadido por falta de campos por rellenar.');
                window.location.href = 'usuarios.php'; 
                </script>";
    }
 
}
//------------------------------CODIGO EDITAR USUARIO----------------------------------

if (isset($_POST['boton_editar_usuario'])) {
    $id = $_POST['id_usuario_editar'];
    $nom = $_POST['nombre_editar_usuario'];
    $ape = $_POST['apellido_editar_usuario'];
    $tel = $_POST['telefono_editar_usuario'];
    $em = $_POST['mail_editar_usuario'];
    $dir = $_POST['direccion_editar_usuario'];


    if (!empty($id)) {
        $consulta_editar_usuario = "UPDATE usuarios SET 
                        nombre = '$nom', 
                        apellidos = '$ape', 
                        telefono = '$tel', 
                        correo_electronico = '$em', 
                        direccion = '$dir' 
                       WHERE id_usuario = '$id'";

        $ejecutar_consulta_editar_usuario = $conexion->query($consulta_editar_usuario);

        if ($ejecutar_consulta_editar_usuario) {
            echo "<script>alert('Usuario actualizado'); window.location.href='usuarios.php';</script>";
        }else{
            echo "<script>alert('No se puedo actualizar el usuario'); window.location.href='usuarios.php';</script>";
        }
    }
}
//------------------------------CODIGO ELIMINAR USUARIO----------------------------------
if (isset($_POST['boton_eliminar_usuario'])) {
    $id = $_POST['id_usuario_borrar'];
    $nom = $_POST['nombre_borrar_usuario'];
    $ape = $_POST['apellido_borrar_usuario'];
    $tel = $_POST['telefono_borrar_usuario'];
    $em = $_POST['mail_borrar_usuario'];
    $dir = $_POST['direccion_borrar_usuario'];


    if (!empty($id)) {
        $consulta_borrar_contraseña_usuario = "DELETE FROM tipo_usuarios_contraseñas
                       WHERE id_usuario = '$id'";

        $consulta_borrar_datos_usurio = "DELETE FROM usuarios
                       WHERE id_usuario = '$id'";

        $ejecutar_consulta_borrar_contraseña = $conexion->query($consulta_borrar_contraseña_usuario);
        $ejecutar_consulta_borrar_datos_usuario = $conexion->query($consulta_borrar_datos_usurio);

        if ($ejecutar_consulta_borrar_datos_usuario) {
            echo "<script>alert('Usuario eliminado'); window.location.href='usuarios.php';</script>";
        }else{
            echo "<script>alert('No se puedo eliminar el usuario'); window.location.href='usuarios.php';</script>";
        }
    }
}


?>