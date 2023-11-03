<?php require "../components/header.php"; ?>

<main>
    <h2>Registro</h2>
    <?php
        require "../config/connect.php";
    ?>
    <form action="../functions/saveData.php" method="post">
        <label for="register-user">Usuario</label>
        <input type="text" id="register-user" name="register-user" require>

        <label for="register-password">Contraseña</label>
        <input type="password" id="register-password" name="register-password" require>

        <label for="register-email">Email</label>
        <input type="email" id="register-email" name="register-email" require>

        <label for="input-bio">Bio</label>
        <input type="text" id="input-bio" name="register-bio" require>

        <input type="submit" name="register-submit" value="Enviar">
    </form>
</main>

<?php require "../components/footer.php"; ?>