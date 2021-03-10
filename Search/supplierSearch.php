<form method="POST" action="" >
  <div class="form-group">
    <div class="form-row">
      <div class="form-group col-sm">
          <input type="text" class="form-control" id="SearchsupplierID" name="Searchsupplier" placeholder="Type supplier name or ID"   autofocus="">
      </div>
        <input type="submit" value="search" class="btn col-sm" name="SearchsupplierBtn" onclick="document.cookie='searchTab=5'">             
    </div>          
  </div>
</form>

<?php
    include('../database_connection.php');
    
    //if ($_SERVER["REQUEST_METHOD"] == "POST") {
      if (isset($_POST['SearchsupplierBtn'])) { 
     
     $custName = trim($_POST['Searchsupplier']);    
	
	$sql = "SELECT * FROM `supplier` WHERE  supplierName LIKE '%$custName%' OR supplierId LIKE '%$custName%'";
	$result = $conn -> query($sql);		
	if ($result -> num_rows > 0) {			
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
		$no=1;		
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
  else{
    echo "Cannot find $custName.";
  }	
    $conn -> close();	

}
?>