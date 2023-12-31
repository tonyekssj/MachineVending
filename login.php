<?php
session_start();
include("db.php");

if (isset($_POST['login'])) {
    $user = $_POST['Username'];
    $password = $_POST['Pass'];

    if (!empty($user) && !empty($password)) {
   
        $adminQuery = mysqli_query($conn, "SELECT * FROM admin WHERE user = '$user' AND password = '$password'");
        $adminRow = mysqli_fetch_array($adminQuery);

        $clienteQuery = mysqli_query($conn, "SELECT * FROM client WHERE user = '$user' AND password = '$password'");
        $clienteRow = mysqli_fetch_array($clienteQuery);

        if (is_array($adminRow)) {
            $_SESSION["user"] = $adminRow['user'];
            $_SESSION["password"] = $adminRow['password'];
            header("Location: admin/admin.php"); 
            die;
        } elseif (is_array($clienteRow)) {
            $_SESSION["user"] = $clienteRow['user'];
            $_SESSION["password"] = $clienteRow['password'];
            header("Location: cliente/cliente.php"); 
            die;
        } else {
            echo '<script type="text/javascript">';
            echo 'alert("Usuario o contraseña incorrectos")';
            echo '</script>';
        }
    } else {
        echo '<script type="text/javascript">';
        echo 'alert("Por favor, ingrese un nombre de usuario y contraseña")';
        echo '</script>';
    }
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" href="login.css">
</head>
<body>
	<div class="titulo_up">
		<h2>Machine Vending</h2>
	</div>
	<div class="login">
		<div class="login-screen">
			<div class="app-title">
				<h1>Login</h1>
			</div>
			<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
				<div class="login-form">
					<div class="control-group">
						<input type="text" class="login-field" value="" name="Username" placeholder="Username" id="login-name">
						<label class="login-field-icon fui-user" for="login-name"></label>
					</div>
					<div class="control-group">
						<input type="password" class="login-field" value="" name="Pass" placeholder="Password" id="login-pass">
						<label class="login-field-icon fui-lock" for="login-pass"></label>
					</div>
					<input type="submit" class="btn btn-primary btn-large btn-block" name="login" value="Iniciar Sesión"><br>
				</div>
			</form>
		</div>
	</div>
</body>
</html>
