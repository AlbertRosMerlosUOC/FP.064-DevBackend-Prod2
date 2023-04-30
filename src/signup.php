<?php
    require_once $_SERVER['DOCUMENT_ROOT'] . '/config/database.php';

    $message = '';

    if (!empty($_POST['email']) && !empty($_POST['password'])) {
        $sql = "INSERT INTO personas (email, password) VALUES (:email, :password)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':email', $_POST['email']);
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
<html lang="en">

<head>
    <title>SignUp</title>
    <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/views/partials/includes.php' ?>
</head>

<body>
    <?php if (!empty($message)): ?>
        <p>
            <?= $message ?>
        </p>
    <?php endif; ?>

    <h1>SignUp</h1>
    <span>or <a href="login.php">Login</a></span>
    <form class="formLogin" action="signup.php" method="post">
        <input type="text" name="email" placeholder="Enter your email">
        <input type="password" name="password" placeholder="Enter your password">
        <input type="password" name="confirm_password" placeholder="Confirm your password">
        <input type="submit" value="Send">
    </form>

</body>

</html>