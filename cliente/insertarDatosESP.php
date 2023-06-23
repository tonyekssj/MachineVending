<?php
include("../db.php");
date_default_timezone_set("America/Tijuana");

if (!$conn) {
    die("Conexion fallida: " . mysqli_connect_error());
}

echo "Conexion a la base de datos<br>";

if (isset($_POST['data'])) {

    $fecha = date("Y-m-d");
    $producto = $_POST['data'];
    $insert_data = "INSERT INTO venta (id_admin, producto, fecha) VALUES (1, '$producto', '$fecha')";

    if (mysqli_query($conn, $insert_data)) {
        echo "Nueva escritura en la base de datos CLORO";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>