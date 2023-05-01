<?php
    require_once $_SERVER['DOCUMENT_ROOT'] . '/controllers/PersonaCo.php';
    $id_persona = $_SESSION['Id_persona'];
    $userCo = new PersonaCo($conn);
    $user = $userCo->getById($id_persona);
?>