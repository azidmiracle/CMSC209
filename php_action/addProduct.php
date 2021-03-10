<?php
include('../database_connection.php');

?>

<?php

$sql = "SELECT * FROM itemlist";
$result = $conn -> query($sql);
$total1  =  $result -> num_rows + 1;
$total =  "KNJ-ITM-" . $total1;

?>
<!DOCTYP html>
    <html>

    <head>
        <!-- <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css"> -->
        <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
        <link href="../Inventory/index.css" rel="stylesheet">
        <script src="../Inventory/index.js"></script>


        <script src="../Inventory/jquery/jquery.js"></script>
        <script src="../Inventory/bootstrap/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="../Inventory/bootstrap/css/bootstrap.min.css">
    </head>



    <!-- navigation.php-->
    <?php 
        include('../inventory/header.php');
     ?>

    <div class="container-fluid" id="wrapper">
        <div class="row">
            <div class="col-lg-2">
                <h1 class="my-4"></h1>

                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">

                    <div class="navi">

                        <a class="nav-link " href="../inventory/home.php">Dashboard</a>

                        <a class="nav-link" href="../inventory/user.php">User</a>

                        <a class="nav-link active" href="../inventory/product.php">Product</a>

                        <a class="nav-link" href="../inventory/sale.php">Sale</a>

                        <a class="nav-link" href="../inventory/purchase.php">Purchase</a>

                        <a class="nav-link" href="../inventory/customer.php">Customer</a>

                        <a class="nav-link" href="../inventory/vendor.php">Vendor</a>

                        <a class="nav-link" href="../inventory/search.php">Search</a>

                        <a class="nav-link" href="../inventory/reports.php">Reports</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-10">
                <div class="tab-content" id="v-pills-tabContent">
                    <div class="tab-pane fade show active" id="v-pills-item" role="tabpanel"
                        aria-labelledby="v-pills-item-tab">
                        <div class="card card-outline-secondary my-4">
                            <div class="card-header">Item Details</div>
                            <div class="card-body">
                                <ul class="nav nav-tabs" role="tablist">

                                    <li class="nav-item">
                                        <a class="nav-link active" data-toggle="tab" href="#itemDetailsTab">Item</a>
                                    </li>

                                </ul>



                                <div id="itemDetailsTab" class="container-fluid tab-pane active">
                                    <br>
                                    <!-- Div to show the ajax message from validations/db submission -->
                                    <div id="itemDetailsMessage"></div>
                                    <form id="addCustomer" name="addCustomer" method="post"
                                        action="../php_action/product_action.php">
                                        <div class="form-row">
                                            <div class="form-group col-md-3" style="display:inline-block">
                                                <label for="itemDetailsItemNumber">Item Number<span
                                                        class="requiredIcon">*</span></label>
                                                <input type="text" class="form-control" name="itemDetailsItemNumber"
                                                    id="itemDetailsItemNumber" value="<?php echo $total;?>" required
                                                    autocomplete="off">
                                                <div id="itemDetailsItemNumberSuggestionsDiv"
                                                    class="customListDivWidth"></div>
                                            </div>


                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="itemDetailsItemName">Item Name<span
                                                        class="requiredIcon">*</span></label>
                                                <input type="text" class="form-control" name="itemDetailsItemName"
                                                    id="itemDetailsItemName" required autocomplete="off">
                                                <div id="itemDetailsItemNameSuggestionsDiv" class="customListDivWidth">
                                                </div>
                                            </div>


                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6" style="display:inline-block">
                                                <!-- <label for="itemDetailsDescription">Description</label> -->
                                                <textarea rows="4" class="form-control" placeholder="Description"
                                                    name="itemDetailsDescription"
                                                    id="itemDetailsDescription"></textarea>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-3">
                                                <label for="itemDetailsUnit">Unit<span
                                                        class="requiredIcon">*</span></label>
                                                <input type="text" class="form-control" name="itemDetailsUnit"
                                                    id="itemDetailsUnit" required>
                                            </div>

                                            <div class="form-group col-md-3">
                                                <label for="itemDetailsQuantity">Quantity</label>
                                                <input type="number" class="form-control" value="0"
                                                    name="itemDetailsQuantity" id="itemDetailsQuantity">
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-3">
                                                <label for="itemDetailsPrice">Price</label>
                                                <input type="text" class="form-control" value="0"
                                                    name="itemDetailsPrice" id="itemDetailsPrice">
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="itemDetailsReorder">Reorder</label>
                                                <input type="text" class="form-control" value="0"
                                                    name="itemDetailsReorder" id="itemDetailsReorder">
                                            </div>
                                        </div>
                                        <div class="form-row">


                                            <div class="form-group col-md-3">
                                                <div id="imageContainer"></div>
                                            </div>
                                        </div>
                                        <button type="submit" id="addItem" class="btn btn-success">Add Item</button>
                                        <button type="reset" class="btn btn-primary" id="itemClear">Clear</button>
                                        <input type="button" class="btn btn-secondary" value="Cancel"
                                            onclick="window.location='../inventory/product.php'">



                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
    <!-- footer.php-->
  <?php 
    include('../inventory/footer.php');
  ?>
</body>

    </html>