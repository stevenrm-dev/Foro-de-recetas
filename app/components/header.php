<?php 
    session_start();
    $GLOBALS['base_url'] = 'http://localhost/foro-simple/';
?>

<!DOCTYPE html>
<html lang="es-ES">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href=<?php echo $GLOBALS['base_url'] . "app/view/css/main.css"; ?>>
    <link rel="stylesheet" href=<?php echo $GLOBALS['base_url'] . "app/view/bootstrap/css/bootstrap.min.css"; ?>>
    <script type="text/javascript" src=<?php echo $GLOBALS['base_url'] . "app/view/bootstrap/js/bootstrap.min.js"; ?>></script>

    <title>El foro de Fede</title>
</head>
<body>
    <header class="header bg-dim">
        <div class="container navbar p-4 px-md-0">
            <h1 class="m-sm-0"><a class="title title-primary tx-berry" href="<?php echo $GLOBALS['base_url']; ?>">El foro de Fede</a></h1>
            <?php
                if(!empty($_SESSION['userId'])) { ?>
                    <nav class="d-flex flex-wrap align-items-center">
                        <p class="tx tx-bright my-0 me-4">Bienvenido, <?php echo $_SESSION['userName']; ?></p>
                        <a class="link" href=<?php echo $GLOBALS['base_url'] . "app/functions/sessionDestroy.php"; ?>>Cerrar Sesión</a>
                    </nav>
            <?php } ?>
        </div>
    </header>