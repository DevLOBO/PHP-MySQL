<?php
	include('seguridad.php');
	SESSION_DESTROY();
	ECHO 'Se ha cerra exitosamente la sesión.';
	ECHO '<a href="index.php">Volver</a>';
?>