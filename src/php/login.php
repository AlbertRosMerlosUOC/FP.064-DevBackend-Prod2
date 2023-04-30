<?php
    if(!empty($_POST['email']) && !empty($_POST['password'])):
        // TODO Recoger datos de PersonaCo
        $records = $conn->prepare('SELECT Id_persona, email, password, Tipo_us FROM personas WHERE email=:email');
        $records->bindParam(':email', $_POST['email']);
        $records->execute();
        $results = $records->fetch(PDO::FETCH_ASSOC);
        $message = '';

        if(is_array($results) && count($results) > 0 && password_verify($_POST['password'], $results['password']) ) {
            $_SESSION['Id_persona'] = $results['Id_persona'];
            
            $tipo_us = $results['Tipo_us'];

            if ($tipo_us == 1) {
                header("Location: /views/usuario.php");
            } else if ($tipo_us == 2) {
                header("Location: /views/admin.php");
            } else if ($tipo_us == 3) {
                header("Location: /views/ponente.php");
            }
        } else {
            $message = 'Sorry, those credentials do not match';
        }
    endif;  
?>