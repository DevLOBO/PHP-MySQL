<?php
/***************************************************************
 * Archivo con la definición de la clase BaseDeDatos con sus funciones para manipulación en la BD
 * Creado por Hernández Hernández Franco Salvador
 * 02 Abril 2018
 ***************************************************************/

class BaseDeDatos
{
    private $bd; # Variable que contendrá a nuestra BD
    private $tabla; # Nombre de la tabla que usaremos. Si usamos más, podemos definirla como array
    public function BaseDeDatos($host, $user, $pass, $db, $table) # Constructor para la conexión a MySQL

    {
        // Conexión a la BD con estilo orientado a objetos
        $this->bd = new mysqli($host, $user, $pass, $db);

        // Comprobar que la conexión fue exitosa
        if ($this->bd->connect_errno) {
            printf('Falló la conexión con MySQL. Error: ' . $this->bd->connect_error);
        } else {
            $this->tabla = $table; # Nombre de la tabla a usar
            $this->bd->set_charset('UTF-8'); # Estilo de carácteres a usar en la BD
        }
    }
    public function Cerrar()
    {
        // Cerrar la conexión con la BD
        $this->bd->close();
    }
    public function MostrarTodo()
    {
        // Query para mostrar todos los registros de una tabla
        $consulta  = "SELECT * FROM " . $this->tabla;
        $resultado = $this->bd->query($consulta);

        // Exposición de los registros en forma de tabla
        echo '<table><tr>';
        while ($campos = $resultado->fetch_field()) {
            echo '<td>' . $campos->name . '</td>';
        }
        echo '</tr>';
        while ($fila = $resultado->fetch_row()) {
            echo '<tr>';
            foreach ($fila as $columna) {
                echo '<td>' . $columna . '</td>';
            }
            echo '</tr>';
        }
        echo '</table>';

        // Liberar el contenido de los resultados posibles
        $resultado->close();
    }
    public function MostrarUsuario($id)
    {
        // Query para seleccionar un registro mediante la ID
        $consulta  = "SELECT * FROM " . $this->tabla . " WHERE UserID = " . $id;
        $resultado = $this->bd->query($consulta);

        // Verificamos si hay registros con dicha condición
        if ($resultado->num_rows == 0) {
            printf('No se encontró al usuario que buscas.');
        } else {
            // Se muestra al registro en forma de tabla (como en la función MostrarTodo)
            echo '<table><tr>';
            while ($campos = $resultado->fetch_field()) {
                echo '<td>' . $campos->name . '</td>';
            }
            echo '</tr>';
            while ($fila = $resultado->fetch_row()) {
                echo '<tr>';
                foreach ($fila as $columna) {
                    echo '<td>' . $columna . '</td>';
                }
                echo '</tr>';
            }
            echo '</table>';
        }

        // Liberar el contenido del resultado
        $resultado->close();
    }
    public function AgregarUsuario($id, $name)
    {
        $insertar = "INSERT INTO " . $this->tabla . " (UserID, Username) VALUES (" . $id . ", '" . $name . "');" or die('No se pudo añadir el producto por ' . mysqli_error());
        $this->bd->query($insertar);
        if ($this->bd->affected_rows != 0) {
            echo "Se añadió correctamente al usuario.";
        } else {
            echo "No se agregó al usuario.";
        }
    }
    public function ModificarUsuario($id, $name)
    {
        $modificar = "UPDATE " . $this->tabla . " SET Username = '" . $name . "' WHERE UserID = " . $id;
        $resultado = $this->bd->query($modificar) or die('No se pudo realizar correctamente la consulta.');
        if ($this->bd->affected_rows != 0) {
            echo "Se modificó correctamente al usuario.";
        } else {
            echo "No se actualizó al usuario.";
        }
    }
    public function EliminarUsuario($id)
    {
        $eliminar  = "DELETE FROM " . $this->tabla . " WHERE UserID = " . $id;
        $resultado = $this->bd->query($eliminar) or die('No se pudo realizar correctamente la consulta.');
        if ($this->bd->affected_rows != 0) {
            echo "Se eliminó correctamente al usuario.";
        } else {
            echo "No se pudo eliminar al usuario.";
        }
    }
}
