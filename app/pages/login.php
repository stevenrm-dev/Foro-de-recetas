<?php require "../components/header.php"; ?>

<main>
    <h2>Log In</h2>
    <?php
        require "../functions/validateLogin.php";
    ?>
    <form action="" method="post">
        <label for="login-user">Usuario</label>
        <input type="text" id="login-user" name="login-user">

        <label for="login-user">Contraseña</label>
        <input type="password" id="login-user" name="login-password">

        <input type="submit" name="login-submit" value="Enviar">
    </form>
</main>

<?php require "../components/footer.php"; ?>