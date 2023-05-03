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
        <link rel="stylesheet" href="/assets/css/login.css">
    </head>
    <body>
        <main class="form-signin" style="max-width: 450px !important;">
            <h1 class="mb-3">DevBackend</h1>
            <div class="form-floating">
                <?php if (!empty($user)): ?>
                    ¡Bienvenid@  <?= $user['User']; ?>!<br/>
                    Ya estás correctamente loginad@. Accede a la <a href="/views/main.php">aplicación</a> o, si quieres salir, puedes hacer <a href="/php/logout.php">logout</a>
                <?php else: ?>
                    <p class="mt-3">¿Ya estás registrad@? Inicia sesión <a href="login.php">aquí</a></p>
                    <p class="mt-3">¿No tienes usuario? Regístrate <a href="signup.php">aquí</a></p>
                <?php endif; ?>
            </div>
        </main>
    </body>
</html>