<?php
require('db_connect.php');

$id = $_POST['id'];
$name = $_POST['name'];
$codeno = $_POST['codeno'];
$old_photo = $_POST["oldPhoto"];
$new_photo = $_FILES["newPhoto"];
$description = $_POST["description"];
$price = $_POST["unitPrice"];
$discount = $_POST["discountPrice"];
$brand_id = $_POST["brand"];
$subcategory_id = $_POST["sub_category"];

if($new_photo['size'] > 0)
{
    $photo = $new_photo;
    $basePath = "image/item/";
    $fullPath = $basePath.$new_photo["name"];
}
else{
    $photo = $old_photo;
    $fullPath = $old_photo;
}
move_uploaded_file($photo["tmp_name"],$fullPath);

$qry = "UPDATE items SET codeno=:codeno, name=:name, photo=:photo, price=:price, discount=:discount, description=:description, brand_id=:brand_id, subcategory_id=:subcategory_id WHERE id = :itemID";
$stmt = $conn->prepare($qry);
$stmt->bindParam(':codeno',$codeno);
$stmt->bindParam(':name',$name);
$stmt->bindParam(':photo',$fullPath);
$stmt->bindParam(':price',$price);
$stmt->bindParam(':discount',$discount);
$stmt->bindParam(':description',$description);
$stmt->bindParam(':brand_id',$brand_id);
$stmt->bindParam(':subcategory_id',$subcategory_id);
$stmt->bindParam(':itemID',$id);
$stmt->execute();

header('location:item_list.php');
