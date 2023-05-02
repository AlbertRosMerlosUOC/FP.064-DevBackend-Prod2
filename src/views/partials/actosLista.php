<?php
    session_start();
    require_once $_SERVER['DOCUMENT_ROOT'] . '/models/Acto.php';
    require_once $_SERVER['DOCUMENT_ROOT'] . '/controllers/ActoCo.php';

    $acto = new ActoCo($conn);
    $actos = $acto->getAll();
?>

<div class="px-3 py-5" style="width: 100%; display: flex; justify-content: center; align-items: center;">
    <table class="table table-hover" style="width: 70%;">
        <thead>
            <tr>
                <td align="left" colspan="6"><h1 class="pb-2 border-bottom" style="text-align: left;">Gestión de actos</h1></td>
                <td><a href="/views/admin/actosNuevo.php"><button class="btn btn-success"><i class="fa fa-plus fa-lg"></i>&nbsp;Crear acto</button></a></td>
            </tr>
        </thead>
        <thead style="background-color: #E9ECEF;">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Fecha</th>
                <th scope="col">Hora</th>
                <th scope="col">Titulo</th>
                <th scope="col">Descripción</th>
                <th scope="col">Nº asistentes</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php
                if (count($actos) > 0) {
                    foreach ($actos as $reg) {
                        echo "<tr>
                                <td>". $reg["Id_acto"] . "</th>
                                <td>". $reg['Fecha'] . "</td>
                                <td>". $reg['Hora'] . "</td>
                                <td align='left'>". $reg['Titulo'] . "</td>
                                <td align='left'>". $reg['Descripcion_corta'] . "</td>
                                <td>". $reg['Num_asistentes'] . "</td>
                                <td>
                                    <button class=\"btn btn-primary\" onclick='editarActo(" . $reg["Id_acto"] . ")'><i class=\"fa fa-edit fa-lg\"></i></button>
                                    <button class=\"btn btn-danger\"  onclick='eliminarActo(" . $reg["Id_acto"] . ")'><i class=\"fa fa-trash-o fa-lg\"></i></button>
                                </td>
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

<script>
        function editarActo(id) {
            var url = "/views/admin/actosEditar.php?id=" + id;
            window.location.href = url;
        }

        function eliminarActo(id){
            var url = "/views/admin/actosEliminar.php?id=" + id;
            window.location.href = url;
        }
    </script>
