<?php
    session_start();
    require_once $_SERVER['DOCUMENT_ROOT'] . '/config/database.php';
    require_once $_SERVER['DOCUMENT_ROOT'] . '/php/controlUsuario.php';
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
    <title>Welcome to your app</title>
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