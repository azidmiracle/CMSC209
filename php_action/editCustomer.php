<?php
include('../database_connection.php');

if(isset($_POST['update']))
{  
  $id = $_POST['id'];  
  //$cust_id = $_POST['customerID'];
  $name = $_POST["name"];
  $custMobile = $_POST["customerDetailsCustomerMobile"];
  $custMobile2 = $_POST["customerDetailsCustomerPhone2"];
  $custEmail = $_POST["customerDetailsCustomerEmail"];
  $custAdd = $_POST["customerDetailsCustomerAddress"];
  $custAdd2 = $_POST["customerDetailsCustomerAddress2"];
  $custCity = $_POST["customerDetailsCustomerCity"];
  $custDist = $_POST["customerDetailsCustomerDistrict"];  
  $status = $_POST["Status"];  
   
   
        //updating the table
$stmt = $conn->prepare("UPDATE customer SET customerName ='$name', contact_num =' $custMobile', contact_num2 ='$custMobile2', email ='$custEmail', city ='$custCity', district ='$custDist', address ='$custAdd', address2 ='$custAdd2', status ='$status' WHERE id = $id");
  
    $stmt->execute();
    $stmt->close();
    $conn->close();
  


        
        //redirectig to the display page. In our case, it is index.php
        header("Location: ../Inventory/customer.php");
  
}
?>
<?php
//getting id from url
$id = $_GET['id'];
 
//selecting data associated with this particular id
$sql = "SELECT * FROM customer WHERE id = $id";
$result = $conn -> query($sql);

while ($row = $result -> fetch_assoc()) {
{

  $cust_id = $row["customerId"];
  $name = $row["customerName"];
  $custMobile = $row["contact_num"];
  $custMobile2 = $row["contact_num2"];
  $custEmail = $row["email"];
  $custCity = $row["city"];
  $custDist = $row["district"];
  $custAdd = $row["address"];
  $custAdd2 = $row["address2"];   
  $status = $row["status"];
  
  }
}
?>
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
                        <form id="editCustomer" name="editCustomer" method="post" action="editCustomer.php">

                            <div class="form-row">

                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-3">
                                    <label for="customerID">Customer ID</label>
                                    <input type="text" class="form-control invTooltip" id="customerID" name="customerID"
                                        title="This will be auto-generated when you add a new customer"
                                        value="<?php echo $cust_id;?>" autocomplete="off" readonly>
                                    <div id="customerDetailsCustomerIDSuggestionsDiv" class="customListDivWidth"></div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="name">Full Name<span class="requiredIcon">*</span></label>
                                    <input type="text" class="form-control" name="name" id="name"
                                        value="<?php echo $name;?>" required>
                                </div>

                            </div>


                            <div class="form-row">
                                <div class="form-group col-md-3">
                                    <label for="customerDetailsCustomerMobile">Phone (mobile)<span
                                            class="requiredIcon">*</span></label>
                                    <input type="text" class="form-control invTooltip"
                                        id="customerDetailsCustomerMobile" name="customerDetailsCustomerMobile"
                                        title="Do not enter leading 0" value="<?php echo $custMobile;?>">
                                </div>

                                <div class="form-group col-md-3">
                                    <label for="customerDetailsCustomerPhone2">Phone 2</label>
                                    <input type="text" class="form-control invTooltip"
                                        id="customerDetailsCustomerPhone2" name="customerDetailsCustomerPhone2"
                                        title="Do not enter leading 0" value="<?php echo $custMobile2;?>">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="customerDetailsCustomerEmail">Email</label>
                                    <input type="email" class="form-control" id="customerDetailsCustomerEmail"
                                        name="customerDetailsCustomerEmail" value="<?php echo $custEmail;?>">
                                </div>

                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="customerDetailsCustomerCity">City</label>
                                    <input type="text" class="form-control" id="customerDetailsCustomerCity"
                                        name="customerDetailsCustomerCity" value="<?php echo $custCity;?>">
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="customerDetailsCustomerDistrict">District</label>
                                    <input type="text" class="form-control" id="customerDetailsCustomerDistrict"
                                        name="customerDetailsCustomerDistrict" value="<?php echo $custDist;?>">
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
                                    name="customerDetailsCustomerAddress" value="<?php echo $custAdd;?>">
                            </div>
                            <div class="form-group">
                                <label for="customerDetailsCustomerAddress2">Address 2</label>
                                <input type="text" class="form-control" id="customerDetailsCustomerAddress2"
                                    name="customerDetailsCustomerAddress2" value="<?php echo $custAdd2;?>">
                            </div>
                            <div class="form-row">



                                <div class="form-group col-md-3">
                                    <label for="status">Status<span class="requiredIcon">*</span></label>
                                    <select id="Status" name="Status" class="form-control chosenSelect">
                                        <option value="<?php echo $status;?>"><?php echo $status;?></option>
                                        <?php  if ($status<>"Active"){ ?>

                                        <option value="Active">Active</option>
                                        <?php } ?>
                                        <?php if ($status<>"Inactive"){ ?>

                                        <option value="Inactive">Inactive</option>
                                        <?php } ?>
                                    </select>


                                </div>

                            </div>

                            <tr>
                                <td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
                                <td><input type="submit" name="update" class="btn btn-success" value="Update"></td>
                                <input type="button" class="btn btn-secondary" value="Cancel"
                                    onclick="window.location='../inventory/customer.php'">
                            </tr>
                        </form>
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