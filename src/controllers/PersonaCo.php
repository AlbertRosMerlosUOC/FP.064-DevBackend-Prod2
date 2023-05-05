<?php
    require_once $_SERVER['DOCUMENT_ROOT'] . '/models/Persona.php';
    
    class PersonaCo {
        private $conn;

        public function __construct($conn) {
            $this->conn = $conn;
        }

        public function getAll() {
            $stmt = $this->conn->prepare("SELECT Id_persona, Nombre, Apellido1, Apellido2, User, Email, Password, Id_tipo_usuario, Anonimo FROM personas");
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function getById($id_persona) {
            try {
                $stmt = $this->conn->prepare("SELECT Id_persona, Nombre, Apellido1, Apellido2, User, Email, Password, Id_tipo_usuario , Anonimo FROM personas WHERE Id_persona = :id_persona");
                $stmt->bindParam(':id_persona', $id_persona);
                $stmt->execute();
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                if ($row) {
                    return new Persona($row['Id_persona'], $row['Nombre'], $row['Apellido1'], $row['Apellido2'], $row['User'], $row['Email'], $row['Password'], $row['Id_tipo_usuario'], $row['Anonimo']);
                } else {
                    return null;
                }
            } catch(PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
        }

        public function getByTipo($Id_tipo) {
            $stmt = $this->conn->prepare("SELECT Id_persona, CONCAT(CONCAT_WS(' ', Apellido1, Apellido2), CONCAT(', ', Nombre)) AS Nombre_completo FROM personas WHERE Id_tipo_usuario = :id_tipo");
            $stmt->bindParam(':id_tipo', $Id_tipo);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function getPonenteEnActo($Id_acto) {
            $stmt = $this->conn->prepare("SELECT pe.Id_persona, CONCAT(CONCAT_WS(' ', pe.Apellido1, pe.Apellido2), CONCAT(', ', pe.Nombre)) AS Nombre_completo, 
                                                 (SELECT COUNT(*) FROM personas_actos pa WHERE pa.Id_persona = pe.Id_persona AND pa.Id_acto = :id_acto AND pa.Ponente = 1) En_acto 
                                            FROM personas pe 
                                           WHERE pe.Id_tipo_usuario = 3 
                                             AND pe.Id_persona NOT IN (SELECT px.Id_persona FROM personas_actos px WHERE px.Id_acto = :id_acto AND px.Ponente = 0) 
                                        ORDER BY 2;");
            $stmt->bindParam(':id_acto', $Id_acto);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        
        public function insert($nombre, $apellido1, $apellido2, $user, $email, $password, $id_tipo_usuario) {
            try {
                $stmt = $this->conn->prepare("INSERT INTO personas (Nombre, Apellido1, Apellido2, User, Email, Password, Id_tipo_usuario, Anonimo) 
                VALUES (:nombre, :apellido1, :apellido2, :user, :email, :password, :id_tipo_usuario, 0)");

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

        public function update($id_persona, $nombre, $apellido1, $apellido2, $email, $password, $id_tipo_usuario, $anonimo) {
            try {
                $stmt = $this->conn->prepare("UPDATE personas SET Nombre = :nombre, Apellido1 = :apellido1, Apellido2 = :apellido2, Email = :email, Anonimo = :anonimo WHERE Id_persona = :id_persona");
                $stmt->bindParam(':id_persona', $id_persona);
                $stmt->bindParam(':nombre', $nombre);
                $stmt->bindParam(':apellido1', $apellido1);
                $stmt->bindParam(':apellido2', $apellido2);
                $stmt->bindParam(':email', $email);
                $stmt->bindParam(':anonimo', $anonimo);
                $stmt->execute();

                if (!empty($password)) {
                    $stm2 = $this->conn->prepare("UPDATE personas SET Password = :password WHERE Id_persona = :id_persona");
                    $stm2->bindParam(':id_persona', $id_persona);
                    $stm2->bindParam(':password', $password);
                    $stm2->execute();
                }

                if (!empty($id_tipo_usuario)) {
                    $stm3 = $this->conn->prepare("UPDATE personas SET Id_tipo_usuario = :id_tipo_usuario WHERE Id_persona = :id_persona");
                    $stm3->bindParam(':id_persona', $id_persona);
                    $stm3->bindParam(':id_tipo_usuario', $id_tipo_usuario);
                    $stm3->execute();
                }

                $_SESSION['estadoAccion'] = 'ok';
                if (!empty($id_tipo_usuario)) {
                    header("Location: /views/admin/usuariosEditar.php?id=" . $id_persona);
                } else {
                    header("Location: /views/profile.php?id=" . $id_persona);
                }
            } catch(PDOException $e) {
                $_SESSION['estadoAccion'] = 'ko';
                if (!empty($id_tipo_usuario)) {
                    header("Location: /views/profile.php?id=" . $id_persona);
                } else {
                    header("Location: /views/admin/usuariosEditar.php?id=" . $id_persona);
                }
            }
        }
    }
?>