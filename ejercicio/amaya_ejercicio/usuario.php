<?php
include 'conexion.php';

class Usuario {
    public static function registrar($documento, $nombre, $contrasena, $fecha_nac, $foto) {
        $pdo = Conexion::conectar();
        $sql = "INSERT INTO tb_usuarios (documento, nombre, contrasena, fecha_nac, foto) VALUES (?, ?, ?, ?, ?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$documento, $nombre, password_hash($contrasena, PASSWORD_DEFAULT), $fecha_nac, $foto]);
    }

    public static function iniciarSesion($documento, $contrasena) {
        $pdo = Conexion::conectar();
        $sql = "SELECT * FROM tb_usuarios WHERE documento = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$documento]);
        $user = $stmt->fetch();

        if ($user && password_verify($contrasena, $user['contrasena'])) {
            session_start();
            $_SESSION['user'] = $user;
            return true;
        } else {
            return false;
        }
    }

    public static function obtenerTodos() {
        $pdo = Conexion::conectar();
        $sql = "SELECT * FROM tb_usuarios";
        $stmt = $pdo->query($sql);
        return $stmt->fetchAll();
    }

    public static function obtenerPorDocumento($documento) {
        $pdo = Conexion::conectar();
        $sql = "SELECT * FROM tb_usuarios WHERE documento = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$documento]);
        return $stmt->fetch();
    }

    public static function actualizar($documento, $nombre, $fecha_nac, $foto) {
        $pdo = Conexion::conectar();
        $sql = "UPDATE tb_usuarios SET nombre = ?, fecha_nac = ?, foto = ? WHERE documento = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$nombre, $fecha_nac, $foto, $documento]);
    }
}
?>
