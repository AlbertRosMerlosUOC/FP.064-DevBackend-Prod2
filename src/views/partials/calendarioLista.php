<?php
    require_once $_SERVER['DOCUMENT_ROOT'] . '/php/calendarioListaLlenar.php';
?>

<div class="px-3 py-5" style="width: 100%; display: flex; justify-content: center; align-items: center;">
    <table class="table" style="width: 70%;">
        <thead>
            <tr>
                <td align="left" colspan="4" style="padding-right: 0px !important;"><h1 class="pb-2 border-bottom" style="text-align: left;">Calendario de actos</h1></td>
                <td align="right" colspan="5" style="padding-left: 0px !important;">
                    <h1 class="pb-2 border-bottom">
                        <div style="height: 47.5px !important; font-size: 18px; display: flex !important; align-items: flex-end !important; margin-left: 20%;">
                            <span style="padding-bottom: 5px;">Filtrar por:</span>
                            <div style="margin-left: 15px; display: flex !important; flex-wrap: nowrap !important;">
                                <div class="btn-group btn-group-sm" role="group" aria-label="Filtro de fechas" style="margin-right: 15px;">
                                    <input type="radio" class="btn-check" name="btnradio" id="btnradio1" autocomplete="off" <?php echo ($_GET['tDate'] == 1 ? 'checked="checked"' : ''); ?> onclick="showInput('1')">
                                    <label class="btn btn-outline-primary" for="btnradio1">Día</label>
                                    <input type="radio" class="btn-check" name="btnradio" id="btnradio2" autocomplete="off" <?php echo ($_GET['tDate'] == 2 ? 'checked="checked"' : ''); ?> onclick="showInput('2')">
                                    <label class="btn btn-outline-primary" for="btnradio2">Semana</label>
                                    <input type="radio" class="btn-check" name="btnradio" id="btnradio3" autocomplete="off" <?php echo ($_GET['tDate'] == 3 ? 'checked="checked"' : ''); ?> onclick="showInput('3')">
                                    <label class="btn btn-outline-primary" for="btnradio3">Mes</label>
                                </div>
                                <input id="filtro1" name="filtro1" type="date"  class="form-control filtroFecha" style="font-size: 14px !important; display: <?php echo ($_GET['tDate'] == 1 ? 'block' : 'none'); ?>;" value="<?php echo ($_GET['tDate'] == 1 ? $_GET['fDate'] : ''); ?>"/>
                                <input id="filtro2" name="filtro2" type="week"  class="form-control filtroFecha" style="font-size: 14px !important; display: <?php echo ($_GET['tDate'] == 2 ? 'block' : 'none'); ?>;" value="<?php echo ($_GET['tDate'] == 2 ? $_GET['fDate'] : ''); ?>">
                                <input id="filtro3" name="filtro3" type="month" class="form-control filtroFecha" style="font-size: 14px !important; display: <?php echo ($_GET['tDate'] == 3 ? 'block' : 'none'); ?>;" value="<?php echo ($_GET['tDate'] == 3 ? $_GET['fDate'] : ''); ?>"/>
                                <button class="btn btn-primary" onclick='buscarActos();' style="margin-left: 15px; height: 35px;"><i class="fa fa-search fa-1"></i></button>
                            </div>
                        </div>
                    </h1>
                </td>
            </tr>
        </thead>
        <thead style="background-color: #E9ECEF;">
            <tr>
                <th scope="col" width="60px">#</th>
                <th scope="col" width="110px">Fecha</th>
                <th scope="col" width="80px">Hora</th>
                <th scope="col" width="190px" style="text-align: left;">Tipo</th>
                <th scope="col" width="200px" style="text-align: left;">Titulo</th>
                <th scope="col" width="320px" style="text-align: left;">Descripción</th>
                <th scope="col" width="110px">Nº asistentes</th>
                <th scope="col" width="110px">Nº inscritos</th>
                <th scope="col" width="*">Acciones</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td colspan="9" style="padding: 0px !important;">
                    <div class="div-listado" style="width: 100%;">
                        <table class="table table-hover" style="width: 100%;">
                            <tbody>
                                <?php
                                    if (count($actos) > 0) {
                                        foreach ($actos as $reg) {
                                            $fila = "<tr style=\"padding: 0px; margin: 0px;\" class=\"acto-rol" . $reg['Rol'] . "\">
                                                        <td width=\"60px\">". $reg["Id_acto"] . "</th>
                                                        <td width=\"110px\">". date('d/m/Y', strtotime($reg['Fecha'])) . "</td>
                                                        <td width=\"80px\">". $reg['Hora'] . "</td>
                                                        <td width=\"190px\" align='left'>". $reg['Tipo_acto'] . "</td>
                                                        <td width=\"200px\" align='left'>". $reg['Titulo'] . "</td>
                                                        <td width=\"320px\" align='left'>". $reg['Descripcion_corta'] . "</td>
                                                        <td width=\"110px\">". $reg['Num_asistentes'] . "</td>
                                                        <td width=\"110px\">". $reg['Num_inscritos'] . "</td>
                                                        <td width=\"*\">";

                                            if ($reg['Rol'] == '0' || $reg['Rol'] == '1') {
                                                if ($reg['Rol'] == '0') {
                                                    $fila .= "<button class=\"btn btn-danger\" onclick='inscribir(\"B\", " . $reg["Id_acto"] . ")'><i class=\"fa fa-user-times fa-2\"></i></button>";
                                                } else {
                                                    $fila .= "<button class=\"btn btn-secondary\" onclick='return;'><i class=\"fa fa-user-times fa-2\"></i></button>";
                                                }
                                            } else {
                                                if ($reg['Num_asistentes'] == $reg['Num_inscritos']) {
                                                    $fila .= "<button class=\"btn btn-secondary\" onclick='return;'><i class=\"fa fa-user-plus fa-2\"></i></button>";
                                                } else {
                                                    $fila .= "<button class=\"btn btn-success\" onclick='inscribir(\"A\", " . $reg["Id_acto"] . ")'><i class=\"fa fa-user-plus fa-2\"></i></button>";
                                                }
                                            }

                                            if ($reg['Num_inscritos'] == '0') {
                                                $fila .= "&nbsp;<button class=\"btn btn-secondary\" onclick='return;'><i class=\"fa fa-users fa-2\"></i></button>";
                                            } else {
                                                $fila .= "&nbsp;<button class=\"btn btn-warning\" onclick='getInscritos(" . $reg["Id_acto"] . ");'><i class=\"fa fa-users fa-2\"></i></button>";
                                            }

                                            $fila .=    "</td>
                                                    </tr>";
                                                    
                                            echo $fila;
                                        }
                                    } else {
                                        echo "<tr>
                                                <td colspan='9'>No existen actos creados</td>
                                            </tr>";
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
</div>

<div class="modal fade" id="modalActoDelete" tabindex="1" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Eliminar acto</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>¿Estás seguro que quieres borrar este acto y todos sus participantes y ponentes asociados?</p>
                <form action="/php/actosFormAccion.php" method="POST">
                    <input type="hidden" id="Id_acto" name="Id_acto" value=""/>
                    <button type="button" class="btn btn-primary" id="cancelDelete">Cancelar</button>
                    <button type="submit" class="btn btn-danger" id="deleteActo" name ="delete">Eliminar</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalInscritos" tabindex="1" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Usuarios inscritos</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" style="margin: auto; width: 75%;">
                <table class="table" style="width: 100%; font-size: 14px;">
                    <thead style="background-color: #E9ECEF;" class="header-modal">
                        <tr>
                            <th scope="col" width="*" style="text-align: left; padding-left: 15px; padding-right: 15px;">Nombre y apellidos</th>
                        </tr>
                    </thead>
                    <tbody>
                        <td style="border-bottom: 0px !important;">
                            <div class="div-listado" style="width: 100%; max-height: 65vh !important;">
                                <table class="table" style="width: 100%;" id="inscritos-body">
                                </table>
                            </div>
                        </td>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    function showInput(inputId) {
        var elementos = document.querySelectorAll(".filtroFecha");
        for (var i = 0; i < elementos.length; i++) {
            elementos[i].style.display = "none";
        }
        var input = document.getElementById('filtro' + inputId);
        input.style.display = "block";
    }

    function buscarActos() {
        var tDate = 0;
        var fDate = "";
        var elementos = document.querySelectorAll(".filtroFecha");
        for (var i = 0; i < elementos.length; i++) {
            if (elementos[i].style.display == "block") {
                if (document.getElementById('filtro' + (i+1)).value != "") {
                    tDate = i + 1;
                    fDate = document.getElementById('filtro' + (i+1)).value;
                }
            }
        }
        if (tDate > 0) {
            var url = "/views/calendario.php?a=get&tDate=" + tDate + "&fDate=" + fDate;
            window.location.href = url;
        } else {
            return;
        }
    }

    function getInscritos(id) {
        // const modal = new bootstrap.Modal(document.getElementById('modalInscritos'), {
        //     keyboard: false
        // });
        // modal.show();
        console.log('1')
        var xhr = new XMLHttpRequest();
        console.log('2')
        xhr.onreadystatechange = function() {
        console.log('3')
            if (xhr.readyState == XMLHttpRequest.DONE) {
                if (xhr.status == 200) {
                    document.getElementById("inscritos-body").innerHTML = xhr.responseText;
                    // abrir el modal
                    const modal = new bootstrap.Modal(document.getElementById('modalInscritos'), {
                        keyboard: false
                    });
                    modal.show();
                } else {
                    // si la llamada AJAX falló, mostrar un mensaje de error
                    alert("Error al obtener los datos");
                }
            }
        };
        xhr.open("GET", "/php/calendarioInscritos.php?id=" + id, true);
        xhr.send();
    }
</script>

<?php
    if (!$_GET['tDate']) {
        echo '<script>
                document.getElementById("btnradio1").checked = "checked";
                document.getElementById("filtro1").style.display = "block";
              </script>';
    }

    $estadoAccion = $_SESSION['estadoAccion'] ?? null;
    if ($estadoAccion) {
        $class = '';
        $mensaje = '';
        if ($estadoAccion == 'ok') {
            $class = 'text-bg-success';
            $mensaje = 'Acto eliminado correctamente';
        } else if ($estadoAccion == 'ko') {
            $class = 'text-bg-danger';
            $mensaje = 'Error en la eliminación del acto';
        }
        echo '<div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
                <div id="liveToast" class="toast '.$class.'" role="alert" aria-live="assertive" aria-atomic="true" data-delay="5000">
                    <div class="toast-header">
                        <i class="fa '.($estadoAccion == 'ok' ? 'fa-check-circle' : 'fa-times-circle').'" aria-hidden="true"></i>&nbsp;<strong class="me-auto">'.$mensaje.'</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                    </div>
                    <div class="toast-body">
                        '.($estadoAccion == 'ok' ? 'Acto eliminado correctamente de la base de datos.' : 'El acto no se ha podido eliminar de la base de datos.').'
                    </div>
                </div>
            </div>';
        echo '<script>
                var myToast = document.getElementById("liveToast");
                var bsToast = new bootstrap.Toast(myToast);
                bsToast.show();
                setTimeout(function() {
                    bsToast.hide();
                }, 5000);
                </script>';
        unset($_SESSION['estadoAccion']);
    }
?>
