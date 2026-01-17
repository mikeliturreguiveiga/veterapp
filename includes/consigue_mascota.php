<?php
ob_start();
error_reporting(0);
ini_set('display_errors', 0);

include("conexion.php");

if (isset($_POST['id_usuario'])) {
    $id = intval($_POST['id_usuario']);
    
    // IMPORTANTE: Asegúrate de que tu variable es $conexion
    $sql = "SELECT id_mascota, nombre FROM mascotas WHERE id_usuario = $id";
    $resultado_consulta = $conexion->query($sql);

    $mascotas = [];
    while ($fila = $resultado_consulta->fetch_assoc()) {
        $mascotas[] = $fila;
    }

    // Limpiamos el búfer para asegurar que solo salga el JSON
    ob_end_clean();
    header('Content-Type: application/json; charset=utf-8');
    echo json_encode($mascotas);
    exit;
}
?>