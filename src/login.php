<?php
    session_start();
    require_once $_SERVER['DOCUMENT_ROOT'] . '/config/database.php';
    require_once $_SERVER['DOCUMENT_ROOT'] . '/php/login.php';
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
        <title>Login</title>
    </head>

    <body>
        <h1> Login </h1>
        <span>or <a href="signup.php">SignUp</a></span>

        <?php if (!empty($message)): ?>
            <p>
                <?= $message ?>
            </p>
        <?php endif; ?>

        <form action="login.php" method="post">
            <input type="text" name="email" placeholder="Enter your email">
            <input type="password" name="password" placeholder="Enter your password">
            <input type="submit" value="Send">
        </form>

    </body>

</html>