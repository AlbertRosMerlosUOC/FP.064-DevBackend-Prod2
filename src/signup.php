<?php
    // TODO
    require_once $_SERVER['DOCUMENT_ROOT'] . '/config/database.php';
    $message = '';
    if (!empty($_POST['User']) && !empty($_POST['password'])) {
        $sql = "INSERT INTO personas (User, password) VALUES (:User, :password)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':User', $_POST['User']);
        $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
        $stmt->bindParam(':password', $password);
        if ($stmt->execute()) {
            $message = 'Successfully created new user';
        } else {
            $message = 'Sorry there must have been an issue creating your account';
        }
    }
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Gestor de eventos DevBackend - SignUp</title>
        <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/views/partials/includes.php' ?>
    </head>
    <body>
        <?php if (!empty($message)): ?>
            <p>
                <?= $message ?>
            </p>
        <?php endif; ?>
        <h1>SignUp</h1>
        <span>o <a href="login.php">Login</a></span>
        <form class="formLogin" action="signup.php" method="post">
            <input type="text" name="User" placeholder="Usuario">
            <input type="password" name="password" placeholder="Contraseña">
            <input type="password" name="confirm_password" placeholder="Confirma la contraseña">
            <input type="submit" value="Enviar">
        </form>
    </body>
</html>