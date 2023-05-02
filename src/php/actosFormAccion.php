<?php
    session_start();
    require_once $_SERVER['DOCUMENT_ROOT'] . '/config/database.php';
    require_once $_SERVER['DOCUMENT_ROOT'] . '/controllers/ActoCo.php';

    if (isset($_POST['insert']) || isset($_POST['update'])) {
        $id = $_POST['Id_acto'] ?? null;
        $fecha = $_POST['Fecha'] ?? null;
        $hora = $_POST['Hora'] ?? null;
        $titulo = $_POST['Titulo'] ?? null;
        $descripcion_c = $_POST['Descripcion_corta'] ?? null;
        $descripcion_l = $_POST['Descripcion_larga'] ?? null;
        $asistentes = $_POST['Num_asistentes'] ?? null;
        $Id_tipo_acto = $_POST['Id_tipo_acto'] ?? null;
    
        $actoCo = new ActoCo($conn);
        
        if (isset($_POST['insert'])) {
            $actoCo->insert($fecha, $hora, $titulo, $descripcion_c, $descripcion_l, $asistentes, $Id_tipo_acto);
        } else if (isset($_POST['update'])) {
            $actoCo->update($id, $fecha, $hora, $titulo, $descripcion_c, $descripcion_l, $asistentes, $Id_tipo_acto);
        }
    }

    if(isset($_POST['eliminar_acto'])) {
        // Obtener los datos del formulario
        $id = $_POST['Id_acto'];

        // Crear una instancia de la clase Actos y llamar a su método delete()
        $actoCo = new ActoCo($conn);
        $actoCo->delete($id);
    }
?>