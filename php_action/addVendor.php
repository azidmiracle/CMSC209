
<?php
include('../database_connection.php');

?>

<?php

$sql = "SELECT * FROM supplier";
$result = $conn -> query($sql);
$total  =  $result -> num_rows + 1;

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

                                    <a class="nav-link " href="../inventory/customer.php">Customer</a>

                                    <a class="nav-link active" href="../inventory/vendor.php">Vendor</a>

                                    <a class="nav-link" href="../inventory/search.php">Search</a>

                                    <a class="nav-link" href="../inventory/reports.php">Reports</a>
                              </div>
                          </div>
                        </div>

	<div class="col-lg-10">
       

		 <div class="card card-outline-secondary my-4">
          <div class="card-header">Vendor Details</div>
          <div class="card-body">

      
		<br>
		
		
          <div id="itemDetailsMessage"></div>
          
         <form id="addVendor" name="addVendor" method="post" action="../php_action/vendor_action.php">

            <div class="form-row">
            
          <div class="form-group col-md-3">
            <label for="vendorDetailsVendorID">Vendor ID</label>
            <input type="text" class="form-control invTooltip" id="vendorDetailsVendorID" name="vendorDetailsVendorID" title="This will be auto-generated when you add a new vendor" value="<?php echo $total;?>" autocomplete="off">
            <div id="vendorDetailsVendorIDSuggestionsDiv" class="customListDivWidth"></div>
        </div>

          <div class="form-group col-md-3">
          <label for="vendorDetailsVendorFullName">Vendor Name<span class="requiredIcon">*</span></label>
          <input type="text" class="form-control" id="vendorDetailsVendorFullName" name="vendorDetailsVendorFullName" placeholder="" required>
          </div>

           <div class="form-group col-md-6">
          <label for="vendorDetailsContact">Contact Person<span class="requiredIcon">*</span></label>
          <input type="text" class="form-control" id="vendorDetailsContact" name="vendorDetailsContact" placeholder="" required>
        </div>

            
          </div> 
   
           <div class="form-row">
            <div class="form-group col-md-3">
              <label for="vendorDetailsVendorMobile">Phone (mobile)<span class="requiredIcon">*</span></label>
              <input type="text" class="form-control invTooltip" id="vendorDetailsVendorMobile" name="vendorDetailsVendorMobile" title="Do not enter leading 0" required >
            </div>
            <div class="form-group col-md-3">
              <label for="vendorDetailsVendorPhone2">Phone 2</label>
              <input type="text" class="form-control invTooltip" id="vendorDetailsVendorPhone2" name="vendorDetailsVendorPhone2" title="Do not enter leading 0">
            </div>
            <div class="form-group col-md-6">
              <label for="vendorDetailsVendorEmail">Email</label>
              <input type="email" class="form-control" id="vendorDetailsVendorEmail" name="vendorDetailsVendorEmail">
          </div>
        </div> 
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="vendorDetailsVendorCity">City</label>
                <input type="text" class="form-control" id="vendorDetailsVendorCity" name="vendorDetailsVendorCity">
              </div>
             <div class="form-group col-md-6">
              <label for="vendorDetailsVendorDistrict">District</label>
               <input type="text" class="form-control" id="vendorDetailsVendorDistrict" name="vendorDetailsVendorDistrict">
            </div> 
              </div> 
               <div class="form-group">
              <label for="vendorDetailsVendorAddress">Address<span class="requiredIcon">*</span></label>
              <input type="text" class="form-control" id="vendorDetailsVendorAddress" name="vendorDetailsVendorAddress" required >
            </div>
            <div class="form-group">
              <label for="vendorDetailsVendorAddress2">Address 2</label>
              <input type="text" class="form-control" id="vendorDetailsVendorAddress2" name="vendorDetailsVendorAddress2">
            </div>
            
             <button type="submit" value="Submit" id="addItem" class="btn btn-success">Add Vendor</button>
              <button type="reset" class="btn btn-primary">Clear</button>
             <input type="button" class="btn btn-secondary" value="Cancel" onclick="window.location='../inventory/vendor.php'">
      
          </form>
           <div class="tab-content" id="v-pills-tabContent">
          <div class="tab-pane fade show active" id="v-pills-item" role="tabpanel" aria-labelledby="v-pills-item-tab">
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
