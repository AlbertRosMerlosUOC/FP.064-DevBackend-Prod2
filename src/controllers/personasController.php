<?php
    require_once '../config/database.php';

    class PersonaController {
    // Función para obtener todos los usuarios de la base de datos
    public function getPersonas() {
        $db = new Database();
        $conn = $db->getConnection();
        $stmt = $conn->prepare("SELECT * FROM personas");
        $stmt->execute();
        $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $users;
    }

    // Función para agregar un nuevo usuario a la base de datos
    public function addPersona($username, $email, $password) {
        $db = new Database();
        $conn = $db->getConnection();
        $stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (:username, :email, :password)");
        $stmt->bindParam(":username", $username);
        $stmt->bindParam(":email", $email);
        $stmt->bindParam(":password", $password);
        $stmt->execute();
    }

    // Función para eliminar un usuario de la base de datos
    public function deletePersona($id) {
        $db = new Database();
        $conn = $db->getConnection();
        $stmt = $conn->prepare("DELETE FROM users WHERE id=:id");
        $stmt->bindParam(":id", $id);
        $stmt->execute();
    }
    }
?>