<?php
    $dsn = 'mysql:host=localhost;dbname=formsgenerator';
    $username = 'siteuser';
    $password = 'cs6920final';
    try {
        $db = new PDO($dsn, $username, $password);
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        include('../errors/error.php');
        exit();
    }
?>
