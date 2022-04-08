<?php
    $dsn = 'mysql:host=l6glqt8gsx37y4hs.cbetxkdyhwsb.us-east-1.rds.amazonaws.com; dbname=ylb9k74aqnkiedrj';
    $username = 'nabs9uo78i2jax7d';
    $password = 'f00azcv249m12h84';

    try{
        $db = new PDO($dsn, $username, $password);

    } catch (PDOException $e){
        $error_message = 'Database Error';
        $error_message .= $e->getMessage();
        include('database_error.php');
        exit();
    }
?>