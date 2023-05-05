
<?php
    $id_persona = $_GET['id'];
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Gestor de eventos DevBackend - Login</title>
        <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/views/partials/includes.php' ?>
        <link rel="stylesheet" href="/assets/css/login.css">
    </head>
    <body>
        <main class="form-signin">
            <form class="formcambio" action="/php/updateUser.php" method="post">
                <h1 class="mb-3">Datos Personales</h1>
                <div class="form-floating">
                    <input type="hidden" name="id" value="<?php echo htmlspecialchars($_GET['id']); ?>">
                    <input type="text" class="form-control" name="user" id="floatingInput" placeholder="Usuario">
                    <label for="floatingInput">Cambiar Usuario</label>
                </div>
                <div class="mt-3 form-floating">
                    <input type="text" class="form-control" name="email" id="floatingPassword" placeholder="Email">
                    <label for="floatingPassword">Cambiar Correo electronico</label>
                </div>
                <div class="mt-3 form-floating">
                    <input type="password" class="form-control" name="password" id="floatingPassword" placeholder="Contraseña">
                    <label for="floatingPassword">Cambiar Contraseña</label>
                </div>

                <div class="mb-3" style="color: #FF0000;">
                    <?php if (!empty($message)): ?>
                        <?= $message ?>
                    <?php endif; ?>
                </div>
                <button class="w-100 btn btn-lg btn-primary" type="submit">Cambiar</button>
                <p class="mt-4 mb-3 text-muted">DevBackend &copy; 2023</p>
            </form>
        </main>
    </body>
</html>