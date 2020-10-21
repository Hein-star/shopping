<?php
require 'header.php';
require 'db_connect.php';

$id = $_GET['itemId'];
$brand_id = $_GET['brandId'];
$subcategory_id = $_GET['subcatId'];


$qry = "SELECT * FROM items WHERE id = :value1";
$stmt = $conn->prepare($qry);
$stmt->bindParam(':value1',$id);
$stmt->execute();
$item = $stmt->fetch(PDO::FETCH_ASSOC);
?>

    <div class="app-title">
        <div>
            <h1> <i class="icofont-list"></i> Item Edit Form </h1>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
            <a href="item_list.php" class="btn btn-outline-primary">
                <i class="icofont-double-left"></i>
            </a>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <form method="post" action="item_update.php" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?= $item['id'] ?>">
                        <input type="hidden" name="oldPhoto" value="<?= $item['photo'] ?>">
                        <input type="hidden" name="codeno" value="<?= $item['codeno'] ?>">
                        <!--Photo start-->
                        <div class="form-group row">
                            <div class="col-2">
                                <label for="edit_profile">Photo:</label>
                            </div>
                            <div class="col-10">
                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link active" id="old-tab" data-toggle="tab" href="#oldPhoto" role="tab" aria-controls="oldPhoto" aria-selected="true">Old Photo</a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link" id="new-tab" data-toggle="tab" href="#newPhoto" role="tab" aria-controls="newPhoto" aria-selected="false">New Photo</a>
                                    </li>
                                </ul>
                                <div class="tab-content mt-3" id="myTabContent">
                                    <div class="tab-pane fade show active" id="oldPhoto" role="tabpanel" aria-labelledby="old-tab">
                                        <img width="110" height="110" src="<?= $item["photo"]; ?>" alt="" id="oldPhoto" name="oldPhoto">
                                    </div>
                                    <div class="tab-pane fade" id="newPhoto" role="tabpanel" aria-labelledby="new-tab">
                                        <input type="file" class="form-control-file" id="newPhoto" name="newPhoto">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--Photo end-->


                        <!--Name start-->
                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label"> Name </label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="name" name="name" value="<?= $item["name"] ?>">
                            </div>
                        </div>
                        <!--Name end-->

                        <!--Price start-->
                        <div class="form-group ">
                            <div class="row">
                                <div class="col-2">
                                    <label for="edit_profile">Price:</label>
                                </div>
                                <div class="col-10">
                                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link active" id="unit-tab" data-toggle="tab" href="#unitPrice" role="tab" aria-controls="unitPrice" aria-selected="true">Unit Price</a>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link" id="discount-tab" data-toggle="tab" href="#discountPrice" role="tab" aria-controls="discount" aria-selected="false">Discount</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content mt-3" id="myTabContent">
                                        <div class="tab-pane fade show active" id="unitPrice" role="tabpanel" aria-labelledby="unit-tab">
                                            <input type="text" class="form-control" id="unitPrice" name="unitPrice" value="<?= $item["price"] ?>">
                                        </div>
                                        <div class="tab-pane fade" id="discountPrice" role="tabpanel" aria-labelledby="discount-tab">
                                            <input type="text" class="form-control" id="discountPrice" name="discountPrice" value="<?= $item["discount"] ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--Price end-->

                        <!--Description start-->
                        <div class="form-group row">
                            <label for="description" class="col-sm-2 col-form-label"> Description </label>
                            <div class="col-sm-10">
                                <textarea class="form-control" name="description" id="" cols="10" rows="10"><?= $item["description"] ?></textarea>
                            </div>
                        </div>
                        <!--Description end-->

                        <!--Brand start-->
                        <div class="form-group row">
                            <label for="brand" class="col-sm-2 col-form-label"> Brand </label>
                            <div class="col-sm-10">
                                <select class="form-control" name="brand" id="brand">
                                    <?php
                                    $sql_qry = "SELECT * FROM brands";
                                    $stmt = $conn->prepare($sql_qry);
                                    $stmt->execute();

                                    $rows = $stmt->fetchAll();
                                    foreach ($rows as $row)
                                    {
                                        $id = $row["id"];
                                        $name = $row["name"];
                                        echo '<option '
                                            . ( $id == $brand_id? 'selected="selected"' : '' ) . '>'
                                            . $name
                                            . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <!--Brand end-->

                        <!--sub start-->
                        <div class="form-group row">
                            <label for="sub_category" class="col-sm-2 col-form-label"> Subcategory </label>
                            <div class="col-sm-10">
                                <select class="form-control" name="sub_category" id="sub_category">
                                    <?php
                                    $sql_qry = "SELECT * FROM subcategories";
                                    $stmt = $conn->prepare($sql_qry);
                                    $stmt->execute();

                                    $rows = $stmt->fetchAll();
                                    foreach ($rows as $row)
                                    {
                                        $id = $row["id"];
                                        $name = $row["name"];
                                        echo '<option '
                                            . ( $id == $subcategory_id? 'selected="selected"' : '' ) . '>'
                                            . $name
                                            . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <!--sub end-->

                        <div class="form-group row">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary">
                                    <i class="icofont-save"></i>
                                    Update
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

<?php
require 'footer.php';
?>