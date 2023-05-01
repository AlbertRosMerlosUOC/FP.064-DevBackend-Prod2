<?php
    session_start();
    require_once $_SERVER['DOCUMENT_ROOT'] . '/config/database.php';
    require_once $_SERVER['DOCUMENT_ROOT'] . '/php/initUser.php';
    $action = 'actoUpdate';
    $actionText = 'Guardar';
    $botonNombre = "actualizar_acto";

?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <title>Edición de acto</title>
        <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/views/partials/includes.php' ?>
    </head>
    <body>
        <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/views/partials/header.php' ?>
        <h1 style="margin-bottom: 15px;">Borrar acto</h1>
        <form action="/models/_actos.php" method="POST">
            <button type="submit" class="btn btn-danger" name ="eliminar_acto">Borrar</button>
        </form>
    </body>
</html>