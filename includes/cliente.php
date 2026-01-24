<?php
include('../includes/conexion.php');
$id_logeado = $_SESSION['id'];
$fecha_hoy = date('Y-m-d');
$hora_hoy = date('H:i:s');

//-------------------------------CODIGO AÑADIR CITA-------------------------------
    if (isset($_POST['boton_pedir_cita'])) {
        $id_mascota = $_POST['id_mascota_nueva_cita'];
        $fecha = $_POST['calendario'];
        $hora = $_POST['hora_nueva_cita'];
        $consulta_pedir_cita = "INSERT INTO citas (id_usuario, id_mascota, fecha, hora)
                                VALUES ('$id_logeado', '$id_mascota', '$fecha', '$hora')";

        $ejecucion_consulta = $conexion->query($consulta_pedir_cita);

        if($ejecucion_consulta){
            echo "<script>
                    alert('Cita añadida.');
                    window.location.href = 'cliente.php'; 
                  </script>";
        }
    }
//----------------CODIGO PARA OBTENER LAS MASCOTAS DEL DUEÑO LOGUEADO------------------------
$consulta_mascotas_de_logeado = "SELECT * FROM mascotas WHERE id_usuario = '$id_logeado'";
$resultado_consulta_mascotas_de_logeado = $conexion->query($consulta_mascotas_de_logeado);
$array_datos_mascota = array();

while($fila = $resultado_consulta_mascotas_de_logeado->fetch_assoc()){
    $array_datos_mascota[] = $fila;
    if (isset($fila['fecha_nacimiento'])) {
        $año_nacimiento = date("Y", strtotime($fila['fecha_nacimiento']));
        $año_actual = date("Y", strtotime($fecha_hoy));
        $edad = $año_actual - $año_nacimiento;
    }
}
    
//---------------------------------CODIGO CITAS CLIENTE---------------------------
$consulta_cita_cliente = "SELECT * FROM citas 
                          INNER JOIN mascotas ON citas.id_mascota = mascotas.id_mascota 
                          WHERE citas.id_usuario = '$id_logeado'";
$resultado_consulta_cita_cliente = $conexion->query($consulta_cita_cliente);
$array_resultado_cita_cliente = array();

$array_proximas = array();
$array_anteriores = array();

while($fila = $resultado_consulta_cita_cliente->fetch_assoc()){
    if($fila['fecha'] > $fecha_hoy) {
        $array_proximas[] = $fila;
    }elseif($fila['fecha'] < $fecha_hoy){
        $array_anteriores[] = $fila;
    }else{
        //Si es hoy miramos la hora
        if ($fila['hora'] >= $hora_hoy) {
            $array_proximas[] = $fila;
        }else{
            $array_anteriores[] = $fila;
        }
    }
}

//--------------------------------CODIGO CANCELAR CITA--------------------------------
if (isset($_POST['cancelar_cita'])) {
    if(isset($array_proximas)){
        $consulta_elimiar_cita = "DELETE FROM citas 
                                    WHERE id_usuario = '$id_logeado' 
                                    ORDER BY fecha DESC, hora DESC 
                                    LIMIT 1;";

        $ejecutar_borrado = $conexion->query($consulta_elimiar_cita);
        if ($ejecutar_borrado) {
            echo "<script>
                    alert('Cita eliminada.');
                    window.location.href = 'cliente.php'; 
                  </script>";
        }
    }
}

//-----------------------------CODIGO AÑADIR NUEVA MASCOTA----------------------------
if (isset($_POST['añadir_mascota_cliente'])) {
    $nombre_mascota_nueva = $_POST['nombre_mascota_nueva'];
    $especia_mascota_nueva = $_POST['especia_mascota_nueva'];
    $raza_mascota_nueva = $_POST['raza_mascota_nueva'];
    $fecha_nacimiento_mascota_nueva = $_POST['fecha_nacimiento_mascota_nueva'];

    $consulta_insertar_mascota = "INSERT INTO mascotas (id_usuario, nombre, especie, raza, fecha_nacimiento)
                                    VALUES ('$id_logeado', '$nombre_mascota_nueva', '$especia_mascota_nueva',
                                    '$raza_mascota_nueva', '$fecha_nacimiento_mascota_nueva')";

    $resultado_insertar_mascota = $conexion->query($consulta_insertar_mascota);
    //Si ha salido bein sacamos un mensaje en pantalla
    if ($resultado_insertar_mascota) {
                echo "<script>
                    alert('Mascota añadida con éxito.');
                    window.location.href = 'cliente.php'; 
                  </script>";
    }else{
        echo "<script>
                    alert('Algo no salio bien. No se pudo añadir la mascota.');
                    window.location.href = 'cliente.php'; 
                  </script>";
    }
}

?>