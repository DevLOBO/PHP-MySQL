<?php
require_once 'FuncionesBD.php';
$ID = $_POST['UserID'];
$UN = $_POST['Username'];
$BD = new BaseDeDatos('localhost', 'root', '', 'Usuario', 'Usuario');
if (isset($_POST['Localizar'])) {
    $BD->Mostrar($ID);
} else if (isset($_POST['Agregar'])) {
    $BD->InsertarDatos($ID, $UN);
} else if (isset($_POST['Eliminar'])) {
    $BD->EliminarDatos($ID);
} else if (isset($_POST['Modificar'])) {
    $BD->ModificarDatos($ID, $UN);
}
$BD->CerrarBD();
