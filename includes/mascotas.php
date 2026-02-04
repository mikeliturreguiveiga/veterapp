<?php
//------------------------------CODIGO TABLA DE VER MASCOTAS----------------------------------
$consulta_mascotas = "SELECT * FROM mascotas";
$resultado_consulta_mascotas = $conexion->query($consulta_mascotas);
$array_datos_mascotas = array();
while($fila = $resultado_consulta_mascotas->fetch_assoc()){
    $array_datos_mascotas[] = $fila;
}

//------------------------------CODIGO AÑADIR MASCOTAS----------------------------------
if (isset($_POST['boton_añadir_nueva_mascota'])) {
    $nombre = $_POST['nombre_nueva_mascota'];
    $especie = $_POST['especie_nueva_mascota'];
    $raza = $_POST['raza_nueva_mascota'];
    $fecha_nacimiento = $_POST['fecha_nacimiento_nueva_mascota'];
    $caracteristicas = $_POST['caracteristicas_nueva_mascota'];
    $peso = $_POST['peso_nueva_mascota'];
    $dieta = $_POST['dieta_nueva_mascota'];
    $esterilizado = $_POST['esterilizado_nueva_mascota'];
    $vacunas = $_POST['vacunas_nueva_mascota'];
    $examenes = $_POST['examenes_nueva_mascota'];
    $tratamientos = $_POST['tratamientos_nueva_mascota'];
    $consulta_insertar_mascota = "INSERT INTO mascotas 
                                    (nombre, especie, raza, fecha_nacimiento, caracteristicas_fisicas, peso, esterilizado, vacuas, examenes, tratamientos)                    
                                    VALUES 
                                    ('$nombre', '$especie', '$raza', '$fecha_nacimiento',
                                     '$caracteristicas', '$peso', '$dieta', '$esterilizado',
                                      '$vacunas', '$examenes', '$tratamientos')";
    $ejecutamos_consulta_insertar_mascota = $conexion->query($consulta_insertar_mascota);

    if($ejecutamos_consulta_insertar_mascota){
        echo "<script>
            alert('Usuario añadido con éxito.');
            window.location.href = 'mascotas.php'; 
            </script>";  
    }

    
}
//------------------------------CODIGO EDITAR MASCOTAS----------------------------------

if (isset($_POST['boton_editar_mascota'])) {
    $id = $_POST['id_mascota_editar'];
    $nombre = $_POST['nombre_editar_mascota'];
    $especie = $_POST['especie_editar_mascota'];
    $raza = $_POST['raza_editar_mascota'];
    $fecha_nacimiento = $_POST['fecha_nacimiento_editar_mascota'];
    $caracteristicas = $_POST['caracteristicas_editar_mascota'];
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
                        raza = '$raza', 
                        fecha_nacimieto = '$fecha_nacimiento', 
                        caracteristicas = '$caracteristicas',
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
//------------------------------CODIGO ELIMINAR USUARIO----------------------------------
if (isset($_POST['boton_eliminar_mascota'])) {
    $id = $_POST['id_mascota_borrar'];


    if (!empty($id)) {
        $consulta_borrar_datos_mascota = "DELETE FROM usuarios
                       WHERE id_usuario = '$id'";

        $ejecutar_consulta_borrar_datos_mascota = $conexion->query($consulta_borrar_datos_mascota);

        if ($ejecutar_consulta_borrar_datos_mascota) {
            echo "<script>alert('mascota eliminado'); window.location.href='mascotas.php';</script>";
        }else{
            echo "<script>alert('No se puedo eliminar la mascota'); window.location.href='mascotas.php';</script>";
        }
    }
}
?>