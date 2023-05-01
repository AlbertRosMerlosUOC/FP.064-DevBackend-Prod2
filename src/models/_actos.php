<?php
    session_start();
    require '../config/database.php';

    if(isset($_POST['crear_acto'])) {
        // Obtener los datos del formulario
        $fecha = $_POST['Fecha'];
        $hora = $_POST['Hora'];
        $titulo = $_POST['Titulo'];
        $descripcion_c = $_POST['Descripcion_corta'];
        $descripcion_l = $_POST['Descripcion_larga'];
        $asistentes = $_POST['Num_asistentes'];
        $Id_tipo_acto = $_POST['Id_tipo_acto'];

        // Crear una instancia de la clase Actos y llamar a su método insert()
        $actos = new Actos();
        $actos->insert($fecha, $hora, $titulo, $descripcion_c, $descripcion_l, $asistentes, $Id_tipo_acto);
    }

    if(isset($_POST['actualizar_acto'])) {
        // Obtener los datos del formulario
        $fecha = $_POST['Fecha'];
        $hora = $_POST['Hora'];
        $titulo = $_POST['Titulo'];
        $descripcion_c = $_POST['Descripcion_corta'];
        $descripcion_l = $_POST['Descripcion_larga'];
        $asistentes = $_POST['Num_asistentes'];
        $Id_tipo_acto = $_POST['Id_tipo_acto'];

        // Crear una instancia de la clase Actos y llamar a su método update()
        $actos = new Actos();
        $actos->update($fecha, $hora, $titulo, $descripcion_c, $descripcion_l, $asistentes, $Id_tipo_acto);
    }

    class Actos {
        private $conn;

        public function __construct() {
            // Establecer la conexión en el constructor
            global $conn;
            $this->conn = $conn;
        }

        public function insert($fecha, $hora, $titulo, $descripcion_c, $descripcion_l, $asistentes, $Id_tipo_acto) {
            try {
                // Preparar la consulta
                $stmt = $this->conn->prepare("INSERT INTO actos (Fecha, Hora, Titulo, Descripcion_corta, Descripcion_larga, Num_asistentes, Id_tipo_acto) 
                VALUES (:fecha, :hora, :titulo, :descripcion_c, :descripcion_l, :asistentes, :Id_tipo_acto)");

                // Bind parameters
                $stmt->bindParam(':fecha', $fecha);
                $stmt->bindParam(':hora', $hora);
                $stmt->bindParam(':titulo', $titulo);
                $stmt->bindParam(':descripcion_c', $descripcion_c);
                $stmt->bindParam(':descripcion_l', $descripcion_l);
                $stmt->bindParam(':asistentes', $asistentes);
                $stmt->bindParam(':Id_tipo_acto', $Id_tipo_acto);

                // Ejecutar la consulta
                $stmt->execute();
                echo "Acto guardado correctamente en la base de datos.";
            } catch(PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
        }

        public function update($id, $fecha, $hora, $titulo, $descripcion_c, $descripcion_l, $asistentes, $Id_tipo_acto) {
            try {
                // Preparar la consulta
                $stmt = $this->conn->prepare("UPDATE actos SET Fecha = :fecha, Hora = :hora, Titulo = :titulo, Descripcion_corta = :descripcion_c, Descripcion_larga = :descripcion_l, Num_asistentes = :asistentes, Id_tipo_acto = :Id_tipo_acto WHERE Id = :id");

                // Bind parameters
                $stmt->bindParam(':id', $id);
                $stmt->bindParam(':fecha', $fecha);
                $stmt->bindParam(':hora', $hora);
                $stmt->bindParam(':titulo', $titulo);
                $stmt->bindParam(':descripcion_c', $descripcion_c);
                $stmt->bindParam(':descripcion_l', $descripcion_l);
                $stmt->bindParam(':asistentes', $asistentes);
                $stmt->bindParam(':Id_tipo_acto', $Id_tipo_acto);

                // Ejecutar la consulta
                $stmt->execute();
                echo "Acto actualizado correctamente en la base de datos.";
            } catch(PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
        }
    }
?>