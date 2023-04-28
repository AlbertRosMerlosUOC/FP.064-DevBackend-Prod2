<?php
session_start();

require './config/database.php';

if (isset($_SESSION['Id_persona'])) {
    $records = $conn->prepare('SELECT Id_persona, email, password FROM personas WHERE Id_persona=:id');
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
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Shantell+Sans:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Welcome</title>
</head>

<body>

    <?php require 'partials/header.php' ?>

    <?php if (!empty($user)): ?>
        <br> Welcome.
        <?= $user['email']; ?>
        <br>You are Successfully Logged In
        <a href="logout.php">Logout</a>
    <?php else: ?>
        <h1> Please Login or SingUp </h1>

        <a href="login.php">Login</a> or
        <a href="signup.php">SignUp</a>
    <?php endif; ?>

        <h1>Eres un usuario</h1>

</body>

</html>



    <!-- Formulario para crear un nuevo acto

    <form method="POST" id="editar_acto_form" style="display: none;">
    <input type="hidden" name="id_acto" id="id_acto">

    <label>Fecha:</label>
    <input type="datetime-local" name="Fecha" id="Fecha" required><br>

    <label>Hora:</label>
    <input type="datetime-local" name="Hora" id="tipo_acto" required><br>

    <label>Titulo:</label>
    <input type="text" name="Titulo" id="Titulo" required><br>

    <label>Descripcion_corta:</label>
    <textarea name="Descripcion_corta" id="Descripcion_corta" required></textarea><br>

    <label>Descripcion_larga:</label>
    <input type="text" name="Descripcion_larga" id="Descripcion_larga" required><br>

    <label>Número de asistentes:</label>
    <input type="number" name="Num_asistentes" id="Num_asistentes" required><br>

    <button type="submit" name="editar_acto">Guardar cambios</button>
    <button type="button" onclick="cancelarEdicion()">Cancelar</button>
    </form>
     -->