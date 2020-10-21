<?php
require 'header.php';
require 'db_connect.php';

$id = $_GET['cid'];

$qry = "SELECT * FROM categories WHERE id = :value1";
$stmt = $conn->prepare($qry);
$stmt->bindParam(':value1',$id);
$stmt->execute();
$cat = $stmt->fetch(PDO::FETCH_ASSOC);

?>

    <div class="app-title">
        <div>
            <h1> <i class="icofont-list"></i> Category Form </h1>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
            <a href="category_list.php" class="btn btn-outline-primary">
                <i class="icofont-double-left"></i>
            </a>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <form action="category_update.php" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?= $cat['id'] ?>">
                        <input type="hidden" name="oldPhoto" value="<?= $cat['photo'] ?>">
                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label"> Name </label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="name" name="name" value="<?= $cat['name'] ?>">
                            </div>
                        </div>
                        <div class="row">
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
                                        <img width="110" height="110" src="<?= $cat["photo"]; ?>" alt="" id="oldPhoto" name="oldPhoto">
                                    </div>
                                    <div class="tab-pane fade" id="newPhoto" role="tabpanel" aria-labelledby="new-tab">
                                        <input type="file" class="form-control-file" id="newPhoto" name="newPhoto">
                                    </div>
                                </div>
                            </div>
                        </div>
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