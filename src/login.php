<?php

session_start();

require './config/database.php';

if(!empty($_POST['email']) && !empty($_POST['password'])):
    $records = $conn->prepare('SELECT Id_persona, email, password, Tipo_us FROM personas WHERE email=:email');
    $records->bindParam(':email', $_POST['email']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $message = '';


    if(is_array($results) && count($results) > 0 && password_verify($_POST['password'], $results['password']) ){
        $_SESSION['Id_persona'] = $results['Id_persona'];
        
        $tipo_us = $results['Tipo_us'];


        if($tipo_us == 2){
            header("Location: /admin.php");
        }
        if($tipo_us == 1){
            header("Location: /usuario.php");
        }
        if($tipo_us == 3){
            header("Location: /ponente.php");
        }
    } else {
        $message = 'Sorry, those credentials do not match';
    }

endif;  

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

    <?php require 'partials/header.php' ?>

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