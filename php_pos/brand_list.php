<?php  
	require 'header.php';
	require 'db_connect.php';
?>
<div class="app-title">
    <div>
        <h1> <i class="icofont-list"></i> Brand </h1>
    </div>
    <ul class="app-breadcrumb breadcrumb side">
        <a href="brand_new.php" class="btn btn-outline-primary">
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
                        $sql_qry = "SELECT * FROM brands";
                        $stmt = $conn->prepare($sql_qry);
                        $stmt->execute();

                        $rows = $stmt->fetchAll();
                        $num = 1;
                        foreach ($rows as $row)
                        {
                            $id = $row["id"];
                            $name = $row["name"];
                            $logo = $row["logo"];
                            echo "<tr>
                                         <td>$num</td>
                                         <td>
                                            <img style='object-fit: cover;' class='rounded table-bordered border-info'  src='$logo' width='70' height='70'>
                                            $name
                                         </td>
                                         <td>
                                            <a href='brand_edit.php?bid=$id' class='btn btn-warning'>
                                                <i class='icofont-ui-settings'></i>
                                            </a>
                                            <a onclick='return confirm(\"Are you sure?\")' href='brand_delete.php?bid=$id' class='btn btn-outline-danger'>
                                                <i class='icofont-close'></i>
                                            </a>
                                        </td>
                                      </tr>";
                            $num++;
                        }
                        ?>
                        </tbody>
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