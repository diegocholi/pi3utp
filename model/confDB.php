<?php

function getConfDB()
{
    $host = "localhost";
    $dbName = "pi3utp";
    $user = "root";
    $password = "";

    $con = new PDO('mysql:host=' . $host . '; dbname=' . $dbName, $user, $password);
    return $con;
}
