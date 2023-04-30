<?php
    require_once $_SERVER['DOCUMENT_ROOT'] . '/models/Acto.php';
    require_once $_SERVER['DOCUMENT_ROOT'] . '/models/TipoActo.php';
    require_once $_SERVER['DOCUMENT_ROOT'] . '/controllers/ActoCo.php';
    require_once $_SERVER['DOCUMENT_ROOT'] . '/controllers/TipoActoCo.php';
    $tipoActoCo = new TipoActoCo($conn);
    $tiposActos = $tipoActoCo->getAll();
?>

<div style="display: flex; justify-content: center; align-items: center;">
    <form action="/controllers/ActoCo.php" method="POST" style="width: 450px;">
        <input type="hidden" id="Id_acto"/>
        <div class="form-group">
            <div class="row">
                <div class="col">
                <label class="form-label" for="Fecha">Fecha&nbsp;<span class="required" title="Campo requerido">*</span></label>
                <input class="form-control" type="date" placeholder="Fecha" id="Fecha" required/>
                </div>
                <div class="col">
                <label class="form-label" for="Hora">Hora&nbsp;<span class="required" title="Campo requerido">*</span></label>
                <input class="form-control" type="time" placeholder="Hora" id="Hora" required/>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label class="form-label" for="Titulo">Titulo&nbsp;<span class="required" title="Campo requerido">*</span></label>
            <input class="form-control" type="text" placeholder="Titulo del acto" id="Titulo" maxlength="50" required/>
        </div>
        <div class="form-group">
            <label class="form-label" for="Descripcion_corta">Descripción corta&nbsp;<span class="required" title="Campo requerido">*</span></label>
            <textarea class="form-control" placeholder="Descripción corta" rows="3" id="Descripcion_corta" required maxlength="200" resize="none"></textarea>
        </div>
        <div class="form-group">
            <label class="form-label" for="Descripcion_corta">Descripción larga&nbsp;<span class="required" title="Campo requerido">*</span></label>
            <textarea class="form-control" placeholder="Descripción larga" rows="6" id="Descripcion_larga" required maxlength="1000"></textarea>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col">
                    <label class="form-label" for="Num_asistentes">Número de asistentes&nbsp;<span class="required" title="Campo requerido">*</span></label>
                    <input class="form-control" type="number" placeholder="Número de asistentes" id="Num_asistentes" maxlength="3" min="1" required/>
                </div>
                <div class="col">
                    <label class="form-label" for="Id_tipo_acto">Tipo de acto&nbsp;<span class="required" title="Campo requerido">*</span></label>
                    <select class="form-control" id="Id_tipo_acto" required>
                        <option value=""></option>
                        <?php
                            foreach ($tiposActos as $reg) {
                                echo '<option value="' . $reg['Id_tipo_acto'] . '">' . $reg['Descripcion'] . '</option>';
                            }
                        ?>
                    </select>
                </div>
            </div>
        </div>
        <br>
        <button type="submit" class="btn btn-primary" name="<?php echo $action; ?>"><?php echo $actionText; ?></button>
        <button type="button" class="btn btn-danger" onclick="cancelar()">Cancelar</button>
    </form>
</div>

<script>
    function cancelar() {
        var url = "/views/admin.php";
        window.location.href = url;
    }
</script>
