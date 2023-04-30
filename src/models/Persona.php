<?php
    class Persona {
        private $conn;

        public function __construct(PDO $conn) {
            $this->conn = $conn;
        }

        public function getAll() {
            $stmt = $this->conn->prepare("SELECT * FROM personas");
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
    }
?>
