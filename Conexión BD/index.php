<?php
	include('FuncionesBD.php');
	$BD = new BaseDeDatos('localhost', 'root', '', 'Primera', 'Producto');
	//$BD->InsertarDatos('Corbata', '5436112-R3', 896);
	$BD->MostrarTodo();
	$BD->CerrarBD();
?>
