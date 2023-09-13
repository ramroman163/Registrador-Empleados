<?php

include '../protected/home/conexion.php';

if ($link) {
    echo "Conexion con base de datos exitosa! ";

    if (!empty($_POST)) {
        $id_tarjeta = $_POST['tarjeta'];
        echo "INICIO" . $id_tarjeta . "FIN";
        $consulta = 'SELECT nombre, apellido FROM Tb_Empleados WHERE id_tarjeta="' . $id_tarjeta . '"';
        
        $datos = mysqli_query($link, $consulta);
        
        $row = $datos->fetch_array(MYSQLI_ASSOC);
        
        if ($datos) {
            echo " Tarjeta ENCONTRADA ";
        } else {
            echo " Tarjeta NO ENCONTRADA ";
        }
        
        // Definicion de hora y zona horaria
        date_default_timezone_set('America/Argentina/Buenos_Aires');
        $fecha_registro = date('Y-m-d H:i:s');
        
        $nombre_empleado = $row["nombre"];
        $apellido_empleado = $row["apellido"];
        
        $resultado = mysqli_query($link, "INSERT INTO Tb_Registro (nombre, apellido, fecha_registro) VALUES ('$nombre_empleado','$apellido_empleado', '$fecha_registro')");

        if ($resultado) {
            echo " Registo CORRECTO ";
        } else {
            echo " ERROR en el registro ";
        }
    }
    else{
        echo "POST VACIO";
    }
} else {
    echo "Falla! conexion con Base de datos ";
}

?>