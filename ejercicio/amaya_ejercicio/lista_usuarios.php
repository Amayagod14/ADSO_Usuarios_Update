<?php
include 'Usuario.php';
session_start();

if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit();
}

$usuarios = Usuario::obtenerTodos();
?>

<table border="1">
    <tr>
        <th>Documento</th>
        <th>Nombre</th>
        <th>Fecha de Nacimiento</th>
        <th>Foto</th>
        <th>Acciones</th>
    </tr>
    <?php foreach ($usuarios as $usuario): ?>
        <tr>
            <td><?php echo $usuario['documento']; ?></td>
            <td><?php echo $usuario['nombre']; ?></td>
            <td><?php echo $usuario['fecha_nac']; ?></td>
            <td><?php echo $usuario['foto']; ?></td>
            <td>
                <a href="actualizar.php?documento=<?php echo $usuario['documento']; ?>">Actualizar</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
<br>
<a href="registro.php">Vamos a registrar a un nuevo usuario!!!</a>