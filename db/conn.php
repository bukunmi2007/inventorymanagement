<?php
    // Development Connection
    // $host = '127.0.0.1';
    // $db = 'inventorymanagement_db';
    // $user = 'root';
    // $pass = '';
    // $charset = 'utf8mb4';

    //Remote Database Connection
    $host = 'remotemysql.com';
    $db = 'SueMQsS6YV';
    $user = 'SueMQsS6YV';
    $pass = 'xarCQP97pl';
    $charset = 'utf8mb4';

    $dsn = "mysql:host=$host;dbname=$db;charset=$charset";

    try{
        $pdo = new PDO($dsn, $user, $pass);
        //echo 'Hello database';
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);    //tell me when there is an error, otherwise it won't have told me
    }catch(PDOException $e) {
        throw new PDOException($e->getMessage());
    }

    require_once 'crud.php';  
    
    $crud = new crud ($pdo);

?>