<?php
    session_start();
    require_once $_SERVER['DOCUMENT_ROOT'] . '/config/database.php';

    if(!empty($_POST['user']) && !empty($_POST['password'])) {
        $message = '';
        $id_persona = $_POST['id'];
        $records = $conn->prepare('UPDATE personas SET User=:User, password=:password, Email=:email WHERE Id_persona=:id');
        $records->bindParam(':User', $_POST['user']);
        $records->bindParam(':password', password_hash($_POST['password'], PASSWORD_BCRYPT));
        $records->bindParam(':email', $_POST['email']);
        $records->bindParam(':id', $id_persona, PDO::PARAM_INT);
        $records->execute();

        // Verificar si se actualizaron filas
        if ($records->rowCount() > 0) {
            $message = 'Datos actualizados correctamente';
        } else {
            $message = 'No se pudo actualizar la información';
        }
        echo $message;
    }

?>
