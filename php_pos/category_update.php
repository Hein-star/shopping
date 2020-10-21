<?php
require('db_connect.php');

$id = $_POST['id'];
$name = $_POST['name'];
$old_photo = $_POST["oldPhoto"];
$new_photo = $_FILES["newPhoto"];

if($new_photo['size'] > 0)
{
    $photo = $new_photo;
    $basePath = "image/category/";
    $fullPath = $basePath.$new_photo["name"];
    unlink($old_photo);
}
else{
    $photo = $old_photo;
    $fullPath = $old_photo;
}
move_uploaded_file($photo["tmp_name"],$fullPath);

$qry = "UPDATE categories set name = :name ,photo= :photo WHERE id = :cid ";
$stmt = $conn->prepare($qry);
$stmt->bindParam(':name',$name);
$stmt->bindParam(':photo',$fullPath);
$stmt->bindParam(':cid',$id);
$stmt->execute();

header('location:category_list.php');
