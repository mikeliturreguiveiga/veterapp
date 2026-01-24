<?php
$consulta_usuarios = "SELECT * FROM usuarios";
$resultado_consulta_usuarios = $conexion->query($consulta_usuarios);
$array_datos_usuarios = array();
while($fila = $resultado_consulta_usuarios->fetch_assoc()){
    $array_datos_usuarios[] = $fila;
}
?>