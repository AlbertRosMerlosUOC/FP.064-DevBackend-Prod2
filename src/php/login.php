<?php
    if(!empty($_POST['User']) && !empty($_POST['password'])):
        // TODO Recoger datos de PersonaCo
        $records = $conn->prepare('SELECT Id_persona, User, password, Id_tipo_usuario FROM personas WHERE User=:User');
        $records->bindParam(':User', $_POST['User']);
        $records->execute();
        $results = $records->fetch(PDO::FETCH_ASSOC);
        $message = '';

        if(is_array($results) && count($results) > 0 && password_verify($_POST['password'], $results['password']) ) {
            $_SESSION['Id_persona'] = $results['Id_persona'];
            
            /*$Id_tipo_usuario = $results['Id_tipo_usuario'];

            if ($Id_tipo_usuario == 1) {
                header("Location: /views/main.php");
            } else if ($Id_tipo_usuario == 2) {
                header("Location: /views/main.php");
            } else if ($Id_tipo_usuario == 3) {
                header("Location: /views/main.php");
            }*/
            header("Location: /views/main.php");
        } else {
            $message = 'Sorry, those credentials do not match';
        }
    endif;  
?>