<?php
    require_once $_SERVER['DOCUMENT_ROOT'] . '/models/TipoActo.php';

    class TipoActoCo {
        private $conn;

        public function __construct($conn) {
            $this->conn = $conn;
        }

        public function getAll() {
            $stmt = $this->conn->prepare("SELECT Id_tipo_acto, Descripcion FROM tipo_acto");
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function getById($id_tipo_acto) {
            try {
                $stmt = $this->conn->prepare("SELECT Id_tipo_acto, Descripcion FROM tipo_acto WHERE Id_tipo_acto = :id_tipo_acto");
                $stmt->bindParam(':id_tipo_acto', $id_tipo_acto);
                $stmt->execute();
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                if ($row) {
                    return new TipoActo($row['Id_tipo_acto'], $row['Descripcion']);
                } else {
                    return null;
                }
            } catch(PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
        }
    }
?>
