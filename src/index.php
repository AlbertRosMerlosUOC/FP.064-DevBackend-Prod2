<?php
    session_start();
    require_once $_SERVER['DOCUMENT_ROOT'] . '/config/database.php';
    require_once $_SERVER['DOCUMENT_ROOT'] . '/php/controlUsuario.php';
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Gestor de eventos DevBackend</title>
        <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/views/partials/includes.php' ?>
    </head>
    <body>
        <?php if (!empty($user)): ?>
            <br>¡Bienvenid@  <?= $user['User']; ?>!
            <br>Ya estás correctamente loginad@. Si quieres salir, puedes hacer <a href="php/logout.php">logout</a>
        <?php else: ?>
            <h1>Por favor, accede o crea un usuario:</h1>
            <a href="login.php">Login</a> o
            <a href="signup.php">SignUp</a>
        <?php endif; ?>
    </body>
</html>