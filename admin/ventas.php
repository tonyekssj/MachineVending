<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Expires" content="0">
    <meta http-equiv="Last-Modified" content="0">
    <meta http-equiv="Cache-Control" content="no-cache, mustrevalidate">
    <meta http-equiv="Pragma" content="no-cache">
	<title>Login</title>
	<link rel="stylesheet" href="admin.css">
</head>
<body>
   
    <div class="venta-tabla">
        <br>
        <table>
            <tr class="venta-tabla-atributos">
                <td>ID Venta</td>
                <td>Fecha</td>
                <td>Producto</td>
            </tr>
            <?php
             session_start();
             include("../db.php");

            $user = $_SESSION['user']; 
   
            $sql = "SELECT id_admin FROM admin WHERE user = '$user'";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);
            $id_admin = $row['id_admin'];

             
             $sql = "SELECT * FROM venta WHERE id_admin = $id_admin";
             $result = mysqli_query($conn, $sql);

             while ($mostrar = mysqli_fetch_array($result)) {
            ?>
            <tr>
                <td><?php echo $mostrar['id_venta'] ?></td>
                <td><?php echo $mostrar['fecha'] ?></td>
                <td><?php echo $mostrar['producto'] ?></td>
            </tr>
            <?php
            }
            ?>
        </table>
    </div>
    <a class="logout-link" href="admin.php">Regresar</a>
</body>
</html>
