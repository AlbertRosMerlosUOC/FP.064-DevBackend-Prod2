<?php

    $username = "root";
    $password = "Login";
    $database = "LoginP2";

    try {
        $conn = new PDO("mysql:host=mysql;dbname=$database;charset=utf8mb4", 
                        $username, 
                        $password, 
                        array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, // Activar el modo de errores de PDO
                        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ));  // Modo de recuperación de datos predeterminado
    } catch (PDOException $e) {
        die("Connection failed: " . $e->getMessage());
    }

?>
