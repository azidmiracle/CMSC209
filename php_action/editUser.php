
<?php
include('../database_connection.php');

if(isset($_POST['update']))
{   

  $id = $_POST['id'];
  $fname = $_POST["fname"];
  $uname = $_POST["uname"];
  $pass = $_POST["password"];
  $user_email = $_POST["userDetailsUserEmail"];
  $contact_num = $_POST["userDetailsUserMobile"];
  $status = $_POST["Status"]; 


        //updating the table
$stmt = $conn->prepare("UPDATE users SET name ='$fname', username = '$uname' , password = '$pass', user_email ='$user_email', contact_num ='$contact_num', status ='$status' WHERE id = $id");
  
    $stmt->execute();
    $stmt->close();
    $conn->close();
  


        
        //redirectig to the display page. In our case, it is index.php
        header("Location: ../Inventory/user.php");
  
}
?>
<?php
//getting id from url
$id = $_GET['id'];
 
//selecting data associated with this particular id
$sql = "SELECT * FROM users WHERE id = $id";
$result = $conn -> query($sql);

while ($row = $result -> fetch_assoc()) {
{

  $id = $row["id"];
  $fname = $row["name"];
  $uname = $row["username"];
  $pass = $row["password"];
  $user_email = $row["user_email"];   
  $contact_num = $row["contact_num"];
  $status = $row["status"];
  }
}
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

                        <a class="nav-link active" href="../inventory/user.php">User</a>

                        <a class="nav-link " href="../inventory/product.php">Product</a>

                        <a class="nav-link" href="../inventory/sale.php">Sale</a>

                        <a class="nav-link" href="../inventory/purchase.php">Purchase</a>

                        <a class="nav-link " href="../inventory/customer.php">Customer</a>

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
         <form id="editUser" name="editUser" method="post" action="editUser.php">

            <div class="form-row">
            <div class="form-group col-md-3">
              <label for="userID">User ID</label>
              <input type="text" class="form-control invTooltip" id="userID" name="userID" title="This will be auto-generated when you add a new user" value="<?php echo $id;?>" readonly autocomplete="off">
              <div id="userDetailsUserIDSuggestionsDiv" class="customListDivWidth"></div>
            </div>
              </div>


            <div class="form-row">

              <div class="form-group col-md-3">
              <label for="uname">User Name<span class="requiredIcon">*</span></label>
              <input type="text" class="form-control" name="uname" id="uname" value="<?php echo $uname;?>"  required>
            </div>

            <div class="form-group col-md-3">
              <label for="password">Password<span class="requiredIcon">*</span></label>
              <input type="password" class="form-control" name="password" id="password" value="<?php echo $pass;?>"  required>
            </div>
             </div>
              <div class="form-row">
            <div class="form-group col-md-6">
              <label for="fname">Full Name<span class="requiredIcon">*</span></label>
              <input type="text" class="form-control" name="fname" id="fname" value="<?php echo $fname;?>" autocomplete="off" required>
              
            </div>
            
        </div>
            <div class="form-row">
          <div class="form-group col-md-6">
            <label for="userDetailsUserEmail">Email</label>
            <input type="email" class="form-control" id="userDetailsUserEmail" name="userDetailsUserEmail" value="<?php echo $user_email;?>" >
        </div>
        </div>
              <div class="form-row">
           <div class="form-group col-md-3">
              <label for="userDetailsUserMobile">Phone (mobile)<span class="requiredIcon">*</span></label>
              <input type="text" class="form-control invTooltip" id="userDetailsUserMobile" name="userDetailsUserMobile" title="Do not enter leading 0" value="<?php echo $contact_num;?>" >
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
                 <input type="button" class="btn btn-secondary" value="Cancel" onclick="window.location='../inventory/user.php'">
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