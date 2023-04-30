<?php
    session_start();
    require_once $_SERVER['DOCUMENT_ROOT'] . '/config/database.php';
    require_once $_SERVER['DOCUMENT_ROOT'] . '/php/login.php';
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <title>Login</title>
        <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/views/partials/includes.php' ?>
    </head>

    <body>
        <h1> Login </h1>
        <span>or <a href="signup.php">SignUp</a></span>

        <?php if (!empty($message)): ?>
            <p>
                <?= $message ?>
            </p>
        <?php endif; ?>

        <form class="formLogin" action="login.php" method="post">
            <input type="text" name="email" placeholder="Enter your email">
            <input type="password" name="password" placeholder="Enter your password">
            <input type="submit" value="Send">
        </form>

    </body>

</html>