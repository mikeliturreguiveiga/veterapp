<?php
//-----------------------------------------CODIGO PAGINADO-----------------------------------------
    $resultados_por_pagina = 8;

    //capturamos la página actual
    $pagina = isset($_GET['p']) ? (int)$_GET['p'] : 1;

    //calculamos el punto inicio para el SQL
    $inicio = (max(1, $pagina) - 1) * $resultados_por_pagina;
    if ($pagina < 1) $pagina = 1;
    $inicio = ($pagina - 1) * $resultados_por_pagina;
//------------------------------CODIGO TABLA DE VER MASCOTAS----------------------------------
$consulta_mascotas = "SELECT * FROM mascotas LIMIT $resultados_por_pagina OFFSET $inicio";
$resultado_consulta_mascotas = $conexion->query($consulta_mascotas);
$array_datos_mascotas = array();
while($fila = $resultado_consulta_mascotas->fetch_assoc()){
    $array_datos_mascotas[] = $fila;
}

//------------------------------CODIGO AÑADIR MASCOTAS----------------------------------

$consulta_usuarios = "SELECT * FROM usuarios";//ESTA COSULTA ES PARA QUE APAREZCA EN EL SELECT EL ID Y NOMBRE DEL USUARIO DUEÑO DE LA NUEVA MASCOTA
$resultado_consulta_usuarios = $conexion->query($consulta_usuarios);
$array_datos_usuarios = array();
while($fila = $resultado_consulta_usuarios->fetch_assoc()){
    $array_datos_usuarios[] = $fila;
}

if (isset($_POST['boton_añadir_nueva_mascota']) && !empty($_POST['nombre_nueva_mascota'])) {
    $id_usuario = $_POST['id_usuario_mascota_nueva'];
    $nombre = $_POST['nombre_nueva_mascota'];
    $especie = $_POST['especie_nueva_mascota'];
    $sexo = $_POST['sexo_nueva_mascota'];
    $raza = $_POST['raza_nueva_mascota'];
    $fecha_nacimiento = $_POST['fecha_nacimiento_nueva_mascota'];
    $caracteristicas = $_POST['caracteristicas_fisicas_nueva_mascota'];
    $peso = $_POST['peso_nueva_mascota'];
    $dieta = $_POST['dieta_nueva_mascota'];
    $esterilizado = $_POST['esterilizado_nueva_mascota'];
    $vacunas = $_POST['vacunas_nueva_mascota'];
    $examenes = $_POST['examenes_nueva_mascota'];
    $tratamientos = $_POST['tratamientos_nueva_mascota'];

    if ($esterilizado == "no") {//El profesional escribe si o no, pero en la base de datos es 0 1
        $esterilizado = 0;
    }else{
        $esterilizado = 1;
    }

    $consulta_insertar_mascota = "INSERT INTO mascotas 
                                    (id_usuario, nombre, especie, raza, sexo, fecha_nacimiento, caracteristicas_fisicas,
                                     peso, dieta, esterilizado, vacunas, examenes, tratamientos)                    
                                    VALUES 
                                    ('$id_usuario', '$nombre', '$especie', '$raza', '$sexo', '$fecha_nacimiento',
                                     '$caracteristicas', '$peso', '$dieta', '$esterilizado',
                                      '$vacunas', '$examenes', '$tratamientos')";
    $ejecutamos_consulta_insertar_mascota = $conexion->query($consulta_insertar_mascota);

    if($ejecutamos_consulta_insertar_mascota){
        echo "<script>
            alert('Mascota añadido con éxito.');
            window.location.href = 'mascotas.php'; 
            </script>";  
    }

    
}
//------------------------------CODIGO EDITAR MASCOTAS----------------------------------
// Buscamos los datos de la mascota seleccionada para editar y hago un array solo con los datos de esa mascota
$mascota_a_editar = null;
if (isset($_POST['id_mascota_editar']) && !empty($_POST['id_mascota_editar'])) {
    foreach ($array_datos_mascotas as $mascota) {
        if ($mascota['id_mascota'] == $_POST['id_mascota_editar']) {
            $mascota_a_editar = $mascota;
            break;
        }
    }
}


if (isset($_POST['boton_editar_mascota'])) {
    $id = $_POST['id_mascota_editar'];
    $nombre = $_POST['nombre_editar_mascota'];
    $especie = $_POST['especie_editar_mascota'];
    $raza = $_POST['raza_editar_mascota'];
    $sexo = $_POST['sexo_editar_mascota'];
    $fecha_nacimiento = $_POST['fecha_nacimiento_editar_mascota'];
    $caracteristicas = $_POST['caracteristicas_fisicas_editar_mascota'];
    $peso = $_POST['peso_editar_mascota'];
    $dieta = $_POST['dieta_editar_mascota'];
    $esterilizado = $_POST['esterilizado_editar_mascota'];
    $vacunas = $_POST['vacunas_editar_mascota'];
    $examenes = $_POST['examenes_editar_mascota'];
    $tratamientos = $_POST['tratamientos_editar_mascota'];


    if (!empty($id)) {
        $consulta_editar_mascota = "UPDATE mascotas SET 
                        nombre = '$nombre', 
                        especie = '$especie',
                        sexo = '$sexo', 
                        raza = '$raza', 
                        fecha_nacimiento = '$fecha_nacimiento', 
                        caracteristicas_fisicas = '$caracteristicas',
                        peso = '$peso',
                        dieta = '$dieta',
                        esterilizado = '$esterilizado',
                        vacunas = '$vacunas',
                        examenes = '$examenes',
                        tratamientos = '$tratamientos' 
                       WHERE id_mascota = '$id'";

        $ejecutar_consulta_editar_mascota = $conexion->query($consulta_editar_mascota);

        if ($ejecutar_consulta_editar_mascota) {
            echo "<script>alert('mascota actualizada'); window.location.href='mascotas.php';</script>";
        }else{
            echo "<script>alert('No se puedo actualizar la mascota'); window.location.href='mascotas.php';</script>";
        }
    }
}
//------------------------------CODIGO ELIMINAR MASCOTA----------------------------------
if (isset($_POST['boton_eliminar_mascota'])) {
    $id = $_POST['id_mascota_borrar'];


    if (!empty($id)) {
        $consulta_borrar_datos_mascota = "DELETE FROM mascotas
                       WHERE id_mascota = '$id'";

        $ejecutar_consulta_borrar_datos_mascota = $conexion->query($consulta_borrar_datos_mascota);

        if ($ejecutar_consulta_borrar_datos_mascota) {
            echo "<script>alert('mascota eliminado'); window.location.href='mascotas.php';</script>";
        }else{
            echo "<script>alert('No se puedo eliminar la mascota'); window.location.href='mascotas.php';</script>";
        }
    }
}
?>