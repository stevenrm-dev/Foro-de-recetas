<?php
    // Se obtiene el Id del usuario mediante GET.
    $authorId = $_GET['Id'];

    require "../config/connect.php";

    // Consulta para seleccionar los datos del usuario con el el mismo ID que el obtenido mediante GET.
    $sqlObtainInfo = "SELECT userName, userEmail, userBio FROM users WHERE userId = :id";
    $statementUsers = $db->prepare($sqlObtainInfo);
    $statementUsers->bindParam(':id', $authorId);
    $statementUsers->execute();

    // Array para almacenar datos.
    $authorInfo = array();

    // Obtener el primer resultado del conjunto de resultados
    $result = $statementUsers->fetch(PDO::FETCH_ASSOC);

    // Organizar los datos
    if ($result) {
        $authorInfo = array(
            'name' => $result['userName'],
            'email' => $result['userEmail'],
            'bio' => $result['userBio'],
        );
    }
?>

<section class="author-profile">
    <h3><?php echo $authorInfo['name'] ?></h3>
    <a class="link" href="mailto:<?php echo $authorInfo['email'] ?>">
        <?php echo $authorInfo['email'] ?>
    </a>
    <p>Info: <?php echo $authorInfo['bio'] ?></p>
</section>