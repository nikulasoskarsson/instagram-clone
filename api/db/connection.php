<?php

try {
    $dbUserName = 'root';
    $dbPassword = '';
    $dbConnection = 'mysql:host=localhost; dbname=instagram_clone; charset=utf8mb4';

    $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC 
    ];
    $db = new PDO(
        $dbConnection,
        $dbUserName,
        $dbPassword,
        $options
    );
} catch (PDOException $ex) {
    echo $ex;
    echo 'error';
    exit();
}
