<?php require "../components/header.php"; ?>

<main>
    <h2>Añadir nuevo contenido</h2>
    <?php
        require "../config/connect.php";
    ?>
    <form action="../functions/saveContent.php" method="post" enctype="multipart/form-data">
        <label for="fileToUpload">Añadir fichero <strong>XML</strong>:</label>
        <input type="file" name="fileToUpload" id="fileToUpload">

        <input type="submit" name="content-submit" value="Enviar">
    </form>
</main>

<?php require "../components/footer.php"; ?>