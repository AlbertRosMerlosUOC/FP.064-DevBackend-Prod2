<?php
session_start();

require './config/database.php';

// Verificar si el usuario ha iniciado sesión como administrador
if (isset($_SESSION['Id_persona']) && $_SESSION['Id_persona'] == 1) {
    $records = $conn->prepare('SELECT Id_persona, email, password FROM personas WHERE Id_persona=:id');
    $records->bindParam(':id', $_SESSION['Id_persona']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $user = null;

    if (count($results) > 0) {
        $user = $results;
    }
}

  // // Verificar si se ha enviado el formulario para crear un nuevo acto
  // if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["crear_acto"])) {
  //   $fecha = $_POST["Fecha"];
  //   $hora = $_POST["Hora"];
  //   $titulo = $_POST["Titulo"];
  //   $descripcion_c = $_POST["Descripcion_corta"];
  //   $descripcion_l = $_POST["Descripcion_larga"];
  //   $asistentes = $_POST["Num_asistentes"];

  //   // Insertar el nuevo acto en la base de datos
  //   $sql = "INSERT INTO actos (Fecha, Hora, Titulo, Descripcion_corta, Descripcion_larga, Num_asistentes)
  //           VALUES ('$fecha', '$hora', '$titulo', '$descripcion_c', '$descripcion_l', '$asistentes')";

  //   if ($conn->query($sql) === TRUE) {
  //     echo "El acto se ha creado correctamente.";
  //   } else {
  //     echo "Error al crear el acto: " . $conn->error;
  //   }
  // }

  // // Verificar si se ha enviado el formulario para editar un acto existente
  // if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["editar_acto"])) {
  //   $Id_acto = $_POST["Id_acto"];
  //   $fecha = $_POST["Fecha"];
  //   $hora = $_POST["Hora"];
  //   $titulo = $_POST["Titulo"];
  //   $descripcion_c = $_POST["Descripcion_corta"];
  //   $descripcion_l = $_POST["Descripcion_larga"];
  //   $asistentes = $_POST["Num_asistentes"];

  //   // Actualizar el acto en la base de datos
  //   $sql = "UPDATE actos SET fecha='$fecha', hora='$hora', titulo='$titulo', descripcion_c='$descripcion_c', descripcion_l='$descripcion_l', asistentes='$asistentes' WHERE Id_acto=$Id_acto";

  //       if ($conn->query($sql) === TRUE) {
  //           echo "El acto se ha actualizado correctamente.";
  //       } else {
  //       echo "Error al actualizar el acto: " . $conn->error;
  //       }
  //   }

  // // Verificar si se ha enviado el formulario para eliminar un acto existente
  // if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["eliminar_acto"])) {
  //   $Id_acto = $_POST["Id_acto"];

  //   // Eliminar el acto de la base de datos
  //   $sql = "DELETE FROM actos WHERE Id_acto=$Id_acto";

  //   if ($conn->query($sql) === TRUE) {
  //     echo "El acto se ha eliminado correctamente.";
  //   } else {
  //     echo "Error al eliminar el acto: " . $conn->error;
  //   }
  // }

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
    <title>Welcome <?=$user['email'] ?></title>
</head>

<body>

    <?php require 'partials/header.php' ?>

    <?php if (!empty($user)): ?>
        <br> Welcome.
        <?= $user['email']; ?>
        <br>You are Successfully Logged In
        <a href="logout.php">Logout</a>
    <?php else: ?>
        <h1> Please Login or SingUp </h1>

        <a href="login.php">Login</a> or
        <a href="signup.php">SignUp</a>
    <?php endif; ?>

    <h1>Eres el usuario Administrador</h1>

    <?php require './models/getActos.php'; ?>

    <a href="./crearVistaActo.php"><button>Crear un nuevo acto</button></a>


</body>

<script>
    function editarActo(id_acto) {

      // Mostrar el formulario de edición
      //document.getElementById("editar_acto_form").style.display = "block";
    var url = "/form_acto.php";
  
    // Redirigir a la página
    window.location.href = url;

    }

</script>

</html>