<?php
require 'header.php';
require 'db_connect.php';

$id = $_GET['scid'];
$subcat_cat_id = $_GET['cid'];
//var_dump($subcat_cat_id);

$qry = "SELECT * FROM subcategories WHERE id = :value1";
$stmt = $conn->prepare($qry);
$stmt->bindParam(':value1',$id);
$stmt->execute();
$subcat = $stmt->fetch(PDO::FETCH_ASSOC);

?>

    <div class="app-title">
        <div>
            <h1> <i class="icofont-list"></i> Sub-category Form </h1>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
            <a href="subcategory_list.php" class="btn btn-outline-primary">
                <i class="icofont-double-left"></i>
            </a>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <form method="POST" action="subcategory_update.php">
                        <input type="hidden" name="realID" value="<?= $subcat['id']; ?>">
                        <div class="form-group row">
                            <input type="hidden" name="id" value="<?= $subcat_cat_id; ?>">
                            <label for="name_id" class="col-sm-2 col-form-label"> Name </label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="name_id" name="name" value="<?= $subcat['name']; ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="category" class="col-sm-2 col-form-label"> Category </label>
                            <div class="col-sm-10">
                                <select class="form-control" name="category" id="category">
                                    <?php
                                    $sql_qry = "SELECT * FROM categories";
                                    $stmt = $conn->prepare($sql_qry);
                                    $stmt->execute();

                                    $rows = $stmt->fetchAll();
                                    foreach ($rows as $row)
                                    {
                                        $id = $row["id"];
                                        $name = $row["name"];

                                        echo '<option '
                                            . ( $id == $subcat_cat_id? 'selected="selected"' : '')  .'value="'.$id.'"'.'>'
                                            . $name
                                            . '</option>';
                                    }
                                    ?>
                                </select>
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