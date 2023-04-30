<?php
    require_once $_SERVER['DOCUMENT_ROOT'] . '/models/TipoActo.php';
    class TipoActoCo {
        private $conn;

        public function __construct($conn) {
            $this->conn = $conn;
        }

        public function getAll() {
            $stmt = $this->conn->prepare("SELECT * FROM tipo_acto");
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
    }
?>
