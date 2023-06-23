<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" href="admin.css">
</head>
<body>
	<div class="admin">
		<div class="admin-screen">
    <p>Estado de la maquina</p>
    <?php
      $file = "status.txt"; // Ruta del archivo .txt
    // Leer el contenido del archivo
    $lines = file($file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

    // Obtener el último renglón del archivo
    $lastLine = end($lines);

    // Comprobar si el dato es "OK"
    if ($lastLine == "OK") {
    echo '<span style="color: green;">' . $lastLine . '</span>'; // Mostrar en verde
    } else {
    echo '<span style="color: red;">' . $lastLine . '</span>'; // Mostrar en rojo
    }
    ?>
    <a class="logout-link" href="admin.php">Regresar</a>
		</div>
	</div>
</body>
</html>
