<?php
    session_start();
    require_once $_SERVER['DOCUMENT_ROOT'] . '/config/database.php';
    require_once $_SERVER['DOCUMENT_ROOT'] . '/php/initUser.php';
    $action = 'actoUpdate';
    $actionText = 'Guardar';
?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <title>Edición de acto</title>
        <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/views/partials/includes.php' ?>
    </head>
    <body>
        <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/views/partials/header.php' ?>
        <h1 style="margin-bottom: 15px; padding-top: 8px;">Editar acto</h1>
        <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/views/partials/actosForm.php' ?>
    </body>
</html>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/php/actosFormLlenar.php' ?>

