<?php

session_start();
var_dump($_POST);

require './models/actos.php';

if(isset($_POST['crear_acto'])) {
    // Obtener los datos del formulario
    $fecha = $_POST['Fecha'];
    $hora = $_POST['Hora'];
    $titulo = $_POST['Titulo'];
    $descripcion_c = $_POST['Descripcion_corta'];
    $descripcion_l = $_POST['Descripcion_larga'];
    $asistentes = $_POST['Num_asistentes'];
    $Id_tipo_acto = $_POST['Id_tipo_acto'];

    // Crear una instancia de la clase Actos y llamar a su método insert()
    $actos = new Actos();
    $actos->insert($fecha, $hora, $titulo, $descripcion_c, $descripcion_l, $asistentes, $Id_tipo_acto);
}
?>


