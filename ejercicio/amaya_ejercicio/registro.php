<?php
include 'Usuario.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $documento = $_POST['documento'];
    $nombre = $_POST['nombre'];
    $contrasena = $_POST['contrasena'];
    $fecha_nac = $_POST['fecha_nac'];
    $foto = $_POST['foto'];

    Usuario::registrar($documento, $nombre, $contrasena, $fecha_nac, $foto);

    header('Location: login.php');
}
?>

<form method="post" action="registro.php">
    Documento: <input type="text" name="documento" required><br>
    Nombre: <input type="text" name="nombre" required><br>
    Contraseña: <input type="password" name="contrasena" required><br>
    Fecha de Nacimiento: <input type="date" name="fecha_nac"><br>
    Foto: <input type="text" name="foto"><br>
    <input type="submit" value="Registrar">
</form>
