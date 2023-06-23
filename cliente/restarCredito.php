<?php
session_start();
include ("../db.php");

if ($_SESSION["user"]) {
    $user = $_SESSION['user']; 
   
    $sql = "UPDATE client SET credito = credito - 1 WHERE user = '$user'";
    $result = mysqli_query($conn, $sql);
  
    if ($result) {
        echo "OK";
    } else {
        echo "Error al restar el crédito";
    }
} else {
    echo "Error: sesión no iniciada";
}
?>
