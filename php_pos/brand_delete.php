<?php

require("db_connect.php");

$id = $_GET['bid'];

//deleting photo data
$photo_select = "SELECT logo FROM brands WHERE id=:id";
$stmt = $conn->prepare($photo_select);
$stmt->bindParam(':id',$id);
$stmt->execute();
$photo = $stmt->fetch();

unlink($photo[0]);


$qry = "DELETE FROM brands WHERE id = :id";
$stmt = $conn->prepare($qry);
$stmt->bindParam(':id',$id);
$stmt->execute();
header('location:brand_list.php');