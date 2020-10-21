<?php
require 'frontend_header.php';
?>

<!-- Content -->
<div class="container mt-5">
    <!-- Shopping Cart Div -->
    <div class="row mt-5 shoppingcart_div">
        <div class="col-12">
            <a href="categories" class="btn mainfullbtncolor btn-secondary float-right px-3" >
                <i class="icofont-shopping-cart"></i>
                Continue Shopping
            </a>
        </div>
    </div>

    <div class="row mt-5 shoppingcart_div">
        <div class="table-responsive">
            <table class="table">
                <thead>
                <tr>
                    <th colspan="3"> Product </th>
                    <th colspan="3"> Qty </th>
                    <th> Price </th>
                    <th> Total </th>
                </tr>
                </thead>
                <tbody id="shoppingcart_table">
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="5">
                            <textarea class="form-control" id="notes" placeholder="Any Request..."></textarea>
                        </td>
                        <td colspan="3">
                            <a
                            <?php if(isset($_SESSION['login_user'])){ ?>
                                href="#"
                            <?php } else{ ?>
                                href="login.php"
                            <?php } ?>
                                id="checkBtn" class="btn btn-secondary btn-block mainfullbtncolor checkoutbtn">
                                Check Out
                            </a>
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>

    <!-- No Shopping Cart Div -->
    <div class="row mt-5 noneshoppingcart_div text-center">

        <div class="col-12">
            <h5 class="text-center"> There are no items in this cart </h5>
        </div>

        <div class="col-12 mt-5 ">
            <a href="categories" class="btn btn-secondary mainfullbtncolor px-3" >
                <i class="icofont-shopping-cart"></i>
                Continue Shopping
            </a>
        </div>

    </div>


</div>

<?php
require 'frontend_footer.php';
?>
