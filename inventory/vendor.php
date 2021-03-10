<?php
include('../database_connection.php');

?>
<!DOCTYP html>
    <html>

    <head>
        <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
        <link href="index.css" rel="stylesheet">
        <script src="index.js"></script>
        <script src="jquery/jquery.js"></script>
        <script src="jquery/jquery.min.js"></script>
        <script src="bootstrap/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">

        <link rel="stylesheet" type="text/css" href="../css/reports.css" media="screen" />

    </head>
    <!-- navigation.php-->
    <?php 
        include('header.php');
     ?>
    <div class="container-fluid" id="wrapper">
        <div class="row">
            <div class="col-lg-2">
                <h1 class="my-4"></h1>

                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">

                    <div class="navi">

                    <a class="nav-link " href="home.php">Dashboard</a>
						
						          <a class="nav-link" href="user.php">User</a>
						
                        <a class="nav-link " href="product.php">Product</a>

                        <a class="nav-link" href="sale.php">Sale</a>

                        <a class="nav-link " href="customer.php">Customer</a>

                        <a class="nav-link" href="purchase.php">Purchase</a>

                        <a class="nav-link active" href="vendor.php">Vendor</a>


                        <a class="nav-link" href="search.php">Search</a>

                        <a class="nav-link" href="reports.php">Reports</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-10">
                <div class="card card-outline-secondary my-4">
                    <div class="card-header">Vendor Details</div>
                    <div class="card-body">

                        <input type="button" class="btn btn-success" value="Add New Vendor"
                            onclick="window.location='../php_action/addVendor.php'">


                        <br>





                        <?php
      
      //echo "Connected Successfully";
      echo "<br>";

      $sql = "SELECT * FROM supplier";
      $result = $conn -> query($sql);
    
      // SQL query
    
      if ($result -> num_rows > 0) {
      echo "Number of Vendors: " . $result -> num_rows;
      
      echo "<br><br>";
      
      // Build table for display
      
      echo "<table>";
      echo "<tr>";
      echo "  <th>SO#</th>  
          <th>Vendor Id</th>            
          <th>Vendor Name</th>         
          <th>Contact Person</th>  
          <th>Mobile Number</th>    
          <th>Tel Number</th>   
          <th>Email</th>  
          <th>City</th>       
          <th>District</th>   
          <th>Address</th>   
          <th>Address2</th> 
          <th>Status</th> 
          <th></th>         
          ";

      echo "</tr>";
      



      while ($row = $result -> fetch_assoc()) {
        echo  "<td>" . $row["id"] .
            "</td><td>" . $row["supplierId"] . 
           "</td><td>" . $row["supplierName"] . 
            "</td><td>" . $row["supplierContact"] . 
           "</td><td>" . $row["contact_num"] .
           "</td><td>" . $row["contact_num2"] .  
           "</td><td>" . $row["email"] .   
            "</td><td>" . $row["city"] .
            "</td><td>" . $row["district"] . 
           "</td><td>" . $row["address"] .
           "</td><td>" . $row["address2"] .
             
            "</td><td>" . $row["status"] . 
            "</td><td>" . 
        
                  "<td><a href=\"../php_action/editVendor.php?id=$row[id]\">Edit</a> | <a href=\"../php_action/deleteVendor.php?id=$row[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>" .

            "</td></tr>";
      }     
      
      echo "</table>";
      
      // Free result set
      $result -> free_result();
      }

      $conn -> close();
    
      //echo "<br><br>";
      //echo "Connection Closed";

    
    ?>
                    </div>
                </div>

            </div>
        </div>
    </div>
    </div>
    <!-- footer.php-->
    <?php 
    include('footer.php');
  ?>
    </body>

    </html>