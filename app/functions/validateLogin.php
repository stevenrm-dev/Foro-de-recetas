<?php
// Verificar el estado de la sesión
if (session_status() == PHP_SESSION_NONE) {
    // Iniciar la sesión solo si no ha sido iniciada previamente
    session_start();
}

if (!empty($_POST['login-submit'])) {
    if (empty($_POST['login-user']) || empty($_POST['login-password'])) {
        // Redirección a la página de error si los datos no se han añadido correctamente
        header('Location: ../pages/errors/loginError.php');
    } else {
        $userName = $_POST['login-user'];
        $pass = $_POST['login-password'];

        require "../config/connect.php";

        // Consulta la contraseña encriptada de la base de datos para el usuario
        $sqlGetHash = "SELECT userPass FROM users WHERE userName = :userName";
        $stmt = $db->prepare($sqlGetHash);
        $stmt->bindParam(':userName', $userName);
        $stmt->execute();
        $result = $stmt->fetch();

        if ($result) {
            $storedHash = $result['userPass'];

            // Verifica si la contraseña proporcionada por el usuario coincide con la almacenada en la base de datos
            if (password_verify($pass, $storedHash)) {
                // Guarda estos datos de la bd en la variable global de sesión.
                $sqlValidate = "SELECT * FROM users WHERE userName = :userName";
                $stmt = $db->prepare($sqlValidate);
                $stmt->bindParam(':userName', $userName);
                $stmt->execute();
                $user = $stmt->fetch(PDO::FETCH_ASSOC);

                $_SESSION['userId'] = $user['userId'];
                $_SESSION['userName'] = $user['userName'];
                $_SESSION['userRole'] = $user['roles'];

                //Si los datos están en la base de datos se accede a la plataforma.
                header('Location: ../../index.php');
            } else {
                // De no ser así, se redirecciona al error.
                echo "<span class='tx-error'>Error: El usuario o contraseña es incorrecto.</span>";
            }
        } else {
            // El usuario no existe en la base de datos
            echo "<span class='tx-error'>Error: El usuario o contraseña es incorrecto.</span>";
        }
    }
}
?>