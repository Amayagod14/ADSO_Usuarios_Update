<?php
include 'Usuario.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['documento'])) {
    $documento = $_GET['documento'];
    $usuario = Usuario::obtenerPorDocumento($documento);
} elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $documento = $_POST['documento'];
    $nombre = $_POST['nombre'];
    $fecha_nac = $_POST['fecha_nac'];
    $foto = $_POST['foto'];

    Usuario::actualizar($documento, $nombre, $fecha_nac, $foto);

    header('Location: lista_usuarios.php');
}
?>

<form method="post" action="actualizar.php">
    <input type="hidden" name="documento" value="<?php echo $usuario['documento']; ?>">
    Nombre: <input type="text" name="nombre" value="<?php echo $usuario['nombre']; ?>" required><br>
    Fecha de Nacimiento: <input type="date" name="fecha_nac" value="<?php echo $usuario['fecha_nac']; ?>"><br>
    Foto: <input type="text" name="foto" value="<?php echo $usuario['foto']; ?>"><br>
    <input type="submit" value="Actualizar">
</form>
<br>
<a href="registro.php">Vamos a registrar a un nuevo usuario!!!</a>