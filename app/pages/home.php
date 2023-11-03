    <main class="container my-5">
        <div class="w-100 d-flex flex-wrap justify-content-between align-items-center mb-5">
            <h2 class="title">El recetario</h2>
            <?php if(($_SESSION['userRole'] !== 'visitor')) { ?>
            <a class="btn btn-dark bg-berry--b" href="./app/pages/addContent.php">Añadir contenido</a>
        </div>
        <?php
        }
            require "./app/functions/createList.php";
        ?>
    </main>