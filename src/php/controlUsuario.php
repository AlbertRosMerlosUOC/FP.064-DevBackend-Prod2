<?php
    // Verificar si el usuario ha iniciado sesión como administrador
    if (isset($_SESSION['Id_persona']) && $_SESSION['Id_persona'] == 1) {
        $records = $conn->prepare('SELECT Id_persona, nombre, apellido1, apellido2, email, password FROM personas WHERE Id_persona=:id');
        $records->bindParam(':id', $_SESSION['Id_persona']);
        $records->execute();
        $results = $records->fetch(PDO::FETCH_ASSOC);

        $user = null;

        if (count($results) > 0) {
            $user = $results;
        }
    }
?>