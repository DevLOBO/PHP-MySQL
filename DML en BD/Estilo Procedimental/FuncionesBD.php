<?php
class BaseDeDatos
{
    private $link;
    private $tabla;
    public function BaseDeDatos($host, $usuario, $password, $nombreBD, $nombreTabla)
    {
        $this->link = mysqli_connect($host, $usuario, $password) or die('Problema al conectar la base de datos.');
        mysqli_select_db($this->link, $nombreBD) or die('No se pudo seleccionar la BD especificada');
        $this->tabla = $nombreTabla;
    }
    public function insertarDatos($id, $user)
    {
        $insertar = "INSERT INTO " . $this->tabla . " (UserID, Username) VALUES (" . $id . ", '" . $user . "');" or die('No se pudo añadir el producto por ' . mysqli_error());
        mysqli_query($this->link, $insertar);
        if (mysqli_affected_rows($this->link) == 1) {
            echo "Se añadió correctamente al usuario " . $id;
        } else {
            echo "No se encontró al usuario " . $id . ".";
        }
    }
    public function MostrarTodo()
    {
        $Consulta  = "SELECT * FROM " . $this->tabla;
        $resultado = mysqli_query($this->link, $Consulta) or die('No se pudo realizar correctamente la consulta.');
        if (mysqli_num_rows($resultado) == 0) {
            echo "No hay usuarios disponibles.";
        } else {
            echo '<table>';
            while ($fila = mysqli_fetch_row($resultado)) {
                echo '<tr>';
                foreach ($fila as $columna) {
                    echo '<td>' . $columna . '</td>';
                }
                echo '</tr>';
            }
            echo '</table>';
        }
        mysqli_free_result($resultado);
    }
    public function Mostrar($id)
    {
        $Consulta  = "SELECT * FROM " . $this->tabla . " WHERE UserID = " . $id;
        $resultado = mysqli_query($this->link, $Consulta) or die('No se pudo realizar correctamente la consulta.');
        if (mysqli_num_rows($resultado) == 0) {
            echo "No existe el susuario que estás buscando.";
        } else {
            echo '<table>';
            while ($fila = mysqli_fetch_row($resultado)) {
                echo '<tr>';
                foreach ($fila as $columna) {
                    echo '<td>' . $columna . '</td>';
                }
                echo '</tr>';
            }
            echo '</table>';
        }
        mysqli_free_result($resultado);
    }
    public function EliminarDatos($id)
    {
        $Eliminar  = "DELETE FROM " . $this->tabla . " WHERE UserID = " . $id;
        $resultado = mysqli_query($this->link, $Eliminar) or die('No se pudo realizar correctamente la consulta.');
        if (mysqli_affected_rows($this->link) == 1) {
            echo "Se eliminó correctamente al usuario " . $id;
        } else {
            echo "No se encontró al usuario " . $id . ".";
        }

    }
    public function ModificarDatos($id, $user)
    {
        $modificar = "UPDATE " . $this->tabla . " SET Username = '" . $user . "' WHERE UserID = " . $id;
        $resultado = mysqli_query($this->link, $modificar) or die('No se pudo realizar correctamente la consulta.');
        if (mysqli_affected_rows($this->link) == 1) {
            echo "Se modificó correctamente al usuario " . $id;
        } else {
            echo "No se encontró al usuario " . $id . ".";
        }
    }
    public function CerrarBD()
    {mysqli_close($this->link);}
}
