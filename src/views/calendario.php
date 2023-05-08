<?php
    session_start();
    require_once $_SERVER['DOCUMENT_ROOT'] . '/config/database.php';
    require_once $_SERVER['DOCUMENT_ROOT'] . '/php/initUser.php';
    require_once $_SERVER['DOCUMENT_ROOT'] . '/models/Acto.php';
    require_once $_SERVER['DOCUMENT_ROOT'] . '/controllers/ActoCo.php';
    // TODO 1. permitir inscribirse o desinscribirse (solo si no eres ponente). 2. ver si eres ponente o no. 3. acceder a la ficha de un acto, donde se vera lo mismo que acto pero con la lista de asistentes anonimizada
?>
<!DOCTYPE html>
<html lang="es">

    <head>
        <title>Calendario de actos</title>
        <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/views/partials/includes.php' ?>
    </head>

    <body>
        <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/views/partials/header.php' ?>
        <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/views/partials/calendarioLista.php'; ?>
    </body>
</html>


