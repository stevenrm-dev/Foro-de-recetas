<?php
require "../config/connect.php";

// Verificar si se proporcionó un "Id" en la URL
if (isset($_GET['Id'])) {
    // Obtener el "Id" de la URL y asegurarse de que sea un entero válido
    $contentId = intval($_GET['Id']);
    
    // Realizar la consulta para obtener los datos de contenido correspondientes al "contentId"
    $query = $db->prepare("SELECT * FROM content WHERE contentId = ?");
    $query->execute([$contentId]);
    
    // Obtener los datos de contenido en un array asociativo
    $contentItems = $query->fetch(PDO::FETCH_ASSOC);
}
?>