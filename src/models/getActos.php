<?php
        session_start();

        require './config/database.php';

        $records = $conn->prepare('SELECT Id_acto, Fecha, Hora, Titulo, Descripcion_corta, Descripcion_larga, Num_asistentes FROM actos');
        $records->execute();
        $results = $records->fetchAll(PDO::FETCH_ASSOC);
?>
        <h1>Actos existentes</h1>

<?php
        if (count($results) > 0) {
                foreach ($results as $acto) {
                echo "Fecha: " . $acto['Fecha'] . "<br>";
                echo "Hora: " . $acto['Hora'] . "<br>";
                echo "Título: " . $acto['Titulo'] . "<br>";
                echo "Descripción corta: " . $acto['Descripcion_corta'] . "<br>";
                echo "Descripción larga: " . $acto['Descripcion_larga'] . "<br>";
                echo "Número de asistentes: " . $acto['Num_asistentes'] . "<br>";
                echo "<td>";
                echo "<br>";
                echo "<button onclick='editarActo(" . $acto["Id_acto"] . ")'>Editar</button>" . "<br>";
                echo "<br>";
                echo "<button onclick='eliminarActo(" . $acto["Id_acto"] . ")'>Eliminar</button>";
                echo "</td>";
                echo "<br>";
                echo "<br>";
                }
        } else {
                echo "No hay actos existentes.";
        }
?>
