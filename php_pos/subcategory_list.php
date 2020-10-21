<?php  
	require 'header.php';
	require 'db_connect.php';
?>
<div class="app-title">
    <div>
        <h1> <i class="icofont-list"></i> Subcategory </h1>
    </div>
    <ul class="app-breadcrumb breadcrumb side">
        <a href="subcategory_new.php" class="btn btn-outline-primary">
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
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        $sql_qry = "SELECT * FROM subcategories";
                        $stmt = $conn->prepare($sql_qry);
                        $stmt->execute();

                        $rows = $stmt->fetchAll();
                        $num = 1;
                        foreach ($rows as $row)
                        {
                            $id = $row["id"];
                            $name = $row["name"];
                            $category_id = $row["category_id"];
                            echo "<tr>
                                         <td>$num</td>
                                         <td>$name</td>
                                         <td>
                                            <a href='subcategory_edit.php?scid=$id&cid=$category_id' class='btn btn-warning'>
                                                <i class='icofont-ui-settings'></i>
                                            </a>
                                            <a onclick='return confirm(\"Are you sure?\")' href='subcategory_delete.php?scid=$id' class='btn btn-outline-danger'>
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