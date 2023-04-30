<?php
    function getConnection() {
        $host = 'mysql';
        $username = "root";
        $password = "Login";
        $database = "Word";
        $url = "mysql:host=$host;dbname=$db;charset=utf8mb4";

    try {
        $conn = new PDO($url, 
                        $username, 
                        $password, 
                        array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, // Activar el modo de errores de PDO
                        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ));  // Modo de recuperación de datos predeterminado
        return $conn;
    } catch (PDOException $e) {
        throw new PDOException($e->getMessage(), (int)$e->getCode());
    }
?>
