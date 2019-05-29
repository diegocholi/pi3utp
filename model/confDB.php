<?php

function getConfDB()
{
    $host = "localhost";
    $dbName = "pi3utp";
    $user = "root";
    $password = "";

    try {
        $con = new PDO('mysql:host=' . $host . '; dbname=' . $dbName, $user, $password);
        return $con;
    } catch (PDOException $e) {
        echo 'Error: ' . $e->getMessage();
    }
}
