<?php
    $user = 'root';
    $password = '';
    $host = 'localhost';
    $db = 'forofede_db';

    try {
        $db = new PDO("mysql:host=$host;dbname=$db; charset=utf8", $user, $password);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $error) {
        print 'ERROR: No se encuentra la base de datos. ' . $error->getMessage() . '<br>';
        die();
    }
?>