<?php
    session_start();
    require_once '../../config/database.php';

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

<!DOCTYPE html>
<html lang="en">

    <head>
        <title>Creación de acto</title>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Shantell+Sans:wght@300&display=swap" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
              integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"/>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
                crossorigin="anonymous"></script>
        <link rel="stylesheet" href="../assets/css/style.css">
    </head>
    <body>
        <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/views/partials/header.php' ?>
        <h1>Crear Nuevo Acto</h1>
        <form action="models/actos.php" method="POST">
            <label>Fecha:</label>
            <input type="date" name="Fecha" id="Fecha" required><br>
            <label>Hora:</label>
            <input type="time" name="Hora" id="tipo_acto" required><br>
            <br>
            <label>Titulo:</label>
            <input type="text" name="Titulo" id="Titulo" required><br>
            <label>Descripcion_corta:</label>
            <input type="text" name="Descripcion_corta" id="Descripcion_corta" required><br>
            <label>Descripcion_larga:</label>
            <input type="text" name="Descripcion_larga" id="Descripcion_larga" required><br>
            <label>Número de asistentes:</label>
            <input type="number" name="Num_asistentes" id="Num_asistentes" required><br>
            <label>ID Acto:</label>
            <input type="number" name="Id_tipo_acto" id="Id_tipo_acto" required><br>
            <br>
            <button type="submit" name="crear_acto">Crear Acto</button>
            <button type="button" onclick="cancelarEdicion()">Cancelar</button>
        </form>
    </body>
</html>


