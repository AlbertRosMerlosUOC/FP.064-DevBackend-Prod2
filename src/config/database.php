<?php

$username = "root";
$password = "Login";
$database = "Word";

try {
    $conn = new PDO("mysql:host=mysql;dbname=$database;", $username, $password);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

?>