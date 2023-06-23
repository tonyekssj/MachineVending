<?php

$serverNmae="localhost";
$userName="root";
$password="chivas101";
$dbName="maquina_expendedora";

$conn = mysqli_connect($serverNmae,$userName,$password,$dbName) or die('Imposible realizar conexión con la base de datos');
?>