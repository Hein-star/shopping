<?php
require 'frontend_header.php';
require 'db_connect.php';

?>

    <!-- Carousel -->
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>

        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="frontend/image/banner/ac.jpg" class="d-block w-100 bannerImg" alt="...">
            </div>
            <div class="carousel-item">
                <img src="frontend/image/banner/giordano.jpg" class="d-block w-100 bannerImg" alt="...">
            </div>
            <div class="carousel-item">
                <img src="frontend/image/banner/garnier.jpg" class="d-block w-100 bannerImg" alt="...">
            </div>
        </div>
    </div>


    <!-- Content -->
    <div class="container mt-5 px-5">

        <!-- Category -->
        <div class="row">
            <?php
            $sql_qry = "SELECT * FROM categories ORDER BY rand() LIMIT 8";
            $stmt = $conn->prepare($sql_qry);
            $stmt->execute();

            $rows = $stmt->fetchAll();
            foreach ($rows as $row)
            {
                $photo = $row["photo"];
                $name = $row["name"];
            ?>
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-12 ">
                <div class="card categoryCard border-0 shadow-sm p-3 mb-5 rounded text-center">
                    <img style="object-fit: cover;" src="<?= $photo ?>" class="card-img-top" alt="..." width="200" height="200">
                    <div class="card-body">
                        <p class="card-text font-weight-bold text-truncate"><?= $name ?></p>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>

        <div class="whitespace d-xl-block d-lg-block d-md-none d-sm-none d-none"></div>

        <!-- Discount Item -->
        <div class="row mt-5">
            <h1> Discount Item </h1>
        </div>

        <!-- Disocunt Item -->
        <div class="row">
            <div class="col-12">
                <div class="MultiCarousel" data-items="1,3,5,6" data-slide="1" id="MultiCarousel"  data-interval="1000">
                    <div class="MultiCarousel-inner">
                        <?php

                        $sql = 'SELECT * FROM items WHERE discount != ""';
                        $stmt = $conn->prepare($sql);
                        $stmt->execute();
                        $discount_items = $stmt->fetchAll();
                        foreach ($discount_items as $discount_item)
                        {
                            $discount_id = $discount_item["id"];
                            $discount_name = $discount_item["name"];
                            $discount_price = $discount_item["price"];
                            $discount_discount = $discount_item["discount"];
                            $discount_photo = $discount_item["photo"];
                            $discount_codeno = $discount_item["codeno"];
                        ?>
                        <div class="item">
                            <div class="pad15">
                                <a href="item_detail.php?id=<?= $discount_id ?>"><img src="<?= $discount_photo ?>" class="img-fluid"></a>
                                <p class="text-truncate"><?= $discount_name; ?></p>
                                <p class="item-price">
                                    <strike><?= $discount_price ?> mmk</strike>
                                    <span class="d-block"><?= $discount_discount ?> mmk</span>
                                </p>

                                <div class="star-rating">
                                    <ul class="list-inline">
                                        <li class="list-inline-item"><i class='bx bxs-star' ></i></li>
                                        <li class="list-inline-item"><i class='bx bxs-star' ></i></li>
                                        <li class="list-inline-item"><i class='bx bxs-star' ></i></li>
                                        <li class="list-inline-item"><i class='bx bxs-star' ></i></li>
                                        <li class="list-inline-item"><i class='bx bxs-star-half' ></i></li>
                                    </ul>
                                </div>

                                <button data-id="<?= $discount_id?>"
                                   data-name="<?= $discount_name?>"
                                   data-codeno="<?= $discount_codeno?>"
                                   data-photo="<?= $discount_photo?>"
                                   data-price="<?= $discount_price?>"
                                   data-discount="<?= $discount_discount?>"
                                   class="addtocartBtn text-decoration-none">Add to Cart</button>

                            </div>
                        </div>
                        <?php } ?>
                    </div>
                    <button class="btn btnMain leftLst"><</button>
                    <button class="btn btnMain rightLst">></button>
                </div>
            </div>
        </div>

        <!-- Flash Sale Item -->
        <div class="row mt-5">
            <h1> Flash Sale </h1>
        </div>

        <!-- Flash Sale Item -->
        <div class="row"    >
            <div class="col-12">
                <div class="MultiCarousel" data-items="1,3,5,6" data-slide="1" id="MultiCarousel"  data-interval="1000">
                    <div class="MultiCarousel-inner">
                    <?php

                    $sql = 'SELECT * FROM items ORDER BY id DESC';
                    $stmt = $conn->prepare($sql);
                    $stmt->execute();
                    $sale_items = $stmt->fetchAll();
                    foreach ($sale_items as $sale_item)
                    {
                        $sale_item_id = $sale_item["id"];
                        $sale_item_name = $sale_item["name"];
                        $sale_item_price = $sale_item["price"];
                        $sale_item_discount = $sale_item["discount"];
                        $sale_item_codeno = $sale_item["codeno"];
                        $sale_item_photo = $sale_item["photo"];
                    ?>
                        <div class="item">
                            <div class="pad15">
                                <a href="item_detail.php?id=<?= $sale_item_id ?>">< <img src="<?= $sale_item_photo ?>" class="img-fluid">>
                                <p class="text-truncate"><?= $sale_item_name ?></p>
                                <p class="item-price">
                                    <?php if($sale_item_discount) {?>
                                        <strike> <?= $sale_item_price ?> Ks </strike>
                                        <span class="d-block"> <?= $sale_item_discount ?> Ks</span>
                                    <?php } else{ ?>
                                        <span class="d-block"> <?= $sale_item_price ?> Ks</span>
                                    <?php } ?>
                                </p>

                                <div class="star-rating">
                                    <ul class="list-inline">
                                        <li class="list-inline-item"><i class='bx bxs-star' ></i></li>
                                        <li class="list-inline-item"><i class='bx bxs-star' ></i></li>
                                        <li class="list-inline-item"><i class='bx bxs-star' ></i></li>
                                        <li class="list-inline-item"><i class='bx bxs-star' ></i></li>
                                        <li class="list-inline-item"><i class='bx bxs-star-half' ></i></li>
                                    </ul>
                                </div>

                                <button data-id="<?= $sale_item_id?>"
                                        data-name="<?= $sale_item_name?>"
                                        data-codeno="<?= $sale_item_codeno?>"
                                        data-photo="<?= $sale_item_photo?>"
                                        data-price="<?= $sale_item_price?>"
                                        data-discount="<?= $sale_item_discount?>"
                                        class="addtocartBtn text-decoration-none">Add to Cart</button>

                            </div>
                        </div>
                    <?php } ?>
                    </div>
                    <button class="btn btnMain leftLst"><</button>
                    <button class="btn btnMain rightLst">></button>
                </div>
            </div>
        </div>

        <!-- Random Catgory ~ Item -->
        <div class="row mt-5">
            <h1> Fresh Picks </h1>
        </div>

        <!-- Random Item -->
        <div class="row">
            <div class="col-12">
                <div class="MultiCarousel" data-items="1,3,5,6" data-slide="1" id="MultiCarousel"  data-interval="1000">
                    <div class="MultiCarousel-inner">
                    <?php

                    $sql = 'SELECT * FROM items WHERE subcategory_id = 7';
                    $stmt = $conn->prepare($sql);
                    $stmt->execute();
                    $random_items = $stmt->fetchAll();
                    foreach ($random_items as $random_item)
                    {
                        $random_item_id = $random_item["id"];
                        $random_item_name = $random_item["name"];
                        $random_item_codeno = $random_item["codeno"];
                        $random_item_price = $random_item["price"];
                        $random_item_discount = $random_item["discount"];
                        $random_item_photo = $random_item["photo"];
                        ?>
                        <div class="item">
                            <div class="pad15">
                                <a href="item_detail.php?id=<?= $random_item_id ?>"><img src="<?= $random_item_photo ?>" class="img-fluid"></a>
                                <p class="text-truncate"><?= $random_item_name ?></p>
                                <p class="item-price">
                                    <?php if($random_item_discount) {?>
                                        <strike> <?= $random_item_price ?> Ks </strike>
                                        <span class="d-block"> <?= $random_item_discount ?> Ks</span>
                                    <?php } else{ ?>
                                        <span class="d-block"> <?= $random_item_price ?> Ks</span>
                                    <?php } ?>
                                </p>

                                <div class="star-rating">
                                    <ul class="list-inline">
                                        <li class="list-inline-item"><i class='bx bxs-star' ></i></li>
                                        <li class="list-inline-item"><i class='bx bxs-star' ></i></li>
                                        <li class="list-inline-item"><i class='bx bxs-star' ></i></li>
                                        <li class="list-inline-item"><i class='bx bxs-star' ></i></li>
                                        <li class="list-inline-item"><i class='bx bxs-star-half' ></i></li>
                                    </ul>
                                </div>

                                <button data-id="<?= $random_item_id?>"
                                        data-name="<?= $random_item_name?>"
                                        data-codeno="<?= $random_item_codeno?>"
                                        data-photo="<?= $random_item_photo?>"
                                        data-price="<?= $random_item_price?>"
                                        data-discount="<?= $random_item_discount?>"
                                        class="addtocartBtn text-decoration-none">Add to Cart</button>

                            </div>
                        </div>
                    <?php } ?>
                    </div>
                    <button class="btn btnMain leftLst"><</button>
                    <button class="btn btnMain rightLst">></button>
                </div>
            </div>
        </div>


        <div class="whitespace d-xl-block d-lg-block d-md-none d-sm-none d-none"></div>

        <!-- Brand Store -->
        <div class="row mt-5">
            <h1> Top Brand Stores </h1>
        </div>

        <!-- Brand Store Item -->
        <section class="customer-logos slider mt-5">
            <?php

            $sql = 'SELECT * FROM brands';
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $brands = $stmt->fetchAll();
            foreach ($brands as $brand)
            {
                $brand_id = $brand["id"];
                $brand_name = $brand["name"];
                $brand_photo = $brand["logo"];
                ?>
            <div class="slide">
                <a href="">
                    <img style="object-fit: cover;" src="<?= $brand_photo ?>" width="100" height="100">
                </a>
            </div>
            <?php } ?>
        </section>

        <div class="whitespace d-xl-block d-lg-block d-md-none d-sm-none d-none"></div>

    </div>



<?php
require 'frontend_footer.php';
?>