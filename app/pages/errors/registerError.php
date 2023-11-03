<?php require "../../components/header.php"; ?>

    <main class="container main-saved">
        <img class="image" src=<?php echo $GLOBALS['base_url'] . "assets/imgs/delete.svg" ?> alt="imagen que representa que los datos no se han registrado correctamente">
        <h1 class="title title--primary tx--center">Error. El usuario ya existe o algún dato no es correcto</h1>
        <a class="btn" href="./register.php">Intentar de nuevo</a>
    </main>

<?php require "../../components/footer.php"; ?>