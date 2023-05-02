<?php
    session_start();
    require_once $_SERVER['DOCUMENT_ROOT'] . '/config/database.php';
    require_once $_SERVER['DOCUMENT_ROOT'] . '/php/initUser.php';
    require_once $_SERVER['DOCUMENT_ROOT'] . '/models/Acto.php';
    $action = 'actoUpdate';
    $actionText = 'Guardar';
    $botonNombre = "actualizar_acto";
    $id = intval($_GET['id']);

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
        <form action="/php/actosFormAccion.php" method="POST">
            <input type="hidden" id="Id_acto" name='Id_acto' value = "<?php echo $id; ?>">
            <button type="submit" class="btn btn-danger" name ="delete">Borrar</button>
        </form>
    </body>
</html>