<?php require "../../components/header.php"; ?>

    <main class="container main-saved">
        <img class="image" src=<?php echo $GLOBALS['base_url'] . "assets/imgs/delete.svg" ?> alt="imagen que representa que los datos han sido eliminados correctamente">
        <h1 class="title title--primary tx--center">Error. El contenido no se ha guardado correctamente, ¿Quizá ya existe?</h1>
        <a class="btn" href="<?php echo $GLOBALS['base_url'] ?>">Intentar de nuevo</a>
    </main>

<?php require "../../components/footer.php"; ?>