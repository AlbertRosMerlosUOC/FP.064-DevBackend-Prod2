<html>
    <head>
        <title>Crear Acto</title>
    </head>
    <body>
        <h1>Crear Nuevo Acto</h1>
        <form action="models/actos.php" method="POST">
            <label>Fecha:</label>
            <input type="date" name="Fecha" id="Fecha" required><br>
            <label>Hora:</label>
            <input type="hour" name="Hora" id="tipo_acto" required><br>
            <br>
            <label>Titulo:</label>
            <input type="text" name="Titulo" id="Titulo" required><br>
            <label>Descripcion_corta:</label>
            <input type="text" name="Descripcion_corta" id="Descripcion_corta" required><br>
            <label>Descripcion_larga:</label>
            <input type="text" name="Descripcion_larga" id="Descripcion_larga" required><br>
            <label>Número de asistentes:</label>
            <input type="number" name="Num_asistentes" id="Num_asistentes" required><br>
            <label>ID Acto:</label>
            <input type="number" name="Id_tipo_acto" id="Id_tipo_acto" required><br>
            <br>
            <button type="submit" name="crear_acto">Crear Acto</button>
            <button type="button" onclick="cancelarEdicion()">Cancelar</button>
        </form>
    </body>
</html>


