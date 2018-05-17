<?php
	include('seguridad.php'); // Se comprueba si la sesión sigue vigente
	$Compra = $_POST['Comprar']; // Se copian los libros seleccionados en el formulario HTML
	$Longitud = count($Compra); // Se obtiene el número de libros comprados
	$Libros = array( // Se crea un arreglo con el que podamos acceder automáticamente a los datos de los libros (Libro => name del libro en Formulario, Precio)
			"Juliette" => array("Jul", 250),
			"Canción de Hielo y Fuego" => array("HyF", 2500),
			"El Dragón Rojo" => array("DragónRojo", 300),
			"El Jugador" => array("ElJugador", 275),
			"El Señor de los Anillos" => array("SeñorAnillos", 1200)
	);

	echo "Compraste:"; // Se mostrarán los libros comprados
	for ($i = 0; $i < $Longitud; $i++) {
		$Contador = $_SESSION[$Libros[$Compra[$i]][0]];
		$NumComp = $_POST[$Libros[$Compra[$i]][0]];
		$Precio = $Libros[$Compra[$i]][1];
		if (($Contador - $NumComp) < 0) { // Existencias agotadas
			echo "<br/>".$Compra[$i]." se ha agotado o no hay suficientes existencias para cubrir su pedido.";
		}
		else { // Suficientes existencias
			$Contador -= $NumComp; // Se actualiza el contador
			$_SESSION[$Libros[$Compra[$i]][0]] = $Contador; // Se actualiza el contado global _SESSION
			echo "<br/>".$Compra[$i]." con valor de $".$Precio.". Compraste ".$NumComp." ejemplar(es), el precio será de: $".($Precio * $NumComp).". La existencia es de: ".$_SESSION[$Libros[$Compra[$i]][0]];
		}
	}
?>

<!-- Vínculos al catálogo o cerrar la sesión, según sea el caso>-->
<p><a href="index.php">Volver al catálogo</a></p>
<p><a href="cerrar.php">Cerrar Sesión</a></p>