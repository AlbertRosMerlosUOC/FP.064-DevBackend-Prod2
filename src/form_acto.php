<?php
session_start();

require './config/database.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Shantell+Sans:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Edit</title>
</head>

<body>

    <h1>Editando formulario</h1>

    <form method="POST" id="editar_acto_form">
    <label>Fecha:</label>
    <input type="datetime-local" name="Fecha" id="Fecha" required><br>


    <label>Hora:</label>
    <input type="datetime-local" name="Hora" id="tipo_acto" required><br>
    <br>

    <label>Titulo:</label>
    <input type="text" name="Titulo" id="Titulo" required><br>

    <label>Descripcion_corta:</label>
    <input type="text" name="Descripcion_corta" id="Descripcion_corta" required><br>

    <label>Descripcion_larga:</label>
    <input type="text" name="Descripcion_larga" id="Descripcion_larga" required><br>

    <label>Número de asistentes:</label>
    <input type="number" name="Num_asistentes" id="Num_asistentes" required><br>

    <br>
    <button type="submit" name="editar_acto">Guardar cambios</button>
    <button type="button" onclick="cancelarEdicion()">Cancelar</button>
    </form>


</body>

</html>

