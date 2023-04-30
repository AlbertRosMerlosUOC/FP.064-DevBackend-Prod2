<?php
    session_start();
    require_once $_SERVER['DOCUMENT_ROOT'] . '/config/database.php';
    require_once $_SERVER['DOCUMENT_ROOT'] . '/php/controlUsuario.php';
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <title>Administración: <?=$user['email'] ?></title>
        <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/views/partials/includes.php' ?>
    </head>

    <body>
        <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/views/partials/header.php' ?>
        <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/views/partials/actosLista.php'; ?>
    </body>

</html>