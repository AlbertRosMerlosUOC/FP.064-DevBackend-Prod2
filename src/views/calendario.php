<?php
session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . '/config/database.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/php/initUser.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/models/Acto.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/controllers/ActoCo.php';

$acto = new ActoCo($conn);
$actos = $acto->getAll();


?>


<!-- mostrar actos -->

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Calendario</title>

</head>

<body>
    <div class="container">
        <div class="row">
        <div class="px-3 py-5" style="width: 100%; display: flex; justify-content: center; align-items: center; margin: 0 auto;">
                <h1 style="margin-bottom: 15px;">Calendario</h1>
                <div id="calendar"></div>
            </div>
        </div>
    </div>
    <div class="px-3 py-5" style="width: 100%; display: flex; justify-content: center; align-items: center;">
    <table class="table table-hover" style="width: 70%;">
        <thead style="background-color: #E9ECEF;">
            <tr>
                <th scope="col">Fecha</th>
                <th scope="col">Hora</th>
                <th scope="col">Titulo</th>
                <th scope="col">Descripción</th>
                <th scope="col">Nº asistentes</th>
            </tr>
        </thead>
        <tbody>
            <?php
                if (count($actos) > 0) {
                    foreach ($actos as $reg) {
                        echo "<tr>
                                <td>". $reg['Fecha'] . "</td>
                                <td>". $reg['Hora'] . "</td>
                                <td align='left'>". $reg['Titulo'] . "</td>
                                <td align='left'>". $reg['Descripcion_corta'] . "</td>
                                <td>". $reg['Num_asistentes'] . "</td>
                            </tr>";
                    }
                } else {
                    echo "<tr>
                            <td colspan='8'>No existen actos creados</td>
                        </tr>";
                }
            ?>
        </tbody>
    </table>
</div>
</body>


