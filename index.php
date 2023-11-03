<?php 
    require "./app/components/header.php";
    
    if(!empty($_SESSION['userName'])) {
        require "./app/pages/home.php";
    } else {
?>

    <main>
        <a class="link" href="./app/pages/login.php">Login</a>
        <a class="link" href="./app/pages/register.php">Register</a>
    </main>

<?php
    }
    require "./app/components/footer.php";
?>