<?php
    session_start();
    require_once $_SERVER['DOCUMENT_ROOT'] . '/config/database.php';
    require_once $_SERVER['DOCUMENT_ROOT'] . '/php/initUser.php';
    $action = 'update';
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
        <div class="container px-3 py-5">
            <h1 class="pb-2 border-bottom" style="text-align: left;">Editar acto</h1>
            <div class="container" style="justify-content: center; align-items: center; width: 600px;">
                <div style="display: flex; justify-content: center; align-items: center; margin-top: 20px;">
                    <ul class="nav nav-tabs" id="actosTab" style="width: 600px;" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="datos-tab" data-bs-toggle="tab" data-bs-target="#datos" type="button" role="tab" aria-controls="datos" aria-selected="true">Datos generales</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="ponentes-tab" data-bs-toggle="tab" data-bs-target="#ponentes" type="button" role="tab" aria-controls="ponentes" aria-selected="false">Ponentes</button>
                        </li>
                    </ul>
                </div>
                <div class="tab-content clearfix formulario-datos" style="width: 576px;" id="actosTabContent">
                    <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/views/partials/actosForm.php' ?>
                    <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/views/partials/actosPonentes.php' ?>
                </div>
            </div>
        </div>

    </body>
</html>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/php/actosFormLlenar.php' ?>

