<?php

require("db_connect.php");

$id = $_GET['cid'];
//deleting photo data
$photo_select = "SELECT photo FROM categories WHERE id=:id";
$stmt = $conn->prepare($photo_select);
$stmt->bindParam(':id',$id);
$stmt->execute();
$photo = $stmt->fetch();

unlink($photo[0]);


$qry = "DELETE FROM categories WHERE id = :id";
$stmt = $conn->prepare($qry);
$stmt->bindParam(':id',$id);
$stmt->execute();
header('location:category_list.php');