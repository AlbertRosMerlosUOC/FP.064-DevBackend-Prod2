<?php
    session_start();
    require_once $_SERVER['DOCUMENT_ROOT'] . '/config/database.php';
    require_once $_SERVER['DOCUMENT_ROOT'] . '/php/controlUsuario.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Welcome to your app</title>
    <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/views/partials/includes.php' ?>
</head>

<body>

    <?php if (!empty($user)): ?>
        <br> Welcome.
        <?= $user['email']; ?>
        <br>You are Successfully Logged In
        <a href="php/logout.php">Logout</a>
    <?php else: ?>
        <h1> Please Login or SingUp </h1>
        <a href="login.php">Login</a> or
        <a href="signup.php">SignUp</a>
    <?php endif; ?>

    

</body>

</html>