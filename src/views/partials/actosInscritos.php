<?php
?>
<div class="tab-pane" id="inscritos" role="tabpanel" aria-labelledby="inscritos-tab">
    <form action="/php/actosFormAccion.php" method="POST" style="width: 450px;">
        <div class="form-group">
            <label class="form-label" for="Descripcion_corta">Inscripciones</label>
            <select class="form-control" id="Id_tipo_acto" name="Id_tipo_acto" required multiple size="24">
                
            </select>
        </div>
        <button type="button" class="btn btn-danger" onclick="volver()">Volver</button>
    </form>
</div>
