<?php 
$host = 'localhost:8889';
$nombre = 'root';
$contraseña = 'root';
$baseDatos = 'veterApp';

$conexion = new mysqli($host, $nombre, $contraseña, $baseDatos);

if ($conexion->connect_error) {
    error_log('Error de conexion a base de datos' . $conexion->connect_error);
    die('Conexion fallida');
}else{
    /*echo 'OK';  Lo dejo comentado porque ya funciona */
}
?>