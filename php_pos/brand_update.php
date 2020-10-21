<?php
require('db_connect.php');

$id = $_POST['id'];
$name = $_POST['name'];
$old_photo = $_POST["oldPhoto"];
$new_photo = $_FILES["newPhoto"];

if($new_photo['size'] > 0)
{
    $photo = $new_photo;
    $basePath = "image/brand/";
    $fullPath = $basePath.$new_photo["name"];
}
else{
    $photo = $old_photo;
    $fullPath = $old_photo;
}
move_uploaded_file($photo["tmp_name"],$fullPath);

$qry = "UPDATE brands set name = :name ,logo= :photo WHERE id = :bid ";
$stmt = $conn->prepare($qry);
$stmt->bindParam(':name',$name);
$stmt->bindParam(':photo',$fullPath);
$stmt->bindParam(':bid',$id);
$stmt->execute();

header('location:brand_list.php');
