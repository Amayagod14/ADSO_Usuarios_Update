<?php
include 'Usuario.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $documento = $_POST['documento'];
    $contrasena = $_POST['contrasena'];

    if (Usuario::iniciarSesion($documento, $contrasena)) {
        header('Location: lista_usuarios.php');
    } else {
        echo 'Credenciales incorrectas';
    }
}
?>

<form method="post" action="login.php">
    Documento: <input type="text" name="documento" required><br>
    Contraseña: <input type="password" name="contrasena" required><br>
    <input type="submit" value="Iniciar Sesión">
</form>
