<?php  
    require 'header.php';
?>
<div class="app-title">
    <div>
        <h1> <i class="icofont-list"></i> Order </h1>
    </div>
    <ul class="app-breadcrumb breadcrumb side">
        <a href="category_new.php" class="btn btn-outline-primary">
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
                                <th>Date</th>
                                <th>Voucher Number</th>
                                <th>Total</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td> 1. </td>
                                <td> 2020/01/13 </td>
                                <td>3938287</td>
                                <td>65000</td>
                                <td>Order</td>
                                <td>
                                    <a href="" class="btn btn-outline-info">
                                        <i class="icofont-exclamation"></i>
                                    </a>
                                    <a href="" class="btn btn-outline-success">
                                        <i class="icofont-check"></i>
                                    </a>
                                    <a href="" class="btn btn-outline-danger">
                                        <i class="icofont-close"></i>
                                    </a>
                                </td>
                            </tr>
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