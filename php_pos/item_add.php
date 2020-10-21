<?php
require ("db_connect.php");

$text = "AGBA-";
$code = mt_rand(10000,99999);

$codeno = $text.$code;
$photo = $_FILES["photo"];
$name = $_POST["name"];
$unit_price = $_POST["unitPrice"];
$discount_price = $_POST["discountPrice"];
$description = $_POST["description"];
$brand = $_POST["brand"];
$subcategory = $_POST["sub_category"];


//prepare file requirements
$file_name = mt_rand(100000,9900000);
$file_extension_array = explode(".",$photo["name"]);
$file_extension = $file_extension_array[1];
//prepare for path
$base_path = "image/item/";
$full_path = $base_path.$file_name.".".$file_extension;
move_uploaded_file($photo["tmp_name"],$full_path);

//start sql queries to store in database
$sql_qry = "INSERT INTO items    (codeno, name, photo, price, discount, description, brand_id, subcategory_id) VALUES (:codeno,:name, :photo, :price, :discount, :description, :brand_id, :subcategory_id)";
$stmt = $conn->prepare($sql_qry);
$stmt->bindParam(':codeno',$codeno);
$stmt->bindParam(':name',$name);
$stmt->bindParam(':photo',$full_path);
$stmt->bindParam(':price',$unit_price);
$stmt->bindParam(':discount',$discount_price);
$stmt->bindParam(':description',$description);
$stmt->bindParam(':brand_id',$brand);
$stmt->bindParam(':subcategory_id',$subcategory);
$stmt->execute();

header("location:item_list.php");
