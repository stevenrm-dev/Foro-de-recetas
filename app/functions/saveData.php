<?php

if(!empty($_POST['register-submit'])) {
    if(empty($_POST['register-user']) && empty($_POST['register-password'])) {
        // Redirección a la página de error si los datos no se han añadido correctamente
        header('Location: ../pages/errors/registerError.php');
    } else {
        $userName = $_POST['register-user'];
        $pass = $_POST['register-password'];
        $mail = $_POST['register-email'];
        $bio = $_POST['register-bio'];

        // Encriptamos la contraseña.
        $passHash = password_hash($pass, PASSWORD_BCRYPT);

        require "../config/connect.php";

        //Se inicia la consulta para comparar los datos de la base de datos con los datos del formulario.
        $sqlValidate = "SELECT * FROM users WHERE userName = '$userName' or userEmail = '$mail'";
        $validate = $db->query($sqlValidate);

        if ($validate->rowCount() > 0) {
            // El usuario ya existe, redirección a la página de error.
            header('Location: ../pages/errors/registerError.php');
            exit();     
        } else {
            // el usuario no existe, insertar en la tabla users
            $insertToUsers = $db->prepare("INSERT INTO users (userName, userPass, userEmail, userBio) VALUES (?, ?, ?, ?)");
            $insertToUsers->bindParam(1, $userName);
            $insertToUsers->bindParam(2, $passHash);
            $insertToUsers->bindParam(3, $mail);
            $insertToUsers->bindParam(4, $bio);
            $insertToUsers->execute();
        }
    }

    // Redirección a la página que confirma que los datos han sido guardados correctamente
    header('Location: ../pages/confirmed/registerConfirmed.php');
    exit();
}

?>