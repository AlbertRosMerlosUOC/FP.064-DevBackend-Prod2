<?php
    require_once $_SERVER['DOCUMENT_ROOT'] . '/models/Persona.php';
    
    class PersonaCo {
        private $conn;

        public function __construct($conn) {
            $this->conn = $conn;
        }

        public function getAll() {
            $stmt = $this->conn->prepare("SELECT Id_persona, Nombre, Apellido1, Apellido2, User, Email, Password, Id_tipo_usuario FROM personas");
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function getById($id_persona) {
            try {
                $stmt = $this->conn->prepare("SELECT Id_persona, Nombre, Apellido1, Apellido2, User, Email, Password, Id_tipo_usuario FROM personas WHERE Id_persona = :id_persona");
                $stmt->bindParam(':id_persona', $id_persona);
                $stmt->execute();
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                if ($row) {
                    return new Persona($row['Id_persona'], $row['Nombre'], $row['Apellido1'], $row['Apellido2'], $row['User'], $row['Email'], $row['Password'], $row['Id_tipo_usuario']);
                } else {
                    return null;
                }
            } catch(PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
        }

        public function getByTipo($Id_tipo) {
            $stmt = $this->conn->prepare("SELECT Id_persona, CONCAT_WS(' ', Apellido1, Apellido2, CONCAT(',', Nombre)) AS Nombre_completo FROM personas WHERE Id_tipo_usuario = :id_tipo");
            $stmt->bindParam(':id_tipo', $Id_tipo);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        
        public function insert($nombre, $apellido1, $apellido2, $user, $email, $password, $id_tipo_usuario) {
            try {
                $stmt = $this->conn->prepare("INSERT INTO personas (Nombre, Apellido1, Apellido2, User, Email, Password, Id_tipo_usuario) 
                VALUES (:nombre, :apellido1, :apellido2, :user, :email, :password, :id_tipo_usuario)");

                $stmt->bindParam(':nombre', $nombre);
                $stmt->bindParam(':apellido1', $apellido1);
                $stmt->bindParam(':apellido2', $apellido2);
                $stmt->bindParam(':user', $user);
                $stmt->bindParam(':email', $email);
                $stmt->bindParam(':password', $password);
                $stmt->bindParam(':id_tipo_usuario', $id_tipo_usuario);

                $stmt->execute();
                echo "Persona guardada correctamente en la base de datos.";
            } catch(PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
        }

        public function update($id_persona, $nombre, $apellido1, $apellido2, $user, $email, $password, $id_tipo_usuario) {
            try {
                $stmt = $this->conn->prepare("UPDATE personas SET Nombre = :nombre, Apellido1 = :apellido1, Apellido2 = :apellido2, User = :user, Email = :email, Password = :password, Id_tipo_usuario = :id_tipo_usuario WHERE Id_persona = :id_persona");

                $stmt->bindParam(':id_persona', $id_persona);
                $stmt->bindParam(':nombre', $nombre);
                $stmt->bindParam(':apellido1', $apellido1);
                $stmt->bindParam(':apellido2', $apellido2);
                $stmt->bindParam(':user', $user);
                $stmt->bindParam(':email', $email);
                $stmt->bindParam(':password', $password);
                $stmt->bindParam(':id_tipo_usuario', $id_tipo_usuario);

                $stmt->execute();
                echo "Acto actualizado correctamente en la base de datos.";
            } catch(PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
        }
    }
?>