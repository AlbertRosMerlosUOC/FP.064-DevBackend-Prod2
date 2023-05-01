<?php
    session_start();
    require_once $_SERVER['DOCUMENT_ROOT'] . '/config/database.php';
    require_once $_SERVER['DOCUMENT_ROOT'] . '/php/login.php';
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Gestor de eventos DevBackend - Login</title>
        <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/views/partials/includes.php' ?>
    </head>
    <body>
        <h1>Login</h1>
        <span>o <a href="signup.php">SignUp</a></span>
        <?php if (!empty($message)): ?>
            <p>
                <?= $message ?>
            </p>
        <?php endif; ?>
        <form class="formLogin" action="login.php" method="post">
            <input type="text" name="User" placeholder="Usuario">
            <input type="password" name="password" placeholder="Contraseña">
            <input type="submit" value="Acceder">
        </form>
    </body>
</html>