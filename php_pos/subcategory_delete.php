<?php

require("db_connect.php");

$id = $_GET['scid'];
$qry = "DELETE FROM subcategories WHERE id = :id";
$stmt = $conn->prepare($qry);
$stmt->bindParam(':id',$id);
$stmt->execute();
header('location:subcategory_list.php');