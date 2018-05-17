<?php
	if(ISSET($_POST['Enviar'])) {
		if ($_POST['Status'] == "administrador") {
			if ($_POST['Usuario'] == "Franco" && $_POST['Contraseña'] == "admin") {
				SESSION_START();
				$_SESSION['usuario'] = $_POST['Usuario'];
				$_SESSION['clave'] = $_POST['Contraseña'];
				$_SESSION['status'] = $_POST['Status'];
				header('location:index.php');
			}
			else echo "Usuario o contraseña no administrativa.<br/><br/>";
		}
		else if ($_POST['Status'] == "usuario estándar") {
			if ($_POST['Usuario'] == "Franco" && $_POST['Contraseña'] == "12345") {
				SESSION_START();
				$_SESSION['usuario'] = $_POST['Usuario'];
				$_SESSION['clave'] = $_POST['Contraseña'];
				$_SESSION['status'] = $_POST['Status'];
				header('location:index.php');
			}
			else echo "Usuario o contraseña no registrados.<br/><br/>";
		}
	}
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Ingreso</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<form action="validar.php" method="POST">
		<input type="text" placeholder="Nombre de usuario" name="Usuario">
		<input type="password" placeholder="Contraseña" name="Contraseña"><br/>
		<input type="radio" name="Status" value="usuario estándar" checked> Soy un usuario</input><br/>
		<input type="radio" name="Status" value="administrador"> Soy administrador</input><br/>
		<button type="submit" name="Enviar">Enviar</button>
	</form>
</body>
</html>