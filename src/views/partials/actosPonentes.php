<?php
    require_once $_SERVER['DOCUMENT_ROOT'] . '/controllers/PersonaCo.php';
    $personaCo = new PersonaCo($conn);
    $usuariosPonentes = $personaCo->getByTipo('3');
?>
<div class="tab-pane" id="ponentes" role="tabpanel" aria-labelledby="ponentes-tab">
    <form action="/php/actosPonentesAccion.php" method="POST" style="width: 450px;">
        <div class="form-group">
            <label class="form-label" for="Descripcion_corta">Ponentes&nbsp;<span class="required" title="Campo requerido">*</span></label>
            <select class="form-control" id="Id_tipo_acto" name="Id_tipo_acto" required multiple size="24">
                <?php
                    foreach ($usuariosPonentes as $reg) {
                        echo '<option value="' . $reg['Id_persona'] . '">' . $reg['Nombre_completo'] . '</option>';
                    }
                ?>
            </select>
        </div>
        <button type="submit" class="btn btn-primary" name="ponentes">Guardar</button>
        <button type="button" class="btn btn-danger" onclick="volver()">Volver</button>
    </form>
</div>

<?php
    $estadoAccion = $_SESSION['estadoAccion'] ?? null;
    if ($estadoAccion) {
        $class = '';
        $mensaje = '';
        if ($estadoAccion == 'ok') {
            $class = 'text-bg-success';
            $mensaje = 'Datos actualizados correctamente';
        } else if ($estadoAccion == 'ko') {
            $class = 'text-bg-danger';
            $mensaje = 'Error en la actualización de datos';
        }
        echo '<div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
                <div id="liveToast" class="toast '.$class.'" role="alert" aria-live="assertive" aria-atomic="true" data-delay="5000">
                    <div class="toast-header">
                        <i class="fa '.($estadoAccion == 'ok' ? 'fa-check-circle' : 'fa-times-circle').'" aria-hidden="true"></i>&nbsp;<strong class="me-auto">'.$mensaje.'</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                    </div>
                    <div class="toast-body">
                        '.($estadoAccion == 'ok' ? 'Los datos se han actualizado correctamente en la base de datos.' : 'Los datos no se han podido actualizar en la base de datos.').'
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
