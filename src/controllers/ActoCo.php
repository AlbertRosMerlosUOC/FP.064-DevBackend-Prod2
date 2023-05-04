<?php
    require_once $_SERVER['DOCUMENT_ROOT'] . '/models/Acto.php';
    
    class ActoCo {
        private $conn;

        public function __construct($conn) {
            $this->conn = $conn;
        }

        public function getAll() {
            $stmt = $this->conn->prepare("SELECT Id_acto, Fecha, TIME_FORMAT(Hora, '%H:%i') Hora, Titulo, Descripcion_corta, Descripcion_larga, Num_asistentes, Id_tipo_acto FROM actos");
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function getAllByDate($fecha) {
            $stmt = $this->conn->prepare("SELECT Id_acto, Fecha, TIME_FORMAT(Hora, '%H:%i') Hora, Titulo, Descripcion_corta, Descripcion_larga, Num_asistentes, Id_tipo_acto FROM actos WHERE Fecha = :fecha");
            $stmt->bindParam(':fecha', $fecha);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function getById($id_acto) {
            try {
                $stmt = $this->conn->prepare("SELECT Id_acto, Fecha, TIME_FORMAT(Hora, '%H:%i') Hora, Titulo, Descripcion_corta, Descripcion_larga, Num_asistentes, Id_tipo_acto FROM actos WHERE Id_acto = :id_acto");
                $stmt->bindParam(':id_acto', $id_acto);
                $stmt->execute();
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                if ($row) {
                    return new Acto($row['Id_acto'], $row['Fecha'], $row['Hora'], $row['Titulo'], $row['Descripcion_corta'], $row['Descripcion_larga'], $row['Num_asistentes'], $row['Id_tipo_acto']);
                } else {
                    return null;
                }
            } catch(PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
        }
        

        public function insert($fecha, $hora, $titulo, $descripcion_c, $descripcion_l, $asistentes, $Id_tipo_acto) {
            try {
                $stmt = $this->conn->prepare("INSERT INTO actos (Fecha, Hora, Titulo, Descripcion_corta, Descripcion_larga, Num_asistentes, Id_tipo_acto) 
                VALUES (:fecha, :hora, :titulo, :descripcion_c, :descripcion_l, :asistentes, :Id_tipo_acto)");

                $stmt->bindParam(':fecha', $fecha);
                $hora_completa = $hora . ':00';
                $stmt->bindParam(':hora', $hora_completa);
                $stmt->bindParam(':titulo', $titulo);
                $stmt->bindParam(':descripcion_c', $descripcion_c);
                $stmt->bindParam(':descripcion_l', $descripcion_l);
                $stmt->bindParam(':asistentes', $asistentes);
                $stmt->bindParam(':Id_tipo_acto', $Id_tipo_acto);

                $stmt->execute();
                $id_insertado = $this->conn->lastInsertId();
                $_SESSION['estadoAccion'] = 'ok';
                header("Location: /views/admin/actosEditar.php?id=" . $id_insertado);
            } catch(PDOException $e) {
                $_SESSION['estadoAccion'] = 'ko';
                header("Location: /views/admin/actosEditar.php?id=" . $id_acto);
            }
        }

        public function update($id_acto, $fecha, $hora, $titulo, $descripcion_c, $descripcion_l, $asistentes, $Id_tipo_acto) {
            try {
                $stmt = $this->conn->prepare("UPDATE actos SET Fecha = :fecha, Hora = :hora, Titulo = :titulo, Descripcion_corta = :descripcion_c, Descripcion_larga = :descripcion_l, Num_asistentes = :asistentes, Id_tipo_acto = :Id_tipo_acto WHERE Id_acto = :id_acto");

                $stmt->bindParam(':id_acto', $id_acto);
                $stmt->bindParam(':fecha', $fecha);
                $hora_completa = $hora . ':00';
                $stmt->bindParam(':hora', $hora_completa);
                $stmt->bindParam(':titulo', $titulo);
                $stmt->bindParam(':descripcion_c', $descripcion_c);
                $stmt->bindParam(':descripcion_l', $descripcion_l);
                $stmt->bindParam(':asistentes', $asistentes);
                $stmt->bindParam(':Id_tipo_acto', $Id_tipo_acto);

                $stmt->execute();
                $_SESSION['estadoAccion'] = 'ok';
                header("Location: /views/admin/actosEditar.php?id=" . $id_acto);
            } catch(PDOException $e) {
                $_SESSION['estadoAccion'] = 'ko';
                header("Location: /views/admin/actosEditar.php?id=" . $id_acto);
            }
        }

        public function delete($id) {
            try {
                $stmt = $this->conn->prepare("DELETE FROM actos WHERE Id_acto = :id");
                $stmt->bindParam(':id', $id);
                $stmt->execute();
                $_SESSION['estadoAccion'] = 'ok';
                header("Location: /views/actos.php");
            } catch(PDOException $e) {
                $_SESSION['estadoAccion'] = 'ko';
                header("Location: /views/actos.php");
            }
        }
    }
?>
