<?php
require 'db_connect.php';
require 'frontend_header.php';

$id = $_GET['id'];
$sql = 'SELECT * FROM items WHERE id = :id';
$stmt = $conn->prepare($sql);
$stmt->bindParam(':id',$id);
$stmt->execute();
$items = $stmt->fetchAll();
//echo "<pre>".print_r($discount_items,true)."</pre>";
foreach ($items as $item) {
    $item_id = $item["id"];
    $item_name = $item["name"];
    $item_price = $item["price"];
    $item_discount = $item["discount"];
    $item_photo = $item["photo"];
    $item_codeno = $item["codeno"];
    $item_description = $item["description"];
    $item_brandId = $item["brand_id"];
    $item_subcatId = $item["subcategory_id"];
}
$qry = "SELECT brands.name as 'bname', subcategories.name as 'scname' FROM items 
            INNER JOIN brands ON brands.id = items.brand_id
            INNER  JOIN subcategories ON subcategories.id = items.subcategory_id
            WHERE items.brand_id = :bid AND items.subcategory_id = :scid";
$stmt = $conn->prepare($qry);
$stmt->bindParam(':bid',$item_brandId);
$stmt->bindParam(':scid',$item_subcatId);
$stmt->execute();
$info = $stmt->fetchAll();
//echo "<pre>".print_r($info,true)."</pre>";
$brandName = $info[0]['bname'];
$scName = $info[0]['scname'];

?>

<!-- Content -->
<div class="container">

    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb ">
        <ol class="breadcrumb bg-transparent">
            <li class="breadcrumb-item">
                <a href="#" class="text-decoration-none secondarycolor"> Home </a>
            </li>
            <li class="breadcrumb-item">
                <a href="#" class="text-decoration-none secondarycolor"> Category </a>
            </li>
            <li class="breadcrumb-item">
                <a href="#" class="text-decoration-none secondarycolor"> Category Name </a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">
                <?= $scName ?>
            </li>
        </ol>
    </nav>

    <div class="row mt-5">
        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
            <img src="<?= $item_photo ?>" class="img-fluid">
        </div>


        <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12">

            <h4> <?= $item_name ?> </h4>

            <div class="star-rating">
                <ul class="list-inline">
                    <li class="list-inline-item"><i class='bx bxs-star' ></i></li>
                    <li class="list-inline-item"><i class='bx bxs-star' ></i></li>
                    <li class="list-inline-item"><i class='bx bxs-star' ></i></li>
                    <li class="list-inline-item"><i class='bx bxs-star' ></i></li>
                    <li class="list-inline-item"><i class='bx bxs-star-half' ></i></li>
                </ul>
            </div>

            <p>
               <?= $item_description ?>
            </p>

            <p>
                <?php if($item_discount) {?>
                    <div>
                        <span class="text-uppercase "> Original Price : </span>
                        <strike class="maincolor ml-3 font-weight-bolder"> <?= $item_price ?> Ks </strike>
                    </div>
                   <div>
                       <span class="text-uppercase "> Discount Price : </span>
                       <span class="maincolor ml-3 font-weight-bolder"> <?= $item_discount ?> Ks</span>
                   </div>
                <?php } else { ?>
                    <span class="text-uppercase "> Current Price : </span>
                    <span class="maincolor ml-3 font-weight-bolder"> <?= $item_price ?> Ks</span>
                <?php } ?>
            </p>

            <p>
                <span class="text-uppercase "> Brand : </span>
                <span class="ml-3"> <a href="" class="text-decoration-none text-muted"> <?= $brandName ?> </a> </span>
            </p>


            <button data-id="<?= $item_id?>"
                    data-name="<?= $item_name?>"
                    data-codeno="<?= $item_codeno?>"
                    data-photo="<?= $item_photo?>"
                    data-price="<?= $item_price?>"
                    data-discount="<?= $item_discount?>"
                    class="addtocartBtn text-decoration-none">Add to Cart</button>

        </div>
    </div>

    <div class="row mt-5">
        <div class="col-12">
            <h3> Related Item </h3>
            <hr>
        </div>


        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
            <a href="">
                <img src="frontend/image/item/saisai_two.jpg" class="img-fluid">
            </a>
        </div>

        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
            <a href="">
                <img src="frontend/image/item/saisai_three.jpg" class="img-fluid">
            </a>
        </div>

        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
            <a href="">
                <img src="frontend/image/item/saisai_four.jpg" class="img-fluid">
            </a>
        </div>

        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
            <a href="">
                <img src="frontend/image/item/saisai_four.jpg" class="img-fluid">
            </a>
        </div>
    </div>


</div>








<?php
require 'frontend_footer.php'
?>
