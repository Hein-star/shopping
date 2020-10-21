<?php  
    require 'header.php';
    require 'db_connect.php';
?>

<div class="app-title">
    <div>
        <h1> <i class="icofont-list"></i> Item Form </h1>
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
                <form method="post" action="item_add.php" enctype="multipart/form-data">
                    <!--Photo start-->
                    <div class="form-group row">
                        <label for="photo" class="col-sm-2 col-form-label"> Photo </label>
                        <div class="col-sm-10">
                            <input type="file" id="photo" name="photo">
                        </div>
                    </div>
                    <!--Photo end-->

                    <!--Name start-->
                    <div class="form-group row">
                        <label for="name" class="col-sm-2 col-form-label"> Name </label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="name" name="name">
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
                                        <input type="text" class="form-control" id="unitPrice" name="unitPrice">
                                    </div>
                                    <div class="tab-pane fade" id="discountPrice" role="tabpanel" aria-labelledby="discount-tab">
                                        <input type="text" class="form-control" id="discountPrice" name="discountPrice">
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
                            <textarea class="form-control" name="description" id="" cols="10" rows="10"></textarea>
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
                                    echo "<option value='$id'>$name</option>";
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
                                    echo "<option value='$id'>$name</option>";
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
                                Save
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