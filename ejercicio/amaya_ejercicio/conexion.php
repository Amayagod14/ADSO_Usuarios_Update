<?php
class Conexion {
    private static $host = 'localhost';
    private static $db = 'amaya';
    private static $user = 'root';
    private static $pass = 'root';
    private static $pdo;

    public static function conectar() {
        if (!isset(self::$pdo)) {
            try {
                self::$pdo = new PDO("mysql:host=" . self::$host . ";dbname=" . self::$db, self::$user, self::$pass);
                self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                echo 'Connection failed: ' . $e->getMessage();
            }
        }
        return self::$pdo;
    }
}
?>
