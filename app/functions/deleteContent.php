<?php

    require "../config/connect.php";

    $id = $_GET['Id'];

    // Eliminar las filas relacionadas en la tabla connection
    $sqlRemoveConnections = "DELETE FROM connections WHERE contentId = :id";
    $statementConnections = $db->prepare($sqlRemoveConnections);
    $statementConnections->bindParam(':id', $id);
    $statementConnections->execute();

    // Eliminar el contenido de la tabla content
    $sqlRemoveContent = "DELETE FROM content WHERE contentId = :id";
    $statementContent = $db->prepare($sqlRemoveContent);
    $statementContent->bindParam(':id', $id);


    if ($statementContent->execute()) {
        header('Location: ../pages/confirmed/deleteConfirmed.php');
        exit;
    } else {
        header('Location: ../pages/errors/deleteError.php');
        exit;
    }
?>