<?php
    session_start();
    require_once $_SERVER['DOCUMENT_ROOT'] . '/config/database.php';
    require_once $_SERVER['DOCUMENT_ROOT'] . '/php/initUser.php';
    $action = 'actoInsert';
    $actionText = 'Crear';
?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <title>Creación de acto</title>
        <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/views/partials/includes.php' ?>
    </head>
    <body>
        <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/views/partials/header.php' ?>
        <h1 style="margin-bottom: 15px; padding-top: 8px;">Nuevo acto</h1>
        <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/views/partials/actosForm.php' ?>
    </body>
</html>


