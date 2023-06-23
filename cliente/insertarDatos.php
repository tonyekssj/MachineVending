<?php
session_start();
include("../db.php");
date_default_timezone_set("America/Tijuana");

if ($_SESSION["user"]) {
    $user = $_SESSION['user'];

    $sql = "SELECT id_admin FROM admin WHERE user = '$user'";
    $result = mysqli_query($conn, $sql);
    
    if ($result) {
        $row = mysqli_fetch_assoc($result);
        $id_admin = intval($row['id_admin']);

        $producto = "Cloro";
        $fecha = date("Y-m-d");

        $sql_insert_venta = "INSERT INTO venta (id_admin, producto, fecha) VALUES (1, '$producto', '$fecha')";
        $result_insert_venta = mysqli_query($conn, $sql_insert_venta);

        if ($result_insert_venta) {
            echo "Datos insertados correctamente";
        } else {
            echo "Error al insertar datos: " . mysqli_error($conn);
        }
    } else {
        echo "Error al obtener el ID del administrador: " . mysqli_error($conn);
    }
} else {
    echo "Error: sesión no iniciada";
}
mysqli_close($conn);
?>
