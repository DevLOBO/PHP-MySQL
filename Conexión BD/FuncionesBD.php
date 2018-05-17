<?php
	class BaseDeDatos {
		var $link;
		var $tabla;
		function BaseDeDatos($host, $usuario, $password, $nombreBD, $nombreTabla) {
			$this->link = mysqli_connect($host, $usuario, $password) OR DIE('Problema al conectar la base de datos.');
			mysqli_select_db($this->link, $nombreBD) OR DIE('No se pudo seleccionar la BD especificada');
			$this->tabla = $nombreTabla;
		}
		function InsertarDatos($art, $num, $exis) {
			$Insertar = "INSERT INTO ".$this->tabla." VALUES ('".$art."', '".$num."', '".$exis."')" OR DIE ('No se pudo añadir el producto por '.mysqli_error());
			mysqli_query($this->link, $Insertar);
		}
		function MostrarTodo() {
			$Consulta = "SELECT * FROM ".$this->tabla;
			$Resultado = mysqli_query($this->link, $Consulta) OR DIE ('No se pudo realizar correctamente la consulta.');
			echo '<table>';
			while ($fila = mysqli_fetch_row($Resultado)) {
	    		echo '<tr>';
	    		foreach ($fila as $columna) {
	        		echo '<td>'.$columna.'</td>';
	    		}
	    		echo '</tr>';
			}
			echo '</table>';
			mysqli_free_result($Resultado);
		}
		function CerrarBD() { mysqli_close($this->link); }
	}
?>
