<?php
include('../database_connection.php');

?>

<?php

$sql = "SELECT * FROM customer";
$result = $conn -> query($sql);
$total1  =  $result -> num_rows + 1;
$total =  "KNJCus#-" . $total1;

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

                        <a class="nav-link " href="../inventory/product.php">Product</a>

                        <a class="nav-link" href="../inventory/sale.php">Sale</a>

                        <a class="nav-link" href="../inventory/purchase.php">Purchase</a>

                        <a class="nav-link active" href="../inventory/customer.php">Customer</a>

                        <a class="nav-link" href="../inventory/vendor.php">Vendor</a>

                        <a class="nav-link" href="../inventory/search.php">Search</a>

                        <a class="nav-link" href="../inventory/reports.php">Reports</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-10">


                <div class="card card-outline-secondary my-4">
                    <div class="card-header">Customer Details</div>
                    <div class="card-body">


                        <br>


                        <div id="itemDetailsMessage"></div>
                        <form id="addCustomer" name="addCustomer" method="post"
                            action="../php_action/customer_action.php">


                            <div class="form-row">

                                <div class="form-group col-md-3">
                                    <label for="customerID">Customer ID</label>
                                    <input type="text" class="form-control invTooltip" id="customerID" name="customerID"
                                        title="This will be auto-generated when you add a new customer"
                                        value="<?php echo $total;?>" autocomplete="off">
                                    <div id="customerDetailsCustomerIDSuggestionsDiv" class="customListDivWidth"></div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="name">Full Name<span class="requiredIcon">*</span></label>
                                    <input type="text" class="form-control" name="name" id="name" required>
                                </div>
                                <!--
           <div class="form-group col-md-3">
              <label for="Status">Status</label>
              <select id="Status" name="Status" class="form-control chosenSelect">
                <option value="Active">Active</option>  
                <option value="Inactive">Inactive</option>   
            </select>  
             </div> -->
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-3">
                                    <label for="customerDetailsCustomerMobile">Phone (mobile)<span
                                            class="requiredIcon">*</span></label>
                                    <input type="text" class="form-control invTooltip"
                                        id="customerDetailsCustomerMobile" name="customerDetailsCustomerMobile"
                                        title="Do not enter leading 0" required>
                                </div>

                                <div class="form-group col-md-3">
                                    <label for="customerDetailsCustomerPhone2">Phone 2</label>
                                    <input type="text" class="form-control invTooltip"
                                        id="customerDetailsCustomerPhone2" name="customerDetailsCustomerPhone2"
                                        title="Do not enter leading 0">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="customerDetailsCustomerEmail">Email</label>
                                    <input type="email" class="form-control" id="customerDetailsCustomerEmail"
                                        name="customerDetailsCustomerEmail">
                                </div>

                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="customerDetailsCustomerCity">City</label>
                                    <input type="text" class="form-control" id="customerDetailsCustomerCity"
                                        name="customerDetailsCustomerCity">
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="customerDetailsCustomerDistrict">District</label>
                                    <input type="text" class="form-control" id="customerDetailsCustomerDistrict"
                                        name="customerDetailsCustomerDistrict">
                                </div>
                                <!--
            <div class="form-group col-md-4">
              <label for="customerDetailsCustomerDistrict">District</label>
              <select id="customerDetailsCustomerDistrict" name="customerDetailsCustomerDistrict" class="form-control chosenSelect">
                <?php include('inc/districtList.html'); ?>
              </select>
            </div> -->
                            </div>
                            <div class="form-group">
                                <label for="customerDetailsCustomerAddress">Address<span
                                        class="requiredIcon">*</span></label>
                                <input type="text" class="form-control" id="customerDetailsCustomerAddress"
                                    name="customerDetailsCustomerAddress" required>
                            </div>
                            <div class="form-group">
                                <label for="customerDetailsCustomerAddress2">Address 2</label>
                                <input type="text" class="form-control" id="customerDetailsCustomerAddress2"
                                    name="customerDetailsCustomerAddress2">
                            </div>

                            <button type="submit" value="Submit" id="addItem" class="btn btn-success">Add</button>
                            <button type="reset" class="btn btn-primary">Clear</button>
                            <input type="button" class="btn btn-secondary" value="Cancel"
                                onclick="window.location='../inventory/customer.php'">

                        </form>
                        <div class="tab-content" id="v-pills-tabContent">
                            <div class="tab-pane fade show active" id="v-pills-item" role="tabpanel"
                                aria-labelledby="v-pills-item-tab">
                                <div class="card card-outline-secondary my-4">
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