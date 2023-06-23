<?php
session_start();
if ($_SESSION["user"]) {
    echo "Bienvenido ", $_SESSION["user"];
} else {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="admin.css">
    <script>
        function verificarEstado() {
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "http://192.168.0.19/verificarEstado", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function() {
                if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
                    if (xhr.responseText === 'OK') {
                        window.location.href = "verificarStatus.php";
                    } else {
                        console.log("Error en la respuesta del servidor");
                    }
                }
            };
            xhr.send("ADMIN=STATUS");
            
        }
    </script>
</head>
<body>
    <div class="admin">
        <div class="admin-screen">
            <form>
                <div class="admin-form">    
                    <input type="button" class="btn btn-primary btn-large btn-block" onclick="verificarEstado()" value="Verificar Estado"><br>
                </div>
            </form>

            <form action="ventas.php" method="post">
                <div class="admin-form">    
                    <input type="submit" class="btn btn-primary btn-large btn-block" name="ventas" value="Ventas"><br>
                </div>
            </form>

            <a class="logout-link" href="logout.php">Cerrar Sesión</a>
        </div>
    </div>
</body>
</html>
