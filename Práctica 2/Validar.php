<?php
	$usuarios = array("Franco", "Victor", "Oscar", "Rubén", "Emiliano");
	$duplicados = $usuarios;
	$user = $_POST["user"];
	$indicador = false;

	for ($j = 0; $j < 5; $j++) {
		for ($k = 0; $k < 5; $k++)
			if ($j xor $k && $usuarios[$j] == $usuarios[$k]) {
				$indicador = true;
				break;
			}
			else $indicador = false;

		if ($indicador) {
			echo '<h1>Hay usuarios repetidos</h1>';
			break;
		}
	}

	if (! $indicador) {
		for ($i = 0; $i < count($usuarios); $i++)
		if ($user == $usuarios[$i]) {
			$indicador = true;
			break;
		}
		else $indicador = false;

		if ($indicador)
			echo '<h1>Bienvenido '.$user.'</h1>';
		else echo '<h1>Usuario no reconocido</h1>';
	}
?>