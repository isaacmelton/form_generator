<?php
    $dsn = 'mysql:host=localhost;dbname=omniblog';
    $username = 'omniblog_user';
    $password = 'UtxYHfmZve6DKW9TXSmUPvepxfzc4tRXEJaNCpkP1';
    try {
        $db = new PDO($dsn, $username, $password);
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        include('../errors/error.php');
        exit();
    }
?>
