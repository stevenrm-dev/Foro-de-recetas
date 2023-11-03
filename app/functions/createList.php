<?php    
    // Verificar el estado de la sesión
    if (session_status() == PHP_SESSION_NONE) {
        // Iniciar la sesión solo si no ha sido iniciada previamente
        session_start();
    }
    
    require "./app/config/connect.php";

    // Consulta SQL para obtener los datos
    $sqlObtainData = "
        SELECT c.contentId, c.contentTitle, c.contentText, u.userName, u.userId
        FROM content c
        JOIN connections con ON c.contentId = con.contentId
        JOIN users u ON u.userId = con.userId;
    ";
    $obtainData = $db->query($sqlObtainData);

    // Array para almacenar datos.
    $contents = array();

    // While para organizar los datos
    while($result = $obtainData->fetch(PDO::FETCH_ASSOC)) {
        $contents[] = array(
            'contentId' => $result['contentId'],
            'contentTitle' => $result['contentTitle'],
            'contentText' => $result['contentText'],
            'userName' => $result['userName'],
            'userId' => $result['userId']
        );
    }
?>

<section class="section-cards row w-100 mx-auto">
<?php
    foreach($contents as $content) {
?>

        <article class="card col-lg-6">
            <h3 class="card-title title">
                <?php echo $content['contentTitle']; ?>
            </h3>
            <p class="card-text">
                <?php echo $content['contentText']; ?>
            </p>
            <p class="card-text">
                Por:
                <a class="link" href="./app/pages/authorProfile.php?Id=<?php echo $content['userId'] ?>">
                    <?php echo $content['userName']; ?>
                </a>
            </p>
            <?php
                if(($content['userId'] == $_SESSION['userId']) || ($_SESSION['userRole'] == 'admin') && ($_SESSION['userRole'] !== 'visitor')) { ?>
                    <ul class="d-flex flex-wrap">
                        <li class="mr-3"><a class="btn btn-dark bg-berry--b" href="./app/pages/edit.php?Id=<?php echo $content['contentId'] ?>">Editar</a></li>
                        <li><a class="btn btn-dark bg-berry" href="./app/functions/deleteContent.php?Id=<?php echo $content['contentId'] ?>">Eliminar</a></li>
                    </ul>
            <?php } ?>
        </article>

<?php       
    }
?>
</section>