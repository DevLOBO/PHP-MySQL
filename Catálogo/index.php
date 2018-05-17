<?php
	include('seguridad.php'); // Se comprueba que la sesión siga vigente
	// Si el contador existe, no se hace nada; sino se inicializa en 10
	if (EMPTY($_SESSION['DragónRojo'])) $_SESSION['DragónRojo'] = 10;
	if (EMPTY($_SESSION['HyF'])) $_SESSION['HyF'] = 10;
	if (EMPTY($_SESSION['ElJugador'])) $_SESSION['ElJugador'] = 10;
	if (EMPTY($_SESSION['SeñorAnillos'])) $_SESSION['SeñorAnillos'] = 10;
	if (EMPTY($_SESSION['Jul'])) $_SESSION['Jul'] = 10;
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Formulario</title>
	<link rel="stylesheet" href="style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function() {
	$('.Envoltura').hover(function() {
		$(this).children('img').stop().animate({
			left : '-380px'
		}, 'normal');
	},

	function() {
		$(this).children('img').stop().animate({
			left : '0'
		}, 'normal');
	});
});
	</script>
</head>
<body>
	<!-- EMPIEZA EL FORMULARIO -->
	<div id="Productos">
		<form action="compra.php" method="post">
			<section class="Contenedor">
				<div class="Envoltura">
					<h1>Juliette</h1>
					<img src="Imágenes/Juliette.png"><br/>
					<label>Cantidad:
						<select name="Jul">
							<option value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
							<option value="4">4</option>
							<option value="5">5</option>
						</select>
					</label>
					<br/><label>
						<input type="checkbox" name="Comprar[]" value="Juliette"> Comprar libro
					</label>
					<br/><button type="submit">Comprar</button>
				</div>
			</section>
			<section class="Contenedor">
				<div class="Envoltura">
					<h1>Canción de Hielo y Fuego</h1>
					<img src="Imágenes/Canción_HyF.jpg"><br/>
					<label>Cantidad:
						<select name="HyF">
							<option value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
							<option value="4">4</option>
							<option value="5">5</option>
						</select>
					</label>
					<br/><label>
						<input type="checkbox" name="Comprar[]" value="Canción de Hielo y Fuego"> Comprar librO
					</label>
					<br/><button type="submit">Comprar</button>
				</div>
			</section>
			<section class="Contenedor">
				<div class="Envoltura">
					<h1>El Señor de los Anillos</h1>
					<img src="Imágenes/Señor_Anillos.jpg"><br/>
					<label>Cantidad:
						<select name="SeñorAnillos">
							<option value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
							<option value="4">4</option>
							<option value="5">5</option>
						</select></label>
						<br/><label>
						<input type="checkbox" name="Comprar[]" value="El Señor de los Anillos"> Comprar libro</label>
					<br/><button type0"submit>Comprar</button>
				</div>
			</section>
			<section class="Contenedor">
				<div class="Envoltura">
					<h1>El Dragón Rojo</h1>
					<img src="Imágenes/Dragón_Rojo.jpg"><br/>
					<label>Cantidad:
						<select name="DragónRojo">
							<option value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
							<option value="4">4</option>
							<option value="5">5</option>
						</select></label>
						<br/><label>
						<input type="checkbox" name="Comprar[]" value="El Dragón Rojo"> Comprar libro</label>
					<br/><button type="submit">Comprar</button>
				</div>
			</section>
			<section class="Contenedor">
				<div class="Envoltura">
					<h1>El Jugador</h1>
					<img src="Imágenes/Jugador.jpg"><br/>
					<label>Cantidad:
						<select name="ElJugador">
							<option value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
							<option value="4">4</option>
							<option value="5">5</option>
						</select></label>
						<br/><label>
						<input type="checkbox" name="Comprar[]" value="El Jugador"> Comprar libro</label>
					<br/><button type="submit">Comprar</button>
				</div>
			</section>
		</form>
	</div>
</body>
</html>