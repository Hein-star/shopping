<?php

require ("db_connect.php");

$name = $_POST["name"];
$photo = $_FILES["photo"];

$file_name = mt_rand(100000,9999999);
$file_extension_array = explode(".",$photo["name"]);
$file_extension = $file_extension_array[1];


$base_path = "image/brand/";
$full_path = $base_path.$file_name.".".$file_extension;

move_uploaded_file($photo["tmp_name"],$full_path);

$sql_qry = "INSERT INTO brands (name, logo) VALUES (:name,:logo)";
$stmt = $conn->prepare($sql_qry);
$stmt->bindParam(':name',$name);
$stmt->bindParam(':logo',$full_path);
$stmt->execute();

header("location:brand_list.php");
?>