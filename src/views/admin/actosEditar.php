<?php
    session_start();
    require_once $_SERVER['DOCUMENT_ROOT'] . '/config/database.php';
    require_once $_SERVER['DOCUMENT_ROOT'] . '/php/controlUsuario.php';
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
        <h1 style="margin-bottom: 15px;">Editar acto</h1>
        <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/views/partials/actosForm.php' ?>
    </body>
</html>

<?php
    $id_acto = $_GET['id'];
    $actoCo = new ActoCo($conn);
    $acto = $actoCo->getById($id_acto);

    if ($acto) {
        $idActo = $acto->getId_acto();
        $fecha = $acto->getFecha();
        $hora = $acto->getHora();
        $titulo = $acto->getTitulo();
        $descripcion_corta = $acto->getDescripcion_corta();
        $descripcion_larga = $acto->getDescripcion_larga();
        $num_asistentes = $acto->getNum_asistentes();
        $id_tipo_acto = $acto->getId_tipo_acto();
    
        echo '<script>
                document.getElementById("Id_acto").value = "' . $idActo . '";
                document.getElementById("Fecha").value = "' . $fecha . '";
                document.getElementById("Hora").value = "' . $hora . '";
                document.getElementById("Titulo").value = "' . $titulo . '";
                document.getElementById("Descripcion_corta").value = "' . $descripcion_corta . '";
                document.getElementById("Descripcion_larga").value = "' . $descripcion_larga . '";
                document.getElementById("Num_asistentes").value = "' . $num_asistentes . '";
                document.getElementById("Id_tipo_acto").value = "' . $id_tipo_acto . '";
              </script>';
      }
?>

