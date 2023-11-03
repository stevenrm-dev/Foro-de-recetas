<?php require "../components/header.php"; ?>

<main>
    <h2>Edición</h2>
    <form action="../functions/editContent.php" method="post">
        <?php require "../functions/obtainData.php"; ?>
        
        <input type="hidden" name="edit-id" value="<?php echo isset($contentItems['contentId']) ? $contentItems['contentId'] : ''; ?>">

        <label for="edit-title">Título:</label>
        <input type="text" id="edit-title" name="edit-title" value="<?php echo isset($contentItems['contentTitle']) ? $contentItems['contentTitle'] : ''; ?>">

        <label for="edit-text">Contenido:</label>
        <textarea id="edit-text" name="edit-text" rows="15" cols="50" style="resize: none;"><?php echo isset($contentItems['contentText']) ? $contentItems['contentText'] : ''; ?></textarea>




        <input type="submit" name="edit-submit" value="Enviar">
    </form>
</main>

<?php require "../components/footer.php"; ?>