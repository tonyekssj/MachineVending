<?php
session_start();
include ("../db.php");

if ($_SESSION["user"]) {
    echo "Bienvenido ", $_SESSION["user"],"<br> <br>";

    $user = $_SESSION['user']; 
   
    $sql = "SELECT credito FROM client WHERE user = '$user'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $credito = $row['credito'];
  
    echo "\n";
    echo "CREDITOS DISPONIBLES ", $credito;

} else {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="cliente.css">
    <script>
        function verificarEstado() {
            var creditoDisponible = <?php echo $credito; ?>;
            if (creditoDisponible > 0) {
                var xhr = new XMLHttpRequest();
                xhr.open("POST", "http://192.168.0.19/cloroCompra", true);
                xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                xhr.onreadystatechange = function() {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {  
                    alert("Compra de CLORO realizada.");
                    restarCredito();
                    } else {
                        alert("No se puede conectar con el servidor");
                    }
                }
                };
                xhr.send("VENTA=CLORO");
            } else {
                alert("Saldo insuficiente");
            }
        }

        function restarCredito() {
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "restarCredito.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function() {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        console.log("Se restó 1 al valor de crédito.");
                        insertarDatos();
                        location.reload();
                    } else {
                        console.log("Error con Base de datos");
                    }
                }
            };
            xhr.send();
        }

        function insertarDatos() {
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "insertarDatos.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function() {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        console.log("Se inserto datos.");
                        location.reload();
                    } else {
                        console.log("Error con Base de datos");
                    }
                }
            };
            xhr.send();
        }


    </script>
</head>
<body>
    <div class="cliente">
        <div class="cliente-screen">
            <form>
                <div class="cliente-form">    
                    <input type="button" class="btn btn-primary btn-large btn-block" onclick="verificarEstado()" value="CLORO"><br>
                </div>
            </form>

            <form action="" method="post">
                <div class="cliente-form">    
                    <input type="submit" class="btn btn-primary btn-large btn-block" name="ventas" value="DETERGENTE"><br>
                </div>
            </form>

            <form action="" method="post">
                <div class="cliente-form">    
                    <input type="submit" class="btn btn-primary btn-large btn-block" name="ventas" value="LAVAMANOS"><br>
                </div>
            </form>

            <form action="" method="post">
                <div class="cliente-form">    
                    <input type="submit" class="btn btn-primary btn-large btn-block" name="ventas" value="SUAVITEL"><br>
                </div>
            </form>


            <a class="logout-link" href="logout.php">Cerrar Sesión</a>
        </div>
    </div>
</body>
</html>
