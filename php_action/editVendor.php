
<?php
include('../database_connection.php');

if(isset($_POST['update']))
{    
  $id = $_POST['id'];
  $suppName = $_POST["vendorDetailsVendorFullName"];
  $suppContact = $_POST["vendorDetailsContact"];
  $suppNum = $_POST["vendorDetailsVendorMobile"];
  $suppNum2 = $_POST["vendorDetailsVendorPhone2"];
  $suppEmail = $_POST["vendorDetailsVendorEmail"];  
  $suppCity = $_POST["vendorDetailsVendorCity"];
  $suppDist = $_POST["vendorDetailsVendorDistrict"];
  $suppAdd = $_POST["vendorDetailsVendorAddress"];
  $suppAdd2 = $_POST["vendorDetailsVendorAddress2"];  
  $status = $_POST["Status"];   
 

        //updating the table
$stmt = $conn->prepare("UPDATE supplier SET supplierName ='$suppName', supplierContact ='$suppContact', contact_num = '$suppNum', contact_num2 ='$suppNum2', email ='$suppEmail', city = '$suppCity', district = '$suppDist', address = '$suppAdd', address2 = '$suppAdd2', status ='$status' WHERE id=$id");
  
    $stmt->execute();
    $stmt->close();
    $conn->close();
  


        
        //redirectig to the display page. In our case, it is index.php
        header("Location: ../Inventory/vendor.php");
  
}
?>
<?php
//getting id from url
$id = $_GET['id'];
 
//selecting data associated with this particular id
$sql = "SELECT * FROM supplier WHERE id = $id";
$result = $conn -> query($sql);

while ($row = $result -> fetch_assoc()) {
{

  $suppName =  $row["supplierName"];
  $suppContact =  $row["supplierContact"];
  $suppNum =  $row["contact_num"];
  $suppNum2 =  $row["contact_num2"];
  $suppEmail =  $row["email"]; 
  $suppCity =  $row["city"];
  $suppDist =  $row["district"];
  $suppAdd =  $row["address"];
  $suppAdd2 =  $row["address2"]; 
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
         <form id="editVendor" name="editVendor" method="post" action="editVendor.php">

            <div class="form-row">
              <div class="form-group col-md-3">
             <label for="vendorDetailsVendorID">Vendor ID</label>
            <input type="text" class="form-control invTooltip" id="vendorDetailsVendorID" name="vendorDetailsVendorID" title="This will be auto-generated when you add a new vendor" value="<?php echo $id;?>" readonly autocomplete="off">
            <div id="vendorDetailsVendorIDSuggestionsDiv" class="customListDivWidth"></div>
          </div>
       
        <div class="form-group col-md-3">
          <label for="vendorDetailsVendorFullName">Vendor Name<span class="requiredIcon">*</span></label>
          <input type="text" class="form-control" id="vendorDetailsVendorFullName" name="vendorDetailsVendorFullName" placeholder="" value="<?php echo $suppName;?>" >
          </div>
            
            <div class="form-group col-md-6">
          <label for="vendorDetailsContact">Contact Person<span class="requiredIcon">*</span></label>
          <input type="text" class="form-control" id="vendorDetailsContact" name="vendorDetailsContact" placeholder="" value="<?php echo $suppContact;?>">
        </div>
          
          </div> 
         
            <div class="form-row">
            <div class="form-group col-md-3">
              <label for="vendorDetailsVendorMobile">Phone (mobile)<span class="requiredIcon">*</span></label>
              <input type="text" class="form-control invTooltip" id="vendorDetailsVendorMobile" name="vendorDetailsVendorMobile" title="Do not enter leading 0" value="<?php echo $suppNum;?>">
            </div>
            <div class="form-group col-md-3">
              <label for="vendorDetailsVendorPhone2">Phone 2</label>
              <input type="text" class="form-control invTooltip" id="vendorDetailsVendorPhone2" name="vendorDetailsVendorPhone2" title="Do not enter leading 0" value="<?php echo $suppNum2;?>">
            </div>
            <div class="form-group col-md-6">
              <label for="vendorDetailsVendorEmail">Email</label>
              <input type="email" class="form-control" id="vendorDetailsVendorEmail" name="vendorDetailsVendorEmail" value="<?php echo $suppEmail;?>">
          </div>
        </div> 
        <div class="form-row">
              <div class="form-group col-md-6">
                <label for="vendorDetailsVendorCity">City</label>
                <input type="text" class="form-control" id="vendorDetailsVendorCity" name="vendorDetailsVendorCity" value="<?php echo $suppCity;?>">
              </div>
             <div class="form-group col-md-6">
              <label for="vendorDetailsVendorDistrict">District</label>
               <input type="text" class="form-control" id="vendorDetailsVendorDistrict" name="vendorDetailsVendorDistrict" value="<?php echo $suppDist;?>">
            </div> 
              </div> 
              <div class="form-group">
              <label for="vendorDetailsVendorAddress">Address<span class="requiredIcon">*</span></label>
              <input type="text" class="form-control" id="vendorDetailsVendorAddress" name="vendorDetailsVendorAddress" value="<?php echo $suppAdd;?>">
            </div>
            <div class="form-group">
              <label for="vendorDetailsVendorAddress2">Address 2</label>
              <input type="text" class="form-control" id="vendorDetailsVendorAddress2" name="vendorDetailsVendorAddress2" value="<?php echo $suppAdd2;?>">
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
                <td><input type="submit" name="update" class="btn btn-success" value  = "Update"></td>
                 <input type="button" class="btn btn-secondary" value="Cancel" onclick="window.location='../inventory/vendor.php'">
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