<?php
    require "../config/connect.php";

    $id = $_POST['edit-id'];
    $title = $_POST['edit-title'];
    $content = $_POST['edit-text'];

    $sqlEdit = "UPDATE content SET contentTitle = '$title', contentText = '$content' WHERE contentId = $id";

    if ($db->exec($sqlEdit)) {
        header('Location: ../pages/confirmed/editConfirmed.php');
        exit;
    } else {
        header('Location: ../pages/errors/editError.php');
        exit;
    }
?>