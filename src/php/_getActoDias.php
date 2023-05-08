<?php
    session_start();
    require_once $_SERVER['DOCUMENT_ROOT'] . '/config/database.php';
    require_once $_SERVER['DOCUMENT_ROOT'] . '/controllers/ActoCo.php';

    $acto = new ActoCo($conn);
    $actos = $acto->getAllByDate($_POST['fecha']);
    $_SESSION['actos'] = $actos;
    
    header("Location: /views/calendarioDia.php");
?>

    
