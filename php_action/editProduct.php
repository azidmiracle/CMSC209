
<?php
include('../database_connection.php');

if(isset($_POST['update']))
{    
  $id = $_POST['id'];
  $product_name = $_POST["itemDetailsItemName"];
  $product_desc = $_POST["itemDetailsDescription"];
  $unit = $_POST["itemDetailsUnit"];
  $quantity = $_POST["itemDetailsQuantity"];
  $reorder = $_POST["itemDetailsReorder"];
  $price = $_POST["itemDetailsPrice"];
  $status = $_POST["Status"]; 


        //updating the table
$stmt = $conn->prepare("UPDATE itemlist SET productName ='$product_name', product_desc ='$product_desc', quantity ='$quantity', unit ='$unit',  reorder ='$reorder', price ='$price', status ='$status' WHERE id=$id");
  
    $stmt->execute();
    $stmt->close();
    $conn->close();
  


        
        //redirectig to the display page. In our case, it is index.php
        header("Location: ../Inventory/product.php");
  
}
?>
<?php
//getting id from url
$id = $_GET['id'];
 
//selecting data associated with this particular id
$sql = "SELECT * FROM itemlist WHERE id = $id";
$result = $conn -> query($sql);

while ($row = $result -> fetch_assoc()) {
{

   
  $productCode = $row["productCode"];
  $product_name = $row["productName"];
  $product_desc =  $row["product_desc"];
  $unit = $row["unit"];
  $quantity = $row["quantity"];
  $reorder =  $row["reorder"];
  $price = $row["price"];
  $status =  $row["status"]; 

  }
}
?>
<!DOCTYP html>
<html>
    <head>
       
        <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
        <link href="../inventory/index.css" rel="stylesheet">
        <script src="../inventory/index.js"></script>


        <script src="../inventory/jquery/jquery.js"></script>
        <script src="../inventory/bootstrap/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="../inventory/bootstrap/css/bootstrap.min.css">
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
		 <div class="card card-outline-secondary my-4">
          <div class="card-header">Product Details</div>
          <div class="card-body">

      
		<br>
		
		
          <div id="itemDetailsMessage"></div>
         <form id="addProduct" name="addProduct" method="post" action="editProduct.php">

            <div class="form-row">
            <div class="form-group col-md-3" style="display:inline-block">
              <label for="itemDetailsItemNumber">Item Number<span class="requiredIcon">*</span></label>
              <input type="text" class="form-control" name="itemDetailsItemNumber" id="itemDetailsItemNumber" value="<?php echo $productCode;?>" readonly autocomplete="off">
              <div id="itemDetailsItemNumberSuggestionsDiv" class="customListDivWidth"></div>
            </div>

      
          </div>
          <div class="form-row">
             <div class="form-group col-md-6">
                <label for="itemDetailsItemName">Item Name<span class="requiredIcon">*</span></label>
                <input type="text" class="form-control" name="itemDetailsItemName" value="<?php echo $product_name;?>" id="itemDetailsItemName" required autocomplete="off">
                <div id="itemDetailsItemNameSuggestionsDiv" class="customListDivWidth"></div>
              </div>

            
          </div>

           <div class="form-row">
            <div class="form-group col-md-6" style="display:inline-block">
              <label for="itemDetailsDescription">Description</label>
              <input type="text" class="form-control" name="itemDetailsDescription" value="<?php echo $product_desc;?>" id="itemDetailsDescription"></input>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-3">
              <label for="itemDetailsUnit">Unit<span class="requiredIcon">*</span></label>
              <input type="text" class="form-control" name="itemDetailsUnit" value="<?php echo $unit;?>" id="itemDetailsUnit" required>
            </div>

         <div class="form-group col-md-3">
              <label for="itemDetailsQuantity">Quantity</label>
              <input type="number" class="form-control" value="0" value="<?php echo $quantity;?>" name="itemDetailsQuantity" id="itemDetailsQuantity">
            </div>
             </div>

             
          <div class="form-row">
            <div class="form-group col-md-3">
              <label for="itemDetailsPrice">Price</label>
              <input type="text" class="form-control" value="0" name="itemDetailsPrice" value="<?php echo $price;?>" id="itemDetailsPrice">
            </div>
            <div class="form-group col-md-3">
              <label for="itemDetailsReorder">Reorder</label>
              <input type="text" class="form-control" value="0" name="itemDetailsReorder" value="<?php echo $reorder;?>" id="itemDetailsReorder">
            </div>
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
                 <input type="button" class="btn btn-secondary" value="Cancel" onclick="window.location='../inventory/product.php'">
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