<?php

$server_name = "localhost";
$db_name = "b18_pos";
$db_user = "root";
$db_password = "";

$dsn = "mysql:host=$server_name;dbname=$db_name";

$pdo = new PDO($dsn,$db_user,$db_password);

try {
    $conn = $pdo;
    //set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "Connected";

}catch(PDOException $e)
{
    echo "Connection Failed".$e->getMessage();
}