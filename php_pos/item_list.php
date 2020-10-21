<?php  
    require 'header.php';
    require 'db_connect.php';
?>
<div class="app-title">
    <div>
        <h1> <i class="icofont-list"></i> Item </h1>
    </div>
    <ul class="app-breadcrumb breadcrumb side">
        <a href="item_new.php" class="btn btn-outline-primary">
            <i class="icofont-plus"></i>
        </a>
    </ul>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="tile">
            <div class="tile-body">
                <div class="table-responsive">
                    <table class="table table-hover table-bordered" id="sampleTable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Brand</th>
                                <th>Price</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        $sql_qry = "SELECT * FROM items";
                        $stmt = $conn->prepare($sql_qry);
                        $stmt->execute();

                        $rows = $stmt->fetchAll();
                        $num = 1;
                        foreach ($rows as $row)
                        {
                            $id = $row["id"];
                            $name = $row["name"];
                            $brand_id = $row["brand_id"];
                            $subcategory_id = $row["subcategory_id"];
                            $price = $row["price"];
                            $photo = $row["photo"];
                            $qry = "SELECT brands.name FROM brands INNER JOIN items ON items.brand_id = brands.id WHERE $brand_id = brands.id";
                            $stmt = $conn->prepare($qry);
                            $stmt->execute();
                            $brand_name = $stmt->fetch();
                            echo "<tr>
                                         <td>$num</td>
                                         <td> <img style='object-fit: cover;' class='rounded table-bordered border-info' src='$photo' width='90' height='90'>
                                            $name
                                         </td>
                                         <td>
                                         $brand_name[0]
                                         </td>
                                         <td>$price mmk</td>
                                         <td>
                                            <a href='item_edit.php?itemId=$id&brandId=$brand_id&subcatId=$subcategory_id' class='btn btn-warning'>
                                                <i class='icofont-ui-settings'></i>
                                            </a>
                                            <a onclick='return confirm(\"Are you sure?\")' href='item_delete.php?itemId=$id' class='btn btn-outline-danger'>
                                                <i class='icofont-close'></i>
                                            </a>
                                        </td>
                                      </tr>";
                            $num++;
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php  
    require 'footer.php'
?>