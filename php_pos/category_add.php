<?php

require ("db_connect.php");

$name = $_POST["name"];
$photo = $_FILES["photo"];
$file_name = mt_rand(100000,9999999);
$file_extension_array = explode(".",$photo["name"]);
$file_extension = $file_extension_array[1];


$base_path = "image/category/";
$full_path = $base_path.$file_name.".".$file_extension;

move_uploaded_file($photo["tmp_name"],$full_path);

$sql_qry = "INSERT INTO categories (name, photo) VALUES (:name,:photo)";
$stmt = $conn->prepare($sql_qry);
$stmt->bindParam(':name',$name);
$stmt->bindParam(':photo',$full_path);
$stmt->execute();

header("location:category_list.php");