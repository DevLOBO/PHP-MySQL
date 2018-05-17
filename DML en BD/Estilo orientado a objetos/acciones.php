<?php
require_once "ClaseBD.class.php";
$ID = $_POST['UserID'];
$UN = $_POST['Username'];
$BD = new BaseDeDatos('localhost', 'root', '', 'Usuario', 'Usuario');
if (isset($_POST['Localizar'])) {
    $BD->MostrarUsuario($ID);
} else if (isset($_POST['Agregar'])) {
    $BD->AgregarUsuario($ID, $UN);
} else if (isset($_POST['Eliminar'])) {
    $BD->EliminarUsuario($ID);
} else if (isset($_POST['Modificar'])) {
    $BD->ModificarUsuario($ID, $UN);
}
$BD->Cerrar();
