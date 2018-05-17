<?php
	SESSION_START();
	if (EMPTY($_SESSION['usuario']) || EMPTY($_SESSION['clave']))
		header("location:validar.php");
?>